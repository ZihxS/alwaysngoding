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

class komputer {
   public $merek;
   public $processor;
   public $memory;
   public function beli_komputer() {
     return "Saya membeli komputer baru";
   }
}
class laptop extends komputer {
   public function spesifikasi() {
     return "merek: {$this->merek}, processor: {$this->processor}, memory: {$this->memory}";
   }
}
// membuat object dari class laptop (instansiasi)
$laptop = new laptop();
// mengisi property dari class komputer yang bisa diakses oleh class laptop
$laptop->merek = "Lenovo";
$laptop->processor = "intel core i5";
$laptop->memory = "2 GB";
// memanggil method dari class komputer yang bisa diakses oleh class laptop
echo $laptop->beli_komputer();
echo "&lt;br&gt;";
// memanggil method dari class laptop
echo $laptop->spesifikasi();</textarea>
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