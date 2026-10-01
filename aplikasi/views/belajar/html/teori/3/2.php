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
  $u = 'belajar-html/teori/struktur-dasar-html';
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
            <h2 class="judul-teori">Atribut "lang" Pada Tag HTML</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Cara penulisan:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html <mark class="keep">lang="id"</mark>&gt;
  &lt;head&gt;
    &lt;title&gt;Judul&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p&gt;Isi&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p>
                Jadi fungsinya untuk <b>mendefinisikan dokumen HTML kita dimayoritaskan dengan bahasa apa</b>, nah di atas kita mendefinisikan bahwa kode HTML yang dibuat akan dimayoritaskan dengan <b>bahasa Indonesia</b>, isi atribut lang di atas adalah kode atau singkatan negara Indonesia yaitu <b><q>id</q></b>.
              </p>
              <p>
                Jika ingin mendefinisikan bahasa inggris ubah atau isi atribut lang nya dengan <b><q>en</q></b>. Atribut lang pada tag HTML ini juga berfungsi untuk mempermudah mesin pencarian menentukan negara kita, Jadi misalkan kalian mengisi atribut lang dengan <b><q>id</q></b> maka mesin pencarian akan lebih <b>memfokuskan kinerjanya ke negara Indonesia</b>, jadi orang Indonesia bisa sangat mudah menemukan website yang kalian buat di mesin pencarian.
              </p>
              <p class="m-0">
                Atribut ini juga berguna agar website kalian <b>bisa diterjemahkan kebahasa lain</b> oleh mesin pencarian/google.
              </p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>