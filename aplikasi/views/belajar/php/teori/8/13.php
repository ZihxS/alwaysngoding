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
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 6</h4>
          <hr>
          <div class="m-0">
            Lengkapilah kode sesuai dengan intruksi yang dikomentari:
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;?php
  $kalimat = "Lorem Ipsum Dolor Sit Amet, consectetur adipisicing elit.";

  // ubah $kalimat menjadi huruf kecil semua
  echo <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('strtolower($kalimat);'); ?>" autocomplete="off" required>
  echo "&lt;hr&gt;";

  // ubah $kalimat menjadi huruf besar semua
  echo <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('strtoupper($kalimat);'); ?>" autocomplete="off" required>
  echo "&lt;hr&gt;";

  // ubah huruf pertama pada setiap kata di $kalimat menjadi kapital
  echo <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('ucwords($kalimat);'); ?>" autocomplete="off" required>
  echo "&lt;hr&gt;";

  // hitunglah jumlah karakter pada $kalimat
  echo <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('strlen($kalimat);'); ?>" autocomplete="off" required>
  echo "&lt;hr&gt;";

  // cetaklah hanya "Ipsum Dolor Sit Amet" dari $kalimat
  echo <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('substr'); ?>" autocomplete="off" required>(<input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('$kalimat'); ?>" autocomplete="off" required>, <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('6'); ?>" autocomplete="off" required>, <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('20'); ?>" autocomplete="off" required>);
  echo "&lt;hr&gt;";

  // ubahlah "Dolor" pada $kalimat menjadi "Dolar" (pastikan kapitalisasinya sesuai)
  echo <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('str_replace'); ?>" autocomplete="off" required>("<input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('Dolor'); ?>" autocomplete="off" required>", "<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('Dolar'); ?>" autocomplete="off" required>", <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('$kalimat'); ?>" autocomplete="off" required>);
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