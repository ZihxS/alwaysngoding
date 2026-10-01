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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/membuat-formulir-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Membuat Formulir Pada HTML</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sama seperti tabel, formulir berguna untuk website khususnya website <b>dinamis</b>. Kalau tabel berguna untuk menampilkan data-data nya, <strong>formulir berguna sebagai media untuk menginput dan memproses datanya</strong>.
              </p>
              <p class="m-0">Contoh formulir:</p>
              <ul>
                <li>Formulir untuk mengisi data diri.</li>
                <li>Formulir pendaftaran anggota.</li>
                <li>Formulir untuk masuk (Log In).</li>
                <li>Formulir lupa password.</li>
                <li>Formulir untuk kontak kami.</li>
                <li>Formulir untuk menambah artikel.</li>
                <li>Formulir untuk mengubah artikel.</li>
                <li>Dan lain lain.</li>
              </ul>
              <p>
                Sebelum kalian sampai sini pasti kalian tadi mengisi <b>formulir pendaftaran</b> atau <b>formulir untuk masuk</b> kan?
                <br>
                Nah seperti itulah kegunaan formulir pada website, tentu sangat akan sering dipakai.
              </p>
              <p class="mb-2">
                Pada modul ini kalian akan mempelajari cara membuat tampilan form (formulir) pada HTML, jadi persiapkan diri kalian dan juga <b>niatkan</b> terlebih dahulu untuk belajar lebih jauh 😄
              </p>
              <blockquote class="catatan-pelajaran">Kalian hanya mempelajari <b>tampilan</b> untuk formulirnya saja. <b>Untuk prosesnya nanti bisa di lanjutkan pada pelajaran PHP</b>, karena butuh syntax (kode) PHP untuk pemrosesan formulirnya dan juga butuh syntax (kode) MySQL untuk berintergrasi/mengintegrasikan dengan basis datanya (databasenya).</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>