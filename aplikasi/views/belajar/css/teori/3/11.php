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
  $x = ucwords(str_replace('-',' ',$m)).' #'.$b;
  $u = 'belajar-css/teori/bekerja-dengan-text';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 6</h4>
          <hr>
          <p class="m-0">Lengkapi kode di bawah dengan ketentuan:</p>
          <ol class="m-0">
            <li>Buat selector <b>class</b> dengan nama <b>font-mantap</b>.</li>
            <li>Buat property <b>font-family</b> pada selector tersebut yang isinya <b>arial narrow, cursive dan sans-serif</b>.</li>
            <li>Definisikan class <b>font-mantap</b> pada element <b>span</b>.</li>
          </ol>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('<style>'); ?>" autocomplete="off" required>
      <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('.font-mantap'); ?>" autocomplete="off" required> {
        <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('font-family'); ?>" autocomplete="off" required>: <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen("'arial narrow',cursive,sans-serif"); ?>" autocomplete="off" required>;
      }
    <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('</style>'); ?>" autocomplete="off" required>
  &lt;/head&gt;
  &lt;body&gt;
    <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('<span class="font-mantap">'); ?>" autocomplete="off" required>Belajar CSS di Always Ngoding sangat menyenangkan 😄<input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('</span>'); ?>" autocomplete="off" required>
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_css',3) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'css', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>