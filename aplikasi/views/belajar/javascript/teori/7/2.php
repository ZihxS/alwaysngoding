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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript';
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
            <h2 class="judul-teori">Multiple-line String</h2>
            <hr>
            <div class="konten-teori">
              <p>Jika kalian ingin membuat string beberapa baris (lebih dari satu baris) maka kalian harus menggunakan <q>\n</q> untuk membuat baris baru.</p>
              <p>Dengan template literal atau template string kita bisa langsung menuliskan string pada kode dalam bentuk banyak baris tanpa menggunakan <q>\n</q> lagi.</p>
              <p class="mb-0">Contoh:</p>
              <pre class="language-javascript line-numbers"><code>console.log(`ini string baris ke 1
ini string baris ke 2
ini string baris ke 3
ini string baris ke 4
ini string baris ke 5`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Jika pakai string biasa kita harus menggunakan <q>\n</q> seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>console.log('ini string baris ke 1<mark class="keep">\n</mark>ini string baris ke 2<mark class="keep">\n</mark>ini string baris ke 3<mark class="keep">\n</mark>ini string baris ke 4<mark class="keep">\n</mark>ini string baris ke 5');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Lalu jika ingin menulis string di baris baru pada code editor kita harus menggunakan concatenation <q>+</q>seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>console.log('ini string baris ke 1 \n' +
'ini string baris ke 2 \n' +
'ini string baris ke 3 \n' +
'ini string baris ke 4 \n' +
'ini string baris ke 5');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Dari contoh-contoh yang ada di atas kita sudah bisa lihat jelas betapa powerfull nya template literal.</p>
              <p>Dengan menggunakan template literal kita bisa mempersingkat kode tanpa harus menambah <q>\n</q> dan <q>+</q> lagi.</p>
              <p class="mb-0">Dengan menggunakan template literal juga kita bisa lebih enak melihat kodenya karena tidak ada karakter-karakter lain seperti pada contoh ke 2 dan ke 3.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>