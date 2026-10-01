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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/berkenalan-dengan-html';
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
            <h2 class="judul-teori">Sejarah HTML</h2>
            <hr>
            <div class="konten-teori">
              <p>
                <b>Pada tahun 1980</b> seorang ahli fisika, <b>Tim Berners-Lee</b>, dan juga seorang kontraktor di <b>CERN (Organisasi Eropa untuk Riset Nuklir)</b> mengusulkan dan menyusun ENQUIRE, sebuah sistem untuk ilmuwan CERN dalam membagi dokumen. Sembilan tahun kemudian, Berners-Lee mengusulkan adanya sistem markah berbasis internet.
              </p>
              <p>
                Berners-Lee menspesifikasikan HTML dan menulis jaringan beserta perangkat lunaknya di akhir 1990. Pada tahun yang sama, Berners-Lee dan Robert Cailliau, insinyur sistem data CERN berkolaborasi dalam sebuah permintaan untuk pendanaan, namun tidak diterima secara resmi oleh CERN.
              </p>
              <p>
                Di catatan pribadinya sejak 1990 dia mendaftar beberapa dari banyak daerah yang menggunakan hypertext dan pertama-tama menempatkan sebuah ensiklopedia.
              </p>
              <p>
                Penjelasan pertama yang dibagi untuk umum dari HTML adalah sebuah dokumen yang disebut <b>Tanda HTML</b>, pertama kali disebutkan di Internet oleh Tim Berners-Lee pada akhir 1991.
              </p>
              <p>
                Tanda ini menggambarkan <b>18 element awal mula</b>, versi sederhana dari HTML. Kecuali untuk tag hyperlink, yang sangat dipengaruhi oleh SGMLguid, in-house Standard Generalized Markup Language (SGML) berbasis format dokumen di CERN. Sebelas element ini masih ada di HTML 4.
              </p>
              <p>
                HTML adalah bahasa markah yang digunakan peramban untuk <b>menafsirkan dan menulis</b> teks, gambar dan bahan lainnya ke dalam halaman web secara visual maupun suara.
              </p>
              <p>
                Karakteristik dasar untuk setiap item dari markah HTML didefinisikan di dalam peramban, dan karakteristik ini dapat diubah atau ditingkatkan dengan menggunakan tambahan halaman web desainer <b>CSS</b>.
              </p>
              <p>
                Banyak element teks ditemukan di laporan teknis ISO pada tahun 1988 TR 9537 Teknik untuk menggunakan SGML, yang pada gilirannya meliputi fitur bahasa format teks awal seperti yang digunakan oleh komandan RUNOFF dikembangkan pada awal <b>1960-an</b> untuk sistem operasi, perintah-perintah format ini berasal dari perintah yang digunakan oleh pengetik untuk memformat dokumen CTSS secara manual.
              </p>
              <p class="m-0">
                Namun, konsep SGML dari markah umum didasarkan pada unsur-unsur daripada hanya efek cetak, dengan pemisahan struktur dan markah HTML telah semakin bergerak ke arah ini dengan <b>CSS</b>.
              </p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 1], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>