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
      .jelas {
        opacity: 1;
      }
      .setengah-jelas {
          opacity: 0.5;
      }
      .tidak-terlalu-jelas {
          opacity: 0.25;
      }
      .transparan {
          opacity: 0;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="jelas"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, in?
    &lt;/div&gt;
    &lt;div class="setengah-jelas"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, praesentium.
    &lt;/div&gt;
    &lt;div class="tidak-terlalu-jelas"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, error!
    &lt;/div&gt;
    &lt;div class="transparan"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, similique!
    &lt;/div&gt;
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