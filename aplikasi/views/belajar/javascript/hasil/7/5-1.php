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
          <textarea id="code">function tag1(strings, nama, umur) {
  var string1 = strings[0];
  var string2 = strings[1];
  var string3 = strings[2];

  return `${string1}${nama}${string2}${umur}${string3}`;
};

function tag2(strings, nama, umur) {
  return strings;
};

function tag3(strings, nama, umur) {
  return `ini hasil dari ekspresi interpolasi: '${nama}' dan '${umur}'.`;
};

var nama = "Saleh";
var umur = 20;

var contohPenggunaanTag1 = tag1`Nama saya ${nama} dan saya berumur ${umur} tahun.`;
var contohPenggunaanTag2 = tag2`Nama saya ${nama} dan saya berumur ${umur} tahun.`;
var contohPenggunaanTag3 = tag3`Nama saya ${nama} dan saya berumur ${umur} tahun.`;

console.log(contohPenggunaanTag1);
console.log(contohPenggunaanTag2);
console.log(contohPenggunaanTag3);</textarea>
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