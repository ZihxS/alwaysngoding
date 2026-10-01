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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/function-pada-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Fungsi Yang Megembalikan Nilai (Return a Value)</h2>
            <hr>
            <div class="konten-teori">
              <p>Hasil pengolahan nilai dari fungsi mungkin saja kita butuhkan untuk pemrosesan berikutnya. Oleh karena itu, kita harus membuat fungsi yang dapat mengembalikan nilai.</p>
              <p class="mb-0">Pengembalian nilai dalam fungsi dapat menggunakan kata kunci <b><q>return</q></b>. Berikut adalah contoh membuat fungsi yang mengembalikan nilai:</p>
              <pre class="language-php line-numbers"><code>&lt;?php
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
  echo "usia dodi adalah {$usia_dodi}";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-php line-numbers"><code>&lt;?php
  function cek_usia($usia) {
    if ($usia >= 0 && $usia <= 20) {
      $kondisi = 'masih muda';
    } else {
      $kondisi = 'sudah tua';
    }
    return $kondisi; // mengembalikan string
  }

  $dani = cek_usia(17);
  $dini = cek_usia(45);

  echo "dani {$dani}&lt;br&gt;";
  echo "dini {$dini}";
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/2"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <pre class="language-php line-numbers"><code>&lt;?php
  function hp_nyala($sisa_baterai) {
    if ($sisa_baterai > 1) {
      return TRUE; // mengembalikan boolean (TRUE)
    } else {
      return FALSE; // mengembalikan boolean (FALSE)
    }
  }

  for ($baterai = 100; $baterai > 0; $baterai--) {
    $kondisi_hp = hp_nyala($baterai);
    if ($kondisi_hp) {
      echo "HP masih menyala.&lt;br&gt;";
    } else {
      echo "HP sudah mati.";
    }
  }
?&gt;</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-php/hasil/5/{$b}/3"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p class="mb-0">Kode di atas adalah beberapa contoh pembuatan <b><q>function</q></b> pada PHP yang mengembalikan nilai (return a value). Nilai yang dikembalikan bisa berupa integer, float, string, boolean bahkan array juga bisa loh.</p>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-php/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>