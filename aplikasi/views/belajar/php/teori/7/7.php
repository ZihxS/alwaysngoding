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
            <h2 class="judul-teori">Mengelola Cookie Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Cookie merupakan <b>tempat menyimpan data yang disimpan di dalam browser user</b> dan data tersebut <b>dapat kalian simpan dalam rentang waktu yang kalian inginkan</b>. Karena data disimpan di browser user, maka user dapat melihat data cookie dan bisa merubah nilai dari cookie tersebut. Maka dari itu sebaiknya jangan menyimpan data-data sensitif atau data-data penting di dalam cookie.</p>
              <p class="mb-0">Untuk membuat cookie dalam PHP kalian cukup menuliskan function <b><q>setcookie()</q></b>, function <b><q>setcookie()</q></b> ini memerlukan 3 buah argumen yaitu nama cookie, nilai cookie, dan waktu expire. Untuk waktu expire bisa kalian atur misalnya 1 hari, 1 minggu, 1 bulan, atau beberapa bulan kedepan. Pengaturan waktu tersebut bisa sesuai kebutuhan kalian. Agar lebih jelas silahkan lihat contoh kode membuat cookie di PHP di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
setcookie('nama', 'Muhammad Saleh Solahudin', strtotime('+7 days'));
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p>Apabila kode tersebut dijalankan maka hanya terlihat halaman kosong, namun sudah menyimpan cookie <b><q>nama</q></b> di browser dengan value <b><q>Muhammad Saleh Solahudin</q></b> yang mempunyai waktu kadaluarsanya 7 hari kedepan. Untuk melihat nilai cookie tersebut kalian dapat menggunakan fitur <b><q>inspect element</q></b> pada browser kalian kemudian pilih <b><q>tab Application</q></b> dan cari <b><q>Cookies</q></b>.</p>
              <p class="mb-0">Cara menggunakan cookie di PHP kalian bisa menggunakan variabel superglobal <b><q>$_COOKIE</q></b>. Caranya sama persis dengan cara penggunaan session. Perhatikan kode di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
echo $_COOKIE['nama'];
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-0">Untuk menghapus cookie pada PHP selain menunggu melewati batasan waktu expire kalian juga bisa menghapusnya manual. Untuk menghapusnya kalian bisa menggunakan sedikit trik yaitu seperti membuat cookie dengan nama yang sama namun dengan waktu yang sudah expire. Misalnya, pada kode sebelumnya kalian membuat cookie dengan perintah <code class="custom">setcookie("nama_user", "Muhammad Saleh Solahudin", strtotime('+7 days'));</code>, maka untuk menghapusnya kalian bisa ubah waktu kadaluarsanya. Jadi perintah untuk menghapus cookie menjadi <code class="custom">setcookie("nama", "Muhammad Saleh Solahudin", time()-1);</code>. Perhatikan kode di bawah ini:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
setcookie('nama', 'Muhammad Saleh Solahudin', time()-1);
?&gt;</code></pre>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian coba langsung di PC kalianyaa, di XAMPP atau apapun itu yaa untuk menjalankan kode di atas 😄</blockquote>
              <p class="mb-2">Maksud dari argumen <b><q>time()-1</q></b> di atas adalah gabungan dari method <b><q>time()</q></b> yang digunakan untuk menghasilkan waktu sekarang, kemudian -1 yang berarti waktu sekarang dikurang 1 detik.</p>
              <blockquote class="catatan-pelajaran mb-2">Silahkan kalian pahami kegunaan method <b><q>strtotime()</q></b> (<a href="https://www.php.net/manual/en/function.strtotime.php" target="_blank">klik disini</a>) dan kegunaan method <b><q>time()</q></b> (<a href="https://www.php.net/manual/en/function.time.php">klik disini</a>) untuk bisa lebih memahami penjelasan di atas.</blockquote>
              <blockquote class="catatan-pelajaran">Sebenarnya cookie mempunyai 7 argumen (key, value, expire time, path, domain, secure dan httponly), tetapi hanya dengan 3 argumen saja kalian sudah bisa membuat cookie untuk website kalian.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 7], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>