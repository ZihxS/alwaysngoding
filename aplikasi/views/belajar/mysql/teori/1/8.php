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
            <h2 class="judul-teori">Sejarah MySQL</h2>
            <hr>
            <div class="konten-teori">
              <p>MySQL pada awalnya diciptakan pada tahun <b>1979</b> oleh <b>Michael <q>Monty</q> Widenius</b>, seorang programmer komputer asal <b>Swedia</b>. Monty mengembangkan sebuah sistem database sederhana yang dinamakan <b>UNIREG</b> yang menggunakan koneksi low-level ISAM database engine dengan indexing. Pada saat itu Monty bekerja pada perusahaan bernama <b>TcX</b> di Swedia.</p>
              <p>TcX pada tahun 1994 mulai mengembangkan aplikasi berbasis web dan berencana menggunakan UNIREG sebagai sistem database. Namun sayangnya, <b>UNIREG dianggagap tidak cocok untuk database yang dinamis seperti web</b>.</p>
              <p>TcX kemudian mencoba mencari alternatif sistem database lainnya, salah satunya adalah <b>mSQL</b> (miniSQL). Namun mSQL versi 1 ini juga memiliki kekurangan, yaitu tidak mendukung indexing, sehingga performanya tidak terlalu bagus.</p>
              <p>Dengan tujuan memperbaiki performa mSQL, Monty mencoba menghubungi <b>David Hughes</b> (programmer yang mengembangkan mSQL) untuk menanyakan apakah ia tertarik mengembangkan sebuah konektor di mSQL yang dapat dihubungkan dengan UNIREG ISAM sehingga mendukung indexing. Namun saat itu Hughes menolak, dengan alasan sedang mengembangkan teknologi indexing yang independen untuk mSQL versi 2.</p>
              <p>Dikarenakan penolakan tersebut, David Hughes, TcX (dan juga Monty) akhirnya memutuskan untuk merancang dan mengembangkan sendiri konsep sistem database baru. Sistem ini merupakan <b>gabungan dari UNIREG dan mSQL</b> (yang source codenya dapat bebas digunakan). <b>Sehingga pada Mei 1995, sebuah RDBMS baru, yang dinamakan MySQL dirilis</b>.</p>
              <p>David Axmark dari Detron HB, rekanan TcX mengusulkan agar MySQL di <q>jual</q> dengan model bisnis baru. Ia mengusulkan agar MySQL dikembangkan dan dirilis dengan gratis. Pendapatan perusahaan selanjutnya di dapat dari menjual jasa <q>support</q> untuk perusahaan yang ingin mengimplementasikan MySQL. Konsep bisnis ini sekarang dikenal dengan istilah Open Source.</p>
              <p>Pada tahun <b>1995</b> itu juga, <b>TcX berubah nama menjadi MySQL AB</b>, dengan Michael Widenius, David Axmark dan Allan Larsson sebagai pendirinya. Titel <b><q>AB</q></b> di belakang MySQL, adalah singkatan dari <b><q>Aktiebolag</q></b>, istilah PT (Perseroan Terbatas) bagi perusahaan Swedia.</p>
              Kelebihan MySQL:
              <ol class="mb-0">
                <li>Mendukung integrasi dengan bahasa pemrograman lain.</li>
                <li>Tidak membutuhkan RAM yang besar.</li>
                <li>Struktur tabel yang fleksibel.</li>
                <li>Tipe data yang bervariasi.</li>
                <li>Keamanan yang terjamin.</li>
                <li>Mendukung multi user.</li>
                <li>Bersifat open source.</li>
              </ol>
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