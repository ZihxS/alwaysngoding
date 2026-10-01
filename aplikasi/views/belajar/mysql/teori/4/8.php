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
            <h2 class="judul-teori">SELECT dan ORDER BY</h2>
            <hr>
            <div class="konten-teori">
              <p>Fungsi ORDER BY adalah untuk <b>mengurutkan data</b>. Nilainya bisa ascending (A-Z) dan descending (Z-A). Tentunya fungsi ini akan sangat berguna apabila kalian ingin mengurutkan data agar terlihat lebih rapih dan memudahkan mencari data jika datanya kita buat berurutan.</p>
              <p class="mb-0">Berikut adalah contoh penggunaan ORDER BY di perintah SELECT:</p>
              <pre class="language-sql"><code>SELECT * FROM murid ORDER BY nama_lengkap ASC;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Gambar di atas mengurutkan nama secara ASC (ascending) dari A ke Z, lalu bagaimana jika kita ingin mengurutkan secara DESC (descending) dari Z ke A?, perhatikan kode di bawah ini:</p>
              <pre class="language-sql"><code>SELECT * FROM murid ORDER BY nama_lengkap DESC;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Gambar di atas mengurutkan nama secara DESC (descending) dari Z ke A. Kita juga bisa mengurutkan lebih dari 2 kolom loh, perhatikan kode di bawah ini:</p>
              <pre class="language-sql"><code>SELECT * FROM murid ORDER BY tabungan DESC, nama_lengkap ASC;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Gambar di atas terlihat bahwa kita mengurutkan 2 kolom yaitu <b><q>tabungan</q></b> secara descending dan <b><q>nama_lengkap</q></b> secara ascending. Gambar di atas memperlihatkan bahwa sortingan kolom <b><q>tabungan</q></b> lebih di prioritaskan, mengapa begitu?, karena sortingan kolom <b><q>tabungan</q></b> didefinisikan pertama kali.</p>
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