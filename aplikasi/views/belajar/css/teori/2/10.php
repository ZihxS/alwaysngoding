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
  $x = str_replace('Html','HTML',str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3))))).' #'.$b;
  $u = 'belajar-css/teori/perpaduan-css-dengan-html';
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
            <h2 class="judul-teori">CSS Class Selector</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">
                CSS class selector berguna sebagai selector (penanda/pemilih) untuk isi pada atribut class. Penulisannya diawali dengan tanda <b><q>.</q></b> lalu dilanjutkan dengan class apa yang ingin kita manipulasi dengan kode CSS. Contohnya <b><q>.warna-merah</q></b> berfungsi untuk memanipulasi semua element yang mempunyai atribut class yang isinya <b><q>warna-merah</q></b>. Agar lebih jelas dan mudah dimengerti, perhatikan kode di bawah ini:
              </p>
              <pre class="language-html line-numbers" data-line="8-10,13-15,19-21"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajas CSS class selector&lt;/title&gt;
  &lt;/head&gt;
  &lt;style&gt;
    .warna-merah {
      color: red;
    }
  &lt;/style&gt;
  &lt;body&gt;
    &lt;p class="warna-merah"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, corporis.
    &lt;/p&gt;
    &lt;p&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, autem.
    &lt;/p&gt;
    &lt;p class="warna-merah"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, impedit.
    &lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Element <b><q>p</q></b> yang ditandai di atas akan berubah warnanya menjadi merah (red). Karena sudah dimanipulasi oleh CSS <b>dengan bantuan CSS class selector</b>.</p>
              <blockquote class="catatan-pelajaran">
                CSS memerintahkan: ubahlah semua text pada element yang mempunyai <b>atribut <q>class</q></b>, yang <b>isi (value) nya <q>warna-merah</q></b> menjadi warna merah.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>