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
      .rata-kiri {
        text-align: left;
      }
      .rata-kanan {
        text-align: right;
      }
      .tengah {
        text-align: center;
      }
      .rata-kiri-kanan {
        text-align: justify;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="rata-kiri"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi corporis fuga, nihil tenetur. Facere, eaque.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil corporis aspernatur, non molestias iure minus.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui alias eligendi, at reiciendis, nostrum vel.
    &lt;/p&gt;
    &lt;p class="rata-kanan"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum soluta modi, harum quod quam in?
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur deserunt modi unde autem accusamus aut.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium explicabo, atque tempora dolorum iure animi.
    &lt;/p&gt;
    &lt;p class="tengah"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, cum labore quis ipsa voluptas amet!
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit in quia eos sunt repellendus facere?
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad autem atque veniam eaque odit eum.
    &lt;/p&gt;
    &lt;p class="rata-kiri-kanan"&gt;
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus quo ad expedita harum est dolorum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim eligendi odio, asperiores earum pariatur vel!
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse veritatis, beatae eum, tenetur porro blanditiis.
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