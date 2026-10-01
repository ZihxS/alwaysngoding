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
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/penggabungan-tabel-pada-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'mysql', 'label' => 'Teori MySQL', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-mysql">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Penjelasan</h2>
            <hr>
            <div class="konten-teori">
              <p>Join adalah <b>penggabungan tabel</b> yang dilakukan melalui kolom/key tertentu yang memiliki nilai terkait untuk mendapatkan satu set data dengan informasi lengkap. Lengkap disini artinya kolom data didapatkan dari kolom-kolom hasil penggabungan antar tabel tersebut.</p>
              <p>Penggabungan tabel diperlukan karena perancangan tabel pada sistem transaksional kebanyakan di-normalisasi, salah satu alasannya untuk menghindari duplikasi data. Pada bahasa SQL, operasi penggabungan antar tabel adalah operasi dasar database relasional yang sangat penting. Untuk mendukung perancangan database relasional yang baik.</p>
              <p>Seorang programmer biasanya menggunakan join untuk mengidentifikasi record (baris) untuk bergabung. Jika predikat yang dievaluasi benar, record gabungan kemudian diproduksi dalam format yang diharapkan.</p>
              <p>Penggabungan tabel sangat penting untuk kalian pahami, jika ingin menghasilkan output data yang valid, menjamin integritas data, dan meminimalisir redudansi atau duplikasi data.</p>
              <p>Kalian akan kesulitan menghubungkan antar tabel jika kalian tidak memahami konsep penggabungan tabel ini. Jadi, sangatlah penting bagi kalian untuk benar-benar memahami konsep penggabungan tabel ini dengan baik.</p>
              <p class="mb-0">Pada pelajaran kali ini kalian akan membahas 3 cara untuk menggabungkan tabel (cara-cara dasar), yaitu:</p>
              <ol class="mb-0">
                <li>INNER JOIN</li>
                <li>LEFT JOIN</li>
                <li>RIGHT JOIN</li>
              </ol>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>