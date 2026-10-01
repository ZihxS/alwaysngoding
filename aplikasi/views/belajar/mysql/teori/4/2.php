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
            <h2 class="judul-teori">Fungsi dan Pengertian Primary Key</h2>
            <hr>
            <div class="konten-teori">
              <p>Primary key dapat diartikan sebagai kolom yang berisi nilai unik, berfungsi sebagai <b>identitas untuk membedakan setiap record</b> yang ada pada tabel (pembeda data). Misalnya, dalam sebuah database sekolah terdapat 3 orang murid berbeda namun sama-sama mempunyai nama <q>Ahmad Maulana</q>. Bagaimana cara membedakan antara ketiga data tersebut? tentu menggunakan primary key.</p>
              <p>Meski penggunaan primary key pada setiap tabel tidak diwajibkan, akan tetapi dengan adanya primary key akan sangat berpengaruh ketika kalian menjalankan query pada database. Primary key bisa memudahkan kalian saat menjalankan query untuk membaca data, mengubah data dan menghapus data.</p>
              <p class="mb-2">Lalu, bagaimana cara kalian menentukan kolom mana yang merupakan primary key dari sebuah tabel? untuk dapat menentukan kolom primary key pada sebuah tabel, harus memperhatikan beberapa syarat agar sebuah kolom dapat ditentukan (didefinisikan) sebagai primary key, yaitu:</p>
              <ol class="mb-2">
                <li>Data yang ada pada kolom tersebut harus merupakan nilai unik (tidak boleh ada data yang sama).</li>
                <li>Kolom tersebut wajib diisi (tidak boleh kosong).</li>
                <li>Dalam 1 tabel hanya terdapat 1 primary key (tidak bisa lebih dari 1).</li>
              </ol>
              <p class="mb-2">Jika sebuah kolom memenuhi syarat di atas, maka kolom tersebut dapat kalian tentukan (definisikan) sebagai primary key. Berikut adalah beberapa contoh data yang bisa di ibaratkan sebagai primary key:</p>
              <ol class="mb-2">
                <li>Nomor Induk Siswa Nasional (NISN)</li>
                <li>Nomor Induk Pegawai (NIP)</li>
                <li>Nomor Induk Mahasiswa (NIM)</li>
                <li>Nomor Induk Kependudukan (NIK)</li>
              </ol>
              <p class="mb-0">Kalian juga bisa membuat kolom primary key dengan cara kalian sendiri dengan memanfaatkan atribut tipe data <b><q>AUTO_INCREMENT</q></b>, misalnya kalian mempunyai tabel <b><q>transaksi</q></b> lalu kalian menambahkan kolom <b><q>id_transaksi</q></b> dengan tipe data <b><q>INT</q></b> dan menambahkan atribut <b><q>AUTO_INCREMENT</q></b> lalu mendefinisikannya sebagai <b>PRIMARY KEY</b>, jadi setiap ada data baru yang di masukkan ke tabel tersebut maka kolom <b><q>id_transaksi</q></b> valuenya akan terus bertambah 1 (value kolom <b><q>id_transaksi</q></b> terakhir + 1) secara otomatis (jadi tidak akan ada data pada kolom <b><q>id_transaksi</q></b> yang duplikat).</p>
              <pre class="language-sql line-numbers" data-line="2"><code>CREATE TABLE karyawan (
    id_karyawan INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_depan VARCHAR(255) NOT NULL,
    nama_belakang VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    alamat TEXT NOT NULL
);</code></pre>
              <p class="mb-0">Tidak asingkan dengan query di atas?, silahkan perhatikan baris ke 2 pada query di atas. Tanpa kalian sadari, kalian sudah melihat contoh kolom primary key yang ditentukan (didefinisikan) berkat bantuan atribut tipe data <b><q>AUTO_INCREMENT</q></b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>