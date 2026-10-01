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
            <h2 class="judul-teori">Constructor Function</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Pada bagian-bagian sebelumnya, kita membuat objeknya secara langsung. Bagaimana kalau kita ingin membuat objek yang lain dengan property dan method yang sama? Kita bisa saja buat objek secara langsung dua seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>var orangSatu = {
  namaDepan: 'Fajar',
  namaBelakang: 'Sobirin',
  namaLengkap: function() {
    console.log(this.namaDepan + ' ' + this.namaBelakang);
  }
};

var orangDua = {
  namaDepan: 'Saleh',
  namaBelakang: 'Solahudin',
  namaLengkap: function() {
    console.log(this.namaDepan + ' ' + this.namaBelakang);
  }
};</code></pre>
              <p class="mb-0">Kode di atas tidak akan efektif jika kita ingin membuat banyak objek dengan property dan method yang sama. Karena kita harus menulis ulang kode yang sama berkali-kali. Lalu bagaimana solusinya? kita bisa menggunakan constructor function. Berikut contoh penggunaan constructor function:</p>
              <pre class="language-javascript line-numbers" data-line="1-10"><code>function Orang(namaDepan, namaBelakang) {
  // property
  this.namaDepan = namaDepan;
  this.namaBelakang = namaBelakang;

  // method
  this.namaLengkap = function() {
    console.log(this.namaDepan + ' ' + this.namaBelakang);
  }
};

var orangSatu = new Orang("Fajar", "Sobirin");
var orangDua = new Orang("Saleh", "Solahudin");

orangSatu.namaLengkap();
orangDua.namaLengkap();</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada kode di atas kita membuat objek baru dengan kata kunci <q>new</q>, lalu diberikan nilai parameter <q>namaDepan</q> dan <q>namaBelakang</q>, jadi berapapun objek yang ingin kita buat cukup gunakan kata kunci <q>new</q> saja. Pada kode diatas kita juga membuat nama fungsi yang berawalan huruf besar <q>Orang</q> (ini berguna untuk menandakan bahwa fungsi itu adalah constructor function).</p>
              <p class="mb-0">Perhatikan kode di atas yang telah ditandai (baris 1 sampai 10), bagian yang ditandai itu berfungsi untuk mengenerate objek seperti layaknya contoh pertama.</p>
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