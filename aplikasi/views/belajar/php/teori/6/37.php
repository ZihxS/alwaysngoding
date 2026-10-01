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
            <h2 class="judul-teori">Pengertian Static Property dan Static Method</h2>
            <hr>
            <div class="konten-teori">
              <p>Di awal telah dijelaskan bahwa seluruh property dan method hanya bisa diakses dari object, tetapi static property dan static method adalah pengecualiannya. Static property dan static method adalah <b>property (variabel) dan method (function) yang melekat kepada class, bukan kepada object</b>. Konsep static property memang <b><q>agak keluar</q></b> dari konsep object sebagai tempat melakukan proses, karena sebenarnya class hanya merupakan <b><q>blue print</q></b> saja.</p>
              <p class="mb-0">Untuk membuat static property dan static method, kalian bisa menambahkan keyword <b><q>static</q></b> setelah penulisan akses level property atau method, seperti contoh berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
class laptop {
  // static property
  public static $harga_beli;
  // static method
  public static function beli_laptop() {
     // isi method
  }
}
?&gt;</code></pre>
              <p class="mb-0">Karena static property dan static method adalah milik class, maka kalian tidak perlu membuat object untuk mengaksesnya, tapi langsung menyebutkan nama class dan menggunakan operator <b><q>::</q></b>, berikut adalah contoh pengaksesan static property dan static method dari class <b><q>laptop</q></b>:</p>
              <pre class="language-php line-numbers"><code>echo laptop::$harga_beli;
echo laptop::beli_laptop();</code></pre>
              <p class="mb-0">Agar lebih memahami cara penggunaan static property dan static method, langsung saja kita masuk ke dalam kode program:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class laptop
class laptop {
   public $merek;
   public $pemilik;
   // static property
   public static $harga_beli;
   //static method
   public static function beli_laptop() {
     return "Saya membeli laptop baru";
   }
}
// set static property
laptop::$harga_beli = 5500000;
// panggil static method
echo laptop::beli_laptop();
echo "&lt;br&gt;";
// get static property
echo "harga beli: Rp".laptop::$harga_beli;
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada kode di atas kita membuat class <b><q>laptop</q></b> dengan 2 property <b><q>biasa</q></b>, 1 static property dan 1 static method. Cara mengakses keduanya kita tidak perlu membuat object terlebih dahulu.</p>
              <p class="mb-0">Dalam membuat program berorientasi object, penggunaan static property (dan juga static method) sebaiknya dibatasi, karena static method cenderung susah dideteksi jika terjadi kesalahan. Namun konsep property dan method yang melekat kepada class ini banyak juga digunakan untuk membuat design pattern. Bahkan di dalam framework PHP seperti laravel, static method merupakan mekanisme utama untuk menjalankan sebagian besar kode program.</p>
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