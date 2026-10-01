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
            <h2 class="judul-teori">Membuat dan Menghapus Database MySQL</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Untuk membuat database, format penulisan querynya seperti di bawah ini:</p>
              <pre class="language-sql"><code>CREATE DATABASE <u>IF NOT EXISTS</u> nama_database;</code></pre>
              <p class="mb-0">Jika kalian ingin membuat sebuah database <b><q>universitas</q></b>, maka querynya seperti di bawah ini:</p>
              <pre class="language-sql"><code>CREATE DATABASE universitas;</code></pre>
              <p>Tambahan query <b><q>IF NOT EXISTS</q></b> digunakan untuk membuat MySQL tidak menampilkan pesan error jika database tersebut telah ada sebelumnya (jika sudah terdaftar). Contohnya, jika kalian menjalankan lagi query untuk membuat database universitas, MySQL akan menampilkan pesan error. Pesan error ini berguna untuk kalian mengidentifikasi kesalahan, namun apabila kalian membuat kode query yang panjang untuk dieksekusi secara keseluruhan, <b>pesan error akan menyebabkan query berhenti diproses</b>.</p>
              <p>Format <b><q>IF NOT EXISTS</q></b> akan membuat database jika database itu belum ada sebelumnya. Jika sudah ada, query CREATE DATABASE tidak akan menghasilkan apa-apa (database yang lama tidak akan tertimpa).</p>
              <p>Jika database sudah tidak digunakan lagi, kalian dapat menghapusnya. Proses penghapusan ini akan menghapus database, termasuk seluruh tabel dan isi dari tabel tersebut. Sebuah database yang telah dihapus <b>tidak dapat ditampilkan kembali</b>. Kalian harus yakin bahwa database tersebut memang tidak akan digunakan lagi.</p>
              <p class="mb-0">Untuk menghapus database, format penulisan querynya seperti di bawah ini:</p>
              <pre class="language-sql"><code>DROP DATABASE <u>IF EXISTS</u> universitas;</code></pre>
              <p class="mb-2">Sama seperti query pada pembuatan database, pilihan <b><q>IF EXISTS</q></b> digunakan untuk menghilangkan pesan error jika seandainya database tersebut memang sudah tidak ada.</p>
              <blockquote class="catatan-pelajaran">Yang ditandai oleh garis bawah adalah query yang bersifat opsional.</blockquote>
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