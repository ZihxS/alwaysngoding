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
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">CSS Vendor Prefixes</h2>
            <hr>
            <div class="konten-teori">
              <p>Vendor prefixes adalah <b>sebutan untuk penambahan beberapa karakter khusus di awal penulisan property</b>, terutama untuk property <b>CSS3</b> terbaru.</p>
              <p>Seiring dengan pesatnya perkembangan CSS3, web browser seolah-olah <b>berlomba untuk mengimplementasikan berbagai property baru yang belum resmi disetujui badan standarisasi web: W3C</b>. Dalam istilah W3C, property yang belum standar ini bisanya berada dalam <b>status draft</b>, dan <b>bisa berubah sewaktu-waktu</b>.</p>
              <p>Property yang belum <q>selesai</q> ini diimplementasikan oleh web browser <b>menggunakan vendor prefixes</b>. Dengan tujuan, property ini <b>bisa diuji coba</b> oleh programmer web di seluruh dunia.</p>
              <p>Pada awalnya, property dengan vendor prefixes tidak ditujukan untuk website live, tapi hanya untuk uji coba. Ketika spesifikasi W3C masuk ke tahap rekomendasi (yaitu ketika property tersebut sudah dianggap selesai), tambahan vendor prefixes juga akan dihapus.</p>
              <p>Masalahnya, <b>banyak web developer yang tidak sabar menunggu property resmi dirilis dan memilih untuk langsung menggunakannya</b>. Oleh karena itu, jika kalian ingin menggunakan property CSS3 yang masih baru harus dibuat menggunakan vendor prefixes.</p>
              <p class="mb-0">Cara penulisan vendor prefixes adalah vendor prefixes ditambahkan di awal penulisan property, sesuai dengan inisial web browser. Berikut adalah awalan vendor prefixes pada web browser:</p>
              <ul class="m-0">
                <li>-webkit- (Chrome, dan versi terbaru dari Opera)</li>
                <li>-moz- (Firefox)</li>
                <li>-o- (Opera versi lama)</li>
                <li>-ms- (Internet Explorer / Microsoft)</li>
              </ul>
              <pre class="language-css line-numbers"><code>div {
  -webkit-column-count: 3;
  -moz-column-count: 3;
  -o-column-count: 3;
  -ms-column-count: 3;
  column-count: 3;
}</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Property <b>column-count digunakan untuk membuat kolom koran</b> (multiple column). Sayangnya property ini <b>belum menjadi standar resmi</b>, sehingga belum didukung penuh oleh web browser (pada saat teori ini ditulis). Karena itu <b>kalian harus menulisnya dengan penambahan vendor prefixes</b>.</p>
              <p>Pada baris terakhir terdapat penulisan property <q>resmi</q>, yakni <b>tanpa vendor prefixes</b>. Ini dipersiapkan agar ketika property tersebut sudah dinyatakan stabil (sudah didukung penuh), nilai dari property ini akan menimpa efek sebelumnya (yang menggunakan vendor prefixes). Dengan demikian, <b>hasil yang di dapat akan seragam</b> pada setiap web browser.</p>
              <p class="mb-0">Penambahan property dengan vendor prefixes memang <b>sedikit merepotkan</b>. Kode CSS kalian bisa menjadi <b>5 kali lebih panjang</b>, namun ini hanya digunakan untuk property <b>CSS3 yang relatif baru</b>. Jika property tersebut sudah selesai, kalian bisa <q>membuang</q> bagian vendor prefixes dan menggunakan nama property resmi.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>