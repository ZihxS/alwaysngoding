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
            <h2 class="judul-teori">Tipe Data Floating Point (FLOAT & DOUBLE)</h2>
            <hr>
            <div class="konten-teori">
              <p>Jika pada tipe fixed point kalian mendefiniskan suatu kolom dengan nilai pecahan yang tetap, untuk tipe floating point, nilai pecahan yang dapat diinput bisa berbeda-beda. Untuk tipe floating point, MySQL menyediakan 2 jenis tipe data, yaitu <b><q>FLOAT</q></b> dan <b><q>DOUBLE</q></b>. Perbedaan keduanya terletak pada presisi (ketelitian) pembulatan. <b><q>FLOAT</q></b> menggunakan single-precision, sedangkan <b><q>DOUBLE</q></b> menggunakan double-precision.</p>
              <p class="mb-1">Perhatikan tabel informasi di bawah ini:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Tipe Data</td>
                  <td class="f-bt">Jangkauan</td>
                </tr>
                <tr>
                  <td>FLOAT</td>
                  <td>-3,402823466E+38 sampai 3,402823466E+38</td>
                </tr>
                <tr>
                  <td>DOUBLE</td>
                  <td>-1,7976931348623157E+308 sampai 1,7976931348623157E+308</td>
                </tr>
              </table>
              <p>Sama seperti pada tipe data <b><q>DECIMAL</q></b>, <b><q>FLOAT</q></b> dan <b><q>DOUBLE</q></b> mempunyai opsional valuenya, dimana value pertama adalah total jumlah digit keseluruhan dan value kedua adalah jumlah digit dibelakang koma (pecahan). Maksimal value pertama dan value kedua akan berbeda pada tiap komputer, tergantung kemampuan prosesor mengolah tipe data floating point. <b><q>FLOAT</q></b> biasanya akan akurat untuk penyimpanan sekitar 7 angka desimal, sedangkan <b><q>DOUBLE</q></b> mencapai 15 angka desimal.</p>
              <p class="mb-0">Berikut contoh query pembuatan tabel dengan tipe data floating point (FLOAT & DOUBLE):</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  satuan FLOAT(3,2),
  puluhan FLOAT(4,2) UNSIGNED,
  ribuan FLOAT(5,2),
  positif DOUBLE,
  kustom DOUBLE(8,2) ZEROFILL
);
</code></pre>
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