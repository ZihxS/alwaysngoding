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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript';
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
            <h2 class="judul-teori">Method splice()</h2>
            <hr>
            <div class="konten-teori">
              <p>Walau memiliki nama method yang mirip dengan <code class="custom">slice()</code>, method <code class="custom">splice()</code> sepenuhnya berbeda. Method <code class="custom">splice()</code> adalah method serba bisa yang dapat digunakan untuk memotong array, menambahkan elemen pada array, bahkan melakukan keduanya sekaligus.</p>
              <p>Tidak seperti method <code class="custom">slice()</code> dan <code class="custom">concat()</code>, pemanggilan method ini akan mengubah array asal (sumbernya).</p>
              <p class="mb-0">Jika hanya diberikan satu buah argumen, method <code class="custom">splice()</code> akan berfungsi <q>menghapus</q> array asal (sumbernya) mulai dari index yang diberikan, dan mengembalikan nilai array yang <q>dihapus</q>. Perhatikan contoh yang di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>var minuman = ['Cendol Dawet', 'Bajigur', 'Bandrek', 'Es Doger', 'Kopi', 'Sirup', 'Teh', 'Susu', 'Air Bening'];

// sebelum menggunakan method splice()
console.log(minuman);

// sesudah menggunakan method splice()
var contohSplice = minuman.splice(4);

console.log(minuman); // output: ['Cendol Dawet', 'Bajigur', 'Bandrek', 'Es Doger']
console.log(contohSplice); // output: ['Kopi','Sirup','Teh','Susu','Air Bening']</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/8/{$b}/1?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada baris ke 7 kita menghapus elemen array <q>minuman</q> mulai dari index ke 4 sampai index akhir, hasil yang kita hapus tersebut tersimpan ke variabel <q>contohSplice</q>. Saat kita panggil array <q>minuman</q> lagi di baris ke 9 maka yang tersisa elemen dari index awal sampai index ke 3 (index ke 4 dan seterusnya sudah terhapus), jadi penggunaan method <code class="custom">splice()</code> langsung berefek ke array induknya atau array yang kita proses.</p>
              <p class="mb-0">Jika method <code class="custom">splice()</code> memiliki 2 argumen, maka argumen kedua berfungsi untuk menentukan seberapa banyak elemen yang akan dihapus. Jika elemen yang dihapus berada ditengah-tengah array asal (sumbernya), maka array asal (sumbernya) akan tersambung. Perhatikan contohnya yang di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>var minuman = ['Cendol Dawet', 'Bajigur', 'Bandrek', 'Es Doger', 'Kopi', 'Sirup', 'Teh', 'Susu', 'Air Bening'];

// sebelum menggunakan method splice()
console.log(minuman);

// sesudah menggunakan method splice()
var contohSplice = minuman.splice(2, 3); // hapus 3 elemen mulai dari index ke 2

console.log(minuman); // ['Cendol Dawet','Bajigur','Sirup','Teh','Susu','Air Bening']
console.log(contohSplice); // ['Bandrek','Es Doger','Kopi']</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/8/{$b}/2?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Method <code class="custom">splice()</code> mendukung argumen ke 3, 4 dan seterusnya. Jika elemen ke 3 dan seterusnya disertakan, argumen ini akan berfungsi sebagai elemen yang akan ditambahkan ke array asal (sumbernya) dimulai dari posisi argumen pertama. Berikut adalah contoh kode program <code class="custom">splice()</code> dengan 3 atau lebih argumen:</p>
              <pre class="language-javascript line-numbers"><code>var minuman = ['Cendol Dawet', 'Bajigur', 'Bandrek', 'Es Doger', 'Kopi', 'Sirup', 'Teh', 'Susu', 'Air Bening'];
var makanan = ['Sushi', 'Nasi Goreng', 'Mie', 'Pizza', 'Burger', 'Cimol', 'Martabak Telor'];

// sebelum menggunakan method splice()
console.log(minuman);
console.log(makanan);

// sesudah menggunakan method splice()
var contohSplice1 = minuman.splice(6, 0, 'Mocktail', 'Jus');
var contohSplice2 = makanan.splice(2, 2, 'Rendang', 'Lumpia');

console.log(minuman); // output: ['Cendol Dawet','Bajigur','Bandrek','Es Doger','Kopi','Sirup','Mocktail','Jus','Teh','Susu','Air Bening']
console.log(makanan); // output: ['Sushi','Nasi Goreng','Rendang','Lumpia','Burger','Cimol','Martabak Telor']
console.log(contohSplice1); // outputnya array kosong, karena kita tidak menghapus apapun (karena arguman ke 2 nya 0)
console.log(contohSplice2); // output: ['Mie','Pizza']</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/8/{$b}/3?kondisi=tambahanKonfigArray"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Penjelasan:</p>
              <ul>
                <li>Pada baris ke 9 kita tidak melakukan penghapusan karena argumen ke 2 nya 0, yang kita lakukan adalah menambah elemen baru setelah elemen ke 6, kita menambahkan elemen <q>Mocktail</q> dan <q>Jus</q> ke array <q>minuman</q>.</li>
                <li>Pada baris ke 10 kita menghapus 2 elemen mulai dari index ke 2 dan menambahkan elemen baru di index ke 2, kita menambahkan elemen <q>Rendang</q> dan <q>Lumpia</q> ke array <q>Minuman</q>.</li>
              </ul>
              <p class="mb-0">Method splice() ini mungkin sedikit sulit dipahami namun bisa sangat bermanfaat dalam pembuatan program.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 8], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>