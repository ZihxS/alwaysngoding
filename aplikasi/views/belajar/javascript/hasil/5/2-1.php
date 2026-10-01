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
          <textarea id="code">function ucapkanSelamatPagi() {
  console.log('Selamat pagi <?= $this->session->ang_nama_pengguna; ?>...');
  console.log('Ngeteh pagi-pagi nikmat kayanya...\n');
}

function ucapkanSelamatSiang() {
  console.log('Selamat siang <?= $this->session->ang_nama_pengguna; ?>...');
  console.log('Jangan lupa makan siang biar selalu kuat dan bersemangat...\n');
}

function ucapkanSelamatMalam() {
  console.log('Selamat malam <?= $this->session->ang_nama_pengguna; ?>...');
  console.log('Selamat tidur...\n');
}

// menjalankan atau memanggil fungsi ucapkanSelamatPagi
ucapkanSelamatPagi();

// menjalankan atau memanggil fungsi ucapkanSelamatSiang
ucapkanSelamatSiang();

// menjalankan atau memanggil fungsi ucapkanSelamatMalam
ucapkanSelamatMalam();</textarea>
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