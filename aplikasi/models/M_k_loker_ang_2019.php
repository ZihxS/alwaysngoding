<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Komentar Loker
class M_k_loker_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'id_loker','pengguna','diblok',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_k_loker,id_loker,pengguna,diblok')->from('k_loker');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('id_loker',$s)
					 	->or_like('pengguna',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_loker','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_k_loker')
								->from('k_loker')
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

	public function cek_k_loker($id_k_loker)
	{
		return $this->db
								->select('id_k_loker')
								->from('k_loker')
								->where('id_k_loker',$id_k_loker)
								->get()
								->num_rows();
	}

	public function cek_jumlah($id_loker)
	{
		return $this->db
								->select('id_loker')
								->from('k_loker')
								->where(['id_loker' => $id_loker,'diblok' => 'N'])
								->get()
								->num_rows();
	}

	public function ambil_limit($id_loker,$value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->cek_jumlah($id_loker);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db
								->select('id_k_loker,id_loker,k_loker.pengguna,isi,k_loker.tanggal,k_loker.jam,COUNT(id_dsk_loker) AS jumlah_suka')
								->from('k_loker')
								->join('dsk_loker','dsk_loker.id_komentar = k_loker.id_k_loker','left')
								->where(['id_loker' => $id_loker,'diblok' => 'N'])
								->group_by(['k_loker.id_k_loker','k_loker.id_loker','k_loker.pengguna','k_loker.isi','k_loker.tanggal','k_loker.jam'])
								->order_by('id_k_loker','DESC')
								->limit($value,$offset)
								->get()
								->result();
	}

	public function cek_kesamaan_nama_pengguna($id_k_loker)
	{
		return $this->db->select('id_k_loker')->from('k_loker')->where(['id_k_loker' => $id_k_loker,'pengguna' => $this->session->ang_nama_pengguna])->get()->num_rows();
	}

	public function ambil_isi($id_k_loker)
	{
		return $this->db
								->select('isi')
								->from('k_loker')
								->where('id_k_loker',$id_k_loker)
								->get()
								->row()
								->isi;
	}

	public function ambil_pengguna($id_k_loker)
	{
		return $this->db
								->select('pengguna')
								->from('k_loker')
								->where('id_k_loker',$id_k_loker)
								->get()
								->row()
								->pengguna;
	}

	public function ambil_id_loker($id_k_loker)
	{
		return $this->db
								->select('id_loker')
								->from('k_loker')
								->where('id_k_loker',$id_k_loker)
								->get()
								->row()
								->id_loker;
	}

	public function ambil_untuk_sebar_notifikasi($id_loker)
	{
		return $this->db
								->distinct()
								->select('pengguna')
								->from('k_loker')
								->where('id_loker', $id_loker)
								->get()
								->result();
	}
}
