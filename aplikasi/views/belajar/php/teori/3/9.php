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
            <h2 class="judul-teori">Tipe Data String</h2>
            <hr>
            <div class="konten-teori">
              <p>Cara kedua dalam penulisan tipe data string pada PHP adalah dengan menggunakan double quoted atau tanda petik dua (karakter <code class="custom">"</code>). Walaupun seperti tidak ada perbedaan dengan menggunakan single quote, hasil yang di dapat akan sangat berbeda.</p>
              <p>Dengan double quoted, <b>PHP akan memproses karakter-karakter khusus</b> seperti carriage return <b><q>\n</q></b>, dan karakter tab <b><q>\t</q></b> dan juga memproses setiap variabel (yang ditandai dengan tanda <b><q>$</q></b> di depan kata).</p>
              <p class="mb-2">Dikarenakan metode double quoted melakukan pemrosesan terlebih dahulu, maka untuk menampilkan karakter khusus seperti tanda petik (karakter <code class="custom">"</code>), tanda dollar (karakter <b><q>$</q></b>) dan tanda-tanda khusus lainnya, kalian harus menggunakan backslash (karakter <b><q>\</q></b>). Berikut adalah tabel karakter khusus untuk double quoted string:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="20%">Cara Penulisan String</th>
                    <th>Karakter Yang Ditampilkan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>\"</td>
                    <td>Karakter tanda petik dua</td>
                  </tr>
                  <tr>
                    <td>\n</td>
                    <td>Karakter newline</td>
                  </tr>
                  <tr>
                    <td>\r</td>
                    <td>Karakter carriage return</td>
                  </tr>
                  <tr>
                    <td>\t</td>
                    <td>Karakter tab</td>
                  </tr>
                  <tr>
                    <td>\\</td>
                    <td>Karakter backslash</td>
                  </tr>
                  <tr>
                    <td>\$</td>
                    <td>Karakter dollar sign</td>
                  </tr>
                  <tr>
                    <td>\{</td>
                    <td>Karakter pembuka kurung kurawal</td>
                  </tr>
                  <tr>
                    <td>\}</td>
                    <td>Karakter penutup kurung kurawal</td>
                  </tr>
                  <tr>
                    <td>\[</td>
                    <td>Karakter pembuka kurung siku</td>
                  </tr>
                  <tr>
                    <td>\]</td>
                    <td>Karakter penutup kurung siku</td>
                  </tr>
                </tbody>
              </table>
              <p class="mb-0">Sebagai contoh penggunaan double quoted string, kita akan menggunakan contoh yang sama dengan single quoted string, agar dapat dilihat perbedaannya:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $string1 = "Ini adalah string sederhana";
  $string2 = "Ini adalah string
  yang bisa memiliki beberapa
  baris";
  $string3 = "Dia berkata: \"I'll be back\"";
  $string4 = "Kalimat ini akan akan pindah ke: \n baris baru";
  $string5 = "Variabel akan otomatis ditampilkan: $string1 dan $string3";

  echo $string1;
  echo "&lt;br&gt;";
  echo $string2;
  echo "&lt;br&gt;";
  echo $string3;
  echo "&lt;br&gt;";
  echo $string4;
  echo "&lt;br&gt;";
  echo $string5;
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Perhatikan perbedaannya pada hasil <b><q>$string3</q></b>, <b><q>$string5</q></b> dan <b><q>$string6</q></b>.</p>
              <p>Pada <b><q>$string3</q></b>, kita harus mem-blackslash tanda petik dua karena itu merupakan karakter khusus dalam double quoted string.</p>
              <p>Pada <b><q>$string5</q></b>, tanda <b><q>\n</q></b> yang merupakan karakter khusus untuk baris baru, tapi karena kita menampilkannya di browser, karakter ini tidak akan terlihat, tetapi jika kita menulis hasil string ini kedalam sebuah file text, kalimat tersebut akan terdiri dari 2 baris.</p>
              <p class="mb-0">Pada <b><q>$string6</q></b>, terlihat bahwa string dengan petik dua akan memproses variabel <b><q>$string1</q></b> dan <b><q>$string3</q></b> sehingga tampil hasilnya di web browser. Fitur ini akan sangat bermanfaat jika kita sering menampilkan variabel didalam sebuah string.</p>
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