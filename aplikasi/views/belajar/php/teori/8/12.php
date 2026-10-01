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
            <h2 class="judul-teori">Memanipulasi Array Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Setelah mempelajari beberapa fungsi untuk memanipulasi string pada PHP, sekarang kalian akan mempelajari beberapa fungsi untuk memanipulasi array pada PHP.</p>
              <p class="mb-0">Berikut adalah beberapa fungsi php yang berfungsi untuk memanipulasi array:</p>
              <ul>
                <li><b><q>count()</q></b> berfungsi untuk menghitung banyaknya element pada array.</li>
                <li><b><q>in_array()</q></b> berfungsi untuk mengecek apakah suatu array memiliki value tertentu.</li>
                <li><b><q>key_exists()</q></b> berfungsi untuk mengecek apakah suatu array memiliki key tertentu.</li>
                <li><b><q>array_keys()</q></b> berfungsi untuk mengambil semua key dari suatu array.</li>
                <li><b><q>array_values()</q></b> berfungsi untuk mengambil semua value dari array.</li>
                <li><b><q>asort()</q></b> berfungsi untuk mengurutkan array secara ascending, dari terkecil ke terbesar.</li>
                <li><b><q>arsort()</q></b> berfungsi untuk mengurutkan dari yang terbesar ke yang terkecil.</li>
                <li><b><q>ksort()</q></b> berfungsi untuk mengurutkan key secara ascending.</li>
                <li><b><q>krsort()</q></b> berfungsi untuk mengurutkan key secara descending.</li>
                <li><b><q>array_merge()</q></b> berfungsi untuk menggabungkan array.</li>
                <li><b><q>array_push()</q></b> berfungsi untuk menambahkan element pada array.</li>
                <li><b><q>array_pop()</q></b> berfungsi untuk menghapus element terakhir dari array.</li>
                <li><b><q>min()</q></b> berfungsi untuk mencari nilai minimal.</li>
                <li><b><q>max()</q></b> berfungsi untuk mencari nilai maksimal.</li>
              </ul>
              <p class="mb-0">Penggunaan fungsi <b><q>count()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian'];
  echo count($buah); // 5
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>in_array()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian'];
  if (in_array('pisang', $buah)) {
    echo 'buah pisang ada dalam daftar buah';
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>key_exists()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $murid = ['nama' => 'Saleh', 'kelas' => 'XII', 'jurusan' => 'RPL', 'jenis_kelamin' => 'Laki-laki'];
  if (key_exists('nama', $murid)) {
    echo $murid['nama'];
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>array_keys()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $murid = ['nama' => 'Saleh', 'kelas' => 'XII', 'jurusan' => 'RPL', 'jenis_kelamin' => 'Laki-laki'];
  $keys = array_keys($murid);
  print_r($keys); // Array ( [0] => nama [1] => kelas [2] => jurusan [3] => jenis_kelamin )
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>array_values()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $murid = ['nama' => 'Saleh', 'kelas' => 'XII', 'jurusan' => 'RPL', 'jenis_kelamin' => 'Laki-laki'];
  $values = array_values($murid);
  print_r($values); // Array ( [0] => Saleh [1] => XII [2] => RPL [3] => Laki-laki )
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/5"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>asort()</q></b> & <b><q>arsort()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian'];
  asort($buah);
  print_r($buah); // Array ( [1] => anggur [0] => apel [4] => durian [2] => pisang [3] => rambutan )
  echo "&lt;hr&gt;";
  arsort($buah);
  print_r($buah); // Array ( [3] => rambutan [2] => pisang [4] => durian [0] => apel [1] => anggur )
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/6"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>ksort()</q></b> & <b><q>krsort()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $murid = ['nama' => 'Saleh', 'kelas' => 'XII', 'jurusan' => 'RPL', 'jenis_kelamin' => 'Laki-laki'];
  ksort($murid);
  print_r($murid); // Array ( [jenis_kelamin] => Laki-laki [jurusan] => RPL [kelas] => XII [nama] => Saleh )
  echo "&lt;hr&gt;";
  krsort($murid);
  print_r($murid); // Array ( [nama] => Saleh [kelas] => XII [jurusan] => RPL [jenis_kelamin] => Laki-laki )
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/7"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>array_merge()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $buah_1 = ['apel', 'anggur', 'pisang', 'rambutan', 'durian'];
  $buah_2 = ['jeruk', 'kurma', 'nanas'];
  $buah = array_merge($buah_1, $buah_2);
  echo count($buah); // 8
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/8"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>array_push()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian'];
  array_push($buah, 'jeruk');
  echo count($buah); // 6
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/9"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>array_pop()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $buah = ['apel', 'anggur', 'pisang', 'rambutan', 'durian'];
  array_pop($buah);
  echo count($buah); // 4
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/10"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penggunaan fungsi <b><q>min()</q></b> & <b><q>max()</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $nilai = [90, 70, 85, 65, 80];
  $max = max($nilai);
  $min = min($nilai);
  echo $max; // 90
  echo "&lt;hr&gt;";
  echo $min; // 65
?&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/11"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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