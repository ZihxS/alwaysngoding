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
            <h2 class="judul-teori">Mengganti Tampilan Nama Tabel dan Kolom (Alias)</h2>
            <hr>
            <div class="konten-teori">
              <p>MySQL menyediakan perintah tambahan yaitu <b><q>AS</q></b> untuk mengganti sementara nama tabel atau kolom. Disebut sementara karena pada dasarnya nama tabel tersebut tidak berubah, hanya di ganti pada saat ditampilkan dengan perintah SELECT. Di dalam bahasa SQL, perintah AS ini lebih dikenal sebagai alias dari nama kolom atau tabel yang sebenarnya. Alias ditujukan untuk mempermudah penulisan perintah atau mempercantik tampilan hasil dari perintah.</p>
              <p class="mb-0">Perintah alias (dengan query AS) bukan merupakan query SQL yang dapat berdiri sendiri seperti SELECT, UPDATE, maupun DELETE. AS digunakan sebagai penambahan untuk query SQL lainnya. Berikut adalah format dasar penulisan query alias:</p>
              <pre class="language-sql"><code>… nama_kolom_atau_tabel_asli AS nama_kolom_atau_tabel_alias …</code></pre>
              <p class="mb-0">Perintah AS akan lebih berguna untuk query yang sedikit rumit, seperti penggabungan tabel (JOIN). Perhatikan perbedaan kedua perintah di bawah ini:</p>
              <pre class="language-sql"><code>-- tidak menggunakan alias
SELECT karyawan.nama_karyawan, gaji.gaji_pokok FROM karyawan INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan;

-- menggunakan alias
SELECT k.nama_karyawan, g.gaji_pokok FROM karyawan AS k INNER JOIN gaji AS g ON k.id_karyawan = g.id_karyawan;</code></pre>
              <p>Perhatikan bahwa setelah FROM, kita membuat alias untuk kedua tabel, yakni tabel <b><q>karyawan</q></b> menjadi <b><q>k</q></b>, dan tabel <b><q>gaji</q></b> menjadi <b><q>g</q></b>.</p>
              <p class="mb-0">Selain untuk mengubah nama tabel, MySQL juga menyediakan alias untuk nama kolom. Salah satu kegunaan alias kolom ini adalah untuk merubah nama kolom agar lebih cantik. Contoh sederhana penggunaan kolom alias adalah:</p>
              <pre class="language-sql"><code>SELECT nama_lengkap AS nama, tahun_angkatan AS angkatan FROM murid;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Kalian juga bisa menggunakan spasi untuk nama alias, tetapi harus di bungkus dengan tanda kutip seperti berikut ini:</p>
              <pre class="language-sql"><code>SELECT nama_lengkap AS 'Nama Lengkap', jenis_kelamin AS 'Jenis Kelamin', tahun_angkatan AS 'Tahun Angkatan' FROM murid;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Berikut adalah contoh perintah menggunakan alias pada tabel dan kolom:</p>
              <pre class="language-sql"><code>SELECT k.nama_karyawan AS 'Nama Karyawan', g.gaji_pokok AS 'Gaji Pokok', p.posisi AS 'Posisi' FROM karyawan AS k
INNER JOIN gaji AS g ON k.id_karyawan = g.id_karyawan
INNER JOIN posisi AS p ON k.id_karyawan = p.id_karyawan
ORDER BY k.nama_karyawan ASC;</code></pre>
              <p class="mb-2">Hasil dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/6/{$b}-3.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <blockquote class="catatan-pelajaran mb-2">Jika kalian mempunyai perintah yang cukup panjang dan kompleks (terdapat penggabungan tabel pada perintahnya) maka fungsi alias untuk tabel sangat berfungsi.</blockquote>
              <blockquote class="catatan-pelajaran">Jika kalian ingin merubah tampilan nama kolom (supaya enak dilihat) maka fungsi alias untuk kolom sangat berfungsi.</blockquote>
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