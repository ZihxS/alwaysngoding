<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$autoload = [
	'packages'  => [],
	'libraries' => ['database','session','upload','image_lib','form_validation','html2pdf','alwaysngoding' => 'ang'],
	'drivers'   => [],
	'helper'    => ['url','file','integrations'],
	'config'    => [],
	'language'  => [],
	'model'     => [
		'm_artikel_ang_2019'      => 'artikel',
		'm_belajar_ang_2019'      => 'belajar',
		'm_campuran_ang_2019'     => 'campuran',
		'm_diskusi_ang_2019'      => 'diskusi',
		'm_ds_artikel_ang_2019'   => 'ds_artikel',
		'm_ds_diskusi_ang_2019'   => 'ds_diskusi',
		'm_ds_loker_ang_2019'     => 'ds_loker',
		'm_dsjd_ang_2019'         => 'dsjd',
		'm_dsk_artikel_ang_2019'  => 'dsk_artikel',
		'm_dsk_loker_ang_2019'    => 'dsk_loker',
		'm_iklan_ang_2019'        => 'iklan',
		'm_j_diskusi_ang_2019'    => 'j_diskusi',
		'm_k_artikel_ang_2019'    => 'k_artikel',
		'm_k_loker_ang_2019'      => 'k_loker',
		'm_kategori_ang_2019'     => 'kategori',
		'm_link_iklan_ang_2019'   => 'link_iklan',
		'm_loker_ang_2019'        => 'loker',
		'm_lupa_ks_ang_2019'      => 'lupa_ks',
		'm_notifikasi_ang_2019'   => 'notifikasi',
		'm_pencapaian_ang_2019'   => 'pencapaian',
		'm_p_pencapaian_ang_2019' => 'p_pencapaian',
		'm_p_premium_ang_2019'    => 'p_premium',
		'm_p_sertifikat_ang_2019' => 'p_sertifikat',
		'm_pengguna_ang_2019'     => 'pengguna',
		'm_riwayat_ang_2019'      => 'riwayat',
		'm_sertifikat_ang_2019'   => 'sertifikat',
		'm_suara_ang_2019'        => 'suara',
		'm_tags_ang_2019'         => 'tags',
		'm_token_lks_ang_2019'    => 'token_lks',
		'm_verif_akun_ang_2019'   => 'verif_akun'
	]
];
