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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/lebih-banyak-tentang-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Tag Font (Untuk Memodifikasi Font)</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Tag <code>&lt;font&gt;&lt;/font&gt;</code> berguna untuk mengatur atau memodifikasi kriteria font (teks), seperti mengubah gaya font, ukuran font ataupun warna font.
              </p>
              <p class="m-0">Berikut contoh penggunaan tag font:</p>
              <pre class="language-html line-numbers"><code>&lt;div&gt;
  &lt;!-- Merubah gaya font menjadi serif --&gt;
  <mark class="keep">&lt;font face="serif"&gt;</mark>Hallo indonesia!!!<mark class="keep">&lt;/font&gt;</mark>
  &lt;br&gt;&lt;br&gt;
  &lt;!-- Merubah ukuran font menjadi 1 (defaultnya 3) --&gt;
  <mark class="keep">&lt;font size="1"&gt;</mark>Hai indonesia!!!<mark class="keep">&lt;/font&gt;</mark>
  &lt;br&gt;&lt;br&gt;
  &lt;!-- Merubah warna font menjadi merah --&gt;
  <mark class="keep">&lt;font color="red"&gt;</mark>Hallo orang cerdas!!!<mark class="keep">&lt;/font&gt;</mark>
&lt;/div&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran mt-2">Kode di atas hanya contoh, masih ada atribut lainnya untuk tag <code>&lt;font&gt;&lt;/font&gt;</code>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>