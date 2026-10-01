<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH.'vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';

class C_anggota_ang_2019 extends CI_Controller
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

		$pemeliharaan = $this->db->select('pemeliharaan')->from('konfigurasi')->get()->row()->pemeliharaan == 'Y';

		if ($pemeliharaan && !$this->session->has_userdata('ang_pengurus'))
		{
			redirect('pemeliharaan');
			exit;
		}

		if (!$this->session->has_userdata('ang_anggota'))
		{
			if ($this->session->has_userdata('ang_pengurus'))
			{
				redirect('area-pengurus');
			}
			else
			{
				redirect();
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

	public function index()
	{
		$this->load->view('anggota/dashboard');
	}

	public function data_diri()
	{
		$this->load->view('anggota/lainnya/data-diri', ['data' => $this->pengguna->ambil($this->session->ang_nama_pengguna)]);
	}

	public function ubah_data_diri()
	{
		$this->_akses_ajax();

		$nama_pengguna = $this->session->ang_nama_pengguna;
		$foto_lama     = $this->pengguna->ambil_foto($nama_pengguna);
		$ubah_foto     = FALSE;
		$foto_baru     = '';

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'nama_lengkap',
					'label'  => 'Nama Lengkap',
					'rules'  => 'required|trim|min_length[3]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'tentang',
					'label'  => 'Cerita Diri',
					'rules'  => 'required|trim|max_length[500]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'alamat',
					'label'  => 'Alamat',
					'rules'  => 'required|trim|min_length[3]|max_length[350]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'jenis_kelamin',
					'label'  => 'Jenis Kelamin',
					'rules'  => 'required|trim|in_list[Laki-laki,Perempuan]',
					'errors' => [
						'required' => '{field} wajib di isi.',
						'in_list'  => 'Isi {field} tidak valid.'
					]
				],
				[
					'field'  => 'status',
					'label'  => 'Status',
					'rules'  => 'required|trim|in_list[Lajang,Berpacaran,Menikah]',
					'errors' => [
						'required' => '{field} wajib di isi.',
						'in_list'  => 'Isi {field} tidak valid.'
					]
				],
				[
					'field'  => 'website_pribadi',
					'label'  => 'Website Pribadi',
					'rules'  => 'max_length[100]|valid_url',
					'errors' => [
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.',
						'valid_url'  => 'Isi {field} tidak valid.'
					]
				],
				[
					'field'  => 'akun_medsos',
					'label'  => 'Akun Medsos',
					'rules'  => 'required|trim|min_length[11]|max_length[100]|valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.',
						'valid_url'  => 'Isi {field} tidak valid.'
					]
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
		}
		else
		{
			$data = [
				'nama_lengkap'    => $this->ang->ci($this->input->post('nama_lengkap',TRUE)),
				'tentang'         => $this->ang->ci($this->input->post('tentang',TRUE)),
				'alamat'          => $this->ang->ci($this->input->post('alamat',TRUE)),
				'jenis_kelamin'   => $this->ang->ci($this->input->post('jenis_kelamin',TRUE)),
				'status'          => $this->ang->ci($this->input->post('status',TRUE)),
				'website_pribadi' => $this->ang->ci($this->input->post('website_pribadi',TRUE)),
				'akun_medsos'     => $this->ang->ci($this->input->post('akun_medsos',TRUE))
			];

			$konfigurasi = [
				'upload_path'   => './media/foto-pengguna/',
				'allowed_types' => 'gif|jpg|jpeg|png|bmp',
				'max_size'      => 1024,
				'min_width'     => 128,
				'min_height'    => 128,
				'encrypt_name'  => TRUE,
				'remove_spaces' => TRUE
			];

			$this->upload->initialize($konfigurasi);

			if (!$this->upload->do_upload('foto'))
			{
				if ($_FILES['foto']['error'] != 4)
				{
					$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file foto adalah 1MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

					echo $this->_encode_dengan_token($this->respon);
					exit;
				}
			}
			else
			{
				$konfigurasi = [
					'image_library'  => 'gd2',
					'source_image'   => "./media/foto-pengguna/{$this->upload->data('file_name')}",
					'maintain_ratio' => TRUE,
					'create_thumb'   => TRUE,
					'thumb_marker'   => '_AlwaysNgoding',
					'width'          => 128
	      ];

	      $this->image_lib->initialize($konfigurasi);

	      if ($this->image_lib->resize())
	      {
					$foto_baru = $this->upload->data('raw_name').'_AlwaysNgoding'.$this->upload->data('file_ext');
					$data      = array_merge($data,['foto' => $foto_baru]);
					$ubah_foto = TRUE;

	      	$this->ang->unlink("./media/foto-pengguna/{$this->upload->data('file_name')}");
	      }
	      else
	      {
	      	$this->ang->unlink("./media/foto-pengguna/{$this->upload->data('file_name')}");

	      	$this->respon = ['sukses' => FALSE,'pesan' => substr($this->image_lib->display_errors('',','),0,-1)];

	      	echo $this->_encode_dengan_token($this->respon);
	      	exit;
	      }
			}

			$this->db->update('pengguna',$data,['nama_pengguna' => $nama_pengguna]);

			if ($ubah_foto)
			{
				if ($foto_lama != '')
				{
					$this->ang->unlink("./media/foto-pengguna/{$foto_lama}");
				}

				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah data diri berhasil.','ubah_foto' => TRUE,'foto_baru' => $foto_baru];
			}
			else
			{
				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah data diri berhasil.','ubah_foto' => FALSE];
			}

			$this->campuran->tambah_riwayat('Y',"Mengubah data diri sendiri.");
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_kata_sandi()
	{
		$this->_akses_ajax();

		$nama_pengguna   = $this->session->ang_nama_pengguna;
		$kata_sandi_lama = $this->input->post('kata_sandi_lama',TRUE);

		if (password_verify($kata_sandi_lama,$this->pengguna->ambil_kata_sandi($nama_pengguna)))
		{
			$kata_sandi_baru = $this->input->post('kata_sandi_baru',TRUE);

			if ($kata_sandi_baru === $this->input->post('kata_sandi_konfirmasi',TRUE))
			{
				$this->form_validation->set_rules([
					[
						'field'  => 'kata_sandi_baru',
						'label'  => 'Kata sandi baru',
						'rules'  => 'required|trim',
						'errors' => ['required' => '{field} wajib di isi.']
					]
				]);

				if ($this->form_validation->run() === FALSE)
				{
					$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
				}
				else
				{
					if ($kata_sandi_baru !== $kata_sandi_lama)
					{
						$this->db->update('pengguna',[
							'kata_sandi' => password_hash($this->input->post('kata_sandi_baru',TRUE),PASSWORD_BCRYPT,['cost' => 13])
						],['nama_pengguna' => $nama_pengguna]);

						$this->campuran->tambah_riwayat('Y',"Mengubah kata sandinya.");

						$this->respon = ['sukses' => TRUE,'pesan' => 'Berhasil. Silahkan masuk ulang!'];
					}
					else
					{
						$this->respon = ['sukses' => FALSE,'pesan' => 'Kata sandi baru tidak boleh sama seperti kata sandi lama.'];
					}
				}
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Konfirmasi kata sandi tidak sesuai.'];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Kata sandi lama tidak sesuai.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function artikel()
	{
		$this->load->library('user_agent');
		$this->load->view('anggota/artikel/awal');
	}

	public function data_artikel()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->artikel->data_by_pengguna($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rinci = '';

			if ($d->status === 'aktif')
			{
		    $rinci = '<a href="'.site_url("artikel/{$d->id_artikel}/{$d->slug}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Rincian" target="_blank">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}
			else
			{
				$rinci = '<a href="'.site_url("anggota/artikel/preview/{$d->id_artikel}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Preview">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}

			$rdata[] = [
				++$nomor,
				$d->judul,
				$d->kategori,
				"{$this->ang->tanggal_indonesia($d->tanggal_posting)} {$d->jam_posting} WIB",
				ucwords($d->status),
				"{$rinci}
				<a href='".site_url("anggota/artikel/ubah/{$d->id_artikel}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_artikel('{$d->id_artikel}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->artikel->jumlah_by_pengguna(),
			'recordsFiltered' => $this->artikel->jumlah_tersortir_by_pengguna($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_artikel()
	{
		$this->load->view('anggota/artikel/tambah');
	}

	public function proses_tambah_artikel()
	{
		$this->_akses_ajax();

		$key_aktifitas = "tambah_artikel";

		$pengguna = $this->pengguna->ambil($this->session->ang_nama_pengguna);
		if ($pengguna->poin_belajar < 50 && $this->session->ang_level !== 'superadmin') {
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda belum bisa menambah atau membuat artikel karena poin belajar anda masih sedikit!"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 60*5) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 5 menit dahulu semenjak anda menambah artikel untuk bisa menambah artikel kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'judul',
					'label'  => 'Judul',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'kategori',
					'label'  => 'Kategori',
					'rules'  => 'required|trim|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'tags',
					'label'  => 'Tags',
					'rules'  => 'required|trim|max_length[150]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'isi',
					'label'  => 'Isi Artikel',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				],
				[
					'field'  => 'aksi',
					'label'  => 'Aksi',
					'rules'  => 'required|trim|in_list[konsep,menunggu persetujuan]',
					'errors' => [
						'required' => '{field} wajib di isi.',
						'in_list'  => 'Isi {field} tidak valid.'
					]
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
		}
		else
		{
			$thumb = NULL;
			$_isi_ = $this->purifier->purify($this->ang->cw($this->input->post('isi')));

			// Awal fungsi untuk mengambil gambar pertama dan dipakai sebagai thumbnail
			preg_match_all('/<img .*?(?=src)src=\"([^\"]+)\"/si',$_isi_,$semua_gambar);
			if (isset($semua_gambar[1][0])) $thumb = $semua_gambar[1][0];
			// Akhir fungsi untuk mengambil gambar pertama dan dipakai sebagai thumbnail

			$judul = $this->ang->ci($this->input->post('judul',TRUE));
			$tags = strtolower($this->ang->ci($this->input->post('tags',TRUE)));
			$data = [
				'thumb'           => $thumb,
				'judul'           => $judul,
				'slug'            => $this->ang->bikin_slug($judul,'artikel'),
				'tags'            => $tags,
				'kategori'        => $this->ang->ci($this->input->post('kategori',TRUE)),
				'isi'             => $_isi_,
				'status'          => $this->ang->ci($this->input->post('aksi',TRUE)),
				'tanggal_posting' => date('Y-m-d'),
				'jam_posting'     => date('H:i:s'),
				'penginput'       => $this->session->ang_nama_pengguna
			];

			if ($this->ang->ci($this->input->post('aksi',TRUE)) == 'menunggu persetujuan')
			{
				$this->ang->bot("{$this->session->ang_nama_pengguna} menambah artikel berjudul \"{$judul}\" dan mengajukan artikel tersebut untuk dipublikasikan.");
			}

			$this->_atur_waktu_aktifitas($key_aktifitas);
			$this->db->insert('artikel',$data);
			$this->ang->cek_tambah_hapus_tags($tags);
			$this->db->set('jumlah_kontribusi','jumlah_kontribusi+1',false)->where('nama_pengguna',$this->session->ang_nama_pengguna)->update('pengguna');
			$this->campuran->tambah_riwayat('Y',"Menambah artikel berjudul \"{$judul}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah artikel berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_artikel()
	{
		$this->_akses_ajax();

		$key_aktifitas = "ubah_artikel";

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 30) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 30 detik dahulu semenjak anda mengubah artikel untuk bisa mengubah artikel kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$id_artikel = $this->input->post('id_artikel',TRUE);

		if ($this->artikel->cek_artikel($id_artikel))
		{
			if ($this->artikel->cek_akses_artikel_pengguna($id_artikel))
			{
				$this->form_validation->set_rules(
					[
						[
							'field'  => 'judul',
							'label'  => 'Judul',
							'rules'  => 'required|trim|min_length[2]|max_length[100]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'tags',
							'label'  => 'Tags',
							'rules'  => 'required|trim|max_length[150]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'isi',
							'label'  => 'Isi Artikel',
							'rules'  => 'required|trim',
							'errors' => ['required' => '{field} wajib di isi.']
						],
						[
							'field'  => 'status',
							'label'  => 'Status',
							'rules'  => 'required|trim|in_list[konsep,menunggu persetujuan]',
							'errors' => [
								'required' => '{field} wajib di isi.',
								'in_list'  => 'Isi {field} tidak valid.'
							]
						]
					]
				);

				if ($this->form_validation->run() === FALSE)
				{
					$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
				}
				else
				{
					$_thumb_ = NULL;
					$__isi__ = $this->purifier->purify($this->ang->cw($this->input->post('isi')));
					$istatus = $this->ang->ci($this->input->post('status',TRUE));

					// Awal fungsi untuk mengambil gambar pertama dan dipakai sebagai thumbnail
					preg_match_all('/<img .*?(?=src)src=\"([^\"]+)\"/si',$__isi__,$semua_gambar);
					if (isset($semua_gambar[1][0])) $_thumb_ = $semua_gambar[1][0];
					// Akhir fungsi untuk mengambil gambar pertama dan dipakai sebagai thumbnail

					$judul = $this->ang->ci($this->input->post('judul',TRUE));
					$tags = strtolower($this->ang->ci($this->input->post('tags',TRUE)));
					$data = [
						'thumb'                 => $_thumb_,
						'judul'                 => $judul,
						'tags'                  => $tags,
						'kategori'              => $this->ang->ci($this->input->post('kategori',TRUE)),
						'isi'                   => $__isi__,
						'status'                => $istatus,
						'terakhir_diperbaharui' => date('Y-m-d H:i:s')
					];

					$judul_lama = $this->ang->ci($this->input->post('judul_lama',TRUE));
					$judul_baru = $judul;

					if ($judul_lama != $judul_baru)
					{
						$data = array_merge($data, ['slug' => $this->ang->bikin_slug($judul_baru,'artikel')]);
					}

					if ($istatus == 'menunggu persetujuan')
					{
						$this->ang->bot("{$this->session->ang_nama_pengguna} mengubah artikel berjudul \"{$judul}\" dan mengajukan artikel tersebut untuk dipublikasikan.");
					}

					$this->_atur_waktu_aktifitas($key_aktifitas);
					$this->db->update('artikel',$data,['id_artikel' => $id_artikel]);
					$this->ang->cek_tambah_hapus_tags($tags);
					$this->campuran->tambah_riwayat('Y',"Mengubah artikel ID {$id_artikel}.");
					$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah artikel berhasil.'];
				}
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_artikel($id_artikel)
	{
		if ($this->artikel->cek_artikel($id_artikel))
		{
			if ($this->artikel->cek_akses_artikel_pengguna($id_artikel))
			{
				$data = [
					'data' => $this->artikel->ambil($id_artikel)
				];

				$this->load->view('anggota/artikel/ubah',$data);
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

	public function hapus_artikel()
	{
		$this->_akses_ajax();

		$id_artikel = $this->input->post('id_artikel',TRUE);

		if ($this->artikel->cek_artikel($id_artikel))
		{
			if ($this->artikel->cek_akses_artikel_pengguna($id_artikel))
			{
				$this->db->delete('artikel',['id_artikel' => $id_artikel]);
				$this->ang->hapus_tags_tidak_terpakai();
				$this->campuran->tambah_riwayat('Y',"Menghapus artikel ID {$id_artikel}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus artikel berhasil.'];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function diskusi()
	{
		$this->load->library('user_agent');
		$this->load->view('anggota/diskusi/awal');
	}

	public function data_diskusi()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->diskusi->data_by_pengguna($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rinci = '';

			if ($d->status === 'aktif')
			{
		    $rinci = '<a href="'.site_url("diskusi/{$d->id_diskusi}/{$d->slug}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Rincian" target="_blank">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}
			else
			{
				$rinci = '<a href="'.site_url("anggota/diskusi/preview/{$d->id_diskusi}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Preview">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}

			$rdata[] = [
				++$nomor,
				$d->judul,
				"{$this->ang->tanggal_indonesia($d->tanggal_posting)} {$d->jam_posting} WIB",
				ucwords($d->status),
				"{$rinci}
				<a href='".site_url("anggota/diskusi/ubah/{$d->id_diskusi}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
		      <i class='material-icons'>edit</i>
		    </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_diskusi('{$d->id_diskusi}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->diskusi->jumlah_by_pengguna(),
			'recordsFiltered' => $this->diskusi->jumlah_tersortir_by_pengguna($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_diskusi()
	{
		$this->load->view('anggota/diskusi/tambah');
	}

	public function proses_tambah_diskusi()
	{
		$this->_akses_ajax();

		$key_aktifitas = "tambah_diskusi";

		$pengguna = $this->pengguna->ambil($this->session->ang_nama_pengguna);
		if ($pengguna->poin_belajar < 50 && $this->session->ang_level !== 'superadmin') {
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda belum bisa menambah atau membuat diskusi baru karena poin belajar anda masih sedikit!"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 60*3) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 3 menit dahulu semenjak anda menambah diskusi untuk bisa menambah diskusi kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'judul',
					'label'  => 'Judul',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'tags',
					'label'  => 'Tags',
					'rules'  => 'required|trim|max_length[150]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'isi',
					'label'  => 'Isi Diskusi',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
		}
		else
		{
			$judul = $this->ang->ci($this->input->post('judul',TRUE));
			$tags = strtolower($this->ang->ci($this->input->post('tags',TRUE)));
			$data = [
				'tanggal_posting' => date('Y-m-d'),
				'jam_posting'     => date('H:i:s'),
				'tags'            => $tags,
				'judul'           => $judul,
				'slug'            => $this->ang->bikin_slug($judul,'diskusi'),
				'isi'             => $this->purifier->purify($this->ang->cw($this->input->post('isi'))),
				'status'          => 'aktif',
				'penginput'       => $this->session->ang_nama_pengguna
			];

			$this->_atur_waktu_aktifitas($key_aktifitas);
			$this->db->insert('diskusi',$data);
			$this->ang->cek_tambah_hapus_tags($tags);
			$this->campuran->tambah_riwayat('Y',"Menambah diskusi berjudul \"{$judul}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah diskusi berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_diskusi()
	{
		$this->_akses_ajax();

		$key_aktifitas = "ubah_diskusi";

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 30) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 30 detik dahulu semenjak anda mengubah diskusi untuk bisa mengubah diskusi kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$id_diskusi = $this->input->post('id_diskusi',TRUE);

		if ($this->diskusi->cek_diskusi($id_diskusi))
		{
			if ($this->diskusi->cek_akses($id_diskusi))
			{
				$this->form_validation->set_rules(
					[
						[
							'field'  => 'judul',
							'label'  => 'Judul',
							'rules'  => 'required|trim|min_length[2]|max_length[100]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'tags',
							'label'  => 'Tags',
							'rules'  => 'required|trim|max_length[150]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'isi',
							'label'  => 'Isi Diskusi',
							'rules'  => 'required|trim',
							'errors' => ['required' => '{field} wajib di isi.']
						]
					]
				);

				if ($this->form_validation->run() === FALSE)
				{
					$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
				}
				else
				{
					$judul = $this->ang->ci($this->input->post('judul',TRUE));
					$tags = strtolower($this->ang->ci($this->input->post('tags',TRUE)));
					$data = [
						'tags'                  => $tags,
						'judul'                 => $judul,
						'isi'                   => $this->purifier->purify($this->ang->cw($this->input->post('isi'))),
						'terakhir_diperbaharui' => date('Y-m-d H:i:s')
					];

					$judul_lama = $this->ang->ci($this->input->post('judul_lama',TRUE));
					$judul_baru = $judul;

					if ($judul_lama != $judul_baru)
					{
						$data = array_merge($data, ['slug' => $this->ang->bikin_slug($judul_baru,'diskusi')]);
					}

					$this->_atur_waktu_aktifitas($key_aktifitas);
					$this->db->update('diskusi',$data,['id_diskusi' => $id_diskusi]);
					$this->ang->cek_tambah_hapus_tags($tags);
					$this->campuran->tambah_riwayat('Y',"Mengubah diskusi ID {$id_diskusi}.");
					$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah diskusi berhasil.'];
				}
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_diskusi($id_diskusi)
	{
		if ($this->diskusi->cek_diskusi($id_diskusi))
		{
			if ($this->diskusi->cek_akses($id_diskusi))
			{
				$data = ['data' => $this->diskusi->ambil($id_diskusi)];
				$this->load->view('anggota/diskusi/ubah',$data);
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

	public function hapus_diskusi()
	{
		$this->_akses_ajax();

		$id_diskusi = $this->input->post('id_diskusi',TRUE);

		if ($this->diskusi->cek_diskusi($id_diskusi))
		{
			if ($this->diskusi->cek_akses($id_diskusi))
			{
				$this->db->delete('diskusi',['id_diskusi' => $id_diskusi]);
				$this->ang->hapus_tags_tidak_terpakai();
				$this->campuran->tambah_riwayat('Y',"Menghapus diskusi ID {$id_diskusi}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus diskusi berhasil.'];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function suara_anggota()
	{
		$this->load->view('anggota/lainnya/suara');
	}

	public function bersuara()
	{
		$this->_akses_ajax();

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'isi',
					'label'  => 'inputan',
					'rules'  => 'required|trim|min_length[3]|max_length[350]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				]
			]
		);

		if ($this->form_validation->run() === FALSE)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
		}
		else
		{
			if ($this->suara->cek_sudah_bersuara_atau_belum())
			{
				$data = [
					'isi'    => $this->ang->ci($this->input->post('isi', TRUE)),
					'status' => 'menunggu persetujuan'
				];

				$this->db->update('suara',$data,['pengguna' => $this->session->ang_nama_pengguna]);
			}
			else
			{
				$data = [
					'pengguna' => $this->session->ang_nama_pengguna,
					'isi'      => $this->ang->ci($this->input->post('isi', TRUE)),
					'status'   => 'menunggu persetujuan'
				];

				$this->db->insert('suara',$data);
			}

			$this->campuran->tambah_riwayat('Y',"Mengajukan suara untuk Always Ngoding.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Terima kasih atas suara anda untuk kami.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function pencapaian()
	{
		$this->load->library('user_agent');
		$this->load->view('anggota/lainnya/pencapaian');
	}

	public function data_pencapaian()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->p_pencapaian->data_by_pengguna($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->nama_pencapaian,
				"{$this->ang->tanggal_indonesia($d->tanggal_tercapai)} {$d->jam_tercapai} WIB",
				"<button onclick='lihatGambarPencapaian(`{$d->gambar}`);' class='btn bg-teal btn-xs waves-effect' data-toggle='tooltip' data-placement='top' title='Lihat Gambar Pencapaian'>
		      <i class='material-icons'>remove_red_eye</i>
		    </button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->p_pencapaian->jumlah_by_pengguna(),
			'recordsFiltered' => $this->p_pencapaian->jumlah_tersortir_by_pengguna($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function sertifikat()
	{
		$this->load->library('user_agent');
		$this->load->view('anggota/lainnya/sertifikat');
	}

	public function data_sertifikat()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->p_sertifikat->data_by_pengguna($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$id = urlencode(str_replace('=', '', base64_encode("sertifikat-{$d->id_p_sertifikat}")));
			$id = str_replace('%3D','',$id);
			$ls = site_url("sertifikat/{$id}");

			$rdata[] = [
				++$nomor,
				$d->nama_sertifikat,
				"{$this->ang->tanggal_indonesia($d->tanggal_memperoleh)} {$d->jam_memperoleh} WIB",
				"<a href='{$ls}' target='_blank' class='btn bg-teal btn-xs waves-effect' data-toggle='tooltip' data-placement='top' title='Lihat Sertifikat'>
		      <i class='material-icons'>remove_red_eye</i>
		    </a>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->p_sertifikat->jumlah_by_pengguna(),
			'recordsFiltered' => $this->p_sertifikat->jumlah_tersortir_by_pengguna($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function pasang_iklan()
	{
		$this->load->view('anggota/lainnya/pasang-iklan');
	}

	public function lowongan_kerja()
	{
		$this->load->library('user_agent');
		$this->load->view('anggota/lowongan-kerja/awal');
	}

	public function data_lowongan_kerja()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->loker->data_by_pengguna($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rinci = '';

			if ($d->status === 'aktif')
			{
		    $rinci = '<a href="'.site_url("lowongan-kerja/{$d->id_loker}/{$d->slug}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Rincian" target="_blank">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}
			else
			{
				$rinci = '<a href="'.site_url("anggota/lowongan-kerja/preview/{$d->id_loker}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Preview">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}

			$rdata[] = [
				++$nomor,
				$d->nama_perusahaan,
				$d->posisi,
				"{$this->ang->tanggal_indonesia($d->tanggal_posting)} {$d->jam_posting} WIB",
				ucwords($d->status),
				"{$rinci}
				<a href='".site_url("anggota/lowongan-kerja/ubah/{$d->id_loker}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_loker('{$d->id_loker}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->loker->jumlah_by_pengguna(),
			'recordsFiltered' => $this->loker->jumlah_tersortir_by_pengguna($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_lowongan_kerja()
	{
		$this->load->view('anggota/lowongan-kerja/tambah');
	}

	public function proses_tambah_lowongan_kerja()
	{
		$this->_akses_ajax();

		$key_aktifitas = "tambah_lowongan_kerja";

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 60*10) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 10 menit dahulu semenjak anda menambah lowongan kerja untuk bisa menambah lowongan kerja kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'nama_perusahaan',
					'label'  => 'Nama Perusahaan',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'lokasi',
					'label'  => 'Lokasi Perusahaan',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'posisi',
					'label'  => 'Posisi Pekerjaan',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'catatan',
					'label'  => 'Catatan',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				],
				[
					'field'  => 'syarat_ketentuan',
					'label'  => 'Syarat dan Ketentuan',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				],
				[
					'field'  => 'nilai_tambah',
					'label'  => 'Nilai Tambah',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				],
				[
					'field'  => 'kirim_cv_ke',
					'label'  => 'Pengiriman CV',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'jatuh_tempo',
					'label'  => 'Jatuh Tempo',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				]
			]
		);

		$g_min = $this->input->post('gaji_minimal',TRUE);
		$g_mak = $this->input->post('gaji_maksimal',TRUE);

		if ($g_min != '' && $g_mak != '')
		{
			$this->form_validation->set_rules('gaji_minimal','Gaji Minimal','required|trim|greater_than_equal_to[1]|integer',
				[
					'required'              => '{field} wajib di isi.',
					'integer'               => '{field} harus berupa angka.',
					'greater_than_equal_to' => '{field} harus lebih atau sama dengan {param}.'
				]
			);

			$this->form_validation->set_rules('gaji_maksimal','Gaji Maksimal','required|trim|greater_than_equal_to[1]|integer',
				[
					'required'              => '{field} wajib di isi.',
					'integer'               => '{field} harus berupa angka.',
					'greater_than_equal_to' => '{field} harus lebih atau sama dengan {param}.'
				]
			);
		}

		if ($this->form_validation->run() === FALSE)
		{
			$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
		}
		else
		{
			$flag = TRUE;

			if ($g_min != '' && $g_mak != '')
			{
				if ($g_min >= $g_mak)
				{
					$flag = FALSE;
				}
			}

			if (!$flag)
			{
				$this->respon = ['sukses' => FALSE,'pesan' => "Gaji minimal harus lebih kecil dari gaji maksimal."];
			}
			else
			{
				$nama_perusahaan = $this->ang->ci($this->input->post('nama_perusahaan',TRUE));
				$posisi          = $this->ang->ci($this->input->post('posisi',TRUE));
				$lokasi          = $this->ang->ci($this->input->post('lokasi',TRUE));
				$kirim_cv_ke     = $this->ang->ci($this->input->post('kirim_cv_ke',TRUE));
				$jatuh_tempo     = $this->ang->ci($this->input->post('jatuh_tempo',TRUE));
				$slug            = "lowongan-kerja-di-{$lokasi}-sebagai-{$posisi}";
				$data            = [
					'nama_perusahaan'  => $nama_perusahaan,
					'posisi'           => $posisi,
					'slug'             => $this->ang->bikin_slug($slug,'loker'),
					'lokasi'           => $lokasi,
					'catatan'          => $this->purifier->purify($this->ang->cw($this->input->post('catatan'))),
					'syarat_ketentuan' => $this->purifier->purify($this->ang->cw($this->input->post('syarat_ketentuan'))),
					'nilai_tambah'     => $this->purifier->purify($this->ang->cw($this->input->post('nilai_tambah'))),
					'kirim_cv_ke'      => $kirim_cv_ke,
					'gaji_minimal'     => $g_min == '' ? 0 : $g_min,
					'gaji_maksimal'    => $g_mak == '' ? 0 : $g_mak,
					'jatuh_tempo'      => $jatuh_tempo,
					'status'           => 'menunggu persetujuan',
					'tanggal_posting'  => date('Y-m-d'),
					'jam_posting'      => date('H:i:s'),
					'penginput'        => $this->session->ang_nama_pengguna
				];

				$konfigurasi = [
					'upload_path'   => './media/lowongan-kerja/bukti/',
					'allowed_types' => 'gif|jpg|jpeg|png|bmp',
					'max_size'      => 1024*2,
					'encrypt_name'  => TRUE,
					'remove_spaces' => TRUE
				];

				$this->upload->initialize($konfigurasi);

				// Awal Bukti
				$konfigurasi = [
					'upload_path'   => './media/lowongan-kerja/bukti/',
					'allowed_types' => 'gif|jpg|jpeg|png|bmp',
					'max_size'      => 1024*2,
					'encrypt_name'  => TRUE,
					'remove_spaces' => TRUE
				];

				$this->upload->initialize($konfigurasi);

				if ($this->upload->do_upload('bukti'))
				{
					$bukti = $this->upload->data('file_name');
					$data  = array_merge($data,['bukti' => $bukti]);
				}
				else
				{
					if ($_FILES['bukti']['error'] != 4)
					{
						$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk bukti lowongan kerja adalah 2MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

						echo $this->_encode_dengan_token($this->respon);
						exit;
					}
				}
				// Akhir Bukti

				// Awal Poster
				$konfigurasi = [
					'upload_path'   => './media/lowongan-kerja/poster/',
					'allowed_types' => 'gif|jpg|jpeg|png|bmp',
					'max_size'      => 1024*2,
					'encrypt_name'  => TRUE,
					'remove_spaces' => TRUE
				];

				$this->upload->initialize($konfigurasi);

				if ($this->upload->do_upload('poster'))
				{
					$data = array_merge($data,['poster' => $this->upload->data('file_name')]);
				}
				else
				{
					if ($_FILES['poster']['error'] != 4)
					{
						if (@$bukti != NULL)
						{
							$this->ang->unlink("./media/lowongan-kerja/bukti/{$bukti}");
						}

						$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk poster lowongan kerja adalah 2MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

						echo $this->_encode_dengan_token($this->respon);
						exit;
					}
				}
				// Akhir Poster

				$this->_atur_waktu_aktifitas($key_aktifitas);
				$this->db->insert('loker',$data);
				$this->campuran->tambah_riwayat('Y',"Mengajukan lowongan kerja ({$nama_perusahaan} sebagai {$posisi}).");
				$this->ang->bot("{$this->session->ang_nama_pengguna} menambah dan mengajukan lowongan kerja ({$nama_perusahaan} sebagai {$posisi}) untuk dipublikasikan.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah lowongan kerja berhasil.'];
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_lowongan_kerja()
	{
		$this->_akses_ajax();

		$key_aktifitas = "ubah_lowongan_kerja";

		if ($this->_cek_waktu_aktifitas($key_aktifitas, 30) && $this->session->ang_level !== 'superadmin')
		{
			$this->respon = ['sukses' => FALSE,'pesan' => "Mohon maaf, anda harus menunggu 30 detik dahulu semenjak anda mengubah lowongan kerja untuk bisa mengubah lowongan kerja kembali, terima kasih ^_^"];
			echo $this->_encode_dengan_token($this->respon);
			exit;
		}

		$id_loker = $this->input->post('id_loker',TRUE);

		if ($this->loker->cek_loker($id_loker))
		{
			if ($this->loker->cek_akses_loker_pengguna($id_loker))
			{
				$bukti_lama        = $this->loker->ambil_bukti($id_loker);
				$poster_lama       = $this->loker->ambil_poster($id_loker);
				$hapus_bukti_lama  = FALSE;
				$hapus_poster_lama = FALSE;

				$this->form_validation->set_rules(
					[
						[
							'field'  => 'nama_perusahaan',
							'label'  => 'Nama Perusahaan',
							'rules'  => 'required|trim|min_length[2]|max_length[100]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'lokasi',
							'label'  => 'Lokasi Perusahaan',
							'rules'  => 'required|trim|min_length[2]|max_length[100]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'posisi',
							'label'  => 'Posisi Pekerjaan',
							'rules'  => 'required|trim|min_length[2]|max_length[100]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'catatan',
							'label'  => 'Catatan',
							'rules'  => 'required|trim',
							'errors' => ['required' => '{field} wajib di isi.']
						],
						[
							'field'  => 'syarat_ketentuan',
							'label'  => 'Syarat dan Ketentuan',
							'rules'  => 'required|trim',
							'errors' => ['required' => '{field} wajib di isi.']
						],
						[
							'field'  => 'nilai_tambah',
							'label'  => 'Nilai Tambah',
							'rules'  => 'required|trim',
							'errors' => ['required' => '{field} wajib di isi.']
						],
						[
							'field'  => 'kirim_cv_ke',
							'label'  => 'Pengiriman CV',
							'rules'  => 'required|trim|min_length[2]|max_length[100]',
							'errors' => [
								'required'   => '{field} wajib di isi.',
								'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
								'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
			      	]
						],
						[
							'field'  => 'jatuh_tempo',
							'label'  => 'Jatuh Tempo',
							'rules'  => 'required|trim',
							'errors' => ['required' => '{field} wajib di isi.']
						]
					]
				);

				$g_min = $this->input->post('gaji_minimal',TRUE);
				$g_mak = $this->input->post('gaji_maksimal',TRUE);

				if ($g_min != '' && $g_mak != '')
				{
					$this->form_validation->set_rules('gaji_minimal','Gaji Minimal','required|trim|greater_than_equal_to[1]|integer',
						[
							'required'              => '{field} wajib di isi.',
							'integer'               => '{field} harus berupa angka.',
							'greater_than_equal_to' => '{field} harus lebih atau sama dengan {param}.'
						]
					);

					$this->form_validation->set_rules('gaji_maksimal','Gaji Maksimal','required|trim|greater_than_equal_to[1]|integer',
						[
							'required'              => '{field} wajib di isi.',
							'integer'               => '{field} harus berupa angka.',
							'greater_than_equal_to' => '{field} harus lebih atau sama dengan {param}.'
						]
					);
				}

				if ($this->form_validation->run() === FALSE)
				{
					$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
				}
				else
				{
					$flag = TRUE;

					if ($g_min != '' && $g_mak != '')
					{
						if ($g_min >= $g_mak)
						{
							$flag = FALSE;
						}
					}

					if (!$flag)
					{
						$this->respon = ['sukses' => FALSE,'pesan' => "Gaji minimal harus lebih kecil dari gaji maksimal."];
					}
					else
					{
						$nama_perusahaan = $this->ang->ci($this->input->post('nama_perusahaan',TRUE));
						$posisi          = $this->ang->ci($this->input->post('posisi',TRUE));
						$lokasi          = $this->ang->ci($this->input->post('lokasi',TRUE));
						$kirim_cv_ke     = $this->ang->ci($this->input->post('kirim_cv_ke',TRUE));
						$jatuh_tempo     = $this->ang->ci($this->input->post('jatuh_tempo',TRUE));
						$slug            = "lowongan-kerja-di-{$nama_perusahaan}-sebagai-{$posisi}";
						$data            = [
							'nama_perusahaan'       => $nama_perusahaan,
							'posisi'                => $posisi,
							'slug'                  => $this->ang->bikin_slug($slug,'loker'),
							'lokasi'                => $lokasi,
							'catatan'               => $this->purifier->purify($this->ang->cw($this->input->post('catatan'))),
							'syarat_ketentuan'      => $this->purifier->purify($this->ang->cw($this->input->post('syarat_ketentuan'))),
							'nilai_tambah'          => $this->purifier->purify($this->ang->cw($this->input->post('nilai_tambah'))),
							'kirim_cv_ke'           => $kirim_cv_ke,
							'gaji_minimal'          => $g_min == '' ? 0 : $g_min,
							'gaji_maksimal'         => $g_mak == '' ? 0 : $g_mak,
							'jatuh_tempo'           => $jatuh_tempo,
							'status'                => 'menunggu persetujuan',
							'terakhir_diperbaharui' => date('Y-m-d H:i:s')
						];

						$konfigurasi = [
							'upload_path'   => './media/lowongan-kerja/bukti/',
							'allowed_types' => 'gif|jpg|jpeg|png|bmp',
							'max_size'      => 1024*2,
							'encrypt_name'  => TRUE,
							'remove_spaces' => TRUE
						];

						$this->upload->initialize($konfigurasi);

						if ($this->upload->do_upload('bukti'))
						{
							$hapus_bukti_lama = TRUE;
							$bukti            = $this->upload->data('file_name');
							$data             = array_merge($data,['bukti' => $bukti]);
						}
						else
						{
							if ($_FILES['bukti']['error'] != 4)
							{
								$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk bukti lowongan kerja adalah 2MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

								echo $this->_encode_dengan_token($this->respon);
								die();
							}
						}

						$konfigurasi = [
							'upload_path'   => './media/lowongan-kerja/poster/',
							'allowed_types' => 'gif|jpg|jpeg|png|bmp',
							'max_size'      => 1024*2,
							'encrypt_name'  => TRUE,
							'remove_spaces' => TRUE
						];

						$this->upload->initialize($konfigurasi);

						if ($this->upload->do_upload('poster'))
						{
							$hapus_poster_lama = TRUE;
							$data              = array_merge($data,['poster' => $this->upload->data('file_name')]);
						}
						else
						{
							if ($_FILES['poster']['error'] != 4)
							{
								if (@$bukti != NULL)
								{
									$this->ang->unlink("./media/lowongan-kerja/bukti/{$bukti}");
								}

								$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk poster lowongan kerja adalah 2MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

								echo $this->_encode_dengan_token($this->respon);
								die();
							}
						}

						if ($bukti_lama != '')
						{
							if ($hapus_bukti_lama)
							{
								$this->ang->unlink("./media/lowongan-kerja/bukti/{$bukti_lama}");
							}
						}

						if ($poster_lama != '')
						{
							if ($hapus_poster_lama)
							{
								$this->ang->unlink("./media/lowongan-kerja/poster/{$poster_lama}");
							}
						}

						$this->_atur_waktu_aktifitas($key_aktifitas);
						$this->db->update('loker',$data,['id_loker' => $id_loker]);
						$this->campuran->tambah_riwayat('Y',"Mengubah lowongan kerja ID {$id_loker}.");
						$this->ang->bot("{$this->session->ang_nama_pengguna} mengubah dan mengajukan lowongan kerja ({$nama_perusahaan} sebagai {$posisi}) untuk dipublikasikan.");
						$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah lowongan kerja berhasil.'];
					}
				}
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID loker tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_lowongan_kerja($id_loker)
	{
		if ($this->loker->cek_loker($id_loker))
		{
			if ($this->loker->cek_akses_loker_pengguna($id_loker))
			{
				$data = ['data' => $this->loker->ambil($id_loker)];

				$this->load->view('anggota/lowongan-kerja/ubah',$data);
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

	public function hapus_lowongan_kerja()
	{
		$this->_akses_ajax();

		$id_loker = $this->input->post('id_loker',TRUE);
		$bukti    = $this->loker->ambil_bukti($id_loker);
		$poster   = $this->loker->ambil_poster($id_loker);

		if ($this->loker->cek_loker($id_loker))
		{
			if ($this->loker->cek_akses_loker_pengguna($id_loker))
			{
				$this->db->delete('loker',['id_loker' => $id_loker]);

				if ($bukti !== NULL)
				{
					$this->ang->unlink("./media/lowongan-kerja/bukti/{$bukti}");
				}

				if ($poster !== NULL)
				{
					$this->ang->unlink("./media/lowongan-kerja/poster/{$poster}");
				}

				$this->campuran->tambah_riwayat('Y',"Menghapus lowongan kerja ID {$id_loker}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus lowongan kerja berhasil.'];
			}
			else
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Jangan ngehack mastah, please :('];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID loker tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function notifikasi_sudah_dilihat()
	{
		$this->_akses_ajax();
	}

	public function preview_artikel($id_artikel)
	{
		if ($this->artikel->cek_valid_anggota_preview_artikel($id_artikel))
		{
			if ($this->artikel->cek_akses_artikel_pengguna($id_artikel))
			{
				$data = ['artikel' => $this->artikel->ambil_untuk_anggota_preview_artikel($id_artikel)];

				$this->load->view('anggota/artikel/preview',$data);
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_error('Artikel tidak ditemukan atau artikelnya sudah aktif.',404,'404');
		}
	}

	public function preview_diskusi($id_diskusi)
	{
		if ($this->diskusi->cek_valid_anggota_preview_diskusi($id_diskusi))
		{
			if ($this->diskusi->cek_akses($id_diskusi))
			{
				$data = ['diskusi' => $this->diskusi->ambil_untuk_anggota_preview_diskusi($id_diskusi)];

				$this->load->view('anggota/diskusi/preview',$data);
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_error('Diskusi tidak ditemukan atau diskusinya sudah aktif.',404,'404');
		}
	}

	public function preview_lowongan_kerja($id_loker)
	{
		if ($this->loker->cek_valid_anggota_preview_loker($id_loker))
		{
			if ($this->loker->cek_akses_loker_pengguna($id_loker))
			{
				$data = ['loker' => $this->loker->ambil_untuk_anggota_preview_loker($id_loker)];

				$this->load->view('anggota/lowongan-kerja/preview',$data);
			}
			else
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
		}
		else
		{
			show_error('Lowongan kerja tidak ditemukan atau lowongan kerjanya sudah aktif.',404,'404');
		}
	}

	public function panduan()
	{
		$this->load->view('anggota/lainnya/panduan');
	}
}
