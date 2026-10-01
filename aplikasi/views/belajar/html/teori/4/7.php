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
  $u = 'belajar-html/teori/membuat-tabel-pada-html';
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
            <h2 class="judul-teori">Mengatur Lebar Kolom Pada Tabel</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sama hal nya seperti mengatur lebar tabel, kita menggunakan atribut <b><q>width</q></b> namun bedanya sekarang penempatan atribut <b><q>width</q></b> nya di tag <code>&lt;td&gt;&lt;/td&gt;</code> atau <code>&lt;th&gt;&lt;/th&gt;</code> (tag <code>&lt;th&gt;&lt;/th&gt;</code> akan dijelaskan di bagian selanjutnya). Lebarnya juga bisa satuan <b>pixel</b> (px) atau satuan <b>persen</b> (%).
              </p>
              <p class="m-0">Perhatikan kode berikut:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Mengatur lebar kolom pada tabel&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Mengatur lebar kolom pada tabel - Always Ngoding&lt;/h1&gt;
    &lt;table border="1" width="100%"&gt;
      &lt;tr&gt;
        &lt;!-- 25 + 25 + 25 + 25 (Total 100 persen) --&gt;
        &lt;td <mark class="keep">width="25%"</mark>&gt;Nama&lt;/td&gt;
        &lt;td <mark class="keep">width="25%"</mark>&gt;Kelas&lt;/td&gt;
        &lt;td <mark class="keep">width="25%"</mark>&gt;Jurusan&lt;/td&gt;
        &lt;td <mark class="keep">width="25%"</mark>&gt;Jenis Kelamin&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Karmila Sriwulan&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
        &lt;td&gt;Perempuan&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Zahwarudin Khalik&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;PT3RTV&lt;/td&gt;
        &lt;td&gt;Laki-laki&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Riki Januar&lt;/td&gt;
        &lt;td&gt;XI&lt;/td&gt;
        &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
        &lt;td&gt;Laki-laki&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Fauzan Azima&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;Teknik Komputer dan Jaringan&lt;/td&gt;
        &lt;td&gt;Laki-laki&lt;/td&gt;
      &lt;/tr&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-html/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Penjelasan:</p>
              <ol class="m-0">
                <li>Lebar tabel diatur menjadi <b>100% lebar web browser</b>.</li>
                <li>Empat Kolom dibagi sama rata lebarnya yaitu <b>25%</b> dari lebar tabel (agar terlihat rapih).</li>
              </ol>
              <blockquote class="catatan-pelajaran mt-2">
                Gunakan atribut <b><q>width</q></b> nya pada kolom-kolom baris pertama saja, karena kolom-kolom baris selanjutnya akan <b>mengikuti atau menyesuaikan</b> lebarnya dengan kolom-kolom baris pertama.
              </blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>