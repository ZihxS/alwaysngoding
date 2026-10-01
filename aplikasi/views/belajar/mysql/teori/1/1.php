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
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/berkenalan-dengan-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'mysql', 'label' => 'Teori MySQL', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-mysql">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Pengertian Basis Data (Database)</h2>
            <hr>
            <div class="konten-teori">
              <p>Basis data adalah <b>kumpulan data yang terorganisir</b>, yang umumnya <b>disimpan dan diakses secara elektronik dari suatu sistem komputer</b>. Pada saat basis data menjadi semakin kompleks, maka basis data akan dikembangkan dengan teknik perancangan dan pemodelan secara formal.</p>
              <p>Perangkat lunak yang digunakan untuk mengelola dan memanggil query basis data disebut <b>sistem manajemen basis data</b> (database management system, DBMS). Istilah <b>basis data</b> berawal dari <b>ilmu komputer</b>. Basis data terdiri dari kata <b>basis</b> dan <b>data</b>. Basis dapat diartikan sebagai <b>markas</b> atau <b>gudang</b>, sedangkan data adalah <b>catatan atas kumpulan fakta dunia nyata yang mewakili objek</b> seperti manusia, barang, hewan, konsep, peristiwa dan sebagainya yang diwujudkan dalam bentuk huruf, angka, simbol, gambar, teks, audio, video atau kombinasinya.</p>
              <p>Sebuah basis data memiliki <b>penjelasan terstruktur</b> dari jenis fakta yang tersimpan di dalamnya (skema). Skema menggambarkan objek yang diwakili suatu basis data dan hubungan di antara objek tersebut. Ada banyak cara untuk mengorganisasi skema atau memodelkan struktur basis data.</p>
              <p class="mb-0">Model yang umum digunakan sekarang adalah <b>model relasional</b>, yang menurut istilah layman mewakili semua informasi dalam <b>bentuk tabel-tabel yang saling berhubungan</b> di mana setiap tabel <b>terdiri dari baris dan kolom</b> (definisi yang sebenarnya menggunakan terminologi matematika).</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>