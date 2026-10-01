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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/lebih-banyak-tentang-css';
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
            <h2 class="judul-teori">Filter Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Filter CSS adalah <b>salah satu keunggulan CSS</b> yang dapat digunakan penulis untuk memberi berbagai efek visual (seperti filter Photoshop tetapi untuk browser).</p>
              <p>Property filter CSS <b>menyediakan akses ke efek</b> seperti blur atau color shifting warna pada element sebelum element ditampilkan. Filter biasanya digunakan <b>untuk menyesuaikan</b> rendering gambar, latar belakang, atau border.</p>
              <p class="mb-1">Berikut adalah jenis-jenis filter pada CSS beserta dengan kegunaannya:</p>
              <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th style="width: 15%;">Jenis Filter</th>
                    <th>Kegunaan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="vertical-align: middle;">Grayscale</td>
                    <td>
                      Mengkonversi element ke grayscale. Nilai “amount” menentukan proporsi konversi. Nilai 100% sepenuhnya grayscale. Nilai 0% tidak akan mengubah element. Nilai antara 0% dan 100% adalah pengganda linier pada efek. Jika parameter “amount” hilang, nilai 100% digunakan. Nilai negatif tidak diizinkan.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Sepia</td>
                    <td>
                      Mengkonversi element ke sepia. Nilai “amount” menentukan proporsi konversi. Nilai 100% sepenuhnya sepia. Nilai 0 tidak akan mengubah element. Nilai antara 0% dan 100% adalah pengganda linier pada efek. Jika parameter “amount” hilang, nilai 100% digunakan. Nilai negatif tidak diizinkan.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Saturate</td>
                    <td>
                      Mengkonversi element ke saturate. Nilai “amount” menentukan proporsi konversi. Nilai 100% sepenuhnya saturate. Nilai 0 tidak akan mengubah element.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Hue-Rotate</td>
                    <td>
                      Menerapkan rotasi hue pada element. Nilai “angle” mendefinisikan jumlah derajat di sekitar lingkaran warna sampel input yang akan disesuaikan. Nilai 0deg tidak akan mengubah apa – apa. Jika parameter “angle” hilang, nilai 0deg digunakan. Nilai maksimumnya adalah 360deg.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Invert</td>
                    <td>
                      Membalikkan sampel dalam element. Nilai “amount” menentukan proporsi konversi. Nilai 100% benar-benar terbalik. Nilai 0% tidak akan mengubah apa-apa. Nilai antara 0% dan 100% adalah pengganda linier pada efek. Jika parameter “amount” hilang, nilai 100% digunakan. Nilai negatif tidak diizinkan.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Opacity</td>
                    <td>
                      Menerapkan transparansi ke sampel di element. Nilai “amount” menentukan proporsi konversi. Nilai 0% benar-benar transparan. Nilai 100% tidak akan mengubah apa-apa. Nilai antara 0% dan 100% adalah pengganda linier pada efek. Ini sama dengan mengalikan sampel element dengan jumlah. Jika parameter “amount” hilang, maka nilai 100% yang akan digunakan. Nilai negatif tidak diizinkan.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Brightness</td>
                    <td>
                      Menerapkan pengganda linear untuk memasukkan element, membuatnya tampak lebih atau kurang terang. Nilai 0% akan membuat element kalian benar-benar hitam. Nilai 100% tidak akan mengubah apa-apa. Nilai lain adalah pengganda linier pada efek. Nilai dari jumlah lebih dari 100% diizinkan, memberikan hasil yang lebih cerah. Jika parameter “amount” hilang, maka nilai 100% yang akan digunakan.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Contrast</td>
                    <td>
                      Menyesuaikan kontras input. Nilai 0% akan membuat element yang benar-benar hitam. Nilai 100% tidak mengubah apa-apa. Value lebih dari 100% diizinkan, memberikan hasil dengan kontras yang lebih sedikit. Jika parameter “amount” hilang, maka nilai 100% yang akan digunakan.
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Blur</td>
                    <td>
                      Filter atu efek untuk membuat element terlihat kabur (blur).
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: middle;">Drop Shadow</td>
                    <td>
                      Menerapkan efek drop shadow ke element. Drop shadow secara efektif adalah versi offset yang kabur dari element yang digambar dalam warna tertentu, yang dikomposisikan di bawah element. Fungsi ini menerima parameter tipe, dengan pengecualian bahwa kata kunci ‘inset’ tidak diperbolehkan. Property ini mirip dengan property box-shadow; perbedaannya adalah dengan filter, beberapa browser menyediakan akselerasi perangkat keras untuk kinerja yang lebih baik.
                    </td>
                  </tr>
                </tbody>
              </table>
              <p class="m-0">Berikut adalah contoh penggunaan jenis-jenis filter yang ada di atas, perhatikan kode di bawah ini:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      img {
        display: block;
        width: 200px;
        height: auto;
        margin: 0 auto 20px auto;
      }
      .grayscale {
        filter: grayscale(1);
      }
      .sepia {
        filter: sepia(1);
      }
      .saturate {
        filter: saturate(8);
      }
      .hue-rotate {
        filter: hue-rotate(90deg);
      }
      .invert {
        filter: invert(.8);
      }
      .opacity {
        filter: opacity(.2);
      }
      .brightness {
        filter: brightness(3);
      }
      .contrast {
        filter: contrast(4);
      }
      .blur {
        filter: blur(5px);
      }
      .drop-shadow {
        filter: drop-shadow(16px 16px 10px rgba(0,0,0,0.9));
      }

      /* multiple filter */
      .multiple-filter {
        filter: saturate(30%) drop-shadow(5px 9px 2px gray) blur(1px);
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;img class="grayscale" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="sepia" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="saturate" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="hue-rotate" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="invert" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="opacity" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="brightness" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="contrast" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="blur" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="drop-shadow" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="multiple-filter" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/8/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <blockquote class="catatan-pelajaran">Multiple filter dipisahkan dengan spasi bukan koma (sama seperti multiple transform).</blockquote>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>