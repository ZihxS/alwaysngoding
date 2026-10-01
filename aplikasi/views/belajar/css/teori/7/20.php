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
            <h2 class="judul-teori">Berkenalan Dengan "@keyframes" dan Membuat Animasi Sederhana</h2>
            <hr>
            <div class="konten-teori">
            <p>@keyframes adalah fungsi baru dari CSS3 untuk <b>mendefinisikan animasi pada sebuah element</b>. Lalu bagaimana cara menggunakan @keyframes untuk membuat animasi CSS3? yang harus dilakukan untuk menggunakan @keyframes adalah dengan <b>mendefinisikan dulu nama animasi yang kalian buat</b>. Lalu <b>buat animasi dengan nama animasi yang dibuat</b>. Bingung? langsung aja kita masuk ke contoh membuat animasi sederhana dengan @keyframes CSS3.</p>
            <p class="m-0">Untuk penggunaan @keyframes ada yang namanya <b>kondisi awal</b> dan <b>kondisi akhir</b>. Berikut perhatikan contohnya, sekaligus memahami cara penggunaan @keyframes CSS3 untuk membuat animasi:</p>
            <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      .kotak{
        background: blue;
        width: 200px;
        height: 200px;
        animation-name: animasi_kotak;
        animation-duration: 3s;
      }
      @keyframes animasi_kotak{
        from{background: red;}
        to{background: yellow;}
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="kotak"&gt;&lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
            <div class="mb-2">
              <a href="<?= site_url("belajar-css/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
            </div>
            <p>Perhatikan pada contoh di atas. Terdapat <b>sebuah element kotak</b>. Dan <b>kita beri nama animasi untuk kotak tersebut dengan nama animasi_kotak</b>. Dan <b>memberikan durasi animasinya selama 2 detik</b>.</p>
            <p>Dan langsung <b>kita definisikan animasi yang mau kita buat</b> dengan @keyframes. Dengan animasi yang mengubah warna pada kotak dari warna merah menjadi warna kuning.</p>
            <p class="m-0">Selain menggunakan kondisi awal dan kondisi akhir kita juga <b>bisa menggunakan persentase</b> untuk membuat animasi dengan @keyframes CSS3.</p>
            <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
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
        animation-name: animasi_kotak;
        animation-duration: 5s;
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
              <a href="<?= site_url("belajar-css/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
            </div>
            <blockquote class="catatan-pelajaran">2 contoh kode di atas hanya untuk membuat animasi sederhana dengan menggunakan hanya dua Sub-Property pada property animation.</blockquote>
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