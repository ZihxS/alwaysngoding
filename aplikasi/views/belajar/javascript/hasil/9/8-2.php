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
          <textarea id="code">let umur = 0;
let tanggalSekarang = new Date();
let tanggalLahir = new Date("25 March 1999");

if (tanggalSekarang.getMonth() < tanggalLahir.getMonth()) {
  // dikurangi 1 karena bulannya belum memenuhi syarat (bukan bulan ulang tahunnya)
  umur = tanggalSekarang.getFullYear() - tanggalLahir.getFullYear() - 1;
} else if ((tanggalSekarang.getMonth() == tanggalLahir.getMonth()) && tanggalSekarang.getDate() < tanggalLahir.getDate()) {
  // dikurangi 1 karena harinya belum memenuhi syarat (bukan hari ulang tahunnya)
  umur = tanggalSekarang.getFullYear() - tanggalLahir.getFullYear() - 1;
} else {
  umur = tanggalSekarang.getFullYear() - tanggalLahir.getFullYear();
}

console.log(`sekarang tanggal ${tanggalSekarang.getDate()} bulan ke ${tanggalSekarang.getMonth()} tahun ${tanggalSekarang.getFullYear()}.`);
console.log(`kamu lahir pada tanggal ${tanggalLahir.getDate()} bulan ke ${tanggalLahir.getMonth()} tahun ${tanggalLahir.getFullYear()}.`);
console.log(`sekarang umur kamu adalah: ${umur} tahun.`);

if (umur >= 17) {
  console.log("kamu sudah boleh menonton film the conjuring 3.");
} else {
  console.log("maaf, kamu belum boleh menonton film the conjuring 3.");
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