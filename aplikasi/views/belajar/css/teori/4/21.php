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
            <h2 class="judul-teori">Property background-size Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Property background-size berfungsi <b>untuk mengatur ukuran pada background gambar (property <q>background-image</q>)</b>. Lihat cara penggunaan property background-size pada CSS:</p>
              <pre class="language-css line-numbers"><code>body {
  background-image: url('../background/bg.jpeg');
  background-repeat: no-repeat;
}
body.bg-100persen-100vh {
  background-size: 100% 100vh;
}
body.bg-100px-100px {
  background-size: 100px 100px;
}
body.bg-50persen-75persen {
  background-size: 50% 75%;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Property background-size di atas <b>mempunyai dua nilai</b>. Nilai pertama untuk mengatur lebar background, nilai kedua untuk mengatur tinggi background.</p>
              <p class="m-0">Kalian juga bisa memasukan 1 nilai saja (auto/cover), lihat contoh kode di bawah:</p>
              <pre class="language-css line-numbers"><code>body {
  background-image: url('../background/bg.jpeg');
  background-repeat: no-repeat;
}
body.bg-auto {
  background-size: auto;
}
body.bg-cover {
  background-size: cover;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <ul class="m-0">
                <li>Nilai auto akan menghasilkan ukuran otomatis.</li>
                <li>Nilai cover akan menghasilkan ukuran penuh (hanya lebarnya saja).</li>
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