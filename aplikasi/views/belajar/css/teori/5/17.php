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
  $p = $b-1; // Selanjutnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/posisi-dan-layout-pada-css';
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
            <h2 class="judul-teori">Property Clear Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Pengguna property clear sungguh <b>berkaitan erat dengan property float</b>. Seperti yang kita ketahui, pada property float kita memiliki dua acuan utama yaitu left dan right. Dimana ketika kita melakukan float left maka konten yang berada di bawahnya akan otomatis naik ke kanan dari konten yang kita beri <b><q>float: left;</q></b> begitupun sebaliknya.</p>
              <p class="m-0">Berikut adalah contoh penggunaan property clear pada CSS:</p>
              <pre class="language-html line-numbers" data-line="29-35"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      img {
        float: left;
        width: 200px;
        margin-right: 10px;
        margin-bottom: 10px;
      }
      ul {
        clear: both;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;img src="contoh-gambar.jpg" alt="Contoh Gambar"&gt;
    &lt;p&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime esse expedita iure voluptatibus odit harum quidem optio odio, laborum qui deleniti, molestias quod distinctio quo provident. Ullam similique soluta, vitae!
    &lt;/p&gt;
    &lt;p&gt;
      Rem voluptates voluptatum eligendi delectus veritatis earum voluptas deleniti cupiditate ipsam, nam corporis libero. Quaerat soluta placeat veniam quidem est ab minus, labore iusto quos reprehenderit atque accusamus, voluptate nemo.
    &lt;/p&gt;
    &lt;p&gt;
      Odit a, excepturi nemo dolorum, culpa magnam. Provident corporis aliquam id illo nesciunt molestiae, et voluptate asperiores, obcaecati dolore sint maxime ducimus harum labore molestias necessitatibus error dolores culpa repellendus.
    &lt;/p&gt;
    &lt;ul&gt;
      &lt;li&gt;Lorem.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum dolor.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum dolor sit.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum dolor sit amet.&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kode yang ditandai tidak akan ikut naik ke atas seperti semua element <b><q>p</q></b> yang ada pada kode di atas. Karena kita menggunakan property clear pada element <b><q>ul</q></b> dengan value both yang memerintahkan: <b><q>bersihkan float left dan right</q></b>.</p>
              <p class="m-0">Sebenarnya clear dengan isi left juga bisa saja. Cuma kebanyakan orang menggunakan property clear hanya berisi both agar lebih mudah di ingat.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>