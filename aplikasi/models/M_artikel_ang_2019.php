<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_artikel_ang_2019 extends CI_Model
{
	private $kolom_order;
	private $kolom_order_by_pengguna;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order             = [NULL,'judul','status','penginput',NULL];
		$this->kolom_order_by_pengguna = [NULL,'judul','kategori','id_artikel','status',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_artikel,judul,slug,status,penginput')->from('artikel');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->like('judul',$s);
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
								->select('id_artikel')
								->from('artikel')
								->count_all_results();
	}

	public function jumlah_untuk_limit($nama_pengguna)
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where(['status' => 'aktif', 'penginput' => $nama_pengguna])
								->count_all_results();
	}

	public function jumlah_yang_aktif()
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where('status','aktif')
								->count_all_results();
	}

	public function jumlah_by_kategori_yang_aktif($kategori)
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where(['kategori' => $kategori,'status' => 'aktif'])
								->count_all_results();
	}

	public function jumlah_pencarian_yang_aktif($pencarian)
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where('status','aktif')
								->like('judul',$pencarian,'both')
								->count_all_results();
	}

	public function jumlah_by_kategori_pencarian_yang_aktif($kategori,$pencarian)
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where(['kategori' => $kategori,'status' => 'aktif'])
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
		$this->db->select('id_artikel,judul,slug,kategori,tanggal_posting,jam_posting,status')
						 ->from('artikel')
						 ->where('penginput',$this->session->ang_nama_pengguna);

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db->like('judul',$s);
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_by_pengguna[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_artikel','DESC');
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

	public function cek_artikel($id_artikel)
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where('id_artikel',$id_artikel)
								->get()
								->num_rows();
	}

	public function ambil($id_artikel)
	{
		return $this->db
								->select('id_artikel,slug,judul,kategori,tags,isi,status')
								->from('artikel')
								->where('id_artikel',$id_artikel)
								->get()
								->row();
	}

	public function ambil_untuk_data_diri($nama_pengguna)
	{
		return $this->db
								->select('id_artikel,judul,slug')
								->from('artikel')
								->where(['status' => 'aktif','penginput' => $nama_pengguna])
								->order_by('id_artikel','DESC')
								->limit(10)
								->get()
								->result();
	}

	public function ambil_untuk_data_diri_jumlah($nama_pengguna)
	{
		return $this->db
								->select('id_artikel,judul,slug')
								->from('artikel')
								->where(['status' => 'aktif','penginput' => $nama_pengguna])
								->order_by('id_artikel','DESC')
								->get()
								->num_rows() > 10;
	}

	public function jumlah_by_pengguna()
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where('penginput',$this->session->ang_nama_pengguna)
								->get()
								->num_rows();
	}

	public function cek_akses_artikel_pengguna($id_artikel)
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where(['id_artikel' => $id_artikel,'penginput' => $this->session->ang_nama_pengguna])
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
			SELECT id_artikel,thumb,judul,slug,kategori,artikel.isi,tanggal_posting,jam_posting,
			(
				SELECT COUNT(id_ds_artikel)
				FROM {$this->db->dbprefix('ds_artikel')}
			 	WHERE id_artikel = artikel.id_artikel
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_artikel)
				FROM {$this->db->dbprefix('k_artikel')}
				WHERE id_artikel = artikel.id_artikel
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('artikel')} AS artikel
			WHERE status = 'aktif'
			ORDER BY id_artikel DESC
			LIMIT {$offset},{$value}
		")->result();
	}

	public function by_kategori_ambil_limit($kategori,$value,$offset,$jumlah=NULL)
	{
		$kategori = $this->db->escape_str($kategori);
		$value    = $this->db->escape_str($value);
		$offset   = $this->db->escape_str($offset);

		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_by_kategori_yang_aktif($kategori);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->query("
			SELECT id_artikel,thumb,judul,slug,kategori,artikel.isi,tanggal_posting,jam_posting,
			(
				SELECT COUNT(id_ds_artikel)
				FROM {$this->db->dbprefix('ds_artikel')}
				WHERE id_artikel = artikel.id_artikel
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_artikel)
				FROM {$this->db->dbprefix('k_artikel')}
				WHERE id_artikel = artikel.id_artikel
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('artikel')} AS artikel
			WHERE kategori = '{$kategori}'
			AND status = 'aktif'
			ORDER BY id_artikel DESC
			LIMIT {$offset},{$value}
		")->result();
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
			SELECT id_artikel,thumb,judul,slug,kategori,artikel.isi,tanggal_posting,jam_posting,
			(
				SELECT COUNT(id_ds_artikel)
				FROM {$this->db->dbprefix('ds_artikel')}
				WHERE id_artikel = artikel.id_artikel
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_artikel)
				FROM {$this->db->dbprefix('k_artikel')}
				WHERE id_artikel = artikel.id_artikel
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('artikel')} AS artikel
			WHERE status = 'aktif'
			AND judul LIKE '%{$pencarian}%'
			ORDER BY id_artikel DESC
			LIMIT {$offset},{$value}
		")->result();
	}

	public function by_kategori_ambil_limit_pencarian($kategori,$pencarian,$value,$offset,$jumlah=NULL)
	{
		$kategori  = $this->db->escape_str($kategori);
		$pencarian = $this->db->escape_str($pencarian);
		$value     = $this->db->escape_str($value);
		$offset    = $this->db->escape_str($offset);

		if ($jumlah !== NULL)
		{
			$jumlah_sekarang  = $this->jumlah_by_kategori_pencarian_yang_aktif($kategori,$pencarian);
			$perbedaan_jumlah = $jumlah_sekarang-$jumlah;
			$offset           = $perbedaan_jumlah > 0 ? $offset+$perbedaan_jumlah : $offset;
		}

		return $this->db->query("
			SELECT id_artikel,thumb,judul,slug,kategori,artikel.isi,tanggal_posting,jam_posting,
			(
				SELECT COUNT(id_ds_artikel)
				FROM {$this->db->dbprefix('ds_artikel')}
				WHERE id_artikel = artikel.id_artikel
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_artikel)
				FROM {$this->db->dbprefix('k_artikel')}
				WHERE id_artikel = artikel.id_artikel
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('artikel')} AS artikel
			WHERE kategori = '{$kategori}'
			AND status = 'aktif'
			AND judul LIKE '%{$pencarian}%'
			ORDER BY id_artikel DESC
			LIMIT {$offset},{$value}
		")->result();
	}

	public function cek_url_valid($id_artikel,$slug_url)
	{
		return $this->db
								->select('id_artikel')
								->from('artikel')
								->where(['id_artikel' => $id_artikel, 'slug' => $slug_url, 'status' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_lihat_artikel($id_artikel)
	{
		return $this->db
								->select('artikel.id_artikel,thumb,judul,slug,tags,kategori,isi,tanggal_posting,jam_posting,penginput,COUNT(id_ds_artikel) AS jumlah_suka')
								->from('artikel')
								->join('ds_artikel','ds_artikel.id_artikel = artikel.id_artikel','left')
								->where(['artikel.id_artikel' => $id_artikel,'status' => 'aktif'])
								->group_by(['artikel.id_artikel','artikel.judul','artikel.slug','artikel.tags','artikel.kategori','artikel.isi','artikel.tanggal_posting','artikel.jam_posting','artikel.penginput'])
								->get()
								->row();
	}

	public function cek_kesamaan_nama_pengguna($id_artikel)
	{
		return $this->db->select('id_artikel')->from('artikel')->where(['id_artikel' => $id_artikel,'penginput' => $this->session->ang_nama_pengguna])->get()->num_rows();
	}

	public function artikel_lainnya_by_kategori($id_artikel_yang_dilihat,$kategori)
	{
		$id_artikel_yang_dilihat = $this->db->escape_str($id_artikel_yang_dilihat);
		$kategori                = $this->db->escape_str($kategori);

		return $this->db->query("
			SELECT id_artikel,thumb,judul,slug,kategori,artikel.isi,tanggal_posting,jam_posting,
			(
				SELECT COUNT(id_ds_artikel)
				FROM {$this->db->dbprefix('ds_artikel')}
				WHERE id_artikel = artikel.id_artikel
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_artikel)
				FROM {$this->db->dbprefix('k_artikel')}
				WHERE id_artikel = artikel.id_artikel
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('artikel')} AS artikel
			WHERE id_artikel <> '{$id_artikel_yang_dilihat}'
			AND kategori = '{$kategori}'
			AND status='aktif'
			ORDER BY RAND()
			LIMIT 3
		");
	}

	public function artikel_lainnya_by_tags($id_artikel_yang_dilihat,$tags,$ignore)
	{
		$not_in                  = implode(', ',$ignore);
		$id_artikel_yang_dilihat = $this->db->escape_str($id_artikel_yang_dilihat);
		$tags                    = $this->db->escape_str($tags);

		return $this->db->query("
			SELECT id_artikel,thumb,judul,slug,kategori,artikel.isi,tanggal_posting,jam_posting,
			(
				SELECT COUNT(id_ds_artikel)
				FROM {$this->db->dbprefix('ds_artikel')}
				WHERE id_artikel = artikel.id_artikel
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_artikel)
				FROM {$this->db->dbprefix('k_artikel')}
				WHERE id_artikel = artikel.id_artikel
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('artikel')} AS artikel
			WHERE id_artikel <> '{$id_artikel_yang_dilihat}'
			AND status = 'aktif'
			AND id_artikel NOT IN($not_in)
			AND tags LIKE '%{$tags}%'
			ORDER BY RAND()
			LIMIT 3
		");
	}

	public function ambil_slug($id_artikel)
	{
		return $this->db
								->select('slug')
								->from('artikel')
								->where('id_artikel',$id_artikel)
								->get()
								->row()
								->slug;
	}

	public function ambil_penginput($id_artikel)
	{
		return $this->db
								->select('penginput')
								->from('artikel')
								->where('id_artikel',$id_artikel)
								->get()
								->row()
								->penginput;
	}

	public function ambil_judul($id_artikel)
	{
		return $this->db
								->select('judul')
								->from('artikel')
								->where('id_artikel',$id_artikel)
								->get()
								->row()
								->judul;
	}

	public function cek_valid_pengurus_preview_artikel($id_artikel)
	{
		return $this->db
								->select('id_artikel,judul,slug,tags,kategori,isi,tanggal_posting,jam_posting,penginput')
								->from('artikel')
								->where(['id_artikel' => $id_artikel,'status <>' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_pengurus_preview_artikel($id_artikel)
	{
		return $this->db
								->select('id_artikel,judul,slug,tags,kategori,isi,tanggal_posting,jam_posting,penginput')
								->from('artikel')
								->where(['id_artikel' => $id_artikel,'status <>' => 'aktif'])
								->get()
								->row();
	}

	public function cek_valid_anggota_preview_artikel($id_artikel)
	{
		return $this->db
								->select('id_artikel,judul,slug,tags,kategori,isi,tanggal_posting,jam_posting,penginput')
								->from('artikel')
								->where(['id_artikel' => $id_artikel,'status <>' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_anggota_preview_artikel($id_artikel)
	{
		return $this->db
								->select('id_artikel,judul,slug,tags,kategori,isi,tanggal_posting,jam_posting,penginput')
								->from('artikel')
								->where(['id_artikel' => $id_artikel,'status <>' => 'aktif'])
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

		return $this->db->select('id_artikel,judul,slug,tanggal_posting,jam_posting')
										->from('artikel')
										->where(['status' => 'aktif', 'penginput' => $nama_pengguna])
										->order_by('id_artikel','DESC')
										->limit($value, $offset)
										->get()
										->result();
	}

	public function untuk_sitemap()
	{
		return $this->db->select('*')->from('artikel')->where(['status' => 'aktif'])->order_by('id_artikel','ASC')->get()->result();
	}
}