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
  $x = ucwords(str_replace('-',' ',$this->uri->segment(3))).' #'.$b;
  $u = 'belajar-css/teori/bekerja-dengan-text';
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
            <h2 class="judul-teori">Property text-shadow Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sesuai dengan namanya, property text-shadow berguna <b>untuk memberi shadow (bayangan) pada text atau font</b>. Property ini sangat berguna agar text atau font kita bisa terlihat hidup.
              </p>
              <p class="m-0">Perhatikan contoh penggunaan property text-shadow di bawah ini:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      .bayangan-text-merah {
        text-shadow: 1px 1px 5px red;
      }
      .bayangan-text-biru {
        text-shadow: 3px 3px 5px blue;
      }
      .bayangan-text-hijau {
        text-shadow: 5px 5px 5px green;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="bayangan-text-merah"&gt;Text pada kalimat ini akan mempunyai bayangan berwarna merah.&lt;/div&gt;
    &lt;div class="bayangan-text-biru"&gt;Text pada kalimat ini akan mempunyai bayangan berwarna biru.&lt;/div&gt;
    &lt;div class="bayangan-text-hijau"&gt;Text pada kalimat ini akan mempunyai bayangan berwarna hijau.&lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <ul class="m-0">
                <li>Isi pertama dari property text-shadow akan <b>mempengaruhi bayangan horizontal text</b> (jika isinya positif maka bayangan akan ke kanan, kalau negatif ke kiri).</li>
                <li>Isi kedua dari property text-shadow akan <b>mempengaruhi bayangan vertical text</b> (jika isinya positif maka bayangan akan ke bawah, kalau negatif ke atas).</li>
                <li>Isi ketiga dari property text-shadow akan <b>mempengaruhi seberapa blurnya bayangan</b>.</li>
                <li>Isi keempat dari property text-shadow akan <b>mempengaruhi warna bayangannya</b>.</li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>