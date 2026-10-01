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
            <h2 class="judul-teori">Pengertian Constructor dan Destructor dalam PBO (OOP)</h2>
            <hr>
            <div class="konten-teori">
              <p>Constructor (konstruktor) adalah <b>method khusus yang akan dijalankan secara otomatis pada saat sebuah object dibuat</b> (instansiasi), yakni ketika perintah <b><q>new</q></b> dijalankan (ditulis/dipakai). Constructor biasa digunakan untuk membuat proses awal dalam mempersiapkan object, seperti memberi nilai awal kepada property, memanggil method internal dan beberapa proses lain yang digunakan untuk <b><q>mempersiapkan</q></b> object. Dalam PHP, constructor dibuat menggunakan method <b><q>__construct()</q></b>.</p>
              <p>Destructor (destruktor) adalah sebuah method khusus di PHP, sama seperti method constructor, tetapi method destructor ini adalah kebalikan method constructor, jika method constructor akan dijalankan saat class diinstansiasi, maka method destructor akan <b>dijalankan saat object dihancurkan atau dihapus dari memory</b>.</p>
              <p>Destructor ini berbeda dengan constructor yang dapat memiliki parameter, <b>destructor tidak dapat memiliki parameter</b>, kalian hanya dapat menuliskan logic saja dibagian destructor.</p>
              <p class="mb-0">Berikut adalah contoh penggunaan constructor dan destructor dalam PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class laptop
class laptop {
   private $pemilik = "Saleh";
   private $merek = "Lenovo";
   public function __construct() {
     echo "Ini berasal dari Method Constructor Laptop";
   }
   public function hidupkan_laptop() {
     return "Hidupkan Laptop {$this->merek} Punya {$this->pemilik}";
   }
   public function __destruct() {
     echo "Ini berasal dari Method Destructor Laptop";
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();

echo "&lt;br&gt;";
echo $laptop->hidupkan_laptop();
echo "&lt;br&gt;";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              Dalam contoh di atas, kita membuat class <b><q>laptop</q></b> dengan 3 method:
              <ul>
                <li>Method <b><q>__construct()</q></b> merupakan constructor dari class <b><q>laptop</q></b>. Method ini akan dipanggil secara otomatis ketika class <b><q>laptop</q></b> diinstansiasi.</li>
                <li>Method <b><q>hidupkan_laptop()</q></b> merupakan method <b><q>biasa</q></b> yang akan menampilkan hasil string. Untuk menggunakan method ini, kita memanggilnya dari object.</li>
                <li>Method ketiga adalah <b><q>__destruct()</q></b> yang merupakan destructor dari class <b><q>laptop</q></b>. Method ini akan dipanggil saat object dihapus atau selesai digunakan.</li>
              </ul>
              <p class="mb-0">Sebagai contoh, kita akan membuat contoh constructor yang sering digunakan untuk membuat object dengan nilai awal. Konsep ini sering digunakan dalam pemrograman object. Berikut adalah contoh penggunaannya:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class laptop
class laptop {
   private $pemilik;
   private $merek;
   // constructor sebagai pembuat nilai awal
   public function __construct($pemilik, $merek) {
     $this->pemilik = $pemilik;
     $this->merek = $merek;
   }
   public function hidupkan_laptop() {
     return "Hidupkan Laptop {$this->merek} Punya {$this->pemilik}";
   }
}
// membuat object dari class laptop (instansiasi)
$laptop_1 = new laptop("Saleh", "Lenovo");
echo $laptop_1->hidupkan_laptop();
echo "&lt;br&gt;";
$laptop_2 = new laptop("Karmila", "Asus");
echo $laptop_2->hidupkan_laptop();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Pada kode di atas, kita menggunakan constructor sebagai pembuat nilai awal dari object. Method constructor menerima 2 buah argumen yang kemudian disimpan kedalam property internal object.</p>
              <blockquote class="catatan-pelajaran">Di dalam PHP, constructor dan destructor harus memiliki hak akses <b><q>public</q></b>. Jika kalian mengubah hak akses constructor atau destructor menjadi <b><q>protected</q></b> atau <b><q>private</q></b>, PHP akan mengeluarkan error.</blockquote>
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