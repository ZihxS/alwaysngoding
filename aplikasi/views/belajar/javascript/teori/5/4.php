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
  $u = 'belajar-javascript/teori/function-dan-object-pada-javascript';
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
            <h2 class="judul-teori">Fungsi Yang Megembalikan Nilai (Return a Value)</h2>
            <hr>
            <div class="konten-teori">
              <p>Hasil pengolahan nilai dari fungsi mungkin saja kita butuhkan untuk pemrosesan berikutnya. Oleh karena itu, kita harus membuat fungsi yang dapat mengembalikan nilai.</p>
              <p class="mb-0">Pengembalian nilai dalam fungsi dapat menggunakan kata kunci <b><q>return</q></b>. Berikut adalah contoh membuat fungsi yang mengembalikan nilai:</p>
              <pre class="language-javascript line-numbers"><code>function hitungUsia(tahunLahir, tahunSekarang) {
  var usia = tahunSekarang - tahunLahir;
  return usia; // mengembalikan integer
}

var usiaAgus = hitungUsia(1990, <?= date('Y'); ?>);
var usiaDanu = hitungUsia(1992, <?= date('Y'); ?>);
var usiaAndi = hitungUsia(1995, <?= date('Y'); ?>);
var usiaArif = hitungUsia(2000, <?= date('Y'); ?>);
var usiaDori = hitungUsia(1885, <?= date('Y'); ?>);

console.log('usia agus adalah ' + usiaAgus);
console.log('usia danu adalah ' + usiaDanu);
console.log('usia andi adalah ' + usiaAndi);
console.log('usia arif adalah ' + usiaArif);
console.log('usia dori adalah ' + usiaDori);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-javascript line-numbers"><code>function cekUsia(usia) {
  var kondisi = null;

  if (usia >= 0 && usia <= 25) {
    kondisi = 'masih muda';
  } else {
    kondisi = 'sudah tua';
  }
  return kondisi; // mengembalikan string
}

var dani = cekUsia(17);
var dini = cekUsia(45);

console.log('dani ' + dani);
console.log('dini ' + dini);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas kita melakukan percabangan atau pengkondisian (<code class="custom">if</code>, <code class="custom">else</code>). Kalian akan mempelajarinya nanti.</p>
              <pre class="language-javascript line-numbers"><code>function hpNyala(sisaBaterai) {
  if (sisaBaterai > 1) {
    return true; // mengembalikan boolean (true)
  } else {
    return false; // mengembalikan boolean (false)
  }
}

for (var baterai = 20; baterai > 0; baterai--) {
  var kondisiHP = hpNyala(baterai);
  if (kondisiHP) {
    console.log("HP masih menyala.");
  } else {
    console.log("HP sudah mati.");
  }
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas kita melakukan percabangan atau pengkondisian (<code class="custom">if</code>, <code class="custom">else</code>). Pada kode di atas kita juga melakukan perulangan (<code class="custom">for</code>). Kalian akan mempelajari pengkondisian dan perulangan nanti.</p>
              <p class="mb-0">Kode-kode yang ada di atas adalah beberapa contoh pembuatan fungsi pada JavaScript yang mengembalikan nilai (return a value). Nilai yang dikembalikan bisa berupa integer, float, string, boolean bahkan array juga bisa loh.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>