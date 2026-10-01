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
            <h2 class="judul-teori">Tipe data CHAR dan VARCHAR</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data <b><q>CHAR</q></b> dan <b><q>VARCHAR</q></b> adalah tipe data karakter (string) yang akan sering digunakan. Value maksimal untuk CHAR adalah 255 karakter, dan value maksimal untuk VARCHAR adalah 65.535 karakter. Jika nilai tidak dinyatakan maka defaultnya adalah 1 karakter.</p>
              <p>Perbedaan antara CHAR dan VARCHAR adalah dari cara MySQL mengalokasikan ukuran penyimpanan data yang diinput kedalam kolom tersebut. Contohnya, jika kalian mendefiniskan sebuah tabel dengan kolom bertipe <b><q>CHAR(5)</q></b>, walaupun huruf atau karakter yang kalian inputkan hanya 1 karakter, MySQL tetap menyimpan kolom tersebut untuk 5 karakter. Namun jika kalian definiskan sebagai <b><q>VARCHAR(5)</q></b>, dan kalian menginput data dengan jumlah karakter 2, maka ukuran penyimpanan hanya akan menggunakan 2 karakter, sehingga VARCHAR lebih fleksibel dan efisien.</p>
              <p>Tetapi untuk fleksibilitas ini, tipe VARCHAR memerlukan proses tambahan untuk menyimpan ukuran dari masing-masing data. Sehingga VARCHAR akan sedikit lebih lambat bila dibandingkan CHAR. Walaupun demikian, proses ini hampir tidak terdeteksi, kalian bebas menggunakan CHAR atau VARCHAR untuk tipe data string.</p>
              <p class="mb-1">Perhatikan tabel perbedaan antara CHAR dan VARCHAR di bawah ini:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Data</td>
                  <td class="f-bt">CHAR(3)</td>
                  <td class="f-bt">VARCHAR(3)</td>
                </tr>
                <tr>
                  <td><q></q></td>
                  <td><q>&nbsp;&nbsp;&nbsp;</q></td>
                  <td><q></q></td>
                </tr>
                <tr>
                  <td><q>a</q></td>
                  <td><q>a&nbsp;&nbsp;</q></td>
                  <td><q>a</q></td>
                </tr>
                <tr>
                  <td><q>ab</q></td>
                  <td><q>ab&nbsp;</q></td>
                  <td><q>ab</q></td>
                </tr>
                <tr>
                  <td><q>abc</q></td>
                  <td><q>abc</q></td>
                  <td><q>abc</q></td>
                </tr>
                <tr>
                  <td><q>abcde</q></td>
                  <td><q>abc</q></td>
                  <td><q>abc</q></td>
                </tr>
              </table>
              <p>Dari tabel di atas, kalian dapat melihat bahwa penyimpanan untuk VARCHAR berubah-ubah tergantung data yang diinput. Namun untuk CHAR apapun inputannya penyimpanannya tetap 3 karakter (mengikuti value yang didefinisikan).</p>
              <p>Jadi, kebutuhan akan tipe data antara CHAR dan VARCHAR bergantung kepada seperti apa data yang akan kalian input. Tipe data CHAR cocok digunakan untuk kolom yang memiliki jumlah <b>karakter tetap</b>, misalnya untuk nomor KTP, ID pelanggan dan NIM mahasiswa. Sedangkan tipe data VARCHAR akan lebih cocok digunakan untuk kolom yang berisi data yang <b>berbeda-beda ukuran</b>, seperti nama, alamat dan kota.</p>
              <p>Baik CHAR maupun VARCHAR data yang diinput akan disimpan secara case insensitif, dimana huruf besar dan kecil tidak dibedakan.</p>
              <p class="mb-0">Contoh query membuat tabel dengan tipe data CHAR dan VARCHAR:</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  ini_char CHAR(3),
  ini_varchar VARCHAR(3)
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