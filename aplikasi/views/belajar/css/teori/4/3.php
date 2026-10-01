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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/property-property-pada-css';
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
            <h2 class="judul-teori">Property Border-Radius Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Property border-radius berfungsi <b>untuk membuat sudut lengkung</b>, semakin tinggi nilai dari property border-radius maka semakin lengkung sudut elementnya.</p>
              <p class="m-0">Berikut adalah contoh penggunaan property border-radius:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      div {
        border: 2px solid black;
        border-radius: 10px;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div&gt;Setiap sudut pada element ini akan melengkung 10 pixel.&lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p><b>Kalian juga bisa lebih detail untuk membuat sudut lengkung</b>, kalian bisa menggunakan property <b>border-top-left-radius</b> untuk mengatur <b>sudut lengkung atas bagian kiri</b>, <b>border-top-right-radius</b> untuk mengatur <b>sudut lengkung atas bagian kanan</b>, <b>border-bottom-right-radius</b> untuk mengatur <b>sudut lengkung bawah bagian kanan</b>, <b>border-bottom-left-radius</b> untuk mengatur <b>sudut lengkung bawah bagian kiri</b>.</p>
              <p class="m-0">Berikut adalah contoh penggunaan border-top-left-radius, border-top-right-radius, border-bottom-right-radius, border-bottom-left-radius:</p>
              <pre class="language-css line-numbers"><code>div {
  border: 2px solid cyan;
  border-top-left-radius: 5px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 15px;
  border-bottom-left-radius: 50%;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Kode di atas berfungsi untuk:</p>
              <ol class="m-0">
                <li>Membuat border ketebalan 2 pixel bergaya <q>solid</q> berwarna cyan.</li>
                <li>Membuat sudut atas bagian kiri melengkung 5 pixel.</li>
                <li>Membuat sudut atas bagian kanan melengkung 10 pixel.</li>
                <li>Membuat bawah atas bagian kanan melengkung 15 pixel.</li>
                <li>Membuat bawah atas bagian kiri melengkung 50 persen.</li>
              </ol>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>