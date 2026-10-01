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
            <h2 class="judul-teori">Membuat Object dalam PBO (OOP)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Pemrograman Berorientasi Objek (PBO) atau Objek Oriented Programming (OOP) sebenarnya terdiri dari class, property, method dan object. Keempat istilah ini telah kalian pelajari sebelumnya. Merangkum apa yang telah kalian pelajari, berikut adalah contoh cara pembuatan object pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php

// membuat class laptop
class laptop {

   // membuat property untuk class laptop
   var $pemilik;
   var $merek;
   var $ukuran_layar;

   // membuat method untuk class laptop
   function hidupkan_laptop() {
     return "Laptop Dihidupkan";
   }
   function matikan_laptop() {
     return "Laptop Dimatikan";
   }

}

// buat object dari class laptop (instansiasi)
$laptop_saleh = new laptop();

?&gt;</code></pre>
              <p>Pada kode di atas kita membuat sebuah class dengan nama <b><q>laptop</q></b>, lengkap dengan property dan menthod-nya. Kemudian kita membuat 1 buah object dari class laptop dengan nama <b><q>$laptop_saleh</q></b> pada baris terakhir.</p>
              <p class="mb-0">Walaupun dalam kode di atas kita telah membuat object, object tersebut belum menampilkan apa-apa karena class laptop belum berisi data apapun.</p>
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