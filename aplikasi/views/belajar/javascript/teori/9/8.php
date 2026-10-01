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
              <p>Selain mengambil atau menentukan tanggal dan waktu saat ini menggunakan <code class="custom">new Date()</code>, kalian juga dapat menentukan tanggal dan waktu secara manual.</p>
              <p class="mb-0">Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>let tanggalSatu = new Date('13 September 2016 15:30:45');
let tanggalDua = new Date('15 Juny 2021 12:20:00');

console.log(tanggalSatu);
console.log(tanggalDua);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada kode di atas kita menentukan tanggal dan waktu secara manual, untuk menentukan tanggal dan waktu secara manual pastikan penulisannya sama persis seperti yang ada di atas. Untuk bulan pastikan kalian mencantumkannya dengan nama bulan dalam bahasa inggris. Jika format penulisan kalian salah maka akan menghasilkan output <q>Invalid Date</q>.</p>
              <p>Untuk jam, menit dan detik di atas sebenarnya opsional (boleh menuliskan tanggal bulan dan tahun saja), jika kalian tidak mencantumkan jam, menit dan detik maka JavaScript akan memakai nilai default yaitu <q>00:00:00</q>.</p>
              <p class="mb-0">Kalian bisa membuat program sederhana untuk menghitung umur dengan JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>let umur = 0;
let tanggalSekarang = new Date();
let tanggalLahir = new Date("25 March 1999");

if (tanggalSekarang.getMonth() < tanggalLahir.getMonth()) {
  // dikurangi 1 karena bulannya belum memenuhi syarat (bukan bulan ulang tahunnya)
  umur = tanggalSekarang.getFullYear() - tanggalLahir.getFullYear() - 1;
} else if ((tanggalSekarang.getMonth() == tanggalLahir.getMonth()) && tanggalSekarang.getDate() < tanggalLahir.getDate()) {
  // dikurangi 1 karena harinya belum memenuhi syarat (bukan hari ulang tahunnya)
  umur = tanggalSekarang.getFullYear() - tanggalLahir.getFullYear() - 1;
} else {
  umur = tanggalSekarang.getFullYear() - tanggalLahir.getFullYear();
}

console.log(`sekarang tanggal ${tanggalSekarang.getDate()} bulan ke ${tanggalSekarang.getMonth()} tahun ${tanggalSekarang.getFullYear()}.`);
console.log(`kamu lahir pada tanggal ${tanggalLahir.getDate()} bulan ke ${tanggalLahir.getMonth()} tahun ${tanggalLahir.getFullYear()}.`);
console.log(`sekarang umur kamu adalah: ${umur} tahun.`);

if (umur >= 17) {
  console.log("kamu sudah boleh menonton film the conjuring 3.");
} else {
  console.log("maaf, kamu belum boleh menonton film the conjuring 3.");
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas berfungsi untuk menghitung umur, dan jika umur sudah 17 tahun lebih maka diperbolehkan untuk menonton film the conjuring 3.</p>
              <p class="mb-0">Kalian bisa ubah tanggal lahir di baris ke 3 ke tanggal lahir kalian, lalu jalankan programnya dan lihat hasilnya apakah kalian sudah boleh menonton film the conjuring 3.</p>
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