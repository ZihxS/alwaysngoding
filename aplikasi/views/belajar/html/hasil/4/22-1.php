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
    &lt;title&gt;Tag colgroup dan col untuk Tabel HTML&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h2&gt;Tag colgroup dan col untuk Tabel HTML - Always Ngoding&lt;/h2&gt;
    &lt;table border="1"&gt;
      &lt;colgroup&gt;
        &lt;col bgcolor="red"&gt;
        &lt;col bgcolor="yellow"&gt;
        &lt;col bgcolor="green"&gt;
        &lt;col bgcolor="blue"&gt;
      &lt;/colgroup&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;th&gt;Judul 1&lt;/th&gt;
        &lt;!-- Kuning --&gt;
        &lt;th&gt;Judul 2&lt;/th&gt;
        &lt;!-- Hijau --&gt;
        &lt;th&gt;Judul 3&lt;/th&gt;
        &lt;!-- Biru --&gt;
        &lt;th&gt;Judul 4&lt;/th&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;td&gt;Baris 1, Kolom 1&lt;/td&gt;
        &lt;!-- Kuning --&gt;
        &lt;td&gt;Baris 1, Kolom 2&lt;/td&gt;
        &lt;!-- Hijau --&gt;
        &lt;td&gt;Baris 1, Kolom 3&lt;/td&gt;
        &lt;!-- Biru --&gt;
        &lt;td&gt;Baris 1, Kolom 4&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;td&gt;Baris 2, Kolom 1&lt;/td&gt;
        &lt;!-- Kuning --&gt;
        &lt;td&gt;Baris 2, Kolom 2&lt;/td&gt;
        &lt;!-- Hijau --&gt;
        &lt;td&gt;Baris 2, Kolom 3&lt;/td&gt;
        &lt;!-- Biru --&gt;
        &lt;td&gt;Baris 2, Kolom 4&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;!-- Merah --&gt;
        &lt;td&gt;Baris 3, Kolom 1&lt;/td&gt;
        &lt;!-- Kuning --&gt;
        &lt;td&gt;Baris 3, Kolom 2&lt;/td&gt;
        &lt;!-- Hijau --&gt;
        &lt;td&gt;Baris 3, Kolom 3&lt;/td&gt;
        &lt;!-- Biru --&gt;
        &lt;td&gt;Baris 3, Kolom 4&lt;/td&gt;
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