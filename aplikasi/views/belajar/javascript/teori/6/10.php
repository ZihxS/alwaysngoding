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
  $u = 'belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
          <h4 class="judul-soal">Soal ke 7</h4>
          <hr>
          <p class="m-0">Apa output yang akan dihasilkan dari kode di bawah ini:</p>
          <pre class="language-javascript line-numbers"><code>var username = 'administrator';
var password = 'admin12345';
var pengalaman = 750;
var jenisKelamin = 'Laki-laki';
var diblokir = FALSE;

if (username == 'administrator' && password == 'admin12345') {
  if (diblokir) {
    console.log("login gagal, akun terblokir");
  } else {
    if (pengalaman >= 0 && pengalaman <= 500) {
      if (jenisKelamin == 'Perempuan') {
        console.log("anda login sebagai karyawati dengan pengalaman yang masih sedikit");
      } else {
        console.log("anda login sebagai karyawan dengan pengalaman yang masih sedikit");
      }
    } else if (pengalaman > 500 && pengalaman <= 1000) {
      if (jenisKelamin == 'Perempuan') {
        console.log("anda login sebagai karyawati dengan pengalaman yang sudah lumayan");
      } else {
        console.log("anda login sebagai karyawan dengan pengalaman yang sudah lumayan");
      }
    } else if (pengalaman > 1000) {
      if (jenisKelamin == 'Perempuan') {
        console.log("anda login sebagai karyawati berpengalaman");
      } else {
        console.log("anda login sebagai karyawan berpengalaman");
      }
    } else {
      console.log("login gagal, pengalaman tidak valid");
    }
  }
} else {
  console.log("login gagal, username atau password salah");
}</code></pre>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <label class="kontainer">login gagal, akun terblokir
                <input type="radio" name="j" value="<?= sha1(1); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">anda login sebagai karyawati dengan pengalaman yang masih sedikit
                <input type="radio" name="j" value="<?= sha1(2); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">anda login sebagai karyawan dengan pengalaman yang masih sedikit
                <input type="radio" name="j" value="<?= sha1(3); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">anda login sebagai karyawati dengan pengalaman yang sudah lumayan
                <input type="radio" name="j" value="<?= sha1(4); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <!-- Benar -->
              <label class="kontainer">anda login sebagai karyawan dengan pengalaman yang sudah lumayan
                <input type="radio" name="j" value="<?= sha1(5); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">anda login sebagai karyawati berpengalaman
                <input type="radio" name="j" value="<?= sha1(6); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">anda login sebagai karyawan berpengalaman
                <input type="radio" name="j" value="<?= sha1(7); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">login gagal, pengalaman tidak valid
                <input type="radio" name="j" value="<?= sha1(8); ?>">
                <span class="checkmark-radio"></span>
              </label>
              <label class="kontainer">login gagal, username atau password salah
                <input type="radio" name="j" value="<?= sha1(9); ?>">
                <span class="checkmark-radio"></span>
              </label>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_js',6) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'javascript', 'r' => FALSE, 'e' => FALSE], FALSE); ?>
  </body>
</html>