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
  $x = ucwords(str_replace('-',' ',$this->uri->segment(3))).' #'.$b;
  $u = 'belajar-css/teori/bekerja-dengan-text';
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
            <h2 class="judul-teori">Property Color Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sesuai dengan nama property nya, <b>fungsi property color adalah untuk mengatur warna text atau font</b>. Isi (value) property color bisa berupa warna dalam bahasa inggris, bisa berupa kode warna HEX, bisa berupa kode warna RGB, bisa berupa kode warna RGBA, bisa berupa kode warna HSL dan bisa berupa kode warna HSLA.
              </p>
              <p class="m-0">Contoh property color yang isi (valuenya) berupa warna dalam bahasa inggris:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: maroon;
}
.biru {
  color: blue;
}
#kuning {
  color: yellow;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Contoh property color yang isi (valuenya) berupa kode warna HEX:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: #317F77;
}
.hitam {
  color: #000000;
}
#putih {
  color: #FFF;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Contoh property color yang isi (valuenya) berupa kode warna RGB:</p>
              <pre class="language-css line-numbers"><code>p {
  color: rgb(255,0,0);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Contoh property color yang isi (valuenya) berupa kode warna RGBA:</p>
              <pre class="language-css line-numbers"><code>p {
  color: rgba(255,0,0,1);
}
span {
  color: rgba(255,0,0,0.5);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Contoh property color yang isi (valuenya) berupa kode warna HSL:</p>
              <pre class="language-css line-numbers"><code>div {
  color: hsl(89,43%,51%);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/5"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Contoh property color yang isi (valuenya) berupa kode warna HSLA:</p>
              <pre class="language-css line-numbers"><code>div {
  color: hsla(89,43%,51%,1);
}
p {
  color: hsla(89,43%,51%,0.4);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/6"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">
                Untuk ALPHA (untuk menentukan tingkat transparan sebuah warna) di RGB<b>A</b> dan di HSL<b>A</b> bisa dibuah dari <b>0.5</b> menjadi <b>.5</b> (0 nya dihapus). Walaupun diubah output dan fungsinya tetap sama. Jadi bisa ngetik dengan lebih singkat 😄
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>