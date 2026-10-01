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
    &lt;label for="kisah"&gt;Ceritakan kisah hidup anda:&lt;/label&gt;
    &lt;br&gt;
    &lt;textarea name="kisah" id="kisah" cols="50" rows="10"&gt;&lt;/textarea&gt;
  &lt;/div&gt;
  &lt;div&gt;
    &lt;label for="provinsi"&gt;Anda tinggal di provinsi:&lt;/label&gt;
    &lt;br&gt;
    &lt;select name="provinsi" id="provinsi"&gt;
      &lt;option value="Jawa Timur"&gt;Jawa Timur&lt;/option&gt;
      &lt;option value="Jawa Tengah"&gt;Jawa Tengah&lt;/option&gt;
      &lt;option value="Jawa Barat"&gt;Jawa Barat&lt;/option&gt;
    &lt;/select&gt;
    &lt;input type="submit" name="proses" value="Proses"&gt;
  &lt;/div&gt;
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