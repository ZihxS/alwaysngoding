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
                <b>Math.abs() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.abs()</code> berfungsi untuk menghasilkan nilai absolut (nilai negatif akan menjadi positif, sedangkan nilai positif akan tetap positif). Fungsi ini membutuhkan 1 argumen angka. Berikut adalah contoh penggunaan <code class="custom">Math.abs()</code>:
              </p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.abs(-5));
console.log(Math.abs(7));
console.log(Math.abs(-22.78));
console.log(Math.abs(50.15));</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>
                <b>Math.acos() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.acos()</code> berfungsi untuk menghitung nilai arccosine. Fungsi ini membutuhkan 1 argumen angka dengan nilai antara -1 sampai dengan 1. Nilai akhir fungsi adalah 0 sampai dengan π radian.
              </p>
              <hr>
              <p>
                <b>Math.asin() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.asin()</code> berfungsi untuk menghitung nilai arcsine. Fungsi ini membutuhkan 1 argumen angka dengan nilai antara -1 sampai dengan 1. Nilai akhir fungsi adalah -π/2 sampai dengan π/2 radian.
              </p>
              <hr>
              <p>
                <b>Math.atan() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.atan()</code> berfungsi untuk menghitung nilai arctangent. Fungsi ini membutuhkan 1 argumen angka dengan nilai apapun. Nilai akhir fungsi adalah -π/2 sampai dengan π/2 radian.
              </p>
              <hr>
              <p>
                <b>Math.atan2() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.atan2()</code> berfungsi untuk menghitung nilai arctangent dari rasio y/x. Fungsi ini membutuhkan 2 buah argumen untuk nilai y dan x. Nilai hasil fungsi adalah diantara -π dan π radians.
              </p>
              <hr>
              <p>
                <b>Math.cos() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.cos()</code> berfungsi untuk menghitung nilai cosinus. Fungsi ini membutuhkan 1 buah argumen dalam bentuk sudut dengan nilai radian. Untuk mengonversi derajat menjadi radian, kalikan besar sudut dengan 0.017453293 (2π/360). Nilai akhir fungsi ini berada antara −1.0 dan 1.0.
              </p>
              <hr>
              <p>
                <b>Math.sin() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.sin()</code> berfungsi untuk menghitung hasil sinus. Fungsi ini membutuhkan 1 buah argumen dalam bentuk sudut dengan nilai radian. Untuk mengonversi derajat menjadi radian, kalikan besar sudut dengan 0.017453293 (2π/360). Nilai akhir fungsi ini berada antara −1.0 dan 1.0.
              </p>
              <hr>
              <p>
                <b>Math.tan() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.tan()</code> berfungsi untuk menghitung hasil tangen. Fungsi ini membutuhkan 1 buah argumen dalam bentuk sudut dengan nilai radian. Untuk mengonversi derajat menjadi radian, kalikan besar sudut dengan 0.017453293 (2π/360).
              </p>
              <hr>
              <p>
                <b>Math.log() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.log()</code> berfungsi untuk menghitung nilai logaritma natural, yaitu nilai dari log e x. Fungsi ini membutuhkan 1 buah argumen angka.
              </p>
              <hr>
              <p>
                <b>Math.exp() pada JavaScript</b>
                <br>
                Method <code class="custom">Math.exp()</code> digunakan untuk menghitung hasil dari e^x dimana x adalah argumen yang diberikan dan e merupakan logaritma natural (nilainya 2.718).
              </p>
              <p class="mb-0">Eksekusi kode di bawah ini untuk melihat hasil dari method-method yang ada pada object <code class="custom">Math</code> di atas:</p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.acos(0.8));
console.log(Math.asin(0.75));
console.log(Math.atan(7));
console.log(Math.atan2(3, 5));
console.log(Math.cos(5.35));
console.log(Math.sin(10));
console.log(Math.tan(20));
console.log(Math.log(45));
console.log(Math.exp(10));</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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