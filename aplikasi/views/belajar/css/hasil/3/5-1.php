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
    &lt;title&gt;Belajar property font-size pada CSS&lt;/title&gt;
    &lt;style&gt;
      .font-xx-small {
        font-size: xx-small;
      }
      .font-x-small {
        font-size: x-small;
      }
      .font-small {
        font-size: small;
      }
      .font-medium {
        font-size: medium;
      }
      .font-large {
        font-size: large;
      }
      .font-x-large {
        font-size: x-large;
      }
      .font-xx-large {
        font-size: xx-large;
      }
      .font-20-px {
        font-size: 20px;
      }
      .font-150-persen {
        font-size: 150%;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;p class="font-xx-small"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, commodi?&lt;/p&gt;
    &lt;p class="font-x-small"&gt;Dicta hic voluptatem quidem, nisi cum soluta dolorum quos quo.&lt;/p&gt;
    &lt;p class="font-small"&gt;Minus odit explicabo commodi dolore architecto deleniti laudantium, numquam qui?&lt;/p&gt;
    &lt;p class="font-medium"&gt;Eum praesentium tempora enim nesciunt distinctio iure pariatur sed maxime.&lt;/p&gt;
    &lt;p class="font-large"&gt;Tempore accusamus placeat cum qui, dignissimos omnis dolores tempora ipsa!&lt;/p&gt;
    &lt;p class="font-x-large"&gt;Iure ipsum eius, voluptatibus dolores ab reprehenderit mollitia, voluptatem in.&lt;/p&gt;
    &lt;p class="font-xx-large"&gt;Culpa aliquam voluptate commodi quasi a similique, deserunt possimus eius.&lt;/p&gt;
    &lt;p class="font-20-px"&gt;Ipsum reiciendis, sit cupiditate accusantium similique blanditiis, excepturi inventore.&lt;/p&gt;
    &lt;p class="font-150-persen"&gt;Accusantium ipsam fugiat ad sint, officia quo praesentium autem vel.&lt;/p&gt;
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