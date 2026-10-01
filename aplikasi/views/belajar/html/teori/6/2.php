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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/lebih-banyak-tentang-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Membuat List - #2</h2>
            <hr>
            <div class="konten-teori">
              <p>Pelajari dan pahami contoh-contoh di bawah dengan seksama.</p>
              <h4>ORDERED LIST</h4>
              <p class="m-0">Kode:</p>
              <pre class="language-html line-numbers"><code>&lt;div&gt;
  &lt;span&gt;Makanan kesukaan saya:&lt;/span&gt;
  &lt;ol&gt;
    &lt;li&gt;Jengkol&lt;/li&gt;
    &lt;li&gt;Tahu&lt;/li&gt;
    &lt;li&gt;Tempe&lt;/li&gt;
    &lt;li&gt;Ikan&lt;/li&gt;
  &lt;/ol&gt;
&lt;/div&gt;</code></pre>
             <div class="mb-3">
                <a href="<?= site_url("belajar-html/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <h4>UNORDERED LIST</h4>
              <p class="m-0">Kode:</p>
              <pre class="language-html line-numbers"><code>&lt;div&gt;
  &lt;span&gt;Minuman kesukaan saya:&lt;/span&gt;
  &lt;ul&gt;
    &lt;li&gt;Sprite&lt;/li&gt;
    &lt;li&gt;Jamu&lt;/li&gt;
    &lt;li&gt;Susu&lt;/li&gt;
    &lt;li&gt;Kopi&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-html/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <h4>DATA LIST</h4>
              <p class="m-0">Kode:</p>
              <pre class="language-html line-numbers"><code>&lt;div&gt;
  &lt;p&gt;Beberapa Bahasa pemrograman yang saya sukai. beserta alasannya:&lt;/p&gt;
  &lt;dl&gt;
    &lt;dt&gt;C++&lt;/dt&gt;
    &lt;dd&gt;Bahasa pemrograman yang saya pelajari untuk pertama kalinya.&lt;/dd&gt;
    &lt;dt&gt;Python&lt;/dt&gt;
    &lt;dd&gt;Simple, Gak perlu mikirin semicolon (titik koma).&lt;/dd&gt;
    &lt;dt&gt;GO&lt;/dt&gt;
    &lt;dd&gt;Performa yang sangat cepat.&lt;/dd&gt;
  &lt;/dl&gt;
&lt;/div&gt;</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-html/hasil/6/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              Penjelasan:
              <ul class="m-0">
                <li>Pada contoh pertama setiap list nya <b>ditandai dengan angka</b>, dan <b>angkanya berurut</b>. Oleh sebab itu dinamakan <b>Ordered List</b>.</li>
                <li>Pada contoh kedua setiap list nya hanya <b>berupa simbol lingkaran</b>. Oleh sebab itu dinamakan <b>Unordered List</b>.</li>
                <li>Pada contoh ketiga setiap list terdapat <b>judul dan deskripsi</b>, list yang satu ini berguna untuk membuat daftar secara rinci.</li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>