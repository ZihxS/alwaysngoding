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
      div {
        width: 250px;
        height: 250px;
      }
      div.kotak-1 {
        border: 2px solid red;
        margin: 10px;
        padding: 10px;
      }
      div.kotak-2 {
        border: 2px solid green;
        margin: 20px 15px;
        padding: 10px 15px;
      }
      div.kotak-3 {
        border: 2px solid blue;
        margin: 10px 5px 2px;
        padding: 15px 10px 5px;
      }
      div.kotak-4 {
        border: 2px solid purple;
        margin: 1px 2px 3px 4px;
        padding: 4px 3px 2px 1px;
      }
      div.kotak-5 {
        border: 2px solid salmon;
        margin-top: 30px;
        margin-left: 25px;
        margin-bottom: 20px;
        margin-right: 15px;
        padding-top: 15px;
        padding-left: 10px;
        padding-bottom: 5px;
        padding-right: 2.5px;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div class="kotak-1"&gt;INI KOTAK 1&lt;/div&gt;
    &lt;div class="kotak-2"&gt;INI KOTAK 2&lt;/div&gt;
    &lt;div class="kotak-3"&gt;INI KOTAK 3&lt;/div&gt;
    &lt;div class="kotak-4"&gt;INI KOTAK 4&lt;/div&gt;
    &lt;div class="kotak-5"&gt;INI KOTAK 5&lt;/div&gt;
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