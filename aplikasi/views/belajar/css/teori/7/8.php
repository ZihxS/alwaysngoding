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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/transisi-transformasi-dan-animasi-pada-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Method "skew()" Pada CSS Transform</h2>
            <hr>
            <div class="konten-teori">
              <p>Seperti yang sudah dijelaskan pada penjelasan sebelumnya. Fungsi skew ini digunakan untuk <b>memiringkan element</b>.</p>
              <p class="m-0">Berikut contoh kode lengkap cara menggunakan metode skew pada CSS transform:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      body {
        background: skyblue;
        text-align: center;
      }
      .kotak1 {
        background: salmon;
        padding: 20px;
        margin: 50px;
        width: 150px;
        height: 150px;
        float: left;
      }
      .kotak2 {
        background: salmon;
        padding: 20px;
        margin: 50px;
        width: 150px;
        height: 150px;
        float: left;
        transform: skew(20deg);
      }
      .kotak3 {
        background: salmon;
        padding: 20px;
        margin: 50px;
        width: 150px;
        height: 150px;
        float: left;
        transform: skew(30deg,20deg);
      }
      .kotak4 {
        background: salmon;
        padding: 20px;
        margin: 50px;
        width: 150px;
        height: 150px;
        float: left;
        transform: skewY(20deg);
      }
      .kotak5 {
        background: salmon;
        padding: 20px;
        margin: 50px;
        width: 150px;
        height: 150px;
        float: left;
        transform: skewX(20deg);
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="kotak1"&gt;
      Ini adalah kotak 1. Kotak ini tidak diberikan method skew().
    &lt;/div&gt;
    &lt;div class="kotak2"&gt;
      Ini adalah kotak 2. Ini contoh method skew() CSS Transform. skew() 1 parameter.
    &lt;/div&gt;
    &lt;div class="kotak3"&gt;
      Ini adalah kotak 3. Ini contoh method skew() CSS Transform. skew() 2 parameter.
    &lt;/div&gt;
    &lt;div class="kotak4"&gt;
      Ini adalah kotak 4. Ini contoh method skew() CSS Transform. skewY().
    &lt;/div&gt;
    &lt;div class="kotak5"&gt;
      Ini adalah kotak 5. Ini contoh method skew() CSS Transform. skewX().
    &lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-css/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>