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
  $u = 'belajar-php/teori/tipe-data-pada-php';
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
            <h2 class="judul-teori">Tipe Data String</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data string adalah tipe data yang <b>berisi text, kalimat, atau kumpulan karakter</b>. Sebagai contoh: <q>a</q>, <q>saya sedang belajar PHP</q> atau <q>tUT0r1al pHp?!</q> semuanya adalah string.</p>
              <p>Tipe data string adalah tipe data yang paling sering digunakan. Karakter yang didukung saat ini adalah 256 karakter ASCII. List karakter ASCII tersebut dapat dilihat di <a href="http://www.ascii-code.com" target="_blank">http://www.ascii-code.com</a>.</p>
              <p>PHP menyediakan 4 cara penulisan tipe data string, yakni single quoted, double quoted, heredoc, dan nowdoc. Kalian akan mempelajarinya lebih dalam di bagian ini.</p>
              <p>Penulisan tipe data string menggunakan single quoted atau tanda petik satu (karakter <code class="custom">‘</code>) merupakan cara penulisan string yang paling sederhana. Kalian cukup membuat sebuah kata atau kalimat, dan menambahkan tanda petik satu di awal dan akhir kalimat.</p>
              <p>Untuk string yang di dalamnya juga terdapat tanda petik satu, kalian harus mendahuluinya dengan karakter backslash <b><q>\</q></b> agar tidak dianggap sebagai penutup string. Dan jika di dalam string kalian ingin menulis tanda backslash, kalian harus menulisnya 2 kali <b><q>\\</q></b>.</p>
              <p class="mb-0">Berikut adalah contoh penulisan tipe data string menggunakan metode single quoted:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $string1 = 'Ini adalah string sederhana';
  $string2 = 'Ini adalah string
  yang bisa memiliki beberapa
  baris';
  $string3 = 'Dia berkata: "I\'ll be back"';
  $string4 = 'Anda telah berhasil menghapus C:\xampp\htdocs';
  $string5 = 'Kalimat ini tidak akan pindah ke: \n baris baru';
  $string6 = 'Variabel juga tidak otomatis ditampilkan $string1 dan $string3';

  echo $string1;
  echo "&lt;br&gt;";
  echo $string2;
  echo "&lt;br&gt;";
  echo $string3;
  echo "&lt;br&gt;";
  echo $string4;
  echo "&lt;br&gt;";
  echo $string5;
  echo "&lt;br&gt;";
  echo $string6;
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Pada contoh di atas, terdapat beberapa karakter khusus seperti <code class="custom">"</code>, <code class="custom">\n</code>, dan variabel yang dimulai dengan tanda dollar <b><q>$</q></b>. Ketiga karakter khusus ini ditampilkan dengan karakter aslinya ke dalam browser.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>