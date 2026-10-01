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
            <h2 class="judul-teori">Memanfaatkan Atribut Align</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Kalian bisa memanfaatkan atribut <b><q>align</q></b> untuk mengatur posisi tabel dan posisi konten pada baris tabel atau posisi konten pada kolom tabel.
              </p>
              <p class="m-0">Perhatikan kode berikut:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Atribut align&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1 align="center"&gt;Atribut align - Always Ngoding&lt;/h1&gt;
    &lt;table border="1" width="75%" align="center"&gt;
      &lt;tr&gt;
        &lt;th&gt;Judul&lt;/th&gt;
        &lt;th&gt;Judul&lt;/th&gt;
        &lt;th&gt;Judul&lt;/th&gt;
        &lt;th&gt;Judul&lt;/th&gt;
      &lt;/tr&gt;
      &lt;tr align="center"&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr align="center"&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Di Tengah&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td align="center"&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Tidak Di Tengah&lt;/td&gt;
        &lt;td&gt;Tidak Di Tengah&lt;/td&gt;
        &lt;td align="center"&gt;Di Tengah&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Tidak Di Tengah&lt;/td&gt;
        &lt;td align="center"&gt;Di Tengah&lt;/td&gt;
        &lt;td align="center"&gt;Di Tengah&lt;/td&gt;
        &lt;td&gt;Tidak Di Tengah&lt;/td&gt;
      &lt;/tr&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Penjelasan:</p>
              <ul class="m-0">
                <li>Tag <code>&lt;h1&gt;&lt;/h1&gt;</code> berada di tengah karena kita menambahkan <code>align="center"</code> (lihat baris kode ke 8).</li>
                <li>Tabel pun kita ubah posisinya menjadi di tengah (lihat baris kode ke 9).</li>
                <li>Di baris ke 2 dan 3 pada tabel semua posisi textnya berada di tengah. Karena di bagian tag <code>&lt;tr&gt;&lt;/tr&gt;</code> ada <code>align="center"</code> (lihat baris ke 16 dan 22).</li>
                <li>Di baris ke 3 kolom ke 2 dan ke 3, baris ke 4 kolom ke 1 dan ke 4 posisi textnya tidak berada di tengah karena kita tidak menambahkan <code>align="center"</code> pada tag <code>&lt;td&gt;&lt;/td&gt;</code> nya (lihat baris kode ke 30, 31, 35, 38).</li>
                <li>Sedangkan di baris ke 3 kolom ke 1 dan ke 4, baris ke 4 kolom ke 2 dan ke 3 posisi textnya berada di tengah karena kita menambahkan <code>align="center"</code> pada tag <code>&lt;td&gt;&lt;/td&gt;</code> nya (lihat baris kode ke 29, 32, 36, 37).</li>
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