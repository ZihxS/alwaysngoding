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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/tipe-data-pada-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Tipe Data Float</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data float (disebut juga tipe data floating point, atau real number) adalah tipe data <b>angka yang memiliki bagian desimal di akhir angka</b>, atau memiliki floating point (floating point adalah istilah dalam Bahasa Inggris untuk menyebut tanda <q>titik</q> yang menandakan bilangan desimal). Contoh angka float adalah seperti: 0.9 atau 3.14.</p>
              <p>Tipe data float cocok digunakan untuk variabel yang berisi <b>angka pecahan</b>, seperti nilai IPK, hasil pembagian, atau hasil komputasi numerik yang angkanya tidak bisa ditampung oleh tipe data integer.</p>
              <p class="mb-2">Sama seperti tipe data integer, jangkauan angka float bergantung kepada komputasi prosesor yang digunakan, walaupun pada umumnya berupa angka mulai dari 1.7 x 10^-308 sampai 1.7^+308 dengan 15 digit keakuratan. Kalian tidak perlu khawatir dengan limit angka float ini, karena selain untuk membuat aplikasi matematis tingkat tinggi, kita tidak akan menggunakan angka float sampai 15 digit.</p>
              <blockquote class="catatan-pelajaran mb-2">Dikarenakan perbedaan cara penulisan bilangan float di Eropa dan Amerika dengan Indonesia (sama dengan bahasa pemrograman lain pada umumnya), didalam PHP penulisan nilai desimal ditandai dengan tanda <b><q>titik</q></b>, <b>bukan <q>koma</q></b> seperti yang biasa kita gunakan sehari-hari. Nilai 0,87 harus ditulis menjadi <b><q>0.87</q></b>. PHP akan menampilkan pesan error jika sebuah nilai ditulis dengan angka 0,87.</blockquote>
              <p>PHP mendukung 2 cara penulisan tipe data float, yang pertama yaitu penulisan desimal sehari-hari, seperti 0.17 atau 9.47 dan yang kedua berupa penulisan format scientific notation, seperti 0.314E1, atau 12.0E-3.</p>
              <p>Penggunaan scientific notation digunakan untuk <b><q>menyederhanakan penulisan</q></b>, 0.314E1 adalah sama dengan 0.314*10^1 atau 3.14, dan 12.0E-3 sama dengan 12.0*10^(-3), atau 0.012.</p>
              <p class="mb-0">Berikut contoh penulisan bilangan float dalam PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $angka_float1 = 0.78;
  $angka_float2 = 14.99;
  $angka_scientific1 = 0.314E1;
  $angka_scientific2 = 0.3365E-3;

  echo $angka_float1; // 0.78
  echo "&lt;br&gt;";
  echo $angka_float2; // 14.99
  echo "&lt;br&gt;";
  echo $angka_scientific1; // 3.14
  echo "&lt;br&gt;";
  echo $angka_scientific2; // 0.0003365
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Sama seperti tipe data integer, variabel dengan tipe data float juga dapat melakukan operasi numerik seperti penambahan, pembagian, perkalian, dan lain-lain. Berikut adalah contoh operasi matematis dengan tipe data float:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   $a = 10.66;
   $b = 12.4;
   $c = $a+$b;
   echo $c; // 23.06
   echo "&lt;br&gt;";

   $d = $a/$b;
   echo $d; // 0.85967741935484
?&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>