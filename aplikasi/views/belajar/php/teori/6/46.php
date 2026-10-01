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
  $m = $this->uri->segment(3); // Modul
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $x = str_replace('Pbo','PBO',$x);
  $x = str_replace('Oop','(OOP)',$x);
  $u = 'belajar-php/teori/pbo-oop-pada-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'php', 'label' => 'Teori PHP', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-php">
        <div class="kotak-soal">
          <h4 class="judul-soal">Soal ke 30</h4>
          <hr>
          <pre class="language-php line-numbers"><code>&lt;?php
class kendaraan {
  protected $jumlah_roda;
  protected $merek;
  protected $warna;
  public function hidupkan_mesin() {
    return "Broom... Broom... Broom...&lt;br&gt;";
  }
  protected function matikan_mesin() {
    return "Mesin mobil dimatikan...";
  }
}
class mobil extends kendaraan {
  private $bahan_bakar;
  private $harga;
  private $sudah_dimodifikasi;
  public function __construct($jumlah_roda, $merek, $warna, $harga, $bahan_bakar, $sudah_dimodifikasi = FALSE) {
    $this->jumlah_roda = $jumlah_roda;
    $this->merek = $merek;
    $this->warna = $warna;
    $this->harga = $harga;
    $this->bahan_bakar = $bahan_bakar;
    $this->sudah_dimodifikasi = $sudah_dimodifikasi;
    echo $this->hidupkan_mesin();
  }
  public function jumlah_roda() {
    return "Jumlah roda mobil ini adalah {$this->jumlah_roda}&lt;br&gt;";
  }
  public function merek() {
    return "Merek mobil ini adalah {$this->merek}&lt;br&gt;";
  }
  public function ganti_warna($warna) {
    $this->warna = $warna;
    return "Warna mobil diganti menjadi {$this->warna}&lt;br&gt;";
  }
  public function warna() {
    return "Warna mobil ini adalah {$this->warna}&lt;br&gt;";
  }
  public function set_bahan_bakar($value) {
    $this->bahan_bakar = $value;
    return "Bahan bakar mobil ini tersisa {$this->bahan_bakar}%&lt;br&gt;";
  }
  public function modifikasi() {
    $this->sudah_dimodifikasi = TRUE;
    return "Anda telah memodifikasi mobil ini&lt;br&gt;";
  }
  public function status_modifikasi() {
    if ($this->sudah_dimodifikasi) {
      return "Mobil ini sudah dimodifikasi&lt;br&gt;";
    } else {
      return "Mobil ini belum dimodifikasi&lt;br&gt;";
    }
  }
  public function matikan_mesin_mobil() {
    return $this->matikan_mesin();
  }
}
$mobil = new mobil(4, "honda", "biru", 125000000, 100);
echo $mobil->jumlah_roda();
echo $mobil->merek();
echo $mobil->warna();
echo $mobil->ganti_warna("merah");
echo $mobil->warna();
echo $mobil->set_bahan_bakar(50);
echo $mobil->status_modifikasi();
echo $mobil->modifikasi(TRUE);
echo $mobil->status_modifikasi();
echo $mobil->matikan_mesin_mobil();
?&gt;</code></pre>
          <p class="mb-1">Rangkaliah agar menghasilkan output yang sesuai dari kode di atas!</p>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <input id="arrRangkaian" type="hidden" name="arrRangkaian">
            <div class="konten-soal">
              <!-- 10 -> 3 -> 8 -> 6 -> 4 -> 2 -> 1 -> 11 -> 5 -> 7 -> 9 -->
              <ol id="rangkaian" class="slip">
                <!-- 1 --> <li class="ns">Bahan bakar mobil ini tersisa 50%</li> <!-- 7 -->
                <!-- 2 --> <li class="ns">Warna mobil ini adalah merah</li> <!-- 6 -->
                <!-- 3 --> <li class="ns">Jumlah roda mobil ini adalah 4</li> <!-- 2 -->
                <!-- 4 --> <li class="ns">Warna mobil diganti menjadi merah</li> <!-- 5 -->
                <!-- 5 --> <li class="ns">Anda telah memodifikasi mobil ini</li> <!-- 9 -->
                <!-- 6 --> <li class="ns">Warna mobil ini adalah biru</li> <!-- 4 -->
                <!-- 7 --> <li class="ns">Mobil ini sudah dimodifikasi</li> <!-- 10 -->
                <!-- 8 --> <li class="ns">Merek mobil ini adalah honda</li> <!-- 3 -->
                <!-- 9 --> <li class="ns">Mesin mobil dimatikan...</li> <!-- 11 -->
                <!-- 10 --> <li class="ns">Broom... Broom... Broom...</li> <!-- 1 -->
                <!-- 11 --> <li class="ns">Mobil ini belum dimodifikasi</li> <!-- 8 -->
              </ol>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_php',6) > $b): ?>
            <?php $this->load->view('belajar/markas/teori/tombol-selesai-soal', ['bahasa' => 'php'], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <script>let arrRangkaian = ["<?= sha1(1); ?>","<?= sha1(2); ?>","<?= sha1(3); ?>","<?= sha1(4); ?>","<?= sha1(5); ?>","<?= sha1(6); ?>","<?= sha1(7); ?>","<?= sha1(8); ?>","<?= sha1(9); ?>","<?= sha1(10); ?>","<?= sha1(11); ?>"];</script>
    <?php $this->load->view('belajar/markas/soal/js/selesai-dari-soal', ['bahasa' => 'php', 'r' => TRUE, 'e' => TRUE], FALSE); ?>
  </body>
</html>