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
            <h2 class="judul-teori">Mengatur Tinggi Baris Pada Tabel</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Untuk mengatur tinggi baris pada tabel, kalian harus menggunakan atribut <strong><q>height</q></strong> pada tag <code>&lt;tr&gt;&lt;/tr&gt;</code>.
              </p>
              <p class="m-0">Contoh kode:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Mengatur tinggi baris pada tabel&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Mengatur tinggi baris pada tabel - Always Ngoding&lt;/h1&gt;
    &lt;table border="1"&gt;
      &lt;tr <mark class="keep">height="50"</mark>&gt;
        &lt;td&gt;Nama&lt;/td&gt;
        &lt;td&gt;Kelas&lt;/td&gt;
        &lt;td&gt;Jurusan&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr <mark class="keep">height="40"</mark>&gt;
        &lt;td&gt;Karmila Sriwulan&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr <mark class="keep">height="30"</mark>&gt;
        &lt;td&gt;Muhammad Salehs Solahudin&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr <mark class="keep">height="100"</mark>&gt;
        &lt;td&gt;Zahwarudin Khalik&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;PT3RTV&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr <mark class="keep">height="85"</mark>&gt;
        &lt;td&gt;Riki Januar&lt;/td&gt;
        &lt;td&gt;XI&lt;/td&gt;
        &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
      &lt;/tr&gt;
      &lt;!-- Default --&gt;
      &lt;tr&gt;
        &lt;td&gt;Fauzan Azima&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;Teknik Komputer dan Jaringan&lt;/td&gt;
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