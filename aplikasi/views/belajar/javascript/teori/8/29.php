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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript';
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
          <h4 class="judul-soal">Soal ke 18</h4>
          <hr>
          <div class="m-0">
            Sebuah perusahaan mempunyai 2 karyawan, berikut adalah list karyawan tersebut:
            <ol class="m-0 mb-2">
              <li>Saleh:</li>
              <ul>
                <li>Alamat: Bogor, Indonesia</li>
                <li>Jabatan: CEO dan Founder</li>
                <li>Hobi: Ngoding, Berenang, Membaca</li>
              </ul>
              <li>Karmila:</li>
              <ul>
                <li>Alamat: Jakarta, Indonesia</li>
                <li>Jabatan: Co-founder</li>
                <li>Hobi: Masak, Memanah</li>
              </ul>
            </ol>
            <p class="mb-0">Konversikan 2 karyawan tersebut ke JSON:</p>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code><input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('{'); ?>" autocomplete="off" required>
  "<input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('saleh'); ?>" autocomplete="off" required>": {
    <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('"alamat"'); ?>" autocomplete="off" required>: <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('"bogor, indonesia"'); ?>" autocomplete="off" required>,
    <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('"jabatan"'); ?>" autocomplete="off" required>: <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('"ceo dan founder"'); ?>" autocomplete="off" required>,
    <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('"hobi"'); ?>" autocomplete="off" required>: ["Ngoding", "Berenang", <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('"membaca"'); ?>" autocomplete="off" required>]
  },
  <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('"karmila"'); ?>" autocomplete="off" required>: <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('{'); ?>" autocomplete="off" required>
    <input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('"alamat"'); ?>" autocomplete="off" required>: <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('"jakarta, indonesia"'); ?>" autocomplete="off" required>,
    <input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('"jabatan"'); ?>" autocomplete="off" required>: <input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('"co-founder"'); ?>" autocomplete="off" required>,
    <input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('"hobi"'); ?>" autocomplete="off" required>: <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('["masak", "memanah"]'); ?>" autocomplete="off" required>
  <input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('}'); ?>" autocomplete="off" required>
<input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('}'); ?>" autocomplete="off" required></code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_js',8) > $b): ?>
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