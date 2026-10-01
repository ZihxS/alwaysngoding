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
  $u = 'belajar-php/teori/syntax-dasar-php';
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
            <h2 class="judul-teori">Variabel dalam PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Untuk memberikan nilai kepada sebuah variabel, PHP menggunakan tanda sama dengan <b><q>=</q></b>, operator <q>sama dengan</q> ini dikenal dengan istilah <b>Assignment Operators</b>. Perintah pemberian nilai kepada sebuah variabel disebut dengan assignment. Jika variabel tersebut belum pernah digunakan dan langsung diberikan nilai awal, maka disebut dengan proses inisialisasi.</p>
              <p class="mb-0">Berikut contoh cara memberikan nilai awal (inisialisasi) kepada variabel:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   $nama = "<?= $this->session->ang_nama_pengguna; ?>";
   $umur = 18;
   $text = "Saya sedang belajar PHP di Always Ngoding";
?&gt;</code></pre>
              <p>Dalam kelompok bahasa pemrograman, PHP termasuk <b>Loosely Type Language</b>, yaitu jenis bahasa pemrograman yang variabelnya tidak terikat pada sebuah tipe tertentu.</p>
              <p>Hal ini berbeda jika dibandingkan dengan bahasa pemrograman desktop seperti Pascal atau C, dimana jika kalian membuat sebuah variabel bertipe integer, maka variabel itu hanya bisa menampung nilai angka dan kalian tidak akan bisa mengisinya dengan huruf.</p>
              <p class="mb-0">Di dalam PHP, setiap variabel bebas diisi dengan nilai apa saja, seperti contoh di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   $contoh_1 = 18; // nilai variabel $contoh_1 berisi angka (integer)
   $contoh_2 = "ini adalah string"; // nilai variabel $contoh_2 diubah menjadi kalimat (string / text)
   $contoh_3 = 19.45; // nilai variabel $contoh_3 diubah menjadi desimal (float)
   $contoh_4 = TRUE; // nilai variabel $contoh_4 diubah menjadi boolean
?&gt;</code></pre>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>