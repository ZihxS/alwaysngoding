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
            <h2 class="judul-teori">Property background-attachment Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Property background-attachment berfungsi <b>untuk mengatur kontrol scrolling pada background gambar (property <q>background-image</q>)</b>. Lihat cara penggunaan property background-attachment pada kode CSS di bawah ini:</p>
              <pre class="language-css line-numbers"><code>body {
  background-image: url('../background/bg.jpeg');
  background-repeat: no-repeat;
}
body.bg-scroll {
  background-attachment: scroll;
}
body.bg-fixed {
  background-attachment: fixed;
}
</code></pre>
              <ul>
                <li>Element <b>body</b> yang mempunyai <b>class <q>bg-scroll</q></b> backgroundnya akan <b>tetap mengikuti objek konten</b> di browser.</li>
                <li>Element <b>body</b> yang mempunyai <b>class <q>bg-fixed</q></b> backgroundnya akan <b>diam atau tidak bergerak</b> ketika kalian scroll browser.</li>
              </ul>
              <blockquote class="catatan-pelajaran mb-2">
                Nilai scroll sebenarnya adalah nilai default property background-attachment.
              </blockquote>
              <blockquote class="catatan-pelajaran">
                Jika ingin membuat <b>efek parallax</b> pada website, kalian <b>bisa menggunakan nilai fixed</b> di property background-attachment.
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