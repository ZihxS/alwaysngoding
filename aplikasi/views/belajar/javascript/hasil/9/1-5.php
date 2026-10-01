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
          <textarea id="code">// global scope
var contohVar = "ini contohVar global scope";
let contohLet = "ini contohLet global scope";
const contohConst = "ini contohConst global scope";

console.log("memanggil variabel di global scope:");
console.log(contohVar);
console.log(contohLet);
console.log(contohConst);

function test() {
  // function scope (karena di dalam function)
  var contohVar = "ini contohVar function scope";
  let contohLet = "ini contohLet function scope";
  const contohConst = "ini contohConst function scope";

  console.log("\nmemanggil variabel di function scope:");
  console.log(contohVar);
  console.log(contohLet);
  console.log(contohConst);
}

test();

if (true) {
  // block scope (karena di dalam blok if)
  var contohVar = "ini contohVar block scope";
  let contohLet = "ini contohLet block scope";
  const contohConst = "ini contohConst block scope";

  console.log("\nmemanggil variabel di block scope:");
  console.log(contohVar);
  console.log(contohLet);
  console.log(contohConst);
}

console.log("\nmemanggil variabel di global scope:");
console.log(contohVar);
console.log(contohLet);
console.log(contohConst);</textarea>
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