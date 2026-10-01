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
            <h2 class="judul-teori">Pengertian Element Pada HTML</h2>
            <hr>
            <div class="konten-teori">
              <!-- <p class="m-0">
                Element adalah <b>kesatuan antara tag</b> (tag pembuka juga penutup), atribut tagnya (jika ada) dan isinya, perhatikan kode berikut:
              </p> -->
              <!-- <pre class="language-html"><code>&lt;p&gt;Ini adalah element p&lt;/p&gt;</code></pre> -->
              <p class="m-0">
                <!-- Kode di atas terdapat tag <b><q>p</q></b> dan element <b><q>p</q></b>, masih bingung?, bukan waktunya untuk bingung.  -->Element adalah <b>kesatuan antara tag</b> (tag pembuka juga penutup), atribut tagnya (jika ada) dan isinya. Isi element bukan hanya berupa teks saja, tapi bisa berupa tag lain yang ada pada suatu element. <!-- Bagaimana cara membedakannya?  -->Silahkan lihat contoh kode berikut:
              </p>
              <pre class="language-html line-numbers"><code>&lt;!-- Element P --&gt;
<mark class="keep">&lt;p id="motivasi"&gt;&lt;strong&gt;Jangan&lt;/strong&gt; menyerah untuk &lt;u&gt;belajar&lt;/u&gt; &lt;b&gt;koding&lt;/b&gt;&lt;/p&gt;</mark>

&lt;!-- Tag P --&gt;
<mark class="keep">&lt;p&gt;</mark>&lt;strong&gt;Jangan&lt;/strong&gt; menyerah untuk &lt;u&gt;belajar&lt;/u&gt; &lt;b&gt;koding&lt;/b&gt;<mark class="keep">&lt;/p&gt;</mark></code></pre>
              <p class="m-0">
                Contoh kode lainnya:
              </p>
              <pre class="language-html line-numbers" data-line="2-9"><code>&lt;!-- Element HTML --&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;Motivasi&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p&gt;&lt;strong&gt;Jangan&lt;/strong&gt; menyerah untuk &lt;u&gt;belajar&lt;/u&gt; &lt;b&gt;koding&lt;/b&gt;&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;

&lt;!-- Tag HTML --&gt;
<mark class="keep">&lt;html&gt;</mark>
  &lt;head&gt;
    &lt;title&gt;Motivasi&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p&gt;&lt;strong&gt;Jangan&lt;/strong&gt; menyerah untuk &lt;u&gt;belajar&lt;/u&gt; &lt;b&gt;koding&lt;/b&gt;&lt;/p&gt;
  &lt;/body&gt;
<mark class="keep">&lt;/html&gt;</mark></code></pre>
              <p class="mb-0">
                Bagaimana? Sudah jelas dan sudah bisa membedakan apa itu tag dan apa itu element kan? Kalau sudah berarti <b>kalian hebat</b>. Kalau belum ayo coba di telaah lagi sampai pahamyaa. Jangan bosan untuk membacayaa 😉
              </p>
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