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
  $u = 'belajar-php/teori/kondisi-dan-perulangan-pada-php';
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
            <h2 class="judul-teori">Kondisi (Percabangan) (switch case) Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Percabangan yang kedua adalah <b><q>switch case</q></b>. Ini adalah alternatif yang bisa kalian gunakan untuk memecahkan permasalahan logika dalam PHP. Akan tetapi, penggunaan <b><q>switch case</q></b> ditujukan untuk kasus-kasus yang lebih sederhana dari pada <b><q>if</q></b>, <b><q>elseif</q></b>, <b><q>else</q></b>.</p>
              <p class="mb-0">Berikut adalah contoh penggunaan syntax <b><q>switch case</q></b> pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $buah_kesukaan = 'mangga';

  switch ($buah_kesukaan)
  {
    case 'anggur':
      echo 'Buah kesukaan anda adalah anggur.';
      break;
    case 'apel':
      echo 'Buah kesukaan anda adalah apel.';
      break;
    case 'mangga':
      echo 'Buah kesukaan anda adalah mangga.';
      break;
    case 'jeruk':
      echo 'Buah kesukaan anda adalah jeruk.';
      break;
    default: // jika semua case di atas tidak sesuai nilainya, maka blok default akan dijalankan.
      echo 'Anda tidak menyukai buah anggur, apel, mangga dan jeruk.';
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Kode di atas akan mencetak output <b><q>Buah kesukaan anda adalah mangga.</q></b> karena isi variabel $buah_kesukaan adalah <b><q>mangga</q></b>.</p>
              <blockquote class="catatan-pelajaran mb-2">Dalam blok kode <b><q>switch case</q></b> (diakhir), kita harus menggunakan statement (kode) <b><q>break</q></b>. Karena kalau tidak, setelah sistem berhasil menemukan case yang bernilai <b><q>TRUE</q></b>, dia akan tetap mengeksekusi case yang di bawah nya meskipun kondisinya sudah tidak sesuai lagi.</blockquote>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian ubah variabel <b><q>$buah_kesukaan</q></b> sesuai keinginan kalian dan jalankan ulang kode programnya.</blockquote>
              <blockquote class="catatan-pelajaran">Silahkan kalian hapus semua statement (kode) <b><q>break;</q></b> dan jalankan ulang kode programnya. Lihatlah kejanggalan yang akan muncul.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>