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
  $u = 'belajar-javascript/teori/tipe-data-pada-javascript';
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
            <h2 class="judul-teori">Tipe Data String</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data string adalah tipe data yang <b>berisi text, kalimat atau kumpulan karakter</b>.</p>
              <p>Tipe data string adalah tipe data yang paling sering digunakan. Karakter yang didukung saat ini adalah 256 karakter ASCII. List karakter ASCII tersebut dapat dilihat di <a href="http://www.ascii-code.com" target="_blank">http://www.ascii-code.com</a>.</p>
              <p>Untuk membuat sebuah tipe data string, kita hanya perlu menambahkan tanda kutip pada awal dan akhir dari text. JavaScript mendukung penggunaan tanda kutip satu (<code class="custom">'</code>) maupun tanda kutip ganda (<code class="custom">"</code>). Didalam sumber Bahasa Inggris sering disebut sebagai single quote dan double quote.</p>
              <p class="mb-0">Berikut adalah contoh penulisan tipe data string pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var contohSatu = 'Ini adalah string';
var contohDua = "Ini juga string";
var kataKata = 'Mark Zuckerberg berkata: "Ketahuilah! Resiko terbesar di dunia ini adalah tidak mengambil resiko apapun!"';
var pesan = "Hari jum'at adalah hari yang mulia";
</code></pre>
              <p>Jika sebuah string menggunakan karakter awal tanda kutip satu, maka juga harus diakhiri dengan tanda kutip satu juga, walaupun di dalam kalimat tersebut terdapat tanda kutip dua, dan begitu juga sebaliknya.</p>
              <p>Jika sebuah string menggunakan karakter awal tanda kutip satu dan di dalamnya juga terdapat tanda kutip satu, kalian harus mendahuluinya dengan karakter backslash (jadi seperti ini penulisannya: <code class="custom">\'</code>) agar tidak dianggap sebagai penutup string. Dan jika di dalam string kalian ingin menulis tanda backslash, kalian harus menulisnya 2 kali (seperti ini: <code class="custom">\\</code>). Ketentuin ini berlaku juga jika kalian menggunakan string yang dibungkus dengan kutip 2 (<code class="custom">"</code>) dan di dalamnya terdapat kutip 2 juga.</p>
              <p class="mb-0">Perhatikan contoh di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>var contoh1 = 'Sebelum hari sabtu adalah hari jum\'at';
var contoh2 = "Mark Zuckerberg berkata: \"Ketahuilah! Resiko terbesar di dunia ini adalah tidak mengambil resiko apapun!\"";
var contoh3 = "Anda telah berhasil menghapus file: C:\\xampp\\htdocs\\latihan\\index.html";
var contoh4 = 'Anda telah berhasil membuat file baru: C:\\xampp\\htdocs\\latihan\\js\\latihan.js';

console.log(contoh1); // Sebelum hari sabtu adalah hari jum'at
console.log(contoh2); // Mark Zuckerberg berkata: "Ketahuilah! Resiko terbesar di dunia ini adalah tidak mengambil resiko apapun!"
console.log(contoh3); // Anda telah berhasil menghapus file: C:\xampp\htdocs\latihan\index.html
console.log(contoh4); // Anda telah berhasil membuat file baru: C:\xampp\htdocs\latihan\js\latihan.js</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>