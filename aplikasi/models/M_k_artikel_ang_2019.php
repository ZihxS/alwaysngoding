<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Komentar Artikel
class M_k_artikel_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'id_artikel','pengguna','diblok',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_k_artikel,id_artikel,pengguna,diblok')->from('k_artikel');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
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
			$this->db->order_by('id_artikel','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_k_artikel')
								->from('k_artikel')
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

	public function cek_k_artikel($id_k_artikel)
	{
		return $this->db
								->select('id_k_artikel')
								->from('k_artikel')
								->where('id_k_artikel',$id_k_artikel)
								->get()
								->num_rows();
	}

	public function cek_akses($id_k_artikel)
	{
		return $this->db
								->select('id_k_artikel')
								->from('k_artikel')
								->where(['id_k_artikel' => $id_k_artikel,'pengguna' => $this->session->ang_nama_pengguna])
								->get()
								->num_rows();
	}

	public function cek_jumlah($id_artikel)
	{
		return $this->db
								->select('id_artikel')
								->from('k_artikel')
								->where(['id_artikel' => $id_artikel,'diblok' => 'N'])
								->get()
								->num_rows();
	}

	public function ambil_limit($id_artikel,$value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->cek_jumlah($id_artikel);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db
								->select('id_k_artikel,id_artikel,k_artikel.pengguna,isi,k_artikel.tanggal,k_artikel.jam,COUNT(id_dsk_artikel) AS jumlah_suka')
								->from('k_artikel')
								->join('dsk_artikel','dsk_artikel.id_komentar = k_artikel.id_k_artikel','left')
								->where(['id_artikel' => $id_artikel,'diblok' => 'N'])
								->group_by(['k_artikel.id_k_artikel','k_artikel.id_artikel','k_artikel.pengguna','k_artikel.isi','k_artikel.tanggal','k_artikel.jam'])
								->order_by('id_k_artikel','DESC')
								->limit($value,$offset)
								->get()
								->result();
	}

	public function cek_kesamaan_nama_pengguna($id_k_artikel)
	{
		return $this->db->select('id_k_artikel')->from('k_artikel')->where(['id_k_artikel' => $id_k_artikel,'pengguna' => $this->session->ang_nama_pengguna])->get()->num_rows();
	}

	public function ambil_isi($id_k_artikel)
	{
		return $this->db
								->select('isi')
								->from('k_artikel')
								->where('id_k_artikel',$id_k_artikel)
								->get()
								->row()
								->isi;
	}

	public function ambil_pengguna($id_k_artikel)
	{
		return $this->db
								->select('pengguna')
								->from('k_artikel')
								->where('id_k_artikel',$id_k_artikel)
								->get()
								->row()
								->pengguna;
	}

	public function ambil_id_artikel($id_k_artikel)
	{
		return $this->db
								->select('id_artikel')
								->from('k_artikel')
								->where('id_k_artikel',$id_k_artikel)
								->get()
								->row()
								->id_artikel;
	}

	public function ambil_untuk_sebar_notifikasi($id_artikel)
	{
		return $this->db
								->distinct()
								->select('pengguna')
								->from('k_artikel')
								->where('id_artikel', $id_artikel)
								->get()
								->result();
	}
}
