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
            <h2 class="judul-teori">Memanfaatkan Tag Baru HTML5</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Kalian bisa memanfaatkan tag baru di HTML5 untuk membuat struktur website, Seperti tag <b><q>&lt;header&gt;&lt;/header&gt;</q></b>, <b><q>&lt;main&gt;&lt;/main&gt;</q></b>, <b><q>&lt;footer&gt;&lt;/footer&gt;</q></b>, dan lain-lain.
              </p>
              <p class="m-0">Berikut adalah cara penulisannya:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar HTML di Always Ngoding&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;header&gt;
      &lt;nav&gt;
        &lt;!-- Navigasi Website --&gt;
      &lt;/nav&gt;
    &lt;/header&gt;
    &lt;main&gt;
      &lt;!-- Inti (konten) Website --&gt;
      &lt;section&gt;
        &lt;!-- Section 1 --&gt;
      &lt;/section&gt;
      &lt;section&gt;
        &lt;!-- Section 2 --&gt;
      &lt;/section&gt;
      &lt;section&gt;
        &lt;!-- Section 3 --&gt;
      &lt;/section&gt;
    &lt;/main&gt;
    &lt;footer&gt;
      &lt;!-- Footer (kaki) Website --&gt;
    &lt;/footer&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p class="m-0">
                Kode di atas sangat rapih dan enak untuk dilihat dan tentunya sederhana. Coba kalian bedakan kode HTML5 di atas dan kode pada HTML4 sebagai berikut:
              </p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;meta http-equiv="content-type" content="text/html;charset=UTF-8"&gt;
    &lt;title&gt;Belajar HTML di Always Ngoding&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="header"&gt;
      &lt;div class="nav"&gt;
        &lt;!-- Navigasi Website --&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="main"&gt;
      &lt;!-- Inti (konten) Website --&gt;
      &lt;div class="section"&gt;
        &lt;!-- Section 1 --&gt;
      &lt;/div&gt;
      &lt;div class="section"&gt;
        &lt;!-- Section 2 --&gt;
      &lt;/div&gt;
      &lt;div class="section"&gt;
        &lt;!-- Section 3 --&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="footer"&gt;
      &lt;!-- Footer (kaki) Website --&gt;
    &lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p class="m-0">Terlihat sangat menonjolkan perbedaannya?, semoga bermanfaat 😄</p>
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