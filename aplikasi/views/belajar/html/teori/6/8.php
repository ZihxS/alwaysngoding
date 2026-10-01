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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/lebih-banyak-tentang-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Tag Link, Style, Script dan Atribut Style</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Tag <code>&lt;link&gt;</code> <b>berguna untuk mendefinisikan relasi di antara dokumen dan sebuah sumber eksternal</b>, kebanyakan digunakan untuk merelasikan kepada CSS.
              </p>
              <p class="m-0">Contoh penggunaan tag <b><q>link</q></b>:</p>
              <pre class="language-html"><code>&lt;link rel="stylesheet" href="style.css"&gt;</code></pre>
              <div>
                <p class="m-0">Penjelasan:</p>
                <ul>
                  <li>Tag <b><q>link</q></b> tersebut akan ber-relasi dengan <b>stylesheet</b> (css).</li>
                  <li>Terdapat atribut <b><q>href</q></b> yang berguna untuk mengarahkan <b>link ke file yang dituju</b>.</li>
                  <li><b><q>style.css</q></b> adalah nama file css yang digabung atau direlasikan.</li>
                </ul>
              </div>
              <blockquote class="catatan-pelajaran mb-2">Kalian akan mengetahuinya lebih banyak pada pelajaran CSS nanti, ini hanya sekedar pintasan saja.</blockquote>
              <p class="mb-1">
                Tag <code>&lt;style&gt;&lt;/style&gt;</code> <b>berguna untuk mendefinisikan suatu style (css) sebuah dokumen</b>.
              </p>
              <p class="m-0">Contoh penggunaan tag style:</p>
              <pre class="language-html"><code>&lt;style&gt;
  body {
    background-color: red;
  }
&lt;/style&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Kalian akan mengetahuinya fungsinya pada pelajaran CSS nanti, ini hanya sekedar pintasan saja.</blockquote>
              <p class="mb-1">
                Tag <code>&lt;script&gt;&lt;/script&gt;</code> <b>berfungsi untuk mendefinisikan sebuah script</b>.
              </p>
              <p class="m-0">Contoh penggunaan tag script:</p>
              <pre class="language-html"><code>&lt;script&gt;
  alert("Selamat datang di website kami...");
  console.log("Ini akan tercetak di console web browser...");
&lt;/script&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Kalian akan mengetahuinya fungsinya pada pelajaran Javascript nanti, ini hanya sekedar pintasan saja.</blockquote>
              <p class="mb-1">
                Atribut <b><q>style</q></b> berfungsi untuk menuliskan atau mendefinisikan suatu style (css) pada suatu tag.
              </p>
              <p class="m-0">Contoh penggunaan atribut style:</p>
              <pre class="language-html"><code>&lt;p <mark class="keep">style="color: red;"</mark>&gt;Tulisan ini warnanya akan menjadi merah.&lt;/p&gt;</code></pre>
              <blockquote class="catatan-pelajaran">Atribut <b><q>style</q></b> pada tag biasa disebut inline CSS.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>