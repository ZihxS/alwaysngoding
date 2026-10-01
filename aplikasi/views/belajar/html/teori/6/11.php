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
  $u = 'belajar-html/teori/lebih-banyak-tentang-html';
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
            <h2 class="judul-teori">Tag Audio dan Video</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Audio dan video tentunya sangat penting untuk dunia website, <b>bertujuan untuk lebih memberi rasa nyaman pengguna</b> (user) website, dan <b>sarana untuk memudahkan menyampaikan suatu tujuan</b>. Cara menggunakan tag <b><q>audio</q></b> dan <b><q>video</q></b> tidak jauh berbeda, jadi sangat mudah untuk dipahami.
              </p>
              <p class="m-0">Berikut contoh penggunaan tag <b><q>audio</q></b>:</p>
              <pre class="language-html line-numbers"><code>&lt;audio controls&gt;
  &lt;!-- Menampilkan file audio berformat .ogg --&gt;
  &lt;source src="folder_audio/file_audio.ogg" type="audio/ogg"&gt;
  &lt;!-- Jika file audio berformat .ogg tidak didukung oleh browser, maka menampilkan file audio berformat .mp3 --&gt;
  &lt;source src="folder_audio/file_audio.mp3" type="audio/mp3"&gt;
  &lt;!-- Jika kedua format di atas tidak didukung oleh browser maka audio tidak akan dimunculkan --&gt;
  Browser anda tidak mendukung element audio.
&lt;/audio&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/6/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Berikut adalah atribut-atribut pada tag <b><q>audio</q></b>:</p>
              <table class="table table-striped table-bordered table-hover">
                <tr>
                  <td width="20%">Atribut</td>
                  <td>Deskripsi kegunaan</td>
                </tr>
                <tr>
                  <td>autoplay</td>
                  <td>Menentukan bahwa audio akan mulai berputar otomatis.</td>
                </tr>
                <tr>
                  <td>controls</td>
                  <td>Supaya audio bisa di kontrol (di play, pause dan menaik atau menurunkan volume).</td>
                </tr>
                <tr>
                  <td>loop</td>
                  <td>Menentukan bahwa audio akan berputar kembali meski audio sudah habis.</td>
                </tr>
                <tr>
                  <td>src</td>
                  <td>Menentukan alamat URL. dari mana sumber audionya (kegunaannya sama seperti pada tag <code>&lt;img&gt;</code>).</td>
                </tr>
              </table>
              <p class="m-0">Berikut contoh penggunaan tag <b><q>video</q></b>:</p>
              <pre class="language-html line-numbers"><code>&lt;video width="50%" height="500" controls&gt;
  &lt;!-- Menampilkan file video berformat .mp4 --&gt;
  &lt;source src="folder_video/file_video.mp4" type="video/mp4"&gt;
  &lt;!-- Jika file video berformat .mp4 tidak didukung oleh browser, maka menampilkan file video berformat .ogg --&gt;
  &lt;source src="folder_video/file_video.ogg" type="video/ogg"&gt;
  &lt;!-- Jika file video berformat .ogg tidak didukung oleh browser, maka menampilkan file video berformat .webm --&gt;
  &lt;source src="folder_video/file_video.webm" type="video/webm"&gt;
  &lt;!-- Jika ketiga format di atas tidak didukung oleh browser maka video tidak akan dimunculkan --&gt;
  Browser anda tidak mendukung element video.
&lt;/video&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/6/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-2">Berikut adalah atribut-atribut pada tag <b><q>video</q></b>:</p>
              <table class="table table-striped table-bordered table-hover">
                <tr>
                  <td width="20%">Atribut</td>
                  <td>Deskripsi kegunaan</td>
                </tr>
                <tr>
                  <td>autoplay</td>
                  <td>Menentukan bahwa video akan mulai berputar otomatis.</td>
                </tr>
                <tr>
                  <td>controls</td>
                  <td>Supaya video bisa di kontrol (di play, pause, menaik atau menurunkan volume dan bisa menampilkan dengan tampilan layar penuh).</td>
                </tr>
                <tr>
                  <td>loop</td>
                  <td>Menentukan bahwa video akan berputar kembali meski audio sudah habis.</td>
                </tr>
                <tr>
                  <td>src</td>
                  <td>Menentukan alamat URL. Dari mana sumber videonya (kegunaannya sama seperti pada tag <code>&lt;img&gt;</code>).</td>
                </tr>
                <tr>
                  <td>width</td>
                  <td>Mengatur lebar video.</td>
                </tr>
                <tr>
                  <td>height</td>
                  <td>Mengatur tinggi video.</td>
                </tr>
                <tr>
                  <td>poster</td>
                  <td>Menentukan gambar yang akan tampil ketika video belum berputar (thumbnail).</td>
                </tr>
                <tr>
                  <td>muted</td>
                  <td>Menentukan bahwa output suara akan di mute/dihilangkan poster.</td>
                </tr>
              </table>
              <blockquote class="catatan-pelajaran">Silahkan di copas kode di atas dan disesuaikan di text editor kalian, lalu lihat hasilnya... Semoga berhasil....</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 6], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>