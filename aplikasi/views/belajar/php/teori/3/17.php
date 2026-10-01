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
              <p>Array (atau larik dalam Bahasa Indonesia) <b>bukanlah tipe data dasar seperti integer atau boolen</b>. Array adalah <b>sebuah tipe data bentukan yang terdiri dari kumpulan tipe data lainnya</b>. Menggunakan array akan <b>memudahkan dalam membuat kelompok data</b>, serta menghemat penulisan dan penggunaan variabel.</p>
              <p class="mb-0">Misalnya kita menyimpan 10 nama mahasiswa, maka kode PHP nya jika tanpa menggunakan array adalah sebagai berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $nama_0 = "Andri";
  $nama_1 = "Joko";
  $nama_2 = "Sukma";
  $nama_3 = "Rina";
  $nama_4 = "Sari";
  $nama_5 = "Udin";
  $nama_6 = "Ujang";
  $nama_7 = "Bambang";
  $nama_8 = "Pangestu";
  $nama_9 = "Ahmad";
?&gt;</code></pre>
              <p>Kode PHP seperti di atas tidak salah, tetapi kurang efektif karena kita membuat 10 variabel untuk 10 nama. Bagaimana jika kita butuh 100 nama? maka akan dibutuhkan 100 variabel.</p>
              <p class="mb-0">Pembuatan kode program di atas akan lebih rapi jika ditulis kedalam bentuk array, karena kita hanya membutuhkan 1 variabel saja untuk menampung banyak nilai. Berikut adalah contoh penggunaan array:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $nama = array(
    0 => "Andri",
    1 => "Joko",
    2 => "Sukma",
    3 => "Rina",
    4 => "Sari",
    5 => "Udin",
    6 => "Ujang",
    7 => "Bambang",
    8 => "Pangestu",
    9 => "Ahmad"
  );
?&gt;</code></pre>
              <p class="mb-0">PHP mendukung beberapa cara penulisan array, salah satunya dengan menggunakan konstruktor array PHP (array language construct) sebagai berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $arr = array(
    key_1 => value_1,
    key_2 => value_2,
    key_3 => value_3,
  );
?&gt;</code></pre>
              <p>Komponen array terdiri dari pasangan kunci (key) dan nilai (value). Key adalah penunjuk posisi dimana value disimpan. Perhatikan juga bahwa PHP menggunakan tanda panah <b><q>=></q></b> untuk memberikan nilai kepada key.</p>
              <p>Dalam mengakses nilai dari array, kita menggunakan kombinasi <b><q>$nama_variabel</q></b> dan nilai key-nya, dengan penulisan sebagai berikut: <b><q>$nama_variabel[key]</q></b>.</p>
              <p class="mb-0">Berikut adalah contoh pengaksesan array dalam PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  // pembuatan array
  $nama = array(
    1 => "Andri",
    2 => "Joko",
    3 => "Sukma",
    4 => "Rina",
    5 => "Sari"
  );

  // cara akses array
  echo $nama[1]; // Andri
  echo "&lt;br&gt;";
  echo $nama[2]; // Joko
  echo "&lt;br&gt;";
  echo $nama[5]; // Sari
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Dalam contoh di atas, kita menggunakan angka integer sebagai key (1, 2, 3, 4, 5) dan string sebagai value (Andri, Joko, Sukma, Rina, Sari).</p>
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