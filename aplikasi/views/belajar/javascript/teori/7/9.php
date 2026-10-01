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
            <h2 class="judul-teori">Menemukan Letak Index String</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">String memiliki index seperti array, index dihitung per karakter pada string. Sebagai contoh misal kita mempunyai string <q>halo</q>, string <q>halo</q> tersebut mempunyai index seperti berikut:</p>
              <ul>
                  <li>Index ke 0 adalah <q>h</q> dari string <q>halo</q>.</li>
                  <li>Index ke 1 adalah <q>a</q> dari string <q>halo</q>.</li>
                  <li>Index ke 2 adalah <q>l</q> dari string <q>halo</q>.</li>
                  <li>Index ke 3 adalah <q>o</q> dari string <q>halo</q>.</li>
              </ul>
              <blockquote class="catatan-pelajaran mb-2">Perlu kalian ingat bahwa index itu dimulainya dari <q>0</q> bukan <q>1</q> 😉</blockquote>
              <p class="mb-0">Untuk menemukan letak index string kita bisa menggunakan fungsi yang sudah di sediakan oleh JavaScript yaitu <code class="custom">indexOf()</code>. Berikut contoh penggunaan fungsi <code class="custom">indexOf()</code> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var kalimat = 'Saya sangat senang belajar JavaScript di Always Ngoding';

console.log(kalimat.indexOf('sangat'));</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode di atas akan menghasilkan output <q>5</q> pada console, <q>5</q> tersebut muncul karena kata <q>sangat</q> dimulai dari index ke 5. Jika kalian ubah kata <q>sangat</q> di atas menjadi <q>belajar</q> maka outputnya akan berubah menjadi <q>19</q> karena kata <q>belajar</q> dimulai dari index ke 19.</p>
              <p class="mb-0">Fungsi <code class="custom">indexOf</code> secara default mencari mulai dari index pertama. Namun kita dapat menentukan index dimulainya pencarian. Kita hanya perlu menambahkan parameter kedua berupa angka. Berikut contohnya:</p>
              <pre class="language-javascript line-numbers"><code>var kalimat = 'Saya sangat senang belajar JavaScript di Always Ngoding';

console.log(kalimat.indexOf('t', 12));</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Angka 12 di atas digunakan sebagai awal mulai pencarian yaitu dari index ke <q>12</q>, jika kalian ubah parameter ke 2 menjadi <q>1</q> sampai <q>10</q> maka yang akan muncul ouputnya adalah <q>10</q> dan <q>t</q> selanjutnya tidak akan dicari lagi karena <q>t</q> sudah ketemu di index ke 10.</p>
              <blockquote class="catatan-pelajaran">Fungsi <code class="custom">indexOf()</code> mencari string secara case sensitive (memperhatikan besar kecilnya huruf/karakter).</blockquote>
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