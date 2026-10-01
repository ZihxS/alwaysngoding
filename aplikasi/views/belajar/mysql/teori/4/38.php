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
  $p = $b-1; // Sebelumnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Create Read Update Delete Mysql','CRUD MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/create-read-update-delete-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'mysql', 'label' => 'Teori MySQL', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-mysql">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Kesimpulan CRUD</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Tanpa terasa, kalian sudah mempelajari apa itu CRUD (Create, Read, Update, Delete). Dan kalian bisa list kesimpulannya sebagai berikut:</p>
              <ul>
                <li><big><b>C</b></big>reate (Membuat atau Menambah data) <b>>>></b> Perintah SQL nya adalah <b>"INSERT ..."</b>.</li>
                <li><big><b>R</b></big>ead (Mengambil atau Membaca data) <b>>>></b> Perintah SQL nya adalah <b>"SELECT ..."</b>.</li>
                <li><big><b>U</b></big>pdate (Mengubah atau Memperbaharui data) <b>>>></b> Perintah SQL nya adalah <b>"UPDATE ..."</b>.</li>
                <li><big><b>D</b></big>elete (Menghapus data) <b>>>></b> Perintah SQL nya adalah:</li>
                <ul>
                  <li><b>"DELETE ...."</b>.</li>
                  <li><b>"TRUNCATE ..."</b> (khusus untuk menghapus semua data).</li>
                </ul>
              </ul>
              <p class="mb-2">Kalian bisa mengembangkan atau berkreasi (mengotak-atik) mengenai perintah-perintah SQL untuk CRUD yang telah kalian pelajari. Dibagian selanjutnya kalian akan mempelajari cara menggabungkan tabel pada MySQL (join tabel).</p>
              <blockquote class="catatan-pelajaran">Jangan lupa untuk selalu bersyukur, dan jangan lupa istirahatyaa, jangan terlalu di forsir jika sudah sangat lelah atau sangat ngantuk 😄</blockquote>
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
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'mysql', 'modul_bagian' => 4, 'nama_modul' => 'Create Read Update Delete Mysql'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>