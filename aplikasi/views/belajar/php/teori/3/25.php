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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/tipe-data-pada-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Array Multidimensi (Array di Dalam Array)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Kalian tidak hanya bisa menyimpan string atau angka atau boolean di dalam array, tapi kalian juga bisa menyimpan array! Array di dalam array! Ini yang disebut dengan <b><q>array multidimensi</q></b>. Kita melakukannya seperti kita membuat array biasa, tetapi di setiap elementnya kita memasukkan array. Berikut adalah contoh array multidimensi:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $murid = [
    [
      'nama' => 'Muhammad Saleh Solahudin',
      'kelas' => 'XII',
      'jurusan' => 'Rekayasa Perangkat Lunak',
      'jenis_kelamin' => 'Laki-laki'
    ],
    [
      'nama' => 'Karmila Sriwulan',
      'kelas' => 'XII',
      'jurusan' => 'Rekayasa Perangkat Lunak',
      'jenis_kelamin' => 'Perempuan'
    ],
    [
      'nama' => 'Nurlaela Nafilah',
      'kelas' => 'X',
      'jurusan' => 'Multimedia',
      'jenis_kelamin' => 'Perempuan'
    ],
    [
      'nama' => 'Ibrahim',
      'kelas' => 'XI',
      'jurusan' => 'Teknik Komputer dan Jaringan',
      'jenis_kelamin' => 'Laki-laki'
    ]
  ];

  echo $murid[0]['nama']; // mengambil nama murid pertama (Muhammad Saleh Solahudin)
  echo "&lt;br&gt;";
  echo $murid[1]['nama']; // mengambil nama murid kedua (Karmila Sriwulan)
  echo "&lt;br&gt;";
  echo $murid[2]['nama']; // mengambil nama murid ketiga (Nurlaela Nafilah)
  echo "&lt;br&gt;";
  echo $murid[3]['nama']; // mengambil nama murid keempat (Ibrahim)
  echo "&lt;br&gt;";

  echo $murid[0]['kelas']; // mengambil kelas murid pertama (XII)
  echo "&lt;br&gt;";
  echo $murid[1]['jurusan']; // mengambil jurusan murid kedua (Rekayasa Perangkat Lunak)
  echo "&lt;br&gt;";
  echo $murid[2]['jenis_kelamin']; // mengambil jenis kelamin murid ketiga (Perempuan)
  echo "&lt;br&gt;";

  echo "{$murid[1]['nama']} - {$murid[1]['kelas']} - {$murid[1]['jurusan']} - {$murid[1]['jenis_kelamin']}";
  // output kode baris ke 38: Nurlaela Nafilah - X - Multimedia - Perempuan
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Contoh kode di atas adalah kita mempunyai 4 data murid, dan setiap murid mempunyai data nama, data kelas, data jurusan dan data jenis kelamin.</p>
              <blockquote class="catatan-pelajaran">Array multidimensi akan sangat berguna ketika kita sudah berkutat (ber-urusan) dengan database dan JSON (JavaScript Object Notation).</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>