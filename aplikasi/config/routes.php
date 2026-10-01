<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route = [
	// Bawaan Codeigniter
	'default_controller' => 'c_web_ang_2019',

	'anggota/ZihxS/custom-web' => 'c_web_ang_2019/portofolio_msalehs',

	// Pemeliharaan
	'pemeliharaan' => 'c_web_ang_2019/pemeliharaan',

	// Cek Pencapaian
	'cek-pencapaian' => 'c_web_ang_2019/cek_pencapaian',

	// Donasi
	'donasi'         => 'c_web_ang_2019/donasi',
	'donasi/token'   => 'c_web_ang_2019/token_donasi',
	'donasi/selesai' => 'c_web_ang_2019/selesai_donasi',
	'donasi/update'  => 'c_web_ang_2019/update_donasi',

	// Iklan
	'next/link'   => 'c_web_ang_2019/ambil_link_asli_dari_iklan',
	'next/(:any)' => 'c_web_ang_2019/iklan/$1',

	// Bagian Belajar
	'belajar'               => 'c_web_ang_2019/belajar',
	'belajar/donasi/(:any)' => 'c_belajar_ang_2019/donasi/$1',

	// Belajar HTML (Teori)
	'belajar-html/teori'                                                => 'c_belajar_ang_2019/awal_belajar_teori_html',
	'belajar-html/teori/berkenalan-dengan-html/bagian/(:num)'           => 'c_belajar_ang_2019/teori_berkenalan_dengan_html/$1',
	'belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/(:num)' => 'c_belajar_ang_2019/teori_tag_atribut_dan_elemen_pada_html/$1',
	'belajar-html/teori/struktur-dasar-html/bagian/(:num)'              => 'c_belajar_ang_2019/teori_struktur_dasar_html/$1',
	'belajar-html/teori/membuat-tabel-pada-html/bagian/(:num)'          => 'c_belajar_ang_2019/teori_membuat_tabel_pada_html/$1',
	'belajar-html/teori/membuat-formulir-pada-html/bagian/(:num)'       => 'c_belajar_ang_2019/teori_membuat_formulir_pada_html/$1',
	'belajar-html/teori/lebih-banyak-tentang-html/bagian/(:num)'        => 'c_belajar_ang_2019/teori_lebih_banyak_tentang_html/$1',
	'belajar-html/teori/jawab'                                          => 'c_belajar_ang_2019/jawab_teori_belajar_html',
	'belajar-html/teori/segarkan'                                       => 'c_belajar_ang_2019/segarkan_bagian_teori_html',
	'belajar-html/hasil/(:num)/(:num)/(:num)'                           => 'c_belajar_ang_2019/hasil_teori_html/$1/$2/$3',

	// Belajar CSS (Teori)
	'belajar-css/teori'                                                          => 'c_belajar_ang_2019/awal_belajar_teori_css',
	'belajar-css/teori/berkenalan-dengan-css/bagian/(:num)'                      => 'c_belajar_ang_2019/teori_berkenalan_dengan_css/$1',
	'belajar-css/teori/perpaduan-css-dengan-html/bagian/(:num)'                  => 'c_belajar_ang_2019/teori_perpaduan_css_dengan_html/$1',
	'belajar-css/teori/bekerja-dengan-text/bagian/(:num)'                        => 'c_belajar_ang_2019/teori_bekerja_dengan_text/$1',
	'belajar-css/teori/property-property-pada-css/bagian/(:num)'                 => 'c_belajar_ang_2019/teori_property_property_pada_css/$1',
	'belajar-css/teori/posisi-dan-layout-pada-css/bagian/(:num)'                 => 'c_belajar_ang_2019/teori_posisi_dan_layout_pada_css/$1',
	'belajar-css/teori/gradient-dan-background-pada-css/bagian/(:num)'           => 'c_belajar_ang_2019/teori_gradient_dan_background_pada_css/$1',
	'belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/(:num)' => 'c_belajar_ang_2019/teori_transisi_transformasi_dan_animasi_pada_css/$1',
	'belajar-css/teori/lebih-banyak-tentang-css/bagian/(:num)'                   => 'c_belajar_ang_2019/teori_lebih_banyak_tentang_css/$1',
	'belajar-css/teori/jawab'                                                    => 'c_belajar_ang_2019/jawab_teori_belajar_css',
	'belajar-css/teori/segarkan'                                                 => 'c_belajar_ang_2019/segarkan_bagian_teori_css',
	'belajar-css/hasil/(:num)/(:num)/(:num)'                           			 			=> 'c_belajar_ang_2019/hasil_teori_css/$1/$2/$3',

	// Belajar PHP (Teori)
	'belajar-php/teori'                                               => 'c_belajar_ang_2019/awal_belajar_teori_php',
	'belajar-php/teori/berkenalan-dengan-php/bagian/(:num)'           => 'c_belajar_ang_2019/teori_berkenalan_dengan_php/$1',
	'belajar-php/teori/syntax-dasar-php/bagian/(:num)'                => 'c_belajar_ang_2019/syntax_dasar_php/$1',
	'belajar-php/teori/tipe-data-pada-php/bagian/(:num)'              => 'c_belajar_ang_2019/tipe_data_pada_php/$1',
	'belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/(:num)' => 'c_belajar_ang_2019/kondisi_dan_perulangan_pada_php/$1',
	'belajar-php/teori/function-pada-php/bagian/(:num)'               => 'c_belajar_ang_2019/function_pada_php/$1',
	'belajar-php/teori/pbo-oop-pada-php/bagian/(:num)'                => 'c_belajar_ang_2019/pbo_oop_pada_php/$1',
	'belajar-php/teori/kelola-session-cookie-dan-files/bagian/(:num)' => 'c_belajar_ang_2019/kelola_session_cookie_dan_files/$1',
	'belajar-php/teori/lebih-banyak-tentang-php/bagian/(:num)'        => 'c_belajar_ang_2019/teori_lebih_banyak_tentang_php/$1',
	'belajar-php/teori/jawab'                                         => 'c_belajar_ang_2019/jawab_teori_belajar_php',
	'belajar-php/teori/segarkan'                                      => 'c_belajar_ang_2019/segarkan_bagian_teori_php',
	'belajar-php/hasil/(:num)/(:num)/(:num)'                          => 'c_belajar_ang_2019/hasil_teori_php/$1/$2/$3',
	'belajar-php/eksekusi'                                      	  	=> 'c_belajar_ang_2019/eksekusi_php',

	// Belajar MySQL (Teori)
	'belajar-mysql/teori'                                               => 'c_belajar_ang_2019/awal_belajar_teori_mysql',
	'belajar-mysql/teori/berkenalan-dengan-mysql/bagian/(:num)'         => 'c_belajar_ang_2019/teori_berkenalan_dengan_mysql/$1',
	'belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/(:num)'   => 'c_belajar_ang_2019/perintah_perintah_dasar_mysql/$1',
	'belajar-mysql/teori/tipe-data-pada-mysql/bagian/(:num)'            => 'c_belajar_ang_2019/tipe_data_pada_mysql/$1',
	'belajar-mysql/teori/create-read-update-delete-mysql/bagian/(:num)' => 'c_belajar_ang_2019/create_read_update_delete_mysql/$1',
	'belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/(:num)'   => 'c_belajar_ang_2019/penggabungan_tabel_pada_mysql/$1',
	'belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/(:num)'      => 'c_belajar_ang_2019/lebih_banyak_tentang_mysql/$1',
	'belajar-mysql/teori/jawab'                                         => 'c_belajar_ang_2019/jawab_teori_belajar_mysql',
	'belajar-mysql/teori/segarkan'                                      => 'c_belajar_ang_2019/segarkan_bagian_teori_mysql',

	// Belajar JavaScript (Teori)
	'belajar-javascript/teori'                                                                   => 'c_belajar_ang_2019/awal_belajar_teori_javascript',
	'belajar-javascript/teori/berkenalan-dengan-javascript/bagian/(:num)'                        => 'c_belajar_ang_2019/teori_berkenalan_dengan_javascript/$1',
	'belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/(:num)'                 => 'c_belajar_ang_2019/teori_aturan_penulisan_kode_di_javascript/$1',
	'belajar-javascript/teori/dasar-javascript/bagian/(:num)'                                    => 'c_belajar_ang_2019/dasar_javascript/$1',
	'belajar-javascript/teori/tipe-data-pada-javascript/bagian/(:num)'                           => 'c_belajar_ang_2019/tipe_data_pada_javascipt/$1',
	'belajar-javascript/teori/function-dan-object-pada-javascript/bagian/(:num)'                 => 'c_belajar_ang_2019/function_dan_object_pada_javascript/$1',
	'belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/(:num)'              => 'c_belajar_ang_2019/kondisi_dan_perulangan_pada_javascript/$1',
	'belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/(:num)'           => 'c_belajar_ang_2019/lebih_banyak_tentang_string_di_javascript/$1',
	'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/(:num)' => 'c_belajar_ang_2019/lebih_banyak_tentang_array_dan_object_di_javascript/$1',
	'belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/(:num)'                     => 'c_belajar_ang_2019/lebih_banyak_tentang_javascript/$1',
	'belajar-javascript/teori/jawab'                                                             => 'c_belajar_ang_2019/jawab_teori_belajar_javascript',
	'belajar-javascript/teori/segarkan'                                                          => 'c_belajar_ang_2019/segarkan_bagian_teori_javascript',
	'belajar-javascript/hasil/(:num)/(:num)/(:num)'                                              => 'c_belajar_ang_2019/hasil_teori_javascript/$1/$2/$3',
	'belajar-javascript/eksekusi'                                                                => 'c_belajar_ang_2019/eksekusi_javascript',

	// Artikel Website
	'artikel'                             => 'c_web_ang_2019/artikel',
	'artikel/lihat-lebih-banyak'          => 'c_web_ang_2019/lihat_lebih_banyak_artikel',
	'artikel/(:num)/(:any)'               => 'c_web_ang_2019/lihat_artikel/$1/$2',
	'artikel/kategori/lihat-lebih-banyak' => 'c_web_ang_2019/lihat_lebih_banyak_artikel_by_kategori',
	'artikel/kategori/(:any)'             => 'c_web_ang_2019/artikel_by_kategori/$1',
	'artikel/berkomentar'                 => 'c_web_ang_2019/komentari_artikel',
	'artikel/sukai/artikel'               => 'c_web_ang_2019/sukai_artikel',
	'artikel/sukai/komentar'              => 'c_web_ang_2019/sukai_komentar_artikel',
	'artikel/berkomentar/sunting'         => 'c_web_ang_2019/sunting_komentar_artikel',
	'artikel/berkomentar/sunting/ambil'   => 'c_web_ang_2019/ambil_sunting_komentar_artikel',
	'artikel/hapus-komentar'              => 'c_web_ang_2019/hapus_komentar_artikel',
	'artikel/muat-lebih-banyak-komentar'  => 'c_web_ang_2019/muat_lebih_banyak_komentar_artikel',

	// Diskusi Website
	'diskusi'                                 => 'c_web_ang_2019/diskusi',
	'diskusi/lihat-lebih-banyak'              => 'c_web_ang_2019/lihat_lebih_banyak_diskusi',
	'diskusi/(:num)/(:any)'                   => 'c_web_ang_2019/lihat_diskusi/$1/$2',
	'diskusi/lihat-lebih-banyak-hasil-saring' => 'c_web_ang_2019/lihat_lebih_banyak_diskusi_hasil_saring',
	'diskusi/menjawab'                        => 'c_web_ang_2019/jawab_diskusi',
	'diskusi/sukai/diskusi'                   => 'c_web_ang_2019/sukai_diskusi',
	'diskusi/sukai/jawaban'                   => 'c_web_ang_2019/sukai_jawaban_diskusi',
	'diskusi/menjawab/sunting'                => 'c_web_ang_2019/sunting_jawaban_diskusi',
	'diskusi/menjawab/sunting/ambil'          => 'c_web_ang_2019/ambil_sunting_jawaban_diskusi',
	'diskusi/hapus-jawaban'                   => 'c_web_ang_2019/hapus_jawaban_diskusi',
	'diskusi/muat-lebih-banyak-jawaban'       => 'c_web_ang_2019/muat_lebih_banyak_jawaban_diskusi',
	'diskusi/(:any)'                          => 'c_web_ang_2019/diskusi_by_saring/$1',

	// Lowongan Kerja Website
	'lowongan-kerja'                            => 'c_web_ang_2019/lowongan_kerja',
	'lowongan-kerja/lihat-lebih-banyak'         => 'c_web_ang_2019/lihat_lebih_banyak_lowongan_kerja',
	'lowongan-kerja/(:num)/(:any)'              => 'c_web_ang_2019/lihat_lowongan_kerja/$1/$2',
	'lowongan-kerja/berkomentar'                => 'c_web_ang_2019/komentari_loker',
	'lowongan-kerja/sukai/lowongan-kerja'       => 'c_web_ang_2019/sukai_loker',
	'lowongan-kerja/sukai/komentar'             => 'c_web_ang_2019/sukai_komentar_loker',
	'lowongan-kerja/berkomentar/sunting'        => 'c_web_ang_2019/sunting_komentar_loker',
	'lowongan-kerja/berkomentar/sunting/ambil'  => 'c_web_ang_2019/ambil_sunting_komentar_loker',
	'lowongan-kerja/hapus-komentar'             => 'c_web_ang_2019/hapus_komentar_loker',
	'lowongan-kerja/muat-lebih-banyak-komentar' => 'c_web_ang_2019/muat_lebih_banyak_komentar_loker',

	// Otentikasi Anggota
	'daftar'                          => 'c_ot_anggota_ang_2019/daftar',
	'daftar/proses'                   => 'c_ot_anggota_ang_2019/proses_daftar',
	'daftar/verifikasi/(:any)/(:any)' => 'c_ot_anggota_ang_2019/verifikasi_akun/$1/$2',
	'masuk'                           => 'c_ot_anggota_ang_2019/masuk',
	'masuk/proses'                    => 'c_ot_anggota_ang_2019/proses_masuk',
	'anggota/keluar'                  => 'c_ot_anggota_ang_2019/keluar',

	// Lupa Kata Sandi Untuk Anggota
	'lupa-kata-sandi'                         => 'c_ot_anggota_ang_2019/lks',
	'lupa-kata-sandi/kirim-kode'              => 'c_ot_anggota_ang_2019/kirim_kode_lks',
	'lupa-kata-sandi/ganti-kata-sandi/proses' => 'c_ot_anggota_ang_2019/lks_proses_ganti_kata_sandi',
	'lupa-kata-sandi/ganti-kata-sandi/(:any)' => 'c_ot_anggota_ang_2019/lks_ganti_kata_sandi/$1',

	// Notifikasi
	'notifikasi'                    => 'c_web_ang_2019/notifikasi',
	'notifikasi/lihat-lebih-banyak' => 'c_web_ang_2019/lihat_lebih_banyak_notifikasi',

	// Sertifikat
	'sertifikat/(:any)' => 'c_web_ang_2019/sertifikat/$1',

	// Lain Lain
	'tim'                  => 'c_web_ang_2019/tim',
	'hall-of-fame'				 => 'c_web_ang_2019/hall_of_fame',
	'partner'              => 'c_web_ang_2019/partner',
	'tentang'              => 'c_web_ang_2019/tentang',
	'pertanyaan-umum'      => 'c_web_ang_2019/pertanyaan_umum',
	'syarat-dan-ketentuan' => 'c_web_ang_2019/syarat_dan_ketentuan',
	'kebijakan-privasi'    => 'c_web_ang_2019/kebijakan_privasi',

	// Area Anggota
	'anggota' => 'c_anggota_ang_2019',

	// Data Diri
	'anggota/data-diri'                 => 'c_anggota_ang_2019/data_diri',
	'anggota/data-diri/ubah'            => 'c_anggota_ang_2019/ubah_data_diri',
	'anggota/data-diri/ubah/kata-sandi' => 'c_anggota_ang_2019/ubah_kata_sandi',

	// Artikel
	'anggota/artikel'                => 'c_anggota_ang_2019/artikel',
	'anggota/artikel/data'           => 'c_anggota_ang_2019/data_artikel',
	'anggota/artikel/tambah'         => 'c_anggota_ang_2019/tambah_artikel',
	'anggota/artikel/tambah/proses'  => 'c_anggota_ang_2019/proses_tambah_artikel',
	'anggota/artikel/ubah/proses'    => 'c_anggota_ang_2019/proses_ubah_artikel',
	'anggota/artikel/ubah/(:num)'    => 'c_anggota_ang_2019/ubah_artikel/$1',
	'anggota/artikel/hapus'          => 'c_anggota_ang_2019/hapus_artikel',
	'anggota/artikel/preview/(:num)' => 'c_anggota_ang_2019/preview_artikel/$1',

	// Diskusi
	'anggota/diskusi'                => 'c_anggota_ang_2019/diskusi',
	'anggota/diskusi/data'           => 'c_anggota_ang_2019/data_diskusi',
	'anggota/diskusi/tambah'         => 'c_anggota_ang_2019/tambah_diskusi',
	'anggota/diskusi/tambah/proses'  => 'c_anggota_ang_2019/proses_tambah_diskusi',
	'anggota/diskusi/ubah/proses'    => 'c_anggota_ang_2019/proses_ubah_diskusi',
	'anggota/diskusi/ubah/(:num)'    => 'c_anggota_ang_2019/ubah_diskusi/$1',
	'anggota/diskusi/hapus'          => 'c_anggota_ang_2019/hapus_diskusi',
	'anggota/diskusi/preview/(:num)' => 'c_anggota_ang_2019/preview_diskusi/$1',

	// Lowongan Kerja
	'anggota/lowongan-kerja'                => 'c_anggota_ang_2019/lowongan_kerja',
	'anggota/lowongan-kerja/data'           => 'c_anggota_ang_2019/data_lowongan_kerja',
	'anggota/lowongan-kerja/tambah'         => 'c_anggota_ang_2019/tambah_lowongan_kerja',
	'anggota/lowongan-kerja/tambah/proses'  => 'c_anggota_ang_2019/proses_tambah_lowongan_kerja',
	'anggota/lowongan-kerja/ubah/proses'    => 'c_anggota_ang_2019/proses_ubah_lowongan_kerja',
	'anggota/lowongan-kerja/ubah/(:num)'    => 'c_anggota_ang_2019/ubah_lowongan_kerja/$1',
	'anggota/lowongan-kerja/hapus'          => 'c_anggota_ang_2019/hapus_lowongan_kerja',
	'anggota/lowongan-kerja/preview/(:num)' => 'c_anggota_ang_2019/preview_lowongan_kerja/$1',

	// Suara Anggota
	'anggota/suara-anggota'          => 'c_anggota_ang_2019/suara_anggota',
	'anggota/suara-anggota/bersuara' => 'c_anggota_ang_2019/bersuara',

	// Apresiasi
	'anggota/pencapaian'      => 'c_anggota_ang_2019/pencapaian',
	'anggota/pencapaian/data' => 'c_anggota_ang_2019/data_pencapaian',
	'anggota/sertifikat'      => 'c_anggota_ang_2019/sertifikat',
	'anggota/sertifikat/data' => 'c_anggota_ang_2019/data_sertifikat',

	// Periklanan (Coming Soon)
	// 'anggota/pasang-iklan' => 'c_anggota_ang_2019/pasang_iklan',

	// Update Notifikasi
	'anggota/notifikasi-sudah-dilihat' => 'c_anggota_ang_2019/notifikasi_sudah_dilihat',

	// Lain Lain
	'anggota/panduan' => 'c_anggota_ang_2019/panduan',

	// List Anggota atau Pengguna Always Ngoding
	'anggota/semua'                                   => 'c_web_ang_2019/semua_anggota',
	'anggota/semua/lihat-lebih-banyak'                => 'c_web_ang_2019/lihat_lebih_banyak_semua_anggota',
	'anggota/(:any)'                                  => 'c_web_ang_2019/rincian_anggota/$1',
	'anggota/(:any)/artikel'                          => 'c_web_ang_2019/rincian_anggota_artikel/$1',
	'anggota/(:any)/diskusi'                          => 'c_web_ang_2019/rincian_anggota_diskusi/$1',
	'anggota/(:any)/lowongan-kerja'                   => 'c_web_ang_2019/rincian_anggota_lowongan_kerja/$1',
	'anggota/(:any)/pencapaian'                       => 'c_web_ang_2019/rincian_anggota_pencapaian/$1',
	'anggota/(:any)/sertifikat'                       => 'c_web_ang_2019/rincian_anggota_sertifikat/$1',
	'anggota/semua-artikel/lihat-lebih-banyak'        => 'c_web_ang_2019/lihat_lebih_banyak_semua_artikel_anggota/$1',
	'anggota/semua-diskusi/lihat-lebih-banyak'        => 'c_web_ang_2019/lihat_lebih_banyak_semua_diskusi_anggota/$1',
	'anggota/semua-lowongan-kerja/lihat-lebih-banyak' => 'c_web_ang_2019/lihat_lebih_banyak_semua_lowongan_kerja_anggota/$1',
	'anggota/semua-pencapaian/lihat-lebih-banyak'     => 'c_web_ang_2019/lihat_lebih_banyak_semua_pencapaian_anggota/$1',
	'anggota/semua-sertifikat/lihat-lebih-banyak'     => 'c_web_ang_2019/lihat_lebih_banyak_semua_sertifikat_anggota/$1',

	// Otentikasi Pengurus
	'area-pengurus/masuk'        => 'c_ot_pengurus_ang_2019/masuk',
	'area-pengurus/masuk/proses' => 'c_ot_pengurus_ang_2019/proses_masuk',
	'area-pengurus/keluar'       => 'c_ot_pengurus_ang_2019/keluar',

	// Area Pengurus
	'area-pengurus' => 'c_pengurus_ang_2019',

	// Update Anggota Terbaik Minggun
	'area-pengurus/uatm' => 'c_pengurus_ang_2019/uatm',

	// Artikel
	'area-pengurus/artikel'                => 'c_pengurus_ang_2019/artikel',
	'area-pengurus/artikel/data'           => 'c_pengurus_ang_2019/data_artikel',
	'area-pengurus/artikel/tambah'         => 'c_pengurus_ang_2019/tambah_artikel',
	'area-pengurus/artikel/tambah/proses'  => 'c_pengurus_ang_2019/proses_tambah_artikel',
	'area-pengurus/artikel/ubah/proses'    => 'c_pengurus_ang_2019/proses_ubah_artikel',
	'area-pengurus/artikel/ubah/(:num)'    => 'c_pengurus_ang_2019/ubah_artikel/$1',
	'area-pengurus/artikel/hapus'          => 'c_pengurus_ang_2019/hapus_artikel',
	'area-pengurus/artikel/suka/data'      => 'c_pengurus_ang_2019/data_suka_artikel',
	'area-pengurus/artikel/suka/hapus'     => 'c_pengurus_ang_2019/hapus_data_suka_artikel',
	'area-pengurus/artikel/preview/(:num)' => 'c_pengurus_ang_2019/preview_artikel/$1',

	// Kategori Artikel
	'area-pengurus/artikel/kategori'               => 'c_pengurus_ang_2019/kategori_artikel',
	'area-pengurus/artikel/kategori/data'          => 'c_pengurus_ang_2019/data_kategori_artikel',
	'area-pengurus/artikel/kategori/tambah'        => 'c_pengurus_ang_2019/tambah_kategori_artikel',
	'area-pengurus/artikel/kategori/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_kategori_artikel',
	'area-pengurus/artikel/kategori/ubah/proses'   => 'c_pengurus_ang_2019/proses_ubah_kategori_artikel',
	'area-pengurus/artikel/kategori/ubah/(:any)'   => 'c_pengurus_ang_2019/ubah_kategori_artikel/$1',
	'area-pengurus/artikel/kategori/hapus'         => 'c_pengurus_ang_2019/hapus_kategori_artikel',

	// Komentar Artikel
	'area-pengurus/artikel/komentar'            => 'c_pengurus_ang_2019/komentar_artikel',
	'area-pengurus/artikel/komentar/data'       => 'c_pengurus_ang_2019/data_komentar_artikel',
	'area-pengurus/artikel/komentar/blok'       => 'c_pengurus_ang_2019/blok_komentar_artikel',
	'area-pengurus/artikel/komentar/unblok'     => 'c_pengurus_ang_2019/unblok_komentar_artikel',
	'area-pengurus/artikel/komentar/hapus'      => 'c_pengurus_ang_2019/hapus_komentar_artikel',
	'area-pengurus/artikel/komentar/suka/data'  => 'c_pengurus_ang_2019/data_suka_komentar_artikel',
	'area-pengurus/artikel/komentar/suka/hapus' => 'c_pengurus_ang_2019/hapus_data_suka_komentar_artikel',

	// Diskusi
	'area-pengurus/diskusi'                => 'c_pengurus_ang_2019/diskusi',
	'area-pengurus/diskusi/data'           => 'c_pengurus_ang_2019/data_diskusi',
	'area-pengurus/diskusi/tambah'         => 'c_pengurus_ang_2019/tambah_diskusi',
	'area-pengurus/diskusi/tambah/proses'  => 'c_pengurus_ang_2019/proses_tambah_diskusi',
	'area-pengurus/diskusi/ubah-status'    => 'c_pengurus_ang_2019/ubah_status_diskusi',
	'area-pengurus/diskusi/ubah/proses'    => 'c_pengurus_ang_2019/proses_ubah_diskusi',
	'area-pengurus/diskusi/ubah/(:num)'    => 'c_pengurus_ang_2019/ubah_diskusi/$1',
	'area-pengurus/diskusi/hapus'          => 'c_pengurus_ang_2019/hapus_diskusi',
	'area-pengurus/diskusi/suka/data'      => 'c_pengurus_ang_2019/data_suka_diskusi',
	'area-pengurus/diskusi/suka/hapus'     => 'c_pengurus_ang_2019/hapus_data_suka_diskusi',
	'area-pengurus/diskusi/preview/(:num)' => 'c_pengurus_ang_2019/preview_diskusi/$1',

	// Jawaban Diskusi
	'area-pengurus/diskusi/jawaban'            => 'c_pengurus_ang_2019/jawaban_diskusi',
	'area-pengurus/diskusi/jawaban/data'       => 'c_pengurus_ang_2019/data_jawaban_diskusi',
	'area-pengurus/diskusi/jawaban/blok'       => 'c_pengurus_ang_2019/blok_jawaban_diskusi',
	'area-pengurus/diskusi/jawaban/unblok'     => 'c_pengurus_ang_2019/unblok_jawaban_diskusi',
	'area-pengurus/diskusi/jawaban/hapus'      => 'c_pengurus_ang_2019/hapus_jawaban_diskusi',
	'area-pengurus/diskusi/jawaban/suka/data'  => 'c_pengurus_ang_2019/data_suka_jawaban_diskusi',
	'area-pengurus/diskusi/jawaban/suka/hapus' => 'c_pengurus_ang_2019/hapus_data_suka_jawaban_diskusi',

	// Update Notifikasi
	'area-pengurus/notifikasi-sudah-dilihat' => 'c_pengurus_ang_2019/notifikasi_sudah_dilihat',

	// Pengguna
	'area-pengurus/pengguna'                     => 'c_pengurus_ang_2019/pengguna',
	'area-pengurus/pengguna/data'                => 'c_pengurus_ang_2019/data_pengguna',
	'area-pengurus/pengguna/tambah'              => 'c_pengurus_ang_2019/tambah_pengguna',
	'area-pengurus/pengguna/tambah/proses'       => 'c_pengurus_ang_2019/proses_tambah_pengguna',
	'area-pengurus/pengguna/ubah-status'         => 'c_pengurus_ang_2019/ubah_status_pengguna',
	'area-pengurus/pengguna/ubah/proses'         => 'c_pengurus_ang_2019/proses_ubah_pengguna',
	'area-pengurus/pengguna/ubah/kata-sandi'     => 'c_pengurus_ang_2019/proses_ubah_kata_sandi_pengguna',
	'area-pengurus/pengguna/ubah/(:any)'         => 'c_pengurus_ang_2019/ubah_pengguna/$1',
	'area-pengurus/pengguna/hapus'               => 'c_pengurus_ang_2019/hapus_pengguna',
	'area-pengurus/pengguna/muted/data'          => 'c_pengurus_ang_2019/data_muted_pengguna',
	'area-pengurus/pengguna/muted/hapus'         => 'c_pengurus_ang_2019/hapus_muted_pengguna',
	'area-pengurus/pengguna/muted/tambah'        => 'c_pengurus_ang_2019/tambah_muted_pengguna',
	'area-pengurus/pengguna/muted/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_muted_pengguna',

	// Suara Anggota
	'area-pengurus/suara-anggota'               => 'c_pengurus_ang_2019/suara_anggota',
	'area-pengurus/suara-anggota/data'          => 'c_pengurus_ang_2019/data_suara_anggota',
	'area-pengurus/suara-anggota/ubah-status'   => 'c_pengurus_ang_2019/ubah_status_suara_anggota',
	'area-pengurus/suara-anggota/setujui'       => 'c_pengurus_ang_2019/setujui_suara_anggota',
	'area-pengurus/suara-anggota/tidak-setujui' => 'c_pengurus_ang_2019/tidak_setujui_suara_anggota',
	'area-pengurus/suara-anggota/hapus'         => 'c_pengurus_ang_2019/hapus_suara_anggota',

	// Pencapaian
	'area-pengurus/pencapaian'               => 'c_pengurus_ang_2019/pencapaian',
	'area-pengurus/pencapaian/data'          => 'c_pengurus_ang_2019/data_pencapaian',
	'area-pengurus/pencapaian/tambah'        => 'c_pengurus_ang_2019/tambah_pencapaian',
	'area-pengurus/pencapaian/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_pencapaian',
	'area-pengurus/pencapaian/ubah/proses'   => 'c_pengurus_ang_2019/proses_ubah_pencapaian',
	'area-pengurus/pencapaian/ubah/(:num)'   => 'c_pengurus_ang_2019/ubah_pencapaian/$1',
	'area-pengurus/pencapaian/hapus'         => 'c_pengurus_ang_2019/hapus_pencapaian',

	// Perolehan Pencapaian
	'area-pengurus/pencapaian/perolehan'               => 'c_pengurus_ang_2019/perolehan_pencapaian',
	'area-pengurus/pencapaian/perolehan/tambah'        => 'c_pengurus_ang_2019/tambah_perolehan_pencapaian',
	'area-pengurus/pencapaian/perolehan/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_perolehan_pencapaian',
	'area-pengurus/pencapaian/perolehan/data'          => 'c_pengurus_ang_2019/data_perolehan_pencapaian',
	'area-pengurus/pencapaian/perolehan/hapus'         => 'c_pengurus_ang_2019/hapus_perolehan_pencapaian',

	// Sertifikat
	'area-pengurus/sertifikat'               => 'c_pengurus_ang_2019/sertifikat',
	'area-pengurus/sertifikat/data'          => 'c_pengurus_ang_2019/data_sertifikat',
	'area-pengurus/sertifikat/tambah'        => 'c_pengurus_ang_2019/tambah_sertifikat',
	'area-pengurus/sertifikat/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_sertifikat',
	'area-pengurus/sertifikat/ubah/proses'   => 'c_pengurus_ang_2019/proses_ubah_sertifikat',
	'area-pengurus/sertifikat/ubah/(:num)'   => 'c_pengurus_ang_2019/ubah_sertifikat/$1',
	'area-pengurus/sertifikat/hapus'         => 'c_pengurus_ang_2019/hapus_sertifikat',

	// Perolehan Sertifikat
	'area-pengurus/sertifikat/perolehan'               => 'c_pengurus_ang_2019/perolehan_sertifikat',
	'area-pengurus/sertifikat/perolehan/tambah'        => 'c_pengurus_ang_2019/tambah_perolehan_sertifikat',
	'area-pengurus/sertifikat/perolehan/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_perolehan_sertifikat',
	'area-pengurus/sertifikat/perolehan/data'          => 'c_pengurus_ang_2019/data_perolehan_sertifikat',

	// Periklanan
	'area-pengurus/periklanan'               => 'c_pengurus_ang_2019/periklanan',
	'area-pengurus/periklanan/data'          => 'c_pengurus_ang_2019/data_periklanan',
	'area-pengurus/periklanan/tambah'        => 'c_pengurus_ang_2019/tambah_periklanan',
	'area-pengurus/periklanan/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_periklanan',
	'area-pengurus/periklanan/ubah/proses'   => 'c_pengurus_ang_2019/proses_ubah_periklanan',
	'area-pengurus/periklanan/ubah/(:num)'   => 'c_pengurus_ang_2019/ubah_periklanan/$1',
	'area-pengurus/periklanan/hapus'         => 'c_pengurus_ang_2019/hapus_periklanan',

	// Link Untuk Iklan
	'area-pengurus/link-iklan'               => 'c_pengurus_ang_2019/link_iklan',
	'area-pengurus/link-iklan/data'          => 'c_pengurus_ang_2019/data_link_iklan',
	'area-pengurus/link-iklan/tambah'        => 'c_pengurus_ang_2019/tambah_link_iklan',
	'area-pengurus/link-iklan/tambah/proses' => 'c_pengurus_ang_2019/proses_tambah_link_iklan',
	'area-pengurus/link-iklan/ubah/proses'   => 'c_pengurus_ang_2019/proses_ubah_link_iklan',
	'area-pengurus/link-iklan/ubah/(:num)'   => 'c_pengurus_ang_2019/ubah_link_iklan/$1',
	'area-pengurus/link-iklan/hapus'         => 'c_pengurus_ang_2019/hapus_link_iklan',

	// Data Diri
	'area-pengurus/data-diri'                 => 'c_pengurus_ang_2019/data_diri',
	'area-pengurus/data-diri/ubah'            => 'c_pengurus_ang_2019/ubah_data_diri',
	'area-pengurus/data-diri/ubah/kata-sandi' => 'c_pengurus_ang_2019/ubah_kata_sandi',

	// Lowongan Kerja
	'area-pengurus/lowongan-kerja'                => 'c_pengurus_ang_2019/lowongan_kerja',
	'area-pengurus/lowongan-kerja/data'           => 'c_pengurus_ang_2019/data_lowongan_kerja',
	'area-pengurus/lowongan-kerja/tambah'         => 'c_pengurus_ang_2019/tambah_lowongan_kerja',
	'area-pengurus/lowongan-kerja/tambah/proses'  => 'c_pengurus_ang_2019/proses_tambah_lowongan_kerja',
	'area-pengurus/lowongan-kerja/ubah/proses'    => 'c_pengurus_ang_2019/proses_ubah_lowongan_kerja/$1',
	'area-pengurus/lowongan-kerja/ubah/(:num)'    => 'c_pengurus_ang_2019/ubah_lowongan_kerja/$1',
	'area-pengurus/lowongan-kerja/hapus'          => 'c_pengurus_ang_2019/hapus_lowongan_kerja',
	'area-pengurus/lowongan-kerja/suka/data'      => 'c_pengurus_ang_2019/data_suka_lowongan_kerja',
	'area-pengurus/lowongan-kerja/suka/hapus'     => 'c_pengurus_ang_2019/hapus_data_suka_lowongan_kerja',
	'area-pengurus/lowongan-kerja/preview/(:num)' => 'c_pengurus_ang_2019/preview_lowongan_kerja/$1',

	// Komentar Lowongan Kerja
	'area-pengurus/lowongan-kerja/komentar'            => 'c_pengurus_ang_2019/komentar_lowongan_kerja',
	'area-pengurus/lowongan-kerja/komentar/data'       => 'c_pengurus_ang_2019/data_komentar_lowongan_kerja',
	'area-pengurus/lowongan-kerja/komentar/blok'       => 'c_pengurus_ang_2019/blok_komentar_lowongan_kerja',
	'area-pengurus/lowongan-kerja/komentar/unblok'     => 'c_pengurus_ang_2019/unblok_komentar_lowongan_kerja',
	'area-pengurus/lowongan-kerja/komentar/hapus'      => 'c_pengurus_ang_2019/hapus_komentar_lowongan_kerja',
	'area-pengurus/lowongan-kerja/komentar/suka/data'  => 'c_pengurus_ang_2019/data_suka_komentar_lowongan_kerja',
	'area-pengurus/lowongan-kerja/komentar/suka/hapus' => 'c_pengurus_ang_2019/hapus_data_suka_komentar_lowongan_kerja',

	// Konfigurasi
	'area-pengurus/konfigurasi'            => 'c_pengurus_ang_2019/konfigurasi_website',
	'area-pengurus/konfigurasi/perbaharui' => 'c_pengurus_ang_2019/perbaharui_konfigurasi_website',

	// Lain Lain
	'area-pengurus/panduan'       => 'c_pengurus_ang_2019/panduan',
	'area-pengurus/rekap'         => 'c_pengurus_ang_2019/rekap',
	'area-pengurus/donasi'        => 'c_pengurus_ang_2019/donasi',
	'area-pengurus/donasi/data'   => 'c_pengurus_ang_2019/data_donasi',
	'area-pengurus/midtrans/data' => 'c_pengurus_ang_2019/data_midtrans',
	'area-pengurus/backup'        => 'c_pengurus_ang_2019/backup',
	'area-pengurus/backup/proses' => 'c_pengurus_ang_2019/proses_backup',
	'area-pengurus/data-riwayat'  => 'c_pengurus_ang_2019/data_riwayat',
	'area-pengurus/hapus-riwayat' => 'c_pengurus_ang_2019/hapus_riwayat',

	// Sitemap
	'sitemap.xml'          => 'c_sitemap_ang_2019',
	'sitemap-umum.xml'     => 'c_sitemap_ang_2019/umum',
	'sitemap-artikel.xml'  => 'c_sitemap_ang_2019/artikel',
	'sitemap-diskusi.xml'  => 'c_sitemap_ang_2019/diskusi',
	'sitemap-pengguna.xml' => 'c_sitemap_ang_2019/pengguna',

	// API Re-Cloud
	'api/recloud/(:num)' => 'c_api_recloud/index/$1',

	// Bawaan Codeigniter
	'404_override'         => '',
	'translate_uri_dashes' => FALSE,
];
