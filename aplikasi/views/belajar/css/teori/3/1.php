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
  $n = $b+1; // Selanjutnya (Next)
  $x = ucwords(str_replace('-',' ',$this->uri->segment(3))).' #'.$b;
  $u = 'belajar-css/teori/bekerja-dengan-text';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Bekerja Dengan Text</h2>
            <hr>
            <div class="konten-teori">
              <p>Modul ini akan mempelajari cara bekerja atau cara <b>memanipulasi text atau font atau kalimat</b> pada halaman website dengan CSS.</p>
              <p class="m-0">Berikut adalah daftar yang akan kalian pelajari di modul ini:</p>
              <ul class="m-0">
                <li>Property color</li>
                <li>Property font-size</li>
                <li>Property font-style</li>
                <li>Property font-family</li>
                <li>Property font-weight</li>
                <li>Property text-decoration</li>
                <li>Property text-transform</li>
                <li>Property text-shadow</li>
                <li>Property text-indent</li>
                <li>Property text-align</li>
                <li>Property letter-spacing</li>
                <li>Property word-spacing</li>
                <li>Property word-wrap</li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>