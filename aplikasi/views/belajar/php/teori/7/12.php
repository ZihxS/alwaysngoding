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
            <h2 class="judul-teori">Membuka Dan Membaca File Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Sekarang kita akan membahas tentang cara manipulasi file di dalam PHP menggunakan fungsi-fungsi bawaan. Mulai dari berbagai cara untuk membaca file, menulis, menimpa file yang sudah ada dan juga menghapusnya. Sekarang kita akan membahas cara membaca dan membuka file di dalam PHP.</p>
              <p>Sebelum kita memulai membaca file, kita akan mengenal fungsi <b><q>file_exists()</q></b> terlebih dahulu. Fungsi tersebut berfungsi untuk memeriksa apakah suatu file benar-benar eksis atau tidak.</p>
              <p class="mb-0">Jika file yang kita maksudkan ternyata memang ada, maka ia akan mengembalikan nilai <b><q>TRUE</q></b>, dan sebaliknya jika file yang kita maksud ternyata tidak ada, ia akan mengembalikan nilai <b><q>FALSE</q></b>. Perhatikan contoh berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
if (file_exists('negara.txt')) {
  echo "File negara.txt ditemukan";
} else {
  echo "File negara.txt tidak ditemukan";
}
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-0">Katakanlah kita memiliki sebuah file bernama <b><q>negara.txt</q></b>. File tersebut berisi nama-nama negara di tiap barisnya:</p>
              <pre class="language-txt"><code>Indonesia
Singapura
Malaysia
India</code></pre>
              <p class="mb-0">Lalu kita akan membacanya dengan PHP, kita bisa lakukan dengan menggunakan fungsi <b><q>fopen()</q></b>, <b><q>fread()</q></b> dan <b><q>fclose()</q></b>. Skenario umumnya adalah 3 langkah:</p>
              <ol>
                <li>Kita buka file yang kita inginkan dengan fungsi <b><q>fopen()</q></b>.</li>
                <li>Setelah file kita buka, kita bisa membaca isi file tersebut dengan fungsi <b><q>fread()</q></b>.</li>
                <li>Ketika proses selesai, kita bisa menutup file tersebut dan menghapusnya dari memori menggunakan fungsi <b><q>fclose()</q></b>.</li>
              </ol>
              <p class="mb-0">Untuk lebih jelasnya silahkan perhatikan contoh berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
if (file_exists('negara.txt')) {
  $file = fopen('negara.txt', 'r');
  // mulai baca file
  echo fread($file, filesize('negara.txt'));
  // tutup file agar dihapus dari memory
  fclose($file);
} else {
  echo "File negara.txt tidak ditemukan";
}
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-0">Dari kode program di atas, kita akan menjelaskan beberapa hal sebagai berikut:</p>
              <ul>
                <li>fungsi <b><q>fopen()</q></b> menerima dua parameter:</li>
                <ul>
                  <li>Parameter pertama adalah nama file.</li>
                  <li>Sedangkan parameter kedua adalah mode pembukaan file tersebut. Di dalam kode program di atas, kita menggunakan mode <b><q>r</q></b> yang artinya read.</li>
                </ul>
                <li>Fungsi <b><q>fopen()</q></b> akan bernilai FALSE jika file yang kita maksud ternyata tidak ada.</li>
                <li>Fungsi <b><q>fread()</q></b> menerima 2 parameter:</li>
                <ul>
                  <li>Parameter pertama yaitu hasil kembalian dari fungsi <b><q>fopen()</q></b>.</li>
                  <li>Parameter kedua berisi berapa byte yang akan dibaca dari file tersebut.</li>
                  <li>Parameter kedua kita isi dengan fungsi <b><q>filesize('negara.txt')</q></b> agar isi file tersebut terbaca semuanya.</li>
                  <li>Setelah proses yang berkaitan dengan variabel <b><q>$file</q></b> selesai, kita tutup dengan fungsi <b><q>fclose()</q></b> yang menerima parameter hasil kembalian dari fungsi <b><q>fopen()</q></b>.</li>
                </ul>
              </ul>
              <p class="mb-1">Berikut adalah mode-mode yang tersedia untuk fungsi <b><q>fopen()</q></b>:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="20%">Mode</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>r</td>
                    <td>Membuka file dalam mode read only.</td>
                  </tr>
                  <tr>
                    <td>w</td>
                    <td>Membuka file dalam mode write only. Ia akan menghapus keseluruhan isi file dan menimpanya dengan yang baru, atau jika file tersebut belum pernah ada, ia akan membuatnya terlebih dahulu.</td>
                  </tr>
                  <tr>
                    <td>a</td>
                    <td>Membuka file dalam mode write only. Isi dari file yang sebelumnya tetap dipertahankan.</td>
                  </tr>
                  <tr>
                    <td>x</td>
                    <td>Membuat file baru dalam mode write only. Mengembalikan nilai FALSE jika file telah ada sebelumnya.</td>
                  </tr>
                  <tr>
                    <td>r+</td>
                    <td>Membuka file dalam mode read dan write.</td>
                  </tr>
                  <tr>
                    <td>w+</td>
                    <td>Membuka file dalam mode read dan write. Menghapus konten file sebelumnya atau membuat file baru jika belum ada.</td>
                  </tr>
                  <tr>
                    <td>a+</td>
                    <td>Membuka file dalam mode read dan write. Sama seperti w+ akan tetapi konten file yang sebelumnya tidak dihapus.</td>
                  </tr>
                  <tr>
                    <td>x+</td>
                    <td>Membuka file dalam mode read dan write. Mengembalikan nilai FALSE jika file telah ada sebelumnya.</td>
                  </tr>
                </tbody>
              </table>
              <p class="mb-0">Cara yang kedua untuk membaca file adalah dengan menggunakan fungsi <b><q>file_get_contents()</q></b>. Fungsi tersebut bisa untuk membaca berbagai file, baik secara lokal maupun global (maksudnya url suatu situs tertentu) dan juga bisa membaca berbagai format file baik itu gambar, teks, json, xml, dan lain-lain. Kita akan coba membaca isi dari file <b><q>negara.txt</q></b>. Perhatikan contoh program berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
echo file_get_contents('negara.txt');
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p>Di antara fungsi bawaan PHP yang bisa kita gunakan untuk membaca keseluruhan isi file adalah fungsi bernama <b><q>file()</q></b>. Ia melakukan tugas yang sama dengan fungsi <b><q>file_get_contents()</q></b>.</p>
              <p class="mb-0">Hanya saja, fungsi <b><q>file()</q></b> mengembalikan konten dari suatu file dalam bentuk array untuk tiap barisnya. Berbeda dengan fungsi <b><q>file_get_contents()</q></b> yang mengembalikan seluruh konten dari suatu file dalam bentuk string utuh. Perhatikan contoh berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
$negara = file('negara.txt');
foreach ($negara as $data) {
  echo "{$data}&lt;br&gt;";
}
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-2">Pada kode di atas kita memanfaatkan perulangan foreach untuk membaca array yang dihasilkan dari file <b><q>negara.txt</q></b>.</p>
              <blockquote class="catatan-pelajaran">Untuk membaca file, kita juga bisa menggunakan beberapa fungsi lain seperti fungsi <b><q>readfile()</q></b> juga <b><q>fgets()</q></b>. Tetapi fungsi <b><q>file_get_contents()</q></b>, <b><q>file()</q></b>, <b><q>fopen()</q></b>, <b><q>fread()</q></b> dan <b><q>fclose()</q></b> adalah fungsi yang sering sekali digunakan.</blockquote>
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