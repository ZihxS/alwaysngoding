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
            <h2 class="judul-teori">Tipe Data Integer</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data integer adalah tipe data yang <b>berupa angka bulat</b> seperti: 1, 22, dan -172. Tipe data integer umum digunakan untuk data dengan angka bulat, seperti harga barang dan jumlah stok barang. Jika data yang kita miliki kemungkinan akan mengandung pecahan, maka tipe data yang digunakan adalah float (akan dibahas di bagian selanjutnya).</p>
              <p>Nilai integer dapat bernilai positif <b><q>+</q></b> atau negatif <b><q>-</q></b>. Jika nilai tidak diberi tanda, maka diasumsikan nilai tersebut adalah positif.</p>
              <p class="mb-0">Berikut contoh penulisan bilangan integer dalam PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $umur = 25;
  $harga = 150000;
  $rugi = -500000;

  echo $umur; // 25
  echo "&lt;br&gt;";
  echo $harga; // 150000
  echo "&lt;br&gt;";
  echo $rugi; // -500000
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Untuk variabel dengan angka integer, kalian bisa melakukan operasi matematis seperti penambahan, pengurangan, pembagian dan lain-lain, seperti contoh di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $a = 14;
  $b = 16;
  $c = $a+$b; // pertambahan
  echo $c; // 30
  echo "&lt;br&gt;";

  $d = $a*$b; // perkalian
  echo $d; // 224
  echo "&lt;br&gt;";

  $e = $b-$a; // pengurangan
  echo $e; // 2
  echo "&lt;br&gt;";

  $f = $b/2; // pembagian
  echo $f; // 8
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">Karena PHP tidak memerlukan pendeklarasian variabel, maka ketika sebuah variabel berisi angka bulat, maka secara otomatis variabel tersebut disebut sebagai variabel integer.</blockquote>
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