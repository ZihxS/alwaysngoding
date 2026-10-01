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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/berkenalan-dengan-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Persiapan Tempur</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sebelum kita belajar atau berselancar lebih jauh, mari kita berkenalan terlebih dahulu dengan alat dan bahan untuk <b>menulis dan menampilkan kode HTML</b>.
              </p>
              <p>
                Pertama tama kita berkenalan dengan <b>text editor</b>, text editor adalah aplikasi yang bertujuan untuk <b>memudahkan dalam menulis kode bahasa pemrograman</b>. Kita bisa memanfaatkan text editor untuk <b>menghemat waktu juga tenaga</b>, khususnya untuk menulis kode html yang akan kita pelajari.
              </p>
              Berikut adalah beberapa text editor yang kami rekomendasikan untuk kalian pakai:
              <ol>
                <li>Visual Studio Code</li>
                <li>Sublime Text</li>
                <li>Atom</li>
                <li>Adobe Dreamweaver</li>
                <li>Komodo Edit</li>
                <li>Notepad++</li>
              </ol>
              <p>
                Tentunya masih banyak lagi text editor yang lain, sebenarnya kita memakai dan menulis kode html pada <b>notepad biasa saja sudah cukup</b>, tetapi jika kita akan menuliskan kode yang banyak maka akan memakan banyak waktu pula, karna itulah adanya text editor yang dikhususkan untuk para programmer, dengan fitur fitur yang cangih juga dukungan shortcut yang bertujuan untuk memudahkan para programmer.
              </p>
              <p>
                Jika kita sudah menulis kode html dan kita ingin melihat hasilnya, maka yang kita butuhkan adalah <b>web browser</b>. Web browser adalah sebuah aplikasi untuk menerima, menampilkan, dan menerjemahkan informasi dari world wide web, lalu dibuat dalam format <b>HTML</b>. Jadi jika kita sudah menulis kode html dan menyimpannya dengan ekstensi <q>.html</q> dan kita arahkan direktorinya ke file yang telah kita simpan di kolom url pada browser, maka browser akan <b>menerjemahkan dan menampilkan hasil</b> dari file yang terdapat kode html yang sudah kita tulis.
              </p>
              Contoh kode html:
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;Belajar HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p&gt;Hallo dunia!!!&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p>
                Kode di atas hanya contoh, kalian akan mengetahui fungsi-fungsinya di modul berikutnya. Tugas kalian sekarang hanya untuk mengetahui terlebih dahulu alat bahan untuk belajar html dan bagaimana cara menjalankan dan menampilkan kode html.
              </p>
              <p>
                Untuk menjalankan kode html dan menampilkan hasilnya, pertama tama kita buat folder terlebih dahulu, nama foldernya <q>Belajar HTML</q>, Kita simpan di drive <b>D</b> saja agar memudahkan untuk mengaksesnya. Lalu buka text editornya dan ketik kode seperti di atas, lalu simpan di folder yang sudah kita buat dengan nama filenya yaitu <q>belajar.html</q>.
              </p>
              <p>
                Lalu buka browser yang terdapat pada komputer kalian, boleh menggunakan <b>Google Chrome</b>, <b>Mozilla Firefox</b>, <b>Opera</b>, <b>Internet Explorer</b> dll. Tetapi kami sarankan untuk memakai web browser <strong>Google Chrome</strong> yang sangat banyak sekali penggunanya khususnya dikalangan pengembang website.
              </p>
              <p>
                Dan klik kanan file tersebut, <b>Open With > Google Chrome</b> (jika kalian menggunakan web browser google chrome) atau bisa kita arahkan direktori file yang telah kita buat di kolom url pada browser, seperti ini:
              </p>
              <blockquote class="catatan-pelajaran mb-3">
                file:///D:/Belajar Html/belajar.html
              </blockquote>
              <p>
                Peraturan penulisannya adalah didahulukan dengan <q>file:///</q> lalu diikuti dengan alamat (direktori) file html yang ingin kita jalankan dan kita lihat hasilnya.
              </p>
              <p>
                Untuk menjalankan dan melihat hasil kode html kita <b>tidak harus online</b>, offline pun kita bisa melihatnya.
              </p>
              <p class="m-0">
                Selamat mencoba dan semoga lancar.
              </p>
            </div>
          </div>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/teori/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php $this->load->view('belajar/markas/teori/tombol-selesai', NULL, FALSE); ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'html', 'modul_bagian' => 1, 'nama_modul' => 'Berkenalan Dengan HTML'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>