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
              <p>Cara penulisan tipe data string yang ketiga yaitu dengan fitur PHP yang disebut <b><q>heredoc</q></b>. Fitur ini digunakan untuk membuat tipe data string yang <b>dapat berisi beberapa baris kalimat</b>. Dibandingkan dengan menggunakan single quote dan double quote, pembuatan string dengan heredoc tidak terlalu sering digunakan.</p>
              <p class="mb-0">Agar lebih jelas, berikut adalah contoh penulisan tipe data string dengan heredoc:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $ipk = 3.9;
  $str = &lt;&lt;&lt;INIHEREDOC
  Saya sedang belajar PHP
  di Always Ngoding &lt;br&gt;
  Kali ini tentang pembahasan
  mengenai "PHP", &lt;br&gt; dan berharap
  bisa dapat IPK $ipk ^_^
  INIHEREDOC;

  echo $str;
?&gt;
</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Seperti yang terlihat dari contoh di atas, fitur heredoc ditandai dengan tanda <b><q><<<</q></b> untuk memulai string, lalu diikuti dengan karakter penanda akhir string. Dari contoh tersebut kata <b><q>INIHEREDOC</q></b> pada awal string adalah penanda akhir string. Kalian <b>bebas mengganti kata <q>INIHEREDOC</q></b> dengan kata atau karakter lain sepanjang kata tersebut bisa dijamin tidak akan muncul didalam string.</p>
              <p>Setelah karakter penanda string, baris pertama adalah awal dari string. String ini dapat mencakup beberapa baris, sampai ditemukan karakter penanda akhir string yang kita definisikan di awal (yaitu kata <b><q>INIHEREDOC</q></b>). Setelah ditemukan karakter penanda akhir string, maka pendefinisian string berakhir.</p>
              <p class="mb-0">Pada kalimat di atas kita menggunakan karakter <b><q>\n</q></b> dan variabel <b><q>$ipk</q></b>, seluruh karakter ini diproses oleh PHP sehingga mirip dengan fitur double quoted string.</p>
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