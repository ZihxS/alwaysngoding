<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Perolehan Pencapaian
class M_p_pencapaian_ang_2019 extends CI_Model
{
	private $kolom_order;
	private $kolom_order_by_pengguna;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order             = [NULL,'pengguna','nama_pencapaian','tanggal_tercapai',NULL];
		$this->kolom_order_by_pengguna = [NULL,'nama_pencapaian','tanggal_tercapai',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_p_pencapaian,p_pencapaian.id_pencapaian,nama_pencapaian,gambar,pengguna,tanggal_tercapai,jam_tercapai')
					   ->from('p_pencapaian')
					   ->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('p_pencapaian.id_pencapaian',$s)
					 	->or_like('nama_pencapaian',$s)
					 	->or_like('pengguna',$s)
					 	->or_like('tanggal_tercapai',$s)
					 	->or_like('jam_tercapai',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);

			if ($data['order'][0]['column'] == 3)
			{
				$this->db->order_by('jam_tercapai','ASC');
			}
		}
		else
		{
			$this->db->order_by('nama_pencapaian','ASC');
		}
	}

	private function _perintah_datatable_by_pengguna($data)
	{
		$this->db->select('id_p_pencapaian,p_pencapaian.id_pencapaian,nama_pencapaian,gambar,pengguna,tanggal_tercapai,jam_tercapai')
					   ->from('p_pencapaian')
					   ->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner')
					   ->where('pengguna',$this->session->ang_nama_pengguna);

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('p_pencapaian.id_pencapaian',$s)
					 	->or_like('nama_pencapaian',$s)
					 	->or_like('tanggal_tercapai',$s)
					 	->or_like('jam_tercapai',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_by_pengguna[$data['order'][0]['column']],$data['order'][0]['dir']);

			if ($data['order'][0]['column'] == 2)
			{
				$this->db->order_by('jam_tercapai','ASC');
			}
		}
		else
		{
			$this->db->order_by('id_p_pencapaian','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db->select('id_p_pencapaian')
						   	->from('p_pencapaian')
						   	->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner')
								->count_all_results();
	}

	public function jumlah_untuk_limit($nama_pengguna)
	{
		return $this->db
								->select('id_p_pencapaian')
								->from('p_pencapaian')
					   		->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner')
								->where('pengguna', $nama_pengguna)
								->count_all_results();
	}

	public function jumlah_by_pengguna()
	{
		return $this->db->select('id_p_pencapaian')
						   	->from('p_pencapaian')
						   	->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner')
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

	public function cek_p_pencapaian($id_p_pencapaian)
	{
		return $this->db
								->select('id_p_pencapaian')
								->from('p_pencapaian')
								->where('id_p_pencapaian',$id_p_pencapaian)
								->get()
								->num_rows();
	}

	public function ambil_untuk_data_diri($nama_pengguna)
	{
		return $this->db->select('id_p_pencapaian,nama_pencapaian,gambar,tanggal_tercapai,jam_tercapai')
					   				->from('p_pencapaian')
					   				->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner')
					   				->where('pengguna',$nama_pengguna)
					   				->order_by('id_p_pencapaian','DESC')
					   				->limit(12)
					   				->get()
					   				->result();
	}

	public function ambil_untuk_data_diri_jumlah($nama_pengguna)
	{
		return $this->db->select('id_p_pencapaian,nama_pencapaian,gambar,tanggal_tercapai,jam_tercapai')
					   				->from('p_pencapaian')
					   				->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner')
					   				->where('pengguna',$nama_pengguna)
					   				->order_by('id_p_pencapaian','DESC')
					   				->get()
					   				->num_rows() > 12;
	}

	public function ambil_by_nama_pengguna_limit($nama_pengguna,$value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_untuk_limit($nama_pengguna);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->select('id_p_pencapaian,nama_pencapaian,gambar,tanggal_tercapai,jam_tercapai')
					   				->from('p_pencapaian')
					   				->join('pencapaian','pencapaian.id_pencapaian = p_pencapaian.id_pencapaian','inner')
					   				->where('pengguna',$nama_pengguna)
										->order_by('id_p_pencapaian','DESC')
										->limit($value, $offset)
										->get()
										->result();
	}
}