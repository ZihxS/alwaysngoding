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
        float: left;
        width: 200px;
        margin-right: 10px;
        margin-bottom: 10px;
      }
      ul {
        clear: both;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;img src="<?= base_url('media/hasil/contoh.png'); ?>" alt="Contoh Gambar"&gt;
    &lt;p&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime esse expedita iure voluptatibus odit harum quidem optio odio, laborum qui deleniti, molestias quod distinctio quo provident. Ullam similique soluta, vitae!
    &lt;/p&gt;
    &lt;ul&gt;
      &lt;li&gt;Lorem.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum dolor.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum dolor sit.&lt;/li&gt;
      &lt;li&gt;Lorem ipsum dolor sit amet.&lt;/li&gt;
    &lt;/ul&gt;
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