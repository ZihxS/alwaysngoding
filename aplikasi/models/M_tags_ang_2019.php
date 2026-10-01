<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_tags_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();
	}

	public function cek_tags($tags)
	{
		return $this->db->select('*')->from('tags')->where('tags',$tags)->get()->num_rows();
	}

	public function ambil_tags()
	{
		return $this->db->get('tags')->result();
	}

	// Hapus Tags Jika Tidak Terpakai
	public function htjtt($tags)
	{
		$q1 = $this->db->select('id_artikel')->from('artikel')->like('tags',$tags,'both')->get()->num_rows();
		$q2 = $this->db->select('id_diskusi')->from('diskusi')->like('tags',$tags,'both')->get()->num_rows();

		if ($q1 == 0 && $q2 == 0)
		{
			$this->db->delete('tags',['tags' => $tags]);
		}
	}
}