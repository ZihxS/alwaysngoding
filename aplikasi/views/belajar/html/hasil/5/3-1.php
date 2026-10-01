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
    &lt;title&gt;Membuat formulir pendaftaran&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h2&gt;Formulir pendaftaran anggota&lt;/h2&gt;
    &lt;h3&gt;Silahkan isi dengan benar&lt;/h3&gt;
    &lt;form action="daftar_anggota.php" method="POST" onsubmit="alert('Maaf ini hanya contoh, jadi tidak di proses.'); return false;"&gt;
      &lt;table border="1" rules="all" cellpadding="5"&gt;
        &lt;tr&gt;
          &lt;td&gt;Nama pengguna:&lt;/td&gt;
          &lt;td&gt;
            &lt;input type="text" name="nama_pengguna"&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Nama lengkap:&lt;/td&gt;
          &lt;td&gt;
            &lt;input type="text" name="nama_lengkap"&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Email:&lt;/td&gt;
          &lt;td&gt;
            &lt;input type="email" name="email"&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td&gt;Kata sandi:&lt;/td&gt;
          &lt;td&gt;
            &lt;input type="password" name="kata_sandi"&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
          &lt;td colspan="2" align="right"&gt;
            &lt;input type="submit" name="kirim" value="Daftar"&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;/table&gt;
    &lt;/form&gt;
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