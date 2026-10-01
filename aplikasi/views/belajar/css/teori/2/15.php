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
  $x = str_replace('Html','HTML',str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3))))).' #'.$b;
  $u = 'belajar-css/teori/perpaduan-css-dengan-html';
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
            <h2 class="judul-teori">Macam-Macam Penulisan Selector CSS</h2>
            <hr>
            <div class="konten-teori table-responsive">
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th>Selector</th>
                    <th>Contoh</th>
                    <th>Penjelasan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>.class</td>
                    <td>.contoh</td>
                    <td width="60%">Pilih semua element dengan class="contoh"</td>
                  </tr>
                  <tr>
                    <td>.class1.class2</td>
                    <td>.nama-depan.nama-belakang</td>
                    <td>Pilih semua element dengan class="nama-depan nama-belakang"</td>
                  </tr>
                  <tr>
                    <td>.class1 .class2</td>
                    <td>.nama-lengkap .nama-panggilan</td>
                    <td>Pilih semua element dengan class="nama-panggilan" yang merupakan turunan dari element dengan class="nama-lengkap"</td>
                  </tr>
                  <tr>
                    <td>#id</td>
                    <td>#contoh</td>
                    <td>Pilih semua element dengan id="contoh"</td>
                  </tr>
                  <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>Pilih semua element</td>
                  </tr>
                  <tr>
                    <td>element</td>
                    <td>p</td>
                    <td>Pilih semua element <q>p</q></td>
                  </tr>
                  <tr>
                    <td>element, element</td>
                    <td>div, p</td>
                    <td>Pilih semua element <q>div</q> dan semua element <q>p</q></td>
                  </tr>
                  <tr>
                    <td>element element</td>
                    <td>div p</td>
                    <td>Pilih semua element <q>p</q> yang ada di dalam element <q>div</q></td>
                  </tr>
                  <tr>
                    <td>element > element</td>
                    <td>div > p</td>
                    <td>Pilih semua element <q>p</q> yang orang tuanya adalah element <q>div</q></td>
                  </tr>
                  <tr>
                    <td>element + element</td>
                    <td>div + p</td>
                    <td>Pilih semua element <q>p</q> yang ditempatkan setelah element <q>div</q></td>
                  </tr>
                  <tr>
                    <td>element ~ element</td>
                    <td>p ~ ul</td>
                    <td>Pilih setiap element <q>ul</q> yang didahului oleh elemen <q>p</q></td>
                  </tr>
                  <tr>
                    <td>[attribute]</td>
                    <td>[target]</td>
                    <td>Pilih semua element yang mempunyai atribut <q>target</q></td>
                  </tr>
                  <tr>
                    <td>[attribute=value]</td>
                    <td>[target=_blank]</td>
                    <td>Pilih semua element dengan target="_blank"</td>
                  </tr>
                  <tr>
                    <td>[attribute~=value]</td>
                    <td>[title~=bunga]</td>
                    <td>Pilih semua element dengan atribut <q>title</q> yang mengandung kata <q>bunga</q></td>
                  </tr>
                  <tr>
                    <td>[attribute|=value]</td>
                    <td>[lang|=en]</td>
                    <td>Pilih semua element dengan atribut <q>lang</q> yang diawali dengan <q>en</q></td>
                  </tr>
                  <tr>
                    <td>[attribute^=value]</td>
                    <td>a[href^="https"]</td>
                    <td>Pilih semua element <q>a</q> yang nilai atribut <q>href</q>nya dimulai dengan <q>https</q></td>
                  </tr>
                  <tr>
                    <td>[attribute$=value]</td>
                    <td>a[href$=".pdf"]</td>
                    <td>Pilih semua element <q>a</q> yang nilai atribut <q>href</q>nya diakhiri dengan <q>.pdf</q></td>
                  </tr>
                  <tr>
                    <td>[attribute*=value]</td>
                    <td>a[href*="alwaysngoding"]</td>
                    <td>Pilih semua element <q>a</q> yang nilai atribut <q>href</q>nya mengandung substring <q>alwaysngoding</q></td>
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
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>