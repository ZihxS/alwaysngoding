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
  $u = 'belajar-php/teori/syntax-dasar-php';
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
            <h2 class="judul-teori">Komentar di PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-2">
                Sama seperti HTML, CSS dan JS. PHP juga mempunyai komentar, fungsi komentar adalah <b>media informasi untuk tim</b> (apabila mengerjakan projek dengan tim), <b>bisa juga informasi untuk kalian sendiri</b>, misalnya kalian mendefinisikan komentar untuk menginformasikan kegunaan bagian penting dan misalnya projek kalian terbengkalai beberapa hari atau minggu atau bulan, tentu dengan bantuan komentar yang didefinisikan tadi akan memudahkan kalian untuk mengingat lagi bagian penting tersebut kegunaannya untuk apa (berguna sebagai pengingat atau catatan).
              </p>
              <blockquote class="catatan-pelajaran mb-2">
                Komentar tidak akan ditampilkan di tampilan browser dan tidak akan diproses oleh PHP, komentar hanya ditampilkan sebagai media (sebagai pengingat atau catatan) di text editor saja.
              </blockquote>
              <p class="m-0">Berikut adalah contoh penggunaan komentar di kode PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  // Berikut ini adalah komentar untuk satu baris saja
  // Ini juga komentar untuk satu baris saja

  /*
  Dan
  Ini
  Adalah
  Komentar
  Untuk
  Beberapa
  Baris
  */
?&gt;</code></pre>
              <p>
                Komentar untuk satu baris cukup dengan menyertakan dua garis miring <b><q>//</q></b> di awal.
              </p>
              <p class="mb-2">
                Komentar untuk banyak baris (boleh berapa saja karena tidak terbatas) di awali dengan <b><q>/*</q></b> dan di akhiri dengan <b><q>*/</q></b>.
              </p>
              <blockquote class="catatan-pelajaran">
                Jangan anggap remeh komentaryaa. Komentar sangat berguna loh, jadi sering-sering sertakan komentar pada kode kalianyaa 😄
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>