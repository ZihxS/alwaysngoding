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
            <h2 class="judul-teori">Cara Menampilkan Nilai Variabel</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Untuk menampilkan nilai atau isi dari variabel, kalian cukup menampilkannya dengan perintah <b><q>echo</q></b> atau <b><q>print</q></b>, seperti contoh kode di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $x = 'Saya Sedang belajar PHP';
  $v = 7;

  print $x;
  echo $v;

  // hasilnya adalah: Saya Sengan belajar PHP7
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Perhatikan bahwa kedua nilai variabel ditampilkan tanpa spasi di antaranya. Hal ini terjadi karena di dalam program PHP kita tidak menyisipkan spasi untuk pemisah di antara kedua variabel di atas.</p>
              <p class="mb-0">Kalian juga bisa menampilkan variabel langsung di dalam string, jika string tersebut berada di antara tanda kutip dua <code>""</code>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $v = 7;
  $x = "Sedang belajar PHP $v";

  echo $x;

  // hasilnya adalah: Saya Sedang belajar PHP 7
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/2/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Variabel dapat dikatakan sebagai <b>inti dari sebuah bahasa pemrograman</b>. Karena melalui variabel inilah kalian memanipulasi data inputan agar menjadi nilai yang diinginkan. Selain variabel, PHP juga menyediakan sebuah solusi lain untuk menampung nilai data dengan konstanta (constant).</p>
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