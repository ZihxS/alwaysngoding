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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-html/teori/membuat-formulir-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-soal">
          <h4 class="judul-soal">Soal ke 1</h4>
          <hr>
          <div class="m-0">
            Lengkapi kode formulir di bawah dengan ketentuan:
            <ul class="m-0">
              <li>Aksi filenya mengarah ke <b><q>proses.php</q></b>.</li>
              <li>Metodenya <b>POST</b>.</li>
              <li>Lengkapi atribut-atribut <b><q>for</q></b> yang belum diisi pada tag <b><q>label</q></b>.</li>
              <li>Lengkapi atribut-atribut yang belum diisi pada tag <b><q>input</q></b>.</li>
            </ul>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Formulir pendaftaran&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h3&gt;Harap isi formulir dengan benar&lt;/h3&gt;
    &lt;form <input id="j_1" name="j_1" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('action=\'proses.php\''); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('method=\'POST\''); ?>" autocomplete="off" required>&gt;
      &lt;div&gt;
        &lt;label for="username"&gt;Nama pengguna (Username):&lt;/label&gt;
        &lt;input type="<input name="j_3" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('text'); ?>" autocomplete="off" required>" id="<input name="j_4" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('username'); ?>" autocomplete="off" required>" name="nama_pengguna"&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;label <input name="j_5" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('for=\'password\''); ?>" autocomplete="off" required>&gt;Kata sandi:&lt;/label&gt;
        &lt;input type="<input name="j_6" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('password'); ?>" autocomplete="off" required>" id="password" name="kata_sandi"&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;label <input name="j_7" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('for=\'nama\''); ?>" autocomplete="off" required>&gt;Nama lengkap:&lt;/label&gt;
        &lt;input type="text" id="nama" name="nama"&gt;
      &lt;/div&gt;
      &lt;div&gt;
        Pilih jenis kelamin:
        &lt;input <input name="j_8" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('id=\'laki-laki\''); ?>" autocomplete="off" required> type="<input name="j_9" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('radio'); ?>" autocomplete="off" required>" name="jenis_kelamin" value="Laki-laki"&gt; &lt;label for="laki-laki"&gt;Laki-laki&lt;/label&gt;
        &lt;input id="perempuan" type="radio" name="<input name="j_10" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('jenis_kelamin'); ?>" autocomplete="off" required>" value="Perempuan"&gt; &lt;label <input name="j_11" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('for=\'perempuan\''); ?>" autocomplete="off" required>&gt;Perempuan&lt;/label&gt;
      &lt;/div&gt;
      &lt;div&gt;
        Hobi anda:
        &lt;input id="<input name="j_12" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('bola'); ?>" autocomplete="off" required>" type="checkbox" name="hobi" value="Bermain Sepak Bola"&gt; &lt;label for="bola"&gt;Bermain Sepak Bola&lt;/label&gt;
        &lt;input id="basket" type="<input name="j_13" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('checkbox'); ?>" autocomplete="off" required>" name="hobi" value="Bermain Basket"&gt; &lt;label for="basket"&gt;Bermain Basket&lt;/label&gt;
        &lt;input id="berenang" type="checkbox" name="<input name="j_14" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('hobi'); ?>" autocomplete="off" required>" value="Berenang"&gt; &lt;label for="berenang"&gt;Berenang&lt;/label&gt;
        &lt;input id="coding" type="checkbox" name="hobi" value="Coding"&gt; &lt;label for="<input name="j_15" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('coding'); ?>" autocomplete="off" required>"&gt;Coding&lt;/label&gt;
      &lt;/div&gt;
      &lt;input type="<input name="j_16" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('submit'); ?>" autocomplete="off" required>" name="proses" value="Proses"&gt;
    &lt;/form&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_html',5) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'html', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>