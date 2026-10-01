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
  <?php $this->load->view('belajar/php/hasil/markas/kepala', NULL, FALSE); ?>
  <body class="hasil">
    <?php $this->load->view('belajar/php/hasil/markas/navigasi', NULL, FALSE); ?>
    <main class="hasil-main">
      <div class="container-fluid">
        <div class="code-hasil">
          <button class="btn btn-dark btn-file-name">index.php</button>
          <textarea id="code">/* Kalian tidak perlu menambahkan tag &lt;?php ?&gt; pada kode editor ini */
/* Tag &lt;?php ?&gt; sudah otomatis kami tambahkan saat anda mengeksekusi kode ini */
/* Jadi kalian bisa langsung eksekusi kode yang ada di bawahyaa ^_^ */

// membuat class komputer
class komputer {
   // property dengan hak akses protected
   private $jenis_processor = "Intel Core i7-4790 3.6Ghz";
   public function tampilkan_processor() {
     return $this->jenis_processor;
   }
}
// membuat class laptop
class laptop extends komputer{
   public function tampilkan_processor() {
     return $this->jenis_processor;
   }
}
// membuat object dari class komputer & laptop (instansiasi)
$komputer = new komputer();
$laptop = new laptop();
// menjalankan method dari class komputer
echo $komputer->tampilkan_processor(); // tidak error
echo "&lt;br&gt;";
// jalankan method dari class laptop
echo $laptop->tampilkan_processor(); // error (tidak dicetak di output)</textarea>
        </div>
        <div>
          <button class="btn btn-light btn-output">output</button>
          <iframe id="preview" frameborder="0"></iframe>
        </div>
        <?php $this->load->view('belajar/php/hasil/markas/tombol', NULL, FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/php/hasil/markas/script', NULL, FALSE); ?>
  </body>
</html>