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
  $u = 'belajar-php/teori/kondisi-dan-perulangan-pada-php';
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
            <h2 class="judul-teori">Perulangan Bersarang (Nested Loop)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Perulangan bersarang adalah <b>istilah untuk menyebut perulangan di dalam perulangan</b>. Dalam Bahasa Inggris, <b><q>perulangan bersarang</q></b> disebut <b><q>nested loop</q></b>. Kalian bisa memasukkan banyak perulangan di dalam perulangan sesuai kebutuhan kalian. Berikut adalah contoh perulangan bersarang pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $i = 0;
  while ($i < 5) {
    for ($j = 0; $j < 10; $j++) {
      echo "ini perulangan ke ({$i}, {$j})&lt;br&gt;";
    }
    $i++;
  }
?&gt;</code></pre>
<div class="mb-2">
  <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
</div>
<pre class="language-php line-numbers"><code>&lt;?php
  for ($i = 0; $i < 2; $i++) {
    for ($j = 0; $j < 5; $j++) {
      for ($k = 0; $k < 10; $k++) {
        echo "ini perulangan ke ({$i}, {$j}, {$k})&lt;br&gt;";
      }
    }
  }
?&gt;</code></pre>
<div class="mb-2">
  <a href="<?= site_url("belajar-php/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
</div>
<pre class="language-php line-numbers"><code>&lt;?php
  for ($a = 9; $a > 0; $a--) {
    for ($i = 1; $i <= $a; $i++) {
      echo "&amp;nbsp;&amp;nbsp;";
    }
    for ($a1 = 10; $a1 > $a; $a1--) {
      echo "*";
    }
    for ($a2 = 9; $a2 > $a; $a2--) {
      echo "*";
    }
    echo "&lt;br&gt;";
  }
  for ($b = 0; $b <= 9; $b++) {
    for ($j = 1; $j <= $b; $j++) {
      echo "&amp;nbsp;&amp;nbsp;";
    }
    for ($b1 = 10; $b1 > $b; $b1--) {
      echo "*";
    }
    for ($b2 = 9; $b2 > $b; $b2--) {
      echo "*";
    }
    echo "&lt;br&gt;";
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Kode-kode di atas adalah contoh penggunaan perulangan bersarang (nested loop).</p>
              <blockquote class="catatan-pelajaran">Kode pada kotak ketiga di atas akan menghasilkan pola belah ketupat loh, coba saja eksekusi kodenya oleh kalian 😆</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>