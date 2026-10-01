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
              <p class="mb-2">Tabel <b><q>barang</q></b> (untuk keperluan contoh):</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <hr>
              <h4>Fungsi COUNT</h4>
              <p class="mb-0">COUNT merupakan perintah SQL yang berfungsi untuk <b>menghitung record</b> (baris) pada suatu tabel. Berikut contoh penggunaan fungsi COUNT:</p>
              <pre class="language-sql"><code>SELECT COUNT(*) AS 'Total Record' FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi SUM</h4>
              <p class="mb-0">SUM merupakan perintah SQL yang berfungsi untuk <b>menjumlahkan isi kolom</b> (field) yang bernilai angka (INTEGER). Berikut contoh penggunaan fungsi SUM:</p>
              <pre class="language-sql"><code>SELECT SUM(stok) AS 'Jumlah Stok Barang' FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi MIN</h4>
              <p class="mb-0">MIN merupakan perintah SQL yang <b>berfungsi untuk menyeleksi (mengambil) nilai terendah (minimum)</b> dari kolom (field) yang bernilai angka (INTEGER). Berikut contoh penggunaan fungsi MIN:</p>
              <pre class="language-sql"><code>SELECT MIN(harga) AS 'Harga Terendah' FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-4.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi MAX</h4>
              <p class="mb-0">Kebalikan dari MIN yaitu MAX. Jika MIN menyeleksi (mengambil) nilai terendah dari field (kolom) yang bernilai angka (INTEGER). Sedangkan MAX <b>menyeleksi (mengambil) nilai tertinggi (maksimum)</b> dari field (kolom) yang bernilai angka (INTEGER). Adapun contoh penggunaannya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT MAX(harga) AS 'Harga Tertinggi' FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-5.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-5.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi AVG</h4>
              <p class="mb-0">AVG berfungsi untuk <b>mengkalkulasi nilai rata-rata</b> dari kolom (field) yang bernilai angka (INTEGER). Adapun contoh penggunaannya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT AVG(harga) AS 'Harga Rata-rata' FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-6.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-6.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-3"></a>
              <hr>
              <h4>Fungsi FLOOR</h4>
              <p class="mb-0">FLOOR adalah <b>fungsi pembulatan</b> dalam SQL yang akan mengubah bilangan desimal atau bilangan bulat menjadi sesuai dengan bilangan sebelum desimal atau <b>pembulatan ke bawah</b>. Adapun contoh penggunaannya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT FLOOR(5.89) AS 'Contoh 1', FLOOR(5.12) AS 'Contoh 2';</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-7.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-7.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-3">Berapa pun besar bilangan di belakang desimal, itu tidak akan berpengaruh, karena hasilnya tetap akan merujuk pada bilangan utama (membulatkan ke bawah), atau non-pecahannya. Atau dengan kata lain, syntax FLOOR ini adalah menghilangkan setiap angka setelah desimal tidak mempedulikan berapa pun besarannya. Yang tersisa hanyalah bilangan utamanya.</p>
              <hr>
              <h4>Fungsi CEIL</h4>
              <p class="mb-0">Fungsi SQL ini adalah <b>kebalikan dari fungsi FLOOR</b>. Perhatikan contoh berikut:</p>
              <pre class="language-sql"><code>SELECT CEIL(5.89) AS 'Contoh 1', CEIL(5.12) AS 'Contoh 2';</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-8.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-8.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-3">Bila FLOOR bertugas untuk <b><q>menghilangkan</q></b> bilangan setelah desimal-nya saja. Maka CEIL ini memiliki tugas untuk <b>membulatkan bilangan ke angka sesudahnya</b> (membulatkan ke atas). Tidak peduli berapa pun besar dari angka di belakang koma atau titik.</p>
              <hr>
              <h4>Fungsi ROUND</h4>
              <p class="mb-0">ROUND adalah <b>fungsi pembulatan default (mainstream)</b>. Bisa dibilang, penggunaan round merupakan pilihan <b><q>aman</q></b> bagi para programmer yang memang tidak mau ribet. Adapun contoh penggunaannya sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT ROUND(5.89) AS 'Contoh 1', ROUND(5.12) AS 'Contoh 2';</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-9.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-9.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Pembulatan angka di belakang titik/koma akan disesuaikan secara otomatis seperti peraturan matematika pada umumnya. Bila angka di atas 5, maka akan dibulatkan ke bilangan lebih besar (membulatkan ke atas). Bila angka di bawah 5, maka akan dibulatkan ke bilangan lebih kecil (membulatkan ke bawah).</p>
              <p class="mb-0">Contoh penggunaan fungsi FLOOR, CEIL, ROUND untuk membulatkan harga rata-rata barang:</p>
              <pre class="language-sql"><code>SELECT
  FLOOR(AVG(harga)) AS 'Rata-rata (FLOOR)',
  CEIL(AVG(harga)) AS 'Rata-rata (CEIL)',
  ROUND(AVG(harga)) AS 'Rata-rata (ROUND)'
FROM barang;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-10.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-10.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-0"></a>
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