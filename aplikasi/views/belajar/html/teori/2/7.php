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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/tag-atribut-dan-elemen-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Pengertian Atribut Pada HTML</h2>
            <hr>
            <div class="konten-teori">
              <p>
                <strong>Atribut adalah informasi tambahan yang diberikan pada tag</strong>. Informasi ini bisa berupa perintah untuk pemformatan teks, mengatur lebar dan tinggi, dan bisa juga untuk <b>memanipulasi</b> dokumen (Halaman Website) dengan CSS dan JavaScript.
              </p>
              <p>
                <b>Setiap atribut memiliki nama dan isi</b> (value). Isi (value) diapit oleh tanda kutip, boleh menggunakan tanda kutip satu <b>(')</b> ataupun kutip dua <b>(")</b>. Penulisan atribut sebagai berikut: <strong>nama=<q>isi</q></strong>.
              </p>
              <p class="m-0">Atribut diletakkan di dalam tag pembuka seperti contoh berikut:</p>
              <pre class="language-html line-numbers"><code>&lt;form <mark class="keep">action='simpan.php'</mark> <mark class="keep">method='POST'</mark>&gt;&lt;/form&gt;

&lt;img <mark class="keep">src="folder-gambar/file-gambar.png"</mark> <mark class="keep">width="50%"</mark> <mark class="keep">height="350px"</mark>&gt;</code></pre>
              <p class="mt-2">
                Penjelasan:
                <br>
                Di baris pertama kita mempunyai tag form yang mempunyai atribut <strong><q>action</q></strong> yang berisi <strong><q>simpan.php</q></strong> dan atribut <strong><q>method</q></strong> yang berisi <strong><q>POST</q></strong>. <b><q>action</q></b> dan <b><q>method</q></b> adalah <b>nama atribut</b>. <b><q>simpan.php</q></b> dan <b><q>POST</q></b> adalah <b>isi atributnya</b>. Fungsi atribut <b><q>action</q></b> adalah untuk mengarahkan ke lokasi file aksi untuk pemrosesan data formulir jika formulirnya disubmit (diproses), dan fungsi atribut <b><q>method</q></b> adalah untuk mendeklarasikan <b><q>metodenya</q></b> (POST/GET).
              </p>
              <p>
                Di baris ke dua kita mempunyai tag <b><q>img</q></b> yang berfungsi untuk <b>menampilkan gambar</b> ke halaman web yang mempunyai 3 atribut yaitu <strong><q>src</q></strong> yang berisi <strong><q>gambar.png</q></strong>, <strong><q>width</q></strong> yang berisi <strong><q>50%</q></strong> dan <strong><q>height</q> yang berisi <q>350px</q></strong>. Atribut <b><q>src</q></b> berfungsi untuk <b>mendeklarasikan lokasi gambar</b> yang ingin ditampilkan, atribut <b><q>width</q></b> berfungsi untuk <b>mengatur lebar gambar</b>, dan atribut <b><q>height</q></b> berfungsi untuk <b>mengatur tingginya gambar</b>.
              </p>
              <blockquote class="catatan-pelajaran">HTML memiliki banyak atribut yang beberapa diantaranya hanya cocok untuk tag tertentu saja (sesuai porsi). Sebagai contoh, atribut <strong><q>action</q></strong> dan <strong><q>method</q></strong> di atas hanya digunakan untuk tag <strong>&lt;form&gt;</strong> saja, maka jika atribut <b><q>action</q></b> dan <b><q>method</q></b> digunakan untuk tag <b><q>&lt;img&gt;</q></b> itu adalah sesuatu yang <b>konyol</b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>