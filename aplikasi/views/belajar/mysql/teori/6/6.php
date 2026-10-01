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
            <h2 class="judul-teori">Operator Aritmatika</h2>
            <hr>
            <div class="konten-teori">
              <p>Operator Aritmatika digunakan untuk <b>melakukan operasi matematika</b>. Operator Aritmatika adalah operator matematis yang terdiri dari operator penambahan, pengurangan, perkalian, pembagian, modulus (sisa pembagian). Operator Aritmatika umumnya digunakan pada perintah <b>SELECT</b> dan perintah <b>UPDATE</b>.</p>
              <p class="mb-1">Berikut ini tabel macam-macam operator aritmatika yang terdapat pada MySQL:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Operator</td>
                  <td class="f-bt">Deskripsi</td>
                  <td class="f-bt">Contoh</td>
                  <td class="f-bt">Hasil</td>
                </tr>
                <tr>
                  <td>+</td>
                  <td>Operator untuk penambahan</td>
                  <td>10 + 20</td>
                  <td><?= 10 + 20; ?></td>
                </tr>
                <tr>
                  <td>-</td>
                  <td>Operator untuk pengurangan</td>
                  <td>50 - 15</td>
                  <td><?= 50 - 15; ?></td>
                </tr>
                <tr>
                  <td>*</td>
                  <td>Operator untuk perkalian</td>
                  <td>5 * 20</td>
                  <td><?= 5 * 20; ?></td>
                </tr>
                <tr>
                  <td>/</td>
                  <td>Operator untuk pembagian</td>
                  <td>20 / 2</td>
                  <td><?= 20 / 2; ?></td>
                </tr>
                <tr>
                  <td>%</td>
                  <td>Operator modulus (sisa pembagian)</td>
                  <td>21 % 2</td>
                  <td><?= 21 % 2; ?></td>
                </tr>
              </table>
              <p class="mb-0">Berikut ini contoh implementasi operator aritmatika pada perintah SELECT:</p>
              <pre class="language-sql"><code>SELECT 10 + 20, 50 - 15, 5 * 20, 20 / 2, 21 % 2;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Kalian bisa merubah nama-nama kolom dari perintah dan gambar di atas, berikut perintah SQL nya:</p>
              <pre class="language-sql"><code>SELECT 10 + 20 AS pertambahan, 50 - 15 AS pengurangan, 5 * 20 AS perkalian, CONVERT(20 / 2, INT) AS pembagian, 21 % 2 AS modulus;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Sebagai contoh lain, misalnya kalian punya tabel <b><q>barang</q></b> dengan data sebagai berikut:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Misalnya pada suatu hari toko ada potongan harga senilai 500 rupiah untuk semua barang, lalu kalian ingin menampilkan harga asli dan harga potongannya, maka berikut adalah perintah SQL nya:</p>
              <pre class="language-sql"><code>SELECT barang AS 'Nama Barang', harga AS 'Harga Asli', harga - 500 AS 'Harga Potongan' FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Atau misalnya pada suatu hari toko memberikan diskon sebesar 25% untuk semua barang, lalu kalian ingin menampilkan harga asli dan harga diskonnya, maka berikut adalah perintah SQL nya:</p>
              <pre class="language-sql"><code>SELECT barang AS 'Nama Barang', harga AS 'Harga Asli', harga - harga * (25 / 100) AS 'Harga Diskon' FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-5.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-5.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block"></a>
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