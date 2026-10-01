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
  $u = 'belajar-javascript/teori/tipe-data-pada-javascript';
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
            <h2 class="judul-teori">Array pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p>Pada JavaScript array adalah sebuah tipe data bentukan yang terdiri dari kumpulan tipe data lainnya. Menggunakan array akan memudahkan dalam membuat kelompok data, serta menghemat penulisan dan penggunaan variabel.</p>
              <p>Sebelum membahas array lebih lanjut, alangkah baiknya kalian mengenal apa itu struktur data. Struktur data adalah cara-cara atau metode yang digunakan untuk menyimpan data dalam memori komputer atau laptop atau device lainnya. Salah satu dari struktur data yang sering kali digunakan dalam bahasa pemrograman yaitu array.</p>
              <p>Setiap data yang ada pada array memiliki indeks, sehingga bisa membuat kalian mudah dalam memprosesnya. Perlu kalian ingat indeks array selalu <b><q>dimulai dari 0</q></b>.</p>
              <p class="mb-0">Pada javascript, array dapat dibuat dengan tanda kurung siku (<code class="kustom">[]</code>):</p>
              <pre class="language-javascript"><code>var namaOrang = [];</code></pre>
              <p class="mb-0">Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript"><code>var namaOrang1 = "Joko";
var namaOrang2 = "Sukma";
var namaOrang3 = "Rina";
var namaOrang4 = "Sari";
var namaOrang5 = "Udin";
var namaOrang6 = "Ujang";
var namaOrang7 = "Bambang";
var namaOrang8 = "Pangestu";
var namaOrang9 = "Ahmad";</code></pre>
              <p class="mb-0">Jika kalian lihat kode di atas tentunya kalian akan berpikir itu wajar, tapi bagaimana jika data nama orang nya ada 1000?, mungkin kita bisa boros kode untuk membuat 1000 variabel untuk nama orang. Dengan array kita bisa menyederhanakan kode yang ada di atas, perhatikan kode di bawah ini:</p>
              <pre class="language-javascript"><code>var namaOrang = ['Joko', 'Sukma', 'Rina', 'Sari', 'Udin', 'Ujang', 'Bambang', 'Pangestu', 'Ahmad'];</code></pre>
              <p class="mb-0">Bagaimana?, kode di atas terlihat sangat pendek dan sederhana bukan?. Lalu bagaimana caranya jika kita ingin mencetak isi array ke console?, perhatikan contoh kode di bawah ini:</p>
              <pre class="language-javascript"><code>var namaOrang = ['Joko', 'Sukma', 'Rina', 'Sari', 'Udin', 'Ujang', 'Bambang', 'Pangestu', 'Ahmad'];

console.log(namaOrang[0]); // Joko
console.log(namaOrang[1]); // Sukma
console.log(namaOrang[2]); // Rina
console.log(namaOrang[3]); // Sari
console.log(namaOrang[4]); // Udin
console.log(namaOrang[5]); // Ujang
console.log(namaOrang[6]); // Bambang
console.log(namaOrang[7]); // Pangestu
console.log(namaOrang[8]); // Ahmad</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Loh kenapa dimulai dari 0? kalian perlu ingat bahwa indeks pada pemrograman selalu dimulai dari 0 ya teman-teman. Jadi jika kita menjalankan kode <code class="custom">console.log(namaOrang[1])</code> yang akan dicetak ke console adalah <q>Sukma</q> bukan <q>Joko</q> karena indeks satu isinya adalah <q>Sukma</q>.</p>
              <p>Kita bisa leluasa memproses array, sebagai contoh jika kita ingin mempersingkat kode yang ada di atas, kita bisa menggunakan bantuan perulangan untuk memproses array yang akan dicetak hasilnya ke console oleh bantuan perulangan agar kode lebih singkat.</p>
              <p class="mb-0">Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript"><code>var namaOrang = ['Joko', 'Sukma', 'Rina', 'Sari', 'Udin', 'Ujang', 'Bambang', 'Pangestu', 'Ahmad'];

for (var i = 0; i < namaOrang.length; i++){
  console.log(namaOrang[i])
}
</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/4/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Lebih singkat bukan?, untuk kode yang ada di atas jika kalian belum mengerti boleh dihiraukan terlebih dahulu. Yang sangat penting adalah kalian mengetahui kalau array itu mantap dan ajaib.</p>
              <p>Javascript merupakan bahasa pemrograman yang dynamic typing maka dari itu kita bisa menyimpan dan mencampur data apapun di dalam array.</p>
              <p class="mb-0">Contoh:</p>
              <pre class="language-javascript"><code>var data = [15, 13.15, false, true, null, 'contoh', "hanya contoh", ['array', 'didalam', 'array']];</code></pre>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 4], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>