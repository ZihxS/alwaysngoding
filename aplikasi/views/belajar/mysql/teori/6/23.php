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
  $u = 'belajar-mysql/teori/lebih-banyak-tentang-mysql';
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
          <p class="mb-2">Kita mempunyai tabel <b><q>murid</q></b> seperti di bawah ini:</p>
          <a href="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <p class="mb-2">Tugas kalian adalah lengkapi perintah SQL untuk menampilkan hasil seperti di bawah ini dari tabel <b><q>murid</q></b> (gunakan fungsi yang sudah kalian pelajari):</p>
          <a href="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal">
              <pre class="soal"><code>SELECT
  <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('upper(nama_lengkap)'); ?>" autocomplete="off" required> AS nama_lengkap,
  <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('replace'); ?>" autocomplete="off" required>(<input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('jenis_kelamin'); ?>" autocomplete="off" required>, '<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('perempuan'); ?>" autocomplete="off" required>', '<input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('cewe'); ?>" autocomplete="off" required>') AS jenis_kelamin,
  <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('lower(jurusan)'); ?>" autocomplete="off" required> AS jurusan
FROM murid;
</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_mysql',6) > $b): ?>
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