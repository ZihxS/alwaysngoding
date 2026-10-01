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
  $u = 'belajar-php/teori/function-pada-php';
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
            <h2 class="judul-teori">Fungsi (Function) Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Sebagai latihan dan prakter dalam menggunakan fungsi, berikut adalah format dasar pemanggilan dan pengembalian nilai fungsi:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $varibel_hasil_fungsi = nama_fungsi(argumen1, argumen2, argumen3);
?&gt;</code></pre>
              <ul>
                <li><b><q>$varibel_hasil_fungsi</q></b> adalah variabel yang akan menampung hasil pemrosesan fungsi. Tergantung fungsinya, hasil dari sebuah fungsi bisa berupa angka, string, array, bahkan objek.</li>
                <li><b><q>nama_fungsi</q></b> adalah nama dari fungsi yang akan dipanggil atau di eksekusi oleh kita.</li>
                <li><b><q>argumen1</q></b>, <b><q>argumen2</q></b>, <b><q>argumen3</q></b> adalah nilai inputan fungsi. Banyaknya argumen yang dibutuhkan, tergantung kepada fungsi tersebut. Jika sebuah fungsi membutuhkan argumen 3 buah angka, maka kita harus menginputnya sesuai dengan aturan tersebut, atau jika tidak, PHP akan mengeluarkan error.</li>
              </ul>
              <p class="mb-0">Sebagai contoh, PHP menyediakan fungsi akar kuadrat yaitu <b><q>sqrt()</q></b>, berikut adalah cara penggunaannya:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  $akar_kuadrat = sqrt(49);
  echo "Akar kuadrat dari 49 adalah {$akar_kuadrat}";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Dalam contoh di atas, fungsi <b><q>sqrt()</q></b> akan menghitung akar kuadrat dari nilai argumen yang diinput. Kita menambahkan argumen <b><q>49</q></b> sebagai inputan. Nilai hasil dari fungsi <b><q>sqrt(49)</q></b> selanjutnya di tampung dalam variabel <b><q>$akar_kuadrat</q></b> yang kemudian ditampilkan ke dalam web browser.</p>
              <p class="mb-0">Selain ditampung di dalam variabel, kita bisa menampilkan hasil fungsi langsung ke web browser, seperti contoh berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  echo '12 pangkat 2 adalah: '.pow(12, 2);
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Fungsi <b><q>pow()</q></b> adalah fungsi pemangkatan matematika bawaan PHP. Fungsi ini <b>membutuhkan 2 argumen</b>, argumen pertama adalah nilai awal yang ingin dihitung, dan argumen kedua adalah nilai pangkat. <b><q>pow(12, 2)</q></b> sama dengan 12 kuadrat.</p>
              <p>Perlu diperhatikan juga untuk tipe parameter yang dibutuhkan oleh sebuah fungsi. Seperti 2 contoh kode kita di atas, fungsi <b><q>sqrt()</q></b> dan <b><q>pow()</q></b> adalah fungsi matematika. Kedua fungsi ini hanya bisa memproses parameter dengan tipe angka (interger dan float). Jika kalian memasukkan parameter jenis string, maka PHP akan mengeluarkan error.</p>
              <p class="mb-0"><b>Jumlah dan urutan argumen juga harus sesuai dengan yang dibutuhkan oleh fungsi</b>. Jika sebuah fungsi hanya membutuhkan 1 argumen, maka kita tidak bisa menambahkan argumen kedua, kecuali ada argumen yang bersifat opsional (dapat diabaikan).</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>