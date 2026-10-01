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
            <h2 class="judul-teori">Template Literal atau Template String Pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Salah satu yang sering kita lakukan saat membuat website atau aplikasi adalah membuat, memproses dan mengolah string. Misalnya untuk menampilkan pesan error atau informasi untuk user. Adanya template literal bisa memberikan kemudahan untuk kita dalam mengelola data berupa string.</p>
              <p class="mb-0">Template literal atau template string lebih powerfull dibanding string biasa karena template literal dapat membuat:</p>
              <ul>
                <li>Multiple-line String</li>
                <li>Expression Interpolation</li>
                <li>Tagged Template</li>
              </ul>
              <p>Ketiga hal di atas akan sering digunakan oleh kita saat kita ngoding JavaScript.</p>
              <p class="mb-0">Cara menggunakan template literal atau prinsip penggunaan template literal:</p>
              <ul>
                <li>String diapit atau dibungkus dengan backtick (` `).</li>
                <li>Syntax <code class="custom">${isi}</code> bisa digunakan untuk menuliskan variabel atau javascript statement seperti: melakukan operasi aritmatika, memanggil fungsi dan lain-lain.</li>
              </ul>
              <p class="mb-0">Contoh sederhana:</p>
              <pre class="language-javascript"><code>console.log(<mark class="keep">`</mark>halo... semangat terus belajarnya di Always Ngoding<mark class="keep">`</mark>);</code></pre>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>