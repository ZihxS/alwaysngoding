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
    &lt;label for="kesukaan"&gt;Bahasa pemrogramman yang anda sukai:&lt;/label&gt;
    &lt;select name="kesukaan" id="kesukaan"&gt;
      &lt;optgroup label="Front END"&gt;
        &lt;option value="CSS"&gt;CSS&lt;/option&gt;
        &lt;option value="JavaScript"&gt;JavaScript&lt;/option&gt;
      &lt;/optgroup&gt;
      &lt;optgroup label="Back END"&gt;
        &lt;option value="PHP"&gt;PHP&lt;/option&gt;
        &lt;option value="Ruby"&gt;Ruby&lt;/option&gt;
        &lt;option value="Python"&gt;Python&lt;/option&gt;
      &lt;/optgroup&gt;
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