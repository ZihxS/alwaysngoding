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
            <h2 class="judul-teori">Menggabungkan Element Selector Dengan Class atau id Selector</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Perhatikan kode di bawah ini:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS selector&lt;/title&gt;
    &lt;style&gt;
      h1.modifikasi {
        color: red;
      }
      p.modifikasi {
        color: yellow;
      }
      h2#modifikasi {
        color: green;
      }
      div#modifikasi {
        color: blue;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1 class="modifikasi"&gt;Text ini berwarna merah&lt;/h1&gt;
    &lt;p class="modifikasi"&gt;Text ini berwana kuning&lt;/p&gt;
    &lt;h2 id="modifikasi"&gt;Text ini berwarna hijau&lt;/h2&gt;
    &lt;div id="modifikasi"&gt;Text ini berwarna biru&lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Kesimpulan:</p>
              <ul class="mb-2">
                <li>Walaupun <b>class <q>modifikasi</q> ada dua</b>, tetapi <b>warna textnya tidak sama</b> (yang satu merah, yang satu kuning).</li>
                <li>Walaupun <b>id <q>modifikasi</q> ada dua</b>, tetapi <b>warna textnya tidak sama</b> (yang satu hijau, yang satu biru).</li>
              </ul>
              <p class="mb-2">
                Kita mendefinisikan element beserta class atau id untuk dijadikan sebagai selector CSS.
              </p>
              <blockquote class="catatan-pelajaran mb-2">
                CSS memerintahkan: ubah semua warna text pada element <b><q>h1</q></b> yang mempunyai atribut <b><q>class</q></b> yang isinya <b><q>modifikasi</q></b> menjadi warna merah.<br>
                CSS memerintahkan: ubah semua warna text pada element <b><q>p</q></b> yang mempunyai atribut <b><q>class</q></b> yang isinya <b><q>modifikasi</q></b> menjadi warna kuning.<br>
                CSS memerintahkan: ubah semua warna text pada element <b><q>h2</q></b> yang mempunyai atribut <b><q>id</q></b> yang isinya <b><q>modifikasi</q></b> menjadi warna hijau.<br>
                CSS memerintahkan: ubah semua warna text pada element <b><q>div</q></b> yang mempunyai atribut <b><q>id</q></b> yang isinya <b><q>modifikasi</q></b> menjadi warna biru.
              </blockquote>
              <blockquote class="catatan-pelajaran">
                Bisa juga digabungkan dengan attribute selector.
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