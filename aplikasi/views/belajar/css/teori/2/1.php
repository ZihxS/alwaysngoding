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
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Html','HTML',str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3))))).' #'.$b;
  $u = 'belajar-css/teori/perpaduan-css-dengan-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Memadukan CSS Dengan HTML</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Untuk memadukan CSS dengan HTML kalian <b>bisa menggunakan tiga metode</b>. Yaitu metode Internal CSS, metode external CSS dan metode inline CSS (menggunakan atribut style).
              </p>
              <p>
                Sebelum kalian terjun lebih jauh pada modul ini, <b>disarankan kalian menyelesaikan semua modul pelajaran (kelas) HTML terlebih dahulu</b> atau <b>setidaknya sudah pernah belajar dan paham tentang HTML</b>. Karena disini kalian akan menggunakan kode-kode HTML.
              </p>
              <p>
                Pertama-tama <b>kalian akan mempelajari semua metode CSS</b> tersebut agar kalian bisa tahu semua metodenya. Tapi <b>untuk kelanjutannya kalian hanya menggunakan metode Internal CSS</b> saja agar lebih memudahkan pembelajaran CSS ini.
              </p>
              <p>
                Metode apa yang umum digunakan untuk memadukan CSS dan HTML? jawabannya adalah metode external CSS. Always Ngoding juga menggunakan metode external CSS untuk menghemat waktu, tenaga dan juga kode-kode pada setiap filenya. Selain itu metode Extenal CSS juga dapat memudahkan kalian untuk memelihara (maintenance) website kalian.
              </p>
              <p class="mb-2">
                Tetapi untuk pembelajaran CSS di Always Ngoding ini kalian akan sering menggunakan metode Internal CSS. Kenapa kok pakainya metode Internal CSS? karena untuk memudahkan pembelajaran kalian saja.
              </p>
              <blockquote class="catatan-pelajaran">
                Biasakan berdoa terlebih dahuluyaa jika ingin memulai belajar semua pelajaran di always ngoding 😄
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>