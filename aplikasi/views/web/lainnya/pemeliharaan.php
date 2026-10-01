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

  $app_konfigurasi = $this->campuran->konfigurasi();
?>
<!DOCTYPE html>
<html lang="id" data-theme="terang">
  <head>
    <title>Website Sedang Dalam Pemeliharaan - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('pemeliharaan')], FALSE); ?>
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/website.css'); ?>">
  </head>
  <body>
    <main class="pemeliharaan d-flex justify-content-center align-items-center p-5">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <center>
            <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url('media/website/pemeliharaan.svg'); ?>" style="width: 250px; height: auto;" alt="Sedang dalam Pemeliharaan">
          </center>
          <div class="text-center mt-2">
            <h1 class="f-bt">Sedang Dalam Pemeliharaan</h1>
            <p class="f-bt">Mohon maaf, website Always Ngoding sedang dalam mode pemeliharaan, anda tetap bisa menghubungi tim kami melalui media sosial kami jika perlu.</p>
            <div class="pemeliharaan-sosmed">
              <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->facebook; ?>" target="_blank" data-toggle="tooltip" title="Facebook Always Ngoding" aria-label="Facebook Always Ngoding">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="link-sosmed" style="text-decoration: none;" href="<?= $app_konfigurasi->instagram; ?>" target="_blank" data-toggle="tooltip" title="Instagram Always Ngoding" aria-label="Instagram Always Ngoding">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
  </body>
</html>
