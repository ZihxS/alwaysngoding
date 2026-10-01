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
            <h2 class="judul-teori">SELECT WHERE</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Jika kalian ingin menampilkan data yang hanya memenuhi kriteria tertentu saja, kalian dapat melakukannya dengan menambahkan perintah WHERE pada query SELECT. Kondisi WHERE pada perintah SELECT digunakan untuk <b>menyeleksi data yang diinginkan</b> (memfilter), sedangkan data yang tidak memenuhi kriteria, tidak akan ditampilkan. Misalnya kalian hanya ingin menampilkan murid kelas XI saja, maka perintahnya seperti berikut:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE kelas = 'XI';</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Pada gambar di atas bisa kalian lihat bahwa data yang tampil hanya data kolom <b><q>kelas</q></b> yang mempunyai nilai <b><q>XI</q></b> saja. Dan berikut kita lihat contoh kedua, yaitu kita akan menampilkan data murid yang mempunyai tabungan Rp100.000, perhatikan kode di bawah ini:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE tabungan = 100000;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Kenapa kita menulis 100000 nya tidak diapit oleh tanda petik seperti contoh pertama?, karena kolom tabungan tipe datanya numeric (integer), jadi valuenya tidak perlu dikutip oleh tanda petik.</p>
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