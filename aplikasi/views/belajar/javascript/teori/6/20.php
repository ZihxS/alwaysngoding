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
            <h2 class="judul-teori">Perulangan for Pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Perulangan <b><q>for</q></b> pada JavaScript adalah <b>perulangan yang termasuk dalam counted loop</b>, karena kalian <b>bisa menentukan jumlah perulangannya</b>. Berikut adalah bentuk dasar perulangan <b><q>for</q></b> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>for ([inisialisasi]; [kondisi]; [eksekusi iterasi]) {
  // ini adalah blok kode yang akan diulang
}</code></pre>
              <ul class="mb-2">
                <li><b>Inisialisasi</b> adalah saat pertama kali kita mendeklarasi sebuah nilai awal, dimana nilai awal akan berubah selama belum memenuhi syarat kondisi.</li>
                <li><b>Kondisi</b> berfungsi untuk mengecek perubahan yang terjadi setiap kali terjadi eksekusi iterasi perulangan dengan menggunakan operator perbandingan.</li>
                <li><b>Eksekusi Iterasi</b> adalah proses akhir setiap kali terjadi eksekusi iterasi, biasanya digunakan untuk proses penambahan (increment) atau pengurangan (decrement).</li>
              </ul>
              <p class="mb-0">Berikut adalah contoh penggunaan perulangan <b><q>for</q></b> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>for (var i = 1; i <= 10; i++) {
  // ini adalah blok kode yang akan diulang
  console.log("ini adalah perulangan ke " + i);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Veriabel <b><q>i</q></b> dalam perulangan <b><q>for</q></b> berfungsi sebagai counter yang menghitung berapa kali ia akan mengulang. Hitungan akan dimulai dari 1 karena kita memberikan nilai <b><q>i = 1</q></b>. Lalu, perulangan akan diulang selama nilai <b><q>i</q></b> lebih kecil atau sama dengan <b><q>10</q></b>. Artinya, <b>perulangan ini akan mengulang sebanyak 10 kali</b>. Maksud dari <b><q>i++</q></b> adalah nilai <b><q>i</q></b> akan ditambah 1 disetiap kali melakukan perulangan.</p>
              <blockquote class="catatan-pelajaran mb-2"><b><q>i++</q></b> bisa juga diganti dengan <b><q>i += 1</q></b></blockquote>
              <p class="mb-0">Masih ada cara lain yang bisa kita manfaatkan dari perulang <q>for</q>, salah satunya adalah mengolah data object dengan menggunakan <q>for in</q>. Berikut ini contoh penulisan kode <q>for in</q>:</p>
              <pre class="language-javascript line-numbers"><code>var ibuKota = {
  <mark class="keep">indonesia</mark>: 'jakarta',
  <mark class="keep">jepang</mark>: 'tokyo',
  <mark class="keep">thailand</mark>: 'bangkok'
};

for (var <mark class="keep">property</mark> in ibuKota) {
  console.log('ibu kota ' + property + ' adalah ' + ibuKota[property]);
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Variabel yang ditandai di baris ke 7 akan menghasilkan seperti yang ditandai di baris ke 2, 3 dan 4. Dari kode-kode di atas kita bisa pahami penggunaan loop atau perulang pada JavaScript tentunya sangat mempermudah dan mempersingkat penulisan kode program dalam mengolah data.</p>
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