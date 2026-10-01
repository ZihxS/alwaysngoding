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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/berkenalan-dengan-css';
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
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Salam Kenal dari CSS 😉</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Semoga kalian sudah sedikit kenal dengan CSS yaa. Supaya modul-modul selanjutnya bisa di lewati dengan mudah dan cepat. <b>Jangan patah semangat dalam mengejar ilmu dan cita-cita</b>. Apalagi cita-cita nya ingin menjadi pahlawan indonesia dengan kekuatan super yaitu programming 😄
              </p>
              <p>
                Pokoknya harus selalu merasa lapar dan haus akan ilmu yaa, <b>ingatlah di atas langit masih ada langit</b>.
              </p>
              <p>
                <b>Usahakan jangan malas membaca yaa</b>, agar Always Ngoding ini bisa benar-benar membantu kalian dalam belajar programming.
              </p>
              <p class="mb-2">
                Dan usahakan untuk menyelesaikan pelajaran satu per satuyaa. <b>Usahakan sabar dan jangan berpindah pelajaran telebih dahulu</b> sebelum pelajaran yang sedang ditempuh selesai (kecuali sudah menguasai).
              </p>
              <blockquote class="catatan-pelajaran">
                Jangan lupa akhiri setiap modul dengan rasa syukur 😄
              </blockquote>
            </div>
          </div>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/teori/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php $this->load->view('belajar/markas/teori/tombol-selesai', NULL, FALSE); ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'css', 'modul_bagian' => 1, 'nama_modul' => 'Berkenalan Dengan CSS'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>