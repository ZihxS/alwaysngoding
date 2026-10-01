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
  $x = str_replace('Session','Session,',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/kelola-session-cookie-dan-files';
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
            <h2 class="judul-teori">Session Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Dalam PHP, session merupakan <b>data yang disimpan dalam suatu server yang dapat digunakan secara global di server tersebut</b>, dimana data tersebut spesifik merujuk ke user atau client tertentu, contoh penggunaan session adalah ketika user telah login di halaman tertentu, maka ketika membuka halaman lain, PHP akan mengingat bahwa user tersebut telah login, contoh ketika kalian telah login pada Google, maka setiap kali kalian membuka layanan Google seperti GMail, Google Drive, dll di tab berbeda, kalian akan selalu dalam keadaan login, kecuali kalian buka dengan browser yang berbeda. Contoh lain ketika web ecommerce merekam keranjang belanja user, maka ketika pindah ke halaman pembayaran, daftar belanja masih terekam.</p>
              <p>Cara menggunakan fungsi session adalah dengan menjalankan perintah <b><q>session_start()</q></b> maka PHP akan menjalankan perintah baik pada server maupun pada client atau user. Perintah <b><q>session_start()</q></b> yang akan memberitahu server, bahwa kita akan menggunakan session, selanjutnya server akan mengecek apakah pengunjung telah memiliki session id.</p>
              <p class="mb-0">Jika ya, maka server akan mengambil data sesuai dengan id session yang di minta oleh browser (misal di file <b><q>satu.php</q></b> kita telah menjalankan perintah <b><q>session_start()</q></b> kemudian di file <b><q>dua.php</q></b> kita jalankan lagi perintah session_start(), maka ketika menjalankan file <b><q>dua.php</q></b> browser akan mengirimkan id session, sehingga data session yang terbentuk ketika menjalankan file <b><q>satu.php</q></b> akan dipakai lagi ketika kita menjalankan file <b><q>dua.php</q></b>). Jika tidak, maka server akan membuat file session dengan nama tertentu dan mengirimkan id tersebut ke browser untuk dibuatkan cookie.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>