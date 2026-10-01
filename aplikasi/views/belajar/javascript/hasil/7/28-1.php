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
          <textarea id="code">var contohNumber = 15;
var contohArray = ['anggur', 'apel', 'mangga', 'semangka', 'melon', 'jambu'];
var contohObject = {namaDepan: 'Saleh', namaBelakang: 'Solahudin'};
var contohBoolean = false;

// tidak menggunakan toString()
console.log(`tipe data contohNumber: ${typeof contohNumber}`);
console.log(`tipe data contohArray: ${typeof contohArray}`);
console.log(`tipe data contohObject: ${typeof contohObject}`);
console.log(`tipe data contohBoolean: ${typeof contohBoolean}`);

console.log('');

// menggunakan toString()
console.log(`tipe data contohNumber setelah menggunakan method toString(): ${typeof contohNumber.toString()}`);
console.log(`tipe data contohArray setelah menggunakan method toString(): ${typeof contohArray.toString()}`);
console.log(`tipe data contohObject setelah menggunakan method toString(): ${typeof contohObject.toString()}`);
console.log(`tipe data contohBoolean setelah menggunakan method toString(): ${typeof contohBoolean.toString()}`);</textarea>
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