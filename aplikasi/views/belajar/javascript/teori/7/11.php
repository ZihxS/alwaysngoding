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
            <h2 class="judul-teori">Menyaring atau Memotong String</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Kita bisa menyaring atau memfilter atau memotong string menggunakan fungsi bawaan JavaScript yaitu <code class="custom">substr()</code> dan <code class="custom">substring()</code>.
              </p>
              <p class="mb-0">Fungsi <code class="custom">substr()</code> mempunyai 2 parameter:</p>
              <ul>
                <li>Parameter pertama adalah index awal.</li>
                <li>Parameter kedua adalah jumlah karakter yang akan ditampilkan atau diambil.</li>
              </ul>
              <p class="mb-0">Fungsi <code class="custom">substring()</code> mempunyai 2 parameter:</p>
              <ul>
                <li>Parameter pertama adalah index awal.</li>
                <li>Parameter kedua adalah index akhir.</li>
              </ul>
              <p class="mb-0">Contoh penggunaan <code class="custom">substr()</code> dan <code class="custom">substring()</code> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var kalimat = 'Belajar JavaScript di https://example.test sangat seru dan menyenangkan.';

// mengambil 'https://example.test' dari variabel kalimat
console.log(kalimat.substr(22, 25)); // dimulai dari index 22 dan ambil 25 karakter
console.log(kalimat.substring(22, 47)); // dimulai dari index 22 dan diakhiri di index 47

// mengambil 'Belajar JavaScript' dari variabel kalimat
console.log(kalimat.substr(0, 18)); // dimulai dari index 0 dan ambil 18 karakter
console.log(kalimat.substring(0, 18)); // dimulai dari index 0 dan diakhiri di index 18

// mengambil 'JavaScript' dari variabel kalimat
console.log(kalimat.substr(8, 10)); // dimulai dari index 8 dan ambil 10 karakter
console.log(kalimat.substring(8, 18)); // dimulai dari index 8 dan diakhiri di index 18

// mengambil 'sangat seru' dari variabel kalimat
console.log(kalimat.substr(48, 11)); // dimulai dari index 48 dan ambil 11 karakter
console.log(kalimat.substring(48, 59)); // dimulai dari index 48 dan diakhiri di index 59</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Fungsi <code class="custom">substr()</code> dan <code class="custom">substring()</code> sama-sama berguna untuk menyaring atau memfilter atau memotong string, kedua fungsi tersebut hanya beda di perlakuan parameternya saja.</p>
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
