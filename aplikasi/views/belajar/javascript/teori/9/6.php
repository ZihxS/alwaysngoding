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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-javascript';
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
            <h2 class="judul-teori">Penggunaan Tanggal dan Waktu pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Dalam pemrograman tentunya penggunaan tanggal dan waktu sangatlah penting, misalnya untuk mencatat waktu setiap ada perubahan yang terjadi pada data, mencatat waktu user saat login atau logout dan masih banyak lagi.</p>
              <p>Tanggal dan waktu pada JavaScript secara bawaan mengambil data dari browser atau dari komputer pengguna berdasarkan zona waktu masing-masing browser atau komputer pengguna.</p>
              <p>Untuk membuat atau menggunakan tanggal dan waktu pada JavaScript kita bisa menggunakan class Date, class Date tersebut menyimpan object tanggal dan waktu.</p>
              <p class="mb-0">Berikut ini contoh sederhana pembuatan tanggal dan waktu menggunakan class Date pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>let iniTanggalDanWaktu = new Date();

console.log(iniTanggalDanWaktu);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas berfungsi untuk mengambil tanggal dan waktu sekarang. Perhatikan contoh kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>let dateTime = new Date(); // mengambil tanggal dan waktu sekarang
let tanggal = dateTime.getDate(); // mengambil tanggal dari variabel dateTime
let hari = dateTime.getDay(); // mengambil hari dari variabel dateTime (isinya 0 ~ 6, 0 = minggu dan 6 = sabtu)
let bulan = dateTime.getMonth(); // mengambil bulan dari variabel dateTime (isinya 0 ~ 11, 0 = januari dan 11 = desember)
let tahun = dateTime.getFullYear(); // mengambil tahun dari variabel dateTime
let jam = dateTime.getHours(); // mengambil jam dari variabel dateTime
let menit = dateTime.getMinutes(); // mengambil menit dari variabel dateTime
let detik = dateTime.getSeconds(); // mengambil detik dari variabel dateTime

console.log(tanggal);
console.log(hari);
console.log(bulan);
console.log(tahun);
console.log(jam);
console.log(menit);
console.log(detik);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Pada kode di atas hari dan bulan nya masih berupa angka, bagaimana caranya biar ditampilkannya menjadi Senin sampai Minggu dan Januari sampai Desember?, kita bisa menggunakan dan memanfaatkan array loh, perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>let dateTime = new Date(); // mengambil tanggal dan waktu sekarang
let hari = dateTime.getDay(); // mengambil hari dari variabel dateTime (isinya 0 ~ 6, 0 = minggu dan 6 = sabtu)
let bulan = dateTime.getMonth(); // mengambil bulan dari variabel dateTime (isinya 0 ~ 11, 0 = januari dan 11 = desember)

let arrayHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
let arrayBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

console.log(`Sekarang hari ${arrayHari[hari]} bulan ${arrayBulan[bulan]}.`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 9], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>