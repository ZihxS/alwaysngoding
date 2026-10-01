<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pencapaian_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'nama_pencapaian','tipe','target',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_pencapaian,nama_pencapaian,gambar,tipe,target')->from('pencapaian');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->like('nama_pencapaian',$s);
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_pencapaian','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_pencapaian')
								->from('pencapaian')
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

	public function cek_pencapaian($id_pencapaian)
	{
		return $this->db
								->select('id_pencapaian')
								->from('pencapaian')
								->where('id_pencapaian',$id_pencapaian)
								->get()
								->num_rows();
	}

	public function ambil_gambar($id_pencapaian)
	{
		return $this->db
								->select('gambar')
								->from('pencapaian')
								->where('id_pencapaian',$id_pencapaian)
								->get()
								->row()
								->gambar;
	}

	public function ambil($id_pencapaian)
	{
		return $this->db
								->select('*')
								->from('pencapaian')
								->where('id_pencapaian',$id_pencapaian)
								->get()
								->row();
	}

	public function ambil_untuk_select()
	{
		return $this->db
								->select('id_pencapaian, nama_pencapaian')
								->from('pencapaian')
								->get()
								->result();
	}
}