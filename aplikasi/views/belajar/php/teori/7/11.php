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
  $x = str_replace('Session','Session,',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/kelola-session-cookie-dan-files';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Penjelasan Detail 7 Argumen Cookie Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="20%">Argumen</th>
                    <th>Penjelasan / Kegunaan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nama cookie</td>
                    <td>Berisi nama dari cookie.</td>
                  </tr>
                  <tr>
                    <td>Nilai cookie</td>
                    <td>Berisi nilai yang akan disimpan, sesuai nama cookie yang sudah ditulis di argumen pertama.</td>
                  </tr>
                  <tr>
                    <td>Expire time</td>
                    <td>Berisi kapan waktu cookie berakhir, format waktu ini dapat berupa Unix Timestamp, sehingga kalian dapat menggunakan fungsi time() di php, jika nilai expire dikosongkan atau bernilai 0, maka data cookie akan expire atau dihapus ketika browser di tutup (sama seperti konsep session).</td>
                  </tr>
                  <tr>
                    <td>Path</td>
                    <td>Berisi path atau lokasi server dimana cookie dapat digunakan, jika bagian path diisi tanda slash ‘/’, maka cookie dapat diakses diseluruh bagian website.</td>
                  </tr>
                  <tr>
                    <td>Domain</td>
                    <td>Dapat diisi subdomain yang dapat menggunakan cookie tersebut. Semisal kita mengisikan example.test, maka cookie dapat digunakan pada subdomain dari example.test seperti blog.example.test, store.example.test dan lainnya. Jika kalian mengosongkan bagian ini, maka cookie dapat digunakan pada seluruh bagian domain, tetapi tidak dapat digunakan di subdomain.</td>
                  </tr>
                  <tr>
                    <td>Secure</td>
                    <td>Secara Default akan bernilai FALSE, jika kalian mengganti nilainya menjadi TRUE, maka browser akan mengirimkan cookie ke webserver hanya jika koneksinya https.</td>
                  </tr>
                  <tr>
                    <td>HttpOnly</td>
                    <td>Secara Default akan bernilai FALSE, cookie hanya dapat diakses melalui protokol http.</td>
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
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>