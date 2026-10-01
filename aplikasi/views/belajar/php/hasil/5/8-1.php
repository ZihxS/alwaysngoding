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
function hitung_usia($tahun_lahir, $tahun_sekarang) {
  $usia = $tahun_sekarang - $tahun_lahir;
  return $usia; // mengembalikan integer
}

$usia_dani = hitung_usia(1990, 2020);
$usia_dini = hitung_usia(1992, 2020);
$usia_duni = hitung_usia(1995, 2020);
$usia_deni = hitung_usia(1998, 2020);
$usia_dodi = hitung_usia(2000, 2020);

echo "usia dani adalah {$usia_dani}&lt;br&gt;";
echo "usia dini adalah {$usia_dini}&lt;br&gt;";
echo "usia duni adalah {$usia_duni}&lt;br&gt;";
echo "usia deni adalah {$usia_deni}&lt;br&gt;";
echo "usia dodi adalah {$usia_dodi}";</textarea>
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