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
            <h2 class="judul-teori">Tipe Data Date</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data date (tanggal) digunakan untuk <b>menyimpan data yang berkaitan dengan tanggal dan waktu</b>, tipe data date pada MySQL terdiri dari beberapa tipe data, yaitu: <b><q>DATE</q></b>, <b><q>DATETIME</q></b>, <b><q>TIME</q></b>, <b><q>TIMESTAMP</q></b>, dan <b><q>YEAR</q></b>. Perbedaan antara tipe-tipe data kelompok tanggal adalah pada format penyimpanan.</p>
              <p class="mb-1">Perhatikan tabel berikut:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Tipe Data</td>
                  <td class="f-bt">Jangkauan</td>
                </tr>
                <tr>
                  <td>DATE</td>
                  <td>1000-01-01 sampai 9999-12-13</td>
                </tr>
                <tr>
                  <td>DATETIME</td>
                  <td>1000-01-01 00:00:00 sampai 9999-12-31 23:59:59</td>
                </tr>
                <tr>
                  <td>TIME</td>
                  <td>-838:59:59 sampai 838:59:59</td>
                </tr>
                <tr>
                  <td>TIMESTAMP</td>
                  <td>1970-01-01 00:00:01 UTC sampai 2038-01-19 03:14:07 UTC</td>
                </tr>
              </table>
              <p class="mb-1">MySQL menyediakan beberapa format yang dapat digunakan untuk menginput tipe data tanggal:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Tipe Data</td>
                  <td class="f-bt">Fomat Inputan</td>
                </tr>
                <tr>
                  <td>TIMESTAMP</td>
                  <td>YY-MM-DD hh:mm:ss (<?= date('y-m-d H:i:s'); ?>)</td>
                </tr>
                <tr>
                  <td>TIMESTAMP</td>
                  <td>YYYYMMDDhhmmss (<?= date('YmdHis'); ?>)</td>
                </tr>
                <tr>
                  <td>TIMESTAMP</td>
                  <td>YYMMDDhhmmss (<?= date('ymdHis'); ?>)</td>
                </tr>
                <tr>
                  <td>DATETIME</td>
                  <td>YYYY-MM-DD hh:mm:ss (<?= date('Y-m-d H:i:s'); ?>)</td>
                </tr>
                <tr>
                  <td>DATE</td>
                  <td>YYYY-MM-DD (<?= date('Y-m-d'); ?>)</td>
                </tr>
                <tr>
                  <td>DATE</td>
                  <td>YY-MM-DD (<?= date('y-m-d'); ?>)</td>
                </tr>
                <tr>
                  <td>DATE</td>
                  <td>YYYYMMDD (<?= date('Ymd'); ?>)</td>
                </tr>
                <tr>
                  <td>DATE</td>
                  <td>YYMMDD (<?= date('ymd'); ?>)</td>
                </tr>
                <tr>
                  <td>TIME</td>
                  <td>hh:mm:ss (<?= date('H:i:s'); ?>)</td>
                </tr>
                <tr>
                  <td>TIME</td>
                  <td>hhmmss (<?= date('His'); ?>)</td>
                </tr>
                <tr>
                  <td>YEAR(4)</td>
                  <td>YYYY (<?= date('Y'); ?>)</td>
                </tr>
                <tr>
                  <td>YEAR(2)</td>
                  <td>YY (<?= date('y'); ?>)</td>
                </tr>
              </table>
              <ul>
                <li>YY: input untuk tahun, dimana YY berupa tahun 2 digit, seperti 98 (1998), 78 (1978), dan 00 (2000).</li>
                <li>YYYY: input untuk tahun, YYYY adalah tahun dengan 4 digit, seperti 2001, 1987, 2012.</li>
                <li>MM: bulan dalam format dua digit, seperti 05, 07 dan 12.</li>
                <li>DD: tanggal dalam format dua digit, seperti 14, 06 dan 30.</li>
                <li>hh: jam dalam format 2 digit, seperti 06, 12 dan 22.</li>
                <li>mm: menit, dalam format 2 digit, seperti 15, 45, dan 59.</li>
                <li>ss: detik, dalam format 2 digit, seperti 10, 40, dan 57.</li>
              </ul>
              <p class="mb-0">Jika MySQL tidak dapat membaca format, atau data tidak tersedia, maka data akan diisi sesuai dengan nilai default (zero value). Contoh query untuk membuat tabel dengan data <b><q>DATE</q></b>:</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  ini_date DATE,
  ini_time TIME,
  ini_datetime DATETIME,
  ini_timestamp TIMESTAMP,
  ini_year YEAR(4)
);</code></pre>
              <blockquote class="catatan-pelajaran">Untuk tahun dengan 2 digit, MySQL mengkonversinya dengan aturan 70-99 menjadi 1970-1999 dan 00-69 menjadi 2000-2069.</blockquote>
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