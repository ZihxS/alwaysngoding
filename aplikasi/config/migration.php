<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
	'migration_enabled'     => FALSE,
	'migration_type'        => 'timestamp',
	'migration_table'       => 'migrations',
	'migration_auto_latest' => FALSE,
	'migration_version'     => 0,
	'migration_path'        => APPPATH.'migrations/'
];