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
  $u = 'belajar-html/teori/membuat-tabel-pada-html';
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
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 7</h4>
          <hr>
          <p class="m-0">
            Berikan caption pada tabel, caption nya adalah <b><q>Daftar siswa sekolah maju mundur pantang diam</q></b>:
          </p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Daftar siswa sekolah maju mundur pantang diam&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;table border="1" width="100%"&gt;
      <input id="j_1" name="j_1" type="text" class="input-text-modifikasi biru-muda" size="<?= strlen('<caption>Daftar siswa sekolah maju mundur pantang diam</caption>'); ?>" autocomplete="off" required>
      &lt;thead&gt;
        &lt;tr&gt;
          &lt;th&gt;Nama&lt;/th&gt;
          &lt;th&gt;Kelas&lt;/th&gt;
          &lt;th&gt;Jurusan&lt;/th&gt;
          &lt;th&gt;Jenis Kelamin&lt;/th&gt;
        &lt;/tr&gt;
      &lt;/thead&gt;
      &lt;tbody&gt;
        &lt;tr&gt;
          &lt;td&gt;Joko Susanto&lt;/td&gt;
          &lt;td&gt;XII&lt;/td&gt;
          &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
          &lt;td&gt;Laki-laki&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Ucok Sanusi&lt;/td&gt;
          &lt;td&gt;XII&lt;/td&gt;
          &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
          &lt;td&gt;Laki-laki&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Putri Salju&lt;/td&gt;
          &lt;td&gt;XI&lt;/td&gt;
          &lt;td&gt;Multimedia&lt;/td&gt;
          &lt;td&gt;Perempuan&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Nabila Wong&lt;/td&gt;
          &lt;td&gt;X&lt;/td&gt;
          &lt;td&gt;Multimedia&lt;/td&gt;
          &lt;td&gt;Perempuan&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Enoh Kodrat&lt;/td&gt;
          &lt;td&gt;XI&lt;/td&gt;
          &lt;td&gt;Multimedia&lt;/td&gt;
          &lt;td&gt;Laki-laki&lt;/td&gt;
        &lt;/tr&gt;
      &lt;tbody&gt;
    &lt;/table&gt;
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
          <?php if ($this->belajar->ambil_bagain_terakhir('1_html',4) > $b): ?>
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