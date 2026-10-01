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
  $u = 'belajar-html/teori/membuat-tabel-pada-html';
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
            <h2 class="judul-teori">Memanfaatkan Atribut Valign (Vertical Align)</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Atribut <b><q>valign</q></b> pada tabel digunakan <b>untuk mengatur perataan pada tabel secara vertikal</b>.
                <br>
                Atribut <b><q>valign</q></b> ditulis pada tag <code>&lt;tr&gt;&lt;/tr&gt;</code>, <code>&lt;th&gt;&lt;/th&gt;</code> ataupun <code>&lt;td&gt;&lt;/td&gt;</code> yang nantinya akan menentukan posisi isi tabel (data) di dalam tabel secara vertikal.
              </p>
              <p class="mb-1">Ada empat nilai yang dapat diterapkan di atribut <b><q>valign</q></b> yaitu:</p>
              <table class="table table-striped table-bordered table-hover">
                <tr>
                  <td width="30%">Nilai (isi)</td>
                  <td>Fungsi</td>
                </tr>
                <tr>
                  <td>top</td>
                  <td>Membuat isi sel rata atas dengan sel</td>
                </tr>
                <tr>
                  <td>bottom</td>
                  <td>Membuat isi sel rata bawah dengan sel</td>
                </tr>
                <tr>
                  <td>middle</td>
                  <td>Membuat isi sel berada di tengah sel</td>
                </tr>
                <tr>
                  <td>baseline</td>
                  <td>Membuat isi sel berada posisi teks pertama yang diketik dalam sel</td>
                </tr>
                </table>
                <p class="m-0">Berikut adalah contoh kode penulisan dan pengunaan atribut <b><q>valign</q></b> untuk tabel HTML:</p>
                <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Penulisan dan pengunaan atribut valign untuk tabel HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h2&gt;Penulisan dan pengunaan atribut valign untuk tabel HTML - Always Ngoding&lt;/h2&gt;
    &lt;table border="1" width="75%"&gt;
      &lt;thead&gt;
        &lt;tr&gt;
          &lt;th&gt;Judul 1&lt;/th&gt;
          &lt;th&gt;Judul 2&lt;/th&gt;
          &lt;th&gt;Judul 3&lt;/th&gt;
        &lt;/tr&gt;
      &lt;/thead&gt;
      &lt;tbody&gt;
        &lt;tr height="350"&gt;
          &lt;td align="center" <mark class="keep">valign="top"</mark>&gt;
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae doloremque culpa cum earum eligendi nesciunt ea hic fugit accusantium doloribus, qui dolorem, maiores mollitia iure minima quam praesentium nobis, suscipit!
          &lt;/td&gt;
          &lt;td align="center" <mark class="keep">valign="middle"</mark>&gt;
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores consectetur modi quod voluptates. Facere eveniet a debitis, iure adipisci tempora harum dolor laboriosam cumque aliquam. Ducimus minus culpa placeat nam.
          &lt;/td&gt;
          &lt;td align="center" <mark class="keep">valign="bottom"</mark>&gt;
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat magnam, corporis accusantium, dolorum voluptates aut dignissimos voluptatum dolorem quae culpa eligendi in quasi? Consequatur nulla dolorum, ratione quibusdam, soluta commodi.
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;/tbody&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-html/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>