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
            <h2 class="judul-teori">External CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Metode external CSS yaitu <b>membuat kode CSS terpisah dengan berkas khusus berekstensi .css</b>, lalu akan di relasikan atau di padukan dengan berkas HTML <b>menggunakan bantuan tag link</b>.
              </p>
              <p class="m-0">Berkas/file style.css:</p>
              <pre class="language-css line-numbers"><code>body {
  background-color: aqua;
  color: red;
  font-family: courier;
}
h1 {
  font-weight: bold;
  text-decoration: underline;
}</code></pre>
              <p class="m-0">Berkas/file index.html:</p>
              <pre class="language-html line-numbers" data-line="6"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;link rel="stylesheet" href="style.css"&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Hallo <?= $this->session->ang_nama_pengguna; ?>, semangat terusyaa belajar kodingnya di Always Ngoding&lt;/h1&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p>
                Penjelasan: Jadi 2 file di atas itu saling berhubungan, <b>disebut dengan metode external CSS karena CSS nya dari luar yang di import menggunakan bantuan tag link</b> (lihat baris ke 6 di file index.html).
              </p>
              <p class="m-0">
                Kenapa pada umumnya orang-orang menggunakan metode External CSS? Coba saja bayangkan jika file-file HTML kalian banyak dan membutuhkan gaya (style) yang sama pada setiap halaman (file) nya. Kalo kalian menggunakan internal CSS maka harus copas semua kode CSS nya satu per satu ke semua filenya kan?, pasti akan capek dan juga boros kode. Jadi jika menggunakan External CSS <b>kalian cukup membuat 1 file</b> khusus CSS nya dan tinggal kalian buat atau copas 1 baris saja (lihat baris ke 6 di file index.html). Simple kan 😉
              </p>
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