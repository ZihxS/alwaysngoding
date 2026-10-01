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
            <h2 class="judul-teori">Method toString()</h2>
            <hr>
            <div class="konten-teori">
              <p>Method <code class="custom">toString()</code> berfungsi untuk merepresentasikan/mengubah sebuah objek apapun menjadi string.</p>
              <p class="mb-0">Contoh penggunaan method <code class="custom">toString()</code> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var contohNumber = 15;
var contohArray = ['anggur', 'apel', 'mangga', 'semangka', 'melon', 'jambu'];
var contohObject = {namaDepan: 'Saleh', namaBelakang: 'Solahudin'};
var contohBoolean = false;

// tidak menggunakan toString()
console.log(`tipe data contohNumber: ${typeof contohNumber}`);
console.log(`tipe data contohArray: ${typeof contohArray}`);
console.log(`tipe data contohObject: ${typeof contohObject}`);
console.log(`tipe data contohBoolean: ${typeof contohBoolean}`);

console.log('');

// menggunakan toString()
console.log(`tipe data contohNumber setelah menggunakan method toString(): ${typeof contohNumber.toString()}`);
console.log(`tipe data contohArray setelah menggunakan method toString(): ${typeof contohArray.toString()}`);
console.log(`tipe data contohObject setelah menggunakan method toString(): ${typeof contohObject.toString()}`);
console.log(`tipe data contohBoolean setelah menggunakan method toString(): ${typeof contohBoolean.toString()}`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">Syntax <q>typeof</q> berfungsi untuk mengecek tipe data.</blockquote>
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