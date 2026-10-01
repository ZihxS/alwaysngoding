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
            <h2 class="judul-teori">Property Animation Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Pada CSS terdapat sebuah property dengan kode animation. Property animation berfungsi untuk <b>mengubah suatu objek dengan mode animasi pada sebuah element HTML</b>.</p>
              <p class="m-0">Value (nilai) pada property animation merupakan perwakilan dari sub-property berikut:</p>
              <ul>
                <li>animation-name</li>
                <li>animation-duration</li>
                <li>animation-timing-function</li>
                <li>animation-delay</li>
                <li>animation-iteration-count</li>
                <li>animation-direction</li>
                <li>animation-fill-mode</li>
                <li>animation-play-state</li>
              </ul>
              <p class="m-0">Yang artinya, ketika kalian menggunakan property animation, kalian bisa mengisi nilai dari animation dengan <b>delapan daftar property di atas</b>. Seperti ini:</p>
              <pre class="language-css"><code>animation: [animation-name] [animation-duration] [animation-timing-function] [animation-delay] [animation-iteration-count] [animation-direction] [animation-fill-mode] [animation-play-state];</code></pre>
              <p class="mb-0">Property animation juga perlu <b>memanggil sebuah fungsi yang harus didefinisikan terlebih dahulu</b> dalam kode CSS. Pemanggilan fungsi untuk property animation bisa dilakukan dengan kode <b>@keyframes</b>. Untuk lebih jelasnya coba perhatikan kode di bawah ini:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      @keyframes contohAnimasi {
        0% {background-color:red; left:0px; top:0px;}
        25% {background-color:yellow; left:200px; top:0px;}
        50% {background-color:blue; left:200px; top:200px;}
        75% {background-color:green; left:0px; top:200px;}
        100% {background-color:red; left:0px; top:0px;}
      }
      .animasiSaya {
        position: relative;
        height: 100px;
        width: 100px;
        animation: contohAnimasi 5s linear 2s infinite alternate;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="animasiSaya"&gt;&lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Peran <b>@keyframes</b> pada property animation tidak hanya untuk mendefinisikan fungsi dari animation saja, melainkan sebagai <b>penggerak objek animasi pada halaman web</b>.</p>
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