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
      h1 {
        border: 1px solid black;
      }
      h2 {
        border: 2px dotted red;
      }
      h3 {
        border: 3px dashed blue;
      }
      h4 {
        border: 4px double green;
      }
      h5 {
        border: 5px groove salmon;
      }
      h6 {
        border: 6px ridge maroon;
      }
      div {
        border: 7px inset aqua;
      }
      p {
        border: 8px outset purple;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;
      Element ini akan ada garis tepi dengan ketebalan 1 pixel yang style garisnya "solid" dan warna garisnya hitam.
    &lt;/h1&gt;
    &lt;h2&gt;
      Element ini akan ada garis tepi dengan ketebalan 2 pixel yang style garisnya "dotted" dan warna garisnya merah.
    &lt;/h2&gt;
    &lt;h3&gt;
      Element ini akan ada garis tepi dengan ketebalan 3 pixel yang style garisnya "dashed" dan warna garisnya biru.
    &lt;/h3&gt;
    &lt;h4&gt;
      Element ini akan ada garis tepi dengan ketebalan 4 pixel yang style garisnya "double" dan warna garisnya hijau.
    &lt;/h4&gt;
    &lt;h5&gt;
      Element ini akan ada garis tepi dengan ketebalan 5 pixel yang style garisnya "groove" dan warna garisnya salmon.
    &lt;/h5&gt;
    &lt;h6&gt;
      Element ini akan ada garis tepi dengan ketebalan 6 pixel yang style garisnya "ridge" dan warna garisnya merah maroon.
    &lt;/h6&gt;
    &lt;div&gt;
      Element ini akan ada garis tepi dengan ketebalan 7 pixel yang style garisnya "inset" dan warna garisnya aqua.
    &lt;/div&gt;
    &lt;p&gt;
      Element ini akan ada garis tepi dengan ketebalan 8 pixel yang style garisnya "outset" dan warna garisnya ungu.
    &lt;/p&gt;
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