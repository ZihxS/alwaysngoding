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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/berkenalan-dengan-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Pengertian PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>PHP (Hypertext Preprocessor) adalah <b>bahasa pemrograman yang dapat ditanamkan atau disisipkan ke dalam HTML</b>. PHP banyak dipakai untuk memprogram situs <b>web dinamis</b>, PHP juga dapat digunakan untuk membangun sebuah <b>CMS</b> (Content Management System).</p>
              <p>PHP disebut bahasa pemrograman <b><q>server-side</q></b> karena PHP diproses pada <b>komputer server</b>. Hal ini berbeda jika dibandingkan dengan bahasa pemrograman <b><q>client-side</q></b> seperti JavaScript yang diproses pada <b>web browser</b>.</p>
              <p>Pada kelas ini kalian akan belajar dasar-dasar bahasa pemrograman PHP. Jika kalian ingin menjadi web developer maka PHP bisa kalian andalkan untuk membuat website dinamis bahkan website yang berskala besar.</p>
              <p>Kalian harus mempelajarinya secara teliti dengan cara membaca setiap teori yang ada dan menjawab soal-soal yang telah disediakan dengan benar.</p>
              <blockquote class="catatan-pelajaran">
                Ibarat manusia. HTML adalah kerangka, CSS adalah makeup atau pakaian atau perhiasan, PHP adalah saraf dan organ-organ yang mempunyai masing-masing fungsi.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>