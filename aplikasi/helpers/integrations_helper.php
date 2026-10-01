<?php defined('BASEPATH') OR exit('No direct script access allowed');

function ang_env_value($key, $default = '')
{
	return trim((string) ($_ENV[$key] ?? $default));
}

function ang_env_flag($key, $default = FALSE)
{
	return filter_var($_ENV[$key] ?? $default, FILTER_VALIDATE_BOOLEAN);
}

function ang_keys_configured(array $keys)
{
	foreach ($keys as $key)
	{
		$value = ang_env_value($key);
		if ($value === '' || strpos($value, 'replace-with-') === 0)
		{
			return FALSE;
		}
	}
	return TRUE;
}

// Use the same availability decision in controllers, libraries, and views.
function ang_integration_enabled($integration)
{
	switch ($integration)
	{
		case 'recaptcha':
			return ang_env_flag('GCAPTCHA')
				&& ang_keys_configured(['RECAPTCHA_SITE_KEY', 'RECAPTCHA_SECRET_KEY']);
		case 'midtrans':
			return ang_keys_configured(['MIDTRANS_SERVER_KEY', 'MIDTRANS_CLIENT_KEY']);
		case 'discord':
			return ang_keys_configured(['DISCORD_WEBHOOK_URL']);
		case 'twitter':
			return ang_keys_configured(['TWITTER_CONSUMER_KEY', 'TWITTER_CONSUMER_SECRET',
				'TWITTER_ACCESS_TOKEN', 'TWITTER_ACCESS_TOKEN_SECRET']);
		case 'glot':
			return ang_keys_configured(['GLOT_API_TOKEN']);
		case 'smtp':
			$port = (int) ang_env_value('SMTP_PORT', '587');
			return ang_env_flag('SMTP_ENABLED')
				&& ang_keys_configured(['SMTP_HOST', 'MAIL_FROM_ADDRESS'])
				&& filter_var(ang_env_value('MAIL_FROM_ADDRESS'), FILTER_VALIDATE_EMAIL)
				&& $port > 0 && $port <= 65535
				&& in_array(strtolower(ang_env_value('SMTP_ENCRYPTION', 'tls')), ['', 'tls', 'ssl'], TRUE)
				&& (!ang_env_flag('SMTP_AUTH', TRUE) || ang_keys_configured(['SMTP_USERNAME', 'SMTP_PASSWORD']));
	}
	return FALSE;
}

function ang_midtrans_snap_url()
{
	$url = ang_env_value('MIDTRANS_SNAP_URL');
	return $url !== '' ? $url : (ang_env_flag('MIDTRANS_IS_PRODUCTION')
		? 'https://app.midtrans.com/snap/snap.js'
		: 'https://app.sandbox.midtrans.com/snap/snap.js');
}
