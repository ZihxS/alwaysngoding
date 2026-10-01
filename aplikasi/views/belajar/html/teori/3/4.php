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
  $u = 'belajar-html/teori/struktur-dasar-html';
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
            <h2 class="judul-teori">Meta Charset UTF-8</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Meta tag adalah <b><q>data tentang data</q></b> atau <b><q>data dokumen</q></b>, dimana tag ini bukan ditujukan kepada pengguna atau pengunjung atau user, melainkan kepada web browser atau kepada <b><q>program robot</q></b> seperti mesin pencarian.
              </p>
              <p>
                Charset <strong>UTF-8</strong> merupakan meta tag yang paling sering digunakan dalam HTML.
              </p>
              <p class="m-0">Cara penulisan:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    <mark class="keep">&lt;meta charset="UTF-8"&gt;</mark>
    &lt;title&gt;Judul&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p&gt;Isi&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p>
                Kode meta tag charset di atas memberi instruksi kepada web browser <b>untuk menerjemahkan karakter-karakter di dalam halaman HTML</b> sebagai UTF-8.
              </p>
              <p class="m-0">
                Kode meta tag di atas berlaku untuk HTML5 yang sangat sudah disederhanakan. Untuk HTML4 atau XHTML kode meta tag nya seperti ini:
              </p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;!-- Agak sedikit ribet --&gt;
    <mark class="keep">&lt;meta http-equiv="content-type" content="text/html;charset=UTF-8"&gt;</mark>
    &lt;title&gt;Judul&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p&gt;Isi&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p class="m-0">
                Meta tag charset ini bersifat opsional. Walaupun bersifat opsional, hampir setiap halaman HTML menggunakan meta tag ini.
              </p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>