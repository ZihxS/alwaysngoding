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
for ($a = 9; $a > 0; $a--) {
  for ($i = 1; $i <= $a; $i++) {
    echo "&nbsp;&nbsp;";
  }
  for ($a1 = 10; $a1 > $a; $a1--) {
    echo "*";
  }
  for ($a2 = 9; $a2 > $a; $a2--) {
    echo "*";
  }
  echo "&lt;br&gt;";
}
for ($b = 0; $b <= 9; $b++) {
  for ($j = 1; $j <= $b; $j++) {
    echo "&nbsp;&nbsp;";
  }
  for ($b1 = 10; $b1 > $b; $b1--) {
    echo "*";
  }
  for ($b2 = 9; $b2 > $b; $b2--) {
    echo "*";
  }
  echo "&lt;br&gt;";
}</textarea>
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