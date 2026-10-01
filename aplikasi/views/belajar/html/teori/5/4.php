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
            <h2 class="judul-teori">Input Type Radio dan Checkbox</h2>
            <hr>
            <div class="konten-teori">
              <p>
                <b>Input type <q>radio</q> berguna untuk memilih pilihan seperti pilihan ganda</b> (hanya bisa memilih satu pilihan dari beberapa pilihan yang dibuat). Input type <b><q>checkbox</q></b> juga sama seperti type <b><q>radio</q></b>, namun kalau <b><q>checkbox</q></b> misalnya kalian mempunyai 4 pilihan, nah semuanya <b>bisa dipilih atau di centang oleh kalian</b>.
              </p>
              <p class="m-0">Contoh formulir dengan input type <b><q>radio</q></b>:</p>
              <pre class="language-html line-numbers" data-line="3-4"><code>&lt;form action="cek_jenis_kelamin.php" method="POST"&gt;
  Pilih jenis kelamin:
  &lt;input type="radio" name="jenis_kelamin" value="Laki-laki"&gt; Laki-laki
  &lt;input type="radio" name="jenis_kelamin" value="Perempuan"&gt; Perempuan
  &lt;input type="submit" name="kirim" value="Oke"&gt;
&lt;/form&gt;</code></pre>
             <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Contoh formulir dengan input type <b><q>checkbox</q></b>:</p>
              <pre class="language-html line-numbers" data-line="3-6"><code>&lt;form action="cek_hobi.php" method="POST"&gt;
  Hobi anda:
  &lt;input type="checkbox" name="hobi" value="Bermain Sepak Bola"&gt; Bermain Sepak Bola
  &lt;input type="checkbox" name="hobi" value="Bermain Basket"&gt; Bermain Basket
  &lt;input type="checkbox" name="hobi" value="Berenang"&gt; Berenang
  &lt;input type="checkbox" name="hobi" value="Coding"&gt; Coding
  &lt;input type="submit" name="kirim" value="Oke"&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>
                Coba kalian perhatikan kodenya dan lihat hasilnya. Keduanya sangat berbeda, di input type radio kalian hanya bisa memilih <b>salah satu</b> yaitu perempuan atau laki-laki (tidak bisa keduanya). Tetapi pada input type checkbox kalian bisa memilih <b>lebih dari satu</b> hobi.
              </p>
              <blockquote class="catatan-pelajaran mb-3">Perlu di ingat, jika kalian memiliki pilihan baik itu type <b><q>radio</q></b> atau <b><q>checkbox</q></b> pastikan menu pilihan itu <b><q>name</q></b> (nama) nya sama pada atribut inputannya, seperti contoh di atas. Menu pilihan jenis kelamin atribut <b><q>name</q></b> nya <b><q>jenis_kelamin</q></b> dan menu pilihan hobi <b><q>name</q></b> nya <b><q>hobi</q></b>.</blockquote>
              <p>
                Jika kalian ingin membuat banyak pilihan (lebih dari satu) pada satu form (formulir), maka setiap menu pilihan atribut <b><q>name</q></b> nya harus berbeda.
              </p>
              <p class="m-0">Perhatikan contoh kode ini:</p>
              <pre class="language-html line-numbers" data-line="4-7,11-13,17-18,22-25"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;div&gt;
    Makanan kesukaan anda:
    &lt;input type="checkbox" name="makanan_kesukaan" value="Tahu"&gt; Tahu
    &lt;input type="checkbox" name="makanan_kesukaan" value="Tempe"&gt; Tempe
    &lt;input type="checkbox" name="makanan_kesukaan" value="Jengkol"&gt; Jengkol
    &lt;input type="checkbox" name="makanan_kesukaan" value="Rendang"&gt; Rendang
  &lt;/div&gt;
  &lt;div&gt;
    Minuman kesukaan anda:
    &lt;input type="checkbox" name="minuman_kesukaan" value="Susu"&gt; Susu
    &lt;input type="checkbox" name="minuman_kesukaan" value="Kopi"&gt; Kopi
    &lt;input type="checkbox" name="minuman_kesukaan" value="Bandrek"&gt; Bandrek
  &lt;/div&gt;
  &lt;div&gt;
    Pilih jenis kelamin:
    &lt;input type="radio" name="jenis_kelamin" value="Laki-laki"&gt; Laki-laki
    &lt;input type="radio" name="jenis_kelamin" value="Perempuan"&gt; Perempuan
  &lt;/div&gt;
  &lt;div&gt;
    Pilih lulusan:
    &lt;input type="radio" name="lulusan" value="SD"&gt; SD
    &lt;input type="radio" name="lulusan" value="SMP"&gt; SMP
    &lt;input type="radio" name="lulusan" value="SMA"&gt; SMA
    &lt;input type="radio" name="lulusan" value="SMK"&gt; SMK
  &lt;/div&gt;
  &lt;input type="submit" name="kirim" value="Proses"&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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