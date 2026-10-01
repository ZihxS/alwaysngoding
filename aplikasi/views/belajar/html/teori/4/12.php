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
  $u = 'belajar-html/teori/membuat-tabel-pada-html';
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
            <h2 class="judul-teori">Tag Penjelas</h2>
            <hr>
            <div class="konten-teori">
              Sekarang kalian akan berkenalan dengan 3 tag pendukung dalam pembuatan tabel yang berguna untuk memperjelas posisi atau kegunaannya, berikut adalah tag-tag nya:
              <ul>
                <li><code class="custom">&lt;thead&gt;&lt;/thead&gt;</code> (mendefinisikan kepala tabel)</li>
                <li><code class="custom">&lt;tbody&gt;&lt;/tbody&gt;</code> (mendefinisikan badan tabel)</li>
                <li><code class="custom">&lt;tfoot&gt;&lt;/tfoot&gt;</code> (mendefinisikan kaki tabel)</li>
              </ul>
              <p class="m-0">Berikut cara kegunaannya:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar Membuat Tabel Pada HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;table border="1" width="100%"&gt;
      &lt;thead&gt;
        &lt;tr&gt;
          &lt;th&gt;Nama&lt;/th&gt;
          &lt;th&gt;Kelas&lt;/th&gt;
          &lt;th&gt;Jurusan&lt;/th&gt;
          &lt;th&gt;Jenis Kelamin&lt;/th&gt;
        &lt;/tr&gt;
      &lt;/thead&gt;
      &lt;tbody&gt;
        &lt;tr&gt;
          &lt;td&gt;Angga Nur Fadilah&lt;/td&gt;
          &lt;td&gt;XII&lt;/td&gt;
          &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
          &lt;td&gt;Laki-laki&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Angga Pramudia&lt;/td&gt;
          &lt;td&gt;XII&lt;/td&gt;
          &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
          &lt;td&gt;Laki-laki&lt;/td&gt;
        &lt;/tr&gt;
      &lt;/tbody&gt;
      &lt;tfoot&gt;
        &lt;tr&gt;
          &lt;th&gt;Nama&lt;/th&gt;
          &lt;th&gt;Kelas&lt;/th&gt;
          &lt;th&gt;Jurusan&lt;/th&gt;
          &lt;th&gt;Jenis Kelamin&lt;/th&gt;
        &lt;/tr&gt;
      &lt;/tfoot&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>
                Sebenarnya tidak ada perbedaannya. Tag <code>&lt;thead&gt;&lt;/thead&gt;</code>, <code>&lt;tbody&gt;&lt;/tbody&gt;</code>, <code>&lt;tfoot&gt;&lt;/tfoot&gt;</code> hanya sebagai penanda saja (yang mana bagian header tabelnya, bagian body tabelnya dan bagian footer tabelnya).
              </p>
              <blockquote class="catatan-pelajaran">Tag <code class="custom">&lt;thead&gt;&lt;/thead&gt;</code>, <code class="custom">&lt;tbody&gt;&lt;/tbody&gt;</code>, <code class="custom">&lt;tfoot&gt;&lt;/tfoot&gt;</code> akan lebih berguna saat HTML di gabung dengan CSS dan JavaScript.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>