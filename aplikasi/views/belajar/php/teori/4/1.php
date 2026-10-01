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
            <h2 class="judul-teori">Kondisi (Percabangan) (if, elseif, else) Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Percabang pada PHP <b>berguna untuk menyaring, memfilter atau membuat tahap validasi dari suatu proses ataupun kode sesuai dengan kondisi yang diinginkan</b> oleh kalian. Percabangan pada PHP terdapat beberapa macam, Contohnya ada <b><q>if else</q></b> dan ada <b><q>switch case</q></b>.</p>
              <p>Percabangan <b><q>if</q></b> adalah percabangan yang paling dasar. Tugasnya adalah <b>memeriksa nilai boolean atau sebuah ekspresi logika</b>. Jika suatu variabel atau suatu ekspresi logika bernilai <b><q>TRUE</q></b>, maka proses yang ada di dalam blok kode <b><q>if</q></b> akan dijalankan. Jika bernilai <b><q>FALSE</q></b>, maka perintah yang ada di dalam blok kode <b><q>if</q></b> tidak akan dijalankan.</p>
              <p class="mb-0">Berikut adalah contoh sederhana penggunaan syntax <b><q>if</q></b> pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $jagoan = TRUE;

  if ($jagoan)
  {
    echo "Anda jagoan";
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan mengeksekusi perintah didalam blok <b><q>if</q></b> (baris ke 6). Jadi kode di atas akan mencetak <b><q>Anda jagoan</q></b>. Jika kalian merubah variabel <b><q>$jagoan</q></b> menjadi <b><q>FALSE</q></b> lalu menjalankan programnya, maka program tidak menghasilkan output apapun (karena kondisi yang ada didalam <b><q>if</q></b> harus bernilai <b><q>TRUE</q></b>).</p>
              <p>Bagaimana jika ternyata yang didefinisikan di dalam <b><q>if</q></b> ternyata tidak terpenuhi alias bernilai <b><q>FALSE</q></b>?</p>
              <p class="mb-0">Kalian bisa menangani hal tersebut dengan membuat blok kode <b><q>else</q></b>. Berikut adalah contoh penggunaan blok <b><q>else</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $jagoan = FALSE;

  if ($jagoan)
  {
    echo "Anda jagoan";
  }
  else
  {
    echo "Anda bukan jagoan";
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Variabel <b><q>$jagoan</q></b> di atas sudah kita ubah menjadi <b><q>FALSE</q></b>, tetapi jika kita jalankan programnya maka sekarang outputnya tidak kosong lagi (karena kita sudah menambahkan blok pengecualian/else). Maka jika kita jalankan programnya hasil yang kita dapat adalah program mencetak <b><q>Anda bukan jagoan</q></b>.</p>
              <p class="mb-2">Kita juga bisa membuat lebih dari satu kondisi, caranya menggunakan <b><q>elseif</q></b>. Jadi kita bisa membuat banyak <b><q>elseif</q></b> setelah <b><q>if</q></b> dan sebelum <b><q>else</q></b>.</p>
              <blockquote class="catatan-pelajaran mb-2"><b><q>if</q></b> hanya bisa digunakan satu kali dalam suatu percabangan lengkap dan menjadi pembuka percabangan, sedangkan <b><q>elseif</q></b> bisa digunakan lebih dari satu dalam suatu percabangan lengkap dan penempatannya setelah <b><q>if</q></b> dan sebelum <b><q>else</q></b>. Dan <b><q>else</q></b> adalah penutup dalam suatu percabangan lengkap dan hanya bisa digunakan satu kali dalam suatu percabangan lengkap.</blockquote>
              <p class="mb-0">Berikut adalah contoh penggunaan <b><q>if</q></b>, <b><q>elseif</q></b> dan <b><q>else</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $nilai = 75;

  if ($nilai >= 85 AND $nilai <= 100) // Jika variabel $nilai lebih besar dari atau sama dengan 85 dan jika variabel $nilai lebih kecil dari atau sama dengan 100
  {
    echo "Predikat: A";
  }
  elseif ($nilai >= 75) // Jika variabel $nilai lebih besar dari atau sama dengan 75
  {
    echo "Predikat: B";
  }
  elseif ($nilai >= 60) // Jika variabel $nilai lebih besar dari atau sama dengan 60
  {
    echo "Predikat: C";
  }
  elseif ($nilai >= 50) // Jika variabel $nilai lebih besar dari atau sama dengan 50
  {
    echo "Predikat: D";
  }
  elseif ($nilai >= 0) // Jika variabel $nilai lebih besar dari atau sama dengan 0
  {
    echo "Predikat: E";
  }
  else // Jika semua kondisi di atas tidak tereksekusi, maka blok else akan dijalankan
  {
    echo "Nilai tidak valid.";
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan menghasilkan atau mencetak output <b><q>Predikat: B</q></b> karena variabel <b><q>$nilai</q></b> isinya <b><q>75</q></b> dan blok yang dieksekusi adalah blok <b><q>elseif</q></b> pada baris ke 10.</p>
              <p>Percabangan di atas melewati kondisi <b><q>if</q></b> (karena variabel <b><q>$nilai</q></b> isinya tidak sesuai), lalu percabangan di atas menjalankan kondisi <b><q>elseif</q></b> pertama (karena variabel <b><q>$nilai >= 75</q></b> sesuai ketentuan), dan percabangan di atas melewati semua kondisi <b><q>elseif</q></b> yang ada di bawah nya dan melewati kondisi <b><q>else</q></b> (karena syarat sudah terpenuhi dibagian <b><q>elseif</q></b> yang pertama yaitu dari baris 8 sampai 11).</p>
              <blockquote class="catatan-pelajaran">Coba kalian copy dan paste kode di atas dan kalian ubahlah variabel <b><q>$nilai</q></b> menjadi apa yang kalian inginkan lalu jalankanlah kode programnya.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>