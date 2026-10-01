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
            <h2 class="judul-teori">Tipe Data Boolean</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data boolean adalah tipe data paling sederhana dalam PHP dan dalam bahasa pemrograman lainnya. Tipe data ini hanya <b>memiliki 2 nilai</b>, yaitu <b><q>TRUE</q></b> (benar) dan <b><q>FALSE</q></b> (salah/tidak benar).</p>
              <p>Tipe data boolean biasanya digunakan dalam operasi logika seperti kondisi if dan perulangan (looping).</p>
              <p>Penulisan boolean cukup sederhana, karena hanya memiliki 2 nilai, yakni <b><q>TRUE</q></b> atau <b><q>FALSE</q></b>. Penulisan <b><q>TRUE</q></b> atau <b><q>FALSE</q></b> ini bersifat non-case sensitif, sehingga bisa ditulis <b><q>true</q></b>, <b><q>True</q></b> atau <b><q>TRUE</q></b>.</p>
              <p class="mb-0">Berikut adalah contoh penulisan tipe data boolean:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $benar = TRUE;
  $salah = FALSE;

  echo "benar = $benar, salah = $salah";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Jika kalian menjalankan contoh kode PHP di atas, variabel <b><q>$benar</q></b> akan menampilkan angka <b><q>1</q></b>, sedangkan variabel <b><q>$salah</q></b> ditampilkan dengan <b><q>string kosong</q></b> (tanpa output). Hal ini karena jika ditampilkan menggunakan echo, tipe data boolean <b><q>dipaksa</q></b> berganti dengan tipe data string.</p>
              <p>Karena PHP adalah loosely tiped language atau bahasa pemrograman yang tidak bertipe, sebuah variabel dapat di konversi menjadi tipe data lainnya.</p>
              <p class="mb-0">Berikut adalah aturan tipe data boolean jika dikonversi dari tipe data lainnya:</p>
              <ul>
                <li><b>Integer 0</b> dianggap sebagai <b>FALSE</b>.</li>
                <li><b>Float 0.0</b> dianggap sebagai <b>FALSE</b>.</li>
                <li><b>String kosong</b> dan string <b><q>0</q></b> dianggap sebagai <b>FALSE</b>.</li>
                <li><b>Array tanpa elemen</b> dianggap sebagai <b>FALSE</b>.</li>
                <li><b>Objek tanpa nilai</b> dan <b>fungsi</b> dianggap sebagai <b>FALSE</b>.</li>
                <li><b>Nilai NULL</b> dianggap sebagai <b>FALSE</b>.</li>
              </ul>
              <p>Selain 6 kondisi di atas, sebuah variabel akan dikonversi menjadi TRUE.</p>
              <p class="mb-0">Berikut adalah contoh variabel dan nilai konversinya dalam boolean:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   $x = TRUE; // TRUE
   $x = FALSE; // FALSE
   $x = ""; // FALSE
   $x = " "; // TRUE
   $x = 0; // FALSE
   $x = 1; // TRUE
   $x = -2; // TRUE
   $x = "belajar"; // TRUE
   $x = 3.14; // TRUE
   $x = array(); // FALSE
   $x = array(12); // TRUE
   $x = "0"; // FALSE
   $x = "FALSE"; // TRUE
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Perhatikan konversi di atas, string kosong dianggap sebagai FALSE, namun string <b><q> </q></b> (string dengan karakter spasi) adalah TRUE. Juga string <b><q>0</q></b> dianggap FALSE, namun string <b><q>FALSE</q></b> dianggap TRUE.</p>
              <p class="mb-0">Kesalahan dalam kode program sering terjadi karena <b><q>konversi</q></b> dari tipe data lain menjadi boolean, sehingga sedapat mungkin kita membuat variabel boolean dengan nilai yang pasti dan tidak bargantung kepada aturan <b><q>konversi</q></b> boolean dari PHP.</p>
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