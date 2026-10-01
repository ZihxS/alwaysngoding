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
              <p>Cara penulisan tipe data keempat dalam PHP yaitu dengan fitur <b><q>nowdoc</q></b>. Fitur ini hampir sama dengan heredoc, namun dengan pengecualian: <b>karakter khusus dan variabel tidak akan diproses oleh PHP</b>, atau <b>mirip dengan single quoted string</b>.</p>
              <p class="mb-0">Berikut adalah contoh penulisan tipe data string menggunakan metode nowdoc:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $ipk = 3.9;
  $str = <<<'ININOWDOC'
  Saya sedang belajar PHP
  di \n Always Ngoding &lt;br&gt;
  Kali ini tentang pembahasan
  mengenai "PHP", &lt;br&gt; dan berharap
  bisa dapat IPK $ipk :D
  ININOWDOC;

  echo $str;
?&gt;
</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Jika dilihat sekilas, tidak ada perbedaan cara penulisan metode nowdoc dengan heredoc, namun perhatikan karakter penanda akhir string. Kali ini kita menggunakan kalimat <b><q>ININOWDOC</q></b> sebagai penanda akhir string. Dan yang membedakannya dengan heredoc adalah, nowdoc <b>menambahkan single quoted untuk karakter penanda akhir string</b>. Kita menulis <b><q>ININOWDOC</q></b> (dengan tanda kutip satu) untuk mengawali string.</p>
              <p class="mb-0">Dari tampilan yang dihasilkan, <b>nowdoc memproses string sama dengan single quoted string</b>, dimana karakter khusus dan variabel tidak diproses sama sekali, sehingga dalam tampilan akhir anda dapat melihat tanda <b><q>\n</q></b> dan variabel <b><q>$ipk</q></b> ditulis sebagai string.</p>
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