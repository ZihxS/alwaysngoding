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
  $u = 'belajar-html/teori/membuat-formulir-pada-html';
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
            <h2 class="judul-teori">Tag Textarea, Select dan Option</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Tag <code>&lt;textarea&gt;&lt;/textarea&gt;</code> berguna untuk menampung inputan text secara banyak, jadi tag <code>&lt;textarea&gt;&lt;/textarea&gt;</code> ini sama seperti tag <b><q>input</q></b> type <b><q>text</q></b> tetapi tag <code>&lt;textarea&gt;&lt;/textarea&gt;</code> bisa diatur ukurannya oleh atribut <b><q>cols</q></b> (untuk mengatur lebar kesamping) dan atribut <b><q>rows</q></b> (untuk mengatur ukuran tingginya).
              </p>
              <p>
                Tag <code>&lt;select&gt;&lt;/select&gt;</code> berguna untuk mendefinisikan input type <b><q>pilihan</q></b> tetapi bentuknya dropdown, model tampilan inputannya sama seperti input type <b><q>text</q></b>, namun jika diklik maka akan <b>muncul daftar-daftar menu pilihannya</b>.
              </p>
              <p>
                Tag <code>&lt;option&gt;&lt;/option&gt;</code> adalah pelengkap dari tag <code>&lt;select&gt;&lt;/select&gt;</code> yang berfungsi sebagai menu pilihannya.
              </p>
              <p class="m-0">Contoh kode penggunaan tag <b><q>textarea</q></b>, <b><q>select</q></b> dan <b><q>option</q></b>:</p>
              <pre class="language-html line-numbers" data-line="10-14"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;div&gt;
    &lt;label for="kisah"&gt;Ceritakan kisah hidup anda:&lt;/label&gt;
    &lt;br&gt;
    <mark class="keep">&lt;textarea name="kisah" id="kisah" cols="50" rows="10"&gt;&lt;/textarea&gt;</mark>
  &lt;/div&gt;
  &lt;div&gt;
    &lt;label for="provinsi"&gt;Anda tinggal di provinsi:&lt;/label&gt;
    &lt;br&gt;
    &lt;select name="provinsi" id="provinsi"&gt;
      &lt;option value="Jawa Timur"&gt;Jawa Timur&lt;/option&gt;
      &lt;option value="Jawa Tengah"&gt;Jawa Tengah&lt;/option&gt;
      &lt;option value="Jawa Barat"&gt;Jawa Barat&lt;/option&gt;
    &lt;/select&gt;
    &lt;input type="submit" name="proses" value="Proses"&gt;
  &lt;/div&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Sudah cukup jelasyaa kegunaan tag <b><q>textarea</q></b>, <b><q>select</q></b> dan juga <b><q>option</q></b>.</p>
              <blockquote class="catatan-pelajaran">
                Textarea bisa diubah ukurannya oleh kita, caranya klik dan tahan bagian pada pojok kanan bawah <b><q>textarea</q></b> dan atur ukurannya sesuka hati kalian.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>