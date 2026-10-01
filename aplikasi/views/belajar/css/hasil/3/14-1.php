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
      .coret-merah {
        text-decoration: line-through red;
      }
      .garis-bawah-biru {
        text-decoration: underline blue;
      }
      .garis-atas {
        text-decoration: overline;
      }
      .titik-titik-bawah-emas {
        text-decoration: underline dotted gold;
      }
      div {
        margin-bottom: 10px;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="coret-merah"&gt;Text atau font ini akan di coret dan coretannya berwarna merah.&lt;/div&gt;
    &lt;div class="garis-bawah-biru"&gt;Text atau font ini akan ada garis bawah berwarna biru.&lt;/div&gt;
    &lt;div class="garis-atas"&gt;Text atau font ini akan ada garis atas berwarna hitam (defualt).&lt;/div&gt;
    &lt;div class="titik-titik-bawah-emas"&gt;Text atau font ini akan ada titik-titik nya di bawah dan berwarna emas.&lt;/div&gt;
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