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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Spread Operator</h2>
            <hr>
            <div class="konten-teori">
              <p>Spread operator berguna untuk memecah iterables menjadi single element (elemen tunggal). Syntax atau object atau tipe data yang mendukung iterasi (bisa diakses menggunakan index) disebut iterables.</p>
              <p>Kita bisa mengakses string dan array menggunakan index, oleh karena itu string dan array bisa disebut iterables.</p>
              <p class="mb-0">Contoh penggunaan spread operator pada string:</p>
              <pre class="language-javascript line-numbers"><code>let nama = 'Solahudin';

// tidak menggunakan spread operator
console.log(nama);

// menggunakan spread operator
console.log(...nama);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Di baris terakhir pada kode di atas kita menggunakan spread operator dan output yang dihasilkan pada console adalah <q>S o l a h u d i n</q>, jadi string yang ada pada variabel <q>nama</q> dipecah menggunakan spread operator.</p>
              <p class="mb-0">Untuk lebih jelasnya kalian bisa melihat contoh penggunaan spread operator pada array:</p>
              <pre class="language-javascript line-numbers"><code>let karyawan = ['Ami', 'Ahmad', 'Ferdy'];

// tidak menggunakan spread operator
console.log(karyawan);

// menggunakan spread operator
console.log(...karyawan);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Di baris terakhir pada kode di atas kita menggunakan spread operator dan output yang dihasilkan pada console adalah <q>Ami Ahmad Ferdy</q>, jadi array yang ada pada variabel <q>karyawan</q> dipecah menggunakan spread operator.</p>
              <p class="mb-0">Kita bisa menggabungkan array menggunakan spread operator, dan dengan cara ini kita bisa menggabungkan array dengan lebih fleksibel daripada menggunakan method <code class="custom">concat()</code>, perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>let muridIPA = ['Jono', 'Joni', 'Johan', 'Mariam', 'Mona'];
let muridIPS = ['Isan', 'Zahwar', 'Tiara', 'Sabrina', 'Agoy'];

// menggabungkan array muridIPA dan array muridIPS ke array murid
let murid = [...muridIPA, ...muridIPS];

console.log(murid);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Contoh lain:</p>
              <pre class="language-javascript line-numbers"><code>let muridIPA = ['Jono', 'Joni', 'Johan', 'Mariam', 'Mona'];
let muridIPS = ['Isan', 'Zahwar', 'Tiara', 'Sabrina', 'Agoy'];

let murid = [...muridIPA, 'Junaedi', ...muridIPS, 'Mulyana', 'Mulyono'];

console.log(murid);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/4?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kita juga bisa menggunakan spread operator untuk menyalin string atau array dari satu variabel ke variabel lain:</p>
              <pre class="language-javascript line-numbers"><code>let a = [1, 2, 3, 4, 5];
let b = [...a]; // menyalin isi variabel a ke variabel b

console.log(a);
console.log(b);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/5?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Spread operator akan benar-benar terasa berguna jika kalian membuat suatu program yang kompleks atau saat kalian menggunakan framework javascript.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 9], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>