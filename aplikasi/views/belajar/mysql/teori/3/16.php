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
            <h2 class="judul-teori">Tipe Data TEXT</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-1">Untuk data string yang lebih besar, MySQL menyediakan tipe data <b><q>TEXT</q></b>, yang terdiri dari: <b><q>TINYTEXT</q></b>, <b><q>TEXT</q></b>, <b><q>MEDIUMTEXT</q></b>, dan <b><q>LONGTEXT</q></b>. Maksimal jumlah karakter masing-masing tipe data dapat dilihat dari tabel di bawah ini:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Data</td>
                  <td class="f-bt">Jumlah Karakter Maksimum</td>
                </tr>
                <tr>
                  <td>TINYTEXT</td>
                  <td>255</td>
                </tr>
                <tr>
                  <td>TEXT</td>
                  <td>65.535</td>
                </tr>
                <tr>
                  <td>MEDIUMTEXT</td>
                  <td>16.777.215</td>
                </tr>
                <tr>
                  <td>LONGTEXT</td>
                  <td>4.294.967.295</td>
                </tr>
              </table>
              <p class="mb-0">Setiap tipe data text disimpan berdasarkan berapa data yang diinput, sama seperti <b><q>VARCHAR</q></b>. Contoh query membuat tabel dengan tipe data <b><q>TEXT</q></b>:</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  pendek TINYTEXT,
  normal TEXT,
  medium MEDIUMTEXT,
  panjang LONGTEXT
);</code></pre>
              <blockquote class="catatan-pelajaran">Contoh penggunaan tipe data text misalnya untuk menampung teks pada satu artikel.</blockquote>
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