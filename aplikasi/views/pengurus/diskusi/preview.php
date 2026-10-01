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

  $fp = $this->pengguna->ambil_foto($diskusi->penginput); // Foto Penginput
  $tp = $this->pengguna->ambil_tentang($diskusi->penginput); // Tentang Penginput
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Preview Diskusi</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Muhammad Saleh Solahudin, m.saleh.solahudin@gmail.com" name="author">
    <meta content="Muhammad Saleh Solahudin" name="owner">
    <meta content="#DC3545" name="theme-color">
    <meta content="#DC3545" name="msapplication-navbutton-color">
    <meta content="#DC3545" name="msapplication-TileColor">
    <meta content="#DC3545" name="apple-mobile-web-app-status-bar-style">
    <link rel="icon" href="<?= base_url('media/website/logo.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
    <link id="cssFont" rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fab/fab.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/prism/prism.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/website.css'); ?>">
  </head>
  <body>
    <?php $this->load->view('web/markas/tema', NULL, FALSE); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= site_url(); ?>">
          <img src="<?= base_url('media/website/logo.png') ?>" width="40" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi" aria-controls="navigasi" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigasi">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link f-bt" href="javascript:window.history.go(-1);">Kembali</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-90">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Preview Diskusi</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lihat-diskusi">
        <div class="header-v2">
          <h1>Preview Diskusi</h1>
        </div>
        <div class="row">
          <div class="col-12">
            <article class="card custom-card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span>
                    <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $fp === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$fp}"); ?>" class="fp-di-lihat-diskusi d-none d-sm-none d-md-inline" alt="Foto Profil <?= $diskusi->penginput; ?>">
                    <small class="text-muted">
                      <span id="penginput-diskusi">
                        <?php if ($this->session->has_userdata('ang_akses') && $diskusi->penginput == $this->session->ang_nama_pengguna): ?>
                          <?= substr($diskusi->penginput,0,12).(strlen($diskusi->penginput) > 12 ? '...' : ''); ?>
                        <?php else: ?>
                          <span class="nama-penginput"><?= $diskusi->penginput; ?></span>
                          <span class="detail-penginput-diskusi" id="detail-penginput-diskusi">
                            <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $fp === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$fp}"); ?>" alt="Foto Profil <?= $diskusi->penginput; ?>" class="foto-detail-penginput d-none d-sm-none d-md-inline">
                            <big><?= $diskusi->penginput; ?></big>
                            <p class="mt-1 text-justify">
                              <?php if ($tp === NULL): ?>
                                Ngoding itu kapan saja, dimana saja dan dengan siapa saja.
                              <?php else: ?>
                                <?= strlen($tp) >= 60 ? substr($tp,0,57) : $tp; ?>
                              <?php endif; ?>
                            </p>
                            <span class="lihat-profil-selengkapnya">
                              <a href="<?= site_url("anggota/{$diskusi->penginput}"); ?>" target="_blank">Selengkapnya</a>
                            </span>
                            <span class="bersihkan"></span>
                          </span>
                        <?php endif; ?>
                      </span>
                    </small>
                  </span>
                  <span>
                    <small class="text-muted">
                      <?= $this->ang->tanggal_bulan_indonesia($diskusi->tanggal_posting); ?>
                      <span class="titik-pemisah"></span>
                      <?= $diskusi->jam_posting; ?> WIB
                    </small>
                  </span>
                </div>
                <hr>
                <?= $diskusi->isi; ?>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted"><span id="jumlah-suka-diskusi">???</span> Jumlah Suka</small>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/prism/prism.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      let statusAnimasiPenginput = false;

      $(function(){
        $("#penginput-diskusi").hover(function(){
          if (statusAnimasiPenginput == false){
            $("#detail-penginput-diskusi").fadeIn(300);
          }
        },function(){
          statusAnimasiPenginput = true;
          $("#detail-penginput-diskusi").fadeOut(300,function(){
            statusAnimasiPenginput = false;
          });
        });
      });
    </script>
  </body>
</html>
