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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Perulangan do while Pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Perulangan <b><q>do while</q></b> sama seperti perulangan <b><q>while</q></b>. Ia juga <b>tergolong dalam uncounted loop</b>. Perbedaan <b><q>do while</q></b> dengan <b><q>while</q></b> terletak pada cara ia memulai pengulangan.</p>
              <p class="mb-0">Perulangan <b><q>do while</q></b> akan selalu melakukan pengulangan sebanyak 1 kali, kemudian melakukan pengecekan kondisi. Sedangkan perulangan <b><q>while</q></b> akan mengecek kondisi terlebih dahulu, baru melakukan pengulangan. Berikut adalah bentuk dasar perulangan <b><q>do while</q></b> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>do {
  // ini adalah blok kode yang akan diulang
} while (kondisi);</code></pre>
              <p class="mb-0">Berikut adalah contoh penggunaan perulangan <b><q>do while</q></b> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var ikan = 10;

do {
  // ini adalah blok kode yang akan diulang
  console.log("Ikan saya sisa " + ikan);
  ikan--;
} while (ikan > 0);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Kode di atas akan mengurangi jumlah ikan selama ikan masih berjumlah lebih dari 0. Maksud dari <b><q>ikan--</q></b> adalah nilai <b><q>ikan</q> dikurang 1</b>.</p>
              <blockquote class="catatan-pelajaran mb-2"><b><q>ikan--</q></b> bisa juga diganti dengan <b><q>ikan -= 1</q></b></blockquote>
              <blockquote class="catatan-pelajaran mb-2">Perulangan <b><q>while</q></b> dan <b><q>do while</q></b> akan selalu dieksekusi apabila kondisi masih <b><q>true</q></b>.</blockquote>
              <blockquote class="catatan-pelajaran">Jika di dalam perulangan <b><q>for</q></b>, <b><q>while</q></b> dan <b><q>do while</q></b> kondisi tidak berubah menjadi false, maka perulangan akan selalu jalan dan <b>akan membuat website kita menjadi lag atau lemot atau bahkan down</b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>