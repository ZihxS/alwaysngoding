<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

/*
	Created And Writed BY Muhammad Saleh Solahudin
	Dont Change Credits
	Dont Steal My Logic
	Note: Script / Syntax / Code Bisa Di CoPas, Tetapi Keahlian, Pengetahuan, Skill, Imagination And Logic Tidak Bisa Di CoPas :D
	Special ThankS To: (Allah S.W.T | My Father and Mother | <3 KarmilaSriwulan <3)
	Kata-kata Mutiara: "Stay Hungry","Stay Tired","Stay Code","Stay Foolish","Stay Thirsty".
*/

class Alwaysngoding
{
	protected $ANG;

	// Settings Rate limiter
	private $rate_imit_max_requests = 115;
	private $rate_limit_blocked_time = 60*5; // 5 menit
	private $rate_limit_time_periode = 60*2; // 2 menit

  public function __construct()
  {
		$this->ANG =& get_instance();
  }

  // Mengkonversi tanggal menjadi ke bahasa indonesia
	private function _konversi_tanggal($tanggal)
	{
		$hari = [
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jum`at',
			'Saturday'  => 'Sabtu',
			'Sunday'    => 'Minggu'
		];

		$bulan = [
			'January'   => 'Januari',
			'February'  => 'Februari',
			'March'     => 'Maret',
			'April'     => 'April',
			'May'       => 'Mei',
			'June'      => 'Juni',
			'July'      => 'Juli',
			'August'    => 'Agustus',
			'September' => 'September',
			'October'   => 'Oktober',
			'November'  => 'November',
			'December'  => 'Desember'
		];

		$data = array_merge($hari,$bulan);

		foreach ($data as $kunci => $isi)
		{
			$tanggal = str_replace($kunci,$isi,$tanggal);
		}

		return $tanggal;
	}

  // Mengembalikan nilai sekarang dengan format ([nama hari], [tanggal] [nama bulan] tahun (jam:menit:detik WIB))
	public function sekarang()
	{
		return $this->_konversi_tanggal(date('l, d F Y (H:i:s').' WIB)');
	}

	// Mengembalikan nilai tanggal sekarang dengan format (monday, [tanggal] [nama bulan] [tahun])
	public function tanggal()
	{
		return $this->_konversi_tanggal(date('l, d F Y'));
	}

	// Mengembalikan nilai $tanggal menjadi format tanggal indonesia
	public function tanggal_indonesia($tanggal)
	{
		$explode = explode('-',$tanggal);

		return "$explode[2]/$explode[1]/$explode[0]";
	}

	public function tanggal_bulan_indonesia($tanggal)
	{
		$bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

		$explode = explode('-',$tanggal);

		return $explode[2].' '.$bulan[((int)$explode[1])-1].' '.$explode[0];
	}

	public function unlink($link)
	{
		if (file_exists($link))
		{
			unlink($link);
		}
	}

	public function bikin_slug($data,$table)
	{
		$slug = url_title($data,'dash',TRUE);

		return $this->ANG->campuran->cek_slug($slug,$table) == 0 ? $slug : $slug.'-'.time();
	}

	public function hapus_tags_tidak_terpakai()
	{
		foreach ($this->ANG->tags->ambil_tags() as $hasil)
		{
			$this->ANG->tags->htjtt($hasil->tags);
		}
	}

	public function cek_tambah_hapus_tags($tags)
	{
		$explode_tags = explode(', ',$tags);
		$array_tags   = [];

		foreach ($explode_tags as $hasil)
		{
			array_push($array_tags,$hasil);
		}

		foreach ($array_tags as $data_tags)
		{
			if ($this->ANG->tags->cek_tags($data_tags) == 0)
			{
				$this->ANG->db->insert('tags',['tags' => $data_tags]);
			}
		}

		$this->hapus_tags_tidak_terpakai();
	}

	public function ambil_alamat_ip()
	{
		if (getenv('HTTP_CLIENT_IP')) return getenv('HTTP_CLIENT_IP');
		elseif (getenv('HTTP_X_FORWARDER_FOR')) return getenv('HTTP_X_FORWARDER_FOR');
		elseif (getenv('HTTP_X_FORWARDER')) return getenv('HTTP_X_FORWARDER');
		elseif (getenv('HTTP_FORWARDER_FOR')) return getenv('HTTP_FORWARDER_FOR');
		elseif (getenv('HTTP_FORWARDER')) return getenv('HTTP_FORWARDER');
		elseif (getenv('REMOTE_ADDR')) return getenv('REMOTE_ADDR');
		else return 'IP tidak diketahui';
	}

	public function bikin_token($simple=FALSE)
	{
		if ($simple)
		{
			$token = md5("").sha1('mssloveksw');
		}
		else
		{
			$a_z    = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
			$x      = count($a_z)-1;
			$token  = "{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9);
			$token .= "{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}";
			$token .= rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
			$token .= rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}";
			$token .= "{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9);
			$token .= "{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}";
			$token .= rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
			$token .= rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}";
			$token .= "{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9);
			$token .= "{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}";
			$token .= rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
			$token .= rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}";
			$token .= "{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9);
			$token .= "{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}{$a_z[rand(0, $x)]}";
			$token .= rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
			$token .= rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}".rand(0, 9)."{$a_z[rand(0, $x)]}";
		}

		return $token;
	}

	// SUKA BIKIN NGELEG JADI DINONAKTIFKAN
	public function bot($pesan){}

	// Twitter BOT Posting Status
	public function tbps($status)
	{
		if (!ang_integration_enabled('twitter')) return FALSE;

		$connection = new TwitterOAuth(ang_env_value('TWITTER_CONSUMER_KEY'),
			ang_env_value('TWITTER_CONSUMER_SECRET'), ang_env_value('TWITTER_ACCESS_TOKEN'),
			ang_env_value('TWITTER_ACCESS_TOKEN_SECRET'));
		$posting = $connection->post("statuses/update", [
			"status" => str_replace(' :partying_face:', '.', $status)
		]);

		if ($connection->getLastHttpCode() == 200) {}
		else {}
	}

	// Kirim Aktifitas Ke Discord
	public function kakd($aktifitas,$posting_ke_twitter=FALSE)
	{
		if (($_SERVER['CI_ENV'] ?? 'development') != 'development')
		{
			$webhookurl = trim($_ENV['DISCORD_WEBHOOK_URL'] ?? '');
			if (ang_integration_enabled('discord'))
			{
				$timestamp = date("c", strtotime("now"));
				$json_data = json_encode([
					"content"  => $aktifitas,
					"tts"      => false
				], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

				$ch = curl_init($webhookurl);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_exec($ch);
				curl_close($ch);
			}

			if ($posting_ke_twitter && ang_integration_enabled('twitter'))
			{
				$this->tbps($aktifitas);
			}
		}
	}

	// Clear Inputan
	public function ci($inputan)
	{
		return $this->ANG->db->escape_str(htmlspecialchars(strip_tags($inputan)));
	}

	// Clear Wysiwyg
	public function cw($html)
	{
    do {
	    $_tmp = $html;
	    $html = preg_replace( '#<([^ >]+)[^>]*>([[:space:]]|&nbsp;)*</\1>#', '', $html);
		} while ($html !== $_tmp);

		return $html;
	}

	// Modify Strip Tags
	public function mst($string)
	{
		$string = str_replace('<p>&nbsp;</p>','',$string);
		$string = str_replace('<br>',', ',$string);
		$string = str_replace('<br><br>',', ',$string);
		$string = str_replace('<br><br>',', ',$string);
		$string = str_replace('<br><br><br>',', ',$string);
		$string = str_replace('<br/>',', ',$string);
		$string = str_replace('<br/><br/>',', ',$string);
		$string = str_replace('<br/><br/><br/>',', ',$string);
		$string = str_replace('<br />',', ',$string);
		$string = str_replace('<br /><br />',', ',$string);
		$string = str_replace('<br /><br /><br />',', ',$string);
		$string = str_replace('</p>','</p>, ',$string);
		$string = trim($string);

		if (substr($string, -1) == ',')
		{
			$string = substr($string, 0, -1);
		}

		$string = strip_tags($string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(', ,',',',$string);
		$string = str_replace('., ','. ',$string);
		$string = str_replace(':, ',': ',$string);
		$string = ltrim($string,',');
		$string = trim($string);
		$string = str_replace(',,',',',$string);
		$string = str_replace(', ,',',',$string);
		$string = str_replace(' , ',', ',$string);

		return $string;
	}

	public function check_rate_limiter()
	{
		if ($this->ANG->session->has_userdata('ang_pengurus'))
		{
			return;
		}

		$client_ip = $this->ANG->input->ip_address();

		if (!$this->ANG->session->userdata('rate_limiter')) {
			$this->ANG->session->set_userdata('rate_limiter', array());
		}

		$rate_limiter_data = $this->ANG->session->userdata('rate_limiter');

		if (!isset($rate_limiter_data[$client_ip])) {
			$rate_limiter_data[$client_ip] = [
				'requests' => 1,
				'timestamp' => time(),
				'blocked_until' => null
			];
		} else {
			if ($rate_limiter_data[$client_ip]['blocked_until'] !== null) {
				if (time() < $rate_limiter_data[$client_ip]['blocked_until']) {
					show_error('Too many requests. You are blocked for a while. Please try again later.', 429);
					exit;
				} else {
					$rate_limiter_data[$client_ip]['blocked_until'] = null;
					$rate_limiter_data[$client_ip]['requests'] = 1;
					$rate_limiter_data[$client_ip]['timestamp'] = time();
				}
			} else {
				$time_difference = time() - $rate_limiter_data[$client_ip]['timestamp'];

				if ($time_difference > $this->rate_limit_time_periode) {
					$rate_limiter_data[$client_ip]['requests'] = 1;
					$rate_limiter_data[$client_ip]['timestamp'] = time();
				} else {
					$rate_limiter_data[$client_ip]['requests']++;
				}

				if ($rate_limiter_data[$client_ip]['requests'] > $this->rate_imit_max_requests) {
					$rate_limiter_data[$client_ip]['blocked_until'] = time() + $this->rate_limit_blocked_time;
					show_error('Too many requests. You are blocked for a while. Please try again later.', 429, 'Too Many Request');
					exit;
				}
			}
		}

		$this->ANG->session->set_userdata('rate_limiter', $rate_limiter_data);
	}

	public function clean_path($path) {
		$path = trim($path);

		if (preg_match('/^(http|https):\/\//i', $path)) {
				return '/';
		}

		if (strpos($path, '..') !== false) {
				return '/';
		}

		if ($path[0] !== '/') {
				$path = '/' . $path;
		}

		$path = preg_replace('/[^a-zA-Z0-9\/_\-]/', '', $path);

		return $path;
	}
}
