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
            <h2 class="judul-teori">Membuat Database dan Tabel Karyawan</h2>
            <hr>
            <div class="konten-teori">
              <p>Sekarang kalian siapkan database dan tabelnya untuk pembelajaran kalian ke depannya. Kalian akan membuat database dengan nama databasenya adalah <b><q>toko</q></b> dan kalian akan membuat tabel dengan nama tabelnya adalah <b><q>karyawan</q></b>.</p>
              <p class="mb-0">Berikut adalah perintah untuk membuat database:</p>
              <pre class="language-sql"><code>CREATE DATABASE toko;</code></pre>
              <p class="mb-2">Setelah kode di atas dieksekusi maka kalian mempunyai satu database baru bernama <b><q>toko</q></b> di sidebar phpMyAdmin seperti gambar di bawah ini:</p>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2" style="width: 250px;"></a>
              <p class="mb-0">Setelah database <b><q>toko</q></b> berhasil dibuat, selanjutnya kalian klik database toko tersebut, lalu ke bagian untuk menjalankan perintah SQL dan silahkan kalian buat tabelnya dengan perintah sebagai berikut:</p>
              <pre class="language-sql"><code>CREATE TABLE karyawan (
    id_karyawan INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_depan VARCHAR(255) NOT NULL,
    nama_belakang VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    alamat TEXT NOT NULL
);</code></pre>
              <p>Untuk saat ini kalian hanya cukup copy dan paste lalu jalankan saja query di atas, abaikan dahulu syntax yang ada, nanti kalian akan mempelajari syntax tersebut.</p>
              <p class="mb-2">Setelah kalian mengeksekusi perintah di atas kalian akan mendapatkan satu buah tabel hasil dari perintah yang telah kalian definisikan, perhatikan gambar di bawah ini:</p>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2" style="width: 250px;"></a>
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