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
            <h2 class="judul-teori">Property text-align Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Property text-align berguna untuk <b>mengatur rata text</b>. Property <b>text-align memiliki 4 nilai yang bisa dipilih</b> oleh kita, yaitu: left (rata kiri), right (rata kanan), center (membuat text berada di tengah), justify (rata kiri dan kanan).
              </p>
              <p class="m-0">Contoh penggunaan property text-align:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      .rata-kiri {
        text-align: left;
      }
      .rata-kanan {
        text-align: right;
      }
      .tengah {
        text-align: center;
      }
      .rata-kiri-kanan {
        text-align: justify;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="rata-kiri"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi corporis fuga, nihil tenetur. Facere, eaque.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil corporis aspernatur, non molestias iure minus.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui alias eligendi, at reiciendis, nostrum vel.
    &lt;/p&gt;
    &lt;p class="rata-kanan"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum soluta modi, harum quod quam in?
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur deserunt modi unde autem accusamus aut.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium explicabo, atque tempora dolorum iure animi.
    &lt;/p&gt;
    &lt;p class="tengah"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, cum labore quis ipsa voluptas amet!
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit in quia eos sunt repellendus facere?
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad autem atque veniam eaque odit eum.
    &lt;/p&gt;
    &lt;p class="rata-kiri-kanan"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus quo ad expedita harum est dolorum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim eligendi odio, asperiores earum pariatur vel!
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse veritatis, beatae eum, tenetur porro blanditiis.
    &lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-css/hasil/3/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
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