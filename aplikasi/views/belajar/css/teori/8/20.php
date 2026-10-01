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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/lebih-banyak-tentang-css';
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
            <h2 class="judul-teori">Mengenal SASS dan SCSS</h2>
            <hr>
            <div class="konten-teori">
            <p>SASS (Syntactically Awesome Style Sheets) berguna untuk <b>memberi kemudahan seperti tidak usah menulis kurung buka atau kurung tutup, dan juga tidak perlu menulis titik koma diakhir syntax</b>. Dengan menggunakan SASS sendiri <b>memudahkan kalian dalam menulis CSS</b> seperti penggunaan variabel, nesting, mixins, selector inheritance, dll. Keunggulan lainnya seperti CSS yang lebih tersutruktur, rapi, mudah dipahami, dan yang paling penting dapat berjalan baik di semua browser.</p>
            <p>Lalu ada SCSS, sama seperti SASS namun mungkin bagi kalian yang sedikit kurang paham dengan SASS bisa menggunakan SCSS, lalu apa yang membedakan SASS dengan SCSS?</p>
            <p>SCSS merupakan <b>syntax yang paling umum</b> digunakan yang <b>merupakan superset dari CSS</b>, yang berarti setiap sintak CSS yang berada di CSS3 bisa digunakan pada SCSS, tetapi bisa menggunakan fitur seperti yang ada pada SASS dan memang penulisaanya lebih mudah dipahami bagi kalian yang baru mengenal SASS dan SCSS ini. Biasanya file SCSS menggunakan format ".scss".</p>
            <p>Sedangkan <b>SASS syntax yang lebih dulu muncul dari SCSS</b> yang dikenal sebagai idented syntax yang biasa menggunakan format ".sass". Dan memang ditujukan untuk pengguna yang memilih kemudahan dalam menulis CSS.</p>
            <p>Perbedaan mendasar sebenarnya hanya dari cara menulisnya. <b>Untuk SASS, tidak memakai kurung kurawal dan titik koma</b>, <b>sedangkan SCSS hampir mirip dengan CSS, menggunakan kurung kurawal dan titik koma</b>.</p>
            <p class="m-0">Untuk lebih jelasnya silahkan perhatikan kode-kode di bawah ini:</p>
            <pre class="language-scss line-numbers"><code>$bg-color: orange;
$ukuran: 20px;
$warna: green;

h1{
  background: $bg-color;
  color: $warna;
}

p{
  background: $bg-color;
  font-size: $ukuran;
  color: $warna;
}</code></pre>
            <pre class="language-sass line-numbers"><code>$bg-color: orange
$ukuran: 20px
$warna: green

h1
  background: $bg-color
  color: $warna

p
  background: $bg-color
  font-size: $ukuran
  color: $warna
</code></pre>
            <p class="mb-0">Kotak pertama adalah contoh kode untuk SCSS dan kotak kedua adalah contoh kode untuk SASS. Kedua kode di atas akan menghasilkan kode CSS seperti di bawah ini:</p>
            <pre class="language-css line-numbers"><code>h1 {
  background: orange;
  color: green;
}

p {
  background: orange;
  font-size: 20px;
  color: green;
}</code></pre>
            <p>Berdasarkan contoh kode-kode di atas memang terlihat lebih banyak kode SASS dan SCSS daripada CSS. Namun makin banyak kode CSS yang ingin kalian buat maka lebih sangat berguna kode SASS dan SCSS.</p>
            <p class="mb-0">Berikut adalah pengenalan selintas tentang SASS dan SCSS, jika ingin mempelajarinya lebih dalam kalian bisa belajar di Always Ngoding Bagian SASS dan SCCS (Kalau sudah tersedia). Atau kalian bisa mengunjungi websitenya: <a href="https://sass-lang.com/" target="_blank">https://sass-lang.com/</a></p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>