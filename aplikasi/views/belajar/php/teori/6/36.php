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
            <h2 class="judul-teori">Pewarisan (Inheritance) dalam PBO (OOP)</h2>
            <hr>
            <div class="konten-teori">
              <p>Inheritance atau Pewarisan atau Penurunan adalah <b>konsep pemrograman dimana sebuah class dapat <q>menurunkan</q> property dan method yang dimilikinya kepada class lain</b>. Konsep inheritance digunakan untuk memanfaatkan fitur <b><q>code reuse</q></b> untuk menghindari duplikasi kode program.</p>
              <p>Konsep inheritance membuat sebuah struktur atau <b><q>hierarchy</q></b> class dalam kode program. Class yang akan <b><q>diturunkan</q></b> bisa disebut sebagai class induk (parent class), super class, atau base class. Sedangkan class yang <b><q>menerima penurunan</q></b> bisa disebut sebagai class anak (child class), sub class atau derived class.</p>
              <p>Tidak semua property dan method dari class induk akan diturunkan. Property dan method dengan hak akses private, tidak akan diturunkan kepada class anak. Hanya property dan method dengan hak akses <b><q>protected</q></b> dan <b><q>public</q></b> saja yang bisa diakses dari class anak.</p>
              <p class="mb-0">Di dalam PHP, inheritance/penurunan dari sebuah class kepada class lain menggunakan kata kunci <b><q>extends</q></b>, dengan penulisan dasar sebagai berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
class induk {
  // isi class induk
}
class anak extends induk {
  // class anak bisa mengakses property dan method class induk
}
?&gt;</code></pre>
              <p class="mb-0">Agar lebih mudah dipahami, kalian akan langsung masuk kedalam contoh program penggunaan inheritance atau penurunan di dalam PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
class komputer {
   public $merek;
   public $processor;
   public $memory;
   public function beli_komputer() {
     return "Saya membeli komputer baru";
   }
}
class laptop extends komputer {
   public function spesifikasi() {
     return "merek: {$this->merek}, processor: {$this->processor}, memory: {$this->memory}";
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();
// mengisi property dari class komputer yang bisa diakses oleh class laptop
$laptop->merek = "Lenovo";
$laptop->processor = "intel core i5";
$laptop->memory = "2 GB";
// memanggil method dari class komputer yang bisa diakses oleh class laptop
echo $laptop->beli_komputer();
echo "&lt;br&gt;";
// memanggil method dari class laptop
echo $laptop->spesifikasi();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Dalam contoh kode di atas, kita membuat class <b><q>komputer</q></b> dengan beberapa property dan sebuah method. Property class <b><q>komputer</q></b> belum berisi nilai apa-apa. Di bawah class <b><q>komputer</q></b>, kita membuat class <b><q>laptop</q></b> extends class <b><q>komputer</q></b>. Disini kita menurunkan class <b><q>komputer</q></b> kedalam class <b><q>laptop</q></b>. Di dalam class <b><q>laptop</q></b>, kalian bisa mengakses seluruh property dan method apapun dari class <b><q>komputer</q></b> selama memiliki hak akses <b><q>public</q></b> atau <b><q>protected</q></b>.</p>
              <p class="mb-2">Untuk membuktikan hal tersebut, kita membuat object <b><q>$laptop</q></b> dari class <b><q>laptop</q></b>. Perhatikan bahwa kita bisa mengakses property <b><q>$merek</q></b>, <b><q>$processor</q></b>, dan <b><q>$memory</q></b> yang semuanya adalah milik class <b><q>komputer</q></b>, bukan class <b><q>laptop</q></b>. Method <b><q>beli_komputer()</q></b> juga sukses diakses dari object <b><q>$laptop</q></b>. Inilah yang dimaksud dengan inheritance atau penurunan class dalam PBO (OOP).</p>
              <blockquote class="catatan-pelajaran">PHP tidak membatasi berapa banyak <b><q>penurunan object</q></b> yang bisa dilakukan.</blockquote>
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