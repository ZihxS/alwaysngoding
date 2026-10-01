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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/property-property-pada-css';
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
            <h2 class="judul-teori">Property Border Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Membuat garis tepi (border) merupakan salah satu efek tampilan yang paling sering ditambahkan ketika mendesain website. Sekarang kami akan membahas cara penggunaan property border yang dapat digunakan untuk membuat garis tepi pada HTML.</p>
              <p>Property border <b>membutuhkan 3 nilai</b> yaitu ketebalan border, gaya border dan warna border. Penulisan ketiga nilainnya dipisahkan dengan spasi.</p>
              <p class="m-0">Berikut adalah contoh penggunaan property border:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      h1 {
        border: 1px solid black;
      }
      h2 {
        border: 2px dotted red;
      }
      h3 {
        border: 3px dashed blue;
      }
      h4 {
        border: 4px double green;
      }
      h5 {
        border: 5px groove salmon;
      }
      h6 {
        border: 6px ridge maroon;
      }
      div {
        border: 7px inset aqua;
      }
      p {
        border: 8px outset purple;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;
      Element ini akan ada garis tepi dengan ketebalan 1 pixel yang style garisnya "solid" dan warna garisnya hitam.
    &lt;/h1&gt;
    &lt;h2&gt;
      Element ini akan ada garis tepi dengan ketebalan 2 pixel yang style garisnya "dotted" dan warna garisnya merah.
    &lt;/h2&gt;
    &lt;h3&gt;
      Element ini akan ada garis tepi dengan ketebalan 3 pixel yang style garisnya "dashed" dan warna garisnya biru.
    &lt;/h3&gt;
    &lt;h4&gt;
      Element ini akan ada garis tepi dengan ketebalan 4 pixel yang style garisnya "double" dan warna garisnya hijau.
    &lt;/h4&gt;
    &lt;h5&gt;
      Element ini akan ada garis tepi dengan ketebalan 5 pixel yang style garisnya "groove" dan warna garisnya salmon.
    &lt;/h5&gt;
    &lt;h6&gt;
      Element ini akan ada garis tepi dengan ketebalan 6 pixel yang style garisnya "ridge" dan warna garisnya merah maroon.
    &lt;/h6&gt;
    &lt;div&gt;
      Element ini akan ada garis tepi dengan ketebalan 7 pixel yang style garisnya "inset" dan warna garisnya aqua.
    &lt;/div&gt;
    &lt;p&gt;
      Element ini akan ada garis tepi dengan ketebalan 8 pixel yang style garisnya "outset" dan warna garisnya ungu.
    &lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Property border adalah cara singkat untuk membuat garis tepi (gabungan dari property border-width, border-style, border-color). Berikut adalah cara penggunaan property border-width, border-style, border-color:</p>
              <pre class="language-css line-numbers"><code>div {
  border-width: 2px;
  border-style: solid;
  border-color: red;
}</code></pre>
              <p class="m-0">Kode di atas jika disingkat akan seperti:</p>
              <pre class="language-css line-numbers"><code>div {
  border: 2px solid red;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kalian juga bisa lebih detail untuk membuat garis tepi, kalian bisa menggunakan property border-top untuk mengatur border atas, border-right untuk mengatur border kanan, border-bottom untuk mengatur border bawah, border-left untuk mengatur border kiri.</p>
              <p class="m-0">Berikut adalah contoh penggunaan property border-top, border-right, border-bottom dan border-left:</p>
              <pre class="language-css line-numbers"><code>div {
  border-top: 2px solid red;
  border-right: 2px solid yellow;
  border-bottom: 2px solid green;
  border-left: 2px solid blue;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Kode di atas berfungsi untuk:</p>
              <ol class="m-0">
                <li>Membuat border atas dengan ketebalan 2 pixel bergaya <q>solid</q> berwarna merah.</li>
                <li>Membuat border kanan dengan ketebalan 2 pixel bergaya <q>solid</q> berwarna kuning.</li>
                <li>Membuat border bawah dengan ketebalan 2 pixel bergaya <q>solid</q> berwarna hijau.</li>
                <li>Membuat border kiri dengan ketebalan 2 pixel bergaya <q>solid</q> berwarna biru.</li>
              </ol>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>