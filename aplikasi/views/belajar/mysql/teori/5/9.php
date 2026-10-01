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
  $u = 'belajar-mysql/teori/penggabungan-tabel-pada-mysql';
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
          <h4 class="judul-soal">Soal ke 4</h4>
          <hr>
          <p class="mb-2">Misalnya kalian punya tabel <b><q>artikel</q></b> dengan data seperti berikut:</p>
          <a href="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <p class="mb-2">Lalu misalnya kalian punya tabel <b><q>statistik_artikel</q></b> dengan data seperti berikut:</p>
          <a href="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <p class="mb-2">Tugas kalian adalah buatkan perintah SQL untuk menggabungkan data di tabel <b><q>statistik_artikel</q></b> dengan tabel <b><q>artikel</q></b> dan harus menampilkan hasil seperti di bawah ini (gunakan RIGHT JOIN):</p>
          <a href="<?= base_url("media/hasil/mysql/5/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal">
              <!-- SELECT * FROM statistik_artikel RIGHT JOIN artikel ON statistik_artikel.id_artikel = artikel.id_artikel WHERE statistik_artikel.id_artikel IS NULL -->
              <pre class="soal"><code><input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('select'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('*'); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('from'); ?>" autocomplete="off" required> <input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('statistik_artikel'); ?>" autocomplete="off" required>
<input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('right join'); ?>" autocomplete="off" required> <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('artikel'); ?>" autocomplete="off" required>
<input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('on'); ?>" autocomplete="off" required> <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('statistik_artikel.id_artikel'); ?>" autocomplete="off" required> = <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('artikel.id_artikel'); ?>" autocomplete="off" required>
<input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('where'); ?>" autocomplete="off" required> <input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('statistik_artikel.id_artikel'); ?>" autocomplete="off" required> IS <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('null'); ?>" autocomplete="off" required>;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_mysql',5) > $b): ?>
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