<?php defined('BASEPATH') OR exit('No direct script access allowed');

use setasign\Fpdi\Fpdi;
require_once FCPATH.'vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';

class C_web_ang_2019 extends CI_Controller
{
	private $respon;
	private $purifier;

	public function __construct()
	{
		parent::__construct();

		if ($_SERVER['CI_ENV'] != 'development')
		{
			if (strpos($_SERVER['HTTP_HOST'], 'mail.example.test') !== false)
			{
				header('location: https://example.test');
				exit;
			}
		}

		if ($this->uri->segment(1) != 'pemeliharaan')
		{
			$pemeliharaan = $this->db->select('pemeliharaan')->from('konfigurasi')->get()->row()->pemeliharaan == 'Y';

			if ($pemeliharaan && !$this->session->has_userdata('ang_pengurus'))
			{
				redirect('pemeliharaan');
				exit;
			}
		}

		if ($this->session->has_userdata('ang_anggota')) {
			$nama_pengguna = $this->session->ang_nama_pengguna;
			$session_terakhir_ubah_kata_sandi = $this->session->terakhir_ubah_kata_sandi;
			if ($this->pengguna->ambil_terakhir_ubah_kata_sandi($nama_pengguna) != $session_terakhir_ubah_kata_sandi) {
				redirect('anggota/keluar');
			}
		}

		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);
		$this->purifier = $purifier;

		$this->ang->check_rate_limiter();
	}

	private function _ctoken_baru()
	{
		return ['ctoken' => $this->security->get_csrf_hash()];
	}

	private function _encode_dengan_token($data)
	{
		echo json_encode(array_merge($data,$this->_ctoken_baru()));
	}

	private function _akses_ajax()
	{
		if (!$this->input->post())
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	private function _is_base64_string($s)
	{
	  if (($b = base64_decode($s, TRUE)) === FALSE)
	  {
	    return FALSE;
	  }

	  $e = mb_detect_encoding($b);

	  if (in_array($e, array('UTF-8', 'ASCII')))
	  {
	    return TRUE;
	  }
	  else
	  {
	    return FALSE;
	  }
	}

	private function _atur_waktu_aktifitas($key)
	{
		$this->session->set_userdata($key, time());
	}

	private function _cek_waktu_aktifitas($key, $time_in_second)
	{
		if ($this->session->has_userdata($key) && (time() - $this->session->userdata($key)) <= $time_in_second)
		{
			return TRUE;
		}

		return FALSE;
	}

	public function portofolio_msalehs()
	{
	    redirect('msalehsolahudin');
	}

	public function testing_email()
	{
		$this->load->view('testing_email');
	}

	public function index()
	{
		// angota terbaik mingguan
		$atm = $this->db->select('*')->from('atm')->get()->row();

		// angota terbaik mingguan (rajin membuat artikel)
		$atm_rma = $this->pengguna->ambil_data_diri($atm->rajin_membuat_artikel);

		// angota terbaik mingguan (rajin berdiskusi)
		$atm_rb = $this->pengguna->ambil_data_diri($atm->rajin_berdiskusi);

		// angota terbaik mingguan (banyak berkontribusi)
		$atm_bb = $this->pengguna->ambil_data_diri($atm->banyak_berkontribusi);

		// angota terbaik mingguan (anggota baru paling rajin)
		$atm_abpr = $this->pengguna->ambil_data_diri($atm->anggota_baru_paling_rajin);

		$this->load->view('web/landing', compact('atm_rma','atm_rb','atm_bb','atm_abpr'));
	}

	public function belajar()
	{
		$data['bagian_html']       = 0;
		$data['bagian_css']        = 0;
		$data['bagian_php']        = 0;
		$data['bagian_mysql']      = 0;
		$data['bagian_javascript'] = 0;

		if ($this->session->has_userdata('ang_akses'))
		{
			$this->belajar->init_kelas_pengguna('html');
			$this->belajar->init_kelas_pengguna('css');
			$this->belajar->init_kelas_pengguna('php');
			$this->belajar->init_kelas_pengguna('mysql');
			$this->belajar->init_kelas_pengguna('js');

			$data['bagian_html']       = $this->belajar->ambil_bagian_terakhir_teori_html(1);
			$data['bagian_css']        = $this->belajar->ambil_bagian_terakhir_teori_css(1);
			$data['bagian_php']        = $this->belajar->ambil_bagian_terakhir_teori_php(1);
			$data['bagian_mysql']      = $this->belajar->ambil_bagian_terakhir_teori_mysql(1);
			$data['bagian_javascript'] = $this->belajar->ambil_bagian_terakhir_teori_javascript(1);
		}

		$data['peserta_html']       = $this->belajar->ambil_peserta('html');
		$data['peserta_css']        = $this->belajar->ambil_peserta('css');
		$data['peserta_php']        = $this->belajar->ambil_peserta('php');
		$data['peserta_mysql']      = $this->belajar->ambil_peserta('mysql');
		$data['peserta_javascript'] = $this->belajar->ambil_peserta('js');

		$this->load->view('belajar/awal', $data);
	}

	public function artikel()
	{
		$pencarian = $this->ang->ci($this->input->get('pencarian',TRUE));

		if (strpos($pencarian, '"') !== FALSE)
		{
			redirect('artikel?pencarian='.str_replace('"','',$pencarian));
		}

		if ($pencarian)
		{
			if (trim($pencarian) == '')
			{
				redirect('artikel');
			}

			$data = [
				'artikel_awal' => $this->artikel->ambil_limit_pencarian($pencarian,9,0),
				'jumlah'       => $this->artikel->jumlah_pencarian_yang_aktif($pencarian),
				'yang_di_cari' => $pencarian,
				'pencarian'    => 'ya'
			];
		}
		else
		{
			$data = [
				'artikel_awal' => $this->artikel->ambil_limit(9,0),
				'jumlah'       => $this->artikel->jumlah_yang_aktif(),
				'yang_di_cari' => '',
				'pencarian'    => 'tidak'
			];
		}

		$this->load->view('web/artikel/awal',$data);
	}

	public function lihat_lebih_banyak_artikel()
	{
		$this->_akses_ajax();

		$status_pencarian = $this->ang->ci($this->input->post('sp',TRUE));
		$pencarian        = $this->ang->ci($this->input->post('p',TRUE));
		$jumlah           = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index            = $this->ang->ci($this->input->post('index',TRUE));
		$html             = '';

		if ($status_pencarian == 'ya')
		{
			$data = $this->artikel->ambil_limit_pencarian($pencarian,9,$index,$jumlah);
		}
		else
		{
			$data = $this->artikel->ambil_limit(9,$index,$jumlah);
		}

		foreach ($data as $artikel)
		{
			$thumb         = $artikel->thumb === NULL ? base_url('media/thumbnail-artikel/thumb-kosong.png') : $artikel->thumb;
			$link_kategori = base_url('artikel/kategori/'.str_replace(' ','-',$artikel->kategori));
			$judul         = strlen($artikel->judul) >= 30 ? "<span class='judul-overflow' data-toggle='tooltip' title='{$artikel->judul}'>".substr($artikel->judul, 0, 27)."...</span>" : $artikel->judul;
			$waktu         = "{$this->ang->tanggal_bulan_indonesia($artikel->tanggal_posting)} {$artikel->jam_posting} WIB";
			$isi           = strlen($this->ang->mst($artikel->isi)) >= 140 ? substr($this->ang->mst($artikel->isi), 0, 137).'...' : $this->ang->mst($artikel->isi);
			$selengkapnya  = site_url('artikel/'.$artikel->id_artikel.'/'.$artikel->slug);

			$html .= "<div class='col-lg-4 col-md-6 col-sm-6 col-12'>
        <div class='card h-100 mb-1 custom-card-2'>
          <div class='card-thumbnail'>
            <img class='card-img-top' src='".base_url('media/website/lazyload.gif')."' data-src='{$thumb}' alt='{$artikel->judul}'>
          </div>
          <div class='card-body'>
            <p class='awal-judul-artikel'>{$judul}</p>
            <p class='awal-waktu-posting-artikel'>{$waktu}</p>
            <p class='awal-isi-artikel'>{$isi}</p>
            <div class='card-kategori'># <a href='{$link_kategori}'>{$artikel->kategori}</a></div>
          </div>
          <div class='card-footer'>
            <div class='d-flex justify-content-between align-items-center'>
              <div class='btn-group'>
                <a href='{$selengkapnya}' class='btn btn-sm btn-outline-secondary'>Selengkapnya</a>
              </div>
              <small class='text-muted'><i class='fas fa-heart'></i> {$artikel->jumlah_suka}&nbsp;&nbsp;&nbsp;<i class='fas fa-volume-up'></i> {$artikel->jumlah_komentar}</small>
            </div>
          </div>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function artikel_by_kategori($kategori)
	{
		$kategori = str_replace('-',' ',$kategori);

		if ($this->kategori->cek_kategori($kategori) > 0)
		{
			$pencarian = $this->ang->ci($this->input->get('pencarian',TRUE));

			if (strpos($pencarian, '"') !== FALSE)
			{
				redirect("artikel/kategori/{$kategori}?pencarian=".str_replace('"','',$pencarian));
			}

			if ($pencarian)
			{
				if (trim($pencarian) == '')
				{
					redirect("artikel/kategori/{$kategori}");
				}

				$data = [
					'artikel_awal' => $this->artikel->by_kategori_ambil_limit_pencarian($kategori,$pencarian,9,0),
					'jumlah'       => $this->artikel->jumlah_by_kategori_pencarian_yang_aktif($kategori,$pencarian),
					'yang_di_cari' => $pencarian,
					'pencarian'    => 'ya'
				];
			}
			else
			{
				$data = [
					'artikel_awal' => $this->artikel->by_kategori_ambil_limit($kategori,9,0),
					'jumlah'       => $this->artikel->jumlah_by_kategori_yang_aktif($kategori),
					'yang_di_cari' => '',
					'pencarian'    => 'tidak'
				];
			}

			$this->load->view('web/artikel/by-kategori',$data);
		}
		else
		{
			show_404();
		}
	}

	public function lihat_lebih_banyak_artikel_by_kategori()
	{
		$this->_akses_ajax();

		$status_pencarian = $this->ang->ci($this->input->post('sp',TRUE));
		$pencarian        = $this->ang->ci($this->input->post('p',TRUE));
		$kategori         = $this->ang->ci($this->input->post('kategori',TRUE));
		$jumlah           = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index            = $this->ang->ci($this->input->post('index', TRUE));
		$html             = '';

		if ($status_pencarian == 'ya')
		{
			$data = $this->artikel->by_kategori_ambil_limit_pencarian($kategori,$pencarian,9,$index,$jumlah);
		}
		else
		{
			$data = $this->artikel->by_kategori_ambil_limit($kategori,9,$index,$jumlah);
		}

		foreach ($data as $artikel)
		{
			$thumb         = $artikel->thumb === NULL ? base_url('media/thumbnail-artikel/thumb-kosong.png') : base_url('media/thumbnail-artikel/'.$artikel->thumb);
			$link_kategori = base_url('artikel/kategori/'.str_replace(' ','-',$artikel->kategori));
			$judul         = strlen($artikel->judul) >= 30 ? "<span class='judul-overflow' data-toggle='tooltip' title='{$artikel->judul}'>".substr($artikel->judul, 0, 27)."...</span>" : $artikel->judul;
			$waktu         = "{$this->ang->tanggal_bulan_indonesia($artikel->tanggal_posting)} {$artikel->jam_posting} WIB";
			$isi           = strlen($this->ang->mst($artikel->isi)) >= 140 ? substr($this->ang->mst($artikel->isi), 0, 137).'...' : $this->ang->mst($artikel->isi);
			$selengkapnya  = site_url('artikel/'.$artikel->id_artikel.'/'.$artikel->slug);

			$html .= "<div class='col-lg-4 col-md-6 col-sm-6 col-12'>
        <div class='card h-100 mb-1 custom-card-2'>
          <div class='card-thumbnail'>
            <img class='card-img-top' src='".base_url('media/website/lazyload.gif')."' data-src='{$thumb}' alt='{$artikel->judul}'>
          </div>
          <div class='card-body'>
            <p class='awal-judul-artikel'>{$judul}</p>
            <p class='awal-waktu-posting-artikel'>{$waktu}</p>
            <p class='awal-isi-artikel'>{$isi}</p>
            <div class='card-kategori'># <a href='{$link_kategori}'>{$artikel->kategori}</a></div>
          </div>
          <div class='card-footer'>
            <div class='d-flex justify-content-between align-items-center'>
              <div class='btn-group'>
                <a href='{$selengkapnya}' class='btn btn-sm btn-outline-secondary'>Selengkapnya</a>
              </div>
              <small class='text-muted'><i class='fas fa-thumbs-up'></i> {$artikel->jumlah_suka}</small>
            </div>
          </div>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function lihat_artikel($id_artikel,$slug_url)
	{
		if ($this->artikel->cek_url_valid($id_artikel,$slug_url))
		{
			$data = [
				'artikel'    => $this->artikel->ambil_untuk_lihat_artikel($id_artikel),
				'komentar'   => $this->k_artikel->ambil_limit($id_artikel,5,0),
				'j_komentar' => $this->k_artikel->cek_jumlah($id_artikel)
			];

			$this->load->view('web/artikel/lihat',$data);
		}
		else
		{
			show_404();
		}
	}

	public function diskusi()
	{
		$pencarian = $this->ang->ci($this->input->get('pencarian',TRUE));

		if (strpos($pencarian, '"') !== FALSE)
		{
			redirect('diskusi?pencarian='.str_replace('"','',$pencarian));
		}

		if ($pencarian)
		{
			if (trim($pencarian) == '')
			{
				redirect('diskusi');
			}

			$data = [
				'diskusi_awal' => $this->diskusi->ambil_limit_pencarian($pencarian,13,0),
				'jumlah'       => $this->diskusi->jumlah_pencarian_yang_aktif($pencarian),
				'yang_di_cari' => $pencarian,
				'pencarian'    => 'ya'
			];
		}
		else
		{
			$data = [
				'diskusi_awal' => $this->diskusi->ambil_limit(13,0),
				'jumlah'       => $this->diskusi->jumlah_yang_aktif(),
				'yang_di_cari' => '',
				'pencarian'    => 'tidak'
			];
		}

		$this->load->view('web/diskusi/awal',$data);
	}

	public function lihat_lebih_banyak_diskusi()
	{
		$this->_akses_ajax();

		$status_pencarian = $this->ang->ci($this->input->post('sp',TRUE));
		$pencarian        = $this->ang->ci($this->input->post('p',TRUE));
		$jumlah           = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index            = $this->ang->ci($this->input->post('index',TRUE));
		$html             = '';

		if ($status_pencarian == 'ya')
		{
			$data = $this->diskusi->ambil_limit_pencarian($pencarian,13,$index,$jumlah);
		}
		else
		{
			$data = $this->diskusi->ambil_limit(13,$index,$jumlah);
		}

		foreach ($data as $diskusi)
		{
			$lihat    = site_url("diskusi/{$diskusi->id_diskusi}/{$diskusi->slug}");
			$isi      = strlen($this->ang->mst($diskusi->isi)) >= 145 ? substr($this->ang->mst($diskusi->isi), 0, 142).'...' : $this->ang->mst($diskusi->isi);
			$tambahan = $diskusi->jumlah_jawaban > 0 ? " <span class='titik-pemisah'></span>{$diskusi->jumlah_jawaban} Jawaban" : " <span class='titik-pemisah'></span>Belum ada jawaban";

			$html .= "<div class='d-none d-sm-block'>
				<div class='media text-muted pt-3'>
	        <div class='d-flex justify-content-between align-items-center w-100 border-bottom pb-2 mb-0 small border-gray'>
	          <p class='media-body mb-1 pr-2'>
	            <strong class='d-block text-gray-dark'>{$diskusi->judul}<span class='titik-pemisah'></span>{$diskusi->penginput}<span class='titik-pemisah'></span>{$this->ang->tanggal_bulan_indonesia($diskusi->tanggal_posting)}<span class='titik-pemisah'></span>{$diskusi->jam_posting} WIB<span class='titik-pemisah'></span>{$diskusi->jumlah_suka} Jumlah suka{$tambahan}</strong>
	            {$isi}
	          </p>
	          <a href='{$lihat}' class='btn btn-sm btn-outline-secondary'>Lihat</a>
	        </div>
	      </div>
	    </div>
	    <div class='d-block d-sm-none'>
				<div class='media text-muted pt-3'>
	        <div class='w-100 border-bottom pb-2 mb-0 small border-gray'>
	          <p class='media-body mb-1 pr-2'>
	            <strong class='d-block text-gray-dark'>{$diskusi->judul}<span class='titik-pemisah'></span>{$diskusi->penginput}<span class='titik-pemisah'></span>{$this->ang->tanggal_bulan_indonesia($diskusi->tanggal_posting)}<span class='titik-pemisah'></span>{$diskusi->jam_posting} WIB<span class='titik-pemisah'></span>{$diskusi->jumlah_suka} Jumlah suka{$tambahan}</strong>
	            {$isi}
	          </p>
	          <a href='{$lihat}' class='btn btn-sm btn-outline-secondary'>Lihat</a>
	        </div>
	      </div>
	    </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function diskusi_by_saring($saring)
	{
		if ($saring == 'terpopuler' || $saring == 'belum-dijawab')
		{
			$pencarian = $this->ang->ci($this->input->get('pencarian',TRUE));

			if (strpos($pencarian, '"') !== FALSE)
			{
				redirect("diskusi/{$saring}?pencarian=".str_replace('"','',$pencarian));
			}

			if ($pencarian)
			{
				if (trim($pencarian) == '')
				{
					redirect("diskusi/{$saring}");
				}

				$data = [
					'diskusi_awal' => $this->diskusi->by_saring_ambil_limit_pencarian($saring,$pencarian,13,0),
					'jumlah'       => $this->diskusi->by_saring_jumlah_pencarian_yang_aktif($saring,$pencarian),
					'yang_di_cari' => $pencarian,
					'pencarian'    => 'ya'
				];
			}
			else
			{
				$data = [
					'diskusi_awal' => $this->diskusi->by_saring_ambil_limit($saring,13,0),
					'jumlah'       => $this->diskusi->by_saring_jumlah_yang_aktif($saring),
					'yang_di_cari' => '',
					'pencarian'    => 'tidak'
				];
			}

			$this->load->view('web/diskusi/by-saring',$data);
		}
		else
		{
			show_404();
		}
	}

	public function lihat_lebih_banyak_diskusi_hasil_saring()
	{
		$this->_akses_ajax();

		$status_pencarian = $this->ang->ci($this->input->post('sp',TRUE));
		$pencarian        = $this->ang->ci($this->input->post('p',TRUE));
		$saring           = $this->ang->ci($this->input->post('s',TRUE));
		$jumlah           = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index            = $this->ang->ci($this->input->post('index',TRUE));
		$html             = '';

		if ($status_pencarian == 'ya')
		{
			$data = $this->diskusi->by_saring_ambil_limit_pencarian($saring,$pencarian,13,$index,$jumlah);
		}
		else
		{
			$data = $this->diskusi->by_saring_ambil_limit($saring,13,$index,$jumlah);
		}

		foreach ($data as $diskusi)
		{
			$lihat    = site_url("diskusi/{$diskusi->id_diskusi}/{$diskusi->slug}");
			$isi      = strlen($this->ang->mst($diskusi->isi)) >= 145 ? substr($this->ang->mst($diskusi->isi), 0, 142).'...' : $this->ang->mst($diskusi->isi);
			$tambahan = $diskusi->jumlah_jawaban > 0 ? '' : "<span class='titik-pemisah'></span>Belum ada jawaban";

			$html .= "<div class='d-none d-sm-block'>
				<div class='media text-muted pt-3'>
	        <div class='d-flex justify-content-between align-items-center w-100 border-bottom pb-2 mb-0 small border-gray'>
	          <p class='media-body mb-1 pr-2'>
	            <strong class='d-block text-gray-dark'>{$diskusi->judul}<span class='titik-pemisah'></span>{$diskusi->penginput}<span class='titik-pemisah'></span>{$this->ang->tanggal_bulan_indonesia($diskusi->tanggal_posting)}<span class='titik-pemisah'></span>{$diskusi->jam_posting} WIB<span class='titik-pemisah'></span>{$diskusi->jumlah_suka} Jumlah suka{$tambahan}</strong>
	            {$isi}
	          </p>
	          <a href='{$lihat}' class='btn btn-sm btn-outline-secondary'>Lihat</a>
	        </div>
	      </div>
	    </div>
	    <div class='d-block d-sm-none'>
				<div class='media text-muted pt-3'>
	        <div class='w-100 border-bottom pb-2 mb-0 small border-gray'>
	          <p class='media-body mb-1 pr-2'>
	            <strong class='d-block text-gray-dark'>{$diskusi->judul}<span class='titik-pemisah'></span>{$diskusi->penginput}<span class='titik-pemisah'></span>{$this->ang->tanggal_bulan_indonesia($diskusi->tanggal_posting)}<span class='titik-pemisah'></span>{$diskusi->jam_posting} WIB<span class='titik-pemisah'></span>{$diskusi->jumlah_suka} Jumlah suka{$tambahan}</strong>
	            {$isi}
	          </p>
	          <a href='{$lihat}' class='btn btn-sm btn-outline-secondary'>Lihat</a>
	        </div>
	      </div>
	    </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function lihat_diskusi($id_diskusi,$slug_url)
	{
		if ($this->diskusi->cek_url_valid($id_diskusi,$slug_url))
		{
			$data = [
				'diskusi'    => $this->diskusi->ambil_untuk_lihat_diskusi($id_diskusi),
				'jawaban'    => $this->j_diskusi->ambil_limit($id_diskusi,5,0),
				'j_jawaban'  => $this->j_diskusi->cek_jumlah($id_diskusi)
			];

			$this->load->view('web/diskusi/lihat',$data);
		}
		else
		{
			show_404();
		}
	}

	public function lowongan_kerja()
	{
		$pencarian = $this->ang->ci($this->input->get('pencarian',TRUE));

		if (strpos($pencarian, '"') !== FALSE)
		{
			redirect('lowongan-kerja?pencarian='.str_replace('"','',$pencarian));
		}

		if ($pencarian)
		{
			if (trim($pencarian) == '')
			{
				redirect('lowongan-kerja');
			}

			$data = [
				'loker_awal'   => $this->loker->ambil_limit_pencarian($pencarian,15,0),
				'jumlah'       => $this->loker->jumlah_pencarian_yang_aktif($pencarian),
				'yang_di_cari' => $pencarian,
				'pencarian'    => 'ya'
			];
		}
		else
		{
			$data = [
				'loker_awal'   => $this->loker->ambil_limit(15,0),
				'jumlah'       => $this->loker->jumlah_yang_aktif(),
				'yang_di_cari' => '',
				'pencarian'    => 'tidak'
			];
		}

		$this->load->view('web/loker/awal',$data);
	}

	public function lihat_lebih_banyak_lowongan_kerja()
	{
		$this->_akses_ajax();

		$status_pencarian = $this->ang->ci($this->input->post('sp',TRUE));
		$pencarian        = $this->ang->ci($this->input->post('p',TRUE));
		$jumlah           = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index            = $this->ang->ci($this->input->post('index', TRUE));
		$html             = '';

		if ($status_pencarian == 'ya')
		{
			$data = $this->loker->ambil_limit_pencarian($pencarian,15,$index,$jumlah);
		}
		else
		{
			$data = $this->loker->ambil_limit(15,$index,$jumlah);
		}

		foreach ($data as $loker)
		{
			$selengkapnya = site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}");

			$html .= "<div class='col-md-6 col-lg-4'>
        <div class='card h-100 custom-card'>
          <h6 class='card-header'>{$loker->nama_perusahaan}</h6>
          <div class='card-body cb-lowongan-kerja'>
          	<table>
              <tr>
                <td>Posisi</td>
                <td>:</td>
                <td>{$loker->posisi}</td>
              </tr>
              <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td>{$loker->lokasi}</td>
              </tr>
              <tr>
                <td>Sampai</td>
                <td>:</td>
                <td>{$this->ang->tanggal_bulan_indonesia($loker->jatuh_tempo)}</td>
              </tr>
            </table>
          </div>
          <div class='card-footer'>
            <div class='d-flex justify-content-between align-items-center'>
              <div class='btn-group'>
                <a href='{$selengkapnya}' class='btn btn-sm btn-outline-secondary'>Selengkapnya</a>
              </div>
              <small class='text-muted'><i class='fas fa-thumbs-up'></i> {$loker->jumlah_suka}</small>
            </div>
          </div>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function lihat_lowongan_kerja($id_loker,$slug_url)
	{
		if ($this->loker->cek_url_valid($id_loker,$slug_url))
		{
			if ($this->loker->cek_jatuh_tempo($id_loker) > 0)
			{
				$data = [
					'loker'      => $this->loker->ambil_untuk_lihat_loker($id_loker),
					'komentar'   => $this->k_loker->ambil_limit($id_loker,5,0),
					'j_komentar' => $this->k_loker->cek_jumlah($id_loker)
				];

				$this->load->view('web/loker/lihat',$data);
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_404();
		}
	}

	public function komentari_artikel()
	{
		$this->_akses_ajax();

		if ($this->pengguna->cek_muted_pengguna() > 0)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Akun anda sedang dibisukan oleh pengurus Always Ngoding (24 jam)."];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$key_aktifitas = "komentar_artikel";

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 60*3) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 3 menit dahulu semenjak anda mengomentari artikel untuk bisa mengomentari artikel kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$id_artikel = $this->input->post('id_artikel',TRUE);
		$pengguna   = $this->session->ang_nama_pengguna;

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'komentar',
					'label'  => 'Komentar',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = ['sukses' => FALSE,'pesan' => validation_errors()];
		}
		else
		{
			$komentar = $this->purifier->purify($this->ang->cw($this->input->post('komentar')));
			$data = [
				'id_artikel' => $id_artikel,
				'pengguna'   => $pengguna,
				'isi'        => $komentar,
				'tanggal'    => date('Y-m-d'),
				'jam'        => date('H:i:s'),
				'diblok'     => 'N'
			];

			$penginput = $this->artikel->ambil_penginput($id_artikel);
			$judul     = $this->artikel->ambil_judul($id_artikel);
			$slug      = $this->artikel->ambil_slug($id_artikel);

			$this->db->insert('k_artikel',$data);

			$u_notif_1 = site_url("anggota/{$pengguna}");
			$u_notif_2 = site_url("artikel/{$id_artikel}/{$slug}");

			if ($penginput != $pengguna)
			{
				$this->notifikasi->input($penginput,"<a href='{$u_notif_1}' target='_blank'>{$pengguna}</a> mengomentari artikel anda yang berjudul <a href='{$u_notif_2}' target='_blank'><q>{$judul}</q></a>.","artikel/{$id_artikel}/{$slug}");
			}

			$semua_pengguna_yang_mengomentari_artikel_ini = $this->k_artikel->ambil_untuk_sebar_notifikasi($id_artikel);

			foreach ($semua_pengguna_yang_mengomentari_artikel_ini as $spymai)
			{
				if ($penginput != $spymai->pengguna && $pengguna != $spymai->pengguna)
				{
					$this->notifikasi->input($spymai->pengguna,"<a href='{$u_notif_1}' target='_blank'>{$pengguna}</a> mengomentari artikel yang anda ikuti yang berjudul <a href='{$u_notif_2}' target='_blank'><q>{$judul}</q></a>.","artikel/{$id_artikel}/{$slug}");
				}
			}

			$this->_atur_waktu_aktifitas($key_aktifitas);
			$this->db->set('jumlah_kontribusi','jumlah_kontribusi+1',false)->where('nama_pengguna',$pengguna)->update('pengguna');
			$this->campuran->tambah_riwayat('Y',"Mengomentari artikel ID {$id_artikel}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Terima kasih atas komentarnya...'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function jawab_diskusi()
	{
		$this->_akses_ajax();

		if ($this->pengguna->cek_muted_pengguna() > 0)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Akun anda sedang dibisukan oleh pengurus Always Ngoding (24 jam)."];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$key_aktifitas = "jawab_diskusi";

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 60*1) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 1 menit dahulu semenjak anda menjawab untuk bisa menjawab kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$id_diskusi = $this->input->post('id_diskusi',TRUE);
		$pengguna   = $this->session->ang_nama_pengguna;

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'jawaban',
					'label'  => 'Jawaban',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = ['sukses' => FALSE,'pesan' => validation_errors()];
		}
		else
		{
			$jawaban = $this->purifier->purify($this->ang->cw($this->input->post('jawaban')));
			$data = [
				'id_diskusi' => $id_diskusi,
				'pengguna'   => $pengguna,
				'isi'        => $jawaban,
				'tanggal'    => date('Y-m-d'),
				'jam'        => date('H:i:s'),
				'diblok'     => 'N'
			];

			$penginput = $this->diskusi->ambil_penginput($id_diskusi);
			$judul     = $this->diskusi->ambil_judul($id_diskusi);
			$slug      = $this->diskusi->ambil_slug($id_diskusi);

			$this->db->insert('j_diskusi',$data);

			$u_notif_1 = site_url("anggota/{$pengguna}");
			$u_notif_2 = site_url("diskusi/{$id_diskusi}/{$slug}");

			if ($penginput != $pengguna)
			{
				$this->notifikasi->input($penginput,"<a href='{$u_notif_1}' target='_blank'>{$pengguna}</a> menjawab diskusi anda yang berjudul <a href='{$u_notif_2}' target='_blank'><q>{$judul}</q></a>.","diskusi/{$id_diskusi}/{$slug}");
			}

			$semua_pengguna_yang_menjawab_diskusi_ini = $this->j_diskusi->ambil_untuk_sebar_notifikasi($id_diskusi);

			foreach ($semua_pengguna_yang_menjawab_diskusi_ini as $spymdi)
			{
				if ($penginput != $spymdi->pengguna && $pengguna != $spymdi->pengguna)
				{
					$this->notifikasi->input($spymdi->pengguna,"<a href='{$u_notif_1}' target='_blank'>{$pengguna}</a> menjawab diskusi yang anda ikuti yang berjudul <a href='{$u_notif_2}' target='_blank'><q>{$judul}</q></a>.","diskusi/{$id_diskusi}/{$slug}");
				}
			}

			$this->_atur_waktu_aktifitas($key_aktifitas);
			$this->db->set('jumlah_kontribusi','jumlah_kontribusi+1',false)->where('nama_pengguna',$pengguna)->update('pengguna');
			$this->db->set('poin_diskusi','poin_diskusi+1',false)->where('nama_pengguna',$pengguna)->update('pengguna');
			$this->campuran->tambah_riwayat('Y',"Menjawab diskusi ID {$id_diskusi}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Terima kasih atas jawaban anda...'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function komentari_loker()
	{
		$this->_akses_ajax();

		if ($this->pengguna->cek_muted_pengguna() > 0)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Akun anda sedang dibisukan oleh pengurus Always Ngoding (24 jam)."];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$key_aktifitas = "komentar_loker";

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 60*2) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 2 menit dahulu semenjak anda mengomentari lowongan kerja untuk bisa mengomentari lowongan kerja kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$id_loker = $this->input->post('id_loker',TRUE);
		$pengguna = $this->session->ang_nama_pengguna;

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'komentar',
					'label'  => 'Komentar',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = ['sukses' => FALSE,'pesan' => validation_errors()];
		}
		else
		{
			$komentar = $this->purifier->purify($this->ang->cw($this->input->post('komentar')));
			$data = [
				'id_loker' => $id_loker,
				'pengguna' => $pengguna,
				'isi'      => $komentar,
				'tanggal'  => date('Y-m-d'),
				'jam'      => date('H:i:s'),
				'diblok'   => 'N'
			];

			$penginput = $this->loker->ambil_penginput($id_loker);
			$slug      = $this->loker->ambil_slug($id_loker);

			$this->db->insert('k_loker',$data);

			$u_notif_1 = site_url("anggota/{$pengguna}");
			$u_notif_2 = site_url("lowongan-kerja/{$id_loker}/{$slug}");

			if ($penginput != $pengguna)
			{
				$this->notifikasi->input($penginput,"<a href='{$u_notif_1}' target='_blank'>{$pengguna}</a> mengomentari <a href='{$u_notif_2}' target='_blank'>lowongan kerja anda</a>.","lowongan-kerja/{$id_loker}/{$slug}");
			}

			$semua_pengguna_yang_mengomentari_loker_ini = $this->k_loker->ambil_untuk_sebar_notifikasi($id_loker);

			foreach ($semua_pengguna_yang_mengomentari_loker_ini as $spymli)
			{
				if ($penginput != $spymli->pengguna && $pengguna != $spymli->pengguna)
				{
					$this->notifikasi->input($spymli->pengguna,"<a href='{$u_notif_1}' target='_blank'>{$pengguna}</a> mengomentari <a href='{$u_notif_2}' target='_blank'>lowongan kerja</a> yang anda ikuti.","lowongan-kerja/{$id_loker}/{$slug}");
				}
			}

			$this->_atur_waktu_aktifitas($key_aktifitas);
			$this->db->set('jumlah_kontribusi','jumlah_kontribusi+1',false)->where('nama_pengguna',$pengguna)->update('pengguna');
			$this->campuran->tambah_riwayat('Y',"Mengomentari lowongan kerja ID {$id_loker}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Terima kasih atas komentarnya...'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function sukai_artikel()
	{
		$this->_akses_ajax();

		$id_artikel = $this->input->post('id_artikel',TRUE);

		if ($this->session->has_userdata('ang_akses') && !$this->artikel->cek_kesamaan_nama_pengguna($id_artikel))
		{
			if (!$this->ds_artikel->cek_apakah_sudah_menyukai($id_artikel))
			{
				$pengguna = $this->session->ang_nama_pengguna;
				$data     = [
					'id_artikel' => $id_artikel,
					'pengguna'   => $pengguna,
					'tanggal'    => date('Y-m-d'),
					'jam'        => date('H:i:s')
				];

				$penginput = $this->artikel->ambil_penginput($id_artikel);
				$judul     = $this->artikel->ambil_judul($id_artikel);
				$slug      = $this->artikel->ambil_slug($id_artikel);

				$this->db->insert('ds_artikel',$data);

				if ($penginput != $pengguna)
				{
					$this->notifikasi->input($penginput,"<a href='".site_url("anggota/{$pengguna}")."' target='_blank'>{$pengguna}</a> menyukai artikel anda yang berjudul <a href='".site_url("artikel/{$id_artikel}/{$slug}")."' target='_blank'><q>{$judul}</q></a>.","artikel/{$id_artikel}/{$slug}");
				}

				$this->campuran->tambah_riwayat('Y',"Menyukai artikel ID {$id_artikel}.");
				$this->respon = ['sukses' => TRUE,'pesan' => "Rekues menyukai artikel ID {$id_artikel} diterima dan berhasil di proses."];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => "Rekues menyukai artikel ID {$id_artikel} ditolak. karena sudah menyukainya."];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Rekues ditolak."];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function sukai_komentar_artikel()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->session->has_userdata('ang_akses') && !$this->k_artikel->cek_kesamaan_nama_pengguna($id_komentar))
		{
			if (!$this->dsk_artikel->cek_apakah_sudah_menyukai($id_komentar))
			{
				$artikel   = $this->artikel->ambil($this->k_artikel->ambil_id_artikel($id_komentar));
				$pengguna  = $this->session->ang_nama_pengguna;
				$penginput = $this->k_artikel->ambil_pengguna($id_komentar);

				$data = [
					'id_komentar' => $id_komentar,
					'pengguna'    => $pengguna,
					'tanggal'     => date('Y-m-d'),
					'jam'         => date('H:i:s')
				];

				$this->notifikasi->input($penginput,"<a href='".site_url("anggota/{$pengguna}")."' target='_blank'>{$pengguna}</a> menyukai komentar anda pada artikel yang berjudul <a href='".site_url("artikel/{$artikel->id_artikel}/{$artikel->slug}")."' target='_blank'><q>{$artikel->judul}</q></a>.","artikel/{$artikel->id_artikel}/{$artikel->slug}");

				$this->db->insert('dsk_artikel',$data);
				$this->campuran->tambah_riwayat('Y',"Menyukai komentar artikel ID {$id_komentar}.");
				$this->respon = ['sukses' => TRUE,'pesan' => "Rekues menyukai komentar artikel ID {$id_komentar} diterima dan berhasil di proses."];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => "Rekues menyukai komentar artikel ID {$id_komentar} ditolak. karena sudah menyukainya."];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Rekues ditolak."];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function sukai_diskusi()
	{
		$this->_akses_ajax();

		$id_diskusi = $this->input->post('id_diskusi',TRUE);

		if ($this->session->has_userdata('ang_akses') && !$this->diskusi->cek_kesamaan_nama_pengguna($id_diskusi))
		{
			if (!$this->ds_diskusi->cek_apakah_sudah_menyukai($id_diskusi))
			{
				$pengguna = $this->session->ang_nama_pengguna;
				$data     = [
					'id_diskusi' => $id_diskusi,
					'pengguna'   => $pengguna,
					'tanggal'    => date('Y-m-d'),
					'jam'        => date('H:i:s')
				];

				$penginput = $this->diskusi->ambil_penginput($id_diskusi);
				$judul     = $this->diskusi->ambil_judul($id_diskusi);
				$slug      = $this->diskusi->ambil_slug($id_diskusi);

				$this->db->insert('ds_diskusi',$data);

				if ($penginput != $pengguna)
				{
					$this->notifikasi->input($penginput,"<a href='".site_url("anggota/{$pengguna}")."' target='_blank'>{$pengguna}</a> menyukai diskusi anda yang berjudul <a href='".site_url("diskusi/{$id_diskusi}/{$slug}")."' target='_blank'><q>{$judul}</q></a>.","diskusi/{$id_diskusi}/{$slug}");
				}

				$this->campuran->tambah_riwayat('Y',"Menyukai diskusi ID {$id_diskusi}.");
				$this->respon = ['sukses' => TRUE,'pesan' => "Rekues menyukai diskusi ID {$id_diskusi} diterima dan berhasil di proses."];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => "Rekues menyukai diskusi ID {$id_diskusi} ditolak. karena sudah menyukainya."];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Rekues ditolak."];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function sukai_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$id_jawaban = $this->input->post('id_jawaban',TRUE);

		if ($this->session->has_userdata('ang_akses') && !$this->j_diskusi->cek_kesamaan_nama_pengguna($id_jawaban))
		{
			if (!$this->dsjd->cek_apakah_sudah_menyukai($id_jawaban))
			{
				$diskusi   = $this->diskusi->ambil($this->j_diskusi->ambil_id_diskusi($id_jawaban));
				$pengguna  = $this->session->ang_nama_pengguna;
				$penginput = $this->j_diskusi->ambil_pengguna($id_jawaban);

				$data = [
					'id_jawaban' => $id_jawaban,
					'pengguna'   => $pengguna,
					'tanggal'    => date('Y-m-d'),
					'jam'        => date('H:i:s')
				];

				$this->notifikasi->input($penginput,"<a href='".site_url("anggota/{$pengguna}")."' target='_blank'>{$pengguna}</a> menyukai jawaban anda pada diskusi yang berjudul <a href='".site_url("diskusi/{$diskusi->id_diskusi}/{$diskusi->slug}")."' target='_blank'><q>{$diskusi->judul}</q></a>.","diskusi/{$diskusi->id_diskusi}/{$diskusi->slug}");

				$this->db->insert('dsjd',$data);
				$this->campuran->tambah_riwayat('Y',"Menyukai jawaban diskusi ID {$id_jawaban}.");
				$this->respon = ['sukses' => TRUE,'pesan' => "Rekues menyukai jawban diskusi ID {$id_jawaban} diterima dan berhasil di proses."];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => "Rekues menyukai jawbaan diskusi ID {$id_jawaban} ditolak. karena sudah menyukainya."];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Rekues ditolak."];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function sukai_loker()
	{
		$this->_akses_ajax();

		$id_loker = $this->input->post('id_loker',TRUE);

		if ($this->session->has_userdata('ang_akses') && !$this->loker->cek_kesamaan_nama_pengguna($id_loker))
		{
			if (!$this->ds_loker->cek_apakah_sudah_menyukai($id_loker))
			{
				$pengguna = $this->session->ang_nama_pengguna;
				$data     = [
					'id_loker' => $id_loker,
					'pengguna' => $pengguna,
					'tanggal'  => date('Y-m-d'),
					'jam'      => date('H:i:s')
				];

				$penginput = $this->loker->ambil_penginput($id_loker);
				$slug      = $this->loker->ambil_slug($id_loker);

				$this->db->insert('ds_loker',$data);

				if ($penginput != $pengguna)
				{
					$this->notifikasi->input($penginput,"<a href='".site_url("anggota/{$pengguna}")."' target='_blank'>{$pengguna}</a> menyukai <a href='".site_url("lowongan-kerja/{$id_loker}/{$slug}")."' target='_blank'>lowongan kerja anda</a>.","lowongan-kerja/{$id_loker}/{$slug}");
				}

				$this->campuran->tambah_riwayat('Y',"Menyukai lowongan kerja ID {$id_loker}.");
				$this->respon = ['sukses' => TRUE,'pesan' => "Rekues menyukai lowongan kerja ID {$id_loker} diterima dan berhasil di proses."];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => "Rekues menyukai lowongan kerja ID {$id_loker} ditolak. karena sudah menyukainya."];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Rekues ditolak."];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function sukai_komentar_loker()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->session->has_userdata('ang_akses') && !$this->k_loker->cek_kesamaan_nama_pengguna($id_komentar))
		{
			if (!$this->dsk_loker->cek_apakah_sudah_menyukai($id_komentar))
			{
				$loker     = $this->loker->ambil($this->k_loker->ambil_id_loker($id_komentar));
				$pengguna  = $this->session->ang_nama_pengguna;
				$penginput = $this->k_loker->ambil_pengguna($id_komentar);

				$data = [
					'id_komentar' => $id_komentar,
					'pengguna'    => $pengguna,
					'tanggal'     => date('Y-m-d'),
					'jam'         => date('H:i:s')
				];

				$this->notifikasi->input($penginput,"<a href='".site_url("anggota/{$pengguna}")."' target='_blank'>{$pengguna}</a> menyukai komentar anda pada salah satu halaman lowongan kerja: <a href='".site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}")."' target='_blank'>".site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}")."</a>.","lowongan-kerja/{$loker->id_loker}/{$loker->slug}");

				$this->db->insert('dsk_loker',$data);
				$this->campuran->tambah_riwayat('Y',"Menyukai komentar lowongan kerja ID {$id_komentar}.");
				$this->respon = ['sukses' => TRUE,'pesan' => "Rekues menyukai komentar lowongan kerja ID {$id_komentar} diterima dan berhasil di proses."];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => "Rekues menyukai komentar lowongan kerja ID {$id_komentar} ditolak. karena sudah menyukainya."];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Rekues ditolak."];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ambil_sunting_komentar_artikel()
	{
		$this->_akses_ajax();

		echo $this->k_artikel->ambil_isi($this->input->post('id_komentar',TRUE));
	}

	public function sunting_komentar_artikel()
	{
		$this->_akses_ajax();

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'id_komentar',
					'label'  => 'ID Komentar',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			],
			[
				[
					'field'  => 'komentar',
					'label'  => 'Komentar',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = ['sukses' => FALSE,'pesan' => validation_errors()];
		}
		else
		{
			$id_komentar = $this->input->post('id_komentar',TRUE);

			if ($this->k_artikel->cek_k_artikel($id_komentar))
			{
				if ($this->k_artikel->cek_akses($id_komentar))
				{
					$suntingan = $this->purifier->purify($this->ang->cw($this->input->post('sunting')));
					$this->db->update('k_artikel',['isi' => $suntingan],['id_k_artikel' => $id_komentar]);
					$this->campuran->tambah_riwayat('Y',"Menyunting komentar artikel ID {$this->input->post('id_artikel',TRUE)}.");
					$this->respon = ['sukses' => TRUE,'pesan' => 'Menyunting komentar berhasil...'];
				}
				else
				{
					$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
				}
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar artikel tidak terdaftar.'];
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_komentar_artikel()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_artikel->cek_k_artikel($id_komentar))
		{
			if ($this->k_artikel->cek_akses($id_komentar))
			{
				$this->db->delete('k_artikel',['id_k_artikel' => $id_komentar]);
				$this->campuran->tambah_riwayat('Y',"Menghapus komentar artikel ID {$id_komentar}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus komentar artikel berhasil.'];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ambil_sunting_jawaban_diskusi()
	{
		$this->_akses_ajax();

		echo $this->j_diskusi->ambil_isi($this->input->post('id_jawaban',TRUE));
	}

	public function sunting_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'id_jawaban',
					'label'  => 'ID Jawaban',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			],
			[
				[
					'field'  => 'jawaban',
					'label'  => 'Jawaban',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = ['sukses' => FALSE,'pesan' => validation_errors()];
		}
		else
		{
			$id_jawaban = $this->input->post('id_jawaban',TRUE);
			if ($this->j_diskusi->cek_j_diskusi($id_jawaban))
			{
				if ($this->j_diskusi->cek_akses($id_jawaban))
				{
					$suntingan = $this->purifier->purify($this->ang->cw($this->input->post('sunting')));
					$this->db->update('j_diskusi',['isi' => $suntingan],['id_j_diskusi' => $id_jawaban]);
					$this->campuran->tambah_riwayat('Y',"Menyunting jawban diskusi ID {$this->input->post('id_diskusi',TRUE)}.");
					$this->respon = ['sukses' => TRUE,'pesan' => 'Menyunting jawaban berhasil...'];
				}
				else
				{
					$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
				}
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jawaban diskusi tidak terdaftar.'];
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$id_jawaban = $this->input->post('id_jawaban',TRUE);

		if ($this->j_diskusi->cek_j_diskusi($id_jawaban))
		{
			if ($this->j_diskusi->cek_akses($id_jawaban))
			{
				$this->db->delete('j_diskusi',['id_j_diskusi' => $id_jawaban]);
				$this->campuran->tambah_riwayat('Y',"Menghapus jawaban diskusi ID {$id_jawaban}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus jawaban diskusi berhasil.'];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Jawaban diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ambil_sunting_komentar_loker()
	{
		$this->_akses_ajax();

		echo $this->k_loker->ambil_isi($this->input->post('id_komentar',TRUE));
	}

	public function sunting_komentar_loker()
	{
		$this->_akses_ajax();

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'id_komentar',
					'label'  => 'ID Komentar',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			],
			[
				[
					'field'  => 'komentar',
					'label'  => 'Komentar',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = ['sukses' => FALSE,'pesan' => validation_errors()];
		}
		else
		{
			$id_komentar = $this->input->post('id_komentar',TRUE);

			if ($this->k_artikel->cek_k_artikel($id_komentar))
			{
				if ($this->k_artikel->cek_akses($id_komentar))
				{
					$suntingan = $this->purifier->purify($this->ang->cw($this->input->post('sunting')));
					$this->db->update('k_loker',['isi' => $suntingan],['id_k_loker' => $id_komentar]);
					$this->campuran->tambah_riwayat('Y',"Menyunting komentar lowongan kerja ID {$this->input->post('id_loker',TRUE)}.");
					$this->respon = ['sukses' => TRUE,'pesan' => 'Menyunting komentar berhasil...'];
				}
				else
				{
					$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
				}
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar lowongan kerja tidak terdaftar.'];
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_komentar_loker()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_loker->cek_k_loker($id_komentar))
		{
			if ($this->k_loker->cek_akses($id_komentar))
			{
				$this->db->delete('k_loker',['id_k_loker' => $id_komentar]);
				$this->campuran->tambah_riwayat('Y',"Menghapus komentar lowongan kerja ID {$id_komentar}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus komentar lowongan kerja berhasil.'];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar lowongan kerja tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function muat_lebih_banyak_komentar_artikel()
	{
		$this->_akses_ajax();

		$id_artikel = $this->ang->ci($this->input->post('id_artikel',TRUE));
		$jumlah     = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index      = $this->ang->ci($this->input->post('index',TRUE));
		$html       = '';
		$data       = $this->k_artikel->ambil_limit($id_artikel,5,$index,$jumlah);

		foreach ($data as $komen)
		{
			$f = $this->pengguna->ambil_foto($komen->pengguna);
			$t = $this->pengguna->ambil_tentang($komen->pengguna);
			$p = $this->artikel->ambil_penginput($id_artikel);

			if ($this->session->has_userdata('ang_akses') && $komen->pengguna == $this->session->ang_nama_pengguna)
			{
				if ($p == $komen->pengguna)
				{
					$pengguna = substr($komen->pengguna,0,12).(strlen($komen->pengguna) > 12 ? '...' : '');
        	$pengguna = "{$pengguna}<span class='d-none d-sm-none d-md-inline'><span class='titik-pemisah'></span> Penginput</span>";
				}
				else
				{
					$pengguna = substr($komen->pengguna,0,12).(strlen($komen->pengguna) > 12 ? '...' : '');
				}
			}
      else
      {
      	if ($t === NULL)
      	{
          $tentang = 'Ngoding itu kapan saja, dimana saja dan dengan siapa saja.';
      	}
				else
				{
					$tentang = strlen($t) >= 60 ? substr($t,0,57) : $t;
				}

				$fotonya  = $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}");
				$tambahan = '';

				if ($p == $komen->pengguna)
				{
					$tambahan .= '<span class="d-none d-sm-none d-md-inline"><span class="titik-pemisah"></span> Penginput</span>';
				}

				$data_diri_selengkapnya = site_url("anggota/{$komen->pengguna}");

        $pengguna = "<span id='pengguna-komentar'>
        	<span>
        		<a href='{$data_diri_selengkapnya}'>{$komen->pengguna}</a>
          	{$tambahan}
          </span>
        </span>";
      }

      $aksi = '';

      if ($this->session->has_userdata('ang_akses'))
      {
        if ($komen->pengguna == $this->session->ang_nama_pengguna)
        {
          $aksi = "<span id='aksi-komentar'>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Sunting' onclick='sunting({$komen->id_k_artikel});'>
              <i class='fas fa-edit'></i>
            </button>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Hapus' onclick='hapus({$komen->id_k_artikel});'>
              <i class='fas fa-trash'></i>
            </button>
          </span>";
        }
        else
        {
          if (!$this->dsk_artikel->cek_apakah_sudah_menyukai($komen->id_k_artikel))
          {
            $aksi = "<span id='tombol-sukai-komentar'>
              <button id='sukai-komentar' class='btn btn-outline-danger btn-sm rounded-circle btn-love' data-toggle='tooltip' title='Sukai' data-id='{$komen->id_k_artikel}'>
                <i class='fas fa-heart'></i>
              </button>
            </span>";
          }
          else
          {
            $aksi = "<span>
            	<button class='btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love' data-toggle='tooltip' title='Anda menyukai komentar ini'><i class='fas fa-heart'></i>
            	</button>
            </span>";
          }
          if ($this->session->has_userdata('ang_pengurus'))
        	{
            $aksi .= "<button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Blok' onclick='blok_komentar({$komen->id_k_artikel});'>
              <i class='fas fa-window-close'></i>
            </button>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Hapus' onclick='hapus_komentar({$komen->id_k_artikel});'>
              <i class='fas fa-trash'></i>
            </button>";
        	}
        }
      }

      $fotonya = $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}");

      $k_isi = str_replace('<p>&nbsp;</p>', '', $komen->isi);
			$html .= "<div class='card mb-2 custom-card'>
        <div class='card-body'>
          <div class='d-flex justify-content-between align-items-center'>
            <span>
              <img src='".base_url('media/website/lazyload.gif')."' data-src='{$fotonya}' class='fp-di-komentar d-none d-sm-none d-md-inline' alt='Foto Profil {$komen->pengguna}'>
              <small class='text-muted'>{$pengguna}</small>
            </span>
            <span>
              <small class='text-muted'>
                {$this->ang->tanggal_bulan_indonesia($komen->tanggal)}
                <span class='titik-pemisah'></span>
                {$komen->jam} WIB
              </small>
            </span>
          </div>
          <hr>
          {$k_isi}
          <hr>
          <div class='d-flex justify-content-between align-items-center'>
            <small class='text-muted'><span id='jumlah-suka-{$komen->id_k_artikel}'>{$komen->jumlah_suka}</span> Jumlah Suka</small>
            <span>{$aksi}</span>
          </div>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function muat_lebih_banyak_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$id_diskusi = $this->ang->ci($this->input->post('id_diskusi',TRUE));
		$jumlah     = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index      = $this->ang->ci($this->input->post('index',TRUE));
		$html       = '';
		$data       = $this->j_diskusi->ambil_limit($id_diskusi,5,$index,$jumlah);

		foreach ($data as $j)
		{
			$f = $this->pengguna->ambil_foto($j->pengguna);
			$t = $this->pengguna->ambil_tentang($j->pengguna);
			$p = $this->diskusi->ambil_penginput($id_diskusi);

			if ($this->session->has_userdata('ang_akses') && $j->pengguna == $this->session->ang_nama_pengguna)
			{
				if ($p == $j->pengguna)
				{
					$pengguna = substr($j->pengguna,0,10).(strlen($j->pengguna) > 10 ? '...' : '');
        	$pengguna = "{$pengguna}<span class='d-none d-sm-none d-md-inline'><span class='titik-pemisah'></span> Pembuka Diskusi</span>";
        }
        else
        {
        	$pengguna = substr($j->pengguna,0,10).(strlen($j->pengguna) > 10 ? '...' : '');
        }
			}
      else
      {
      	if ($t === NULL)
      	{
          $tentang = 'Ngoding itu kapan saja, dimana saja dan dengan siapa saja.';
      	}
				else
				{
					$tentang = strlen($t) >= 60 ? substr($t,0,57) : $t;
				}

				$fotonya = $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}");
				$tambahan = '';

				if ($p == $j->pengguna)
				{
					$tambahan .= '<span class="d-none d-sm-none d-md-inline"><span class="titik-pemisah"></span> Pembuka Diskusi</span>';
				}

				$data_diri_selengkapnya = site_url("anggota/{$j->pengguna}");

        $pengguna = "<span id='pengguna-jawaban'>
        	<span>
        		<a href='{$data_diri_selengkapnya}'>{$j->pengguna}</a>
          	{$tambahan}
          </span>
        </span>";
      }

      $aksi = '';

      if ($this->session->has_userdata('ang_akses'))
      {
        if ($j->pengguna == $this->session->ang_nama_pengguna)
        {
          $aksi = "<span id='aksi-jawaban'>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Sunting' onclick='sunting({$j->id_j_diskusi});'>
              <i class='fas fa-edit'></i>
            </button>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Hapus' onclick='hapus({$j->id_j_diskusi});'>
              <i class='fas fa-trash'></i>
            </button>
          </span>";
        }
        else
        {
          if (!$this->dsjd->cek_apakah_sudah_menyukai($j->id_j_diskusi))
          {
            $aksi = "<span id='tombol-sukai-jawaban'>
              <button id='sukai-jawaban' class='btn btn-outline-danger btn-sm rounded-circle btn-love' data-toggle='tooltip' title='Sukai' data-id='{$j->id_j_diskusi}'>
                <i class='fas fa-heart'></i>
              </button>
            </span>";
          }
          else
          {
            $aksi = "<span>
            	<button class='btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love' data-toggle='tooltip' title='Anda menyukai jawaban ini'><i class='fas fa-heart'></i>
            	</button>
            </span>";
          }
          if ($this->session->has_userdata('ang_pengurus'))
        	{
            $aksi .= "<button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Blok' onclick='blok_jawaban({$j->id_j_diskusi});'>
	            <i class='fas fa-window-close'></i>
	          </button>
	          <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Hapus' onclick='hapus_jawaban({$j->id_j_diskusi});'>
	            <i class='fas fa-trash'></i>
	          </button>";
        	}
        }
      }

      $fotonya = $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}");

      $j_isi = str_replace('<p>&nbsp;</p>', '', $j->isi);
			$html .= "<div class='card mb-2 custom-card'>
        <div class='card-body'>
          <div class='d-flex justify-content-between align-items-center'>
            <span>
              <img src='".base_url('media/website/lazyload.gif')."' data-src='{$fotonya}' class='fp-di-jawaban d-none d-sm-none d-md-inline' alt='Foto Profil {$j->pengguna}'>
              <small class='text-muted'>{$pengguna}</small>
            </span>
            <span>
              <small class='text-muted'>
                {$this->ang->tanggal_bulan_indonesia($j->tanggal)}
                <span class='titik-pemisah'></span>
                {$j->jam} WIB
              </small>
            </span>
          </div>
          <hr>
          {$j_isi}
          <hr>
          <div class='d-flex justify-content-between align-items-center'>
            <small class='text-muted'><span id='jumlah-suka-{$j->id_j_diskusi}'>{$j->jumlah_suka}</span> Jumlah Suka</small>
						<span>{$aksi}</span>
          </div>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function muat_lebih_banyak_komentar_loker()
	{
		$this->_akses_ajax();

		$id_loker = $this->ang->ci($this->input->post('id_loker',TRUE));
		$jumlah   = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index    = $this->ang->ci($this->input->post('index',TRUE));
		$html     = '';
		$data     = $this->k_loker->ambil_limit($id_loker,5,$index,$jumlah);

		foreach ($data as $komen)
		{
			$f = $this->pengguna->ambil_foto($komen->pengguna);
			$t = $this->pengguna->ambil_tentang($komen->pengguna);
			$p = $this->loker->ambil_penginput($id_loker);

			if ($this->session->has_userdata('ang_akses') && $komen->pengguna == $this->session->ang_nama_pengguna)
			{
				if ($p == $komen->pengguna)
				{
					$pengguna = substr($komen->pengguna,0,12).(strlen($komen->pengguna) > 12 ? '...' : '');
        	$pengguna = "{$pengguna}<span class='d-none d-sm-none d-md-inline'><span class='titik-pemisah'></span> Penginput</span>";
        }
        else
        {
        	$pengguna = substr($komen->pengguna,0,12).(strlen($komen->pengguna) > 12 ? '...' : '');
        }
			}
      else
      {
      	if ($t === NULL)
      	{
          $tentang = 'Ngoding itu kapan saja, dimana saja dan dengan siapa saja.';
      	}
				else
				{
					$tentang = strlen($t) >= 60 ? substr($t,0,57) : $t;
				}

				$fotonya  = $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}");
				$tambahan = '';

				if ($p == $komen->pengguna)
				{
					$tambahan .= '<span class="d-none d-sm-none d-md-inline"><span class="titik-pemisah"></span> Penginput</span>';
				}

				$data_diri_selengkapnya = site_url("anggota/{$komen->pengguna}");

        $pengguna = "<span id='pengguna-komentar'>
          <span>
          	<a href='{$data_diri_selengkapnya}'>{$komen->pengguna}</a>
          	{$tambahan}
          </span>
        </span>";
      }

      $aksi = '';

      if ($this->session->has_userdata('ang_akses'))
      {
        if ($komen->pengguna == $this->session->ang_nama_pengguna)
        {
          $aksi = "<span id='aksi-komentar'>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Sunting' onclick='sunting({$komen->id_k_loker});'>
              <i class='fas fa-edit'></i>
            </button>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Hapus' onclick='hapus({$komen->id_k_loker});'>
              <i class='fas fa-trash'></i>
            </button>
          </span>";
        }
        else
        {
          if (!$this->dsk_loker->cek_apakah_sudah_menyukai($komen->id_k_loker))
          {
            $aksi = "<span id='tombol-sukai-komentar'>
              <button id='sukai-komentar' class='btn btn-outline-danger btn-sm rounded-circle btn-love' data-toggle='tooltip' title='Sukai' data-id='{$komen->id_k_loker}'>
                <i class='fas fa-heart'></i>
              </button>
            </span>";
          }
          else
          {
            $aksi = "<span>
            	<button class='btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love' data-toggle='tooltip' title='Anda menyukai komentar ini'>
            		<i class='fas fa-heart'></i>
            	</button>
            </span>";
          }
          if ($this->session->has_userdata('ang_pengurus'))
        	{
            $aksi .= "<button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Blok' onclick='blok_komentar({$komen->id_k_loker});'>
              <i class='fas fa-window-close'></i>
            </button>
            <button class='btn btn-outline-secondary btn-sm rounded-circle' data-toggle='tooltip' title='Hapus' onclick='hapus_komentar({$komen->id_k_loker});'>
              <i class='fas fa-trash'></i>
            </button>";
        	}
        }
      }

      $fotonya = $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}");

      $k_isi = str_replace('<p>&nbsp;</p>', '', $komen->isi);
			$html .= "<div class='card mb-2 custom-card'>
        <div class='card-body'>
          <div class='d-flex justify-content-between align-items-center'>
            <span>
              <img src='".base_url('media/website/lazyload.gif')."' data-src='{$fotonya}' class='fp-di-komentar d-none d-sm-none d-md-inline' alt='Foto Profil {$komen->pengguna}'>
              <small class='text-muted'>{$pengguna}</small>
            </span>
            <span>
              <small class='text-muted'>
                {$this->ang->tanggal_bulan_indonesia($komen->tanggal)}
                <span class='titik-pemisah'></span>
                {$komen->jam} WIB
              </small>
            </span>
          </div>
          <hr>
          {$k_isi}
          <hr>
          <div class='d-flex justify-content-between align-items-center'>
            <small class='text-muted'><span id='jumlah-suka-{$komen->id_k_loker}'>{$komen->jumlah_suka}</span> Jumlah Suka</small>
						<span>{$aksi}</span>
          </div>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function semua_anggota()
	{
		$data = [
			'semua_awal' => $this->pengguna->semua(102, 3),
			'terbaik'    => $this->pengguna->peringkat_1_sampai_3(),
			'jumlah'     => $this->pengguna->semua_jumlah()
		];

		$this->load->view('web/lainnya/semua-anggota', $data);
	}

	public function lihat_lebih_banyak_semua_anggota()
	{
		$this->_akses_ajax();

		$jumlah = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index  = $this->ang->ci($this->input->post('index',TRUE));
		$html   = '';
		$data   = $this->pengguna->semua(105,$index,$jumlah);

		foreach ($data as $p)
		{
			$nleng = $p->nama_lengkap ?? '-';
			$lazy  = base_url('media/website/lazyload.gif');
			$href  = site_url("anggota/{$p->nama_pengguna}");
			$src   = base_url('media/foto-pengguna/'.($p->foto ?? 'blank.png'));
			$xxx   = strlen($p->nama_pengguna) >= 13 ? substr($p->nama_pengguna, 0, 10).'...' : $p->nama_pengguna;
			$html .= "<div class='col-md-6 col-lg-4'>
        <div class='card card-100 custom-card'>
          <div class='card-body text-center'>
            <img src='{$lazy}' data-src='{$src}' class='landing-anggota-terbaik' alt='Foto {$p->nama_pengguna}'>
            <hr class='mt-2 mb-2'>
            <p class='mb-0' style='font-family: \"BT\"; font-size: 16px;'>{$p->nama_pengguna}</p>
            <p class='mb-0'>{$nleng}</p>
            <hr class='mt-2 mb-2'>
            <div class='mb-3'>
            	<span class='badge badge-pill badge-secondary' data-toggle='tooltip' title='Poin Belajar'>{$p->poin_belajar}</span>
            	<span class='badge badge-pill badge-secondary' data-toggle='tooltip' title='Poin Diskusi'>{$p->poin_diskusi}</span>
            	<span class='badge badge-pill badge-secondary' data-toggle='tooltip' title='Jumlah Kontribusi'>{$p->jumlah_kontribusi}</span>
            </div>
            <a href='{$href}' class='btn btn-outline-danger btn-block btn-sm btn-custom-click' target='_blank'>Lihat Data Diri {$xxx}</a>
          </div>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function rincian_anggota($nama_pengguna)
	{
		if ($this->pengguna->cek_data_diri($nama_pengguna) > 0)
		{
			$loker        = $this->loker->ambil_untuk_data_diri($nama_pengguna);
			$artikel      = $this->artikel->ambil_untuk_data_diri($nama_pengguna);
			$diskusi      = $this->diskusi->ambil_untuk_data_diri($nama_pengguna);
			$data_diri    = $this->pengguna->ambil_data_diri($nama_pengguna);
			$persentase   = $this->pengguna->ambil_persentase_pembelajaran($nama_pengguna);
			$pencapaian   = $this->p_pencapaian->ambil_untuk_data_diri($nama_pengguna);
			$sertifikat   = $this->p_sertifikat->ambil_untuk_data_diri($nama_pengguna);
			$k_sertifikat = $this->p_sertifikat->ambil_kustom_untuk_data_diri($nama_pengguna);
			$s_loker      = $this->loker->ambil_untuk_data_diri_jumlah($nama_pengguna);
			$s_artikel    = $this->artikel->ambil_untuk_data_diri_jumlah($nama_pengguna);
			$s_diskusi    = $this->diskusi->ambil_untuk_data_diri_jumlah($nama_pengguna);
			$s_pencapaian = $this->p_pencapaian->ambil_untuk_data_diri_jumlah($nama_pengguna);
			$s_sertifikat = $this->p_sertifikat->ambil_untuk_data_diri_jumlah($nama_pengguna);

			$this->load->view('web/lainnya/rincian-anggota',[
				'artikel'          => $artikel,
				's_artikel'        => $s_artikel, // selengkapnya
				'diskusi'          => $diskusi,
				's_diskusi'        => $s_diskusi, // selengkapnya
				'data_diri'        => $data_diri,
				'persentase'       => $persentase,
				'pencapaian'       => $pencapaian,
				's_pencapaian'     => $s_pencapaian, // selengkapnya
				'sertifikat'       => $sertifikat,
				'k_sertifikat'     => $k_sertifikat,
				's_sertifikat'     => $s_sertifikat, // selengkapnya
				'lowongan_kerja'   => $loker,
				's_lowongan_kerja' => $s_loker // selengkapnya
			]);
		}
		else
		{
			show_404();
		}
	}

	public function rincian_anggota_artikel($nama_pengguna)
	{
		if ($this->pengguna->cek_data_diri($nama_pengguna) > 0)
		{
			$this->load->view('web/lainnya/semua-artikel-anggota', [
				'semua_artikel_awal' => $this->artikel->ambil_by_nama_pengguna_limit($nama_pengguna,25,0),
				'jumlah'             => $this->artikel->jumlah_untuk_limit($nama_pengguna)
			]);
		}
		else
		{
			show_404();
		}
	}

	public function lihat_lebih_banyak_semua_artikel_anggota()
	{
		$this->_akses_ajax();

		$jumlah        = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index         = $this->ang->ci($this->input->post('index',TRUE));
		$nama_pengguna = $this->ang->ci($this->input->post('nama_pengguna',TRUE));
		$html          = '';
		$data          = $this->artikel->ambil_by_nama_pengguna_limit($nama_pengguna,25,$index,$jumlah);

		foreach ($data as $artikel)
		{
			$link = site_url("artikel/{$artikel->id_artikel}/{$artikel->slug}");
			$html .= "<div class='card mb-3 custom-card'>
        <div class='card-body'>
          <p class='mb-0 konten-semua-artikel'><a href='{$link}' target='_blank'>{$artikel->judul}</a></p>
          <span class='waktu-semua-artikel text-secondary'>Waktu posting: {$this->ang->tanggal_bulan_indonesia($artikel->tanggal_posting)} {$artikel->jam_posting} WIB</span>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function rincian_anggota_diskusi($nama_pengguna)
	{
		if ($this->pengguna->cek_data_diri($nama_pengguna) > 0)
		{
			$this->load->view('web/lainnya/semua-diskusi-anggota', [
				'semua_diskusi_awal' => $this->diskusi->ambil_by_nama_pengguna_limit($nama_pengguna,25,0),
				'jumlah'             => $this->diskusi->jumlah_untuk_limit($nama_pengguna)
			]);
		}
		else
		{
			show_404();
		}
	}

	public function lihat_lebih_banyak_semua_diskusi_anggota()
	{
		$this->_akses_ajax();

		$jumlah        = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index         = $this->ang->ci($this->input->post('index',TRUE));
		$nama_pengguna = $this->ang->ci($this->input->post('nama_pengguna',TRUE));
		$html          = '';
		$data          = $this->diskusi->ambil_by_nama_pengguna_limit($nama_pengguna,25,$index,$jumlah);

		foreach ($data as $diskusi)
		{
			$link = site_url("diskusi/{$diskusi->id_diskusi}/{$diskusi->slug}");
			$html .= "<div class='card mb-3 custom-card'>
        <div class='card-body'>
          <p class='mb-0 konten-semua-diskusi'><a href='{$link}' target='_blank'>{$diskusi->judul}</a></p>
          <span class='waktu-semua-diskusi text-secondary'>Waktu posting: {$this->ang->tanggal_bulan_indonesia($diskusi->tanggal_posting)} {$diskusi->jam_posting} WIB</span>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function rincian_anggota_lowongan_kerja($nama_pengguna)
	{
		if ($this->pengguna->cek_data_diri($nama_pengguna) > 0)
		{
			$this->load->view('web/lainnya/semua-lowongan-kerja-anggota', [
				'semua_lowongan_kerja_awal' => $this->loker->ambil_by_nama_pengguna_limit($nama_pengguna,25,0),
				'jumlah'                    => $this->loker->jumlah_untuk_limit($nama_pengguna)
			]);
		}
		else
		{
			show_404();
		}
	}

	public function lihat_lebih_banyak_semua_lowongan_kerja_anggota()
	{
		$this->_akses_ajax();

		$jumlah        = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index         = $this->ang->ci($this->input->post('index',TRUE));
		$nama_pengguna = $this->ang->ci($this->input->post('nama_pengguna',TRUE));
		$html          = '';
		$data          = $this->loker->ambil_by_nama_pengguna_limit($nama_pengguna,25,$index,$jumlah);

		foreach ($data as $loker)
		{
			$link = site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}");
			$kntn = ucwords("lowongan kerja di {$loker->nama_perusahaan} sebagai {$loker->posisi}");
			$html .= "<div class='card mb-3 custom-card'>
        <div class='card-body'>
          <p class='mb-0 konten-semua-lowongan-kerja'><a href='{$link}' target='_blank'>{$kntn}</a></p>
          <span class='waktu-semua-lowongan-kerja text-secondary'>Waktu posting: {$this->ang->tanggal_bulan_indonesia($loker->tanggal_posting)} {$loker->jam_posting} WIB</span>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function rincian_anggota_pencapaian($nama_pengguna)
	{
		if ($this->pengguna->cek_data_diri($nama_pengguna) > 0)
		{
			if ($this->pengguna->ambil_level($nama_pengguna) != 'anggota' && $this->session->ang_nama_pengguna != $nama_pengguna)
			{
				show_404();
			}

			$this->load->view('web/lainnya/semua-pencapaian-anggota', [
				'semua_pencapaian_awal' => $this->p_pencapaian->ambil_by_nama_pengguna_limit($nama_pengguna,25,0),
				'jumlah'                => $this->p_pencapaian->jumlah_untuk_limit($nama_pengguna)
			]);
		}
		else
		{
			show_404();
		}
	}

	public function lihat_lebih_banyak_semua_pencapaian_anggota()
	{
		$this->_akses_ajax();

		$jumlah        = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index         = $this->ang->ci($this->input->post('index',TRUE));
		$nama_pengguna = $this->ang->ci($this->input->post('nama_pengguna',TRUE));
		$html          = '';
		$data          = $this->p_pencapaian->ambil_by_nama_pengguna_limit($nama_pengguna,25,$index,$jumlah);

		foreach ($data as $pencapaian)
		{
			$html .= "<div class='card mb-3 custom-card'>
        <div class='card-body'>
          <p class='mb-0 konten-semua-pencapaian'><a href='javascript:void(0);' class='rincian-pencapaian' data-nama_pencapaian='{$pencapaian->nama_pencapaian}' data-gambar='{$pencapaian->gambar}' data-tanggal_tercapai='{$pencapaian->tanggal_tercapai}' data-jam_tercapai='{$pencapaian->jam_tercapai}'>{$pencapaian->nama_pencapaian}</a></p>
          <span class='waktu-semua-pencapaian text-secondary'>Waktu memperoleh: {$this->ang->tanggal_bulan_indonesia($pencapaian->tanggal_tercapai)} {$pencapaian->jam_tercapai} WIB</span>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function rincian_anggota_sertifikat($nama_pengguna)
	{
		if ($this->pengguna->cek_data_diri($nama_pengguna) > 0)
		{
			if ($this->pengguna->ambil_level($nama_pengguna) != 'anggota' && $this->session->ang_nama_pengguna != $nama_pengguna)
			{
				show_404();
			}

			$this->load->view('web/lainnya/semua-sertifikat-anggota', [
				'semua_sertifikat_awal' => $this->p_sertifikat->ambil_by_nama_pengguna_limit($nama_pengguna,25,0),
				'jumlah'                => $this->p_sertifikat->jumlah_untuk_limit($nama_pengguna)
			]);
		}
		else
		{
			show_404();
		}
	}

	public function lihat_lebih_banyak_semua_sertifikat_anggota()
	{
		$this->_akses_ajax();

		$jumlah        = $this->ang->ci($this->input->post('jumlah',TRUE));
		$index         = $this->ang->ci($this->input->post('index',TRUE));
		$nama_pengguna = $this->ang->ci($this->input->post('nama_pengguna',TRUE));
		$html          = '';
		$data          = $this->p_sertifikat->ambil_by_nama_pengguna_limit($nama_pengguna,25,$index,$jumlah);

		foreach ($data as $serti)
		{
			$id = urlencode(str_replace('=', '', base64_encode("sertifikat-{$serti->id_p_sertifikat}")));
			$id = str_replace('%3D','',$id);
			$ls = site_url("sertifikat/{$id}");

			$html .= "<div class='card mb-3 custom-card'>
        <div class='card-body'>
          <p class='mb-0 konten-semua-sertifikat'><a href='{$ls}' target='_blank'>{$serti->nama_sertifikat}</a></p>
          <span class='waktu-semua-sertifikat text-secondary'>Waktu memperoleh: {$this->ang->tanggal_bulan_indonesia($serti->tanggal_memperoleh)} {$serti->jam_memperoleh} WIB</span>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function notifikasi()
	{
		if ($this->session->ang_akses === NULL)
		{
			if ($_SERVER['CI_ENV'] == 'development')
			{
				redirect('masuk?selanjutnya=/alwaysngoding/notifikasi');
			}
			else
			{
				redirect('masuk?selanjutnya=/notifikasi');
			}
		}

		$data = ['notifikasi_awal' => $this->notifikasi->ambil_limit(50,0),'jumlah' => $this->notifikasi->jumlah_untuk_limit()];

		$this->db->query("UPDATE {$this->db->dbprefix('notifikasi')} SET baru = 'N' WHERE untuk = '{$this->db->escape_str($this->session->ang_nama_pengguna)}'");

		$this->load->view('web/lainnya/notifikasi',$data);
	}

	public function lihat_lebih_banyak_notifikasi()
	{
		$this->_akses_ajax();

		$jumlah = $this->input->post('jumlah',TRUE);
		$index  = $this->input->post('index',TRUE);
		$html   = '';
		$data   = $this->notifikasi->ambil_limit(50,$index,$jumlah);

		foreach ($data as $notif)
		{
			$html .= "<div class='card mb-3 custom-card'>
        <div class='card-body'>
          <p class='mb-0 konten-notifikasi'>{$notif->konten}</p>
          <span class='waktu-notifikasi text-secondary'>{$notif->tanggal_waktu}</span>
        </div>
      </div>";
		}

		$this->respon = ['html' => $html];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function sertifikat($enkripsi)
	{
		$kode = explode("-", base64_decode(urldecode($enkripsi)));

		if (@$kode[0] !== NULL && @$kode[1] !== NULL && @$kode[2] === NULL)
		{
			if ($kode[0] == 'sertifikat' && intval($kode[1]) > 0)
			{
	      $data = $this->p_sertifikat->ambil_data_lengkap($kode[1]);

	      if ($data)
	      {
	      	require APPPATH.'third_party/fpdf/fpdf.php';
	      	require APPPATH.'third_party/fpdi/autoload.php';

	      	$link = site_url("sertifikat/{$this->uri->segment(2)}");
		      $_pdf = new Fpdi('P','mm', array(241.3,304.8));

	       	$_pdf->setTitle("Always Ngoding");
	       	$_pdf->setAuthor("Muhammad Saleh Solahudin");
	       	$_pdf->setCreator("Muhammad Saleh Solahudin");
	       	$_pdf->setSubject("Always Ngoding");
					$_pdf->AddPage();
					$_pdf->setSourceFile('./media/sertifikat/desain/sertifikat.pdf');

					$_tpl = $_pdf->importPage(1);
					$size = $_pdf->getTemplateSize($_tpl);

					$_pdf->useTemplate($_tpl, 0, 0, $size['width'], $size['height'], true);
					$_pdf->AddFont('bsfbr', '', 'bsfbr.php');
					$_pdf->SetFont('bsfbr', '', 65);

					$_pdf->SetXY(93.5, 181);
					$_pdf->Write(0, $data->nama_lengkap ?? $data->pengguna);
					$_pdf->SetXY(93.5, 250.8);
					$_pdf->Write(0, "Belajar {$data->nama_sertifikat}");

					$_pdf->SetFont('bsfbr', '', 50);
					$_pdf->SetXY(93.8, 358.2);
					$_pdf->Write(0, $this->ang->tanggal_bulan_indonesia(date('Y-m-d', strtotime($data->tanggal_memperoleh))));

					$_pdf->SetFont('bsfbr', '', 35);

					$_1 = 'ID Sertifikat : ';
					$_2 = $this->uri->segment(2);
					$_pdf->SetXY(707.1-$_pdf->GetStringWidth($_2), 356);
					$_pdf->SetTextColor(107,107,107);
					$_pdf->Cell($_pdf->GetStringWidth($_1),2,$_1, 0,'L');
					$_pdf->SetTextColor(0,0,0);
					$_pdf->Cell($_pdf->GetStringWidth($_2),2,$_2, 0,'R');

					$_1 = 'Berlaku Hingga : ';
					$_2 = $this->ang->tanggal_bulan_indonesia(date('Y-m-d', strtotime("{$data->tanggal_memperoleh} +3 years")));
					$_pdf->SetXY(686.8-$_pdf->GetStringWidth($_2), 378);
					$_pdf->SetTextColor(107,107,107);
					$_pdf->Cell($_pdf->GetStringWidth($_1),2,$_1, 0,'L');
					$_pdf->SetTextColor(0,0,0);
					$_pdf->Cell($_pdf->GetStringWidth($_2),2,$_2, 0,'R');

					$_1 = 'Scan Untuk Verifikasi Sertifikat :';
					$_pdf->SetXY(777-$_pdf->GetStringWidth($_1), 401);
					$_pdf->SetTextColor(107,107,107);
					$_pdf->Cell($_pdf->GetStringWidth($_1),1,$_1, 0,'R');

					// $_pdf->Image("https://chart.googleapis.com/chart?chs=200x200&chf=bg,s,00000000&cht=qr&chl={$link}&chld=L|1&choe=UTF-8",695.3,411.5,90,90,'PNG');
					$_pdf->Image("https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={$link}",686.5,411.5,90,90,'PNG');

					$_pdf->Output('I',"sertifikat.pdf");
	      }
	      else
	      {
	      	show_404();
	      }
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_404();
		}
	}

	public function tentang()
	{
		$this->load->view('web/lainnya/tentang');
	}

	public function pertanyaan_umum()
	{
		$this->load->view('web/lainnya/pertanyaan-umum');
	}

	public function syarat_dan_ketentuan()
	{
		$this->load->view('web/lainnya/syarat-dan-ketentuan');
	}

	public function kebijakan_privasi()
	{
		$this->load->view('web/lainnya/kebijakan-privasi');
	}

	public function tim()
	{
		$data = [
			'donatur' => $this->campuran->ambil_donatur()
		];

		$this->load->view('web/lainnya/tim', $data);
	}

	public function hall_of_fame()
	{
		$data = [
			'hof' => $this->campuran->ambil_hof()
		];

		$this->load->view('web/lainnya/hall-of-fame', $data);
	}

	public function donasi()
	{
		$this->load->view('web/lainnya/donasi');
	}

	public function token_donasi()
	{
		if (!ang_integration_enabled('midtrans'))
		{
			$this->output->set_status_header(503)->set_content_type('application/json')
				->set_output(json_encode(['sukses' => FALSE, 'pesan' => 'Donasi online sedang tidak tersedia.']));
			return;
		}

		$this->_akses_ajax();

		$this->load->library('midtrans');

		$this->midtrans->config([
			'server_key' => $_ENV['MIDTRANS_SERVER_KEY'],
			'production' => ang_env_flag('MIDTRANS_IS_PRODUCTION')
		]);

		$an      = $this->ang->ci($this->input->post('donatur', TRUE));
		$jumlah  = $this->input->post('_jumlah', TRUE);
		$jumlah  = $jumlah < 10000 ? 10000 : $jumlah;
		$catatan = $this->ang->ci($this->input->post('catatan', TRUE));

		if ($this->session->ang_akses)
		{
			$an = $an == "1" ? $this->session->ang_nama_pengguna : 'Anonim';
		}
		else
		{
			$an = 'Anonim';
		}

		$o_id = "D-{$an}-".rand(10000,99999);

		$transaksi = [
			'order_id'     => $o_id,
			'gross_amount' => ceil($jumlah)
		];

		$data_diri = [
			'first_name' => $an,
			'last_name'  => '(Always Ngoding)'
		];

		$item = [
			'id'       => $o_id,
			'price'    => ceil($jumlah),
			'name'     => "Donasi untuk Always Ngoding.",
			'quantity' => 1
		];

		$dataTrans = ['transaction_details' => $transaksi,'customer_details' => $data_diri,'item_details' => $item];
		$snapToken = $this->midtrans->getSnapToken($dataTrans);

    echo $snapToken;
	}

	public function selesai_donasi()
	{
		if (!ang_integration_enabled('midtrans'))
		{
			$this->output->set_status_header(503)->set_content_type('application/json')
				->set_output(json_encode(['sukses' => FALSE, 'pesan' => 'Donasi online sedang tidak tersedia.']));
			return;
		}

		if ($this->input->post())
  	{
	  	$this->load->library('midtrans');

			$this->midtrans->config([
				'server_key' => $_ENV['MIDTRANS_SERVER_KEY'],
				'production' => ang_env_flag('MIDTRANS_IS_PRODUCTION')
			]);

	  	$hsil = json_decode($this->input->post('hasil_data'));
	  	$stts = $this->midtrans->status($hsil->order_id)->transaction_status;
	  	$data = [
				'kode'            => $hsil->order_id,
				'transaksi_id'    => $hsil->transaction_id,
				'tipe_pembayaran' => $hsil->payment_type,
				'jumlah'          => $hsil->gross_amount,
				'tanggal'         => $hsil->transaction_time,
				'catatan'         => trim($hsil->catatan) == '' ? '-' : trim($hsil->catatan),
				'status'          => $stts
	  	];

	  	if ($stts == 'settlement')
	  	{
				$pisah    = explode('-', $hsil->order_id);
				$pengguna = $pisah[1];
				$catatan  = trim($hsil->catatan) == '' ? '-' : trim($hsil->catatan);
				$rupiah   = number_format($hsil->gross_amount,0,',','.');
				$donasi   = [
					'pengguna' => $pengguna == 'Anonim' ? NULL : $pengguna,
					'jumlah'   => $hsil->gross_amount,
					'catatan'  => $catatan,
					'waktu'    => $hsil->transaction_time
	  		];

				$msg = "{$pengguna} mendonasikan Rp{$rupiah},- nya untuk Always Ngoding dengan catatan: {$catatan}.";
	  		$this->db->insert('donasi', $donasi);
	  		$this->campuran->tambah_riwayat('N',$msg);
	  		$this->ang->bot($msg);

	  		if ($pengguna != 'Anonim')
	  		{
	  			$this->notifikasi->input($pengguna,"Terima kasih atas donasi yang anda berikan untuk Always Ngoding.","tim?aksi=goToPahlawan");
	  		}

				$this->session->set_flashdata('informasi','Terima kasih atas donasi yang anda berikan untuk Always Ngoding.');
	  	}
	  	else
	  	{
	  		$this->session->set_flashdata('informasi','Terima kasih atas niat donasi anda untuk Always Ngoding.');
	  	}

	  	$this->db->insert('midtrans', $data);

	  	redirect($this->input->post('redirect', TRUE));
	  }
	  else
	  {
	  	show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
	  }
	}

	public function update_donasi()
	{
		if (!ang_integration_enabled('midtrans'))
		{
			$this->output->set_status_header(503)->set_content_type('application/json')
				->set_output(json_encode(['sukses' => FALSE, 'pesan' => 'Donasi online sedang tidak tersedia.']));
			return;
		}

		$update = FALSE;

		if ($this->campuran->jtmu_api() > 0)
		{
			foreach ($this->campuran->atmu_api() as $d)
			{
				$update = $this->campuran->update_status_donasi($d->kode);
			}

			if ($update)
			{
				$this->respon = ['sukses' => TRUE,'pesan' => 'berhasil mengupdate beberapa transaksi midtrans.'];
			}
			else
			{
				$this->respon = ['sukses' => FALSE];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE];
		}

		echo json_encode($this->respon);
	}

	public function iklan($hash)
	{
		$panjang_1   = $this->iklan->ambil_iklan_untuk_ditampilkan('panjang 1 iklan');
		$panjang_2   = $this->iklan->ambil_iklan_untuk_ditampilkan('panjang 2 iklan');
		$kolom_1     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 1 iklan');
		$kolom_2     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 2 iklan');
		$kolom_3     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 3 iklan');
		$kolom_4     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 4 iklan');
		$kolom_5     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 5 iklan');
		$kolom_6     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 6 iklan');
		$kolom_7     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 7 iklan');
		$kolom_8     = $this->iklan->ambil_iklan_untuk_ditampilkan('kolom 8 iklan');
		$link_tujuan = 'https://wa.me/62'.substr($this->campuran->konfigurasi()->whatsapp, 1);
		$panjang     = 'sa-panjang.png';
		$kotak       = 'sa-kotak.png';

		$data = [
			'data'      => $this->link_iklan->ambil_by_hash($hash),
			'panjang_1' => $panjang_1 ?? (object)['gambar' => $panjang, 'link_tujuan' => $link_tujuan],
			'panjang_2' => $panjang_2 ?? (object)['gambar' => $panjang, 'link_tujuan' => $link_tujuan],
			'kolom_1'   => $kolom_1 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan],
			'kolom_2'   => $kolom_2 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan],
			'kolom_3'   => $kolom_3 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan],
			'kolom_4'   => $kolom_4 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan],
			'kolom_5'   => $kolom_5 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan],
			'kolom_6'   => $kolom_6 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan],
			'kolom_7'   => $kolom_7 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan],
			'kolom_8'   => $kolom_8 ?? (object)['gambar' => $kotak, 'link_tujuan' => $link_tujuan]
		];

		$this->load->view('web/lainnya/iklan', $data);
	}

	public function ambil_link_asli_dari_iklan()
	{
		$this->_akses_ajax();

		$hash = $this->input->post('key', TRUE);
		echo $this->link_iklan->ambil_link_asli_by_hash($hash);
	}

	public function cek_pencapaian()
	{
		$this->_akses_ajax();

		$key  = $this->input->post('key', TRUE);
		$nama = $this->session->ang_nama_pengguna;

		if ($key == 'posting')
		{
			$poin = $this->db->select('COUNT(id_artikel) AS hasil')
											 ->from('artikel')
											 ->where(['penginput' => $nama, 'status' => 'aktif'])
											 ->get()
											 ->row()
											 ->hasil;

			$q = $this->db->select('id_pencapaian,nama_pencapaian,gambar')
											->from('pencapaian')
											->where(['tipe' => 'untuk jumlah posting','target >=' => $poin-10,'target <=' => $poin])
											->limit(1)
											->get();
		}
		elseif ($key == 'kontribusi')
		{
			$poin = $this->db->select('jumlah_kontribusi')
											 ->from('pengguna')
											 ->where('nama_pengguna',$nama)
											 ->get()
											 ->row()
											 ->jumlah_kontribusi;

			$q = $this->db->select('id_pencapaian,nama_pencapaian,gambar')
											->from('pencapaian')
											->where(['tipe' => 'untuk jumlah kontribusi','target >=' => $poin-10,'target <=' => $poin])
											->limit(1)
											->get();
		}
		elseif ($key == 'diskusi')
		{
			$poin = $this->db->select('poin_diskusi')
											 ->from('pengguna')
											 ->where('nama_pengguna',$nama)
											 ->get()
											 ->row()
											 ->poin_diskusi;

			$q = $this->db->select('id_pencapaian,nama_pencapaian,gambar')
											->from('pencapaian')
											->where(['tipe' => 'untuk jumlah poin diskusi','target >=' => $poin-10,'target <=' => $poin])
											->limit(1)
											->get();
		}
		else
		{
			$this->respon = ['pencapaian' => NULL];
			echo json_encode($this->respon);
			exit;
		}

		if ($q->num_rows() > 0)
		{
			$data = $q->row();
			$_cek = $this->db->select('id_p_pencapaian')
											 ->from('p_pencapaian')
											 ->where(['pengguna' => $nama,'id_pencapaian' => $data->id_pencapaian])
											 ->get()
											 ->num_rows();

			if ($_cek == 0)
			{
				$this->db->insert('p_pencapaian', [
					'id_pencapaian'    => $data->id_pencapaian,
					'pengguna'         => $nama,
					'tanggal_tercapai' => date('Y-m-d'),
					'jam_tercapai'     => date('H:i:s')
				]);

				$this->notifikasi->input($nama,"Selamat, anda meraih pencapaian <q>{$data->nama_pencapaian}</q>.","anggota/{$nama}");
				$this->ang->kakd("{$nama} (".site_url("anggota/{$nama}").") meraih pencapaian baru yaitu: {$data->nama_pencapaian}, selamat untuk {$nama} atas pencapaian yang telah anda raih :partying_face:");

				$r = $data;
			}
			else
			{
				$r = NULL;
			}
		}
		else
		{
			$r = NULL;
		}

		$this->respon = ['pencapaian' => $r];
		echo json_encode($this->respon);
	}

	public function pemeliharaan()
	{
		$pemeliharaan = $this->db->select('pemeliharaan')->from('konfigurasi')->get()->row()->pemeliharaan == 'Y';

		if ($pemeliharaan && !$this->session->has_userdata('ang_pengurus'))
		{
			$this->load->view('web/lainnya/pemeliharaan');
		}
		else
		{
			redirect();
		}
	}

	public function partner()
	{
		$this->load->view('web/lainnya/partner');
	}
}
