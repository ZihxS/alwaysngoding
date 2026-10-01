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
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 2</h4>
          <hr>
          <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Membuat Form Sederhana&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;form action="proses.php" method="POST"&gt;
      &lt;div&gt;
        Masukkan nama lengkap anda: &lt;input type="text" name="nama_lengkap" required&gt;
      &lt;/div&gt;
      &lt;div&gt;
        Masukkan alamat rumah anda: &lt;input type="text" name="alamat_rumah" required&gt;
      &lt;/div&gt;
      &lt;div&gt;
        Masukkan alamat email anda: &lt;input type="email" name="alamat_email" required&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;input type="submit" value="Proses"&gt;
      &lt;/div&gt;
    &lt;/form&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
          <p class="m-0">
            Silahkan lengkapi kode di bawah (sesuaikan dengan kode yang ada di atas):
          </p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;?php
   echo "Nama lengkap anda adalah: {<input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('$_REQUEST'); ?>" autocomplete="off" required>['<input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('nama_lengkap'); ?>" autocomplete="off" required>']}";
   echo "&lt;br&gt;";
   echo "Alamat rumah anda: {<input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('$_REQUEST'); ?>" autocomplete="off" required>['<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('alamat_rumah'); ?>" autocomplete="off" required>']}";
   echo "&lt;br&gt;";
   echo "Alamat email anda: {<input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('$_REQUEST'); ?>" autocomplete="off" required>['<input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('alamat_email'); ?>" autocomplete="off" required>']}";
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
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'php', 'r' => FALSE, 'e' => FALSE], FALSE); ?>
  </body>
</html>