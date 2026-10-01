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
            <h2 class="judul-teori">Tipe Data Pada MySQL</h2>
            <hr>
            <div class="konten-teori">
              <pre class="language-sql"><code>CREATE TABLE karyawan (
    id_karyawan <u>INT</u> NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_depan <u>VARCHAR(255)</u> NOT NULL,
    nama_belakang <u>VARCHAR(255)</u> NOT NULL,
    jenis_kelamin <u>ENUM('Laki-laki', 'Perempuan')</u> NOT NULL,
    alamat <u>TEXT</u> NOT NULL
);</code></pre>
              <p>Masih ingatkan dengan perintah SQL di atas?, yang diberi tanda garis bawah itu adalah tipe data, apasih tipe data? <b>tipe data pada MySQL merupakan jenis nilai untuk penampungan</b>, bisa berupa angka (numerik), teks, ataupun berupa gambar. Dengan begitu kalian dapat menentukan tipe data yang nantinya akan mempermudah dalam pengaturan atau pengelolaan kolom dan tabel.</p>
              <p class="mb-0">Beda tipe data maka beda juga data yang akan ditampungnya. Di MySQL banyak sekali macam-macam tipe datanya, berikut adalah macam-macam tipe data pada MySQL:</p>
              <ul class="mb-2">
                <li>Tipe data integer:</li>
                <ul>
                  <li>tinyint</li>
                  <li>smallint</li>
                  <li>mediumint</li>
                  <li>int</li>
                  <li>bigint</li>
                </ul>
                <li>Tipe data fixed point:</li>
                <ul>
                  <li>decimal</li>
                </ul>
                <li>Tipe data floating point:</li>
                <ul>
                  <li>float</li>
                  <li>double</li>
                </ul>
                <li>Tipe data string (huruf):</li>
                <ul>
                  <li>char</li>
                  <li>varchar</li>
                  <li>binary</li>
                  <li>varbinary</li>
                  <li>tinytext</li>
                  <li>text</li>
                  <li>mediumtext</li>
                  <li>longtext</li>
                  <li>tinyblob</li>
                  <li>blob</li>
                  <li>mediumblob</li>
                  <li>longblob</li>
                </ul>
                <li>Tipe data date:</li>
                <ul>
                  <li>date</li>
                  <li>datetime</li>
                  <li>timestamp</li>
                  <li>time</li>
                  <li>year</li>
                </ul>
                <li>Tipe data khusus:</li>
                <ul>
                  <li>enum</li>
                </ul>
              </ul>
              <blockquote class="catatan-pelajaran">Sebenarnya banyak sekali tipe-tipe data MySQL, tetapi yang akan kalian pelajari adalah tipe-tipe data yang ada di atas saja.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>