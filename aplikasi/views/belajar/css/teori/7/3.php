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
  $u = 'belajar-css/teori/transisi-transformasi-dan-animasi-pada-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Transform Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>CSS transform adalah <b>salah satu yang terpenting yang harus dipahami jika ingin membuat efek animasi dengan CSS</b>. Nantinya bisa membuat efek memutar element, membuat element bergerak dan sebagainya. Salah satu yang menjadi dasarnya adalah CSS transform. Oleh sebab itu kalian akan <b>mempelajari CSS transform terlebih dahulu</b>. Kemudian kalian akan belajar tentang <b>CSS animation</b>.</p>
              <p>CSS transform atau transformasi CSS <b>memungkinkan kalian untuk membuat efek rotate</b> (memutar element), <b>scale</b>, dan <b>skew pada element html</b>. Masing-masing dari efek ini akan kalian pelajari satu persatu.</p>
              <p class="mb-1">Berikut ini adalah beberapa metode transform pada CSS:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th>Metode</th>
                    <th>Kegunaan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="vertical-align: middle;">translate()</td>
                    <td width="70%">
                      Digunakan untuk <b>memindahkan sebuah element</b>. Kalian bisa menentukan posisinya dengan memberikan nilai pada parameter <b><q>X</q></b> untuk jarak samping dan parameter <b><q>Y</q></b> untuk jarak tingginya.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">scale()</td>
                    <td>
                      Digunakan untuk <b>melebarkan atau menjauhkan element dengan menambah atau mengurangi ukuran element</b>. Seperti effect <b>zoom</b> lah kira-kiranya.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">skew()</td>
                    <td>
                      Digunakan untuk <b>memiringkan element</b>.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">rotate()</td>
                    <td>
                      Fungsi yang bisa kalian gunakan untuk <b>memutar sebuah element</b>. Untuk memutar element nya kalian bisa menentukan nilainya di dalam parameter fungsi rotate ini. Untuk nilainya sendiri <b>bisa kalian tentukan dengan cara memberikan nilai derajat putar nya</b>.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">matrix()</td>
                    <td>
                      Fungsi matrix berguna untuk <b>menggabungkan beberapa transform lainnya seperti menggabungkan rotate(), skew(), scale() dan lainnya menjadi satu</b>. Sehingga transform tersebut akan dilakukan secara sekaligus.
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>