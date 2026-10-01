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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript';
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
            <h2 class="judul-teori">Menghitung Jumlah Karakter pada String</h2>
            <hr>
            <div class="konten-teori">
              <p>Pada JavaScript kita bisa menghitung jumlah karakter pada string, caranya dengan menambahkan kode <q>.length</q> setelah string yang ingin kita hitung jumlah karakternya.</p>
              <p>Fungsi <q>.length</q> ini sangat berguna untuk aplikasi kita, misalnya jika kita ingin membuat suatu validasi yang terdapat perhitungan minimal atau maksimal karakter pada suatu string.</p>
              <p class="mb-0">Berikut contoh sederhana penggunaan fungsi <q>.length</q> pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var kalimat = 'Saya sangat senang belajar JavaScript di Always Ngoding';

console.log(`Jumlah karakter yang ada pada variabel kalimat adalah: ${kalimat.length} karakter.`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Penulisan kode untuk menghitung jumlah karakter pada string cukup dengan <q>.length</q> tidak usah ditambah tanda kurung diakhirnya. Jika kalian menuliskan <q>.length()</q> maka akan memunculkan pesan error dari JavaScript.</p>
              <p class="mb-0">Berikut contoh pembuatan validasi jumlah karakter dengan memanfaatkan fungsi <q>.length</q> di JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>var username = 'ZihxS';
var password = 'KataSandiRahasia12345';

if (username.length >= 8) {
  if (password.length >= 20) {
    console.log('Jumlah atau panjang karakter username dan password memenuhi kriteria...');
  } else {
    console.log('Jumlah karakter untuk password minimal 20 karakter!');
  }
} else {
  console.log('Jumlah karakter untuk username minimal 8 karakter!');
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas akan menghasilkan output <q>Jumlah karakter untuk username minimal 8 karakter!</q>, coba kalian ubah isi variabel username dengan string apapun yang memiliki jumlah karakter 8 atau lebih dan lihat lagi hasil kodenya setelah diubah.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>