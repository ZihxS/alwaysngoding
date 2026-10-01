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
  $u = 'belajar-javascript/teori/function-dan-object-pada-javascript';
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
            <h2 class="judul-teori">Menggunakan Kata Kunci "this"</h2>
            <hr>
            <div class="konten-teori">
              <p>Kata kunci <q>this</q> digunakan untuk mengakses property atau method dari dalam method pada objek.</p>
              <p class="mb-0">Berikut adalah contoh cara menggunakan kata kunci <q>this</q> pada objek di JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var smartphone = {
  merek: 'VIVO',
  tipe: 'V2030',
  warna: 'Hijau',
  bukaBrowser: function(browser) {
    console.log('HP ' + <mark class="keep">this.merek</mark> + ' Membuka Browser ' + browser + '.');
  }
};

smartphone.bukaBrowser('Brave'); // HP VIVO Membuka Browser Brave.
smartphone.bukaBrowser('Google Chrome'); // HP VIVO Membuka Browser Google Chrome.
smartphone.bukaBrowser('Mozilla Firefox'); // HP VIVO Membuka Browser Mozzila Firefox.</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kata kunci <q>this</q> pada contoh di atas akan mengacu pada objek <q>smartphone</q>, Jadi kita bisa mengakses property merek (this.merek), tipe (this.tipe) dan warna (this.warna) di method <q>bukaBrowser</q>.</p>
              <p class="mb-0">Kita juga bisa menggunakan kata kunci <q>this</q> untuk memanggil method lain:</p>
              <pre class="language-javascript line-numbers"><code>var contohObjek = {
  contohProperty: 'ini contoh property...',
  methodSatu: function() {
    console.log('ini method 1...');
  },
  methodDua: function() {
    console.log('ini method 2...');
  },
  methodTiga: function() {
    console.log('ini method 3...');
  },
  contohMethod: function() {
    console.log(this.contohProperty); // ini contoh property...
    this.methodSatu(); // ini method 1...
    this.methodDua(); // ini method 2...
    this.methodTiga(); // ini method 3...
  }
};

contohObjek.contohMethod();</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Pada kode di atas kita memanggil property <q>contohProperty</q> lalu memanggil method <q>methodSatu</q>, <q>methodDua</q> dan <q>methodTiga</q> di method <q>contohMethod</q> pada objek <q>contohObjek</q> menggunakan kata kunci <q>this</q>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>