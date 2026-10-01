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
            <h2 class="judul-teori">Perulangan Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Perulangan pada PHP sangatlah berguna, apalagi jika kalian sudah berbaur dengan banyak data yang harus diproses dan ditampilkan. Untuk lebih meyakinkan bahwa perulangan pada PHP sangatlah berguna, silahkan simak kode di bawah ini dengan teliti:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  echo "2 x 1 = 2";
  echo "&lt;br&gt;";
  echo "2 x 2 = 4";
  echo "&lt;br&gt;";
  echo "2 x 3 = 6";
  echo "&lt;br&gt;";
  echo "2 x 4 = 8";
  echo "&lt;br&gt;";
  echo "2 x 5 = 10";
  echo "&lt;br&gt;";
  echo "2 x 6 = 12";
  echo "&lt;br&gt;";
  echo "2 x 7 = 14";
  echo "&lt;br&gt;";
  echo "2 x 8 = 16";
  echo "&lt;br&gt;";
  echo "2 x 9 = 18";
  echo "&lt;br&gt;";
  echo "2 x 10 = 20";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
<pre class="language-php line-numbers"><code>&lt;?php
  for ($angka = 1; $angka <= 1000; $angka++) {
    $hasil = $angka * 2;
    echo "2 x {$angka} = {$hasil}";
    echo "&lt;br&gt;";
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada kotak kode pertama, output akan mencetak <b><q>2 x 1 = 2</q></b> sampai <b><q>2 x 10 = 20</q></b>, kode tersebut kita buat manual tanpa menggunakan perulangan. Jumlah baris kode pada kotak pertama adalah <b><q>21 baris kode</q></b>.</p>
              <p>Pada kotak kode kedua, output akan mencetak <b><q>2 x 1 = 2</q></b> sampai <b><q>2 x 1000 = 2000</q></b>, kode tersebut memanfaatkan perulangan dan kita hanya perlu membuat <b><q>7</q></b> baris kode saja. Lebih mudah dan lebih cepat bukan jika kita memanfaatkan perulangan?</p>
              Pada PHP ada 4 jenis perulangan yang bisa kalian gunakan:
              <ol>
                <li>Perulangan <b><q>for</q></b> (seperti contoh di atas).</li>
                <li>Perulangan <b><q>while</q></b>.</li>
                <li>Perulangan <b><q>do while</q></b>.</li>
                <li>Perulangan <b><q>foreach</q></b>.</li>
              </ol>
              <blockquote class="catatan-pelajaran">Bayangkan jika kalian mengetik manual dari <b><q>2 x 1 = 2</q></b> sampai <b><q>2 x 1000 = 2000</q></b>, kalian sudah membuang banyak waktu, tenaga dan kalian juga akan membuat kode yang sangat banyak padahal kalian bisa memanfaatkan perulangan.</blockquote>
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