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
            <h2 class="judul-teori">Bekerja Dengan Form (HTML & PHP)</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Form merupakan syntax dari HTML yang berisi kumpulan isian data, misal:</p>
              <ul>
                <li>Form login yang berisi isian nama pengguna dan kata sandi.</li>
                <li>Form pendaftaran yang berisi isian nama, jenis kelamin, tanggal lahir, alamat dan lain-lain.</li>
              </ul>
              <p class="mb-0">Dalam pembuatan web dinamis, kalian bisa melakukan pengiriman data dari form HTML untuk kemudian data tersebut akan diproses lebih lanjut oleh bahasa pemrograman PHP. Bahasa yang kita gunakan untuk membuat form untuk web dinamis adalah HTML. Berikut adalah contoh pembuatan form sederhana:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Membuat Form Sederhana&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;form&gt;
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
    &lt;/form&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p>Kode HTML tersebut akan menampilkan form sederhana dengan 2 buah kotak inputan dan sebuah tombol <b><q>Proses</q></b> yang berfungsi untuk submit form. Dari struktur dasar tersebut, di dalam tag <b><q>&lt;form&gt;</q></b> terdapat 2 buah atribut. Yaitu atribut <b><q>action</q></b> dan atribut <b><q>method</q></b>.</p>
              <p>Atribut <b><q>action</q></b> ini diisi dengan nilai berupa alamat halaman PHP dimana kita akan memproses isi form tersebut. Dalam contoh di atas, kita membuat nilai <code class="custom">action="proses.php"</code>, yang berarti kita harus menyediakan sebuah file dengan nama <b><q>proses.php</q></b> untuk memproses form tersebut.</p>
              <p class="text-left">Isi atribut <b><q>action</q></b> sebenarnya adalah alamat dari halaman PHP. Karena atribut <b><q>action</q></b> pada contoh di atas ditulis <code class="custom">action="proses.php"</code>, maka file <b><q>proses.php</q></b> harus berada di dalam 1 folder dengan halaman HTML yang berisi form ini. Namun kalian bisa dengan bebas mengubah alamat <b><q>proses.php</q></b> ini tergantung dimana file tersebut berada, misalnya menjadi alamat relatif seperti <code class="custom">action="folder_php/proses.php"</code>, ataupun alamat absolut seperti <code class="custom">action="https://example.test/proses.php"</code>.</p>
              <p>Atribut kedua yang berkaitan dengan pemrosesan form HTML adalah atribut method. Atribut inilah yang akan menentukan bagaimana cara form <b><q>dikirim</q></b> ke dalam halaman <b><q>proses.php</q></b>. Nilai dari atribut method hanya bisa diisi dengan 1 dari 2 pilihan, yakni <b><q>GET</q></b> atau <b><q>POST</q></b>.</p>
              <p class="mb-0">Jika seperti contoh di atas kita membuat nilai <code class="custom">method="GET"</code>, maka nilai dari form akan dikirim melalui alamat URL website. Namun jika nilai method diubah menjadi <code class="custom">method="POST"</code>, maka nilai form tidak akan terlihat di dalam alamat URL. Nilai dari atribut <b><q>method</q></b> ini juga akan mempengaruhi cara kita memproses nilai dari form.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>