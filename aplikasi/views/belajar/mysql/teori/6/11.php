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
  $u = 'belajar-mysql/teori/lebih-banyak-tentang-mysql';
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
            <h2 class="judul-teori">Beberapa Fungsi (Functions) MySQL Yang Sering Digunakan</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-2">Tabel <b><q>murid</q></b> (untuk keperluan contoh):</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi NOW</h4>
              <p class="mb-0">NOW berfungsi untuk <b>mengambil waktu sekarang, yang diambil dari server</b>. NOW memiliki format <b><q>yyyy-MM-dd H:i:s</q></b>. Kalian bisa menggunakan fungsi NOW untuk mengambil waktu sekarang, jika kalian membutuhkannya. Adapun contoh penggunaanya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT NOW() AS 'Waktu Sekarang';</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-3">Kita mengeksekusi perintah di atas pada tanggal 30 Agustus 2020 jam 19:26:02 WIB, jadi yang dihasilkan adalah 2020-08-30 19:26:02.</p>
              <hr>
              <h4>Fungsi DAY</h4>
              <p class="mb-0">DAY merupakan perintah SQL yang berfungsi untuk <b>mengambil hari</b> pada field bertipe data DATE atau DATETIME. Adapun contoh penggunaanya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT nama_lengkap, DAY(tanggal_lahir) AS tanggal_kelahiran from murid;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi MONTH</h4>
              <p class="mb-0">MONTH merupakan perintah SQL yang berfungsi <b>untuk mengambil bulan</b> pada field bertipe data DATE atau DATETIME. Adapun contoh penggunaanya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT nama_lengkap, MONTH(tanggal_lahir) AS bulan_kelahiran from murid;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi YEAR</h4>
              <p class="mb-0">YEAR merupakan perintah SQL yang berfungsi untuk <b>mengambil tahun</b> pada field bertipe data DATE atau DATETIME. Adapun contoh penggunaanya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT nama_lengkap, YEAR(tanggal_lahir) AS tahun_kelahiran from murid;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-5.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-5.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi DATE_FORMAT</h4>
              <p class="mb-0">DATE_FORMAT merupakan syntax SQL yang berfungsi untuk <b>mengkostumisasi format tanggal</b>. Adapun contoh penggunaanya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT nama_lengkap, DATE_FORMAT(tanggal_lahir, '%d %M %Y') AS tanggal_lahir from murid;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-6.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-6.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi DATE</h4>
              <p class="mb-0">DATE merupakan syntax SQL yang berfungsi untuk <b>mengambil tanggal</b> dari field bertipe data DATETIME. Adapun contoh penggunaanya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT DATE('2020-08-30 19:26:02') AS 'DATE dari DATETIME';</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-7.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-7.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi CURDATE</h4>
              <p class="mb-0">CURDATE merupakan peritah SQL untuk <b>mengambil tanggal sekarang, yang diambil dari server</b>. Berbeda dengan NOW, CURDATE memiliki format <b><q>yyyy-MM-dd</q></b>. CURDATE sangat bermanfaat dalam pembuatan suatu aplikasi, misalnya kalian ingin menampilkan data tertentu berdasarkan tanggal sekarang. Kalian bisa menggunakan CURDATE untuk melakukan hal itu. Adapun contoh penggunaanya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT CURDATE() AS 'Tanggal Sekarang';</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-8.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-8.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-0"></a>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>