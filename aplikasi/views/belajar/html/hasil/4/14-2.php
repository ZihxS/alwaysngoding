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
    &lt;title&gt;Atribut cellspacing&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Belajar atribut cellspacing pada tabel HTML&lt;/h1&gt;
    &lt;h3&gt;Default&lt;/h3&gt;
    &lt;table border="1"&gt;
      &lt;tr&gt;
          &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
          &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
          &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
          &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
          &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
          &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
          &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
          &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
          &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
      &lt;/tr&gt;
    &lt;/table&gt;
    &lt;br&gt;
    &lt;h3&gt;Penggunaan atribut cellspacing&lt;/h3&gt;
    &lt;table border="1" cellspacing="10"&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
        &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
        &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
      &lt;/tr&gt;
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