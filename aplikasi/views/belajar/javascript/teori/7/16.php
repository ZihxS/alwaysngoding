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
            <h2 class="judul-teori">Menggabungkan String</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Sebenarnya kita sudah tahu cara menggabungkan string bisa menggunakan <q>+</q> seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>var string1 = 'Halo';
var string2 = 'Nama Saya';
var string3 = 'Saleh';

console.log(string1 + ' ' + string2 + ' ' + string3);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan menghasilkan output <q>Halo Nama Saya Saleh</q>, kita juga bisa memanfaatkan method <code class="custom">concat()</code> untuk menggabungkan beberapa string.</p>
              <p class="mb-0">Mari kita buat kode yang ada di atas dengan memanfaatkan method <code class="custom">concat()</code>, perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>var string1 = 'Halo';
var string2 = 'Nama Saya';
var string3 = 'Saleh';

console.log(<mark class="keep">string1.concat(' ', string2, ' ', string3)</mark>);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Hasil dari kode di atas akan sama outputnya seperti contoh kode yang pertama. Pada kode yang ada di atas kita menggabungkan variabel <q>string1</q> dengan:</p>
              <ol class="mb-0">
                <li>Karakter <q> </q> (spasi kosong) (argumen ke 1).</li>
                <li>Variabel <q>string2</q> (argumen ke 2).</li>
                <li>Karakter <q> </q> (spasi kosong) (argumen ke 3).</li>
                <li>Variabel <q>string3</q> (argumen ke 4).</li>
              </ol>
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