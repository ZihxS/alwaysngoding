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
            <h2 class="judul-teori">Gradiasi Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Pada CSS <b>kalian bisa membuat dan mengatur warna gradiasi</b> sesuai dengan kemauan kalian. Tentunya <b>warna gradiasi bisa lebih meningkatkan keindahan website kalian</b> agar lebih menarik untuk dilihat. Oleh karena itu kalian harus belajar mengelola warna gradiasi dengan syntax (code) CSS.</p>
              <p class="mb-1">Warna gradiasi pada CSS ada dua tipe, berikut adalah tabel tipe gradiasi pada CSS:</p>
              <table class="table table-striped table-bordered table-hover mb-2">
                <tr>
                  <td width="25%" class="f-bt">Tipe Gradiasi</td>
                  <td class="f-bt">Deskripsi kegunaan</td>
                </tr>
                <tr>
                  <td>Linear Gradient</td>
                  <td>Linear Gradient adalah gradient yang berbentuk warna yang berdampingan tapi efeknya sangat lembut. Jadi kedua warna akan terlihat menyatu. Baik itu atas ke bawah atau kiri ke kanan.</td>
                </tr>
                <tr>
                  <td>Radial Gradient</td>
                  <td>Radial Gradient adalah warna gradient yang memiliki pusat tengah. jadi seperti membentuk lingkaran dalam pewarnaannya.</td>
                </tr>
              </table>
              <p class="m-0">Berikut adalah beberapa syntax untuk menghasilkan gradiasi linear (linear gradient):</p>
              <pre class="language-css line-numbers" data-line="4,10,16,22,28"><code>div.satu {
  width: 500px;
  height: 500px;
  background: linear-gradient(salmon, orange); /* untuk dua warna */
}

div.dua {
  width: 500px;
  height: 500px;
  background: linear-gradient(pink, aqua, maroon); /* untuk tiga warna */
}

div.tiga {
  width: 500px;
  height: 500px;
  background: linear-gradient(to left, red, yellow); /* dari kanan ke kiri */
}

div.empat {
  width: 500px;
  height: 500px;
  background: linear-gradient(to bottom, red, yellow); /* dari atas ke bawah */
}

div.lima {
  width: 500px;
  height: 500px;
  background: linear-gradient(45deg, red, yellow); /* kemiringan 45 degradasi */
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Dan berikut adalah beberapa syntax untuk menghasilkan gradiasi radial (radial gradient):</p>
              <pre class="language-css line-numbers" data-line="4,10,16"><code>div.enam {
  width: 500px;
  height: 500px;
  background: radial-gradient(blue, green);
}

div.tujuh {
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, blue, green); /* membentuk lingkaran sempurna */
}

div.delapan {
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, blue, green, indigo); /* membentuk lingkaran sempurna */
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran mb-2">Kalian bisa menggunakan banyak warna sekaligus pada linear dan radial gradient, bisa lebih dari 3 loh.</blockquote>
              <blockquote class="catatan-pelajaran">Untuk melihat hasil warna gradiasi kode-kode di atas, kalian bisa mengarahkan cursor pointer kalian ke bagian tulisan linear-gradient dan radial-gradient pada kode-kode di atas.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>