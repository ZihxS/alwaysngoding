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
            <h2 class="judul-teori">Property font-size Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sesuai dengan nama property nya, fungsi property font-size adalah <b>untuk mengatur ukuran text atau font</b>. Kalian bisa mengatur text atau font dengan ukuran yang sangat-sangat kecil, sangat kecil, sedang, besar, sangat besar, dan sangat besar sekali.
              </p>
              <p>
                Property ini <b>sangat berguna apabila kalian ingin membuat website responsive</b>, jadi ukuran text atau font bisa kalian set di masing-masing device seperti smartphone, tablet, laptop dan komputer.
              </p>
              <p class="m-0">Berikut adalah contoh penggunaan property font-size:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar property font-size pada CSS&lt;/title&gt;
    &lt;style&gt;
      .font-xx-small {
        font-size: xx-small;
      }
      .font-x-small {
        font-size: x-small;
      }
      .font-small {
        font-size: small;
      }
      .font-medium {
        font-size: medium;
      }
      .font-large {
        font-size: large;
      }
      .font-x-large {
        font-size: x-large;
      }
      .font-xx-large {
        font-size: xx-large;
      }
      .font-20-px {
        font-size: 20px;
      }
      .font-150-persen {
        font-size: 150%;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="font-xx-small"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, commodi?&lt;/p&gt;
    &lt;p class="font-x-small"&gt;Dicta hic voluptatem quidem, nisi cum soluta dolorum quos quo.&lt;/p&gt;
    &lt;p class="font-small"&gt;Minus odit explicabo commodi dolore architecto deleniti laudantium, numquam qui?&lt;/p&gt;
    &lt;p class="font-medium"&gt;Eum praesentium tempora enim nesciunt distinctio iure pariatur sed maxime.&lt;/p&gt;
    &lt;p class="font-large"&gt;Tempore accusamus placeat cum qui, dignissimos omnis dolores tempora ipsa!&lt;/p&gt;
    &lt;p class="font-x-large"&gt;Iure ipsum eius, voluptatibus dolores ab reprehenderit mollitia, voluptatem in.&lt;/p&gt;
    &lt;p class="font-xx-large"&gt;Culpa aliquam voluptate commodi quasi a similique, deserunt possimus eius.&lt;/p&gt;
    &lt;p class="font-20-px"&gt;Ipsum reiciendis, sit cupiditate accusantium similique blanditiis, excepturi inventore.&lt;/p&gt;
    &lt;p class="font-150-persen"&gt;Accusantium ipsam fugiat ad sint, officia quo praesentium autem vel.&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="m-0">Kode di atas ukuran text atau fontnya akan berbeda pada masing-masing element <b><q>p</q></b> kalian bisa memodifikasi atau memanipulasi text atau font sesuka hati kalian agar tampilannya lebih menarik.</p>
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