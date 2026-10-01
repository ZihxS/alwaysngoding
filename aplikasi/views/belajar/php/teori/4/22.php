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
            <h2 class="judul-teori">Memanfaatkan fungsi break dan continue pada perulangan PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Perintah <b><q>break</q></b> jika digunakan di dalam perulangan berfungsi untuk <b>menghentikan paksa</b> proses perulangan yang berlangsung. Kalian juga telah melihat penggunaan perintah <b><q>break</q></b> dalam struktur percabangan <b><q>switch case</q></b>. Perintah <b><q>break</q></b> biasanya digunakan setelah kondisi <b><q>if</q></b> didalam perulangan untuk menyeleksi <b><q>kapan</q></b> perulangan harus dihentikan secara paksa.</p>
              <p class="mb-0">Agar lebih mudah dipahami, berikut adalah contoh cara penulisan perintah <b><q>break</q></b> dalam perulangan <b><q>for</q></b>:</p>
              <pre class="language-php line-numbers" data-line="4-6"><code>&lt;?php
  for ($i=1; $i <= 50; $i++) {
    echo "perulangan ke ${i}&lt;br&gt;";
    if ($i == 13) {
      break;
    }
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan mencetak perulangan <b><q>ke 1 sampai ke 13</q></b>, karena saat variabel <b><q>$i</q></b> bernilai <b><q>13</q></b> kita menggunakan fungsi <b><q>break</q></b> untuk menghentikan paksa perulangan.</p>
              <p>Jika perintah break digunakan untuk <b><q>menghentikan paksa</q></b> proses perulangan yang berlangsung, perintah <b><q>continue</q></b> hanya akan menghentikan perulangan yang saat ini terjadi (1 iterasi saja), kemudian melanjutkan perulangan iterasi berikutnya, atau bisa disebut juga untuk <b><q>melewati</q> 1 perulangan</b>.</p>
              <p class="mb-0">Sama seperti perintah <b><q>break</q></b>, perintah <b><q>continue</q></b> biasanya digunakan setelah kondisi <b><q>if</q></b> yang digunakan untuk menyeleksi <b><q>kapan</q></b> perulangan harus di-skip atau dilewati. Berikut adalah contoh penggunaan perintah <b><q>continue</q></b> dalam perulangan <b><q>for</q></b>:</p>
              <pre class="language-php line-numbers" data-line="3-5"><code>&lt;?php
  for ($i=1; $i <= 5; $i++) {
    if ($i == 3) {
      continue;
    }
    echo "perulangan ke ${i}&lt;br&gt;";
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas akan mencetak perulangan <b><q>ke 1 sampai ke 5 namun melewati perulangan ke 3</q></b> karena saat variabel <b><q>$i</q></b> bernilai <b><q>3</q></b> kita menggunakan fungsi <B><q>continue</q></b> untuk melewati perulangan <b><q>ke 3</q></b>.</p>
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