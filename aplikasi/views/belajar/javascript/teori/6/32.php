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
  $u = 'belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript';
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
            <h2 class="judul-teori">Perulangan Bersarang (Nested Loop)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Perulangan bersarang adalah <b>istilah untuk menyebut perulangan di dalam perulangan</b>. Dalam Bahasa Inggris, <b><q>perulangan bersarang</q></b> disebut <b><q>nested loop</q></b>. Kalian bisa memasukkan banyak perulangan di dalam perulangan sesuai kebutuhan kalian. Berikut adalah contoh perulangan bersarang pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var i = 1;
while (i <= 5) {
  for (var j = 1; j <= 10; j++) {
    console.log('ini perulangan ke (' + i + ', ' + j + ')');
  }
  i++;
}</code></pre>
<div class="mb-2">
  <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
</div>
<pre class="language-javascript line-numbers"><code>for (var i = 1; i <= 2; i++) {
  for (var j = 1; j <= 5; j++) {
    for (var k = 1; k <= 10; k++) {
      console.log('ini perulangan ke (' + i + ', ' + j + ', ' + k + ')');
    }
  }
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode-kode di atas adalah contoh penggunaan perulangan bersarang (nested loop).</p>
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
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'javascript', 'modul_bagian' => 6, 'nama_modul' => 'Kondisi Dan Perulangan Pada JavaScript'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>