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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/transisi-transformasi-dan-animasi-pada-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Transisi Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>CSS transisi (CSS transition) adalah <b>efek transisi yang memungkinkan sebuah element secara bertahap berubah dari satu gaya ke gaya yang lain</b>. Banyak sekali contoh pengaplikasian efek transisi pada kehidupan sehari-hari, misalnya saja ketika kalian membuat materi <b>presentasi dengan powerpoint</b>, pasti <b>tidak akan lepas</b> dengan animasi-animasi dan efek transisi <b>untuk mempercantik</b> tampilan slidenya.</p>
              <p>Website kalian juga bisa menerapkan efek transisi, dan <b>banyak sekali cara untuk membuat efek dan animasi</b> untuk mempercantik desain website. <b>CSS</b> dan <b>jQuery</b> adalah salah satu bahasa yang bisa kalian gunakan untuk membuat <b>suatu efek dan animasi khususnya efek transisi pada sebuah website</b>. Nah, pada kesempatan ini kita akan <b>belajar bagaimana membuat efek transisi dengan CSS</b>.</p>
              <p class="m-0">Berikut adalah contoh cara membuat efek transisi sederhana:</p>
              <pre class="language-css line-numbers"><code>div {
  width: 100px;
  height: 100px;
  background: skyblue;
  transition-duration: 0.5s;
}
div:hover {
  background: teal;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/7/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Hasil dari kode di atas akan <b>berefek kepada</b> element div. Jika element div <b>dihover</b> (cursor berada di element div) maka background pada element tersebut akan berubah menjadi <b>warna teal</b> dengan <b>durasi 0.5 detik</b>. Dan jika cursor di keluarkan pada element div maka akan berubah kembali warna background element tersebut menjadi <b>warna skyblue</b> dengan <b>durasi 0.5 detik</b>.</p>
              <p class="m-0">Berikut adalah contoh cara membuat efek transisi lengkap:</p>
              <pre class="language-css line-numbers"><code>div {
  width: 100px;
  height: 100px;
  background: skyblue;
  transition-duration: 0.5s;
  transition-timing-function: linear;
  transition-delay: 0.5s;
}
div:hover {
  background: teal;
  width: 200px;
  height: 200px;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/7/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Hasil dari kode di atas akan <b>berefek kepada</b> element div. Jika element div <b>dihover</b> (cursor berada di element div) maka background pada element tersebut akan berubah menjadi <b>warna teal lalu lebar dan tinggi element div tersebut akan berubah menjadi 200 pixel</b> dengan <b>durasi delay adalah 0.5 detik</b> dan <b>durasi transisi 0.5 detik</b>. Dan jika cursor di keluarkan pada element div maka element tersebut akan <b>kembali seperti semula dengan durasi delay adalah 0.5 detik</b> dan <b>durasi transisi 0.5 detik</b>.</p>
            </div>
            <p class="m-0">Penjelasan:</p>
            <ol>
              <li>Property <b>transition-duration</b> berfungsi untuk <b>mengatur durasi transisi</b>.</li>
              <li>Property <b>transition-timing-function</b> berfungsi untuk <b>mengatur timing transisi</b> (bukan durasi transisi), silahkan <a href="https://cubic-bezier.com/#.25,.1,.25,1" target="_blank">klik disini</a> untuk live preview.</li>
              <li>Property <b>transition-delay</b> berfungsi untuk <b>mengatur delay sebelum transisi dijalankan atau dieksekusi</b>.</li>
              <li>Sebenarnya masih ada property <b>transition-property</b>, namun property-property di atas saja <b>sudah cukup</b> untuk membuat efek transisi yang <b>diinginkan</b>.</li>
            </ol>
            <blockquote class="catatan-pelajaran">Agar efek transisi berjalan di semua browser, kalian harus belajar dan mengetahui terlebih dahulu apa itu CSS vendor prefixes. CSS vendor prefixes akan kalian pelajari pada modul CSS terakhir.</blockquote>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>