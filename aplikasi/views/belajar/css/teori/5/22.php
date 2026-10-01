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
  $p = $b-1; // Selanjutnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/posisi-dan-layout-pada-css';
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
            <h2 class="judul-teori">Property "z-index" Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Property z-index pada CSS <b>berkaitan dengan tumpuk menumpuk (tumpukan)</b>, sama halnya layer pada aplikasi Photoshop, semakin tinggi isi atau valuenya maka index nya semakin besar. Berikut adalah contoh penggunaan property z-index pada CSS:</p>
              <pre class="language-css line-numbers" data-line="7,18,29"><code>.layer_1 {
  background-color: red;
  width: 200px;
  height: 150px;
  color: white;
  position: absolute;
  z-index: 2;
}

.layer_2 {
  background-color: yellow;
  width: 200px;
  height: 150px;
  color: black;
  position: absolute;
  top: 45px;
  left: 45px;
  z-index: 3;
}

.layer_3 {
  background-color: green;
  width: 200px;
  height: 150px;
  color: white;
  position: absolute;
  top: 75px;
  left: 75px;
  z-index: 1;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Penjelasan:</p>
              <ul class="mb-2">
                <li>Element dengan <b><q>class layer_3</q></b> akan <b><q>ditumpuk oleh element dengan class layer_1</q></b>.</li>
                <li>Element dengan <b><q>class layer_1</q></b> akan <b><q>ditumpuk oleh element dengan class layer_2</q></b>.</li>
              </ul>
              <blockquote class="catatan-pelajaran">
                Isi atau value dari property <b><q>z-index</q></b> bisa diisi dengan nilai minus (negative).
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>