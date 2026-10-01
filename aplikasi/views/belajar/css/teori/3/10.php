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
  $x = ucwords(str_replace('-',' ',$this->uri->segment(3))).' #'.$b;
  $u = 'belajar-css/teori/bekerja-dengan-text';
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
            <h2 class="judul-teori">Property font-family Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Property ini berguna <b>untuk mengubah gaya text atau font</b> (beda dengan font-style) pada halaman website kalian. Property ini sangat berguna untuk meningkatkan pengalaman pengguna (user) pada halaman website kalian. Hambar rasanya jika kalian hanya memakai satu font pada website kalian.
              </p>
              <p class="m-0">Berikut adalah contoh penggunaan property font-family pada CSS:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar property font-family pada CSS&lt;/title&gt;
    &lt;style&gt;
      .font-arial {
        font-family: arial;
      }
      .font-sans-serif {
        font-family: sans-serif;
      }
      .font-courier {
        font-family: courier;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="font-arial"&gt;Gaya text atau font pada kalimat ini adalah arial loh!&lt;/p&gt;
    &lt;p class="font-sans-serif"&gt;Gaya text atau font pada kalimat ini adalah sans-serif loh!&lt;/p&gt;
    &lt;p class="font-courier"&gt;Gaya text atau font pada kalimat ini adalah courier loh!&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Kalian juga bisa menyiapkan beberapa gaya font (tidak terbatas) pada property font-family sebagai berikut:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar property font-family pada CSS&lt;/title&gt;
    &lt;style&gt;
      .font-modifikasi {
        font-family: consolas, monospace, arial, verdana, sans-serif;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="font-modifikasi"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, porro!&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Jadi fungsi kalian menyiapkan beberapa gaya font pada property font-family adalah jika font tidak terdaftar di komputer atau di website kalian, maka <b>kalian bisa menampilkan atau membackup dengan font lain yang kalian inginkan</b>.</p>
              <p class="mb-2">Kode di atas pada class <b><q>font-modifikasi</q></b> akan mencari gaya font consolas, jika tidak terdaftar maka akan mencari gaya font monospace, jika tidak ada juga akan dicari sampai ada gaya font yang terdaftar. Jika tidak ada sama sekali gaya font yang kalian cantumkan, maka akan ditampilkan dengan gaya default.</p>
              <blockquote class="catatan-pelajaran">
                Jika gaya font mengandung spasi, maka kalian harus menulisnya dengan cara diapit oleh <code class="custom">""</code> (font-family: "Roboto Condensed").
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 3], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>