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
            <h2 class="judul-teori">Tag Optgroup</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Tag <code>&lt;optgroup&gt;&lt;/optgroup&gt;</code> berguna untuk mengelompokkan tag <code>&lt;option&gt;&lt;/option&gt;</code> (mengelompokkan menu) pada tag <code>&lt;select&gt;&lt;/select&gt;</code>.
              </p>
              <p class="m-0">Perhatikan contoh di bawah ini:</p>
              <pre class="language-html line-numbers" data-line="5-13"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;div&gt;
    &lt;label for="kesukaan"&gt;Bahasa pemrogramman yang anda sukai:&lt;/label&gt;
    &lt;select name="kesukaan" id="kesukaan"&gt;
      &lt;optgroup <mark class="keep">label="Front END"</mark>&gt;
        &lt;option value="CSS"&gt;CSS&lt;/option&gt;
        &lt;option value="JavaScript"&gt;JavaScript&lt;/option&gt;
      &lt;/optgroup&gt;
      &lt;optgroup <mark class="keep">label="Back END"</mark>&gt;
        &lt;option value="PHP"&gt;PHP&lt;/option&gt;
        &lt;option value="Ruby"&gt;Ruby&lt;/option&gt;
        &lt;option value="Python"&gt;Python&lt;/option&gt;
      &lt;/optgroup&gt;
    &lt;/select&gt;
    &lt;input type="submit" name="proses" value="Proses"&gt;
  &lt;/div&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran mt-1">
                Atribut <b><q>label</q></b> pada tag <code>&lt;optgroup&gt;&lt;/optgroup&gt;</code> berguna untuk mendefinisikan judul group (kelompok) nya.
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