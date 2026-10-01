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
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/membuat-tabel-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Tabel Pada HTML</h2>
            <hr>
            <div class="konten-teori">
              <p>
                <b>Tabel sangat sering di pakai pada website</b>, khususnya website untuk pengelolaan data. Oleh sebab itu kalian harus mempelajari secara detail cara pembuatan tabel pada HTML.
              </p>
              <p>
                Gak usah pusing dan bingung, kalian akan mempelajarinya secara perlahan di sini, sebelum kalian memulai membuat tabel alangkah baiknya kalian berkenalan dengan tag-tag yang berpengaruh untuk pembuatan tabel.
              </p>
              Kalian akan menemui tag-tag ini saat membuat tabel:
              <ul class="m-0">
                <li><code>&lt;table&gt;&lt;/table&gt;</code></li>
                <li><code>&lt;thead&gt;&lt;/thead&gt;</code></li>
                <li><code>&lt;tbody&gt;&lt;/tbody&gt;</code></li>
                <li><code>&lt;tfoot&gt;&lt;/tfoot&gt;</code></li>
                <li><code>&lt;colgroup&gt;&lt;/colgroup&gt;</code></li>
                <li><code>&lt;col&gt;</code></li>
                <li><code>&lt;tr&gt;&lt;/tr&gt;</code></li>
                <li><code>&lt;th&gt;&lt;/th&gt;</code></li>
                <li><code>&lt;td&gt;&lt;/td&gt;</code></li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>