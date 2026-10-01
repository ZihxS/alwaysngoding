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
            <h2 class="judul-teori">Cara Menambah atau Mengurangi Nilai Suatu Kolom</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-2">Saat menggunakan database biasanya kita ingin merubah nilai yang berkaitan dangan nilai sebelumnya, contohnya untuk merubah stok barang, jumlah tabungan, sisa cicilan dan lain sebagainya. Bagimana caranya?, misalnya kalian mempunyai tabel <b><q>barang</q></b> seperti di bawah ini:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Berikut adalah perintah cara menambah atau mengurangi nilai suatu kolom:</p>
              <pre class="language-sql"><code>-- menambah stok pensil
UPDATE barang SET stok = <mark class="keep">stok</mark> + 5 WHERE barang = 'pensil';

-- mengurangi stok penghapus
UPDATE barang SET stok = <mark class="keep">stok</mark> - 150 WHERE barang = 'penghapus';

-- menambah stok penggaris
UPDATE barang SET stok = <mark class="keep">stok</mark> + 10 WHERE barang = 'penggaris';

-- mengurangi stok stabilo
UPDATE barang SET stok = <mark class="keep">stok</mark> - 30 WHERE barang = 'stabilo';

-- menambah stok buku
UPDATE barang SET stok = <mark class="keep">stok</mark> + 15 WHERE barang = 'buku';</code></pre>
              <p class="mb-2">Berikut adalah data barang (stok barang) hasil penambahan dan pengurangan:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Perhatikan kode yang ada di atas, <b><q>stok</q></b> yang ditandai adalah kita mengambil nilai atau isi stok barang yang sudah ada sebelumnya lalu kita tambahkan atau kurangi sesuai keperluan kita.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>