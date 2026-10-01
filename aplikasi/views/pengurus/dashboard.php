<!-- ELAPSED:{elapsed_time} DETIK | MEMORY USAGE:{memory_usage} -->
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

  $nama_penggunanya = $this->session->ang_nama_pengguna;
  $jenis_kelaminnya = strtolower($this->pengguna->ambil_jenis_kelamin($nama_penggunanya));
  $foto_pengurusnya = $this->pengguna->ambil_foto($nama_penggunanya);
  $foto_pengurusnya = $foto_pengurusnya !== NULL ? $foto_pengurusnya : "{$jenis_kelaminnya}.png";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->load->view('head-pengurus', NULL, FALSE); ?>
    <title>Area Pengurus - Always Ngoding</title>
    <link href="<?= base_url('media/website/logo.png'); ?>" rel="icon" type="image/x-icon">
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/animate-css/animate.css'); ?>" rel="stylesheet">
    <?php if ($this->session->ang_level == 'superadmin'): ?>
      <link href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
    <?php endif; ?>
    <link href="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/themes/all-themes.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/app.css'); ?>" rel="stylesheet">
  </head>
  <body class="theme-red">
    <?php $this->load->view('pengurus/markas/atas'); ?>
    <section>
      <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
          <div class="image">
            <img src="<?= base_url('media/foto-pengguna/'.$foto_pengurusnya); ?>" width="48" height="48" alt="Foto Pengurus">
          </div>
          <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $this->pengguna->ambil_nama_lengkap($nama_penggunanya); ?>
            </div>
            <div class="email">
              <?= $nama_penggunanya; ?>
            </div>
            <div class="btn-group user-helper-dropdown hidden-xs hidden-sm">
              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="<?= site_url('area-pengurus/data-diri'); ?>"><i class="material-icons">person</i>Data Diri</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="<?= site_url('area-pengurus/keluar'); ?>"><i class="material-icons">input</i>Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('pengurus/markas/menu'); ?>
      </aside>
      <?php $this->load->view('pengurus/markas/tema'); ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <h2 class="judul-halaman">ANG DASHBOARD</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li class="active">
                  <i class="material-icons">dashboard</i> Dashboard
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="row">
          <?php if ($this->session->flashdata('uatm')): ?>
            <div class="col-xs-12">
              <div class="alert bg-teal" role="alert">
                Anggota Terbaik Mingguan berhasil diperbaharui, silahkan cek landing page untuk memastikannya.
              </div>
            </div>
          <?php endif; ?>
          <?php if ($this->session->ang_level == 'superadmin'): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/artikel'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">event_note</i>
                  </div>
                  <div class="content">
                    <div class="text">Artikel</div>
                    <div class="number"><?= $this->artikel->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/artikel/kategori'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">event_note</i>
                  </div>
                  <div class="content">
                    <div class="text">Kategori Artikel</div>
                    <div class="number"><?= $this->kategori->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/artikel/komentar'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">event_note</i>
                  </div>
                  <div class="content">
                    <div class="text">Komentar Artikel</div>
                    <div class="number"><?= $this->k_artikel->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/diskusi'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">forum</i>
                  </div>
                  <div class="content">
                    <div class="text">Diskusi</div>
                    <div class="number"><?= $this->diskusi->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/diskusi/jawaban'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">forum</i>
                  </div>
                  <div class="content">
                    <div class="text">Jawaban Diskusi</div>
                    <div class="number"><?= $this->j_diskusi->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/pengguna'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">wc</i>
                  </div>
                  <div class="content">
                    <div class="text">Pengguna</div>
                    <div class="number"><?= $this->pengguna->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/suara-anggota'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">volume_up</i>
                  </div>
                  <div class="content">
                    <div class="text">Suara Anggota</div>
                    <div class="number"><?= $this->suara->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xs-12">
              <div class="card">
                <div class="header">
                  <h2>
                    TENTANG ALWAYS NGODING
                  </h2>
                </div>
                <div class="body">
                  <p class="align-justify">
                    Always Ngoding adalah tempat untuk belajar tentang pemrograman dan apapun itu yang berkaitan dengan dunia teknologi. Bertujuan untuk menambah sumber daya programmer di Indonesia, menyediakan banyak materi, artikel, teori, video, praktek dan referensi yang berkaitan dengan pemrograman juga dunia teknologi.
                  </p>
                  <p class="align-justify">
                    Always Ngoding berusaha untuk menempati posisi pertama di Indonesia sebagai penyedia tempat untuk belajar pemrograman juga hal-hal yang berkaitan dengan dunia teknologi. Insya Allah dengan niat tujuan yang baik untuk bangsa Indonesia dan dengan banyaknya partisipan Always Ngoding maka tidak akan mustahil Always Ngoding akan menempati posisi tersebut.
                  </p>
                  <p class="align-justify">
                    Dibuatnya Always Ngoding karena termotivasi dan terinspirasi oleh banyak website belajar online, namun belum ada website belajar online yang sangat nyaman seperti Always Ngoding ini dan tentunya konten-konten di Always Ngoding didominasi menggunakan bahasa Indonesia agar mudah dimengerti oleh masa depan Indonesia (kalian).
                  </p>
                  <p>
                    Terima kasih untuk:
                    <ol>
                      <li>Semua Yang Berkontribusi Untuk Always Ngoding</li>
                      <li>Kedua Orang Tua Muhammad Saleh Solahudin</li>
                      <li>Kekasih Muhammad Saleh Solahudin: <b>Karmila Sriwulan</b></li>
                    </ol>
                  </p>
                  <p class="m-b-0">Semoga <b>Always Ngoding</b> ini benar-benar sangat berguna untuk banyak orang, aamiin.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/pencapaian'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">stars</i>
                  </div>
                  <div class="content">
                    <div class="text">Pencapaian</div>
                    <div class="number"><?= $this->pencapaian->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/pencapaian/perolehan'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">stars</i>
                  </div>
                  <div class="content">
                    <div class="text">Perolehan Pencapaian</div>
                    <div class="number"><?= $this->p_pencapaian->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/sertifikat'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">local_play</i>
                  </div>
                  <div class="content">
                    <div class="text">Sertifikat</div>
                    <div class="number"><?= $this->sertifikat->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/sertifikat/perolehan'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">local_play</i>
                  </div>
                  <div class="content">
                    <div class="text">Perolehan Sertifikat</div>
                    <div class="number"><?= $this->p_sertifikat->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/periklanan'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">monetization_on</i>
                  </div>
                  <div class="content">
                    <div class="text">Periklanan</div>
                    <div class="number"><?= $this->iklan->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/link-iklan'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">link</i>
                  </div>
                  <div class="content">
                    <div class="text">Link Untuk Iklan</div>
                    <div class="number"><?= $this->link_iklan->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/lowongan-kerja'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">business_center</i>
                  </div>
                  <div class="content">
                    <div class="text">Lowongan Kerja</div>
                    <div class="number"><?= $this->loker->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/lowongan-kerja/komentar'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">business_center</i>
                  </div>
                  <div class="content">
                    <div class="text">Komentar Lowongan Kerja</div>
                    <div class="number"><?= $this->k_loker->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xs-12">
              <a href="<?= site_url('area-pengurus/donasi'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">card_giftcard</i>
                  </div>
                  <div class="content">
                    <div class="text">Jumlah Donasi Yang Terkumpul Dari Awal</div>
                    <div class="number">Rp<?= number_format($this->campuran->jumlah_donasi(),0,',','.'); ?>,-</div>
                  </div>
                </div>
              </a>
            </div>
          <?php elseif ($this->session->ang_level == 'admin'): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/artikel'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">event_note</i>
                  </div>
                  <div class="content">
                    <div class="text">Artikel</div>
                    <div class="number"><?= $this->artikel->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/artikel/kategori'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">event_note</i>
                  </div>
                  <div class="content">
                    <div class="text">Kategori Artikel</div>
                    <div class="number"><?= $this->kategori->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/artikel/kategori'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">event_note</i>
                  </div>
                  <div class="content">
                    <div class="text">Komentar Artikel</div>
                    <div class="number"><?= $this->k_artikel->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/diskusi'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">forum</i>
                  </div>
                  <div class="content">
                    <div class="text">Diskusi</div>
                    <div class="number"><?= $this->diskusi->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/diskusi/jawaban'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">forum</i>
                  </div>
                  <div class="content">
                    <div class="text">Jawaban Diskusi</div>
                    <div class="number"><?= $this->j_diskusi->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xs-12">
              <div class="card">
                <div class="header">
                  <h2>
                    TENTANG ALWAYS NGODING
                  </h2>
                </div>
                <div class="body">
                  <p class="align-justify">
                    Always Ngoding adalah tempat untuk belajar tentang pemrograman dan yang berkaitan dengan dunia teknologi. Bertujuan untuk menambah sumber daya programmer di indonesia, menyediakan banyak materi, artikel, teori, video, praktek dan referensi yang berkaitan dengan pemrograman juga dunia teknologi.
                  </p>
                  <p class="align-justify">
                    Always Ngoding berusaha untuk menempati posisi pertama di indonesia sebagai penyedia tempat untuk belajar pemrograman juga hal-hal yang berkaitan dengan dunia teknologi. Insya Allah dengan niat dan tujuan yang baik untuk bangsa indonesia juga dengan banyak partisipan Always Ngoding maka tidak akan mustahil Always Ngoding akan menempati posisi tersebut.
                  </p>
                  <p class="align-justify">
                    Dibuatnya Always Ngoding karena termotivasi dan terinspirasi oleh banyak website belajar online, namun belum ada website belajar online yang sangat nyaman seperti Always Ngoding ini dan tentunya konten konten di Always Ngoding didominasi menggunakan bahasa indonesia yang bertujuan untuk mudah dimengerti oleh masa depan indonesia.
                  </p>
                  <p>
                    Terima kasih untuk:
                    <ol>
                      <li>Semua Yang Berkontribusi Untuk Always Ngoding</li>
                      <li>Kedua Orang Tua Muhammad Saleh Solahudin</li>
                      <li>Kekasih Muhammad Saleh Solahudin: <b>Karmila Sriwulan</b></li>
                    </ol>
                  </p>
                  <p>Semoga <b>Always Ngoding</b> ini benar-benar sangat berguna untuk banyak orang, aamiin.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/pengguna'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">wc</i>
                  </div>
                  <div class="content">
                    <div class="text">Pengguna</div>
                    <div class="number"><?= $this->pengguna->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?= site_url('area-pengurus/suara-anggota'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">volume_up</i>
                  </div>
                  <div class="content">
                    <div class="text">Suara Anggota</div>
                    <div class="number"><?= $this->suara->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <a href="<?= site_url('area-pengurus/link-iklan'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">link</i>
                  </div>
                  <div class="content">
                    <div class="text">Link Untuk Iklan</div>
                    <div class="number"><?= $this->link_iklan->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <a href="<?= site_url('area-pengurus/lowongan-kerja'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">business_center</i>
                  </div>
                  <div class="content">
                    <div class="text">Lowongan Kerja</div>
                    <div class="number"><?= $this->loker->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <a href="<?= site_url('area-pengurus/lowongan-kerja'); ?>" class="link-dashboard">
                <div class="info-box info-box-custom hover-zoom-effect">
                  <div class="icon">
                    <i class="material-icons">business_center</i>
                  </div>
                  <div class="content">
                    <div class="text">Komentar Lowongan Kerja</div>
                    <div class="number"><?= $this->k_loker->jumlah(); ?></div>
                  </div>
                </div>
              </a>
            </div>
          <?php endif; ?>
          <div class="col-xs-12">
            <div class="card">
              <div class="header">
                <h2>RIWAYAT / LOG AKTIFITAS</h2>
                <?php if ($this->session->ang_level == 'superadmin'): ?>
                  <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                      </a>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" id="hapus-riwayat">Hapus semua riwayat</a></li>
                      </ul>
                    </li>
                  </ul>
                <?php endif; ?>
              </div>
              <div class="body table-responsive">
                <table class="table table-striped table-bordered table-hover" id="data-riwayat" width="100%">
                  <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>Isi</th>
                      <th width="30%">Tanggal dan waktu</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            <?php if ($this->session->ang_level == 'superadmin'):?>
              <a href="<?= site_url('area-pengurus/uatm'); ?>" id="uatm" class="btn btn-primary btn-block waves-effect" style="margin-bottom: 35px;">UPDATE ANGGOTA TERBAIK MINGGUAN</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <?php if ($this->session->ang_level == 'superadmin'): ?>
      <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <?php endif; ?>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/ang.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      let ctoken = "<?= $this->security->get_csrf_hash(); ?>";
      <?php if ($_SERVER['CI_ENV'] == 'development'): ?>
        let sckt = io.connect(<?= json_encode($_SERVER['ANG_SOCKET'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
      <?php else: ?>
        <?php if ($_SERVER['ANG_SOCKET'] != $_ENV['ANG_SOCKET_TRANSPORT_POLLING_URL']): ?>
          let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`);
        <?php else: ?>
          let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`, {transports: ['polling']});
        <?php endif; ?>
      <?php endif; ?>
      const __np__ = '<?= $nama_penggunanya; ?>';

      $(function(){
        let tabel = $('#data-riwayat').DataTable({
          'processing':true,
          'serverSide':true,
          'order':[],
          'ajax':{
            'url':"<?= site_url('area-pengurus/data-riwayat'); ?>",
            'type':'POST',
            error: function(jqXHR,textStatus,errorThrown){
              <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
            }
          },
          'columnDefs':[{
            'targets':[0],
            'orderable':false
          }],
          'language':{
           'info':'Menampilkan _START_ ~ _END_ (dari _TOTAL_ data)',
            'paginate':{
              'previous':'Sebelumnya',
              'next':'Selanjutnya'
            },
            'infoEmpty':'Tidak ada data untuk ditampilkan',
            'lengthMenu':'Tampilkan _MENU_ data',
            'search':'Pencarian :',
            'zeroRecords':'<center>Tidak ada data untuk ditampilkan</center>',
            'infoFiltered':' \(disaring dari _MAX_ data)',
            'searchPlaceholder':'Cari data disini',
            'loadingRecords':'',
            'processing':''
          },
          'responsive':true,
          'autoWidth':true,
          "searchDelay":500,
          "drawCallback":function(){
            tooltip();
           }
        });

        sckt.on('perbaharui riwayat',function(){
          tabel.ajax.reload();
        });
      });

      <?php if ($this->session->ang_level == 'superadmin'):?>
        $('#hapus-riwayat').on('click',function(){
          swal({
            title:"Apakah anda yakin??",
            text:"Yakin ingin menghapus semua riwayat??",
            type:"warning",
            showCancelButton:true,
            confirmButtonColor:"#DD6B55",
            confirmButtonText:"Ya, Yakin!",
            cancelButtonText:"Tidak jadi!",
            closeOnConfirm:false,
            showLoaderOnConfirm:true,
            closeOnCancel:true
          },function(setuju){
            if (setuju){
              $.ajax({
                url:"<?= site_url('area-pengurus/hapus-riwayat'); ?>",
                success:function(respon){
                  sckt.emit('perbaharui riwayat');
                  swal({
                    title:"Informasi",
                    text:respon,
                    type:"success",
                    showCancelButton:false,
                    confirmButtonText:"Mantap"
                  });
                },
                error:function(respon){
                  swal({
                    title:"Terjadi Kesalahan",
                    text:"Silahkan Hubungi Developer Agar Diperbaiki.",
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
                }
              });
            }
          });
        });

        $('#uatm').on('click',function(){
          $(this).html('MOHON TUNGGU...').attr('disabled', 'disabled');
        });
      <?php endif; ?>
    </script>
  </body>
</html>
