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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/berkenalan-dengan-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Sejarah PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Pada awalnya PHP merupakan kependekan dari <b>Personal Home Page</b>. PHP pertama kali dibuat oleh <b>Rasmus Lerdorf</b> pada tahun <b>1995</b>. Pada waktu itu PHP masih bernama <b>Form Interpreted</b> (FI), yang wujudnya berupa sekumpulan kode yang digunakan untuk mengolah data formulir dari web.</p>
              <p>Selanjutnya Rasmus merilis kode sumber tersebut untuk umum dan menamakannya <b>PHP/FI</b>. Dengan perilisan kode sumber ini menjadi sumber terbuka, maka banyak programmer yang tertarik untuk ikut mengembangkan PHP.</p>
              <p>Pada <b>November 1997</b> PHP/FI 2.0 dirilis. Pada rilis ini, interpreter PHP sudah diimplementasikan dalam program C. Dalam rilis ini disertakan juga modul-modul ekstensi yang meningkatkan kemampuan PHP/FI secara signifikan.</p>
              <p>Pada tahun <b>1997</b>, sebuah perusahaan bernama <b>Zend menulis ulang interpreter PHP menjadi lebih bersih, lebih baik, dan lebih cepat</b>. Kemudian pada <b>Juni 1998</b>, perusahaan tersebut merilis interpreter baru untuk PHP dan meresmikan rilis tersebut sebagai <b>PHP 3.0</b> dan singkatan PHP diubah menjadi akronim berulang. PHP: <b>Hypertext Preprocessor</b>.</p>
              <p>Pada pertengahan tahun <b>1999</b>, Zend merilis interpreter PHP baru dan rilis tersebut dikenal dengan <b>PHP 4.0</b>. PHP 4.0 adalah versi PHP yang <b>paling banyak dipakai pada awal abad ke-21</b>. Versi ini banyak dipakai disebabkan kemampuannya untuk membangun aplikasi web kompleks tetapi tetap memiliki kecepatan dan stabilitas yang tinggi.</p>
              <p class="mb-0">Pada <b>Juni 2004</b>, Zend merilis <b>PHP 5.0</b>. Dalam versi ini, inti dari interpreter PHP mengalami <b>perubahan besar</b>. Versi ini juga memasukkan model <b>pemrograman berorientasi objek</b> ke dalam PHP untuk menjawab perkembangan bahasa pemrograman ke arah paradigma berorientasi objek. Server web bawaan ditambahkan pada versi 5.4 untuk mempermudah pengembang <b>menjalankan kode PHP tanpa menginstall software server</b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>