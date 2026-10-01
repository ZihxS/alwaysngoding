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
        <div class="kotak-soal">
          <h4 class="judul-soal">Soal ke 2</h4>
          <hr>
          <p class="m-0">Lengkapi kode di bawah dengan ketentuan:</p>
          <ol class="mb-2">
            <li>Akan mengubah warna <b>text atau font menjadi hitam</b>, isi dengan kode warna <b>RGB</b>.</li>
            <li>Isi isian (valuenya) dengan <b>warna dalam bahasa inggris</b>.</li>
            <li>Isi dengan kode warna <b>RGBA</b>, alphanya atau opacity nya <b><q>1</q></b>.</li>
          </ol>
          <blockquote class="catatan-pelajaran mb-2">
            Referensi 1: <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Colors/Color_picker_tool" target="_blank">https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Colors/Color_picker_tool</a>
            <br>
            Referensi 2: <a href="https://www.hexcolortool.com/" target="_blank">https://www.hexcolortool.com/</a>
            <br>
            Referensi 3: <a href="http://www.menucool.com/rgba-color-picker" target="_blank">http://www.menucool.com/rgba-color-picker</a>
          </blockquote>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>main {
  <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('color'); ?>" autocomplete="off" required>: <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('rgb(0,0,0)'); ?>" autocomplete="off" required>;
}

.warna-oren {
  <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('color'); ?>" autocomplete="off" required>: <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('orange'); ?>" autocomplete="off" required>;
}

#warna-merah {
  <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('color'); ?>" autocomplete="off" required>: <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('rgba(255,0,0,1)'); ?>" autocomplete="off" required>;
}</code></pre>
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