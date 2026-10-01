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
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Konstanta Sistem dalam PHP (Predefined Constant)</h2>
            <hr>
            <div class="konten-teori">
              <p>Sama seperti variabel, PHP juga <b>telah membuat beberapa konstanta yang telah didefinisikan dan tidak bisa diubah nilainya</b>. Karena banyaknya modul yang dapat ditambahkan kedalam PHP, Predefined Constant dalam PHP akan bertambah tergantung modul yang ada. Sebagai contoh berikut adalah Predefined Constant dalam sistem inti PHP:</p>
              <p>PHP_VERSION, PHP_MAJOR_VERSION, PHP_MINOR_VERSION, PHP_RELEASE_VERSION, PHP_VERSION_ID, PHP_EXTRA_VERSION, PHP_ZTS, PHP_DEBUG, PHP_MAXPATHLEN, PHP_OS, PHP_SAPI, PHP_EOL, PHP_INT_MAX, PHP_INT_SIZE, DEFAULT_INCLUDE_PATH, PEAR_INSTALL_DIR, PEAR_EXTENSION_DIR, PHP_EXTENSION_DIR, PHP_PREFIX, PHP_BINDIR, PHP_BINARY, PHP_MANDIR, PHP_LIBDIR, PHP_DATADIR, __LINE__ , __FILE__ , __DIR__ , __FUNCTION__ , __CLASS__ , __TRAIT__ , __METHOD__, __NAMESPACE__</p>
              <p class="mb-2">Kebanyakan dari konstanta tersebut menyimpan nilai yang dapat membantu kita dalam membuat program PHP, khususnya untuk <b>debugging</b>.</p>
              <blockquote class="catatan-pelajaran">Dalam aplikasi dunia nyata, penggunaan konstanta tidak akan sesering penggunaan variabel, namun jika kalian membutuhkan sebuah variabel yang tidak bisa ditimpa nilainya, konstanta merupakan pilihan yang tepat.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>