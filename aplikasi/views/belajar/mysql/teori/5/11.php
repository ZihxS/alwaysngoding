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
        <?php if ($this->agent->is_mobile()): ?>
          <div class="alert alert-info" role="alert">
            Untuk bagian (halaman) ini, kami menyarankan kalian untuk membuka pada PC atau laptop agar lebih mudah mengerjakan soal nya.
          </div>
        <?php endif; ?>
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 5</h4>
          <hr>
          <p class="mb-2">Misalnya kalian punya tabel <b><q>artikel</q></b> dengan data seperti berikut:</p>
          <a href="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <p class="mb-2">Lalu misalnya kalian punya tabel <b><q>statistik_artikel</q></b> dengan data seperti berikut:</p>
          <a href="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <p class="mb-2">Lalu misalnya kalian punya tabel <b><q>penginput</q></b> dengan data seperti berikut:</p>
          <a href="<?= base_url("media/hasil/mysql/5/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <p class="mb-2">Tugas kalian adalah lengkapi perintah SQL untuk menggabungkan data di tabel <b><q>artikel</q></b> dengan tabel <b><q>statistik_artikel</q></b> juga dengan tabel <b><q>penginput</q></b> dan harus menampilkan hasil seperti di bawah ini:</p>
          <a href="<?= base_url("media/hasil/mysql/5/{$b}-4.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-4.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal">
              <!-- SELECT artikel.id_artikel, artikel.judul, artikel.konten, penginput.nama_penginput, statistik_artikel.jumlah_tayang FROM artikel INNER JOIN penginput ON artikel.id_penginput = penginput.id_penginput INNER JOIN statistik_artikel ON artikel.id_artikel = statistik_artikel.id_artikel ORDER BY statistik_artikel.jumlah_tayang DESC -->
              <pre class="soal"><code><input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('select'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('artikel.id_artikel'); ?>" autocomplete="off" required>, <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('artikel.judul'); ?>" autocomplete="off" required>,
<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('artikel.konten'); ?>" autocomplete="off" required>, <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('penginput.nama_penginput'); ?>" autocomplete="off" required>, <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('statistik_artikel.jumlah_tayang'); ?>" autocomplete="off" required>
<input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('from'); ?>" autocomplete="off" required> <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('artikel'); ?>" autocomplete="off" required>
<input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('inner join'); ?>" autocomplete="off" required> penginput <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('on'); ?>" autocomplete="off" required> <input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('artikel.id_penginput'); ?>" autocomplete="off" required> = <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('penginput.id_penginput'); ?>" autocomplete="off" required>
<input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('inner join'); ?>" autocomplete="off" required> <input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('statistik_artikel'); ?>" autocomplete="off" required> <input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('on'); ?>" autocomplete="off" required> <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('artikel.id_artikel'); ?>" autocomplete="off" required> = statistik_artikel.id_artikel
<input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('order by'); ?>" autocomplete="off" required> <input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('statistik_artikel.jumlah_tayang'); ?>" autocomplete="off" required> DESC;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_mysql',5) > $b): ?>
            <?php $this->load->view('belajar/markas/teori/tombol-selesai-soal', ['bahasa' => 'mysql'], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/selesai-dari-soal', ['bahasa' => 'mysql', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>