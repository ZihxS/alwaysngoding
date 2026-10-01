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
  $u = 'belajar-php/teori/tipe-data-pada-php';
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
            <h2 class="judul-teori">Tipe Data Array</h2>
            <hr>
            <div class="konten-teori">
              <p>Selain mendefinisikan key secara langsung, PHP juga <b>memperbolehkan penulisan array tanpa key</b>, dan key itu <b>secara otomatis akan diurutkan</b> dari nilai 0, 1, 2, dst.</p>
              <p class="mb-0">Berikut adalah contoh pendefinisian array tanpa key:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  // pembuatan array
  $nama = array("Andri", "Joko", "Sukma", "Rina", "Sari");

  // pengaksesan array
  echo $nama[1]; // Joko
  echo "&lt;br&gt;";
  echo $nama[2]; // Sukma
  echo "&lt;br&gt;";
  echo $nama[3]; // Rina
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Perhatikan bahwa sekarang index atau key dari array dimulai dari angka <b><q>0</q></b>, <b><q>bukan 1</q></b>. sehingga <b><q>$nama[1]</q></b> berisi <b><q>Joko</q></b>. Nama <b><q>Andri</q></b> berada di <b><q>$nama[0]</q></b>. Dalam penggunaan array di dalam PHP, konsep <b><q>key</q></b> array dimulai dari angka <b><q>0</q></b> ini sangat penting untuk dipahami.</p>
              <p>Selain menggunakan angka, key dalam PHP dapat berisi string atau boolean. Sedangkan untuk value dapat menyimpan berbagai tipe data seperti integer, float, string, boolean, bahkan array lainnya. Array seperti ini disebut juga dengan istilah <b><q>associate array</q></b> (array asosiatif).</p>
              <p class="mb-0">Berikut contoh penggunaan array dengan kombinasi tipe data:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  // pembuatan array
  $coba = array(
    2      => "Andri",
    "dua"  => "2",
    'tiga' => 3,
    TRUE   => TRUE,
    9      => "sembilan"
  );

  // pengaksesan array
  echo $coba[2]; // Andri
  echo "&lt;br&gt;";
  echo $coba["dua"]; // 2
  echo "&lt;br&gt;";
  echo $coba['tiga']; // 3
  echo "&lt;br&gt;";
  echo $coba[TRUE]; // 1 (TRUE di konversi menjadi 1)
  echo "&lt;br&gt;";
  echo $coba[9]; // sembilan
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Contoh di atas kita membuat array <b><q>$coba</q></b> dengan menggunakan berbagai tipe data untuk key dan value, yaitu dengan tipe data integer, string, dan boolean. Namun jika key didefinisikan dengan tipe data boolean seperti pada baris ke-6, maka secara otomatis PHP <b>akan mengkonversinya menjadi 1</b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>