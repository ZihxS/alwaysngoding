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
      <div class="container container-teori-css">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 9</h4>
          <hr>
          <div class="m-0">
            <ol class="m-0">
              <li>Buatlah <b>tabel</b> dengan nama <b><q>orang</q></b>.</li>
              <li>Kolom pertama adalah <b><q>nama_lengkap</q></b>:</li>
              <ol>
                <li>Pilih tipe data antara <b>CHAR</b> atau <b>VARCHAR</b> (pilih yang tepat dan sesuai).</li>
                <li>Batasi jumlah karakternya hanya sampai <b>100</b> karakter.</li>
                <li>Kolom <b>wajib diisi</b> (tidak boleh kosong).</li>
              </ol>
              <li>Kolom kedua adalah <b><q>nik</q></b>:</li>
              <ol>
                <li>Pilih tipe data antara <b>CHAR</b> atau <b>VARCHAR</b> (pilih yang tepat dan sesuai).</li>
                <li>Jumlah karakternya adalah <b>16 karakter</b> (sesuai dengan jumlah karakter nik).</li>
                <li>Kolom <b>wajib diisi</b> (tidak boleh kosong).</li>
              </ol>
              <li>Kolom ketiga adalah <b><q>cerita_hidup</q></b>:</li>
              <ol>
                <li>Pilih tipe data jenis text yang batas menampungnya bisa sampai <b>16.777.215</b> karakter.</li>
                <li>Batasi jumlah karakternya hanya sampai <b>10.000.000</b> karakter.</li>
                <li>Kolom <b>tidak wajib untuk diisi</b> (boleh kosong).</li>
              </ol>
              <li>Kolom keempat adalah <b><q>jumlah_tabungan</q></b>:</li>
              <ol>
                <li>Gunakan tipe data <b>fixed point</b>.</li>
                <li>Atur tipe data agar formatnya seperti ini: <b>9.999.999.999,999</b>.</li>
                <li>Kolom <b>wajib diisi</b> (tidak boleh kosong).</li>
              </ol>
              <li>Akhiri perintah atau query dengan titik koma 😁.</li>
            </ol>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code><input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('create'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('table'); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('orang'); ?>" autocomplete="off" required> <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('('); ?>" autocomplete="off" required>
  <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('nama_lengkap'); ?>" autocomplete="off" required> <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('varchar(100)'); ?>" autocomplete="off" required> <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('not'); ?>" autocomplete="off" required> <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('null'); ?>" autocomplete="off" required>,
  <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('nik'); ?>" autocomplete="off" required> <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('char(16)'); ?>" autocomplete="off" required> <input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('not'); ?>" autocomplete="off" required> <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('null'); ?>" autocomplete="off" required>,
  <input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('cerita_hidup'); ?>" autocomplete="off" required> <input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('mediumtext(10000000)'); ?>" autocomplete="off" required> <input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('null'); ?>" autocomplete="off" required>,
  <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('jumlah_tabungan'); ?>" autocomplete="off" required> <input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('decimal(12,3)'); ?>" autocomplete="off" required> <input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('not'); ?>" autocomplete="off" required> <input name="j_19" type="text" class="input-text-modifikasi" size="<?= strlen('null'); ?>" autocomplete="off" required>
<input name="j_20" type="text" class="input-text-modifikasi" size="<?= strlen(');'); ?>" autocomplete="off" required></code></pre>
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
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'mysql', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>