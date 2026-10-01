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
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/berkenalan-dengan-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'mysql', 'label' => 'Teori MySQL', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-mysql">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Pengertian MySQL</h2>
            <hr>
            <div class="konten-teori">
              <p>MySQL adalah <b>sebuah sistem manajemen basis data</b> (database management system) yang menggunakan perintah dasar <b>SQL</b> (Structured Query Language) yang cukup terkenal. MySQL sudah dipakai lebih dari 6 juta pengguna di seluruh dunia.</p>
              <p>MySQL adalah DBMS yang <b>open source dengan dua bentuk lisensi</b>, yaitu Free Software (perangkat lunak bebas) dan Shareware (perangkat lunak berpemilik yang penggunaannya terbatas). Jadi MySQL gratis dengan lisensi GNU General Public License (GPL) sehingga dapat kalian pakai untuk keperluan <b>pribadi</b> atau <b>komersil</b> tanpa harus membayar lisensi yang ada.</p>
              <p>MySQL masuk ke dalam jenis <b>Relational Database Management System</b> (RDBMS). Maka dari itu, istilah semacam baris, kolom dan tabel dipakai pada MySQL. Contohnya di dalam MySQL mempunyai sebuah database yang terdapat satu atau beberapa tabel.</p>
              <p>SQL sendiri merupakan suatu <b>bahasa yang dipakai untuk pengambilan atau pengelolaan data</b> pada relational database atau basis data yang terstruktur. Jadi MySQL adalah sistem manajemen basis data yang menggunakan <b>bahasa SQL</b> sebagai bahasa penghubung antara perangkat lunak aplikasi dengan database server.</p>
              <p class="mb-0">SQL (Structured Query Language) adalah <b>bahasa pemrograman khusus yang digunakan untuk memanajemen data dalam RDBMS</b>. SQL biasanya berupa perintah yang berisi instruksi-instruksi untuk memanipulasi data. Perintah SQL ini sering juga disingkat dengan sebutan <b><q>query</q></b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>