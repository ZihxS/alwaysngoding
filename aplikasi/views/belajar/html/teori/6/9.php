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
  $u = 'belajar-html/teori/lebih-banyak-tentang-html';
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
            <h2 class="judul-teori">Mengetahui Tag Yang Bersifat Inline &amp; Bersifat Block</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Apasih maksud tag yang bersifat inline dan block? kedua tag ini bersangkutan dengan <b>ruang atau tempat</b> tagnya. Tag inline <b>hanya mengambil lebar web browser sesuai dengan isinya.</b> Tag block <b>mengambil satu baris lebar web browser</b>.
              </p>
              <p class="m-0">Beberapa tag yang bersifat inline:</p>
              <ul>
                <li><code>&lt;a&gt;&lt;/a&gt;</code></li>
                <li><code>&lt;span&gt;&lt;/span&gt;</code></li>
                <li><code>&lt;img&gt;</code></li>
              </ul>
              <p class="m-0">Beberapa tag yang bersifat block:</p>
              <ul>
                <li><code>&lt;p&gt;&lt;/p&gt;</code></li>
                <li><code>&lt;div&gt;&lt;/div&gt;</code></li>
                <li><code>&lt;h1&gt;&lt;/h1&gt;</code> ~ <code>&lt;h6&gt;&lt;/h6&gt;</code></li>
              </ul>
              <p class="m-0">Contoh efek tag yang bersifat inline:</p>
              <pre class="language-html line-numbers"><code>&lt;a href="facebook.com/alwaysngoding"&gt;Halaman always ngoding di facebook.&lt;/a&gt;
&lt;span&gt;Jangan menyerah, udah itu saja.&lt;/span&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Jadi tag yang bersifat inline hanya mengambil lebar web browser sesuai dengan konten yang ada, dan jika ada tag inline lain maka tag tersebut ditampilkan disampingnya bukan di bawahnya, kecuali jika memakai tag <code>&lt;br&gt;</code>.</blockquote>
              <p class="m-0">Contoh efek tag yang bersifat block:</p>
              <pre class="language-html line-numbers"><code>&lt;h1&gt;Indonesia adalah negara yang sangat kaya raya.&lt;/h1&gt;
&lt;p&gt;Belajarlah terus, cari ilmu baru dan pengalaman baru.&lt;/p&gt;</code></pre>
              <blockquote class="catatan-pelajaran">Tag yang bersifat block mengambil seluruh lebar web browser, jadi jika ada tag lain sesudah tag yang bersifat block maka akan ditaruh di bawah (baris baru).</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>