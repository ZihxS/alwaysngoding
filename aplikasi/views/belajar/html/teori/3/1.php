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
  $u = 'belajar-html/teori/struktur-dasar-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Struktur Dasar HTML</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-0">Struktur dasar untuk membangun suatu dokumen html yaitu harus memiliki:</p>
              <ul>
                <li><!-- Mendefinisikan tipe dokumen,  --><b><q>&lt;!DOCTYPE html&gt;</q></b> untuk mendefinisikan tipe html 5 (terbaru).</li>
                <li>Tag <b><q>html</q></b>.</li>
                <li>Tag <b><q>head</q></b> yang posisi nya di <!-- antara -->dalam tag <b><q>html</q></b>.</li>
                <li>Tag <b><q>title</q></b> yang posisi nya di <!-- antara -->dalam tag <b><q>head</q></b>.</li>
                <li>Tag <b><q>body</q></b> yang posisi nya di <!-- antara -->dalam tag <b><q>html</q></b> setelah tag <b><q>head</q></b>.</li>
              </ul>
              <p class="m-0">Jadi akan seperti kode di bawah ini:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;Belajar HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;!-- Awal konten (isi html) --&gt;
    &lt;p&gt;Stay Hungry!!! Stay Foolish!!!&lt;/p&gt;
    &lt;!-- Akhir konten (isi html) --&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>
                Sebenarnya walau tidak mendefinisikan tipe dokumen akan tetap tampak baik-baik saja. Tetapi jika kalian sudah mencampurkan (memanipulasi) kode HTML dengan kode CSS untuk mendesain web, maka web yang kalian buat tidak akan sempurna. Karena <b>web browser akan memaksimalkan hasil kode HTML kalian jika kalian mendefinisikan tipe dokumen HTML nya</b>.
              </p>
              <blockquote class="catatan-pelajaran mb-2">
                Ingat! kita harus menuliskan konten (isi) website kita di antara tag <b><q>body</q></b>, untuk mengingatnya kembali silahkan menuju link ini: <a href="<?= site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/2'); ?>" target="_blank">Tag Dan Atribut Pada HTML</a>
              </blockquote>
              <blockquote class="catatan-pelajaran mb-2">
                Kode di atas terdapat komentar <b><q>&lt;!-- --&gt;</q></b>, fungsi komentar adalah <b>media informasi untuk tim</b> (apabila mengerjakan projek dengan tim), bisa juga informasi untuk kalian sendiri, misalkan kalian mendefinisikan komentar untuk menginformasikan kegunaan bagian penting dan misalkan projek kalian terbengkalai beberapa hari atau minggu atau bulan, tentu dengan bantuan komentar yang didefinisikan tadi akan <b>memudahkan kalian untuk mengingat lagi bagian penting</b> tersebut untuk apa (berguna sebagai pengingat atau catatan).
              </blockquote>
              <blockquote class="catatan-pelajaran">
                Komentar <b>tidak akan ditampilkan di tampilan browser</b>, komentar hanya ditampilkan sebagai <b>media di text editor saja</b>.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>