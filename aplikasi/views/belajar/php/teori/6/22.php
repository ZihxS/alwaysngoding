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
            <h2 class="judul-teori">Enkapsulasi (Encapsulation) dalam PBO (OOP)</h2>
            <hr>
            <div class="konten-teori">
              <p>Dengan enkapsulasi <b>kalian bisa membuat pembatasan akses kepada property dan method</b>, sehingga hanya property dan method tertentu saja yang bisa diakses dari luar class. Enkapsulasi juga dikenal dengan istilah <b><q>information hiding</q></b>. Ada 3 jenis enkapsulasi yang bisa kalian manfaatkan yaitu <b><q>public</q></b>, <b><q>private</q></b> dan <b><q>protected</q></b>.</p>
              <p class="mb-0">Jika kalian menggunakan jenis enkapsulasi <b><q>public</q></b> pada property atau method dalam sebuah class, itu artinya method dan propertinya <b>bisa di akses secara bebas baik dari dalam class, dari luar class bahkan dari class turunan nya sekalipun</b>. Berikut ini adalah contohnya:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class laptop
class laptop {
   // membuat public property
   public $pemilik;
   // membuat public method
   public function hidupkan_laptop() {
     return "Laptop Dihidupkan";
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();
// mengatur property
$laptop->pemilik = "Karmila";
// menampilkan property
echo $laptop->pemilik;
echo "&lt;br&gt;";
// menampilkan method
echo $laptop->hidupkan_laptop();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Seperti yang kalian lihat pada kode di atas bahwa kalian bisa mengakses method atau property secara langsung (bebas) jika menggunakan keyword <b><q>public</q></b>.</p>
              <p class="mb-0">Jika sebuah property atau method dinyatakan sebagai <b><q>protected</q></b>, berarti property atau method tersebut <b>tidak bisa diakses dari luar class, namun bisa diakses oleh class itu sendiri atau turunan class tersebut</b>. Apabila kalian mencoba mengakses protected property atau protected method dari luar class, akan menghasilkan error, seperti contoh berikut ini:</p>
              <pre class="language-php line-numbers" data-line="14,16,19"><code>&lt;?php
// membuat class laptop
class laptop {
   // membuat protected property
   protected $pemilik;
   // membuat protected method
   protected function hidupkan_laptop() {
     return "Laptop Dihidupkan";
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();
// mengatur property
$laptop->pemilik = "Karmila";
// menampilkan property
echo $laptop->pemilik;
echo "&lt;br&gt;";
// menampilkan method
echo $laptop->hidupkan_laptop();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Pada contoh kode di atas (baris ke 14, 16 dan 19) akan menghasilkan error. Walaupun akses level <b><q>protected</q></b> tidak bisa diakses dari luar class, namun <b>bisa diakses dari dalam class itu sendiri</b>, berikut adalah contohnya:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class laptop
class laptop {
   protected $pemilik = "Karmila";
   public function akses_pemilik() {
      return $this->pemilik;
   }
   protected function hidupkan_laptop() {
     return "Laptop Dihidupkan";
   }
   public function paksa_hidupkan() {
      return $this->hidupkan_laptop();
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();
// menjalankan method akses_pemilik()
echo $laptop->akses_pemilik();
echo "&lt;br&gt;";
// menjalankan method paksa_hidupkan()
echo $laptop->paksa_hidupkan();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran mb-2">Kata kunci <b><q>$this</q></b> merujuk kepada object saat ini, penjelasan tentang kata kunci <b><q>$this</q></b> akan dibahas di bagian berikutnya. Jika kalian tidak memahaminya silahkan lewatkan saja terlebih dahulu, lalu kembali lagi jika sudah memahaminya.</blockquote>
              <p class="mb-0">Selain dari dalam class itu sendiri, property dan method dengan hak akses <b><q>protected</q></b> juga <b>bisa diakses dari class turunan</b> (kalian akan mempelajari tentang penurunan class juga nantinya):</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class komputer (parent class)
class komputer {
   // property dengan hak akses protected
   protected $jenis_processor = "Intel Core i7-4790 3.6Ghz";
}
// membuat class laptop (child class)
class laptop extends komputer {
   public function tampilkan_processor() {
     return $this->jenis_processor;
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();
// mencetak dan menjalankan method
echo $laptop->tampilkan_processor();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada kode di atas walaupun method <b><q>$jenis_processor</q></b> di-set sebagai <b><q>protected</q></b> pada class <b><q>komputer</q></b>, tetapi <b>masih bisa diakses dari class <q>laptop</q> yang merupakan turunan dari class <q>komputer</q></b>.</p>
              <p class="mb-0">Hak akses terakhir dalam konsep enkapsulasi adalah <b><q>private</q></b>. Jika sebuah property atau method di-set sebagai <b><q>private</q></b>, maka <b>satu-satunya yang bisa mengakses adalah class itu sendiri</b>. Class lain tidak bisa mengaksesnya, termasuk class turunan. Sebagai contoh, berikut adalah hasil yang di dapat jika kalian mengakses property dan method dengan level private:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class komputer
class komputer {
   // property dengan hak akses protected
   private $jenis_processor = "Intel Core i7-4790 3.6Ghz";
   public function tampilkan_processor() {
     return $this->jenis_processor;
   }
}
// membuat class laptop
class laptop extends komputer{
   public function tampilkan_processor() {
     return $this->jenis_processor;
   }
}
// membuat object dari class komputer & laptop (instansiasi)
$komputer = new komputer();
$laptop = new laptop();
// menjalankan method dari class komputer
echo $komputer->tampilkan_processor(); // tidak error
echo "&lt;br&gt;";
// jalankan method dari class laptop
echo $laptop->tampilkan_processor(); // error
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/5"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Dalam kode di atas, kita membuat 2 buah class, yakni class <b><q>komputer</q></b> dan class <b><q>laptop</q></b>. Class <b><q>laptop</q></b> merupakan turunan dari class <b><q>komputer</q></b>. Di dalam class <b><q>komputer</q></b> terdapat property <b><q>$jenis_processor</q></b> dengan akses level <b><q>private</q></b>. Di dalam class <b><q>komputer</q></b> dan class <b><q>laptop</q></b>, kita membuat method <b><q>tampilkan_processor()</q></b> yang digunakan untuk mengakses property <b><q>$jenis_processor</q></b>.</p>
              <p class="mb-0">Pengaksesan method <b><q>tampilkan_processor()</q></b> dari objek <b><q>$komputer</q></b> sukses ditampilkan karena berada di dalam satu class dimana property <b><q>$jenis_processor</q></b> berada. Akan tetapi, jika method <b><q>tampilkan_processor()</q></b> diakses dari objek <b><q>$laptop</q></b> yang merupakan turunan dari class komputer, PHP akan mengeluarkan error karena property <b><q>$jenis_processor</q></b> tidak dikenal. Akses level <b><q>private</q></b> sering digunakan untuk menyembunyikan property dan method agar tidak bisa diakses di luar class.</p>
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