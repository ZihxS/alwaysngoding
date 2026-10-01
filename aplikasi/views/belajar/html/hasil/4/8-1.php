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
    &lt;title&gt;Table Head (Table Heading)&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Table Head (Table Heading) - Always Ngoding&lt;/h1&gt;
    &lt;table border="1" width="100%"&gt;
      &lt;tr&gt;
        &lt;th&gt;Nama&lt;/th&gt;
        &lt;th&gt;Kelas&lt;/th&gt;
        &lt;th&gt;Jurusan&lt;/th&gt;
        &lt;th&gt;Jenis Kelamin&lt;/th&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Karmila Sriwulan&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
        &lt;td&gt;Perempuan&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Zahwarudin Khalik&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;PT3RTV&lt;/td&gt;
        &lt;td&gt;Laki-laki&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Riki Januar&lt;/td&gt;
        &lt;td&gt;XI&lt;/td&gt;
        &lt;td&gt;Rekayasa Perangkat Lunak&lt;/td&gt;
        &lt;td&gt;Laki-laki&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;Fauzan Azima&lt;/td&gt;
        &lt;td&gt;XII&lt;/td&gt;
        &lt;td&gt;Teknik Komputer dan Jaringan&lt;/td&gt;
        &lt;td&gt;Laki-laki&lt;/td&gt;
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