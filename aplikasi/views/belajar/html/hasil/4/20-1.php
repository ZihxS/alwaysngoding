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
  <?php $this->load->view('belajar/html/hasil/markas/kepala', NULL, FALSE); ?>
  <body class="hasil">
    <?php $this->load->view('belajar/html/hasil/markas/navigasi', NULL, FALSE); ?>
    <main class="hasil-main">
      <div class="container-fluid">
        <div class="code-hasil">
          <button class="btn btn-dark btn-file-name">index.html</button>
          <textarea id="code">&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Penulisan dan pengunaan atribut valign untuk tabel HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h2&gt;Penulisan dan pengunaan atribut valign untuk tabel HTML - Always Ngoding&lt;/h2&gt;
    &lt;table border="1" width="75%"&gt;
      &lt;thead&gt;
        &lt;tr&gt;
          &lt;th&gt;Judul 1&lt;/th&gt;
          &lt;th&gt;Judul 2&lt;/th&gt;
          &lt;th&gt;Judul 3&lt;/th&gt;
        &lt;/tr&gt;
      &lt;/thead&gt;
      &lt;tbody&gt;
        &lt;tr height="350"&gt;
          &lt;td align="center" valign="top"&gt;
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae doloremque culpa cum earum eligendi nesciunt ea hic fugit accusantium doloribus, qui dolorem, maiores mollitia iure minima quam praesentium nobis, suscipit!
          &lt;/td&gt;
          &lt;td align="center" valign="middle"&gt;
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores consectetur modi quod voluptates. Facere eveniet a debitis, iure adipisci tempora harum dolor laboriosam cumque aliquam. Ducimus minus culpa placeat nam.
          &lt;/td&gt;
          &lt;td align="center" valign="bottom"&gt;
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat magnam, corporis accusantium, dolorum voluptates aut dignissimos voluptatum dolorem quae culpa eligendi in quasi? Consequatur nulla dolorum, ratione quibusdam, soluta commodi.
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;/tbody&gt;
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
    <?php $this->load->view('belajar/html/hasil/markas/script', NULL, FALSE); ?>
  </body>
</html>