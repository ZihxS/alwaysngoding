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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $x = str_replace('Pbo','PBO',$x);
  $x = str_replace('Oop','(OOP)',$x);
  $u = 'belajar-php/teori/pbo-oop-pada-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 29</h4>
          <hr>
          <div class="m-0">
            Lengkapilah kode dengan tepat dan benar sesuai dengan ketentuan yang ada di bawah ini:
            <ul class="m-0">
              <li>Buatlah property static bernama <b><q>harga</q></b> dengan hak akses <b><q>public</q></b>.</li>
              <li>Buatlah method static bernama <b><q>beli</q></b> dengan hak akses <b><q>public</q></b>.</li>
              <li>Set property <b><q>harga</q></b> menjadi 98.535.515 (tipe integer).</li>
              <li>Panggil method <b><q>beli</q></b>.</li>
              <li>Ambil isi property <b><q>harga</q></b>.</li>
            </ul>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;?php
class mobil {
   <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('public'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('static'); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('$harga'); ?>" autocomplete="off" required>;
   <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('public'); ?>" autocomplete="off" required> <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('static'); ?>" autocomplete="off" required> <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('function'); ?>" autocomplete="off" required> <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('beli()'); ?>" autocomplete="off" required> {
     return "Saya membeli mobil baru";
   }
}
<input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('mobil::$harga'); ?>" autocomplete="off" required> = <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('98535515'); ?>" autocomplete="off" required>; // set property
echo <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('mobil::beli()'); ?>" autocomplete="off" required>; // panggil method
echo "&lt;br&gt;";
echo "harga mobilnya adalah Rp"<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('.mobil::$harga'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',6) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'php', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>