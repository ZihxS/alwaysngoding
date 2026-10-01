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
            <h2 class="judul-teori">Property background-repeat Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Property background-repeat berguna <b>untuk mengatur gambar latar belakang (background) yang berulang</b>. Biasanya jika gambar latar belakang ukurannya kecil (tidak sesuai dengan resolusi device) maka gambarnya akan berulang untuk memenuhi latar belakangnya.</p>
              <p class="m-0">Berikut cara penggunaan property background-repeat pada CSS:</p>
              <pre class="language-css line-numbers"><code>body {
  background-image: url('../background/bg.jpeg');
}
body.repeat {
  background-repeat: repeat;
}
body.repeat-x {
  background-repeat: repeat-x;
}
body.repeat-y {
  background-repeat: repeat-y;
}
body.no-repeat {
  background-repeat: no-repeat;
}</code></pre>
              <ul class="m-0">
                <li>Jika nilainya <b><q>repeat</q></b>, maka gambar akan diulang horizontal dan vertical sampai memenuhi latar belakang.</li>
                <li>Jika nilainya <b><q>repeat-x</q></b>, maka gambar untuk latar belakang akan diulang horizontal.</li>
                <li>Jika nilainya <b><q>repeat-y</q></b>, maka gambar untuk latar belakang akan diulang vertical.</li>
                <li>Jika nilainya <b><q>no-repeat</q></b>, maka gambar untuk latar belakang tidak akan diulang (hanya satu saja).</li>
              </ul>
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