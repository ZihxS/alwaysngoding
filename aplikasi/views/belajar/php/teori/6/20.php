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
      <div class="container container-teori-php">
        <div class="kotak-soal-50">
          <h4 class="judul-soal">Soal ke 11</h4>
          <hr>
          <p class="mb-1">
            Rangkailah kode-kode di bawah agar menjadi kode yang sempurna:
          </p>
          <blockquote class="catatan-pelajaran mb-2">Pemanggilan property dilakukan setelah pemanggilan method.</blockquote>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <input id="arrRangkaian" type="hidden" name="arrRangkaian">
            <div class="konten-soal">
              <!-- 4 -> 6 -> 1 -> 7 -> 11 -> 2 -> 5 -> 8 -> 12 -> 13 -> 10 -> 3 -> 9 -->
              <ol id="rangkaian" class="slip">
                <!-- 1 --> <li class="ns">&nbsp;&nbsp;var $pemilik;</li> <!-- 3 -->
                <!-- 2 --> <li class="ns">&nbsp;&nbsp;} // untuk method</li> <!-- 6 -->
                <!-- 3 --> <li class="ns">echo $laptop->pemilik;</li> <!-- 12 -->
                <!-- 4 --> <li class="ns">&lt;?php</li> <!-- 1 -->
                <!-- 5 --> <li class="ns">} // untuk class</li> <!-- 7 -->
                <!-- 6 --> <li class="ns">class laptop {</li> <!-- 2 -->
                <!-- 7 --> <li class="ns">&nbsp;&nbsp;function hidupkan_laptop() {</li> <!-- 4 -->
                <!-- 8 --> <li class="ns">$laptop = new laptop();</li> <!-- 8 -->
                <!-- 9 --> <li class="ns">?&gt;</li> <!-- 13 -->
                <!-- 10 --> <li class="ns">echo "&lt;br&gt;";</li> <!-- 11 -->
                <!-- 11 --> <li class="ns">&nbsp;&nbsp;&nbsp;&nbsp;return "Laptop Dihidupkan";</li> <!-- 5 -->
                <!-- 12 --> <li class="ns">$laptop->pemilik = "Muhammad Saleh Solahudin";</li> <!-- 9 -->
                <!-- 13 --> <li class="ns">echo $laptop->hidupkan_laptop();</li> <!-- 10 -->
              </ol>
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
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => FALSE], FALSE); ?>
    <script>let arrRangkaian = ["<?= sha1(1); ?>","<?= sha1(2); ?>","<?= sha1(3); ?>","<?= sha1(4); ?>","<?= sha1(5); ?>","<?= sha1(6); ?>","<?= sha1(7); ?>","<?= sha1(8); ?>","<?= sha1(9); ?>","<?= sha1(10); ?>","<?= sha1(11); ?>","<?= sha1(12); ?>","<?= sha1(13); ?>"];</script>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'php', 'r' => TRUE, 'e' => FALSE], FALSE); ?>
  </body>
</html>