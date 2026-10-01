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
            <h2 class="judul-teori">Membuat Garis Antara Baris &amp; Kolom Tabel (Atribut Rules)</h2>
            <hr>
            <div class="konten-teori">
              <p>
                HTML menyediakan sebuah atribut yang dapat digunakan untuk mengontrol garis pembatas antara baris dan kolom, yakni atribut <strong><q>rules</q></strong>. Penulisan atribut <strong><q>rules</q></strong> di letakkan pada tag <b><q>table</q></b>.
              </p>
              <p class="mb-1">Ada empat nilai yang dapat diterapkan di atribut <b><q>rules</q></b> yaitu:</p>
              <table class="table table-striped table-bordered table-hover">
                <tr>
                  <td width="30%">Nilai (isi)</td>
                  <td>Fungsi</td>
                </tr>
                <tr>
                  <td>none</td>
                  <td>Tidak akan menampilkan garis apapun diantara sel</td>
                </tr>
                <tr>
                  <td>cols</td>
                  <td>Menampilkan garis pembatas hanya diantara kolom</td>
                </tr>
                <tr>
                  <td>rows</td>
                  <td>Menampilkan garis pembatas hanya diantara baris</td>
                </tr>
                <tr>
                  <td>all</td>
                  <td>Garis ditampilkan baik untuk kolom maupun untuk baris tabel</td>
                </tr>
                </table>
                <p class="m-0">Berikut adalah contoh dari kode HTML yang menggunakan atribut rules:</p>
                <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;Belajar atribut rules untuk tabel HTML&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h2&gt;Belajar atribut rules untuk tabel HTML - Always Ngoding&lt;/h2&gt;
        &lt;h3&gt;rules="none", border="2"&lt;/h3&gt;
        &lt;table <mark class="keep">rules="none"</mark> border="2"&gt;
            &lt;tr&gt;
                &lt;th&gt;Judul 1&lt;/th&gt;
                &lt;th&gt;Judul 2&lt;/th&gt;
                &lt;th&gt;Judul 3&lt;/th&gt;
                &lt;th&gt;Judul 4&lt;/th&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 4, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 4, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 4, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 4, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
        &lt;h3&gt;rules="cols"&lt;/h3&gt;
        &lt;table <mark class="keep">rules="cols"</mark>&gt;
            &lt;tr&gt;
                &lt;th&gt;Judul 1&lt;/th&gt;
                &lt;th&gt;Judul 2&lt;/th&gt;
                &lt;th&gt;Judul 3&lt;/th&gt;
                &lt;th&gt;Judul 4&lt;/th&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
        &lt;h3&gt;rules="rows"&lt;/h3&gt;
        &lt;table <mark class="keep">rules="rows"</mark>&gt;
            &lt;tr&gt;
                &lt;th&gt;Judul 1&lt;/th&gt;
                &lt;th&gt;Judul 2&lt;/th&gt;
                &lt;th&gt;Judul 3&lt;/th&gt;
                &lt;th&gt;Judul 4&lt;/th&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
        &lt;h3&gt;rules="all"&lt;/h3&gt;
        &lt;table <mark class="keep">rules="all"</mark>&gt;
            &lt;tr&gt;
                &lt;th&gt;Judul 1&lt;/th&gt;
                &lt;th&gt;Judul 2&lt;/th&gt;
                &lt;th&gt;Judul 3&lt;/th&gt;
                &lt;th&gt;Judul 4&lt;/th&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 1, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 2, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 3, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Baris 4, Kolom 1&lt;/td&gt;
                &lt;td&gt;Baris 4, Kolom 2&lt;/td&gt;
                &lt;td&gt;Baris 4, Kolom 3&lt;/td&gt;
                &lt;td&gt;Baris 4, Kolom 4&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>
                <div class="mb-0">
                    <a href="<?= site_url("belajar-html/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
                </div>
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