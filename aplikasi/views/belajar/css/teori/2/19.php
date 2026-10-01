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
  $x = str_replace('Html','HTML',str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3))))).' #'.$b;
  $u = 'belajar-css/teori/perpaduan-css-dengan-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Praktek Yuk!</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">
                Pertama-tama kalian <b><q>buat terlebih dahulu folder di local disk D:</q></b>. <b>Buat folder dengan nama <q>belajar css</q></b> (kecil semua). Lalu buat file bernama style dengan ekstensi .css <b><q>style.css</q></b> dan buat file bernama latihan dengan ekstensi .html <b><q>latihan.html</q></b> dan ketik atau copy-paste kode di bawah ini ke file style.css:
              </p>
              <pre class="language-css line-numbers"><code>body {
  background-color: antiquewhite;
  text-align: center;
  font-family: courier;
}
span {
  display: none;
}
h1 {
  color: red;
}
h2 {
  color: skyblue;
  text-decoration: underline;
}
h3 {
  color: green;
  font-style: italic;
}
marquee {
  text-transform: uppercase;
  font-weight: bold;
}</code></pre>
              <p class="m-0">Setelah sudah lalu ketik atau copy-paste kode di bawah ini ke file latihan.html:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding itu sangat asik...&lt;/title&gt;
    &lt;link rel="stylesheet" href="style.css"&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Hallo dunia!!&lt;/h1&gt;
    &lt;h2&gt;Saya sangat suka sekali dengan pemrograman!!&lt;/h2&gt;
    &lt;!-- cape pada element h3 tidak akan ditampilkan --&gt;
    &lt;h3&gt;Saya sangat &lt;span&gt;cape&lt;/span&gt; semangat untuk belajar pemrograman di Always Ngoding!!&lt;/h3&gt;
    &lt;marquee behavior="alternate" scrollamount="5"&gt;stay hungry! stay foolish! stay tired! stay thirsty!&lt;/marquee&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <p class="mb-2">
                Jika sudah selesai jangan lupa untuk di save lalu buka browser yang sering kalian pakai boleh menggunakan <b>Google Chrome</b>, <b>Mozilla Firefox</b>, <b>Opera</b>, <b>Internet Explorer</b> dll. Tetapi kami sarankan untuk memakai web browser <strong>Google Chrome</strong> yang sangat banyak sekali penggunanya khususnya dikalangan pengembang website. Lalu kalian arahkan ke direktori file yang telah kalian buat di kolom url pada browser, seperti ini:
              </p>
              <blockquote class="catatan-pelajaran mb-2">
                file:///D:/belajar css/latihan.html
              </blockquote>
              <p>
                Peraturan penulisannya adalah <b>didahulukan dengan <q>file:///</q></b> lalu diikuti dengan alamat (direktori) file html yang ingin kalian jalankan dan kalian lihat hasilnya. Untuk menjalankan dan melihat hasil kode html, kita <b>tidak harus online</b> (tidak harus terhubung dengan internet), offline pun kita bisa melihatnya.
              </p>
              <p class="mb-2">
                Setelah melihat hasilnya, coba hapus baris ke 6 di file <b><q>latihan.html</q></b> lalu refresh webnya dan lihatlah perbedaannya. Selamat mencoba 😄
              </p>
              <blockquote class="catatan-pelajaran">
                Shortcut untuk merefresh halaman web yaitu dengan menekan tombol <b><q>f5</q></b>, jika tampilan tidak berubah padahal kalian sudah mengubah kode CSS nya maka tekan <b><q>alt + f5</q></b>. Karena <b>kebanyakan browser men-cache file-file</b> seperti file html, file css, file javascript, dan lain-lain.
              </blockquote>
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
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'css', 'modul_bagian' => 2, 'nama_modul' => 'Perpaduan CSS dengan HTML'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>