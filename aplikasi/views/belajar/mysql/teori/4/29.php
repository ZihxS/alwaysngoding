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
            <h2 class="judul-teori">Memasukkan Lebih Dari 1 Baris Data Sekaligus</h2>
            <hr>
            <div class="konten-teori">
            	<p class="mb-0">Jika kalian ingin langsung memasukkan 2 baris data atau lebih dalam satu perintah query INSERT MySQL, kalian hanya perlu menambahkan isi data untuk baris berikutnya dibelakang perintah dengan format penulisan sebagai berikut:</p>
            	<pre class="language-sql"><code>-- CONTOH PERTAMA
INSERT INTO nama_tabel VALUES
(nilai_kolom_1_a, nilai_kolom_2_a, ...),
(nilai_kolom_1_b, nilai_kolom_2_b, ...),
(nilai_kolom_1_c, nilai_kolom_2_c, ...);

-- CONTOH KEDUA
INSERT INTO nama_tabel (kolom_1, kolom_2, ...) VALUES
(nilai_kolom_1_a, nilai_kolom_2_a, ...),
(nilai_kolom_1_b, nilai_kolom_2_b, ...),
(nilai_kolom_1_c, nilai_kolom_2_c, ...);</code></pre>
        				<p class="mb-0">Berikut adalah contoh memasukkan 2 baris data sekaligus ke tabel <b><q>murid</q></b>:</p>
        				<pre class="language-sql"><code>INSERT INTO murid VALUES
        ('3140382893', 'Linda Desiyana', 'Perempuan', '2002-09-01', 'X', 'Teknik Komputer dan Jaringan', '2018', 25000),
        ('7464887206', 'Zahwarudin', 'Laki-laki', '1998-07-17', 'XII', 'Teknik Komputer dan Jaringan', '2015', 46500);</code></pre>
        				<p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              	<a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              	<p class="mb-0">Kalian telah berhasil menginput atau menambah 2 baris data sekaligus ke tabel <b><q>murid</q></b> pada database <b><q>sekolah</q></b>. Perintah di atas berguna jika kalian ingin menambah data misal 100 baris sekaligus, 1.000 baris sekaligus bahkan 10.000++ baris sekaligus.</p>
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