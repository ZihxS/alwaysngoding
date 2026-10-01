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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/function-pada-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Fungsi (Function) Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Fungsi pada PHP dapat dibuat dengan kata kunci <b><q>function</q></b>, lalu diikuti dengan nama fungsinya. Berikut adalah contoh cara membuat fungsi pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  function nama_fungsi() {
    // tempat untuk menulis kode (intruksi) dari fungsi
  }
?&gt;</code></pre>
              <p class="mb-0">Berikut contoh membuat fungsi dengan intruksinya pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  function kenalan() {
    echo "Halo semuanya, perkenalkan nama saya Muhammad Saleh Solahudin.&lt;br&gt;";
    echo "Saya sangat senang dengan dunia pemrograman, saya sangat suka tantangan.";
  }
?&gt;</code></pre>
              <p class="mb-0">Fungsi yang sudah dibuat tidak akan menghasilkan apapun kalau tidak dipanggil. Kita dapat memanggil fungsi dengan menuliskan namanya. Jadi, kode lengkapnya akan seperti ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  function kenalan() {
    echo "Halo semuanya, perkenalkan nama saya Muhammad Saleh Solahudin.&lt;br&gt;";
    echo "Saya sangat senang dengan dunia pemrograman, saya sangat suka tantangan.";
  }

  kenalan();
  echo "&lt;hr&gt;";
  kenalan();
  echo "&lt;hr&gt;";
  kenalan();
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas akan memanggil intruksi pada isi <b><q>function kenalan()</q> sebanyak 3x</b>. Bayangkan jika kita tidak memakai fungsi, pasti kodenya menjadi lebih banyak daripada kode di atas. Oleh karena itu <b><q>function</q></b> pada PHP sangat berguna untuk membuat kode menjadi sedikit dan terlihat rapih.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>