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
  $u = 'belajar-javascript/teori/lebih-banyak-tentang-javascript';
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
            <h2 class="judul-teori">Rest Parameter</h2>
            <hr>
            <div class="konten-teori">
              <p>Rest Parameter berguna untuk menghandle atau menangani beberapa parameter sekaligus. Penulisan rest parameter sama seperti spread operator yaitu menggunakan tiga titik (<code class="custom">...</code>), tapi untuk rest parameter kita gunakan untuk hal yang berbeda.</p>
              <p class="mb-0">Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers"><code>let beliBuah = (buah) => {
  console.log(`Bang beli buah ${buah} dong...`);
}

beliBuah('semangka', 'durian', 'nangka', 'melon', 'mangga');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kita membuat sebuah function <q>beliBuah</q> lalu didalam function tersebut kita mencetak nilai dari parameter <q>buah</q> pada console.log(), dan kita memanggil function <q>beliBuah</q> tersebut dengan memberikan beberapa nilai, jika kalian jalankan maka yang akan dihasilkan hanya akan tercetak parameter yang pertama yaitu <q>semangka</q> pada console.log() JavaScript.</p>
              <p class="mb-0">Lalu bagaimana jika kita ingin menampilkan semua nilai argumen nya?, kita bisa menggunakan rest parameter seperti ini:</p>
              <pre class="language-javascript line-numbers"><code>let beliBuah = (<mark class="keep">...buah</mark>) => {
  console.log(`Bang beli buah ${buah} dong...`);
}

beliBuah('semangka', 'durian', 'nangka', 'melon', 'mangga');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Contoh lain penggunaan rest parameter:</p>
              <pre class="language-javascript line-numbers"><code>let perkenalan = (nama, alamat, <mark class="keep">...hobi</mark>) => {
  console.log(`Perkenalkan nama saya ${nama}, saya tinggal di ${alamat}, hobi saya ${hobi}, salam kenal semuanya.`);
}

perkenalan('saleh solahudin', 'bogor', 'membaca', 'menulis', 'menanam', 'berenang', 'ngoding');
perkenalan('abdul ghani', 'jakarta', 'berselancar', 'bermain bola', 'ngoding');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-javascript line-numbers"><code>let jumlahkan = (<mark class="keep">...listAngka</mark>) => {
  let hasil = 0;

  listAngka.forEach((angka) => {
    hasil += angka;
  });

  return hasil;
}

console.log(jumlahkan(13, 31, 25, 12, 97, 23, 98, 69, 15));</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Untuk penggunaan rest parameter kalian harus menggunakannya pada parameter terakhir yaa.</p>
              <p class="mb-0">Jika kalian perhatikan method <code class="custom">Math.min()</code> dan <code class="custom">Math.max()</code> sebenarnya method bawaan tersebut memanfaatkan rest paramter juga loh, karena kita bisa memasukkan nilai argumennya semau kita sesuai kebutuhan kita.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-javascript/teori/segarkan', 'modul' => 9], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>