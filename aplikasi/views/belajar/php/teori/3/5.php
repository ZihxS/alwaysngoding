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
  $u = 'belajar-php/teori/tipe-data-pada-php';
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
        <div class="kotak-soal-50">
          <h4 class="judul-soal">Soal ke 3</h4>
          <hr>
          <p class="mb-2">
            Rangkailah kode-kode di bawah agar menghasilkan output <b><q>hasilnya adalah: 15</q></b>:
          </p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <input id="arrRangkaian" type="hidden" name="arrRangkaian">
            <div class="konten-soal">
              <!-- 4 -> 8 -> 2 -> 7 -> 5 -> 1 -> 6 -> 3 -->
              <ol id="rangkaian" class="slip">
                <!-- 1 --> <li class="ns">&nbsp;&nbsp;$nilai_5 = $nilai_3;</li> <!-- 6 -->
                <!-- 2 --> <li class="ns">&nbsp;&nbsp;$nilai_2 = 15;</li> <!-- 3 -->
                <!-- 3 --> <li class="ns">?&gt;</li> <!-- 8 -->
                <!-- 4 --> <li class="ns">&lt;?php</li> <!-- 1 -->
                <!-- 5 --> <li class="ns">&nbsp;&nbsp;$nilai_3 = $nilai_4 / $nilai_1;</li> <!-- 5 -->
                <!-- 6 --> <li class="ns">&nbsp;&nbsp;echo "hasilnya adalah: $nilai_5";</li> <!-- 7 -->
                <!-- 7 --> <li class="ns">&nbsp;&nbsp;$nilai_4 = $nilai_2 * $nilai_1;</li> <!-- 4 -->
                <!-- 8 --> <li class="ns">&nbsp;&nbsp;$nilai_1 = 2;</li> <!-- 2 -->
              </ol>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
       <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',3) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => FALSE], FALSE); ?>
    <script>let arrRangkaian = ["<?= sha1(1); ?>","<?= sha1(2); ?>","<?= sha1(3); ?>","<?= sha1(4); ?>","<?= sha1(5); ?>","<?= sha1(6); ?>","<?= sha1(7); ?>","<?= sha1(8); ?>"];</script>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'php', 'r' => TRUE, 'e' => FALSE], FALSE); ?>
  </body>
</html>