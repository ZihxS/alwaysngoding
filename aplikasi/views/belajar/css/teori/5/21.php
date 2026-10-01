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
            <h2 class="judul-teori">Property Overflow Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-1">Property overflow pada CSS berguna <b>untuk mengatur konten jika melebihi batas yang sudah di tentukan</b> atau konten yang sudah melebihi parent element nya. Property overflow pada CSS memiliki 4 isi (value) dengan fungsi yang berbeda tentunya. Berikut adalah nilai-nilai untuk property overflow pada CSS:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="25%" class="f-bt">Nilai untuk property overflow</td>
                  <td class="f-bt">Deskripsi kegunaan</td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;">visible</td>
                  <td>Konten masih terlihat meski melewati batas parent nya.</td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;">hidden</td>
                  <td>Konten yang melebihi parent nya akan disembunyikan.</td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;">scroll</td>
                  <td>Konten yang melebihi parent nya akan disembunyikan. Tetapi kalian masih bisa melihat seluruh kontennya dengan menggerakan scroll bar.</td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;">auto</td>
                  <td>Konten yang melebihi parent nya akan disembunyikan dengan scroll dan tanpa scroll.</td>
                </tr>
              </table>
              <p class="mt-0 mb-0">Berikut adalah beberapa contoh cara menggunakan property overflow pada CSS:</p>
              <pre class="language-css line-numbers" data-line="4"><code>div {
  width: 100px;
  height: 100px;
  overflow: visible;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-css line-numbers" data-line="4"><code>div {
  width: 100px;
  height: 100px;
  overflow-x: scroll;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-css line-numbers" data-line="4"><code>div {
  width: 100px;
  height: 100px;
  overflow-y: auto;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-css line-numbers" data-line="4"><code>div {
  width: 100px;
  height: 100px;
  overflow-y: hidden;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">
                <b><q>overflow</q></b> akan berefek kepada konten yang melebihi batas ke kanan (horizontal) dan ke bawah (vertikal).<br>
                <b><q>overflow-x</q></b> akan berefek kepada konten yang melebihi batas ke kanan (horizontal).<br>
                <b><q>overflow-y</q></b> akan berefek kepada konten yang melebihi batas ke bawah (vertikal).<br>
              </blockquote>
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