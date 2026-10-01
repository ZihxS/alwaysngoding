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
  $u = 'belajar-javascript/teori/tipe-data-pada-javascript';
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
      <div class="container container-teori-css">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 12</h4>
          <hr>
          <div class="m-0">
            <ol class="m-0">
              <li>Pada bagian 1 silahkan kalian cetak makanan <b><q>Sate</q></b> ke console.</li>
              <li>Pada bagian 2 silahkan kalian cetak minuman <b><q>Sirup</q></b> ke console.</li>
              <li>Pada bagian 3 silahkan kalian cetak makanan <b><q>Bakso</q></b> ke console.</li>
              <li>Pada bagian 4 silahkan kalian cetak minuman <b><q>Soda</q></b> ke console.</li>
            </ol>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>var makanan = ['Rendang', 'Sate', 'Seblak', 'Soto', 'Bakso'];
var minuman = ['Soda', 'Teh', 'Kopi', 'Sirup', 'Air Bening'];

console.log(<input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('makanan[1]'); ?>" autocomplete="off" required>); // bagian 1
console.log(<input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('minuman[3]'); ?>" autocomplete="off" required>); // bagian 2
console.log(<input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('makanan[4]'); ?>" autocomplete="off" required>); // bagian 3
console.log(<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('minuman[0]'); ?>" autocomplete="off" required>); // bagian 4</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_js',4) > $b): ?>
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