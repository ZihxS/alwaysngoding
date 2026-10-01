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
  $u = 'belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript';
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
            <h2 class="judul-teori">Kondisi (Percabangan) (switch case) Pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Percabangan yang kedua adalah <b><q>switch case</q></b>. Ini adalah alternatif yang bisa kalian gunakan untuk memecahkan permasalahan logika dalam JavaScript. Akan tetapi, penggunaan <b><q>switch case</q></b> ditujukan untuk kasus-kasus yang lebih sederhana dari pada <b><q>if</q></b>, <b><q>elseif</q></b>, <b><q>else</q></b>.</p>
              <p class="mb-0">Berikut adalah contoh penggunaan syntax <b><q>switch case</q></b> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var angka = 3;

switch (angka) {
  case 1:
    console.log('yang keluar adalah angka 1');
    break;
  case 2:
    console.log('yang keluar adalah angka 2');
    break;
  case 3:
    console.log('yang keluar adalah angka 3');
    break;
  case 4:
    console.log('yang keluar adalah angka 4');
    break;
  default: // jika semua case di atas tidak sesuai nilainya, maka blok default akan dijalankan.
    console.log('angka tidak diketahui atau inputan bukan angka');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Kode di atas akan mencetak output <b><q>yang keluar adalah angka 3</q></b> karena isi variabel <q>angka</q> adalah <b><q>3</q></b>.</p>
              <blockquote class="catatan-pelajaran mb-2">Dalam blok kode <b><q>switch case</q></b> (diakhir), kita harus menggunakan statement (kode) <b><q>break</q></b>. Karena kalau tidak, setelah sistem berhasil menemukan case yang bernilai <b><q>true</q></b>, dia akan tetap mengeksekusi case yang di bawah nya meskipun kondisinya sudah tidak sesuai lagi.</blockquote>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian ubah variabel <b><q>angka</q></b> sesuai keinginan kalian dan jalankan ulang kode programnya.</blockquote>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian hapus semua statement (kode) <b><q>break;</q></b> dan jalankan ulang kode programnya. Lihatlah kejanggalan apa yang akan muncul.</blockquote>
              <p class="mb-0">Contoh lain penggunaan <q>switch case</q> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var angka = 4;

switch (angka) {
  case 1:
  case 2:
  case 3:
  case 4:
  case 5:
    console.log('angka diantara 1 sampai 5');
    break;
  case 6:
  case 7:
  case 8:
  case 9:
  case 10:
    console.log('angka diantara 6 sampai 10');
    break;
  default:
    console.log('angka tidak berada diantara 1 sampai 10 atau inputan bukan angka');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-javascript line-numbers"><code>var minuman = 'kopi';

switch (minuman) {
  case 'teh':
    console.log('minum teh enaknya saat pagi hari');
    break;
  case 'kopi':
    console.log('kopi adalah teman ngoding');
    break;
  default:
    console.log('minuman yang anda masukkan tidak ada didaftar percabangan');
}</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>