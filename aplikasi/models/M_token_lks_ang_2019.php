<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_token_lks_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();
	}

	public function cek_token($token)
	{
		return $this->db
								->select('id_token_lks')
								->from('token_lks')
								->where('token',$token)
								->get()
								->num_rows();
	}

	public function cek_token_by_pengguna($pengguna)
	{
		return $this->db
								->select('id_token_lks')
								->from('token_lks')
								->where('pengguna',$pengguna)
								->get()
								->num_rows();
	}

	public function ambil_pengguna($token)
	{
		return $this->db
								->select('pengguna')
								->from('token_lks')
								->where('token',$token)
								->get()
								->row()
								->pengguna;
	}

	public function hapus_data_kadaluarsa()
	{
		$this->db->delete('token_lks',['tanggal_kadaluarsa <=' => date('Y-m-d')]);
	}
}
