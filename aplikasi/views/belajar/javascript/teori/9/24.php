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
            <h2 class="judul-teori">Fungsi atau Method Yang Ada pada Object "Math" (Pembulatan)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Apabila kita membutuhkan bilangan bulat (integer), kita bisa gunakan fungsi pembulatan di objek Math. Ada beberapa fungsi yang sering digunakan:</p>
              <ul>
                <li>floor()</li>
                <li>ceil()</li>
                <li>round()</li>
              </ul>
              <p class="mb-0">
                <b>Math.floor() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.floor()</code> berfungsi untuk pembulatan kebawah dari sebuah nilai desimal. Fungsi ini membutuhkan 1 argumen, yaitu angka desimal yang akan dibulatkan. Berikut adalah cara penggunaannya:
              </p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.floor(5.99));
console.log(Math.floor(5.01));
console.log(Math.floor(5.0));
console.log(Math.floor(2.5));
console.log(Math.floor(2.6));
console.log(Math.floor(2.4));</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">
                <b>Math.ceil() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.ceil()</code> berfungsi untuk pembulatan keatas dari sebuah nilai desimal. Fungsi ini membutuhkan 1 argumen, yaitu angka desimal yang akan dibulatkan. Berikut adalah cara penggunaannya:
              </p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.ceil(5.99));
console.log(Math.ceil(5.01));
console.log(Math.ceil(5.0));
console.log(Math.ceil(2.5));
console.log(Math.ceil(2.6));
console.log(Math.ceil(2.4));</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">
                <b>Math.round() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.round()</code> berfungsi untuk membulatkan nilai angka ke bilangan terdekat. Jika nilai desimal dibawah 5 (misal: 1.4) maka akan dibulatkan ke bawah, namun jika nilai desimal bernilai 5 atau lebih (misal: 1.5 dan 1.7) akan dibulatkan keatas. Berikut adalah cara penggunaannya:
              </p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.round(5.99));
console.log(Math.round(5.01));
console.log(Math.round(5.0));
console.log(Math.round(2.5));
console.log(Math.round(2.6));
console.log(Math.round(2.4));</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Ketiga method di atas sangat berguna, misalnya untuk menentukan uang kembalian jika nilainya desimal.</p>
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