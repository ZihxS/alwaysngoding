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
  $x = str_replace('Pbo','PBO',$x);
  $x = str_replace('Oop','(OOP)',$x);
  $u = 'belajar-php/teori/pbo-oop-pada-php';
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
            <h2 class="judul-teori">Object Sebagai Entitas Terpisah</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Pada dasarnya sebuah class bisa digunakan untuk membuat berapapun banyak object. Setiap object merupakan bagian terpisah, namun tetap memiliki property dan method yang berasal dari class-nya. Berikut adalah contoh pembuatan beberapa object dari class laptop:</p>
              <pre class="language-php line-numbers"><code>&lt;?php

// membuat class laptop
class laptop {
   // membuat property untuk class laptop
   var $pemilik;
}

// membuat object dari class laptop (instansiasi)
$laptop_1 = new laptop();
$laptop_2 = new laptop();
$laptop_3 = new laptop();
$laptop_4 = new laptop();

// mengatur property object
$laptop_1->pemilik = "TB";
$laptop_2->pemilik = "Glen";
$laptop_3->pemilik = "Nurul";
$laptop_4->pemilik = "Fathia";

// menampilkan property
echo $laptop_1->pemilik;
echo "&lt;br&gt;";
echo $laptop_2->pemilik;
echo "&lt;br&gt;";
echo $laptop_3->pemilik;
echo "&lt;br&gt;";
echo $laptop_4->pemilik;

?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Setelah pembuatan class <b><q>laptop</q></b>, kita kemudian membuat 4 buah object dari class laptop tersebut, yakni: <b><q>$laptop_1</q></b>, <b><q>$laptop_2</q></b>, <b><q>$laptop_3</q></b> dan <b><q>$laptop_4</q></b>. Keempat object ini memiliki struktur yang sama (sama-sama berasal dari class <b><q>laptop</q></b>), namun memiliki isi data (property) yang berbeda-beda.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>