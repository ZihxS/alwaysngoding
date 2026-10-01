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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/lebih-banyak-tentang-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">CSS Media Queries</h2>
            <hr>
            <div class="konten-teori">
              <p>Media Queries merupakan <b>sebuah teknik CSS layout yang dapat digunakan untuk mengatur tampilan dari layout berbeda untuk setiap device</b> (perangkat). Dengan menggunakan media queries ini kalian dapat dengan <b>bebas untuk menyeting tampilan</b> dengan CSS di berbagai resolusi dan lebar, tinggi daripada browser yang sedang kalian gunakan secara spesifik.</p>
              <p>Lebih mudah dipahami dengan menggunakan Media Queries ini kalian dapat mengatur sebuah tampilan website berbeda-beda untuk setiap perangkat. Contoh jika kalian membuat sebuah website dengan resolusi layar PC dengan backgroundnya berwarna putih maka pada perangkat yang resolusi layar tablet kalian dapat membuat backgroundnya berwana biru. Bukan hanya background kalian juga dapat mengubah semua property yang kalian inginkan baik itu lebar, tinggi, warna, padding, margin dll.</p>
              <p class="mb-0">Dalam penggunaan media queries ada dua cara, diantaranya kalian dapat menggunakan media queries di atribut media pada tag link dan menggunakan media queries langsung pada file CSS. Contoh kedua metode tersebut dapat dilihat pada kode berikut ini:</p>
              <pre class="language-html line-numbers" data-line="5,7,8"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;link rel="stylesheet" media="(min-width: 768px) and (max-width: 991px)" href="tablet.css"&gt;
    &lt;link rel="stylesheet" media="(min-width: 480px) and (max-width: 767px)" href="mobile.css"&gt;
  &lt;/head&gt;
  &lt;body&gt;&lt;/body&gt;
&lt;/html&gt;</code></pre>
              <pre class="language-css line-numbers"><code>@media (min-width: 480px) and (max-width: 767px) {
  body {
    background-color: red;
  }
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada kotak kode yang pertama adalah <b>cara menggunakan Media Queries di atribut media pada tag link</b>. Dibaris ke 5 adalah kode wajib yang harus kalian cantumkan jika kalian ingin bekerja dengan website responsive. Dibaris ke 6 kita mengatur style tablet.css hanya di gunakan jika lebar web browser minimal 768 pixel dan maksimal 991 pixel. Dibaris ke 7 kita mengatur style mobile.css hanya di gunakan jika lebar web browser minimal 480 pixel dan maksimal 767 pixel.</p>
              <p class="mb-0">Pada kotak kode yang kedua adalah <b>cara menggunakan Media Queries langsung pada file CSS</b>. Dibaris pertama kita mengatur aturan, aturannya adalah jika lebar web browser minimal 480 pixel dan maksimal 767 pixel. Jika web browser memenuhi aturan/syaratnya, maka background pada halaman menjadi warna merah. Jika tidak memenuhi autran/syarat, maka tidak terjadi apapun.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>