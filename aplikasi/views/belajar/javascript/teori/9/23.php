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
            <h2 class="judul-teori">Fungsi atau Method Yang Ada pada Object "Math"</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">
                <b>Math.pow() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.pow()</code> berfungsi untuk untuk mencari hasil pemangkatan. Fungsi ini membutuhkan 2 buah argumen. Argumen pertama adalah angka asal, dan argumen kedua adalah nilai pangkat. Berikut adalah contoh penggunaan fungsi atau method <code class="custom">Math.pow()</code> pada JavaScript:
              </p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.pow(25, 3)); // 25 pangkat 3 = 15625
console.log(Math.pow(15, 4)); // 15 pangkat 4 = 50625
console.log(Math.pow(10, 5)); // 10 pangkat 5 = 100000
console.log(Math.pow(50, 2)); // 50 pangkat 2 = 2500</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">
                <b>Math.random() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.random()</code> berfungsi untuk menghasilkan angka acak dalam setiap pemanggilan. Fungsi ini tidak membutuhkan argumen apapun. Nilai akhir berada dalam rentang 0 dan 1. Untuk hasil angka acak 1-100, kita tinggal mengalikan hasil fungsi ini dengan 100. Berikut adalah contoh penggunaan fungsi atau method <code class="custom">Math.random()</code> pada JavaScript:
              </p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.random());
console.log(Math.random() * 20); // acak sampai 20
console.log(Math.random() * 50); // acak sampai 50
console.log(Math.random() * 100); // acak sampai 100</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas saat dijalankan hasilnya masih koma atau angka desimal, bagaimana jika kita ingin benar-benar membuat angka acak misal dari 1 sampai 20 atau dari 1 sampai 100 tanpa koma? Kita bisa memanfaatkan fungsi pembulatan seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.floor(Math.random() * 20) + 1); // acak 1 sampai 20 tanpa koma
console.log(Math.floor(Math.random() * 100) + 1); // acak 1 sampai 100 tanpa koma</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-3">Kode yang ada di atas terdapat method <code class="custom">Math.floor()</code> yang berfungsi untuk membulatkan angka, kita akan mempelajari pembulatan di bagian selanjutnya.</p>
              <p class="mb-0">
                <b>Math.sqrt() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.sqrt()</code> digunakan untuk mencari hasil dari akar kuadrat sebuah angka. Fungsi ini membutuhkan 1 argumen yaitu angka yang akan dihitung. Berikut adalah contoh penggunaan fungsi <code class="custom">Math.sqrt()</code> pada JavaScript:
              </p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.sqrt(123));
console.log(Math.sqrt(25));
console.log(Math.sqrt(72));
console.log(Math.sqrt(97));
console.log(Math.sqrt(10));
console.log(Math.sqrt(4));
console.log(Math.sqrt(0));
console.log(Math.sqrt(-5));</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Jika <code class="custom">Math.sqrt()</code> argumennya diberi angka negatif maka output yang akan dihasilkan adalah <q>NaN</q> (Not a Number).</p>
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