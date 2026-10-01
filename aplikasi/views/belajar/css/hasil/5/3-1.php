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
  <?php $this->load->view('belajar/css/hasil/markas/kepala', NULL, FALSE); ?>
  <body class="hasil">
    <?php $this->load->view('belajar/css/hasil/markas/navigasi', NULL, FALSE); ?>
    <main class="hasil-main">
      <div class="container-fluid">
        <div class="code-hasil">
          <button class="btn btn-dark btn-file-name">index.html</button>
          <textarea id="code">&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      .terlihat {
        visibility: visible;
      }
      .tidak-terlihat {
        visibility: hidden;
      }
      .tidak-terlihat-untuk-tabel {
        visibility: collapse;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="terlihat"&gt;
      Kalimat ini akan terlihat di web browser.
    &lt;/p&gt;
    &lt;p class="tidak-terlihat"&gt;
      Kalimat ini tidak akan terlihat di web browser, tapi meninggalkan jejak berupa spasi atau jarak.
    &lt;/p&gt;
    &lt;table border="1" width="100%"&gt;
      &lt;tr&gt;
        &lt;th&gt;No&lt;/th&gt;
        &lt;th&gt;Nama&lt;/th&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;1&lt;/td&gt;
        &lt;td&gt;Muhammad Saleh Solahudin&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr class="tidak-terlihat-untuk-tabel"&gt; &lt;!-- Tidak akan ditampilkan dan tidak akan meninggalkan jejak --&gt;
        &lt;td&gt;2&lt;/td&gt;
        &lt;td&gt;Fathul Aditya&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;3&lt;/td&gt;
        &lt;td&gt;Elvine Bariel&lt;/td&gt;
      &lt;/tr&gt;
    &lt;/table&gt;
  &lt;/body&gt;
&lt;/html&gt;</textarea>
        </div>
        <div>
          <button class="btn btn-light btn-output">output</button>
          <iframe id="preview" frameborder="0"></iframe>
        </div>
      </div>
    </main>
    <?php $this->load->view('belajar/css/hasil/markas/script', NULL, FALSE); ?>
  </body>
</html>