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
            <h2 class="judul-teori">Operator tambah (+) untuk operasi String pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Operasi yang sering dilakukan untuk tipe data String adalah operasi penyambungan string atau dikenal dengan istilah <b><q>concatenate</q></b>. Untuk operasi ini, JavaScript menggunakan operator tambah (<code class="custom">+</code>).</p>
              <p class="mb-0">Contoh:</p>
              <pre class="language-javascript line-numbers"><code>var str1 = "Always";
var str2 = "Ngoding";
var str3 = str1 + str2;

console.log(str3); // AlwaysNgoding</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Jika kita menggunakan operator tambah (<code class="custom">+</code>) pada JavaScript maka JavaScript akan mendeteksi operasi tipe data nya. Jika kedua tipe data adalah angka (number), maka operasi yang akan dilakukan adalah penjumlahan (operasi matematika), namun jika salah satu atau kedua variabel bertipe String, maka yang akan dilakukan JavaScript adalah operasi penyambungan String.</p>
              <p class="mb-0">Contoh:</p>
              <pre class="language-javascript line-numbers"><code>var variabel1 = 10;
var variabel2 = 75;
var variabel3 = "35";
var variabel4 = variabel1 + variabel2;
var variabel5 = variabel2 + variabel3;
var variabel6 = variabel1 + variabel2 + variabel3;

console.log(variabel4); // 85 (yang akan dijalankan adalah operasi matematika)
console.log(variabel5); // 7535 (yang akan dijalankan adalah operasi penyambungan string)
console.log(variabel6); // 8535 (operasi matematika akan dijalankan untuk "variabel1 + variabel2" dan saat "+ variabel3" yang akan dijalankan adalah operasi penyambungan string)</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Pada contoh di atas <b><q>variabel4</q></b> akan menjalankan operasi matematika karena kedua variabel adalah angka (number), sedangkan <b><q>variabel5</q></b> dan <b><q>variabel6</q></b> akan menjalankan operasi penyambungan string karena salah satu variabel adalah string.</p>
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