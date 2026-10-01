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
  $u = 'belajar-mysql/teori/penggabungan-tabel-pada-mysql';
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
            <h2 class="judul-teori">Persiapan</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Sebelum kalian belajar tentang cara penggabungan tabel di MySQL. Silahkan kalian bikin database baru terlebih dahulu dengan nama <b><q>belajar_join</q></b>, perintahnya seperti berikut:</p>
              <pre class="language-sql"><code>CREATE DATABASE belajar_join;</code></pre>
              <p class="mb-0">Setelah kalian membuat databasenya, silahkan kalian masuk kedalam databasenya lalu jalankan perintah berikut:</p>
              <pre class="language-sql"><code>-- membuat tabel karyawan
CREATE TABLE karyawan (
  id_karyawan INT AUTO_INCREMENT PRIMARY KEY,
  nama_karyawan VARCHAR(100)
);

-- membuat tabel gaji
CREATE TABLE gaji (
    id_gaji INT AUTO_INCREMENT PRIMARY KEY,
    id_karyawan INT,
    gaji_pokok DOUBLE,
    FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan)
);

-- memasukkan data karyawan
INSERT INTO karyawan (nama_karyawan) VALUES ('Nabila'), ('Nurul'), ('Rakha'), ('Putri'), ('Annisa'), ('Angga');

-- memasukkan data gaji karyawan
INSERT INTO gaji (id_karyawan, gaji_pokok) VALUES (1, '2000000'), (2, '2500000'), (3, '2200000'), (4, '1900000'), (5,'2000000');</code></pre>
              <p class="mb-2">Kalian akan mendapatkan 2 tabel dari hasil perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Berikut adalah data yang ada pada tabel <b><q>karyawan</q></b>:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Berikut adalah data yang ada pada tabel <b><q>gaji</q></b>:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Pada tabel di atas, kalian dapat melihat bahwa tabel <b><q>karyawan</q></b> terdapat 6 record (baris) dan tabel <b><q>gaji</q></b> terdapat 5 record (baris). Pada tabel <b><q>gaji</q></b> terlihat bahwa karyawan dengan id_karyawan <b><q>6</q></b> tidak ada di tabel gaji. Dengan kata lain, karyawan dengan id <b><q>6</q></b> belum memiliki gaji.</p>
              <blockquote class="catatan-pelajaran">Foreign key digunakan untuk menandai bahwa tabel mempunyai hubungan dengan tabel lain. Kalian mempunyai 1 Foreign key di tabel <b><q>gaji</q></b> yaitu kolom <b><q>id_karyawan</q></b> karena kolom tersebut terhubung dengan kolom <b><q>id_karyawan</q></b> di tabel <b><q>karyawan</q></b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>