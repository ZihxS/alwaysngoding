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
            <h2 class="judul-teori">Property Display Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Fungsi property display pada CSS ini adalah <b>untuk menentukan bagaimana suatu element ditampilkan</b>. Property ini bisa membuat suatu tag html yang bertipe block menjadi tidak bertipe block, atau sebaliknya membuat tag html yang tidak bertipe block menjadi tag yang bertipe block.</p>
              <p class="mb-1">Banyak sekali nilai untuk property display ini, berikut adalah nilai-nilai untuk property display pada CSS:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="25%" class="f-bt">Nilai untuk property display</td>
                  <td class="f-bt">Deskripsi kegunaan</td>
                </tr>
                <tr>
                  <td>none</td>
                  <td>Menyembunyikan element</td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;">inline</td>
                  <td>Membuat element menjadi bersifat inline (hanya memakan tempat sesuai dengan konten element dan tidak bisa diatur width, height, margin dan paddingnya)</td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;">block</td>
                  <td>Membuat element menjadi bersifat block (memakan tempat 100% ke samping (horizontal) dan bisa diatur width, height, margin juga paddingnya)</td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;">inline-block</td>
                  <td>Gabungan dari sifat inline dan block, sifat akan sama seperti inline tapi bisa di atur width, height, margin dan paddingnya</td>
                </tr>
              </table>
              <p class="m-0">Sebenarnya masih banyak nilai untuk property display pada CSS. Tetapi untuk pelajaran CSS ini kalian hanya mempelajari nilai-nilai di atas saja. Berikut adalah contoh penggunaan property display:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      .none {
        display: none;
      }
      .inline {
        display: inline;
      }
      .block {
        display: block;
      }
      .inline-block {
        display: inline-block;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="none"&gt;Element ini tidak akan ditampilkan (disembunyikan).&lt;/div&gt;
    &lt;p class="inline"&gt;Mengubah sifat element menjadi bersifat inline.&lt;/p&gt;
    &lt;span class="block"&gt;Mengubah sifat element menjadi bersifat block.&lt;/span&gt;
    &lt;span class="inline-block"&gt;Mengubah sifat element menjadi bersifat inline-block.&lt;/span&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>