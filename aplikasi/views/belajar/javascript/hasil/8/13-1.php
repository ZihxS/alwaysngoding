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
          <textarea id="code">var minuman = ['Cendol Dawet', 'Bajigur', 'Bandrek', 'Es Doger', 'Kopi', 'Sirup', 'Teh', 'Susu', 'Air Bening'];

var contohSlice1 = minuman.slice(3);
var contohSlice2 = minuman.slice(1,3);
var contohSlice3 = minuman.slice(4,7);
var contohSlice4 = minuman.slice(-3);
var contohSlice5 = minuman.slice(-5,-2);

console.log(contohSlice1); // output: ['Es Doger','Kopi','Sirup','Teh','Susu','Air Bening']
console.log(contohSlice2); // output: ['Bajigur','Bandrek']
console.log(contohSlice3); // output: ['Kopi','Sirup','Teh']
console.log(contohSlice4); // output: ['Teh','Susu','Air Bening']
console.log(contohSlice5); // output: ['Kopi','Sirup','Teh']</textarea>
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