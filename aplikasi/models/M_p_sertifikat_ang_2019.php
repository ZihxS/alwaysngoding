<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Perolehan Sertifikat
class M_p_sertifikat_ang_2019 extends CI_Model
{
	private $kolom_order;
	private $kolom_order_by_pengguna;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order             = [NULL,'pengguna','nama_sertifikat','tanggal_memperoleh',NULL];
		$this->kolom_order_by_pengguna = [NULL,'nama_sertifikat','tanggal_memperoleh',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_p_sertifikat,p_sertifikat.id_sertifikat,nama_sertifikat,pengguna,tanggal_memperoleh,jam_memperoleh')
					   ->from('p_sertifikat')
					   ->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('p_sertifikat.id_sertifikat',$s)
					 	->or_like('nama_sertifikat',$s)
					 	->or_like('pengguna',$s)
					 	->or_like('tanggal_memperoleh',$s)
					 	->or_like('jam_memperoleh',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);

			if ($data['order'][0]['column'] == 3)
			{
				$this->db->order_by('jam_memperoleh','ASC');
			}
		}
		else
		{
			$this->db->order_by('id_p_sertifikat','DESC');
		}
	}

	private function _perintah_datatable_by_pengguna($data)
	{
		$this->db->select('id_p_sertifikat,p_sertifikat.id_sertifikat,nama_sertifikat,pengguna,tanggal_memperoleh,jam_memperoleh')
					   ->from('p_sertifikat')
					   ->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
					   ->where('pengguna',$this->session->ang_nama_pengguna);

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('p_sertifikat.id_sertifikat',$s)
					 	->or_like('nama_sertifikat',$s)
					 	->or_like('tanggal_memperoleh',$s)
					 	->or_like('jam_memperoleh',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_by_pengguna[$data['order'][0]['column']],$data['order'][0]['dir']);

			if ($data['order'][0]['column'] == 2)
			{
				$this->db->order_by('jam_memperoleh','ASC');
			}
		}
		else
		{
			$this->db->order_by('id_p_sertifikat','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db->select('id_p_sertifikat')
					   		->from('p_sertifikat')
					   		->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
								->count_all_results();
	}

	public function jumlah_untuk_limit($nama_pengguna)
	{
		return $this->db
								->select('id_p_sertifikat')
								->from('p_sertifikat')
			   				->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
								->where('pengguna', $nama_pengguna)
								->count_all_results();
	}

	public function jumlah_by_pengguna()
	{
		return $this->db->select('id_p_sertifikat')
					   		->from('p_sertifikat')
					   		->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
					   		->where('pengguna',$this->session->ang_nama_pengguna)
								->count_all_results();
	}

	public function jumlah_tersortir($data)
	{
		$this->_perintah_datatable($data);

		return $this->db->get()->num_rows();
	}

	public function jumlah_tersortir_by_pengguna($data)
	{
		$this->_perintah_datatable_by_pengguna($data);

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

	public function data_by_pengguna($data)
	{
		$this->_perintah_datatable_by_pengguna($data);

		if ($data['length'] != -1)
		{
			$this->db->limit($data['length'],$data['start']);
		}

		return $this->db->get()->result();
	}

	public function cek_p_sertifikat($id_sertifikat, $pengguna)
	{
		return $this->db
								->select('id_p_sertifikat')
								->from('p_sertifikat')
								->where(['id_sertifikat' => $id_sertifikat, 'pengguna' => $pengguna])
								->get()
								->num_rows();
	}

	public function ambil_untuk_data_diri($nama_pengguna)
	{
		return $this->db->select('id_p_sertifikat,nama_sertifikat,tanggal_memperoleh,jam_memperoleh')
					   				->from('p_sertifikat')
					   				->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
					   				->where('pengguna',$nama_pengguna)
					   				->order_by('id_p_sertifikat','DESC')
					   				->limit(10)
					   				->get()
					   				->result();
	}

	public function ambil_kustom_untuk_data_diri($nama_pengguna)
	{
		return $this->db->select('id_kustom_sertifikat,nama_sertifikat,link_sertifikat')
					   				->from('kustom_sertifikat')
					   				->where('pengguna',$nama_pengguna)
					   				->get()
					   				->result();
	}

	public function ambil_untuk_data_diri_jumlah($nama_pengguna)
	{
		return $this->db->select('id_p_sertifikat,nama_sertifikat,tanggal_memperoleh,jam_memperoleh')
					   				->from('p_sertifikat')
					   				->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
					   				->where('pengguna',$nama_pengguna)
					   				->order_by('id_p_sertifikat','DESC')
					   				->get()
					   				->num_rows() > 10;
	}

	public function ambil_by_nama_pengguna_limit($nama_pengguna,$value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_untuk_limit($nama_pengguna);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->select('id_p_sertifikat,nama_sertifikat,tanggal_memperoleh,jam_memperoleh')
					   				->from('p_sertifikat')
					   				->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
										->where('pengguna', $nama_pengguna)
										->order_by('id_p_sertifikat','DESC')
										->limit($value, $offset)
										->get()
										->result();
	}

	public function ambil_data_lengkap($id_p_sertifikat)
	{
		return $this->db
								->select('*')
								->from('p_sertifikat')
								->join('sertifikat','sertifikat.id_sertifikat = p_sertifikat.id_sertifikat','inner')
								->join('pengguna','pengguna.nama_pengguna = p_sertifikat.pengguna','inner')
								->where('p_sertifikat.id_p_sertifikat',$id_p_sertifikat)
								->get()
								->row();
	}
}
