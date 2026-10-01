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
  $u = 'belajar-php/teori/tipe-data-pada-php';
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
            <h2 class="judul-teori">Beberapa Contoh Array Multidimensi</h2>
            <hr>
            <div class="konten-teori">
              <pre class="language-php line-numbers"><code>&lt;?php
  $ibu_kota = [
    ['thailand','bangkok'],
    ['perancis','paris'],
    ['vietnam','hanoi']
  ];

  echo "ibu kota {$ibu_kota[0][0]} adalah {$ibu_kota[0][1]}."; // ibu kota thailand adalah bangkok
  echo "ibu kota {$ibu_kota[1][0]} adalah {$ibu_kota[1][1]}."; // ibu kota perancis adalah paris
  echo "ibu kota {$ibu_kota[2][0]} adalah {$ibu_kota[2][1]}."; // ibu kota vietnam adalah hanoi
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-php line-numbers"><code>&lt;?php
  $orang = [
    [
      'nama' => 'Johan',
      'jenis_kelamin' => 'Laki-laki'
    ],
    [
      'nama' => 'Jesika',
      'jenis_kelamin' => 'Perempuan'
    ]
  ];

  echo "Saya {$orang[0]['jenis_kelamin']} bernama {$orang[0]['nama']}, Saya menyukai {$orang[1]['jenis_kelamin']} yang bernama {$orang[1]['nama']}.";
  // output: Saya Laki-laki bernama Johan, Saya menyukai Perempuan yang bernama Jesika.
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-php line-numbers"><code>&lt;?php
  $orang = [
    [
      'nama' => 'Johan',
      'hobi' => ['ngoding','membaca','melukis']
    ],
    [
      'nama' => 'Jesika',
      'hobi' => ['ngoding','berenang']
    ]
  ];

  echo "Saya {$orang[0]['nama']}. Hobi saya yaitu: {$orang[0]['hobi'][1]}, {$orang[0]['hobi'][0]} dan {$orang[0]['hobi'][2]}.";
  echo "Saya {$orang[1]['nama']}. Hobi saya yaitu: {$orang[1]['hobi'][0]} dan {$orang[1]['hobi'][1]}.";
  // output baris ke 13: Saya Johan. Hobi saya yaitu: membaca, ngoding dan melukis.
  // output baris ke 14: Saya Jesika. Hobi saya yaitu: ngoding dan berenang.
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Array sangat berguna di semua bahasa termasuk bahasa PHP, apalagi jika kalian membuat atau mengembangkan sebuah API (Application Programming Interface).</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>