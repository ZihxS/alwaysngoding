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
            <h2 class="judul-teori">Tagged Template Literal</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Dengan tagged template literal kita bisa mengolah template literal (template strings) menggunakan fungsi, perhatikan contoh di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>function tag1(strings, nama, umur) {
  var string1 = strings[0];
  var string2 = strings[1];
  var string3 = strings[2];

  return `${string1}${nama}${string2}${umur}${string3}`;
};

function tag2(<mark class="keep">strings</mark>, nama, umur) {
  return strings;
};

function tag3(strings, <mark class="keep">nama</mark>, <mark class="keep">umur</mark>) {
  return `ini hasil dari expression interpolation: '${nama}' dan '${umur}'.`;
};

var nama = "Saleh";
var umur = 20;

var contohPenggunaanTag1 = tag1`Nama saya ${nama} dan saya berumur ${umur} tahun.`;
var contohPenggunaanTag2 = tag2`<mark class="keep">Nama saya </mark>${nama}<mark class="keep"> dan saya berumur </mark>${umur}<mark class="keep"> tahun.</mark>`;
var contohPenggunaanTag3 = tag3`Nama saya <mark class="keep">${nama}</mark> dan saya berumur <mark class="keep">${umur}</mark> tahun.`;

console.log(contohPenggunaanTag1);
console.log(contohPenggunaanTag2);
console.log(contohPenggunaanTag3);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>String selain hasil interpolasi akan masuk sebagai parameter pertama dalam bentuk array (pada contoh di atas kita menamai parameternya dengan nama <q>strings</q>).</p>
              <p class="mb-0">Parameter <q>strings</q> di atas menerima 3 string yang akan dimasukkan dan dijadikan sebuah array:</p>
              <ol>
                <li>String pertama: <q>Nama saya </q> (contoh kode baris ke 2).</li>
                <li>String kedua: <q> dan saya berumur </q> (contoh kode baris ke 3).</li>
                <li>String ketiga: <q> tahun.</q> (contoh kode baris ke 4).</li>
              </ol>
              <p>Expression interpolation <code class="custom">${nama}</code> dan <code class="custom">${umur}</code> akan masuk sebagai parameter sisanya yang terpisah (parameter ke 2 dan ke 3).</p>
              <p class="mb-0">Jika kalian masih bingung kalian bisa melihat kode di atas yang telah ditandai:</p>
              <ul>
                <li>Kode baris ke 9 yang diberi tanda itu dihasilkan dari kode baris ke 21 yang diberi tanda.</li>
                <li>Kode baris ke 13 yang diberi tanda itu dihasilkan dari kode baris ke 22 yang diberi tanda.</li>
              </ul>
              <blockquote class="catatan-pelajaran">Untuk saat ini kalian boleh coba pahami terlebih dahulu apa itu tagged template literal, suatu saat nanti kalian pasti mengetahui fungsi sebenarnya apalagi jika kalian menggunakan atau terjun ke framework JavaScript.</blockquote>
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