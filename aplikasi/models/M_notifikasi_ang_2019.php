<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();
	}

	public function jumlah()
	{
		return $this->db
								->select('id_notifikasi')
								->from('notifikasi')
								->count_all_results();
	}

	public function jumlah_untuk_limit()
	{
		return $this->db
								->select('id_notifikasi')
								->from('notifikasi')
								->where('untuk',$this->session->ang_nama_pengguna)
								->count_all_results();
	}

	public function ambil_semua($nama_pengguna)
	{
		return ($nama_pengguna !== NULL) ? $this->db->select('*')->from('notifikasi')->where('untuk',$nama_pengguna)->get()->result() : [];
	}

	public function ambil_terbaru($nama_pengguna)
	{
		return ($nama_pengguna !== NULL) ? $this->db->select('*')->from('notifikasi')->where(['untuk' => $nama_pengguna,'baru' => 'Y'])->get()->result() : [];
	}

	public function input($untuk,$konten,$link=NULL)
	{
		if ($link != NULL)
		{
			$link = site_url($link);
		}

		$this->db->insert('notifikasi', [
			'untuk'         => $untuk,
			'konten'        => $konten,
			'link'          => $link,
			'tanggal_waktu' => $this->ang->sekarang(),
			'baru'          => 'Y'
		]);
	}

	public function ambil_limit($value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_untuk_limit();
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->select('*')
										->from('notifikasi')
										->where('untuk',$this->session->ang_nama_pengguna)
										->order_by('id_notifikasi','DESC')
										->limit($value, $offset)
										->get()
										->result();
	}
}