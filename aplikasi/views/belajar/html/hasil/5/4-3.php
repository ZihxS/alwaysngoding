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
    Makanan kesukaan anda:
    &lt;input type="checkbox" name="makanan_kesukaan" value="Tahu"&gt; Tahu
    &lt;input type="checkbox" name="makanan_kesukaan" value="Tempe"&gt; Tempe
    &lt;input type="checkbox" name="makanan_kesukaan" value="Jengkol"&gt; Jengkol
    &lt;input type="checkbox" name="makanan_kesukaan" value="Rendang"&gt; Rendang
  &lt;/div&gt;
  &lt;div&gt;
    Minuman kesukaan anda:
    &lt;input type="checkbox" name="minuman_kesukaan" value="Susu"&gt; Susu
    &lt;input type="checkbox" name="minuman_kesukaan" value="Kopi"&gt; Kopi
    &lt;input type="checkbox" name="minuman_kesukaan" value="Bandrek"&gt; Bandrek
  &lt;/div&gt;
  &lt;div&gt;
    Pilih jenis kelamin:
    &lt;input type="radio" name="jenis_kelamin" value="Laki-laki"&gt; Laki-laki
    &lt;input type="radio" name="jenis_kelamin" value="Perempuan"&gt; Perempuan
  &lt;/div&gt;
  &lt;div&gt;
    Pilih lulusan:
    &lt;input type="radio" name="lulusan" value="SD"&gt; SD
    &lt;input type="radio" name="lulusan" value="SMP"&gt; SMP
    &lt;input type="radio" name="lulusan" value="SMA"&gt; SMA
    &lt;input type="radio" name="lulusan" value="SMK"&gt; SMK
  &lt;/div&gt;
  &lt;input type="submit" name="kirim" value="Proses"&gt;
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