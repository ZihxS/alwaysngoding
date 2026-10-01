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

  $b = $this->uri->segment(5); // Bagian
  $p = $b-1; // Sebelumnya (Previous)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/function-dan-object-pada-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'javascript', 'label' => 'Teori JavaScript', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Fungsi (Function) Pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-0">Fungsi pada JavaScript dapat dibuat dengan kata kunci function, lalu diikuti dengan nama fungsinya. Berikut ini contoh dasar cara membuat fungsi di JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>// tanpa parameter
function contohFungsi1() {
  // blok kode / tempat untuk menulis kode (intruksi) dari fungsi
}

// dengan parameter
function contohFungsi2(parameter1, parameter2, parameter3) {
  // blok kode / tempat untuk menulis kode (intruksi) dari fungsi
}</code></pre>
              <p class="mb-0">Contoh sederhana pemakaian fungsi pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>function ucapkanSelamatPagi() {
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
ucapkanSelamatMalam();</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Contoh pemakaian fungsi dengan parameter pada JavaScript:</p>
              <pre class="language-javascript line-numbers"><code>function perkenalanDiri($nama, $umur, $hobi, $makananFav, $minumanFav) {
  console.log('Nama saya adalah: ' + $nama);
  console.log('Umur: ' + $umur + ' tahun');
  console.log('Hobi saya adalah: ' + $hobi);
  console.log('Makanan kesukaan saya adalah: ' + $makananFav);
  console.log('Minuman kesukaan saya adalah: ' + $minumanFav);
  console.log(''); // abaikan, ini untuk membuat baris baru
}

// menjalankan atau memanggil fungsi perkenalanDiri
perkenalanDiri('Abdul Ghani', 20, 'Main Bola', 'Rendang', 'Soda');

// menjalankan atau memanggil fungsi perkenalanDiri
perkenalanDiri('Bobon Hermanto', 18, 'Berenang', 'Mie Goreng', 'Kopi');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Dari kode yang ada di atas kita bisa simpulkan bahwa fungsi pada JavaScript sangat membantu untuk menghemat tenaga dan baris kode. Kita bisa menjalankan fungsi dengan data yang berbeda beberapa kali. Perhatikan perbedaannya memakai fungsi (kode yang ada di atas) dan tidak memakai fungsi (kode di bawah ini):</p>
              <pre class="language-javascript line-numbers"><code>// perkenalan diri 1
console.log('Nama saya adalah: Abdul Ghani');
console.log('Umur: 20 tahun');
console.log('Hobi saya adalah: Main Bola');
console.log('Makanan kesukaan saya adalah: Rendang');
console.log('Minuman kesukaan saya adalah: Soda');
console.log('');

// perkenalan diri 2
console.log('Nama saya adalah: Bobon Hermanto');
console.log('Umur: 18 tahun');
console.log('Hobi saya adalah: Berenang');
console.log('Makanan kesukaan saya adalah: Mie Goreng');
console.log('Minuman kesukaan saya adalah: Kopi');
console.log('');</code></pre>
              <p class="mb-0">Kode di atas hanya untuk 2 kali perkenalan diri, bagaimana kalo ada 100?, bisa kalian bayangkan sendiri yaa 😁</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>