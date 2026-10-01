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
  $p = $b-1; // Sebelumnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Create Read Update Delete Mysql','CRUD MySQL',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-mysql/teori/create-read-update-delete-mysql';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar MySQL - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'mysql', 'label' => 'Teori MySQL', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-mysql">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Operator LIKE</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">MySQL menyediakan operator LIKE untuk <b>menampilkan data pada tabel berdasarkan pencarian karakter sederhana</b>. Berikut adalah contoh syntax penggunaan operator LIKE pada query SELECT:</p>
              <pre class="language-sql"><code>SELECT * FROM tabel WHERE kolom_pencarian LIKE keyword_pencarian;</code></pre>
              <ul>
                <li><b>kolom_pencrian</b> adalah kolom yang akan kalian gunakan untuk pencarian.</li>
                <li><b>keyword_pencarian</b> adalah kata kunci yang digunakan untuk pencarian.</li>
              </ul>
              <p>Katakanlah kalian ingin menampilkan seluruh kolom dari tabel murid dimana <b><q>nama_lengkap</q></b> harus diawali dengan huruf <b><q>F</q></b>. Untuk pencarian seperti inilah kita menggunakan query dengan memanfaatkan operator LIKE.</p>
              <p class="mb-0">MySQL menyediakan 2 karakter khusus untuk pencarian LIKE, yaitu karakter <b><q>_</q></b> dan <b><q>%</q></b>, berikut penjelasannya:</p>
              <ol>
                <li><b>_</b> &nbsp;adalah karakter ganti yang cocok untuk satu karakter apa saja.</li>
                <li><b>%</b> adalah karakter ganti yang cocok untuk karakter apa saja dengan panjang karakter tidak terbatas, termasuk tidak ada karakter.</li>
              </ol>
              <p class="mb-0">Agar mudah memahami, langsung saja kita gunakan untuk pencarian <b><q>nama_lengkap</q></b> yang diawali dengan huruf <b><q>F</q></b>:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE nama_lengkap LIKE 'F%';</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-1.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p>Kita menggunakan <b><q>F%</q></b> karena kita ingin mencari <b><q>nama_lengkap</q></b> yang diawali dengan <b><q>F</q></b>, dan diikuti oleh karakter apa saja dengan panjang yang tidak dibatasi. Dan terbukti pada gambar di atas bahwa data yang ditampilkan hanya data yang <b><q>nama_lengkap</q></b> nya diawali dengan <b><q>F</q></b>.</p>
              <p class="mb-0">Kita dapat mengganti kata kunci hasil pencarian tersebut dengan karakter lain, sebagai contoh:</p>
              <ul>
                <li><b><q>a%</q></b>: Cocok dengan kata yang diawali dengan a, dan diikuti dengan karakter apa saja, contoh: <q>a</q>, <q>an</q>, <q>ats</q>, <q>aji</q>, <q>agysna</q>, <q>angga nur fadilah</q>.</li>
                <li><b><q>n_</q></b>: Cocok dengan kata yang diawali dengan n, dan diikuti dengan satu karakter apa saja, contoh: <q>na</q>, <q>ni</q>, <q>nu</q>, <q>ne</q>, <q>nd</q>.</li>
                <li><b><q>a__i</q></b>: Cocok dengan kata yang diawali dengan <q>a</q>, diikuti oleh 2 karakter bebas, namun diakhiri dengan i, contoh: <q>andi</q>, <q>ardi</q>, <q>anji</q>.</li>
                <li><b><q>%u</q></b>: Cocok dengan seluruh kata dengan panjang berapapun yang diakhiri dengan huruf <q>u</q>, contoh: <q>danu</q>, <q>lulu</q>, <q>dimas marwahyu</q>.</li>
                <li><b><q>%ia%</q></b>: Cocok dengan seluruh kata yang mengandung kata <q>ia</q>, contoh: <q>dania putri</q>, <q>nurul aulia</q>, <q>niana</q>, <q>diana</q>, <q>ian</q>.</li>
              </ul>
              <p class="mb-0">Kita juga dapat menggabungkan operasi LIKE dengan operator logika OR atau AND untuk pencarian yang lebih kompleks. Misalnya kalian ingin mencari kolom <b><q>nama_lengkap</q></b> yang diakhiri huruf <b><q>a</q></b> atau kolom <b><q>tahun_angkatan</q></b> yang diawali dengan 2 huruf bebas dan diakhiri dengan <b><q>14</q></b>. Querynya adalah sebagai berikut:</p>
              <pre class="language-sql"><code>SELECT * FROM murid WHERE nama_lengkap LIKE '%a' OR tahun_angkatan LIKE '__14';</code></pre>
              <p class="mb-2">Berikut adalah hasil data yang didapat dari perintah di atas:</p>
              <a href="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" target="_blank"><img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/hasil/mysql/4/{$b}-2.png"); ?>" alt="Media Pembelajaran Always Ngoding" class="img-responsive img-fluid img-bordered img-block mb-2"></a>
              <p class="mb-0">Perhatikan bahwa seluruh kolom <b><q>nama_lengkap</q></b> diakhiri dengan huruf <b><q>a</q></b>, kecuali Dimas Marwahyu, dimana hasil ini didapat dari kata kunci kedua, yakni kolom <b><q>tahun_angkatan</q></b> diawali dengan 2 karakter bebas dan diakhiri dengan <b><q>14</q></b> dan ada data yang cocok yaitu <b><q>2014</q></b>.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-mysql/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>