<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_link_iklan_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'deskripsi','tujuan','premium',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_link_iklan,hash,deskripsi,tujuan,premium')->from('link_iklan');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('deskripsi',$s)
					 	->or_like('tujuan',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_link_iklan','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_link_iklan')
								->from('link_iklan')
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

	public function cek_link_iklan($id_link_iklan)
	{
		return $this->db
								->select('id_link_iklan')
								->from('link_iklan')
								->where('id_link_iklan',$id_link_iklan)
								->get()
								->num_rows();
	}

	public function ambil($id_link_iklan)
	{
		return $this->db
								->select('id_link_iklan,deskripsi,tujuan,premium')
								->from('link_iklan')
								->where('id_link_iklan',$id_link_iklan)
								->get()
								->row();
	}

	public function ambil_by_hash($hash)
	{
		return $this->db
								->select('id_link_iklan,deskripsi,tujuan,premium')
								->from('link_iklan')
								->where('hash',$hash)
								->get()
								->row();
	}

	public function ambil_link_asli_by_hash($hash)
	{
		if ($this->input->post())
		{
			return $this->db
									->select('tujuan')
									->from('link_iklan')
									->where('hash',$hash)
									->get()
									->row()
									->tujuan;
		}

		return site_url();
	}
}