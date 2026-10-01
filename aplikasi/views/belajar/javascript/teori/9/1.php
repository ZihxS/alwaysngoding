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
            <h2 class="judul-teori">Keyword var, let dan const</h2>
            <hr>
            <div class="konten-teori">
              <p>Keyword <code class="custom">var</code>, <code class="custom">let</code> dan <code class="custom">const</code> sama-sama untuk membuat atau mendeklarasikan variabel.<br>Lalu apa perbedaan <code class="custom">var</code>, <code class="custom">let</code> dan <code class="custom">const</code>? Kapan waktu terbaik kita menggunakannya?</p>
              <p class="mb-0">Tiga keyword tersebut memiliki perbedaan:</p>
              <ol class="mb-2">
                <li><code class="custom">var</code> dan <code class="custom">let</code> isinya dapat diubah kembali, sedangkan <code class="custom">const</code> (konstanta) isinya tidak bisa diubah.</li>
                <li><code class="custom">var</code> akan selalu terkena hoisting, apa itu hoisting? penjelasannya ada di bawah ya.</li>
                <li><code class="custom">var</code> adalah function scope sedangkan <code class="custom">let</code> dan <code class="custom">const</code> adalah block scope.</li>
              </ol>
              <blockquote class="catatan-pelajaran mb-2">Block adalah kode apa pun yang ada dalam kurung kurawal <code class="custom">{}</code> seperti fungsi, pernyataan kondisional dan perulangan.</blockquote>
              <p class="mb-0">Contoh penggunaan <code class="custom">var</code> dan <code class="custom">let</code> silahkan perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>var contoh1 = 'isi awal';
let contoh2 = 'isi awal';

console.log(contoh1); // isi awal
console.log(contoh2); // isi awal

contoh1 = 'isinya sudah diubah';
contoh2 = 'isinya sudah diubah';

console.log(contoh1); // isinya sudah diubah
console.log(contoh2); // isinya sudah diubah</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan berjalan dengan baik, tapi coba kalian ubah <code class="custom">var</code> atau <code class="custom">let</code> di kode baris ke 1 atau ke 2 dengan keyword <code class="custom">const</code> dan jalankan ulang kodenya, pasti kalian akan menemukan pesan error atau kode tidak menghasilkan output dengan maksimal.</p>
              <p class="mb-0"><b>Apa itu hoisting?</b><br>Untuk memahami apa itu hoisting silahkan perhatikan terlebih contoh di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>angka = 10; // mengisi nilai variabel angka

console.log(angka);

var angka; // mendeklarasikan variabel angka</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kenapa saat kode di atas saat dijalankan tidak menghasilkan error?, padahal kita baru bikin variabel <q>angka</q> nya di baris ke 5. Jadi setiap variabel yang menggunakan keyword <code class="custom">var</code> akan dipindahkan oleh JavaScript ke paling atas, jadi kode di atas sama seperti kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>var angka; // mendeklarasikan variabel angka
angka = 10; // mengisi nilai variabel angka

console.log(angka);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Jika kita menggunakan <code class="custom">let</code> seperti contoh di atas maka kita akan mendapatkan error atau output yang tidak sesuai, karena <code class="custom">let</code> tidak di-hoisting oleh JavaScript, perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>angka = 10; // mengisi nilai variabel angka

console.log(angka);

let angka; // mendeklarasikan variabel angka</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Jika kode di atas kalian jalankan maka kalian akan mendapat error atau output tidak sesuai.</p>
              <p><b>Apa itu scope?</b><br>Scope dalam JavaScript adalah konsep yang digunakan untuk membatasi pengaksesan suatu variabel.</p>
              <p><b>Apa itu global scope?</b><br>Global scope adalah scope di luar block.</p>
              <p><b>Apa itu local scope?</b><br>Local scope adalah scope di dalam block (terdiri dari function scope dan block scope).</p>
              <p class="mb-0"><b>Apa itu function scope dan block scope?</b><br>Untuk mengilustrasikan perbedaannya, perhatikan kode berikut:</p>
              <pre class="language-javascript line-numbers" data-line="7, 38"><code>// global scope
var contohVar = "ini contohVar global scope";
let contohLet = "ini contohLet global scope";
const contohConst = "ini contohConst global scope";

console.log("memanggil variabel di global scope:");
console.log(contohVar);
console.log(contohLet);
console.log(contohConst);

function test() {
  // function scope (karena di dalam function)
  var contohVar = "ini contohVar function scope";
  let contohLet = "ini contohLet function scope";
  const contohConst = "ini contohConst function scope";

  console.log("\nmemanggil variabel di function scope:");
  console.log(contohVar);
  console.log(contohLet);
  console.log(contohConst);
}

test();

if (true) {
  // block scope (karena di dalam block if)
  var contohVar = "ini contohVar block scope";
  let contohLet = "ini contohLet block scope";
  const contohConst = "ini contohConst block scope";

  console.log("\nmemanggil variabel di block scope:");
  console.log(contohVar);
  console.log(contohLet);
  console.log(contohConst);
}

console.log("\nmemanggil variabel di global scope:");
console.log(contohVar);
console.log(contohLet);
console.log(contohConst);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/5"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Jika kode di atas dijalankan, di baris ke 7 dan ke 38 hasilnya beda padahal sama-sama di global scope, kenapa begitu? itu adalah kekurangan keyword <code class="custom">var</code>, jadi sebenarnya di baris ke 27 itu kita dianggap menghapus <q>contohVar</q> yang ada pada global scope dan dibuat ulang di baris itu.</p>
              <blockquote class="catatan-pelajaran">Mulai sekarang ganti penulisan <code class="custom">var</code> dengan <code class="custom">let</code> ya biar lebih aman 😉, karena variabel pada bahasa pemrograman lain sifatnya sama seperti <code class="custom">let</code> bukan <code class="custom">var</code> 😉</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 9], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>