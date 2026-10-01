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
            <h2 class="judul-teori">Objek (Object) Pada JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <pre class="language-javascript"><code>var motor = {
  // property
  merek: "Honda",
  warna: "Biru",
  tahunPembuatan: 2013,

  // method
  nyalakanMesin: function(){
    console.log("mesin motor menyala...");
  },
  matikanMesin: function(){
    console.log("mesin motor mati...");
  },
  isiBensin: function(){
    console.log("motor diisi bensin...");
    console.log("tangki bensin 80% terisi...");
  }
};</code></pre>
              <p>Masih ingat kode yang ada di atas?, jika lupa kalian bisa mundur dulu ke: <a href="<?= site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/27'); ?>" target="_blank"><?= site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/27'); ?></a>.</p>
              <p>Bagaimana ya cara mengambil isi property merek, warna dan tahunPembuatan pada objek motor?, pertama-tama kita harus ketik variabel objeknya lalu dilanjutkan dengan titik <q>.</q> setelah itu kita ketik property yang ingin kita ambil isinya.</p>
              <p class="mb-0">Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript"><code>var motor = {
  // property
  merek: "Honda",
  warna: "Biru",
  tahunPembuatan: 2013,

  // method
  nyalakanMesin: function(){
    console.log("mesin motor menyala...");
  },
  matikanMesin: function(){
    console.log("mesin motor mati...");
  },
  isiBensin: function(){
    console.log("motor diisi bensin...");
    console.log("tangki bensin 80% terisi...");
  }
};

console.log('merek motor: ' + motor.merek); // merek motor: Honda
console.log('warna motor: ' + motor.warna); // warna motor: Biru
console.log('motor ini dibuat pada tahun: ' + motor.tahunPembuatan); // motor ini dibuat pada tahun: 2013</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Pada kode yang ada diatas kita mempunyai method pada objek motor, sebenarnya method itu function yang telah kita pelajari pada bagian-bagian sebelumnya. Lalu bagaimana cara memanggil method pada objek motor?, sebenarnya tidak jauh beda seperti memanggil nilai pada property motor.</p>
              <p>Cara memanggil method pada sebuah objek pertama-tama harus mengetik nama objek yang telah dibuat lalu dilanjutkan dengan titik <q>.</q> setelah itu kita tinggal ketik saja nama methodnya (penulisan nama methodnya seperti kita memanggil fungsi ya).</p>
              <p class="mb-0">Perhatikan kode di bawah ini:</p>
              <pre class="language-javascript"><code>var motor = {
  // property
  merek: "Honda",
  warna: "Biru",
  tahunPembuatan: 2013,

  // method
  nyalakanMesin: function(){
    console.log("mesin motor menyala...");
  },
  matikanMesin: function(){
    console.log("mesin motor mati...");
  },
  isiBensin: function(){
    console.log("motor diisi bensin...");
    console.log("tangki bensin 80% terisi...");
  }
};

motor.nyalakanMesin();
motor.isiBensin();
motor.matikanMesin();</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Kalian bisa coba kode yang ada di atas dan lihat lah hasilnya.</p>
              <p class="mb-0">Pada sebelumnya jika kita membuat fungsi syntaxnya seperti berikut: <code class="custom">function namaFungsi()</code> tetapi untuk method pada objek kita cukup tulis <code class="custom">function()</code> saja (tidak perlu pakai nama fungsi lagi).</p>
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