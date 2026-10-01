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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/lebih-banyak-tentang-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Fungsi explode() dan implode() pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Fungsi <b><q>explode()</q></b> adalah fungsi PHP yang berguna <b>untuk mengubah suatu text atau kalimat yang terdiri dari kata-kata menjadi sebuah array berdasarkan separator atau tanda pemisah pada kalimat tersebut</b>. Fungsi <b><q>explode()</q></b> menampung 3 argumen (2 wajib, 1 tidak wajib):</p>
              <ol>
                <li>Argumen pertama merupakan tanda pemisah dari suatu kalimat yang ingin kalian ubah menjadi array.</li>
                <li>Argumen kedua merupakan kalimat yang ingin kalian ubah menjadi array.</li>
                <li>Argumen ketiga merupakan batas jumlah array yang ingin kalian buat dari parameter string.</li>
              </ol>
              <p class="mb-0">Berikut ini beberapa contoh script cara menggunakan <b><q>explode()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $string = "Belajar Pemrograman di Always Ngoding";
  var_dump(explode(" ", $string)); // array(5) { [0]=> string(7) "Belajar" [1]=> string(11) "Pemrograman" [2]=> string(2) "di" [3]=> string(6) "Always" [4]=> string(7) "Ngoding" }
  echo "&lt;hr&gt;";
  var_dump(explode(" ", $string, 2)); // array(2) { [0]=> string(7) "Belajar" [1]=> string(29) "Pemrograman di Always Ngoding" }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Fungsi <b><q>implode()</q></b> adalah fungsi PHP yang berguna <b>untuk mengubah suatu array menjadi sebuah text atau kalimat</b>. Dengan fungsi <b><q>implode()</q></b> kalian bisa menambahkan separator atau tanda pemisah pada setiap index array agar mudah dibaca. Fungsi <b><q>implode()</q></b> menampung 2 argumen:</p>
              <ol>
                <li>Argumen pertama merupakan tanda pemisah yang digunakan untuk memisahkan setiap index array ketika array diubah menjadi sebuah text atau kalimat.</li>
                <li>Argumen kedua merupakan array yang ingin kalian ubah menjadi text atau kalimat.</li>
              </ol>
              <p class="mb-0">Berikut ini beberapa contoh script cara menggunakan <b><q>implode()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $array = ['Belajar', 'Pemrograman', 'di', 'Always', 'Ngoding'];
  echo implode($array); // <?= implode(['Belajar', 'Pemrograman', 'di', 'Always', 'Ngoding'])."\n"; ?>
  echo "&lt;hr&gt;";
  echo implode(" ", $array); // <?= implode(" ", ['Belajar', 'Pemrograman', 'di', 'Always', 'Ngoding'])."\n"; ?>
?&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>