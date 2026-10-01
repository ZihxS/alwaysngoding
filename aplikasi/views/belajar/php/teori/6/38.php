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
            <h2 class="judul-teori">Mengakses Constructor dan Destructor Parent Class</h2>
            <hr>
            <div class="konten-teori">
              <pre class="language-php line-numbers"><code>&lt;?php
// membuat class komputer
class komputer {
  // membuat constructor class komputer
  public function __construct() {
    echo "Constructor dari class komputer&lt;br&gt;";
  }
  // membuat destructor class komputer
  public function __destruct() {
    echo "Destructor dari class komputer&lt;br&gt;";
  }
}
// turunkan class komputer ke laptop
class laptop extends komputer {
  // membuat constructor class laptop
  public function __construct() {
    echo "Constructor dari class laptop&lt;br&gt;";
  }
  // membuat destructor class laptop
  public function __destruct() {
    echo "Destructor dari class laptop&lt;br&gt;";
  }
}
// membuat objek dari class laptop (instansiasi)
$laptop = new laptop();
echo "Belajar PBO (OOP) pada PHP&lt;br&gt;";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas memiliki constructor dan destructor pada masing-masing class, tetapi yang akan dijalankan hanya constructor dan destructor pada class <b><q>laptop</q></b>. Di dalam PHP, ketika child class memiliki constructor dan destructor sendiri, maka PHP akan melewatkan constructor dan destructor parent class, kasus ini disebut dengan <b><q>overridden constructor</q></b> dan <b><q>overridden destructor</q></b>. Karena di dalam contoh kita class <b><q>laptop</q></b> memiliki constructor dan destructor, maka constructor dan destructor class induknya tidak dijalankan.</p>
              <p class="mb-0">Bagaimana jika kalian ingin constructor dan destructor parent class tetap dijalankan?, Solusinya adalah harus memanggil constructor dan destructor parent class secara manual dengan <b><q>scope resolution operator</q></b>, yakni: <b><q>parent::__construct()</q></b> dan <b><q>parent::__desctruct()</q></b>. Berikut adalah modifikasi kode program kita di atas:</p>
              <pre class="language-php line-numbers" data-line="17,23"><code>&lt;?php
// membuat class komputer
class komputer {
  // membuat constructor class komputer
  public function __construct() {
    echo "Constructor dari class komputer&lt;br&gt;";
  }
  // membuat destructor class komputer
  public function __destruct() {
    echo "Destructor dari class komputer&lt;br&gt;";
  }
}
// turunkan class komputer ke laptop
class laptop extends komputer {
  // membuat constructor class laptop
  public function __construct() {
    parent::__construct();
    echo "Constructor dari class laptop&lt;br&gt;";
  }
  // membuat destructor class laptop
  public function __destruct() {
    echo "Destructor dari class laptop&lt;br&gt;";
    parent::__destruct();
  }
}
// membuat objek dari class laptop (instansiasi)
$laptop = new laptop();
echo "Belajar PBO (OOP) pada PHP&lt;br&gt;";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Dengan memanggil manual perintah <b><q>parent::__construct()</q></b> dan <b><q>parent::__desctruct()</q></b>, kita bisa menjalankan seluruh constructor dan destructor dari parent class.</p>
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