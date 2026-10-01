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
  $x = str_replace('Pbo','PBO',$x);
  $x = str_replace('Oop','(OOP)',$x);
  $u = 'belajar-php/teori/pbo-oop-pada-php';
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
            <h2 class="judul-teori">Pemrograman Berorientasi Objek Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Pemrograman Berorientasi Objek (PBO) atau Object Oriented Programming (OOP) adalah <b>sebuah tata cara pembuatan program dengan menggunakan konsep <q>objek</q> yang memiliki data (atribut yang menjelaskan tentang objek) dan prosedur (function) yang dikenal dengan method</b>.</p>
              <p>Dalam pengertian sederhananya, OOP adalah <b>konsep pembuatan program dengan memecah permasalahan program dengan menggunakan objek</b>. Objek dapat diumpamakan dengan <b><q>fungsi khusus</q></b> yang bisa berdiri sendiri. Untuk membuat sebuah aplikasi, berbagai objek akan saling bertukar data untuk mencapai hasil akhir.</p>
              <p>Berbeda dengan konsep fungsi atau <b><q>function</q></b> di dalam pemrograman, sebuah objek bisa memiliki data dan function tersendiri. Setiap objek ditujukan untuk mengerjakan sebuah tugas, dan menghasilkan nilai akhir untuk selanjutnya dapat ditampilkan atau digunakan oleh objek lain.</p>
              <p>Dalam studi pemrograman, <b>pembuatan program dalam PHP tanpa menggunakan objek disebut juga dengan pemrograman prosedural atau pemrograman fungsional</b>. Dikenal dengan pemrograman prosedural, karena kita memecah kode program menjadi bagian-bagian atau fungsi-fungsi kecil, kemudian menyatukannya untuk menghasilkan nilai akhir.</p>
              <p>Keuntungan pemrograman berorientasi objek baru terasa ketika program tersebut telah <b><q>besar</q></b> atau kita bekerja dengan tim untuk membagi tugas. Konsep <b><q>objek</q></b> untuk memisahkan program menjadi bagian-bagian yang berdiri sendiri akan memudahkan dalam membuat program.</p>
              <p class="mb-0">Pembuatan website modern saat ini akan lebih mudah jika menggunakan template kode program yang dikenal dengan framework. Daripada kalian membuat situs mulai dari awal lebih baik menggunakan framework karena akan mempercepat proses kerja. <b>Framework PHP hampir semuanya dibuat menggunakan OOP</b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>