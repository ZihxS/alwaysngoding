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
            <h2 class="judul-teori">Variabel Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Variabel CSS adalah <b>nilai tersimpan yang ditujukan untuk digunakan kembali</b> melalui stylesheet. Mereka bisa diakses menggunakan fungsi kostum <b><q>var()</q></b> dan mengaturnya menggunakan notasi properti kostum.</p>
              <p class="m-0">Berikut adalah contoh penggunaan variabel pada CSS:</p>
              <pre class="language-css line-numbers"><code>:root {
  --warna-utama: blue;
}
div {
  background-color: var(--warna-utama);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Variabel didefinisikan dalam <b>:root</b> bersifat global, meskipun variabel yang didefinisikan dalam sebuah selector menjadi spesifik pada selector tersebut.</p>
              <pre class="language-css line-numbers"><code>article {
  --warna-cadangan: salmon;
}
article {
  background-color: var(--warna-cadangan);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/8/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas itu kita mendefinisikan variabel <b>--warna-cadangan</b> dengan value <b>salmon</b> yang <b>hanya bisa diakses untuk semua element article saja</b>.</p>
              <p class="mb-2">Ada banyak sekali pengembang luar biasa dan berbakat yang membuat dan bereksperimen dengan konsep dari reaktif dan theme-based animations menggunakan variabel CSS. Berikut beberapa contoh yang bisa kalian pelajari:</p>
              <ul class="mb-0">
                <li><a href="https://codepen.io/tutsplus/pen/rmQXbK" target="_blank">https://codepen.io/tutsplus/pen/rmQXbK</a></li>
                <li><a href="https://codepen.io/tutsplus/pen/mmQNZJ" target="_blank">https://codepen.io/tutsplus/pen/mmQNZJ</a></li>
                <li><a href="https://codepen.io/tutsplus/pen/MmzNNQ" target="_blank">https://codepen.io/tutsplus/pen/MmzNNQ</a></li>
                <li><a href="https://codepen.io/tutsplus/pen/dWwbbx" target="_blank">https://codepen.io/tutsplus/pen/dWwbbx</a></li>
                <li><a href="https://codepen.io/tutsplus/pen/QvzLwM" target="_blank">https://codepen.io/tutsplus/pen/QvzLwM</a></li>
                <li><a href="https://codepen.io/tutsplus/pen/OmrLVb" target="_blank">https://codepen.io/tutsplus/pen/OmrLVb</a></li>
              </ul>
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