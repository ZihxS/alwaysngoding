<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_iklan_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'penempatan','link_tujuan','kontak_pengiklan','jatuh_tempo',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('*')->from('iklan');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('penempatan',$s)
					 	    ->or_like('kontak_pengiklan',$s)
					 	    ->or_like('jatuh_tempo',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_iklan','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_iklan')
								->from('iklan')
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

	public function cek_iklan($id_iklan)
	{
		return $this->db
								->select('id_iklan')
								->from('iklan')
								->where('id_iklan',$id_iklan)
								->get()
								->num_rows();
	}

	public function ambil_gambar($id_iklan)
	{
		return $this->db
								->select('gambar')
								->from('iklan')
								->where('id_iklan',$id_iklan)
								->get()
								->row()
								->gambar;
	}

	public function ambil($id_iklan)
	{
		return $this->db
								->select('*')
								->from('iklan')
								->where('id_iklan',$id_iklan)
								->get()
								->row();
	}

	public function ambil_iklan_untuk_ditampilkan($penempatan)
	{
		return $this->db->query("SELECT gambar, link_tujuan FROM {$this->db->dbprefix('iklan')} WHERE penempatan LIKE '%{$penempatan}%' AND jatuh_tempo >= CURRENT_DATE() ORDER BY RAND() LIMIT 1")->row();
	}
}