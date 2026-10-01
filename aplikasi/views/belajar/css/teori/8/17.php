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
  $u = 'belajar-css/teori/lebih-banyak-tentang-css';
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
            <h2 class="judul-teori">Lebih Banyak Tentang CSS Media Queries</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Berikut adalah beberapa contoh cara menggunakan atau memanfaatkan Media Queries:</p>
              <pre class="language-css"><code>@media print and (min-width: 480px) { /* kode */ }</code></pre>
              <p class="mb-0">Persyaratan di atas berlaku untuk print preview dan jika lebar web browser lebih dari atau sama dengan 480 px.</p>
              <pre class="language-css"><code>@media screen, print and (min-width: 768px) { /* kode */ }</code></pre>
              <p class="mb-0">Persyaratan di atas berlaku untuk print preview atau screen dan jika lebar web browser lebih dari atau sama dengan 768 px.</p>
              <pre class="language-css"><code>@media (min-width: 30em) and (orientation: landscape) { /* kode */ }</code></pre>
              <p class="mb-0">Persyaratan di atas jika lebar web browser lebih dari atau sama dengan 30 em dan jika orientasinya landscape.</p>
              <pre class="language-css"><code>@media screen and (min-width: 30em) and (orientation: landscape) { /* kode */ }</code></pre>
              <p class="mb-0">Persyaratan di atas berlaku hanya untuk screen saja dan jika lebar web browser lebih dari atau sama dengan 30 em dan jika orientasinya landscape.</p>
              <pre class="language-css"><code>@media (min-height: 680px), screen and (orientation: portrait) { /* kode */ }</code></pre>
              <p class="mb-0">Persyaratan di atas jika tinggi web browser lebih dari atau sama dengan 680 px. Atau hanya berlaku untuk screen saja dan jika orientasinya potrait. Jadi kode di atas sama saja seperti kode di bawah ini (2 kondisi yang berbeda tetapi dengan kode CSS yang sama didalamnya):</p>
              <pre class="language-css"><code>@media (min-height: 680px) { /* kode */ }
@media screen and (orientation: portrait) { /* kode */ }</code></pre>
              <p class="mb-0">Jika masih bingung atau ingin menjelajah lebih banyak. Kalian bisa menuju ke link di bawah ini:</p>
              <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/Media_Queries/Using_media_queries" target="_blank">https://developer.mozilla.org/en-US/docs/Web/CSS/Media_Queries/Using_media_queries</a>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>