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
            <h2 class="judul-teori">Komentar Di Perintah SQL</h2>
            <hr>
            <div class="konten-teori">
              <p>Fungsi komentar adalah <b>media informasi untuk tim</b> (apabila mengerjakan projek dengan tim), bisa juga informasi untuk kalian sendiri, misalkan kalian mendefinisikan komentar untuk menginformasikan fungsi detail perintah-perintah SQL yang telah kalian buat.</p>
              <p class="mb-2">Jadi kalian akan <b>selalu ingat</b> fungsi perintah SQL dengan memanfaatkan komentar.</p>
              <blockquote class="catatan-pelajaran mb-2">Komentar tidak akan diproses di Perintah SQL (akan diabaikan), komentar hanya ditampilkan sebagai media (sebagai pengingat atau catatan) di text editor saja.</blockquote>
              <p class="mb-0">Berikut adalah contoh penulisan-penulisan komentar di perintah SQL:</p>
              <pre class="language-sql"><code># Ini Adalah Komentar Untuk 1 Baris

-- Ini Juga Adalah Komentar Untuk 1 Baris

/* Kalau Ini
Komentarnya Berfungsi Untuk
Beberapa Baris */</code></pre>
              <p class="mb-0">Dan berikut adalah contoh penggunaan komentar di perintah SQL:</p>
              <pre class="language-sql"><code># Query Di bawah Berguna Untuk Membuat Database Dengan Nama "toko"
CREATE DATABASE toko;

/*
Query Di bawah Digunakan Untuk Membuat Tabel Dengan Nama "karyawan"
Mempunyai Kolom:
- id_karyawan
- nama_depan
- nama_belakang
- jenis_kelamin (Hanya ada Laki-laki dan Perempuan)
- alamat
*/
CREATE TABLE karyawan (
    id_karyawan INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_depan VARCHAR(255) NOT NULL,
    nama_belakang VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    alamat TEXT NOT NULL
);

-- Query Di bawah Berguna Untuk Mengambil Semua Data Pada Tabel Karyawan
SELECT * FROM karyawan;</code></pre>
              <p>Komentar untuk satu baris cukup dengan menyertakan tanda pagar (<b>#</b>) atau strip 2x dan spasi (<b>-- </b>) di awal.</p>
              <p class="mb-2">Komentar untuk beberapa baris (boleh berapa saja karena tidak terbatas) diawali dengan (<b>/*</b>) dan di akhiri dengan (<b>*/</b>).</p>
              <blockquote class="catatan-pelajaran">Jangan anggap remeh komentaryaa. Komentar sangat berguna loh, jadi sering-sering sertakan komentar pada query SQL kalianyaa 😄</blockquote>
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