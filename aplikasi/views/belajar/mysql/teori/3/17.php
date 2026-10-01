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
            <h2 class="judul-teori">Tipe Data BLOB</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-1">Tipe data <b><q>BLOB</q></b> adalah tipe data versi binarynya dari tipe data <b><q>TEXT</q></b>, dimana karakter akan disimpan dalam bit. Dan untuk karakter huruf, huruf besar dan kecil akan dibedakan (<q>A</q> tidak sama dengan <q>a</q>). Sama seperti <b><q>TEXT</q></b>, <b><q>BLOB</q></b> juga memiliki beberapa tipe: <b><q>TINYBLOB</q></b>, <b><q>BLOB</q></b>, <b><q>MEDIUMBLOB</q></b>, dan <b><q>LONGBLOB</q></b>. Ukuran serta jangkauan dari <b><q>BLOB</q></b> sama seperti <b><q>TEXT</q></b>, seperti pada tabel berikut ini:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Data</td>
                  <td class="f-bt">Jumlah Karakter Maksimum</td>
                </tr>
                <tr>
                  <td>TINYBLOB</td>
                  <td>255</td>
                </tr>
                <tr>
                  <td>BLOB</td>
                  <td>65.535</td>
                </tr>
                <tr>
                  <td>MEDIUMBLOB</td>
                  <td>16.777.215</td>
                </tr>
                <tr>
                  <td>LONGBLOB</td>
                  <td>4.294.967.295</td>
                </tr>
              </table>
              <p class="mb-0">Karena sifatnya yang tersimpan secara binary, tipe data <b><q>BLOB</q></b> dapat digunakan untuk menyimpan data multimedia, seperti gambar dan musik kedalam tabel MySQL. Contoh query membuat tabel dengan tipe data <b><q>BLOB</q></b>:</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  pendek TINYBLOB,
  normal BLOB,
  medium MEDIUMBLOB,
  panjang LONGBLOB
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