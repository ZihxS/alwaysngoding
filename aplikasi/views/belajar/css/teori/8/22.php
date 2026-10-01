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
            <h2 class="judul-teori">CSS Framework</h2>
            <hr>
            <div class="konten-teori">
              <p>Pekerjaan mendesain sebuah website adalah salah satu pekerjaan yang tidak mudah dan cukup memakan waktu, terutama ketika harus berkutat dengan CSS yang jumlah barisnya banyak dan rumit. <b>Untuk memudahkan dan mempercepat proses mendesain sebuah website, ada banyak tool yang dapat dimanfaatkan di antaranya adalah menggunakan CSS Framework.</b></p>
              <p class="m-0">CSS Framework adalah <b>pustaka CSS yang dimana sudah dibuat dan siap untuk digunakan</b>. Dengan CSS Framework proses <b>design website nantinya hanya tinggal menggunakan (memanggil) class-class yang sudah disediakan masing-masing CSS Framework</b>. Berikut CSS Framework populer yang bisa digunakan untuk membantu proses design sebuah website:</p>
              <ul>
                <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap</a></li>
                <li><a href="https://materializecss.com/" target="_blank">Materialize</a></li>
                <li><a href="https://semantic-ui.com/" target="_blank">Semantic UI</a></li>
                <li><a href="https://foundation.zurb.com/" target="_blank">Foundation</a></li>
                <li><a href="http://getskeleton.com/" target="_blank">Skeleton</a></li>
                <li><a href="https://bulma.io/" target="_blank">Bulma</a></li>
              </ul>
              <blockquote class="catatan-pelajaran">Always Ngoding memanfaatkan dan menggunakan CSS Framework. Always Ngoding menggunakan CSS Framework <b>Bootstrap</b> dan <b>Materialize</b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>