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
              <p>Saat ini, Pemrograman Berorientasi Objek (PBO) atau Object Oriented Programming (OOP) <b>telah menjadi standar dalam dunia pemrograman, termasuk PHP</b>. Walaupun kalian bisa membuat program PHP tanpa menggunakan OOP sama sekali, namun untuk membuat aplikasi <b><q>real world</q></b> yang fleksibel, programmer PHP akan beralih menggunakan OOP.</p>
              <p>Jika kalian telah menguasai pemrograman PHP dasar seperti tipe data, array, dan fungsi. Maka mempelajari pemrograman objek PHP adalah langkah berikutnya. Fitur dan desain kode yang ditawarkan dengan membuat program menggunakan objek akan sangat memudahkan kalian dalam merancang aplikasi website modern dan memiliki fleksibilitas yang tinggi.</p>
              <p>Terlebih jika kalian memang <b><q>serius</q></b> menguasai PHP, memahami pengertian dan cara penggunaan OOP dalam PHP sangat penting. Aplikasi framework PHP seperti CodeIgniter, Yii, Symfony dan Laravel semuanya menggunakan OOP.</p>
              <p class="mb-2">Untuk mempermudah ilustrasi dalam belajar konsep OOP, kita akan ambil contoh pesawat, pesawat adalah sebuah objek. Pesawat itu sendiri terbentuk dari beberapa objek yang lebih kecil lagi seperti mesin, roda, baling-baling, kursi, dll. Pesawat sebagai objek yang terbentuk dari objek-objek yang lebih kecil saling berhubungan, berinteraksi, berkomunikasi dan saling mengirim pesan kepada objek-objek yang lainnya. Begitu juga dengan program, sebuah objek yang besar dibentuk dari beberapa objek yang lebih kecil, objek-objek itu saling berkomunikasi dan saling berkirim pesan kepada objek yang lain.</p>
              <blockquote class="catatan-pelajaran">Website Always Ngoding juga menggunakan dan memanfaatkan PBO (OOP) loh 😄</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>