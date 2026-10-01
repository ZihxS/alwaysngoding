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
      article &gt; p.modifikasi-20-px {
        text-indent: 20px;
      }
      article &gt; p.modifikasi-10-persen {
       text-indent: 10%;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;article&gt;
      &lt;p class="modifikasi-20-px"&gt;
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ratione voluptas, iure culpa vitae voluptatibus provident ullam dolor illum eaque architecto iusto ducimus? Accusamus cupiditate omnis distinctio voluptatibus, optio adipisci.
      &lt;/p&gt;
      &lt;p class="modifikasi-10-persen"&gt;
        Saepe libero nostrum itaque minima eveniet? Eveniet, quisquam fugit placeat ratione minus odio commodi distinctio. Aliquid facilis, officiis. Quisquam, ipsam perspiciatis. Harum esse, provident obcaecati dicta tempora sed voluptatibus aliquam?
      &lt;/p&gt;
    &lt;/article&gt;
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