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
            <h2 class="judul-teori">Macam-Macam Gaya Penulisan Fungsi di JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <pre class="language-javascript line-numbers"><code>let perkenalan = function(nama, umur) {
  console.log(`nama saya ${nama} dan saya berumur ${umur} tahun.`);
}
perkenalan('agoy', 20);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-javascript line-numbers"><code>let perkenalan = (nama, umur) <mark class="keep">=></mark> {
  console.log(`nama saya ${nama} dan saya berumur ${umur} tahun.`);
}
perkenalan('agoy', 20);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas bisa disebut <q>arrow function</q> karena menggunakan tanda panah pada penulisannya (perhatikan kode di atas yang diberi tanda).</p>
              <p class="mb-0">Kedua contoh di atas jika dituliskan ke fungsi yang telah kita pelajari maka penulisannya akan jadi seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>function perkenalan(nama, umur) {
  console.log(`nama saya ${nama} dan saya berumur ${umur} tahun.`);
}
perkenalan('agoy', 20);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">Di zaman sekarang <q>arrow function</q> lebih sering digunakan di kode Javascript, karena lebih sederhana dan sudah dioptimalkan.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 9], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>