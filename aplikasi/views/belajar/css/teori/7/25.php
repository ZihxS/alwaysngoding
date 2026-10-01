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

  $this->load->library('user_agent');

  $b = $this->uri->segment(5); // Bagian
  $p = $b-1; // Sebelumnya (Previous)
  $n = $b+1; // Selanjutnya (Next)
  $m = $this->uri->segment(3); // Modul
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-css/teori/transisi-transformasi-dan-animasi-pada-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <?php if ($this->agent->is_mobile()): ?>
          <div class="alert alert-info" role="alert">
            Untuk bagian (halaman) ini, kami menyarankan kalian untuk membuka pada PC atau laptop agar lebih mudah mengerjakan soal nya.
          </div>
        <?php endif; ?>
        <div class="kotak-soal">
          <h4 class="judul-soal">Soal ke 13</h4>
          <hr>
          <p class="m-0">Lengkapi kode di bawah dengan ketentuan:</p>
          <ol class="m-0">
            <li>Buat animasi dengan nama <b><q>animasi_1</q></b> yang mempunyai kondisi <b>0%</b>, <b>25%</b>, <b>50%</b>, <b>70%</b> dan <b>100%</b>:</li>
            <ol>
              <li>Pada <b>kondisi 0%</b>:</li>
              <ul>
                <li><b>Background</b> berwarna <b>skyblue</b>.</li>
                <li><b>Property left</b> mempunyai nilai <b>0 pixel</b>.</li>
                <li><b>Property top</b> mempunyai nilai <b>0 pixel</b>.</li>
                <li>Mempunyai property untuk <b>transformasi</b> dengan metode yang berfungsi untuk <b>memutar element</b>. Valuenya adalah <b>0 derajat</b>.</li>
              </ul>
              <li>Pada <b>kondisi 25%</b>:</li>
              <ul>
                <li><b>Background</b> berwarna <b>kuning</b> (dengan bahasa inggris).</li>
                <li><b>Property left</b> mempunyai nilai <b>200 pixel</b>.</li>
                <li><b>Property top</b> mempunyai nilai <b>0 pixel</b>.</li>
                <li>Mempunyai property untuk <b>transformasi</b> dengan metode yang berfungsi untuk <b>memutar element</b>. Valuenya adalah <b>90 derajat</b>.</li>
              </ul>
              <li>Pada <b>kondisi 50%</b>:</li>
              <ul>
                <li><b>Background</b> berwarna <b>hijau</b> (dengan bahasa inggris).</li>
                <li><b>Property left</b> mempunyai nilai <b>0 pixel</b>.</li>
                <li><b>Property top</b> mempunyai nilai <b>200 pixel</b>.</li>
                <li>Mempunyai property untuk <b>transformasi</b> dengan metode yang berfungsi untuk <b>memutar element</b>. Valuenya adalah <b>180 derajat</b>.</li>
              </ul>
              <li>Pada <b>kondisi 75%</b>:</li>
              <ul>
                <li><b>Background</b> berwarna <b>biru</b> (dengan bahasa inggris).</li>
                <li><b>Property left</b> mempunyai nilai <b>200 pixel</b>.</li>
                <li><b>Property top</b> mempunyai nilai <b>200 pixel</b>.</li>
                <li>Mempunyai property untuk <b>transformasi</b> dengan metode yang berfungsi untuk <b>memutar element</b>. Valuenya adalah <b>270 derajat</b>.</li>
              </ul>
              <li>Pada kondisi 100%:</li>
              <ul>
                <li><b>Background</b> nya sama seperti pada kondisi 0%.</li>
                <li><b>Property left</b> mempunyai nilai <b>0 pixel</b>.</li>
                <li><b>Property top</b> mempunyai nilai <b>0 pixel</b>.</li>
                <li>Mempunyai property untuk <b>transformasi</b> dengan metode yang berfungsi untuk <b>memutar element</b>. Valuenya adalah <b>360 derajat</b>.</li>
              </ul>
            </ol>
            <li>Buat <b>selector class</b> dengan nama <b><q>kotak_1</q></b>:</li>
            <ul>
              <li><b>Atur lebar dan tinggi nya</b> menjadi <b>125 pixel</b>.</li>
              <li><b>Atur padding kiri, atas, kanan, bawah</b> masing-masing <b>10 pixel</b>.</li>
              <li><b>Atur background</b> nya menjadi <b>warna pink</b>.</li>
              <li><b>Atur float</b> nya dengan value <b>left</b>.</li>
              <li><b>Atur margin bawahnya</b> dengan nilai <b>20 pixel</b>.</li>
              <li><b>Atur durasi transisi</b> dengan shortcut <b>setengah detik</b>.</li>
              <li><b>Atur transisi timing function</b> dengan value <b>linear</b>.</li>
              <li><b>Atur delay transisi</b> dengan shortcut <b>200ms</b>.</li>
              <li>Ketika cursor berada di element ini, maka:</li>
              <ol>
                <li><b>Background</b> berubah <b>menjadi warna teal</b>.</li>
                <li>Warna <b>text</b> berubah <b>menjadi warna putih</b>.</li>
                <li><b>Lebar dan tingginya</b> menjadi <b>200 pixel</b>.</li>
              </ol>
            </ul>
            <li>Buat <b>selector class</b> dengan nama <b><q>kotak_2</q></b>:</li>
            <ul>
              <li><b>Atur lebar dan tingginya</b> menjadi <b>125 pixel</b>.</li>
              <li><b>Atur padding kiri, atas, kanan, bawah</b> masing-masing <b>10 pixel</b>.</li>
              <li><b>Atur background</b> nya menjadi <b>warna pink</b>.</li>
              <li><b>Atur float</b> nya dengan value <b>left</b>.</li>
              <li><b>Atur margin kirinya</b> dengan nilai <b>20 pixel</b>.</li>
              <li><b>Atur durasi transisi</b> dengan shortcut <b>setengah detik</b>.</li>
              <li><b>Atur transisi timing function</b> dengan value <b>linear</b>.</li>
              <li>Ketika cursor berada di element ini, maka:</li>
              <ol>
                <li><b>Background</b> berubah <b>menjadi warna teal</b>.</li>
                <li>Warna <b>text</b> berubah <b>menjadi warna putih</b>.</li>
                <li>Terjadi <b>transformasi</b> yang berefek seperti efek <b>zoom</b> dengan value <b>1.1</b>.</li>
              </ol>
            </ul>
            <li>Buat <b>selector class</b> dengan nama <b><q>kotak_3</q></b>:</li>
            <ul>
              <li><b>Atur lebar dan tingginya</b> menjadi <b>125 pixel</b>.</li>
              <li><b>Atur padding kiri, atas, kanan, bawah</b> masing-masing <b>10 pixel</b>.</li>
              <li><b>Atur background</b> nya menjadi <b>warna pink</b>.</li>
              <li><b>Atur float</b> nya dengan value <b>left</b>.</li>
              <li><b>Atur margin kirinya</b> dengan nilai <b>20 pixel</b>.</li>
              <li><b>Atur durasi transisi</b> dengan shortcut <b>setengah detik</b>.</li>
              <li><b>Atur transisi timing function</b> dengan value <b>linear</b>.</li>
              <li>Ketika cursor berada di element ini, maka:</li>
              <ol>
                <li><b>Background</b> berubah <b>menjadi warna teal</b>.</li>
                <li>Warna <b>text</b> berubah <b>menjadi warna putih</b>.</li>
                <li>Terjadi <b>transformasi</b> yang berefek <b>memutar element</b> sampai <b>90 derajat</b>.</li>
              </ol>
            </ul>
            <li>Buat <b>selector class</b> dengan nama <b><q>kotak_4</q></b>:</li>
            <ul>
              <li><b>Atur lebar dan tingginya</b> menjadi <b>125 pixel</b>.</li>
              <li><b>Atur padding kiri, atas, kanan, bawah</b> masing-masing <b>10 pixel</b>.</li>
              <li><b>Atur background</b> nya menjadi <b>warna pink</b>.</li>
              <li><b>Atur float</b> nya dengan value <b>left</b>.</li>
              <li><b>Atur margin kirinya</b> dengan nilai <b>20 pixel</b>.</li>
              <li><b>Atur durasi transisi</b> dengan shortcut <b>setengah detik</b>.</li>
              <li><b>Atur transisi timing function</b> dengan value <b>linear</b>.</li>
              <li>Ketika cursor berada di element ini, maka:</li>
              <ol>
                <li><b>Background</b> berubah <b>menjadi warna teal</b>.</li>
                <li>Warna <b>text</b> berubah <b>menjadi warna putih</b>.</li>
                <li>Terjadi <b>transformasi</b> yang berefek <b>memutar element</b> sampai <b>minus 90 derajat</b>.</li>
              </ol>
            </ul>
            <li>Buat <b>selector class</b> dengan nama <b><q>kotak_5</q></b>:</li>
            <ul>
              <li><b>Atur lebar dan tingginya</b> menjadi <b>125 pixel</b>.</li>
              <li><b>Atur padding kiri, atas, kanan, bawah</b> masing-masing <b>10 pixel</b>.</li>
              <li><b>Atur background</b> nya menjadi <b>warna pink</b>.</li>
              <li><b>Atur posisinya</b> menjadi <b>relative</b>.</li>
              <li><b>Atur float</b> nya dengan value <b>left</b>.</li>
              <li><b>Atur margin kirinya</b> dengan nilai <b>20 pixel</b>.</li>
              <li>Buat animasi dengan ketentuan:</li>
              <ol>
                <li>Nama animasi nya adalah <b><q>animasi_1</q></b>.</li>
                <li><b>Durasi</b> nya adalah <b>3 detik</b>.</li>
                <li><b>Timing function</b> nya adalah <b>linear</b>.</li>
                <li><b>Delay</b> nya adalah <b>100ms</b> (dengan shortcut).</li>
              </ol>
            </ul>
            <li>Buat <b>selector class</b> dengan nama <b><q>kotak_6</q></b>:</li>
            <ul>
              <li><b>Atur lebar dan tingginya</b> menjadi <b>125 pixel</b>.</li>
              <li><b>Atur padding kiri, atas, kanan, bawah</b> masing-masing <b>10 pixel</b>.</li>
              <li><b>Atur background</b> nya menjadi <b>warna pink</b>.</li>
              <li><b>Atur float</b> nya dengan value <b>left</b>.</li>
              <li><b>Atur durasi transisi</b> dengan shortcut <b>setengah detik</b>.</li>
              <li><b>Atur transisi timing function</b> dengan value <b>linear</b>.</li>
              <li>Ketika cursor berada di element ini, maka:</li>
              <ol>
                <li><b>Background</b> berubah <b>menjadi warna teal</b>.</li>
                <li>Warna <b>text</b> berubah <b>menjadi warna putih</b>.</li>
                <li>Terjadi transformasi matrix ketentuan:</li>
                <ul>
                  <li><b>translateY()</b> bervalue <b>10</b>.</li>
                  <li><b>translateX()</b> bervalue <b>1</b>.</li>
                  <li><b>skewY()</b> bervalue <b>2.4</b>.</li>
                  <li><b>skewX()</b> bervalue <b>minus 1</b>.</li>
                  <li><b>scaleY()</b> bervalue <b>1</b>.</li>
                  <li><b>scaleX()</b> bervalue <b>0</b>.</li>
                </ul>
              </ol>
            </ul>
            <li>Buat <b>selector class</b> dengan nama <b><q>kotak_7</q></b>:</li>
            <ul>
              <li><b>Atur lebar dan tingginya</b> menjadi <b>125 pixel</b>.</li>
              <li><b>Atur padding kiri, atas, kanan, bawah</b> masing-masing <b>10 pixel</b>.</li>
              <li><b>Atur background</b> nya menjadi <b>warna pink</b>.</li>
              <li><b>Atur posisinya</b> menjadi <b>relative</b>.</li>
              <li><b>Atur float</b> nya dengan value <b>left</b>.</li>
              <li><b>Atur margin kiri</b> dengan nilai <b>20 pixel</b>.</li>
              <li>Buat animasi dengan ketentuan:</li>
              <ol>
                <li>Nama animasi nya adalah <b><q>animasi_2</q></b>.</li>
                <li><b>Durasi</b> nya adalah <b>3 detik</b>.</li>
                <li><b>Timing function</b> nya adalah <b>linear</b>.</li>
                <li><b>Iterasi</b> nya adalah <b>4 kali</b>.</li>
                <li><b>Direction</b> nya adalah <b>alternate</b>.</li>
              </ol>
            </ul>
            <li>Buat animasi dengan nama <b><q>animasi_2</q></b> yang mempunyai kondisi <b>awal</b> dan <b>akhir saja</b>:</li>
            <ol>
              <li>Pada <b>kondisi awal</b>:</li>
              <ul>
                <li><b>Background</b> berwarna <b>pink</b>.</li>
                <li><b>Atur radius</b> element nya menjadi <b>0</b>.</li>
              </ul>
              <li>Pada <b>kondisi akhir</b>:</li>
              <ul>
                <li><b>Background</b> berwarna <b>salmon</b>.</li>
                <li><b>Atur radius</b> element nya menjadi <b>20 pixel</b>.</li>
              </ul>
            </ol>
            <li>Lengkapi isian lainnya agar kode menjadi sempurna dan valid.</li>
          </ol>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;!DOCTYPE html&gt;
&lt;<input name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('html'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('lang'); ?>" autocomplete="off" required>="id"&gt;
  &lt;<input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('head'); ?>" autocomplete="off" required>&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;<input name="j_4" type="text" class="input-text-modifikasi" size="<?= strlen('style'); ?>" autocomplete="off" required>&gt;
      /* Animasi Ke 1 */
      <input name="j_5" type="text" class="input-text-modifikasi" size="<?= strlen('@keyframes animasi_1'); ?>" autocomplete="off" required> {
        <input name="j_6" type="text" class="input-text-modifikasi" size="<?= strlen('0%'); ?>" autocomplete="off" required> {
          <input name="j_7" type="text" class="input-text-modifikasi" size="<?= strlen('background-color'); ?>" autocomplete="off" required>: <input name="j_8" type="text" class="input-text-modifikasi" size="<?= strlen('skyblue'); ?>" autocomplete="off" required>;
          left: <input name="j_9" type="text" class="input-text-modifikasi" size="<?= strlen('0px'); ?>" autocomplete="off" required>;
          top: <input name="j_10" type="text" class="input-text-modifikasi" size="<?= strlen('0px'); ?>" autocomplete="off" required>;
          <input name="j_11" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_12" type="text" class="input-text-modifikasi" size="<?= strlen('rotate'); ?>" autocomplete="off" required>(<input name="j_13" type="text" class="input-text-modifikasi" size="<?= strlen('0deg'); ?>" autocomplete="off" required>);
        }
        <input name="j_14" type="text" class="input-text-modifikasi" size="<?= strlen('25%'); ?>" autocomplete="off" required> {
          <input name="j_15" type="text" class="input-text-modifikasi" size="<?= strlen('background-color'); ?>" autocomplete="off" required>: <input name="j_16" type="text" class="input-text-modifikasi" size="<?= strlen('yellow'); ?>" autocomplete="off" required>;
          left: <input name="j_17" type="text" class="input-text-modifikasi" size="<?= strlen('200px'); ?>" autocomplete="off" required>;
          top: <input name="j_18" type="text" class="input-text-modifikasi" size="<?= strlen('0px'); ?>" autocomplete="off" required>;
          <input name="j_19" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_20" type="text" class="input-text-modifikasi" size="<?= strlen('rotate'); ?>" autocomplete="off" required>(<input name="j_21" type="text" class="input-text-modifikasi" size="<?= strlen('90deg'); ?>" autocomplete="off" required>);
        }
        <input name="j_22" type="text" class="input-text-modifikasi" size="<?= strlen('50%'); ?>" autocomplete="off" required> {
          <input name="j_23" type="text" class="input-text-modifikasi" size="<?= strlen('background-color'); ?>" autocomplete="off" required>: <input name="j_24" type="text" class="input-text-modifikasi" size="<?= strlen('green'); ?>" autocomplete="off" required>;
          left: <input name="j_25" type="text" class="input-text-modifikasi" size="<?= strlen('0px'); ?>" autocomplete="off" required>;
          top: <input name="j_26" type="text" class="input-text-modifikasi" size="<?= strlen('200px'); ?>" autocomplete="off" required>;
          <input name="j_27" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_28" type="text" class="input-text-modifikasi" size="<?= strlen('rotate'); ?>" autocomplete="off" required>(<input name="j_29" type="text" class="input-text-modifikasi" size="<?= strlen('180deg'); ?>" autocomplete="off" required>);
        }
        <input name="j_30" type="text" class="input-text-modifikasi" size="<?= strlen('75%'); ?>" autocomplete="off" required> {
          <input name="j_31" type="text" class="input-text-modifikasi" size="<?= strlen('background-color'); ?>" autocomplete="off" required>: <input name="j_32" type="text" class="input-text-modifikasi" size="<?= strlen('blue'); ?>" autocomplete="off" required>;
          left: <input name="j_33" type="text" class="input-text-modifikasi" size="<?= strlen('200px'); ?>" autocomplete="off" required>;
          top: <input name="j_34" type="text" class="input-text-modifikasi" size="<?= strlen('200px'); ?>" autocomplete="off" required>;
          <input name="j_35" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_36" type="text" class="input-text-modifikasi" size="<?= strlen('rotate'); ?>" autocomplete="off" required>(<input name="j_37" type="text" class="input-text-modifikasi" size="<?= strlen('270deg'); ?>" autocomplete="off" required>);
        }
        <input name="j_38" type="text" class="input-text-modifikasi" size="<?= strlen('100%'); ?>" autocomplete="off" required> {
          <input name="j_39" type="text" class="input-text-modifikasi" size="<?= strlen('background-color'); ?>" autocomplete="off" required>: <input name="j_40" type="text" class="input-text-modifikasi" size="<?= strlen('skyblue'); ?>" autocomplete="off" required>;
          left: <input name="j_41" type="text" class="input-text-modifikasi" size="<?= strlen('0px'); ?>" autocomplete="off" required>;
          top: <input name="j_42" type="text" class="input-text-modifikasi" size="<?= strlen('0px'); ?>" autocomplete="off" required>;
          <input name="j_43" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_44" type="text" class="input-text-modifikasi" size="<?= strlen('rotate'); ?>" autocomplete="off" required>(<input name="j_45" type="text" class="input-text-modifikasi" size="<?= strlen('360deg'); ?>" autocomplete="off" required>);
        }
      }

      <input name="j_46" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>1 {
        width: <input name="j_47" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        height: <input name="j_48" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        padding: <input name="j_49" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
        background-color: <input name="j_50" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
        float: <input name="j_51" type="text" class="input-text-modifikasi" size="<?= strlen('left'); ?>" autocomplete="off" required>;
        margin-bottom: <input name="j_52" type="text" class="input-text-modifikasi" size="<?= strlen('20px'); ?>" autocomplete="off" required>;
        transition-duration: <input name="j_53" type="text" class="input-text-modifikasi" size="<?= strlen('.5s'); ?>" autocomplete="off" required>;
        transition-timing-<input name="j_54" type="text" class="input-text-modifikasi" size="<?= strlen('function'); ?>" autocomplete="off" required>: <input name="j_55" type="text" class="input-text-modifikasi" size="<?= strlen('linear'); ?>" autocomplete="off" required>;
        <input name="j_56" type="text" class="input-text-modifikasi" size="<?= strlen('transition-delay'); ?>" autocomplete="off" required>: <input name="j_57" type="text" class="input-text-modifikasi" size="<?= strlen('.2s'); ?>" autocomplete="off" required>;
      }
      <input name="j_58" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>1<input name="j_59" type="text" class="input-text-modifikasi" size="<?= strlen(':hover'); ?>" autocomplete="off" required> {
        background-color: <input name="j_60" type="text" class="input-text-modifikasi" size="<?= strlen('teal'); ?>" autocomplete="off" required>;
        color: <input name="j_61" type="text" class="input-text-modifikasi" size="<?= strlen('white'); ?>" autocomplete="off" required>;
        width: <input name="j_62" type="text" class="input-text-modifikasi" size="<?= strlen('200px'); ?>" autocomplete="off" required>;
        height: <input name="j_63" type="text" class="input-text-modifikasi" size="<?= strlen('200px'); ?>" autocomplete="off" required>;
      }

      <input name="j_64" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>2 {
        width: <input name="j_65" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        height: <input name="j_66" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        padding: <input name="j_67" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
        background-color: <input name="j_68" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
        float: <input name="j_69" type="text" class="input-text-modifikasi" size="<?= strlen('left'); ?>" autocomplete="off" required>;
        margin-left: <input name="j_70" type="text" class="input-text-modifikasi" size="<?= strlen('20px'); ?>" autocomplete="off" required>;
        <input name="j_71" type="text" class="input-text-modifikasi" size="<?= strlen('transition'); ?>" autocomplete="off" required>: all <input name="j_72" type="text" class="input-text-modifikasi" size="<?= strlen('.5s'); ?>" autocomplete="off" required> <input name="j_73" type="text" class="input-text-modifikasi" size="<?= strlen('linear'); ?>" autocomplete="off" required>;
      }
      <input name="j_74" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>2<input name="j_75" type="text" class="input-text-modifikasi" size="<?= strlen(':hover'); ?>" autocomplete="off" required> {
        background-color: <input name="j_76" type="text" class="input-text-modifikasi" size="<?= strlen('teal'); ?>" autocomplete="off" required>;
        color: <input name="j_77" type="text" class="input-text-modifikasi" size="<?= strlen('white'); ?>" autocomplete="off" required>;
        <input name="j_78" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_79" type="text" class="input-text-modifikasi" size="<?= strlen('scale'); ?>" autocomplete="off" required>(<input name="j_80" type="text" class="input-text-modifikasi" size="<?= strlen('1.1'); ?>" autocomplete="off" required>);
      }

      <input name="j_81" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>3 {
        width: <input name="j_82" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        height: <input name="j_83" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        padding: <input name="j_84" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
        background-color: <input name="j_85" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
        float: <input name="j_86" type="text" class="input-text-modifikasi" size="<?= strlen('left'); ?>" autocomplete="off" required>;
        margin-left: <input name="j_87" type="text" class="input-text-modifikasi" size="<?= strlen('20px'); ?>" autocomplete="off" required>;
        <input name="j_88" type="text" class="input-text-modifikasi" size="<?= strlen('transition'); ?>" autocomplete="off" required>: all <input name="j_89" type="text" class="input-text-modifikasi" size="<?= strlen('.5s'); ?>" autocomplete="off" required> <input name="j_90" type="text" class="input-text-modifikasi" size="<?= strlen('linear'); ?>" autocomplete="off" required>;
      }
      <input name="j_91" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>3<input name="j_92" type="text" class="input-text-modifikasi" size="<?= strlen(':hover'); ?>" autocomplete="off" required> {
        background-color: <input name="j_93" type="text" class="input-text-modifikasi" size="<?= strlen('teal'); ?>" autocomplete="off" required>;
        color: <input name="j_94" type="text" class="input-text-modifikasi" size="<?= strlen('white'); ?>" autocomplete="off" required>;
        <input name="j_95" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_96" type="text" class="input-text-modifikasi" size="<?= strlen('rotate'); ?>" autocomplete="off" required>(<input name="j_97" type="text" class="input-text-modifikasi" size="<?= strlen('90deg'); ?>" autocomplete="off" required>);
      }

      <input name="j_98" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>4 {
        width: <input name="j_99" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        height: <input name="j_100" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        padding: <input name="j_101" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
        background-color: <input name="j_102" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
        float: <input name="j_103" type="text" class="input-text-modifikasi" size="<?= strlen('left'); ?>" autocomplete="off" required>;
        margin-left: <input name="j_104" type="text" class="input-text-modifikasi" size="<?= strlen('20px'); ?>" autocomplete="off" required>;
        <input name="j_105" type="text" class="input-text-modifikasi" size="<?= strlen('transition'); ?>" autocomplete="off" required>: all <input name="j_106" type="text" class="input-text-modifikasi" size="<?= strlen('.5s'); ?>" autocomplete="off" required> <input name="j_107" type="text" class="input-text-modifikasi" size="<?= strlen('linear'); ?>" autocomplete="off" required>;
      }
      <input name="j_108" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>4<input name="j_109" type="text" class="input-text-modifikasi" size="<?= strlen(':hover'); ?>" autocomplete="off" required> {
        background-color: <input name="j_110" type="text" class="input-text-modifikasi" size="<?= strlen('teal'); ?>" autocomplete="off" required>;
        color: <input name="j_111" type="text" class="input-text-modifikasi" size="<?= strlen('white'); ?>" autocomplete="off" required>;
        <input name="j_112" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_113" type="text" class="input-text-modifikasi" size="<?= strlen('rotate'); ?>" autocomplete="off" required>(<input name="j_114" type="text" class="input-text-modifikasi" size="<?= strlen('-90deg'); ?>" autocomplete="off" required>);
      }

      <input name="j_115" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>5 {
        width: <input name="j_116" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        height: <input name="j_117" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        padding: <input name="j_118" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
        background-color: <input name="j_119" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
        position: <input name="j_120" type="text" class="input-text-modifikasi" size="<?= strlen('relative'); ?>" autocomplete="off" required>;
        float: <input name="j_121" type="text" class="input-text-modifikasi" size="<?= strlen('left'); ?>" autocomplete="off" required>;
        margin-left: <input name="j_122" type="text" class="input-text-modifikasi" size="<?= strlen('20px'); ?>" autocomplete="off" required>;
        <input name="j_123" type="text" class="input-text-modifikasi" size="<?= strlen('animation'); ?>" autocomplete="off" required>: <input name="j_124" type="text" class="input-text-modifikasi" size="<?= strlen('animasi_1'); ?>" autocomplete="off" required> <input name="j_125" type="text" class="input-text-modifikasi" size="<?= strlen('3s'); ?>" autocomplete="off" required> <input name="j_126" type="text" class="input-text-modifikasi" size="<?= strlen('linear'); ?>" autocomplete="off" required> <input name="j_127" type="text" class="input-text-modifikasi" size="<?= strlen('.1s'); ?>" autocomplete="off" required>;
      }

      <input name="j_128" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>6 {
        width: <input name="j_129" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        height: <input name="j_130" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        padding: <input name="j_131" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
        background-color: <input name="j_132" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
        <input name="j_133" type="text" class="input-text-modifikasi" size="<?= strlen('clear'); ?>" autocomplete="off" required>: both;
        float: <input name="j_134" type="text" class="input-text-modifikasi" size="<?= strlen('left'); ?>" autocomplete="off" required>;
        <input name="j_135" type="text" class="input-text-modifikasi" size="<?= strlen('transition'); ?>" autocomplete="off" required>: all <input name="j_136" type="text" class="input-text-modifikasi" size="<?= strlen('.5s'); ?>" autocomplete="off" required> <input name="j_137" type="text" class="input-text-modifikasi" size="<?= strlen('linear'); ?>" autocomplete="off" required>;
      }
      <input name="j_138" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>6<input name="j_139" type="text" class="input-text-modifikasi" size="<?= strlen(':hover'); ?>" autocomplete="off" required> {
        background-color: <input name="j_140" type="text" class="input-text-modifikasi" size="<?= strlen('teal'); ?>" autocomplete="off" required>;
        color: <input name="j_141" type="text" class="input-text-modifikasi" size="<?= strlen('white'); ?>" autocomplete="off" required>;
        <input name="j_142" type="text" class="input-text-modifikasi" size="<?= strlen('transform'); ?>" autocomplete="off" required>: <input name="j_143" type="text" class="input-text-modifikasi" size="<?= strlen('matrix'); ?>" autocomplete="off" required>(<input name="j_144" type="text" class="input-text-modifikasi" size="<?= strlen('0'); ?>" autocomplete="off" required>,<input name="j_145" type="text" class="input-text-modifikasi" size="<?= strlen('2.4'); ?>" autocomplete="off" required>,<input name="j_146" type="text" class="input-text-modifikasi" size="<?= strlen('-1'); ?>" autocomplete="off" required>,<input name="j_147" type="text" class="input-text-modifikasi" size="<?= strlen('1'); ?>" autocomplete="off" required>,<input name="j_148" type="text" class="input-text-modifikasi" size="<?= strlen('1'); ?>" autocomplete="off" required>,<input name="j_149" type="text" class="input-text-modifikasi" size="<?= strlen('10'); ?>" autocomplete="off" required>);
      }

      <input name="j_150" type="text" class="input-text-modifikasi" size="<?= strlen('.kotak_'); ?>" autocomplete="off" required>7 {
        width: <input name="j_151" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        height: <input name="j_152" type="text" class="input-text-modifikasi" size="<?= strlen('125px'); ?>" autocomplete="off" required>;
        padding: <input name="j_153" type="text" class="input-text-modifikasi" size="<?= strlen('10px'); ?>" autocomplete="off" required>;
        background-color: <input name="j_154" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
        position: <input name="j_155" type="text" class="input-text-modifikasi" size="<?= strlen('relative'); ?>" autocomplete="off" required>;
        float: <input name="j_156" type="text" class="input-text-modifikasi" size="<?= strlen('left'); ?>" autocomplete="off" required>;
        margin-left: <input name="j_157" type="text" class="input-text-modifikasi" size="<?= strlen('20px'); ?>" autocomplete="off" required>;
        <input name="j_158" type="text" class="input-text-modifikasi" size="<?= strlen('animation'); ?>" autocomplete="off" required>: <input name="j_159" type="text" class="input-text-modifikasi" size="<?= strlen('animasi_2'); ?>" autocomplete="off" required> <input name="j_160" type="text" class="input-text-modifikasi" size="<?= strlen('3s'); ?>" autocomplete="off" required> <input name="j_161" type="text" class="input-text-modifikasi" size="<?= strlen('linear'); ?>" autocomplete="off" required> <input name="j_162" type="text" class="input-text-modifikasi" size="<?= strlen('4'); ?>" autocomplete="off" required> <input name="j_163" type="text" class="input-text-modifikasi" size="<?= strlen('alternate'); ?>" autocomplete="off" required>;
      }

      /* Animasi Ke 2 */
      <input name="j_164" type="text" class="input-text-modifikasi" size="<?= strlen('@keyframes animasi_2'); ?>" autocomplete="off" required> {
        <input name="j_165" type="text" class="input-text-modifikasi" size="<?= strlen('from'); ?>" autocomplete="off" required> {
          background-color: <input name="j_166" type="text" class="input-text-modifikasi" size="<?= strlen('pink'); ?>" autocomplete="off" required>;
          <input name="j_167" type="text" class="input-text-modifikasi" size="<?= strlen('border-radius'); ?>" autocomplete="off" required>: <input name="j_168" type="text" class="input-text-modifikasi" size="<?= strlen('0'); ?>" autocomplete="off" required>;
        }
        <input name="j_169" type="text" class="input-text-modifikasi" size="<?= strlen('to'); ?>" autocomplete="off" required> {
          background-color: <input name="j_170" type="text" class="input-text-modifikasi" size="<?= strlen('salmon'); ?>" autocomplete="off" required>;
          <input name="j_171" type="text" class="input-text-modifikasi" size="<?= strlen('border-radius'); ?>" autocomplete="off" required>: 20px;
        }
      }
    &lt;<input name="j_172" type="text" class="input-text-modifikasi" size="<?= strlen('/style'); ?>" autocomplete="off" required>&gt;
  &lt;<input name="j_173" type="text" class="input-text-modifikasi" size="<?= strlen('/head'); ?>" autocomplete="off" required>&gt;
  &lt;<input name="j_174" type="text" class="input-text-modifikasi" size="<?= strlen('body'); ?>" autocomplete="off" required>&gt;
    &lt;div <input name="j_175" type="text" class="input-text-modifikasi" size="<?= strlen('class'); ?>" autocomplete="off" required>="<input name="j_176" type="text" class="input-text-modifikasi" size="<?= strlen('kotak_1'); ?>" autocomplete="off" required>"&gt;INI KOTAK 1&lt;/div&gt;
    &lt;div <input name="j_177" type="text" class="input-text-modifikasi" size="<?= strlen('class'); ?>" autocomplete="off" required>="<input name="j_178" type="text" class="input-text-modifikasi" size="<?= strlen('kotak_2'); ?>" autocomplete="off" required>"&gt;INI KOTAK 2&lt;/div&gt;
    &lt;div <input name="j_179" type="text" class="input-text-modifikasi" size="<?= strlen('class'); ?>" autocomplete="off" required>="<input name="j_180" type="text" class="input-text-modifikasi" size="<?= strlen('kotak_3'); ?>" autocomplete="off" required>"&gt;INI KOTAK 3&lt;/div&gt;
    &lt;div <input name="j_181" type="text" class="input-text-modifikasi" size="<?= strlen('class'); ?>" autocomplete="off" required>="<input name="j_182" type="text" class="input-text-modifikasi" size="<?= strlen('kotak_4'); ?>" autocomplete="off" required>"&gt;INI KOTAK 4&lt;/div&gt;
    &lt;div <input name="j_183" type="text" class="input-text-modifikasi" size="<?= strlen('class'); ?>" autocomplete="off" required>="<input name="j_184" type="text" class="input-text-modifikasi" size="<?= strlen('kotak_5'); ?>" autocomplete="off" required>"&gt;INI KOTAK 5&lt;/div&gt;
    &lt;div <input name="j_185" type="text" class="input-text-modifikasi" size="<?= strlen('class'); ?>" autocomplete="off" required>="<input name="j_186" type="text" class="input-text-modifikasi" size="<?= strlen('kotak_6'); ?>" autocomplete="off" required>"&gt;INI KOTAK 6&lt;/div&gt;
    &lt;div <input name="j_187" type="text" class="input-text-modifikasi" size="<?= strlen('class'); ?>" autocomplete="off" required>="<input name="j_188" type="text" class="input-text-modifikasi" size="<?= strlen('kotak_7'); ?>" autocomplete="off" required>"&gt;INI KOTAK 7&lt;/div&gt;
  &lt;<input name="j_189" type="text" class="input-text-modifikasi" size="<?= strlen('/body'); ?>" autocomplete="off" required>&gt;
&lt;<input name="j_190" type="text" class="input-text-modifikasi" size="<?= strlen('/html'); ?>" autocomplete="off" required>&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_css',7) > $b): ?>
            <?php $this->load->view('belajar/markas/teori/tombol-selesai-soal', ['bahasa' => 'css'], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/selesai-dari-soal', ['bahasa' => 'css', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
  </body>
</html>