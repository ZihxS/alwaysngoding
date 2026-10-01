<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /*
  Created And Writed BY Muhammad Saleh Solahudin
  Dont Change Credits
  Dont Steal My Logic
  Note: Script / Syntax / Code Bisa Di CoPas, Tetapi Keahlian, Pengetahuan, SkillS, Imagination And Logic Tidak Bisa Di CoPas :D
  Special ThankS To: (Allah S.W.T | My Father and Mother | <3 KarmilaSriwulan <3)
  Kata-kata Mutiara: "Stay Hungry","Stay Tired","Stay Code","Stay Foolish".
  */

  $CI =& get_instance();

  if (!isset($CI))
  {
  	$CI = new CI_Controller();
  }

  $CI->load->helper('url');
?>

<!DOCTYPE html>
	<html>
	<head>
	  <meta charset="UTF-8">
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <title>ALWAYS NGODING</title>
	  <link href="<?= base_url('media/website/logo.png'); ?>" rel="icon" type="image/x-icon">
	  <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
	  <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
	  <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
	  <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
	</head>
	<body class="four-zero-four">
	  <div class="four-zero-four-container">
	    <div class="error-code f-sr"><?= $status_code; ?></div>
	    <div class="error-message f-rc"><?= $message; ?></div>
			<?php if ($status_code != 429): ?>
				<div class="button-place">
					<a href="javascript:window.history.go(-1);" class="btn btn-default btn-lg waves-effect f-koho">KEMBALI KE HALAMAN SEBELUMNYA</a>
				</div>
			<?php endif; ?>
	  </div>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	  <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
	  <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
	</body>
</html>
