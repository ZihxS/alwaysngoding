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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/tipe-data-pada-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Object (objek) pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Objek sebenarnya adalah sebuah variabel yang menyimpan nilai (property) dan fungsi (method).</p>
              <p class="mb-0">Contoh pembuatan atau pendeklarasian objek kosong:</p>
              <pre class="language-javascript"><code>var objek = {};</code></pre>
              <p class="mb-0">Contoh pembuatan atau pendeklarasian objek dengan property:</p>
              <pre class="language-javascript"><code>var objek = {
  key1: "value1",
  key2: "value2"
};</code></pre>
              <p class="mb-0">Contoh pembuatan atau pendeklarasian objek dengan property dan method:</p>
              <pre class="language-javascript"><code>var objek = {
  // property
  key1: "value1",
  key2: "value2",

  // method
  method1: function(){
    // kode
  },
  method2: function(){
    // kode
  }
};</code></pre>
              <p>Isi objek pada kedua contoh yang ada di atas pasti ada key dan ada value nya, untuk membuat method kita menggunakan function sebagai value. Apa itu function? untuk saat ini kalian bisa hiraukan saja dahulu, kita akan mempelajarinya di modul berikutnya.</p>
              <p class="mb-0">Kalian bisa lihat contoh objek untuk motor di bawah ini:</p>
              <ul class="mb-2">
                <li>nilai (property):</li>
                <ul>
                  <li>merek</li>
                  <li>warna</li>
                  <li>tahun pembuatan</li>
                </ul>
                <li>fungsi (method):</li>
                <ul>
                  <li>nyalakan mesin</li>
                  <li>matikan mesin</li>
                  <li>isi bensin</li>
                </ul>
              </ul>
              <p class="mb-0">Lalu bagaimana cara kita membuat objek motor dari data yang ada di atas? Berikut adalah cara membuat objek pada JavaScript dari data yang ada di atas:</p>
              <pre class="language-javascript"><code>var motor = {
  // property
  merek: "Honda",
  warna: "Biru",
  tahunPembuatan: 2013,

  // method
  nyalakanMesin: function(){
    console.log("mesin motor menyala...");
  },
  matikanMesin: function(){
    console.log("mesin motor mati...");
  },
  isiBensin: function(){
    console.log("motor diisi bensin...");
    console.log("tangki bensin 80% terisi...");
  }
};</code></pre>
              <p class="mb-0">Kita akan mempelajari lebih lanjut function dan objek pada JavaScript di modul selanjutnya ya teman-teman...</p>
            </div>
          </div>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/teori/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php $this->load->view('belajar/markas/teori/tombol-selesai', NULL, FALSE); ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'javascript', 'modul_bagian' => 4, 'nama_modul' => 'Tipe Data Pada JavaScript'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>