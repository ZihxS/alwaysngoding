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
              <p class="mb-0">Supaya intruksi di dalam fungsi lebih dinamis, kalian dapat menggunakan parameter untuk memasukkan sebuah nilai ke dalam fungsi. Nilai tersebut akan diolah di dalam fungsi. Misalnya, pada contoh fungsi <b><q>kenalan</q></b> yang ada sebelumnya tidak mungkin nama yang dicetak adalah <b><q>Muhammad Saleh Solahudin</q></b> saja dan kalimat setelah perkenalan tidak mungkin selalu <b><q>Saya sangat senang dengan dunia pemrograman, saya sangat suka tantangan.</q></b>. Maka, kalian dapat menambahkan parameter menjadi seperti ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  function kenalan($nama, $kalimat) {
    echo "Halo semuanya, perkenalkan nama saya {$nama}.&lt;br&gt;";
    echo $kalimat;
  }

  kenalan('Karmila Sriwulan', 'Saya sangat senang ngobrol dan berkomunitas.');
  echo "&lt;hr&gt;";
  kenalan('Nurlaila', 'Saya sangat senang bermain game.');
  echo "&lt;hr&gt;";
  kenalan('John', 'Saya sangat suka berolahraga.');
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kita telah menambahkan parameter <b><q>$nama</q></b> dan <b><q>$kalimat</q></b> ke fungsi <b><q>kenalan</q></b> pada kode di atas. Dan kita menggunakan parameter tersebut di dalam fungsi <b><q>kenalan</q></b> agar fungsi tersebut menjadi dinamis.</p>
              <p>Lalu kita memanggil fungsi kenalan sebanyak 3x dengan argumen pertama dan kedua yang berbeda-beda. Jadi jika kode dijalankan maka akan menghasilkan output kenalan yang berbeda-beda.</p>
              <p>Kita juga bisa membuat parameter dengan nilai default, nilai default dapat kita berikan di parameter. Nilai default berfungsi untuk mengisi nilai sebuah parameter, kalau parameter tersebut tidak diisi nilainya.</p>
              <p class="mb-0">Misalnya, kita lupa mengisi parameter <b><q>$kalimat</q></b>, maka program akan error. Oleh karena itu, kita perlu memberikan nilai default supaya tidak error. Berikut adalah contoh menggunakan parameter default:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  function kenalan($nama, $kalimat='Saya sangat suka sekali ngoding.') {
    echo "Halo semuanya, perkenalkan nama saya {$nama}.&lt;br&gt;";
    echo $kalimat;
  }

  kenalan('Muhammad Saleh Solahudin'); // akan menggunakan parameter $kalimat default, karena argumen ke 2 tidak di isi (tidak didefinisikan)
  echo "&lt;hr&gt;";
  kenalan('Karmila Sriwulan', 'Saya sangat senang ngobrol dan berkomunitas.');
  echo "&lt;hr&gt;";
  kenalan('Nurlaila', 'Saya sangat senang bermain game.');
  echo "&lt;hr&gt;";
  kenalan('John', 'Saya sangat suka berolahraga.');
?&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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