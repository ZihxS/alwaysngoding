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
            <h2 class="judul-teori">Kelemahan dan Kelebihan Metode GET dalam form PHP</h2>
            <hr>
            <div class="konten-teori">
              <p>Salah satu pertimbangan dasar dalam membuat dan memproses form PHP adalah <b>apakah form tersebut dikirim menggunakan method GET atau method POST</b>. Di bagian ini kita akan membahas dan mempelajari keunggulan dan kelemahan masing-masing metode pengiriman form ini.</p>
              <p>Kelemahan yang paling jelas jika kita menggunakan method GET adalah <b>nilai dari form dapat dilihat langsung di dalam URL yang dikirimkan</b>. Jika kalian membuat form untuk data-data yang sensitif seperti password, maka <b>form dengan method GET bukanlah pilihan yang tepat</b>.</p>
              <p>Form dengan <b>method GET disarankan untuk form yang berfungsi menampilkan data, yaitu dimana hasil isian form hanya digunakan untuk menampilkan data</b>, sesuai dengan arti kata get yang bisa berarti <b><q>ambil</q></b>. Sehingga method GET sebaiknya digunakan untuk form yang <b><q>mengambil</q></b> data dari database.</p>
              <p>Salah satu penggunaan method GET yang umum digunakan adalah <b>pada form pencarian</b> (form search). Dengan membuat hasil inputan form terlihat jelas dalam URL pengunjung web bisa dengan mudah menebak <b><q>alur kerja</q></b> dari situs kita. Bahkan pengunjung bisa membuat aplikasi pencarian sendiri dengan memanfaatkan fasilitas ini.</p>
              <p>Sebagai contoh, di dalam situs alwaysngoding, kotak input search di halaman lowongan kerja dibuat dengan method GET. Misalnya, kita ingin mencari seluruh lowongan kerja yang berkaitan dengan <b><q>Web Developer</q></b>, maka kita bisa mengetikkan kata <b><q>Web Developer</q></b>, kemudian tekan tombol enter di keyboard. Beberapa saat kemudian, hasil pencarian akan ditampilkan. Jika diperhatikan alamat URL pada web browser, akan berubah menjadi: <b><q>https://example.test/lowongan-kerja?pencarian=Web+Developer</q></b></p>
              <p>Setelah nama website <b><q>example.test</q></b> kita melihat karakter <b><q>?pencarian=Web+Developer</q></b>. Karakter-karakter ini adalah hasil format form dengan method GET. Tanda <b><q>?</q></b> menandakan awal nilai form, tanda <b><q>+</q></b> untuk menandakan spasi, dan ada juga tanda <b><q>&</q></b> untuk memisahkan objek form (jika objek form lebih dari 1). Dengan memanfaatkan keterangan ini, kita bisa melakukan pencarian hanya melalui URL secara langsung, tanpa harus mencari melalui form.</p>
              <p>Untuk contoh lainnya, kita memiliki file <b><q>proses.php</q></b> (pada bagian sebelumnya) yang berfungsi untuk memproses hasil form. Fleksibilitas yang diberikan oleh variabel <b><q>$_GET</q></b> membuat kita bisa menampilkan nilai dalam <b><q>proses.php</q></b> tanpa menggunakan form sama sekali.</p>
              <p>Kita bisa copy paste URL berikut ini kedalam address bar web browser (pastikan aplikasi XAMPP sudah berjalan dan file <b><q>proses.php</q></b> berada di dalam folder formulir) (seperti contoh sebelumnya): <b><q>http://localhost/formulir/proses.php?nama=Saleh&alamat=Bogor</q></b></p>
              <p class="mb-0">Jadi yang akan tercetak adalah nama <b><q>Saleh</q></b> dan alamat <b><q>Bogor</q></b>. Dari contoh ini kita bisa melihat bahwa PHP mendeteksi nilai dari <code class="custom">method="GET"</code>, hanya berdasarkan URL yang diberikan. Cara <b><q>mengakali</q></b> variabel <b><q>$_GET</q></b> tanpa form sering digunakan sebagai sarana untuk mengirim sebuah nilai dari satu halaman PHP ke halaman lainnya (sering digunakan untuk menampilkan pesan error kepada user).</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>