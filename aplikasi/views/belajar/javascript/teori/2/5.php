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
  $x = str_replace('Di Javascript','di JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/aturan-penulisan-kode-di-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Reserved Words di JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>JavaScript memiliki beberapa kata kunci atau words yang tidak bisa digunakan sebagai nama variabel atau nama dari sebuah fungsi. Istilah ini sering disebut reserved words.</p>
              <p class="mb-2">Reserved words merupakan kata kunci yang digunakan JavaScript dalam menjalankan fungsinya atau fungsi bawaan JavaScript. Berikut adalah daftar reserved words pada bahasa pemrograman JavaScript:</p>
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>abstract</td>
                      <td>arguments</td>
                      <td>await</td>
                      <td>boolean</td>
                    </tr>
                    <tr>
                      <td>break</td>
                      <td>byte</td>
                      <td>case</td>
                      <td>catch</td>
                    </tr>
                    <tr>
                      <td>char</td>
                      <td>class</td>
                      <td>const</td>
                      <td>continue</td>
                    </tr>
                    <tr>
                      <td>debugger</td>
                      <td>default</td>
                      <td>delete</td>
                      <td>do</td>
                    </tr>
                    <tr>
                      <td>double</td>
                      <td>else</td>
                      <td>enum</td>
                      <td>eval</td>
                    </tr>
                    <tr>
                      <td>export</td>
                      <td>extends</td>
                      <td>false</td>
                      <td>final</td>
                    </tr>
                    <tr>
                      <td>finally</td>
                      <td>float</td>
                      <td>for</td>
                      <td>function</td>
                    </tr>
                    <tr>
                      <td>goto</td>
                      <td>if</td>
                      <td>implements</td>
                      <td>import</td>
                    </tr>
                    <tr>
                      <td>in</td>
                      <td>instanceof</td>
                      <td>int</td>
                      <td>interface</td>
                    </tr>
                    <tr>
                      <td>let</td>
                      <td>long</td>
                      <td>native</td>
                      <td>new</td>
                    </tr>
                    <tr>
                      <td>null</td>
                      <td>package</td>
                      <td>private</td>
                      <td>protected</td>
                    </tr>
                    <tr>
                      <td>public</td>
                      <td>return</td>
                      <td>short</td>
                      <td>static</td>
                    </tr>
                    <tr>
                      <td>super</td>
                      <td>switch</td>
                      <td>synchronized</td>
                      <td>this</td>
                    </tr>
                    <tr>
                      <td>throw</td>
                      <td>throws</td>
                      <td>transient</td>
                      <td>true</td>
                    </tr>
                    <tr>
                      <td>try</td>
                      <td>typeof</td>
                      <td>var</td>
                      <td>void</td>
                    </tr>
                    <tr>
                      <td>volatile</td>
                      <td>while</td>
                      <td>with</td>
                      <td>yield</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>