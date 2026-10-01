<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['enabled']            = ang_integration_enabled('recaptcha');
$config['recaptcha_sitekey']   = ang_env_value('RECAPTCHA_SITE_KEY');
$config['recaptcha_secretkey'] = ang_env_value('RECAPTCHA_SECRET_KEY');
$config['lang']                = ang_env_value('RECAPTCHA_LANG', 'id');
