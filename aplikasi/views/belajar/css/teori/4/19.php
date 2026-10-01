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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/property-property-pada-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Property background-position Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Property background-position berfungsi <b>untuk menentukan posisi background gambar (property <q>background-image</q>)</b>. Lihat cara penggunaan property background-position pada CSS:</p>
              <pre class="language-css line-numbers" data-line="4"><code>body {
  background-image: url('../background/bg.jpeg');
  background-repeat: no-repeat;
  background-position: right bottom;
}</code></pre>
              <p class="m-0">Kode di atas berfungsi untuk mengatur posisi background gambar menjadi di kanan bawah:</p>
              <ul class="m-0">
                <li>Nilai pertama, right bisa di ganti menjadi left atau center.</li>
                <li>Nilai kedua, bottom bisa di ganti menjadi top atau center.</li>
              </ul>
              <pre class="language-css line-numbers" data-line="4"><code>body {
  background-image: url('../background/bg.jpeg');
  background-repeat: no-repeat;
  background-position: 100px 150px;
}</code></pre>
              <p class="m-0">Kode di atas berfungsi untuk mengatur posisi background gambar menjadi ada di titik <b>100 pixel vertical</b> dan <b>150 pixel horizontal</b>.</p>
              <pre class="language-css line-numbers" data-line="4"><code>body {
  background-image: url('../background/bg.jpeg');
  background-repeat: no-repeat;
  background-position: 50% 50%;
}</code></pre>
              <p class="mb-2">Kode di atas berfungsi untuk mengatur posisi background gambar menjadi ada di titik <b>50 persen vertical</b> dan <b>50 persen horizontal</b>.</p>
              <blockquote class="catatan-pelajaran">
                Nilai pertama pada property background-position adalah nilai untuk titik vertical. Dan nilai kedua untuk titik horizontal.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>