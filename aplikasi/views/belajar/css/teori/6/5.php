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
  $u = 'belajar-css/teori/gradient-dan-background-pada-css';
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
            <h2 class="judul-teori">Property "background-clip" Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Property background-clip merupakan property css yang baru mulai diperkenalkan pada versi CSS3. Property background-clip berfungsi <b>untuk menentukan pengisian background pada element html yang memiliki border</b>. Untuk melihat efek property ini kalian harus memberikan border pada element terlebih dahulu.</p>
              <p class="mb-1">Berikut beberapa value pada property background-clip:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="25%" class="f-bt">Value</td>
                  <td class="f-bt">Deskripsi kegunaan</td>
                </tr>
                <tr>
                  <td>border-box</td>
                  <td>Value ini berfunsi untuk membuat background mengisi seluruh area pada element tersebut, sehingga background tetap mengisi sampai kebelakang border.</td>
                </tr>
                <tr>
                  <td>padding-box</td>
                  <td>Value padding-box akan membuat background hanya mengisi content sampai batas pinggir dalam border, sehingga bagian border tidak diisi oleh background.</td>
                </tr>
                <tr>
                  <td>content-box</td>
                  <td>Value content-box diterapkan apabila kalian tidak menginginkan background mengisi seluruh elemen, melainkan hanya kontennya saja.</td>
                </tr>
              </table>
              <p class="m-0">Berikut adalah cara penggunaan property background-clip:</p>
              <pre class="language-html line-numbers" data-line="14,17,20"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      div {
        border: 3px dotted black;
        background: salmon;
        padding: 10px;
        margin: 10px;
      }
      .border {
        background-clip: border-box;
      }
      .padding {
        background-clip: padding-box;
      }
      .content {
        background-clip: content-box;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="border"&gt;
      Background mengisi bagian belakang border.
    &lt;/div&gt;
    &lt;div class="padding"&gt;
      Background hanya sampai tepi border.
    &lt;/div&gt;
    &lt;div class="content"&gt;
      Background hanya mengisi bagian kontennya saja.
    &lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-css/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>