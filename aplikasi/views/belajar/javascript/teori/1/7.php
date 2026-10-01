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
  $x = str_replace('Javascript','JavaScript',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-javascript/teori/berkenalan-dengan-javascript';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar JavaScript - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => TRUE], FALSE); ?>
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
            <h2 class="judul-teori">Contoh Kode JavaScript</h2>
            <hr>
            <div class="konten-teori">
              <p class="mb-1">Berikut adalah contoh cara mencetak string dengan JavaScript:</p>
              <pre class="language-javascript"><code>console.log('Halo dunia, perkenalkan nama saya adalah <?= $this->session->ang_nama_pengguna; ?>.');</code></pre>
              <div class="mb-2">
                <a href="<?= site_url("belajar-javascript/hasil/1/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
              <p>Jika kode di atas dibandingkan dengan kode C++ dan Java maka kode di atas terlihat lebih simple, oleh karena itu javascript bisa dibilang mudah untuk dipelajari.</p>
              <p class="mb-1">Berikut adalah contoh cara mencetak string dengan Java:</p>
              <pre class="language-java"><code>class ContohHelloWorld
{
  public static void main(String[] args)
  {
    System.out.println("Halo dunia, perkenalkan nama saya adalah <?= $this->session->ang_nama_pengguna; ?>.");
  }
}</code></pre>
              <p class="mt-3 mb-1">Berikut adalah contoh cara mencetak string dengan C++:</p>
              <pre class="language-cpp"><code>#include &lt;iostream&gt;

int main()
{
  std::cout << "Halo dunia, perkenalkan nama saya adalah <?= $this->session->ang_nama_pengguna; ?>.";
  return 0;
}</code></pre>
            </div>
          </div>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/teori/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php $this->load->view('belajar/markas/teori/tombol-selesai', NULL, FALSE); ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => TRUE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/selesai-dari-tombol', ['bahasa' => 'javascript', 'modul_bagian' => 1, 'nama_modul' => 'Berkenalan Dengan JavaScript'], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>