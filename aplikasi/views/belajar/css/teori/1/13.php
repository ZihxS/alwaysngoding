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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/berkenalan-dengan-css';
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
            <h2 class="judul-teori">Penulisan CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Pada saat masuk bagian CSS, sering dijumpai kode sebagai berikut:</p>
              <pre class="language-css line-numbers"><code>h1 {
  color: #0789de;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/1/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>
                Bagian pertama sebelum <code class="custom">{}</code> dinamakan selector, sedangkan yang diapit oleh <code class="custom">{}</code> disebut declaration yang terdiri dari dua unsur, yaitu property dan value. Selector dalam pernyataan di atas adalah <b><q>h1</q></b>, sedangkan <b><q>color</q></b> adalah property, dan <b><q>#0789de</q></b> adalah value.
              </p>
              <p class="mb-2">
                Banyak sekali tipe-tipe selector CSS, ada selector untuk ID, selector untuk class, selector untuk element (seperti contoh kode di atas), selector semua element, selector atribut, selector dengan pseudocode dan universal selector.
              </p>
              <blockquote class="catatan-pelajaran mb-2">
                Ekstensi untuk berkas CSS adalah <b>.css</b>
              </blockquote>
              <blockquote class="catatan-pelajaran">
                Nanti kalian akan mempelajari tipe-tipe selector. Namun pada dasarnya penulisan kode CSS seperti kode di atas. Jadi pahami kode di atas terlebih dahulu yaa 😄
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>