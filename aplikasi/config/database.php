<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$active_group  = 'default';
$query_builder = TRUE;

if ($_SERVER['CI_ENV'] == 'development') {
	$db['default'] = [
		'dsn'          => '',
		'port'         => $_ENV['DEV_DB_PORT'],
		'hostname'     => $_ENV['DEV_DB_HOSTNAME'],
		'username'     => $_ENV['DEV_DB_USERNAME'],
		'password'     => $_ENV['DEV_DB_PASSWORD'],
		'database'     => $_ENV['DEV_DB_DATABASE'],
		'dbdriver'     => 'mysqli',
		'dbprefix'     => $_ENV['DEV_DB_DBPREFIX'],
		'pconnect'     => FALSE,
		'db_debug'     => (ENVIRONMENT !== 'production'),
		'cache_on'     => FALSE,
		'cachedir'     => '',
		'char_set'     => 'utf8mb4',
		'dbcollat'     => 'utf8_general_ci',
		'swap_pre'     => '',
		'encrypt'      => FALSE,
		'compress'     => FALSE,
		'stricton'     => FALSE,
		'failover'     => [],
		'save_queries' => TRUE
	];
} else {
	$db['default'] = [
		'dsn'          => '',
		'hostname'     => $_ENV['DB_HOSTNAME'],
		'username'     => $_ENV['DB_USERNAME'],
		'password'     => $_ENV['DB_PASSWORD'],
		'database'     => $_ENV['DB_DATABASE'],
		'port'         => $_ENV['DB_PORT'],
		'dbdriver'     => 'mysqli',
		'dbprefix'     => $_ENV['DB_DBPREFIX'],
		'pconnect'     => FALSE,
		'db_debug'     => (ENVIRONMENT !== 'production'),
		'cache_on'     => FALSE,
		'cachedir'     => '',
		'char_set'     => 'utf8mb4',
		'dbcollat'     => 'utf8_general_ci',
		'swap_pre'     => '',
		'encrypt'      => FALSE,
		'compress'     => FALSE,
		'stricton'     => FALSE,
		'failover'     => [],
		'save_queries' => TRUE
	];
}
