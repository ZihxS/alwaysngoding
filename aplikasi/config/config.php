<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Bangkok');

ini_set('max_execution_time',0);
ini_set('memory_limit','2048M');

$base = rtrim($_ENV['APP_URL'], '/').'/';

$prot = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$link = "{$prot}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$burl = substr($link,0,strlen($base)); // base url
$burl = $base == $burl ? $burl : ''; // base url

$config = [
	'base_url'                => $base == $burl ? $burl : '',
	'index_page'              => '',
	'uri_protocol'            => 'REQUEST_URI',
	'url_suffix'              => '',
	'language'                => 'english',
	'charset'                 => 'UTF-8',
	'enable_hooks'            => TRUE,
	'subclass_prefix'         => 'MY_',
	'composer_autoload'       => 'vendor/autoload.php',
	'permitted_uri_chars'     => 'a-z 0-9~%.:_\-',
	'enable_query_strings'    => FALSE,
	'controller_trigger'      => 'c',
	'function_trigger'        => 'm',
	'directory_trigger'       => 'd',
	'allow_get_array'         => TRUE,
	'log_threshold'           => 0,
	'log_path'                => '',
	'log_file_extension'      => '',
	'log_file_permissions'    => 0644,
	'log_date_format'         => 'Y-m-d H:i:s',
	'error_views_path'        => '',
	'cache_path'              => '',
	'cache_query_string'      => FALSE,
	'encryption_key'          => $_ENV['APP_ENCRYPTION_KEY'],
	'sess_driver'             => 'files',
	'sess_cookie_name'        => $_ENV['SESSION_COOKIE_NAME'],
	'sess_expiration'         => 3600,
	'sess_save_path'          => NULL,
	'sess_match_ip'           => FALSE,
	'sess_time_to_update'     => 300,
	'sess_regenerate_destroy' => FALSE,
	'cookie_prefix'           => '',
	'cookie_domain'           => '',
	'cookie_path'             => '/',
	'cookie_secure'           => filter_var($_ENV['COOKIE_SECURE'], FILTER_VALIDATE_BOOLEAN),
	'cookie_httponly'         => filter_var($_ENV['COOKIE_HTTPONLY'], FILTER_VALIDATE_BOOLEAN),
	'standardize_newlines'    => FALSE,
	'global_xss_filtering'    => FALSE,
	'csrf_protection'         => TRUE,
	'csrf_token_name'         => $_ENV['CSRF_TOKEN_NAME'],
	'csrf_cookie_name'        => $_ENV['CSRF_COOKIE_NAME'],
	'csrf_expire'             => 7200,
	'csrf_regenerate'         => TRUE,
	'csrf_exclude_uris'       => [
		'area-pengurus/masuk/proses',
		'area-pengurus/pengguna/data',
		'area-pengurus/pengguna/muted/data',
		'area-pengurus/artikel/data',
		'area-pengurus/artikel/kategori/data',
		'area-pengurus/artikel/komentar/data',
		'area-pengurus/diskusi/data',
		'area-pengurus/pencapaian/data',
		'area-pengurus/pencapaian/perolehan/data',
		'area-pengurus/sertifikat/data',
		'area-pengurus/sertifikat/perolehan/data',
		'area-pengurus/lowongan-kerja/data',
		'area-pengurus/data-riwayat',
		'area-pengurus/diskusi/jawaban/data',
		'area-pengurus/lowongan-kerja/komentar/data',
		'area-pengurus/artikel/komentar/suka/data',
		'area-pengurus/lowongan-kerja/komentar/suka/data',
		'area-pengurus/diskusi/jawaban/suka/data',
		'area-pengurus/artikel/suka/data',
		'area-pengurus/lowongan-kerja/suka/data',
		'area-pengurus/diskusi/suka/data',
		'area-pengurus/suara-anggota/data',
		'area-pengurus/backup/proses',
		'area-pengurus/link-iklan/data',
		'area-pengurus/periklanan/data',
		'anggota/artikel/data',
		'anggota/diskusi/data',
		'anggota/lowongan-kerja/data',
		'artikel/berkomentar/sunting/ambil',
		'diskusi/menjawab/sunting/ambil',
		'lowongan-kerja/berkomentar/sunting/ambil',
		'anggota/pencapaian/data',
		'anggota/sertifikat/data',
		'area-pengurus/donasi/data',
		'area-pengurus/midtrans/data',
		'donasi/token',
		'donasi/selesai',
		'next/link',
		'cek-pencapaian',
		'api/recloud/(:num)'
	],
	'compress_output'    => FALSE,
	'time_reference'     => 'local',
	'rewrite_short_tags' => FALSE,
	'proxy_ips'          => ''
];
