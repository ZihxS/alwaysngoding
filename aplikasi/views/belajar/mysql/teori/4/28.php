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
  $x = str_replace('Create Read Update Delete Mysql','CRUD MySQL',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-mysql/teori/create-read-update-delete-mysql';
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
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 16</h4>
          <hr>
          <p class="mb-0">Ikuti perintah di bawah dan lakukan harus sesuai dengan urutan:</p>
          <ol class="mb-2">
            <li>Buatlah perintah untuk menambah data kedalam tabel <b><q>murid</q></b>.</li>
            <li>Definisikan kolom pertama yaitu kolom <b><q>tahun_angkatan</q></b> dan isinya adalah <b><q>2013</q></b>.</li>
            <li>Definisikan kolom kedua yaitu kolom <b><q>nama_lengkap</q></b> dan isinya adalah <b><q>Abdul Ghani</q></b>.</li>
            <li>Definisikan kolom ketiga yaitu kolom <b><q>jenis_kelamin</q></b> dan isinya adalah <b><q>Laki-laki</q></b>.</li>
            <li>Definisikan kolom keempat yaitu kolom <b><q>nisn</q></b> dan isinya adalah <b><q>1991008417</q></b>.</li>
            <li>Definisikan kolom kelima yaitu kolom <b><q>tanggal_lahir</q></b> dan isinya adalah <b><q>1999-02-25</q></b>.</li>
            <li>Definisikan kolom keenam yaitu kolom <b><q>kelas</q></b> dan isinya adalah <b><q>XII</q></b>.</li>
          </ol>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal">
              <pre class="soal"><code><input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('insert'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('into'); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('murid'); ?>" autocomplete="off" required> <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('('); ?>" autocomplete="off" required>
  <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('tahun_angkatan'); ?>" autocomplete="off" required>, <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('nama_lengkap'); ?>" autocomplete="off" required>, <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('jenis_kelamin'); ?>" autocomplete="off" required>, <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('nisn'); ?>" autocomplete="off" required>, <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('tanggal_lahir'); ?>" autocomplete="off" required>, <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('kelas'); ?>" autocomplete="off" required>
<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen(')'); ?>" autocomplete="off" required> <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('values'); ?>" autocomplete="off" required> <input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('('); ?>" autocomplete="off" required>
  '<input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('2013'); ?>" autocomplete="off" required>', '<input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('abdul ghani'); ?>" autocomplete="off" required>', '<input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('laki-laki'); ?>" autocomplete="off" required>', '<input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('1991008417'); ?>" autocomplete="off" required>', '<input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('1999-02-25'); ?>" autocomplete="off" required>', '<input name="j_19" type="text" class="input-text-modifikasi" size="<?= strlen('XII'); ?>" autocomplete="off" required>'
<input name="j_20" type="text" class="input-text-modifikasi" size="<?= strlen(')'); ?>" autocomplete="off" required>;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_mysql',4) > $b): ?>
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