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
  $x = str_replace('Html','HTML',str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3))))).' #'.$b;
  $u = 'belajar-css/teori/perpaduan-css-dengan-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Komentar di CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-2">
                Sama seperti HTML, CSS juga mempunyai komentar, namun penulisannya berbeda. <b>Fungsi komentar adalah media informasi untuk tim</b> (apabila mengerjakan projek dengan tim), bisa juga informasi untuk kalian sendiri, misalkan kalian mendefinisikan komentar untuk menginformasikan kegunaan bagian penting dan misalkan projek kalian terbengkalai beberapa hari, minggu atau bulan, tentu dengan bantuan komentar yang didefinisikan tadi akan memudahkan kalian untuk mengingat lagi bagian penting tersebut kegunaannya untuk apa (berguna sebagai pengingat atau catatan).
              </p>
              <blockquote class="catatan-pelajaran mb-2">
                Komentar <b>tidak akan ditampilkan di tampilan browser</b>, komentar hanya ditampilkan <b>sebagai media</b> (sebagai pengingat atau catatan) <b>di text editor</b> saja.
              </blockquote>
              <p class="m-0">Berikut adalah contoh penggunaan komentar di kode CSS:</p>
              <pre class="language-css line-numbers" data-line="1"><code>/* paragraph ini textnya akan dicetak tebal (bold) */
p {
  font-weight: bold;
}</code></pre>
              <p class="mb-2">
                Komentar di css diapit dengan kode <code class="custom">/**/</code>. Kode <code class="custom">/*</code> sebagai pembuka komentar atau awal komentar, kode <code class="custom">*/</code> sebagai penutup komentar atau akhir komentar.
              </p>
              <blockquote class="catatan-pelajaran">
                Jangan anggap remeh komentar yaa. Komentar sangat berguna loh. Jadi sering sering sertakan komentar pada kode kalian yaa 😄
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>