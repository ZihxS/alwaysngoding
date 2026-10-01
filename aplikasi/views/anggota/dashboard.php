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
  $nama_lengkapnya  = $this->pengguna->ambil_nama_lengkap($nama_penggunanya);
  $jenis_kelaminnya = $this->pengguna->ambil_jenis_kelamin($nama_penggunanya) != NULL ? strtolower($this->pengguna->ambil_jenis_kelamin($nama_penggunanya)) : 'kosong';
  $foto_anggotanya  = $this->pengguna->ambil_foto($nama_penggunanya);
  $foto_anggotanya  = $foto_anggotanya !== NULL ? $foto_anggotanya : "{$jenis_kelaminnya}.png";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard Anggota - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('anggota'), 'anggota' => TRUE], FALSE); ?>
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/animate-css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/themes/all-themes.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/app.css'); ?>" rel="stylesheet">
  </head>
  <body class="theme-red">
    <?php $this->load->view('anggota/markas/atas'); ?>
    <section>
      <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
          <div class="image">
            <img src="<?= base_url('media/foto-pengguna/'.$foto_anggotanya); ?>" width="48" height="48" alt="Foto Anggota">
          </div>
          <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $nama_lengkapnya; ?>
            </div>
            <div class="email">
              <?= $nama_penggunanya; ?>
            </div>
            <div class="btn-group user-helper-dropdown hidden-xs hidden-sm">
              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="<?= site_url('anggota/data-diri'); ?>"><i class="material-icons">person</i>Data Diri</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="<?= site_url('anggota/keluar'); ?>"><i class="material-icons">input</i>Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('anggota/markas/menu'); ?>
      </aside>
      <?php $this->load->view('anggota/markas/tema'); ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <h2 class="judul-halaman">DASHBOARD <?= strtoupper($nama_penggunanya); ?></h2>
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
          <div class="col-sm-4 col-xs-12">
            <a href="<?= site_url('anggota/artikel'); ?>" class="link-dashboard">
              <div class="info-box info-box-custom hover-zoom-effect">
                <div class="icon">
                  <i class="material-icons">event_note</i>
                </div>
                <div class="content">
                  <div class="text">Artikel Anda</div>
                  <div class="number"><?= $this->artikel->jumlah_by_pengguna(); ?></div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-sm-4 col-xs-12">
            <a href="<?= site_url('anggota/diskusi'); ?>" class="link-dashboard">
              <div class="info-box info-box-custom hover-zoom-effect">
                <div class="icon">
                  <i class="material-icons">forum</i>
                </div>
                <div class="content">
                  <div class="text">Diskusi Anda</div>
                  <div class="number"><?= $this->diskusi->jumlah_by_pengguna(); ?></div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-sm-4 col-xs-12">
            <a href="<?= site_url('anggota/lowongan-kerja'); ?>" class="link-dashboard">
              <div class="info-box info-box-custom hover-zoom-effect">
                <div class="icon">
                  <i class="material-icons">business_center</i>
                </div>
                <div class="content">
                  <div class="text">Lowongan Kerja Anda</div>
                  <div class="number"><?= $this->loker->jumlah_by_pengguna(); ?></div>
                </div>
              </div>
            </a>
          </div>
          <?php if ($nama_lengkapnya == NULL || $nama_lengkapnya == ''): ?>
            <div class="col-xs-12">
              <div class="alert alert-danger">
                Anda belum melengkapi data diri anda, mohon untuk melengkapi data diri anda agar anggota lain bisa mengenal lebih jauh tentang anda dan <b>untuk kelengkapan data pada sertifikat</b>. Silahkan menuju halaman ini untuk mengubah data diri anda: <span class="badge bg-white"><a href="<?= site_url('anggota/data-diri') ?>"><?= site_url('anggota/data-diri') ?></a></span><br><br>Terima kasih.
              </div>
            </div>
          <?php endif; ?>
          <div class="col-xs-12">
            <div class="card">
              <div class="header">
                <h2>
                  KELAS YANG TERSEDIA DI ALWAYS NGODING
                </h2>
              </div>
              <div class="body p-t-5">
                <div class="row">
                  <div class="col-sm-6 col-md-4 m-t-5 m-b-5">
                    <a href="<?= site_url('belajar-html/teori'); ?>" class="btn bg-teal btn-block btn-sm waves-effect">Belajar HTML</a>
                  </div>
                  <div class="col-sm-6 col-md-4 m-t-5 m-b-5">
                    <a href="<?= site_url('belajar-css/teori'); ?>" class="btn bg-teal btn-block btn-sm waves-effect">Belajar CSS</a>
                  </div>
                  <div class="col-sm-6 col-md-4 m-t-5 m-b-5">
                    <a href="<?= site_url('belajar-php/teori'); ?>" class="btn bg-teal btn-block btn-sm waves-effect">Belajar PHP</a>
                  </div>
                  <div class="col-sm-6 col-md-4 m-t-5 m-b-5">
                    <a href="<?= site_url('belajar-mysql/teori'); ?>" class="btn bg-teal btn-block btn-sm waves-effect">Belajar MySQL</a>
                  </div>
                  <div class="col-sm-6 col-md-4 m-t-5 m-b-5">
                    <a href="<?= site_url('belajar-javascript/teori'); ?>" class="btn bg-teal btn-block btn-sm waves-effect">Belajar JavaScript</a>
                  </div>
                  <div class="col-sm-6 col-md-4 m-t-5 m-b-5">
                    <button class="btn bg-teal btn-block btn-sm" disabled>Belajar Python (Segera Datang)</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="card">
              <div class="header">
                <h2>
                  INFORMASI
                </h2>
              </div>
              <div class="body">
                Jika kalian butuh bantuan atau panduan kalian bisa mengunjungi halaman:
                <ul class="m-b-0">
                  <li><a href="<?= site_url('diskusi'); ?>">Diskusi</a></li>
                  <li><a href="<?= site_url('anggota/panduan'); ?>">Panduan</a></li>
                  <li><a href="<?= site_url('pertanyaan-umum'); ?>">Pertanyaan Umum</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="card">
              <div class="header">
                <h2>
                  YUK BERDISKUSI
                </h2>
              </div>
              <div class="body">
                <div class="row">
                  <div class="col-md-4 m-t-5 m-b-5">
                    <a href="<?= site_url('diskusi'); ?>" class="btn bg-teal btn-block btn-sm waves-effect">
                      Berdiskusi di Website
                    </a>
                  </div>
                  <div class="col-md-4 m-t-5 m-b-5">
                    <a href="https://t.me/alwaysngoding" class="btn bg-teal btn-block btn-sm waves-effect" target="_blank">
                      Berdiskusi di Telegram
                    </a>
                  </div>
                  <div class="col-md-4 m-t-5 m-b-5">
                    <a href="https://discord.gg/scVnD8nHQG" class="btn bg-teal btn-block btn-sm waves-effect" target="_blank">
                      Berdiskusi di Discord
                    </a>
                  </div>
                </div>
              </div>
            </div>
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
                  Dibuatnya Always Ngoding karena termotivasi dan terinspirasi oleh banyak website belajar online, namun belum ada website belajar online yang sangat nyaman seperti Always Ngoding ini dan tentunya konten-konten di Always Ngoding didominasi menggunakan bahasa Indonesia agar mudah dimengerti oleh masa depan Indonesia.
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
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/ang.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
  </body>
</html>
