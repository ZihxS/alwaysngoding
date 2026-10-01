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
          <textarea id="code">var informasiMurid = [
  ['Abdul Ghani', 20, 'Laki-laki'],
  ['Annisa', 20, 'Perempuan']
];

// siku yang pertama adalah isi array informasiMurid
// siku yang kedua adalah isi array yang ada pada array informasiMurid
console.log('Nama murid ke 1: ' + informasiMurid[0][0]);
console.log('Umur murid ke 1: ' + informasiMurid[0][1]);
console.log('Jenis kelamin murid ke 1: ' + informasiMurid[0][2]);
console.log('=================================================');
console.log('Nama murid ke 2: ' + informasiMurid[1][0]);
console.log('Umur murid ke 2: ' + informasiMurid[1][1]);
console.log('Jenis kelamin murid ke 2: ' + informasiMurid[1][2]);</textarea>
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