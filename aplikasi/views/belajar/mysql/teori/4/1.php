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
  $x = str_replace('Create Read Update Delete Mysql','CRUD MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/create-read-update-delete-mysql';
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
            <h2 class="judul-teori">CRUD MySQL</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-2">CRUD adalah akronim untuk <b>Create</b>, <b>Read</b>, <b>Update</b> dan <b>Delete</b>. Operasi CRUD adalah <b>manipulasi data dasar untuk database</b>. Jadi kalian bisa menambahkan data kedalam tabel pada database [create], bisa mengambil atau membaca data di suatu tabel pada database [read] (kalian sudah mempelajarinya sedikit di bagian perintah dasar mysql), bisa mengubah data yang sudah ada [update], dan menghapus data apabila data ingin dihapus [delete].</p>
              <ul class="mb-2">
                <li><big><b>C</b></big>reate: Menambah data kedalam tabel yang ada pada database.</li>
                <li><big><b>R</b></big>ead: Membaca data di tabel yang ada pada database.</li>
                <li><big><b>U</b></big>pdate: Mengubah data yang sudah ada di tabel pada database.</li>
                <li><big><b>D</b></big>elete: Menghapus data yang sudah ada di tabel pada database.</li>
              </ul>
              <p>Di bagian ini kalian akan belajar lebih banyak tentang query SQL <b><q>SELECT</q></b> (untuk membaca data), Lalu kalian akan mempelajari query SQL <b><q>INSERT</q></b> (untuk menambah data), kalian juga akan mempelajari query SQL <b><q>UPDATE</q></b> (untuk mengubah data), dan kalian akan mempelajari query SQL <b><q>DELETE</q></b> (untuk menghapus data).</p>
              <p class="mb-0">Sebelum ketahap selanjutnya silahkan kalian jalankan query di bawah ini yaa (pastikan menjalankan querynya di luar database):</p>
              <pre class="language-sql"><code>CREATE DATABASE IF NOT EXISTS sekolah;</code></pre>
              <p class="mb-0">Setelah menjalankan query di atas silahkan kalian klik menu database <b><q>sekolah</q></b> di sidebar phpmyadmin, lalu jalankan query di bawah ini:</p>
              <pre class="language-sql"><code>CREATE TABLE murid (
  nisn CHAR(10) NOT NULL PRIMARY KEY,
  nama_lengkap VARCHAR(50) NOT NULL,
  jenis_kelamin ENUM('Laki-laki','Perempuan') NOT NULL,
  tanggal_lahir DATE NOT NULL,
  kelas VARCHAR(25) NOT NULL DEFAULT "X",
  jurusan ENUM('Multimedia','Rekayasa Perangkat Lunak','Teknik Komputer dan Jaringan') DEFAULT "Rekayasa Perangkat Lunak",
  tahun_angkatan YEAR(4) NOT NULL,
  tabungan INT DEFAULT 0
);

-- tambah 13 data ke tabel murid
INSERT INTO murid (nisn, nama_lengkap, jenis_kelamin, tanggal_lahir, kelas, jurusan, tahun_angkatan, tabungan) VALUES
('5568080253', 'Indra', 'Laki-laki', '2001-01-02', 'XI', 'Rekayasa Perangkat Lunak', '2017', '525000'),
('5773608787', 'Agysna', 'Laki-laki', '2000-02-06', 'XI', 'Multimedia', '2016', '2546500'),
('2814904080', 'Angga Nur Fadilah', 'Laki-laki', '2000-08-11', 'XII', 'Teknik Komputer dan Jaringan', '2015', '500000'),
('5353675639', 'Dimas Marwahyu', 'Laki-laki', '1999-06-22', 'XII', 'Multimedia', '2014', '0'),
('7483138375', 'Fathul Aditya', 'Laki-laki', '2001-05-05', 'XII', 'Rekayasa Perangkat Lunak', '2017', '1500'),
('7647106701', 'Fathia Rahmania', 'Perempuan', '1997-07-22', 'XII', 'Multimedia', '2014', '0'),
('1906400153', 'Lulu', 'Perempuan', '1998-12-15', 'XI', 'Multimedia', '2015', '12500'),
('9036697177', 'Atsilah Sahl', 'Perempuan', '2001-08-11', 'XII', 'Multimedia', '2018', '100000'),
('9996332502', 'Nabila Putri', 'Perempuan', '1999-07-28', 'X', 'Teknik Komputer dan Jaringan', '2016', '9875000'),
('3188396614', 'Nurul Aulia', 'Perempuan', '2002-07-07', 'XI', 'Rekayasa Perangkat Lunak', '2018', '5000'),
('1983286937', 'Syifa Nabila', 'Perempuan', '2000-09-24', 'XII', 'Rekayasa Perangkat Lunak', '2018', '80505'),
('9880764918', 'Anisa Hadyana', 'Perempuan', '1995-03-19', 'XI', 'Rekayasa Perangkat Lunak', '2015', '9898500'),
('3511716679', 'Seva Aditya', 'Laki-laki', '1996-11-27', 'XI', 'Multimedia', '2016', '1000');</code></pre>
              <blockquote class="catatan-pelajaran">Kalian akan mempelajari fungsi dari primary key di bagian selanjutnya.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>