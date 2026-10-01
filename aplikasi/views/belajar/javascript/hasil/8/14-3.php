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
var makanan = ['Sushi', 'Nasi Goreng', 'Mie', 'Pizza', 'Burger', 'Cimol', 'Martabak Telor'];

// sebelum menggunakan method splice()
console.log(minuman);
console.log(makanan);

// sesudah menggunakan method splice()
var contohSplice1 = minuman.splice(6, 0, 'Mocktail', 'Jus');
var contohSplice2 = makanan.splice(2, 2, 'Rendang', 'Lumpia');

console.log(minuman); // output: ['Cendol Dawet','Bajigur','Bandrek','Es Doger','Kopi','Sirup','Mocktail','Jus','Teh','Susu','Air Bening']
console.log(makanan); // output: ['Sushi','Nasi Goreng','Rendang','Lumpia','Burger','Cimol','Martabak Telor']
console.log(contohSplice1); // outputnya array kosong, karena kita tidak menghapus apapun (karena arguman ke 2 nya 0)
console.log(contohSplice2); // output: ['Mie','Pizza']</textarea>
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