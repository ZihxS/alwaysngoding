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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-css/teori/transisi-transformasi-dan-animasi-pada-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 9</h4>
          <hr>
          <p class="m-0">
            Pilih semua kode yang benar dan valid:
          </p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <label class="kontainer">div {<br>
                  &nbsp;&nbsp;width: 200vw;<br>
                  &nbsp;&nbsp;height: 100vh;<br>
                  &nbsp;&nbsp;background-color: red;<br>
                  &nbsp;&nbsp;transform: rotate(45deg) translate(100px);<br>
                }
                <input type="checkbox" name="j_1" value="<?= sha1(1); ?>">
                <span class="checkmark"></span>
              </label>
              <!-- ini kecuali -->
              <label class="kontainer">div {<br>
                  &nbsp;&nbsp;width: 200px;<br>
                  &nbsp;&nbsp;height: 100px;<br>
                  &nbsp;&nbsp;background-color: yellow;<br>
                  &nbsp;&nbsp;transform: rotate(45deg), translate(100px);<br>
                }
                <input type="checkbox" name="j_2" value="<?= sha1(2); ?>">
                <span class="checkmark"></span>
              </label>
              <label class="kontainer">div {<br>
                  &nbsp;&nbsp;width: 25%;<br>
                  &nbsp;&nbsp;height: auto;<br>
                  &nbsp;&nbsp;background-color: green;<br>
                  &nbsp;&nbsp;transform: skew(45deg) translate(100px);<br>
                }
                <input type="checkbox" name="j_3" value="<?= sha1(3); ?>">
                <span class="checkmark"></span>
              </label>
              <!-- ini kecuali -->
              <label class="kontainer">div {<br>
                  &nbsp;&nbsp;width: 50%;<br>
                  &nbsp;&nbsp;height: auto;<br>
                  &nbsp;&nbsp;background-color: blue;<br>
                  &nbsp;&nbsp;transform: scale(5,4,8,1) translate(100px);<br>
                }
                <input type="checkbox" name="j_4" value="<?= sha1(4); ?>">
                <span class="checkmark"></span>
              </label>
              <!-- ini kecuali -->
              <label class="kontainer">div {<br>
                  &nbsp;&nbsp;width: 250px;<br>
                  &nbsp;&nbsp;height: 250px;<br>
                  &nbsp;&nbsp;background-color: #FFFFFF;<br>
                  &nbsp;&nbsp;transform: skew(80deg), translate(50px);<br>
                }
                <input type="checkbox" name="j_5" value="<?= sha1(5); ?>">
                <span class="checkmark"></span>
              </label>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_css',7) > $b): ?>
            <?php $this->load->view('belajar/markas/soal/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/jawab', ['bahasa' => 'css', 'r' => FALSE, 'e' => FALSE], FALSE); ?>
  </body>
</html>