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
          <textarea id="code">&lt;div&gt;
  &lt;p&gt;Beberapa Bahasa pemrograman yang saya sukai. beserta alasannya:&lt;/p&gt;
  &lt;dl&gt;
    &lt;dt&gt;C++&lt;/dt&gt;
    &lt;dd&gt;Bahasa pemrograman yang saya pelajari untuk pertama kalinya.&lt;/dd&gt;
    &lt;dt&gt;Python&lt;/dt&gt;
    &lt;dd&gt;Simple, Gak perlu mikirin semicolon (titik koma).&lt;/dd&gt;
    &lt;dt&gt;GO&lt;/dt&gt;
    &lt;dd&gt;Performa yang sangat cepat.&lt;/dd&gt;
  &lt;/dl&gt;
&lt;/div&gt;</textarea>
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