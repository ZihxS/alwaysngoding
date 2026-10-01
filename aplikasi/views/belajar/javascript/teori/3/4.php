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
  $u = 'belajar-javascript/teori/dasar-javascript';
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
            <h2 class="judul-teori">Cara Membuat Variabel di JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Cara membuat variabel yang umum digunakan di JavaScript adalah menggunakan kata kunci <b><q>var</q></b> lalu diikuti dengan nama variabel dan nilainya.</p>
              <p class="mb-0">Berikut adalah contoh cara membuat variabel di JavaScript:</p>
              <pre class="language-javascript"><code>var nama = "<?= $this->session->ang_nama_pengguna; ?>";</code></pre>
              <p>Pada contoh di atas, kita membuat variabel <b><q>nama</q></b> dengan nilai berupa teks (string) yang berisi <b><q><?= $this->session->ang_nama_pengguna; ?></q></b>.</p>
              <p class="mb-0">Contoh 2:</p>
              <pre class="language-javascript line-numbers"><code>var url = "https://example.test";
var namaWebsite = "Always Ngoding";
var founderAlwaysNgoding = "Muhammad Saleh Solahudin";</code></pre>
              <p>Pada contoh di atas, kita menggunakan huruf besar atau kapital untuk nama variabel yang terdiri dari dua suku kata atau lebih. Kenapa tidak menggunakan underscore seperti bahasa pemrograman lain? Pada JavaScript kita dianjurkan menggunakan camelCase dalam penamaan variabel.</p>
              <p class="mb-0">Sebenarnya boleh saja menggunakan underscore seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>var nama_website = "Always Ngoding";
var founder_always_ngoding = "Muhammad Saleh Solahudin";</code></pre>
              <p>Kode di atas tidak akan menjadi masalah, program masih tetap berjalan dengan normal. Namun, mayoritas programmer yang menggunakan JavaScript menggunakan camelCase untuk menamakan variabel. Pilihan ada ditangan kalian, kalian lebih suka dan nyaman pakai yang mana 😉</p>
              <p class="mb-0">Selain menggunakan kata kunci <b><q>var</q></b>, kalian bisa juga menggunakan kata kunci <b><q>let</q></b> atau tanpa kata kunci apapun:</p>
              <pre class="language-javascript line-numbers"><code>var x = "isi variabel x";
let y = "isi variabel y";
z = "isi variabel z";</code></pre>
              <p class="mb-0">Semua cara untuk membuat variabel yang ada pada kode di atas itu benar, namun pada umumnya orang-orang menggunakan kata kunci <b><q>var</q></b> agar lebih jelas pembacaan dan maknanya.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>