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
  $x = str_replace('Create Read Update Delete Mysql','CRUD MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/create-read-update-delete-mysql';
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
            <h2 class="judul-teori">Perintah "UPDATE" Untuk Mengubah Data</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Perintah UPDATE digunakan untuk <b>melakukan perubahan data</b> pada tabel MySQL, yakni update baris atau record. Format dasar perintah UPDATE adalah sebagai berikut:</p>
              <pre class="language-sql"><code>UPDATE nama_tabel SET nama_kolom = nilai_baru, ... WHERE kondisi;</code></pre>
              <ul class="mb-2">
                <li><b>nama_tabel</b> adalah nama dari tabel yang record/barisnya akan diperbaharui (update).</li>
                <li><b>nama_kolom</b> adalah nama kolom dari tabel yang akan diupdate.</li>
                <li><b>nilai_baru</b> adalah nilai data yang akan diproses sebagai nilai baru.</li>
                <li><b>kondisi</b> adalah kodisi atau syarat dari baris yang akan diubah.</li>
              </ul>
              <blockquote class="catatan-pelajaran mb-2">Perlu diketahui <b><q>kondisi</q></b> di perintah UPDATE sama seperti kondisi WHERE pada perintah SELECT. Kalian bisa menggunakan semua operator perbandingan, operator logika, operator BETWEEN dan bisa juga menggunakan operator LIKE.</blockquote>
              <p class="mb-0">Sebagai contoh, jika kalian ingin merubah jurusan menjadi <b><q>Teknik Komputer dan Jaringan</q></b> dari murid yang mempunyai NISN <b><q>5353675639</q></b> dari tabel murid, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>UPDATE murid SET jurusan = 'Teknik Komputer dan Jaringan' WHERE nisn = '5353675639';</code></pre>
              <p class="mb-2">Sebelum di update:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Setelah di update:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Sebagai contoh lainnya, jika kalian ingin merubah kolom <b><q>nama_lengkap</q></b> menjadi <b><q>Atsilah S</q></b>, merubah kolom <b><q>tahun_angkatan</q></b> menjadi <b><q>2017</q></b> dan merubah kolom <b><q>tabungan</q></b> menjadi <b><q>125000</q></b> dari murid yang mempunyai NISN <b><q>9036697177</q></b> dari tabel <b><q>murid</q></b>, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>UPDATE murid SET nama_lengkap = 'Atsilah S', tahun_angkatan = '2017', tabungan = 125000 WHERE nisn = '9036697177';</code></pre>
              <p class="mb-2">Sebelum di update:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Setelah di update:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-4.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-4.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Sebagai contoh lainnya, jika kalian ingin merubah kolom <b><q>tabungan</q></b> menjadi <b><q>125000</q></b> dari murid yang berjurusan <b><q>Multimedia</q></b> dan Tahun Angkatannya <b><q>2014</q></b> dari tabel murid, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>UPDATE murid SET tabungan = 125000 WHERE jurusan = 'Multimedia' AND tahun_angkatan = '2014';</code></pre>
              <p class="mb-2">Sebelum di update (lihat baris terakhir):</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-5.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-5.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Setelah di update (lihat baris ke 3):</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-6.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-6.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Sebagai contoh lainnya, jika kalian ingin merubah kolom <b><q>tabungan</q></b> menjadi <b><q>500000</q></b> jika tabungan murid lebih kecil dari <b><q>500000</q></b> dari tabel <b><q>murid</q></b>, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>UPDATE murid SET tabungan = 500000 WHERE tabungan < 500000;</code></pre>
              <p class="mb-2">Sebelum di update:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-7.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-7.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Setelah di update:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-8.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-8.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <blockquote class="catatan-pelajaran mb-2">Kalian bisa berkreasi untuk perintah UPDATE. Kolom apa saja yang ingin kalian ubah dan kalian bisa mengatur syarat (kondisi) data yang akan diubah.</blockquote>
              <p class="mb-0">Apakah bisa perintah UPDATE tanpa mendefinisikan kondisi (tanpa mendefinisikan WHERE ...)? Jawabannya adalah bisa, tetapi data akan terupdate semuanya. Seperti perintah di bawah ini:</p>
              <pre class="language-sql"><code>UPDATE murid SET tabungan = 13000000;</code></pre>
              <p class="mb-0">Karena kita tidak mendefinisikan "WHERE ..." pada perintah SQL di atas, maka semua tabungan murid akan terubah menjadi 13000000 (13 juta).</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>