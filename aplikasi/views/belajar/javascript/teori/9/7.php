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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-javascript';
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
      <div class="container container-teori">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 5</h4>
          <hr>
          <div class="m-0">Lengkapi kode di bawah dengan mengikuti perintah-perintah pada komentar yang ada:</div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>let <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('tanggalDanWaktu'); ?>" autocomplete="off" required> = <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('new'); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('Date()'); ?>" autocomplete="off" required>; // ambil tanggal dan waktu sekarang

let detik = tanggalDanWaktu.getSeconds(); // mengambil detik dari variabel tanggalDanWaktu
let menit = <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('tanggalDanWaktu.getMinutes()'); ?>" autocomplete="off" required>; // ambil menit dari variabel tanggalDanWaktu
let jam = <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('tanggalDanWaktu.getHours()'); ?>" autocomplete="off" required>; // ambil jam dari variabel tanggalDanWaktu
let tanggal = <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('tanggalDanWaktu.getDate()'); ?>" autocomplete="off" required>; // ambil tanggal dari variabel tanggalDanWaktu
let bulan = <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('tanggalDanWaktu.getMonth()'); ?>" autocomplete="off" required>; // ambil bulan dari variabel tanggalDanWaktu
let tahun = <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('tanggalDanWaktu.getFullYear()'); ?>" autocomplete="off" required>; // ambil tahun dari variabel dateTime

console.log(<input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('tanggal'); ?>" autocomplete="off" required>); // cetak variabel tanggal disini
console.log(<input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('bulan'); ?>" autocomplete="off" required>); // cetak variabel bulan disini
console.log(<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('tahun'); ?>" autocomplete="off" required>); // cetak variabel tahun disini
console.log(<input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('jam'); ?>" autocomplete="off" required>); // cetak variabel jam disini
console.log(<input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('menit'); ?>" autocomplete="off" required>); // cetak variabel menit disini
console.log(<input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('detik'); ?>" autocomplete="off" required>); // cetak variabel detik disini</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_js',9) > $b): ?>
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