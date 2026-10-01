<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH.'vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';

class C_pengurus_ang_2019 extends CI_Controller
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

		if (!$this->session->has_userdata('ang_pengurus'))
		{
			if ($this->session->has_userdata('ang_anggota'))
			{
				redirect('anggota');
			}
			else
			{
				redirect();
			}
		}

		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);
		$this->purifier = $purifier;
	}

	private function _ctoken_baru()
	{
		return ['ctoken' => $this->security->get_csrf_hash()];
	}

	private function _encode_dengan_token($data)
	{
		echo json_encode(array_merge($data,$this->_ctoken_baru()));
	}

	// Khusus level superadmin
	private function _khusus_superadmin($tipe)
	{
		if ($this->session->ang_level !== 'superadmin')
		{
			if ($tipe === 'proses')
			{
				show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
			}
			elseif ($tipe === 'halaman')
			{
				show_error('Maaf anda tidak mempunyai akses untuk membuka halaman ini.',403,'403');
			}
			else
			{
				show_error('403',403,'403');
			}
		}
	}

	private function _akses_ajax($pengurus = FALSE)
	{
		if ($pengurus)
		{
			$this->_khusus_superadmin('proses');
		}

		if ($this->input->method(TRUE) !== 'POST' || !$this->input->post())
		{
			show_error('Maaf anda tidak mempunyai akses untuk menjalankan proses ini.',403,'403');
		}
	}

	private function _buat_backup($tabel,$konfig)
	{
		$this->load->dbutil();

		$backup = $this->dbutil->backup($konfig);

		$this->load->helper('file');
		write_file('./perpustakaan/berkas/backup-'.date('d_m_Y-H_i_s').'.sql',$backup);

		$this->load->helper('download');
		$this->campuran->tambah_riwayat('Y',"Membackup database.");
		force_download('backup-'.date('d_m_Y-H_i_s').'.sql',$backup);
	}

	public function index()
	{
		$this->load->view('pengurus/dashboard');
	}

	public function artikel()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/artikel/awal');
	}

	public function data_artikel()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->artikel->data($this->input->post());
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
				$rinci = '<a href="'.site_url("area-pengurus/artikel/preview/{$d->id_artikel}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Preview">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}

			$rdata[] = [
				++$nomor,
				$d->judul,
				ucwords($d->status),
				$d->penginput,
				"{$rinci}
				<a href='".site_url("area-pengurus/artikel/ubah/{$d->id_artikel}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_artikel('{$d->id_artikel}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->artikel->jumlah(),
			'recordsFiltered' => $this->artikel->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_artikel()
	{
		$this->load->view('pengurus/artikel/tambah');
	}

	public function proses_tambah_artikel()
	{
		$this->_akses_ajax();

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
					'rules'  => 'required|trim|in_list[konsep,publikasi]',
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
			$stts = $this->input->post('aksi',TRUE) === 'publikasi' ? 'aktif' : 'konsep';
			$tags = strtolower($this->input->post('tags',TRUE));
			$data = [
				'thumb'           => $thumb,
				'judul'           => $judul,
				'slug'            => $this->ang->bikin_slug($judul,'artikel'),
				'tags'            => $tags,
				'kategori'        => $this->input->post('kategori',TRUE),
				'isi'             => $_isi_,
				'status'          => $stts,
				'tanggal_posting' => date('Y-m-d'),
				'jam_posting'     => date('H:i:s'),
				'penginput'       => $this->session->ang_nama_pengguna
			];

			$this->db->insert('artikel',$data);
			$this->ang->cek_tambah_hapus_tags($tags);
			$this->campuran->tambah_riwayat('Y',"Menambah artikel berjudul \"{$judul}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah artikel berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_artikel()
	{
		$this->_akses_ajax();

		$id_artikel = $this->input->post('id_artikel',TRUE);

		if ($this->artikel->cek_artikel($id_artikel))
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
						'rules'  => 'required|trim|in_list[konsep,aktif,tidak aktif,tidak disetujui]',
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
				$istatus = $this->input->post('status',TRUE);

				// Awal fungsi untuk mengambil gambar pertama dan dipakai sebagai thumbnail
				preg_match_all('/<img .*?(?=src)src=\"([^\"]+)\"/si',$__isi__,$semua_gambar);
				if (isset($semua_gambar[1][0])) $_thumb_ = $semua_gambar[1][0];
				// Akhir fungsi untuk mengambil gambar pertama dan dipakai sebagai thumbnail

				$judul = $this->ang->ci($this->input->post('judul',TRUE));
				$tags = strtolower($this->input->post('tags',TRUE));
				$data = [
					'thumb'                 => $_thumb_,
					'judul'                 => $judul,
					'tags'                  => $tags,
					'kategori'              => $this->input->post('kategori',TRUE),
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

				$this->db->update('artikel',$data,['id_artikel' => $id_artikel]);
				$this->ang->cek_tambah_hapus_tags($tags);
				$this->campuran->tambah_riwayat('Y',"Mengubah artikel ID {$id_artikel}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah artikel berhasil.'];
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
			$data = [
				'data' => $this->artikel->ambil($id_artikel)
			];

			$this->load->view('pengurus/artikel/ubah',$data);
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
			$judul     = $this->artikel->ambil_judul($id_artikel);
			$penginput = $this->artikel->ambil_penginput($id_artikel);

			$this->db->delete('artikel',['id_artikel' => $id_artikel]);

			if ($penginput != $this->session->ang_nama_pengguna)
			{
				$this->notifikasi->input($penginput,"Artikel anda yang berjudul <q>{$judul}</q> telah dihapus oleh pengurus.",'artikel');
			}

			$this->ang->hapus_tags_tidak_terpakai();
			$this->campuran->tambah_riwayat('Y',"Menghapus artikel ID {$id_artikel}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus artikel berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_suka_artikel()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->ds_artikel->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->id_artikel,
				$d->pengguna != '' ? $d->pengguna : '-',
				$this->ang->tanggal_indonesia($d->tanggal).' ('.$d->jam.' WIB)',
				"<button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_data_suka('{$d->id_ds_artikel}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->ds_artikel->jumlah(),
			'recordsFiltered' => $this->ds_artikel->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function hapus_data_suka_artikel()
	{
		$this->_akses_ajax();

		$id_data_suka = $this->input->post('id_data_suka',TRUE);

		if ($this->ds_artikel->cek_ds_artikel($id_data_suka))
		{
			$this->db->delete('ds_artikel',['id_ds_artikel' => $id_data_suka]);
			$this->campuran->tambah_riwayat('Y',"Menghapus data suka artikel ID {$id_data_suka}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus data suka artikel berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID data suka artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function kategori_artikel()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/artikel/kategori/awal');
	}

	public function data_kategori_artikel()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->kategori->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->kategori,
				"<a href='".site_url("area-pengurus/artikel/kategori/ubah/{$d->kategori}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_kategori('{$d->kategori}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->kategori->jumlah(),
			'recordsFiltered' => $this->kategori->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_kategori_artikel()
	{
		$this->load->view('pengurus/artikel/kategori/tambah');
	}

	public function proses_tambah_kategori_artikel()
	{
		$this->_akses_ajax();

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'kategori',
					'label'  => 'Kategori Artikel',
					'rules'  => 'required|trim|min_length[2]|max_length[100]|is_unique[kategori.kategori]|alpha_numeric_spaces',
					'errors' => [
						'required'             => '{field} wajib di isi.',
						'min_length'           => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length'           => 'Panjang {field} tidak boleh melebihi {param}.',
						'is_unique'            => '{field} sudah terdaftar.',
						'alpha_numeric_spaces' => '{field} hanya boleh di isi angka, huruf dan spasi'
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
			$kategori = $this->input->post('kategori',TRUE);

			$this->db->insert('kategori',['kategori' => $kategori]);
			$this->campuran->tambah_riwayat('Y',"Menambah kategori artikel \"{$kategori}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah kategori artikel berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_kategori_artikel()
	{
		$this->_akses_ajax();

		$kategori_lama = $this->input->post('kategori_lama',TRUE);
		$kategori_baru = $this->input->post('kategori',TRUE);

		if ($this->kategori->cek_kategori($kategori_lama))
		{
			if ($kategori_lama == $kategori_baru)
			{
				$this->form_validation->set_rules('kategori','Kategori Artikel','required|trim|min_length[2]|max_length[100]|is_unique[kategori.kategori]|alpha_numeric_spaces',
					[
						'required'             => '{field} wajib di isi.',
						'min_length'           => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length'           => 'Panjang {field} tidak boleh melebihi {param}.',
						'is_unique'            => '{field} tidak boleh sama dengan yang ada apa pada inputan.',
						'alpha_numeric_spaces' => '{field} hanya boleh di isi angka, huruf dan spasi'
					]
				);
			}
			else
			{
				$this->form_validation->set_rules('kategori','Kategori Artikel','required|trim|min_length[2]|max_length[100]|is_unique[kategori.kategori]|alpha_numeric_spaces',
					[
						'required'             => '{field} wajib di isi.',
						'min_length'           => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length'           => 'Panjang {field} tidak boleh melebihi {param}.',
						'is_unique'            => '{field} sudah terdaftar.',
						'alpha_numeric_spaces' => '{field} hanya boleh di isi angka, huruf dan spasi'
					]
				);
			}

			if ($this->form_validation->run() === FALSE)
			{
				$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
			}
			else
			{
				$this->db->update('kategori',['kategori' => $kategori_baru],['kategori' => $kategori_lama]);
				$this->campuran->tambah_riwayat('Y',"Mengubah kategori artikel \"{$kategori_lama}\".");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah kategori artikel berhasil.'];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Nama kategori tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_kategori_artikel($kategori)
	{
		if ($this->kategori->cek_kategori(urldecode($kategori)))
		{
			$this->load->view('pengurus/artikel/kategori/ubah');
		}
		else
		{
			show_404();
		}
	}

	public function hapus_kategori_artikel()
	{
		$this->_akses_ajax();

		$kategori = $this->input->post('kategori',TRUE);

		if ($this->kategori->cek_kategori($kategori))
		{
			$this->db->delete('kategori',['kategori' => $kategori]);
			$this->campuran->tambah_riwayat('Y',"Menghapus kategori {$kategori}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus kategori artikel berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Nama kategori tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function komentar_artikel()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/artikel/komentar');
	}

	public function data_komentar_artikel()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->k_artikel->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$_aksi = '';

			if ($d->diblok == 'N')
			{
				$_aksi = "<button type='button' class='btn btn-warning btn-xs waves-effect' onclick=\"blok_komentar('{$d->id_k_artikel}');\" data-toggle='tooltip' data-placement='top' title='Blokir'>
					<i class='material-icons'>block</i>
				</button>";
			}
			else
			{
				$_aksi = "<button type='button' class='btn btn-warning btn-xs waves-effect' onclick=\"unblok_komentar('{$d->id_k_artikel}');\" data-toggle='tooltip' data-placement='top' title='UN-Blokir'>
					<i class='material-icons'>autorenew</i>
				</button>";
			}

			$rdata[] = [
				++$nomor,
				"<a href='".site_url("artikel/{$d->id_artikel}/".$this->artikel->ambil_slug($d->id_artikel))."' target='_blank'>{$d->id_artikel}</a>",
				$d->pengguna,
				$d->diblok,
				"{$_aksi}
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_komentar('{$d->id_k_artikel}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->k_artikel->jumlah(),
			'recordsFiltered' => $this->k_artikel->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function blok_komentar_artikel()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_artikel->cek_k_artikel($id_komentar))
		{
			$kondisi = ['id_k_artikel' => $id_komentar];

			$this->db->update('k_artikel',['diblok' => 'Y'],$kondisi);
			$this->campuran->tambah_riwayat('Y',"Memblokir komentar artikel ID {$id_komentar}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Memblokir komentar artikel berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function unblok_komentar_artikel()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_artikel->cek_k_artikel($id_komentar))
		{
			$kondisi = ['id_k_artikel' => $id_komentar];

			$this->db->update('k_artikel',['diblok' => 'N'],$kondisi);
			$this->campuran->tambah_riwayat('Y',"Membuka blokir komentar artikel ID {$id_komentar}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Mengunblokir komentar artikel berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_komentar_artikel()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_artikel->cek_k_artikel($id_komentar))
		{
			$this->db->delete('k_artikel',['id_k_artikel' => $id_komentar]);
			$this->campuran->tambah_riwayat('Y',"Menghapus komentar artikel ID {$id_komentar}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus komentar artikel berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_suka_komentar_artikel()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->dsk_artikel->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->id_komentar,
				$d->pengguna != '' ? $d->pengguna : '-',
				$this->ang->tanggal_indonesia($d->tanggal).' ('.$d->jam.' WIB)',
				"<button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_data_suka('{$d->id_dsk_artikel}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->dsk_artikel->jumlah(),
			'recordsFiltered' => $this->dsk_artikel->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function hapus_data_suka_komentar_artikel()
	{
		$this->_akses_ajax();

		$id_data_suka = $this->input->post('id_data_suka',TRUE);

		if ($this->dsk_artikel->cek_dsk_artikel($id_data_suka))
		{
			$this->db->delete('dsk_artikel',['id_dsk_artikel' => $id_data_suka]);
			$this->campuran->tambah_riwayat('Y',"Menghapus data suka komentar artikel ID {$id_data_suka}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus data suka komentar artikel berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID data suka komentar artikel tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function diskusi()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/diskusi/awal');
	}

	public function data_diskusi()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->diskusi->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$_aksi = '';
			$rinci = '';

			if ($this->session->ang_nama_pengguna === $d->penginput)
			{
				$_aksi = "<a href='".site_url("area-pengurus/diskusi/ubah/{$d->id_diskusi}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
		      <i class='material-icons'>edit</i>
		    </a>";
			}

			if ($d->status === 'aktif')
			{
		    $rinci = '<a href="'.site_url("diskusi/{$d->id_diskusi}/{$d->slug}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Rincian" target="_blank">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}
			else
			{
				$rinci = '<a href="'.site_url("area-pengurus/diskusi/preview/{$d->id_diskusi}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Preview">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}

			$rdata[] = [
				++$nomor,
				$d->judul,
				ucwords($d->status),
				$d->penginput,
				"{$rinci}
				{$_aksi}
				<button type='button' class='btn btn-xs btn-info waves-effect' onclick=\"ubah_status_diskusi('{$d->id_diskusi}');\" data-toggle='tooltip' data-placement='top' title='Ubah Status'>
        	<i class='material-icons'>cached</i>
        </button>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_diskusi('{$d->id_diskusi}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->diskusi->jumlah(),
			'recordsFiltered' => $this->diskusi->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_diskusi()
	{
		$this->load->view('pengurus/diskusi/tambah');
	}

	public function proses_tambah_diskusi()
	{
		$this->_akses_ajax();

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
			$tags = strtolower($this->input->post('tags',TRUE));
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

			$this->db->insert('diskusi',$data);
			$this->ang->cek_tambah_hapus_tags($tags);
			$this->campuran->tambah_riwayat('Y',"Menambah diskusi berjudul \"{$judul}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah diskusi berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_status_diskusi()
	{
		$this->_akses_ajax();

		$id_diskusi = $this->input->post('id_diskusi',TRUE);

		if ($this->diskusi->cek_diskusi($id_diskusi))
		{
			$kondisi = ['id_diskusi' => $id_diskusi];

			if ($this->diskusi->ambil_status($id_diskusi) === 'aktif')
			{
				$this->db->update('diskusi',['status' => 'tidak aktif', 'terakhir_diperbaharui' => date('Y-m-d H:i:s')],$kondisi);
				$this->campuran->tambah_riwayat('Y',"Mengubah status diskusi ID {$id_diskusi} menjadi tidak aktif.");
			}
			else
			{
				$this->db->update('diskusi',['status' => 'aktif', 'terakhir_diperbaharui' => date('Y-m-d H:i:s')],$kondisi);
				$this->campuran->tambah_riwayat('Y',"Mengubah status diskusi ID {$id_diskusi} menjadi aktif.");
			}

			$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah status diskusi berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_diskusi()
	{
		$this->_akses_ajax();

		$id_diskusi = $this->input->post('id_diskusi',TRUE);

		if ($this->diskusi->cek_diskusi($id_diskusi))
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
				$tags = strtolower($this->input->post('tags',TRUE));
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

				$this->db->update('diskusi',$data,['id_diskusi' => $id_diskusi]);
				$this->ang->cek_tambah_hapus_tags($tags);
				$this->campuran->tambah_riwayat('Y',"Mengubah diskusi ID {$id_diskusi}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah diskusi berhasil.'];
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
		if ($this->diskusi->cek_akses($id_diskusi))
		{
			if ($this->diskusi->cek_diskusi($id_diskusi))
			{
				$data = ['data' => $this->diskusi->ambil($id_diskusi)];
				$this->load->view('pengurus/diskusi/ubah',$data);
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

	public function hapus_diskusi()
	{
		$this->_akses_ajax();

		$id_diskusi = $this->input->post('id_diskusi',TRUE);

		if ($this->diskusi->cek_diskusi($id_diskusi))
		{
			$judul     = $this->diskusi->ambil_judul($id_diskusi);
			$penginput = $this->diskusi->ambil_penginput($id_diskusi);

			$this->db->delete('diskusi',['id_diskusi' => $id_diskusi]);

			if ($penginput != $this->session->ang_nama_pengguna)
			{
				$this->notifikasi->input($penginput,"Diskusi anda yang berjudul <q>{$judul}</q> telah dihapus pengurus.",'diskusi');
			}

			$this->ang->hapus_tags_tidak_terpakai();
			$this->campuran->tambah_riwayat('Y',"Menghapus diskusi ID {$id_diskusi}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus diskusi berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_suka_diskusi()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->ds_diskusi->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->id_diskusi,
				$d->pengguna != '' ? $d->pengguna : '-',
				$this->ang->tanggal_indonesia($d->tanggal).' ('.$d->jam.' WIB)',
				"<button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_data_suka('{$d->id_ds_diskusi}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->ds_diskusi->jumlah(),
			'recordsFiltered' => $this->ds_diskusi->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function hapus_data_suka_diskusi()
	{
		$this->_akses_ajax();

		$id_data_suka = $this->input->post('id_data_suka',TRUE);

		if ($this->ds_diskusi->cek_ds_diskusi($id_data_suka))
		{
			$this->db->delete('ds_diskusi',['id_ds_diskusi' => $id_data_suka]);
			$this->campuran->tambah_riwayat('Y',"Menghapus data suka diskusi ID {$id_data_suka}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus data suka diskusi berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID data suka diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function jawaban_diskusi()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/diskusi/jawaban');
	}

	public function data_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->j_diskusi->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$_aksi = '';

			if ($d->diblok == 'N')
			{
				$_aksi = "<button type='button' class='btn btn-warning btn-xs waves-effect' onclick=\"blok_jawaban('{$d->id_j_diskusi}');\" data-toggle='tooltip' data-placement='top' title='Blokir'>
					<i class='material-icons'>block</i>
				</button>";
			}
			else
			{
				$_aksi = "<button type='button' class='btn btn-warning btn-xs waves-effect' onclick=\"unblok_jawaban('{$d->id_j_diskusi}');\" data-toggle='tooltip' data-placement='top' title='UN-Blokir'>
					<i class='material-icons'>autorenew</i>
				</button>";
			}

			$rdata[] = [
				++$nomor,
				"<a href='".site_url("diskusi/{$d->id_diskusi}/".$this->diskusi->ambil_slug($d->id_diskusi))."' target='_blank'>{$d->id_diskusi}</a>",
				$d->pengguna,
				$d->diblok,
				"{$_aksi}
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_jawaban('{$d->id_j_diskusi}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->j_diskusi->jumlah(),
			'recordsFiltered' => $this->j_diskusi->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function blok_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$id_jawaban = $this->input->post('id_jawaban',TRUE);

		if ($this->j_diskusi->cek_j_diskusi($id_jawaban))
		{
			$kondisi = ['id_j_diskusi' => $id_jawaban];

			$this->db->update('j_diskusi',['diblok' => 'Y'],$kondisi);
			$this->campuran->tambah_riwayat('Y',"Memblokir jawaban diskusi ID {$id_jawaban}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Memblokir jawaban diskusi berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Jawaban diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function unblok_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$id_jawaban = $this->input->post('id_jawaban',TRUE);

		if ($this->j_diskusi->cek_j_diskusi($id_jawaban))
		{
			$kondisi = ['id_j_diskusi' => $id_jawaban];

			$this->db->update('j_diskusi',['diblok' => 'N'],$kondisi);
			$this->campuran->tambah_riwayat('Y',"Mengunblokir jawaban diskusi ID {$id_jawaban}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Mengunblokir jawaban diskusi berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Jawaban diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$id_jawaban = $this->input->post('id_jawaban',TRUE);

		if ($this->j_diskusi->cek_j_diskusi($id_jawaban))
		{
			$this->db->delete('j_diskusi',['id_j_diskusi' => $id_jawaban]);
			$this->campuran->tambah_riwayat('Y',"Menghapus jawaban diskusi ID {$id_jawaban}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus jawaban diskusi berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Jawaban diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_suka_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->dsjd->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->id_jawaban,
				$d->pengguna != '' ? $d->pengguna : '-',
				$this->ang->tanggal_indonesia($d->tanggal).' ('.$d->jam.' WIB)',
				"<button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_data_suka('{$d->id_dsjd}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->dsjd->jumlah(),
			'recordsFiltered' => $this->dsjd->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function hapus_data_suka_jawaban_diskusi()
	{
		$this->_akses_ajax();

		$id_data_suka = $this->input->post('id_data_suka',TRUE);

		if ($this->dsjd->cek_dsjd($id_data_suka))
		{
			$this->db->delete('dsjd',['id_dsjd' => $id_data_suka]);
			$this->campuran->tambah_riwayat('Y',"Menghapus data suka jawaban diskusi ID {$id_data_suka}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus data suka jawaban diskusi berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID data suka jawaban diskusi tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function pengguna()
	{
		$this->db->query("DELETE FROM {$this->db->dbprefix('pyd')} WHERE DATEDIFF(NOW(), waktu) > 0");

		$this->load->library('user_agent');
		$this->load->view('pengurus/pengguna/awal');
	}

	public function data_pengguna()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->pengguna->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->nama_pengguna,
				$d->nama_lengkap ?? '-',
				$d->jenis_kelamin ?? '-',
				$d->level,
				$d->aktif === 'Y' ? "<i class='material-icons mi-14'>done</i>" : "<i class='material-icons mi-14'>close</i>",
				"<a href='".site_url("anggota/{$d->nama_pengguna}")."' target='_blank' class='btn btn-xs bg-teal waves-effect' data-toggle='tooltip' data-placement='top' title='Rincian'>
          <i class='material-icons'>remove_red_eye</i>
        </a>
        <button type='button' class='btn btn-xs btn-info waves-effect' onclick=\"ubah_status_pengguna('{$d->nama_pengguna}');\" data-toggle='tooltip' data-placement='top' title='Ubah Status'>
        	<i class='material-icons'>cached</i>
        </button>
				<a href='".site_url("area-pengurus/pengguna/ubah/{$d->nama_pengguna}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_pengguna('{$d->nama_pengguna}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->pengguna->jumlah(),
			'recordsFiltered' => $this->pengguna->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_pengguna()
	{
		$this->_khusus_superadmin('halaman');

		$this->load->view('pengurus/pengguna/tambah');
	}

	public function proses_tambah_pengguna()
	{
		$this->_akses_ajax(TRUE);

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
					'field'  => 'kata_sandi',
					'label'  => 'Kata Sandi',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				],
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
					'field'  => 'level',
					'label'  => 'Level',
					'rules'  => 'required|trim|in_list[anggota,admin,superadmin]',
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
			$nama_pengguna = $this->input->post('nama_pengguna',TRUE);
			$all_blacklist = ['semua','keluar','artikel','diskusi','pencapaian','sertifikat'];

			if (in_array(strtolower($nama_pengguna), $all_blacklist))
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Nama pengguna tidak diperbolehkan.'];
			}
			else
			{
				$data = [
					'nama_pengguna'         => $nama_pengguna,
					'kata_sandi'            => password_hash($this->input->post('kata_sandi',TRUE),PASSWORD_BCRYPT,['cost' => 13]),
					'nama_lengkap'          => $this->input->post('nama_lengkap',TRUE),
					'jenis_kelamin'         => $this->input->post('jenis_kelamin',TRUE),
					'status'                => $this->input->post('status',TRUE),
					'level'                 => $this->input->post('level',TRUE),
					'aktif'                 => 'Y',
					'tanggal_bergabung'     => date('Y-m-d'),
					'tanggal_terverifikasi' => date('Y-m-d')
				];

				$this->db->insert('pengguna',$data);

				$this->campuran->tambah_riwayat('Y',"Menambah pengguna dengan nama pengguna \"{$nama_pengguna}\".");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah pengguna berhasil.'];
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_status_pengguna()
	{
		$this->_akses_ajax(TRUE);

		$nama_pengguna = $this->input->post('nama_pengguna',TRUE);

		if ($this->pengguna->cek_nama_pengguna($nama_pengguna))
		{
			$kondisi = ['nama_pengguna' => $nama_pengguna];

			if ($this->pengguna->ambil_aktif($nama_pengguna) === 'Y')
			{
				$this->db->update('pengguna',['aktif' => 'N'],$kondisi);
				$this->campuran->tambah_riwayat('Y',"Mengubah status \"{$nama_pengguna}\" menjadi tidak aktif.");
			}
			else
			{
				$this->db->update('pengguna',['aktif' => 'Y'],$kondisi);
				$this->campuran->tambah_riwayat('Y',"Mengubah status \"{$nama_pengguna}\" menjadi aktif.");
			}

			$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah status pengguna berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Nama pengguna tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_pengguna()
	{
		$this->_akses_ajax(TRUE);

		$nama_pengguna = $this->input->post('nama_pengguna',TRUE);

		if ($this->pengguna->cek_nama_pengguna($nama_pengguna))
		{
			$all_blacklist = ['semua','keluar','artikel','diskusi','pencapaian','sertifikat'];

			if (in_array(strtolower($nama_pengguna), $all_blacklist))
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Nama pengguna tidak diperbolehkan.'];
			}
			else
			{
				$foto_lama  = $this->pengguna->ambil_foto($nama_pengguna);
				$email_lama = $this->pengguna->ambil_email($nama_pengguna);
				$ubah_foto  = FALSE;
				$foto_baru  = '';

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
						],
						[
							'field'  => 'level',
							'label'  => 'Level',
							'rules'  => 'required|trim|in_list[anggota,admin,superadmin]',
							'errors' => [
								'required' => '{field} wajib di isi.',
								'in_list'  => 'Isi {field} tidak valid.'
							]
						]
					]
				);

				if ($email_lama == $this->input->post('email',TRUE))
				{
					$this->form_validation->set_rules('email','Email','required|trim|min_length[5]|max_length[100]|valid_email',
						[
							'required'    => '{field} wajib di isi.',
							'min_length'  => 'Panjang {field} tidak boleh kurang dari {param}.',
							'max_length'  => 'Panjang {field} tidak boleh melebihi {param}.',
							'valid_email' => '{field} tidak valid.'
						]
					);
				}
				else
				{
					$this->form_validation->set_rules('email','Email','required|trim|min_length[5]|max_length[100]|is_unique[pengguna.email]|valid_email',
						[
							'required'    => '{field} wajib di isi.',
							'min_length'  => 'Panjang {field} tidak boleh kurang dari {param}.',
							'max_length'  => 'Panjang {field} tidak boleh melebihi {param}.',
							'is_unique'   => '{field} sudah terdaftar.',
							'valid_email' => '{field} tidak valid.'
						]
					);
				}

				if ($this->form_validation->run() === FALSE)
				{
					$this->respon = ['sukses' => FALSE,'pesan' => substr(validation_errors(),0,-2)];
				}
				else
				{
					$data = [
						'nama_lengkap'    => $this->input->post('nama_lengkap',TRUE),
						'tentang'         => $this->input->post('tentang',TRUE),
						'alamat'          => $this->input->post('alamat',TRUE),
						'jenis_kelamin'   => $this->input->post('jenis_kelamin',TRUE),
						'status'          => $this->input->post('status',TRUE),
						'email'           => $this->input->post('email',TRUE),
						'website_pribadi' => $this->input->post('website_pribadi',TRUE),
						'akun_medsos'     => $this->input->post('akun_medsos',TRUE),
						'level'           => $this->input->post('level',TRUE)
					];

					if ($this->input->post('kata_sandi',TRUE) != '')
					{
						$data = array_merge($data,['kata_sandi' => password_hash($this->input->post('kata_sandi',TRUE),PASSWORD_BCRYPT,['cost' => 13])]);
					}

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

						$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah pengguna berhasil.','ubah_foto' => TRUE,'foto_baru' => $foto_baru];
					}
					else
					{
						$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah pengguna berhasil.','ubah_foto' => FALSE];
					}

					if ($this->session->ang_nama_pengguna !== $nama_pengguna)
					{
						$this->campuran->tambah_riwayat('Y',"Mengubah data diri \"{$nama_pengguna}\".");
					}
				}
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Nama pengguna tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_pengguna($nama_pengguna)
	{
		if ($this->pengguna->cek_nama_pengguna($nama_pengguna))
		{
			$data = ['data' => $this->pengguna->ambil($nama_pengguna)];
			$this->load->view('pengurus/pengguna/ubah',$data);
		}
		else
		{
			show_404();
		}
	}

	public function hapus_pengguna()
	{
		$this->_akses_ajax(TRUE);

		$nama_pengguna = $this->input->post('nama_pengguna',TRUE);
		$foto_pengguna = $this->pengguna->ambil_foto($nama_pengguna);

		if ($this->pengguna->cek_nama_pengguna($nama_pengguna))
		{
			$this->db->delete('pengguna',['nama_pengguna' => $nama_pengguna]);

			if ($foto_pengguna !== NULL)
			{
				$this->ang->unlink("./media/foto-pengguna/{$foto_pengguna}");
			}

			$this->campuran->tambah_riwayat('Y',"Menghapus pengguna `{$nama_pengguna}`.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus pengguna berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Nama pengguna tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function suara_anggota()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/lainnya/suara');
	}

	public function data_suara_anggota()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->suara->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$_aksi = '';

			if ($d->status == 'aktif' || $d->status == 'tidak aktif')
			{
				$_aksi = "<button type='button' class='btn btn-xs btn-info waves-effect' onclick=\"ubah_status_suara('{$d->id_suara}');\" data-toggle='tooltip' data-placement='top' title='Ubah Status'>
        	<i class='material-icons'>cached</i>
        </button>";
			}
			elseif ($d->status == 'menunggu persetujuan')
			{
				$_aksi = "<button type='button' class='btn btn-xs bg-teal waves-effect' onclick=\"setujui_suara('{$d->id_suara}');\" data-toggle='tooltip' data-placement='top' title='Setujui'>
        	<i class='material-icons'>done</i>
        </button>
        <button type='button' class='btn btn-xs btn-warning waves-effect' onclick=\"tidak_setujui_suara('{$d->id_suara}');\" data-toggle='tooltip' data-placement='top' title='Tidak Setujui'>
        	<i class='material-icons'>highlight_off</i>
        </button>";
			}
			elseif ($d->status == 'tidak disetujui')
			{
				$_aksi = "<button type='button' class='btn btn-xs bg-teal waves-effect' onclick=\"setujui_suara('{$d->id_suara}');\" data-toggle='tooltip' data-placement='top' title='Setujui'>
        	<i class='material-icons'>done</i>
        </button>";
			}

			$rdata[] = [
				++$nomor,
				$d->pengguna,
				$d->isi,
				ucwords($d->status),
				"{$_aksi}
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_suara('{$d->id_suara}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->suara->jumlah(),
			'recordsFiltered' => $this->suara->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function ubah_status_suara_anggota()
	{
		$this->_akses_ajax();

		$id_suara = $this->input->post('id_suara',TRUE);

		if ($this->suara->cek_suara($id_suara))
		{
			$kondisi = ['id_suara' => $id_suara];

			if ($this->suara->ambil_status($id_suara) === 'aktif')
			{
				$this->db->update('suara',['status' => 'tidak aktif'],$kondisi);
				$this->campuran->tambah_riwayat('Y',"Mengubah status suara ID {$id_suara} menjadi tidak aktif.");
			}
			else
			{
				$this->db->update('suara',['status' => 'aktif'],$kondisi);
				$this->campuran->tambah_riwayat('Y',"Mengubah status suara ID {$id_suara} menjadi aktif.");
			}

			$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah status suara berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID suara tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function setujui_suara_anggota()
	{
		$this->_akses_ajax();

		$id_suara = $this->input->post('id_suara',TRUE);

		if ($this->suara->cek_suara($id_suara))
		{
			$this->db->update('suara',['status' => 'aktif'],['id_suara' => $id_suara]);
			$this->campuran->tambah_riwayat('Y',"Menyetujui suara ID {$id_suara}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Menyetujui suara berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID suara tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function tidak_setujui_suara_anggota()
	{
		$this->_akses_ajax();

		$id_suara = $this->input->post('id_suara',TRUE);

		if ($this->suara->cek_suara($id_suara))
		{
			$this->db->update('suara',['status' => 'tidak disetujui'],['id_suara' => $id_suara]);
			$this->campuran->tambah_riwayat('Y',"Mentidak setujui suara ID {$id_suara}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Mentidak setujui suara berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID suara tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_suara_anggota()
	{
		$this->_akses_ajax();

		$id_suara = $this->input->post('id_suara',TRUE);

		if ($this->suara->cek_suara($id_suara))
		{
			$this->db->delete('suara',['id_suara' => $id_suara]);
			$this->campuran->tambah_riwayat('Y',"Menghapus suara ID {$id_suara}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus suara berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID suara tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function pencapaian()
	{
		$this->_khusus_superadmin('halaman');
		$this->load->library('user_agent');
		$this->load->view('pengurus/pencapaian/awal');
	}

	public function data_pencapaian()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->pencapaian->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->nama_pencapaian,
				ucwords($d->tipe),
				$d->target,
				"<a href='".base_url("media/pencapaian/{$d->gambar}")."' target='_blank' class='btn btn-xs bg-teal waves-effect' data-toggle='tooltip' data-placement='top' title='Lihat Pencapaian'>
	        <i class='material-icons'>remove_red_eye</i>
	      </a>
				<a href='".site_url("area-pengurus/pencapaian/ubah/{$d->id_pencapaian}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_pencapaian('{$d->id_pencapaian}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->pencapaian->jumlah(),
			'recordsFiltered' => $this->pencapaian->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_pencapaian()
	{
		$this->_khusus_superadmin('halaman');

		$this->load->view('pengurus/pencapaian/tambah');
	}

	public function proses_tambah_pencapaian()
	{
		$this->_akses_ajax(TRUE);

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'nama_pencapaian',
					'label'  => 'Nama Pencapaian',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'tipe',
					'label'  => 'Tipe',
					'rules'  => 'required|trim|in_list[kustom,untuk jumlah posting,untuk jumlah kontribusi,untuk jumlah poin diskusi,untuk jumlah poin belajar,kalkulasi 3 jumlah]',
					'errors' => [
						'required' => '{field} wajib di isi.',
						'in_list' => 'Isi {field} tidak valid.'
					]
				],
				[
					'field'  => 'target',
					'label'  => 'Target Jumlah/Poin/Kalkulasi',
					'rules'  => 'required|trim|greater_than_equal_to[1]|integer',
					'errors' => [
						'required'              => '{field} wajib di isi.',
						'integer'               => '{field} harus berupa angka.',
						'greater_than_equal_to' => '{field} harus lebih atau sama dengan {param}.'
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
				'nama_pencapaian' => $this->input->post('nama_pencapaian',TRUE),
				'tipe'            => $this->input->post('tipe',TRUE),
				'target'          => $this->input->post('target',TRUE)
			];

			$konfigurasi = [
				'upload_path'   => './media/pencapaian/',
				'allowed_types' => 'gif|jpg|jpeg|png|bmp',
				'max_size'      => 1024,
				'min_width'     => 300,
				'min_height'    => 300,
				'encrypt_name'  => TRUE,
				'remove_spaces' => TRUE
			];

			$this->upload->initialize($konfigurasi);

			if (!$this->upload->do_upload('gambar'))
			{
				$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk pencapaian adalah 1MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

				echo $this->_encode_dengan_token($this->respon);
				exit;
			}
			else
			{
				$gambar      = $this->upload->data('raw_name').'_AlwaysNgoding'.$this->upload->data('file_ext');
				$konfigurasi = [
					'image_library'  => 'gd2',
					'source_image'   => "./media/pencapaian/{$this->upload->data('file_name')}",
					'new_image'      => "./media/pencapaian/{$gambar}",
					'maintain_ratio' => TRUE,
					'thumb_marker'   => '_AlwaysNgoding',
					'width'          => 300
	      ];

	      $this->image_lib->initialize($konfigurasi);

	      if ($this->image_lib->resize())
	      {
					$data = array_merge($data,['gambar' => $gambar]);

	      	$this->ang->unlink("./media/pencapaian/{$this->upload->data('file_name')}");
	      }
	      else
	      {
	      	$this->ang->unlink("./media/pencapaian/{$this->upload->data('file_name')}");

	      	$this->respon = ['sukses' => FALSE,'pesan' => substr($this->image_lib->display_errors('',','),0,-1)];

	      	echo $this->_encode_dengan_token($this->respon);
	      	exit;
	      }
			}

			$this->db->insert('pencapaian',$data);
			$this->campuran->tambah_riwayat('Y',"Menambah pencapaian \"{$this->input->post('nama_pencapaian',TRUE)}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah pencapaian berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_pencapaian()
	{
		$this->_akses_ajax(TRUE);

		$id_pencapaian = $this->input->post('id_pencapaian',TRUE);

		if ($this->pencapaian->cek_pencapaian($id_pencapaian))
		{
			$gambar_lama = $this->pencapaian->ambil_gambar($id_pencapaian);
			$ubah_gambar = FALSE;
			$gambar_baru = '';

			$this->form_validation->set_rules(
				[
					[
						'field'  => 'nama_pencapaian',
						'label'  => 'Nama Pencapaian',
						'rules'  => 'required|trim|min_length[2]|max_length[100]',
						'errors' => [
							'required'   => '{field} wajib di isi.',
							'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
							'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
						]
					],
					[
						'field'  => 'tipe',
						'label'  => 'Tipe',
						'rules'  => 'required|trim|in_list[kustom,untuk jumlah posting,untuk jumlah kontribusi,untuk jumlah poin diskusi,untuk jumlah poin belajar,kalkulasi 3 jumlah]',
						'errors' => [
							'required' => '{field} wajib di isi.',
							'in_list'  => 'Isi {field} tidak valid.'
						]
					],
					[
						'field'  => 'target',
						'label'  => 'Target Jumlah/Poin/Kalkulasi',
						'rules'  => 'required|trim|greater_than_equal_to[1]|integer',
						'errors' => [
							'required'              => '{field} wajib di isi.',
							'integer'               => '{field} harus berupa angka.',
							'greater_than_equal_to' => '{field} harus lebih atau sama dengan {param}.'
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
					'nama_pencapaian' => $this->input->post('nama_pencapaian',TRUE),
					'tipe'            => $this->input->post('tipe',TRUE),
					'target'          => $this->input->post('target',TRUE)
				];

				$konfigurasi = [
					'upload_path'   => './media/pencapaian/',
					'allowed_types' => 'gif|jpg|jpeg|png|bmp',
					'max_size'      => 1024,
					'min_width'     => 300,
					'min_height'    => 300,
					'encrypt_name'  => TRUE,
					'remove_spaces' => TRUE
				];

				$this->upload->initialize($konfigurasi);

				if (!$this->upload->do_upload('gambar'))
				{
					if ($_FILES['gambar']['error'] != 4)
					{
						$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk pencapaian adalah 1MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

						echo $this->_encode_dengan_token($this->respon);
						exit;
					}
				}
				else
				{
					$gambar_baru = $this->upload->data('raw_name').'_AlwaysNgoding'.$this->upload->data('file_ext');
					$konfigurasi = [
						'image_library'  => 'gd2',
						'source_image'   => "./media/pencapaian/{$this->upload->data('file_name')}",
						'source_image'   => "./media/pencapaian/{$gambar_baru}",
						'maintain_ratio' => TRUE,
						'thumb_marker'   => '_AlwaysNgoding',
						'width'          => 300
		      ];

		      $this->image_lib->initialize($konfigurasi);

		      if ($this->image_lib->resize())
		      {
						$data        = array_merge($data,['gambar' => $gambar_baru]);
						$ubah_gambar = TRUE;

		      	$this->ang->unlink("./media/pencapaian/{$this->upload->data('file_name')}");
		      }
		      else
		      {
		      	$this->ang->unlink("./media/pencapaian/{$this->upload->data('file_name')}");

		      	$this->respon = ['sukses' => FALSE,'pesan' => substr($this->image_lib->display_errors('',','),0,-1)];

		      	echo $this->_encode_dengan_token($this->respon);
		      	exit;
		      }
				}

				$this->db->update('pencapaian',$data,['id_pencapaian' => $id_pencapaian]);

				if ($ubah_gambar)
				{
					if ($gambar_lama != '')
					{
						$this->ang->unlink("./media/pencapaian/{$gambar_lama}");
					}
				}

				$this->campuran->tambah_riwayat('Y',"Mengubah pencapaian ID {$id_pencapaian}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah pencapaian berhasil.'];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID pencapaian tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_pencapaian($id_pencapaian)
	{
		$this->_khusus_superadmin('halaman');

		if ($this->pencapaian->cek_pencapaian($id_pencapaian))
		{
			$data = ['data' => $this->pencapaian->ambil($id_pencapaian)];
			$this->load->view('pengurus/pencapaian/ubah',$data);
		}
		else
		{
			show_404();
		}
	}

	public function hapus_pencapaian()
	{
		$this->_akses_ajax(TRUE);

		$id_pencapaian = $this->input->post('id_pencapaian',TRUE);
		$gambarnya = $this->pencapaian->ambil_gambar($id_pencapaian);

		if ($this->pencapaian->cek_pencapaian($id_pencapaian))
		{
			$this->db->delete('pencapaian',['id_pencapaian' => $id_pencapaian]);
			$this->ang->unlink("./media/pencapaian/{$gambarnya}");
			$this->campuran->tambah_riwayat('Y',"Menghapus pencapaian ID {$id_pencapaian}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus pencapaian berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID pencapaian tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function perolehan_pencapaian()
	{
		$this->_khusus_superadmin('halaman');
		$this->load->library('user_agent');
		$this->load->view('pengurus/pencapaian/perolehan/awal');
	}

	public function data_perolehan_pencapaian()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->p_pencapaian->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->pengguna,
				$d->nama_pencapaian,
				"{$this->ang->tanggal_indonesia($d->tanggal_tercapai)} {$d->jam_tercapai} WIB",
				"<button onclick='lihatGambarPencapaian(`{$d->gambar}`);' class='btn bg-teal btn-xs waves-effect' data-toggle='tooltip' data-placement='top' title='Lihat Gambar Pencapaian'>
		      <i class='material-icons'>remove_red_eye</i>
		    </button>
		    <button onclick='hapus(`{$d->id_p_pencapaian}`);' class='btn btn-danger btn-xs waves-effect' data-toggle='tooltip' data-placement='top' title='Hapus'>
		      <i class='material-icons'>delete_forever</i>
		    </button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->p_pencapaian->jumlah(),
			'recordsFiltered' => $this->p_pencapaian->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function sertifikat()
	{
		$this->_khusus_superadmin('halaman');
		$this->load->library('user_agent');
		$this->load->view('pengurus/sertifikat/awal');
	}

	public function data_sertifikat()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->sertifikat->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->nama_sertifikat,
				"<a href='".site_url("area-pengurus/sertifikat/ubah/{$d->id_sertifikat}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_sertifikat('{$d->id_sertifikat}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->sertifikat->jumlah(),
			'recordsFiltered' => $this->sertifikat->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_sertifikat()
	{
		$this->_khusus_superadmin('halaman');

		$this->load->view('pengurus/sertifikat/tambah');
	}

	public function proses_tambah_sertifikat()
	{
		$this->_akses_ajax(TRUE);

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'nama_sertifikat',
					'label'  => 'Nama Sertifikat',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
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
			$this->db->insert('sertifikat',['nama_sertifikat' => $this->input->post('nama_sertifikat',TRUE)]);
			$this->campuran->tambah_riwayat('Y',"Menambah sertifikat \"{$this->input->post('nama_sertifikat',TRUE)}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah sertifikat berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_sertifikat()
	{
		$this->_akses_ajax(TRUE);

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'nama_sertifikat',
					'label'  => 'Nama Sertifikat',
					'rules'  => 'required|trim|min_length[2]|max_length[100]',
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
			$id_sertifikat = $this->input->post('id_sertifikat', TRUE);

			$this->db->update('sertifikat',['nama_sertifikat' => $this->input->post('nama_sertifikat',TRUE)],['id_sertifikat' => $id_sertifikat]);
			$this->campuran->tambah_riwayat('Y',"Mengubah sertifikat ID {$id_sertifikat}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah sertifikat berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_sertifikat($id_sertifikat)
	{
		$this->_khusus_superadmin('halaman');

		if ($this->sertifikat->cek_sertifikat($id_sertifikat))
		{
			$data = ['data' => $this->sertifikat->ambil($id_sertifikat)];
			$this->load->view('pengurus/sertifikat/ubah',$data);
		}
		else
		{
			show_404();
		}
	}

	public function hapus_sertifikat()
	{
		$this->_akses_ajax(TRUE);

		$id_sertifikat = $this->input->post('id_sertifikat',TRUE);

		if ($this->sertifikat->cek_sertifikat($id_sertifikat))
		{
			$this->db->delete('sertifikat',['id_sertifikat' => $id_sertifikat]);
			$this->campuran->tambah_riwayat('Y',"Menghapus sertifikat ID {$id_sertifikat}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus sertifikat berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID sertifikat tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function perolehan_sertifikat()
	{
		$this->_khusus_superadmin('halaman');
		$this->load->library('user_agent');
		$this->load->view('pengurus/sertifikat/perolehan/awal');
	}

	public function data_perolehan_sertifikat()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->p_sertifikat->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$id = urlencode(str_replace('=', '', base64_encode("sertifikat-{$d->id_p_sertifikat}")));
			$id = str_replace('%3D','',$id);
			$ls = site_url("sertifikat/{$id}");

			$rdata[] = [
				++$nomor,
				$d->pengguna,
				$d->nama_sertifikat,
				"{$this->ang->tanggal_indonesia($d->tanggal_memperoleh)} {$d->jam_memperoleh} WIB",
				"<a href='{$ls}' target='_blank' class='btn bg-teal btn-xs waves-effect' data-toggle='tooltip' data-placement='top' title='Lihat Sertifikat'>
		      <i class='material-icons'>remove_red_eye</i>
		    </a>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->p_sertifikat->jumlah(),
			'recordsFiltered' => $this->p_sertifikat->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_perolehan_sertifikat()
	{
		$this->_khusus_superadmin('halaman');

		$this->load->view('pengurus/sertifikat/perolehan/tambah');
	}

	public function proses_tambah_perolehan_sertifikat()
	{
		$this->_akses_ajax(TRUE);

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'pengguna',
					'label'  => 'Pengguna',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				],
				[
					'field'  => 'sertifikat',
					'label'  => 'Sertifikat',
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
			$id_sertifikat = $this->input->post('sertifikat',TRUE);
			$pengguna      = $this->input->post('pengguna',TRUE);

			if ($this->p_sertifikat->cek_p_sertifikat($id_sertifikat, $pengguna) > 0)
			{
				$this->respon = ['sukses' => FALSE,'pesan' => 'Pengguna (Anggota) tersebut sudah mempunyai sertifikat tersebut.'];
			}
			else
			{
				$data = [
					'id_sertifikat'      => $id_sertifikat,
					'pengguna'           => $pengguna,
					'tanggal_memperoleh' => date('Y-m-d'),
					'jam_memperoleh'     => date('H:i:s')
				];

				$nama_sertifikat = $this->sertifikat->ambil_nama_sertifikat($id_sertifikat);

				$this->db->insert('p_sertifikat',$data);

				$id = urlencode(str_replace('=', '', base64_encode("sertifikat-{$this->db->insert_id()}")));
				$id = str_replace('%3D','',$id);
				$ls = site_url("sertifikat/{$id}");

				$this->notifikasi->input($pengguna,"Selamat, anda telah mendapatkan sertifikat <a href='{$ls}' target='_blank'><q>{$nama_sertifikat}</q></a>.","sertifikat/{$id}");

				$this->campuran->tambah_riwayat('Y',"Memberikan sertifikat \"{$nama_sertifikat}\" kepada \"{$pengguna}\".");

				$this->respon = ['sukses' => TRUE,'pesan' => 'Menambah perolehan sertifikat berhasil.'];
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function periklanan()
	{
		$this->_khusus_superadmin('halaman');
		$this->load->library('user_agent');
		$this->load->view('pengurus/periklanan/awal');
	}

	public function data_periklanan()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->iklan->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->penempatan,
				"<a href='{$d->link_tujuan}' target='_blank'>$d->link_tujuan</a>",
				$d->kontak_pengiklan,
				$this->ang->tanggal_indonesia($d->jatuh_tempo),
				"<a href='".base_url("media/iklan/{$d->gambar}")."' target='_blank' class='btn btn-xs bg-teal waves-effect' data-toggle='tooltip' data-placement='top' title='Lihat Iklan'>
	        <i class='material-icons'>remove_red_eye</i>
	      </a>
				<a href='".site_url("area-pengurus/periklanan/ubah/{$d->id_iklan}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_iklan('{$d->id_iklan}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->iklan->jumlah(),
			'recordsFiltered' => $this->iklan->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_periklanan()
	{
		$this->_khusus_superadmin('halaman');

		$this->load->view('pengurus/periklanan/tambah');
	}

	public function proses_tambah_periklanan()
	{
		$this->_akses_ajax(TRUE);

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'tinggi_gambar',
					'label'  => 'Tinggi Gambar',
					'rules'  => 'required|trim|integer',
					'errors' => [
						'required' => '{field} wajib di isi.',
						'integer'  => '{field} harus berupa angka.'
					]
				],
				[
					'field'  => 'lebar_gambar',
					'label'  => 'Lebar Gambar',
					'rules'  => 'required|trim|integer',
					'errors' => [
						'required' => '{field} wajib di isi.',
						'integer'  => '{field} harus berupa angka.'
					]
				],
				[
					'field'  => 'penempatan',
					'label'  => 'Penempatan Iklan',
					'rules'  => 'required|trim|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'link_tujuan',
					'label'  => 'Link Tujuan',
					'rules'  => 'required|trim|max_length[200]}valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.',
						'valid_url'  => '{field} tidak valid.',
					]
				],
				[
					'field'  => 'kontak_pengiklan',
					'label'  => 'Kontak Pengiklan',
					'rules'  => 'required|trim|max_length[100]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'durasi',
					'label'  => 'Durasi Iklan',
					'rules'  => 'required|trim|integer',
					'errors' => [
						'required' => '{field} wajib di isi.',
						'integer'  => '{field} harus berupa angka.'
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
			$lg = $this->input->post('lebar_gambar',TRUE);
			$tg = $this->input->post('tinggi_gambar',TRUE);

			$data = [
				'penempatan'       => strtolower($this->input->post('penempatan',TRUE)),
				'link_tujuan'      => strtolower($this->input->post('link_tujuan',TRUE)),
				'kontak_pengiklan' => $this->input->post('kontak_pengiklan',TRUE),
				'jatuh_tempo'      => date('Y-m-d',strtotime("+{$this->input->post('durasi',TRUE)} month"))
			];

			$konfigurasi = [
				'upload_path'   => './media/iklan/',
				'allowed_types' => 'gif|jpg|jpeg|png|bmp',
				'max_size'      => 1024*5,
				'min_width'     => $lg,
				'min_height'    => $tg,
				'encrypt_name'  => TRUE,
				'remove_spaces' => TRUE
			];

			$this->upload->initialize($konfigurasi);

			if (!$this->upload->do_upload('gambar'))
			{
				$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk iklan adalah 5MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

				echo $this->_encode_dengan_token($this->respon);
				exit;
			}
			else
			{
				$gambar = $this->upload->data('raw_name')."_{$lg}_{$tg}_".$this->upload->data('file_ext');
				$konfigurasi = [
					'image_library'  => 'gd2',
					'source_image'   => "./media/iklan/{$this->upload->data('file_name')}",
					'new_image'      => "./media/iklan/{$gambar}",
					'maintain_ratio' => FALSE,
					'thumb_marker'   => "_{$lg}_{$tg}_",
					'width'          => $lg,
					'height'         => $tg
	      ];

	      $this->image_lib->initialize($konfigurasi);

	      if ($this->image_lib->resize())
	      {
					$data = array_merge($data,['gambar' => $gambar]);

	      	$this->ang->unlink("./media/iklan/{$this->upload->data('file_name')}");
	      }
	      else
	      {
	      	$this->ang->unlink("./media/iklan/{$this->upload->data('file_name')}");

	      	$this->respon = ['sukses' => FALSE,'pesan' => substr($this->image_lib->display_errors('',','),0,-1)];

	      	echo $this->_encode_dengan_token($this->respon);
	      	exit;
	      }
			}

			$this->db->insert('iklan',$data);
			$this->campuran->tambah_riwayat('Y',"Menambah iklan.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah periklanan berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_periklanan()
	{
		$this->_akses_ajax(TRUE);

		$id_iklan = $this->input->post('id_iklan',TRUE);

		if ($this->iklan->cek_iklan($id_iklan))
		{
			$gambar_lama = $this->iklan->ambil_gambar($id_iklan);
			$ubah_gambar = FALSE;
			$gambar_baru = '';
			$ulttugambar = FALSE; // Ubah Lebar Gambar Tinggi Gambar Tanpa Ubah Gambar

			$this->form_validation->set_rules(
				[
					[
						'field'  => 'tinggi_gambar',
						'label'  => 'Tinggi Gambar',
						'rules'  => 'required|trim|integer',
						'errors' => [
							'required' => '{field} wajib di isi.',
							'integer'  => '{field} harus berupa angka.'
						]
					],
					[
						'field'  => 'lebar_gambar',
						'label'  => 'Lebar Gambar',
						'rules'  => 'required|trim|integer',
						'errors' => [
							'required' => '{field} wajib di isi.',
							'integer'  => '{field} harus berupa angka.'
						]
					],
					[
						'field'  => 'penempatan',
						'label'  => 'Penempatan Iklan',
						'rules'  => 'required|trim|max_length[100]',
						'errors' => [
							'required'   => '{field} wajib di isi.',
							'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
						]
					],
					[
						'field'  => 'link_tujuan',
						'label'  => 'Link Tujuan',
						'rules'  => 'required|trim|max_length[200]}valid_url',
						'errors' => [
							'required'   => '{field} wajib di isi.',
							'max_length' => 'Panjang {field} tidak boleh melebihi {param}.',
							'valid_url'  => '{field} tidak valid.',
						]
					],
					[
						'field'  => 'kontak_pengiklan',
						'label'  => 'Kontak Pengiklan',
						'rules'  => 'required|trim|max_length[100]',
						'errors' => [
							'required'   => '{field} wajib di isi.',
							'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
						]
					],
					[
						'field'  => 'jatuh_tempo',
						'label'  => 'Tanggal Jatuh Tempo',
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
				$lg = $this->input->post('lebar_gambar',TRUE);
				$tg = $this->input->post('tinggi_gambar',TRUE);

				$data = [
					'penempatan'       => strtolower($this->input->post('penempatan',TRUE)),
					'link_tujuan'      => strtolower($this->input->post('link_tujuan',TRUE)),
					'kontak_pengiklan' => $this->input->post('kontak_pengiklan',TRUE),
					'jatuh_tempo'      => $this->input->post('jatuh_tempo',TRUE)
				];

				$konfigurasi = [
					'upload_path'   => './media/iklan/',
					'allowed_types' => 'gif|jpg|jpeg|png|bmp',
					'max_size'      => 1024*5,
					'min_width'     => $lg,
					'min_height'    => $tg,
					'encrypt_name'  => TRUE,
					'remove_spaces' => TRUE
				];

				$this->upload->initialize($konfigurasi);

				if (!$this->upload->do_upload('gambar'))
				{
					if ($_FILES['gambar']['error'] != 4)
					{
						$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file untuk iklan adalah 5MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

						echo $this->_encode_dengan_token($this->respon);
						exit;
					}
					else
					{
						$explode = explode('_',$gambar_lama);
						$lg_lama = $explode[1];
						$tg_lama = $explode[2];

						if ($lg != $lg_lama || $tg != $tg_lama)
						{
							$gambar_baru = $explode[0]."_{$lg}_{$tg}_".$explode[3];
							$konfigurasi = [
								'image_library'  => 'gd2',
								'source_image'   => "./media/iklan/{$gambar_lama}",
								'new_image'      => "./media/iklan/{$gambar_baru}",
								'maintain_ratio' => FALSE,
								'thumb_marker'   => "_{$lg}_{$tg}_",
								'width'          => $lg,
								'height'         => $tg
				      ];

				      $this->image_lib->initialize($konfigurasi);

				      if ($this->image_lib->resize())
				      {
								$data        = array_merge($data,['gambar' => $gambar_baru]);
								$ulttugambar = TRUE;

								$this->ang->unlink("./media/iklan/{$gambar_lama}");
				      }
				      else
				      {
				      	$this->respon = ['sukses' => FALSE,'pesan' => substr($this->image_lib->display_errors('',','),0,-1)];

				      	echo $this->_encode_dengan_token($this->respon);
				      	exit;
				      }
						}
					}
				}
				else
				{
					$gambar_baru = $this->upload->data('raw_name')."_{$lg}_{$tg}_".$this->upload->data('file_ext');
					$konfigurasi = [
						'image_library'  => 'gd2',
						'source_image'   => "./media/iklan/{$this->upload->data('file_name')}",
						'new_image'      => "./media/iklan/{$gambar_baru}",
						'maintain_ratio' => FALSE,
						'thumb_marker'   => "_{$lg}_{$tg}_",
						'width'          => $lg,
						'height'         => $tg
		      ];

		      $this->image_lib->initialize($konfigurasi);

		      if ($this->image_lib->resize())
		      {
						$data        = array_merge($data,['gambar' => $gambar_baru]);
						$ubah_gambar = TRUE;

		      	$this->ang->unlink("./media/iklan/{$this->upload->data('file_name')}");
		      }
		      else
		      {
		      	$this->ang->unlink("./media/iklan/{$this->upload->data('file_name')}");

		      	$this->respon = ['sukses' => FALSE,'pesan' => substr($this->image_lib->display_errors('',','),0,-1)];

		      	echo $this->_encode_dengan_token($this->respon);
		      	exit;
		      }
				}

				$this->db->update('iklan',$data,['id_iklan' => $id_iklan]);

				if ($ubah_gambar)
				{
					if ($gambar_lama != '')
					{
						$this->ang->unlink("./media/iklan/{$gambar_lama}");
					}
				}

				if ($ulttugambar)
				{
					$bahan_rename = $explode[0]."_{$lg_lama}_{$tg_lama}_"."_{$lg}_{$tg}_".$explode[3];

					rename("./media/iklan/{$bahan_rename}","./media/iklan/{$gambar_baru}");
				}

				$this->campuran->tambah_riwayat('Y',"Mengubah iklan ID {$id_iklan}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah iklan berhasil.'];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID iklan tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_periklanan($id_iklan)
	{
		$this->_khusus_superadmin('halaman');

		if ($this->iklan->cek_iklan($id_iklan))
		{
			$_di_ = $this->iklan->ambil($id_iklan); // data iklan

			$data = [
				'data' => $_di_,
				'_lg_' => explode('_',$_di_->gambar)[1],
				'_tg_' => explode('_',$_di_->gambar)[2]
			];

			$this->load->view('pengurus/periklanan/ubah',$data);
		}
		else
		{
			show_404();
		}
	}

	public function hapus_periklanan()
	{
		$this->_akses_ajax(TRUE);

		$id_iklan     = $this->input->post('id_iklan',TRUE);
		$gambar_iklan = $this->iklan->ambil_gambar($id_iklan);

		if ($this->iklan->cek_iklan($id_iklan))
		{
			$this->db->delete('iklan',['id_iklan' => $id_iklan]);

			if ($gambar_iklan !== NULL)
			{
				$this->ang->unlink("./media/iklan/{$gambar_iklan}");
			}

			$this->campuran->tambah_riwayat('Y',"Menghapus iklan ID {$id_iklan}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus iklan berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID iklan tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function link_iklan()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/periklanan/link/awal');
	}

	public function data_link_iklan()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->link_iklan->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$next = site_url("next/{$d->hash}");
			$rdata[] = [
				++$nomor,
				"<a href='javascript:void(0);'><span id='n-{$d->id_link_iklan}' data-next='{$next}' onclick='copyToClipboard(`#n-{$d->id_link_iklan}`);'>{$d->deskripsi}</span><a>",
				"<a href='{$d->tujuan}' target='_blank'>$d->tujuan</a>",
				$d->premium == 'Y' ? 'Ya' : 'Tidak',
				"<a href='".site_url("area-pengurus/link-iklan/ubah/{$d->id_link_iklan}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_link_iklan('{$d->id_link_iklan}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->link_iklan->jumlah(),
			'recordsFiltered' => $this->link_iklan->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_link_iklan()
	{
		$this->load->view('pengurus/periklanan/link/tambah');
	}

	public function proses_tambah_link_iklan()
	{
		$this->_akses_ajax();

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'deskripsi',
					'label'  => 'Deskripsi',
					'rules'  => 'required|trim|min_length[10]|max_length[200]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
	      	]
				],
				[
					'field'  => 'tujuan',
					'label'  => 'Link Tujuan',
					'rules'  => 'required|trim|min_length[10]|max_length[200]|valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.',
						'valid_url'  => '{field} tidak valid.',
	      	]
				],
				[
					'field'  => 'premium',
					'label'  => 'Untuk Pengguna Premium',
					'rules'  => 'required|trim|in_list[N,Y]',
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
			$data = [
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'tujuan'    => strtolower($this->input->post('tujuan',TRUE)),
				'premium'   => $this->input->post('premium',TRUE)
			];

			$this->db->insert('link_iklan',$data);

			$last_insert_id = $this->db->insert_id();

			$this->db->update('link_iklan',['hash' => md5(base64_encode("MSalehSDanKarmilaSAdalahCintaSejati-{$last_insert_id}"))],['id_link_iklan' => $last_insert_id]);
			$this->campuran->tambah_riwayat('Y',"Menambah link iklan.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah link iklan berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_link_iklan()
	{
		$this->_akses_ajax();

		$id_link_iklan = $this->input->post('id_link_iklan',TRUE);

		if ($this->link_iklan->cek_link_iklan($id_link_iklan))
		{
			$this->form_validation->set_rules(
				[
					[
						'field'  => 'deskripsi',
						'label'  => 'Deskripsi',
						'rules'  => 'required|trim|min_length[10]|max_length[200]',
						'errors' => [
							'required'   => '{field} wajib di isi.',
							'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
							'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
		      	]
					],
					[
						'field'  => 'tujuan',
						'label'  => 'Link Tujuan',
						'rules'  => 'required|trim|min_length[10]|max_length[200]|valid_url',
						'errors' => [
							'required'   => '{field} wajib di isi.',
							'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
							'max_length' => 'Panjang {field} tidak boleh melebihi {param}.',
							'valid_url'  => '{field} tidak valid.',
		      	]
					],
					[
						'field'  => 'premium',
						'label'  => 'Untuk Pengguna Premium',
						'rules'  => 'required|trim|in_list[N,Y]',
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
				$data = [
					'deskripsi' => $this->input->post('deskripsi', TRUE),
					'tujuan'    => strtolower($this->input->post('tujuan',TRUE)),
					'premium'   => $this->input->post('premium',TRUE)
				];

				$this->db->update('link_iklan',$data,['id_link_iklan' => $id_link_iklan]);
				$this->campuran->tambah_riwayat('Y',"Mengubah link iklan ID {$id_link_iklan}.");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah link berhasil.'];
			}
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID link iklan tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function ubah_link_iklan($id_link_iklan)
	{
		if ($this->link_iklan->cek_link_iklan($id_link_iklan))
		{
			$data = ['data' => $this->link_iklan->ambil($id_link_iklan)];
			$this->load->view('pengurus/periklanan/link/ubah',$data);
		}
		else
		{
			show_404();
		}
	}

	public function hapus_link_iklan()
	{
		$this->_akses_ajax();

		$id_link_iklan = $this->input->post('id_link_iklan',TRUE);

		if ($this->link_iklan->cek_link_iklan($id_link_iklan))
		{
			$this->db->delete('link_iklan',['id_link_iklan' => $id_link_iklan]);
			$this->campuran->tambah_riwayat('Y',"Menghapus link iklan ID {$id_link_iklan}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus link iklan berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID link iklan tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_diri()
	{
		$this->load->view('pengurus/lainnya/data-diri', ['data' => $this->pengguna->ambil($this->session->ang_nama_pengguna)]);
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
				'nama_lengkap'    => $this->input->post('nama_lengkap',TRUE),
				'tentang'         => $this->input->post('tentang',TRUE),
				'alamat'          => $this->input->post('alamat',TRUE),
				'jenis_kelamin'   => $this->input->post('jenis_kelamin',TRUE),
				'status'          => $this->input->post('status',TRUE),
				'website_pribadi' => $this->input->post('website_pribadi',TRUE),
				'akun_medsos'     => $this->input->post('akun_medsos',TRUE)
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
					$this->respon = ['sukses' => FALSE,'pesan' => str_replace("The file you are attempting to upload is larger than the permitted size.", "Maksimal ukuran file foto pengguna adalah 1MB, silahkan kompres terlebih dahulu jika anda ingin tetap memakai file ini.", substr($this->upload->display_errors('',','),0,-1))];

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

						$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah kata sandi berhasil.'];
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

	public function lowongan_kerja()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/lowongan-kerja/awal');
	}

	public function data_lowongan_kerja()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->loker->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rinci = '';

			if ($d->status === 'aktif' && $d->jatuh_tempo >= date('Y-m-d'))
			{
		    $rinci = '<a href="'.site_url("lowongan-kerja/{$d->id_loker}/{$d->slug}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Rincian" target="_blank">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}
			else
			{
				$rinci = '<a href="'.site_url("area-pengurus/lowongan-kerja/preview/{$d->id_loker}").'" class="btn bg-teal btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Preview">
		      <i class="material-icons">remove_red_eye</i>
		    </a>';
			}

			$rdata[] = [
				++$nomor,
				$d->nama_perusahaan,
				$d->lokasi,
				$d->penginput,
				$d->jatuh_tempo >= date('Y-m-d') ? ucwords($d->status) : 'Kadaluarsa',
				"{$rinci}
				<a href='".site_url("area-pengurus/lowongan-kerja/ubah/{$d->id_loker}")."' class='btn btn-xs btn-primary waves-effect' data-toggle='tooltip' data-placement='top' title='Ubah Data'>
	        <i class='material-icons'>edit</i>
	      </a>
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_loker('{$d->id_loker}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->loker->jumlah(),
			'recordsFiltered' => $this->loker->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_lowongan_kerja()
	{
		$this->load->view('pengurus/lowongan-kerja/tambah');
	}

	public function proses_tambah_lowongan_kerja()
	{
		$this->_akses_ajax();

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
					'catatan'          => $this->input->post('catatan'),
					'syarat_ketentuan' => $this->input->post('syarat_ketentuan'),
					'nilai_tambah'     => $this->input->post('nilai_tambah'),
					'kirim_cv_ke'      => $kirim_cv_ke,
					'gaji_minimal'     => $g_min == '' ? 0 : $g_min,
					'gaji_maksimal'    => $g_mak == '' ? 0 : $g_mak,
					'jatuh_tempo'      => $jatuh_tempo,
					'status'           => 'aktif',
					'tanggal_posting'  => date('Y-m-d'),
					'jam_posting'      => date('H:i:s'),
					'penginput'        => $this->session->ang_nama_pengguna
				];

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

				$this->db->insert('loker',$data);
				$this->campuran->tambah_riwayat('Y',"Menambah lowongan kerja ({$nama_perusahaan} sebagai {$posisi}).");
				$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah lowongan kerja berhasil.'];
			}
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function proses_ubah_lowongan_kerja()
	{
		$this->_akses_ajax();

		$id_loker = $this->input->post('id_loker',TRUE);

		if ($this->loker->cek_loker($id_loker))
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
					],
					[
						'field'  => 'status',
						'label'  => 'Status',
						'rules'  => 'required|trim|in_list[aktif,tidak aktif,tidak disetujui]',
						'errors' => [
							'required' => '{field} wajib di isi.',
							'in_list'  => 'Isi {field} tidak valid.'
						]
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
					$istatus         = $this->input->post('status',TRUE);
					$slug            = "lowongan-kerja-di-{$nama_perusahaan}-sebagai-{$posisi}";
					$data            = [
						'nama_perusahaan'       => $nama_perusahaan,
						'posisi'                => $posisi,
						'slug'                  => $this->ang->bikin_slug($slug,'loker'),
						'lokasi'                => $lokasi,
						'catatan'               => $this->input->post('catatan'),
						'syarat_ketentuan'      => $this->input->post('syarat_ketentuan'),
						'nilai_tambah'          => $this->input->post('nilai_tambah'),
						'kirim_cv_ke'           => $kirim_cv_ke,
						'gaji_minimal'          => $g_min == '' ? 0 : $g_min,
						'gaji_maksimal'         => $g_mak == '' ? 0 : $g_mak,
						'jatuh_tempo'           => $jatuh_tempo,
						'status'                => $istatus,
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
							exit;
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
							exit;
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

					$this->db->update('loker',$data,['id_loker' => $id_loker]);
					$this->campuran->tambah_riwayat('Y',"Mengubah lowongan kerja ID {$id_loker}.");
					$this->respon = ['sukses' => TRUE,'pesan' => 'Ubah lowongan kerja berhasil.'];
				}
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
			$data = ['data' => $this->loker->ambil($id_loker)];
			$this->load->view('pengurus/lowongan-kerja/ubah',$data);
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
			$penginput = $this->loker->ambil_penginput($id_loker);

			$this->db->delete('loker',['id_loker' => $id_loker]);

			if ($penginput != $this->session->ang_nama_pengguna)
			{
				$this->notifikasi->input($penginput,"Salah satu lowongan kerja anda telah dihapus oleh pengurus.",'lowongan-kerja');
			}

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
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID loker tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_suka_lowongan_kerja()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->ds_loker->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->id_loker,
				$d->pengguna != '' ? $d->pengguna : '-',
				$this->ang->tanggal_indonesia($d->tanggal).' ('.$d->jam.' WIB)',
				"<button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_data_suka('{$d->id_ds_loker}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->ds_loker->jumlah(),
			'recordsFiltered' => $this->ds_loker->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function hapus_data_suka_lowongan_kerja()
	{
		$this->_akses_ajax();

		$id_data_suka = $this->input->post('id_data_suka',TRUE);

		if ($this->ds_loker->cek_ds_loker($id_data_suka))
		{
			$this->db->delete('ds_loker',['id_ds_loker' => $id_data_suka]);
			$this->campuran->tambah_riwayat('Y',"Menghapus data suka lowongan kerja ID {$id_data_suka}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus data suka lowongan kerja berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID data suka lowongan kerja tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function komentar_lowongan_kerja()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/lowongan-kerja/komentar');
	}

	public function data_komentar_lowongan_kerja()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->k_loker->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$_aksi = '';

			if ($d->diblok == 'N')
			{
				$_aksi = "<button type='button' class='btn btn-warning btn-xs waves-effect' onclick=\"blok_komentar('{$d->id_k_loker}');\" data-toggle='tooltip' data-placement='top' title='Blokir'>
					<i class='material-icons'>block</i>
				</button>";
			}
			else
			{
				$_aksi = "<button type='button' class='btn btn-warning btn-xs waves-effect' onclick=\"unblok_komentar('{$d->id_k_loker}');\" data-toggle='tooltip' data-placement='top' title='UN-Blokir'>
					<i class='material-icons'>autorenew</i>
				</button>";
			}

			$rdata[] = [
				++$nomor,
				"<a href='".site_url("lowongan-kerja/{$d->id_loker}/".$this->loker->ambil_slug($d->id_loker))."' target='_blank'>{$d->id_loker}</a>",
				$d->pengguna,
				$d->diblok,
				"{$_aksi}
	      <button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_komentar('{$d->id_k_loker}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->k_loker->jumlah(),
			'recordsFiltered' => $this->k_loker->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function blok_komentar_lowongan_kerja()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_loker->cek_k_loker($id_komentar))
		{
			$kondisi = ['id_k_loker' => $id_komentar];

			$this->db->update('k_loker',['diblok' => 'Y'],$kondisi);
			$this->campuran->tambah_riwayat('Y',"Memblokir komentar lowongan kerja ID {$id_komentar}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Memblokir komentar lowongan kerja berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar lowongan kerja tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function unblok_komentar_lowongan_kerja()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_loker->cek_k_loker($id_komentar))
		{
			$kondisi = ['id_k_loker' => $id_komentar];

			$this->db->update('k_loker',['diblok' => 'N'],$kondisi);
			$this->campuran->tambah_riwayat('Y',"Mengunblokir komentar lowongan kerja ID {$id_komentar}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Mengunblokir komentar lowongan kerja berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar lowongan kerja tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_komentar_lowongan_kerja()
	{
		$this->_akses_ajax();

		$id_komentar = $this->input->post('id_komentar',TRUE);

		if ($this->k_loker->cek_k_loker($id_komentar))
		{
			$this->db->delete('k_loker',['id_k_loker' => $id_komentar]);
			$this->campuran->tambah_riwayat('Y',"Menghapus komentar lowongan kerja ID {$id_komentar}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus komentar lowongan kerja berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'Komentar lowongan kerja tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_suka_komentar_lowongan_kerja()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->dsk_loker->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->id_komentar,
				$d->pengguna != '' ? $d->pengguna : '-',
				$this->ang->tanggal_indonesia($d->tanggal).' ('.$d->jam.' WIB)',
				"<button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_data_suka('{$d->id_dsk_loker}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->dsk_loker->jumlah(),
			'recordsFiltered' => $this->dsk_loker->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function hapus_data_suka_komentar_lowongan_kerja()
	{
		$this->_akses_ajax();

		$id_data_suka = $this->input->post('id_data_suka',TRUE);

		if ($this->dsk_loker->cek_dsk_loker($id_data_suka))
		{
			$this->db->delete('dsk_loker',['id_dsk_loker' => $id_data_suka]);
			$this->campuran->tambah_riwayat('Y',"Menghapus data suka komentar lowongan kerja ID {$id_data_suka}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus data suka komentar lowongan kerja berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID data suka komentar lowongan kerja tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function konfigurasi_website()
	{
		$this->_khusus_superadmin('halaman');

		if ($this->campuran->cek_data_konfigurasi() === 1)
		{
			$konf = $this->campuran->konfigurasi();
			$data = [
				'facebook'     => $konf->facebook,
				'twitter'      => $konf->twitter,
				'instagram'    => $konf->instagram,
				'github'       => $konf->github,
				'whatsapp'     => $konf->whatsapp,
				'email'        => $konf->email,
				'youtube'      => $konf->youtube,
				'versi'        => $konf->versi,
				'pemeliharaan' => $konf->pemeliharaan
			];
		}
		else
		{
			$data = [
				'facebook'     => '',
				'twitter'      => '',
				'instagram'    => '',
				'github'       => '',
				'whatsapp'     => '',
				'email'        => '',
				'youtube'      => '',
				'versi'        => '',
				'pemeliharaan' => 'Y'
			];
		}

		$this->load->view('pengurus/lainnya/konfigurasi',$data);
	}

	public function perbaharui_konfigurasi_website()
	{
		$this->_akses_ajax(TRUE);

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'facebook',
					'label'  => 'Facebook',
					'rules'  => 'required|trim|max_length[100]|valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'valid_url'  => '{field} tidak valid.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'twitter',
					'label'  => 'Twitter',
					'rules'  => 'required|trim|max_length[100]|valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'valid_url'  => '{field} tidak valid.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'instagram',
					'label'  => 'Instagram',
					'rules'  => 'required|trim|max_length[100]|valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'valid_url'  => '{field} tidak valid.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'github',
					'label'  => 'Github',
					'rules'  => 'required|trim|max_length[100]|valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'valid_url'  => '{field} tidak valid.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'whatsapp',
					'label'  => 'WhatsApp',
					'rules'  => 'required|trim|min_length[11]|max_length[15]',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'min_length' => 'Panjang {field} tidak boleh kurang dari {param}.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'email',
					'label'  => 'Email',
					'rules'  => 'required|trim|max_length[100]|valid_email',
					'errors' => [
						'required'    => '{field} wajib di isi.',
						'valid_email' => '{field} tidak valid.',
						'max_length'  => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'youtube',
					'label'  => 'Youtube',
					'rules'  => 'required|trim|max_length[100]|valid_url',
					'errors' => [
						'required'   => '{field} wajib di isi.',
						'valid_url'  => '{field} tidak valid.',
						'max_length' => 'Panjang {field} tidak boleh melebihi {param}.'
					]
				],
				[
					'field'  => 'pemeliharaan',
					'label'  => 'Perbaikan/Pemeliharaan Website',
					'rules'  => 'required|trim|in_list[Y,N]',
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
			$data = [
				'facebook'     => $this->input->post('facebook',TRUE),
				'twitter'      => $this->input->post('twitter',TRUE),
				'instagram'    => $this->input->post('instagram',TRUE),
				'github'       => $this->input->post('github',TRUE),
				'whatsapp'     => $this->input->post('whatsapp',TRUE),
				'email'        => $this->input->post('email',TRUE),
				'youtube'      => $this->input->post('youtube',TRUE),
				'versi'        => $this->input->post('versi',TRUE),
				'pemeliharaan' => $this->input->post('pemeliharaan',TRUE)
			];

			if ($this->campuran->cek_data_konfigurasi())
			{
				$this->db->update('konfigurasi',$data);
			}
			else
			{
				$this->db->insert('konfigurasi',$data);
			}

			$this->campuran->tambah_riwayat('Y',"Memperbaharui konfigurasi website.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Perbaharui konfigurasi berhasil.','i' => $data];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function panduan()
	{
		$this->load->view('pengurus/lainnya/panduan');
	}

	public function rekap()
	{
		$this->load->view('pengurus/lainnya/rekap');
	}

	public function backup()
	{
		$this->load->view('pengurus/lainnya/backup');
	}

	public function data_riwayat()
	{
		$this->_akses_ajax();

		$rdata = $baris = [];
		$_data = $this->riwayat->data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [++$nomor,$d->konten,$d->tanggal_waktu];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->riwayat->jumlah(),
			'recordsFiltered' => $this->riwayat->jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function hapus_riwayat()
	{
		$this->_akses_ajax(TRUE);

		$this->db->truncate('riwayat');
		$this->campuran->tambah_riwayat('Y',"Menghapus semua riwayat.");

		echo "Hapus semua riwayat berhasil.";
	}

	public function proses_backup($tabel='')
	{
		$this->_khusus_superadmin('halaman');

		$json = $this->input->post('tabel[]',TRUE);

		for ($i=0; $i < count($json); $i++)
		{
			$tabel .= $json[$i].',';
		}

		$tabel = explode(',',rtrim($tabel,','));

		$konfig = [
			'tables'   => $tabel,
			'format'   => 'txt',
			'filename' => 'backup.sql'
		];

		$this->_buat_backup($tabel,$konfig);
	}

	public function preview_artikel($id_artikel)
	{
		if ($this->artikel->cek_valid_pengurus_preview_artikel($id_artikel))
		{
			$data = ['artikel' => $this->artikel->ambil_untuk_pengurus_preview_artikel($id_artikel)];

			$this->load->view('pengurus/artikel/preview',$data);
		}
		else
		{
			show_error('Artikel tidak ditemukan atau artikelnya sudah aktif.',404,'404');
		}
	}

	public function preview_diskusi($id_diskusi)
	{
		if ($this->diskusi->cek_valid_pengurus_preview_diskusi($id_diskusi))
		{
			$data = ['diskusi' => $this->diskusi->ambil_untuk_pengurus_preview_diskusi($id_diskusi)];

			$this->load->view('pengurus/diskusi/preview',$data);
		}
		else
		{
			show_error('Diskusi tidak ditemukan atau diskusinya sudah aktif.',404,'404');
		}
	}

	public function preview_lowongan_kerja($id_loker)
	{
		if ($this->loker->cek_valid_pengurus_preview_loker($id_loker))
		{
			$data = ['loker' => $this->loker->ambil_untuk_pengurus_preview_loker($id_loker)];

			$this->load->view('pengurus/lowongan-kerja/preview',$data);
		}
		else
		{
			show_error('Lowongan kerja tidak ditemukan atau lowongan kerjanya sudah aktif.',404,'404');
		}
	}

	public function donasi()
	{
		$this->load->library('user_agent');
		$this->load->view('pengurus/lainnya/donasi');
	}

	public function data_donasi()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->campuran->data_donasi($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->pengguna ?? 'Anonim',
				'Rp'.number_format($d->jumlah,0,',','.').',-',
				$d->catatan,
				$d->waktu
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->campuran->data_donasi_jumlah(),
			'recordsFiltered' => $this->campuran->data_donasi_jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function data_midtrans()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->campuran->data_midtrans($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->kode,
				$d->tipe_pembayaran,
				number_format($d->jumlah,0,',','.'),
				$d->catatan,
				$this->ang->tanggal_indonesia($d->tanggal),
				$d->status
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->campuran->data_midtrans_jumlah(),
			'recordsFiltered' => $this->campuran->data_midtrans_jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_perolehan_pencapaian()
	{
		$data = [
			'pengguna'   => $this->pengguna->ambil_untuk_select(),
			'pencapaian' => $this->pencapaian->ambil_untuk_select()
		];

		$this->load->view('pengurus/pencapaian/perolehan/tambah', $data);
	}

	public function proses_tambah_perolehan_pencapaian()
	{
		$this->_akses_ajax(TRUE);

		$this->form_validation->set_rules(
			[
				[
					'field'  => 'pengguna',
					'label'  => 'Pengguna',
					'rules'  => 'required|trim',
					'errors' => ['required' => '{field} wajib di isi.']
				],
				[
					'field'  => 'pencapaian',
					'label'  => 'Pencapaian',
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
			$pengguna   = $this->input->post('pengguna', TRUE);
			$pencapaian = explode('|', $this->input->post('pencapaian', TRUE));

			$this->db->insert('p_pencapaian',[
				'id_pencapaian'    => $pencapaian[0],
				'pengguna'         => $pengguna,
				'tanggal_tercapai' => date('Y-m-d'),
				'jam_tercapai'     => date('H:i:s')
			]);

			$this->notifikasi->input($pengguna,"Selamat, anda meraih pencapaian <q>{$pencapaian[1]}</q>.","anggota/{$pengguna}");
			$this->campuran->tambah_riwayat('Y',"Menambah perolehan pencapaian untuk \"{$pengguna}\", pencapaian: \"{$pencapaian[1]}\".");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Tambah perolehan pencapaian berhasil.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_perolehan_pencapaian()
	{
		$this->_akses_ajax();

		$id_p_pencapaian = $this->input->post('id_p_pencapaian',TRUE);

		if ($this->p_pencapaian->cek_p_pencapaian($id_p_pencapaian))
		{
			$this->db->delete('p_pencapaian',['id_p_pencapaian' => $id_p_pencapaian]);

			$this->campuran->tambah_riwayat('Y',"Menghapus perolehan pencapaian ID {$id_p_pencapaian}.");
			$this->respon = ['sukses' => TRUE,'pesan' => 'Hapus perolehan pencapaian berhasil.'];
		}
		else
		{
			$this->respon = ['sukses' => FALSE,'pesan' => 'ID perolehan pencapaian tidak terdaftar.'];
		}

		echo $this->_encode_dengan_token($this->respon);
	}

	public function data_muted_pengguna()
	{
		$this->_akses_ajax(TRUE);

		$rdata = $baris = [];
		$_data = $this->pengguna->muted_data($this->input->post());
		$nomor = $this->input->post('start',TRUE);

		foreach ($_data as $d)
		{
			$rdata[] = [
				++$nomor,
				$d->pengguna,
				"<button type='button' class='btn btn-danger btn-xs waves-effect' onclick=\"hapus_muted_pengguna('{$d->pengguna}');\" data-toggle='tooltip' data-placement='top' title='Hapus'>
					<i class='material-icons'>delete_forever</i>
				</button>"
			];
		}

		$this->respon = [
			'draw'            => $this->input->post('draw',TRUE),
			'recordsTotal'    => $this->pengguna->muted_jumlah(),
			'recordsFiltered' => $this->pengguna->muted_jumlah_tersortir($this->input->post()),
			'data'            => $rdata
		];

		echo json_encode($this->respon);
	}

	public function tambah_muted_pengguna()
	{
		$this->_khusus_superadmin('halaman');

		$this->load->view('pengurus/pengguna/muted-tambah', ['pengguna' => $this->pengguna->ambil_untuk_select()]);
	}

	public function proses_tambah_muted_pengguna()
	{
		$this->_akses_ajax(TRUE);

		$pengguna = $this->input->post('pengguna', TRUE);

		$this->db->insert('pyd', ['pengguna' => $pengguna]);
		$this->campuran->tambah_riwayat('Y',"Membisukan \"{$pengguna}\".");
		$this->respon = ['sukses' => TRUE,'pesan' => 'Proses berhasil.'];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function hapus_muted_pengguna()
	{
		$this->_akses_ajax();

		$pengguna = $this->input->post('pengguna', TRUE);

		$this->db->delete('pyd',['pengguna' => $pengguna]);
		$this->campuran->tambah_riwayat('Y',"{$pengguna} sudah tidak dibisukan lagi.");
		$this->respon = ['sukses' => TRUE,'pesan' => 'Proses berhasil.'];

		echo $this->_encode_dengan_token($this->respon);
	}

	public function uatm()
	{
		$this->_khusus_superadmin('halaman');
		$this->db->query("CALL {$this->db->dbprefix('fungsi_eksekusi_atm')}");
		$this->session->set_flashdata('uatm', true);

		redirect('area-pengurus');
	}
}
