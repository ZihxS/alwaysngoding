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
          <textarea id="code">&lt;form action="proses.php" method="POST" onsubmit="alert('Maaf ini hanya contoh, jadi tidak di proses.'); return false;"&gt;
  &lt;div&gt;
    &lt;input type="text" value="Ini akan otomatis fokus" autofocus="autofocus" size="25"&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="text" value="Atribut readonly" readonly="readonly"&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="text" value="Atribut disabled" disabled="disabled"&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    Nomor (5-15) (Harus di isi): &lt;input type="number" min="5" max="15" required="required"&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="text" placeholder="Minimal 1 karakter, maksimal 10 karakter, harus di isi" minlength="5" maxlength="10" required="required" size="50"&gt;
  &lt;/div&gt;
  &lt;br&gt;
  &lt;div&gt;
    &lt;input type="submit" name="proses" value="Proses"&gt;
  &lt;/div&gt;
&lt;/form&gt;</textarea>
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