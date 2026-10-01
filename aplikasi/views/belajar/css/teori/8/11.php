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
  $u = 'belajar-css/teori/lebih-banyak-tentang-css';
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
            <h2 class="judul-teori">CSS Animation Vendor Prefixes</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Jika kalian ingin membuat animasi dengan CSS, maka kalian harus memakai @keyframes. Nah <b>@keyframes itu kalian harus buat dengan beberapa vendor prefixes</b> seperti contoh di bawah ini:</p>
              <pre class="language-html line-numbers" data-line="12-14,16-18"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      .kotak{
        background: skyblue;
        width: 200px;
        height: 200px;
        position: relative;
        -webkit-animation-name: animasi_kotak;
        -moz-animation-name: animasi_kotak;
        -o-animation-name: animasi_kotak;
        animation-name: animasi_kotak;
        -webkit-animation-duration: 5s;
        -moz-animation-duration: 5s;
        -o-animation-duration: 5s;
        animation-duration: 5s;
      }
      @-webkit-keyframes animasi_kotak{
        0% {background-color: skyblue; left:0px; top:0px;}
        25% {background-color: yellow; left:200px; top:0px;}
        50% {background-color: green; left:0px; top:200px;}
        75% {background-color: blue; left:200px; top:200px;}
        100% {background-color: salmon; left:0px; top:0px;}
      }
      @-moz-keyframes animasi_kotak{
        0% {background-color: skyblue; left:0px; top:0px;}
        25% {background-color: yellow; left:200px; top:0px;}
        50% {background-color: green; left:0px; top:200px;}
        75% {background-color: blue; left:200px; top:200px;}
        100% {background-color: salmon; left:0px; top:0px;}
      }
      @-ms-keyframes animasi_kotak{
        0% {background-color: skyblue; left:0px; top:0px;}
        25% {background-color: yellow; left:200px; top:0px;}
        50% {background-color: green; left:0px; top:200px;}
        75% {background-color: blue; left:200px; top:200px;}
        100% {background-color: salmon; left:0px; top:0px;}
      }
      @-o-keyframes animasi_kotak{
        0% {background-color: skyblue; left:0px; top:0px;}
        25% {background-color: yellow; left:200px; top:0px;}
        50% {background-color: green; left:0px; top:200px;}
        75% {background-color: blue; left:200px; top:200px;}
        100% {background-color: salmon; left:0px; top:0px;}
      }
      @keyframes animasi_kotak{
        0% {background-color: skyblue; left:0px; top:0px;}
        25% {background-color: yellow; left:200px; top:0px;}
        50% {background-color: green; left:0px; top:200px;}
        75% {background-color: blue; left:200px; top:200px;}
        100% {background-color: salmon; left:0px; top:0px;}
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="kotak"&gt;&lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kita <b>menggunakan vendor prefixes</b> pada property <b>animation-name</b> dan <b>animation-duration</b> lihat di baris ke 12 sampai 14 dan ke 16 sampai 18.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>