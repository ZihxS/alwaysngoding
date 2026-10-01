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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/function-pada-php';
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
            <h2 class="judul-teori">Pengertian Fungsi (Function) Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Dalam merancang kode program terkadang kita sering membuat kode untuk melakukan tugas yang sama secara berulang-ulang, seperti membaca tabel dari database, menampilkan penjumlahan, dan lain-lain. Atau singkatnya Fungsi adalah <b>sekumpulan intruksi yang dibungkus dalam sebuah blok</b>. Tugas yang sama ini akan lebih efektif jika dipisahkan dari program utama dan dirancang menjadi sebuah fungsi.</p>
              <p>Fungsi (Function) dalam bahasa pemrograman adalah <b>kode program yang dirancang untuk menyelesaikan sebuah tugas tertentu, dan merupakan bagian dari program utama</b>. Kalian dapat membuat fungsi sendiri, atau menggunakan fungsi yang dibuat oleh programmer lain.</p>
              <p>Dalam dunia pemrograman terdapat istilah <b><q>lazy programming</q></b> yang artinya bukanlah programmer yang malas. Tetapi, daripada membuat kode program umum dari dasar, kalian bisa menggunakan fungsi yang telah dibuat oleh programmer lain. PHP bahkan <b><q>menyediakan ribuan fungsi bawaan</q></b> yang tersedia untuk membantu kalian dalam merancang program.</p>
              <p>Mengetahui cara penggunaan fungsi ini akan menghemat waktu pembuatan program dan membuat kode program menjadi lebih efisien. <b><q>Lazy programming is smart programming</q></b>.</p>
              <p>Menggunakan fungsi dalam teori pemrograman sering juga disebut dengan istilah <b><q>memanggil fungsi</q></b> (calling a function). Fungsi dipanggil dengan menulis nama dari fungsi tersebut dan diikuti dengan argumen (jika ada). Argumen ditulis di dalam tanda kurung, dan jika jumlah argumen lebih dari satu, maka diantaranya dipisahkan oleh karakter koma.</p>
              <p>Setelah memproses nilai inputan, hampir semua fungsi akan memberikan <b><q>nilai hasil</q></b> pemrosesan tersebut (walaupun ada fungsi yang tidak memberikan nilai). Cara fungsi memberikan nilainya ini sering disebut dengan <b><q>mengembalikan nilai</q></b> (return a value). Nilai yang dikembalikan oleh sebuah fungsi dapat ditampung ke dalam variabel, atau langsung ditampilkan ke web browser.</p>
              <p>Sebuah fungsi dalam memproses data kadang memerlukan beberapa inputan atau nilai masukan. Inputan inilah yang dimaksud dengan <b><q>argumen</q></b>. Sebuah fungsi bisa membutuhkan 1, 2, atau 5 argumen, namun bisa juga tidak memerlukan argumen sama sekali.</p>
              <p class="mb-0">Parameter adalah sebutan lain untuk argumen. Perbedaannya, parameter merujuk kepada inputan fungsi pada saat pendefinisian fungsi tersebut, sedangkan agrumen adalah sebutan untuk inputan fungsi pada saat pemanggilan fungsi.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>