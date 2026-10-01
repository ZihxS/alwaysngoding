<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_sertifikat_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'nama_sertifikat',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_sertifikat,nama_sertifikat')->from('sertifikat');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->like('nama_sertifikat',$s);
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_sertifikat','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_sertifikat')
								->from('sertifikat')
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

	public function cek_sertifikat($id_sertifikat)
	{
		return $this->db
								->select('id_sertifikat')
								->from('sertifikat')
								->where('id_sertifikat',$id_sertifikat)
								->get()
								->num_rows();
	}

	public function ambil($id_sertifikat)
	{
		return $this->db
								->select('*')
								->from('sertifikat')
								->where('id_sertifikat',$id_sertifikat)
								->get()
								->row();
	}

	public function ambil_untuk_select()
	{
		return $this->db
								->select('id_sertifikat,nama_sertifikat')
								->from('sertifikat')
								->get()
								->result();
	}

	public function ambil_nama_sertifikat($id_sertifikat)
	{
		return $this->db
								->select('nama_sertifikat')
								->from('sertifikat')
								->where('id_sertifikat',$id_sertifikat)
								->get()
								->row()
								->nama_sertifikat;
	}
}