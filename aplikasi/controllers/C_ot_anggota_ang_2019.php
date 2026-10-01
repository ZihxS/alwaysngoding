<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class C_ot_anggota_ang_2019 extends CI_Controller
{
	private $respon;

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

		// cek sesi
		if ($this->session->has_userdata('ang_anggota') && $this->uri->segment(2) !== "keluar")
		{
			redirect("anggota/{$this->session->ang_nama_pengguna}");
		}
		elseif ($this->session->has_userdata('ang_pengurus'))
		{
			redirect('area-pengurus');
		}

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

	// * MAILER
	private function _kirim_email($tujuan,$subjek,$konten,$bcc = NULL)
	{
		if (!ang_integration_enabled('smtp')) return FALSE;

		$this->config->load('smtp', TRUE);
		$smtp = $this->config->item('smtp');

		if (!$smtp['enabled'])
		{
			return FALSE;
		}

		if ($smtp['host'] === '' || $smtp['port'] < 1 || $smtp['port'] > 65535
			|| !in_array($smtp['encryption'], ['', 'tls', 'ssl'], TRUE)
			|| !filter_var($smtp['from_address'], FILTER_VALIDATE_EMAIL)
			|| ($smtp['auth'] && ($smtp['username'] === '' || $smtp['password'] === '')))
		{
			return FALSE;
		}

		$m = new PHPMailer();

		$m->isSMTP();
		$m->Host        = $smtp['host'];
		$m->SMTPAuth    = $smtp['auth'];
		$m->Username    = $smtp['username'];
		$m->Password    = $smtp['password'];
		$m->SMTPSecure  = $smtp['encryption'];
		$m->SMTPAutoTLS = $smtp['encryption'] !== '';
		$m->Port        = $smtp['port'];

		$m->isHTML(true);
		$m->setFrom($smtp['from_address'], $smtp['from_name']);
		$m->addAddress($tujuan);

		if ($bcc != NULL)
		{
			$m->AddBCC($bcc);
		}

		$m->Subject = $subjek;
		$m->Body    = $konten;

		if (!$m->send())
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function daftar()
	{
		if (!ang_integration_enabled('smtp'))
		{
			show_error('Pendaftaran sedang tidak tersedia.', 503, 'Layanan tidak tersedia');
			return;
		}

		$this->load->library('recaptcha');

		$data = ['recaptcha' => $this->recaptcha->render()];

		$this->load->view('otentikasi/anggota/daftar', $data);
	}

	public function proses_daftar()
	{
		if (!ang_integration_enabled('smtp'))
		{
			$this->output->set_status_header(503);
			$this->_encode_dengan_token(['sukses' => FALSE, 'pesan' => 'Layanan email sedang tidak tersedia.']);
			return;
		}

		$this->_akses_ajax();

		$nama_pengguna = trim($this->ang->ci($this->input->post('nama_pengguna',TRUE)));
		$all_blacklist = ['semua','keluar','artikel','diskusi','pencapaian','sertifikat','anonim'];

		$this->load->library('recaptcha');

		if (in_array(strtolower($nama_pengguna), $all_blacklist))
		{
			$this->respon = [
				'sukses'    => FALSE,
				'pesan'     => "Nama pengguna yang anda masukkan tidak diperbolehkan, silahkan coba yang lain.",
				'recaptcha' => $this->recaptcha->render()
			];
		}
		else
		{
			if ($this->pengguna->cek_verifikasi($nama_pengguna))
			{
				$email_pengguna = $this->pengguna->ambil_email($nama_pengguna);

				$this->respon = [
					'sukses'    => FALSE,
					'pesan'     => "Akun sudah terdaftar tapi belum terverifikasi, silahkan cek email anda.\nEmail: {$email_pengguna}\nCatatan: Pastikan anda mengecek folder spam juga pada email anda.",
					'recaptcha' => $this->recaptcha->render()
				];
			}
			else
			{
				if (ang_integration_enabled('recaptcha')) {
					$this->form_validation->set_rules('g-recaptcha-response', 'captcha', 'callback_getResponseCaptcha');
					$this->form_validation->set_message('getResponseCaptcha', 'Silahkan validasi CAPTCHA terlebih dahulu.');
				}

				$this->form_validation->set_rules(
					[
						[
							'field'  => 'nama_pengguna',
							'label'  => 'Nama Pengguna',
							'rules'  => 'required|trim|min_length[3]|max_length[50]|is_unique[pengguna.nama_pengguna]|alpha_numeric',
							'errors' => [
								'required'      => '{field} wajib di isi.',
								'min_length'    => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length'    => 'Panjang {field} tidak boleh melebihi {param}.',
								'is_unique'     => '{field} sudah terdaftar.',
								'alpha_numeric' => '{field} hanya bisa diisi dengan huruf dan angka.'
			      	]
						],
						[
							'field'  => 'nama_lengkap',
							'label'  => 'Nama Lengkap',
							'rules'  => 'required|trim|min_length[3]|max_length[50]',
							'errors' => [
								'required'      => '{field} wajib di isi.',
								'min_length'    => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length'    => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'email',
							'label'  => 'Email',
							'rules'  => 'required|trim|min_length[3]|max_length[100]|is_unique[pengguna.email]|valid_email',
							'errors' => [
								'required'    => '{field} wajib di isi.',
								'min_length'  => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length'  => 'Panjang {field} tidak boleh melebihi {param}.',
								'is_unique'   => '{field} sudah terdaftar.',
								'valid_email' => '{field} tidak valid.'
			      	]
						],
						[
							'field'  => 'kata_sandi',
							'label'  => 'Kata Sandi',
							'rules'  => 'required|trim',
							'errors' => ['required' => '{field} wajib di isi.']
						],
						[
							'field'  => 'konfirmasi_kata_sandi',
							'label'  => 'Konfirmasi Kata Sandi',
							'rules'  => 'required|trim|matches[kata_sandi]',
							'errors' => [
								'required' => '{field} wajib di isi.',
								'matches'  => 'Kata sandi yang anda masukkan tidak selaras'
							]
						]
					]
				);

				if ($this->form_validation->run() === FALSE)
				{
					$this->form_validation->set_error_delimiters('', '');

					$this->respon = [
						'sukses'    => FALSE,
						'pesan'     => validation_errors(),
						'recaptcha' => $this->recaptcha->render()
					];
				}
				else
				{
					$data_pengguna = [
						'nama_pengguna'     => $nama_pengguna,
						'nama_lengkap'      => $this->ang->ci($this->input->post('nama_lengkap',TRUE)),
						'email'             => $this->ang->ci($this->input->post('email',TRUE)),
						'kata_sandi'        => password_hash($this->input->post('kata_sandi',TRUE),PASSWORD_BCRYPT,['cost' => 13]),
						'level'             => 'anggota',
						'aktif'             => 'Y',
						'tanggal_bergabung' => date('Y-m-d')
					];

          // SEMEMTARA (SAAT MAILER ERROR)
          // $data_pengguna = array_merge($data_pengguna, ['tanggal_terverifikasi' => date('Y-m-d')]);
          // $this->db->insert('pengguna',$data_pengguna);
          // $this->campuran->tambah_riwayat('N',"{$nama_pengguna} berhasil daftar dan masuk ke tahap untuk verifikasi akun (sementara: auto terverifikasi).");
          // $this->respon = ['sukses' => TRUE,'pesan' => 'Daftar berhasil, silahkan masuk untuk mulai beraktifitas.'];
          // SEMEMTARA (SAAT MAILER ERROR)

					$token = $this->ang->bikin_token();
					$vLink = site_url("daftar/verifikasi/{$token}/{$nama_pengguna}");
					$pesan = <<<PESAN
						<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color: rgba(220, 53, 69, .85);margin:0;padding:0;width:100%;">
							<tbody>
								<tr>
									<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
										<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0;padding:0;width:100%">
											<tbody>
												<tr>
													<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';padding:25px 0;text-align:center">
														<a href="https://example.test" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color: white;font-size:30px;font-weight:bold;text-decoration:none;display:inline-block;" target="_blank">ALWAYS NGODING
														</a>
													</td>
												</tr>
												<tr>
													<td width="100%" cellpadding="0" cellspacing="0" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color: transparent;border-bottom: #dc3545;border-top: #dc3545;margin:0;padding:0;padding-left:15px;padding-right:15px;width:100%;">
														<table class="m_7038930368390449249inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-color:#e8e5ef;border-radius:20px;border-width:1px;margin:0 auto;padding:0;width:100%;max-width:570px">
															<tbody>
																<tr>
																	<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
																		<h1 style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:18px;margin-bottom: 15px;font-weight:bold;margin-top:0;text-align:left">Selamat datang {$nama_pengguna} di Always Ngoding,
																		</h1>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;margin-bottom: 5px;text-align:left">
																			Terima kasih atas kemauan/ketertarikan anda untuk bergabung dan juga belajar di Always Ngoding.
																		</p>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
																			Untuk langkah selanjutnya silahkan klik tombol di bawah untuk memverifikasi akun anda.
																		</p>
																		<table align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:30px auto;padding:0;text-align:center;width:100%">
																			<tbody>
																				<tr>
																					<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																						<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																							<tbody>
																								<tr>
																									<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																										<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																											<tbody>
																												<tr>
																													<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																														<a href="{$vLink}" class="m_7038930368390449249button" rel="noopener" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-radius:10px;color:#fff;display:inline-block;overflow:hidden;text-decoration:none;background-color: #dc3545;border-bottom: 8px solid #dc3545;border-left: 18px solid #dc3545;border-right: 18px solid #dc3545;border-top: 8px solid #dc3545;" target="_blank">
																															Verifikasi Akun Always Ngoding
																														</a>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">Regards,
																			<br>Tim Always Ngoding
																		</p>
																		<hr>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:13px;line-height:1.5em;margin-top:10px;margin-bottom:0;text-align:left"><a href="https://wa.me/6289635600051">Hubungi Kami</a> · <a href="https://example.test/donasi">Donasi Untuk Kami</a> · <a href="https://example.test/partner">Partner Kami</a>
																		</p>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
												<tr>
													<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
														<table class="m_7038930368390449249footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0 auto;padding:0;text-align:center;width:100%;max-width:570px">
															<tbody>
																<tr>
																	<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;color: white;font-size:12px;text-align:center;">© 2021 Muhammad Saleh Solahudin. All rights reserved.
																		</p>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					PESAN;

					if ($this->_kirim_email($data_pengguna['email'], "Verifikasi akun anda untuk menjadi anggota aktif Always Ngoding", $pesan))
					{
						$data = [
							'pengguna'           => $nama_pengguna,
							'token'              => $token,
							'tanggal_kadaluarsa' => date('Y-m-d', strtotime('tomorrow'))
						];

						$this->db->insert('pengguna',$data_pengguna);
						$this->db->insert('verif_akun',$data);
						$this->campuran->tambah_riwayat('N',"{$nama_pengguna} berhasil daftar dan masuk ke tahap untuk verifikasi akun.");
						$this->respon = ['sukses' => TRUE,'pesan' => 'Daftar berhasil, silahkan cek email anda untuk memverifikasi dan mengaktifkan akun anda (email akan masuk paling lama 5 menit).'];
					}
					else
					{
						$this->respon = [
							'sukses'    => FALSE,
							'pesan'     => 'Proses gagal, silahkan hubungi tim Always Ngoding.',
							'recaptcha' => $this->recaptcha->render()
						];
					}
				}
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function masuk()
	{
		$this->load->library('recaptcha');

		$data = ['recaptcha' => $this->recaptcha->render()];

		$this->load->view('otentikasi/anggota/masuk', $data);
	}

	public function proses_masuk()
	{
		$this->_akses_ajax();

		if (ang_integration_enabled('recaptcha')) {
			$this->form_validation->set_rules('g-recaptcha-response', 'captcha', 'callback_getResponseCaptcha');
		}

		if ($this->form_validation->run() === FALSE && ang_integration_enabled('recaptcha'))
		{
			$this->load->library('recaptcha');

			$this->respon = [
				'sukses'    => FALSE,
				'pesan'     => 'Silahkan validasi CAPTCHA terlebih dahulu.',
				'kode'      => 4,
				'recaptcha' => $this->recaptcha->render()
			];
		}
		else
		{
			$nama_pengguna = $this->ang->ci($this->input->post('nama_pengguna',TRUE));

			if ($this->pengguna->cek_nama_pengguna($nama_pengguna) === 1)
			{
				if (password_verify($this->input->post('kata_sandi',TRUE),$this->pengguna->ambil_kata_sandi($nama_pengguna)))
				{
					if ($this->pengguna->cek_verifikasi_untuk_masuk($nama_pengguna))
					{
						$pengguna = $this->pengguna->ambil($nama_pengguna);
						$level = $pengguna->level;

						if ($level == 'anggota')
						{
							$now = date('Y-m-d H:i:s');

							$this->session->set_userdata([
								'ang_anggota'              => TRUE,
								'ang_akses'                => TRUE,
								'ang_nama_pengguna'        => $nama_pengguna,
								'terakhir_ubah_kata_sandi' => $pengguna->terakhir_ubah_kata_sandi,
								'terakhir_masuk'           => $pengguna->terakhir_masuk
							]);

							$this->db->update('pengguna', ['terakhir_masuk' => $now], ['nama_pengguna' => $nama_pengguna]);

							$this->respon = ['sukses' => TRUE,'pesan' => 'Masuk berhasil.'];
						}
						else
						{
							$this->respon = ['sukses' => FALSE,'pesan' => 'Maaf anda adalah pengurus. Tempat masuk anda bukan disini.','kode' => 1];
						}
					}
					else
					{
						$this->respon = ['sukses' => FALSE,'pesan' => "Maaf akun anda belum terverifikasi, silahkan cek email anda untuk memverifikasi akun anda.\nEmail: {$this->pengguna->ambil_email($nama_pengguna)}\nCatatan: Pastikan anda mengecek folder spam juga pada email anda.",'kode' => 1];
					}
				}
				else
				{
					$this->load->library('recaptcha');

					$this->respon = [
						'sukses'    => FALSE,
						'pesan'     => 'Kata sandi yang anda masukkan salah.',
						'kode'      => 2,
						'recaptcha' => $this->recaptcha->render()
					];
				}
			}
			else
			{
				$this->load->library('recaptcha');

				$this->respon = [
					'sukses'    => FALSE,
					'pesan'     => 'Nama pengguna tidak terdaftar di basis data.',
					'kode'      => 3,
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

	public function lks()
	{
		if (!ang_integration_enabled('smtp'))
		{
			show_error('Reset kata sandi lewat email sedang tidak tersedia.', 503, 'Layanan tidak tersedia');
			return;
		}

		$this->load->library('recaptcha');

		$data = ['recaptcha' => $this->recaptcha->render()];

		$this->load->view('otentikasi/anggota/lks', $data);
	}

	public function kirim_kode_lks()
	{
		if (!ang_integration_enabled('smtp'))
		{
			$this->output->set_status_header(503);
			$this->_encode_dengan_token(['sukses' => FALSE, 'pesan' => 'Layanan email sedang tidak tersedia.']);
			return;
		}

		$this->_akses_ajax();

		if (ang_integration_enabled('recaptcha')) {
			$this->form_validation->set_rules('g-recaptcha-response', 'captcha', 'callback_getResponseCaptcha');
			$this->form_validation->set_message('getResponseCaptcha', 'Silahkan validasi CAPTCHA terlebih dahulu.');
		}

		$this->load->library('recaptcha');

		if ($this->form_validation->run() === FALSE && ang_integration_enabled('recaptcha'))
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = [
				'sukses'    => FALSE,
				'pesan'     => validation_errors(),
				'recaptcha' => $this->recaptcha->render()
			];
		}
		else
		{
			$email = $this->ang->ci($this->input->post('email',TRUE));

			if ($this->pengguna->cek_ketersediaan_email($email))
			{
				$akun = $this->pengguna->ambil_nama_pengguna_dari_email($email);

				if ($this->pengguna->cek_verifikasi_untuk_masuk($akun))
				{
					if ($this->token_lks->cek_token_by_pengguna($akun) > 0) {
						$this->respon = ['sukses' => TRUE,'pesan' => 'Kami telah mengirim email kepada anda, silahkan cek email anda untuk langkah selanjutnya (email akan masuk paling lama 5 menit).'];
						$this->_encode_dengan_token($this->respon);
						return;
					}

          // SEMENTARA (SAAT MAILER ERROR)
          // $this->respon = [
          //   'sukses'    => FALSE,
          //   'pesan'     => 'Saat ini sedang ada gangguan, silahkan email ke m.saleh.solahudin@gmail.com untuk meminta request lupa password, terima kasih.',
          //   'recaptcha' => $this->recaptcha->render()
          // ];
          // SEMENTARA (SAAT MAILER ERROR)

					$token = $this->ang->bikin_token();
					$cLink = site_url("lupa-kata-sandi/ganti-kata-sandi/{$token}");
					$pesan = <<<PESAN
						<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color: rgba(220, 53, 69, .85);margin:0;padding:0;width:100%;">
							<tbody>
								<tr>
									<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
										<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0;padding:0;width:100%">
											<tbody>
												<tr>
													<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';padding:25px 0;text-align:center">
														<a href="https://example.test" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color: white;font-size:30px;font-weight:bold;text-decoration:none;display:inline-block;" target="_blank">Always Ngoding
														</a>
													</td>
												</tr>
												<tr>
													<td width="100%" cellpadding="0" cellspacing="0" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color: transparent;border-bottom: #dc3545;border-top: #dc3545;margin:0;padding:0;padding-left:15px;padding-right:15px;width:100%;">
														<table class="m_7038930368390449249inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-color:#e8e5ef;border-radius:20px;border-width:1px;margin:0 auto;padding:0;width:100%;max-width:570px">
															<tbody>
																<tr>
																	<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
																		<h1 style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:18px;margin-bottom: 15px;font-weight:bold;margin-top:0;text-align:left">Hai {$akun},
																		</h1>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;margin-bottom: 5px;text-align:left">
																			Anda mengirimkan request atau perintah untuk mengubah Kata Sandi akun Always Ngoding anda.
																		</p>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
																			Untuk langkah selanjutnya silahkan klik tombol di bawah untuk mengubah kata sandi akun Always Ngoding Anda.
																		</p>
																		<table align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:30px auto;padding:0;text-align:center;width:100%">
																			<tbody>
																				<tr>
																					<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																						<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																							<tbody>
																								<tr>
																									<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																										<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																											<tbody>
																												<tr>
																													<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
																														<a href="{$cLink}" class="m_7038930368390449249button" rel="noopener" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-radius:10px;color:#fff;display:inline-block;overflow:hidden;text-decoration:none;background-color: #dc3545;border-bottom: 8px solid #dc3545;border-left: 18px solid #dc3545;border-right: 18px solid #dc3545;border-top: 8px solid #dc3545;" target="_blank">Ubah Kata Sandi
																														</a>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">Regards,
																			<br>Tim Always Ngoding
																		</p>
																		<hr>
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:13px;line-height:1.5em;margin-top:10px;margin-bottom:0;text-align:left"><a href="https://wa.me/6289635600051">Hubungi Kami</a> · <a href="https://example.test/donasi">Donasi Untuk Kami</a> · <a href="https://example.test/partner">Partner Kami</a>
																		</p>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
												<tr>
													<td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
														<table class="m_7038930368390449249footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0 auto;padding:0;text-align:center;width:100%;max-width:570px">
															<tbody>
																<tr>
																	<td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
																		<p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;color: white;font-size:12px;text-align:center;">© 2021 Muhammad Saleh Solahudin. All rights reserved.
																		</p>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					PESAN;

					if ($this->_kirim_email($email, "Langkah selanjutnya untuk mengubah Kata Sandi akun anda", $pesan))
					{
						$data = [
							'pengguna'           => $akun,
							'token'              => $token,
							'tanggal_kadaluarsa' => date('Y-m-d', strtotime('tomorrow'))
						];

						$this->campuran->tambah_riwayat('N',"{$akun} Meminta token Lupa Kata Sandi.");
						$this->ang->bot("{$akun} Meminta token Lupa Kata Sandi.");
						$this->db->insert('token_lks',$data);
						$this->respon = ['sukses' => TRUE,'pesan' => 'Silahkan cek email anda untuk langkah selanjutnya (email akan masuk paling lama 5 menit).'];
					}
					else
					{
						$this->respon = [
							'sukses'    => FALSE,
							'pesan'     => 'Proses gagal, silahkan hubungi tim Always Ngoding.',
							'recaptcha' => $this->recaptcha->render()
						];
					}
				}
				else
				{
					$this->respon = [
						'sukses'    => FALSE,
						'pesan'     => "Maaf akun anda belum terverifikasi, silahkan cek email anda untuk memverifikasi akun anda.\nEmail: {$email}\nCatatan: Pastikan anda mengecek folder spam juga pada email anda.",
						'recaptcha' => $this->recaptcha->render()
					];
				}
			}
			else
			{
				$this->respon = [
					'sukses'    => FALSE,
					'pesan'     => 'Email tidak terdaftar di basis data.',
					'recaptcha' => $this->recaptcha->render()
				];
			}
		}

		$this->_encode_dengan_token($this->respon);
	}

	public function lks_proses_ganti_kata_sandi()
	{
		$this->_akses_ajax();

		if (ang_integration_enabled('recaptcha')) {
			$this->form_validation->set_rules('g-recaptcha-response', 'captcha', 'callback_getResponseCaptcha');
			$this->form_validation->set_message('getResponseCaptcha', 'Silahkan validasi CAPTCHA terlebih dahulu.');
		}

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'kata_sandi',
					'label'  => 'Kata sandi baru',
					'rules'  => 'required|trim',
					'errors' => ['required' => '%s wajib di isi.']
				],
				[
					'field'  => 'konfirmasi_kata_sandi',
					'label'  => 'Konfirmasi kata sandi Baru',
					'rules'  => 'required|trim|matches[kata_sandi]',
					'errors' => ['required' => '%s wajib di isi.','matches' => 'Kata sandi harus selaras.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->form_validation->set_error_delimiters('', '');
			$this->respon = [
				'sukses'    => FALSE,
				'pesan'     => validation_errors(),
				'recaptcha' => $this->recaptcha->render()
			];
		}
		else
		{
			$data     = ['kata_sandi' => password_hash($this->input->post('kata_sandi',TRUE),PASSWORD_BCRYPT,['cost' => 13])];
			$pengguna = $this->token_lks->ambil_pengguna($this->input->post('token',TRUE));

			$this->db->where(['nama_pengguna' => $pengguna])->update('pengguna',$data);
			$this->db->delete('token_lks',['pengguna' => $pengguna]);
			$this->campuran->tambah_riwayat('N',"{$pengguna} berhasil mengubah kata sandinya.");
			$this->ang->bot("{$pengguna} berhasil mengubah kata sandinya.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Ganti kata sandi berhasil.'];
			$this->session->set_flashdata('pesan-info',"Ganti kata sandi berhasil, silahkan masuk.");
		}

		$this->_encode_dengan_token($this->respon);
	}

	public function lks_ganti_kata_sandi($token)
	{
		$this->token_lks->hapus_data_kadaluarsa();

		if ($this->token_lks->cek_token($token))
		{
			$this->load->library('recaptcha');

			$data = ['token' => $token,'nama_pengguna' => $this->token_lks->ambil_pengguna($token),'recaptcha' => $this->recaptcha->render()];

			// LKS = Lupa Kata Sandi, GKS = Ganti Kata Sandi
			$this->load->view('otentikasi/anggota/lks-gks',$data);
		}
		else
		{
			show_error('Halaman tidak ditemukan atau token sudah kadaluarsa.',404,'404');
		}
	}

	public function verifikasi_akun($token, $pengguna)
	{
		$this->verif_akun->hapus_data_kadaluarsa();

		if ($this->verif_akun->cek_token($token))
		{
			$nama_pengguna = $this->verif_akun->ambil_pengguna($token);

			$this->db->update('pengguna',['tanggal_terverifikasi' => date('Y-m-d')],['nama_pengguna' => $nama_pengguna]);
			$this->db->delete('verif_akun',['pengguna' => $nama_pengguna]);

			// total angota aktif
			$taa = number_format($this->pengguna->anggota_aktif(),0,',','.');
			$msg = "Akun {$nama_pengguna} baru saja terverifikasi dan menjadi anggota Always Ngoding, total anggota aktif Always Ngoding menjadi: {$taa}.";

			$this->campuran->tambah_riwayat('N',$msg);
			$this->ang->bot($msg);
			$this->ang->kakd("Akun {$nama_pengguna} (".site_url("anggota/{$nama_pengguna}").") baru saja terverifikasi dan menjadi anggota Always Ngoding. Selamat datang {$nama_pengguna} di keluarga Always Ngoding :partying_face:");
			$this->session->set_flashdata('pesan-info',"Akun <b>{$nama_pengguna}</b> berhasil diverifikasi, silahkan masuk.");
			redirect('masuk');
		}
		else
		{
			if ($this->pengguna->cek_verifikasi_untuk_masuk($pengguna))
			{
				$this->session->set_flashdata('pesan-info',"Akun <b>{$pengguna}</b> berhasil diverifikasi, silahkan masuk.");
				redirect('masuk');
			}

			show_error('Halaman tidak ditemukan atau token sudah kadaluarsa.',404,'404');
		}
	}

	public function keluar()
	{
		if ($this->session->has_userdata('ang_akses') && $this->session->has_userdata('ang_anggota'))
		{
			if ($this->input->get('uks') == "uks") {
				$now = date('Y-m-d H:i:s');
				$this->db->update('pengguna', ['terakhir_ubah_kata_sandi' => $now], ['nama_pengguna' => $this->session->ang_nama_pengguna]);
			}
			$this->session->sess_destroy(); redirect();
		}
		else
		{
			redirect();
		}
	}
}
