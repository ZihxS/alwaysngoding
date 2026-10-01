<?php defined('BASEPATH') OR exit('No direct script access allowed');

// SMTP is optional. Keep credentials in the private environment configuration.
$config['enabled'] = filter_var($_ENV['SMTP_ENABLED'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
$config['host'] = trim($_ENV['SMTP_HOST'] ?? '');
$config['port'] = (int) ($_ENV['SMTP_PORT'] ?? 587);
$config['auth'] = filter_var($_ENV['SMTP_AUTH'] ?? 'true', FILTER_VALIDATE_BOOLEAN);
$config['username'] = trim($_ENV['SMTP_USERNAME'] ?? '');
$config['password'] = $_ENV['SMTP_PASSWORD'] ?? '';
$config['encryption'] = strtolower(trim($_ENV['SMTP_ENCRYPTION'] ?? 'tls'));
$config['from_address'] = trim($_ENV['MAIL_FROM_ADDRESS'] ?? '');
$config['from_name'] = trim($_ENV['MAIL_FROM_NAME'] ?? 'Always Ngoding');
