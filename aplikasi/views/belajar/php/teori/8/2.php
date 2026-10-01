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
            <h2 class="judul-teori">Bekerja Dengan Form (HTML & PHP)</h2>
            <hr>
            <div class="konten-teori">
              <p class="text-left">Karena kita akan mengeksekusi kode PHP, kedua file ini harus dijalankan dengan XAMPP dan berada di dalam folder <b><q>htdocs</q></b>. Untuk contoh kali ini kita akan membuat folder <b><q>formulir</q></b> di dalam folder htdocs XAMPP, sehingga untuk mengakses kedua halamannya adalah dari alamat: <b><q>http://localhost/formulir/form.html</q></b> dan <b><q>http://localhost/formulir/proses.php</q></b>.</p>
              <p class="mb-0">Sebagai langkah pertama, kita akan membuat file <b><q>form.html</q></b> yang berisi kode HTML sebagai berikut:</p>
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
          Masukan nama lengkap anda: &lt;input type="text" name="nama"&gt;
        &lt;/div&gt;
        &lt;div&gt;
          Masukan alamat lengkap anda: &lt;input type="text" name="alamat"&gt;
        &lt;/div&gt;
        &lt;div&gt;
          &lt;input type="submit" value="Proses"&gt;
        &lt;/div&gt;
      &lt;/form&gt;
    &lt;/form&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p class="mb-0">Setelah membuat halaman <b><q>form.html</q></b> yang berisi form HTML, kita akan membuat halaman <b><q>proses.php</q></b> yang berisi kode PHP untuk menangani nilai dari form ini. Silahkan buat file <b><q>proses.php</q></b> dengan kode program sebagai berikut, dan simpanlah di dalam folder yang sama dengan <b><q>form.html</q></b>. Berikut adalah isi kode <b><q>proses.php</q></b>:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   echo "Nama lengkap anda adalah: {$_GET['nama']}";
   echo "&lt;br&gt;";
   echo "Alamat lengkap anda adalah: {$_GET['alamat']}";
?&gt;</code></pre>
              <p>Tampilan di atas adalah hasil dari 5 baris kode program PHP yang kita buat di dalam halaman <b><q>proses.php</q></b>. Untuk mengambil nilai form HTML, PHP menyediakan 2 buah variabel global yaitu variabel <b><q>$_GET</q></b> dan <b><q>$_POST</q></b>. Kita menggunakan variabel <b><q>$_GET</q></b> jika pada saat pembuatan form menggunakan atribut <code class="custom">method="GET"</code>, dan menggunakan variabel <b><q>$_POST</q></b> jika form dibuat dengan <code class="custom">method="POST"</code>.</p>
              <p class="mb-0">Kedua variabel ini sebenarnya adalah array, sehingga cara mengakses nilai dari form adalah dengan cara <b><q>$_GET['nama_objek_form']</q></b>. <b><q>nama_objek_form</q></b> adalah nilai dari atribut <b><q>name</q></b> di dalam form. Jika kita memiliki element dengan kode HTML <code class="custom">&lt;input type="text" name="nama"></code>, maka untuk mengakses nilainya adalah dengan <b><q>$_GET['nama']</q></b>, dan untuk element <code class="custom">&lt;input type="text" name="alamat"></code> diakses dengan nilai <b><q>$_GET['alamat']</q></b> atau untuk element <code class="custom">&lt;input type="number" name="umur"></code> diakses dengan nilai <b><q>$_GET['umur']</q></b>.</p>
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