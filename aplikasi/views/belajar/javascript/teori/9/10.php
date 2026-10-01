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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-javascript';
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
          <h4 class="judul-soal">Soal ke 6</h4>
          <hr>
          <div class="m-0">Lengkapi kode di bawah agar menjadi <q>arrow function</q> yang valid:</div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>let <input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('lirikLaguFirstLove'); ?>" autocomplete="off" required> = <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('() =>'); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('{'); ?>" autocomplete="off" required>
  console.log("Everyone can see");
  console.log("There's a change in me");
  console.log("They all say");
  console.log("I'm not the same kid I used to be");

  console.log("Don't go out and play");
  console.log("I just dream all day");
  console.log("They don't know what's wrong with me");
  console.log("And I'm too shy to say");

  console.log("It's my first love");
  console.log("What I'm dreaming of");
  console.log("When I go to bed");
  console.log("When I lay my head upon my pillow");
  console.log("Don't know what to do");
  console.log("My first love");
  console.log("Thinks that I'm too young");
  console.log("He doesn't even know");
  console.log("Wish that I could show him what I'm feeling");
  console.log("Cause I'm feeling my first love");

  console.log("Mirror on the wall");
  console.log("Does he care at all?");
  console.log("Will he ever notice me");
  console.log("Could he ever fall?");

  console.log("Tell me, teddy bear");
  console.log("Why love is so unfair");
  console.log("Will I ever find a way");
  console.log("And answer to my pray");

  console.log("For my first love");
  console.log("What I dreaming of");
  console.log("When I go to bed");
  console.log("When I lay my head upon my pillow");
  console.log("Don't know what to do");

  console.log("My first love");
  console.log("Thinks that I'm too young");
  console.log("He doesn't even know");
  console.log("Wish that I could show him what I'm feeling");
  console.log("Cause I'm feeling my first love");
<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('}'); ?>" autocomplete="off" required>

lirikLaguFirstLove();</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_js',9) > $b): ?>
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