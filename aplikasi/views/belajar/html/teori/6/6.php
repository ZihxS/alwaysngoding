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
            <h2 class="judul-teori">Membuat Konten Berjalan Pada HTML (Tag Marquee)</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Tag <code>&lt;marquee&gt;&lt;/marquee&gt;</code> berguna dan berfungsi untuk <b>membuat konten animasi</b> (bergerak), pasti kalian pernah melihat konten bergerak pada suatu website kan? misalnya konten text informasi penting pada bagian bawah navigasi.
              </p>
              <p class="m-0">
                Masih bingung apa itu tag <code>&lt;marquee&gt;&lt;/marquee&gt;</code> dan fungsinya?, perhatikan beberapa contoh kode penggunaan tag <code>&lt;marquee&gt;&lt;/marquee&gt;</code> di bawah ini:
              </p>
              <pre class="language-html"><code>&lt;!-- Dasar --&gt;
<mark class="keep">&lt;marquee&gt;</mark>Kalian semua luar biasa!!!<mark class="keep">&lt;/marquee&gt;</mark>
&lt;br&gt;
&lt;!-- Tujuannya ke kanan, kecepatannya 3 (default kecepatannya 6) --&gt;
<mark class="keep">&lt;marquee direction="right" scrollamount="3"&gt;</mark>Kalian semua luar biasa!!!<mark class="keep">&lt;/marquee&gt;</mark>
&lt;br&gt;
&lt;!-- Textnya jika sudah mentok berbalik arah, kecepatannya 12 (default kecepatannya 6) --&gt;
<mark class="keep">&lt;marquee behavior="alternate" scrollamount="12"&gt;</mark>Kalian semua luar biasa!!!<mark class="keep">&lt;/marquee&gt;</mark></code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <div>
                <p class="m-0">Penjelasan: </p>
                <ul>
                  <li>Atribut <b><q>direction</q></b> berguna untuk <b>menentukan arah laju</b> (left/right/up/bottom).</li>
                  <li>Atribut <b><q>scrollamount</q></b> berguna untuk <b>mengatur kecepatan lajunya</b> (defaultnya 6).</li>
                  <li>Atribut <b><q>behavior</q></b> berguna untuk <b>mengatur jenis dari marquee</b> (scroll/slide/alternate).</li>
                </ul>
              </div>
              <p class="m-0">
                Berikut contoh sederhana cara menggunakan tag <code>&lt;marquee&gt;&lt;/marquee&gt;</code>, tentunya masih banyak lagi cara untuk memodifikasi dan mengatur kriteria marquee, tapi contoh di atas <b>sudah cukup untuk diimplementasikan atau digunakan oleh kalian</b>.
              </p>
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