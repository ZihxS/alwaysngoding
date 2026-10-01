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
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/dasar-javascript';
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
            <h2 class="judul-teori">Komentar di JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Sama seperti HTML, CSS dan PHP. JavaScript juga mempunyai komentar, fungsi komentar adalah media informasi untuk tim (apabila mengerjakan projek dengan tim), bisa juga informasi untuk kalian sendiri, misalnya kalian mendefinisikan komentar untuk menginformasikan kegunaan bagian penting dan misalnya projek kalian terbengkalai beberapa hari atau minggu atau bahkan beberapa bulan, tentu dengan bantuan komentar yang didefinisikan tadi akan memudahkan kalian untuk mengingat lagi bagian penting tersebut kegunaannya untuk apa (berguna sebagai pengingat atau catatan).</p>
              <p class="mb-2">JavaScript mendukung 2 jenis cara penulisan komentar, yakni menggunakan karakater <b><q>//</q></b> untuk komentar dalam 1 baris, dan karakter pembuka komentar <b><q>/*</q></b> dan penutup <b><q>*/</q></b> untuk komentar yang mencakup beberapa baris.</p>
              <blockquote class="catatan-pelajaran">Komentar tidak akan ditampilkan di tampilan browser dan tidak akan diproses oleh JS, komentar hanya ditampilkan sebagai media (sebagai pengingat atau catatan) di text editor saja.</blockquote>
              <p class="mt-2 mb-0">Berikut adalah contoh penulisan komentar dalam 1 baris pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>// Ini contoh komentar dalam 1 baris pada JavaScript
// Jangan meremehkan komentar ya teman-teman
// Komentar bisa sangat berguna loh untuk masa depan
// Bisa juga berguna apabila mengerjakan projeknya bersama-sama dengan tim

console.log('kode atau komentar di atas hanya informasi (tidak akan dieksekusi), yang akan di eksekusi hanya baris ini ya...');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Berikut adalah contoh penulisan komentar yang mencakup beberapa baris sekaligus pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>/* Ini contoh yang mencakup beberapa baris sekaligus pada JavaScript versi Programmer 1
Jangan meremehkan komentar ya teman-teman
Komentar bisa sangat berguna loh untuk masa depan
Bisa juga berguna apabila mengerjakan projeknya bersama-sama dengan tim */

console.log('kode atau komentar di atas hanya informasi (tidak akan dieksekusi), yang akan di eksekusi hanya baris ini ya...');</code></pre>
              <pre class="language-javascript line-numbers"><code>/*
Ini contoh yang mencakup beberapa baris sekaligus pada JavaScript versi Programmer 2
Jangan meremehkan komentar ya teman-teman
Komentar bisa sangat berguna loh untuk masa depan
Bisa juga berguna apabila mengerjakan projeknya bersama-sama dengan tim
*/

console.log('kode atau komentar di atas hanya informasi (tidak akan dieksekusi), yang akan di eksekusi hanya baris ini ya...');</code></pre>
            <pre class="language-javascript line-numbers"><code>/* Ini contoh yang mencakup beberapa baris sekaligus pada JavaScript versi Programmer 3
 * Jangan meremehkan komentar ya teman-teman
 * Komentar bisa sangat berguna loh untuk masa depan
 * Bisa juga berguna apabila mengerjakan projeknya bersama-sama dengan tim
 */

console.log('kode atau komentar di atas hanya informasi (tidak akan dieksekusi), yang akan di eksekusi hanya baris ini ya...');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Di atas ada 3 contoh komentar untuk mencangkup beberapa baris, kalian bisa memilih yang mana yang lebih kalian suka (semua sesuai selera). Ketiga contoh diatas hanya beda penulisannya saja tetapi intinya dan hasilnya akan tetap sama dan diproses sama oleh JavaScript.</p>
              <blockquote class="catatan-pelajaran">Tim Always Ngoding pakai penulisan tipe ke 3 loh untuk komentar yang mencangkup banyak barisnya...</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>