<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_riwayat_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'konten','id_riwayat'];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_riwayat,konten,tanggal_waktu')->from('riwayat');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('konten',$s)
					 	    ->or_like('tanggal_waktu',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_riwayat','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_riwayat')
								->from('riwayat')
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
}