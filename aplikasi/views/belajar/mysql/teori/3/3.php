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
            <h2 class="judul-teori">Tipe Data Integer</h2>
            <hr>
            <div class="konten-teori">
              <p>Integer adalah tipe data untuk <b>angka bulat</b> (misalnya: 5, 7, 13, 55, 99, -500, -123, -13, -1, 1, 1998). MySQL menyediakan beberapa tipe data untuk integer, perbedaannya lebih kepada jangkauan yang juga berpengaruh terhadap ukuran tipe data tersebut.</p>
              <p class="mb-1">Jangkauan serta ukuran penyimpanan tipe data integer dalam MySQL dapat dilihat pada tabel di bawah ini:</p>
              <table class="table table-striped table-bordered table-hover mb-1">
                <tr>
                  <td width="20%" class="f-bt">Tipe Data</td>
                  <td class="f-bt">Jangkauan Jika SIGNED</td>
                  <td class="f-bt">Jangkauan Jika UNSIGNED</td>
                </tr>
                <tr>
                  <td>TINYINT</td>
                  <td>-128 sampai 127</td>
                  <td>0 sampai 255</td>
                </tr>
                <tr>
                  <td>SMALLINT</td>
                  <td>-32.768 sampai 32.767</td>
                  <td>0 sampai 65.535</td>
                </tr>
                <tr>
                  <td>MEDIUMINT</td>
                  <td>-8.388.608 sampai 8.388.607</td>
                  <td>0 sampai 16.777.215</td>
                </tr>
                <tr>
                  <td>INT</td>
                  <td>-2.147.483.648 sampai 2.147.483.647</td>
                  <td>0 sampai 4.294.967.295</td>
                </tr>
                <tr>
                  <td>BIGINT</td>
                  <td>-9.223.372.036.854.775.808 sampai 9.223.372.036.854.775.807</td>
                  <td>0 sampai 18.446.744.073.709.551.615</td>
                </tr>
              </table>
              <p>Pemilihan tipe data ini tergantung akan kebutuhan data kalian. Misalkan untuk nomor antrian di rumah sakit yang memiliki kapasitas maksimal 20 ribu pasien, tipe data <b><q>SMALLINT</q></b> sudah mencukupi. Namun jika kalian bermaksud membuat nomor antrian untuk seluruh rakyat indonesia, tipe data <b><q>TINYINT</q></b> sampai dengan <b><q>MEDIUMINT</q></b> tidak akan mencukupi. Kalian harus memilih <b><q>INT</q></b> atau <b><q>BIGINT</q></b>.</p>
              <p class="mb-0">Berikut contoh query pembuatan tabel dengan macam-macam tipe data integer:</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  mini TINYINT,
  kecil SMALLINT UNSIGNED,
  sedang MEDIUMINT,
  normal INT UNSIGNED,
  besar BIGINT
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