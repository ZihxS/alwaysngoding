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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript';
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
            <h2 class="judul-teori">Method push() dan pop()</h2>
            <hr>
            <div class="konten-teori">
            	<p>Method <code class="custom">push()</code> di JavaScript berguna untuk menambah elemen baru diakhir array.</p>
            	<p class="mb-0">Berikut adalah contoh penggunaan method <code class="custom">push()</code> pada JavaScript:</p>
            	<pre class="language-javascript"><code>var karyawan = ['Aini', 'Anjani', 'Ratih'];

// sebelum menggunakan push()
console.log(karyawan);

// setelah menggunakan method push()
karyawan.push('Septi');
console.log(karyawan);

// kita juga bisa menambah lebih dari satu
karyawan.push('Nadia', 'Muti');
console.log(karyawan);</code></pre>
							<div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/8/{$b}/1?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Method <code class="custom">pop()</code>di JavaScript menghapus elemen paling akhir pada sebuah array.</p>
              <p class="mb-0">Berikut adalah contoh penggunaan method <code class="custom">pop()</code> pada JavaScript:</p>
              <pre class="language-javascript"><code>var karyawan = ['Aini', 'Anjani', 'Ratih'];
// sebelum menggunakan pop()
console.log(karyawan);

// setelah menggunakan method pop()
karyawan.pop();
console.log(karyawan);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/8/{$b}/2?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Method <code class="custom">push()</code> dan <code class="custom">pop()</code> mirip seperti <code class="custom">unshift()</code> dan <code class="custom">shift()</code>, bedanya jika <code class="custom">push()</code> dan <code class="custom">pop()</code> akan menghapus dan menambah elemen di akhir array sedangkan <code class="custom">unshift()</code> dan <code class="custom">shift()</code> akan menghapus dan menambah elemen di awal array.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>