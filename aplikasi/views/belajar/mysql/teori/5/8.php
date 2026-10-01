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
            <h2 class="judul-teori">RIGHT JOIN</h2>
            <hr>
            <div class="konten-teori">
              <p>Kebalikan dari LEFT JOIN adalah RIGHT JOIN, atau biasa juga dikenal dengan RIGHT OUTER JOIN. RIGHT JOIN akan menampilkan semua data yang ada di tabel sebelah kanan dan mencari kecocokan key pada tabel sebelah kiri. Jika tidak ditemukan kecocokan, maka akan di-set NULL (di cetak NULL) secara otomatis.</p>
              <p class="mb-0">Berikut adalah contoh penulisan perintah RIGHT JOIN:</p>
              <pre class="language-sql"><code>SELECT * FROM tabel_1 RIGHT JOIN tabel_2 ON tabel_1.kolom_terkait = tabel_2.kolom_terkait;</code></pre>
              <p class="mb-0">Berikut adalah contoh perintah RIGHT JOIN:</p>
              <pre class="language-sql"><code>SELECT * FROM gaji RIGHT JOIN karyawan ON gaji.id_karyawan = karyawan.id_karyawan;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Pada output di atas, kalian dapat melihat bahwa terdapat NULL pada tabel sebelah kiri. Hal ini dikarenakan tidak ditemukan kecocokan key diantara kedua tabel.</p>
              <p class="mb-2">Berikut adalah visualisasi diagramnya RIGHT JOIN:</p>
              <a href="<?= base_url("media/belajar/mysql/right.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/belajar/mysql/right.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-block mb-2" style="width: 400px;"></a>
              <p class="mb-0">Selain kondisi di atas, RIGHT JOIN juga bisa menampilkan data hanya jika kondisi key pada tabel tamunya (foreign key) tidak ada (NULL). Perhatikan perintah di bawah ini:</p>
              <pre class="language-sql"><code>SELECT * FROM gaji RIGHT JOIN karyawan ON gaji.id_karyawan = karyawan.id_karyawan WHERE gaji.id_karyawan IS NULL;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Syntax <b><q>IS</q></b> di atas adalah syntax pengganti operator <b><q>=</q></b> apabila kalian ingin membandingkan suatu kolom dengan <b><q>NULL</q></b>. Jika kalian menuliskan syntax <b><q>gaji.id_karyawan = NULL</q></b> di atas maka hasil data atau output <b>tidak akan muncul</b>.</blockquote>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-2">Berikut adalah visualisasi diagram RIGHT JOIN, jika kondisinya sama seperti di atas:</p>
              <a href="<?= base_url("media/belajar/mysql/right-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/belajar/mysql/right-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-block mb-2" style="width: 400px;"></a>
              <p>Perhatikan diagram RIGHT JOIN di atas, dan bandingkan dengan diagram LEFT JOIN di bagian sebelumnya.</p>
              <p class="mb-0">LEFT JOIN dan RIGHT JOIN sebenarnya tidak jauh berbeda, jika kalian perhatikan contoh perintah LEFT JOIN dengan RIGHT JOIN hanya di bolak-balik saja seperti berikut:</p>
              <pre class="language-sql"><code>-- contoh LEFT JOIN
SELECT * FROM <mark class="keep">karyawan</mark> LEFT JOIN <mark class="keep">gaji</mark> ON <mark class="keep">karyawan.id_karyawan</mark> = <mark class="keep">gaji.id_karyawan</mark>; -- karyawan adalah tabel kiri, gaji adalah tabel kanan

-- contoh RIGHT JOIN
SELECT * FROM <mark class="keep">gaji</mark> RIGHT JOIN <mark class="keep">karyawan</mark> ON <mark class="keep">gaji.id_karyawan</mark> = <mark class="keep">karyawan.id_karyawan</mark>; -- gaji adalah tabel kiri, karyawan adalah tabel kanan</code></pre>
              <p class="mb-0">Kalian dapat menyimpulkan seperti berikut:</p>
              <ol class="mb-0">
                <li>Tabel yang didefinisikan pertama setelah syntax <b><q>FROM</q></b> adalah tabel sebelah kiri.</li>
                <li>Tabel yang didefinisikan kedua adalah tabel sebelah kanan.</li>
              </ol>
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