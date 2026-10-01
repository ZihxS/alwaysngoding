<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Jawaban Disuksi
class M_j_diskusi_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order = [NULL,'id_diskusi','pengguna','diblok',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_j_diskusi,id_diskusi,pengguna,diblok')->from('j_diskusi');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('id_diskusi',$s)
					 	->or_like('pengguna',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_diskusi','DESC');
		}
	}

	public function jumlah()
	{
		return $this->db
								->select('id_j_diskusi')
								->from('j_diskusi')
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

	public function cek_j_diskusi($id_j_diskusi)
	{
		return $this->db
								->select('id_j_diskusi')
								->from('j_diskusi')
								->where('id_j_diskusi',$id_j_diskusi)
								->get()
								->num_rows();
	}

	public function cek_akses($id_j_diskusi)
	{
		return $this->db
								->select('id_j_diskusi')
								->from('j_diskusi')
								->where(['id_j_diskusi' => $id_j_diskusi,'pengguna' => $this->session->ang_nama_pengguna])
								->get()
								->num_rows();
	}

	public function cek_jumlah($id_diskusi)
	{
		return $this->db
								->select('id_diskusi')
								->from('j_diskusi')
								->where(['id_diskusi' => $id_diskusi,'diblok' => 'N'])
								->get()
								->num_rows();
	}

	public function ambil_limit($id_diskusi,$value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->cek_jumlah($id_diskusi);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db
								->select('id_j_diskusi,id_diskusi,j_diskusi.pengguna,isi,j_diskusi.tanggal,j_diskusi.jam,COUNT(id_dsjd) AS jumlah_suka')
								->from('j_diskusi')
								->join('dsjd','dsjd.id_jawaban = j_diskusi.id_j_diskusi','left')
								->where(['id_diskusi' => $id_diskusi,'diblok' => 'N'])
								->group_by(['j_diskusi.id_j_diskusi','j_diskusi.id_diskusi','j_diskusi.pengguna','j_diskusi.isi','j_diskusi.tanggal','j_diskusi.jam'])
								->order_by('id_j_diskusi','ASC')
								->limit($value,$offset)
								->get()
								->result();
	}

	public function cek_kesamaan_nama_pengguna($id_j_diskusi)
	{
		return $this->db->select('id_j_diskusi')->from('j_diskusi')->where(['id_j_diskusi' => $id_j_diskusi,'pengguna' => $this->session->ang_nama_pengguna])->get()->num_rows();
	}

	public function ambil_isi($id_j_diskusi)
	{
		return $this->db
								->select('isi')
								->from('j_diskusi')
								->where('id_j_diskusi',$id_j_diskusi)
								->get()
								->row()
								->isi;
	}

	public function ambil_pengguna($id_j_diskusi)
	{
		return $this->db
								->select('pengguna')
								->from('j_diskusi')
								->where('id_j_diskusi',$id_j_diskusi)
								->get()
								->row()
								->pengguna;
	}

	public function ambil_id_diskusi($id_j_diskusi)
	{
		return $this->db
								->select('id_diskusi')
								->from('j_diskusi')
								->where('id_j_diskusi',$id_j_diskusi)
								->get()
								->row()
								->id_diskusi;
	}

	public function ambil_untuk_sebar_notifikasi($id_diskusi)
	{
		return $this->db
								->distinct()
								->select('pengguna')
								->from('j_diskusi')
								->where('id_diskusi', $id_diskusi)
								->get()
								->result();
	}
}
