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
  $p = $b-1; // Sebelumnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/tipe-data-pada-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Atribut Tipe Data</h2>
            <hr>
            <div class="konten-teori">
              <p>Untuk pembuatan sebuah tabel dalam MySQL, selain mendefinisikan tipe data, kalian juga dapat mendefinisikan atribut dari tipe data tersebut. Sebelum kalian menyelam untuk mengetahui semua tipe data MySQL alangkah baiknya kalian memahami dan mengetahui terlebih dahulu atribut-atribut untuk tipe data pada MySQL. Karena nantinya kalian akan sering menggunakan atribut-atribut pada tipe data kalian.</p>
              <p>Atribut tipe data adalah <b>aturan yang kalian terapkan untuk sebuah kolom</b>. MySQL memiliki banyak atribut tipe data, namun dalam pembelajaran ini kalian hanya membahas atribut tipe data yang paling umum digunakan, yakni: <b>AUTO_INCREMENT</b>, <b>BINARY</b>, <b>DEFAULT</b>, <b>NOT NULL</b>, <b>NULL</b>, <b>SIGNED</b>, <b>UNSIGNED</b>, dan <b>ZEROFILL</b>.</p>
              <hr>
              <h4>Atribut AUTO_INCREMENT</h4>
              <p>Atribut AUTO_INCREMENT digunakan untuk tipe data numerik (biasanya tipe data INT), dimana jika kalian menetapkan sebuah kolom dengan atribut AUTO_INCREMENT, maka setiap kali kalian menginputkan data, nilai pada kolom ini akan <b>bertambah 1</b>. Nilai pada kolom tersebut juga akan bertambah jika kalian input dengan NULL atau nilai 0.</p>
              <p>Pada sebuah tabel, <b>hanya 1 kolom</b> yang dapat dikenai atribut AUTO_INCREMENT. Setiap kolom AUTO_INCREMENT juga akan dikenakan atribut NOT NULL secara otomatis. Kolom AUTO_INCREMENT juga harus digunakan sebagai <b>KEY</b> (biasanya PRIMARY KEY).</p>
              <hr>
              <h4>Atribut BINARY</h4>
              <p>Atribut BINARY digunakan untuk tipe data huruf, seperti <b>CHAR</b> dan <b>VARCHAR</b>. Tipe data CHAR, VARCHAR dan TEXT tidak membedakan antara huruf besar dan kecil (case-insensitive), namun jika diberikan atribut BINARY, maka kolom tersebut <b>akan membedakan</b> antara huruf besar dan kecil (case-sensitive).</p>
              <hr>
              <h4>Atribut DEFAULT</h4>
              <p>Atribut DEFAULT dapat digunakan pada hampir semua tipe data. Fungsinya <b>untuk menyediakan nilai bawaan</b> untuk kolom seandainya tidak ada data yang diinput kepada kolom tersebut.</p>
              <hr>
              <h4>Atribut NOT NULL</h4>
              <p>Atribut NOT NULL dapat digunakan pada hampir semua tipe data, Fungsinya <b>untuk memastikan bahwa nilai pada kolom tersebut tidak boleh kosong</b>. Jika kalian menginput data, namun tidak memberikan nilai untuk kolom tersebut, akan menghasilkan error pada MySQL.</p>
              <hr>
              <h4>Atribut NULL</h4>
              <p>Atribut NULL merupakan kebalikan dari NOT NULL, dimana jika sebuah kolom didefinisikan dengan NULL, maka kolom tersebut <b>bisa tanpa nilai atau kosong</b>.</p>
              <hr>
              <h4>Atribut UNSIGNED</h4>
              <p>Atribut UNSIGNED digunakan untuk tipe data numerik, namun berbeda sifatnya untuk tipe data INT, DECIMAL dan FLOAT. Untuk tipe data INT, atribut UNSIGNED berfungsi <b>mengorbankan nilai negatif</b>, untuk mendapatkan jangkauan nilai positif yang <b>lebih tinggi</b>. Namun untuk tipe data DECIMAL dan FLOAT, atribut UNSIGNED hanya akan menghilangkan nilai negatif, tanpa menambah jangkauan data.</p>
              <hr>
              <h4>Atribut SIGNED</h4>
              <p>Atribut SIGNED digunakan untuk tipe data numerik. Berlawanan dengan atribut UNSIGNED, dimana atribut ini berfungsi agar kolom <b>dapat menampung nilai negatif</b>. Atribut SIGNED biasanya dicantumkan hanya untuk menegaskan bahwa kolom tersebut mendukung nilai negatif, karena MySQL sendiri telah menyediakan nilai negatif secara default untuk seluruh tipe numerik.</p>
              <hr>
              <h4>Atribut ZEROFILL</h4>
              <p>Atribut ZEROFILL digunakan untuk tipe data numerik, dimana berfungsi untuk tampilan format data yang akan <b>mengisi nilai 0 di sebelah kiri dari data</b>. Jika kalian menggunakan atribut ZEROFILL untuk suatu kolom, secara otomatis kolom tersebut juga dikenakan attribut UNSIGNED.</p>
              <blockquote class="catatan-pelajaran"><b><q>NULL</q></b> adalah istilah atau tipe data khusus dalam pemrograman yang menyatakan <q>tidak ada nilai</q>, <b><q>NULL</q></b> tidak sama seperti 0 atau <q></q> (string kosong). Operasi matematis dengan <b><q>NULL</q></b> akan menghasilkan nilai <b><q>NULL</q></b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>