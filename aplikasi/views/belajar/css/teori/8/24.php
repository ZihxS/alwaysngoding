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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/lebih-banyak-tentang-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
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
            <h2 class="judul-teori">Minifikasi File CSS</h2>
            <hr>
            <div class="konten-teori">
            <p>Minify adalah <b>istilah pemrograman yang artinya adalah proses menghilangkan karakter yang tidak diperlukan dalam kode untuk dieksekusi</b>. Melakukan minify code <b>akan mempercepat kecepatan loading website</b> kalian, efeknya pengunjung kalian akan senang begitu juga dengan mesin pencari.</p>
            <p>Singkatnya, proses ini akan menghapus semua karakter white space, baris baru, komentar & delimiter dari kode kalian. Tipe karakter ini digunakan agar kode kalian bisa mudah dibaca, namun sebenarnya tidak terlalu dibutuhkan dan tidak dieksekusi oleh kode. Sehingga, <b>proses minify ini mampu meningkatkan kecepatan download, parsing dan waktu eksekusi website kalian</b>.</p>
            <p class="m-0">Berikut adalah contoh kode-kode CSS yang telah diminifikasi (CSS Minify):</p>
            <ul>
              <li><a href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" target="_blank">https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css</a></li>
              <li><a href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" target="_blank">https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css</a></li>
              <li><a href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" target="_blank">https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css</a></li>
              <li><a href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" target="_blank">https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css</a></li>
            </ul>
            <blockquote class="catatan-pelajaran mb-2">CSS Minify hanya beberapa baris saja. Coba kalian copy dan paste kode-kode pada link di atas ke text editor kalian. Dan hitung jumlah line atau baris pada masing-masing kode yang sudah kalian copy paste.</blockquote>
            <blockquote class="catatan-pelajaran">Umumnya file CSS yang sudah di minify diberi ekstensi <q>.min.css</q>. Tetapi hal berikut tidak wajib karena dengan ekstensi <q>.css</q> saja sudah cukup dan berjalan lancar. Ekstensi <q>.min.css</q> hanya sebagai penanda bahwa file tersebut adalah file CSS Minify.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>