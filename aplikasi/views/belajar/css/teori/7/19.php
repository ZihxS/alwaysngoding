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
            <h2 class="judul-teori">Nilai Pada Property Animation</h2>
            <hr>
            <div class="konten-teori">
              <p>Nilai pada property animation <b>ditentukan oleh sub-property dari animation itu sendiri</b>. Artinya, property animation <b>tidak memiliki nilai default</b> (single value). Nilai yang terisi dalam property animation akan bekerja dengan baik apabila <b>nilainya cocok dengan sub-property animation</b>.</p>
              <p class="mb-1">Di bawah ini adalah daftar sub-property beserta nilai yang cocok dengan property animation:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th>Sub-Property</th>
                    <th>Value</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="vertical-align: middle;" width="25%">animation-name</td>
                    <td style="vertical-align: middle;">ditentukan pengguna</td>
                    <td style="vertical-align: middle;" width="40%">
                      Menjalankan seleksi terhadap nama animasi yang didefinisikan pada @keyframes.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">animation-duration</td>
                    <td style="vertical-align: middle;">angka dengan satuan detik. Contoh <q>5s</q> (5 detik)</td>
                    <td style="vertical-align: middle;">
                      Memainkan animasi berdasarkan waktu dalam nilai animation-duration. Waktu ditentukan oleh value dari animation-duration.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">animation-timing-function</td>
                    <td style="vertical-align: middle;">linear, ease, ease-in, ease-out, ease-in-out, step-start, step-end, steps, cubic-bezier, initial, inherit</td>
                    <td style="vertical-align: middle;">
                      Memainkan animasi dengan kecepatan yang sama dari awal hingga akhir.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">animation-delay</td>
                    <td style="vertical-align: middle;">angka dengan satuan detik. Contoh <q>3s</q> (3 detik)</td>
                    <td style="vertical-align: middle;">
                      Memberi waktu jeda sebelum animasi dimainkan.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">animation-iteration-count</td>
                    <td style="vertical-align: middle;">integer (angka), infinite, initial, inherit</td>
                    <td style="vertical-align: middle;">
                      Menentukan berapa kali animasi akan dimainkan. Animasi akan berputar berulang kali jika diisi dengan nilai infinite.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">animation-direction</td>
                    <td style="vertical-align: middle;">normal, reverse, alternate, alternate-reverse, initial, inherit</td>
                    <td style="vertical-align: middle;">
                      Menentukan arah (direksi) animasi.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">animation-fill-mode</td>
                    <td style="vertical-align: middle;">none, forwards, backwards, both, initial, inherit</td>
                    <td style="vertical-align: middle;">
                      Menentukan gaya pada sebuah element ketika belum berjalan (sebelum berjalan, setelah selesai berjalan, atau keduanya)
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">animation-play-state</td>
                    <td style="vertical-align: middle;">paused, running, initial, inherit</td>
                    <td style="vertical-align: middle;">
                      Melakukan kontrol pada animasi untuk dihentikan atau dijalankan melalui value pada property animation-play-state.
                    </td>
                  </tr>
                </tbody>
              </table>
              <p class="m-0">Property animation dapat berjalan dengan baik pada software peramban web berikut:</p>
              <ul class="mb-0">
                <li>Google Chrome versi 43+</li>
                <li>Microsoft Edge versi 10+</li>
                <li>Mozilla Firefox versi 16+</li>
                <li>Safari Browser versi 9+</li>
                <li>Opera Browser versi 30+</li>
              </ul>
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