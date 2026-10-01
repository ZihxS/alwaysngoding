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
$murid = [
  [
    'nama' => 'Muhammad Saleh Solahudin',
    'kelas' => 'XII',
    'jurusan' => 'Rekayasa Perangkat Lunak',
    'jenis_kelamin' => 'Laki-laki'
  ],
  [
    'nama' => 'Karmila Sriwulan',
    'kelas' => 'XII',
    'jurusan' => 'Rekayasa Perangkat Lunak',
    'jenis_kelamin' => 'Perempuan'
  ],
  [
    'nama' => 'Nurlaela Nafilah',
    'kelas' => 'X',
    'jurusan' => 'Multimedia',
    'jenis_kelamin' => 'Perempuan'
  ],
  [
    'nama' => 'Ibrahim',
    'kelas' => 'XI',
    'jurusan' => 'Teknik Komputer dan Jaringan',
    'jenis_kelamin' => 'Laki-laki'
  ]
];

echo $murid[0]['nama']; // mengambil nama murid pertama (Muhammad Saleh Solahudin)
echo "&lt;br&gt;";
echo $murid[1]['nama']; // mengambil nama murid kedua (Karmila Sriwulan)
echo "&lt;br&gt;";
echo $murid[2]['nama']; // mengambil nama murid ketiga (Nurlaela Nafilah)
echo "&lt;br&gt;";
echo $murid[3]['nama']; // mengambil nama murid keempat (Ibrahim)
echo "&lt;br&gt;";

echo $murid[0]['kelas']; // mengambil kelas murid pertama (XII)
echo "&lt;br&gt;";
echo $murid[1]['jurusan']; // mengambil jurusan murid kedua (Rekayasa Perangkat Lunak)
echo "&lt;br&gt;";
echo $murid[2]['jenis_kelamin']; // mengambil jenis kelamin murid ketiga (Perempuan)
echo "&lt;br&gt;";

echo "{$murid[1]['nama']} - {$murid[1]['kelas']} - {$murid[1]['jurusan']} - {$murid[1]['jenis_kelamin']}";
// output kode baris ke 38: Nurlaela Nafilah - X - Multimedia - Perempuan</textarea>
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