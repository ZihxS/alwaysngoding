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
            <h2 class="judul-teori">Memanipulasi File Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Pada bagian sebelumnya, kalian telah mempelajari beberapa cara untuk membuka dan membaca file dengan PHP. Mulai dari menggunakan fungsi <b><q>file()</q></b>, fungsi <b><q>file_get_contents()</q></b> hingga menggunakan skema <b><q>fopen()</q></b> dan variasinya. Pada bagian kali ini, kalian akan melanjutkan pembahasan tentang manipulasi file.</p>
              <p class="mb-0">Sekarang kita akan membuat file baru, untuk membuat file baru, kita bisa menggunakan mode <b><q>w</q></b>, <b><q>a</q></b>, <b><q>w+</q></b> atau <b><q>a+</q></b> pada fungsi <b><q>fopen()</q></b>. Sebagai contoh, untuk membuat file baru. Kita bisa menggunakan perintah berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
$bulan = 'nama-bulan.txt';
$file = fopen($bulan, 'w');
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p>Kode program di atas akan membuat file baru bernama <b><q>nama-bulan.txt</q></b>. Tetapi jika file tersebut kita buka, kita tidak akan mendapati apa pun di sana (masih kosong). Kita bisa menambahkan konten pada suatu file dengan perintah <b><q>fwrite()</q></b>. Ada pun behavior bagaimana cara menulis kontennya. Apakah ia menimpa konten yang sudah ada atau ia tetap mempertahankan konten file sebelumnya, itu tergantung mode yang kita pilih saat memanggil fungsi <b><q>fopen()</q></b>.</p>
              <p class="mb-0">Sebagai contoh kita menggunakan mode <b><q>w</q></b> (write only). Perhatikan kode program berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
$bulan = 'nama-bulan.txt';
$file = fopen($bulan, 'w');
$konten = "Januari\nFebruari\nMaret\nApril\nMei\nJuni\nJuli\nAgustus\nSeptember\nOktober\nNovember\nDesember";
// memasukan string dari variabel $kontek ke file pada variabel $file
fwrite($file, $konten);
fclose($file);
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-2">Kode di atas kita menggunakan mode <b><q>w</q></b> (write only). Silahkan kalian eksplorasi secara mandiri untuk menggunakan mode-mode yang lain agar bisa memahami lebih dalam setiap mode yang ada.</p>
              <blockquote class="catatan-pelajaran mb-2"><b><q>\n</q></b> pada kode di atas sudah tahu kan fungsinya?, yap... fungsinya adalah untuk menuju baris bawahnya (membuat baris baru) seperti &lt;br&gt; jika dalam HTML.</blockquote>
              <p class="mb-0">Di antara hal yang lazim dilakukan dalam rangka memanipulasi file dalam PHP adalah menyalin file. Untuk menyalin atau menggandakan file, kita bisa memanggil fungsi bawaan PHP bernama <b><q>copy()</q></b>. Fungsi tersebut menerima 2 parameter:</p>
              <ol>
                <li>Parameter untuk nama file yang akan disalin.</li>
                <li>Lokasi atau nama file baru hasil salinan.</li>
              </ol>
              <p class="mb-0">Perhatikan contoh berikut, kita akan menggandakan file <b><q>nama-bulan.txt</q></b> yang telah kita buat:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
copy('nama-bulan.txt', 'nama-bulan-2.txt');
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-0">Kita juga bisa memindahkan sekaligus me-rename file yang kita inginkan. Untuk memindahkan sekaligus me-rename file, kalian bisa menggunakan fungsi <b><q>rename()</q></b> bawaan PHP yang menerima 2 parameter:</p>
              <ol>
                <li>Nama atau path file yang lama.</li>
                <li>Nama atau path file yang baru.</li>
              </ol>
              <p>Fungsi <b><q>rename()</q></b> akan memindahkan suatu file dari lokasi lama ke lokasi baru. Jika lokasi baru ternyata masih dalam satu direktori dan nama filenya berbeda, maka fungsi tersebut secara tidak langsung akan me-rename file yang dimaksud.</p>
              <p class="mb-0">Kita akan coba memindahkan file <b><q>nama-bulan.txt</q></b> ke lokasi yang sama, tapi dengan nama baru yaitu <b><q>nama-bulan-baru.txt</q></b>. Perhatikan kode program berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
rename('nama-bulan.txt', 'nama-bulan-baru.txt');
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p>Jika kita eksekusi, maka file <b><q>nama-bulan.txt</q></b> seolah-olah ter-rename dengan menggunakan fungsi <b><q>rename()</q></b>.</p>
              <p class="mb-0">Selanjutnya kita akan menghapus file. Kita bisa menggunakan fungsi <b><q>unlink()</q></b>. Perhatikan kode program berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
unlink('nama-bulan-baru.txt');
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-1">Kode program di atas akan menghapus file <b><q>nama-bulan-baru.txt</q></b>. Selain fungsi-fungsi yang telah kita pelajari sebelumnya dan sekarang, masih ada fungsi-fungsi lain yang harus kalian coba eksplor sendiri yaitu:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="20%">Function/Method</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>mkdir()</td>
                    <td>Untuk membuat sebuah direktori</td>
                  </tr>
                  <tr>
                    <td>rmdir()</td>
                    <td>Untuk menghapus suatu folder. Tapi foldernya harus kosong</td>
                  </tr>
                  <tr>
                    <td>is_dir()</td>
                    <td>Untuk memeriksa apakah suatu path adalah direktori atau bukan</td>
                  </tr>
                  <tr>
                    <td>is_file()</td>
                    <td>Untuk memeriksa apakah suatu path adalah file atau bukan</td>
                  </tr>
                  <tr>
                    <td>scandir()</td>
                    <td>Mengembalikan konten dari sebuah direktori dalam bentuk array (konten bisa berupa file dan juga sub-direktori)</td>
                  </tr>
                  <tr>
                    <td>getcwd()</td>
                    <td>Mengembalikan lokasi direktori yang sedang aktif</td>
                  </tr>
                </tbody>
              </table>
              <blockquote class="catatan-pelajaran mb-2">Bahasa pemrograman PHP adalah bahasa yang berjalan di server. Sehingga proses manipulasi file adalah suatu hal yang hampir menjadi keniscayaan.</blockquote>
              <blockquote class="catatan-pelajaran">PHP datang dengan berbagai macam fungsi bawaan yang memungkinkan kita bisa memanipulasi file maupun direktori dengan mudah.</blockquote>
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