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
            <h2 class="judul-teori">Membuat Tabel Sederhana</h2>
            <hr>
            <div class="konten-teori">
              Untuk membuat tabel sederhana kalian hanya membutuhkan tag:
              <ul>
                <li><code>&lt;table&gt;&lt;/table&gt;</code></li>
                <li><code>&lt;tr&gt;&lt;/tr&gt;</code></li>
                <li><code>&lt;td&gt;&lt;/td&gt;</code></li>
              </ul>
              <p>
                Tag <code>&lt;table&gt;&lt;/table&gt;</code> berguna untuk mendefinisikan pembuatan tabel.
                <br>
                Tag <code>&lt;tr&gt;&lt;/tr&gt;</code> (table row) berguna untuk membuat baris pada tabel.
                <br>
                Tag <code>&lt;td&gt;&lt;/td&gt;</code> (table data) berguna untuk membuat kolom pada tabel.
              </p>
              <p class="m-0">Contoh kode HTML untuk membuat tabel sederhana:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Membuat tabel sederhana&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Membuat tabel sederhana - Always Ngoding&lt;/h1&gt;
    &lt;table border="1"&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 1 Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 1 Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 1 Kolom 3&lt;/td&gt;
        &lt;td&gt;Baris 1 Kolom 4&lt;/td&gt;
        &lt;td&gt;Baris 1 Kolom 5&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 2 Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 2 Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 2 Kolom 3&lt;/td&gt;
        &lt;td&gt;Baris 2 Kolom 4&lt;/td&gt;
        &lt;td&gt;Baris 2 Kolom 5&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 3 Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 3 Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 3 Kolom 3&lt;/td&gt;
        &lt;td&gt;Baris 3 Kolom 4&lt;/td&gt;
        &lt;td&gt;Baris 3 Kolom 5&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 4 Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 4 Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 4 Kolom 3&lt;/td&gt;
        &lt;td&gt;Baris 4 Kolom 4&lt;/td&gt;
        &lt;td&gt;Baris 4 Kolom 5&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 5 Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 5 Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 5 Kolom 3&lt;/td&gt;
        &lt;td&gt;Baris 5 Kolom 4&lt;/td&gt;
        &lt;td&gt;Baris 5 Kolom 5&lt;/td&gt;
      &lt;/tr&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">
                Pada kode di atas terdapat atribut <strong>border</strong> pada tag <code>&lt;table&gt;&lt;/table&gt;</code> yang berguna untuk membuat border pada table, disitu isinya 1 yang berarti sangat tipis, semakin besar angkanya juga semakin besar bordernya.
              </p>
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