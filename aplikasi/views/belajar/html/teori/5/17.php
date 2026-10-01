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
            <h2 class="judul-teori">Input Type File dan Reset</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Input type <b><q>file</q></b> berguna untuk <b>memasukkan file dari komputer kita</b>.
              </p>
              <p>
                Input type <b><q>reset</q></b> berguna untuk <b>mengulang pengisian formulir</b> (membuat inputan-inputan formulir ke kondisi awal).
              </p>
              <p class="m-0">Contoh penggunaan input type <b><q>file</q></b>:</p>
              <pre class="language-html line-numbers"><code>&lt;form action="proses.php" method="POST" <mark class="keep">enctype="multipart/form-data"</mark>&gt;
  &lt;label for="file"&gt;Pilih file:&lt;/label&gt;
  &lt;input <mark class="keep">type="file"</mark> name="file" id="file"&gt;
  &lt;input type="submit" name="proses" value="Proses"&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran mb-2">
                Jika kalian memakai input type <b><q>file</q></b>, kalian wajib mencantumkan atribut <b><q>enctype</q></b> dan nilai/isi nya <b><q>multipart/form-data</q></b>. Apabila tidak pakai itu maka nanti pada pemrosesannya akan error.
              </blockquote>
              <p class="m-0">Contoh penggunaan input type <b><q>reset</q></b>:</p>
              <pre class="language-html line-numbers"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;label for="waktu_lahir"&gt;Waktu lahir:&lt;/label&gt;
  &lt;input type="time" name="waktu_lahir" id="waktu_lahir"&gt;
  &lt;&gt;
  &lt;label for="tanggal_lahir"&gt;Tanggal lahir:&lt;/label&gt;
  &lt;input type="date" name="tanggal_lahir" id="tanggal_lahir"&gt;
  &lt;&gt;
  &lt;input type="submit" name="proses" value="Proses"&gt;
  <mark class="keep">&lt;input type="reset" value="Ulangi"&gt;</mark>
&lt;/form&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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