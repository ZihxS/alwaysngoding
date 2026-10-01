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
          <textarea id="code">&lt;!-- Dasar --&gt;
&lt;marquee&gt;Kalian semua luar biasa!!!&lt;/marquee&gt;
&lt;br&gt;
&lt;!-- Tujuannya ke kanan, kecepatannya 3 (default kecepetannya 6) --&gt;
&lt;marquee direction="right" scrollamount="3"&gt;Kalian semua luar biasa!!!&lt;/marquee&gt;
&lt;br&gt;
&lt;!-- Textnya jika sudah mentok berbalik arah, kecepatannya 12 (default kecepetannya 6) --&gt;
&lt;marquee behavior="alternate" scrollamount="12"&gt;Kalian semua luar biasa!!!&lt;/marquee&gt;</textarea>
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