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
?>
<!DOCTYPE html>
<html lang="id">
  <?php $this->load->view('belajar/html/hasil/markas/kepala', NULL, FALSE); ?>
  <body class="hasil">
    <?php $this->load->view('belajar/html/hasil/markas/navigasi', NULL, FALSE); ?>
    <main class="hasil-main">
      <div class="container-fluid">
        <div class="code-hasil">
          <button class="btn btn-dark btn-file-name">index.html</button>
          <textarea id="code">&lt;form action="proses.php" method="POST" onsubmit="alert('Maaf ini hanya contoh, jadi tidak di proses.'); return false;"&gt;
  &lt;div&gt;
    &lt;label&gt;Nama:&lt;/label&gt;
    &lt;input type="text" id="nama" name="nama"&gt;
  &lt;/div&gt;
  &lt;div&gt;
    Pilih jenis kelamin:
    &lt;input id="laki-laki" type="radio" name="jenis_kelamin" value="Laki-laki"&gt; &lt;label&gt;Laki-laki&lt;/label&gt;
    &lt;input id="perempuan" type="radio" name="jenis_kelamin" value="Perempuan"&gt; &lt;label&gt;Perempuan&lt;/label&gt;
  &lt;/div&gt;
  &lt;div&gt;
    Hobi anda:
    &lt;input id="bola" type="checkbox" name="hobi" value="Bermain Sepak Bola"&gt; &lt;label&gt;Bermain Sepak Bola&lt;/label&gt;
    &lt;input id="basket" type="checkbox" name="hobi" value="Bermain Basket"&gt; &lt;label&gt;Bermain Basket&lt;/label&gt;
    &lt;input id="berenang" type="checkbox" name="hobi" value="Berenang"&gt; &lt;label&gt;Berenang&lt;/label&gt;
    &lt;input id="coding" type="checkbox" name="hobi" value="Coding"&gt; &lt;label&gt;Coding&lt;/label&gt;
  &lt;/div&gt;
  &lt;input type="submit" name="proses" value="Proses"&gt;
&lt;/form&gt;</textarea>
        </div>
        <div>
          <button class="btn btn-light btn-output">output</button>
          <iframe id="preview" frameborder="0"></iframe>
        </div>
      </div>
    </main>
    <?php $this->load->view('belajar/html/hasil/markas/script', NULL, FALSE); ?>
  </body>
</html>