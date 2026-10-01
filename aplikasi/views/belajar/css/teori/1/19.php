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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-css/teori/berkenalan-dengan-css';
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
          <h4 class="judul-soal">Soal ke 15</h4>
          <hr>
          <div class="m-0">
            <ol class="m-0">
              <li>Buat selector untuk element <b><q>body</q></b>:</li>
              <ul>
                <li>Mempunyai <b>property background-color</b> dengan <b>value whitesmoke</b>.</li>
                <li>Mempunyai <b>property font-family</b> dengan <b>value arial</b>.</li>
              </ul>
              <li>Buat selector untuk element <b><q>p</q></b>:</li>
              <ul>
                <li>Mempunyai <b>property color</b> dengan <b>value blue</b>.</li>
                <li>Mempunyai <b>property font-size</b> dengan value <b>13px</b>.</li>
              </ul>
            </ol>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>// Jawaban untuk nomor 1
<input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('body'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('{'); ?>" autocomplete="off" required>
  <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('background-color'); ?>" autocomplete="off" required> <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen(':'); ?>" autocomplete="off" required> <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('whitesmoke'); ?>" autocomplete="off" required> <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen(';'); ?>" autocomplete="off" required>
  <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('font-family'); ?>" autocomplete="off" required> <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen(':'); ?>" autocomplete="off" required> <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('arial'); ?>" autocomplete="off" required> <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen(';'); ?>" autocomplete="off" required>
<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('}'); ?>" autocomplete="off" required>

// Jawaban untuk nomor 2
<input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('p'); ?>" autocomplete="off" required> <input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('{'); ?>" autocomplete="off" required>
  <input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('color'); ?>" autocomplete="off" required> <input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen(':'); ?>" autocomplete="off" required> <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('blue'); ?>" autocomplete="off" required> <input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen(';'); ?>" autocomplete="off" required>
  <input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('font-size'); ?>" autocomplete="off" required> <input name="j_19" type="text" class="input-text-modifikasi" size="<?= strlen(':'); ?>" autocomplete="off" required> <input name="j_20" type="text" class="input-text-modifikasi" size="<?= strlen('13px'); ?>" autocomplete="off" required> <input name="j_21" type="text" class="input-text-modifikasi" size="<?= strlen(';'); ?>" autocomplete="off" required>
<input name="j_22" type="text" class="input-text-modifikasi" size="<?= strlen('}'); ?>" autocomplete="off" required></code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_css',1) > $b): ?>
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