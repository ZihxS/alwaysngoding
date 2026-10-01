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
  $u = 'belajar-css/teori/berkenalan-dengan-css';
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
            <h2 class="judul-teori">Sejarah CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Nama CSS didapat dari fakta bahwa setiap deklarasi style yang berbeda dapat diletakkan secara berurutan, yang kemudian membentuk <b>hubungan orang tua-anak (parent-child) pada setiap style</b>. Untuk lebih jelasnya silahkan translate saja <q>Cascading Style Sheets</q> di google translate hehe 😄
              </p>
              <p>
                Cascading Style Sheets sendiri <b>merupakan sebuah teknologi internet yang direkomendasikan oleh World Wide Web Consortium</b> atau W3C <b>pada tahun 1996</b>. Setelah CSS distandarisasikan, Internet Explorer dan Netscape melepas browser terbaru mereka yang telah sesuai atau paling tidak hampir mendekati dengan standar Cascading Style Sheets.
              </p>
              <p>
                <b>Pencipta atau penemu CSS adalah Hakon Wium Lie</b> yang <b>bekerja sebagai CTO Opera</b>. Hakon lahir pada tahun 1965 di Norwegia. Dia juga pernah bekerja bersama Tim Berners-Lee di CERN. CSS sendiri merupakan penelitiannya sendiri untuk meraih gelar <b>Ph.D (Doctor of Philosophy)</b> di Universitas Oslo. Disertasi setebal 306 halaman dia pertahankan untuk meraih gelar Ph.D. dan akhirnya hingga kini CSS digunakan oleh web developer dan web designer untuk membuat tampilan web lebih memukau dan gemilang.
              </p>
              <p class="m-0">
                CSS tidak hanya diciptakan oleh Hakon sendiri, setelah pindah dari W3C ke Opera, <b>Hakon dibantu oleh Bert Bos untuk menciptakan CSS ini</b>. Dengan adanya CSS waktu untuk mengelola style tersebut akan lebih ringkas. <b>Sekarang CSS dikembangkan oleh World Wide Web Consortium atau W3C</b>.
              </p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>