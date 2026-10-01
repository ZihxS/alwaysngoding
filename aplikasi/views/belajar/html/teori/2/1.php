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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/tag-atribut-dan-elemen-pada-html';
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
            <h2 class="judul-teori">Pengertian Tag Pada HTML</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Ada tag, ada atribut, dan ada element pada html... bingung?, jangan bingung, kalian akan mempelajarinya di sini, kita mulai dari tag pada html, apa itu tag pada html?
              </p>
              <p>
                Tag adalah penanda untuk pemformatan di html seperti untuk memformat text menjadi <b>bercetak tebal</b>, <i>text menjadi miring</i>, <u>text bergaris bawah</u>, <big>text lebih besar</big>, <small>text lebih kecil</small>, <strike>text di coret</strike> dan masih banyak lagi. Cara menulis atau mendefinisikan tag yaitu berada di antara dua kurung siku <b><q><</q> isi <q>></q></b> untuk tag pembuka, dan <b><q>&lt;/</q> isi <q>></q></b> untuk tag penutup (ada slash sesudah tanda buka kurung siku). Tetapi ada tag html solo (tidak ada tag penutup) seperti (tag &lt;br&gt;, &lt;hr&gt;, &lt;img&gt;, dan lain-lain).
              </p>
              Format tag dasar:
              <pre class="language-html"><code><mark class="keep">&lt;pembuka&gt;</mark>Isi dari tag (yang akan berdampak)<mark class="keep">&lt;/penutup&gt;</mark></code></pre>
              <p>Yang di tandai di atas itu disebut tag html.</p>
              <p class="mb-0">Berikut beberapa contoh dan hasilnya:</p>
              <pre class="language-html"><code><?= htmlentities("<b>Tag ini berguna untuk mencetak tebal</b>"); ?></code></pre>
              <p>
                Hasilnya: <b>Tag ini berguna untuk mencetak tebal</b>
              </p>
              <pre class="language-html"><code><?= htmlentities("<i>Tag ini berguna untuk mencetak miring</i>"); ?></code></pre>
              <p>
                Hasilnya: <i>Tag ini berguna untuk mencetak miring</i>
              </p>
              <pre class="language-html"><code><?= htmlentities("<small>Tag ini berguna untuk mengkecilkan text</small>"); ?></code></pre>
              <p>
                Hasilnya: <small>Tag ini berguna untuk mengkecilkan text</small>
              </p>
              <p class="m-0">
                Masih banyak sekali tag tag pada HTML, kalian bisa melihatnya di bagian selanjutnya.
              </p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/selanjutnya', ['url' => $u, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>