<link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
<?php if ($sa): ?>
	<link rel="stylesheet" href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap">
<link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('perpustakaan/fab/fab.css'); ?>">
<link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/animate.css'); ?>">
<?php if ($p): ?>
	<link rel="stylesheet" href="<?= base_url('perpustakaan/prism/prism.css'); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/website.css'); ?>">
<?php $this->load->view('web/markas/tema', NULL, FALSE); ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188139073-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-188139073-1');
</script>