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
            <h2 class="judul-teori">Property background-color Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Sesuai dengan nama property nya, fungsi property background-color adalah <b>untuk mengatur warna latar belakang</b> (background). Isi (value) property background-color sama seperti property color yaitu bisa berupa warna dalam bahasa inggris, bisa berupa kode warna HEX, bisa berupa kode warna RGB (Red Green Blue), bisa berupa kode warna RGBA (Red Green Blue Alpha), bisa berupa kode warna HSL (Hue Saturation Lightness), bisa berupa kode warna HSLA (Hue Saturation Lightness Alpha).</p>
              <p class="m-0">Contoh property background-color yang isi (valuenya) berupa warna dalam bahasa inggris:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: maroon;
}</code></pre>
              <p class="m-0">Contoh property backgounrd-color yang isi (valuenya) berupa kode warna HEX:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: #317F77;
}</code></pre>
              <p class="m-0">Contoh property backgounrd-color yang isi (valuenya) berupa kode warna RGB:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: rgb(255,0,0);
}</code></pre>
              <p class="m-0">Contoh property backgounrd-color yang isi (valuenya) berupa kode warna RGBA:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: rgba(255,0,0,1);
}
div {
  background-color: rgba(255,0,0,0.5);
}</code></pre>
              <p class="m-0">Contoh property backgounrd-color yang isi (valuenya) berupa kode warna HSL:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: hsl(89,43%,51%);
}</code></pre>
              <p class="m-0">Contoh property backgounrd-color yang isi (valuenya) berupa kode warna HSLA:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: hsla(89,43%,51%,1);
}
div {
  background-color: hsla(89,43%,51%,0.4);
}</code></pre>
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