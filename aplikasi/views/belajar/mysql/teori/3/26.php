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
  $p = $b-1; // Sebelumnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/tipe-data-pada-mysql';
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
            <h2 class="judul-teori">Tipe Data ENUM</h2>
            <hr>
            <div class="konten-teori">
              <p>Selain tipe data standar seperti numerik, string dan date, MySQL juga menyediakan tipe data khusus yang merupakan kumpulan data yang bisa kalian definisikan sendiri.</p>
              <p>Tipe data <b><q>ENUM</q></b> merupakan tipe data <b>yang khusus untuk kolom dimana nilai datanya sudah kalian tentukan sebelumnya</b>. Pilihan ini dapat berisi 1 sampai dengan 65,535 pilihan string. Dimana kolom yang didefinisikan sebagai <b><q>ENUM</q></b> hanya dapat memilih satu diantara pilihan string yang tersedia.</p>
              <p> Contoh penggunaan <b><q>ENUM</q></b> misalnya untuk kolom yang berisi daftar jurusan yang harus dipilih oleh siswa atau siswi SMK. Pilihan ini harus sudah tersedia sebelumnya, dan kalian dapat menggunakan tipe data <b><q>ENUM</q></b> untuk memastikan bahwa jurusan yang dipilih adalah jurusan yang telah ditentukan sebelumnya dan hanya 1 jurusan yang bisa dipilih.</p>
              <p class="mb-0">Contoh query untuk membuat tabel dengan data <b><q>ENUM</q></b>:</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  jurusan ENUM('Multimedia','Rekayasa Perangkat Lunak','Teknik Komputer dan Jaringan')
);</code></pre>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>