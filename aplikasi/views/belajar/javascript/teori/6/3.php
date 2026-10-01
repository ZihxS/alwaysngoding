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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Operator JavaScript Yang Sering Digunakan Pada Percabangan</h2>
            <hr>
            <div class="konten-teori">
              <p>Tentunya disetiap proses validasi atau percabangan kita akan memfilter (mengkondisikan) kode sesuai yang kita harapkan, maka dari itu kita butuh yang namanya operator pada proses percabangan yang kompleks.</p>
              <p class="mb-2">Berikut adalah operator JavaScript yang sering digunakan pada percabangan:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="20%">Simbol</th>
                    <th>Nama Operator</th>
                    <th>Contoh</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>></td>
                    <td>Lebih Besar</td>
                    <td>var1 > var2 (5 > 10 hasilnya false)</td>
                  </tr>
                  <tr>
                    <td><</td>
                    <td>Lebih Kecil</td>
                    <td>var1 < var2 (5 < 10 hasilnya true)</td>
                  </tr>
                  <tr>
                    <td>== atau ===</td>
                    <td>Sama Dengan</td>
                    <td>var1 == var2 (7 == 15 hasilnya false)</td>
                  </tr>
                  <tr>
                    <td>!= atau !==</td>
                    <td>Tidak Sama Dengan</td>
                    <td>var1 != var2 (7 != 15 hasilnya true)</td>
                  </tr>
                  <tr>
                    <td>>=</td>
                    <td>Lebih Besar Sama Dengan</td>
                    <td>var1 >= var2 (13 >= 15 hasilnya false)</td>
                  </tr>
                  <tr>
                    <td><=</td>
                    <td>Lebih Kecil Sama dengan</td>
                    <td>var1 <= var2 (13 <= 15 hasilnya true)</td>
                  </tr>
                  <tr>
                    <td>&&</td>
                    <td>Logika AND</td>
                    <td>var1 && var2 (true && false hasilnya false)</td>
                  </tr>
                  <tr>
                    <td>||</td>
                    <td>Logika OR</td>
                    <td>var1 || var2 (true || false hasilnya true)</td>
                  </tr>
                  <tr>
                    <td>!</td>
                    <td>Logika NOT / Negasi / Kebalikan</td>
                    <td>!var1 (!true hasilnya false)</td>
                  </tr>
                </tbody>
              </table>
              <blockquote class="catatan-pelajaran">Operator <b><q>&&</q></b> (AND) akan menghasilkan <b><q>true</q></b> apabila semua kondisi bernilai <b><q>true</q></b>. Sedangkan operator <b><q>||</q></b> (OR) akan menghasilkan <b><q>true</q></b> saat ada satu kondisi bernilai <b><q>true</q></b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>