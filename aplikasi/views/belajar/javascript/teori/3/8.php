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
  $u = 'belajar-javascript/teori/dasar-javascript';
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
            <h2 class="judul-teori">Aturan Penulisan Variabel di JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">
                Aturan penulisan variabel di JavaScript seperti berikut:
                <ol>
                  <li>Karakter pertama harus diawali dengan huruf atau underscore <b><q>_</q></b> atau tanda dollar <b><q>$</q></b>.</li>
                  <li>Karakter kedua dan seterusnya bisa ditambahkan dengan huruf, angka, underscore <b><q>_</q></b> atau tanda dollar <b><q>$</q></b>.</li>
                </ol>
              </p>
              <p>
                Dari aturan yang ada di atas dapat dilihat bahwa kita tidak bisa menggunakan angka sebagai karakter pertama dari sebuah variabel.
              </p>
              <p class="mb-0">Berikut adalah contoh penulisan nama variabel yang dibolehkan:</p>
              <pre class="language-javascript line-numbers"><code>var namaLengkap = 'Saleh Solahudin'; // disarankan pakai model yang kaya gini aja (camelCase) (tidak menggunakan tanda dollar)
var _umur = '20 Tahun';
var $lokasiKerja = 'Jakarta';
var tempat_tinggal = 'Bogor';
var m4k4n4n = 'Pizza';
var m1num4n = 'Sprite';
var $_hobi_ = 'Ngoding';
var __bahasa__ = 'Indonesia';</code></pre>
              <p class="mb-0">Berikut adalah contoh penulisan nama variabel yang dilarang:</p>
              <pre class="language-javascript line-numbers"><code>var nama lengkap = 'Saleh Solahudin'; // spasi tidak diperbolehkan
var lokasi%kerja = 'Jakarta'; // tanda atau simbol selain $ tidak diperbolehkan
var tempat#tinggal = 'Bogor'; // tanda atau simbol selain $ tidak diperbolehkan
var 4gama = 'Islam'; // nama variabel tidak boleh diawali dengan angka
var if = 'Contoh'; // reserved words tidak boleh digunakan sebagai nama variabel</code></pre>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>