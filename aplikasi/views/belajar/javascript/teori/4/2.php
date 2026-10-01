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
            <h2 class="judul-teori">Tipe Data Integer</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data integer adalah tipe data yang <b>berupa angka bulat</b> seperti: 1, 5, dan -150. Tipe data integer umum digunakan untuk data dengan angka bulat, seperti harga barang dan jumlah stok barang. Jika data yang kita miliki kemungkinan akan mengandung pecahan, maka tipe data yang digunakan adalah float (akan dibahas di bagian selanjutnya).</p>
              <p>Nilai integer dapat bernilai positif <b><q>+</q></b> atau negatif <b><q>-</q></b>. Jika nilai tidak diberi tanda apapun maka bisa diasumsikan nilai tersebut adalah positif.</p>
              <p class="mb-0">Berikut contoh penulisan bilangan integer pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var stokBarang = 95;
var harga = 150000;
var rugi = -500000;

console.log(stokBarang);
console.log(harga);
console.log(rugi);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Untuk variabel dengan angka integer, kalian bisa melakukan operasi matematika seperti penambahan, pengurangan, pembagian dan lain-lain, seperti contoh di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>var angkaPertama = 20;
var angkaKedua = 10;
var angkaKetiga = 7;
var hasilPertambahan = angkaPertama+angkaKedua; // pertambahan
var hasilPengurangan = angkaPertama-angkaKedua; // penguranan
var hasilPerkalian = angkaPertama*angkaKedua; // perkalian
var hasilPembagian = angkaPertama/angkaKedua; // pembagian
var hasilSisaPembagian = angkaKedua%angkaKetiga; // sisa pembagian (modulus)

console.log(hasilPertambahan); // 20 ditambah 10 = 30
console.log(hasilPengurangan); // 20 dikurang 10 = 10
console.log(hasilPerkalian); // 20 dikali 10 = 200
console.log(hasilPembagian); // 20 dibagi 10 = 2
console.log(hasilSisaPembagian); // sisa pembagian 10 dan 7 = 3</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">JavaScript adalah bahasa yang bersifat dynamic typing, artinya kalian tidak harus menuliskan tipe data pada saat pembuatan variabel seperti pada bahasa C, C++, Java dan sebagainya yang bersifat static typing. Jadi ketika sebuah variabel pada JavaScript berisi angka bulat, maka secara otomatis variabel tersebut disebut atau dianggap sebagai variabel integer.</blockquote>
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