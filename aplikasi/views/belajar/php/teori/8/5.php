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
  $u = 'belajar-php/teori/lebih-banyak-tentang-php';
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
            <h2 class="judul-teori">$_GET, $_POST dan $_REQUEST Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Kalian telah mengetahui bahwa jika form dikirim menggunakan method GET maka di dalam PHP kita mengaksesnya dengan variabel <b><q>$_GET</q></b>, namun jika form dibuat menggunakan method POST kita mengaksesnya dengan variabel <b><q>$_POST</q></b>.</p>
              <p>Bagaimana jika pada saat memproses form kita tidak mengetahui dengan pasti apakah form dikirim dengan GET atau POST? PHP menyediakan variabel <b><q>$_REQUEST</q></b> sebagai salah satu solusinya. Variabel <b><q>$_REQUEST</q></b> menampung nilai form yang dikirim dengan method GET maupun method POST secara bersamaan.</p>
              <p class="mb-0">Untuk mencobanya, silahkan jalankan file <b><q>form.html</q></b> dengan isi kode HTML sebagai berikut:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Membuat Form Sederhana&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;form action="proses.php" method="GET"&gt;
      &lt;div&gt;
        Masukkan nama lengkap anda: &lt;input type="text" name="nama"&gt;
      &lt;/div&gt;
      &lt;div&gt;
        Masukkan alamat lengkap anda: &lt;input type="text" name="alamat"&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;input type="submit" value="Proses"&gt;
      &lt;/div&gt;
    &lt;/form&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p class="mb-0">Halaman <b><q>form.html</q></b> di atas sama persis dengan yang kita gunakan pada bagian sebelumnya, namun untuk halaman <b><q>proses.php</q></b>, kita akan modifikasi dengan menggunakan variabel <b><q>$_REQUEST</q></b> seperti berikut ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   echo "Nama lengkap anda adalah: {$_REQUEST['nama']}";
   echo "&lt;br&gt;";
   echo "Alamat lengkap anda adalah: {$_REQUEST['alamat']}";
?&gt;</code></pre>
              <p class="mb-2">Jika kalian menjalankan <b><q>form.html</q></b> lalu klik tombol <b><q>Proses</q></b>, maka hasil form akan ditampilkan sebagaimana mestinya. Kalian juga bisa mengubah method form menjadi method POST, walau diganti tapi variabel <b><q>$_REQUEST</q></b> akan tetap menampilkan hasil form sebagaimana mestinya.</p>
              <blockquote class="catatan-pelajaran">Selain menampung hasil form GET dan POST, variabel <b><q>$_REQUEST</q></b> juga menampung nilai dari cookie, atau variabel superglobals <b><q>$_COOKIE</q></b>.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>