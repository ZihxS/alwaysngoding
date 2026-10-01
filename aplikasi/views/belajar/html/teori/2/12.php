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
  $m = $this->uri->segment(3); // Modul
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-html/teori/tag-atribut-dan-elemen-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 7</h4>
          <hr>
          <p class="m-0">
            Perhatikan kode berikut:
          </p>
          <pre class="language-html line-numbers"><code>&lt;div&gt;&lt;p&gt;Ngoding (coding) itu dimana saja, kapan saja, dengan siapa saja.&lt;/p&gt;&lt;/div&gt;

&lt;b&gt;Usaha dan doa tidak akan menghianati kita.&lt;/b&gt;

&lt;img src="folder-gambar/file-gambar.jpeg" width="400px" height="400px"&gt;

&lt;form action="proses.php" method="POST"&gt;
  &lt;label for="username"&gt;Username:&lt;/label&gt;
  &lt;br&gt;
  &lt;input type="text" name="username" id="username" required&gt;
  &lt;br&gt;
  &lt;input type="submit" name="submit" value="kirim"&gt;
&lt;/form&gt;
</code></pre>
          <p class="m-0">
            Element apa saja yang terdapat pada kode di atas?
          </p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <label class="kontainer">Element div, b, img dan form
                <input type="radio" name="j" value="<?= sha1(1); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">Element div, p, b, img, form, label dan input
                <input type="radio" name="j" value="<?= sha1(2); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">Element div, p, b, img, form dan label
                <input type="radio" name="j" value="<?= sha1(3); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <!-- benar -->
              <label class="kontainer">Element div, p, b, img, form, label, br dan input
                <input type="radio" name="j" value="<?= sha1(4); ?>">
                <span class="checkmark-radio"></span>
              </label>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_html',2) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'html', 'r' => FALSE, 'e' => FALSE], FALSE); ?>
  </body>
</html>