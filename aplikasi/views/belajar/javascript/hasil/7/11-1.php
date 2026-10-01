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
          <textarea id="code">var kalimat = 'Belajar JavaScript di https://example.test sangat seru dan menyenangkan.';

// mengambil 'https://example.test' dari variabel kalimat
console.log(kalimat.substr(22, 25)); // dimulai dari index 22 dan ambil 25 karakter
console.log(kalimat.substring(22, 47)); // dimulai dari index 22 dan diakhiri di index 47

// mengambil 'Belajar JavaScript' dari variabel kalimat
console.log(kalimat.substr(0, 18)); // dimulai dari index 0 dan ambil 18 karakter
console.log(kalimat.substring(0, 18)); // dimulai dari index 0 dan diakhiri di index 18

// mengambil 'JavaScript' dari variabel kalimat
console.log(kalimat.substr(8, 10)); // dimulai dari index 8 dan ambil 10 karakter
console.log(kalimat.substring(8, 18)); // dimulai dari index 8 dan diakhiri di index 18

// mengambil 'sangat seru' dari variabel kalimat
console.log(kalimat.substr(48, 11)); // dimulai dari index 48 dan ambil 11 karakter
console.log(kalimat.substring(48, 59)); // dimulai dari index 48 dan diakhiri di index 59</textarea>
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
