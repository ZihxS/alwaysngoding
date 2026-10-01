<!-- ELAPSED:{elapsed_time} DETIK | MEMORY USAGE:{memory_usage} -->
<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /*
  Created And Writed BY Muhammad Saleh Solahudin
  Dont Change Credits
  Dont Steal My Logic
  Note: Script / Syntax / Code Bisa Di CoPas, Tetapi Keahlian, Pengetahuan, SkillS, Imagination And Logic Tidak Bisa Di CoPas:D
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
            <h2 class="judul-teori">Operator Logika</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-1">Operator logika adalah operator yang digunakan untuk <b>membandingkan 2 kondisi logika</b>, yaitu logika benar (TRUE) dan logika salah (FALSE). Berikut adalah macam-macam operator logika:</p>
              <table class="table table-striped table-bordered table-hover mb-1">
                <tr>
                  <td width="20%" class="f-bt">Operator</td>
                  <td class="f-bt">Penjelasan</td>
                </tr>
                <tr>
                  <td>OR</td>
                  <td>Operator OR digunakan untuk mengambil atau menampilkan data dari table dengan kondisi atau syarat nilai salah satunya benar (TRUE) atau kedua-duanya benar (TRUE).</td>
                </tr>
                <tr>
                  <td>AND</td>
                  <td>Operator AND digunakan untuk mengambil atau menampilkan data dari table dengan kondisi atau syarat nilai kedua-duanya harus benar (TRUE).</td>
                </tr>
                <tr>
                  <td>NOT</td>
                  <td>Operator NOT digunakan untuk mengambil atau menampilkan data dari table dengan kondisi nilai kebalikannya. Maksudnya jika nilai benar (TRUE) operator ini akan membalikan nilai tersebut menjadi salah (FALSE).</td>
                </tr>
              </table>
              <p class="mb-0">Berikut contoh query yang menggunakan operator logika <b><q>OR</q></b>:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE tahun_angkatan = 2015 OR tahun_angkatan = 2016;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Gambar di atas adalah hasil dari kode kita, kita menjalankan perintah SQL untuk menampilkan data, dan data tersebut kolom <b><q>tahun_angkatan</q></b> nya harus 2015 atau 2016.</p>
              <p class="mb-0">Berikut contoh query yang menggunakan operator logika <b><q>AND</q></b>:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE kelas = 'XI' AND jurusan = 'Rekayasa Perangkat Lunak';</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Gambar di atas adalah hasil dari kode kita, kita menjalankan perintah SQL untuk menampilkan data, dan data tersebut kolom <b><q>kelas</q></b> nya harus bernilai <b><q>XI</q></b> dan kolom <b><q>jurusan</q></b> nya harus bernilai <b><q>Rekayasa Perangkat Lunak</q></b>.</p>
              <p class="mb-0">Berikut contoh query yang menggunakan operator logika <b><q>NOT</q></b>:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE NOT nisn = '3188396614';</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Gambar di atas adalah hasil dari kode kita, kita menjalankan perintah SQL untuk menampilkan data, dan data tersebut kolom <b><q>nis</q></b> nya tidak boleh bernilai <b><q>3188396614</q></b>.</p>
              <p class="mb-0">Kalian juga bisa menggabungkan operator logika, dan kalian bisa memanfaatkan tanda kurung. Tanda kurung akan dieksekusi terlebih dahulu (sama seperti pengeksekusian perhitungan pada matematika). Perhatikan contoh perintah SQL di bawah ini:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE (
  (jenis_kelamin = "Perempuan" AND (kelas = "X" OR jurusan = "Teknik Komputer Jaringan")) OR tabungan >= 500000
) AND NOT nama_lengkap = "Indra" AND nisn <> "2814904080";</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-4.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-4.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Bagaimana apakah cukup rumit?, apakah kalian bisa memahami perintah SQL tersebut?, jika kalian mengerti dan memahaminya maka kalian harus bangga dengan diri kalian. Lalu jika belum memahaminya tidak apa-apa lanjut saja ke bagian selanjutnya, lambat laun kalian akan mengerti maksud dari perintah yang ada di atas 😄
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