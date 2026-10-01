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
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/perintah-perintah-dasar-mysql';
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
            <h2 class="judul-teori">Aturan Penulisan Perintah SQL</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Perintah atau query SQL <b>tidak sensitif</b> (insensitive), jadi mau kalian menuliskannya dengan huruf besar semua atau huruf kecil semua bahkan besar kecil hurufnya tidak akan berpengaruh (akan dieksekusi secara normal). Perhatikan contoh di bawah ini:</p>
              <pre class="language-sql"><code>SELECT * FROM karyawan;
Select * froM karyawan;
select * from karyawan;
SeLeCt * FrOm karyawan;
SELECT * FROM KARYAWAN;
Select * froM KaRyAwAn;</code></pre>
              <p class="mb-2">Semua kode di atas akan dijalankan <b>normal</b> seperti biasa (tidak ada error), semua perintah di atas sama-sama <b>mengambil semua data dari tabel <q>karyawan</q></b>.</p>
              <blockquote class="catatan-pelajaran mb-2">Walaupun perintah atau query SQL insensitive tapi untuk penulisan kami sarankan untuk memakai huruf besar untuk perintah SQL dan huruf kecil untuk nama kolom atau nama tabel (contohnya seperti perintah baris pertama).</blockquote>
              <p>Penulisan perintah atau query SQL sangat dibebaskan, kalian bisa menambahkan tab atau menulis di baris baru (selama belum ada titik koma maka tab atau baris baru di anggap sebagai satu spasi). Jadi kalian bisa menuliskan perintah atau query sampai <b>berbaris-baris</b>. Kalian bisa <b>memanfaatkan</b> kelebihan tersebut jika perintah atau query SQL sangat panjang.</p>
              <p class="mb-0">Perhatikan contoh penulisan perintah atau query SQL di bawah ini:</p>
              <pre class="language-sql line-numbers"><code>-- Contoh 1
SELECT *
FROM karyawan;

-- Contoh 2
SELECT
*
FROM
karyawan;

-- Contoh 3
SELECT   *   FROM   karyawan;

-- Contoh 4
CREATE TABLE karyawan (
    id_karyawan INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_depan VARCHAR(255) NOT NULL,
    nama_belakang VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    alamat TEXT NOT NULL
);</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Walaupun penulisan perintah atau query SQL bebas seperti di atas, tapi kalian harus menuliskan perintah atau query dengan sangat rapih dan enak untuk dilihatnya.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>