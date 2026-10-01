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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript';
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
            <h2 class="judul-teori">Method startsWith, endsWith dan includes pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Kegunaan dari method startsWith, endsWith dan includes pada JavaScript:</p>
              <ul>
                <li>Method <code class="custom">startsWith()</code> berguna untuk memastikan apakah terdapat huruf atau kata tertentu diawal string.</li>
                <li>Method <code class="custom">endsWith()</code> berguna untuk memastikan apakah terdapat huruf atau kata tertentu diakhir string.</li>
                <li>Method <code class="custom">includes()</code> berguna untuk memastikan apakah suatu string mengandung kata tertentu.</li>
              </ul>
              <p>Ketiga method di atas akan mengembalikan atau menghasilkan nilai boolean (true atau false). Jika hasilnya <q>true</q> berarti kata atau huruf ditemukan dan jika hasilnya <q>false</q> berarti kata atau huruf tidak ditemukan pada string tersebut sesuai dengan method apa yang digunakan (starts/ends/includes).</p>
              <p class="mb-0">Berikut ini adalah contoh implementasi ketiga method tersebut:</p>
              <pre class="language-javascript line-numbers"><code>var kalimat = 'Saya sangat senang belajar JavaScript di Always Ngoding';

console.log(`Apakah ada kata "Saya" diawal kalimat? ${kalimat.startsWith("Saya")}`);
console.log(`Apakah ada kata "Ngoding" diakhir kalimat? ${kalimat.endsWith("Ngoding")}`);
console.log(`Apakah ada kata "belajar" dikalimat? ${kalimat.includes("belajar")}`);
console.log(`Apakah ada kata "JavaScript" dikalimat? ${kalimat.includes("JavaScript")}`);
console.log(`Apakah ada kata "Halo" diawal kalimat? ${kalimat.startsWith("Halo")}`);
console.log(`Apakah ada kata "Koding" diakhir kalimat? ${kalimat.endsWith("Koding")}`);
console.log(`Apakah ada kata "HTML" dikalimat? ${kalimat.includes("HTML")}`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <ul>
                <li>Pada baris ke 3 kita mengecek apakah terdapat kata <q>Saya</q> diawal variabel <q>kalimat</q>.</li>
                <li>Pada baris ke 4 kita mengecek apakah terdapat kata <q>Ngoding</q> diakhir variabel <q>kalimat</q>.</li>
                <li>Pada baris ke 5 kita mengecek apakah variabel <q>kalimat</q> mengandung kata <q>belajar</q>.</li>
                <li>Pada baris ke 6 kita mengecek apakah variabel <q>kalimat</q> mengandung kata <q>JavaScript</q>.</li>
                <li>Pada baris ke 7 kita mengecek apakah terdapat kata <q>Halo</q> diawal variabel <q>kalimat</q>.</li>
                <li>Pada baris ke 8 kita mengecek apakah terdapat kata <q>Koding</q> diakhir variabel <q>kalimat</q>.</li>
                <li>Pada baris ke 9 kita mengecek apakah variabel <q>kalimat</q> mengandung kata <q>HTML</q>.</li>
              </ul>
              <p class="mb-0">Contoh lain:</p>
              <pre class="language-javascript line-numbers"><code>var nama = [
  'Fransisko',
  'Aji Suburudin',
  'Saleh Solahudin',
  'Abdul Ghani',
  'Ahmad Djarkasi',
  'Ahmad Awaludin'
];

nama.forEach(function(namaOrang) {
  if (namaOrang.includes('udin')) {
    console.log(`${namaOrang} termasuk kedalam golongan udin sedunia.`);
  } else {
    console.log(`${namaOrang} tidak termasuk kedalam golongan udin sedunia.`);
  }
});</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-javascript line-numbers"><code>var nama = [
  'Muhammad Joko',
  'Aji Suburudin',
  'Muhammad Sanusi',
  'Ahmad Djarkasi',
  'Abdul Ghani',
  'Muhammad Saleh Solahudin'
];

nama.forEach(function(namaOrang) {
  if (namaOrang.startsWith('Muhammad')) {
    console.log(`Halo ${namaOrang}, nama awal anda "Muhammad".`);
  } else {
    console.log(`Halo ${namaOrang}, nama awal anda bukan "Muhammad".`);
  }
});</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-javascript line-numbers"><code>var listDomain = [
  'example.test',
  'duniailkom.com',
  'ruby.id',
  'nodejs.org',
  'codeigniter.com',
  'reactjs.org'
];

var domainDotCom = '';

listDomain.forEach(function(domain) {
  if (domain.endsWith('.com')) {
    domainDotCom = domainDotCom.concat(domain, ', ');
  }
});

console.log(`List domain ".com": ${domainDotCom.substr(0, domainDotCom.length-2)}.`);</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>