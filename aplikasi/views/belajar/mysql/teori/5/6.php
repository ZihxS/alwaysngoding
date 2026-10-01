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
  $u = 'belajar-mysql/teori/penggabungan-tabel-pada-mysql';
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
            <h2 class="judul-teori">LEFT JOIN</h2>
            <hr>
            <div class="konten-teori">
              <p>LEFT JOIN atau biasa juga dikenal dengan LEFT OUTER JOIN merupakan perintah penggabungan tabel untuk menampilkan semua data sebelah kiri dari tabel yang di gabungkan dan menampilkan data sebelah kanan yang cocok dengan kondisi penggabungan. Jika tidak ditemukan kecocokan, maka akan di-set NULL (di cetak NULL) secara otomatis.</p>
              <p class="mb-0">Berikut adalah contoh penulisan perintah LEFT JOIN:</p>
              <pre class="language-sql"><code>SELECT * FROM tabel_1 LEFT JOIN tabel_2 ON tabel_1.kolom_terkait = tabel_2.kolom_terkait;</code></pre>
              <p class="mb-0">Berikut adalah contoh perintah LEFT JOIN:</p>
              <pre class="language-sql"><code>SELECT * FROM karyawan LEFT JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Baris yang ditampilkan sebanyak 6 baris, karena LEFT JOIN akan menampilkan semua tabel sebelah kiri dari kondisi join yaitu tabel <b><q>karyawan</q></b>. Semua data pada tabel <b><q>karyawan</q></b> akan ditampilkan, meskipun tidak ada kecocokan key pada tabel <b><q>gaji</q></b> (nilai akan otomatis di-set menjadi NULL).</p>
              <p class="mb-2">Berikut adalah visualisasi diagramnya LEFT JOIN:</p>
              <a href="<?= base_url("media/belajar/mysql/left.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/belajar/mysql/left.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-block mb-2" style="width: 400px;"></a>
              <p class="mb-0">Selain kondisi di atas, LEFT JOIN juga bisa menampilkan data hanya jika kondisi key pada tabel tamunya (foreign key) tidak ada (NULL). Perhatikan perintah di bawah ini:</p>
              <pre class="language-sql"><code>SELECT * FROM karyawan LEFT JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan WHERE gaji.id_karyawan IS NULL;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Syntax <b><q>IS</q></b> di atas adalah syntax pengganti operator <b><q>=</q></b> apabila kalian ingin membandingkan suatu kolom dengan <b><q>NULL</q></b>. Jika kalian menuliskan syntax <b>"gaji.id_karyawan = NULL"</b> di atas maka hasil data atau output <b>tidak akan muncul</b>.</blockquote>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Berikut adalah visualisasi diagram LEFT JOIN, jika kondisinya sama seperti di atas:</p>
              <a href="<?= base_url("media/belajar/mysql/left-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/belajar/mysql/left-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-block mb-2" style="width: 400px;"></a>
              <p class="mb-0">Ingat LEFT JOIN ini sangat penting untuk kalian pahami, karena disaat kalian mulai mengerjakan proyek yang cukup kompleks, maka kalian akan banyak berkutat dengan LEFT JOIN ini. Contoh pada kasus di atas, hanya dengan memanfaatkan left join kalian bisa menampilkan data karyawan yang sudah ada gajinya dan data karyawan yang belum ada gajinya.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>