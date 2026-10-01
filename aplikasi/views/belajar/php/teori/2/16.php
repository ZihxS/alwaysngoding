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
  $u = 'belajar-php/teori/syntax-dasar-php';
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
            <h2 class="judul-teori">Pengenalan Konstanta dalam PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Dalam bahasa pemrograman, konstanta (constant) adalah <b>suatu lokasi penyimpanan (dalam memory) yang berisikan nilai yang sifatnya tetap dan tidak bisa diubah sepanjang program berjalan</b>.</p>
              <p>Berbeda dengan variabel yang isi/nilainya dapat diubah bahkan dihapus selama program berjalan, sebuah konstanta jika telah diberikan nilai, <b>tidak dapat diubah lagi</b> dalam kode program. Hal ini sesuai dengan namanya yakni konstanta (constant).</p>
              <p>Untuk membuat konstanta PHP menyediakan 2 cara yaitu: Menggunakan kata kunci (keyword) <b><q>const</q></b>, dan Menggunakan fungsi <b><q>define</q></b>.</p>
              <p class="mb-0">Untuk mendefinisikan konstanta dengan kata kunci <b><q>const</q></b>, caranya sama dengan menambahkan nilai kepada sebuah variabel, namun didahului kata <b><q>const</q></b>. Berikut adalah contoh penulisannya:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  const SITUS = "https://msalehsolahudin.com/";
  echo SITUS; // hasilnya adalah: https://msalehsolahudin.com/
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Jika menggunakan fungsi <b><q>define</q></b>, fungsi ini membutuhkan 2 nilai, yakni nama konstanta, dan nilainya. Seperti contoh kode di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  define("SITUS", "https://msalehsolahudin.com/");
  echo SITUS; // hasilnya adalah: https://msalehsolahudin.com/
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/2/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Aturan penamaan konstanta sama seperti variabel. Pembuatan konstanta dengan keyword const hanya dapat digunakan pada top-level scope, yakni harus dalam lingkungan global PHP. Sehingga kalian tidak bisa menggunakan const di dalam function, loop, atau kondisi if. Apabila kalian membutuhkan konstanta di dalam fungsi, maka harus menggunakan keyword define.</p>
              <p>Sama seperti variabel, konstanta dalam PHP <b>bersifat case sensitif</b>, sehingga perbedaan huruf besar dan kecil dianggap berbeda. GAJI, GaJi, dan gaji merupakan 3 konstanta yang berbeda.</p>
              <p class="mb-0">Walaupun kita boleh menggunakan huruf kecil dalam penulisan konstanta, kesepakatan programmer PHP menganjurkan menggunakan <b>huruf besar untuk penulisan konstanta</b>. Tujuannya agar lebih mudah untuk membedakan konstanta dengan variabel (dimana variabel dianjurkan menggunakan huruf kecil).</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>