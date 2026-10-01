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
  $u = 'belajar-php/teori/kondisi-dan-perulangan-pada-php';
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
            <h2 class="judul-teori">Perulangan do while Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Perulangan <b><q>do while</q></b> sama seperti perulangan <b><q>while</q></b>. Ia juga <b>tergolong dalam uncounted loop</b>. Perbedaan <b><q>do while</q></b> dengan <b><q>while</q></b> terletak pada cara ia memulai pengulangan.</p>
              <p class="mb-0">Perulangan <b><q>do while</q></b> akan selalu melakukan pengulangan sebanyak 1 kali, kemudian melakukan pengecekan kondisi. Sedangkan perulangan <b><q>while</q></b> akan mengecek kondisi terlebih dahulu, baru melakukan pengulangan. Berikut adalah bentuk dasar perulangan <b><q>do while</q></b> pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  do {
    // ini adalah blok kode yang akan diulang
  } while (kondisi);
?&gt;</code></pre>
              <p class="mb-0">Berikut adalah contoh penggunaan perulangan <b><q>do while</q></b> pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $ayam = 10;

  do {
    // ini adalah blok kode yang akan diulang
    echo "Ayam saya sisa {$ayam}&lt;br&gt;";
    $ayam--;
  } while ($ayam > 0);
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Kode di atas akan mengurangi jumlah ayam selama ayam masih berjumlah lebih dari 0. Maksud dari <b><q>$ayam--</q></b> adalah nilai <b><q>$ayam</q> dikurang 1</b>.</p>
              <blockquote class="catatan-pelajaran mb-2"><b><q>$ayam--</q></b> bisa juga diganti dengan <b><q>$ayam -= 1</q></b></blockquote>
              <blockquote class="catatan-pelajaran mb-2">Perulangan <b><q>while</q></b> dan <b><q>do while</q></b> akan selalu dieksekusi apabila kondisi masih <b><q>TRUE</q></b>.</blockquote>
              <blockquote class="catatan-pelajaran">Jika di dalam perulangan <b><q>for</q></b>, <b><q>while</q></b> dan <b><q>do while</q></b> kondisi tidak berubah menjadi FALSE, maka perulangan akan selalu jalan dan <b>akan membuat website kita menjadi lag atau lemot atau bahkan down</b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>