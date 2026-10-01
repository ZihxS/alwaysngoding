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
  $p = $b-1; // Sebelumnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Mysql','MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/tipe-data-pada-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'mysql', 'label' => 'Teori MySQL', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-mysql">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Tipe Data Fixed Point atau Desimal</h2>
            <hr>
            <div class="konten-teori">
              <p>Tipe data fixed point adalah tipe data angka <b>pecahan</b> atau <b>desimal</b>, dimana jumlah angka pecahan (angka di belakang koma) sudah di tentukan dari awal.</p>
              <p>Besar dari tipe data fixed point ini tergantung dari opsional valuenya, dimana value pertama adalah total jumlah digit keseluruhan dan value kedua adalah jumlah digit dibelakang koma (pecahan). Contohnya <b><q>DECIMAL(8, 2)</q></b> akan mendefiniskan suatu kolom agar memuat 8 digit angka, dengan 6 angka di depan koma, dan 2 digit angka di belakang koma.</p>
              <p class="mb-1">Untuk lebih jelasnya silahkan kalian perhatikan tabel di bawah ini dengan seksama:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="20%" class="f-bt">Deklarasi</td>
                  <td class="f-bt">Jangkauan</td>
                </tr>
                <tr>
                  <td>DECIMAL(2,1)</td>
                  <td>-9,9 sampai 9,9</td>
                </tr>
                <tr>
                  <td>DECIMAL(4,1)</td>
                  <td>-999,9 sampai 9999,9</td>
                </tr>
                <tr>
                  <td>DECIMAL(6,3)</td>
                  <td>-999,999 sampai 999,999</td>
                </tr>
                <tr>
                  <td>DECIMAL(8,2)</td>
                  <td>-999.999,99 sampai 999.999,99</td>
                </tr>
              </table>
              <p class="mb-2">Maksimal untuk value pertama adalah 65 dan maksimal untuk value kedua adalah 30. Dengan syarat, value kedua tidak boleh lebih besar dari value pertama. Jika kalian tidak menyertakan value pertama dan value kedua dalam mendefinisikan suatu kolom <b><q>DECIMAL</q></b>, maka secara sistem value pertama akan di atur 10. Dan default value kedua adalah 0.</p>
              <p class="mb-0">Berikut contoh query pembuatan tabel dengan tipe data desimal:</p>
              <pre class="language-sql"><code>CREATE TABLE contoh (
  satuan DECIMAL(3,2),
  puluhan DECIMAL(4,2),
  ribuan DECIMAL(5,2) UNSIGNED,
  normal DECIMAL,
  kustom DECIMAL(8,2) ZEROFILL
);
</code></pre>
              <blockquote class="catatan-pelajaran">Tipe data <b><q>DECIMAL</q></b> ini cocok digunakan untuk kolom yang difungsikan untuk menampung nilai uang.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>