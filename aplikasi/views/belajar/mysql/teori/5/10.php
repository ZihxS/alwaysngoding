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
            <h2 class="judul-teori">Menggabungkan Lebih Dari 2 Tabel</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Pertama-tama silahkan kalian eksekusi terlebih dahulu perintah SQL di bawah pada database <b><q>belajar_join</q></b>:</p>
              <pre class="language-sql"><code>-- membuat tabel posisi
CREATE TABLE posisi (
  id_posisi INT AUTO_INCREMENT PRIMARY KEY,
  id_karyawan INT,
  posisi VARCHAR(255),
  FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan)
);

-- memasukkan data posisi
INSERT INTO posisi (id_karyawan, posisi) VALUES (1, 'CEO'), (3, 'CTO'), (5,'CMO');</code></pre>
              <p class="mb-2">Kalian berhasil membuat tabel baru dengan nama <b><q>posisi</q></b> dan mempunyai data sebagai berikut:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Kalian sekarang mempunyai 3 tabel di database <b><q>belajar_join</q></b> yaitu: <b>karyawan</b>, <b>gaji</b> dan <b>posisi</b>. Bagaimana jika kalian ingin menggabungkan 3 tabel tersebut?, berikut adalah perintah untuk menggabungkan 3 tabel tersebut:</p>
              <pre class="language-sql"><code>SELECT karyawan.*, gaji.gaji_pokok, posisi.posisi FROM karyawan
INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan
INNER JOIN posisi ON karyawan.id_karyawan = posisi.id_karyawan;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Syntax <b><q>karyawan.*</q></b> di atas berguna untuk mengambil dan menampilkan semua kolom yang ada pada tabel <b><q>karyawan</q></b>.</blockquote>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/5/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Jadi kalian melakukan penggabungan tabel kedua setelah penggabungan tabel pertama, begitu juga jika ingin menggabungkan 4 atau 5 atau 6 atau 10 tabel sekaligus (tidak terbatas).</p>
              <p class="mb-0">Kalian juga bisa menggunakan operator perbandingan, operator logika, operator BETWEEN, operator LIKE, ORDER BY, LIMIT seperti layaknya perintah SELECT pada umumnya yang telah kalian pelajari sebelumnya. Berikut adalah beberapa contoh perintah penggabungan tabel:</p>
              <pre class="language-sql"><code>-- contoh 1
SELECT karyawan.*, gaji.gaji_pokok FROM karyawan
INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan
WHERE gaji.gaji_pokok > 2000000;

-- contoh 2
SELECT karyawan.*, gaji.gaji_pokok FROM karyawan
INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan
WHERE karyawan.nama_karyawan LIKE '%n%';

-- contoh 3
SELECT karyawan.*, gaji.gaji_pokok, posisi.posisi FROM karyawan
INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan
INNER JOIN posisi ON karyawan.id_karyawan = posisi.id_karyawan
ORDER BY nama_karyawan ASC
LIMIT 2;

-- contoh 4
SELECT karyawan.*, gaji.gaji_pokok FROM karyawan
LEFT JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan
WHERE gaji.id_karyawan IS NOT NULL
AND karyawan.nama_karyawan LIKE '%a'
ORDER BY gaji.gaji_pokok DESC;

-- contoh 5
SELECT karyawan.*, posisi.posisi FROM karyawan
INNER JOIN posisi ON karyawan.id_karyawan = posisi.id_karyawan
WHERE karyawan.id_karyawan = 5;

-- contoh 6
SELECT karyawan.*, posisi.posisi FROM karyawan
LEFT JOIN posisi ON karyawan.id_karyawan = posisi.id_karyawan
WHERE karyawan.nama_karyawan = 'Annisa';

-- contoh 7
SELECT posisi.posisi, karyawan.* FROM posisi
RIGHT JOIN karyawan ON posisi.id_karyawan = karyawan.id_karyawan
WHERE posisi.id_posisi IS NULL
AND (
  karyawan.nama_karyawan = 'Angga'
  OR karyawan.nama_karyawan = 'Putri'
)
ORDER BY karyawan.id_karyawan ASC;

-- contoh 8
SELECT karyawan.*, gaji.gaji_pokok, posisi.posisi FROM karyawan
INNER JOIN gaji ON karyawan.id_karyawan = gaji.id_karyawan
LEFT JOIN posisi ON karyawan.id_karyawan = posisi.id_karyawan
ORDER BY posisi DESC;</code></pre>
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