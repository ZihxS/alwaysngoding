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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/tag-atribut-dan-elemen-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Catatan #2</h2>
            <hr>
            <div class="konten-teori">
              <blockquote class="catatan-pelajaran mb-2">Jika ada <b>kesalahan</b> pada penulisan tag, HTML tetap menampilkan hasilnya pada web browser, tetapi <b>tidak akan menjadi sempurna</b> atau tidak akan sesuai dengan harapan yang kalian mau.</blockquote>
              Contoh kode:
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;Belajar HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div&gt;
      &lt;p&gt;Hallo <mark class="keep">&lt;b&gt;</mark>dunia!!!&lt;/p&gt;
    &lt;/div&gt;
    &lt;div&gt;
      &lt;p&gt;Kita harus selalu lapar akan ilmu dan selalu merasa bodoh (karena masih banyak orang yang bisa lebih dari kita)&lt;/p&gt;
    &lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>
                Kode di atas terdapat tag <b><q>&lt;b&gt;</q></b> yang belum ditutup, maka dari bagian <b><q>dunia!!</q></b> sampai akhir akan tercetak tebal, tentu tidak akan enak dilihatnya kan?, tetapi walaupun begitu kode tersebut tetap ditampilkan hasilnya pada web browser.
              </p>
              <p class="mb-0">
                Tetapi jika HTML sudah berpadu dengan bahasa pemrograman PHP, dan kode PHP nya ada yang error, maka kode HTML tersebut tidak akan ada hasilnya di web browser (Hasilnya hanya pesan error kode PHP), nanti kalian akan mengetahui lebih pada pelajaran PHP.
              </p>
            </div>
          </div>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/teori/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php $this->load->view('belajar/markas/teori/tombol-selesai', NULL, FALSE); ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'html', 'modul_bagian' => 2, 'nama_modul' => 'Tag, Atribut dan Elemen Pada HTML'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>