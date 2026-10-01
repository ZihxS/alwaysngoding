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
            <h2 class="judul-teori">Property Margin dan Padding Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Kedua property ini sama-sama berguna untuk membuat jarak pada element. Property <b>margin</b> berguna untuk <b>memberikan jarak</b> pada <b>bagian sisi luar</b> element. Property <b>padding</b> berguna untuk <b>memberikan jarak</b> pada <b>bagian sisi dalam</b> element (seperti atribut cellpadding pada tag table).</p>
              <p class="m-0">Berikut cara penggunaan property margin dan padding pada CSS:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      div {
        width: 250px;
        height: 250px;
      }
      div.kotak-1 {
        border: 2px solid red;
        margin: 10px;
        padding: 10px;
      }
      div.kotak-2 {
        border: 2px solid green;
        margin: 20px 15px;
        padding: 10px 15px;
      }
      div.kotak-3 {
        border: 2px solid blue;
        margin: 10px 5px 2px;
        padding: 15px 10px 5px;
      }
      div.kotak-4 {
        border: 2px solid purple;
        margin: 1px 2px 3px 4px;
        padding: 4px 3px 2px 1px;
      }
      div.kotak-5 {
        border: 2px solid salmon;
        margin-top: 30px;
        margin-left: 25px;
        margin-bottom: 20px;
        margin-right: 15px;
        padding-top: 15px;
        padding-left: 10px;
        padding-bottom: 5px;
        padding-right: 2.5px;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="kotak-1"&gt;INI KOTAK 1&lt;/div&gt;
    &lt;div class="kotak-2"&gt;INI KOTAK 2&lt;/div&gt;
    &lt;div class="kotak-3"&gt;INI KOTAK 3&lt;/div&gt;
    &lt;div class="kotak-4"&gt;INI KOTAK 4&lt;/div&gt;
    &lt;div class="kotak-5"&gt;INI KOTAK 5&lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Penjelasan:</p>
              <ol>
                <li>Kita membuat semua element <b><q>div</q></b> lebarnya 250 pixel dan tingginya 250 pixel.</li>
                <li>Kita membuat selector untuk element <b><q>div</q></b> yang mempunyai class <b><q>kotak-1</q></b>:</li>
                <ul>
                  <li>Kita membuat garis tepi (border) dengan ketebalan 2 pixel bergaya solid dan berwarna merah.</li>
                  <li>Kita mengatur margin (jarak sisi luar element), jarak atas, kanan, bawah dan kiri semuanya 10 pixel.</li>
                  <li>Kita mengatur padding (jarak sisi dalam element), jarak atas, kanan, bawah dan kiri semuanya 10 pixel.</li>
                </ul>
                <li>Kita membuat selector untuk element <b><q>div</q></b> yang mempunyai class <b><q>kotak-2</q></b>:</li>
                <ul>
                  <li>Kita membuat garis tepi (border) dengan ketebalan 2 pixel bergaya solid dan berwarna hijau.</li>
                  <li>Kita mengatur margin (jarak sisi luar element), jarak atas dan bawah 20 pixel (lihat nilai pertama), jarak kanan dan kiri 15 pixel (lihat nilai kedua).</li>
                  <li>Kita mengatur padding (jarak sisi dalam element), jarak atas dan bawah 10 pixel (lihat nilai pertama), jarak kanan dan kiri 15 pixel (lihat nilai kedua).</li>
                </ul>
                <li>Kita membuat selector untuk element <b><q>div</q></b> yang mempunyai class <b><q>kotak-3</q></b>:</li>
                <ul>
                  <li>Kita membuat garis tepi (border) dengan ketebalan 2 pixel bergaya solid dan berwarna biru.</li>
                  <li>Kita mengatur margin (jarak sisi luar element), jarak atas 10 pixel (lihat nilai pertama), jarak kanan dan kiri 5 pixel (lihat nilai kedua), jarak bawah 2 pixel (lihat nilai ketiga).</li>
                  <li>Kita mengatur padding (jarak sisi dalam element), jarak atas 15 pixel (lihat nilai pertama), jarak kanan dan kiri 10 pixel (lihat nilai kedua), jarak bawah 5 pixel (lihat nilai ketiga).</li>
                </ul>
                <li>Kita membuat selector untuk element <b><q>div</q></b> yang mempunyai class <b><q>kotak-4</q></b>:</li>
                <ul>
                  <li>Kita membuat garis tepi (border) dengan ketebalan 2 pixel bergaya solid dan berwarna ungu.</li>
                  <li>Kita mengatur margin (jarak sisi luar element), jarak atas 1 pixel (lihat nilai pertama), jarak kanan 2 pixel (lihat nilai kedua), jarak bawah 3 pixel (lihat nilai ketiga), jarak kiri 4 pixel (lihat nilai keempat).</li>
                  <li>Kita mengatur margin (jarak sisi luar element), jarak atas 4 pixel (lihat nilai pertama), jarak kanan 3 pixel (lihat nilai kedua), jarak bawah 2 pixel (lihat nilai ketiga), jarak kiri 1 pixel (lihat nilai keempat).</li>
                </ul>
                <li>Kita membuat selector untuk element <b><q>div</q></b> yang mempunyai class <b><q>kotak-5</q></b>:</li>
                <ul>
                  <li>Kita membuat garis tepi (border) dengan ketebalan 2 pixel bergaya solid dan berwarna salmon.</li>
                  <li>Kita menuliskan property margin dan padding satu per satu, atas kanan bawah kiri.</li>
                  <li>Margin atas (jarak sisi luar element) 30 pixel.</li>
                  <li>Margin kanan (jarak sisi luar element) 25 pixel.</li>
                  <li>Margin bawah (jarak sisi luar element) 20 pixel.</li>
                  <li>Margin kiri (jarak sisi luar element) 15 pixel.</li>
                  <li>Padding atas (jarak sisi dalam element) 15 pixel.</li>
                  <li>Padding kanan (jarak sisi dalam element) 10 pixel.</li>
                  <li>Padding bawah (jarak sisi dalam element) 5 pixel.</li>
                  <li>Padding kiri (jarak sisi dalam element) 2.5 pixel (bisa menggunakan koma, tapi harus dituliskan dengan titik).</li>
                </ul>
              </ol>
              <blockquote class="catatan-pelajaran mb-2">
                Jika property margin atau padding hanya memiliki 1 nilai, maka nilai tersebut untuk mengatur semua jarak (atas, kanan, bawah, kiri).
              </blockquote>
              <blockquote class="catatan-pelajaran mb-2">
                Jika property margin atau padding memiliki 2 nilai, nilai pertama berfungsi untuk mengatur jarak atas dan bawah, nilai kedua berfungsi untuk mengatur jarak kanan dan kiri.
              </blockquote>
              <blockquote class="catatan-pelajaran mb-2">
                Jika property margin atau padding memiliki 3 nilai, nilai pertama berfungsi untuk mengatur jarak atas, nilai kedua berfungsi untuk mengatur jarak kanan dan kiri, jarak ketiga berfungsi untuk mengatur jarak bawah.
              </blockquote>
              <blockquote class="catatan-pelajaran mb-2">
                Jika property margin atau padding memiliki 4 nilai, nilai pertama berfungsi untuk mengatur jarak atas, nilai kedua berfungsi untuk mengatur jarak kanan, jarak ketiga berfungsi untuk mengatur jarak bawah dan nilai keempat berfungsi untuk mengatur jarak kiri.
              </blockquote>
              <blockquote class="catatan-pelajaran">
                Kita bisa mengatur manual satu per satu dengan property margin dan padding yang lebih rinci. Lihat baris 33 sampai 40.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>