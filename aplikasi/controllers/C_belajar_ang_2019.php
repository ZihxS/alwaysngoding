<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_belajar_ang_2019 extends CI_Controller
{
	private $respon = [];
	private $kesalahan = [];

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

		$pemeliharaan = $this->db->select('pemeliharaan')->from('konfigurasi')->get()->row()->pemeliharaan == 'Y';

		if ($pemeliharaan && !$this->session->has_userdata('ang_pengurus'))
		{
			redirect('pemeliharaan');
			exit;
		}

		$exceptWajibLogin = ['belajar-html/teori', 'belajar-css/teori', 'belajar-php/teori', 'belajar-mysql/teori', 'belajar-javascript/teori'];
		$link = "{$this->uri->segment(1)}/{$this->uri->segment(2)}";

		if (!(in_array($link, $exceptWajibLogin) && $this->uri->segment(3) === NULL))
		{
			if (!$this->session->has_userdata('ang_akses'))
			{
				$this->session->set_flashdata('pesan','Sebelum memulai belajar silahkan masuk terlebih dahulu.');

				if ($_SERVER['CI_ENV'] == 'development')
				{
					redirect('masuk?selanjutnya=/alwaysngoding/belajar');
				}
				else
				{
					redirect('masuk?selanjutnya=/belajar');
				}
			} else {
				if ($this->session->has_userdata('ang_anggota')) {
					$nama_pengguna = $this->session->ang_nama_pengguna;
					$session_terakhir_ubah_kata_sandi = $this->session->terakhir_ubah_kata_sandi;
					if ($this->pengguna->ambil_terakhir_ubah_kata_sandi($nama_pengguna) != $session_terakhir_ubah_kata_sandi) {
						redirect('anggota/keluar');
					}
				}
			}
		}
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

	private function _warna_chart($persentase)
	{
		if ($persentase >= 1 && $persentase < 25)
		{
			return "teal";
		}
		elseif ($persentase >= 25 && $persentase < 50)
		{
			return "blue";
		}
		elseif ($persentase >= 50 && $persentase < 85)
		{
			return "orange";
		}
		elseif ($persentase >= 85)
		{
			return "red";
		}
		else
		{
			return "grey";
		}
	}

	private function _persentase($n,$j)
	{
		return ($n/$j)*100;
	}

	private function _glot_api($nama_file, $konten, $bahasa, $versi = "latest")
	{
		if (!ang_integration_enabled('glot'))
		{
			$this->output->set_status_header(503);
			return ['sukses' => FALSE, 'message' => 'Eksekusi kode sedang tidak tersedia.'];
		}

		$this->_akses_ajax();

    $ch = curl_init();
    $dt = ["files" => [['name' => $nama_file, 'content' => $konten]]];

		curl_setopt_array($ch, [
			CURLOPT_URL            => "https://glot.io/api/run/{$bahasa}/{$versi}",
			CURLOPT_POST           => TRUE,
			CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'Authorization: Token '.ang_env_value('GLOT_API_TOKEN')],
			CURLOPT_POSTFIELDS     => json_encode($dt),
			CURLOPT_RETURNTRANSFER => TRUE
		]);

    $output = curl_exec($ch); curl_close($ch);
    $respon = json_decode($output, TRUE);

    return $respon;
	}

	private function _cek_sertifikat($sertifikat)
	{
		$data = $this->belajar->cek_sertifikat($sertifikat);

		if ($data !== NULL)
		{
			$this->respon = array_merge($this->respon, ['sertifikat' => $data]);
		}
	}

	private function _cek_pencapaian()
	{
		$data = $this->belajar->cek_pencapaian();

		if ($data !== NULL)
		{
			$this->respon = array_merge($this->respon, ['pencapaian' => $data]);
		}
	}

	// lhd = Lihat Halaman Donasi
	private function _lhd($kelas,$modul,$link)
	{
		if (!ang_integration_enabled('midtrans')) return;

		if ($this->campuran->sudah_donasi() == 0)
		{
			$slhd = $this->belajar->cek_slhd($this->session->ang_nama_pengguna,$kelas,$modul);

			if ($slhd == 0)
			{
				$this->belajar->set_slhd($this->session->ang_nama_pengguna,$kelas,$modul);

				$link = urlencode(str_replace('=','',
					base64_encode(site_url("{$link}/bagian/1"))
				));

				if ($_SERVER['CI_ENV'] != 'development')
				{
					$prefix = "https://example.test";

					if (!(substr(base64_decode($link), 0, strlen($prefix)) === $prefix)) {
						show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
					}
				}

				redirect("belajar/donasi/{$link}");
			}
		}
	}

	// Push Kesalahan
	private function _pk($isi)
	{
		array_push($this->kesalahan, $isi);
	}

	public function donasi($url)
	{
		$link = urldecode(base64_decode($url));

		if ($_SERVER['CI_ENV'] != 'development')
		{
			$prefix = "https://example.test";

			if (!(substr($link, 0, strlen($prefix)) === $prefix)) {
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}

		$link = $this->ang->ci($link);

		$this->load->view('web/lainnya/donasi', ['pembelajaran' => TRUE, 'link' => $link]);
	}

	public function awal_belajar_teori_html($J1=11,$J2=13,$J3=8,$J4=25,$J5=20,$J6=14)
	{
		if ($this->session->has_userdata('ang_akses'))
		{
			$this->belajar->init_kelas_pengguna('html');

			$B1 = $this->belajar->ambil_bagian_terakhir_teori_html(1);
			$B2 = $this->belajar->ambil_bagian_terakhir_teori_html(2);
			$B3 = $this->belajar->ambil_bagian_terakhir_teori_html(3);
			$B4 = $this->belajar->ambil_bagian_terakhir_teori_html(4);
			$B5 = $this->belajar->ambil_bagian_terakhir_teori_html(5);
			$B6 = $this->belajar->ambil_bagian_terakhir_teori_html(6);
			$P1 = ($B1 > 1) ? round($this->_persentase($B1,$J1+1)) : 0;
			$P2 = ($B2 > 1) ? round($this->_persentase($B2,$J2+1)) : 0;
			$P3 = ($B3 > 1) ? round($this->_persentase($B3,$J3+1)) : 0;
			$P4 = ($B4 > 1) ? round($this->_persentase($B4,$J4+1)) : 0;
			$P5 = ($B5 > 1) ? round($this->_persentase($B5,$J5+1)) : 0;
			$P6 = ($B6 > 1) ? round($this->_persentase($B6,$J6+1)) : 0;
			$P1 = $P1 > 100 ? 100 : $P1;
			$P2 = $P2 > 100 ? 100 : $P2;
			$P3 = $P3 > 100 ? 100 : $P3;
			$P4 = $P4 > 100 ? 100 : $P4;
			$P5 = $P5 > 100 ? 100 : $P5;
			$P6 = $P6 > 100 ? 100 : $P6;
			$W1 = $this->_warna_chart($P1);
			$W2 = $this->_warna_chart($P2);
			$W3 = $this->_warna_chart($P3);
			$W4 = $this->_warna_chart($P4);
			$W5 = $this->_warna_chart($P5);
			$W6 = $this->_warna_chart($P6);
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'warna_chart_1' => $W1,
				'warna_chart_2' => $W2,
				'warna_chart_3' => $W3,
				'warna_chart_4' => $W4,
				'warna_chart_5' => $W5,
				'warna_chart_6' => $W6,
				'persentase_1' => $P1,
				'persentase_2' => $P2,
				'persentase_3' => $P3,
				'persentase_4' => $P4,
				'persentase_5' => $P5,
				'persentase_6' => $P6,
				'bagian_1' => $B1,
				'bagian_2' => $B2,
				'bagian_3' => $B3,
				'bagian_4' => $B4,
				'bagian_5' => $B5,
				'bagian_6' => $B6
			];
		}
		else
		{
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'warna_chart_1' => 'grey',
				'warna_chart_2' => 'grey',
				'warna_chart_3' => 'grey',
				'warna_chart_4' => 'grey',
				'warna_chart_5' => 'grey',
				'warna_chart_6' => 'grey',
				'persentase_1' => 0,
				'persentase_2' => 0,
				'persentase_3' => 0,
				'persentase_4' => 0,
				'persentase_5' => 0,
				'persentase_6' => 0,
				'bagian_1' => 1,
				'bagian_2' => 1,
				'bagian_3' => 1,
				'bagian_4' => 1,
				'bagian_5' => 1,
				'bagian_6' => 1
			];
		}

		$this->load->view('belajar/html/teori/awal',$DT);
	}

	public function index() { /* Muhammad Saleh Solahudin love Karmila Sriwulan */ }

	public function teori_berkenalan_dengan_html($bagian,$jumlah_bagian=11)
	{
		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_html(1,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('html','1','belajar-html/teori/berkenalan-dengan-html');
				}

				$this->load->view("belajar/html/teori/1/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function teori_tag_atribut_dan_elemen_pada_html($bagian,$jumlah_bagian=13)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_html(1) > 11)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($bagian == 1)
				{
					$this->_lhd('html','2','belajar-html/teori/tag-atribut-dan-elemen-pada-html');
				}

				if ($this->belajar->q_teori_html(2,$bagian))
				{
					$this->load->view("belajar/html/teori/2/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_struktur_dasar_html($bagian,$jumlah_bagian=8)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_html(2) > 13)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($bagian == 1)
				{
					$this->_lhd('html','3','belajar-html/teori/struktur-dasar-html');
				}

				if ($this->belajar->q_teori_html(3,$bagian))
				{
					$this->load->view("belajar/html/teori/3/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_membuat_tabel_pada_html($bagian,$jumlah_bagian=25)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_html(3) > 8)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($bagian == 1)
				{
					$this->_lhd('html','4','belajar-html/teori/membuat-tabel-pada-html');
				}

				if ($this->belajar->q_teori_html(4,$bagian))
				{
					$this->load->view("belajar/html/teori/4/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_membuat_formulir_pada_html($bagian,$jumlah_bagian=20)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_html(4) > 25)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($bagian == 1)
				{
					$this->_lhd('html','5','belajar-html/teori/membuat-formulir-pada-html');
				}

				if ($this->belajar->q_teori_html(5,$bagian))
				{
					$this->load->view("belajar/html/teori/5/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_lebih_banyak_tentang_html($bagian,$jumlah_bagian=14)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_html(5) > 20)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($bagian == 1)
				{
					$this->_lhd('html','6','belajar-html/teori/lebih-banyak-tentang-html');
				}

				if ($this->belajar->q_teori_html(6,$bagian))
				{
					$this->load->view("belajar/html/teori/6/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function jawab_teori_belajar_html()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m !== NULL && $b !== NULL)
		{
			if ($m == sha1('berkenalan dengan html'))
			{
				if ($b == sha1(2))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'hypertext markup language')
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'standard generalized markup language')
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '1980')
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'css')
					{
						$ls = site_url('belajar-html/teori/berkenalan-dengan-html/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(1,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan html', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',1,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('tag atribut dan elemen pada html'))
			{
				if ($b == sha1(3))
				{
					if (strtolower($this->input->post('j_1')) == '<b>' && strtolower($this->input->post('j_2')) == '</b>' &&
							strtolower($this->input->post('j_3')) == '<i>' && strtolower($this->input->post('j_4')) == '</i>' &&
							strtolower($this->input->post('j_5')) == '<p>' && strtolower($this->input->post('j_6')) == '</p>' &&
							strtolower($this->input->post('j_7')) == '<!--' && strtolower($this->input->post('j_8')) == '-->' &&
							strtolower($this->input->post('j_9')) == '<button>' && strtolower($this->input->post('j_10')) == '</button>' &&
							strtolower($this->input->post('j_11')) == '<h1>' && strtolower($this->input->post('j_12')) == '</h1>' &&
							strtolower($this->input->post('j_13')) == '<script>' && strtolower($this->input->post('j_14')) == '</script>' &&
							strtolower($this->input->post('j_15')) == '<textarea>' && strtolower($this->input->post('j_16')) == '</textarea>'
						)
					{
						$ls = site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(2,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tag, atribut dan elemen pada html', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',2,3)]);

						if (strtolower($this->input->post('j_1')) != '<b>') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '</b>') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '<i>') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '</i>') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '<p>') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != '</p>') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != '<!--') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != '-->') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9')) != '<button>') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10')) != '</button>') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11')) != '<h1>') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != '</h1>') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13')) != '<script>') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14')) != '</script>') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15')) != '<textarea>') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16')) != '</textarea>') $this->_pk('j_16');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && $this->input->post('j_3',TRUE) === NULL)
					{
						$ls = site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(2,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tag, atribut dan elemen pada html', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',2,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(2,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tag, atribut dan elemen pada html', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',2,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					if ((($j1 == "href='https://example.test'" || $j1 == 'href="https://example.test"') && ($j2 == "target='_blank'" || $j2 == 'target="_blank"')) ||
						 	(($j1 == "target='_blank'" || $j1 == 'target="_blank"') && ($j2 == "href='https://example.test'" || $j2 == 'href="https://example.test"')))
					{
						$ls = site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(2,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tag, atribut dan elemen pada html', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',2,8)]);

						if (!($j1 == "href='https://example.test'" || $j1 == 'href="https://example.test"')) $this->_pk('j_1');
						if (!($j2 == "target='_blank'" || $j2 == 'target="_blank"')) $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					if ((($j1 == "width='300px'" || $j1 == 'width="300px"') && ($j2 == "height='250px'" || $j2 == 'height="250px"')) ||
						 	(($j1 == "height='250px'" || $j1 == 'height="250px"') && ($j2 == "width='300px'" || $j2 == 'width="300px"')) ||
						 	(($j1 == "width='300'" || $j1 == 'width="300"') && ($j2 == "height='250'" || $j2 == 'height="250"')) ||
						 	(($j1 == "height='250'" || $j1 == 'height="250"') && ($j2 == "width='300'" || $j2 == 'width="300"')))
					{
						$ls = site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(2,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tag, atribut dan elemen pada html', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',2,9)]);

						if (!($j1 == "width='300px'" || $j1 == 'width="300px"' || $j1 == "width='300'" || $j1 == 'width="300"')) $this->_pk('j_1');
						if (!($j2 == "height='250px'" || $j2 == 'height="250px"' || $j2 == "height='250'" || $j2 == 'height="250"')) $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(2,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tag, atribut dan elemen pada html', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',2,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(2,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tag, atribut dan elemen pada html', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',2,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('struktur dasar html'))
			{
				if ($b == sha1(3))
				{
					$j = strtolower($this->input->post('j_1'));
					if ($j == "lang='de'" || $j == 'lang="de"')
					{
						$ls = site_url('belajar-html/teori/struktur-dasar-html/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(3,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'struktur dasar html', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',3,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					if ((($j1 == "http-equiv='content-type'" || $j1 == 'http-equiv="content-type"') && ($j2 == "content='text/html;charset=utf-8'" || $j2 == 'content="text/html;charset=utf-8"')) ||
						 	(($j2 == "http-equiv='content-type'" || $j2 == 'http-equiv="content-type"') && ($j1 == "content='text/html;charset=utf-8'" || $j1 == 'content="text/html;charset=utf-8"')))
					{
						$ls = site_url('belajar-html/teori/struktur-dasar-html/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(3,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'struktur dasar html', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',3,5)]);

						if (!($j1 == "http-equiv='content-type'" || $j1 == 'http-equiv="content-type"')) $this->_pk('j_1');
						if (!($j2 == "content='text/html;charset=utf-8'" || $j2 == 'content="text/html;charset=utf-8"')) $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					$j = strtolower($this->input->post('j_1'));
					if ($j == "charset='utf-8'" || $j == 'charset="utf-8"')
					{
						$ls = site_url('belajar-html/teori/struktur-dasar-html/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(3,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'struktur dasar html', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',3,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					$j4 = strtolower($this->input->post('j_4'));

					if (strtolower($this->input->post('j_1')) == 'html' &&
							strtolower($this->input->post('j_2')) == 'html' &&
							strtolower($this->input->post('j_3')) == 'head' &&
							($j4 == "charset='utf-8'" || $j4 == 'charset="utf-8"') &&
							strtolower($this->input->post('j_5')) == 'title' &&
							strtolower($this->input->post('j_6')) == '/title' &&
							strtolower($this->input->post('j_7')) == '/head' &&
							strtolower($this->input->post('j_8')) == 'body' &&
							strtolower($this->input->post('j_9')) == 'header' &&
							strtolower($this->input->post('j_10')) == 'nav' &&
							strtolower($this->input->post('j_11')) == '/nav' &&
							strtolower($this->input->post('j_12')) == '/header' &&
							strtolower($this->input->post('j_13')) == 'main' &&
							strtolower($this->input->post('j_14')) == 'section' &&
							strtolower($this->input->post('j_15')) == '/section' &&
							strtolower($this->input->post('j_16')) == 'section' &&
							strtolower($this->input->post('j_17')) == '/section' &&
							strtolower($this->input->post('j_18')) == 'section' &&
							strtolower($this->input->post('j_19')) == '/section' &&
							strtolower($this->input->post('j_20')) == '/main' &&
							strtolower($this->input->post('j_21')) == 'footer' &&
							strtolower($this->input->post('j_22')) == '/footer' &&
							strtolower($this->input->post('j_23')) == '/body' &&
							strtolower($this->input->post('j_24')) == '/html'
						)
					{
						$ls = site_url('belajar-html/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(3,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'struktur dasar html', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',3,8)]);

						if (strtolower($this->input->post('j_1')) != 'html') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'html') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'head') $this->_pk('j_3');
						if (!($j4 == "charset='utf-8'" || $j4 == 'charset="utf-8"')) $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'title') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != '/title') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != '/head') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != 'body') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9')) != 'header') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10')) != 'nav') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11')) != '/nav') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != '/header') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13')) != 'main') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14')) != 'section') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15')) != '/section') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16')) != 'section') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17')) != '/section') $this->_pk('j_17');
						if (strtolower($this->input->post('j_18')) != 'section') $this->_pk('j_18');
						if (strtolower($this->input->post('j_19')) != '/section') $this->_pk('j_19');
						if (strtolower($this->input->post('j_20')) != '/main') $this->_pk('j_20');
						if (strtolower($this->input->post('j_21')) != 'footer') $this->_pk('j_21');
						if (strtolower($this->input->post('j_22')) != '/footer') $this->_pk('j_22');
						if (strtolower($this->input->post('j_23')) != '/body') $this->_pk('j_23');
						if (strtolower($this->input->post('j_24')) != '/html') $this->_pk('j_24');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('membuat tabel pada html'))
			{
				if ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && $this->input->post('j_2',TRUE) === NULL)
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));

					if (($j1 == "border='2'" || $j1 == 'border="2"') && ($j2 == "width='850'" || $j2 == 'width="850"'))
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,9)]);

						if (!($j1 == "border='2'" || $j1 == 'border="2"')) $this->_pk('j_1');
						if (!($j2 == "width='850'" || $j2 == 'width="850"')) $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					$j3 = strtolower($this->input->post('j_3'));
					$j4 = strtolower($this->input->post('j_4'));
					$j5 = strtolower($this->input->post('j_5'));

					if (($j1 == "border='1'" || $j1 == 'border="1"') &&
							($j2 == "width='85%'" || $j2 == 'width="85%"') &&
							($j3 == "height='60'" || $j3 == 'height="60"') &&
							($j4 == "width='35%'" || $j4 == 'width="35%"') &&
							($j5 == "height='55'" || $j5 == 'height="55"')
						)
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,10)]);

						if (!($j1 == "border='1'" || $j1 == 'border="1"')) $this->_pk('j_1');
						if (!($j2 == "width='85%'" || $j2 == 'width="85%"')) $this->_pk('j_2');
						if (!($j3 == "height='60'" || $j3 == 'height="60"')) $this->_pk('j_3');
						if (!($j4 == "width='35%'" || $j4 == 'width="35%"')) $this->_pk('j_4');
						if (!($j5 == "height='55'" || $j5 == 'height="55"')) $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL) && $this->input->post('j_4',TRUE) === NULL)
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if (strtolower($this->input->post('j_1')) == 'thead' && strtolower($this->input->post('j_2')) == '/thead' &&
							strtolower($this->input->post('j_3')) == 'tbody' && strtolower($this->input->post('j_4')) == '/tbody' &&
							strtolower($this->input->post('j_5')) == 'tfoot' && strtolower($this->input->post('j_6')) == '/tfoot'
						)
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,17)]);

						if (strtolower($this->input->post('j_1')) != 'thead') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '/thead') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'tbody') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '/tbody') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'tfoot') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != '/tfoot') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if (strtolower($this->input->post('j_1')) == '<caption>daftar siswa sekolah maju mundur pantang diam</caption>')
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,18)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,19)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,23)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					$j1 = strtolower($this->input->post('j_1'));

					if ($j1 == 'vertical align' || $j1 == 'vertical alignment')
					{
						$ls = site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,24)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					if (strtolower($this->input->post('j_1')) == 'rows')
					{
						$ls = site_url('belajar-html/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(4,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat tabel pada html', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',4,25)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('membuat formulir pada html'))
			{
				if ($b == sha1(6))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					$j5 = strtolower($this->input->post('j_5'));
					$j7 = strtolower($this->input->post('j_7'));
					$j8 = strtolower($this->input->post('j_8'));
					$j11 = strtolower($this->input->post('j_11'));

					if (($j1 == "action='proses.php'" || $j1 == 'action="proses.php"') &&
							($j2 == "method='post'" || $j2 == 'method="post"') &&
							strtolower($this->input->post('j_3')) == 'text' &&
							strtolower($this->input->post('j_4')) == 'username' &&
							($j5 == "for='password'" || $j5 == 'for="password"') &&
							strtolower($this->input->post('j_6')) == 'password' &&
							($j7 == "for='nama'" || $j7 == 'for="nama"') &&
							($j8 == "id='laki-laki'" || $j8 == 'id="laki-laki"') &&
							strtolower($this->input->post('j_9')) == 'radio' &&
							strtolower($this->input->post('j_10')) == 'jenis_kelamin' &&
							($j11 == "for='perempuan'" || $j11 == 'for="perempuan"') &&
							strtolower($this->input->post('j_12')) == 'bola' &&
							strtolower($this->input->post('j_13')) == 'checkbox' &&
							strtolower($this->input->post('j_14')) == 'hobi' &&
							strtolower($this->input->post('j_15')) == 'coding' &&
							strtolower($this->input->post('j_16')) == 'submit'
						)
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,6)]);

						if (!($j1 == "action='proses.php'" || $j1 == 'action="proses.php"')) $this->_pk('j_1');
						if (!($j2 == "method='post'" || $j2 == 'method="post"')) $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'text') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'username') $this->_pk('j_4');
						if (!($j5 == "for='password'" || $j5 == 'for="password"')) $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'password') $this->_pk('j_6');
						if (!($j7 == "for='nama'" || $j7 == 'for="nama"')) $this->_pk('j_7');
						if (!($j8 == "id='laki-laki'" || $j8 == 'id="laki-laki"')) $this->_pk('j_8');
						if (strtolower($this->input->post('j_9')) != 'radio') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10')) != 'jenis_kelamin') $this->_pk('j_10');
						if (!($j11 == "for='perempuan'" || $j11 == 'for="perempuan"')) $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != 'bola') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13')) != 'checkbox') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14')) != 'hobi') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15')) != 'coding') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16')) != 'submit') $this->_pk('j_16');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL))
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_6',TRUE) === NULL && $this->input->post('j_7',TRUE) === NULL))
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,11)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					$j3 = strtolower($this->input->post('j_3'));

					if (($j1 == "name='hobi'" || $j1 == 'name="hobi"') && ($j2 == "label='laki-laki'" || $j2 == 'label="laki-laki"') && ($j3 == "label='perempuan'" || $j3 == 'label="perempuan"'))
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,13)]);

						if (!($j1 == "name='hobi'" || $j1 == 'name="hobi"')) $this->_pk('j_1');
						if (!($j2 == "label='laki-laki'" || $j2 == 'label="laki-laki"')) $this->_pk('j_2');
						if (!($j3 == "label='perempuan'" || $j3 == 'label="perempuan"')) $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (strtolower($this->input->post('j_1')) == 'date')
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if (strtolower($this->input->post('j_1')) == 'month')
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,18)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					$j = strtolower($this->input->post('j_1'));

					if ($j == "multipart/form-data")
					{
						$ls = site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(5,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'membuat formulir pada html', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',5,19)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('lebih banyak tentang html'))
			{
				if ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(6,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang html', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',6,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					$j3 = strtolower($this->input->post('j_3'));

					if ((($j1 == "face='arial'" || $j1 == 'face="arial"') && ($j2 == "color='blue'" || $j2 == 'color="blue"') && ($j3 == "size='5'" || $j3 == 'size="5"')) ||
							(($j1 == "face='arial'" || $j1 == 'face="arial"') && ($j2 == "size='5'" || $j2 == 'size="5"') && ($j3 == "color='blue'" || $j3 == 'color="blue"')) ||
							(($j1 == "color='blue'" || $j1 == 'color="blue"') && ($j2 == "face='arial'" || $j2 == 'face="arial"') && ($j3 == "size='5'" || $j3 == 'size="5"')) ||
							(($j1 == "color='blue'" || $j1 == 'color="blue"') && ($j2 == "size='5'" || $j2 == 'size="5"') && ($j3 == "face='arial'" || $j3 == 'face="arial"')) ||
							(($j1 == "size='5'" || $j1 == 'size="5"') && ($j2 == "color='blue'" || $j2 == 'color="blue"') && ($j3 == "face='arial'" || $j3 == 'face="arial"')) ||
							(($j1 == "size='5'" || $j1 == 'size="5"') && ($j2 == "face='arial'" || $j2 == 'face="arial"') && ($j3 == "color='blue'" || $j3 == 'color="blue"'))
						)
					{
						$ls = site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(6,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang html', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',6,5)]);

						if (!($j1 == "face='arial'" || $j1 == 'face="arial"')) $this->_pk('j_1');
						if (!($j2 == "color='blue'" || $j2 == 'color="blue"')) $this->_pk('j_2');
						if (!($j3 == "size='5'" || $j3 == 'size="5"')) $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(6,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang html', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',6,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL))
					{
						$ls = site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(6,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang html', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',6,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					$j7 = strtolower($this->input->post('j_7'));

					if (($j1 == 'width="500"' || $j1 == "width='500'") &&
					 	  ($j2 == 'height="500"' || $j2 == "height='500'") &&
							strtolower($this->input->post('j_3')) == 'controls' && strtolower($this->input->post('j_4')) == 'video/mp4' &&
							strtolower($this->input->post('j_5')) == 'video/ogg' && strtolower($this->input->post('j_6')) == 'video/webm' &&
							($j7 == 'browser anda tidak mendukung element video.' || $j7 == 'browser anda tidak mendukung element video'))
					{
						$ls = site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_html(6,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang html', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',6,12)]);

						if (!($j1 == 'width="500"' || $j1 == "width='500'")) $this->_pk('j_1');
				 	  if (!($j2 == 'height="500"' || $j2 == "height='500'")) $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'controls') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'video/mp4') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'video/ogg') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'video/webm') $this->_pk('j_6');
						if (!($j7 == 'browser anda tidak mendukung element video.' || $j7 == 'browser anda tidak mendukung element video')) $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					$j2 = strtolower($this->input->post('j_2'));
					$j3 = strtolower($this->input->post('j_3'));

					if (strtolower($this->input->post('j_1')) == 'link' &&
						 ($j2 == 'rel="icon"' || $j2 == "rel='icon'") &&
						 ($j3 == 'href="gambar/ikon/always-ngoding.ico"' || $j3 == "href='gambar/ikon/always-ngoding.ico'"))
					{
						$ls = site_url('belajar'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_sertifikat('HTML');
						$this->belajar->segarkan_bagian_teori_html(6,14);
						$this->ang->bot("{$this->session->ang_nama_pengguna} menyelesaikan kelas HTML di Always Ngoding.");
						$this->ang->kakd("{$this->session->ang_nama_pengguna} (".site_url("anggota/{$this->session->ang_nama_pengguna}").") menyelesaikan kelas HTML di Always Ngoding :partying_face:");
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang html', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('html',6,14)]);

						if (strtolower($this->input->post('j_1')) != 'link') $this->_pk('j_1');
						if (!($j2 == 'rel="icon"' || $j2 == "rel='icon'")) $this->_pk('j_2');
						if (!($j3 == 'href="gambar/ikon/always-ngoding.ico"' || $j3 == "href='gambar/ikon/always-ngoding.ico'")) $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function segarkan_bagian_teori_html()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m != NULL && $b != NULL)
		{
			$this->_cek_pencapaian();

			if ($this->belajar->segarkan_bagian_teori_html($m,$b))
			{
			 	$pesan = ">> Berhasil menyegarkan... << >> {$m} << >> {$b} <<";
			}
			else
			{
				$pesan = ">> Tidak ada yang perlu disegarkan... << >> {$m} << >> {$b} <<";
			}

			echo $this->_encode_dengan_token(array_merge($this->respon, ['pesan' => $pesan]));
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function hasil_teori_html($modul,$bagian,$flag)
	{
		if ($modul == 2) $jumlah_bagian = 13;
		elseif ($modul == 3) $jumlah_bagian = 8;
		elseif ($modul == 4) $jumlah_bagian = 25;
		elseif ($modul == 5) $jumlah_bagian = 20;
		elseif ($modul == 6) $jumlah_bagian = 14;
		else show_404();

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->ambil_bagian_terakhir_teori_html($modul) > $bagian-1)
			{
				if (file_exists(APPPATH."views/belajar/html/hasil/{$modul}/{$bagian}-{$flag}.php"))
				{
					$this->load->view("belajar/html/hasil/{$modul}/{$bagian}-{$flag}");
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

	public function awal_belajar_teori_css($J1=22,$J2=19,$J3=30,$J4=26,$J5=25,$J6=15,$J7=25,$J8=25)
	{
		if ($this->session->has_userdata('ang_akses'))
		{
			$this->belajar->init_kelas_pengguna('css');

			$B1 = $this->belajar->ambil_bagian_terakhir_teori_css(1);
			$B2 = $this->belajar->ambil_bagian_terakhir_teori_css(2);
			$B3 = $this->belajar->ambil_bagian_terakhir_teori_css(3);
			$B4 = $this->belajar->ambil_bagian_terakhir_teori_css(4);
			$B5 = $this->belajar->ambil_bagian_terakhir_teori_css(5);
			$B6 = $this->belajar->ambil_bagian_terakhir_teori_css(6);
			$B7 = $this->belajar->ambil_bagian_terakhir_teori_css(7);
			$B8 = $this->belajar->ambil_bagian_terakhir_teori_css(8);
			$P1 = ($B1 > 1) ? round($this->_persentase($B1,$J1+1)) : 0;
			$P2 = ($B2 > 1) ? round($this->_persentase($B2,$J2+1)) : 0;
			$P3 = ($B3 > 1) ? round($this->_persentase($B3,$J3+1)) : 0;
			$P4 = ($B4 > 1) ? round($this->_persentase($B4,$J4+1)) : 0;
			$P5 = ($B5 > 1) ? round($this->_persentase($B5,$J5+1)) : 0;
			$P6 = ($B6 > 1) ? round($this->_persentase($B6,$J6+1)) : 0;
			$P7 = ($B7 > 1) ? round($this->_persentase($B7,$J7+1)) : 0;
			$P8 = ($B8 > 1) ? round($this->_persentase($B8,$J8+1)) : 0;
			$P1 = $P1 > 100 ? 100 : $P1;
			$P2 = $P2 > 100 ? 100 : $P2;
			$P3 = $P3 > 100 ? 100 : $P3;
			$P4 = $P4 > 100 ? 100 : $P4;
			$P5 = $P5 > 100 ? 100 : $P5;
			$P6 = $P6 > 100 ? 100 : $P6;
			$P7 = $P7 > 100 ? 100 : $P7;
			$P8 = $P8 > 100 ? 100 : $P8;
			$W1 = $this->_warna_chart($P1);
			$W2 = $this->_warna_chart($P2);
			$W3 = $this->_warna_chart($P3);
			$W4 = $this->_warna_chart($P4);
			$W5 = $this->_warna_chart($P5);
			$W6 = $this->_warna_chart($P6);
			$W7 = $this->_warna_chart($P7);
			$W8 = $this->_warna_chart($P8);
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'jumlah_bagian_7' => $J7,
				'jumlah_bagian_8' => $J8,
				'warna_chart_1' => $W1,
				'warna_chart_2' => $W2,
				'warna_chart_3' => $W3,
				'warna_chart_4' => $W4,
				'warna_chart_5' => $W5,
				'warna_chart_6' => $W6,
				'warna_chart_7' => $W7,
				'warna_chart_8' => $W8,
				'persentase_1' => $P1,
				'persentase_2' => $P2,
				'persentase_3' => $P3,
				'persentase_4' => $P4,
				'persentase_5' => $P5,
				'persentase_6' => $P6,
				'persentase_7' => $P7,
				'persentase_8' => $P8,
				'bagian_1' => $B1,
				'bagian_2' => $B2,
				'bagian_3' => $B3,
				'bagian_4' => $B4,
				'bagian_5' => $B5,
				'bagian_6' => $B6,
				'bagian_7' => $B7,
				'bagian_8' => $B8
			];
		}
		else
		{
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'jumlah_bagian_7' => $J7,
				'jumlah_bagian_8' => $J8,
				'warna_chart_1' => 'grey',
				'warna_chart_2' => 'grey',
				'warna_chart_3' => 'grey',
				'warna_chart_4' => 'grey',
				'warna_chart_5' => 'grey',
				'warna_chart_6' => 'grey',
				'warna_chart_7' => 'grey',
				'warna_chart_8' => 'grey',
				'persentase_1' => 0,
				'persentase_2' => 0,
				'persentase_3' => 0,
				'persentase_4' => 0,
				'persentase_5' => 0,
				'persentase_6' => 0,
				'persentase_7' => 0,
				'persentase_8' => 0,
				'bagian_1' => 1,
				'bagian_2' => 1,
				'bagian_3' => 1,
				'bagian_4' => 1,
				'bagian_5' => 1,
				'bagian_6' => 1,
				'bagian_7' => 1,
				'bagian_8' => 1
			];
		}

		$this->load->view('belajar/css/teori/awal',$DT);
	}

	public function teori_berkenalan_dengan_css($bagian,$jumlah_bagian=22)
	{
		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_css(1,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('css','1','belajar-css/teori/berkenalan-dengan-css');
				}

				$this->load->view("belajar/css/teori/1/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function teori_perpaduan_css_dengan_html($bagian,$jumlah_bagian=19)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_css(1) > 22)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_css(2,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('css','2','belajar-css/teori/perpaduan-css-dengan-html');
					}

					$this->load->view("belajar/css/teori/2/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_bekerja_dengan_text($bagian,$jumlah_bagian=30)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_css(2) > 19)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_css(3,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('css','3','belajar-css/teori/bekerja-dengan-text');
					}

					$this->load->view("belajar/css/teori/3/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_property_property_pada_css($bagian,$jumlah_bagian=26)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_css(3) > 30)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_css(4,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('css','4','belajar-css/teori/property-property-pada-css');
					}

					$this->load->view("belajar/css/teori/4/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_posisi_dan_layout_pada_css($bagian,$jumlah_bagian=25)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_css(4) > 26)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_css(5,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('css','5','belajar-css/teori/property-property-pada-css');
					}

					$this->load->view("belajar/css/teori/5/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_gradient_dan_background_pada_css($bagian,$jumlah_bagian=15)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_css(5) > 25)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_css(6,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('css','6','belajar-css/teori/gradient-dan-background-pada-css');
					}

					$this->load->view("belajar/css/teori/6/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_transisi_transformasi_dan_animasi_pada_css($bagian,$jumlah_bagian=25)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_css(6) > 15)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_css(7,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('css','7','belajar-css/teori/transisi-transformasi-dan-animasi-pada-css');
					}

					$this->load->view("belajar/css/teori/7/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_lebih_banyak_tentang_css($bagian,$jumlah_bagian=25)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_css(7) > 25)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_css(8,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('css','8','belajar-css/teori/lebih-banyak-tentang-css');
					}

					$this->load->view("belajar/css/teori/8/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function jawab_teori_belajar_css()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m !== NULL && $b !== NULL)
		{
			if ($m == sha1('berkenalan dengan css'))
			{
				if ($b == sha1(2))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'cascading style sheets')
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));
					$j2 = strtolower($this->input->post('j_2',TRUE));

					if (($j1 == 'hakon wium lie' && $j2 == 'bert bos') || ($j1 == 'bert bos' && $j2 == 'hakon wium lie'))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,6)]);

						if ($j1 != 'hakon wium lie') $this->_pk('j_1');
						if ($j2 != 'bert bos') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '1996')
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'opera')
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'doctor of philosophy')
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && $this->input->post('j_2',TRUE) === NULL)
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '2')
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(3) && $j[1] == sha1(1) && $j[2] == sha1(2))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,18)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					$j9 = strtolower($this->input->post('j_9'));

					if (strtolower($this->input->post('j_1')) == 'body' && strtolower($this->input->post('j_2')) == '{' &&
							strtolower($this->input->post('j_3')) == 'background-color' && strtolower($this->input->post('j_4')) == ':' &&
							strtolower($this->input->post('j_5')) == 'whitesmoke' && strtolower($this->input->post('j_6')) == ';' &&
							strtolower($this->input->post('j_7')) == 'font-family' && strtolower($this->input->post('j_8')) == ':' &&
							($j9 == 'arial' || $j9 == '"arial"' || $j9 == "'arial'") && strtolower($this->input->post('j_10')) == ';' &&
							strtolower($this->input->post('j_11')) == '}' && strtolower($this->input->post('j_12')) == 'p' &&
							strtolower($this->input->post('j_13')) == '{' && strtolower($this->input->post('j_14')) == 'color' &&
							strtolower($this->input->post('j_15')) == ':' && strtolower($this->input->post('j_16')) == 'blue' &&
							strtolower($this->input->post('j_17')) == ';' && strtolower($this->input->post('j_18')) == 'font-size' &&
							strtolower($this->input->post('j_19')) == ':' && strtolower($this->input->post('j_20')) == '13px' &&
							strtolower($this->input->post('j_21')) == ';' && strtolower($this->input->post('j_22')) == '}'
						)
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,19)]);

						if (strtolower($this->input->post('j_1')) != 'body') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '{') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'background-color') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != ':') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'whitesmoke') $this->_pk('j_5');
					  if (strtolower($this->input->post('j_6')) != ';') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'font-family') $this->_pk('j_7');
					  if (strtolower($this->input->post('j_8')) != ':') $this->_pk('j_8');
						if (!($j9 == 'arial' || $j9 == '"arial"' || $j9 == "'arial'")) $this->_pk('j_9');
						if (strtolower($this->input->post('j_10')) != ';') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11')) != '}') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != 'p') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13')) != '{') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14')) != 'color') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15')) != ':') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16')) != 'blue') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17')) != ';') $this->_pk('j_17');
						if (strtolower($this->input->post('j_18')) != 'font-size') $this->_pk('j_18');
						if (strtolower($this->input->post('j_19')) != ':') $this->_pk('j_19');
						if (strtolower($this->input->post('j_20')) != '13px') $this->_pk('j_20');
						if (strtolower($this->input->post('j_21')) != ';') $this->_pk('j_21');
						if (strtolower($this->input->post('j_22')) != '}') $this->_pk('j_22');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/berkenalan-dengan-css/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(1,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan css', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',1,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('perpaduan css dengan html'))
			{
				if ($b == sha1(2))
				{
					if (($this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_2',TRUE) === NULL))
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if (strtolower($this->input->post('j_1')) == '<style>' && strtolower($this->input->post('j_2')) == 'a' &&
							strtolower($this->input->post('j_3')) == 'font-weight' && strtolower($this->input->post('j_4')) == 'bold' &&
							strtolower($this->input->post('j_5')) == 'text-decoration' && strtolower($this->input->post('j_6')) == 'none' &&
							strtolower($this->input->post('j_7')) == 'color' && strtolower($this->input->post('j_8')) == 'black' &&
							strtolower($this->input->post('j_9')) == '</style>'
						)
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,5)]);

						if (strtolower($this->input->post('j_1')) != '<style>') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'a') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'font-weight') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'bold') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'text-decoration') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'none') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'color') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != 'black') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9')) != '</style>') $this->_pk('j_9');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					$j3 = strtolower($this->input->post('j_3'));

					if (strtolower($this->input->post('j_1')) == 'link' && strtolower($this->input->post('j_2')) == 'stylesheet' && ($j3 == 'href="../asset/gaya.css"' || $j3 == "href='../asset/gaya.css'"))
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,7)]);

						if (strtolower($this->input->post('j_1')) != 'link') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'stylesheet') $this->_pk('j_2');
						if (!($j3 == 'href="../asset/gaya.css"' || $j3 == "href='../asset/gaya.css'")) $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (strtolower($this->input->post('j_1')) == 'underline' && strtolower($this->input->post('j_2')) == '.' &&
							strtolower($this->input->post('j_3')) == 'arial' && strtolower($this->input->post('j_4')) == 'garis-bawah' &&
							strtolower($this->input->post('j_5')) == 'class' && strtolower($this->input->post('j_6')) == 'arial'
						)
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,12)]);

						if (strtolower($this->input->post('j_1')) != 'underline') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '.') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'arial') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'garis-bawah') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'class') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'arial') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(2,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perpaduan css dengan html', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',2,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('bekerja dengan text'))
			{
				if ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					$j2 = str_replace(', ',',',strtolower($this->input->post('j_2')));
					$j6 = str_replace(', ',',',strtolower($this->input->post('j_6')));

					if (strtolower($this->input->post('j_1')) == 'color' && $j2 == 'rgb(0,0,0)' &&
							strtolower($this->input->post('j_3')) == 'color' && strtolower($this->input->post('j_4')) == 'orange' &&
							strtolower($this->input->post('j_5')) == 'color' && $j6 == 'rgba(255,0,0,1)'
						)
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,4)]);

						if (strtolower($this->input->post('j_1')) != 'color') $this->_pk('j_1');
						if ($j2 != 'rgb(0,0,0)') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'color') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'orange') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'color') $this->_pk('j_5');
						if ($j6 != 'rgba(255,0,0,1)') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1')) == '.reset' && strtolower($this->input->post('j_2')) == 'font-style' && strtolower($this->input->post('j_3')) == 'normal')
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,9)]);

						if (strtolower($this->input->post('j_1')) != '.reset') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'font-style') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'normal') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					$j4 = str_replace(', ',',',strtolower($this->input->post('j_4')));

					if (strtolower($this->input->post('j_1')) == '<style>' && strtolower($this->input->post('j_2')) == '.font-mantap' &&
							strtolower($this->input->post('j_3')) == 'font-family' &&
							($j4 = "'arial narrow',cursive,sans-serif" || $j4 = '"arial narrow",cursive,sans-serif') &&
							strtolower($this->input->post('j_5')) == '</style>' && strtolower($this->input->post('j_6')) == '<span class="font-mantap">' &&
							strtolower($this->input->post('j_7')) == '</span>'
						)
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,11)]);

						if (strtolower($this->input->post('j_1')) != '<style>') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '.font-mantap') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'font-family') $this->_pk('j_3');
						if (!($j4 = "'arial narrow',cursive,sans-serif" || $j4 = '"arial narrow",cursive,sans-serif')) $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '</style>') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != '<span class="font-mantap">') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != '</span>') $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (strtolower($this->input->post('j_1')) == 'span' && strtolower($this->input->post('j_2')) == 'text-decoration' &&
							strtolower($this->input->post('j_3')) == 'overline' && strtolower($this->input->post('j_4')) == 'wavy' &&
							strtolower($this->input->post('j_5')) == '#0000ff'
						)
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,15)]);

						if (strtolower($this->input->post('j_1')) != 'span') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'text-decoration') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'overline') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'wavy') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '#0000ff') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(4) && $j[1] == sha1(2) && $j[2] == sha1(1) && $j[3] == sha1(3))
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,19)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if (strtolower($this->input->post('j_1')) == 'text-align' && strtolower($this->input->post('j_2')) == 'justify' &&
							strtolower($this->input->post('j_3')) == 'text-align' && strtolower($this->input->post('j_4')) == 'right' &&
							strtolower($this->input->post('j_5')) == 'text-align' && strtolower($this->input->post('j_6')) == 'left' &&
							strtolower($this->input->post('j_7')) == 'text-align' && strtolower($this->input->post('j_8')) == 'center'
						)
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,22)]);

						if (strtolower($this->input->post('j_1')) != 'text-align') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'justify') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'text-align') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'right') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'text-align') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'left') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'text-align') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != 'center') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if (strtolower($this->input->post('j_1')) == 'h4' && strtolower($this->input->post('j_2')) == '{' &&
							strtolower($this->input->post('j_3')) == 'letter-spacing' && strtolower($this->input->post('j_4')) == '5%' &&
							strtolower($this->input->post('j_5')) == '}'
						)
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,24)]);

						if (strtolower($this->input->post('j_1')) != 'h4') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '{') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'letter-spacing') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '5%') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '}') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(26))
				{
					if (strtolower($this->input->post('j_1')) == 'p' && strtolower($this->input->post('j_2')) == '{' &&
							strtolower($this->input->post('j_3')) == 'word-spacing' && strtolower($this->input->post('j_4')) == '-13px' &&
							strtolower($this->input->post('j_5')) == '}'
						)
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/27'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,26);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '26'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,26)]);

						if (strtolower($this->input->post('j_1')) != 'p') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '{') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'word-spacing') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '-13px') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '}') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(28))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && $this->input->post('j_3',TRUE) === NULL)
					{
						$ls = site_url('belajar-css/teori/bekerja-dengan-text/bagian/29'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,28);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '28'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,28)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(30))
				{
					$j5 = strtolower($this->input->post('j_5'));

					if (str_replace(' ','',strtolower($this->input->post('j_1'))) == 'main>section' && strtolower($this->input->post('j_2')) == 'color' &&
							strtolower($this->input->post('j_3')) == '#000000' && strtolower($this->input->post('j_4')) == 'font-style' &&
							($j5 == 'italic' || $j5 == 'oblique') && strtolower($this->input->post('j_6')) == 'font-weight' &&
							strtolower($this->input->post('j_7')) == 'bold' && strtolower($this->input->post('j_8')) == 'text-decoration' &&
							strtolower($this->input->post('j_9')) == 'underline' && strtolower($this->input->post('j_10')) == 'red' &&
							strtolower($this->input->post('j_11')) == 'text-align' && strtolower($this->input->post('j_12')) == 'justify' &&
							strtolower($this->input->post('j_13')) == 'footer' && strtolower($this->input->post('j_14')) == 'font-size' &&
							strtolower($this->input->post('j_15')) == '20px' && strtolower($this->input->post('j_16')) == 'letter-spacing' &&
							strtolower($this->input->post('j_17')) == '10px' && strtolower($this->input->post('j_18')) == 'font-family' &&
							strtolower($this->input->post('j_19')) == 'cursive' && strtolower($this->input->post('j_20')) == 'text-align' &&
							strtolower($this->input->post('j_21')) == 'center' && strtolower($this->input->post('j_22')) == 'text-transform' &&
							strtolower($this->input->post('j_23')) == 'uppercase'
						)
					{
						$ls = site_url('belajar-css/teori'); // Link Selanjutnya

						$this->respon = [
							's' => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"];
						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(3,30);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul CSS 'bekerja dengan text', bagian '30'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',3,30)]);

						if (str_replace(' ','',strtolower($this->input->post('j_1'))) != 'main>section') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'color') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '#000000') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'font-style') $this->_pk('j_4');
						if (!($j5 == 'italic' || $j5 == 'oblique')) $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'font-weight') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'bold') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != 'text-decoration') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9')) != 'underline') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10')) != 'red') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11')) != 'text-align') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != 'justify') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13')) != 'footer') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14')) != 'font-size') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15')) != '20px') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16')) != 'letter-spacing') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17')) != '10px') $this->_pk('j_17');
						if (strtolower($this->input->post('j_18')) != 'font-family') $this->_pk('j_18');
						if (strtolower($this->input->post('j_19')) != 'cursive') $this->_pk('j_19');
						if (strtolower($this->input->post('j_20')) != 'text-align') $this->_pk('j_20');
						if (strtolower($this->input->post('j_21')) != 'center') $this->_pk('j_21');
						if (strtolower($this->input->post('j_22')) != 'text-transform') $this->_pk('j_22');
						if (strtolower($this->input->post('j_23')) != 'uppercase') $this->_pk('j_23');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('property property pada css'))
			{
				if ($b == sha1(2))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL))
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					$j5 = strtolower($this->input->post('j_5'));

					if (strtolower($this->input->post('j_1')) == 'div' && strtolower($this->input->post('j_2')) == 'border' &&
							strtolower($this->input->post('j_3')) == '5px' && strtolower($this->input->post('j_4')) == 'solid' &&
							($j5 == 'black' || $j5 == '#000000') && strtolower($this->input->post('j_6')) == 'border-top-left-radius' &&
							strtolower($this->input->post('j_7')) == '2px' && strtolower($this->input->post('j_8')) == 'border-top-right-radius' &&
							strtolower($this->input->post('j_9')) == '4px' && strtolower($this->input->post('j_10')) == 'border-bottom-right-radius' &&
							strtolower($this->input->post('j_11')) == '8px' && strtolower($this->input->post('j_12')) == 'border-bottom-left-radius' &&
							strtolower($this->input->post('j_13')) == '10px'
						)
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,4)]);

						if (strtolower($this->input->post('j_1')) != 'div') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'border') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '5px') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'solid') $this->_pk('j_4');
						if (!($j5 == 'black' || $j5 == '#000000')) $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'border-top-left-radius') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != '2px') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != 'border-top-right-radius') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9')) != '4px') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10')) != 'border-bottom-right-radius') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11')) != '8px') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != 'border-bottom-left-radius') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13')) != '10px') $this->_pk('j_13');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1')) == 'div' && strtolower($this->input->post('j_2')) == 'padding' &&
							strtolower($this->input->post('j_3')) == '10px' && strtolower($this->input->post('j_4')) == '15px' &&
							strtolower($this->input->post('j_5')) == '10px' && strtolower($this->input->post('j_6')) == '15px'
						)
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,9)]);

						if (strtolower($this->input->post('j_1')) != 'div') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'padding') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '10px') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '15px') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '10px') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != '15px') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (strtolower($this->input->post('j_1')) == 'article' && strtolower($this->input->post('j_2')) == 'margin' &&
							strtolower($this->input->post('j_3')) == '6.5px' && strtolower($this->input->post('j_4')) == '4.5px'
						)
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,10)]);

						if (strtolower($this->input->post('j_1')) != 'article') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'margin') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '6.5px') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '4.5px') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (strtolower($this->input->post('j_1')) == 'hue saturation lightness alpha')
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					$j_3 = strtolower($this->input->post('j_3'));

					if (strtolower($this->input->post('j_1')) == 'body' && strtolower($this->input->post('j_2')) == 'background-image' &&
							($j_3 == 'url(bg.png)' || $j_3 == 'url("bg.png")' || $j_3 == "url('bg.png')")
						)
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,14)]);

						if (strtolower($this->input->post('j_1')) != 'body') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'background-image') $this->_pk('j_2');
						if (!($j_3 == 'url(bg.png)' || $j_3 == 'url("bg.png")' || $j_3 == "url('bg.png')")) $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if (strtolower($this->input->post('j_1')) == '4')
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if (strtolower($this->input->post('j_1')) == 'body.bg-diam' &&
							strtolower($this->input->post('j_2')) == 'background-attachment' &&
							strtolower($this->input->post('j_3')) == 'fixed'
						)
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,18)]);

						if (strtolower($this->input->post('j_1')) != 'body.bg-diam') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'background-attachment') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'fixed') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if (($this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_2',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL))
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,22)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if (strtolower($this->input->post('j_1')) == 'background')
					{
						$ls = site_url('belajar-css/teori/property-property-pada-css/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,24)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(26))
				{
					if (strtolower($this->input->post('j_1')) == 'crosshair')
					{
						$ls = site_url('belajar-css/teori'); // Link Selanjutnya

						$this->respon = [
							's' => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"];
						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(4,26);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'property property pada css', bagian '26'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',4,26)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('posisi dan layout pada css'))
			{
				if ($b == sha1(2))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if (strtolower($this->input->post('j_1')) == 'collapse')
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					if (strtolower($this->input->post('j_1')) == 'static')
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,11)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL) && ($this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_8',TRUE) === NULL))
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if (strtolower($this->input->post('j_1')) == 'fixed')
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if (strtolower($this->input->post('j_1')) == 'img' && strtolower($this->input->post('j_2')) == 'float' &&
							strtolower($this->input->post('j_3')) == 'right' && strtolower($this->input->post('j_4')) == 'width' &&
							strtolower($this->input->post('j_5')) == '200' && strtolower($this->input->post('j_6')) == 'height' &&
							strtolower($this->input->post('j_7')) == 'auto'
						)
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,18)]);

						if (strtolower($this->input->post('j_1')) != 'img') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'float') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'right') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'width') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '200') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'height') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'auto') $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					if (strtolower($this->input->post('j_1')) == 'clear')
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,19)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) == NULL))
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && $this->input->post('j_1',TRUE) === NULL)
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,23)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if (strtolower($this->input->post('j_1')) == 'width' && strtolower($this->input->post('j_2')) == '200px' &&
							strtolower($this->input->post('j_3')) == '200px' && strtolower($this->input->post('j_4')) == 'hidden' &&
							strtolower($this->input->post('j_5')) == 'y' && strtolower($this->input->post('j_6')) == 'visible'
						)
					{
						$ls = site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,24)]);

						if (strtolower($this->input->post('j_1')) != 'width') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '200px') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '200px') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'hidden') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'y') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'visible') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					if ((intval($this->input->post('j_1',TRUE)) < intval($this->input->post('j_2',TRUE))) && (intval($this->input->post('j_2',TRUE)) < intval($this->input->post('j_3',TRUE))) && (intval($this->input->post('j_3',TRUE)) < intval($this->input->post('j_4',TRUE))) && (intval($this->input->post('j_4',TRUE)) > intval($this->input->post('j_5',TRUE))))
					{
						$ls = site_url('belajar-css/teori'); // Link Selanjutnya

						$this->respon = [
							's' => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"];
						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(5,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'posisi dan layout pada css', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',5,25)]);

						if (!(intval($this->input->post('j_1',TRUE)) < intval($this->input->post('j_2',TRUE)))) $this->_pk('j_1');
						if (!(intval($this->input->post('j_2',TRUE)) < intval($this->input->post('j_3',TRUE)))) $this->_pk('j_2');
						if (!(intval($this->input->post('j_3',TRUE)) < intval($this->input->post('j_4',TRUE)))) $this->_pk('j_3');
						if (!(intval($this->input->post('j_4',TRUE)) > intval($this->input->post('j_5',TRUE))))
						{
							array_push($kesalahan, 'j_4');
							array_push($kesalahan, 'j_5');
						}

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('gradient dan background pada css'))
			{
				if ($b == sha1(2))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '2')
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if (($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL))
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					$j3 = str_replace(', ',',',strtolower($this->input->post('j_3')));

					if (strtolower($this->input->post('j_1')) == 'div.kotak' &&
							strtolower($this->input->post('j_2')) == 'background' &&
							$j3 == "linear-gradient(to left,red,yellow,green,blue)"
						)
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,4)]);

						if (strtolower($this->input->post('j_1')) != 'div.kotak') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'background') $this->_pk('j_2');
						if ($j3 != "linear-gradient(to left,red,yellow,green,blue)") $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					$j4 = str_replace("'",'',str_replace('"','',strtolower($this->input->post('j_4'))));
					$j5 = str_replace("'",'',str_replace('"','',strtolower($this->input->post('j_5'))));
					$j7 = strtolower($this->input->post('j_7'));

					if (strtolower($this->input->post('j_1')) == 'div.latihan' &&
							strtolower($this->input->post('j_2')) == '400px' && strtolower($this->input->post('j_3')) == '500px' &&
							$j4 == "url(bg/bg_1.png)" &&
							$j5 == "url(bg/bg_2.png)" &&
							strtolower($this->input->post('j_6')) == 'right top' &&
							($j7 == 'left middle' || $j7 == 'left center')
						)
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,9)]);

						if (strtolower($this->input->post('j_1')) != 'div.latihan') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '400px') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '500px') $this->_pk('j_3');
						if ($j4 != "url(bg/bg_1.png)") $this->_pk('j_4');
						if ($j5 != "url(bg/bg_2.png)") $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'right top') $this->_pk('j_6');
						if (!($j7 == 'left middle' || $j7 == 'left center')) $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'linear-gradient')
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'background-clip')
					{
						$ls = site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_8',TRUE) === NULL && $this->input->post('j_10',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL && $this->input->post('j_9',TRUE) !== NULL))
					{
						$ls = site_url('belajar-css/teori'); // Link Selanjutnya

						$this->respon = [
							's' => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"];
						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(6,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'gradient dan background pada css', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',6,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('transisi transformasi dan animasi pada css'))
			{
				if ($b == sha1(2))
				{
					if (strtolower($this->input->post('j_1')) == 'div#belajar-transisi' &&
							strtolower($this->input->post('j_2')) == 'transition-duration' &&
							strtolower($this->input->post('j_3')) == '.5s' &&
							strtolower($this->input->post('j_4')) == 'transition-delay' &&
							strtolower($this->input->post('j_5')) == '3s' &&
							strtolower($this->input->post('j_6')) == 'transition-timing-function' &&
							strtolower($this->input->post('j_7')) == 'ease-in-out' &&
							(strtolower($this->input->post('j_8')) == 'div#belajar-transisi:hover' || strtolower($this->input->post('j_8')) == '#belajar-transisi:hover') &&
							strtolower($this->input->post('j_9')) == 'width' &&
							strtolower($this->input->post('j_10')) == '450px' &&
							strtolower($this->input->post('j_11')) == 'font-weight' &&
							strtolower($this->input->post('j_12')) == 'bold'
						)
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,2)]);

						if (strtolower($this->input->post('j_1')) != 'div#belajar-transisi') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'transition-duration') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '.5s') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'transition-delay') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '3s') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'transition-timing-function') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'ease-in-out') $this->_pk('j_7');
						if (!(strtolower($this->input->post('j_8')) == 'div#belajar-transisi:hover' || strtolower($this->input->post('j_8')) == '#belajar-transisi:hover')) $this->_pk('j_8');
						if (strtolower($this->input->post('j_9')) != 'width') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10')) != '450px') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11')) != 'font-weight') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != 'bold') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '5')
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if (strtolower($this->input->post('j_1')) == 'transform' && strtolower($this->input->post('j_2')) == 'translate' &&
							strtolower($this->input->post('j_3')) == '250px' && strtolower($this->input->post('j_4')) == '275px')
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,6)]);

						if (strtolower($this->input->post('j_1')) != 'transform') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'translate') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '250px') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '275px') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					if (strtolower($this->input->post('j_1')) == 'transform' &&
							strtolower($this->input->post('j_2')) == 'matrix' &&
							strtolower($this->input->post('j_3')) == '1' &&
							strtolower($this->input->post('j_4')) == '3' &&
							strtolower($this->input->post('j_5')) == '-1' &&
							strtolower($this->input->post('j_6')) == '2' &&
							strtolower($this->input->post('j_7')) == '7' &&
							strtolower($this->input->post('j_8')) == '5'
						)
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,11)]);

						if (strtolower($this->input->post('j_1')) != 'transform') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'matrix') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '1') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '3') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '-1') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != '2') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != '7') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != '5') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL))
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(5) && $j[1] == sha1(4) && $j[2] == sha1(1) && $j[3] == sha1(3) && $j[4] == sha1(6) && $j[5] == sha1(8) && $j[6] == sha1(2) && $j[7] == sha1(7))
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_6',TRUE) === NULL && $this->input->post('j_7',TRUE) === NULL))
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,22)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '@keyframes')
					{
						$ls = site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,23)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					$j9 = strtolower($this->input->post('j_9'));
					$j10 = strtolower($this->input->post('j_10'));
					$j18 = strtolower($this->input->post('j_18'));
					$j25 = strtolower($this->input->post('j_25'));
					$j41 = strtolower($this->input->post('j_41'));
					$j42 = strtolower($this->input->post('j_42'));
					$j144 = strtolower($this->input->post('j_144'));
					$j168 = strtolower($this->input->post('j_168'));

					$j53 = str_replace('0.','.',strtolower($this->input->post('j_53')));
					$j57 = str_replace('0.','.',strtolower($this->input->post('j_57')));
					$j72 = str_replace('0.','.',strtolower($this->input->post('j_72')));
					$j89 = str_replace('0.','.',strtolower($this->input->post('j_89')));
					$j106 = str_replace('0.','.',strtolower($this->input->post('j_106')));
					$j127 = str_replace('0.','.',strtolower($this->input->post('j_127')));
					$j136 = str_replace('0.','.',strtolower($this->input->post('j_136')));
					$j160 = str_replace('0.','.',strtolower($this->input->post('j_160')));

					if (strtolower($this->input->post('j_1')) == 'html' &&
							strtolower($this->input->post('j_2')) == 'lang' &&
							strtolower($this->input->post('j_3')) == 'head' &&
							strtolower($this->input->post('j_4')) == 'style' &&
							strtolower($this->input->post('j_5')) == '@keyframes animasi_1' &&
							strtolower($this->input->post('j_6')) == '0%' &&
							strtolower($this->input->post('j_7')) == 'background-color' &&
							strtolower($this->input->post('j_8')) == 'skyblue' &&
							($j9 == '0' || $j9 == '0px') &&
							($j10 == '0' || $j10 == '0px') &&
							strtolower($this->input->post('j_11')) == 'transform' &&
							strtolower($this->input->post('j_12')) == 'rotate' &&
							strtolower($this->input->post('j_13')) == '0deg' &&
							strtolower($this->input->post('j_14')) == '25%' &&
							strtolower($this->input->post('j_15')) == 'background-color' &&
							strtolower($this->input->post('j_16')) == 'yellow' &&
							strtolower($this->input->post('j_17')) == '200px' &&
							($j18 == '0' || $j18 == '0px') &&
							strtolower($this->input->post('j_19')) == 'transform' &&
							strtolower($this->input->post('j_20')) == 'rotate' &&
							strtolower($this->input->post('j_21')) == '90deg' &&
							strtolower($this->input->post('j_22')) == '50%' &&
							strtolower($this->input->post('j_23')) == 'background-color' &&
							strtolower($this->input->post('j_24')) == 'green' &&
							($j25 == '0' || $j25 == '0px') &&
							strtolower($this->input->post('j_26')) == '200px' &&
							strtolower($this->input->post('j_27')) == 'transform' &&
							strtolower($this->input->post('j_28')) == 'rotate' &&
							strtolower($this->input->post('j_29')) == '180deg' &&
							strtolower($this->input->post('j_30')) == '75%' &&
							strtolower($this->input->post('j_31')) == 'background-color' &&
							strtolower($this->input->post('j_32')) == 'blue' &&
							strtolower($this->input->post('j_33')) == '200px' &&
							strtolower($this->input->post('j_34')) == '200px' &&
							strtolower($this->input->post('j_35')) == 'transform' &&
							strtolower($this->input->post('j_36')) == 'rotate' &&
							strtolower($this->input->post('j_37')) == '270deg' &&
							strtolower($this->input->post('j_38')) == '100%' &&
							strtolower($this->input->post('j_39')) == 'background-color' &&
							strtolower($this->input->post('j_40')) == 'skyblue' &&
							($j41 == '0' || $j41 == '0px') &&
							($j42 == '0' || $j42 == '0px') &&
							strtolower($this->input->post('j_43')) == 'transform' &&
							strtolower($this->input->post('j_44')) == 'rotate' &&
							strtolower($this->input->post('j_45')) == '360deg' &&
							strtolower($this->input->post('j_46')) == '.kotak_' &&
							strtolower($this->input->post('j_47')) == '125px' &&
							strtolower($this->input->post('j_48')) == '125px' &&
							strtolower($this->input->post('j_49')) == '10px' &&
							strtolower($this->input->post('j_50')) == 'pink' &&
							strtolower($this->input->post('j_51')) == 'left' &&
							strtolower($this->input->post('j_52')) == '20px' &&
							($j53 == '.5s') &&
							strtolower($this->input->post('j_54')) == 'function' &&
							strtolower($this->input->post('j_55')) == 'linear' &&
							strtolower($this->input->post('j_56')) == 'transition-delay' &&
							($j57 == '.2s') &&
							strtolower($this->input->post('j_58')) == '.kotak_' &&
							strtolower($this->input->post('j_59')) == ':hover' &&
							strtolower($this->input->post('j_60')) == 'teal' &&
							strtolower($this->input->post('j_61')) == 'white' &&
							strtolower($this->input->post('j_62')) == '200px' &&
							strtolower($this->input->post('j_63')) == '200px' &&
							strtolower($this->input->post('j_64')) == '.kotak_' &&
							strtolower($this->input->post('j_65')) == '125px' &&
							strtolower($this->input->post('j_66')) == '125px' &&
							strtolower($this->input->post('j_67')) == '10px' &&
							strtolower($this->input->post('j_68')) == 'pink' &&
							strtolower($this->input->post('j_69')) == 'left' &&
							strtolower($this->input->post('j_70')) == '20px' &&
							strtolower($this->input->post('j_71')) == 'transition' &&
							($j72 == '.5s') &&
							strtolower($this->input->post('j_73')) == 'linear' &&
							strtolower($this->input->post('j_74')) == '.kotak_' &&
							strtolower($this->input->post('j_75')) == ':hover' &&
							strtolower($this->input->post('j_76')) == 'teal' &&
							strtolower($this->input->post('j_77')) == 'white' &&
							strtolower($this->input->post('j_78')) == 'transform' &&
							strtolower($this->input->post('j_79')) == 'scale' &&
							strtolower($this->input->post('j_80')) == '1.1' &&
							strtolower($this->input->post('j_81')) == '.kotak_' &&
							strtolower($this->input->post('j_82')) == '125px' &&
							strtolower($this->input->post('j_83')) == '125px' &&
							strtolower($this->input->post('j_84')) == '10px' &&
							strtolower($this->input->post('j_85')) == 'pink' &&
							strtolower($this->input->post('j_86')) == 'left' &&
							strtolower($this->input->post('j_87')) == '20px' &&
							strtolower($this->input->post('j_88')) == 'transition' &&
							($j89 == '.5s') &&
							strtolower($this->input->post('j_90')) == 'linear' &&
							strtolower($this->input->post('j_91')) == '.kotak_' &&
							strtolower($this->input->post('j_92')) == ':hover' &&
							strtolower($this->input->post('j_93')) == 'teal' &&
							strtolower($this->input->post('j_94')) == 'white' &&
							strtolower($this->input->post('j_95')) == 'transform' &&
							strtolower($this->input->post('j_96')) == 'rotate' &&
							strtolower($this->input->post('j_97')) == '90deg' &&
							strtolower($this->input->post('j_98')) == '.kotak_' &&
							strtolower($this->input->post('j_99')) == '125px' &&
							strtolower($this->input->post('j_100')) == '125px' &&
							strtolower($this->input->post('j_101')) == '10px' &&
							strtolower($this->input->post('j_102')) == 'pink' &&
							strtolower($this->input->post('j_103')) == 'left' &&
							strtolower($this->input->post('j_104')) == '20px' &&
							strtolower($this->input->post('j_105')) == 'transition' &&
							($j106 == '.5s') &&
							strtolower($this->input->post('j_107')) == 'linear' &&
							strtolower($this->input->post('j_108')) == '.kotak_' &&
							strtolower($this->input->post('j_109')) == ':hover' &&
							strtolower($this->input->post('j_110')) == 'teal' &&
							strtolower($this->input->post('j_111')) == 'white' &&
							strtolower($this->input->post('j_112')) == 'transform' &&
							strtolower($this->input->post('j_113')) == 'rotate' &&
							strtolower($this->input->post('j_114')) == '-90deg' &&
							strtolower($this->input->post('j_115')) == '.kotak_' &&
							strtolower($this->input->post('j_116')) == '125px' &&
							strtolower($this->input->post('j_117')) == '125px' &&
							strtolower($this->input->post('j_118')) == '10px' &&
							strtolower($this->input->post('j_119')) == 'pink' &&
							strtolower($this->input->post('j_120')) == 'relative' &&
							strtolower($this->input->post('j_121')) == 'left' &&
							strtolower($this->input->post('j_122')) == '20px' &&
							strtolower($this->input->post('j_123')) == 'animation' &&
							strtolower($this->input->post('j_124')) == 'animasi_1' &&
							strtolower($this->input->post('j_125')) == '3s' &&
							strtolower($this->input->post('j_126')) == 'linear' &&
							($j127 == '.1s') &&
							strtolower($this->input->post('j_128')) == '.kotak_' &&
							strtolower($this->input->post('j_129')) == '125px' &&
							strtolower($this->input->post('j_130')) == '125px' &&
							strtolower($this->input->post('j_131')) == '10px' &&
							strtolower($this->input->post('j_132')) == 'pink' &&
							strtolower($this->input->post('j_133')) == 'clear' &&
							strtolower($this->input->post('j_134')) == 'left' &&
							strtolower($this->input->post('j_135')) == 'transition' &&
							($j136 == '.5s') &&
							strtolower($this->input->post('j_137')) == 'linear' &&
							strtolower($this->input->post('j_138')) == '.kotak_' &&
							strtolower($this->input->post('j_139')) == ':hover' &&
							strtolower($this->input->post('j_140')) == 'teal' &&
							strtolower($this->input->post('j_141')) == 'white' &&
							strtolower($this->input->post('j_142')) == 'transform' &&
							strtolower($this->input->post('j_143')) == 'matrix' &&
							($j144 == '0' || $j144 == '0px') &&
							strtolower($this->input->post('j_145')) == '2.4' &&
							strtolower($this->input->post('j_146')) == '-1' &&
							strtolower($this->input->post('j_147')) == '1' &&
							strtolower($this->input->post('j_148')) == '1' &&
							strtolower($this->input->post('j_149')) == '10' &&
							strtolower($this->input->post('j_150')) == '.kotak_' &&
							strtolower($this->input->post('j_151')) == '125px' &&
							strtolower($this->input->post('j_152')) == '125px' &&
							strtolower($this->input->post('j_153')) == '10px' &&
							strtolower($this->input->post('j_154')) == 'pink' &&
							strtolower($this->input->post('j_155')) == 'relative' &&
							strtolower($this->input->post('j_156')) == 'left' &&
							strtolower($this->input->post('j_157')) == '20px' &&
							strtolower($this->input->post('j_158')) == 'animation' &&
							strtolower($this->input->post('j_159')) == 'animasi_2' &&
							($j160 == '3s') &&
							strtolower($this->input->post('j_161')) == 'linear' &&
							strtolower($this->input->post('j_162')) == '4' &&
							strtolower($this->input->post('j_163')) == 'alternate' &&
							strtolower($this->input->post('j_164')) == '@keyframes animasi_2' &&
							strtolower($this->input->post('j_165')) == 'from' &&
							strtolower($this->input->post('j_166')) == 'pink' &&
							strtolower($this->input->post('j_167')) == 'border-radius' &&
							($j168 == '0' || $j168 == '0px') &&
							strtolower($this->input->post('j_169')) == 'to' &&
							strtolower($this->input->post('j_170')) == 'salmon' &&
							strtolower($this->input->post('j_171')) == 'border-radius' &&
							strtolower($this->input->post('j_172')) == '/style' &&
							strtolower($this->input->post('j_173')) == '/head' &&
							strtolower($this->input->post('j_174')) == 'body' &&
							strtolower($this->input->post('j_175')) == 'class' &&
							strtolower($this->input->post('j_176')) == 'kotak_1' &&
							strtolower($this->input->post('j_177')) == 'class' &&
							strtolower($this->input->post('j_178')) == 'kotak_2' &&
							strtolower($this->input->post('j_179')) == 'class' &&
							strtolower($this->input->post('j_180')) == 'kotak_3' &&
							strtolower($this->input->post('j_181')) == 'class' &&
							strtolower($this->input->post('j_182')) == 'kotak_4' &&
							strtolower($this->input->post('j_183')) == 'class' &&
							strtolower($this->input->post('j_184')) == 'kotak_5' &&
							strtolower($this->input->post('j_185')) == 'class' &&
							strtolower($this->input->post('j_186')) == 'kotak_6' &&
							strtolower($this->input->post('j_187')) == 'class' &&
							strtolower($this->input->post('j_188')) == 'kotak_7' &&
							strtolower($this->input->post('j_189')) == '/body' &&
							strtolower($this->input->post('j_190')) == '/html'
						)
					{
						$ls = site_url('belajar-css/teori'); // Link Selanjutnya

						$this->respon = [
							's' => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"];
						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(7,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'transisi transformasi dan animasi pada css', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',7,25)]);

						if (strtolower($this->input->post('j_1')) != 'html') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'lang') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'head') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'style') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '@keyframes animasi_1') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != '0%') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'background-color') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != 'skyblue') $this->_pk('j_8');
						if (!($j9 == '0' || $j9 == '0px')) $this->_pk('j_9');
						if (!($j10 == '0' || $j10 == '0px')) $this->_pk('j_10');
						if (strtolower($this->input->post('j_11')) != 'transform') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12')) != 'rotate') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13')) != '0deg') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14')) != '25%') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15')) != 'background-color') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16')) != 'yellow') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17')) != '200px') $this->_pk('j_17');
						if (!($j18 == '0' || $j18 == '0px')) $this->_pk('j_18');
						if (strtolower($this->input->post('j_19')) != 'transform') $this->_pk('j_19');
						if (strtolower($this->input->post('j_20')) != 'rotate') $this->_pk('j_20');
						if (strtolower($this->input->post('j_21')) != '90deg') $this->_pk('j_21');
						if (strtolower($this->input->post('j_22')) != '50%') $this->_pk('j_22');
						if (strtolower($this->input->post('j_23')) != 'background-color') $this->_pk('j_23');
						if (strtolower($this->input->post('j_24')) != 'green') $this->_pk('j_24');
						if (!($j25 == '0' || $j25 == '0px')) $this->_pk('j_25');
						if (strtolower($this->input->post('j_26')) != '200px') $this->_pk('j_26');
						if (strtolower($this->input->post('j_27')) != 'transform') $this->_pk('j_27');
						if (strtolower($this->input->post('j_28')) != 'rotate') $this->_pk('j_28');
						if (strtolower($this->input->post('j_29')) != '180deg') $this->_pk('j_29');
						if (strtolower($this->input->post('j_30')) != '75%') $this->_pk('j_30');
						if (strtolower($this->input->post('j_31')) != 'background-color') $this->_pk('j_31');
						if (strtolower($this->input->post('j_32')) != 'blue') $this->_pk('j_32');
						if (strtolower($this->input->post('j_33')) != '200px') $this->_pk('j_33');
						if (strtolower($this->input->post('j_34')) != '200px') $this->_pk('j_34');
						if (strtolower($this->input->post('j_35')) != 'transform') $this->_pk('j_35');
						if (strtolower($this->input->post('j_36')) != 'rotate') $this->_pk('j_36');
						if (strtolower($this->input->post('j_37')) != '270deg') $this->_pk('j_37');
						if (strtolower($this->input->post('j_38')) != '100%') $this->_pk('j_38');
						if (strtolower($this->input->post('j_39')) != 'background-color') $this->_pk('j_39');
						if (strtolower($this->input->post('j_40')) != 'skyblue') $this->_pk('j_40');
						if (!($j41 == '0' || $j41 == '0px')) $this->_pk('j_41');
						if (!($j42 == '0' || $j42 == '0px')) $this->_pk('j_42');
						if (strtolower($this->input->post('j_43')) != 'transform') $this->_pk('j_43');
						if (strtolower($this->input->post('j_44')) != 'rotate') $this->_pk('j_44');
						if (strtolower($this->input->post('j_45')) != '360deg') $this->_pk('j_45');
						if (strtolower($this->input->post('j_46')) != '.kotak_') $this->_pk('j_46');
						if (strtolower($this->input->post('j_47')) != '125px') $this->_pk('j_47');
						if (strtolower($this->input->post('j_48')) != '125px') $this->_pk('j_48');
						if (strtolower($this->input->post('j_49')) != '10px') $this->_pk('j_49');
						if (strtolower($this->input->post('j_50')) != 'pink') $this->_pk('j_50');
						if (strtolower($this->input->post('j_51')) != 'left') $this->_pk('j_51');
						if (strtolower($this->input->post('j_52')) != '20px') $this->_pk('j_52');
						if (!($j53 == '.5s')) $this->_pk('j_53');
						if (strtolower($this->input->post('j_54')) != 'function') $this->_pk('j_54');
						if (strtolower($this->input->post('j_55')) != 'linear') $this->_pk('j_55');
						if (strtolower($this->input->post('j_56')) != 'transition-delay') $this->_pk('j_56');
						if (!($j57 == '.2s')) $this->_pk('j_57');
						if (strtolower($this->input->post('j_58')) != '.kotak_') $this->_pk('j_58');
						if (strtolower($this->input->post('j_59')) != ':hover') $this->_pk('j_59');
						if (strtolower($this->input->post('j_60')) != 'teal') $this->_pk('j_60');
						if (strtolower($this->input->post('j_61')) != 'white') $this->_pk('j_61');
						if (strtolower($this->input->post('j_62')) != '200px') $this->_pk('j_62');
						if (strtolower($this->input->post('j_63')) != '200px') $this->_pk('j_63');
						if (strtolower($this->input->post('j_64')) != '.kotak_') $this->_pk('j_64');
						if (strtolower($this->input->post('j_65')) != '125px') $this->_pk('j_65');
						if (strtolower($this->input->post('j_66')) != '125px') $this->_pk('j_66');
						if (strtolower($this->input->post('j_67')) != '10px') $this->_pk('j_67');
						if (strtolower($this->input->post('j_68')) != 'pink') $this->_pk('j_68');
						if (strtolower($this->input->post('j_69')) != 'left') $this->_pk('j_69');
						if (strtolower($this->input->post('j_70')) != '20px') $this->_pk('j_70');
						if (strtolower($this->input->post('j_71')) != 'transition') $this->_pk('j_71');
						if (!($j72 == '.5s')) $this->_pk('j_72');
						if (strtolower($this->input->post('j_73')) != 'linear') $this->_pk('j_73');
						if (strtolower($this->input->post('j_74')) != '.kotak_') $this->_pk('j_74');
						if (strtolower($this->input->post('j_75')) != ':hover') $this->_pk('j_75');
						if (strtolower($this->input->post('j_76')) != 'teal') $this->_pk('j_76');
						if (strtolower($this->input->post('j_77')) != 'white') $this->_pk('j_77');
						if (strtolower($this->input->post('j_78')) != 'transform') $this->_pk('j_78');
						if (strtolower($this->input->post('j_79')) != 'scale') $this->_pk('j_79');
						if (strtolower($this->input->post('j_80')) != '1.1') $this->_pk('j_80');
						if (strtolower($this->input->post('j_81')) != '.kotak_') $this->_pk('j_81');
						if (strtolower($this->input->post('j_82')) != '125px') $this->_pk('j_82');
						if (strtolower($this->input->post('j_83')) != '125px') $this->_pk('j_83');
						if (strtolower($this->input->post('j_84')) != '10px') $this->_pk('j_84');
						if (strtolower($this->input->post('j_85')) != 'pink') $this->_pk('j_85');
						if (strtolower($this->input->post('j_86')) != 'left') $this->_pk('j_86');
						if (strtolower($this->input->post('j_87')) != '20px') $this->_pk('j_87');
						if (strtolower($this->input->post('j_88')) != 'transition') $this->_pk('j_88');
						if (!($j89 == '.5s')) $this->_pk('j_89');
						if (strtolower($this->input->post('j_90')) != 'linear') $this->_pk('j_90');
						if (strtolower($this->input->post('j_91')) != '.kotak_') $this->_pk('j_91');
						if (strtolower($this->input->post('j_92')) != ':hover') $this->_pk('j_92');
						if (strtolower($this->input->post('j_93')) != 'teal') $this->_pk('j_93');
						if (strtolower($this->input->post('j_94')) != 'white') $this->_pk('j_94');
						if (strtolower($this->input->post('j_95')) != 'transform') $this->_pk('j_95');
						if (strtolower($this->input->post('j_96')) != 'rotate') $this->_pk('j_96');
						if (strtolower($this->input->post('j_97')) != '90deg') $this->_pk('j_97');
						if (strtolower($this->input->post('j_98')) != '.kotak_') $this->_pk('j_98');
						if (strtolower($this->input->post('j_99')) != '125px') $this->_pk('j_99');
						if (strtolower($this->input->post('j_100')) != '125px') $this->_pk('j_100');
						if (strtolower($this->input->post('j_101')) != '10px') $this->_pk('j_101');
						if (strtolower($this->input->post('j_102')) != 'pink') $this->_pk('j_102');
						if (strtolower($this->input->post('j_103')) != 'left') $this->_pk('j_103');
						if (strtolower($this->input->post('j_104')) != '20px') $this->_pk('j_104');
						if (strtolower($this->input->post('j_105')) != 'transition') $this->_pk('j_105');
						if (!($j106 == '.5s')) $this->_pk('j_106');
						if (strtolower($this->input->post('j_107')) != 'linear') $this->_pk('j_107');
						if (strtolower($this->input->post('j_108')) != '.kotak_') $this->_pk('j_108');
						if (strtolower($this->input->post('j_109')) != ':hover') $this->_pk('j_109');
						if (strtolower($this->input->post('j_110')) != 'teal') $this->_pk('j_110');
						if (strtolower($this->input->post('j_111')) != 'white') $this->_pk('j_111');
						if (strtolower($this->input->post('j_112')) != 'transform') $this->_pk('j_112');
						if (strtolower($this->input->post('j_113')) != 'rotate') $this->_pk('j_113');
						if (strtolower($this->input->post('j_114')) != '-90deg') $this->_pk('j_114');
						if (strtolower($this->input->post('j_115')) != '.kotak_') $this->_pk('j_115');
						if (strtolower($this->input->post('j_116')) != '125px') $this->_pk('j_116');
						if (strtolower($this->input->post('j_117')) != '125px') $this->_pk('j_117');
						if (strtolower($this->input->post('j_118')) != '10px') $this->_pk('j_118');
						if (strtolower($this->input->post('j_119')) != 'pink') $this->_pk('j_119');
						if (strtolower($this->input->post('j_120')) != 'relative') $this->_pk('j_120');
						if (strtolower($this->input->post('j_121')) != 'left') $this->_pk('j_121');
						if (strtolower($this->input->post('j_122')) != '20px') $this->_pk('j_122');
						if (strtolower($this->input->post('j_123')) != 'animation') $this->_pk('j_123');
						if (strtolower($this->input->post('j_124')) != 'animasi_1') $this->_pk('j_124');
						if (strtolower($this->input->post('j_125')) != '3s') $this->_pk('j_125');
						if (strtolower($this->input->post('j_126')) != 'linear') $this->_pk('j_126');
						if (!($j127 == '.1s')) $this->_pk('j_127');
						if (strtolower($this->input->post('j_128')) != '.kotak_') $this->_pk('j_128');
						if (strtolower($this->input->post('j_129')) != '125px') $this->_pk('j_129');
						if (strtolower($this->input->post('j_130')) != '125px') $this->_pk('j_130');
						if (strtolower($this->input->post('j_131')) != '10px') $this->_pk('j_131');
						if (strtolower($this->input->post('j_132')) != 'pink') $this->_pk('j_132');
						if (strtolower($this->input->post('j_133')) != 'clear') $this->_pk('j_133');
						if (strtolower($this->input->post('j_134')) != 'left') $this->_pk('j_134');
						if (strtolower($this->input->post('j_135')) != 'transition') $this->_pk('j_135');
						if (!($j136 == '.5s')) $this->_pk('j_136');
						if (strtolower($this->input->post('j_137')) != 'linear') $this->_pk('j_137');
						if (strtolower($this->input->post('j_138')) != '.kotak_') $this->_pk('j_138');
						if (strtolower($this->input->post('j_139')) != ':hover') $this->_pk('j_139');
						if (strtolower($this->input->post('j_140')) != 'teal') $this->_pk('j_140');
						if (strtolower($this->input->post('j_141')) != 'white') $this->_pk('j_141');
						if (strtolower($this->input->post('j_142')) != 'transform') $this->_pk('j_142');
						if (strtolower($this->input->post('j_143')) != 'matrix') $this->_pk('j_143');
						if (!($j144 == '0' || $j144 == '0px')) $this->_pk('j_144');
						if (strtolower($this->input->post('j_145')) != '2.4') $this->_pk('j_145');
						if (strtolower($this->input->post('j_146')) != '-1') $this->_pk('j_146');
						if (strtolower($this->input->post('j_147')) != '1') $this->_pk('j_147');
						if (strtolower($this->input->post('j_148')) != '1') $this->_pk('j_148');
						if (strtolower($this->input->post('j_149')) != '10') $this->_pk('j_149');
						if (strtolower($this->input->post('j_150')) != '.kotak_') $this->_pk('j_150');
						if (strtolower($this->input->post('j_151')) != '125px') $this->_pk('j_151');
						if (strtolower($this->input->post('j_152')) != '125px') $this->_pk('j_152');
						if (strtolower($this->input->post('j_153')) != '10px') $this->_pk('j_153');
						if (strtolower($this->input->post('j_154')) != 'pink') $this->_pk('j_154');
						if (strtolower($this->input->post('j_155')) != 'relative') $this->_pk('j_155');
						if (strtolower($this->input->post('j_156')) != 'left') $this->_pk('j_156');
						if (strtolower($this->input->post('j_157')) != '20px') $this->_pk('j_157');
						if (strtolower($this->input->post('j_158')) != 'animation') $this->_pk('j_158');
						if (strtolower($this->input->post('j_159')) != 'animasi_2') $this->_pk('j_159');
						if (!($j160 == '3s')) $this->_pk('j_160');
						if (strtolower($this->input->post('j_161')) != 'linear') $this->_pk('j_161');
						if (strtolower($this->input->post('j_162')) != '4') $this->_pk('j_162');
						if (strtolower($this->input->post('j_163')) != 'alternate') $this->_pk('j_163');
						if (strtolower($this->input->post('j_164')) != '@keyframes animasi_2') $this->_pk('j_164');
						if (strtolower($this->input->post('j_165')) != 'from') $this->_pk('j_165');
						if (strtolower($this->input->post('j_166')) != 'pink') $this->_pk('j_166');
						if (strtolower($this->input->post('j_167')) != 'border-radius') $this->_pk('j_167');
						if (!($j168 == '0' || $j168 == '0px')) $this->_pk('j_168');
						if (strtolower($this->input->post('j_169')) != 'to') $this->_pk('j_169');
						if (strtolower($this->input->post('j_170')) != 'salmon') $this->_pk('j_170');
						if (strtolower($this->input->post('j_171')) != 'border-radius') $this->_pk('j_171');
						if (strtolower($this->input->post('j_172')) != '/style') $this->_pk('j_172');
						if (strtolower($this->input->post('j_173')) != '/head') $this->_pk('j_173');
						if (strtolower($this->input->post('j_174')) != 'body') $this->_pk('j_174');
						if (strtolower($this->input->post('j_175')) != 'class') $this->_pk('j_175');
						if (strtolower($this->input->post('j_176')) != 'kotak_1') $this->_pk('j_176');
						if (strtolower($this->input->post('j_177')) != 'class') $this->_pk('j_177');
						if (strtolower($this->input->post('j_178')) != 'kotak_2') $this->_pk('j_178');
						if (strtolower($this->input->post('j_179')) != 'class') $this->_pk('j_179');
						if (strtolower($this->input->post('j_180')) != 'kotak_3') $this->_pk('j_180');
						if (strtolower($this->input->post('j_181')) != 'class') $this->_pk('j_181');
						if (strtolower($this->input->post('j_182')) != 'kotak_4') $this->_pk('j_182');
						if (strtolower($this->input->post('j_183')) != 'class') $this->_pk('j_183');
						if (strtolower($this->input->post('j_184')) != 'kotak_5') $this->_pk('j_184');
						if (strtolower($this->input->post('j_185')) != 'class') $this->_pk('j_185');
						if (strtolower($this->input->post('j_186')) != 'kotak_6') $this->_pk('j_186');
						if (strtolower($this->input->post('j_187')) != 'class') $this->_pk('j_187');
						if (strtolower($this->input->post('j_188')) != 'kotak_7') $this->_pk('j_188');
						if (strtolower($this->input->post('j_189')) != '/body') $this->_pk('j_189');
						if (strtolower($this->input->post('j_190')) != '/html') $this->_pk('j_190');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('lebih banyak tentang css'))
			{
				if ($b == sha1(2))
				{
					if (strtolower($this->input->post('j_1')) == '10')
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if (strtolower($this->input->post('j_1')) == '-ms-')
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && $this->input->post('j_2',TRUE) === NULL)
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (strtolower($this->input->post('j_1')) == '-webkit-box-shadow' && strtolower($this->input->post('j_2')) == '-moz-box-shadow' && strtolower($this->input->post('j_3')) == '-ms-box-shadow' && strtolower($this->input->post('j_4')) == '-o-box-shadow')
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,10)]);

						if (strtolower($this->input->post('j_1')) != '-webkit-box-shadow') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '-moz-box-shadow') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != '-ms-box-shadow') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != '-o-box-shadow') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if (strtolower($this->input->post('j_1')) == ':root' && strtolower($this->input->post('j_2')) == 'background-color' && strtolower($this->input->post('j_3')) == 'teal')
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,14)]);

						if (strtolower($this->input->post('j_1')) != ':root') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'background-color') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'teal') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					$j3 = strtolower($this->input->post('j_3'));

					if (strtolower($this->input->post('j_1')) == 'h1' && strtolower($this->input->post('j_2')) == '--font-arial' && ($j3 == "'arial'" || $j3 == "\"arial\"" || $j3 == "arial") && strtolower($this->input->post('j_4')) == "font-family" && strtolower($this->input->post('j_5')) == "var(--font-arial)")
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,16)]);

						if (strtolower($this->input->post('j_1')) != 'h1') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '--font-arial') $this->_pk('j_2');
						if (!($j3 == "'arial'" || $j3 == "\"arial\"" || $j3 == "arial")) $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != "font-family") $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != "var(--font-arial)") $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if (strtolower($this->input->post('j_1')) == 'meta' && strtolower($this->input->post('j_2')) == 'viewport' && strtolower($this->input->post('j_3')) == 'content' && strtolower($this->input->post('j_4')) == 'width=device-width' && strtolower($this->input->post('j_5')) == 'initial-scale=1')
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,18)]);

						if (strtolower($this->input->post('j_1')) != 'meta') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'viewport') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'content') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'width=device-width') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != 'initial-scale=1') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					if (strtolower($this->input->post('j_1')) == 'min-width' && strtolower($this->input->post('j_2')) == '480px' && strtolower($this->input->post('j_3')) == 'and' && strtolower($this->input->post('j_4')) == 'max-width' && strtolower($this->input->post('j_5')) == '679px' && strtolower($this->input->post('j_6')) == 'and' && strtolower($this->input->post('j_7')) == 'orientation' && strtolower($this->input->post('j_8')) == 'landscape')
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,19)]);

						if (strtolower($this->input->post('j_1')) != 'min-width') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != '480px') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3')) != 'and') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4')) != 'max-width') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5')) != '679px') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6')) != 'and') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7')) != 'orientation') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8')) != 'landscape') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL) && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_7',TRUE) === NULL)
					{
						$ls = site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_css(8,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang css', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('css',8,23)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function segarkan_bagian_teori_css()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m != NULL && $b != NULL)
		{
			if ($m == 8 && $b == 25)
			{
				$this->_cek_sertifikat('CSS');
			}
			else
			{
				$this->_cek_pencapaian();
			}

			if ($this->belajar->segarkan_bagian_teori_css($m,$b))
			{
				if ($m == 8 && $b == 25)
				{
					$this->ang->bot("{$this->session->ang_nama_pengguna} menyelesaikan kelas CSS di Always Ngoding.");
					$this->ang->kakd("{$this->session->ang_nama_pengguna} (".site_url("anggota/{$this->session->ang_nama_pengguna}").") menyelesaikan kelas CSS di Always Ngoding :partying_face:");
				}

				$pesan = ">> Berhasil menyegarkan... << >> {$m} << >> {$b} <<";
			}
			else
			{
				$pesan = ">> Tidak ada yang perlu disegarkan... << >> {$m} << >> {$b} <<";
			}

			echo $this->_encode_dengan_token(array_merge($this->respon, ['pesan' => $pesan]));
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function hasil_teori_css($modul,$bagian,$flag)
	{
		if ($modul == 1) $jumlah_bagian = 22;
		elseif ($modul == 2) $jumlah_bagian = 19;
		elseif ($modul == 3) $jumlah_bagian = 30;
		elseif ($modul == 4) $jumlah_bagian = 26;
		elseif ($modul == 5) $jumlah_bagian = 25;
		elseif ($modul == 6) $jumlah_bagian = 15;
		elseif ($modul == 7) $jumlah_bagian = 25;
		elseif ($modul == 8) $jumlah_bagian = 25;
		else show_404();

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->ambil_bagian_terakhir_teori_css($modul) > $bagian-1)
			{
				if (file_exists(APPPATH."views/belajar/css/hasil/{$modul}/{$bagian}-{$flag}.php"))
				{
					$this->load->view("belajar/css/hasil/{$modul}/{$bagian}-{$flag}");
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

	public function awal_belajar_teori_php($J1=8,$J2=19,$J3=27,$J4=25,$J5=10,$J6=46,$J7=18,$J8=21)
	{
		if ($this->session->has_userdata('ang_akses'))
		{
			$this->belajar->init_kelas_pengguna('php');

			$B1 = $this->belajar->ambil_bagian_terakhir_teori_php(1);
			$B2 = $this->belajar->ambil_bagian_terakhir_teori_php(2);
			$B3 = $this->belajar->ambil_bagian_terakhir_teori_php(3);
			$B4 = $this->belajar->ambil_bagian_terakhir_teori_php(4);
			$B5 = $this->belajar->ambil_bagian_terakhir_teori_php(5);
			$B6 = $this->belajar->ambil_bagian_terakhir_teori_php(6);
			$B7 = $this->belajar->ambil_bagian_terakhir_teori_php(7);
			$B8 = $this->belajar->ambil_bagian_terakhir_teori_php(8);
			$P1 = ($B1 > 1) ? round($this->_persentase($B1,$J1+1)) : 0;
			$P2 = ($B2 > 1) ? round($this->_persentase($B2,$J2+1)) : 0;
			$P3 = ($B3 > 1) ? round($this->_persentase($B3,$J3+1)) : 0;
			$P4 = ($B4 > 1) ? round($this->_persentase($B4,$J4+1)) : 0;
			$P5 = ($B5 > 1) ? round($this->_persentase($B5,$J5+1)) : 0;
			$P6 = ($B6 > 1) ? round($this->_persentase($B6,$J6+1)) : 0;
			$P7 = ($B7 > 1) ? round($this->_persentase($B7,$J7+1)) : 0;
			$P8 = ($B8 > 1) ? round($this->_persentase($B8,$J8+1)) : 0;
			$P1 = $P1 > 100 ? 100 : $P1;
			$P2 = $P2 > 100 ? 100 : $P2;
			$P3 = $P3 > 100 ? 100 : $P3;
			$P4 = $P4 > 100 ? 100 : $P4;
			$P5 = $P5 > 100 ? 100 : $P5;
			$P6 = $P6 > 100 ? 100 : $P6;
			$P7 = $P7 > 100 ? 100 : $P7;
			$P8 = $P8 > 100 ? 100 : $P8;
			$W1 = $this->_warna_chart($P1);
			$W2 = $this->_warna_chart($P2);
			$W3 = $this->_warna_chart($P3);
			$W4 = $this->_warna_chart($P4);
			$W5 = $this->_warna_chart($P5);
			$W6 = $this->_warna_chart($P6);
			$W7 = $this->_warna_chart($P7);
			$W8 = $this->_warna_chart($P8);
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'jumlah_bagian_7' => $J7,
				'jumlah_bagian_8' => $J8,
				'warna_chart_1' => $W1,
				'warna_chart_2' => $W2,
				'warna_chart_3' => $W3,
				'warna_chart_4' => $W4,
				'warna_chart_5' => $W5,
				'warna_chart_6' => $W6,
				'warna_chart_7' => $W7,
				'warna_chart_8' => $W8,
				'persentase_1' => $P1,
				'persentase_2' => $P2,
				'persentase_3' => $P3,
				'persentase_4' => $P4,
				'persentase_5' => $P5,
				'persentase_6' => $P6,
				'persentase_7' => $P7,
				'persentase_8' => $P8,
				'bagian_1' => $B1,
				'bagian_2' => $B2,
				'bagian_3' => $B3,
				'bagian_4' => $B4,
				'bagian_5' => $B5,
				'bagian_6' => $B6,
				'bagian_7' => $B7,
				'bagian_8' => $B8
			];
		}
		else
		{
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'jumlah_bagian_7' => $J7,
				'jumlah_bagian_8' => $J8,
				'warna_chart_1' => 'grey',
				'warna_chart_2' => 'grey',
				'warna_chart_3' => 'grey',
				'warna_chart_4' => 'grey',
				'warna_chart_5' => 'grey',
				'warna_chart_6' => 'grey',
				'warna_chart_7' => 'grey',
				'warna_chart_8' => 'grey',
				'persentase_1' => 0,
				'persentase_2' => 0,
				'persentase_3' => 0,
				'persentase_4' => 0,
				'persentase_5' => 0,
				'persentase_6' => 0,
				'persentase_7' => 0,
				'persentase_8' => 0,
				'bagian_1' => 1,
				'bagian_2' => 1,
				'bagian_3' => 1,
				'bagian_4' => 1,
				'bagian_5' => 1,
				'bagian_6' => 1,
				'bagian_7' => 1,
				'bagian_8' => 1
			];
		}

		$this->load->view('belajar/php/teori/awal',$DT);
	}

	public function teori_berkenalan_dengan_php($bagian,$jumlah_bagian=8)
	{
		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_php(1,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('php','1','belajar-php/teori/berkenalan-dengan-php');
				}

				$this->load->view("belajar/php/teori/1/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function syntax_dasar_php($bagian,$jumlah_bagian=19)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_php(1) > 8)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_php(2,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('php','2','belajar-php/teori/syntax-dasar-php');
					}

					$this->load->view("belajar/php/teori/2/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function tipe_data_pada_php($bagian,$jumlah_bagian=27)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_php(2) > 19)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_php(3,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('php','3','belajar-php/teori/tipe-data-pada-php');
					}

					$this->load->view("belajar/php/teori/3/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function kondisi_dan_perulangan_pada_php($bagian,$jumlah_bagian=25)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_php(3) > 27)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_php(4,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('php','4','belajar-php/teori/kondisi-dan-perulangan-pada-php');
					}

					$this->load->view("belajar/php/teori/4/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function function_pada_php($bagian,$jumlah_bagian=10)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_php(4) > 25)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_php(5,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('php','5','belajar-php/teori/function-pada-php');
					}

					$this->load->view("belajar/php/teori/5/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function pbo_oop_pada_php($bagian,$jumlah_bagian=46)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_php(5) > 10)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_php(6,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('php','6','belajar-php/teori/pbo-oop-pada-php');
					}

					$this->load->view("belajar/php/teori/6/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function kelola_session_cookie_dan_files($bagian,$jumlah_bagian=18)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_php(6) > 46)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_php(7,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('php','7','belajar-php/teori/kelola-session-cookie-dan-files');
					}

					$this->load->view("belajar/php/teori/7/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function teori_lebih_banyak_tentang_php($bagian,$jumlah_bagian=21)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_php(7) > 18)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_php(8,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('php','8','belajar-php/teori/lebih-banyak-tentang-php');
					}

					$this->load->view("belajar/php/teori/8/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function jawab_teori_belajar_php()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m !== NULL && $b !== NULL)
		{
			if ($m == sha1('berkenalan dengan php'))
			{
				if ($b == sha1(3))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'personal home page')
					{
						$ls = site_url('belajar-php/teori/berkenalan-dengan-php/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(1,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan php', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',1,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'hypertext preprocessor')
					{
						$ls = site_url('belajar-php/teori/berkenalan-dengan-php/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(1,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan php', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',1,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'rasmus lerdorf' && strtolower($this->input->post('j_2',TRUE)) == '1995')
					{
						$ls = site_url('belajar-php/teori/berkenalan-dengan-php/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(1,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan php', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',1,5)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'rasmus lerdorf') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '1995') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_2',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/berkenalan-dengan-php/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(1,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan php', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',1,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'content management system')
					{
						$ls = site_url('belajar-php/teori/berkenalan-dengan-php/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(1,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan php', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',1,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));

					if (($j1 == '5.0' || $j1 == '5') && strtolower($this->input->post('j_2',TRUE)) == 'zend' && strtolower($this->input->post('j_3',TRUE)) == '2004')
					{
						$ls = site_url('belajar-php/teori'); // Link Selanjutnya

						$this->respon = [
							's' => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"];
						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(1,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan php', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',1,8)]);

						if (!($j1 == '5.0' || $j1 == '5')) $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'zend') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != '2004') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('syntax dasar php'))
			{
				if ($b == sha1(2))
				{
					if (strtolower($this->input->post('j_1',FALSE)) == '<?php' && strtolower($this->input->post('j_2',FALSE)) == '?>')
					{
						$ls = site_url('belajar-php/teori/syntax-dasar-php/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,2)]);

						if (strtolower($this->input->post('j_1',FALSE)) != '<?php') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',FALSE)) != '?>') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-php/teori/syntax-dasar-php/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '4')
					{
						$ls = site_url('belajar-php/teori/syntax-dasar-php/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-php/teori/syntax-dasar-php/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if (($this->input->post('j_3',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/syntax-dasar-php/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/syntax-dasar-php/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					$j3 = $this->input->post('j_3',FALSE);

					if ($this->input->post('j_1',FALSE) == '$nama' && strtolower($this->input->post('j_2',TRUE)) == 'echo' && ($j3 == 'halo nama saya adalah $nama.' || $j3 == 'halo nama saya adalah {$nama}.' || $j3 == 'halo nama saya adalah $nama' || $j3 == 'halo nama saya adalah {$nama}'))
					{
						$ls = site_url('belajar-php/teori/syntax-dasar-php/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,15)]);

						if ($this->input->post('j_1',FALSE) != '$nama') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'echo') $this->_pk('j_2');
						if (!($j3 == 'halo nama saya adalah $nama.' || $j3 == 'halo nama saya adalah {$nama}.' || $j3 == 'halo nama saya adalah $nama' || $j3 == 'halo nama saya adalah {$nama}')) $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					$j3 = intval($this->input->post('j_3',FALSE));

					if (strtolower($this->input->post('j_1',FALSE)) == 'define' && $this->input->post('j_2',TRUE) == 'USIA' && ($j3 > 1 && $j3 <= 150) && strtolower($this->input->post('j_4',FALSE)) == 'echo' && $this->input->post('j_5',TRUE) == 'USIA')
					{
						$ls = site_url('belajar-php/teori');

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(2,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'syntax dasar php', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',2,19)]);

						if (strtolower($this->input->post('j_1',FALSE)) != 'define') $this->_pk('j_1');
						if ($this->input->post('j_2',TRUE) != 'USIA') $this->_pk('j_2');
						if (!($j3 > 1 && $j3 <= 150)) $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',FALSE)) != 'echo') $this->_pk('j_4');
						if ($this->input->post('j_5',TRUE) != 'USIA') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('tipe data pada php'))
			{
				if ($b == sha1(2))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL && $this->input->post('j_8',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL && $this->input->post('j_9',TRUE) !== NULL && $this->input->post('j_10',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if ($this->input->post('j_1',FALSE) == '$nilai_1' && strtolower($this->input->post('j_2',TRUE)) == '10' &&
							$this->input->post('j_3',FALSE) == '$nilai_2' && strtolower($this->input->post('j_4',TRUE)) == '2' &&
							strtolower($this->input->post('j_5',TRUE)) == 'echo' && $this->input->post('j_6',FALSE) == '$nilai_1' &&
							strtolower($this->input->post('j_7',FALSE)) == '/' && $this->input->post('j_8',FALSE) == '$nilai_2'
						)
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,4)]);

						if ($this->input->post('j_1',FALSE) != '$nilai_1') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '10') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '$nilai_2') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != '2') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'echo') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$nilai_1') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',FALSE)) != '/') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '$nilai_2') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(4) && $j[1] == sha1(8) && $j[2] == sha1(2) && $j[3] == sha1(7) && $j[4] == sha1(5) && $j[5] == sha1(1) && $j[6] == sha1(6) && $j[7] == sha1(3))
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (($this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_6',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					$j3 = strtolower($this->input->post('j_3',TRUE));

					if ($this->input->post('j_1',FALSE) == '$kalimat' && strtolower($this->input->post('j_2',FALSE)) == '<<<contohheredoc' && ($j3 == 'saya sangat senang belajar php.' || $j3 == 'saya sangat senang belajar php') && strtolower($this->input->post('j_4',TRUE)) == 'contohheredoc' && strtolower($this->input->post('j_5',TRUE)) == 'echo' && $this->input->post('j_6',FALSE) == '$kalimat')
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,13)]);

						if ($this->input->post('j_1',FALSE) != '$kalimat') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',FALSE)) != '<<<contohheredoc') $this->_pk('j_2');
						if (!($j3 == 'saya sangat senang belajar php.' || $j3 == 'saya sangat senang belajar php')) $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'contohheredoc') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'echo') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$kalimat') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if ($this->input->post('j_1',FALSE) == '$kalimat' && strtolower($this->input->post('j_2',TRUE)) == "'saya sangat senang belajar php.'" && strtolower($this->input->post('j_3',TRUE)) == 'echo' && $this->input->post('j_4',FALSE) == '$kalimat')
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,14)]);

						if ($this->input->post('j_1',FALSE) != '$kalimat') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != "'saya sangat senang belajar php.'") $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'echo') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != '$kalimat') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if (strtolower($this->input->post('j_1',FALSE)) == 'echo' && $this->input->post('j_2',FALSE) == '$cowo[4]' && strtolower($this->input->post('j_3',FALSE)) == 'echo' && $this->input->post('j_4',FALSE) == '$cewe[2]' && strtolower($this->input->post('j_5',FALSE)) == 'echo' && $this->input->post('j_6',FALSE) == '$cowo[1]' && strtolower($this->input->post('j_7',FALSE)) == 'echo' && $this->input->post('j_8',FALSE) == '$cewe[3]')
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,20)]);

						if (strtolower($this->input->post('j_1',FALSE)) != 'echo') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '$cowo[4]') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',FALSE)) != 'echo') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != '$cewe[2]') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',FALSE)) != 'echo') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$cowo[1]') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',FALSE)) != 'echo') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '$cewe[3]') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					$j2 = str_replace(' ','',strtolower($this->input->post('j_2',FALSE)));

					if ($this->input->post('j_1',FALSE) == '$minuman' && ($j2 == "array('jus','kopi','teh','wedang')" || $j2 == "['jus','kopi','teh','wedang']" || $j2 == 'array("jus","kopi","teh","wedang")' || $j2 == '["jus","kopi","teh","wedang"]') && strtolower($this->input->post('j_3',FALSE)) == 'echo' && $this->input->post('j_4',FALSE) == '$minuman[2]')
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,21)]);

						if ($this->input->post('j_1',FALSE) != '$minuman') $this->_pk('j_1');
						if (!($j2 == "array('jus','kopi','teh','wedang')" || $j2 == "['jus','kopi','teh','wedang']" || $j2 == 'array("jus","kopi","teh","wedang")' || $j2 == '["jus","kopi","teh","wedang"]')) $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',FALSE)) != 'echo') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != '$minuman[2]') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,22)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'saya muhammad saleh solahudin, umur saya 18 tahun. saya suka minum kopi, dan saya juga suka donat. hobi saya adalah ngoding.')
					{
						$ls = site_url('belajar-php/teori/tipe-data-pada-php/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,24)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(27))
				{
					if ($this->input->post('j_1',FALSE) == '$karyawan_teladan' &&
							$this->input->post('j_2',FALSE) == '=' &&
							$this->input->post('j_3',FALSE) == '[' &&
							$this->input->post('j_4',FALSE) == 'Muhammad Saleh Solahudin' &&
							$this->input->post('j_5',FALSE) == '=>' &&
							$this->input->post('j_6',FALSE) == '[' &&
							$this->input->post('j_7',FALSE) == 'Jenis Kelamin' &&
							$this->input->post('j_8',FALSE) == '=>' &&
							$this->input->post('j_9',FALSE) == 'Laki-laki' &&
							$this->input->post('j_10',FALSE) == ',' &&
							$this->input->post('j_11',FALSE) == 'Alamat' &&
							$this->input->post('j_12',FALSE) == '=>' &&
							$this->input->post('j_13',FALSE) == 'Bogor' &&
							$this->input->post('j_14',FALSE) == ',' &&
							$this->input->post('j_15',FALSE) == 'Posisi' &&
							$this->input->post('j_16',FALSE) == '=>' &&
							$this->input->post('j_17',FALSE) == 'Full Stack Developer' &&
							$this->input->post('j_18',FALSE) == ',' &&
							$this->input->post('j_19',FALSE) == 'Poin Karyawan' &&
							$this->input->post('j_20',FALSE) == '=>' &&
							$this->input->post('j_21',FALSE) == '1500' &&
							$this->input->post('j_22',FALSE) == ']' &&
							$this->input->post('j_23',FALSE) == 'Karmila Sriwulan' &&
							$this->input->post('j_24',FALSE) == '=>' &&
							$this->input->post('j_25',FALSE) == '[' &&
							$this->input->post('j_26',FALSE) == 'Jenis Kelamin' &&
							$this->input->post('j_27',FALSE) == '=>' &&
							$this->input->post('j_28',FALSE) == 'Perempuan' &&
							$this->input->post('j_29',FALSE) == ',' &&
							$this->input->post('j_30',FALSE) == 'Alamat' &&
							$this->input->post('j_31',FALSE) == '=>' &&
							$this->input->post('j_32',FALSE) == 'Bogor' &&
							$this->input->post('j_33',FALSE) == ',' &&
							$this->input->post('j_34',FALSE) == 'Posisi' &&
							$this->input->post('j_35',FALSE) == '=>' &&
							$this->input->post('j_36',FALSE) == 'Corporate Manager' &&
							$this->input->post('j_37',FALSE) == ',' &&
							$this->input->post('j_38',FALSE) == 'Poin Karyawan' &&
							$this->input->post('j_39',FALSE) == '=>' &&
							$this->input->post('j_40',FALSE) == '1455' &&
							$this->input->post('j_41',FALSE) == ']' &&
							$this->input->post('j_42',FALSE) == ']'
						)
					{
						$ls = site_url('belajar-php/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(3,27);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada php', bagian '27'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',3,27)]);

						if ($this->input->post('j_1',FALSE) != '$karyawan_teladan') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '=') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '[') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'Muhammad Saleh Solahudin') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != '=>') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '[') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != 'Jenis Kelamin') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '=>') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != 'Laki-laki') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != ',') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != 'Alamat') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != '=>') $this->_pk('j_12');
						if ($this->input->post('j_13',FALSE) != 'Bogor') $this->_pk('j_13');
						if ($this->input->post('j_14',FALSE) != ',') $this->_pk('j_14');
						if ($this->input->post('j_15',FALSE) != 'Posisi') $this->_pk('j_15');
						if ($this->input->post('j_16',FALSE) != '=>') $this->_pk('j_16');
						if ($this->input->post('j_17',FALSE) != 'Full Stack Developer') $this->_pk('j_17');
						if ($this->input->post('j_18',FALSE) != ',') $this->_pk('j_18');
						if ($this->input->post('j_19',FALSE) != 'Poin Karyawan') $this->_pk('j_19');
						if ($this->input->post('j_20',FALSE) != '=>') $this->_pk('j_20');
						if ($this->input->post('j_21',FALSE) != '1500') $this->_pk('j_21');
						if ($this->input->post('j_22',FALSE) != ']') $this->_pk('j_22');
						if ($this->input->post('j_23',FALSE) != 'Karmila Sriwulan') $this->_pk('j_23');
						if ($this->input->post('j_24',FALSE) != '=>') $this->_pk('j_24');
						if ($this->input->post('j_25',FALSE) != '[') $this->_pk('j_25');
						if ($this->input->post('j_26',FALSE) != 'Jenis Kelamin') $this->_pk('j_26');
						if ($this->input->post('j_27',FALSE) != '=>') $this->_pk('j_27');
						if ($this->input->post('j_28',FALSE) != 'Perempuan') $this->_pk('j_28');
						if ($this->input->post('j_29',FALSE) != ',') $this->_pk('j_29');
						if ($this->input->post('j_30',FALSE) != 'Alamat') $this->_pk('j_30');
						if ($this->input->post('j_31',FALSE) != '=>') $this->_pk('j_31');
						if ($this->input->post('j_32',FALSE) != 'Bogor') $this->_pk('j_32');
						if ($this->input->post('j_33',FALSE) != ',') $this->_pk('j_33');
						if ($this->input->post('j_34',FALSE) != 'Posisi') $this->_pk('j_34');
						if ($this->input->post('j_35',FALSE) != '=>') $this->_pk('j_35');
						if ($this->input->post('j_36',FALSE) != 'Corporate Manager') $this->_pk('j_36');
						if ($this->input->post('j_37',FALSE) != ',') $this->_pk('j_37');
						if ($this->input->post('j_38',FALSE) != 'Poin Karyawan') $this->_pk('j_38');
						if ($this->input->post('j_39',FALSE) != '=>') $this->_pk('j_39');
						if ($this->input->post('j_40',FALSE) != '1455') $this->_pk('j_40');
						if ($this->input->post('j_41',FALSE) != ']') $this->_pk('j_41');
						if ($this->input->post('j_42',FALSE) != ']') $this->_pk('j_42');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('kondisi dan perulangan pada php'))
			{
				if ($b == sha1(4))
				{
					$j5 = $this->input->post('j_5',TRUE);

					if ($this->input->post('j_1',FALSE) == '$hobi' && $this->input->post('j_2',TRUE) == 'if' &&
							$this->input->post('j_3',FALSE) == '{' && $this->input->post('j_4',FALSE) == '}' &&
							($j5 == 'elseif' || $j5 == 'else if') && $this->input->post('j_6',FALSE) == '$hobi' &&
							$this->input->post('j_7',TRUE) == 'berenang' && $this->input->post('j_8',FALSE) == '{' &&
							$this->input->post('j_9',FALSE) == '}' && $this->input->post('j_10',TRUE) == 'else' &&
							$this->input->post('j_11',FALSE) == '{' && $this->input->post('j_12',FALSE) == '}'
						)
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,4)]);

						if ($this->input->post('j_1',FALSE) != '$hobi') $this->_pk('j_1');
						if ($this->input->post('j_2',TRUE) != 'if') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '{') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != '}') $this->_pk('j_4');
						if (!($j5 == 'elseif' || $j5 == 'else if')) $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$hobi') $this->_pk('j_6');
						if ($this->input->post('j_7',TRUE) != 'berenang') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '{') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != '}') $this->_pk('j_9');
						if ($this->input->post('j_10',TRUE) != 'else') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != '{') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != '}') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j_1',TRUE) == 'switch' && $this->input->post('j_2',FALSE) == '$hobi' &&
							$this->input->post('j_3',FALSE) == '{' && $this->input->post('j_4',TRUE) == 'case' &&
							$this->input->post('j_5',FALSE) == 'break;' && $this->input->post('j_6',FALSE) == 'break;' &&
							$this->input->post('j_7',FALSE) == 'default:' && $this->input->post('j_8',FALSE) == '}'
						)
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,5)]);

						if ($this->input->post('j_1',TRUE) != 'switch') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '$hobi') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '{') $this->_pk('j_3');
						if ($this->input->post('j_4',TRUE) != 'case') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != 'break;') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != 'break;') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != 'default:') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '}') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(5))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j',TRUE) == sha1(5))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if ($this->input->post('j',TRUE) == sha1(7))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL && $this->input->post('j_10',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL && $this->input->post('j_8',TRUE) !== NULL && $this->input->post('j_9',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL && $this->input->post('j_6',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));

					if ($j1 == 'counted loop' || $j1 == 'counted')
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,19)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'foreach')
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(10) && $j[1] == sha1(2) && $j[2] == sha1(5) && $j[3] == sha1(3) && $j[4] == sha1(9) && $j[5] == sha1(4) && $j[6] == sha1(6) && $j[7] == sha1(7) && $j[8] == sha1(8) && $j[9] == sha1(1))
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					$j4 = str_replace(' ','',$this->input->post('j_4',FALSE));
					$j10 = $this->input->post('j_10',TRUE);

					if ($this->input->post('j_1',TRUE) == 'for' && $this->input->post('j_2',FALSE) == '<=' &&
							$this->input->post('j_3',TRUE) == '100' && ($j4 == '$i++' || $j4 == '$i+=1') &&
							$this->input->post('j_5',TRUE) == 'if' && $this->input->post('j_6',TRUE) == '50' &&
							$this->input->post('j_7',FALSE) == '||' && $this->input->post('j_8',FALSE) == '$i' &&
							$this->input->post('j_9',FALSE) == 'continue;' && ($j10 == 'elseif' || $j10 == 'else if') &&
							$this->input->post('j_11',TRUE) == '90' && $this->input->post('j_12',FALSE) == 'break;' &&
							$this->input->post('j_13',TRUE) == 'else' && $this->input->post('j_14',TRUE) == 'echo' &&
							$this->input->post('j_15',TRUE) == 'perulangan ke' && $this->input->post('j_16',FALSE) == '$i'
						)
					{
						$ls = site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,23)]);

						if ($this->input->post('j_1',TRUE) != 'for') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '<=') $this->_pk('j_2');
						if ($this->input->post('j_3',TRUE) != '100') $this->_pk('j_3');
						if (!($j4 == '$i++' || $j4 == '$i+=1')) $this->_pk('j_4');
						if ($this->input->post('j_5',TRUE) != 'if') $this->_pk('j_5');
						if ($this->input->post('j_6',TRUE) != '50') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != '||') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '$i') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != 'continue;') $this->_pk('j_9');
						if (!($j10 == 'elseif' || $j10 == 'else if')) $this->_pk('j_10');
						if ($this->input->post('j_11',TRUE) != '90') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != 'break;') $this->_pk('j_12');
						if ($this->input->post('j_13',TRUE) != 'else') $this->_pk('j_13');
						if ($this->input->post('j_14',TRUE) != 'echo') $this->_pk('j_14');
						if ($this->input->post('j_15',TRUE) != 'perulangan ke') $this->_pk('j_15');
						if ($this->input->post('j_16',FALSE) != '$i') $this->_pk('j_16');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					$j6 = $this->input->post('j_6',FALSE);
					$j7 = $this->input->post('j_7',FALSE);
					$j8 = str_replace(' ','',$this->input->post('j_8',FALSE));
					$j15 = $this->input->post('j_15',FALSE);
					$j16 = $this->input->post('j_16',FALSE);
					$j17 = str_replace(' ','',$this->input->post('j_17',FALSE));
					$j24 = $this->input->post('j_24',FALSE);
					$j25 = $this->input->post('j_25',FALSE);
					$j26 = str_replace(' ','',$this->input->post('j_26',FALSE));

					if ($this->input->post('j_1',TRUE) == 'for' &&
							$this->input->post('j_2',FALSE) == '$i' &&
							$this->input->post('j_3',FALSE) == '=' &&
							$this->input->post('j_4',TRUE) == '1' &&
							$this->input->post('j_5',FALSE) == '$i' &&
							(
								($j6 == '<=' && $j7 == '5') ||
								($j6 == '<' && $j7 == '6')
							) &&
							($j8 == '$i++' || $j8 == '$i+=1') &&
							$this->input->post('j_9',FALSE) == '{' &&
							$this->input->post('j_10',TRUE) == 'for' &&
							$this->input->post('j_11',FALSE) == '$j' &&
							$this->input->post('j_12',FALSE) == '=' &&
							$this->input->post('j_13',FALSE) == '1' &&
							$this->input->post('j_14',FALSE) == '$j' &&
							(
								($j15 == '<=' && $j16 == '10') ||
								($j15 == '<' && $j16 == '11')
							) &&
							($j17 == '$j++' || $j17 == '$j+=1') &&
							$this->input->post('j_18',FALSE) == '{' &&
							$this->input->post('j_19',TRUE) == 'for' &&
							$this->input->post('j_20',FALSE) == '$k' &&
							$this->input->post('j_21',FALSE) == '=' &&
							$this->input->post('j_22',TRUE) == '1' &&
							$this->input->post('j_23',FALSE) == '$k' &&
							(
								($j24 == '<=' && $j25 == '100') ||
								($j24 == '<' && $j25 == '101')
							) &&
							($j26 == '$k++' || $j26 == '$k+=1') &&
							$this->input->post('j_27',FALSE) == '{' &&
							$this->input->post('j_28',TRUE) == 'echo' &&
							$this->input->post('j_29',TRUE) == 'perulangan ke' &&
							$this->input->post('j_30',FALSE) == '}' &&
							$this->input->post('j_31',FALSE) == '}' &&
							$this->input->post('j_32',FALSE) == '}'
						)
					{
						$ls = site_url('belajar-php/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(4,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada php', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,25)]);

						if ($this->input->post('j_1',TRUE) != 'for') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '$i') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '=') $this->_pk('j_3');
						if ($this->input->post('j_4',TRUE) != '1') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != '$i') $this->_pk('j_5');

						if (!(($j6 == '<=' && $j7 == '5') || ($j6 == '<' && $j7 == '6')))
						{
							array_push($kesalahan, 'j_6');
							array_push($kesalahan, 'j_7');
						}

						if (!($j8 == '$i++' || $j8 == '$i+=1')) $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != '{') $this->_pk('j_9');
						if ($this->input->post('j_10',TRUE) != 'for') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != '$j') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != '=') $this->_pk('j_12');
						if ($this->input->post('j_13',FALSE) != '1') $this->_pk('j_13');
						if ($this->input->post('j_14',FALSE) != '$j') $this->_pk('j_14');

						if (!(($j15 == '<=' && $j16 == '10') || ($j15 == '<' && $j16 == '11')))
						{
							array_push($kesalahan, 'j_15');
							array_push($kesalahan, 'j_16');
						}

						if (!($j17 == '$j++' || $j17 == '$j+=1')) $this->_pk('j_17');
						if ($this->input->post('j_18',FALSE) != '{') $this->_pk('j_18');
						if ($this->input->post('j_19',TRUE) != 'for') $this->_pk('j_19');
						if ($this->input->post('j_20',FALSE) != '$k') $this->_pk('j_20');
						if ($this->input->post('j_21',FALSE) != '=') $this->_pk('j_21');
						if ($this->input->post('j_22',TRUE) != '1') $this->_pk('j_22');
						if ($this->input->post('j_23',FALSE) != '$k') $this->_pk('j_23');

						if (!(($j24 == '<=' && $j25 == '100') || ($j24 == '<' && $j25 == '101')))
						{
							array_push($kesalahan, 'j_24');
							array_push($kesalahan, 'j_25');
						}
						if (!($j26 == '$k++' || $j26 == '$k+=1')) $this->_pk('j_26');
						if ($this->input->post('j_27',FALSE) != '{') $this->_pk('j_27');
						if ($this->input->post('j_28',TRUE) != 'echo') $this->_pk('j_28');
						if ($this->input->post('j_29',TRUE) != 'perulangan ke') $this->_pk('j_29');
						if ($this->input->post('j_30',FALSE) != '}') $this->_pk('j_30');
						if ($this->input->post('j_31',FALSE) != '}') $this->_pk('j_31');
						if ($this->input->post('j_32',FALSE) != '}') $this->_pk('j_32');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('function pada php'))
			{
				if ($b == sha1(4))
				{
					$j5 = $this->input->post('j_5',TRUE);

					if ($this->input->post('j_1',TRUE) == 'function' &&
							$this->input->post('j_2',FALSE) == 'halo()' &&
							$this->input->post('j_3',FALSE) == '{' &&
							$this->input->post('j_4',TRUE) == 'echo' &&
							($j5 == 'halo, selamat datang.' || $j5 == 'halo, selamat datang') &&
							$this->input->post('j_6',FALSE) == '}' &&
							$this->input->post('j_7',FALSE) == 'halo();'
						)
					{
						$ls = site_url('belajar-php/teori/function-pada-php/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(5,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function pada php', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',5,4)]);

						if ($this->input->post('j_1',TRUE) != 'function') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != 'halo()') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '{') $this->_pk('j_3');
						if ($this->input->post('j_4',TRUE) != 'echo') $this->_pk('j_4');
						if (!($j5 == 'halo, selamat datang.' || $j5 == 'halo, selamat datang')) $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '}') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != 'halo();') $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'lazy programming')
					{
						$ls = site_url('belajar-php/teori/function-pada-php/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(5,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function pada php', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',5,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-php/teori/function-pada-php/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(5,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function pada php', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',5,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (($this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/function-pada-php/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(5,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function pada php', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',5,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					$j2 = str_replace('$kelas=\'X\'','$kelas="X"',str_replace(' ','',$this->input->post('j_2',FALSE)));
					$j9 = str_replace(', ',',',$this->input->post('j_9',FALSE));
					$j10 = str_replace(', ',',',$this->input->post('j_10',FALSE));

					if ($this->input->post('j_1',TRUE) == 'function' &&
							$j2 == 'perkenalan_murid($nama_lengkap,$alamat,$jurusan,$kelas="X")' &&
							$this->input->post('j_3',FALSE) == '{' &&
							$this->input->post('j_4',FALSE) == '$nama_lengkap' &&
							$this->input->post('j_5',FALSE) == '$kelas' &&
							$this->input->post('j_6',FALSE) == '$jurusan' &&
							$this->input->post('j_7',FALSE) == '$alamat' &&
							$this->input->post('j_8',FALSE) == '}' &&
							$j9 == 'perkenalan_murid("Muhammad Saleh Solahudin","Bogor","Rekayasa Perangkat Lunak");' &&
							$j10 == 'perkenalan_murid("Karmila Sriwulan","Jakarta","Multimedia","XII");'
						)
					{
						$ls = site_url('belajar-php/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(5,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function pada php', bagian '10'.");;
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',5,10)]);

						if ($this->input->post('j_1',TRUE) != 'function') $this->_pk('j_1');
						if ($j2 != 'perkenalan_murid($nama_lengkap,$alamat,$jurusan,$kelas="X")') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '{') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != '$nama_lengkap') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != '$kelas') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$jurusan') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != '$alamat') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '}') $this->_pk('j_8');
						if ($j9 != 'perkenalan_murid("Muhammad Saleh Solahudin","Bogor","Rekayasa Perangkat Lunak");') $this->_pk('j_9');
						if ($j10 != 'perkenalan_murid("Karmila Sriwulan","Jakarta","Multimedia","XII");') $this->_pk('j_10');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('pbo oop pada php'))
			{
				if ($b == sha1(3))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'pemrograman berorientasi objek')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'object oriented programming')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));

					if ($j1 == 'procedural' ||$j1 == 'prosedural' || $j1 == 'fungsional')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_2',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'class')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'method')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'property' || strtolower($this->input->post('j_1',TRUE)) == 'atribut')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if (($this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(4) && $j[1] == sha1(6) && $j[2] == sha1(1) && $j[3] == sha1(7) && $j[4] == sha1(11) && $j[5] == sha1(2) && $j[6] == sha1(5) && $j[7] == sha1(8) && $j[8] == sha1(12) && $j[9] == sha1(13) && $j[10] == sha1(10) && $j[11] == sha1(3) && $j[12] == sha1(9))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					$j8 = $this->input->post('j_8',TRUE);

					if ($this->input->post('j_1',TRUE) == 'class' &&
							$this->input->post('j_2',TRUE) == 'laptop' &&
							$this->input->post('j_3',TRUE) == 'var' &&
							$this->input->post('j_4',FALSE) == '$merek;' &&
							$this->input->post('j_5',TRUE) == 'function' &&
							$this->input->post('j_6',FALSE) == 'restart_laptop()' &&
							$this->input->post('j_7',TRUE) == 'return' &&
							($j8 == 'laptop sebentar lagi akan dinyalakan ulang.' || $j8 == 'laptop sebentar lagi akan dinyalakan ulang') &&
							$this->input->post('j_9',FALSE) == '$laptop_gaming' &&
							$this->input->post('j_10',TRUE) == 'new' &&
							$this->input->post('j_11',FALSE) == 'laptop();' &&
							$this->input->post('j_12',FALSE) == '$laptop_gaming->merek' &&
							$this->input->post('j_13',TRUE) == 'lenovo' &&
							$this->input->post('j_14',TRUE) == 'echo' &&
							$this->input->post('j_15',FALSE) == '$laptop_gaming->merek;' &&
							$this->input->post('j_16',TRUE) == 'echo' &&
							$this->input->post('j_17',FALSE) == '$laptop_gaming->restart_laptop();'
						)
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,21)]);

						if ($this->input->post('j_1',TRUE) != 'class') $this->_pk('j_1');
						if ($this->input->post('j_2',TRUE) != 'laptop') $this->_pk('j_2');
						if ($this->input->post('j_3',TRUE) != 'var') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != '$merek;') $this->_pk('j_4');
						if ($this->input->post('j_5',TRUE) != 'function') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != 'restart_laptop()') $this->_pk('j_6');
						if ($this->input->post('j_7',TRUE) != 'return') $this->_pk('j_7');
						if (!($j8 == 'laptop sebentar lagi akan dinyalakan ulang.' || $j8 == 'laptop sebentar lagi akan dinyalakan ulang')) $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != '$laptop_gaming') $this->_pk('j_9');
						if ($this->input->post('j_10',TRUE) != 'new') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != 'laptop();') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != '$laptop_gaming->merek') $this->_pk('j_12');
						if ($this->input->post('j_13',TRUE) != 'lenovo') $this->_pk('j_13');
						if ($this->input->post('j_14',TRUE) != 'echo') $this->_pk('j_14');
						if ($this->input->post('j_15',FALSE) != '$laptop_gaming->merek;') $this->_pk('j_15');
						if ($this->input->post('j_16',TRUE) != 'echo') $this->_pk('j_16');
						if ($this->input->post('j_17',FALSE) != '$laptop_gaming->restart_laptop();') $this->_pk('j_17');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(26))
				{
					$j1 = $this->input->post('j_1',TRUE);
					$j2 = $this->input->post('j_2',TRUE);
					$j3 = $this->input->post('j_3',TRUE);

					if ((strtolower($j1) == 'public' && strtolower($j2) == 'protected' && strtolower($j3) == 'private') || (strtolower($j1) == 'public' && strtolower($j2) == 'private' && strtolower($j3) == 'protected') || (strtolower($j1) == 'protected' && strtolower($j2) == 'public' && strtolower($j3) == 'private') || (strtolower($j1) == 'protected' && strtolower($j2) == 'private' && strtolower($j3) == 'public') || (strtolower($j1) == 'private' && strtolower($j2) == 'public' && strtolower($j3) == 'protected') || (strtolower($j1) == 'private' && strtolower($j2) == 'protected' && strtolower($j3) == 'public'))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/27'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,26);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '26'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,26)]);

						if (strtolower($j1) != 'public') $this->_pk('j_1');
						if (strtolower($j2) != 'protected') $this->_pk('j_2');
						if (strtolower($j3) != 'private') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(27))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/28'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,27);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '27'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,27)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(28))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/29'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,28);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '28'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,28)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(29))
				{
					if ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL)
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/30'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,29);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '29'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,29)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(30))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'enkapsulasi' || strtolower($this->input->post('j_1',TRUE)) == 'encapsulation')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/31'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,30);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '30'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,30)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(31))
				{
					if ($this->input->post('j_1',FALSE) == '$this' || strtolower($this->input->post('j_1',FALSE)) == 'this')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/32'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,31);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '31'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,31)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(32))
				{
					if ($this->input->post('j_1',FALSE) == '$this->merek' && $this->input->post('j_2',FALSE) == '$this->pemilik')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/33'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,32);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '32'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,32)]);

						if ($this->input->post('j_1',FALSE) != '$this->merek') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '$this->pemilik') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(33))
				{
					if ($this->input->post('j_1',FALSE) == '__construct()' || $this->input->post('j_1',FALSE) == '__construct' || $this->input->post('j_1',FALSE) == '__construct();' || strtolower($this->input->post('j_1',FALSE)) == 'construct' || strtolower($this->input->post('j_1',FALSE)) == 'constructor' || strtolower($this->input->post('j_1',FALSE)) == 'konstruktor')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/34'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,33);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '33'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,33)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(34))
				{
					if ($this->input->post('j_1',FALSE) == '__destruct()' || $this->input->post('j_1',FALSE) == '__destruct' || $this->input->post('j_1',FALSE) == '__destruct();' || strtolower($this->input->post('j_1',FALSE)) == 'destruct' || strtolower($this->input->post('j_1',FALSE)) == 'destructor ' || strtolower($this->input->post('j_1',FALSE)) == 'destruktor')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/35'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,34);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '34'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,34)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(35))
				{
					if ($this->input->post('j_1',FALSE) == '__construct' &&
							$this->input->post('j_2',FALSE) == '$pemilik' &&
							$this->input->post('j_3',FALSE) == '$merek' &&
							$this->input->post('j_4',FALSE) == '$this->pemilik' &&
							$this->input->post('j_5',FALSE) == '$pemilik' &&
							$this->input->post('j_6',FALSE) == '$this->merek' &&
							$this->input->post('j_7',FALSE) == '$merek' &&
							$this->input->post('j_8',FALSE) == '$this->merek' &&
							$this->input->post('j_9',FALSE) == '$this->pemilik' &&
							$this->input->post('j_10',FALSE) == '__destruct()'
						)
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/36'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,35);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '35'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,35)]);

						if ($this->input->post('j_1',FALSE) != '__construct') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '$pemilik') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '$merek') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != '$this->pemilik') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != '$pemilik') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$this->merek') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != '$merek') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '$this->merek') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != '$this->pemilik') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != '__destruct()') $this->_pk('j_10');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(39))
				{
					if ($this->input->post('j_1',TRUE) == 'motor' && $this->input->post('j_2',TRUE) == 'extends' && $this->input->post('j_3',TRUE) == 'kendaraan')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/40'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,39);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '39'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,39)]);

						if ($this->input->post('j_1',TRUE) != 'motor') $this->_pk('j_1');
						if ($this->input->post('j_2',TRUE) != 'extends') $this->_pk('j_2');
						if ($this->input->post('j_3',TRUE) != 'kendaraan') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(40))
				{
					if (strtolower($this->input->post('j_1',FALSE)) == 'code reuse')
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/41'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,40);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '40'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,40)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(41))
				{
					if (($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/42'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,41);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '41'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,41)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(42))
				{
					if (($this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_1',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/43'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,42);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '42'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,42)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(43))
				{
					if (($this->input->post('j_3',TRUE) === NULL) && ($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_1',TRUE) !== NULL))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/44'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,43);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '43'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,43)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(44))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/45'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,44);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '44'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,44)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(45))
				{
					if ($this->input->post('j_1',FALSE) == 'public' &&
							$this->input->post('j_2',FALSE) == 'static' &&
							$this->input->post('j_3',FALSE) == '$harga' &&
							$this->input->post('j_4',FALSE) == 'public' &&
							$this->input->post('j_5',FALSE) == 'static' &&
							$this->input->post('j_6',FALSE) == 'function' &&
							$this->input->post('j_7',FALSE) == 'beli()' &&
							$this->input->post('j_8',FALSE) == 'mobil::$harga' &&
							$this->input->post('j_9',FALSE) == '98535515' &&
							$this->input->post('j_10',FALSE) == 'mobil::beli()' &&
							$this->input->post('j_11',FALSE) == 'mobil::$harga'
						)
					{
						$ls = site_url('belajar-php/teori/pbo-oop-pada-php/bagian/46'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,45);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '45'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,45)]);

						if ($this->input->post('j_1',FALSE) != 'public') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != 'static') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '$harga') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'public') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != 'static') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != 'function') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != 'beli()') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != 'mobil::$harga') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != '98535515') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != 'mobil::beli()') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != 'mobil::$harga') $this->_pk('j_11');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(46))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(10) && $j[1] == sha1(3) && $j[2] == sha1(8) && $j[3] == sha1(6) && $j[4] == sha1(4) && $j[5] == sha1(2) && $j[6] == sha1(1) && $j[7] == sha1(11) && $j[8] == sha1(5) && $j[9] == sha1(7) && $j[10] == sha1(9))
					{
						$ls = site_url('belajar-php/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(6,46);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'pbo (oop) pada php', bagian '46'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',6,46)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('kelola session cookie dan files'))
			{
				if ($b == sha1(3))
				{
					$j1 = $this->input->post('j_1',FALSE);

					if ($j1 == '$_SESSION' || $j1 == 'SESSION')
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if ($this->input->post('j_1',FALSE) == 'session_start()' || $this->input->post('j_1',FALSE) == 'session_start();')
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j_1',FALSE) == 'session_destroy()' || $this->input->post('j_1',FALSE) == 'session_destroy();')
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					$j2 = $this->input->post('j_2',FALSE);
					$j4 = $this->input->post('j_4',FALSE);
					$j6 = $this->input->post('j_6',FALSE);
					$j8 = $this->input->post('j_8',FALSE);
					$j9 = $this->input->post('j_9',FALSE);
					$j10 = $this->input->post('j_10',FALSE);

					if ($this->input->post('j_1',FALSE) == 'session_start();' &&
							($j2 == '$_SESSION[\'sudah_login\']' || $j2 == '$_SESSION["sudah_login"]') &&
							strtolower($this->input->post('j_3',FALSE)) == 'true' &&
							($j4 == '$_SESSION[\'username\']' || $j4 == '$_SESSION["username"]') &&
							strtolower($this->input->post('j_5',FALSE)) == 'bolang' &&
							($j6 == '$_SESSION[\'level\']' || $j6 == '$_SESSION["level"]') &&
							strtolower($this->input->post('j_7',FALSE)) == 'member' &&
							($j8 == '$_SESSION[\'username\']' || $j8 == '$_SESSION["username"]') &&
							($j9 == '$_SESSION[\'level\']' || $j9 == '$_SESSION["level"]') &&
							($j10 == 'unset($_SESSION[\'level\']);' || $j10 == 'unset($_SESSION["level"]);') &&
							strtolower($this->input->post('j_11',FALSE)) == 'mohon maaf anda belum login'
						)
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,6)]);

						if ($this->input->post('j_1',FALSE) != 'session_start();') $this->_pk('j_1');
						if (!($j2 == '$_SESSION[\'sudah_login\']' || $j2 == '$_SESSION["sudah_login"]')) $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',FALSE)) != 'true') $this->_pk('j_3');
						if (!($j4 == '$_SESSION[\'username\']' || $j4 == '$_SESSION["username"]')) $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',FALSE)) != 'bolang') $this->_pk('j_5');
						if (!($j6 == '$_SESSION[\'level\']' || $j6 == '$_SESSION["level"]')) $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',FALSE)) != 'member') $this->_pk('j_7');
						if (!($j8 == '$_SESSION[\'username\']' || $j8 == '$_SESSION["username"]')) $this->_pk('j_8');
						if (!($j9 == '$_SESSION[\'level\']' || $j9 == '$_SESSION["level"]')) $this->_pk('j_9');
						if (!($j10 == 'unset($_SESSION[\'level\']);' || $j10 == 'unset($_SESSION["level"]);')) $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',FALSE)) != 'mohon maaf anda belum login') $this->_pk('j_11');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if (strtolower($this->input->post('j_1',FALSE) == 'browser'))
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					$j7 = $this->input->post('j_7',FALSE);

					if ($this->input->post('j_1',FALSE) == 'setcookie' &&
							strtolower($this->input->post('j_2',FALSE) == 'minuman') &&
							strtolower($this->input->post('j_3',FALSE) == 'kopi') &&
							$this->input->post('j_4',FALSE) == 'strtotime' &&
							$this->input->post('j_5',FALSE) == '+25' &&
							strtolower($this->input->post('j_6',FALSE) == 'echo') &&
							($j7 == '$_COOKIE[\'minuman\']' || $j7 == '$_COOKIE["minuman"]')
						)
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,9)]);

						if ($this->input->post('j_1',FALSE) != 'setcookie') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',FALSE) != 'minuman')) $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',FALSE) != 'kopi')) $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'strtotime') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != '+25') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE) != 'echo')) $this->_pk('j_6');
						if (!($j7 == '$_COOKIE[\'minuman\']' || $j7 == '$_COOKIE["minuman"]')) $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (strtolower($this->input->post('j_1',FALSE) == '7') || strtolower($this->input->post('j_1',FALSE) == 'tujuh'))
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if ($this->input->post('j_1',FALSE) == '$nama_file' &&
							$this->input->post('j_2',FALSE) == 'kendaraan.txt' &&
							$this->input->post('j_3',FALSE) == 'if' &&
							$this->input->post('j_4',FALSE) == 'file_exists($nama_file)' &&
							$this->input->post('j_5',FALSE) == '$berkas' &&
							$this->input->post('j_6',FALSE) == 'fopen' &&
							$this->input->post('j_7',FALSE) == '$nama_file' &&
							$this->input->post('j_8',FALSE) == 'r+' &&
							$this->input->post('j_9',FALSE) == 'echo' &&
							$this->input->post('j_10',FALSE) == 'fread' &&
							$this->input->post('j_11',FALSE) == '$berkas' &&
							$this->input->post('j_12',FALSE) == 'filesize($nama_file)' &&
							$this->input->post('j_13',FALSE) == 'fclose($berkas);' &&
							$this->input->post('j_14',FALSE) == 'else' &&
							$this->input->post('j_15',FALSE) == 'echo' &&
							$this->input->post('j_16',FALSE) == '$nama_file'
						)
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,14)]);

						if ($this->input->post('j_1',FALSE) != '$nama_file') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != 'kendaraan.txt') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != 'if') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'file_exists($nama_file)') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != '$berkas') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != 'fopen') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != '$nama_file') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != 'r+') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != 'echo') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != 'fread') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != '$berkas') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != 'filesize($nama_file)') $this->_pk('j_12');
						if ($this->input->post('j_13',FALSE) != 'fclose($berkas);') $this->_pk('j_13');
						if ($this->input->post('j_14',FALSE) != 'else') $this->_pk('j_14');
						if ($this->input->post('j_15',FALSE) != 'echo') $this->_pk('j_15');
						if ($this->input->post('j_16',FALSE) != '$nama_file') $this->_pk('j_16');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if ($this->input->post('j_1',FALSE) == '$nama_file' &&
							$this->input->post('j_2',FALSE) == 'kendaraan.txt' &&
							$this->input->post('j_3',FALSE) == 'if' &&
							$this->input->post('j_4',FALSE) == 'file_exists($nama_file)' &&
							$this->input->post('j_5',FALSE) == '$kendaraan' &&
							$this->input->post('j_6',FALSE) == 'file($nama_file)' &&
							$this->input->post('j_7',FALSE) == 'foreach' &&
							$this->input->post('j_8',FALSE) == '$kendaraan' &&
							$this->input->post('j_9',FALSE) == 'as' &&
							$this->input->post('j_10',FALSE) == 'echo' &&
							$this->input->post('j_11',FALSE) == '$hasil' &&
							$this->input->post('j_12',FALSE) == 'else' &&
							$this->input->post('j_13',FALSE) == 'echo' &&
							$this->input->post('j_14',FALSE) == '$nama_file'
						)
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,15)]);

						if ($this->input->post('j_1',FALSE) != '$nama_file') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != 'kendaraan.txt') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != 'if') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'file_exists($nama_file)') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != '$kendaraan') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != 'file($nama_file)') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != 'foreach') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '$kendaraan') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != 'as') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != 'echo') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != '$hasil') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != 'else') $this->_pk('j_12');
						if ($this->input->post('j_13',FALSE) != 'echo') $this->_pk('j_13');
						if ($this->input->post('j_14',FALSE) != '$nama_file') $this->_pk('j_14');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if ($this->input->post('j_1',FALSE) == '$file' &&
							$this->input->post('j_2',FALSE) == 'file_exists' &&
							$this->input->post('j_3',FALSE) == 'fopen' &&
							$this->input->post('j_4',FALSE) == 'w' &&
							$this->input->post('j_5',FALSE) == 'fwrite' &&
							$this->input->post('j_6',FALSE) == '$kendaraan' &&
							$this->input->post('j_7',FALSE) == '$konten' &&
							$this->input->post('j_8',FALSE) == 'fclose' &&
							$this->input->post('j_9',FALSE) == '$kendaraan' &&
							$this->input->post('j_10',FALSE) == 'copy' &&
							$this->input->post('j_11',FALSE) == 'kendaraan.txt' &&
							$this->input->post('j_12',FALSE) == 'kendaraan-baru.txt' &&
							$this->input->post('j_13',FALSE) == 'rename' &&
							$this->input->post('j_14',FALSE) == 'kendaraan-baru.txt' &&
							$this->input->post('j_15',FALSE) == 'kendaraan-baru-banget.txt' &&
							$this->input->post('j_16',FALSE) == 'unlink' &&
							$this->input->post('j_17',FALSE) == 'kendaraan-baru-banget.txt'
						)
					{
						$ls = site_url('belajar-php/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(7,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kelola Session, cookie Dan files pada php', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',7,18)]);

						if ($this->input->post('j_1',FALSE) != '$file') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != 'file_exists') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != 'fopen') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'w') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != 'fwrite') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$kendaraan') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != '$konten') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != 'fclose') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != '$kendaraan') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != 'copy') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != 'kendaraan.txt') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != 'kendaraan-baru.txt') $this->_pk('j_12');
						if ($this->input->post('j_13',FALSE) != 'rename') $this->_pk('j_13');
						if ($this->input->post('j_14',FALSE) != 'kendaraan-baru.txt') $this->_pk('j_14');
						if ($this->input->post('j_15',FALSE) != 'kendaraan-baru-banget.txt') $this->_pk('j_15');
						if ($this->input->post('j_16',FALSE) != 'unlink') $this->_pk('j_16');
						if ($this->input->post('j_17',FALSE) != 'kendaraan-baru-banget.txt') $this->_pk('j_17');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('lebih banyak tentang php'))
			{
				if ($b == sha1(6))
				{
					$j1 = $this->input->post('j_1',FALSE);
					$j2 = $this->input->post('j_2',FALSE);
					$j3 = $this->input->post('j_3',FALSE);

					if (($j1 == '$_GET' && $j2 == '$_POST' && $j3 == '$_REQUEST') ||
							($j1 == '$_GET' && $j2 == '$_REQUEST' && $j3 == '$_POST') ||
							($j1 == '$_POST' && $j2 == '$_GET' && $j3 == '$_REQUEST') ||
							($j1 == '$_POST' && $j2 == '$_REQUEST' && $j3 == '$_GET') ||
							($j1 == '$_REQUEST' && $j2 == '$_GET' && $j3 == '$_POST') ||
							($j1 == '$_REQUEST' && $j2 == '$_POST' && $j3 == '$_GET')
						)
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,6)]);

						if ($j1 != '$_GET') $this->_pk('j_1');
						if ($j2 != '$_POST') $this->_pk('j_2');
						if ($j3 != '$_REQUEST') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					$j1 = $this->input->post('j_1',FALSE);
					$j2 = $this->input->post('j_2',FALSE);
					$j3 = $this->input->post('j_3',FALSE);
					$j4 = $this->input->post('j_4',FALSE);
					$j5 = $this->input->post('j_5',FALSE);
					$j6 = $this->input->post('j_6',FALSE);

					if (($j1 == '$_POST' || $j1 == '$_REQUEST') &&
							$j2 == 'nama_lengkap' &&
							($j3 == '$_POST' || $j3 == '$_REQUEST') &&
							$j4 == 'alamat_rumah' &&
							($j5 == '$_POST' || $j5 == '$_REQUEST') &&
							$j6 == 'alamat_email'
						)
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,7)]);

						if (!($j1 == '$_POST' || $j1 == '$_REQUEST')) $this->_pk('j_1');
						if ($j2 != 'nama_lengkap') $this->_pk('j_2');
						if (!($j3 == '$_POST' || $j3 == '$_REQUEST')) $this->_pk('j_3');
						if ($j4 != 'alamat_rumah') $this->_pk('j_4');
						if (!($j5 == '$_POST' || $j5 == '$_REQUEST')) $this->_pk('j_5');
						if ($j6 != 'alamat_email') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if ($this->input->post('j_1',FALSE) == '&')
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if ($this->input->post('j_1',FALSE) == '$_COOKIE')
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if ($this->input->post('j_1',FALSE) == 'strtolower($kalimat);' &&
							$this->input->post('j_2',FALSE) == 'strtoupper($kalimat);' &&
							$this->input->post('j_3',FALSE) == 'ucwords($kalimat);' &&
							$this->input->post('j_4',FALSE) == 'strlen($kalimat);' &&
							$this->input->post('j_5',FALSE) == 'substr' &&
							$this->input->post('j_6',FALSE) == '$kalimat' &&
							$this->input->post('j_7',FALSE) == '6' &&
							$this->input->post('j_8',FALSE) == '20' &&
							$this->input->post('j_9',FALSE) == 'str_replace' &&
							$this->input->post('j_10',FALSE) == 'Dolor' &&
							$this->input->post('j_11',FALSE) == 'Dolar' &&
							$this->input->post('j_12',FALSE) == '$kalimat'
						)
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,13)]);

						if ($this->input->post('j_1',FALSE) != 'strtolower($kalimat);') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != 'strtoupper($kalimat);') $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != 'ucwords($kalimat);') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'strlen($kalimat);') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != 'substr') $this->_pk('j_5');
						if ($this->input->post('j_6',FALSE) != '$kalimat') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != '6') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != '20') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != 'str_replace') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != 'Dolor') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != 'Dolar') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != '$kalimat') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					$j2 = str_replace(', ',',',$this->input->post('j_2',FALSE));
					$j6 = str_replace(', ',',',$this->input->post('j_6',FALSE));

					if ($this->input->post('j_1',FALSE) == 'count($buah)' &&
							($j2 == 'array_push($buah,\'salak\')' || $j2 == 'array_push($buah,"salak")') &&
							$this->input->post('j_3',FALSE) == 'array_pop($buah)' &&
							$this->input->post('j_4',FALSE) == 'max($angka)' &&
							$this->input->post('j_5',FALSE) == 'min($angka)' &&
							($j6 == 'array_merge($buah_satu,$buah_dua)' || $j6 == 'array_merge($buah_dua,$buah_satu)')
						)
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,14)]);

						if ($this->input->post('j_1',FALSE) != 'count($buah)') $this->_pk('j_1');
						if (!($j2 == 'array_push($buah,\'salak\')' || $j2 == 'array_push($buah,"salak")')) $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != 'array_pop($buah)') $this->_pk('j_3');
						if ($this->input->post('j_4',FALSE) != 'max($angka)') $this->_pk('j_4');
						if ($this->input->post('j_5',FALSE) != 'min($angka)') $this->_pk('j_5');
						if (!($j6 == 'array_merge($buah_satu,$buah_dua)' || $j6 == 'array_merge($buah_dua,$buah_satu)')) $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					$j1 = strtolower($this->input->post('j_1',FALSE));
					$j2 = $this->input->post('j_2',FALSE);

					if (($j1 == 'date_default_timezone_set(\'asia/jakarta\');' || $j1 == 'date_default_timezone_set("asia/jakarta");') &&
							($j2 == 'date(\'d-m-Y H:i:s\')' || $j2 == 'date("d-m-Y H:i:s")'))
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,19)]);

						if (!($j1 == 'date_default_timezone_set(\'asia/jakarta\');' || $j1 == 'date_default_timezone_set("asia/jakarta");')) $this->_pk('j_1');
						if (!($j2 == 'date(\'d-m-Y H:i:s\')' || $j2 == 'date("d-m-Y H:i:s")')) $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					$j1 = str_replace(', ',',', $this->input->post('j_1',FALSE));
					$j2 = str_replace(', ',',', $this->input->post('j_2',FALSE));

					if (($j1 == 'explode(\' \',$kalimat)' || $j1 == 'explode(" ",$kalimat)') &&
							($j2 == 'implode(\' \',$diganti)' || $j2 == 'implode(" ",$diganti)') &&
							$this->input->post('j_3',FALSE) == '$motivasi'
						)
					{
						$ls = site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_php(8,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang php', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',8,20)]);

						if (!($j1 == 'explode(\' \',$kalimat)' || $j1 == 'explode(" ",$kalimat)')) $this->_pk('j_1');
						if (!($j2 == 'implode(\' \',$diganti)' || $j2 == 'implode(" ",$diganti)')) $this->_pk('j_2');
						if ($this->input->post('j_3',FALSE) != '$motivasi') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function segarkan_bagian_teori_php()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m != NULL && $b != NULL)
		{
			if ($m == 8 && $b == 21)
			{
				$this->_cek_sertifikat('PHP');
			}
			else
			{
				$this->_cek_pencapaian();
			}

			if ($this->belajar->segarkan_bagian_teori_php($m,$b))
			{
				if ($m == 8 && $b == 21)
				{
					$this->ang->bot("{$this->session->ang_nama_pengguna} menyelesaikan kelas PHP di Always Ngoding.");
					$this->ang->kakd("{$this->session->ang_nama_pengguna} (".site_url("anggota/{$this->session->ang_nama_pengguna}").") menyelesaikan kelas PHP di Always Ngoding :partying_face:");
				}

			 	$pesan = ">> Berhasil menyegarkan... << >> {$m} << >> {$b} <<";
			}
			else
			{
				$pesan = ">> Tidak ada yang perlu disegarkan... << >> {$m} << >> {$b} <<";
			}

			echo $this->_encode_dengan_token(array_merge($this->respon, ['pesan' => $pesan]));
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function hasil_teori_php($modul,$bagian,$flag)
	{
		if ($modul == 2) $jumlah_bagian = 19;
		elseif ($modul == 3) $jumlah_bagian = 27;
		elseif ($modul == 4) $jumlah_bagian = 25;
		elseif ($modul == 5) $jumlah_bagian = 10;
		elseif ($modul == 6) $jumlah_bagian = 46;
		elseif ($modul == 8) $jumlah_bagian = 21;
		else show_404();

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->ambil_bagian_terakhir_teori_php($modul) > $bagian-1)
			{
				if (file_exists(APPPATH."views/belajar/php/hasil/{$modul}/{$bagian}-{$flag}.php"))
				{
					$this->load->view("belajar/php/hasil/{$modul}/{$bagian}-{$flag}");
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

	public function eksekusi_php()
	{
		echo $this->_encode_dengan_token($this->_glot_api("index.php", "<?php {$this->input->post('konten', FALSE)} ?>", "php"));
	}

	public function awal_belajar_teori_mysql($J1=15,$J2=20,$J3=28,$J4=38,$J5=11,$J6=30)
	{
		if ($this->session->has_userdata('ang_akses'))
		{
			$this->belajar->init_kelas_pengguna('mysql');

			$B1 = $this->belajar->ambil_bagian_terakhir_teori_mysql(1);
			$B2 = $this->belajar->ambil_bagian_terakhir_teori_mysql(2);
			$B3 = $this->belajar->ambil_bagian_terakhir_teori_mysql(3);
			$B4 = $this->belajar->ambil_bagian_terakhir_teori_mysql(4);
			$B5 = $this->belajar->ambil_bagian_terakhir_teori_mysql(5);
			$B6 = $this->belajar->ambil_bagian_terakhir_teori_mysql(6);
			$P1 = ($B1 > 1) ? round($this->_persentase($B1,$J1+1)) : 0;
			$P2 = ($B2 > 1) ? round($this->_persentase($B2,$J2+1)) : 0;
			$P3 = ($B3 > 1) ? round($this->_persentase($B3,$J3+1)) : 0;
			$P4 = ($B4 > 1) ? round($this->_persentase($B4,$J4+1)) : 0;
			$P5 = ($B5 > 1) ? round($this->_persentase($B5,$J5+1)) : 0;
			$P6 = ($B6 > 1) ? round($this->_persentase($B6,$J6+1)) : 0;
			$P1 = $P1 > 100 ? 100 : $P1;
			$P2 = $P2 > 100 ? 100 : $P2;
			$P3 = $P3 > 100 ? 100 : $P3;
			$P4 = $P4 > 100 ? 100 : $P4;
			$P5 = $P5 > 100 ? 100 : $P5;
			$P6 = $P6 > 100 ? 100 : $P6;
			$W1 = $this->_warna_chart($P1);
			$W2 = $this->_warna_chart($P2);
			$W3 = $this->_warna_chart($P3);
			$W4 = $this->_warna_chart($P4);
			$W5 = $this->_warna_chart($P5);
			$W6 = $this->_warna_chart($P6);
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'warna_chart_1' => $W1,
				'warna_chart_2' => $W2,
				'warna_chart_3' => $W3,
				'warna_chart_4' => $W4,
				'warna_chart_5' => $W5,
				'warna_chart_6' => $W6,
				'persentase_1' => $P1,
				'persentase_2' => $P2,
				'persentase_3' => $P3,
				'persentase_4' => $P4,
				'persentase_5' => $P5,
				'persentase_6' => $P6,
				'bagian_1' => $B1,
				'bagian_2' => $B2,
				'bagian_3' => $B3,
				'bagian_4' => $B4,
				'bagian_5' => $B5,
				'bagian_6' => $B6
			];
		}
		else
		{
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'warna_chart_1' => 'grey',
				'warna_chart_2' => 'grey',
				'warna_chart_3' => 'grey',
				'warna_chart_4' => 'grey',
				'warna_chart_5' => 'grey',
				'warna_chart_6' => 'grey',
				'persentase_1' => 0,
				'persentase_2' => 0,
				'persentase_3' => 0,
				'persentase_4' => 0,
				'persentase_5' => 0,
				'persentase_6' => 0,
				'bagian_1' => 1,
				'bagian_2' => 1,
				'bagian_3' => 1,
				'bagian_4' => 1,
				'bagian_5' => 1,
				'bagian_6' => 1
			];
		}

		$this->load->view('belajar/mysql/teori/awal',$DT);
	}

	public function teori_berkenalan_dengan_mysql($bagian,$jumlah_bagian=15)
	{
		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_mysql(1,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('mysql','1','belajar-mysql/teori/berkenalan-dengan-mysql');
				}

				$this->load->view("belajar/mysql/teori/1/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function perintah_perintah_dasar_mysql($bagian,$jumlah_bagian=20)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_mysql(1) > 15)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_mysql(2,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('mysql','2','belajar-mysql/teori/perintah-perintah-dasar-mysql');
					}

					$this->load->view("belajar/mysql/teori/2/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function tipe_data_pada_mysql($bagian,$jumlah_bagian=28)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_mysql(2) > 20)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_mysql(3,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('mysql','3','belajar-mysql/teori/tipe-data-pada-mysql');
					}

					$this->load->view("belajar/mysql/teori/3/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function create_read_update_delete_mysql($bagian,$jumlah_bagian=38)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_mysql(3) > 28)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_mysql(4,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('mysql','4','belajar-mysql/teori/create-read-update-delete-mysql');
					}

					$this->load->view("belajar/mysql/teori/4/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function penggabungan_tabel_pada_mysql($bagian,$jumlah_bagian=11)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_mysql(4) > 38)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_mysql(5,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('mysql','5','belajar-mysql/teori/penggabungan-tabel-pada-mysql');
					}

					$this->load->view("belajar/mysql/teori/5/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function lebih_banyak_tentang_mysql($bagian,$jumlah_bagian=30)
	{
		if ($this->belajar->ambil_bagian_terakhir_teori_mysql(5) > 11)
		{
			if ($bagian > 0 && $bagian <= $jumlah_bagian)
			{
				if ($this->belajar->q_teori_mysql(6,$bagian))
				{
					if ($bagian == 1)
					{
						$this->_lhd('mysql','6','belajar-mysql/teori/lebih-banyak-tentang-mysql');
					}

					$this->load->view("belajar/mysql/teori/6/{$bagian}");
				}
				else
				{
					show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
		}
	}

	public function segarkan_bagian_teori_mysql()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m != NULL && $b != NULL)
		{
			if ($m == 6 && $b == 30)
			{
				$this->_cek_sertifikat('MySQL');
			}
			else
			{
				$this->_cek_pencapaian();
			}

			if ($this->belajar->segarkan_bagian_teori_mysql($m,$b))
			{
				if ($m == 6 && $b == 30)
				{
					$this->ang->bot("{$this->session->ang_nama_pengguna} menyelesaikan kelas MySQL di Always Ngoding.");
					$this->ang->kakd("{$this->session->ang_nama_pengguna} (".site_url("anggota/{$this->session->ang_nama_pengguna}").") menyelesaikan kelas MySQL di Always Ngoding :partying_face:");
				}

			 	$pesan = ">> Berhasil menyegarkan... << >> {$m} << >> {$b} <<";
			}
			else
			{
				$pesan = ">> Tidak ada yang perlu disegarkan... << >> {$m} << >> {$b} <<";
			}

			echo $this->_encode_dengan_token(array_merge($this->respon, ['pesan' => $pesan]));
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function jawab_teori_belajar_mysql()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m !== NULL && $b !== NULL)
		{
			if ($m == sha1('berkenalan dengan mysql'))
			{
				if ($b == sha1(2))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'sistem manajemen basis data' || $j == 'manajemen basis data' || $j == 'database management system')
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'relasional')
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'relational database management system')
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '1979')
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'indexing')
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,11)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));
					$j2 = strtolower($this->input->post('j_2',TRUE));

					if (($j1 == 'unireg' && $j2 == 'msql') || ($j1 == 'msql' && $j2 == 'unireg'))
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,12)]);

						if ($j1 != 'unireg') $this->_pk('j_1');
						if ($j2 != 'msql') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));
					$j2 = strtolower($this->input->post('j_2',TRUE));

					if ((($j1 == 'mei' || $j1 == 'may') && $j2 == '1995'))
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,13)]);

						if (!($j1 == 'mei' || $j1 == 'may')) $this->_pk('j_1');
						if ($j2 != '1995') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'mysql ab')
					{
						$ls = site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && $this->input->post('j_2',TRUE) === NULL)
					{
						$ls = site_url('belajar-mysql/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(1,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan mysql', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',1,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('perintah perintah dasar mysql'))
			{
				if ($b == sha1(4))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'show' && strtolower($this->input->post('j_2',TRUE)) == 'databases')
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,4)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'show') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'databases') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'show' && strtolower($this->input->post('j_2',TRUE)) == 'tables')
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,5)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'show') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'tables') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'show' && strtolower($this->input->post('j_2',TRUE)) == 'columns' && strtolower($this->input->post('j_3',TRUE)) == 'from' && strtolower($this->input->post('j_4',TRUE)) == 'pelanggan_setia')
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,6)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'show') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'columns') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'pelanggan_setia') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					$j2 = str_replace(', ',',',strtolower($this->input->post('j_2',TRUE)));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' && ($j2 == 'id_karyawan,alamat' || $j2 == 'alamat,id_karyawan') && strtolower($this->input->post('j_3',TRUE)) == 'from' && strtolower($this->input->post('j_4',TRUE)) == 'karyawan')
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,9)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (!($j2 == 'id_karyawan,alamat' || $j2 == 'alamat,id_karyawan')) $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'karyawan') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if (strtolower($this->input->post('j_1',FALSE)) == '*')
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL))
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL))
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if (strtolower($this->input->post('j_1',FALSE)) == 'create' && strtolower($this->input->post('j_2',FALSE)) == 'database' && strtolower($this->input->post('j_3',FALSE)) == 'if' && strtolower($this->input->post('j_4',FALSE)) == 'not' && strtolower($this->input->post('j_5',FALSE)) == 'exists' && strtolower($this->input->post('j_6',FALSE)) == 'perusahaan')
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,17)]);

						if (strtolower($this->input->post('j_1',FALSE)) != 'create') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',FALSE)) != 'database') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',FALSE)) != 'if') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',FALSE)) != 'not') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',FALSE)) != 'exists') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != 'perusahaan') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if (strtolower($this->input->post('j_1',FALSE)) == 'drop' && strtolower($this->input->post('j_2',FALSE)) == 'database' && strtolower($this->input->post('j_3',FALSE)) == 'if' && strtolower($this->input->post('j_4',FALSE)) == 'exists' && strtolower($this->input->post('j_5',FALSE)) == 'perusahaan')
					{
						$ls = site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,18)]);

						if (strtolower($this->input->post('j_1',FALSE)) != 'drop') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',FALSE)) != 'database') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',FALSE)) != 'if') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',FALSE)) != 'exists') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',FALSE)) != 'perusahaan') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if (strtolower($this->input->post('j_1',FALSE)) == 'drop' && strtolower($this->input->post('j_2',FALSE)) == 'table' && strtolower($this->input->post('j_3',FALSE)) == 'if' && strtolower($this->input->post('j_4',FALSE)) == 'exists' && strtolower($this->input->post('j_5',FALSE)) == 'mahasiswa')
					{
						$ls = site_url('belajar-mysql/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(2,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'perintah perintah dasar mysql', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',2,20)]);

						if (strtolower($this->input->post('j_1',FALSE)) != 'drop') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',FALSE)) != 'table') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',FALSE)) != 'if') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',FALSE)) != 'exists') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',FALSE)) != 'mahasiswa') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('tipe data pada mysql'))
			{
				if ($b == sha1(4))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '5')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(5))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(3) && $j[1] == sha1(5) && $j[2] == sha1(1) && $j[3] == sha1(4) && $j[4] == sha1(2))
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(7))
				{
					if (str_replace(', ',',', strtolower($this->input->post('j_1',TRUE))) == 'decimal(6,4)')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'floating point')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(11))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,11)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(12))
				{
					if (($this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_2',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL))
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(14))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == '255')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(15))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));
					if ($j1 == '65535' || $j1 == '65.535')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(18))
				{
					$j17 = str_replace(', ',',',strtolower($this->input->post('j_17',FALSE)));

					if (strtolower($this->input->post('j_1',TRUE)) == 'create' &&
							strtolower($this->input->post('j_2',TRUE)) == 'table' &&
							strtolower($this->input->post('j_3',TRUE)) == 'orang' &&
							strtolower($this->input->post('j_4',FALSE)) == '(' &&
							strtolower($this->input->post('j_5',TRUE)) == 'nama_lengkap' &&
							strtolower($this->input->post('j_6',FALSE)) == 'varchar(100)' &&
							strtolower($this->input->post('j_7',TRUE)) == 'not' &&
							strtolower($this->input->post('j_8',TRUE)) == 'null' &&
							strtolower($this->input->post('j_9',TRUE)) == 'nik' &&
							strtolower($this->input->post('j_10',FALSE)) == 'char(16)' &&
							strtolower($this->input->post('j_11',TRUE)) == 'not' &&
							strtolower($this->input->post('j_12',TRUE)) == 'null' &&
							strtolower($this->input->post('j_13',TRUE)) == 'cerita_hidup' &&
							strtolower($this->input->post('j_14',FALSE)) == 'mediumtext(10000000)' &&
							strtolower($this->input->post('j_15',TRUE)) == 'null' &&
							strtolower($this->input->post('j_16',TRUE)) == 'jumlah_tabungan' &&
							$j17 == 'decimal(13,3)' &&
							strtolower($this->input->post('j_18',TRUE)) == 'not' &&
							strtolower($this->input->post('j_19',TRUE)) == 'null' &&
							strtolower($this->input->post('j_20',FALSE)) == ');'
					  )
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,18)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'create') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'table') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'orang') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',FALSE)) != '(') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'nama_lengkap') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != 'varchar(100)') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'not') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'null') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'nik') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',FALSE)) != 'char(16)') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',TRUE)) != 'not') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != 'null') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13',TRUE)) != 'cerita_hidup') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',FALSE)) != 'mediumtext(10000000)') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15',TRUE)) != 'null') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16',TRUE)) != 'jumlah_tabungan') $this->_pk('j_16');
						if ($j17 != 'decimal(13,3)') $this->_pk('j_17');
						if (strtolower($this->input->post('j_18',TRUE)) != 'not') $this->_pk('j_18');
						if (strtolower($this->input->post('j_19',TRUE)) != 'null') $this->_pk('j_19');
						if (strtolower($this->input->post('j_20',FALSE)) != ');') $this->_pk('j_20');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(20))
				{
					if ($this->input->post('j_1',TRUE) == 'YYYY')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(21))
				{
					if ($this->input->post('j_1',TRUE) == 'MM')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(22))
				{
					if ($this->input->post('j_1',TRUE) == 'YY-MM-DD hh:mm:ss')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,22)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(23))
				{
					if ($this->input->post('j_1',TRUE) == '1000-01-01' && $this->input->post('j_2',TRUE) == '9999-12-13')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,23)]);

						if ($this->input->post('j_1',TRUE) != '1000-01-01') $this->_pk('j_1');
						if ($this->input->post('j_2',TRUE) != '9999-12-13') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(24))
				{
					if ($this->input->post('j_1',TRUE) == '1000-01-01 00:00:00' && $this->input->post('j_2',TRUE) == '9999-12-31 23:59:59')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,24)]);

						if ($this->input->post('j_1',TRUE) != '1000-01-01 00:00:00') $this->_pk('j_1');
						if ($this->input->post('j_2',TRUE) != '9999-12-31 23:59:59') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(25))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'create' &&
							strtolower($this->input->post('j_2',TRUE)) == 'table' &&
							strtolower($this->input->post('j_3',TRUE)) == 'saya' &&
							strtolower($this->input->post('j_4',FALSE)) == '(' &&
							strtolower($this->input->post('j_5',TRUE)) == 'tanggal_kelahiran' &&
							strtolower($this->input->post('j_6',FALSE)) == 'date' &&
							strtolower($this->input->post('j_7',TRUE)) == 'not' &&
							strtolower($this->input->post('j_8',TRUE)) == 'null' &&
							strtolower($this->input->post('j_9',TRUE)) == 'jam_kelahiran' &&
							strtolower($this->input->post('j_10',TRUE)) == 'time' &&
							strtolower($this->input->post('j_11',TRUE)) == 'not' &&
							strtolower($this->input->post('j_12',TRUE)) == 'null' &&
							strtolower($this->input->post('j_13',TRUE)) == 'tanggal_dan_jam_kelahiran' &&
							strtolower($this->input->post('j_14',FALSE)) == 'datetime' &&
							strtolower($this->input->post('j_15',TRUE)) == 'not' &&
							strtolower($this->input->post('j_16',TRUE)) == 'null' &&
							strtolower($this->input->post('j_17',FALSE)) == ');'
					  )
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/26'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,25)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'create') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'table') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'saya') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',FALSE)) != '(') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'tanggal_kelahiran') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != 'date') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'not') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'null') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'jam_kelahiran') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'time') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',TRUE)) != 'not') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != 'null') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13',TRUE)) != 'tanggal_dan_jam_kelahiran') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',FALSE)) != 'datetime') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15',TRUE)) != 'not') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16',TRUE)) != 'null') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17',FALSE)) != ');') $this->_pk('j_17');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(27))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'default')
					{
						$ls = site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/28'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,27);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '27'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,27)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(28))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-mysql/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(3,28);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada mysql', bagian '28'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',3,28)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('create read update delete mysql'))
			{
				if ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(5))
				{
					$j2 = strtolower($this->input->post('j_2',TRUE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							($j2 == 'distinct(jenis_kelamin)' || $j2 == 'distinct jenis_kelamin') &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'murid'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,5)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (!($j2 == 'distinct(jenis_kelamin)' || $j2 == 'distinct jenis_kelamin')) $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'murid') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(7))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == '*' &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'limit' &&
							strtolower($this->input->post('j_5',TRUE)) == '10' &&
							strtolower($this->input->post('j_6',TRUE)) == '3'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,7)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '*') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'limit') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != '10') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != '3') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == '*' &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'order' &&
							strtolower($this->input->post('j_5',TRUE)) == 'by' &&
							strtolower($this->input->post('j_6',TRUE)) == 'tanggal_lahir' &&
							strtolower($this->input->post('j_7',TRUE)) == 'asc'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,9)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '*') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'order') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'by') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'tanggal_lahir') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'asc') $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(10))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == '*' &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'order' &&
							strtolower($this->input->post('j_5',TRUE)) == 'by' &&
							strtolower($this->input->post('j_6',TRUE)) == 'kelas' &&
							strtolower($this->input->post('j_7',TRUE)) == 'desc' &&
							strtolower($this->input->post('j_8',TRUE)) == 'jurusan' &&
							strtolower($this->input->post('j_9',TRUE)) == 'desc'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,10)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '*') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'order') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'by') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'kelas') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'desc') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'jurusan') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'desc') $this->_pk('j_9');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(12))
				{
					$j6 = strtolower($this->input->post('j_6',TRUE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_3',TRUE)) == 'where' &&
							strtolower($this->input->post('j_4',TRUE)) == 'jenis_kelamin' &&
							strtolower($this->input->post('j_5',TRUE)) == '=' &&
							($j6 == '\'perempuan\'' || $j6 == '"perempuan"')
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,12)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'murid') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'where') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'jenis_kelamin') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != '=') $this->_pk('j_5');
						if (!($j6 == '\'perempuan\'' || $j6 == '"perempuan"')) $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(14))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL && $this->input->post('j_9',TRUE) !== NULL && $this->input->post('j_10',TRUE) !== NULL && $this->input->post('j_11',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL && $this->input->post('j_8',TRUE) === NULL))
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(15))
				{
					$j5 = strtolower($this->input->post('j_5',FALSE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_3',TRUE)) == 'where' &&
							strtolower($this->input->post('j_4',TRUE)) == 'jurusan' &&
							($j5 == "<>" || $j5 == '!=') &&
							strtolower($this->input->post('j_6',TRUE)) == 'multimedia'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,15)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'murid') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'where') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'jurusan') $this->_pk('j_4');
						if (!($j5 == "<>" || $j5 == '!=')) $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'multimedia') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(16))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(6) && $j[1] == sha1(3) && $j[2] == sha1(8) && $j[3] == sha1(4) && $j[4] == sha1(1) && $j[5] == sha1(5) && $j[6] == sha1(7) && $j[7] == sha1(2))
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(18))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == '*' &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'where' &&
							strtolower($this->input->post('j_5',TRUE)) == 'tahun_angkatan' &&
							strtolower($this->input->post('j_6',TRUE)) == 'between' &&
							strtolower($this->input->post('j_7',TRUE)) == '2016' &&
							strtolower($this->input->post('j_8',TRUE)) == 'and' &&
							strtolower($this->input->post('j_9',TRUE)) == '2018'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,18)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '*') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'where') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'tahun_angkatan') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'between') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != '2016') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'and') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != '2018') $this->_pk('j_9');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(20))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_3',TRUE)) == 'where' &&
							strtolower($this->input->post('j_4',TRUE)) == 'kelas' &&
							strtolower($this->input->post('j_5',TRUE)) == '=' &&
							strtolower($this->input->post('j_6',TRUE)) == 'xii' &&
							strtolower($this->input->post('j_7',TRUE)) == 'and' &&
							strtolower($this->input->post('j_8',TRUE)) == 'jurusan'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,20)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'murid') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'where') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'kelas') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != '=') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'xii') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'and') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'jurusan') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(21))
				{
					$j6 = strtolower($this->input->post('j_6',TRUE));
					$j10 = strtolower($this->input->post('j_10',TRUE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_3',TRUE)) == 'where' &&
							strtolower($this->input->post('j_4',TRUE)) == 'nisn' &&
							strtolower($this->input->post('j_5',TRUE)) == '=' &&
							($j6 == '9036697177' || $j6 == '5353675639') &&
							strtolower($this->input->post('j_7',TRUE)) == 'or' &&
							strtolower($this->input->post('j_8',TRUE)) == 'nisn' &&
							strtolower($this->input->post('j_9',TRUE)) == '=' &&
							($j10 == '9036697177' || $j10 == '5353675639')
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,21)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'murid') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'where') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'nisn') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != '=') $this->_pk('j_5');
						if (!($j6 == '9036697177' || $j6 == '5353675639')) $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'or') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'nisn') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != '=') $this->_pk('j_9');
						if (!($j10 == '9036697177' || $j10 == '5353675639')) $this->_pk('j_10');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(23))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == '*' &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'where' &&
							strtolower($this->input->post('j_5',TRUE)) == 'like' &&
							strtolower($this->input->post('j_6',FALSE)) == '%la%'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,23)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '*') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'where') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'like') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != '%la%') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(24))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == '*' &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'where' &&
							strtolower($this->input->post('j_5',TRUE)) == 'like' &&
							strtolower($this->input->post('j_6',FALSE)) == 'n%'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,24)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '*') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'where') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'like') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != 'n%') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(26))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'insert' &&
							strtolower($this->input->post('j_2',TRUE)) == 'into' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_4',TRUE)) == 'values' &&
							strtolower($this->input->post('j_5',TRUE)) == '(' &&
							strtolower($this->input->post('j_6',FALSE)) == '1716725165' &&
							$this->input->post('j_7',FALSE) == 'Raju Raihan' &&
							$this->input->post('j_8',FALSE) == 'Laki-laki' &&
							strtolower($this->input->post('j_9',FALSE)) == '2000-03-28' &&
							$this->input->post('j_10',FALSE) == 'X' &&
							$this->input->post('j_11',FALSE) == 'Teknik Komputer dan Jaringan' &&
							strtolower($this->input->post('j_12',FALSE)) == '2014' &&
							strtolower($this->input->post('j_13',FALSE)) == '78000' &&
							strtolower($this->input->post('j_14',FALSE)) == ')'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/27'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,26);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '26'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,26)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'insert') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'into') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'values') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != '(') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != '1716725165') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != 'Raju Raihan') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != 'Laki-laki') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',FALSE)) != '2000-03-28') $this->_pk('j_9');
						if ($this->input->post('j_10',FALSE) != 'X') $this->_pk('j_10');
						if ($this->input->post('j_11',FALSE) != 'Teknik Komputer dan Jaringan') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',FALSE)) != '2014') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13',FALSE)) != '78000') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',FALSE)) != ')') $this->_pk('j_14');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(28))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'insert' &&
							strtolower($this->input->post('j_2',TRUE)) == 'into' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_4',FALSE)) == '(' &&
							strtolower($this->input->post('j_5',TRUE)) == 'tahun_angkatan' &&
							strtolower($this->input->post('j_6',TRUE)) == 'nama_lengkap' &&
							strtolower($this->input->post('j_7',TRUE)) == 'jenis_kelamin' &&
							strtolower($this->input->post('j_8',TRUE)) == 'nisn' &&
							strtolower($this->input->post('j_9',TRUE)) == 'tanggal_lahir' &&
							strtolower($this->input->post('j_10',TRUE)) == 'kelas' &&
							strtolower($this->input->post('j_11',FALSE)) == ')' &&
							strtolower($this->input->post('j_12',TRUE)) == 'values' &&
							strtolower($this->input->post('j_13',FALSE)) == '(' &&
							strtolower($this->input->post('j_14',TRUE)) == '2013' &&
							$this->input->post('j_15',TRUE) == 'Abdul Ghani' &&
							$this->input->post('j_16',TRUE) == 'Laki-laki' &&
							strtolower($this->input->post('j_17',TRUE)) == '1991008417' &&
							strtolower($this->input->post('j_18',TRUE)) == '1999-02-25' &&
							$this->input->post('j_19',TRUE) == 'XII' &&
							strtolower($this->input->post('j_20',FALSE)) == ')'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/29'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,28);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '28'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,28)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'insert') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'into') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',FALSE)) != '(') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'tahun_angkatan') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'nama_lengkap') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'jenis_kelamin') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'nisn') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'tanggal_lahir') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'kelas') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',FALSE)) != ')') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != 'values') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13',FALSE)) != '(') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',TRUE)) != '2013') $this->_pk('j_14');
						if ($this->input->post('j_15',TRUE) != 'Abdul Ghani') $this->_pk('j_15');
						if ($this->input->post('j_16',TRUE) != 'Laki-laki') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17',TRUE)) != '1991008417') $this->_pk('j_17');
						if (strtolower($this->input->post('j_18',TRUE)) != '1999-02-25') $this->_pk('j_18');
						if ($this->input->post('j_19',TRUE) != 'XII') $this->_pk('j_19');
						if (strtolower($this->input->post('j_20',FALSE)) != ')') $this->_pk('j_20');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(30))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'insert' &&
							strtolower($this->input->post('j_2',TRUE)) == 'into' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid' &&
							$this->input->post('j_4',TRUE) == 'Agus Steven' &&
							$this->input->post('j_5',TRUE) == 'XI' &&
							$this->input->post('j_6',TRUE) == 'Rekayasa Perangkat Lunak' &&
							strtolower($this->input->post('j_7',TRUE)) == '2018' &&
							strtolower($this->input->post('j_8',TRUE)) == '50500' &&
							strtolower($this->input->post('j_9',TRUE)) == '2001-11-18' &&
							strtolower($this->input->post('j_10',TRUE)) == '4604425597' &&
							$this->input->post('j_11',TRUE) == 'Nurlaila Nafilah' &&
							$this->input->post('j_12',TRUE) == 'X' &&
							$this->input->post('j_13',TRUE) == 'Multimedia' &&
							strtolower($this->input->post('j_14',TRUE)) == '2019' &&
							strtolower($this->input->post('j_15',TRUE)) == '325000' &&
							$this->input->post('j_16',TRUE) == 'Perempuan' &&
							strtolower($this->input->post('j_17',TRUE)) == '2003-05-20' &&
							strtolower($this->input->post('j_18',TRUE)) == '8140123448'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/31'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,30);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '30'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,30)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'insert') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'into') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid') $this->_pk('j_3');
						if ($this->input->post('j_4',TRUE) != 'Agus Steven') $this->_pk('j_4');
						if ($this->input->post('j_5',TRUE) != 'XI') $this->_pk('j_5');
						if ($this->input->post('j_6',TRUE) != 'Rekayasa Perangkat Lunak') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != '2018') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != '50500') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != '2001-11-18') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != '4604425597') $this->_pk('j_10');
						if ($this->input->post('j_11',TRUE) != 'Nurlaila Nafilah') $this->_pk('j_11');
						if ($this->input->post('j_12',TRUE) != 'X') $this->_pk('j_12');
						if ($this->input->post('j_13',TRUE) != 'Multimedia') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',TRUE)) != '2019') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15',TRUE)) != '325000') $this->_pk('j_15');
						if ($this->input->post('j_16',TRUE) != 'Perempuan') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17',TRUE)) != '2003-05-20') $this->_pk('j_17');
						if (strtolower($this->input->post('j_18',TRUE)) != '8140123448') $this->_pk('j_18');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(32))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'update' &&
							strtolower($this->input->post('j_2',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_3',TRUE)) == 'set' &&
							strtolower($this->input->post('j_4',TRUE)) == 'nama_lengkap' &&
							strtolower($this->input->post('j_5',TRUE)) == '=' &&
							$this->input->post('j_6',TRUE) == 'Rizky Maulana' &&
							strtolower($this->input->post('j_7',TRUE)) == '=' &&
							$this->input->post('j_8',TRUE) == 'Laki-laki' &&
							strtolower($this->input->post('j_9',TRUE)) == 'where' &&
							strtolower($this->input->post('j_10',TRUE)) == 'nisn' &&
							strtolower($this->input->post('j_11',TRUE)) == '=' &&
							strtolower($this->input->post('j_12',TRUE)) == '1906400153'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/33'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,32);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '32'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,32)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'update') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'murid') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'set') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'nama_lengkap') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != '=') $this->_pk('j_5');
						if ($this->input->post('j_6',TRUE) != 'Rizky Maulana') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != '=') $this->_pk('j_7');
						if ($this->input->post('j_8',TRUE) != 'Laki-laki') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'where') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'nisn') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',TRUE)) != '=') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != '1906400153') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(34))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'delete' &&
							strtolower($this->input->post('j_2',TRUE)) == 'from' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_4',TRUE)) == 'where' &&
							strtolower($this->input->post('j_5',TRUE)) == 'nisn' &&
							strtolower($this->input->post('j_6',TRUE)) == '=' &&
							strtolower($this->input->post('j_7',TRUE)) == '7776664410'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/35'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,34);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '34'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,34)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'delete') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'from') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'where') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'nisn') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != '=') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != '7776664410') $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(35))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'delete' &&
							strtolower($this->input->post('j_2',TRUE)) == 'from' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_4',TRUE)) == 'where' &&
							strtolower($this->input->post('j_5',TRUE)) == 'tabungan' &&
							strtolower($this->input->post('j_6',FALSE)) == '<=' &&
							strtolower($this->input->post('j_7',TRUE)) == '750000'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/36'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,35);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '35'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,35)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'delete') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'from') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'where') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'tabungan') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != '<=') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != '750000') $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(36))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'delete' &&
							strtolower($this->input->post('j_2',TRUE)) == 'from' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_4',TRUE)) == 'where' &&
							strtolower($this->input->post('j_5',TRUE)) == 'tahun_angkatan' &&
							strtolower($this->input->post('j_6',TRUE)) == 'between' &&
							strtolower($this->input->post('j_7',TRUE)) == '2014' &&
							strtolower($this->input->post('j_8',TRUE)) == 'and' &&
							strtolower($this->input->post('j_9',TRUE)) == '2016'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/37'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,36);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '36'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,36)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'delete') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'from') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'where') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'tahun_angkatan') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'between') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != '2014') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'and') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != '2016') $this->_pk('j_9');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				else if ($b == sha1(37))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));
					$j2 = strtolower($this->input->post('j_2',TRUE));
					$j3 = strtolower($this->input->post('j_3',TRUE));

					if (($j1 == 'truncate' && $j2 == 'table' && $j3 == 'murid') || ($j1 == 'delete' && $j2 == 'from' && $j3 == 'murid'))
					{
						$ls = site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/38'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(4,37);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'create read update delete mysql', bagian '37'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',4,37)]);

						if ($j1 != 'truncate') $this->_pk('j_1');
						if ($j2 != 'table') $this->_pk('j_2');
						if ($j3 != 'murid') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('penggabungan tabel pada mysql'))
			{
				if ($b == sha1(3))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(5,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'penggabungan tabel pada mysql', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',5,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					$j2 = strtolower($this->input->post('j_2',TRUE));
					$j3 = strtolower($this->input->post('j_3',TRUE));
					$j4 = strtolower($this->input->post('j_4',TRUE));
					$j5 = strtolower($this->input->post('j_5',TRUE));
					$j7 = strtolower($this->input->post('j_7',TRUE));
					$j8 = strtolower($this->input->post('j_8',TRUE));
					$j9 = strtolower($this->input->post('j_9',TRUE));
					$j11 = strtolower($this->input->post('j_11',TRUE));
					$j12 = strtolower($this->input->post('j_12',TRUE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							($j2 == 'artikel.id_artikel' || $j2 == 'statistik_artikel.id_artikel') &&
							($j3 == 'artikel.judul' || $j3 == 'judul') &&
							($j4 == 'statistik_artikel.jumlah_suka' || $j4 == 'jumlah_suka') &&
							($j5 == 'statistik_artikel.jumlah_tayang' || $j5 == 'jumlah_tayang') &&
							strtolower($this->input->post('j_6',TRUE)) == 'from' && (
							($j7 == 'artikel' && ($j8 == 'inner join' || $j8 == 'join' || $j8 == 'cross join') && $j9 == 'statistik_artikel') ||
							($j7 == 'statistik_artikel' && ($j8 == 'inner join' || $j8 == 'join' || $j8 == 'cross join') && $j9 == 'artikel')) &&
							strtolower($this->input->post('j_10',TRUE)) == 'on' && (
							($j11 == 'artikel.id_artikel' && $j12 == 'statistik_artikel.id_artikel') ||
							($j11 == 'statistik_artikel.id_artikel' && $j12 == 'artikel.id_artikel'))
					  )
					{
						$ls = site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(5,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'penggabungan tabel pada mysql', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',5,5)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (!($j2 == 'artikel.id_artikel' || $j2 == 'statistik_artikel.id_artikel')) $this->_pk('j_2');
						if (!($j3 == 'artikel.judul' || $j3 == 'judul')) $this->_pk('j_3');
						if (!($j4 == 'statistik_artikel.jumlah_suka' || $j4 == 'jumlah_suka')) $this->_pk('j_4');
						if (!($j5 == 'statistik_artikel.jumlah_tayang' || $j5 == 'jumlah_tayang')) $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'from') $this->_pk('j_6');
						if ($j7 != 'artikel') $this->_pk('j_7');
						if (!($j8 == 'inner join' || $j8 == 'join' || $j8 == 'cross join')) $this->_pk('j_8');
						if ($j9 != 'statistik_artikel') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'on') $this->_pk('j_10');
						if ($j11 != 'artikel.id_artikel') $this->_pk('j_11');
						if ($j12 != 'statistik_artikel.id_artikel') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					$j2 = strtolower($this->input->post('j_2',TRUE));
					$j3 = strtolower($this->input->post('j_3',TRUE));
					$j4 = strtolower($this->input->post('j_4',TRUE));
					$j5 = strtolower($this->input->post('j_5',TRUE));
					$j8 = strtolower($this->input->post('j_8',TRUE));
					$j11 = strtolower($this->input->post('j_11',TRUE));
					$j12 = strtolower($this->input->post('j_12',TRUE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							($j2 == 'artikel.id_artikel' || $j2 == 'statistik_artikel.id_artikel') &&
							($j3 == 'statistik_artikel.id_statistik_artikel' || $j3 == 'id_statistik_artikel') &&
							($j4 == 'artikel.judul' || $j4 == 'judul') &&
							($j5 == 'statistik_artikel.jumlah_tidak_suka' || $j5 == 'jumlah_tidak_suka') &&
							strtolower($this->input->post('j_6',TRUE)) == 'from' &&
							strtolower($this->input->post('j_7',TRUE)) == 'artikel' &&
							($j8 == 'left join' || $j8 == 'left outer join') &&
							strtolower($this->input->post('j_9',TRUE)) == 'statistik_artikel' &&
							strtolower($this->input->post('j_10',TRUE)) == 'on' && (
							($j11 == 'artikel.id_artikel' && $j12 == 'statistik_artikel.id_artikel') ||
							($j11 == 'statistik_artikel.id_artikel' && $j12 == 'artikel.id_artikel'))
					  )
					{
						$ls = site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(5,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'penggabungan tabel pada mysql', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',5,7)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (!($j2 == 'artikel.id_artikel' || $j2 == 'statistik_artikel.id_artikel')) $this->_pk('j_2');
						if (!($j3 == 'statistik_artikel.id_statistik_artikel' || $j3 == 'id_statistik_artikel')) $this->_pk('j_3');
						if (!($j4 == 'artikel.judul' || $j4 == 'judul')) $this->_pk('j_4');
						if (!($j5 == 'statistik_artikel.jumlah_tidak_suka' || $j5 == 'jumlah_tidak_suka')) $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'from') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'artikel') $this->_pk('j_7');
						if (!($j8 == 'left join' || $j8 == 'left outer join')) $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'statistik_artikel') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'on') $this->_pk('j_10');
						if ($j11 != 'artikel.id_artikel') $this->_pk('j_11');
						if ($j12 != 'statistik_artikel.id_artikel') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					$j5 = strtolower($this->input->post('j_5',TRUE));
					$j8 = strtolower($this->input->post('j_8',TRUE));
					$j9 = strtolower($this->input->post('j_9',TRUE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == '*' &&
							strtolower($this->input->post('j_3',TRUE)) == 'from' &&
							strtolower($this->input->post('j_4',TRUE)) == 'statistik_artikel' &&
							($j5 == 'right join' || $j5 == 'right outer join') &&
							strtolower($this->input->post('j_6',TRUE)) == 'artikel' &&
							strtolower($this->input->post('j_7',TRUE)) == 'on' && (
							($j8 == 'artikel.id_artikel' && $j9 == 'statistik_artikel.id_artikel') ||
							($j8 == 'statistik_artikel.id_artikel' && $j9 == 'artikel.id_artikel')) &&
							strtolower($this->input->post('j_10',TRUE)) == 'where' &&
							strtolower($this->input->post('j_11',TRUE)) == 'statistik_artikel.id_artikel' &&
							strtolower($this->input->post('j_12',TRUE)) == 'null'
					  )
					{
						$ls = site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(5,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'penggabungan tabel pada mysql', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',5,9)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != '*') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'from') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'statistik_artikel') $this->_pk('j_4');
						if (!($j5 == 'right join' || $j5 == 'right outer join')) $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'artikel') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'on') $this->_pk('j_7');
						if ($j8 != 'artikel.id_artikel') $this->_pk('j_8');
						if ($j9 != 'statistik_artikel.id_artikel') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'where') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',TRUE)) != 'statistik_artikel.id_artikel') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != 'null') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					$j2 = strtolower($this->input->post('j_2',TRUE));
					$j3 = strtolower($this->input->post('j_3',TRUE));
					$j4 = strtolower($this->input->post('j_4',TRUE));
					$j5 = strtolower($this->input->post('j_5',TRUE));
					$j6 = strtolower($this->input->post('j_6',TRUE));
					$j9 = strtolower($this->input->post('j_9',TRUE));
					$j11 = strtolower($this->input->post('j_11',TRUE));
					$j12 = strtolower($this->input->post('j_12',TRUE));
					$j13 = strtolower($this->input->post('j_13',TRUE));
					$j18 = strtolower($this->input->post('j_18',TRUE));

					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							($j2 == 'artikel.id_artikel' || $j2 == 'statistik_artikel.id_artikel') &&
							($j3 == 'artikel.judul' || $j3 == 'judul') &&
							($j4 == 'artikel.konten' || $j4 == 'konten') &&
							($j5 == 'penginput.nama_penginput' || $j5 == 'nama_penginput') &&
							($j6 == 'statistik_artikel.jumlah_tayang' || $j6 == 'jumlah_tayang') &&
							strtolower($this->input->post('j_7',TRUE)) == 'from' &&
							strtolower($this->input->post('j_8',TRUE)) == 'artikel' &&
							($j9 == 'inner join' || $j9 == 'join' || $j9 == 'cross join') &&
							strtolower($this->input->post('j_10',TRUE)) == 'on' && (
							($j11 == 'artikel.id_penginput' && $j12 == 'penginput.id_penginput') ||
							($j11 == 'penginput.id_penginput' && $j12 == 'artikel.id_penginput')) &&
							($j13 == 'inner join' || $j13 == 'join' || $j13 == 'cross join') &&
							strtolower($this->input->post('j_14',TRUE)) == 'statistik_artikel' &&
							strtolower($this->input->post('j_15',TRUE)) == 'on' &&
							strtolower($this->input->post('j_16',TRUE)) == 'artikel.id_artikel' &&
							strtolower($this->input->post('j_17',TRUE)) == 'order by' &&
							($j18 == 'statistik_artikel.jumlah_tayang' || $j18 == 'jumlah_tayang')
					  )
					{
						$ls = site_url('belajar-mysql/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(5,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'penggabungan tabel pada mysql', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',5,11)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (!($j2 == 'artikel.id_artikel' || $j2 == 'statistik_artikel.id_artikel')) $this->_pk('j_2');
						if (!($j3 == 'artikel.judul' || $j3 == 'judul')) $this->_pk('j_3');
						if (!($j4 == 'artikel.konten' || $j4 == 'konten')) $this->_pk('j_4');
						if (!($j5 == 'penginput.nama_penginput' || $j5 == 'nama_penginput')) $this->_pk('j_5');
						if (!($j6 == 'statistik_artikel.jumlah_tayang' || $j6 == 'jumlah_tayang')) $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'from') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'artikel') $this->_pk('j_8');
						if (!($j9 == 'inner join' || $j9 == 'join' || $j9 == 'cross join')) $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'on') $this->_pk('j_10');
						if ($j11 != 'artikel.id_penginput') $this->_pk('j_11');
						if ($j12 != 'penginput.id_penginput') $this->_pk('j_12');
						if (!($j13 == 'inner join' || $j13 == 'join' || $j13 == 'cross join')) $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',TRUE)) != 'statistik_artikel') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15',TRUE)) != 'on') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16',TRUE)) != 'artikel.id_artikel') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17',TRUE)) != 'order by') $this->_pk('j_17');
						if (!($j18 == 'statistik_artikel.jumlah_tayang' || $j18 == 'jumlah_tayang')) $this->_pk('j_18');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('lebih banyak tentang mysql'))
			{
				if ($b == sha1(2))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'update' &&
							strtolower($this->input->post('j_2',TRUE)) == 'set' &&
							strtolower($this->input->post('j_3',TRUE)) == 'stok' &&
							strtolower($this->input->post('j_4',TRUE)) == '=' &&
							strtolower($this->input->post('j_5',TRUE)) == 'stok' &&
							strtolower($this->input->post('j_6',FALSE)) == '+' &&
							strtolower($this->input->post('j_7',TRUE)) == '8' &&
							strtolower($this->input->post('j_8',TRUE)) == 'where' &&
							strtolower($this->input->post('j_9',TRUE)) == 'serutan'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,2)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'update') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'set') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'stok') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != '=') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'stok') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != '+') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != '8') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'where') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'serutan') $this->_pk('j_9');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == 'nisn' &&
							strtolower($this->input->post('j_3',TRUE)) == 'as' &&
							$this->input->post('j_4',TRUE) == 'NISN' &&
							strtolower($this->input->post('j_5',TRUE)) == 'nama_lengkap' &&
							strtolower($this->input->post('j_6',FALSE)) == 'as' &&
							$this->input->post('j_7',TRUE) == 'Nama Lengkap' &&
							strtolower($this->input->post('j_8',TRUE)) == 'jenis_kelamin' &&
							strtolower($this->input->post('j_9',TRUE)) == 'as' &&
							$this->input->post('j_10',TRUE) == 'Jenis Kelamin' &&
							strtolower($this->input->post('j_11',TRUE)) == 'tanggal_lahir' &&
							strtolower($this->input->post('j_12',TRUE)) == 'as' &&
							$this->input->post('j_13',TRUE) == 'Tanggal Lahir'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,4)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'nisn') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'as') $this->_pk('j_3');
						if ($this->input->post('j_4',TRUE) != 'NISN') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'nama_lengkap') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',FALSE)) != 'as') $this->_pk('j_6');
						if ($this->input->post('j_7',TRUE) != 'Nama Lengkap') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'jenis_kelamin') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'as') $this->_pk('j_9');
						if ($this->input->post('j_10',TRUE) != 'Jenis Kelamin') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',TRUE)) != 'tanggal_lahir') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != 'as') $this->_pk('j_12');
						if ($this->input->post('j_13',TRUE) != 'Tanggal Lahir') $this->_pk('j_13');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == 'barang' &&
							strtolower($this->input->post('j_3',TRUE)) == 'as' &&
							$this->input->post('j_4',TRUE) == 'Nama Barang' &&
							strtolower($this->input->post('j_5',TRUE)) == 'harga' &&
							strtolower($this->input->post('j_6',TRUE)) == 'as' &&
							$this->input->post('j_7',TRUE) == 'Harga Asli' &&
							strtolower($this->input->post('j_8',TRUE)) == 'harga' &&
							strtolower($this->input->post('j_9',FALSE)) == '-' &&
							strtolower($this->input->post('j_10',TRUE)) == 'harga' &&
							strtolower($this->input->post('j_11',FALSE)) == '*' &&
							strtolower($this->input->post('j_12',TRUE)) == '65' &&
							strtolower($this->input->post('j_13',TRUE)) == '100' &&
							strtolower($this->input->post('j_14',TRUE)) == 'as' &&
							$this->input->post('j_15',TRUE) == 'Harga Diskon' &&
							strtolower($this->input->post('j_16',TRUE)) == 'from' &&
							strtolower($this->input->post('j_17',TRUE)) == 'barang'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,7)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'barang') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'as') $this->_pk('j_3');
						if ($this->input->post('j_4',TRUE) != 'Nama Barang') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'harga') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'as') $this->_pk('j_6');
						if ($this->input->post('j_7',TRUE) != 'Harga Asli') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'harga') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',FALSE)) != '-') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'harga') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',FALSE)) != '*') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != '65') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13',TRUE)) != '100') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',TRUE)) != 'as') $this->_pk('j_14');
						if ($this->input->post('j_15',TRUE) != 'Harga Diskon') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16',TRUE)) != 'from') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17',TRUE)) != 'barang') $this->_pk('j_17');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'select' &&
							strtolower($this->input->post('j_2',TRUE)) == 'concat' &&
							strtolower($this->input->post('j_3',TRUE)) == 'nama_depan' &&
							strtolower($this->input->post('j_4',TRUE)) == 'nama_belakang' &&
							strtolower($this->input->post('j_5',TRUE)) == 'orang'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,9)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'select') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'concat') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'nama_depan') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'nama_belakang') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'orang') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'sum' || $j == 'sum()' || $j == 'sum();')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'avg' || $j == 'avg()' || $j == 'avg();')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,14)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'min(tabungan)' &&
							strtolower($this->input->post('j_2',TRUE)) == 'max(tabungan)' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,15)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'min(tabungan)') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'max(tabungan)') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'floor' || $j == 'floor()' || $j == 'floor();')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'ceil' || $j == 'ceil()' || $j == 'ceil();')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'round' || $j == 'round()' || $j == 'round();')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,18)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'count' || $j == 'count()' || $j == 'count();')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,19)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'now' || $j == 'now()')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					$j = strtolower($this->input->post('j_1',TRUE));

					if ($j == 'curdate' || $j == 'curdate()')
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'day' &&
							strtolower($this->input->post('j_2',TRUE)) == 'month' &&
							strtolower($this->input->post('j_3',TRUE)) == 'year'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,22)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'day') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'month') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'year') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'upper(nama_lengkap)' &&
							strtolower($this->input->post('j_2',TRUE)) == 'replace' &&
							strtolower($this->input->post('j_3',TRUE)) == 'jenis_kelamin' &&
							strtolower($this->input->post('j_4',TRUE)) == 'perempuan' &&
							$this->input->post('j_5',TRUE) == 'Cewe' &&
							strtolower($this->input->post('j_6',TRUE)) == 'lower(jurusan)'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,23)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'upper(nama_lengkap)') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'replace') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'jenis_kelamin') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'perempuan') $this->_pk('j_4');
						if ($this->input->post('j_5',TRUE) != 'Cewe') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'lower(jurusan)') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'create' &&
							strtolower($this->input->post('j_2',TRUE)) == 'view' &&
							strtolower($this->input->post('j_3',TRUE)) == 'murid_rpl' &&
							strtolower($this->input->post('j_4',TRUE)) == 'as' &&
							strtolower($this->input->post('j_5',TRUE)) == 'select' &&
							strtolower($this->input->post('j_6',TRUE)) == 'nisn' &&
							strtolower($this->input->post('j_7',TRUE)) == 'nama_lengkap' &&
							strtolower($this->input->post('j_8',TRUE)) == 'jurusan' &&
							strtolower($this->input->post('j_9',TRUE)) == 'from' &&
							strtolower($this->input->post('j_10',TRUE)) == 'murid' &&
							strtolower($this->input->post('j_11',TRUE)) == 'jurusan' &&
							strtolower($this->input->post('j_12',TRUE)) == 'rekayasa perangkat lunak'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/26'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,25)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'create') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'view') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'murid_rpl') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'as') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != 'select') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'nisn') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'nama_lengkap') $this->_pk('j_7');
						if (strtolower($this->input->post('j_8',TRUE)) != 'jurusan') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'from') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != 'murid') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',TRUE)) != 'jurusan') $this->_pk('j_11');
						if (strtolower($this->input->post('j_12',TRUE)) != 'rekayasa perangkat lunak') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(27))
				{
					$j3 = strtolower($this->input->post('j_3',TRUE));
					$j4 = strtolower($this->input->post('j_4',TRUE));
					$j5 = $this->input->post('j_5',TRUE);
					$j6 = $this->input->post('j_6',TRUE);

					if (strtolower($this->input->post('j_1',TRUE)) == 'if' &&
							strtolower($this->input->post('j_2',TRUE)) == 'harga' &&
							(($j3 == '>=' && $j4 == '3500' && $j5 == 'Mahal' && $j6 == 'Murah') ||
								($j3 == '>' && $j4 == '3499' && $j5 == 'Mahal' && $j6 == 'Murah') ||
								($j3 == '<' && $j4 == '3500' && $j5 == 'Murah' && $j6 == 'Mahal') ||
								($j3 == '<=' && $j4 == '3499' && $j5 == 'Murah' && $j6 == 'Mahal')
							)
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/28'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,27);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '27'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,27)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'if') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'harga') $this->_pk('j_2');
						if (!(($j3 == '>=' && $j4 == '3500' && $j5 == 'Mahal' && $j6 == 'Murah') ||
							($j3 == '>' && $j4 == '3499' && $j5 == 'Mahal' && $j6 == 'Murah') ||
							($j3 == '<' && $j4 == '3500' && $j5 == 'Murah' && $j6 == 'Mahal') ||
							($j3 == '<=' && $j4 == '3499' && $j5 == 'Murah' && $j6 == 'Mahal'))
						) $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(29))
				{
					if (strtolower($this->input->post('j_1',TRUE)) == 'jurusan' &&
							strtolower($this->input->post('j_2',TRUE)) == 'case' &&
							strtolower($this->input->post('j_3',TRUE)) == 'when' &&
							strtolower($this->input->post('j_4',TRUE)) == 'jurusan' &&
							strtolower($this->input->post('j_5',TRUE)) == '=' &&
							strtolower($this->input->post('j_6',TRUE)) == 'rekayasa perangkat lunak' &&
							strtolower($this->input->post('j_7',TRUE)) == 'then' &&
							$this->input->post('j_8',TRUE) == 'RPL' &&
							strtolower($this->input->post('j_9',TRUE)) == 'when' &&
							strtolower($this->input->post('j_10',TRUE)) == '=' &&
							strtolower($this->input->post('j_11',TRUE)) == 'then' &&
							$this->input->post('j_12',TRUE) == 'TKJ' &&
							strtolower($this->input->post('j_13',TRUE)) == 'when' &&
							strtolower($this->input->post('j_14',TRUE)) == 'jurusan' &&
							strtolower($this->input->post('j_15',TRUE)) == '=' &&
							strtolower($this->input->post('j_16',TRUE)) == 'multimedia' &&
							strtolower($this->input->post('j_17',TRUE)) == 'then' &&
							strtolower($this->input->post('j_18',TRUE)) == 'end' &&
							strtolower($this->input->post('j_19',TRUE)) == 'as' &&
							strtolower($this->input->post('j_20',TRUE)) == 'singkatan_jurusan'
				 	  )
					{
						$ls = site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/30'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_mysql(6,29);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang mysql', bagian '29'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('mysql',6,29)]);

						if (strtolower($this->input->post('j_1',TRUE)) != 'jurusan') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2',TRUE)) != 'case') $this->_pk('j_2');
						if (strtolower($this->input->post('j_3',TRUE)) != 'when') $this->_pk('j_3');
						if (strtolower($this->input->post('j_4',TRUE)) != 'jurusan') $this->_pk('j_4');
						if (strtolower($this->input->post('j_5',TRUE)) != '=') $this->_pk('j_5');
						if (strtolower($this->input->post('j_6',TRUE)) != 'rekayasa perangkat lunak') $this->_pk('j_6');
						if (strtolower($this->input->post('j_7',TRUE)) != 'then') $this->_pk('j_7');
						if ($this->input->post('j_8',TRUE) != 'RPL') $this->_pk('j_8');
						if (strtolower($this->input->post('j_9',TRUE)) != 'when') $this->_pk('j_9');
						if (strtolower($this->input->post('j_10',TRUE)) != '=') $this->_pk('j_10');
						if (strtolower($this->input->post('j_11',TRUE)) != 'then') $this->_pk('j_11');
						if ($this->input->post('j_12',TRUE) != 'TKJ') $this->_pk('j_12');
						if (strtolower($this->input->post('j_13',TRUE)) != 'when') $this->_pk('j_13');
						if (strtolower($this->input->post('j_14',TRUE)) != 'jurusan') $this->_pk('j_14');
						if (strtolower($this->input->post('j_15',TRUE)) != '=') $this->_pk('j_15');
						if (strtolower($this->input->post('j_16',TRUE)) != 'multimedia') $this->_pk('j_16');
						if (strtolower($this->input->post('j_17',TRUE)) != 'then') $this->_pk('j_17');
						if (strtolower($this->input->post('j_18',TRUE)) != 'end') $this->_pk('j_18');
						if (strtolower($this->input->post('j_19',TRUE)) != 'as') $this->_pk('j_19');
						if (strtolower($this->input->post('j_20',TRUE)) != 'singkatan_jurusan') $this->_pk('j_20');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function awal_belajar_teori_javascript($J1=7,$J2=7,$J3=10,$J4=27,$J5=25,$J6=32,$J7=29,$J8=30,$J9=38)
	{
		if ($this->session->has_userdata('ang_akses'))
		{
			$this->belajar->init_kelas_pengguna('js');

			$B1 = $this->belajar->ambil_bagian_terakhir_teori_javascript(1);
			$B2 = $this->belajar->ambil_bagian_terakhir_teori_javascript(2);
			$B3 = $this->belajar->ambil_bagian_terakhir_teori_javascript(3);
			$B4 = $this->belajar->ambil_bagian_terakhir_teori_javascript(4);
			$B5 = $this->belajar->ambil_bagian_terakhir_teori_javascript(5);
			$B6 = $this->belajar->ambil_bagian_terakhir_teori_javascript(6);
			$B7 = $this->belajar->ambil_bagian_terakhir_teori_javascript(7);
			$B8 = $this->belajar->ambil_bagian_terakhir_teori_javascript(8);
			$B9 = $this->belajar->ambil_bagian_terakhir_teori_javascript(9);
			$P1 = ($B1 > 1) ? round($this->_persentase($B1,$J1+1)) : 0;
			$P2 = ($B2 > 1) ? round($this->_persentase($B2,$J2+1)) : 0;
			$P3 = ($B3 > 1) ? round($this->_persentase($B3,$J3+1)) : 0;
			$P4 = ($B4 > 1) ? round($this->_persentase($B4,$J4+1)) : 0;
			$P5 = ($B5 > 1) ? round($this->_persentase($B5,$J5+1)) : 0;
			$P6 = ($B6 > 1) ? round($this->_persentase($B6,$J6+1)) : 0;
			$P7 = ($B7 > 1) ? round($this->_persentase($B7,$J7+1)) : 0;
			$P8 = ($B8 > 1) ? round($this->_persentase($B8,$J8+1)) : 0;
			$P9 = ($B9 > 1) ? round($this->_persentase($B9,$J9+1)) : 0;
			$P1 = $P1 > 100 ? 100 : $P1;
			$P2 = $P2 > 100 ? 100 : $P2;
			$P3 = $P3 > 100 ? 100 : $P3;
			$P4 = $P4 > 100 ? 100 : $P4;
			$P5 = $P5 > 100 ? 100 : $P5;
			$P6 = $P6 > 100 ? 100 : $P6;
			$P7 = $P7 > 100 ? 100 : $P7;
			$P8 = $P8 > 100 ? 100 : $P8;
			$P9 = $P9 > 100 ? 100 : $P9;
			$W1 = $this->_warna_chart($P1);
			$W2 = $this->_warna_chart($P2);
			$W3 = $this->_warna_chart($P3);
			$W4 = $this->_warna_chart($P4);
			$W5 = $this->_warna_chart($P5);
			$W6 = $this->_warna_chart($P6);
			$W7 = $this->_warna_chart($P7);
			$W8 = $this->_warna_chart($P8);
			$W9 = $this->_warna_chart($P9);
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'jumlah_bagian_7' => $J7,
				'jumlah_bagian_8' => $J8,
				'jumlah_bagian_9' => $J9,
				'warna_chart_1' => $W1,
				'warna_chart_2' => $W2,
				'warna_chart_3' => $W3,
				'warna_chart_4' => $W4,
				'warna_chart_5' => $W5,
				'warna_chart_6' => $W6,
				'warna_chart_7' => $W7,
				'warna_chart_8' => $W8,
				'warna_chart_9' => $W9,
				'persentase_1' => $P1,
				'persentase_2' => $P2,
				'persentase_3' => $P3,
				'persentase_4' => $P4,
				'persentase_5' => $P5,
				'persentase_6' => $P6,
				'persentase_7' => $P7,
				'persentase_8' => $P8,
				'persentase_9' => $P9,
				'bagian_1' => $B1,
				'bagian_2' => $B2,
				'bagian_3' => $B3,
				'bagian_4' => $B4,
				'bagian_5' => $B5,
				'bagian_6' => $B6,
				'bagian_7' => $B7,
				'bagian_8' => $B8,
				'bagian_9' => $B9
			];
		}
		else
		{
			$DT = [
				'jumlah_bagian_1' => $J1,
				'jumlah_bagian_2' => $J2,
				'jumlah_bagian_3' => $J3,
				'jumlah_bagian_4' => $J4,
				'jumlah_bagian_5' => $J5,
				'jumlah_bagian_6' => $J6,
				'jumlah_bagian_7' => $J7,
				'jumlah_bagian_8' => $J8,
				'jumlah_bagian_9' => $J9,
				'warna_chart_1' => 'grey',
				'warna_chart_2' => 'grey',
				'warna_chart_3' => 'grey',
				'warna_chart_4' => 'grey',
				'warna_chart_5' => 'grey',
				'warna_chart_6' => 'grey',
				'warna_chart_7' => 'grey',
				'warna_chart_8' => 'grey',
				'warna_chart_9' => 'grey',
				'persentase_1' => 0,
				'persentase_2' => 0,
				'persentase_3' => 0,
				'persentase_4' => 0,
				'persentase_5' => 0,
				'persentase_6' => 0,
				'persentase_7' => 0,
				'persentase_8' => 0,
				'persentase_9' => 0,
				'bagian_1' => 1,
				'bagian_2' => 1,
				'bagian_3' => 1,
				'bagian_4' => 1,
				'bagian_5' => 1,
				'bagian_6' => 1,
				'bagian_7' => 1,
				'bagian_8' => 1,
				'bagian_9' => 1
			];
		}

		$this->load->view('belajar/javascript/teori/awal',$DT);
	}

	public function teori_berkenalan_dengan_javascript($bagian,$jumlah_bagian=7)
	{
		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(1,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','1','belajar-javascript/teori/berkenalan-dengan-javascript');
				}

				$this->load->view("belajar/javascript/teori/1/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function teori_aturan_penulisan_kode_di_javascript($bagian,$jumlah_bagian=7)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(1) > 7);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(2,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','2','belajar-javascript/teori/aturan-penulisan-kode-di-javascript');
				}

				$this->load->view("belajar/javascript/teori/2/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function dasar_javascript($bagian,$jumlah_bagian=10)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(2) > 7);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(3,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','3','belajar-javascript/teori/aturan-penulisan-kode-di-javascript');
				}

				$this->load->view("belajar/javascript/teori/3/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function tipe_data_pada_javascipt($bagian,$jumlah_bagian=27)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(3) > 10);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(4,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','4','belajar-javascript/teori/tipe-data-pada-javascript');
				}

				$this->load->view("belajar/javascript/teori/4/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function function_dan_object_pada_javascript($bagian,$jumlah_bagian=25)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(4) > 27);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(5,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','5','belajar-javascript/teori/function-dan-object-pada-javascript');
				}

				$this->load->view("belajar/javascript/teori/5/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function kondisi_dan_perulangan_pada_javascript($bagian,$jumlah_bagian=32)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(5) > 25);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(6,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','6','belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript');
				}

				$this->load->view("belajar/javascript/teori/6/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function lebih_banyak_tentang_string_di_javascript($bagian,$jumlah_bagian=29)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(6) > 32);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(7,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','7','belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript');
				}

				$this->load->view("belajar/javascript/teori/7/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function lebih_banyak_tentang_array_dan_object_di_javascript($bagian,$jumlah_bagian=30)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(7) > 29);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(8,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','8','belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript');
				}

				$this->load->view("belajar/javascript/teori/8/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function lebih_banyak_tentang_javascript($bagian,$jumlah_bagian=38)
	{
		$modul_sebelumnya_belum_selesai = !($this->belajar->ambil_bagian_terakhir_teori_javascript(8) > 30);
		if ($modul_sebelumnya_belum_selesai)
		{
			show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			return;
		}

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->q_teori_javascript(9,$bagian))
			{
				if ($bagian == 1)
				{
					$this->_lhd('javascript','9','belajar-javascript/teori/lebih-banyak-tentang-javascript');
				}

				$this->load->view("belajar/javascript/teori/9/{$bagian}");
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_404();
		}
	}

	public function jawab_teori_belajar_javascript()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m !== NULL && $b !== NULL)
		{
			if ($m == sha1('berkenalan dengan javascript'))
			{
				if ($b == sha1(3))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));

					if ($j1 == 'javascript' || $j1 == 'java script')
					{
						$ls = site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(1,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan javascript', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',1,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));

					if ($j1 == 'brendan eich')
					{
						$ls = site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(1,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan javascript', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',1,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					$j1 = strtolower($this->input->post('j_1',TRUE));

					if ($j1 == '1995')
					{
						$ls = site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(1,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'berkenalan dengan javascript', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',1,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('aturan penulisan kode di javascript'))
			{
				if ($b == sha1(3))
				{
					if ($this->input->post('j_1',TRUE) == 'console.log')
					{
						$ls = site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(2,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'aturan penulisan kode di javascript', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',2,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_7',TRUE) !== NULL && $this->input->post('j_8',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL && $this->input->post('j_6',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(2,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'aturan penulisan kode di javascript', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',2,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('dasar javascript'))
			{
				if ($b == sha1(2))
				{
					if (($this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_2',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/dasar-javascript/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(3,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'dasar javascript', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',3,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					$j1 = $this->input->post('j_1');
					$j4 = str_replace(' = ','=',$this->input->post('j_4'));

					$p1 = ['var','let'];
					$p4 = ["nama='{$this->session->ang_nama_pengguna}'","nama=\"{$this->session->ang_nama_pengguna}\""];

					if (in_array($j1, $p1) && $this->input->post('j_2') == 'nama' && $this->input->post('j_3') == 'console.log(nama)' && in_array($j4, $p4) && $this->input->post('j_5') == 'console.log(nama)')
					{
						$ls = site_url('belajar-javascript/teori/dasar-javascript/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(3,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'dasar javascript', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',3,7)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'nama') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'console.log(nama)') $this->_pk('j_3');
						if (!in_array($j4, $p4)) $this->_pk('j_4');
						if ($this->input->post('j_5') != 'console.log(nama)') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/dasar-javascript/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(3,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'dasar javascript', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',3,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-primary rounded-lg btn-ss animated fadeIn'>Selesai</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(3,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'dasar javascript', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',3,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('tipe data pada javascript'))
			{
				if ($b == sha1(3))
				{
					$j1 = $this->input->post('j_1');
					$j5 = $this->input->post('j_5');

					$p1 = ['var','let'];
					$p5 = ['var','let'];

					if (in_array($j1, $p1) &&
							$this->input->post('j_2') == 'angkaKeSatu' &&
							$this->input->post('j_3') == '=' &&
							$this->input->post('j_4') == '50' &&
							in_array($j5, $p5) &&
							$this->input->post('j_6') == 'angkaKeDua' &&
							$this->input->post('j_7') == '=' &&
							$this->input->post('j_8') == '15' &&
							$this->input->post('j_9') == 'console.log' &&
							$this->input->post('j_10') == 'angkaKeSatu' &&
							$this->input->post('j_11') == '-' &&
							$this->input->post('j_12') == 'angkaKeDua'
						)
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,3)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'angkaKeSatu') $this->_pk('j_2');
						if ($this->input->post('j_3') != '=') $this->_pk('j_3');
						if ($this->input->post('j_4') != '50') $this->_pk('j_4');
						if (!in_array($j5, $p5)) $this->_pk('j_5');
						if ($this->input->post('j_6') != 'angkaKeDua') $this->_pk('j_6');
						if ($this->input->post('j_7') != '=') $this->_pk('j_7');
						if ($this->input->post('j_8') != '15') $this->_pk('j_8');
						if ($this->input->post('j_9') != 'console.log') $this->_pk('j_9');
						if ($this->input->post('j_10') != 'angkaKeSatu') $this->_pk('j_10');
						if ($this->input->post('j_11') != '-') $this->_pk('j_11');
						if ($this->input->post('j_12') != 'angkaKeDua') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					$j1 = $this->input->post('j_1');
					$j5 = $this->input->post('j_5');
					$j9 = $this->input->post('j_9');

					$p1 = ['var','let'];
					$p5 = ['var','let'];
					$p9 = ['var','let'];

					if (in_array($j1, $p1) &&
							$this->input->post('j_2') == 'angkaKeSatu' &&
							$this->input->post('j_3') == '=' &&
							$this->input->post('j_4') == '100' &&
							in_array($j5, $p5) &&
							$this->input->post('j_6') == 'angkaKeDua' &&
							$this->input->post('j_7') == '=' &&
							$this->input->post('j_8') == '4' &&
							in_array($j9, $p9) &&
							$this->input->post('j_10') == 'angkaKeTiga' &&
							$this->input->post('j_11') == '=' &&
							$this->input->post('j_12') == '25' &&
							$this->input->post('j_13') == 'console.log' &&
							$this->input->post('j_14') == 'angkaKeSatu' &&
							$this->input->post('j_15') == '/' &&
							$this->input->post('j_16') == 'angkaKeDua' &&
							$this->input->post('j_17') == '+' &&
							$this->input->post('j_18') == 'angkaKeTiga'
						)
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,4)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'angkaKeSatu') $this->_pk('j_2');
						if ($this->input->post('j_3') != '=') $this->_pk('j_3');
						if ($this->input->post('j_4') != '100') $this->_pk('j_4');
						if (!in_array($j5, $p5)) $this->_pk('j_5');
						if ($this->input->post('j_6') != 'angkaKeDua') $this->_pk('j_6');
						if ($this->input->post('j_7') != '=') $this->_pk('j_7');
						if ($this->input->post('j_8') != '4') $this->_pk('j_8');
						if (!in_array($j9, $p9)) $this->_pk('j_9');
						if ($this->input->post('j_10') != 'angkaKeTiga') $this->_pk('j_10');
						if ($this->input->post('j_11') != '=') $this->_pk('j_11');
						if ($this->input->post('j_12') != '25') $this->_pk('j_12');
						if ($this->input->post('j_13') != 'console.log') $this->_pk('j_13');
						if ($this->input->post('j_14') != 'angkaKeSatu') $this->_pk('j_14');
						if ($this->input->post('j_15') != '/') $this->_pk('j_15');
						if ($this->input->post('j_16') != 'angkaKeDua') $this->_pk('j_16');
						if ($this->input->post('j_17') != '+') $this->_pk('j_17');
						if ($this->input->post('j_18') != 'angkaKeTiga') $this->_pk('j_18');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					$j1 = $this->input->post('j_1');
					$j4 = $this->input->post('j_4');
					$j7 = str_replace(' * ','*',$this->input->post('j_7'));

					$p1 = ['var','let'];
					$p4 = ['var','let'];
					$p7 = ['console.log(floatSatu*floatDua)','console.log(floatDua*floatSatu)'];

					if (in_array($j1, $p1) &&
							$this->input->post('j_2') == 'floatSatu' &&
							$this->input->post('j_3') == '20.5' &&
							in_array($j4, $p4) &&
							$this->input->post('j_5') == 'floatDua' &&
							$this->input->post('j_6') == '50.5' &&
							in_array($j7, $p7)
						)
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,6)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'floatSatu') $this->_pk('j_2');
						if ($this->input->post('j_3') != '20.5') $this->_pk('j_3');
						if (!in_array($j4, $p4)) $this->_pk('j_4');
						if ($this->input->post('j_5') != 'floatDua') $this->_pk('j_5');
						if ($this->input->post('j_6') != '50.5') $this->_pk('j_6');
						if (!in_array($j7, $p7)) $this->_pk('j_7');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					$j1 = $this->input->post('j_1');
					$j3 = strtolower($this->input->post('j_3'));

					$p1 = ['var','let'];
					$p3 = ['"aku cinta indonesia"','"aku cinta indonesia."'];

					if (in_array($j1, $p1) && $this->input->post('j_2') == 'pesan' && in_array($j3, $p3) && $this->input->post('j_4') == 'console.log(pesan)')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,11)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'pesan') $this->_pk('j_2');
						if (!in_array($j3, $p3)) $this->_pk('j_3');
						if ($this->input->post('j_4') != 'console.log(pesan)') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					$j1 = $this->input->post('j_1');
					$j3 = strtolower($this->input->post('j_3'));

					$p1 = ['var','let'];
					$p3 = ['\'bogor kota indah sejuk nyaman\'','\'bogor kota indah sejuk nyaman.\''];

					if (in_array($j1, $p1) && $this->input->post('j_2') == 'pesan' && in_array($j3, $p3) && $this->input->post('j_4') == 'console.log(pesan)')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,12)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'pesan') $this->_pk('j_2');
						if (!in_array($j3, $p3)) $this->_pk('j_3');
						if ($this->input->post('j_4') != 'console.log(pesan)') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if ($this->input->post('j_1') == 'str1' && $this->input->post('j_2') == '+' && $this->input->post('j_3') == 'str2' && $this->input->post('j_4') == '+' && $this->input->post('j_5') == 'str3')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,13)]);

						if ($this->input->post('j_1') != 'str1') $this->_pk('j_1');
						if ($this->input->post('j_2') != '+') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'str2') $this->_pk('j_3');
						if ($this->input->post('j_4') != '+') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'str3') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					if (strtolower($this->input->post('j_1')) == 'not a number')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,19)]);

						if (strtolower($this->input->post('j_1')) != 'not a number') $this->_pk('j_1');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if ($this->input->post('j_1') == 'undefined')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,20)]);

						if ($this->input->post('j_1') != 'undefined') $this->_pk('j_1');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					if ($this->input->post('j_1') == 'null')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,21)]);

						if ($this->input->post('j_1') != 'null') $this->_pk('j_1');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if ($this->input->post('j_1') == 'makanan[1]' && $this->input->post('j_2') == 'minuman[3]' && $this->input->post('j_3') == 'makanan[4]' && $this->input->post('j_4') == 'minuman[0]')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,24)]);

						if ($this->input->post('j_1') != 'makanan[1]') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'minuman[3]') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'makanan[4]') $this->_pk('j_3');
						if ($this->input->post('j_4') != 'minuman[0]') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					$j1 = $this->input->post('j_1');
					$j3 = str_replace(' ','',strtolower($this->input->post('j_3')));

					$p1 = ['var','let'];
					$p3 = ['["apel","semangka","nanas"]',"['apel','semangka','nanas']"];

					if (in_array($j1, $p1) && $this->input->post('j_2') == 'buah' && in_array($j3, $p3) && $this->input->post('j_4') == 'console.log(buah[1])')
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/26'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,25)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'buah') $this->_pk('j_2');
						if (!in_array($j3, $p3)) $this->_pk('j_3');
						if ($this->input->post('j_4') != 'console.log(buah[1])') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(26))
				{
					if ($this->input->post('j_1') == '1' &&
							$this->input->post('j_2') == '3' &&
							$this->input->post('j_3') == '5' &&
							$this->input->post('j_4') == '10' &&
							$this->input->post('j_5') == '15' &&
							$this->input->post('j_6') == '20' &&
							$this->input->post('j_7') == '25' &&
							$this->input->post('j_8') == '50' &&
							$this->input->post('j_9') == '1' &&
							$this->input->post('j_10') == '7' &&
							$this->input->post('j_11') == '6' &&
							$this->input->post('j_12') == '2'
						)
					{
						$ls = site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/27'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(4,26);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'tipe data pada javascript', bagian '26'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',4,26)]);

						if ($this->input->post('j_1') != '1') $this->_pk('j_1');
						if ($this->input->post('j_2') != '3') $this->_pk('j_2');
						if ($this->input->post('j_3') != '5') $this->_pk('j_3');
						if ($this->input->post('j_4') != '10') $this->_pk('j_4');
						if ($this->input->post('j_5') != '15') $this->_pk('j_5');
						if ($this->input->post('j_6') != '20') $this->_pk('j_6');
						if ($this->input->post('j_7') != '25') $this->_pk('j_7');
						if ($this->input->post('j_8') != '50') $this->_pk('j_8');
						if ($this->input->post('j_9') != '1') $this->_pk('j_9');
						if ($this->input->post('j_10') != '7') $this->_pk('j_10');
						if ($this->input->post('j_11') != '6') $this->_pk('j_11');
						if ($this->input->post('j_12') != '2') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('function dan object pada javascript'))
			{
				if ($b == sha1(3))
				{
					$j4 = str_replace('hai, ','hai,',str_replace('selamat datang.','selamat datang',strtolower($this->input->post('j_4'))));

					$p4 = ['console.log("hai,selamat datang")', "console.log('hai,selamat datang')"];

					if ($this->input->post('j_1') == 'function' &&
							$this->input->post('j_2') == 'hai()' &&
							$this->input->post('j_3') == '{' &&
							in_array($j4,$p4) &&
							$this->input->post('j_5') == '}' &&
							$this->input->post('j_6') == 'hai()'
						)
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,3)]);

						if ($this->input->post('j_1') != 'function') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'hai()') $this->_pk('j_2');
						if ($this->input->post('j_3') != '{') $this->_pk('j_3');
						if (!in_array($j4,$p4)) $this->_pk('j_4');
						if ($this->input->post('j_5') != '}') $this->_pk('j_5');
						if ($this->input->post('j_6') != 'hai()') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j_1') == 'return' && $this->input->post('j_2') == 'hasil')
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,6)]);

						if ($this->input->post('j_1') != 'return') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'hasil') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if (($this->input->post('j_2',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL) && ($this->input->post('j_1',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_2',TRUE) !== NULL) && ($this->input->post('j_3',TRUE) === NULL && $this->input->post('j_4',TRUE) === NULL && $this->input->post('j_5',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					$j3 = strtolower($this->input->post('j_3'));
					$j4 = strtolower($this->input->post('j_4'));
					$j5 = strtolower($this->input->post('j_5'));
					$j6 = strtolower($this->input->post('j_6'));
					$j7 = strtolower($this->input->post('j_7'));
					$j8 = strtolower($this->input->post('j_8'));
					$j9 = strtolower($this->input->post('j_9'));
					$j10 = strtolower($this->input->post('j_10'));

					$p4 = ['"jonathan"', "'jonathan'"];
					$p6 = ['"xii"', "'xii'"];
					$p8 = ['"rekayasa perangkat lunak"', "'rekayasa perangkat lunak'"];
					$p10 = ['"20"', "'20'", '20'];

					if ($this->input->post('j_1') == 'murid' &&
							$this->input->post('j_2') == '{' &&
							$j3 == 'nama' && in_array($j4,$p4) &&
							$j5 == 'kelas' && in_array($j6,$p6) &&
							$j7 == 'jurusan' && in_array($j8,$p8) &&
							$j9 == 'angkatan' && in_array($j10,$p10) &&
							$this->input->post('j_11') == '}'
						)
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,10)]);

						if ($this->input->post('j_1') != 'murid') $this->_pk('j_1');
						if ($this->input->post('j_2') != '{') $this->_pk('j_2');
						if ($j3 != 'nama') $this->_pk('j_3');
						if (!in_array($j4,$p4)) $this->_pk('j_4');
						if ($j5 != 'kelas') $this->_pk('j_5');
						if (!in_array($j6,$p6)) $this->_pk('j_6');
						if ($j7 != 'jurusan') $this->_pk('j_7');
						if (!in_array($j8,$p8)) $this->_pk('j_8');
						if ($j9 != 'angkatan') $this->_pk('j_9');
						if (!in_array($j10,$p10)) $this->_pk('j_10');
						if ($this->input->post('j_11') != '}') $this->_pk('j_11');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					if ($this->input->post('j_1') == 'murid.nama' &&
							$this->input->post('j_2') == 'murid.jurusan' &&
							$this->input->post('j_3') == 'murid.kelas' &&
							$this->input->post('j_4') == 'murid.angkatan'
						)
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,11)]);

						if ($this->input->post('j_1') != 'murid.nama') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'murid.jurusan') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'murid.kelas') $this->_pk('j_3');
						if ($this->input->post('j_4') != 'murid.angkatan') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					$j4 = str_replace('sms.','sms',strtolower($this->input->post('j_4')));

					if ($this->input->post('j_1') == 'kirimSMS' &&
							$this->input->post('j_2') == 'function()' &&
							$this->input->post('j_3') == 'console.log' &&
							$j4 == 'berhasil mengirim sms'
						)
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,12)]);

						if ($this->input->post('j_1') != 'kirimSMS') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'function()') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'console.log') $this->_pk('j_3');
						if ($j4 != 'berhasil mengirim sms') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if ($this->input->post('j_1') == 'smartphone.kirimSMS()')
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,13)]);

						if ($this->input->post('j_1') != 'smartphone.kirimSMS()') $this->_pk('j_1');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j_1') == 'namaLengkap' &&
							$this->input->post('j_2') == 'function()' &&
							$this->input->post('j_3') == 'this.namaDepan' &&
							$this->input->post('j_4') == 'this.namaBelakang' &&
							$this->input->post('j_5') == 'orang.namaLengkap()'
						)
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,16)]);

						if ($this->input->post('j_1') != 'namaLengkap') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'function()') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'this.namaDepan') $this->_pk('j_3');
						if ($this->input->post('j_4') != 'this.namaBelakang') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'orang.namaLengkap()') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					if ($this->input->post('j_1') == 'this')
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,18)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if ($this->input->post('j_1') == 'hobi' &&
							$this->input->post('j_2') == 'namaLengkap' &&
							$this->input->post('j_3') == 'this.kelas' &&
							$this->input->post('j_4') == 'this.jurusan' &&
							$this->input->post('j_5') == 'this.hobi' &&
							$this->input->post('j_6') == 'this.namaLengkap' &&
							$this->input->post('j_7') == 'new' &&
							$this->input->post('j_8') == 'Murid' &&
							$this->input->post('j_9') == 'murid.perkenalanDiri()'
						)
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,20)]);

						if ($this->input->post('j_1') != 'hobi') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'namaLengkap') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'this.kelas') $this->_pk('j_3');
						if ($this->input->post('j_4') != 'this.jurusan') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'this.hobi') $this->_pk('j_5');
						if ($this->input->post('j_6') != 'this.namaLengkap') $this->_pk('j_6');
						if ($this->input->post('j_7') != 'new') $this->_pk('j_7');
						if ($this->input->post('j_8') != 'Murid') $this->_pk('j_8');
						if ($this->input->post('j_9') != 'murid.perkenalanDiri()') $this->_pk('j_9');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					if (strtolower($this->input->post('j_1')) == 'nama saya fauzan harun, saya kelas x jurusan perkantoran dan hobi saya adalah berpetualang')
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if ($this->input->post('j_1') == 'kendaraan.namaKendaraan' &&
							strtolower($this->input->post('j_2')) == 'mobil' &&
							$this->input->post('j_3') == 'kendaraan.jumlahRoda' &&
							$this->input->post('j_4') == '4' &&
							$this->input->post('j_5') == 'kendaraan.warna' &&
							strtolower($this->input->post('j_6')) == 'ungu'
						)
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,22)]);

						if ($this->input->post('j_1') != 'kendaraan.namaKendaraan') $this->_pk('j_1');
						if (strtolower($this->input->post('j_2')) != 'mobil') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'kendaraan.jumlahRoda') $this->_pk('j_3');
						if ($this->input->post('j_4') != '4') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'kendaraan.warna') $this->_pk('j_5');
						if (strtolower($this->input->post('j_5')) != 'ungu') $this->_pk('j_6');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if ($this->input->post('j') == sha1(4))
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,23)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if ($this->input->post('j') == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(5,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',5,24)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('kondisi dan perulangan pada javascript'))
			{
				if ($b == sha1(4))
				{
					if ($this->input->post('j',TRUE) == sha1(1))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j',TRUE) == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j_1') == 'makananKesukaan' &&
							$this->input->post('j_2') == 'if' &&
							$this->input->post('j_3') == '{' &&
							$this->input->post('j_4') == '}' &&
							$this->input->post('j_5') == 'else if' &&
							$this->input->post('j_6') == 'makananKesukaan' &&
							$this->input->post('j_7') == 'pizza' &&
							$this->input->post('j_8') == '{' &&
							$this->input->post('j_9') == '}' &&
							$this->input->post('j_10') == 'else' &&
							$this->input->post('j_11') == '{' &&
							$this->input->post('j_12') == '}'
						)
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,7)]);

						if ($this->input->post('j_1') != 'makananKesukaan') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'if') $this->_pk('j_2');
						if ($this->input->post('j_3') != '{') $this->_pk('j_3');
						if ($this->input->post('j_4') != '}') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'else if') $this->_pk('j_5');
						if ($this->input->post('j_6') != 'makananKesukaan') $this->_pk('j_6');
						if ($this->input->post('j_7') != 'pizza') $this->_pk('j_7');
						if ($this->input->post('j_8') != '{') $this->_pk('j_8');
						if ($this->input->post('j_9') != '}') $this->_pk('j_9');
						if ($this->input->post('j_10') != 'else') $this->_pk('j_10');
						if ($this->input->post('j_11') != '{') $this->_pk('j_11');
						if ($this->input->post('j_12') != '}') $this->_pk('j_12');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if ($this->input->post('j_1') == 'switch' &&
							$this->input->post('j_2') == 'hobi' &&
							$this->input->post('j_3') == '{' &&
							$this->input->post('j_4') == 'case' &&
							$this->input->post('j_5') == 'break;' &&
							$this->input->post('j_6') == 'break;' &&
							$this->input->post('j_7') == 'default:' &&
							$this->input->post('j_8') == '}'
						)
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,8)]);

						if ($this->input->post('j_1') != 'switch') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'hobi') $this->_pk('j_2');
						if ($this->input->post('j_3') != '{') $this->_pk('j_3');
						if ($this->input->post('j_4') != 'case') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'break;') $this->_pk('j_5');
						if ($this->input->post('j_6') != 'break;') $this->_pk('j_6');
						if ($this->input->post('j_7') != 'default:') $this->_pk('j_7');
						if ($this->input->post('j_8') != '}') $this->_pk('j_8');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if ($this->input->post('j',TRUE) == sha1(5))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(11))
				{
					if (($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_3',TRUE) === NULL && $this->input->post('j_6',TRUE) === NULL && $this->input->post('j_7',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/12'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,11);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '11'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,11)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (($this->input->post('j_3',TRUE) === NULL && $this->input->post('j_6',TRUE) === NULL && $this->input->post('j_7',TRUE) === NULL && $this->input->post('j_10',TRUE) === NULL && $this->input->post('j_12',TRUE) === NULL) && ($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL && $this->input->post('j_8',TRUE) !== NULL && $this->input->post('j_9',TRUE) !== NULL && $this->input->post('j_11',TRUE) !== NULL))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if (580 < $this->input->post('j_1') && $this->input->post('j_2') == '<')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,13)]);

						if (!(580 < $this->input->post('j_1'))) $this->_pk('j_1');
						if ($this->input->post('j_2') != '<') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					if (135 <= $this->input->post('j_1') && $this->input->post('j_2') == '<=')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,14)]);

						if (!(135 <= $this->input->post('j_1'))) $this->_pk('j_1');
						if ($this->input->post('j_2') != '<=') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if (375 > $this->input->post('j_1') && $this->input->post('j_2') == '>')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,15)]);

						if (!(375 > $this->input->post('j_1'))) $this->_pk('j_1');
						if ($this->input->post('j_2') != '>') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if (200 >= $this->input->post('j_1') && $this->input->post('j_2') == '>=')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,16)]);

						if (!(200 >= $this->input->post('j_1'))) $this->_pk('j_1');
						if ($this->input->post('j_2') != '>=') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					$j2 = str_replace('===', '==', $this->input->post('j_2'));

					if ('Always Ngoding' == $this->input->post('j_1') && $j2 == '==')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,17)]);

						if (!('Always Ngoding' == $this->input->post('j_1'))) $this->_pk('j_1');
						if ($j2 != '==') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					$j1 = str_replace('!==', '!=', $this->input->post('j_1'));

					if ($j1 == '!=')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,18)]);

						if ($j1 != '!=') $this->_pk('j_1');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					if ($this->input->post('j_1') == 'for' &&
							$this->input->post('j_2') == 'i' &&
							$this->input->post('j_3') == '<=' &&
							$this->input->post('j_4') == '20' &&
							$this->input->post('j_5') == 'i')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,21)]);

						if ($this->input->post('j_1') != 'for') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'i') $this->_pk('j_2');
						if ($this->input->post('j_3') != '<=') $this->_pk('j_3');
						if ($this->input->post('j_4') != '20') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'i') $this->_pk('j_5');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if ($this->input->post('j',TRUE) == sha1(4))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,24)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					if ($this->input->post('j',TRUE) == sha1(2))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/26'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,25)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(27))
				{
					if (strtolower($this->input->post('j_1')) == 'counted loop')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/28'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,27);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '27'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,27)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(28))
				{
					if (strtolower($this->input->post('j_1')) == 'foreach')
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/29'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,28);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'function dan object pada javascript', bagian '28'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,27)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(29))
				{
					$j = explode(',',$this->input->post('arrRangkaian',TRUE));

					if ($j[0] == sha1(5) && $j[1] == sha1(3) && $j[2] == sha1(8) && $j[3] == sha1(2) && $j[4] == sha1(7) && $j[5] == sha1(4) && $j[6] == sha1(6) && $j[7] == sha1(1))
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/30'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,29);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '29'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('php',4,29)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(31))
				{
					$j4 = str_replace(' ','',$this->input->post('j_4',FALSE));
					$j10 = $this->input->post('j_10',TRUE);

					if ($this->input->post('j_1',TRUE) == 'for' && $this->input->post('j_2',FALSE) == '<=' &&
							$this->input->post('j_3',TRUE) == '100' && ($j4 == 'i++' || $j4 == 'i+=1') &&
							$this->input->post('j_5',TRUE) == 'if' && $this->input->post('j_6',TRUE) == '13' &&
							$this->input->post('j_7',FALSE) == '||' && $this->input->post('j_8',FALSE) == 'i' &&
							$this->input->post('j_9',FALSE) == 'continue;' && ($j10 == 'else if') &&
							$this->input->post('j_11',TRUE) == '95' && $this->input->post('j_12',FALSE) == 'break;' &&
							$this->input->post('j_13',TRUE) == 'else'
						)
					{
						$ls = site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/32'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(6,31);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'kondisi dan perulangan pada javascript', bagian '31'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',6,31)]);

						if ($this->input->post('j_1',TRUE) != 'for') $this->_pk('j_1');
						if ($this->input->post('j_2',FALSE) != '<=') $this->_pk('j_2');
						if ($this->input->post('j_3',TRUE) != '100') $this->_pk('j_3');
						if (!($j4 == 'i++' || $j4 == 'i+=1')) $this->_pk('j_4');
						if ($this->input->post('j_5',TRUE) != 'if') $this->_pk('j_5');
						if ($this->input->post('j_6',TRUE) != '13') $this->_pk('j_6');
						if ($this->input->post('j_7',FALSE) != '||') $this->_pk('j_7');
						if ($this->input->post('j_8',FALSE) != 'i') $this->_pk('j_8');
						if ($this->input->post('j_9',FALSE) != 'continue;') $this->_pk('j_9');
						if (!($j10 == 'else if')) $this->_pk('j_10');
						if ($this->input->post('j_11',TRUE) != '95') $this->_pk('j_11');
						if ($this->input->post('j_12',FALSE) != 'break;') $this->_pk('j_12');
						if ($this->input->post('j_13',TRUE) != 'else') $this->_pk('j_13');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('lebih banyak tentang string di javascript'))
			{
				if ($b == sha1(4))
				{
					if ($this->input->post('j_1') == '`' && $this->input->post('j_2') == '${hobi}' && $this->input->post('j_3') == '`')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,4)]);

						if ($this->input->post('j_1') != '`') $this->_pk('j_1');
						if ($this->input->post('j_2') != '${hobi}') $this->_pk('j_2');
						if ($this->input->post('j_3') != '`') $this->_pk('j_3');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j_1') == 'motivasi.length')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(8))
				{
					if ($this->input->post('j_1') == '13')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/9'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,8);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '8'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,8)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					if ($this->input->post('j_1') == '41')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,10)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if (str_replace(', ', ',', $this->input->post('j_1')) == 'kalimat.substr(8,11)')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,12)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if (str_replace(', ', ',', $this->input->post('j_1')) == 'kalimat.substring(23,37)')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if ($this->input->post('j_1') == 'kalimat.toLowerCase()' && $this->input->post('j_2') == 'kalimat.toUpperCase()')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,15)]);

						if ($this->input->post('j_1') != 'kalimat.toLowerCase()') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'kalimat.toUpperCase()') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					if (strtolower($this->input->post('j_1')) == 'halo nama saya saleh, salam kenal semuanya.')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if ($this->input->post('j', TRUE) == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(21))
				{
					if ($this->input->post('j', TRUE) == sha1(4))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/22'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,21);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '21'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,21)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if ($this->input->post('j', TRUE) == sha1(2))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,22)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if ($this->input->post('j', TRUE) == sha1(2))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,23)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if ($this->input->post('j', TRUE) == sha1(1))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,24)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					$j1 = strtolower($this->input->post('j_1'));

					if ($j1 == 'trim' || $j1 == 'trim()')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/26'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,25)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(27))
				{
					$j1 = str_replace(', ', ',', $this->input->post('j_1'));

					$p1 = [
						'kalimat.replace("malas","semangat")',
						'kalimat.replace("malas",\'semangat\')',
						'kalimat.replace(\'malas\',"semangat")',
						'kalimat.replace(\'malas\',\'semangat\')'
					];

					if (in_array($j1, $p1))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/28'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(7,27);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang string di javascript', bagian '27'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',7,27)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('lebih banyak tentang array dan object di javascript'))
			{
				if ($b == sha1(3))
				{
					$j2 = str_replace('Joy', 'joy', $this->input->post('j_2'));

					$p2 = [
						'mahasiswa.unshift("joy")',
						'mahasiswa.unshift(\'joy\')'
					];

					if ($this->input->post('j_1') == 'mahasiswa.shift()' && in_array($j2, $p2))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,3)]);

						if ($this->input->post('j_1') != 'mahasiswa.shift()') $this->_pk('j_1');
						if (!in_array($j2, $p2)) $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j_1') == 'unshift' || $this->input->post('j_1') == 'unshift()')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(6))
				{
					if ($this->input->post('j_1') == 'pop' || $this->input->post('j_1') == 'pop()')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/7'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,6);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '6'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,6)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					if ($this->input->post('j_1') == 'push' || $this->input->post('j_1') == 'push()')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,7)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(9))
				{
					if ($this->input->post('j_1') == 'makanan.concat(makananTambahan)')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/10'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,9);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '9'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,9)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					if ($this->input->post('j_1') == 'makanan.sort()' &&
							$this->input->post('j_2') == 'console.log(makanan)' &&
							$this->input->post('j_3') == 'makanan.reverse()' &&
							$this->input->post('j_4') == 'console.log(makanan)'
						)
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/13'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,12)]);

						if ($this->input->post('j_1') != 'makanan.sort()') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'console.log(makanan)') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'makanan.reverse()') $this->_pk('j_3');
						if ($this->input->post('j_4') != 'console.log(makanan)') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(15))
				{
					if ($this->input->post('j') == sha1(1))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/16'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,15);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '15'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,15)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j_1') == '2')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					$j1 = str_replace(', ', ',', $this->input->post('j_1'));

					if ($j1 == 'minuman.splice(0,6)' || $j1 == 'minuman.splice(-9,-3)')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,17)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(18))
				{
					$j1 = str_replace(', ', ',', $this->input->post('j_1'));
					$j1 = str_replace('Dedy', 'dedy', $j1);
					$j1 = str_replace('Dody', 'dody', $j1);

					$p1 = [
						'karyawan.splice(7,0,"dedy","dody")',
						'karyawan.splice(7,0,\'dedy\',"dody")',
						'karyawan.splice(7,0,"dedy",\'dody\')',
						'karyawan.splice(7,0,\'dedy\',\'dody\')'
					];

					if (in_array($j1, $p1))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/19'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,18);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '18'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,18)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(19))
				{
					if ($this->input->post('j') == sha1(1))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/20'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,19);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '19'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,19)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if ($this->input->post('j') == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if ($this->input->post('j_1') == '1')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,22)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(23))
				{
					if ($this->input->post('j_1') == '0')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/24'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,23);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '23'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,23)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(24))
				{
					if ($this->input->post('j_1') == '5')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/25'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,24);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '24'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,24)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					if ($this->input->post('j_1') == '-1')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/26'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,25)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(28))
				{
					if (strtolower($this->input->post('j_1')) == 'javascript object notation')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/29'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,28);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '28'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,28)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(29))
				{
					$j1 = strtolower($this->input->post('j_1'));
					$j2 = strtolower($this->input->post('j_2'));
					$j3 = strtolower($this->input->post('j_3'));
					$j4 = str_replace(', ', ',', strtolower($this->input->post('j_4')));
					$j5 = strtolower($this->input->post('j_5'));
					$j6 = strtolower($this->input->post('j_6'));
					$j7 = strtolower($this->input->post('j_7'));
					$j8 = strtolower($this->input->post('j_8'));
					$j9 = strtolower($this->input->post('j_9'));
					$j10 = strtolower($this->input->post('j_10'));
					$j11 = strtolower($this->input->post('j_11'));
					$j12 = str_replace(', ', ',', strtolower($this->input->post('j_12')));
					$j13 = strtolower($this->input->post('j_13'));
					$j14 = strtolower($this->input->post('j_14'));
					$j15 = strtolower($this->input->post('j_15'));
					$j16 = str_replace(', ', ',', strtolower($this->input->post('j_16')));
					$j17 = strtolower($this->input->post('j_17'));
					$j18 = strtolower($this->input->post('j_18'));

					if ($j1 == '{' &&
							$j2 == 'saleh' &&
							$j3 == '"alamat"' &&
							$j4 == '"bogor,indonesia"' &&
							$j5 == '"jabatan"' &&
							$j6 == '"ceo dan founder"' &&
							$j7 == '"hobi"' &&
							$j8 == '"membaca"' &&
							$j9 == '"karmila"' &&
							$j10 == '{' &&
							$j11 == '"alamat"' &&
							$j12 == '"jakarta,indonesia"' &&
							$j13 == '"jabatan"' &&
							$j14 == '"co-founder"' &&
							$j15 == '"hobi"' &&
							$j16 == '["masak","memanah"]' &&
							$j17 == '}' &&
							$j18 == '}'
						)
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/30'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(8,29);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang array dan object di javascript', bagian '29'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',8,29)]);

						if ($j1 != '{') $this->_pk('j_1');
						if ($j2 != 'saleh') $this->_pk('j_2');
						if ($j3 != '"alamat"') $this->_pk('j_3');
						if ($j4 != '"bogor,indonesia"') $this->_pk('j_4');
						if ($j5 != '"jabatan"') $this->_pk('j_5');
						if ($j6 != '"ceo dan founder"') $this->_pk('j_6');
						if ($j7 != '"hobi"') $this->_pk('j_7');
						if ($j8 != '"membaca"') $this->_pk('j_8');
						if ($j9 != '"karmila"') $this->_pk('j_9');
						if ($j10 != '{') $this->_pk('j_10');
						if ($j11 != '"alamat"') $this->_pk('j_11');
						if ($j12 != '"jakarta,indonesia"') $this->_pk('j_12');
						if ($j13 != '"jabatan"') $this->_pk('j_13');
						if ($j14 != '"co-founder"') $this->_pk('j_14');
						if ($j15 != '"hobi"') $this->_pk('j_15');
						if ($j16 != '["masak","memanah"]') $this->_pk('j_16');
						if ($j17 != '}') $this->_pk('j_17');
						if ($j18 != '}') $this->_pk('j_18');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
			elseif ($m == sha1('lebih banyak tentang javascript'))
			{
				if ($b == sha1(2))
				{
					$j1 = $this->input->post('j_1');
					$j2 = $this->input->post('j_2');
					$j3 = $this->input->post('j_3');

					if (($j1 == 'var' && $j2 == 'let' && $j3 == 'const') || ($j1 == 'var' && $j2 == 'const' && $j3 == 'let') || ($j1 == 'let' && $j2 == 'const' && $j3 == 'var') || ($j1 == 'let' && $j2 == 'var' && $j3 == 'const') || ($j1 == 'const' && $j2 == 'var' && $j3 == 'let') || ($j1 == 'const' && $j2 == 'let' && $j3 == 'var'))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/3'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,2);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '2'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,2)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(3))
				{
					if ($this->input->post('j') == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/4'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,3);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '3'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,3)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(4))
				{
					if ($this->input->post('j_1') == '50')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/5'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,4);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '4'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,4)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(5))
				{
					if ($this->input->post('j_1') == '2750')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/6'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,5);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '5'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,5)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(7))
				{
					$j8 = $this->input->post('j_8');

					$p8 = ["tanggalDanWaktu.getYear()", "tanggalDanWaktu.getFullYear()"];

					if ($this->input->post('j_1') == 'tanggalDanWaktu' &&
							$this->input->post('j_2') == 'new' &&
							$this->input->post('j_3') == 'Date()' &&
							$this->input->post('j_4') == 'tanggalDanWaktu.getMinutes()' &&
							$this->input->post('j_5') == 'tanggalDanWaktu.getHours()' &&
							$this->input->post('j_6') == 'tanggalDanWaktu.getDate()' &&
							$this->input->post('j_7') == 'tanggalDanWaktu.getMonth()' &&
							in_array($j8, $p8) &&
							$this->input->post('j_9') == 'tanggal' &&
							$this->input->post('j_10') == 'bulan' &&
							$this->input->post('j_11') == 'tahun' &&
							$this->input->post('j_12') == 'jam' &&
							$this->input->post('j_13') == 'menit' &&
							$this->input->post('j_14') == 'detik'
						)
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/8'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,7);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '7'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,7)]);

						if ($this->input->post('j_1') != 'tanggalDanWaktu') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'new') $this->_pk('j_2');
						if ($this->input->post('j_3') != 'Date()') $this->_pk('j_3');
						if ($this->input->post('j_4') != 'tanggalDanWaktu.getMinutes()') $this->_pk('j_4');
						if ($this->input->post('j_5') != 'tanggalDanWaktu.getHours()') $this->_pk('j_5');
						if ($this->input->post('j_6') != 'tanggalDanWaktu.getDate()') $this->_pk('j_6');
						if ($this->input->post('j_7') != 'tanggalDanWaktu.getMonth()') $this->_pk('j_7');
						if (!in_array($j8, $p8)) $this->_pk('j_8');
						if ($this->input->post('j_9') != 'tanggal') $this->_pk('j_9');
						if ($this->input->post('j_10') != 'bulan') $this->_pk('j_10');
						if ($this->input->post('j_11') != 'tahun') $this->_pk('j_11');
						if ($this->input->post('j_12') != 'jam') $this->_pk('j_12');
						if ($this->input->post('j_13') != 'menit') $this->_pk('j_13');
						if ($this->input->post('j_14') != 'detik') $this->_pk('j_14');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(10))
				{
					$j2 = str_replace('() =>', '()=>', $this->input->post('j_2'));

					if ($this->input->post('j_1') == 'lirikLaguFirstLove' && $j2 == '()=>' && $this->input->post('j_3') == '{' && $this->input->post('j_4') == '}')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,10);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '10'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,10)]);

						if ($this->input->post('j_1') != 'tanggalDanWaktu') $this->_pk('j_1');
						if ($j2 != '()=>') $this->_pk('j_2');
						if ($this->input->post('j_3') != '{') $this->_pk('j_3');
						if ($this->input->post('j_4') != '}') $this->_pk('j_4');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(12))
				{
					$j1 = str_replace(', ', ',', $this->input->post('j_1'));

					if ($j1 == '{nama,jurusan,kelas}' && $this->input->post('j_2') == 'murid')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/11'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,12);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '12'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,12)]);

						if ($j1 != '{nama,jurusan,kelas}') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'murid') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(13))
				{
					if ($this->input->post('j_1') == '6, 5, 4, 3, 2, 1')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/14'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,13);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '13'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,13)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(14))
				{
					$j1 = str_replace(', ', ',', $this->input->post('j_1'));
					$j1 = str_replace(' :', ':', $j1);
					$j1 = str_replace(': ', ':', $j1);

					if ($j1 == '{nama,jurusan,kelas,sosmed:{facebook,instagram},riwayatPendidikan:{sd,smp},angkatan}' && $this->input->post('j_2') == 'murid')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/15'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,14);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '14'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,14)]);

						if ($j1 != '{nama,jurusan,kelas,sosmed:{facebook,instagram},riwayatPendidikan:{sd,smp},angkatan}') $this->_pk('j_1');
						if ($this->input->post('j_2') != 'murid') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(16))
				{
					if ($this->input->post('j_1') == '[...angka]')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/17'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,16);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '16'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,16)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(17))
				{
					$j1 = str_replace(', ', ',', $this->input->post('j_1'));
					$j1 = str_replace('[ ', '[', $j1);
					$j1 = str_replace(' ]', ']', $j1);

					$p1 = [
						"[...angkaGenap,...angkaGanjil]",
						"[...angkaGanjil,...angkaGenap]"
					];

					if (in_array($j1, $p1) && $this->input->post('j_2') == 'angka.sort()')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/18'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,17);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '17'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,17)]);

						if (!in_array($j1, $p1)) $this->_pk('j_1');
						if ($this->input->post('j_2') != 'angka.sort()') $this->_pk('j_2');

						if (!empty($this->kesalahan))
						{
							$this->respon = array_merge($this->respon, ['kesalahan' => $this->kesalahan]);
						}
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(20))
				{
					if ($this->input->post('j') == sha1(2))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/21'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,20);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '20'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,20)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(22))
				{
					if ($this->input->post('j_1') == '60')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/23'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,22);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '22'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,22)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(25))
				{
					if ($this->input->post('j') == sha1(2))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/26'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,25);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '25'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,25)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(26))
				{
					if ($this->input->post('j') == sha1(3))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/27'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,26);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '26'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,26)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(27))
				{
					if ($this->input->post('j') == sha1(2))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/28'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,27);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '27'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,27)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(28))
				{
					if ($this->input->post('j') == sha1(1))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/29'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,28);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '28'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,28)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(29))
				{
					if ($this->input->post('j_1') == '25')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/30'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,29);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '29'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,29)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(30))
				{
					if ($this->input->post('j_1') == 'Math.random' || $this->input->post('j_1') == 'Math.random()')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/31'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,30);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '30'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,30)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(33))
				{
					if ($this->input->post('j_1') == '...buku')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/34'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,33);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '33'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,33)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(35))
				{
					if (($this->input->post('j_1',TRUE) !== NULL && $this->input->post('j_3',TRUE) !== NULL && $this->input->post('j_4',TRUE) !== NULL && $this->input->post('j_5',TRUE) !== NULL && $this->input->post('j_6',TRUE) !== NULL && $this->input->post('j_8',TRUE) !== NULL) && ($this->input->post('j_2',TRUE) === NULL && $this->input->post('j_7',TRUE) === NULL && $this->input->post('j_9',TRUE) === NULL))
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/36'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,35);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '35'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,35)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
				elseif ($b == sha1(36))
				{
					if ($this->input->post('j_1') == 'tabungan anda: 1315000 rupiah' || $this->input->post('j_1') == 'tabungan anda: 1315000 rupiah.')
					{
						$ls = site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/37'); // Link Selanjutnya

						$this->respon = [
							's'  => TRUE,
							'ls' => "<a href='{$ls}' class='btn btn-sm btn-outline-secondary rounded-lg btn-ss animated fadeIn'>Selanjutnya</a>"
						];

						$this->_cek_pencapaian();
						$this->belajar->segarkan_bagian_teori_javascript(9,36);
						$this->campuran->tambah_riwayat('Y',"Berhasil menjawab soal teori, modul 'lebih banyak tentang javascript', bagian '36'.");
					}
					else
					{
						$this->respon = ['s' => FALSE];
						$this->respon = array_merge($this->respon, ['ss' => $this->belajar->jawaban_salah('javascript',9,36)]);
					}

					echo $this->_encode_dengan_token($this->respon);
				}
			}
		}
	}

	public function segarkan_bagian_teori_javascript()
	{
		$this->_akses_ajax();

		$m = $this->input->post('msalehscintakarmilasriwulan',TRUE); // Modul
		$b = $this->input->post('karmilasriwulancintamsalehs',TRUE); // Bagian

		if ($m != NULL && $b != NULL)
		{
			if ($m == 9 && $b == 38)
			{
				$this->_cek_sertifikat('JavaScript');
			}
			else
			{
				$this->_cek_pencapaian();
			}

			if ($this->belajar->segarkan_bagian_teori_javascript($m,$b))
			{
				if ($m == 9 && $b == 38)
				{
					$this->ang->bot("{$this->session->ang_nama_pengguna} menyelesaikan kelas JavaScript di Always Ngoding.");
					$this->ang->kakd("{$this->session->ang_nama_pengguna} (".site_url("anggota/{$this->session->ang_nama_pengguna}").") menyelesaikan kelas JavaScript di Always Ngoding :partying_face:");
				}

			 	$pesan = ">> Berhasil menyegarkan... << >> {$m} << >> {$b} <<";
			}
			else
			{
				$pesan = ">> Tidak ada yang perlu disegarkan... << >> {$m} << >> {$b} <<";
			}

			echo $this->_encode_dengan_token(array_merge($this->respon, ['pesan' => $pesan]));
		}
		else
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	public function hasil_teori_javascript($modul,$bagian,$flag)
	{
		if ($modul == 1) $jumlah_bagian = 7;
		elseif ($modul == 2) $jumlah_bagian = 7;
		elseif ($modul == 3) $jumlah_bagian = 10;
		elseif ($modul == 4) $jumlah_bagian = 27;
		elseif ($modul == 5) $jumlah_bagian = 25;
		elseif ($modul == 6) $jumlah_bagian = 32;
		elseif ($modul == 7) $jumlah_bagian = 29;
		elseif ($modul == 8) $jumlah_bagian = 30;
		elseif ($modul == 9) $jumlah_bagian = 38;
		else show_404();

		if ($bagian > 0 && $bagian <= $jumlah_bagian)
		{
			if ($this->belajar->ambil_bagian_terakhir_teori_javascript($modul) > $bagian-1)
			{
				if (file_exists(APPPATH."views/belajar/javascript/hasil/{$modul}/{$bagian}-{$flag}.php"))
				{
					$this->load->view("belajar/javascript/hasil/{$modul}/{$bagian}-{$flag}");
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

	public function eksekusi_javascript()
	{
		echo $this->_encode_dengan_token($this->_glot_api("index.js", $this->input->post('konten', FALSE), "javascript"));
	}
}
