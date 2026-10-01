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
  $x = str_replace('Di Javascript','di JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/aturan-penulisan-kode-di-javascript';
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
            <h2 class="judul-teori">Case Sensitivity</h2>
            <hr>
            <div class="konten-teori">
              <p>Di JavaScript, penulisan huruf besar dan huruf kecil itu dibedakan, atau dalam istilah pemrograman bersifat Case Sensitif.</p>
              <p>Hal ini berarti penulisan variabel, keyword, maupun nama fungsi di dalam JavaScript harus konsisten. Variabel <b><q>umur</q></b>, <b><q>UMUR</q></b> dan <b><q>Umur</q></b> merupakan 3 variabel berbeda. Contoh untuk penulisan keyword percabangan <b><q>if</q></b> harus ditulis dengan <b><q>if</q></b>, bukan <b><q>If</q></b> apalagi <b><q>IF</q></b>.</p>
              <p>Untuk menghindari permasalahan, sebaiknya kalian membuat ketentuan untuk menggunakan huruf kecil untuk semua penulisan keyword di dalam JavaScript.</p>
              <p class="mb-1">Berikut adalah contoh penggunaan keyword percabangan <b><q>if</q></b> yang benar:</p>
              <pre class="language-javascript"><code>if (true) {
  console.log('ini kode yang benar!');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mt-3 mb-1">Berikut adalah contoh penggunaan keyword percabangan <b><q>if</q></b> yang salah:</p>
              <pre class="language-javascript"><code>IF (true) {
  console.log('ini kode yang salah!');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/2/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Jika kalian mencoba kode yang pertama maka JavaScript akan berjalan dengan normal dan tidak ada erorr atau kendala.</p>
              <p class="mb-1">Jika kalian mencoba kode yang kedua maka kalian akan mendapatkan error atau kendala.</p>
              <blockquote class="catatan-pelajaran">Kalian abaikan dahulu saja kode-kode diatas jika belum paham apa maksud dan artinya, yang terpenting kalian coba saja untuk eksekusi kedua kode yang ada di atas dan lihat outputnya ya.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>