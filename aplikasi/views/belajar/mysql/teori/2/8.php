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
            <h2 class="judul-teori">Perintah <q>SELECT</q></h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">SELECT adalah perintah yang digunakan <b>untuk menampilkan data</b> dari tabel yang ada di database. Berikut adalah syntax dasar untuk menampilkan data dengan perintah SELECT:</p>
              <pre class="language-sql"><code>SELECT <mark class="keep">kolom</mark> FROM <mark class="keep">tabel</mark>;</code></pre>
              Penjelasan:
              <ul>
                <li><b>kolom</b> adalah kolom apa saja yang ingin kalian tampilkan datanya.</li>
                <li><b>tabel</b> adalah tabel yang ingin kalian ambil datanya untuk ditampilkan.</li>
              </ul>
              <p class="mb-0">Misalnya kalian ingin mengambil data dari tabel karyawan dan ingin menampilkan data yang ada di kolom <b><q>nama_depan</q></b> saja, berikut adalah perintahnya:</p>
              <pre class="language-sql"><code>SELECT <mark class="keep">nama_depan</mark> FROM <mark class="keep">karyawan</mark>;</code></pre>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Gambar di atas adalah hasil dari perintah yang telah kalian jalankan, kalian hanya mengambil kolom <b><q>nama_depan</q></b> saja pada tabel <b><q>karyawan</q></b>. Lalu bagaimana jika kalian ingin menampilkan kolom <b><q>nama_depan</q></b>, <b><q>nama_belakang</q></b> dan <b><q>jenis_kelamin</q></b>?, berikut adalah perintahnya:</p>
              <pre class="language-sql"><code>SELECT <mark class="keep">nama_depan, nama_belakang, jenis_kelamin</mark> FROM <mark class="keep">karyawan</mark>;</code></pre>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Gambar di atas adalah hasil dari perintah yang telah kalian jalankan, kalian <b>mengambil 3 kolom dari tabel karyawan</b> yaitu <b><q>nama_depan</q></b> lalu <b><q>nama_belakang</q></b> dan <b><q>jenis_kelamin</q></b>. kalian cukup memisahkan kolom yang ingin kalian tampilkan datanya dengan tanda <b><q>,</q></b> jika ingin mengambil lebih dari 1 kolom.</p>
              <p class="mb-0">Lalu jika kalian ingin mengambil semua kolom yang ada apakah harus mengetik semua nama kolomnya?, kalian tidak perlu mengetik semua nama kolomnya, berikut adalah perintah shortcutnya:</p>
              <pre class="language-sql"><code>SELECT <mark class="keep">*</mark> FROM <mark class="keep">karyawan</mark>;</code></pre>
              <a href="<?= base_url("media/hasil/mysql/2/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/2/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Gambar di atas adalah hasil dari perintah yang telah kalian jalankan, kalian cukup ganti semua nama kolom dengan simbol <b><q>*</q></b>, bagaimana cukup simpel dan menarik bukan?</p>
              <blockquote class="catatan-pelajaran">Kode-kode di atas adalah cara awal atau dasar untuk menggunakan perintah SELECT.</blockquote>
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