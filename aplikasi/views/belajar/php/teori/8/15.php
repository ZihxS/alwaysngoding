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
  $u = 'belajar-php/teori/lebih-banyak-tentang-php';
  $base64 = base64_encode("AlwaysNgodingIsTheBest");
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
            <h2 class="judul-teori">Fungsi Bawaan PHP Untuk Mengenkripsi Data</h2>
            <hr>
            <div class="konten-teori">
              <p>Data adalah harta karun yang paling berharga dalam sebuah sistem. Apabila itu dicuri bencana besar bisa terjadi. Enkripsi adalah teknik untuk mengamankan data agar isinya tidak diketahui orang lain. Enkripsi biasanya dilakukan terhadap data-data sensitif seperti password.</p>
              <p class="mb-0">Enkripsi akan menjamin data-data tetap aman meskipun berada di tangan orang lain, karena mereka tidak tahu isi aslinya. Berikut adalah beberapa fungsi enkripsi bawaan PHP:</p>
              <ol>
                <li style="text-align: left;"><b><q>password_hash()</q></b> >>> Fungsi ini akan menghasilkan sebuah kode hash baru dengan metode one-way hashing. one-way hasing artinya <b>hasil enkripsinya tidak bisa dikembalikan seperti semula</b> (decrypt/decode). Fungsi ini sangat disarankan untuk mengenkripsi password, karena sulit didekripsi atau di-crack. Fungsi <b><q>passowrd_hash()</q></b> ini tidak bisa bekerja sendirian, dia memiliki teman bernama <b><q>password_verify()</q></b> yang berfungsi untuk mencocokkan data.</li>
                <li><b><q>crypt()</q></b> >>> Fungsi ini menghasilkan kode hash dengan menggunakan algoritma DES, Blowfish, dan MD5.</li>
                <ul>
                  <li>Argumen pertama adalah teks yang akan dienkripsi.</li>
                  <li>Argumen kedua adalah salt (data acak yang dimasukkan ke dalam fungsi enkripsi).</li>
                </ul>
                <li><b><q>md5()</q></b> >>> Fungsi ini akan menghasilkan kode hash sepanjang 32 karakter.</li>
                <li style="text-align: left;"><b><q>base64_encode()</q></b> >>> Fungsi ini akan menghasilkan kode hash dari teks yang diinputkan dan bisa dikembalikan ke bentuk semula dengan fungsi <b><q>base64_decode()</q></b> (metode ini disebut two-way hasing). Sementara itu, untuk mengembalikan (decrypt) atau decode dapat menggunakan fungsi <b><q>base64_decode()</q></b>. Enkripsi dengan base64 tidak cocok digunakan untuk mengenkripsi password, karena sangat mudah di-decode.</li>
              </ol>
              <p class="mb-0">Berikut adalah contoh penggunaan fungsi-fungsi yang ada di atas:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  // fungsi password_hash() dan password_verify()
  $password = password_hash("AlwaysNgodingIsTheBest", PASSWORD_DEFAULT); // <?= password_hash("AlwaysNgodingIsTheBest", PASSWORD_DEFAULT)."\n"; ?>
  if (password_verify("AlwaysNgodingIsTheBest", $password)) {
      echo 'data cocok';
  } else {
      echo 'data tidak cocok';
  }
  echo '&lt;hr&gt;';

  // fungsi crypt()
  echo crypt("AlwaysNgodingIsTheBest", "PenguatKataSandi"); // <?= crypt("AlwaysNgodingIsTheBest", "PenguatKataSandi")."\n"; ?>
  echo '&lt;hr&gt;';

  // fungsi md5()
  echo md5("AlwaysNgodingIsTheBest"); // <?= md5("AlwaysNgodingIsTheBest")."\n"; ?>
  echo '&lt;hr&gt;';

  // fungsi base64_encode() dan base64_decode()
  echo base64_encode("AlwaysNgodingIsTheBest"); // <?= $base64."\n"; ?>
  echo '&lt;hr&gt;';
  echo base64_decode("<?= $base64; ?>"); // <?= base64_decode("$base64")."\n"; ?>
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>