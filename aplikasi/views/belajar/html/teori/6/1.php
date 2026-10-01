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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/lebih-banyak-tentang-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Membuat List - #1</h2>
            <hr>
            <div class="konten-teori">
              <p>
                HTML menyediakan tag-tag untuk <b>membuat dan menyusun list</b>, ada <b>3 macam list pada HTML</b> yaitu <big><b>O</b></big>rdered <big><b>L</b></big>ist (list yang beraturan), <big><b>U</b></big>nordered <big><b>L</b></big>ist (list yang tidak beraturan) dan <big><b>D</b></big>ata <big><b>L</b></big>ist.
              </p>
              <p class="m-1">Berikut adalah beberapa tag yang berguna untuk membuat list:</p>
              <table class="table table-striped table-bordered table-hover" class="m-0">
                <tr>
                  <th width="30%">Tag</th>
                  <th>Deskripsi kegunaan</th>
                </tr>
                <tr>
                  <td>&lt;ol&gt;&lt;/ol&gt;</td>
                  <td>Membuat suatu list yang beraturan.</td>
                </tr>
                <tr>
                  <td>&lt;ul&gt;&lt;/ul&gt;</td>
                  <td>Membuat suatu list yang tidak beraturan.</td>
                </tr>
                <tr>
                  <td>&lt;li&gt;&lt;/li&gt;</td>
                  <td>Mendefinisikan list (daftar), untuk tag &lt;ol&gt;&lt;/ol&gt; dan &lt;ul&gt;&lt;/ul&gt;.</td>
                </tr>
                <tr>
                  <td>&lt;dl&gt;&lt;/dl&gt;</td>
                  <td>Membuat data list.</td>
                </tr>
                <tr>
                  <td>&lt;dt&gt;&lt;/dt&gt;</td>
                  <td>Membuat judul list pada tag &lt;dl&gt;&lt;/dl&gt;.</td>
                </tr>
                <tr>
                  <td>&lt;dd&gt;&lt;/dd&gt;</td>
                  <td>Membuat deskripsi list pada tag &lt;dl&gt;&lt;/dl&gt;.</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>