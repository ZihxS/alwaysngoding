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
            <h2 class="judul-teori">Perintah "DELETE" Untuk Menghapus Baris Data</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Untuk penghapusan baris (atau disebut juga dengan record) dalam MySQL, kalian memerlukan beberapa syarat, yaitu nama tabel dimana baris atau record tersebut berada, dan kondisi untuk penghapusan tersebut. Berikut adalah format dasar penulisan perintah DELETE:</p>
              <pre class="language-sql"><code>DELETE FROM nama_tabel WHERE kondisi;</code></pre>
              <ul class="mb-2">
                <li><b>nama_tabel</b> adalah nama dari tabel yang record/barisnya akan dihapus.</li>
                <li><b>kondisi</b> adalah kodisi baris yang akan dihapus.</li>
              </ul>
              <blockquote class="catatan-pelajaran mb-2">Perlu diketahui <b><q>kondisi</q></b> di perintah DELETE sama seperti kondisi WHERE pada perintah SELECT dan UPDATE. Kalian bisa menggunakan semua operator perbandingan, operator logika, operator BETWEEN dan bisa juga memnggunakan operator LIKE.</blockquote>
              <p class="mb-0">Langsung saja dengan contoh, misalnya kalian ingin menghapus record/baris untuk murid yang mempunyai nama lengkap <b><q>Lulu</q></b> maka querynya:</p>
              <pre class="language-sql"><code>DELETE FROM murid WHERE nama_lengkap = 'Lulu';</code></pre>
              <p>Perintah di atas adalah perintah untuk menghapus data dari tabel <b><q>murid</q></b> jika kolom <b><q>nama_lengkap</q></b> nya berisi <b><q>Lulu</q></b>.</p>
              <p>Kunci dari query DELETE adalah pernyataan kondisi setelah WHERE, yaitu dimana kalian memberitahukan kepada MySQL syarat/kondisi yang harus dipenuhi untuk menghapus suatu record/barisnya.</p>
              <p class="mb-0">Sebagai contoh kedua, jika kalian ingin menghapus suatu record/baris dari tabel <b><q>murid</q></b> jika kolom <b><q>nama_lengkap</q></b> nya berisi <b><q>Agus Steven</q></b> atau berisi <b><q>Indra</q></b>, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>DELETE FROM murid WHERE nama_lengkap = 'Agus Steven' OR nama_lengkap = 'Indra';</code></pre>
              <p class="mb-0">Sebagai contoh ketiga, jika kalian ingin menghapus suatu record/baris dari tabel <b><q>murid</q></b> jika kolom <b><q>kelas</q></b> nya berisi <b><q>X</q></b> dan kolom <b><q>jurusan</q></b> nya berisi <b><q>Multimedia</q></b>, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>DELETE FROM murid WHERE kelas = 'X' AND jurusan = 'Multimedia';</code></pre>
              <p class="mb-0">Sebagai contoh keempat, jika kalian ingin menghapus suatu record/baris dari tabel <b><q>murid</q></b> jika kolom <b><q>nama_lengkap</q></b> nya mengandung huruf <b><q>nur</q></b>, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>DELETE FROM murid WHERE nama_lengkap LIKE '%nur%';</code></pre>
              <p class="mb-2">Data pada tabel <b><q>murid</q></b> (sebelum 4 perintah di atas dijalankan):</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Data pada tabel <b><q>murid</q></b> (sesudah 4 perintah di atas dijalankan):</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Jika kalian ingin menghapus semua data dari tabel <b><q>murid</q></b>, maka perintahnya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>-- Cara 1
DELETE FROM murid;

-- Cara 2
TRUNCATE TABLE murid;</code></pre>
              <p class="mb-0">Secara internal, TRUNCATE dijalankan dengan cara menghapus tabel lalu membuat ulang tabel itu kembali. Cara ini akan lebih cepat dari pada perintah DELETE yang menghapus baris satu persatu. Perbedaan kecepatan eksekusi ini baru terasa jika tabel sudah memiliki jumlah record/baris yang banyak.</p>
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