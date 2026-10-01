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
          <textarea id="code">function hitungUsia(tahunLahir, tahunSekarang) {
  var usia = tahunSekarang - tahunLahir;
  return usia; // mengembalikan integer
}

var usiaAgus = hitungUsia(1990, 2021);
var usiaDanu = hitungUsia(1992, 2021);
var usiaAndi = hitungUsia(1995, 2021);
var usiaArif = hitungUsia(2000, 2021);
var usiaDori = hitungUsia(1885, 2021);

console.log('usia agus adalah ' + usiaAgus);
console.log('usia danu adalah ' + usiaDanu);
console.log('usia andi adalah ' + usiaAndi);
console.log('usia arif adalah ' + usiaArif);
console.log('usia dori adalah ' + usiaDori);</textarea>
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