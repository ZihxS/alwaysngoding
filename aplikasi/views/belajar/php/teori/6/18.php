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
            <h2 class="judul-teori">Mengakses Object dalam PBO (OOP)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Maksud dari cara mengakses object sebenarnya adalah cara untuk mengakses <b><q>isi</q></b> dari sebuah object, yakni property dan method-nya. Agar lebih mudah dipahami, berikut adalah revisi contoh class laptop sebelumnya:</p>
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

// membuat object dari class laptop (instansiasi)
$laptop_saleh = new laptop();

// mengatur property object $laptop_saleh
$laptop_saleh->pemilik = "Muhammad Saleh Solahudin";
$laptop_saleh->merek = "Asus";
$laptop_saleh->ukuran_layar = "15 inchi";

// menampilkan property
echo $laptop_saleh->pemilik;
echo "&lt;br&gt;";
echo $laptop_saleh->merek;
echo "&lt;br&gt;";
echo $laptop_saleh->ukuran_layar;
echo "&lt;br&gt;";

// memanggil method
echo $laptop_saleh->hidupkan_laptop();
echo "&lt;br&gt;";
echo $laptop_saleh->matikan_laptop();

?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Baris ke 3 dari contoh kode program di atas adalah pendefinisian sebuah class dengan nama <b><q>laptop</q></b>. Kurung kurawal menandakan awal dari class. Selanjutnya, tiga baris (baris 7, 8 dan 9) di atas merupakan pendefinisian variabel class atau dikenal dengan property. Property tidak lain hanya variabel biasa yang berada di dalam class. Keyword <b><q>var</q></b> digunakan untuk deklarasi variabel di dalam class.</p>
              <p>Dua buah fungsi (<b><q>hidupkan_laptop()</q></b> dan <b><q>matikan_laptop()</q></b>) di atas adalah method dari class. Kedua contoh ini hanyalah fungsi biasa yang akan mengembalikan nilai (return a value) berupa string.</p>
              <p>Baris ke 22 merupakan perintah untuk pembuatan object dari class <b><q>laptop</q></b> (dikenal dengan proses instansiasi). Variabel <b><q>$laptop_saleh</q></b> saat ini berisi object dari class <b><q>laptop</q></b>. Kalian bisa mengakses property dan method class laptop melalui object <b><q>$laptop_saleh</q></b> ini.</p>
              <p>Baris ke 25 sampai 27 di atas adalah cara untuk mengatur nilai ke dalam property dari object <b><q>$laptop_saleh</q></b>. Perhatikan bahwa kita menggunakan tanda panah <b><q>-></q></b> untuk mengakses property dari object. Tanda panah ini adalah operator khusus object yang dikenal dengan istilah <b><q>object operator</q></b>. Penulisan nama property juga dilakukan tanpa menggunakan tanda <b><q>$</q></b>, sehingga property <b><q>$pemilik</q></b> diakses dengan cara <b><q>$laptop_saleh->pemilik</q></b>.</p>
              <p>Baris ke 30 sampai 35 di atas digunakan untuk menampilkan nilai property dari object <b><q>$laptop_saleh</q></b> yang sebelumnya telah di-set nilainya. Sama seperti pada saat mengatur nilai property, kita juga menggunakan tanda panah <b><q>-></q></b>, kemudian diikuti nama property tanpa tanda <b><q>$</q></b>.</p>
              <p class="mb-0">Baris ke 38 sampai 40 di atas adalah cara pemanggilan method dari object <b><q>$laptop_saleh</q></b>. Cara pengaksesannya sama dengan cara mengakses property, namun karena method adalah fungsi, kita menambahkan tanda kurung di akhir pemanggilan fungsi.</p>
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