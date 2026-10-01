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
            <h2 class="judul-teori">Memahami Fungsi Date Pada PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Fungsi terkait tanggal (date) merupakan fungsi yang sering digunakan ketika kita mengembangkan suatu aplikasi, terutama untuk aplikasi dinamis. Untuk itu, kita perlu memahami fungsi ini dengan benar. Fungsi date digunakan untuk menampilkan data tanggal sesuai dengan format yang diinginkan. Format penulisannya adalah sebagai berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  date(format_tanggal, timestamp);
?&gt;</code></pre>
              <p>Argumen kedua sifatnya opsional, jika tidak didefinisikan maka akan digunakan timestamp waktu sekarang (tanggal dan waktu pada komputer server ketika script dieksekusi).</p>
              <p class="mb-0">Argumen pertama berbentuk string (teks) yang diwakili oleh karakter tertentu yang mewakili tanggal dan waktu, sehingga jika string tersebut mengandung karakter tersebut, maka akan langsung diterjemahkan menjadi waktu, contoh:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  echo date('d-m-Y H:i:s'); // <?= date('d-m-Y H:i:s')."\n"; ?>
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Berikut adalah karakter-karakter yang akan diterjemahkan dalam fungsi <b><q>date()</q></b>:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="20%">Karakter</th>
                    <th>Keterangan</th>
                    <th>Contoh</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>d</td>
                    <td>Hari dalam sebulan, berbentuk 2 digit</td>
                    <td>01 s.d 31</td>
                  </tr>
                  <tr>
                    <td>j</td>
                    <td>Hari dalam sebulan, tanpa awalan 0</td>
                    <td>1 s.d 31</td>
                  </tr>
                  <tr>
                    <td>N</td>
                    <td>Hari dalam seminggu, dimulai dari 1</td>
                    <td>1 (Senin) s.d 7 (Minggu)</td>
                  </tr>
                  <tr>
                    <td>w</td>
                    <td>Hari dalam seminggu, dimulai dari 0</td>
                    <td>0 (Minggu) s.d 6 (Sabtu)</td>
                  </tr>
                  <tr>
                    <td>m</td>
                    <td>Bulan dalam angka, diawali 0</td>
                    <td>01 s.d 12</td>
                  </tr>
                  <tr>
                    <td>n</td>
                    <td>Bulan dalam angka, tanpa awalan 0</td>
                    <td>1 s.d 12</td>
                  </tr>
                  <tr>
                    <td>M</td>
                    <td>Nama bulan dalam tiga karakter (dalam bahasa Inggris)</td>
                    <td>Jan s.d Dec</td>
                  </tr>
                  <tr>
                    <td>Y</td>
                    <td>4 Digit Tahun</td>
                    <td>2016</td>
                  </tr>
                  <tr>
                    <td>y</td>
                    <td>2 Digit Tahun</td>
                    <td>16</td>
                  </tr>
                  <tr>
                    <td>H</td>
                    <td>Jam dengan format 24-jam, dengan awalan 0 (dua digit jam)</td>
                    <td>00 s.d 23</td>
                  </tr>
                  <tr>
                    <td>G</td>
                    <td>Jam dengan format 24-jam, tanpa awalan 0</td>
                    <td>0 s.d 23</td>
                  </tr>
                  <tr>
                    <td>i</td>
                    <td>Menit dengan awalan 0 (dua digit menit)</td>
                    <td>00 s.d 59</td>
                  </tr>
                  <tr>
                    <td>s</td>
                    <td>Detik dengan awalan 0 (dua digit detik)</td>
                    <td>00 s.d 59</td>
                  </tr>
                </tbody>
              </table>
              <p>Tabel di atas hanya menampilkan karakter yang sering digunakan. Format tanggal dan waktu dibuat mengikuti standar Amerika, seperti penggunaan nama hari, nama bulan, penggunaan AM juga PM, dll. Sehingga, bagi kita yang tinggal di Indonesia, cukup menghafalkan tabel di atas. Jika ingin melihat daftar lengkap karakter date, silahkan kalian <a href="http://php.net/manual/en/function.date.php" target="_blank">klik di sini</a>.</p>
              <p class="mb-0">Timestamp merupakan <b>suatu istilah yang merujuk pada waktu dengan format unix timestamp</b></p>. Format ini <b>mendefinisikan waktu berdasarkan detik yang mengacu pada waktu tertentu</b>, yaitu <b><q>01-01-1970 00:00:00</q></b>, dengan zona waktu GMT+0. Dengan demikian, nilai 1 pada timestamp berarti satu detik sejak <b><q>01-01-1970 00:00:00</q></b> atau <b><q>01-01-1970 00:00:01</q></b>, perhatikan contoh berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  echo strtotime("1970-01-01 00:00:01"); // 1
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Jika dibalik, yaitu dengan mengisikan angka 1 pada argumen ke dua dari fungsi <b><q>date()</q></b>, maka akan memperoleh hasil yang sama, yaitu <b><q>1970-01-01</q></b>, lihat contoh berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  echo date('Y-m-d', 1); // 1970-01-01
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Penting diperhatikan bahwa secara default, zona waktu timestamp adalah GMT+0 atau zona waktu sesuai dengan yang didefinisikan pada file konfigurasi <b><q>php.ini</q></b>. Sedangkan kita, di Indonesia menggunakan zona waktu GMT+7, perbedaan zona waktu ini pada jam tertentu akan mengakibatkan perbedaan tanggal. Misal, ketika fungsi date di jalankan pada pukul 00:01 dini hari s.d pukul 06.00 pagi, maka hasil yang diperoleh masih tanggal kemarin. Untuk mengatasi hal tersebut, kita perlu mengatur zona waktu menjadi <b><q>Asia/Jakarta</q></b>. Terdapat beberapa cara untuk melakukannya, diantaranya mendefinisikan zona waktu dengan fungsi <b><q>date_default_timezone_set()</q></b> dan melalui setting pada file <b><q>php.ini</q></b>.</p>
              <p class="mb-0">Contoh pendefinisian melalui fungsi <b><q>date_default_timezone_set()</q></b> adalah sebagai berikut:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
  echo 'Default Timezone: '.date('d-m-Y H:i:s');
  echo '&lt;hr&gt;';
  date_default_timezone_set('Asia/Jakarta');
  echo 'Indonesian Timezone: '.date('d-m-Y H:i:s');
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/8/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Fungsi <b><q>strtotime()</q></b> (string to time) pada PHP digunakan untuk menghasilkan waktu tertentu dengan format timestamp. Untuk lebih lengkap dan jelasnya silahkan kalian <a href="https://www.w3schools.com/php/func_date_strtotime.asp" target="_blank">klik di sini</a>.</p>
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