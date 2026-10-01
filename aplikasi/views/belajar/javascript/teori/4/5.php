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
            <h2 class="judul-teori">Tipe Data Float</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data float (disebut juga tipe data floating point atau real number) adalah tipe data <b>angka yang memiliki bagian desimal di akhir angka</b>, atau memiliki floating point (floating point adalah istilah dalam Bahasa Inggris untuk menyebut tanda <q>titik</q> yang menandakan bilangan desimal). Contoh angka float adalah seperti: 0.5 atau 3.14.</p>
              <p>Tipe data float cocok digunakan untuk variabel yang berisi <b>angka pecahan</b>, seperti nilai IPK, hasil pembagian, atau hasil komputasi numerik yang angkanya tidak bisa ditampung oleh tipe data integer.</p>
              <blockquote class="catatan-pelajaran mb-3">Dikarenakan perbedaan cara penulisan bilangan float di Eropa dan Amerika juga Indonesia, didalam JavaScript penulisan nilai desimal ditandai dengan tanda <b><q>titik</q></b>, <b>bukan <q>koma</q></b>. Nilai 0,87 harus ditulis menjadi <b><q>0.87</q></b>. JavaScript akan menampilkan pesan error jika sebuah nilai ditulis dengan tanda koma <b><q>0,87</q></b>.</blockquote>
              <p class="mb-0">Berikut contoh penulisan bilangan float dalam JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var floatSatu = 0.25;
var floatDua = 13.15;

console.log(floatSatu); // 0.25
console.log(floatDua); // 13.15</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Sama seperti tipe data integer, variabel dengan tipe data float juga dapat melakukan operasi numerik seperti penambahan, pembagian, perkalian, dan lain-lain. Berikut adalah contoh operasi matematis dengan tipe data float:</p>
              <pre class="language-javascript line-numbers"><code>var floatSatu = 0.25;
var floatDua = 13.15;

var penambahan = floatSatu+floatDua;
var pengurangan = floatDua-floatSatu;

console.log(pengurangan); // 12.9
console.log(penambahan); // 13.4</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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