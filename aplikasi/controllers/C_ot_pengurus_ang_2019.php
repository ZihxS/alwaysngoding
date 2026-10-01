<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_ot_pengurus_ang_2019 extends CI_Controller
{
	private $respon;

	public function __construct()
	{
		parent::__construct();

		if ($_SERVER['CI_ENV'] != 'development') {
			if (strpos($_SERVER['HTTP_HOST'], 'mail.example.test') !== false) {
				header('location: https://example.test');
				exit;
			}
		}

		// cek sesi
		if ($this->session->has_userdata('ang_pengurus') && $this->uri->segment(2) !== "keluar") {
			redirect('area-pengurus');
		} elseif ($this->session->has_userdata('ang_anggota')) {
			redirect();
		}

		$this->ang->check_rate_limiter();
	}

	private function _ctoken_baru()
	{
		return ['ctoken' => $this->security->get_csrf_hash()];
	}

	private function _encode_dengan_token($data)
	{
		echo json_encode(array_merge($data, $this->_ctoken_baru()));
	}

	private function _akses_ajax()
	{
		if (!$this->input->post()) {
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.', 403, '403');
		}
	}

	public function masuk()
	{
		$this->load->library('recaptcha');
		$data = ['recaptcha' => $this->recaptcha->render()];
		$this->load->view('otentikasi/pengurus', $data);
	}

	public function proses_masuk()
	{
		$this->_akses_ajax();

		if (ang_integration_enabled('recaptcha')) {
			$this->form_validation->set_rules('g-recaptcha-response', 'captcha', 'callback_getResponseCaptcha');
		}

		if ($this->form_validation->run() === FALSE && ang_integration_enabled('recaptcha')) {
			$this->load->library('recaptcha');
			$this->respon = [
				'sukses' => FALSE,
				'pesan' => 'Silahkan validasi CAPTCHA terlebih dahulu.',
				'kode' => 4,
				'recaptcha' => $this->recaptcha->render()
			];
		} else {
			$nama_pengguna = $this->ang->ci($this->input->post('nama_pengguna', TRUE));
			if ($this->pengguna->cek_nama_pengguna($nama_pengguna) === 1) {
				if (password_verify($this->input->post('kata_sandi', TRUE), $this->pengguna->ambil_kata_sandi($nama_pengguna))) {
					$level = $this->pengguna->ambil_level($nama_pengguna);
					if ($level != 'anggota') {
						$this->session->set_userdata([
							'ang_pengurus' => TRUE,
							'ang_akses' => TRUE,
							'ang_level' => $level,
							'ang_nama_pengguna' => $nama_pengguna

						]);

						$this->respon = ['sukses' => TRUE, 'pesan' => 'Masuk berhasil.'];
					} else {
						$this->respon = ['sukses' => FALSE, 'pesan' => 'Maaf anda adalah anggota. Tempat masuk anda bukan disini.', 'kode' => 1];
					}
				} else {
					$this->load->library('recaptcha');
					$this->respon = [
						'sukses' => FALSE,
						'pesan' => 'Kata sandi yang anda masukkan salah.',
						'kode' => 2,
						'recaptcha' => $this->recaptcha->render()
					];
				}
			} else {
				$this->load->library('recaptcha');
				$this->respon = [
					'sukses' => FALSE,
					'pesan' => 'Nama pengguna tidak terdaftar di basis data.',
					'kode' => 3,
					'recaptcha' => $this->recaptcha->render()
				];
			}
		}
		$this->_encode_dengan_token($this->respon);
	}

	public function getResponseCaptcha($str)
	{
		$this->load->library('recaptcha');
		return $this->recaptcha->verifyResponse($str)['success'];
	}

	public function keluar()
	{
		if ($this->session->has_userdata('ang_akses') && $this->session->has_userdata('ang_pengurus')) {
			$this->session->sess_destroy();
			redirect('area-pengurus/masuk');
		} else {
			redirect();
		}
	}
}
