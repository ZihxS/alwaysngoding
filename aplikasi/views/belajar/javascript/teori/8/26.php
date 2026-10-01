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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">JSON (JavaScript Object Notation)</h2>
            <hr>
            <div class="konten-teori">
              <p>JSON (JavaScript Object Notation) adalah sebuah format untuk menyimpan dan menukar informasi (untuk pertukaran dan penyimpanan data) yang dapat dibaca mudah oleh manusia. Filenya hanya memuat teks dan berekstensikan <code class="custom">.json</code>. Pada modul ini kalian akan mempelajari tentang JSON dan kegunaannya.</p>
              <p>JSON merupakan format yang menyimpan informasi terstruktur dan biasanya digunakan untuk mentransfer data  antara server dengan klien.</p>
              <p>File JSON lebih simpel sekaligus lebih ringan dan file ini merupakan alternatif dari XML (Extensive Markup Language) yang memiliki fungsi sama seperti JSON.</p>
              <p class="mb-0">Untuk membuat file <code class="custom">.json</code> dengan benar, kalian harus mengikuti syntax yang benar. Ada dua elemen inti dari objek JSON, yaitu key dan value:</p>
              <ul class="mb-2">
                <li>Key harus dalam bentuk string dan dibungkus atau diapit oleh kutip 2.</li>
                <li>Value adalah tipe data JSON yang valid. Berikut adalah jenis-jenis value yang bisa digunakan di JSON:</li>
                <ol>
                  <li>string</li>
                  <li>number</li>
                  <li>object</li>
                  <li>array</li>
                  <li>boolean</li>
                  <li>null</li>
                </ol>
              </ul>
              <p class="mb-0">JSON diawali dan diakhiri dengan kurung kurawal <code class="custom">{}</code>. Di dalam kurung kurawal tersebut dapat berisi dua atau lebih key/value dengan tanda koma yang memisahkan keduanya. Sedangkan tiap key diikuti oleh simbol titik dua untuk membedakannya dengan value. Berikut adalah contohnya:</p>
              <pre class="language-json line-numbers"><code>{
  "nama": "Saleh",
  "tempatTinggal": "Bogor"
}</code></pre>
              <p class="mb-0">Pada contoh di atas <q>nama</q> dan <q>tempatTinggal</q> adalah key, sedangkan <q>Saleh</q> dan <q>Bogor</q> adalah value.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>