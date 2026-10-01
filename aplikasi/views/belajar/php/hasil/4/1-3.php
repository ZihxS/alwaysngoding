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
$nilai = 75;

if ($nilai >= 85 AND $nilai <= 100) // Jika variabel $nilai lebih besar dari atau sama dengan 85 dan jika variabel $nilai lebih kecil dari atau sama dengan 100
{
  echo "Predikat: A";
}
elseif ($nilai >= 75) // Jika variabel $nilai lebih besar dari atau sama dengan 75
{
  echo "Predikat: B";
}
elseif ($nilai >= 60) // Jika variabel $nilai lebih besar dari atau sama dengan 60
{
  echo "Predikat: C";
}
elseif ($nilai >= 50) // Jika variabel $nilai lebih besar dari atau sama dengan 50
{
  echo "Predikat: D";
}
elseif ($nilai >= 0) // Jika variabel $nilai lebih besar dari atau sama dengan 0
{
  echo "Predikat: E";
}
else  // Jika semua kondisi di atas tidak tereksekusi, maka blok else akan dijalankan
{
  echo "Nilai tidak valid.";
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