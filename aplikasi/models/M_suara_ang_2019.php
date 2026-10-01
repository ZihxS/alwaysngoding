<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_suara_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'pengguna','isi','status',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('*')->from('suara');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('pengguna',$s)
					 	    ->or_like('isi',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_suara','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_suara')
								->from('suara')
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

	public function cek_suara($id_suara)
	{
		return $this->db
								->select('id_suara')
								->from('suara')
								->where('id_suara',$id_suara)
								->get()
								->num_rows();
	}

	public function ambil_status($id_suara)
	{
		return $this->db
								->select('status')
								->from('suara')
								->where('id_suara',$id_suara)
								->get()
								->row()
								->status;
	}

	public function cek_sudah_bersuara_atau_belum()
	{
		return $this->db->select('id_suara')->from('suara')->where('pengguna',$this->session->ang_nama_pengguna)->get()->num_rows() == 1;
	}

	public function ambil_data_suara()
	{
		return $this->db
								->select('isi,status')
								->from('suara')
								->where('pengguna',$this->session->ang_nama_pengguna)
								->get()
								->row();
	}
}