<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Data Suka Artikel
class M_ds_artikel_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'id_artikel','pengguna','id_ds_artikel',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('*')->from('ds_artikel');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('id_artikel',$s)
					 	    ->or_like('pengguna',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_ds_artikel','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_ds_artikel')
								->from('ds_artikel')
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

	public function cek_ds_artikel($id_ds_artikel)
	{
		return $this->db
								->select('id_ds_artikel')
								->from('ds_artikel')
								->where('id_ds_artikel',$id_ds_artikel)
								->get()
								->num_rows();
	}

	public function cek_apakah_sudah_menyukai($id_artikel)
	{
		return $this->db
								->select('id_ds_artikel')
								->from('ds_artikel')
								->where(['id_artikel' => $id_artikel,'pengguna' => $this->session->ang_nama_pengguna])
								->get()
								->num_rows();
	}
}