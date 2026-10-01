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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/lebih-banyak-tentang-php';
  $kalimat_1 = "Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!";
  $kalimat_2 = "   Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!   ";
  $kalimat_3 = "   Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!";
  $kalimat_4 = "Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!   ";
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Memanipulasi String Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Ada beberapa fungsi dasar untuk memanipulasi string dengan PHP yang harus diketahui. Maksud dari manipulasi string di sini misalnya adalah kalian dapat menghitung jumlah karakter pada string, memfilter karakter atau kata tertentu yang terdapat di dalam string, mengubah kapitalisasi pada string dan lain sebagainya.</p>
              <p class="mb-0">Berikut adalah beberapa fungsi php yang berfungsi untuk memanipulasi string:</p>
              <ul>
                <li><b><q>strtolower()</q></b> berfungsi untuk merubah text menjadi huruf kecil semua.</li>
                <li><b><q>strtoupper()</q></b> berfungsi untuk merubah text menjadi huruf besar semua.</li>
                <li><b><q>ucfirst()</q></b> berfungsi untuk mengubah huruf pertama pada awal kata string menjadi kapital.</li>
                <li><b><q>ucwords()</q></b> berfungsi untuk mengubah huruf pertama pada setiap kata string menjadi kapital.</li>
                <li><b><q>trim()</q></b> berfungsi untuk menghapus spasi diawal atau diakhir string.</li>
                <li><b><q>ltrim()</q></b> berfungsi untuk menghapus spasi diawal string.</li>
                <li><b><q>rtrim()</q></b> berfungsi untuk menghapus spasi diakhir string.</li>
                <li><b><q>strlen()</q></b> berfungsi untuk menghitung jumlah karakter pada string.</li>
                <li><b><q>str_word_count()</q></b> berfungsi untuk menghitung jumlah kata pada string.</li>
                <li><b><q>strrev()</q></b> berfungsi untuk membalikkan karakter pada string.</li>
                <li><b><q>str_replace()</q></b> berfungsi untuk memfilter dan mengganti string yang ditentukan:</li>
                <ul>
                  <li>Argumen pertama adalah kata yang ingin dicari dan nantinya akan diganti.</li>
                  <li>Argumen kedua adalah kata penggantinya.</li>
                  <li>Argumen ketiga adalah string yang akan diproses.</li>
                </ul>
                <li><b><q>substr()</q></b> berfungsi untuk mengambil hanya sebagian nilai pada string:</li>
                <ul>
                  <li>Argumen pertama adalah string yang akan diproses.</li>
                  <li>Argumen kedua adalah posisi index awal (mulai dari 0) dimana nilai string akan dipotong.</li>
                  <li>Argumen ketiga bersifat optional digunakan untuk menentukan berapa jumlah karakter yang akan diambil.</li>
                </ul>
              </ul>
              <p class="mb-0">Berikut adalah contoh penggunaan fungsi-fungsi yang ada di atas:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $kalimat_1 = "Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!";
  $kalimat_2 = "   Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!   ";
  $kalimat_3 = "   Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!";
  $kalimat_4 = "Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!   ";
  echo strtolower($kalimat_1); // <?= strtolower($kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo strtoupper($kalimat_1); // <?= strtoupper($kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo ucfirst($kalimat_1); // <?= ucfirst($kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo ucwords($kalimat_1); // <?= ucwords($kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo trim($kalimat_2); // spasi (ruang kosong) di awal dan akhir string akan dihapus
  echo "&lt;hr&gt;";
  echo ltrim($kalimat_3); // spasi (ruang kosong) di awal string akan dihapus
  echo "&lt;hr&gt;";
  echo rtrim($kalimat_4); // spasi (ruang kosong) di akhir string akan dihapus
  echo "&lt;hr&gt;";
  echo strlen($kalimat_1); // <?= strlen($kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo str_word_count($kalimat_1); // <?= str_word_count($kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo strrev($kalimat_1); // <?= strrev($kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo str_replace("bisa", "dapat", $kalimat_1); // <?= str_replace("bisa", "dapat", $kalimat_1)."\n"; ?>
  echo "&lt;hr&gt;";
  echo substr($kalimat_1, 38, 42); // <?= substr($kalimat_1, 38, 42)."\n"; ?>
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">Fungsi-fungsi di atas sangat berguna untuk memanipulasi string. Dan akan sangat sering dipakai oleh kalian.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>