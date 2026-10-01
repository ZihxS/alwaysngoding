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
  $x = str_replace('Session','Session,',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/kelola-session-cookie-dan-files';
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
          <h4 class="judul-soal">Soal ke 12</h4>
          <hr>
          <div class="m-0">
            Lengkapilah kode di bawah dengan mengikuti intruksi dari komentar yang ada:
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;?php
<input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('$file'); ?>" autocomplete="off" required> = 'kendaraan.txt';

// cek ketersediaan file
if (<input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('file_exists'); ?>" autocomplete="off" required>($file))
{
  // open file dengan mode write only
  $kendaraan = <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('fopen'); ?>" autocomplete="off" required>($file, '<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('w'); ?>" autocomplete="off" required>');
  $konten = "Mobil\nMotor\nKereta\nPesawat";

  // input isi konten dari variabel $konten ke file yang telah kita buka
  <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('fwrite'); ?>" autocomplete="off" required>(<input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('$kendaraan'); ?>" autocomplete="off" required>, <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('$konten'); ?>" autocomplete="off" required>);

  // tutup file yang sudah digunakan
  <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('fclose'); ?>" autocomplete="off" required>(<input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('$kendaraan'); ?>" autocomplete="off" required>);

  // copy file 'kendaraan.txt' dan paste menjadi 'kendaraan-baru.txt'
  <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('copy'); ?>" autocomplete="off" required>('<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('kendaraan.txt'); ?>" autocomplete="off" required>', '<input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('kendaraan-baru.txt'); ?>" autocomplete="off" required>');

  // ganti nama file 'kendaraan-baru.txt' menjadi 'kendaraan-baru-banget.txt'
  <input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('rename'); ?>" autocomplete="off" required>('<input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('kendaraan-baru.txt'); ?>" autocomplete="off" required>', '<input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('kendaraan-baru-banget.txt'); ?>" autocomplete="off" required>');

  // hapus file yang sudah diganti namanya
  <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('unlink'); ?>" autocomplete="off" required>('<input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('kendaraan-baru-banget.txt'); ?>" autocomplete="off" required>');
}
?&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',7) > $b): ?>
            <?php $this->load->view('belajar/markas/teori/tombol-selesai-soal', ['bahasa' => 'php'], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/selesai-dari-soal', ['bahasa' => 'php', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>