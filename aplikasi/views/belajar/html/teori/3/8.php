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
  $u = 'belajar-html/teori/struktur-dasar-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
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
          <h4 class="judul-soal">Soal ke 4 (Kesimpulan)</h4>
          <hr>
          <p class="m-0">
            Lengkapi kode HTML5 di bawah ini dengan tepat dan benar:
          </p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;!DOCTYPE <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('html'); ?>" autocomplete="off" required>&gt;
&lt;<input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('html'); ?>" autocomplete="off" required> lang="id"&gt;
  &lt;<input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('head'); ?>" autocomplete="off" required>&gt;
    &lt;meta <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('charset=\'UTF-8\''); ?>" autocomplete="off" required>&gt;
    &lt;<input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('title'); ?>" autocomplete="off" required>&gt;Judul&lt;<input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('/title'); ?>" autocomplete="off" required>&gt;
  &lt;<input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('/head'); ?>" autocomplete="off" required>&gt;
  &lt;<input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('body'); ?>" autocomplete="off" required>&gt;
    &lt;<input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('header'); ?>" autocomplete="off" required>&gt;
      &lt;<input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('nav'); ?>" autocomplete="off" required>&gt;
        &lt;!-- Navigasi Website --&gt;
      &lt;<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('/nav'); ?>" autocomplete="off" required>&gt;
    &lt;<input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('/header'); ?>" autocomplete="off" required>&gt;
    &lt;<input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('main'); ?>" autocomplete="off" required>&gt;
      &lt;!-- Inti (konten) Website --&gt;
      &lt;<input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('section'); ?>" autocomplete="off" required>&gt;
        &lt;!-- Section 1 --&gt;
      &lt;<input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('/section'); ?>" autocomplete="off" required>&gt;
      &lt;<input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('section'); ?>" autocomplete="off" required>&gt;
        &lt;!-- Section 2 --&gt;
      &lt;<input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('/section'); ?>" autocomplete="off" required>&gt;
      &lt;<input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('section'); ?>" autocomplete="off" required>&gt;
        &lt;!-- Section 3 --&gt;
      &lt;<input name="j_19" type="text" class="input-text-modifikasi" size="<?= strlen('/section'); ?>" autocomplete="off" required>&gt;
    &lt;<input name="j_20" type="text" class="input-text-modifikasi" size="<?= strlen('/main'); ?>" autocomplete="off" required>&gt;
    &lt;<input name="j_21" type="text" class="input-text-modifikasi" size="<?= strlen('footer'); ?>" autocomplete="off" required>&gt;
      &lt;!-- Footer (kaki) Website --&gt;
    &lt;<input name="j_22" type="text" class="input-text-modifikasi" size="<?= strlen('/footer'); ?>" autocomplete="off" required>&gt;
  &lt;<input name="j_23" type="text" class="input-text-modifikasi" size="<?= strlen('/body'); ?>" autocomplete="off" required>&gt;
&lt;<input name="j_24" type="text" class="input-text-modifikasi" size="<?= strlen('/html'); ?>" autocomplete="off" required>&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_html',3) > $b): ?>
            <?php $this->load->view('belajar/markas/teori/tombol-selesai-soal', ['bahasa' => 'html'], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/selesai-dari-soal', ['bahasa' => 'html', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>