<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_verif_akun_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();
	}

	public function cek_token($token)
	{
		return $this->db
								->select('id_verif_akun')
								->from('verif_akun')
								->where('token',$token)
								->get()
								->num_rows();
	}

	public function ambil_pengguna($token)
	{
		return $this->db
								->select('pengguna')
								->from('verif_akun')
								->where('token',$token)
								->get()
								->row()
								->pengguna;
	}

	public function hapus_data_kadaluarsa()
	{
		$sekarang = date('Y-m-d');
		$this->db->query("DELETE FROM {$this->db->dbprefix('verif_akun')} WHERE nama_pengguna IN (SELECT pengguna FROM {$this->db->dbprefix('verif_akun')} WHERE tanggal_kadaluarsa <= '$sekarang')");
	}
}
