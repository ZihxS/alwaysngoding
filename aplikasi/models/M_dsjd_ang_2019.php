<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Data Suka Jawaban Diskusi
class M_dsjd_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'id_jawaban','pengguna','id_dsjd',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('*')->from('dsjd');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('id_jawaban',$s)
					 	    ->or_like('pengguna',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_dsjd','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_dsjd')
								->from('dsjd')
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

	public function cek_dsjd($id_dsjd)
	{
		return $this->db
								->select('id_dsjd')
								->from('dsjd')
								->where('id_dsjd',$id_dsjd)
								->get()
								->num_rows();
	}

	public function cek_apakah_sudah_menyukai($id_jawaban)
	{
		return $this->db
								->select('id_dsjd')
								->from('dsjd')
								->where(['id_jawaban' => $id_jawaban,'pengguna' => $this->session->ang_nama_pengguna])
								->get()
								->num_rows();
	}
}