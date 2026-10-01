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
      img {
        display: block;
        width: 200px;
        height: auto;
        margin: 0 auto 20px auto;
      }
      .grayscale {
        filter: grayscale(1);
      }
      .sepia {
        filter: sepia(1);
      }
      .saturate {
        filter: saturate(8);
      }
      .hue-rotate {
        filter: hue-rotate(90deg);
      }
      .invert {
        filter: invert(.8);
      }
      .opacity {
        filter: opacity(.2);
      }
      .brightness {
        filter: brightness(3);
      }
      .contrast {
        filter: contrast(4);
      }
      .blur {
        filter: blur(5px);
      }
      .drop-shadow {
        filter: drop-shadow(16px 16px 10px rgba(0,0,0,0.9));
      }

      /* multiple filter */
      .multiple-filter {
        filter: saturate(30%) drop-shadow(5px 9px 2px gray) blur(1px);
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;img class="grayscale" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="sepia" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="saturate" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="hue-rotate" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="invert" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="opacity" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="brightness" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="contrast" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="blur" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="drop-shadow" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;img class="multiple-filter" src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
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