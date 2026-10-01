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
            <h2 class="judul-teori">Menambah Data Untuk Tabel Karyawan</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Sebelum kalian belajar lebih lanjut, kalian harus mempunyai datanya terlebih dahulu pada tabel yang sudah dibuat, silahkan kalian copy dan paste lalu jalankan perintah di bawah ini pada database <b><q>toko</q></b>:</p>
              <pre class="language-sql line-numbers"><code>INSERT INTO karyawan (nama_depan, nama_belakang, jenis_kelamin, alamat)
VALUES ('Rakha', 'Prasetya', 'Laki-laki', 'Jakarta'),
('TB', 'Alfrizal', 'Laki-laki', 'Bogor'),
('Nabila', 'Putri', 'Perempuan', 'Bogor'),
('Nurul', 'Aulia', 'Perempuan', 'Bekasi');</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Untuk saat ini kalian tidak perlu memahami perintah di atas, cukup copy paste dan jalankan saja agar kalian mempunyai data di tabel <b><q>karyawan</q></b>.</blockquote>
              <p class="mb-2">Setelah kalian menjalankan perintah di atas, maka kalian akan <b>mendapatkan 4 data baru</b> di tabel <b><q>karyawan</q></b>, silahkan lihat gambar di bawah ini:</p>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
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