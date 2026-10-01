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
  $u = 'belajar-php/teori/kondisi-dan-perulangan-pada-php';
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
            <h2 class="judul-teori">Perulangan foreach Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Umumnya perulangan <b><q>foreach</q></b> sama seperti perulangan <b><q>for</q></b>. Namun, ia lebih khusus digunakan untuk mecetak array. Berikut adalah bentuk dasar perulangan <b><q>foreach</q></b> pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  foreach($array as $isi) {
    echo $isi;
  }
?&gt;</code></pre>
              <p class="mb-0">Berikut adalah contoh penggunaan perulangan <b><q>foreach</q></b> pada PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $books = [
    "Never Too Young To Become A Billionaire",
    "Mimpi Sejuta Dolar",
    "Langkah Sejuta Suluh",
    "Think and Grow Rich"
  ];

  echo "Judul Buku Motivasi:";
  echo "&lt;ul&gt;";

  foreach($books as $book) {
      echo "&lt;li&gt;$book&lt;/li&gt;";
  }

  echo "&lt;/ul&gt;";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas akan menghasilkan output list html yang terbuat dari variabel <b><q>$books</q></b>. Dan berikut contoh penggunaan perulangan <b><q>foreach</q></b> yang lumayan kompleks tetapi sangat berguna:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $books = [
    [
      "judul" => "buku 1",
      "halaman" => "100",
      "pembuat" => "pembuat 1"
    ],
    [
      "judul" => "buku 2",
      "halaman" => "86",
      "pembuat" => "pembuat 2"
    ],
    [
      "judul" => "buku 3",
      "halaman" => "126",
      "pembuat" => "pembuat 3"
    ]
  ];

  foreach($books as $book) {
    echo "{$book['judul']}:";
    echo "&lt;ul&gt;";
    echo "&lt;li&gt;halaman: {$book['halaman']} lembar&lt;/li&gt;";
    echo "&lt;li&gt;pembuat: {$book['pembuat']}&lt;/li&gt;";
    echo "&lt;/ul&gt;";
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas akan mencetak masing-masing list (judul buku, halaman buku, dan pembuat buku) dari variabel <b><q>$books</q></b>. Contoh kode di atas sama seperti kita mengambil data dari database nantinya. Jadi perulangan <b><q>foreach</q></b> akan sangat sering digunakan saat kalian telah berkecimpung dengan data pada database (basis data).</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>