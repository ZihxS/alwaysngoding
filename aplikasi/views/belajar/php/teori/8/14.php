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
  $u = 'belajar-php/teori/lebih-banyak-tentang-php';
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
        <div class="kotak-soal">
          <h4 class="judul-soal">Soal ke 7</h4>
          <hr>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="m-0">
              Gunakan fungsi untuk menghitung jumlah <b><q>$buah</q></b>:
            </div>
            <div class="konten-soal" style="margin-top: 8px; margin-bottom: 8px;">
              <pre class="soal"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian', 'semangka', 'jeruk', 'belimbing', 'buah naga'];
  echo <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('count($buah)'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <div class="m-0">
              Gunakan fungsi untuk menambah array <b><q>$buah</q></b>. Tambahkan buah <b><q>salak</q></b> ke array <b><q>$buah</q></b>:
            </div>
            <div class="konten-soal" style="margin-top: 8px; margin-bottom: 8px;">
              <pre class="soal"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian', 'semangka', 'jeruk', 'belimbing', 'buah naga'];
  <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('array_push($buah, \'salak\')'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <div class="m-0">
              Hilangkan data buah terakhir pada array <b><q>$buah</q></b>:
            </div>
            <div class="konten-soal" style="margin-top: 8px; margin-bottom: 8px;">
              <pre class="soal"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian', 'semangka', 'jeruk', 'belimbing', 'buah naga'];
  <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('array_pop($buah)'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <div class="m-0">
              Cetak angka terbesar yang ada di array <b><q>$angka</q></b>:
            </div>
            <div class="konten-soal" style="margin-top: 8px; margin-bottom: 8px;">
              <pre class="soal"><code>&lt;?php
  $angka = [5, 50, 15, 25, 55, 100, 35, 45, 30, 40];
  echo <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('max($angka)'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <div class="m-0">
              Cetak angka terkecil yang ada di array <b><q>$angka</q></b>:
            </div>
            <div class="konten-soal" style="margin-top: 8px; margin-bottom: 8px;">
              <pre class="soal"><code>&lt;?php
  $angka = [5, 50, 15, 25, 55, 100, 35, 45, 30, 40];
  echo <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('min($angka)'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <div class="m-0">
              Data <b><q>$buah</q></b> adalah gabungan dari data <b><q>$buah_satu</q></b> dan <b><q>$buah_dua</q></b>:
            </div>
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;?php
  $buah_satu = ['apel', 'anggur', 'pisang', 'rambutan', 'durian'];
  $buah_dua = ['jeruk', 'kurma', 'nanas'];
  $buah = <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('array_merge($buah_satu, $buah_dua)'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',8) > $b): ?>
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