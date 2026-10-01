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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-soal">
          <h4 class="judul-soal">Soal ke 22</h4>
          <hr>
          <div class="m-0">
            Lengkapi kode dengan tepat dan benar sesuai dengan ketentuan yang ada di bawah ini:
            <ul class="m-0">
              <li>Perulangan akan selalu berjalan apabila variabel <b><q>i</q></b> lebih kecil atau sama dengan <b><q>100</q></b>.</li>
              <li>Variabel <b><q>i</q></b> akan selalu ditambah dengan satu pada perulangan ini.</li>
              <li>Jika variabel <b><q>i</q></b> bernilai <b><q>13</q></b> atau bernilai <b><q>15</q></b>, maka perulangan tersebut akan di-skip. Dan melanjutkan ke perulangan selanjutnya.</li>
              <li>Jika variabel <b><q>i</q></b> bernilai <b><q>95</q></b> maka perulangan akan diberhentikan secara paksa.</li>
            </ul>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code><input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('for'); ?>" autocomplete="off" required> (var i = 1; i <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('<='); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen("100"); ?>" autocomplete="off" required>; <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('i++'); ?>" autocomplete="off" required>) {
  <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen("if"); ?>" autocomplete="off" required> (i == <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen("50"); ?>" autocomplete="off" required> <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen("||"); ?>" autocomplete="off" required> <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('i'); ?>" autocomplete="off" required> == 15) {
    <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen("continue;"); ?>" autocomplete="off" required>
  } <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen("else if"); ?>" autocomplete="off" required> (i == <input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen("90"); ?>" autocomplete="off" required>) {
    <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen("break;"); ?>" autocomplete="off" required>
  } <input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen("else"); ?>" autocomplete="off" required> {
    console.log('perulangan ke ' + i);
  }
}</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_js',6) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'javascript', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>