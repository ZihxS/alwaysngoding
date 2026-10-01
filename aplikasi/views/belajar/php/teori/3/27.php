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

  $this->load->library('user_agent');

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
      <div class="container container-teori-css">
        <?php if ($this->agent->is_mobile()): ?>
          <div class="alert alert-info" role="alert">
            Untuk bagian (halaman) ini, kami menyarankan anda untuk membuka pada PC atau laptop agar lebih mudah mengerjakan soal nya.
          </div>
        <?php endif; ?>
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 13</h4>
          <hr>
          <div>
            Sebuah perusahaan mempunyai 2 karyawan teladan, berikut adalah list karyawan teladan tersebut:
            <ol class="m-0 mb-2">
              <li>Muhammad Saleh Solahudin:</li>
              <ul>
                <li>Jenis Kelamin: Laki-laki</li>
                <li>Alamat: Bogor</li>
                <li>Posisi: Full Stack Developer</li>
                <li>Poin Karyawan: 1500</li>
              </ul>
              <li>Karmila Sriwulan:</li>
              <ul>
                <li>Jenis Kelamin: Perempuan</li>
                <li>Alamat: Bogor</li>
                <li>Posisi: Corporate Manager</li>
                <li>Poin Karyawan: 1455</li>
              </ul>
            </ol>
            <p class="mb-2">Konversikan 2 karyawan teladan tersebut kedalam array dengan variabel <b><q>$karyawan_teladan</q></b> (pastikan penulisan karakter besar kecilnya sesuai dan pastikan mengkonversikannya secara benar juga berurutan).</p>
            <blockquote class="catatan-pelajaran">Tambahan: gunakan short syntax array.</blockquote>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;?php
  <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('$karyawan_teladan'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('='); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('['); ?>" autocomplete="off" required>
    "<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('Muhammad Saleh Solahudin'); ?>" autocomplete="off" required>" <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('['); ?>" autocomplete="off" required>
      "<input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('Jenis Kelamin'); ?>" autocomplete="off" required>" <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> "<input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('Laki-laki'); ?>" autocomplete="off" required>"<input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen(','); ?>" autocomplete="off" required>
      "<input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('Alamat'); ?>" autocomplete="off" required>" <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> "<input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('Bogor'); ?>" autocomplete="off" required>"<input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen(','); ?>" autocomplete="off" required>
      "<input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('Posisi'); ?>" autocomplete="off" required>" <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> "<input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('Full Stack Developer'); ?>" autocomplete="off" required>"<input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen(','); ?>" autocomplete="off" required>
      "<input name="j_19" type="text" class="input-text-modifikasi" size="<?= strlen('Poin Karyawan'); ?>" autocomplete="off" required>" <input name="j_20" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> <input name="j_21" type="text" class="input-text-modifikasi" size="<?= strlen('1500'); ?>" autocomplete="off" required>
    <input name="j_22" type="text" class="input-text-modifikasi" size="<?= strlen(']'); ?>" autocomplete="off" required>,
    "<input name="j_23" type="text" class="input-text-modifikasi" size="<?= strlen('Karmila Sriwulan'); ?>" autocomplete="off" required>" <input name="j_24" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> <input name="j_25" type="text" class="input-text-modifikasi" size="<?= strlen('['); ?>" autocomplete="off" required>
      "<input name="j_26" type="text" class="input-text-modifikasi" size="<?= strlen('Jenis Kelamin'); ?>" autocomplete="off" required>" <input name="j_27" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> "<input name="j_28" type="text" class="input-text-modifikasi" size="<?= strlen('Perempuan'); ?>" autocomplete="off" required>"<input name="j_29" type="text" class="input-text-modifikasi" size="<?= strlen(','); ?>" autocomplete="off" required>
      "<input name="j_30" type="text" class="input-text-modifikasi" size="<?= strlen('Alamat'); ?>" autocomplete="off" required>" <input name="j_31" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> "<input name="j_32" type="text" class="input-text-modifikasi" size="<?= strlen('Bogor'); ?>" autocomplete="off" required>"<input name="j_33" type="text" class="input-text-modifikasi" size="<?= strlen(','); ?>" autocomplete="off" required>
      "<input name="j_34" type="text" class="input-text-modifikasi" size="<?= strlen('Posisi'); ?>" autocomplete="off" required>" <input name="j_35" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> "<input name="j_36" type="text" class="input-text-modifikasi" size="<?= strlen('Corporate Manager'); ?>" autocomplete="off" required>"<input name="j_37" type="text" class="input-text-modifikasi" size="<?= strlen(','); ?>" autocomplete="off" required>
      "<input name="j_38" type="text" class="input-text-modifikasi" size="<?= strlen('Poin Karyawan'); ?>" autocomplete="off" required>" <input name="j_39" type="text" class="input-text-modifikasi" size="<?= strlen('=>'); ?>" autocomplete="off" required> <input name="j_40" type="text" class="input-text-modifikasi" size="<?= strlen('1455'); ?>" autocomplete="off" required>
    <input name="j_41" type="text" class="input-text-modifikasi" size="<?= strlen(']'); ?>" autocomplete="off" required>
  <input name="j_42" type="text" class="input-text-modifikasi" size="<?= strlen(']'); ?>" autocomplete="off" required>;
?&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',3) > $b): ?>
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