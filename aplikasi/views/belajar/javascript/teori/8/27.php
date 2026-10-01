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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Contoh Data Kompleks di JSON</h2>
            <hr>
            <div class="konten-teori">
              <p>JSON dapat menyimpan objek bersarang dan array bersarang.</p>
              <p class="mb-0">Contoh objek bersarang (pengguna.json):</p>
              <pre class="language-json line-numbers"><code>{
  "saleh": <mark class="keep">{</mark>
    "namaPengguna": "saleh12345",
    "alamat": "Bogor, Indonesia",
    "sedangAktif": true,
    "pengikut": 1300,
    "mengikuti": 200
  <mark class="keep">}</mark>,
  "Fajar": <mark class="keep">{</mark>
    "namaPengguna": "jar75",
    "alamat": "Jakarta, Indonesia",
    "sedangAktif": false,
    "pengikut": 150,
    "mengikuti": 350
  <mark class="keep">}</mark>,
  "suhaemi": <mark class="keep">{</mark>
    "namaPengguna": "ami30",
    "alamat": "Bekasi, Indonesia",
    "sedangAktif": true,
    "pengikut": 99,
    "mengikuti": 85
  <mark class="keep">}</mark>,
  "djakarsi": <mark class="keep">{</mark>
    "namaPengguna": "ahmad",
    "alamat": "Depok, Indonesia",
    "sedangAktif": false,
    "pengikut": 555,
    "mengikuti": 1276
  <mark class="keep">}</mark>
}</code></pre>
              <p>Pada contoh di atas, tanda kurung kurawal yang diberi tanda beserta isi-isinya bisa disebut objek JSON bersarang. Pada contoh di atas kita mempunyai 4 pengguna (saleh, Fajar, suhaemi, djakarsi).</p>
              <p>Data pada format JSON bisa menggunakan array JavaScript sebagai value. JavaScript menggunakan kurung siku <code class="custom">[]</code> di awal dan akhir sebuah array.</p>
              <p>Kita dapat menggunakan array saat bekerja dengan banyak data yang dapat dikelompokkan, seperti profil sosial media atau hobi yang dimiliki oleh seorang pengguna.</p>
              <p class="mb-0">Berikut contoh penggunaan array pada JSON (data_pengguna.json):</p>
              <pre class="language-json line-numbers"><code>{
  "namaDepan": "Saleh",
  "namaBelakang": "Solahudin",
  "alamat": "Bogor, Indonesia",
  "hobi": ["ngoding", "berenang"],
  "sosmed": [
    {
      "deskripsi": "twitter",
      "link": "https://twitter.com/msalehsolahudin"
    },
    {
      "deskripsi": "facebook",
      "link": "https://facebook.com/ZihxS"
    },
    {
      "deskripsi": "instagram",
      "link": "https://instagram.com/msalehsolahudin"
    }
  ]
}</code></pre>
              <p>Key <q>hobi</q> dan <q>sosmed</q> menggunakan array untuk menyimpan data. Pada contoh di atas data yang dimiliki Saleh berupa 2 hobi dan 3 sosial media yang datanya berupa array. Kita tahu bahwa data tersebut array karena ada kurung sikunya.</p>
              <p class="mb-2">Jika kalian ingin mendapatkan info lebih banyak dan rinci kalian bisa kunjungi webnya langsung: <a href="https://www.json.org/json-id.html" target="_blank">https://www.json.org/json-id.html</a> 😉</p>
              <blockquote class="catatan-pelajaran">Kita akan belajar lebih banyak tentang JSON dan contoh penggunaannya di modul selanjutnya 😉</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>