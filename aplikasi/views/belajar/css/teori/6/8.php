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
  $u = 'belajar-css/teori/gradient-dan-background-pada-css';
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
            <h2 class="judul-teori">Multiple Background (Images) Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Kalian tidak hanya bisa membuat background satu saja di CSS. Kalian bisa membuat background atau latar belakang <b>lebih dari satu</b> menggunakan CSS. Kalian juga <b>bisa mengatur background lebih dari satu dengan sangat mudah</b> sesuai dengan kemauan kalian.</p>
              <p class="m-0">Berikut cara membuat latar belakang (background) lebih dari satu:</p>
              <pre class="language-css line-numbers"><code>div {
  width: 400px;
  height: 300px;
  background-image: <mark class="keep">url(background_satu.png)</mark>, <mark class="keep">url(background_dua.jpg)</mark>;
  background-position: <mark class="keep">right bottom</mark>, <mark class="keep">left top</mark>;
  background-repeat: no-repeat;
}</code></pre>
              <p class="m-0">Penjelasan:</p>
              <ol class="mb-0">
                <li>Kita membuat <b>selector</b> untuk <b>element div</b> lebarnya <b><q>400 pixel</q></b> dan tingginya <b><q>300 pixel</q></b>.</li>
                <li>Kita menambahkan <b>dua background</b> di selector element div.</li>
                <li>Masing-masing <b>background dipisahkan dengan koma</b>.</li>
                <li>Posisi background <b>pertama</b> kita atur menjadi berada di <b>kanan bawah</b>.</li>
                <li>Posisi background <b>kedua</b> kita atur menjadi berada di <b>atas kiri</b>.</li>
                <li>Kita atur semua background repeatnya menjadi <b>no-repeat</b> (tidak mengulang).</li>
              </ol>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>