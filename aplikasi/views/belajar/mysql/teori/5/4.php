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
            <h2 class="judul-teori">INNER JOIN</h2>
            <hr>
            <div class="konten-teori">
              <p>INNER JOIN adalah tipe penggabungan tabel yang akan kita bahas pertama kali. Tipe penggabungan tabel ini akan mengambil semua baris dari tabel asal dan tabel tujuan dengan kondisi nilai key yang terkait saja, jika tidak terkait maka baris tersebut tidak akan muncul.</p>
              <p class="mb-0">Berikut adalah contoh penulisan perintah INNER JOIN:</p>
              <pre class="language-sql"><code>SELECT * FROM tabel_1 INNER JOIN tabel_2 ON tabel_1.kolom_terkait = tabel_2.kolom_terkait;</code></pre>
              <p class="mb-0">Berikut adalah contoh perintah INNER JOIN:</p>
              <pre class="language-sql"><code>SELECT * FROM karyawan INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Baris yang ditampilkan sebanyak 5 baris, karena INNER JOIN hanya memperhitungkan kondisi key yang terkait antara tabel <b><q>karyawan</q></b> dengan tabel <b><q>gaji</q></b>. Sedangkan karyawan dengan <b><q>id_karyawan = 6</q></b> tidak ditampilkan, karena tidak terkait dengan tabel <b><q>gaji</q></b>.</p>
              <p class="mb-0">Berikut adalah contoh perintah INNER JOIN (mengambil kolom tertentu saja):</p>
              <pre class="language-sql"><code>SELECT karyawan.nama_karyawan, gaji.gaji_pokok FROM karyawan INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan;</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Jadi, kalian hanya mengambil kolom <b><q>nama_karyawan</q></b> dari tabel <b><q>karyawan</q></b> dan kolom <b><q>gaji_pokok</q></b> dari tabel <b><q>gaji</q></b>, yang lainnya tidak ditampilkan oleh kalian. Jadi, untuk penamaan kolom pada query select dengan perintah join kalian harus mencantumkan nama tabel sehabis itu kalian cantumkan <b><q>.</q></b> lalu kalian pilih nama kolom nya (nama_tabel.nama_kolom).</p>
              <p class="mb-2">Berikut adalah visualisasi diagramnya INNER JOIN:</p>
              <a href="<?= base_url("media/belajar/mysql/inner.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/belajar/mysql/inner.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-block" style="width: 400px;"></a>
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