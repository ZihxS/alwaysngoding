<meta charset="UTF-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<meta content="Muhammad Saleh Solahudin, m.saleh.solahudin@gmail.com" name="author">
<meta content="Muhammad Saleh Solahudin" name="owner">
<?php if (@$deskripsi === NULL): ?>
  <?php if (@$tidak_ada_deskripsi === NULL): ?>
    <meta content="Belajar pemrograman seru dan gratis hanya di alwaysngoding. Dapatkan diskusi dan artikel tentang dunia teknologi hanya di alwaysngoding. Cari lowongan kerja bermutu di dunia teknologi hanya di alwaysngoding. Download source code gratis hanya di alwaysngoding. Dapatkan banyak ilmu yang bermanfaat disini, di alwaysngoding." name="description">
  <?php endif; ?>
<?php else: ?>
  <meta content="<?= strip_tags($deskripsi); ?>" name="description">
<?php endif; ?>
<meta content="Muhammad Saleh Solahudin" name="copyright">
<meta content="worldwide" name="coverage">
<meta content="global" name="distribution">
<meta content="general" name="rating">
<meta content="1 days" name="revisit-after">
<meta content="<?= $url; ?>" name="url">
<meta content="Always Ngoding - Belajar Pemrograman Seru dan Gratis" name="application-name">
<?php if (@$anggota === NULL): ?>
    <meta content="#DC3545" name="theme-color">
    <meta content="#DC3545" name="msapplication-navbutton-color">
    <meta content="#DC3545" name="msapplication-TileColor">
    <meta content="#DC3545" name="apple-mobile-web-app-status-bar-style">
<?php else: ?>
    <meta content="#2D2D2D" name="theme-color">
    <meta content="#2D2D2D" name="msapplication-navbutton-color">
    <meta content="#2D2D2D" name="msapplication-TileColor">
    <meta content="#2D2D2D" name="apple-mobile-web-app-status-bar-style">
<?php endif; ?>
<meta content="Always Ngoding - Belajar Pemrograman Seru dan Gratis" name="apple-mobile-web-app-title">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="<?= $url; ?>" name="msapplication-starturl">
<meta content="true" name="mssmarttagspreventparsing">
<meta content="all" property="webcrawlers">
<meta content="all" property="spiders">
<meta content="all" property="robots">
<meta content="id" name="language">
<meta content="id" name="geo.country">
<meta content="ID-JB" name="geo.region">
<meta content="Indonesia" name="geo.placename">
<meta content="-0.789275; 113.921327" name="geo.position">
<meta content="-0.789275, 113.921327" name="ICBM">
<meta content="summary_large_image" name="twitter:card">
<meta content="@alwaysngoding" name="twitter:site">
<meta content="@alwaysngoding" name="twitter:creator">
<meta content="<?= $url; ?>" name="twitter:url">
<meta content="website" property="og:type">
<meta content="<?= $url; ?>" property="og:url">
<?php if (@$sosmed_image === NULL): ?>
  <meta content="<?= base_url('media/website/banner.png'); ?>" name="twitter:image:src">
  <meta content="<?= base_url('media/website/banner.png'); ?>" property="og:image">
<?php else: ?>
  <meta content="<?= $sosmed_image; ?>" name="twitter:image:src">
  <meta content="<?= $sosmed_image; ?>" property="og:image">
<?php endif; ?>
<?php if (@$sosmed_meta_title === NULL): ?>
  <meta content="Always Ngoding - Belajar Pemrograman Seru dan Gratis" name="twitter:title">
  <meta content="Always Ngoding - Belajar Pemrograman Seru dan Gratis" property="og:site_name">
  <meta content="Always Ngoding - Belajar Pemrograman Seru dan Gratis" property="og:title">
  <meta content="Tempat belajar pemrograman gratis berbahasa Indonesia, ayo belajar juga kembangkan dan manfaatkan ilmu anda di alwaysngoding." name="twitter:description">
  <meta content="Tempat belajar pemrograman gratis berbahasa Indonesia, ayo belajar juga kembangkan dan manfaatkan ilmu anda di alwaysngoding." property="og:description">
<?php else: ?>
  <meta content="<?= $sosmed_meta_title; ?>" name="twitter:title">
  <meta content="<?= $sosmed_meta_title; ?>" property="og:site_name">
  <meta content="<?= $sosmed_meta_title; ?>" property="og:title">
  <meta content="<?= $sosmed_meta_desc; ?>" name="twitter:description">
  <meta content="<?= $sosmed_meta_desc; ?>" property="og:description">
<?php endif; ?>
<meta content="id_ID" property="og:locale">
<?php $this->load->view('seo/verification'); ?>
<link rel="canonical" href="<?= current_url(); ?>">
<link rel="shortcut icon" href="<?= base_url('media/website/favicon.ico'); ?>" type="image/x-icon">
<link rel="icon" href="<?= base_url('media/website/favicon.ico'); ?>" type="image/x-icon">
<?php $this->load->view('seo/analytics'); ?>
