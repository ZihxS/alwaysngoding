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
            <h2 class="judul-teori">Perintah "INSERT" Untuk Menambah Data (CREATE)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Untuk situasi dimana kolom yang akan diisi tidak diketahui urutannya, atau kita hanya akan mengisi sebagian kolom saja, maka kita harus mendefenisikan kolom mana saja yang akan digunakan. Untuk keperluan tersebut, MySQL menyediakan variasi query INSERT, yaitu:</p>
              <pre class="language-sql"><code>INSERT INTO nama_tabel (kolom_1, kolom_2, ...) VALUES (nilai_kolom_1, nilai_kolom_2, ...);</code></pre>
              <p><b><q>kolom_1</q></b> adalah nama kolom yang akan kita input dengan <b><q>nilai_kolom_1</q></b>, dan <b><q>kolom_2</q></b> adalah nama kolom yang akan kita input dengan <b><q>nilai_kolom_2</q></b>. Urutan nama kolom dengan nilai yang akan diisi harus sesuai.</p>
              <p class="mb-0">Supaya lebih jelas, perhatikan contoh query di bawah ini:</p>
              <pre class="language-sql"><code>INSERT INTO murid (
  nama_lengkap, nisn, tanggal_lahir, jenis_kelamin, tahun_angkatan
) VALUES (
  'Ahmad Waluya', '7776664410', '2000-07-09', 'Laki-laki', '2017'
);</code></pre>
              <p class="mb-0">Kode di atas kita membuat perintah SQL untuk menambahkan data ke tabel murid seperti berikut:</p>
              <ul>
                <li>kolom <b>nama_lengkap</b> isinya <b>Ahmad Waluya</b></li>
                <li>kolom <b>nisn</b> isinya <b>7776664410</b></li>
                <li>kolom <b>tanggal_lahir</b> isinya <b>2000-07-09</b></li>
                <li>kolom <b>jenis_kelamin</b> isinya <b>Laki-laki</b></li>
                <li>kolom <b>tahun_angkatan</b> isinya <b>2017</b></li>
              </ul>
              <p class="mb-0">Catatan:</p>
              <ol>
                <li>Walaupun perintah di atas urutan kolomnya tidak beraturan, namun perintah akan sukses di eksekusi dengan pendefinisan kolom beserta isinya.</li>
                <li>Kita tidak mendefinisikan kolom kelas, tetapi data kelas akan ditambahkan sesuai isi defaultnya yaitu <b><q>X</q></b> (<a href="<?= site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/1'); ?>">lihat disini</a>).</li>
                <li>Kita tidak mendefinisikan kolom jurusan, tetapi data jurusan akan ditambahkan sesuai isi defaultnya yaitu <b><q>Rekayasa Perangkat Lunak</q></b> (<a href="<?= site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/1'); ?>">lihat disini</a>).</li>
                <li>Kita tidak mendefinisikan kolom tabungan, tetapi data tabungan akan ditambahkan sesuai isi defaultnya yaitu <b><q>0</q></b> (<a href="<?= site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/1'); ?>">lihat disini</a>).</li>
              </ol>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Kita telah berhasil menambah data ke tabel murid (lihat data kedua pada gambar di atas).</p>
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