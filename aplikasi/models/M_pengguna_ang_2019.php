<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna_ang_2019 extends CI_Model
{
	private $kolom_order;
	private $kolom_order_muted;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'nama_pengguna','nama_lengkap','jenis_kelamin','level','aktif',NULL];
		$this->kolom_order_muted = [NULL,'pengguna',NULL];
	}

	// datatable pengguna (start)
	private function _perintah_datatable($data)
	{
		$this->db->select('nama_pengguna,nama_lengkap,jenis_kelamin,level,aktif')
						 ->from('pengguna')
						 ->where('nama_pengguna <>',$this->session->ang_nama_pengguna);

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('nama_pengguna',$s)
					 	->or_like('nama_lengkap',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('nama_pengguna','ASC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('nama_pengguna')
								->from('pengguna')
								->where('nama_pengguna <>',$this->session->ang_nama_pengguna)
								->count_all_results();
	}

	public function jumlah_tersortir($data)
	{
		$this->_perintah_datatable($data);

		return $this->db->get()->num_rows();
	}

	public function data($data)
	{
		$this->_perintah_datatable($data);

		if ($data['length'] != -1)
		{
			$this->db->limit($data['length'],$data['start']);
		}

		return $this->db->get()->result();
	}
	// datatable pengguna (end)

	// datatable pengguna yang dibisukan (start)
	private function _muted_perintah_datatable($data)
	{
		$this->db->select('*')->from('pyd');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->like('pengguna',$s)->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_muted[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('pengguna','ASC');
		}
	}

	public function muted_jumlah()
	{
		return $this->db
								->select('id_pyd')
								->from('pyd')
								->count_all_results();
	}

	public function muted_jumlah_tersortir($data)
	{
		$this->_muted_perintah_datatable($data);

		return $this->db->get()->num_rows();
	}

	public function muted_data($data)
	{
		$this->_muted_perintah_datatable($data);

		if ($data['length'] != -1)
		{
			$this->db->limit($data['length'],$data['start']);
		}

		return $this->db->get()->result();
	}
	// datatable pengguna yang dibisukan (end)

	public function cek_nama_pengguna($nama_pengguna)
	{
		return $this->db
								->select('nama_pengguna')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->num_rows();
	}

	public function cek_data_diri($nama_pengguna)
	{
		return $this->db
								->select('nama_pengguna')
								->from('pengguna')
								->where(['nama_pengguna' => $nama_pengguna,'aktif' => 'Y'])
								->get()
								->num_rows();
	}

	public function ambil_kata_sandi($nama_pengguna)
	{
		return $this->db
								->select('kata_sandi')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->kata_sandi;
	}

	public function ambil_level($nama_pengguna)
	{
		return $this->db
								->select('level')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->level;
	}

	public function ambil_jenis_kelamin($nama_pengguna)
	{
		return $this->db
								->select('jenis_kelamin')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->jenis_kelamin;
	}

	public function ambil_nama_lengkap($nama_pengguna)
	{
		return $this->db
								->select('nama_lengkap')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->nama_lengkap;
	}

	public function ambil_foto($nama_pengguna)
	{
		return $this->db
								->select('foto')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->foto;
	}

	public function ambil_aktif($nama_pengguna)
	{
		return $this->db
								->select('aktif')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->aktif;
	}

	public function ambil_email($nama_pengguna)
	{
		return $this->db
								->select('email')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->email;
	}

	public function ambil($nama_pengguna)
	{
		return $this->db
								->select('nama_pengguna,nama_lengkap,foto,tentang,alamat,email,website_pribadi,akun_medsos,jenis_kelamin,status,level,terakhir_ubah_kata_sandi,terakhir_masuk,poin_belajar')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row();
	}

	public function ambil_terakhir_ubah_kata_sandi($nama_pengguna)
	{
		return $this->db
								->select('terakhir_ubah_kata_sandi')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->terakhir_ubah_kata_sandi;
	}

	public function ambil_data_diri($nama_pengguna)
	{
		return $this->db
								->select('*')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row();
	}

	public function ambil_persentase_pembelajaran($nama_pengguna)
	{
		return $this->db
								->select('*')
								->from('persentase_1')
								->where('pengguna',$nama_pengguna)
								->get()
								->row();
	}

	public function ambil_tentang($nama_pengguna)
	{
		return $this->db
								->select('tentang')
								->from('pengguna')
								->where('nama_pengguna',$nama_pengguna)
								->get()
								->row()
								->tentang;
	}

	public function cek_ketersediaan_email($email)
	{
		return $this->db
								->select('email')
								->from('pengguna')
								->where(['email' => $email,'aktif' => 'Y'])
								->get()
								->num_rows();
	}

	public function ambil_nama_pengguna_dari_email($email)
	{
		return $this->db
								->select('nama_pengguna')
								->from('pengguna')
								->where(['email' => $email,'aktif' => 'Y'])
								->get()
								->row()
								->nama_pengguna;
	}

	public function cek_verifikasi($nama_pengguna)
	{
		return $this->cek_nama_pengguna($nama_pengguna) ? $this->db->select('nama_pengguna')->from('pengguna')->where(['nama_pengguna' => $nama_pengguna,'tanggal_terverifikasi' => NULL])->get()->num_rows() : FALSE;
	}

	public function cek_verifikasi_untuk_masuk($nama_pengguna)
	{
		return $this->db->select('tanggal_terverifikasi')->from('pengguna')->where('nama_pengguna',$nama_pengguna)->get()->row()->tanggal_terverifikasi !== NULL;
	}

	public function ambil_untuk_select()
	{
		return $this->db
								->select('nama_pengguna')
								->from('pengguna')
								->get()
								->result();
	}

	public function untuk_sitemap()
	{
		return $this->db->select('nama_pengguna, level')->from('pengguna')->where('aktif','Y')->get()->result();
	}

	public function peringkat_1_sampai_3()
	{
		return $this->db
								->select('*')
								->from('pengguna')
								->where('aktif','Y')
								->order_by('poin_belajar DESC, poin_diskusi DESC, jumlah_kontribusi DESC')
								->limit(3)
								->get()
								->result();
	}

	public function semua($value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->semua_jumlah();
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db
								->select('*')
								->from('pengguna')
								->where(['aktif' => 'Y', 'tanggal_terverifikasi !=' => NULL, 'level' => 'anggota'])
								->order_by('poin_belajar DESC, poin_diskusi DESC, jumlah_kontribusi DESC')
								->limit($value, $offset)
								->get()
								->result();
	}

	public function semua_jumlah()
	{
		return $this->db
								->select('*')
								->from('pengguna')
								->where(['aktif' => 'Y', 'tanggal_terverifikasi !=' => NULL])
								->count_all_results();
	}

	public function anggota_aktif()
	{
		$where = [
			'aktif' => 'Y',
			'level' => 'anggota',
			'tanggal_terverifikasi !=' => NULL
		];

		return $this->db
								->select('nama_pengguna')
								->from('pengguna')
								->where($where)
								->get()
								->num_rows();
	}

	public function cek_muted_pengguna()
	{
		$this->db->query("DELETE FROM {$this->db->dbprefix('pyd')} WHERE DATEDIFF(NOW(), waktu) > 0");
		return $this->db->select("*")->from('pyd')->where('pengguna', $this->session->ang_nama_pengguna)->get()->num_rows();
	}
}
