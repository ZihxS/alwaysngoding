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
  $x = str_replace('Di Javascript','di JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/aturan-penulisan-kode-di-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Aturan Penulisan Tanda Semicolon pada Akhir Baris</h2>
            <hr>
            <div class="konten-teori">
              <p>Berbeda dari kebanyakan bahasa pemrograman, di dalam JavaScript karakter titik-koma (bahasa inggris: semicolon) sifatnya opsional untuk digunakan sebagai penanda akhir dari baris program, dan boleh tidak ditulis.</p>
              <p class="mb-0">JavaScript <q>mendeteksi</q> baris baru (karakter <q>break</q> atau jika kita menekan <q>enter</q> pada keyboard) sebagai penanda akhir baris program. Kode perintah berikut berjalan sebagaimana mestinya di dalam JavaScript:</p>
              <pre class="language-javascript"><code>var variabel_satu = "Halo"
var spasi = " "
var variabel_dua = "dunia!!!"
console.log(variabel_satu + spasi + variabel_dua)</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Perhatikan pada kode di atas. Kita tidak menggunakan tanda semicolon untuk menutup baris perintah JavaScript, tapi kode tersebut berjalan sukses tanpa mengeluarkan error sama sekali.</p>
              <p class="mb-2">Penggunaan tanda semicolon <b><q>;</q></b> walau bersifat opsional, namun sangat dianjurkan digunakan. Tanda semicolon akan membuat program lebih mudah dibaca dan tidak membuat ambigu seperti contoh diatas. Di dalam kelas JavaScript ini kita akan menggunakan tanda <b><q>;</q></b> pada setiap akhir baris kode.</p>
              <blockquote class="catatan-pelajaran">Pada kode yang ada di atas kita menggunakan variabel untuk menampung suatu nilai. Kalian akan mempelajarinya nanti, untuk saat ini bisa kalian hiraukan terlebih dahulu apa itu variabel.</blockquote>
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
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'javascript', 'modul_bagian' => 2, 'nama_modul' => 'Aturan Penulisan Kode di JavaScript'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>