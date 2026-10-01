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
  $p = $b-1; // Selanjutnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/posisi-dan-layout-pada-css';
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
            <h2 class="judul-teori">Property Visibility Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Property visibility pada CSS berfungsi <b>untuk menyembunyikan dan menampilkan suatu elemen</b> di web browser (dari pandangan user).</p>
              <p class="m-0">Berikut adalah contoh penggunaan property visibility pada CSS:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      .terlihat {
        visibility: visible;
      }
      .tidak-terlihat {
        visibility: hidden;
      }
      .tidak-terlihat-untuk-tabel {
        visibility: collapse;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="terlihat"&gt;
      Kalimat ini akan terlihat di web browser.
    &lt;/p&gt;
    &lt;p class="tidak-terlihat"&gt;
      Kalimat ini tidak akan terlihat di web browser, tapi meninggalkan jejak berupa spasi atau jarak.
    &lt;/p&gt;
    &lt;table border="1" width="100%"&gt;
      &lt;tr&gt;
        &lt;th&gt;No&lt;/th&gt;
        &lt;th&gt;Nama&lt;/th&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;1&lt;/td&gt;
        &lt;td&gt;Muhammad Saleh Solahudin&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr class="tidak-terlihat-untuk-tabel"&gt; &lt;!-- Tidak akan ditampilkan dan tidak akan meninggalkan jejak --&gt;
        &lt;td&gt;2&lt;/td&gt;
        &lt;td&gt;Fathul Aditya&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;3&lt;/td&gt;
        &lt;td&gt;Elvine Bariel&lt;/td&gt;
      &lt;/tr&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">
                <b><q>visibility: hidden;</q></b> dan <b><q>display: none;</q></b> sama-sama menyembunyikan elemen, namun kalau <b><q>visibility: hidden;</q></b> meninggalkan jejak sedangkan <b><q>display: none;</q></b> tidak meninggalkan jejak.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>