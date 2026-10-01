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
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-mysql/teori/tipe-data-pada-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'mysql', 'label' => 'Teori MySQL', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-mysql">
        <div class="kotak-soal-50">
          <h4 class="judul-soal">Soal ke 2</h4>
          <hr>
          <p class="mb-2">Rangkailah macam-macam tipe data integer mulai dari yang jangkauannya terbesar sampai terkecil:</p>
          <blockquote class="catatan-pelajaran mb-2">Klik atau tap dan tahan bagian yang ingin anda pindahkan, anda bisa memindahkannya ke bawah atau ke atas. Rangkailah sesuai perintah yang ada di atas.</blockquote>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <input id="arrRangkaian" type="hidden" name="arrRangkaian">
            <div class="konten-soal">
              <!-- 3 -> 5 -> 1 -> 4 -> 2 -->
              <ol id="rangkaian" class="slip">
                <li class="ns">MEDIUMINT</li>
                <li class="ns">TINYINT</li>
                <li class="ns">BIGINT</li>
                <li class="ns">SMALLINT</li>
                <li class="ns">INT</li>
              </ol>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_mysql',3) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => FALSE], FALSE); ?>
    <script>let arrRangkaian = ["<?= sha1(1); ?>","<?= sha1(2); ?>","<?= sha1(3); ?>","<?= sha1(4); ?>","<?= sha1(5); ?>"];</script>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'mysql', 'r' => TRUE, 'e' => FALSE], FALSE); ?>
  </body>
</html>