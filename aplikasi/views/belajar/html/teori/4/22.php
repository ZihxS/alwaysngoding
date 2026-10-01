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
            <h2 class="judul-teori">Cara Membuat Grup Kolom (Tag Colgroup dan Tag Col)</h2>
            <hr>
            <div class="konten-teori">
              <p>
                HTML memiliki tag <code>&lt;colgroup&gt;&lt;/colgroup&gt;</code> dan tag <code>&lt;col&gt;</code> yang berfungsi untuk <b><q>mengaitkan</q></b> keseluruhan kolom.
              </p>
              <p class="m-0">Cara penulisan tag <b><q>colgroup</q></b> dan tag <b><q>col</q></b>:</p>
              <pre class="language-html line-numbers" data-line="10-15"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Tag colgroup dan col untuk Tabel HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h2&gt;Tag colgroup dan col untuk Tabel HTML - Always Ngoding&lt;/h2&gt;
    &lt;table border="1"&gt;
      &lt;colgroup&gt;
        &lt;col bgcolor="red"&gt;
        &lt;col bgcolor="yellow"&gt;
        &lt;col bgcolor="green"&gt;
        &lt;col bgcolor="blue"&gt;
      &lt;/colgroup&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;th&gt;Judul 1&lt;/th&gt;
        &lt;!-- Kuning --&gt;
        &lt;th&gt;Judul 2&lt;/th&gt;
        &lt;!-- Hijau --&gt;
        &lt;th&gt;Judul 3&lt;/th&gt;
        &lt;!-- Biru --&gt;
        &lt;th&gt;Judul 4&lt;/th&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
        &lt;!-- Kuning --&gt;
        &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
        &lt;!-- Hijau --&gt;
        &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
        &lt;!-- Biru --&gt;
        &lt;td&gt;Baris 1, Kolom 4&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
        &lt;!-- Kuning --&gt;
        &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
        &lt;!-- Hijau --&gt;
        &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
        &lt;!-- Biru --&gt;
        &lt;td&gt;Baris 2, Kolom 4&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
        &lt;!-- Kuning --&gt;
        &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
        &lt;!-- Hijau --&gt;
        &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
        &lt;!-- Biru --&gt;
        &lt;td&gt;Baris 3, Kolom 4&lt;/td&gt;
      &lt;/tr&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>
                Di dalam kode HTML di atas, tag <code>&lt;colgroup&gt;&lt;/colgroup&gt;</code> dan tag <code>&lt;col&gt;</code> dibuat pada baris pertama sebelum tag <b><q>tr</q></b> pada tabel. Setiap tag <code>&lt;col&gt;</code> harus disesuaikan dengan jumlah kolom dari tabel.
              </p>
              <p class="m-0">Penjelasan:</p>
              <ul class="m-0">
                <li>Pada tag <code>&lt;col&gt;</code> ada atribut <strong>bgcolor</strong> yang berguna untuk membuat background menjadi berwarna.</li>
                <li>Pada tag <code>&lt;col&gt;</code> pertama, atibut <strong>bgcolor</strong> bernilai <b>red</b> (merah), maka semua kolom pertama backgroundnya akan menjadi berwarna <b>merah</b>.</li>
                <li>Pada tag <code>&lt;col&gt;</code> kedua, atibut <strong>bgcolor</strong> bernilai <b>yellow</b> (kuning), maka semua kolom kedua backgroundnya akan menjadi berwarna <b>kuning</b>.</li>
                <li>Pada tag <code>&lt;col&gt;</code> ketiga, atibut <strong>bgcolor</strong> bernilai <b>green</b> (hijau), maka semua kolom ketiga backgroundnya akan menjadi berwarna <b>hijau</b>.</li>
                <li>Pada tag <code>&lt;col&gt;</code> keempat, atibut <strong>bgcolor</strong> bernilai <b>blue</b> (biru), maka semua kolom keempat backgroundnya akan menjadi berwarna <b>biru</b>.</li>
              </ul>
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