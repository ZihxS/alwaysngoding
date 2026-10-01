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
  $u = 'belajar-html/teori/membuat-formulir-pada-html';
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
            <h2 class="judul-teori">Tag Label Untuk Tag Input</h2>
            <hr>
            <div class="konten-teori">
              <p>
                <strong>Tag <q>label</q> ini berguna untuk menandakan suatu inputan</strong>, caranya dengan mengarahkan <b><q>id</q></b> inputan di atribut <strong><q>for</q></strong> pada tag label.
              </p>
              <p>
                Tentunya jika sebatas menuliskan <code>&lt;label&gt;&lt;/label&gt;</code> tidak akan berpengaruh apa-apa, oleh sebab itu ada atribut <strong><q>for</q></strong> pada tag label. Isi atribut <strong><q>for</q></strong> pada tag label harus sesuai (sama) dengan isi atribut <strong><q>id</q></strong> pada inputan yang ingin ditandai.
              </p>
              <p class="m-0">Contoh penggunaan label untuk inputan:</p>
              <pre class="language-html line-numbers"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;!-- Contoh penulisan pertama --&gt;
  &lt;label <mark class="keep">for="nama"</mark>&gt;Nama:&lt;/label&gt;
  &lt;input type="text" <mark class="keep">id="nama"</mark> name="nama"&gt;

  &lt;!-- Contoh penulisan kedua --&gt;
  &lt;label <mark class="keep">for="alamat"</mark>&gt;
    Alamat:
    &lt;input type="text" <mark class="keep">id="alamat"</mark> name="alamat"&gt;
  &lt;/label&gt;

  &lt;!-- Contoh penulisan ketiga --&gt;
  Pilih jenis kelamin:
  &lt;input <mark class="keep">id="laki-laki"</mark> type="radio" name="jenis_kelamin" value="Laki-laki"&gt; &lt;label <mark class="keep">for="laki-laki"</mark>&gt;Laki-laki&lt;/label&gt;
  &lt;input <mark class="keep">id="perempuan"</mark> type="radio" name="jenis_kelamin" value="Perempuan"&gt; &lt;label <mark class="keep">for="perempuan"</mark>&gt;Perempuan&lt;/label&gt;
&lt;/form&gt;</code></pre>
              <p class="m-0">Contoh label yang tidak memakai atribut for:</p>
              <pre class="language-html line-numbers"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;div&gt;
    &lt;label&gt;Nama:&lt;/label&gt;
    &lt;input type="text" id="nama" name="nama"&gt;
  &lt;/div&gt;
  &lt;div&gt;
    Pilih jenis kelamin:
    &lt;input id="laki-laki" type="radio" name="jenis_kelamin" value="Laki-laki"&gt; &lt;label&gt;Laki-laki&lt;/label&gt;
    &lt;input id="perempuan" type="radio" name="jenis_kelamin" value="Perempuan"&gt; &lt;label&gt;Perempuan&lt;/label&gt;
  &lt;/div&gt;
  &lt;div&gt;
    Hobi anda:
    &lt;input id="bola" type="checkbox" name="hobi" value="Bermain Sepak Bola"&gt; &lt;label&gt;Bermain Sepak Bola&lt;/label&gt;
    &lt;input id="basket" type="checkbox" name="hobi" value="Bermain Basket"&gt; &lt;label&gt;Bermain Basket&lt;/label&gt;
    &lt;input id="berenang" type="checkbox" name="hobi" value="Berenang"&gt; &lt;label&gt;Berenang&lt;/label&gt;
    &lt;input id="coding" type="checkbox" name="hobi" value="Coding"&gt; &lt;label&gt;Coding&lt;/label&gt;
  &lt;/div&gt;
  &lt;input type="submit" name="proses" value="Proses"&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Contoh label yang memakai atribut for:</p>
              <pre class="language-html line-numbers"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;div&gt;
    &lt;label <mark class="keep">for="nama"</mark>&gt;Nama:&lt;/label&gt;
    &lt;input type="text" <mark class="keep">id="nama"</mark> name="nama"&gt;
  &lt;/div&gt;
  &lt;div&gt;
    Pilih jenis kelamin:
    &lt;input <mark class="keep">id="laki-laki"</mark> type="radio" name="jenis_kelamin" value="Laki-laki"&gt; &lt;label <mark class="keep">for="laki-laki"</mark>&gt;Laki-laki&lt;/label&gt;
    &lt;input <mark class="keep">id="perempuan"</mark> type="radio" name="jenis_kelamin" value="Perempuan"&gt; &lt;label <mark class="keep">for="perempuan"</mark>&gt;Perempuan&lt;/label&gt;
  &lt;/div&gt;
  &lt;div&gt;
    Hobi anda:
    &lt;input <mark class="keep">id="bola"</mark> type="checkbox" name="hobi" value="Bermain Sepak Bola"&gt; &lt;label <mark class="keep">for="bola"</mark>&gt;Bermain Sepak Bola&lt;/label&gt;
    &lt;input <mark class="keep">id="basket"</mark> type="checkbox" name="hobi" value="Bermain Basket"&gt; &lt;label <mark class="keep">for="basket"</mark>&gt;Bermain Basket&lt;/label&gt;
    &lt;input <mark class="keep">id="berenang"</mark> type="checkbox" name="hobi" value="Berenang"&gt; &lt;label <mark class="keep">for="berenang"</mark>&gt;Berenang&lt;/label&gt;
    &lt;input <mark class="keep">id="coding"</mark> type="checkbox" name="hobi" value="Coding"&gt; &lt;label <mark class="keep">for="coding"</mark>&gt;Coding&lt;/label&gt;
  &lt;/div&gt;
  &lt;input type="submit" name="proses" value="Proses"&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">
                Sudah tau perbedaannya belum?, kalau belum tau coba kalian klik text yang diselimuti tag label pada kedua contoh di atas.
                <br>
                Nah jadi tag label <b>sangat berguna untuk tag input</b>. Selain untuk menandai bisa juga untuk memberikan kemudahan bagi user.
              </p>
              <blockquote class="catatan-pelajaran">Jika tag label ditujukan untuk inputan semacam text, maka efeknya akan menjadi fokus ke inputannya. Jika ditujukan untuk input type radio atau checkbox maka inputan yang ditujukan akan tercentang.</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>