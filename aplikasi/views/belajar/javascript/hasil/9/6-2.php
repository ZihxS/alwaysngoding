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
          <textarea id="code">let dateTime = new Date(); // mengambil tanggal dan waktu sekarang
let tanggal = dateTime.getDate(); // mengambil tanggal dari variabel dateTime
let hari = dateTime.getDay(); // mengambil hari dari variabel dateTime (isinya 0 ~ 6, 0 = minggu dan 6 = sabtu)
let bulan = dateTime.getMonth(); // mengambil bulan dari variabel dateTime (isinya 0 ~ 11, 0 = januari dan 11 = desember)
let tahun = dateTime.getFullYear(); // mengambil tahun dari variabel dateTime
let jam = dateTime.getHours(); // mengambil jam dari variabel dateTime
let menit = dateTime.getMinutes(); // mengambil menit dari variabel dateTime
let detik = dateTime.getSeconds(); // mengambil detik dari variabel dateTime

console.log(tanggal);
console.log(hari);
console.log(bulan);
console.log(tahun);
console.log(jam);
console.log(menit);
console.log(detik);</textarea>
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