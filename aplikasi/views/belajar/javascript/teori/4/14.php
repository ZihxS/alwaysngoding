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
  $u = 'belajar-javascript/teori/tipe-data-pada-javascript';
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
            <h2 class="judul-teori">Tipe Data Boolean</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data boolean adalah tipe data paling sederhana dalam JavaScript dan dalam bahasa pemrograman lainnya. Tipe data ini hanya <b>memiliki 2 nilai</b>, yaitu <b><q>true</q></b> (benar) dan <b><q>false</q></b> (salah/tidak benar). Tipe data boolean biasanya digunakan dalam operasi logika seperti kondisi if dan perulangan (looping).</p>
              <p>Penulisan boolean cukup sederhana, karena hanya memiliki 2 nilai, yakni <b><q>true</q></b> dan <b><q>false</q></b>. Penulisan <b><q>true</q></b> dan <b><q>false</q></b> ini bersifat sensitif, sehingga harus ditulis <b><q>true</q></b> dan <b><q>false</q></b> (huruf kecil semua).</p>
              <p class="mb-0">Berikut adalah contoh penulisan tipe data boolean:</p>
              <pre class="language-javascript line-numbers"><code>var benar = true;
var salah = false;</code></pre>
              <p class="mb-0">Untuk saat ini kalian hanya perlu memahaminya saja apa itu tipe data boolean pada JavaScript. Tipe data ini sangat berguna apabila nanti kalian sudah atau sedang mempelajari pengkondisian dan perulangan di JavaScript.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>