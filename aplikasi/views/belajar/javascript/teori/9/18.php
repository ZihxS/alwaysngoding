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
            <h2 class="judul-teori">Mengenal Object "Math" pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Untuk operasi angka (number) dan matematika yang lebih rumit atau kompleks JavaScript menyediakan object <code class="custom">Math</code> yang terdiri dari berbagai konstanta dan juga method untuk memudahkan kita. Method yang tersedia misalnya untuk fungsi pemangkatan, akar kuadrat, logaritma, trigonometri dan lain-lain.</p>
              <p>Object <code class="cusotm">Math</code> memiliki beberapa konstanta matematika yang bisa kita gunakan, syntax untuk menggunakan konstanta pada object <code class="custom">Math</code> seperti ini: <code class="custom">Math.KONSTANTA</code>.</p>
              <p class="mb-0">Berikut adalah konstanta yang tersedia di Object <code class="custom">Math</code> pada JavaScript:</p>
              <ul>
                <li><b>Math.E</b> berisi nilai dari logaritma natural e (nilainya 2.718281828459045).</li>
                <li><b>Math.LN10</b> berisi nilai dari logaritma natural 10 (nilainya 2.302585092994046).</li>
                <li><b>Math.LN2</b> berisi nilai dari logaritma natural 2 (nilainya 0.6931471805599453).</li>
                <li><b>Math.LOG2E</b> berisi nilai dari logaritma natural e basis 2 (nilainya 1.4426950408889634).</li>
                <li><b>Math.LOG10E</b> berisi nilai dari logaritma natural e basis 10 (nilainya 0.4342944819032518).</li>
                <li><b>Math.SQRT1_2</b> berisi hasil dari 1 dibagi dengan akar kuadrat 2 (nilainya 0.707106781186).</li>
                <li><b>Math.SQRT2</b> berisi hasil akar kuadrat dari 2 (nilainya 1.4142135623730951).</li>
                <li><b>Math.PI</b> berisi nilai dari pi (π) (nilainya 3.141592653589793).</li>
              </ul>
              <p class="mb-0">Silahkan eksekusi kode di bawah ini untuk mengetahui hasilnya:</p>
              <pre class="language-javascript line-numbers"><code>console.log(Math.E);
console.log(Math.LN10);
console.log(Math.LN2);
console.log(Math.LOG2E);
console.log(Math.LOG10E);
console.log(Math.SQRT1_2);
console.log(Math.SQRT2);
console.log(Math.PI);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Contoh sederhana penggunaan konstanta pada object <code class="custom">Math</code> untuk menghitung luas lingkaran:</p>
              <pre class="language-javascript line-numbers"><code>let jariJari = 14;
let luasLingkaran = <mark class="keep">Math.PI</mark> * jariJari * jariJari;
console.log(luasLingkaran);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kita menghitung rumus luas lingkaran dengan menggunakan konstanta <code class="custom">Math.PI</code> pada kode yang ada di atas.</p>
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