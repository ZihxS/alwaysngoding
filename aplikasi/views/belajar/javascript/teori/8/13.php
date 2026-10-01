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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript';
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
            <h2 class="judul-teori">Method slice()</h2>
            <hr>
            <div class="konten-teori">
              <p>Method <code class="custom">slice()</code> digunakan untuk <q>memotong</q> array menjadi array baru. Method <code class="custom">slice()</code> ini membutuhkan 2 buah argumen yang berisi posisi index awal dan akhir pemotongan.</p>
              <p>Jika hanya menggunakan 1 argumen, maka method ini akan mengembalikan array baru dimulai dari posisi argumen sampai dengan akhir array. Jika argumen bernilai negatif, maka perhitungan akan dimulai dari akhir array.</p>
              <p class="mb-0">Berikut adalah contoh penggunaan method <code class="custom">slice()</code> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var minuman = ['Cendol Dawet', 'Bajigur', 'Bandrek', 'Es Doger', 'Kopi', 'Sirup', 'Teh', 'Susu', 'Air Bening'];

var contohSlice1 = minuman.slice(3);
var contohSlice2 = minuman.slice(1,3);
var contohSlice3 = minuman.slice(4,7);
var contohSlice4 = minuman.slice(-3);
var contohSlice5 = minuman.slice(-5,-2);

console.log(contohSlice1); // output: ['Es Doger','Kopi','Sirup','Teh','Susu','Air Bening']
console.log(contohSlice2); // output: ['Bajigur','Bandrek']
console.log(contohSlice3); // output: ['Kopi','Sirup','Teh']
console.log(contohSlice4); // output: ['Teh','Susu','Air Bening']
console.log(contohSlice5); // output: ['Kopi','Sirup','Teh']</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/8/{$b}/1?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penjelasan:</p>
              <ul>
                <li>Di baris ke 3 kita mengambil isi index ke 3 sampai akhir index dari array minuman.</li>
                <li>Di baris ke 4 kita mengambil isi index ke 1 sampai index ke 2 dari array minuman.</li>
                <li>Di baris ke 5 kita mengambil isi index ke 4 sampai index ke 6 dari array minuman.</li>
                <li>Di baris ke 6 kita mengambil isi index ke 3 dari akhir array sampai akhir index dari array minuman.</li>
                <li>Di baris ke 7 kita mengambil isi index ke 5 dari akhir array sampai index ke 2 dari akhir array dari array minuman.</li>
              </ul>
              <blockquote class="catatan-pelajaran">Selalu ingat index itu dimulai dari 0 😉</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>