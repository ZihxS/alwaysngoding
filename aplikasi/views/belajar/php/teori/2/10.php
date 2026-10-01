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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/syntax-dasar-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Aturan Penulisan Variabel dalam PHP</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Variabel di dalam PHP harus diawali dengan dollar sign atau tanda dollar <b><q>$</q></b>. Setelah tanda <b><q>$</q></b>, sebuah variabel PHP harus diikuti dengan karakter pertama berupa huruf atau underscore <b><q>_</q></b>, kemudian untuk karakter kedua dan seterusnya bisa menggunakan <b><q>huruf</q></b>, <b><q>angka</q></b> atau <b><q>underscore (_)</q></b>. Dengan aturan tersebut, variabel di dalam PHP tidak bisa diawali dengan angka. Minimal panjang variabel adalah 1 karakter setelah tanda <b><q>$</q></b>. Berikut adalah contoh penulisan variabel yang benar dalam PHP:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   $i;
   $X;
   $NAMA;
   $Umur;
   $Hobi;
   $JenisKelamin;
   $tanggal_lahir;
   $_alamat;
?&gt;</code></pre>
              <p class="mb-0">Dan berikut adalah contoh penulisan variabel yang salah:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   $1Year; // Variabel tidak boleh diawali dengan angka berapapun
   $_salah satu; // Variabel tidak boleh mengandung spasi
   $nama*^; // Variabel tidak boleh mengandung karakter khusus seperti: * dan ^
?&gt;</code></pre>
              <p>PHP membedakan variabel yang ditulis dengan huruf besar dan kecil (bersifat case sensitif), sehingga <b><q>$kursus</q></b> tidak sama dengan <b><q>$Kursus</q></b> dan tidak sama dengan <b><q>$KursuS</q></b> juga tidak sama dengan <b><q>$KurSus</q></b>, semuanya akan dianggap sebagai variabel yang berbeda.</p>
              <p class="mb-0">Untuk menghindari kesalahan program yang dikarenakan salah merujuk variabel, maka kami sarankan untuk menggunakan huruf kecil untuk seluruh nama variabel.</p>
              <pre class="language-php line-numbers"><code>&lt;?php
   $nama = "<?= $this->session->ang_nama_pengguna; ?>";
   echo $nama; // Akan tercetak
   echo $Nama; // Akan muncul notice undefined variabel $Nama
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/2/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Dibaris ke 4 akan mengeluarkan error. Karena variabel yang kita definisikan di baris kedua adalah variabel <b><q>$nama</q></b> (dengan huruf kecil semua) bukan variabel <b><q>$Nama</q></b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>