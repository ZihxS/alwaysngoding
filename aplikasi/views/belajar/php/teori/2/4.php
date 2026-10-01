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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/syntax-dasar-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Macam-Macam Cara Untuk Menggunakan Fungsi "echo" Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Banyak sekali cara untuk menggunakan fungsi echo pada PHP, berikut adalah contoh-contohnya:</p>
              <pre class="language-php"><code>&lt;?php echo "halo <?= strtolower($this->session->ang_nama_pengguna); ?>"; ?&gt;</code></pre>
              <pre class="language-php"><code>&lt;?= "halo <?= strtolower($this->session->ang_nama_pengguna); ?>"; ?&gt;</code></pre>
              <pre class="language-php"><code>&lt;?php echo 'hola <?= strtolower($this->session->ang_nama_pengguna); ?>'; ?&gt;</code></pre>
              <pre class="language-php"><code>&lt;?= 'hola <?= strtolower($this->session->ang_nama_pengguna); ?>'; ?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Text yang akan dicetak atau ditampilkan harus dibungkus dengan <code>''</code> atau <code>""</code>. Dan setelah <code>''</code> atau <code>""</code> harus disertakan tanda titik koma <b><q>;</q></b>. Intinya setiap pernyataan (statement) pada kode PHP harus di akhiri dengan titik koma <b><q>;</q></b>.</p>
              <p class="mb-0">Kalian juga bisa menulis element HTML di fungsi echo, lihatlah contoh di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?= "&lt;div&gt;&lt;u&gt;<?= strtolower($this->session->ang_nama_pengguna); ?>&lt;/u&gt;&lt;/div&gt;"; ?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/2/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran"><code>&lt;?= ""; ?&gt;</code> adalah singkatan dari <code>&lt;?php echo ""; ?&gt;</code></blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>