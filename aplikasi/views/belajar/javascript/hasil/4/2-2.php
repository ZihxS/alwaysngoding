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
  <?php $this->load->view('belajar/javascript/hasil/markas/kepala', NULL, FALSE); ?>
  <body class="hasil">
    <?php $this->load->view('belajar/javascript/hasil/markas/navigasi', NULL, FALSE); ?>
    <main class="hasil-main">
      <div class="container-fluid">
        <div class="code-hasil">
          <button class="btn btn-dark btn-file-name">index.js</button>
          <textarea id="code">var angkaPertama = 20;
var angkaKedua = 10;
var angkaKetiga = 7;
var hasilPertambahan = angkaPertama+angkaKedua; // pertambahan
var hasilPengurangan = angkaPertama-angkaKedua; // penguranan
var hasilPerkalian = angkaPertama*angkaKedua; // perkalian
var hasilPembagian = angkaPertama/angkaKedua; // pembagian
var hasilSisaPembagian = angkaKedua%angkaKetiga; // sisa pembagian (modulus)

console.log(hasilPertambahan); // 20 ditambah 10 = 30
console.log(hasilPengurangan); // 20 dikurang 10 = 10
console.log(hasilPerkalian); // 20 dikali 10 = 200
console.log(hasilPembagian); // 20 dibagi 10 = 2
console.log(hasilSisaPembagian); // sisa pembagian</textarea>
        </div>
        <div>
          <button class="btn btn-light btn-output">output</button>
          <iframe id="preview" frameborder="0"></iframe>
        </div>
        <?php $this->load->view('belajar/javascript/hasil/markas/tombol', NULL, FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/javascript/hasil/markas/script', NULL, FALSE); ?>
  </body>
</html>