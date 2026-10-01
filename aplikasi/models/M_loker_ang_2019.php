<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_loker_ang_2019 extends CI_Model
{
	private $kolom_order;
	private $kolom_order_by_pengguna;

	public function __construct()
	{
		parent::__construct();

		$this->kolom_order             = [NULL,'nama_perusahaan','lokasi','penginput','status',NULL];
		$this->kolom_order_by_pengguna = [NULL,'nama_perusahaan','posisi','id','status',NULL];
	}

	private function _perintah_datatable($data)
	{
		$this->db->select('id_loker,nama_perusahaan,slug,lokasi,penginput,status,jatuh_tempo')->from('loker');

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('nama_perusahaan',$s)
					 	->or_like('lokasi',$s)
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
								->select('id_loker')
								->from('loker')
								->count_all_results();
	}

	public function jumlah_untuk_limit($nama_pengguna)
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where(['status' => 'aktif','jatuh_tempo >=' => date('Y-m-d'),'penginput' => $nama_pengguna])
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
		$this->db->select('id_loker,nama_perusahaan,posisi,tanggal_posting,jam_posting,status')
						 ->from('loker')
						 ->where('penginput',$this->session->ang_nama_pengguna);

    $s = $data['search']['value'];

		if ($s !== '')
		{
			$this->db
					 ->group_start()
					 	->like('nama_perusahaan',$s)
					 	->or_like('posisi',$s)
					 ->group_end();
		}

		if (isset($data['order']))
		{
			$this->db->order_by($this->kolom_order_by_pengguna[$data['order'][0]['column']],$data['order'][0]['dir']);
		}
		else
		{
			$this->db->order_by('id_loker','DESC');
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

	public function cek_loker($id_loker)
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where('id_loker',$id_loker)
								->get()
								->num_rows();
	}

	public function ambil($id_loker)
	{
		return $this->db
								->select('id_loker,slug,nama_perusahaan,posisi,lokasi,catatan,syarat_ketentuan,nilai_tambah,kirim_cv_ke,bukti,poster,gaji_minimal,gaji_maksimal,jatuh_tempo,status')
								->from('loker')
								->where('id_loker',$id_loker)
								->get()
								->row();
	}

	public function ambil_untuk_data_diri($nama_pengguna)
	{
		return $this->db
								->select('*')
								->from('loker')
								->where(['status' => 'aktif','jatuh_tempo >=' => date('Y-m-d'),'penginput' => $nama_pengguna])
								->order_by('id_loker','DESC')
								->limit(10)
								->get()
								->result();
	}

	public function ambil_untuk_data_diri_jumlah($nama_pengguna)
	{
		return $this->db
								->select('*')
								->from('loker')
								->where(['status' => 'aktif','jatuh_tempo >=' => date('Y-m-d'),'penginput' => $nama_pengguna])
								->order_by('id_loker','DESC')
								->get()
								->num_rows() > 10;
	}

	public function ambil_bukti($id_loker)
	{
		return $this->db
								->select('bukti')
								->from('loker')
								->where('id_loker',$id_loker)
								->get()
								->row()
								->bukti;
	}

	public function ambil_slug($id_loker)
	{
		return $this->db
								->select('slug')
								->from('loker')
								->where('id_loker',$id_loker)
								->get()
								->row()
								->slug;
	}

	public function ambil_poster($id_loker)
	{
		return $this->db
								->select('poster')
								->from('loker')
								->where('id_loker',$id_loker)
								->get()
								->row()
								->poster;
	}

	public function jumlah_by_pengguna()
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where('penginput',$this->session->ang_nama_pengguna)
								->get()
								->num_rows();
	}

	public function cek_akses_loker_pengguna($id_loker)
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where(['id_loker' => $id_loker,'penginput' => $this->session->ang_nama_pengguna])
								->get()
								->num_rows();
	}

	public function ambil_limit($value,$offset)
	{
		$value  = $this->db->escape_str($value);
		$offset = $this->db->escape_str($offset);

		return $this->db->query("
			SELECT id_loker,nama_perusahaan,posisi,slug,lokasi,jatuh_tempo,
			(
				SELECT COUNT(id_ds_loker)
				FROM {$this->db->dbprefix('ds_loker')}
			 	WHERE id_loker = loker.id_loker
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_loker)
				FROM {$this->db->dbprefix('k_loker')}
				WHERE id_loker = loker.id_loker
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('loker')} AS loker
			WHERE status = 'aktif'
			AND jatuh_tempo >= DATE(NOW())
			ORDER BY id_loker DESC
			LIMIT {$offset},{$value}
		")->result();
	}

	public function jumlah_yang_aktif()
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where([
									'status' => 'aktif',
									'jatuh_tempo >=' => date('Y-m-d')
								])
								->count_all_results();
	}

	public function ambil_limit_pencarian($pencarian,$value,$offset)
	{
		$pencarian = $this->db->escape_str($pencarian);
		$value     = $this->db->escape_str($value);
		$offset    = $this->db->escape_str($offset);

		return $this->db->query("
			SELECT id_loker,nama_perusahaan,posisi,slug,lokasi,jatuh_tempo,
			(
				SELECT COUNT(id_ds_loker)
				FROM {$this->db->dbprefix('ds_loker')}
			 	WHERE id_loker = loker.id_loker
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_loker)
				FROM {$this->db->dbprefix('k_loker')}
				WHERE id_loker = loker.id_loker
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('loker')} AS loker
			WHERE (status = 'aktif'
			AND jatuh_tempo >= DATE(NOW()))
			AND (nama_perusahaan LIKE '%{$pencarian}%' OR lokasi LIKE '%{$pencarian}%' OR posisi LIKE '%{$pencarian}%')
			ORDER BY id_loker DESC
			LIMIT {$offset},{$value}
		")->result();
	}

	public function jumlah_pencarian_yang_aktif($pencarian)
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where([
									'status' => 'aktif',
									'jatuh_tempo >=' =>  date('Y-m-d')
								])
								->like('nama_perusahaan',$pencarian,'both')
								->or_like('lokasi',$pencarian,'both')
								->or_like('posisi',$pencarian,'both')
								->count_all_results();
	}

	public function cek_url_valid($id_loker,$slug_url)
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where(['id_loker' => $id_loker, 'slug' => $slug_url, 'status' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_lihat_loker($id_loker)
	{
		return $this->db
								->select('loker.id_loker,nama_perusahaan,posisi,slug,lokasi,catatan,syarat_ketentuan,nilai_tambah,kirim_cv_ke,bukti,poster,gaji_minimal,gaji_maksimal,jatuh_tempo,tanggal_posting,jam_posting,penginput,COUNT(id_ds_loker) AS jumlah_suka')
								->from('loker')
								->join('ds_loker','ds_loker.id_loker = loker.id_loker','left')
								->where(['loker.id_loker' => $id_loker,'status' => 'aktif','jatuh_tempo >=' => date('Y-m-d')])
								->group_by(['loker.id_loker','loker.nama_perusahaan','loker.posisi','loker.slug','loker.lokasi','loker.catatan','loker.syarat_ketentuan','loker.nilai_tambah','loker.kirim_cv_ke','loker.bukti','loker.poster','loker.gaji_minimal','loker.gaji_maksimal','loker.jatuh_tempo','loker.tanggal_posting','loker.jam_posting','loker.penginput'])
								->get()
								->row();
	}

	public function cek_kesamaan_nama_pengguna($id_loker)
	{
		return $this->db->select('id_loker')->from('loker')->where(['id_loker' => $id_loker,'penginput' => $this->session->ang_nama_pengguna])->get()->num_rows();
	}

	public function loker_lainnya($id_loker_yang_dilihat)
	{
		$id_loker_yang_dilihat = $this->db->escape_str($id_loker_yang_dilihat);

		return $this->db->query("
			SELECT id_loker,nama_perusahaan,posisi,slug,lokasi,jatuh_tempo,
			(
				SELECT COUNT(id_ds_loker)
				FROM {$this->db->dbprefix('ds_loker')}
			 	WHERE id_loker = loker.id_loker
			) AS jumlah_suka,
			(
				SELECT COUNT(id_k_loker)
				FROM {$this->db->dbprefix('k_loker')}
				WHERE id_loker = loker.id_loker
				AND diblok = 'N'
			) AS jumlah_komentar
			FROM {$this->db->dbprefix('loker')} AS loker
			WHERE id_loker <> '{$id_loker_yang_dilihat}'
			AND status = 'aktif'
			AND jatuh_tempo >= DATE(NOW())
			ORDER BY RAND()
			LIMIT 6
		");
	}

	public function ambil_penginput($id_loker)
	{
		return $this->db
								->select('penginput')
								->from('loker')
								->where('id_loker',$id_loker)
								->get()
								->row()
								->penginput;
	}

	public function cek_valid_pengurus_preview_loker($id_loker)
	{
		return $this->db
								->select('id_loker,nama_perusahaan,posisi,slug,lokasi,catatan,syarat_ketentuan,nilai_tambah,kirim_cv_ke,bukti,poster,gaji_minimal,gaji_maksimal,jatuh_tempo,tanggal_posting,jam_posting,penginput')
								->from('loker')
								->where(['id_loker' => $id_loker,'status <>' => 'aktif'])
								->or_where('jatuh_tempo <', date('Y-m-d'))
								->get()
								->num_rows();
	}

	public function ambil_untuk_pengurus_preview_loker($id_loker)
	{
		return $this->db
								->select('id_loker,nama_perusahaan,posisi,slug,lokasi,catatan,syarat_ketentuan,nilai_tambah,kirim_cv_ke,bukti,poster,gaji_minimal,gaji_maksimal,jatuh_tempo,tanggal_posting,jam_posting,penginput')
								->from('loker')
								->where(['id_loker' => $id_loker,'status <>' => 'aktif'])
								->or_where('jatuh_tempo <', date('Y-m-d'))
								->get()
								->row();
	}

	public function cek_valid_anggota_preview_loker($id_loker)
	{
		return $this->db
								->select('id_loker,nama_perusahaan,posisi,slug,lokasi,catatan,syarat_ketentuan,nilai_tambah,kirim_cv_ke,bukti,poster,gaji_minimal,gaji_maksimal,jatuh_tempo,tanggal_posting,jam_posting,penginput')
								->from('loker')
								->where(['id_loker' => $id_loker,'status <>' => 'aktif'])
								->get()
								->num_rows();
	}

	public function ambil_untuk_anggota_preview_loker($id_loker)
	{
		return $this->db
								->select('id_loker,nama_perusahaan,posisi,slug,lokasi,catatan,syarat_ketentuan,nilai_tambah,kirim_cv_ke,bukti,poster,gaji_minimal,gaji_maksimal,jatuh_tempo,tanggal_posting,jam_posting,penginput')
								->from('loker')
								->where(['id_loker' => $id_loker,'status <>' => 'aktif'])
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

		return $this->db->select('id_loker,nama_perusahaan,posisi,slug,lokasi,tanggal_posting,jam_posting')
										->from('loker')
										->where(['status' => 'aktif','jatuh_tempo >=' => date('Y-m-d'),'penginput' => $nama_pengguna])
										->order_by('id_loker','DESC')
										->limit($value, $offset)
										->get()
										->result();
	}

	public function cek_jatuh_tempo($id_loker)
	{
		return $this->db
								->select('id_loker')
								->from('loker')
								->where(['status' => 'aktif','jatuh_tempo >=' => date('Y-m-d'),'id_loker' => $id_loker])
								->get()
								->num_rows();
	}

	public function untuk_sitemap()
	{
		return $this->db->select('*')->from('loker')->where(['status' => 'aktif','jatuh_tempo >=' => date('Y-m-d')])->order_by('id_loker','ASC')->get()->result();
	}
}