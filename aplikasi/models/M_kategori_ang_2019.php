<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'kategori',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('kategori')->from('kategori');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->like('kategori',$s);
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('kategori','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('kategori')
								->from('kategori')
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

	public function ambil_data()
	{
		return $this->db->get('kategori')->result();
	}

	public function cek_kategori($kategori)
	{
		return $this->db
								->select('kategori')
								->from('kategori')
								->where('kategori',$kategori)
								->get()
								->num_rows();
	}

	public function untuk_sitemap()
	{
		return $this->db->select('kategori')->from('kategori')->order_by('kategori','ASC')->get()->result();
	}
}