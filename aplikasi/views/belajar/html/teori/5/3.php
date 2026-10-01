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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/membuat-formulir-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Membuat Form Sederhana (Daftar Anggota)</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sekarang kalian akan membuat formulir untuk pendaftaran anggota, kalian membutuhkan inputan untuk mengisi data <b>nama pengguna</b>, <b>nama lengkap</b>, <b>email</b> dan <b>kata sandi</b>.
              </p>
              <p class="m-0">
                Berikut adalah kode untuk membuat formulir tersebut:
              </p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Membuat formulir pendaftaran&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h2&gt;Formulir pendaftaran anggota&lt;/h2&gt;
    &lt;h3&gt;Silahkan isi dengan benar&lt;/h3&gt;
    <mark class="keep">&lt;form action="daftar_anggota.php" method="POST"&gt;</mark>
      &lt;table border="1" rules="all" cellpadding="5"&gt;
        &lt;tr&gt;
          &lt;td&gt;Nama pengguna:&lt;/td&gt;
          &lt;td&gt;
            <mark class="keep">&lt;input type="text" name="nama_pengguna"&gt;</mark>
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Nama lengkap:&lt;/td&gt;
          &lt;td&gt;
            <mark class="keep">&lt;input type="text" name="nama_lengkap"&gt;</mark>
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Email:&lt;/td&gt;
          &lt;td&gt;
            <mark class="keep">&lt;input type="email" name="email"&gt;</mark>
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Kata sandi:&lt;/td&gt;
          &lt;td&gt;
            <mark class="keep">&lt;input type="password" name="kata_sandi"&gt;</mark>
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td colspan="2" align="right"&gt;
            <mark class="keep">&lt;input type="submit" name="kirim" value="Daftar"&gt;</mark>
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;/table&gt;
    <mark class="keep">&lt;/form&gt;</mark>
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">
                Perhatikan kode di atas, yang sudah ditandai itu adalah bagian-bagian formulirnya, disini kita memakai tabel untuk mengulang kembali pelajaran membuat tabel.
              </p>
              <ul class="mb-2 mt-1">
                <li>Ada tag form yang berguna untuk mendefinisikan formulirnya, lalu mempunyai dua atribut yaitu <strong><q>action</q></strong> dan <strong><q>method</q></strong>, di dalam atribut <b><q>action</q></b> terdapat nilai <b><q>daftar_anggota.php</q></b> yang artinya pada saat tombol daftar diklik maka formulir akan diproses di file <b><q>daftar_anggota.php</q></b>. Dan di dalam atribut method terdapat nilai <b><q>POST</q></b> yang umum digunakan dan berfungsi untuk memberitahu formulir bahwa datanya akan disetor.</li>
                <li>Ada tag input yang mempunyai atribut <b><q>type</q></b> yang berisi <b><q>text</q></b>, nah inputan ini bisa diisi dengan text (string).</li>
                <li>Ada tag input yang mempunyai atribut <b><q>type</q></b> yang berisi <b><q>email</q></b>, jadi harus diisi dengan alamat email dan emailnya harus valid.</li>
                <li>Ada tag input yang mempunyai atribut <b><q>type</q></b> yang berisi <b><q>password</q></b>, huruf atau angka yang kita input di inputan ini akan diubah menjadi simbol <b>*</b> (Bintang).</li>
                <li>Ada tag input yang mempunyai atribut <b><q>type</q></b> yang berisi <b><q>submit</q></b>, inputan ini tampilannya adalah tombol, inputan ini bisa disebut inputan eksekusi atau tombol eksekusi, yang mana jika tombol ini diklik maka formulir akan dieksekusi. Terdapat atribut <b><q>value</q></b> yang berguna untuk menampilkan <b><q>visual text</q></b> pada tombolnya.</li>
              </ul>
              <blockquote class="catatan-pelajaran">Atribut <b><q>name</q></b> berguna untuk mendefinisikan nama inputannya untuk diproses nantinya dengan syntax (kode) PHP.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>