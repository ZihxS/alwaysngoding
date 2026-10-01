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
  $u = 'belajar-mysql/teori/lebih-banyak-tentang-mysql';
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
            <h2 class="judul-teori">Pengertian dan Cara Penggunaan VIEW</h2>
            <hr>
            <div class="konten-teori">
              <p>Di dalam MySQL, View dapat didefinisikan sebagai <b><q>tabel virtual</q></b>. Tabel ini bisa berasal dari tabel lain, atau gabungan dari beberapa tabel.</p>
              <p>Tujuan dari pembuatan VIEW adalah untuk <b>kenyamanan</b> (mempermudah penulisan query), untuk <b>keamanan</b> (menyembunyikan beberapa kolom yang bersifat rahasia), atau dalam beberapa kasus bisa digunakan untuk <b>mempercepat proses menampilkan data</b> (terutama jika kalian akan menjalankan query tersebut secara berulang).</p>
              <p class="mb-0">Sebagai contoh, misalnya kalian ingin menampilkan data murid yang menduduki kelas XII, maka kalian bisa menggunakan query berikut:</p>
              <pre class="language-sql"><code>SELECT nisn, nama_lengkap, jenis_kelamin, kelas, jurusan FROM murid_backup WHERE kelas = 'XII';</code></pre>
              <p>Misalnya query tersebut akan dijalankan setiap beberapa detik (diakses dari website yang sibuk). Pada setiap permintaan data, MySQL server harus melakukan pemrosesan untuk mencari seluruh murid yang menduduki kelas XII. Selain itu, dengan menggunakan VIEW kalian bisa menyembunyikan beberapa kolom dari tabel <b><q>murid</q></b>.</p>
              <p class="mb-0">Untuk membuat View di dalam MySQL, kalian cukup menggunakan format dasar sebagai berikut:</p>
              <pre class="language-sql"><code>CREATE VIEW nama_view_nya AS 'query select disini';</code></pre>
              <p class="mb-2">Tabel <b><q>murid</q></b> (untuk keperluan contoh):</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Berikut adalah cara untuk membuat view dari perintah yang berguna untuk menampilkan data murid yang menduduki kelas XII:</p>
              <pre class="language-sql"><code>CREATE VIEW murid_kelas_xii AS SELECT nisn, nama_lengkap, jenis_kelamin, kelas, jurusan FROM murid_backup WHERE kelas = 'XII';</code></pre>
              <p>Selanjutnya VIEW bisa diakses seperti tabel <b><q>biasa</q></b>. Pada query di atas, kalian membuat sebuah VIEW bernama <b><q>murid_kelas_xii</q></b>. kalian juga hanya menampilkan nisn, nama_lengkap, jenis_kelamin, kelas dan jurusan dari tabel asli <b><q>murid</q></b>, sisanya disembunyikan.</p>
              <p class="mb-0">Untuk mengakses data yang terdapat di VIEW, cukup menggunakan query SELECT:</p>
              <pre class="language-sql"><code>SELECT * FROM murid_kelas_xii;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Sekarang, pada setiap pemanggilan VIEW, MySQL Server tidak perlu memfilter hasil pencarian, namun cukup memanggil tabel virtual saja. Hal ini akan mempercepat proses penampilan/menampilkan data. VIEW juga berfungsi sama seperti layaknya tabel <b><q>biasa</q></b>, sebagai contoh, kalian bisa melakukan query berikut:</p>
              <pre class="language-sql"><code>SELECT * FROM murid_kelas_xii WHERE nisn = '2814904080';</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Jika kalian menambah data, mengubah data atau menghapus data yang ada pada tabel murid maka VIEW <b><q>murid_kelas_xii</q></b> pun akan terupdate secara otomatis (mengikuti data yang ada sesuai dengan tabel murid).</p>
              <p class="mb-0">Silahkan simak perintah di bawah ini:</p>
              <pre class="language-sql"><code>-- menambah data
INSERT INTO murid (nisn, nama_lengkap, jenis_kelamin, tanggal_lahir, kelas, jurusan, tahun_angkatan, tabungan)
VALUES ('7644824829', 'Septi Dayana', 'Perempuan', '2020-09-03', 'XII', 'Multimedia', '2013', '1500000');

-- mengubah data
UPDATE murid SET nama_lengkap = 'Atsilah Sahl' WHERE nisn = '9036697177';

-- menghapus data
DELETE FROM murid WHERE nisn = '1983286937';

-- panggil view murid_kelas_xii yang sudah terupdate otomatis (sudah menyesuaikan)
SELECT * FROM murid_kelas_xii;</code></pre>
              <p class="mb-2">Hasil dari pemanggilan view yang sudah terupdate pada perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Bisa kita lihat VIEW <b><q>murid_kelas_xii</q></b> sudah terupdate secara otomatis, ada data murid <b><q>Septi Dayana</q></b>, murid dengan nisn <b><q>9036697177</q></b> sudah terupdate namanya dan sudah tidak ada lagi murid dengan nisn <b><q>1983286937</q></b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>