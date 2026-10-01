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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/membuat-formulir-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Beberapa Atribut Tambahan Untuk Tag Input</h2>
            <hr>
            <div class="konten-teori">
              <p class="m-1">
                Tag input banyak sekali tambahan atributnya, berikut kami cantumkan beberapa atribut tambahan pada tag input beserta fungsinya:
              </p>
              <table class="table table-striped table-bordered table-hover">
                <tr class="font-bt">
                  <td width="30%">Atribut</td>
                  <td>Fungsi</td>
                </tr>
                <tr>
                  <td>required</td>
                  <td>Berfungsi untuk membuat inputan tidak boleh kosong (harus diisi).</td>
                </tr>
                <tr>
                  <td>readonly</td>
                  <td>Berfungsi untuk membuat inputan hanya bisa di baca (tidak bisa di isi).</td>
                </tr>
                <tr>
                  <td>disabled</td>
                  <td>Sama seperti atribut readonly, hanya saja jika kursor diarahkan keinputnya maka akan dirubah menjadi kursor not allowed.</td>
                </tr>
                <tr>
                  <td>max</td>
                  <td>Berfungsi untuk mendefinisikan maksimal inputan (seperti angka dan tanggal).</td>
                </tr>
                <tr>
                  <td>min</td>
                  <td>Berfungsi untuk mendefinisikan minimal inputan (seperti angka dan tanggal).</td>
                </tr>
                <tr>
                  <td>placeholder</td>
                  <td>Memberikan tulisan pada inputan yang kosong dan tidak sedang fokus, jika inputan fokus/diisi maka isi dari atribut placeholder tidak ditampilkan.</td>
                </tr>
                <tr>
                  <td>minlength</td>
                  <td>Mendefinisikan minimal jumlah karakter/text/string.</td>
                </tr>
                <tr>
                  <td>maxlength</td>
                  <td>Mendefinisikan maksimal jumlah karakter/text/string.</td>
                </tr>
                <tr>
                  <td>value</td>
                  <td>Mendefinisikan isi inputan.</td>
                </tr>
                <tr>
                  <td>autofocus</td>
                  <td>Membuat inputan otomatis menjadi fokus.</td>
                </tr>
                <tr>
                  <td>size</td>
                  <td>Berguna untuk mengatur lebar inputan.</td>
                </tr>
              </table>
              <p class="m-0">Contoh:</p>
              <pre class="language-html line-numbers"><code>&lt;form action="proses.php" method="POST"&gt;
  &lt;div&gt;
    &lt;input type="text" <mark class="keep">value="Ini akan otomatis fokus"</mark> <mark class="keep">autofocus="autofocus"</mark> <mark class="keep">size="25"</mark>&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="text" <mark class="keep">value="Atribut readonly"</mark> <mark class="keep">readonly="readonly"</mark>&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="text" <mark class="keep">value="Atribut disabled"</mark> <mark class="keep">disabled="disabled"</mark>&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    Nomor (5-15) (Harus di isi): &lt;input type="number" <mark class="keep">min="5"</mark> <mark class="keep">max="15"</mark> <mark class="keep">required="required"</mark>&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="text" <mark class="keep">placeholder="Minimal 1 karakter, maksimal 10 karakter, harus di isi"</mark> <mark class="keep">minlength="5"</mark> <mark class="keep">maxlength="10"</mark> <mark class="keep">required="required"</mark> <mark class="keep">size="50"</mark>&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="submit" name="proses" value="Proses"&gt;
  &lt;/div&gt;
&lt;/form&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-html/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'html', 'modul_bagian' => 5, 'nama_modul' => 'Membuat Formulir Pada HTML'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>