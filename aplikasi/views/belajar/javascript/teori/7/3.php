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
            <h2 class="judul-teori">Expression Interpolation</h2>
            <hr>
            <div class="konten-teori">
              <p>Expression Interpolation ditulis dengan dolar sign dan kurung kurawal seperti ini <code class="custom">${}</code>, kita bisa mencantumkan atau menyisipkan variabel atau statement JavaScript pada apitan kurung kurawalnya.</p>
              <p class="mb-0">Contoh:</p>
              <pre class="language-javascript line-numbers"><code>var namaDepan = 'Fajar';
var namaBelakang = 'Sobirin';

console.log(`Halo, nama lengkap saya adalah <mark class="keep">${namaDepan}</mark> <mark class="keep">${namaBelakang}</mark>.`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Jika kode di atas kita cetak atau ketik atau tulis menggunakan string biasa maka kodenya akan seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>var namaDepan = 'Fajar';
var namaBelakang = 'Sobirin';

console.log('Halo, nama lengkap saya adalah ' + namaDepan + ' ' + namaBelakang + '.');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Dari kedua contoh diatas penulisan string dengan template literal atau template string lebih mudah dimengerti dan dibaca bukan?</p>
              <p>Pada modul dan bagian-bagian sebelumnya memang kita tidak menggunakan template literal (bertujuan untuk melatih fokus kalian, dan agar kalian bisa membedakan penggunaan <q>+</q> untuk string dan untuk number), tetapi untuk selanjutnya kita akan pakai terus template literal atau template string dalam penulisan atau pemrosesan string.</p>
              <p class="mb-0">Contoh lain dari expression interpolation:</p>
              <pre class="language-javascript line-numbers"><code>var angkaSatu = 10;
var angkaDua = 25;

console.log(`<mark class="keep">${angkaSatu}</mark> + <mark class="keep">${angkaDua}</mark> = <mark class="keep">${angkaSatu + angkaDua}</mark>`);</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-javascript line-numbers"><code>var angkaSatu = 10;
var angkaDua = 2;

function perkalian(param1, param2) {
  return param1*param2;
}

console.log(`<mark class="keep">${angkaSatu}</mark> dikali <mark class="keep">${angkaDua}</mark> hasilnya adalah <mark class="keep">${perkalian(angkaSatu, angkaDua)}</mark>`);</code></pre>
              <div class="mb-2">
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