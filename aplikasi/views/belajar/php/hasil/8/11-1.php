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
  <?php $this->load->view('belajar/php/hasil/markas/kepala', NULL, FALSE); ?>
  <body class="hasil">
    <?php $this->load->view('belajar/php/hasil/markas/navigasi', NULL, FALSE); ?>
    <main class="hasil-main">
      <div class="container-fluid">
        <div class="code-hasil">
          <button class="btn btn-dark btn-file-name">index.php</button>
          <textarea id="code">/* Kalian tidak perlu menambahkan tag &lt;?php ?&gt; pada kode editor ini */
/* Tag &lt;?php ?&gt; sudah otomatis kami tambahkan saat anda mengeksekusi kode ini */
/* Jadi kalian bisa langsung eksekusi kode yang ada di bawahyaa ^_^ */
$kalimat_1 = "Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!";
$kalimat_2 = "   Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!   ";
$kalimat_3 = "   Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!";
$kalimat_4 = "Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!   ";
echo strtolower($kalimat_1); // setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!
echo "&lt;hr&gt;";
echo strtoupper($kalimat_1); // SETIAP ORANG BISA MENCURI IDEMU, TAPI TIDAK SETIAP ORANG BISA MENCURI TINDAKANMU!
echo "&lt;hr&gt;";
echo ucfirst($kalimat_1); // Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri tindakanmu!
echo "&lt;hr&gt;";
echo ucwords($kalimat_1); // Setiap Orang Bisa Mencuri Idemu, Tapi Tidak Setiap Orang Bisa Mencuri Tindakanmu!
echo "&lt;hr&gt;";
echo trim($kalimat_2); // spasi (ruang kosong) di awal dan akhir string akan dihapus
echo "&lt;hr&gt;";
echo ltrim($kalimat_3); // spasi (ruang kosong) di awal string akan dihapus
echo "&lt;hr&gt;";
echo rtrim($kalimat_4); // spasi (ruang kosong) di akhir string akan dihapus
echo "&lt;hr&gt;";
echo strlen($kalimat_1); // 81
echo "&lt;hr&gt;";
echo str_word_count($kalimat_1); // 12
echo "&lt;hr&gt;";
echo strrev($kalimat_1); // !umnakadnit irucnem asib gnaro paites kadit ipat ,umedi irucnem asib gnaro paiteS
echo "&lt;hr&gt;";
echo str_replace("bisa", "dapat", $kalimat_1); // Setiap orang dapat mencuri idemu, tapi tidak setiap orang dapat mencuri tindakanmu!
echo "&lt;hr&gt;";
echo substr($kalimat_1, 38, 42); // tidak setiap orang bisa mencuri tindakanmu</textarea>
        </div>
        <div>
          <button class="btn btn-light btn-output">output</button>
          <iframe id="preview" frameborder="0"></iframe>
        </div>
        <?php $this->load->view('belajar/php/hasil/markas/tombol', NULL, FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/php/hasil/markas/script', NULL, FALSE); ?>
  </body>
</html>