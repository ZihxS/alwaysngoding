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
          <textarea id="code">var rataRataNilai = 78;

if (rataRataNilai >= 85 && rataRataNilai <= 100) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 85 dan jika variabel rataRataNilai lebih kecil dari atau sama dengan 100
{
  console.log('Predikat: A');
}
else if (rataRataNilai >= 75) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 75
{
  console.log('Predikat: B');
}
else if (rataRataNilai >= 60) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 60
{
  console.log('Predikat: C');
}
else if (rataRataNilai >= 50) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 50
{
  console.log('Predikat: D');
}
else if (rataRataNilai >= 0) // Jika variabel rataRataNilai lebih besar dari atau sama dengan 0
{
  console.log('Predikat: E');
}
else // Jika semua kondisi di atas tidak tereksekusi, maka blok else akan dijalankan
{
  console.log('Nilai tidak valid.');
}</textarea>
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