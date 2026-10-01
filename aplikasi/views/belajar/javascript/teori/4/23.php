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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/tipe-data-pada-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Array di dalam Array</h2>
            <hr>
            <div class="konten-teori">
              <p>Seperti yang sudah dijelaskan dibagian sebelumnya bahwa kita bisa menyimpan dan mencampur data apapun di dalam array. Jadi kita bisa mengisi array dengan array lagi (array di dalam array).</p>
              <p>Misalnya kita ingin membuat data informasi murid, kita bisa log menggunakan dan memanfaatkan array di dalam array.</p>
              <p class="mb-0">Perhatikan contoh kode di bawah ini:</p>
              <pre class="language-javascript"><code>var informasiMurid = [
  ['Abdul Ghani', 20, 'Laki-laki'],
  ['Annisa', 20, 'Perempuan']
];</code></pre>
              <p>Perhatikan kode diatas, untuk indeks ke 0 yang ada pada array di dalam array anggap saja berisi nama, untuk indeks ke 1 berisi umur dan indeks ke 2 adalah jenis kelamin. Lalu bagaimana cara memanggilnya:</p>
              <p class="mb-0">Perhatikan contoh kode di bawah ini dengan teliti:</p>
              <pre class="language-javascript"><code>var informasiMurid = [
  ['Abdul Ghani', 20, 'Laki-laki'],
  ['Annisa', 20, 'Perempuan']
];

// siku yang pertama adalah isi array informasiMurid
// siku yang kedua adalah isi array yang ada pada array informasiMurid
console.log('Nama murid ke 1: ' + informasiMurid[0][0]);
console.log('Umur murid ke 1: ' + informasiMurid[0][1]);
console.log('Jenis kelamin murid ke 1: ' + informasiMurid[0][2]);
console.log('=================================================');
console.log('Nama murid ke 2: ' + informasiMurid[1][0]);
console.log('Umur murid ke 2: ' + informasiMurid[1][1]);
console.log('Jenis kelamin murid ke 2: ' + informasiMurid[1][2]);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Jika kalian belum memahami kode yang di atas kalian boleh coba ulang dan lebih teliti lagi membacanya.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>