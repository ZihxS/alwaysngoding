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
  $u = 'belajar-php/teori/function-pada-php';
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
          <h4 class="judul-soal">Soal ke 5</h4>
          <hr>
          <div>
            Lengkapi kode di bawah dengan ketentuan:
            <ul class="mb-1">
              <li>Buatlah fungsi dan beri nama fungsi tersebut <b><q>perkenalan_murid</q></b>.</li>
              <li>Fungsi tersebut mempunyai 4 parameter berurutan seperti di bawah ini:</li>
              <ol>
                <li>$nama_lengkap</li>
                <li>$alamat</li>
                <li>$jurusan</li>
                <li>$kelas</li>
              </ol>
              <li>$kelas adalah parameter default, dan defaultnya adalah <b><q>X</q></b>.</li>
              <li>Panggil fungsi <b><q>perkenalan_murid</q></b> dengan kriteria berikut:</li>
              <ol>
                <li>Nama lengkap: Muhammad Saleh Solahudin.</li>
                <li>Kelas: X (memanfaatkan parameter default).</li>
                <li>Jurusan: Rekayasa Perangkat Lunak.</li>
                <li>Alamat: Bogor.</li>
              </ol>
              <li>Panggil lagi fungsi <b><q>perkenalan_murid</q></b> dengan kriteria berikut:</li>
              <ol>
                <li>Nama lengkap: Karmila Sriwulan.</li>
                <li>Kelas: XII.</li>
                <li>Jurusan: Multimedia.</li>
                <li>Alamat: Jakarta.</li>
              </ol>
            </ul>
            <blockquote class="catatan-pelajaran">Semua string harus menggunakan double quoted, dan pastikan kapitalisasi setiap kriteria sama persis.</blockquote>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;?php
  <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('function'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('perkenalan_murid($nama_lengkap,$alamat,$jurusan,$kelas="X")'); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('{'); ?>" autocomplete="off" required>
    echo "&lt;p&gt;";
    echo "Halo, perkenalkan nama lengkap saya {<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('$nama_lengkap'); ?>" autocomplete="off" required>}..&lt;br&gt;";
    echo "Saya duduk di kelas {<input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('$kelas'); ?>" autocomplete="off" required>} jurusan {<input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('$jurusan'); ?>" autocomplete="off" required>}..&lt;br&gt;";
    echo "Saya tinggal di {<input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('$alamat'); ?>" autocomplete="off" required>}..";
    echo "&lt;/p&gt;";
  <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('}'); ?>" autocomplete="off" required>

  <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('perkenalan_murid("Muhammad Saleh Solahudin","Bogor","Rekayasa Perangkat Lunak");'); ?>" autocomplete="off" required>
  <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('perkenalan_murid("Karmila Sriwulan","Jakarta","Multimedia","XII");'); ?>" autocomplete="off" required>
?&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',5) > $b): ?>
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