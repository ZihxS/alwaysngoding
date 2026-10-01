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
  $u = 'belajar-mysql/teori/perintah-perintah-dasar-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Membuat dan Menghapus Tabel MySQL</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Format dasar query untuk membuat tabel seperti di bawah ini:</p>
              <pre class="language-sql"><code>CREATE TABLE <u>IF NOT EXISTS</u> nama_tabel (kolom_1, kolom_2, ...);</code></pre>
              <p class="mb-0">Jika kalian ingin membuat sebuah tabel mahasiswa, maka querynya seperti di bawah ini:</p>
              <pre class="language-sql"><code>CREATE TABLE IF NOT EXISTS mahasiswa (
  nim CHAR(9),
  nama VARCHAR(50),
  umur INT,
  tempat_lahir VARCHAR(50),
  jurusan VARCHAR(30)
);</code></pre>
              <ul class="mb-2">
                <li>Dengan query di atas, kalian telah membuat sebuah tabel dengan nama <b><q>mahasiswa</q></b>, terdiri dari <b>5 kolom</b> yaitu: <b><q>nim</q></b>, <b><q>nama</q></b>, <b><q>umur</q></b>, <b><q>tempat_lahir</q></b>, dan <b><q>jurusan</q></b>.</li>
                <li>Setelah nama kolom, kalian definisikan jenis tipe data dari kolom tersebut.</li>
              </ul>
              <p class="mb-0">Format query untuk menghapus tabel seperti di bawah ini:</p>
              <pre class="language-sql"><code>DROP TABLE <u>IF EXISTS</u> nama_tabel;</code></pre>
              <p class="mb-0">Untuk menghapus tabel mahasiswa, querynya adalah:</p>
              <pre class="language-sql"><code>DROP TABLE <u>IF EXISTS</u> mahasiswa;</code></pre>
              <p class="mb-2">Setelah kalian bisa membuat database dan tabel pada MySQL, di bagian selanjutnya kalian akan belajar tentang tipe data pada MySQL.</p>
              <blockquote class="catatan-pelajaran mb-2">Penamaan database, tabel atau kolom tidak boleh mengandung spasi.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>