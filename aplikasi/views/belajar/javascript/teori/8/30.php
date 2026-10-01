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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Kesimpulan</h2>
            <hr>
            <div class="konten-teori">
              <p>Pada modul ini kita mempelajari banyak fungsi untuk mengolah dan memanipulasi array, kita juga mempelajari sedikit tentang JSON.</p>
              <p class="mb-0">Pada modul ini kita telah mempelajari:</p>
              <ul>
                <li>Method <code class="custom">unshift()</code></li>
                <li>Method <code class="custom">shift()</code></li>
                <li>Method <code class="custom">push()</code></li>
                <li>Method <code class="custom">pop()</code></li>
                <li>Method <code class="custom">concat()</code></li>
                <li>Method <code class="custom">sort()</code></li>
                <li>Method <code class="custom">reverse()</code></li>
                <li>Method <code class="custom">slice()</code></li>
                <li>Method <code class="custom">splice()</code></li>
                <li>Method <code class="custom">indexOf()</code></li>
                <li>JSON (JavaScript Object Notation)</li>
                <li>Data Kompleks di JSON</li>
              </ul>
              <p class="mb-0">Semua yang kalian pelajari pasti akan berguna dikemudian hari 😉</p>
            </div>
          </div>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/teori/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php $this->load->view('belajar/markas/teori/tombol-selesai', NULL, FALSE); ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'javascript', 'modul_bagian' => 8, 'nama_modul' => 'Lebih Banyak Tentang Array dan Object di JavaScript'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>