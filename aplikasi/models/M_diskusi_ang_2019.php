<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_diskusi_ang_2019 extends CI_Model
{
	private $kolom_order;
	private $kolom_order_by_pengguna;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order             = [NULL,'judul','status','penginput',NULL];
		$this->kolom_order_by_pengguna = [NULL,'judul','id_diskusi','status',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_diskusi,judul,slug,status,penginput')->from('diskusi');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('judul',$s)
					 	    ->or_like('penginput',$s)
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
								->select('id_diskusi')
								->from('diskusi')
								->count_all_results();
	}

	public function jumlah_untuk_limit($nama_pengguna)
	{
		return $this->db
								->select('id_diskusi')
								->from('diskusi')
								->where(['status' => 'aktif', 'penginput' => $nama_pengguna])
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

	// By Pengguna
	private function _perintah_datatable_by_pengguna($data)
	{
		$this->db->select('id_diskusi,judul,slug,tanggal_posting,jam_posting,status')
						 ->from('diskusi')
						 ->where('penginput',$this->session->ang_nama_pengguna);

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->group_start()
					 	 	  ->like('judul',$s)
					 	    ->or_like('penginput',$s)
					     ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_by_pengguna[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_diskusi','DESC');
		}
	}

	public function jumlah_tersortir_by_pengguna($data)
	{
		$this->_perintah_datatable_by_pengguna($data);

		return $this->db->get()->num_rows();
	}

	public function data_by_pengguna($data)
	{
		$this->_perintah_datatable_by_pengguna($data);

		if ($data['length'] != -1)
		{
			$this->db->limit($data['length'],$data['start']);
		}

		return $this->db->get()->result();
	}

	public function cek_diskusi($id_diskusi)
	{
		return $this->db
								->select('id_diskusi')
								->from('diskusi')
								->where('id_diskusi',$id_diskusi)
								->get()
								->num_rows();
	}

	public function ambil_status($id_diskusi)
	{
		return $this->db
								->select('status')
								->from('diskusi')
								->where('id_diskusi',$id_diskusi)
								->get()
								->row()
								->status;
	}

	public function ambil_slug($id_diskusi)
	{
		return $this->db
								->select('slug')
								->from('diskusi')
								->where('id_diskusi',$id_diskusi)
								->get()
								->row()
								->slug;
	}

	public function ambil($id_diskusi)
	{
		return $this->db
								->select('id_diskusi,slug,judul,tags,isi')
								->from('diskusi')
								->where('id_diskusi',$id_diskusi)
								->get()
								->row();
	}

	public function ambil_untuk_data_diri($nama_pengguna)
	{
		return $this->db
								->select('id_diskusi,judul,slug')
								->from('diskusi')
								->where(['status' => 'aktif','penginput' => $nama_pengguna])
								->order_by('id_diskusi','DESC')
								->limit(10)
								->get()
								->result();
	}

	public function ambil_untuk_data_diri_jumlah($nama_pengguna)
	{
		return $this->db
								->select('id_diskusi,judul,slug')
								->from('diskusi')
								->where(['status' => 'aktif','penginput' => $nama_pengguna])
								->order_by('id_diskusi','DESC')
								->get()
								->num_rows() > 10;
	}

	public function cek_akses($id_diskusi)
	{
		return $this->db
								->select('id_diskusi')
								->from('diskusi')
								->where(['id_diskusi' => $id_diskusi,'penginput' => $this->session->ang_nama_pengguna])
								->get()
								->num_rows();
	}

	public function jumlah_by_pengguna()
	{
		return $this->db
								->select('id_diskusi')
								->from('diskusi')
								->where('penginput',$this->session->ang_nama_pengguna)
								->get()
								->num_rows();
	}

	public function ambil_limit($value,$offset,$jumlah=NULL)
	{
		$value  = $this->db->escape_str($value);
		$offset = $this->db->escape_str($offset);

		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_yang_aktif();
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->query("
			SELECT id_diskusi,judul,slug,diskusi.isi,tanggal_posting,jam_posting,penginput,
			(
				SELECT COUNT(id_ds_diskusi)
				FROM {$this->db->dbprefix('ds_diskusi')}
			 	WHERE id_diskusi = diskusi.id_diskusi
			) AS jumlah_suka,
			(
				SELECT COUNT(id_j_diskusi)
				FROM {$this->db->dbprefix('j_diskusi')}
				WHERE id_diskusi = diskusi.id_diskusi
				AND diblok = 'N'
			) AS jumlah_jawaban
			FROM {$this->db->dbprefix('diskusi')} AS diskusi
			WHERE status = 'aktif'
			ORDER BY id_diskusi DESC
			LIMIT {$offset},{$value}
		")->result();
	}

	public function jumlah_yang_aktif()
	{
		return $this->db
								->select('id_diskusi')
								->from('diskusi')
								->where('status','aktif')
								->count_all_results();
	}

	public function ambil_limit_pencarian($pencarian,$value,$offset,$jumlah=NULL)
	{
		$pencarian = $this->db->escape_str($pencarian);
		$value     = $this->db->escape_str($value);
		$offset    = $this->db->escape_str($offset);

		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_pencarian_yang_aktif($pencarian);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->query("
			SELECT id_diskusi,judul,slug,diskusi.isi,tanggal_posting,jam_posting,penginput,
			(
				SELECT COUNT(id_ds_diskusi)
				FROM {$this->db->dbprefix('ds_diskusi')}
			 	WHERE id_diskusi = diskusi.id_diskusi
			) AS jumlah_suka,
			(
				SELECT COUNT(id_j_diskusi)
				FROM {$this->db->dbprefix('j_diskusi')}
				WHERE id_diskusi = diskusi.id_diskusi
				AND diblok = 'N'
			) AS jumlah_jawaban
			FROM {$this->db->dbprefix('diskusi')} AS diskusi
			WHERE status = 'aktif'
			AND judul LIKE '%{$pencarian}%'
			ORDER BY id_diskusi DESC
			LIMIT {$offset},{$value}
		")->result();
	}

	public function jumlah_pencarian_yang_aktif($pencarian)
	{
		return $this->db
								->select('id_diskusi')
								->from('diskusi')
								->where('status','aktif')
								->like('judul',$pencarian,'both')
								->count_all_results();
	}

	public function by_saring_ambil_limit_pencarian($saring,$pencarian,$value,$offset,$jumlah=NULL)
	{
		$saring    = $this->db->escape_str($saring);
		$pencarian = $this->db->escape_str($pencarian);
		$value     = $this->db->escape_str($value);
		$offset    = $this->db->escape_str($offset);

		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->by_saring_jumlah_pencarian_yang_aktif($saring,$pencarian);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		if ($saring == 'belum-dijawab')
		{
			return $this->db->query("
				SELECT id_diskusi,judul,slug,diskusi.isi,tanggal_posting,jam_posting,penginput,
				(
					SELECT COUNT(id_ds_diskusi)
					FROM {$this->db->dbprefix('ds_diskusi')}
				 	WHERE id_diskusi = diskusi.id_diskusi
				) AS jumlah_suka,
				(
					SELECT COUNT(id_j_diskusi)
					FROM {$this->db->dbprefix('j_diskusi')}
					WHERE id_diskusi = diskusi.id_diskusi
					AND diblok = 'N'
				) AS jumlah_jawaban
				FROM {$this->db->dbprefix('diskusi')} AS diskusi
				WHERE status = 'aktif'
				AND judul LIKE '%{$pencarian}%'
				HAVING jumlah_jawaban=0
				ORDER BY id_diskusi DESC
				LIMIT {$offset},{$value}
			")->result();
		}
		else
		{
			return $this->db->query("
				SELECT id_diskusi,judul,slug,diskusi.isi,tanggal_posting,jam_posting,penginput,
				(
					SELECT COUNT(id_ds_diskusi)
					FROM {$this->db->dbprefix('ds_diskusi')}
				 	WHERE id_diskusi = diskusi.id_diskusi
				) AS jumlah_suka,
				(
					SELECT COUNT(id_j_diskusi)
					FROM {$this->db->dbprefix('j_diskusi')}
					WHERE id_diskusi = diskusi.id_diskusi
					AND diblok = 'N'
				) AS jumlah_jawaban
				FROM {$this->db->dbprefix('diskusi')} AS diskusi
				WHERE status = 'aktif'
				AND judul LIKE '%{$pencarian}%'
				ORDER BY id_diskusi DESC
				LIMIT {$offset},{$value}
			")->result();
		}
	}

	public function by_saring_jumlah_pencarian_yang_aktif($saring,$pencarian)
	{
		if ($saring == 'belum-dijawab')
		{
			return $this->db
									->select('diskusi.id_diskusi,COUNT(id_j_diskusi) AS jumlah_jawaban')
									->from('diskusi')
									->join('j_diskusi','j_diskusi.id_diskusi = diskusi.id_diskusi','left')
									->where('status','aktif')
									->having('jumlah_jawaban',0)
									->like('judul',$pencarian,'both')
									->group_by('diskusi.id_diskusi')
									->count_all_results();
		}
		else
		{
			return $this->db
									->select('diskusi.id_diskusi,COUNT(id_ds_diskusi) AS jumlah_suka')
									->from('diskusi')
									->join('ds_diskusi','ds_diskusi.id_diskusi = diskusi.id_diskusi','left')
									->where('status','aktif')
									->like('judul',$pencarian,'both')
									->group_by('diskusi.id_diskusi')
									->count_all_results();
		}
	}

	public function by_saring_ambil_limit($saring,$value,$offset,$jumlah=NULL)
	{
		$saring = $this->db->escape_str($saring);
		$value  = $this->db->escape_str($value);
		$offset = $this->db->escape_str($offset);

		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->by_saring_jumlah_yang_aktif($saring);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		if ($saring == 'belum-dijawab')
		{
			return $this->db->query("
				SELECT id_diskusi,judul,slug,diskusi.isi,tanggal_posting,jam_posting,penginput,
				(
					SELECT COUNT(id_ds_diskusi)
					FROM {$this->db->dbprefix('ds_diskusi')}
				 	WHERE id_diskusi = diskusi.id_diskusi
				) AS jumlah_suka,
				(
					SELECT COUNT(id_j_diskusi)
					FROM {$this->db->dbprefix('j_diskusi')}
					WHERE id_diskusi = diskusi.id_diskusi
					AND diblok = 'N'
				) AS jumlah_jawaban
				FROM {$this->db->dbprefix('diskusi')} AS diskusi
				WHERE status = 'aktif'
				HAVING jumlah_jawaban = 0
				ORDER BY id_diskusi DESC
				LIMIT {$offset},{$value}
			")->result();
		}
		else
		{
			return $this->db->query("
				SELECT id_diskusi,judul,slug,diskusi.isi,tanggal_posting,jam_posting,penginput,
				(
					SELECT COUNT(id_ds_diskusi)
					FROM {$this->db->dbprefix('ds_diskusi')}
				 	WHERE id_diskusi = diskusi.id_diskusi
				) AS jumlah_suka,
				(
					SELECT COUNT(id_j_diskusi)
					FROM {$this->db->dbprefix('j_diskusi')}
					WHERE id_diskusi = diskusi.id_diskusi
					AND diblok = 'N'
				) AS jumlah_jawaban
				FROM {$this->db->dbprefix('diskusi')} AS diskusi
				WHERE status = 'aktif'
				ORDER BY jumlah_suka DESC
				LIMIT {$offset},{$value}
			")->result();
		}
	}

	public function by_saring_jumlah_yang_aktif($saring)
	{
		if ($saring == 'belum-dijawab')
		{
			return $this->db
									->select('diskusi.id_diskusi,COUNT(id_j_diskusi) AS jumlah_jawaban')
									->from('diskusi')
									->join('j_diskusi','j_diskusi.id_diskusi = diskusi.id_diskusi','left')
									->where('status','aktif')
									->having('jumlah_jawaban',0)
									->group_by('diskusi.id_diskusi')
									->count_all_results();
		}
		else
		{
			return $this->db
									->select('diskusi.id_diskusi,COUNT(id_ds_diskusi) AS jumlah_suka')
									->from('diskusi')
									->join('ds_diskusi','ds_diskusi.id_diskusi = diskusi.id_diskusi','left')
									->where('status','aktif')
									->group_by('diskusi.id_diskusi')
									->count_all_results();
		}
	}

	public function cek_url_valid($id_diskusi,$slug_url)
	{
		return $this->db
								->select('id_diskusi')
								->from('diskusi')
								->where(['id_diskusi' => $id_diskusi, 'slug' => $slug_url, 'status' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_lihat_diskusi($id_diskusi)
	{
		return $this->db
								->select('diskusi.id_diskusi,judul,slug,tags,isi,tanggal_posting,jam_posting,penginput,COUNT(id_ds_diskusi) AS jumlah_suka')
								->from('diskusi')
								->join('ds_diskusi','ds_diskusi.id_diskusi = diskusi.id_diskusi','left')
								->where(['diskusi.id_diskusi' => $id_diskusi,'status' => 'aktif'])
								->group_by(['diskusi.id_diskusi','diskusi.judul','diskusi.slug','diskusi.tags','diskusi.isi','diskusi.tanggal_posting','diskusi.jam_posting','diskusi.penginput'])
								->get()
								->row();
	}

	public function cek_kesamaan_nama_pengguna($id_diskusi)
	{
		return $this->db->select('id_diskusi')->from('diskusi')->where(['id_diskusi' => $id_diskusi,'penginput' => $this->session->ang_nama_pengguna])->get()->num_rows();
	}

	public function ambil_penginput($id_diskusi)
	{
		return $this->db
								->select('penginput')
								->from('diskusi')
								->where('id_diskusi',$id_diskusi)
								->get()
								->row()
								->penginput;
	}

	public function ambil_judul($id_diskusi)
	{
		return $this->db
								->select('judul')
								->from('diskusi')
								->where('id_diskusi',$id_diskusi)
								->get()
								->row()
								->judul;
	}

	public function cek_valid_pengurus_preview_diskusi($id_diskusi)
	{
		return $this->db
								->select('id_diskusi,judul,slug,tags,isi,tanggal_posting,jam_posting,penginput')
								->from('diskusi')
								->where(['id_diskusi' => $id_diskusi,'status <>' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_pengurus_preview_diskusi($id_diskusi)
	{
		return $this->db
								->select('id_diskusi,judul,slug,tags,isi,tanggal_posting,jam_posting,penginput')
								->from('diskusi')
								->where(['id_diskusi' => $id_diskusi,'status <>' => 'aktif'])
								->get()
								->row();
	}

	public function cek_valid_anggota_preview_diskusi($id_diskusi)
	{
		return $this->db
								->select('id_diskusi,judul,slug,tags,isi,tanggal_posting,jam_posting,penginput')
								->from('diskusi')
								->where(['id_diskusi' => $id_diskusi,'status <>' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_anggota_preview_diskusi($id_diskusi)
	{
		return $this->db
								->select('id_diskusi,judul,slug,tags,isi,tanggal_posting,jam_posting,penginput')
								->from('diskusi')
								->where(['id_diskusi' => $id_diskusi,'status <>' => 'aktif'])
								->get()
								->row();
	}

	public function ambil_by_nama_pengguna_limit($nama_pengguna,$value,$offset,$jumlah=NULL)
	{
		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_untuk_limit($nama_pengguna);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->select('id_diskusi,judul,slug,tanggal_posting,jam_posting')
										->from('diskusi')
										->where(['status' => 'aktif', 'penginput' => $nama_pengguna])
										->order_by('id_diskusi','DESC')
										->limit($value, $offset)
										->get()
										->result();
	}

	public function untuk_sitemap()
	{
		return $this->db->select('*')->from('diskusi')->where(['status' => 'aktif'])->order_by('id_diskusi','ASC')->get()->result();
	}
}
