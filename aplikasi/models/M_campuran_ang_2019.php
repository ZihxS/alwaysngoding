<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_campuran_ang_2019 extends CI_Model
{
	private $kolom_order_donasi;
	private $kolom_order_midtrans;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order_donasi = [NULL,'pengguna','jumlah','catatan'];
		$this->kolom_order_midtrans = [NULL,'kode','tipe_pembayaran','jumlah','catatan','tanggal','status'];
	}

	public function tambah_riwayat($pengguna,$log)
	{
		if ($pengguna == 'Y')
		{
			$nama  = $this->session->ang_nama_pengguna;
			$level = $this->session->ang_level;

			if ($level == 'superadmin')
			{
				$l = 'Superadmin';
			}
			elseif ($level == 'admin')
			{
				$l = 'Admin';
			}
			else
			{
				$l = 'Anggota';
			}

			$konten = "{$nama} [{$l}] {$log}";
			$__data = ['pengguna' => $nama,'konten' => $konten,'tanggal_waktu' => $this->ang->sekarang()];
		}
		else
		{
			$__data = ['pengguna' => NULL,'konten' => $log,'tanggal_waktu' => $this->ang->sekarang()];
		}

		$this->db->insert('riwayat',$__data);
	}

	public function cek_slug($slug,$table)
	{
		return $this->db
								->select('slug')
								->from($table)
								->where('slug',$slug)
								->get()
								->num_rows();
	}

	public function cek_data_konfigurasi()
	{
		return $this->db
								->select('versi')
								->from('konfigurasi')
								->get()
								->num_rows();
	}

	public function konfigurasi()
	{
		return $this->db
								->select('*')
								->from('konfigurasi')
								->get()
								->row();
	}

	public function cek_perbaikan_website()
	{
		$cek = $this->db->select("perbaikan")->from("konfigurasi")->get()->num_rows();

		if ($cek == 0)
		{
			return TRUE;
		}
		else
		{
			$r = $this->db->select("perbaikan")->from("konfigurasi")->get()->row()->perbaikan;

			return ($r == 'Y') ? TRUE : FALSE;
		}
	}

	// DataTable Donasi
	private function _perintah_datatable_donasi($data)
	{
		$this->db->select('*')->from('donasi');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('pengguna',$s)
					 	    ->or_like('jumlah',$s)
					 	    ->or_like('catatan',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_donasi[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_donasi','DESC');
		}
	}

	public function data_donasi_jumlah()
	{
		return $this->db
								->select('id_donasi')
								->from('donasi')
								->count_all_results();
	}

	public function data_donasi_jumlah_tersortir($data)
	{
		$this->_perintah_datatable_donasi($data);

		return $this->db->get()->num_rows();
	}

	public function data_donasi($data)
	{
		$this->_perintah_datatable_donasi($data);

		if ($data['length'] != -1)
		{
			$this->db->limit($data['length'],$data['start']);
		}

		return $this->db->get()->result();
	}

	// DataTable Midtrans
	private function _perintah_datatable_midtrans($data)
	{
		$this->db->select('*')->from('midtrans');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('kode',$s)
					 	    ->or_like('tipe_pembayaran',$s)
					 	    ->or_like('jumlah',$s)
					 	    ->or_like('catatan',$s)
					 	    ->or_like('tanggal',$s)
					 	    ->or_like('status',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_midtrans[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('tanggal','DESC');
		}
	}

	public function data_midtrans_jumlah()
	{
		return $this->db
								->select('kode')
								->from('midtrans')
								->count_all_results();
	}

	public function data_midtrans_jumlah_tersortir($data)
	{
		$this->_perintah_datatable_midtrans($data);

		return $this->db->get()->num_rows();
	}

	public function data_midtrans($data)
	{
		$this->_perintah_datatable_midtrans($data);

		if ($data['length'] != -1)
		{
			$this->db->limit($data['length'],$data['start']);
		}

		return $this->db->get()->result();
	}

	// Jumlah Transaksi Midtrans Untuk API
  public function jtmu_api()
  {
  	return $this->db
                ->select('kode')
                ->from('midtrans')
                ->where('status','pending')
                ->get()
                ->num_rows();
  }

	// Ambil Transaksi Midtrans Untuk API
  public function atmu_api()
  {
  	return $this->db
                ->select('kode')
                ->from('midtrans')
                ->where('status','pending')
                ->get()
                ->result();
  }

  public function cek_status_midtrans($kode)
  {
  	return $this->db
                ->select('status')
                ->from('midtrans')
                ->where('kode',$kode)
                ->get()
                ->row()
                ->status;
  }

  public function update_status_donasi($kode)
  {
		if (!ang_integration_enabled('midtrans')) return FALSE;

  	$this->load->library('midtrans');

		$this->midtrans->config([
			'server_key' => $_ENV['MIDTRANS_SERVER_KEY'],
			'production' => ang_env_flag('MIDTRANS_IS_PRODUCTION')
		]);

  	$pisah = explode('-', $kode);

  	$this->db
  			 ->where('kode',$kode)
  			 ->update('midtrans',['status' => $this->midtrans->status($kode)->transaction_status]);

  	if ($this->cek_status_midtrans($kode) == 'settlement')
  	{
			$data     = $this->db->select("jumlah, catatan, tanggal")->from('midtrans')->where('kode',$kode)->get()->row();
			$catatan  = trim($data->catatan);
			$pengguna = $pisah[1];
			$rupiah   = number_format($data->jumlah,0,',','.');
			$donasi   = [
				'pengguna' => $pengguna == 'Anonim' ? NULL : $pengguna,
				'jumlah'   => $data->jumlah,
				'catatan'  => $catatan == '' ? '-' : $catatan,
				'waktu'    => $data->tanggal
  		];

  		$msg = "{$pengguna} mendonasikan Rp{$rupiah},- nya untuk Always Ngoding dengan catatan: {$catatan}.";
  		$this->db->insert('donasi', $donasi);
  		$this->campuran->tambah_riwayat('N',$msg);
	  	$this->ang->bot($msg);

	  	if ($pengguna != 'Anonim')
  		{
  			$this->notifikasi->input($pengguna,"Terima kasih atas donasi yang anda berikan untuk Always Ngoding.","tim?aksi=goToPahlawan");
  		}

			return TRUE;
  	}
  	else
  	{
  		return FALSE;
  	}
  }

  public function jumlah_donasi()
  {
  	return $this->db->select_sum('jumlah')->from('donasi')->get()->row()->jumlah;
  }

  public function ambil_donatur()
  {
  	return $this->db->select('pengguna.nama_pengguna, pengguna.nama_lengkap, pengguna.foto')
  									->distinct()
  									->from('donasi')
  									->join('pengguna','pengguna.nama_pengguna = donasi.pengguna','inner')
  									->where('donasi.pengguna <>', NULL)
  									->get()
  									->result();
  }

  public function sudah_donasi()
  {
  	return $this->db->select('id_donasi')
  									->from('donasi')
  									->where('pengguna', $this->session->ang_nama_pengguna)
  									->get()
  									->num_rows();
  }

	public function ambil_hof()
  {
  	return $this->db->select('*')
  									->from('hof')
  									->join('pengguna','pengguna.nama_pengguna = hof.pengguna','inner')
  									->where('pengguna <>', NULL)
										->order_by('hof.points','DESC')
  									->get()
  									->result();
  }
}
