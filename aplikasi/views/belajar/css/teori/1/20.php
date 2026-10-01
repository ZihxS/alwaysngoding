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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/berkenalan-dengan-css';
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
            <h2 class="judul-teori">Fakta Menggunakan CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-2">Fakta menggunakan CSS di antaranya:</p>
              <ul>
                <li>Telah <b>didukung oleh kebanyakan browser versi terbaru</b>, tetapi tidak didukung oleh browser-browser lama.</li>
                <li>Lebih <b>fleksibel dalam penempatan posisi layout</b>. Dalam layouting CSS, kita mengenal <b><q>z-index</q></b> untuk menempatkan objek dalam posisi yang sama.</li>
                <li><b>Menjaga HTML dalam penggunaan tag yang minimal</b>, hal ini berpengaruh terhadap ukuran berkas dan kecepatan pengunduhan (kecepatan loading website).</li>
                <li>Dapat menampilkan konten utama terlebih dahulu, sementara gambar dapat ditampilkan sesudahnya.</li>
                <li>Penerjemahan CSS setiap browser berbeda, <b>tata letak akan berubah jika dilihat di berbagai browser</b>.</li>
                <li>CSS adalah layouting <b><q>Masa Depan</q></b> dengan penggabungan bersama XHTML.</li>
                <li>Banyak framework (Kerangka Kerja) CSS yang sangat membantu.</li>
                <li><b>Komunitas</b> yang sudah <b>luas dan banyak</b>.</li>
                <li>Bahasa yang wajib dipelajari untuk membuat website.</li>
              </ul>
              <blockquote class="catatan-pelajaran">
                Di modul berikutnya kalian akan belajar cara memadukan CSS dengan kode HTML. Selalu semangat ya belajarnya 😄
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>