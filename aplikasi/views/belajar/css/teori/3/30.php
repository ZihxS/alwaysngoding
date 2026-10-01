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

  $this->load->library('user_agent');

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
        <?php if ($this->agent->is_mobile()): ?>
          <div class="alert alert-info" role="alert">
            Untuk bagian (halaman) ini, kami menyarankan kalian untuk membuka pada PC atau laptop agar lebih mudah mengerjakan soal nya.
          </div>
        <?php endif; ?>
        <div class="kotak-soal">
          <h4 class="judul-soal">Soal ke 15 (Kesimpulan)</h4>
          <hr>
          <p class="m-0">Lengkapi kode di bawah dengan ketentuan:</p>
          <ol class="m-0">
            <li>Buat <b>selector</b> untuk <b>element section</b> yang <b>berada di dalam element main</b> (gunakan <b><q>></q></b>).</li>
            <ol>
              <li>Deklarasikan property yang berguna untuk <b>mengubah warna text atau font menjadi warna hitam</b> (dalam kode warna HEX).</li>
              <li>Deklarasikan property yang berguna untuk <b>mengubah text menjadi cetak miring</b>.</li>
              <li>Deklarasikan property yang berguna untuk <b>mengubah text menjadi cetak tebal</b>.</li>
              <li>Deklarasikan property yang berguna untuk <b>membuat garis bawah pada text dengan warna merah</b>.</li>
              <li>Deklarasikan property yang berguna untuk <b>membuat text menjadi rata kanan dan rata kiri</b>.</li>
            </ol>
            <li>Buat <b>selector</b> untuk <b>element footer</b>.</li>
            <ol>
              <li>Deklarasikan property yang berguna untuk <b>mengubah ukuran text menjadi 20 pixel</b>.</li>
              <li>Deklarasikan property yang berguna untuk <b>mengubah jarak antar karakter dengan nilai 10 pixel</b>.</li>
              <li>Deklarasikan property yang berguna untuk <b>mengubah gaya font menjadi cursive</b>.</li>
              <li>Deklarasikan property yang berguna untuk <b>membuat text menjadi berada di tengah</b>.</li>
              <li>Deklarasikan property yang berguna untuk <b>mengubah semua karakter menjadi kapital (huruf besar)</b>.</li>
            </ol>
          </ol>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code><input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('main > section'); ?>" autocomplete="off" required> {
  <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('color'); ?>" autocomplete="off" required>: <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('#000000'); ?>" autocomplete="off" required>;
  <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('font-style'); ?>" autocomplete="off" required>: <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('italic'); ?>" autocomplete="off" required>;
  <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('font-weight'); ?>" autocomplete="off" required>: <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('bold'); ?>" autocomplete="off" required>;
  <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('text-decoration'); ?>" autocomplete="off" required>: <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('underline'); ?>" autocomplete="off" required> <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('red'); ?>" autocomplete="off" required>;
  <input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('text-align'); ?>" autocomplete="off" required>: <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('justify'); ?>" autocomplete="off" required>;
}
<input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('footer'); ?>" autocomplete="off" required> {
  <input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('font-size'); ?>" autocomplete="off" required>: <input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('20px'); ?>" autocomplete="off" required>;
  <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('letter-spacing'); ?>" autocomplete="off" required>: <input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
  <input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('font-family'); ?>" autocomplete="off" required>: <input name="j_19" type="text" class="input-text-modifikasi" size="<?= strlen('cursive'); ?>" autocomplete="off" required>;
  <input name="j_20" type="text" class="input-text-modifikasi" size="<?= strlen('text-align'); ?>" autocomplete="off" required>: <input name="j_21" type="text" class="input-text-modifikasi" size="<?= strlen('center'); ?>" autocomplete="off" required>;
  <input name="j_22" type="text" class="input-text-modifikasi" size="<?= strlen('text-transform'); ?>" autocomplete="off" required>: <input name="j_23" type="text" class="input-text-modifikasi" size="<?= strlen('uppercase'); ?>" autocomplete="off" required>;
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
            <?php $this->load->view('belajar/markas/teori/tombol-selesai-soal', ['bahasa' => 'css'], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/selesai-dari-soal', ['bahasa' => 'css', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>