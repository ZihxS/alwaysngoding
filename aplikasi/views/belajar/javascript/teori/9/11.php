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
            <h2 class="judul-teori">Destructuring Assignment</h2>
            <hr>
            <div class="konten-teori">
              <p>Destructuring Assignment memungkinkan kita untuk <q>membongkar</q> isi array dan object untuk disimpan pada beberapa variabel. Dengan menggunakan fitur ini, kita dapat menghemat kode secara signifikan.</p>
              <p class="mb-0"><b>Array Destructuring</b><br>Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers" data-line="3-6"><code>let contoh = ['satu', 'dua', 'tiga', 'empat'];

let a = contoh[0];
let b = contoh[1];
let c = contoh[2];
let d = contoh[3];

console.log(`${a} ${b} ${c} ${d}`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Di baris kode ke 3 sampai ke 6 kita mengakses masing-masing nilai dari array <q>contoh</q>, pada kode di atas kita menghabiskan 4 baris kode (baris 3 sampai 6).</p>
              <p class="mb-0">Dengan destructuring, kita dapat menulisnya hanya dalam 1 baris loh, perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers" data-line="3"><code>let contoh = ['satu', 'dua', 'tiga', 'empat'];

let [a, b, c, d] = contoh;

console.log(`${a} ${b} ${c} ${d}`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Pada kode di atas kita mengambil semua isi array <q>contoh</q>, jika kalian hanya ingin mengambil isi <q>satu</q> dan <q>dua</q> dari array <q>contoh</q> kalian tinggal hapus saja <q>c</q> dan <q>d</q> di baris ke 3, jadi kita bisa sepenuhnya menentukan isi yang ingin kita ambil. Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers" data-line="3"><code>let contoh = ['satu', 'dua', 'tiga', 'empat'];

let [a, b] = contoh;

console.log(`${a} ${b}`);</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0"><b>Object Destructuring</b><br>Destructuring juga dapat dilakukan terhadap object, perhatikan kode di bawah ini:</p>
              <pre class="language-javascript line-numbers" data-line="6"><code>let orang = {
  nama: 'Saleh',
  umur: 20
};

let {nama, umur} = orang;

console.log(`nama saya ${nama} dan umur saya ${umur} tahun.`);</code></pre>
              <div class="mb-3">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/4"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Seperti array destructuring, kita juga dapat melakukan destructuring terhadap object untuk mempersingkat kode dan menghemat baris kode. Jika array destructuring kita membungkus variabel-variabelnya dengan kurung siku, untuk object destructuring kita mengurung variabel-variabelnya dengan kurung kurawal.</p>
              <p class="mb-0">Contoh lain untuk object destructuring:</p>
              <pre class="language-javascript line-numbers" data-line="10"><code>let buku = {
  judul: 'Manusia Setengah Salmon',
  pembuat: 'Raditya Dika',
  penerbit: {
    nama: 'Gagas Media',
    alamat: 'Jakarta Selatan'
  }
}

let {judul, pembuat, penerbit:{nama, alamat}} = buku;

console.log(`buku buatan ${pembuat} yang berjudul ${judul} diterbitkan oleh ${nama} di ${alamat}.`);</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/9/{$b}/5"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Di baris ke 10 ada kode <code class="custom">penerbit:{nama, alamat}</code> yang berarti kita mengambil <q>nama</q> dan <q>alamat</q> yang ada di dalam <q>penerbit</q> (object penerbit).</p>
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