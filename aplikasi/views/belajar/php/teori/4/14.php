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

  $b = $this->uri->segment(5); // Bagian
  $p = $b-1; // Sebelumnya (Previous)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/kondisi-dan-perulangan-pada-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Perulangan while Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Perulangan <b><q>while</q></b> adalah <b>perulangan yang termasuk dalam uncounted loop</b>. Karena biasanya <b>digunakan untuk mengulang sesuatu yang belum jelas jumlah pengulangannya</b>. Namun, perulangan while juga bisa digunakan seperti perulangan for sebagai counted loop. Berikut adalah bentuk dasar perulangan while pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  while (kondisi) {
    // ini adalah blok kode yang akan diulang
  }
?&gt;</code></pre>
              <p class="mb-0">Berikut adalah contoh penggunaan perulangan while pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $kondisi = 1;

  while ($kondisi <= 100) {
    // ini adalah blok kode yang akan diulang
    echo "Ini adalah perulangan ke {$kondisi}&lt;br&gt;";
    $kondisi++;
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Perulangan akan dimulai dari 1, karena kita memberikan nilai <b><q>$kondisi = 1</q></b>. Lalu, perulangan akan diulang selama nilai <b><q>$kondisi</q></b> lebih kecil atau sama dengan <b><q>100</q></b>. Artinya, <b>perulangan ini akan mengulang sebanyak 100x</b>. Maksud dari <b><q>$kondisi++</q></b> adalah nilai <b><q>$kondisi</q></b> ditambah 1.</p>
              <blockquote class="catatan-pelajaran"><b><q>$kondisi++</q></b> bisa juga diganti dengan <b><q>$kondisi += 1</q></b></blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>