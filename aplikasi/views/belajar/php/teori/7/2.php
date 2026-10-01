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
  $x = str_replace('Session','Session,',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/kelola-session-cookie-dan-files';
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
            <h2 class="judul-teori">Mengelola Session Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Semua data session disimpan dalam bentuk array superglobal dengan nama atau variabel <b><q>$_SESSION</q></b>, sehingga seperti array pada umumnya yaitu setiap variabel session disimpan dalam hubungan key dan value, untuk menambahkan data kedalamnya sama dengan ketika kita menambahkan data di array biasa, namun bedanya variabel <b><q>$_SESSION</q></b> akan tetap dapat kita gunakan di file php manapun (dalam satu server) hingga kita mengakhirinya dengan perintah <b><q>session_destroy()</q></b>. Berikut adalah contoh untuk menambahkan data session:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
session_start();
$_SESSION['nama'] = 'Fajar';
$_SESSION['level'] = 'admin';
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-0">Setelah kita menyimpan atau menambahkan data pada session, data tersebut langsung dapat kita gunakan. Untuk memanggil data session pada PHP, seperti kita memanggil data array pada umumnya, yaitu dengan key nya, contoh:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
session_start();
echo $_SESSION['nama'];
echo "&lt;br&gt;"
echo $_SESSION['level'];
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-0">Untuk menghapus data session pada php, sama seperti ketika kita menghapus variabel, yaitu menggunakan perintah <b><q>unset()</q></b>. Berikut adalah contohnya:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
session_start();
unset($_SESSION['level']);
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p>Pada kode di atas kita telah menghapus session <b><q>level</q></b>, jadi session yang ada sekarang hanyalah session <b><q>nama</q></b>. Selain itu kita juga dapat menggunakan perintah <b><q>session_unset()</q></b> tanpa argumen untuk menghapus semua data pada session.</p>
              <p class="mb-0">Untuk mengakhiri session pada PHP, kita bisa gunakan perintah <b><q>session_destroy()</q></b>, dengan perintah ini maka file session akan dihapus dari server. Contohnya ketika user logout, maka session akan berakhir dan user diminta untuk login kembali.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>