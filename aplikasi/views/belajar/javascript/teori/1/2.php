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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/berkenalan-dengan-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Sejarah JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sejarah JavaScript dimulai sekitar tahun 1994, ketika internet dan website sedang mengalami perkembangan yang pesat. Website pada saat itu umumnya dibuat menggunakan bahasa pemrograman PERL yang pemrosesannya hanya bisa dilakukan di sisi web server.
              </p>
              <p>
                Kelemahan pemrosesan di sisi web server adalah setiap instruksi dari user harus dikirim terlebih dahulu ke web server, baru kemudian ditampilkan lagi di dalam web browser. Karena kecepatan rata-rata koneksi internet yang terbatas, hal ini dipandang tidak efisien. Programmer web membutuhkan bahasa pemrograman client-side yang bisa berjalan di web browser tanpa harus dikirim ke server.
              </p>
              <p>
                Pada tahun 1995, Brendan Eich seorang programmer dari Netscape mulai mengembangkan sebuah bahasa pemrograman script yang dinamakan Mocha. Netscape pada saat itu merupakan perusahaan software ternama yang memiliki web browser Netscape Navigator.
              </p>
              <p>
                Bahasa script Mocha ini ditujukan untuk client-side dan juga server-side. Dalam perkembangan selanjutnya, nama Mocha diubah menjadi LiveScript untuk versi client-side, dan LiveWire untuk versi server-side.
              </p>
              <p>
                Pada saat bahasa pemrograman tersebut akan dirilis, Netscape mengadakan kerjasama dengan Sun Microsystems untuk mengembangkan LiveScript, dan tepat ketika Netscape Navigator 2 dirilis, Netscape merubah nama LiveScript menjadi JavaScript dengan tujuan bahasa baru ini akan populer seperti bahasa Java yang saat itu sedang booming di kalangan semua programmer.
              </p>
              <p>
                Versi awal bahasa JS hanya dipakai di kalangan Netscape beserta dengan fungsionalitas yang masih terbatas. Singkat cerita pada tahun 1996 JavaScript secara resmi dinamakan sebagai ECMAScript. ECMAScript 2 dikembangkan pada tahun 1998 yang dilanjutkan dengan ECMAScript 3 setahun kemudian.
              </p>
              <p class="mb-0">
                ECMAScript terus dikembangkan sampai akhirnya menjadi JavaScript atau JS hingga saat ini. Pada tahun 2016, 92% web diketahui telah menggunakan JavaScript. Itulah mengapa JavaScript atau JS terus berkembang.
              </p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>