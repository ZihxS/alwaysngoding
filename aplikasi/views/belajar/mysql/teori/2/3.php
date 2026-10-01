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
            <h2 class="judul-teori">Perintah Untuk Membaca Tabel dan Kolom</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Sebelumnya kalian telah membuat tabel <b><q>karyawan</q></b> di database <b><q>toko</q></b> dan sebenarnya sudah bisa lihat bahwa tabel yang ada di database <b><q>toko</q></b> itu terdapat tabel <b><q>karyawan</q></b>. Namun bagaimana jika kalian ingin menampilkan list tabel menggunakan perintah SQL?, perintahnya sama seperti menampikan database di bagian awal. Berikut ini adalah perintah untuk menampilkan list tabel:</p>
              <pre class="language-sql"><code>SHOW TABLES;</code></pre>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Gambar di atas adalah hasil perintah untuk membaca semua tabel yang ada di dalam database <b><q>toko</q></b>, karena kalian baru punya satu tabel, jadi yang ditampilkan hanya satu tabel saja yaitu tabel <b><q>karyawan</q></b>.</p>
              <blockquote class="catatan-pelajaran mb-2">Pastikan saat menulis dan mengeksekusi perintah di atas kalian sudah klik database <b><q>toko</q></b> di sidebar agar perintahnya dijalankan di database <b><q>toko</q></b> (pastikan kalian menulis perintahnya di kotak SQL untuk database toko).</blockquote>
              <p class="mb-0">Dan berikut adalah perintah untuk melihat list kolom pada tabel <b><q>karyawan</q></b>:</p>
              <pre class="language-sql mb-2"><code>SHOW COLUMNS FROM karyawan;</code></pre>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Bisa kalian lihat dari gambar yang ada di atas, kalian menampilkan list kolom dari tabel <b><q>karyawan</q></b> lengkap dengan informasi-informasi kolomnya.</p>
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