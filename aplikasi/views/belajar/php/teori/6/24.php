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
            <h2 class="judul-teori">Pengertian dan Fungsi Variabel $this dalam PBO (OOP)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-2">Variabel <b><q>$this</q></b> adalah sebuah variabel khusus dalam PBO (OOP) PHP yang digunakan sebagai penunjuk kepada object, ketika kalian mengaksesnya dari dalam class. Dalam dokumentasi manual PHP, <b><q>$this</q></b> disebut dengan istilah <b><q>pseudo-variable</q></b>.</p>
              <blockquote class="catatan-pelajaran mb-2">Konsep variabel <b><q>$this</q></b> mungkin sedikit sulit dipahami, terutama jika kalian belum pernah menggunakan PBO (OOP) sebelumnya. Apabila penjelasan ini membuat bingung, silahkan dipelajari secara perlahan sajayaa.</blockquote>
              <p class="mb-0">Untuk lebih memudahkan pemahaman, kita akan bahas menggunakan contoh. Berikut adalah class <b><q>laptop</q></b> dengan property dan method:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class laptop
class laptop {
   // membuat property untuk class laptop
   public $pemilik = "Joko";
   // membuat method untuk class laptop
   public function hidupkan_laptop() {
     return "Laptop Milik $pemilik Dihidupkan";
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();
echo $laptop->hidupkan_laptop();
?&gt;</code></pre>
              <p>Jika kalian menjalankan kode di atas, hasil yang didapat adalah notice dengan pesan <b><q>Undefined variable: pemilik in ...</q></b>. Dari penjelasan notice PHP, dinyatakan bahwa <b><q>variabel <u>pemilik</u> tidak terdefinisi</q></b>. Baris tersebut adalah baris dimana saat kita ingin menampilkan <b><q>Laptop Milik <u>$pemilik</u> Dihidupkan</q></b> dengan method <b><q>hidupkan_laptop()</q></b>.</p>
              <p>Apa yang terjadi? Bukankah <b><q>$pemilik</q></b> (bernilai Joko) telah terdefinisi pada property class? Inilah yang dimaksud, kita sedang mencoba mengakses property object dari dalam class. Jika kalian bingung dengan pengertian ini, kalian tidak sendiri kok.</p>
              <p>Untuk memahaminya, kita harus ingat bahwa class hanyalah sebuah <b><q>blue print</q></b> atau kerangka. Seluruh property dan method nantinya akan diakses dari dalam object, bukan dari dalam class. Pada saat proses instansiasi class, seluruh property dan method akan <b><q>di-copy</q></b> ke dalam object.</p>
              <p>Perintah <b><q>$laptop = new laptop();</q></b> akan membuat object <b><q>$laptop</q></b> memiliki property <b><q>$pemilik</q></b> dan method <b><q>hidupkan_laptop()</q></b> (sesuai dengan kerangka dari class <b><q>laptop</q></b>). Seluruh perintah lanjutan yang kita lakukan berada di dalam object <b><q>$laptop</q></b>, bukan di dalam class <b><q>laptop</q></b>.</p>
              <p class="mb-0">Ketika kita menjalankan method <b><q>hidupkan_laptop()</q></b>, object <b><q>$laptop</q></b> akan menemui baris perintah <b><q>Laptop Milik $pemilik Dihidupkan</q></b>, variabel <b><q>$pemilik</q></b> di sini tidak terdefinisi karena <b><q>$pemilik</q></b> berada di dalam konteks class, bukan object. Untuk mengatasi masalah ini, kita harus mengubah definisi method <b><q>hidupkan_laptop()</q></b> menjadi <b><q>Laptop Milik {$this->pemilik} Dihidupkan</q></b>. Untuk menguji pemahaman kita, silahkan pelajari kode di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
class laptop {

   public $pemilik = "Joko";

   public function hidupkan_laptop() {
     return "Laptop Milik {$this->pemilik} Dihidupkan";
   }
}

$laptop_1 = new laptop();
echo $laptop_1->hidupkan_laptop();

echo "&lt;br&gt;";

$laptop_1->pemilik = "Joki";
echo $laptop_1->hidupkan_laptop();

echo "&lt;br&gt;";

$laptop_2 = new laptop();
echo $laptop_2->hidupkan_laptop();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Tanpa menjalani kode program tersebut, silahkan tebak apa hasil yang akan ditampilkan dari perintah <b><q>echo $laptop_2->hidupkan_laptop();</q></b> yang berada pada baris terakhir, dan kenapa hasilnya bukan <b><q>Laptop Milik Joki Dihidupkan</q></b>?</p>
              <p class="mb-0">Jika kalian bisa menebak hasil akhir dengan benar dan bisa menjelaskan kenapa hasilnya bukan <b><q>Laptop Milik Joki Dihidupkan</q></b>, maka kalian telah memahami salah satu konsep terpenting dalam PBO (OOP).</p>
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