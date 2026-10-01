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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-php/teori/function-pada-php';
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
      <div class="container container-teori-php">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 4</h4>
          <hr>
          <p class="m-0">
            Silahkan pilih semua pernyataan yang benar:
          </p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <label class="kontainer">Pada PHP, fungsi adalah sekumpulan intruksi yang dibungkus dalam sebuah blok.
                <input type="checkbox" name="j_1" value="<?= sha1(1); ?>">
                <span class="checkmark"></span>
              </label>
              <label class="kontainer">Kita dapat menggunakan fungsi yang dibuat oleh programmer lain.
                <input type="checkbox" name="j_2" value="<?= sha1(2); ?>">
                <span class="checkmark"></span>
              </label>
              <!-- ini kecuali -->
              <label class="kontainer">Menggunakan fungsi sering juga disebut dengan istilah 'mengembalikan nilai' (return a value).
                <input type="checkbox" name="j_3" value="<?= sha1(3); ?>">
                <span class="checkmark"></span>
              </label>
              <!-- ini kecuali -->
              <label class="kontainer">Mendefinisikan parameter wajib hukumnya untuk sebuah fungsi.
                <input type="checkbox" name="j_4" value="<?= sha1(4); ?>">
                <span class="checkmark"></span>
              </label>
              <!-- ini kecuali -->
              <label class="kontainer">Fungsi tidak bisa menggunakan parameter default.
                <input type="checkbox" name="j_5" value="<?= sha1(5); ?>">
                <span class="checkmark"></span>
              </label>
              <label class="kontainer">Dalam fungsi parameter bisa didefinisikan lebih dari 1.
                <input type="checkbox" name="j_6" value="<?= sha1(6); ?>">
                <span class="checkmark"></span>
              </label>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',5) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'php', 'r' => FALSE, 'e' => FALSE], FALSE); ?>
  </body>
</html>