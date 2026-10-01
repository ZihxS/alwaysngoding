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
            <h2 class="judul-teori">Kondisi (Percabangan) (if, else if, else) Pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Percabang pada JavaScript <b>berguna untuk menyaring, memfilter atau membuat tahap validasi dari suatu proses ataupun kode sesuai dengan kondisi yang kalian inginkan</b>. Percabangan pada JavaScript terdapat beberapa macam, contohnya ada <b><q>if else</q></b> dan ada <b><q>switch case</q></b>.</p>
              <p>Percabangan <b><q>if</q></b> adalah percabangan yang paling dasar. Tugasnya adalah <b>memeriksa nilai boolean atau sebuah ekspresi logika</b>. Jika suatu variabel atau suatu ekspresi logika bernilai <b><q>true</q></b>, maka proses yang ada di dalam blok kode <b><q>if</q></b> akan dijalankan. Jika bernilai <b><q>false</q></b>, maka perintah yang ada di dalam blok kode <b><q>if</q></b> tidak akan dijalankan.</p>
              <p class="mb-0">Berikut adalah contoh sederhana penggunaan syntax <b><q>if</q></b> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var benar = true;

if (benar) {
  console.log('memenuhi syarat');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan mengeksekusi perintah didalam blok <b><q>if</q></b> (baris ke 4). Jadi kode di atas akan mencetak <b><q>memenuhi syarat</q></b>. Jika kalian merubah isi variabel <b><q>benar</q></b> menjadi <b><q>false</q></b> lalu menjalankan programnya, maka program tidak menghasilkan output apapun (karena kondisi yang ada didalam <b><q>if</q></b> harus bernilai <b><q>true</q></b>).</p>
              <p>Bagaimana jika yang didefinisikan di dalam <b><q>if</q></b> ternyata tidak terpenuhi alias bernilai <b><q>false</q></b>?</p>
              <p class="mb-0">Kalian bisa menangani hal tersebut dengan membuat blok kode <b><q>else</q></b>. Berikut adalah contoh penggunaan blok <b><q>else</q></b>:</p>
              <pre class="language-javascript line-numbers"><code>var kondisi = false;

if (kondisi) {
  console.log('kondisi memenuhi syarat');
} else {
  console.log('kondisi tidak memenuhi syarat');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Variabel <b><q>kondisi</q></b> di atas berisi <b><q>false</q></b>. Maka jika kita jalankan programnya hasil yang kita dapat adalah program mencetak <b><q>kondisi tidak memenuhi syarat</q></b>.</p>
              <p class="mb-2">Kita juga bisa membuat lebih dari satu kondisi, caranya menggunakan <b><q>else if</q></b>. Jadi kita bisa membuat banyak <b><q>else if</q></b> setelah <b><q>if</q></b> dan sebelum <b><q>else</q></b>.</p>
              <blockquote class="catatan-pelajaran mb-2"><b><q>if</q></b> hanya bisa digunakan satu kali dalam suatu percabangan lengkap dan menjadi pembuka percabangan, sedangkan <b><q>else if</q></b> bisa digunakan lebih dari satu dalam suatu percabangan lengkap dan penempatannya setelah <b><q>if</q></b> dan sebelum <b><q>else</q></b>. Dan <b><q>else</q></b> adalah penutup dalam suatu percabangan lengkap dan hanya bisa digunakan satu kali dalam suatu percabangan lengkap.</blockquote>
              <p class="mb-0">Berikut adalah contoh penggunaan <b><q>if</q></b>, <b><q>else if</q></b> dan <b><q>else</q></b>:</p>
              <pre class="language-javascript line-numbers"><code>var rataRataNilai = 78;

if (rataRataNilai >= 85 && rataRataNilai <= 100) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 85 dan jika variabel rataRataNilai lebih kecil dari atau sama dengan 100
{
  console.log('Predikat: A');
}
else if (rataRataNilai >= 75) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 75
{
  console.log('Predikat: B');
}
else if (rataRataNilai >= 60) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 60
{
  console.log('Predikat: C');
}
else if (rataRataNilai >= 50) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 50
{
  console.log('Predikat: D');
}
else if (rataRataNilai >= 0) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 0
{
  console.log('Predikat: E');
}
else // Jika semua kondisi di atas tidak tereksekusi, maka blok else akan dijalankan
{
  console.log('Nilai tidak valid.');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/6/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan menghasilkan atau mencetak output <b><q>Predikat: B</q></b> karena variabel <b><q>rataRataNilai</q></b> isinya <b><q>78</q></b> dan blok yang dieksekusi adalah blok <b><q>else if</q></b> pada baris ke 7.</p>
              <p class="mb-2">Percabangan di atas melewati kondisi <b><q>if</q></b> (karena variabel <b><q>rataRataNilai</q></b> isinya tidak sesuai), lalu percabangan di atas menjalankan kondisi <b><q>else if</q></b> pertama (karena variabel <b><q>rataRataNilai >= 78</q></b> sesuai ketentuan), dan percabangan di atas melewati semua kondisi <b><q>else if</q></b> yang ada di bawah nya dan melewati kondisi <b><q>else</q></b> (karena syarat sudah terpenuhi dibagian <b><q>else if</q></b> yang pertama yaitu dari baris 7 sampai 10).</p>
              <blockquote class="catatan-pelajaran mb-2">Coba kalian ubah variabel <b><q>rataRataNilai</q></b> menjadi apa yang kalian inginkan lalu jalankan lagi kode programnya.</blockquote>
              <blockquote class="catatan-pelajaran">Penulisan <q>else if</q> pada JavaScript harus dipisah tidak bisa digabungkan seperti pada bahasa <q>PHP</q>. Jika kalian menulis <q>elseif</q> di JavaScript kode akan menjadi error.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>