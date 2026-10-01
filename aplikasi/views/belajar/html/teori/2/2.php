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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-html/teori/tag-atribut-dan-elemen-pada-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Tag-Tag Pada HTML</h2>
            <hr>
            <div class="konten-teori">
              <p>
                Sekarang kalian akan berkenalan dengan beberapa tag HTML, lumayan banyak jika kalian ingin mengetahui semuanya, silahkan di simak secara perlahan. Jika kalian merasa malas untuk mengetahui dan memahami semuanya kami telah mencetak tebal tag yang <b>sangat-sangat perlu</b> saja (untuk kalian ketahui dan pahami). Kalian juga bisa <b>mengetahui yang mana tag yang berpasangan</b> (ada pembuka dan penutupnya) <b>dan tag yang tidak memerlukan penutup</b> (tag solo).
              </p>
              <p class="mb-1">
                Berikut adalah beberapa tag HTML yang sering dipakai:
              </p>
              <table class="table table-striped table-bordered table-hover">
                <tr>
                  <td width="30%" class="font-bt">Tag html</td>
                  <td class="font-bt">Deskripsi kegunaan</td>
                </tr>
                <tr>
                  <td><b>&lt;!DOCTYPE&gt;</b></td>
                  <td>Mendefinisikan tipe dokumen, &lt;!DOCTYPE html&gt; untuk tipe HTML 5</td>
                </tr>
                <tr>
                  <td><b>&lt;!-- komentar --&gt;</b></td>
                  <td>Mendefinisikan komentar pada dokumen</td>
                </tr>
                <tr>
                  <td><b>&lt;a&gt;&lt;/a&gt;</b></td>
                  <td>Mendefinisikan/mencantumkan/membuat link (hyperlink)</td>
                </tr>
                <tr>
                  <td>&lt;abbr&gt;&lt;/abbr&gt;</td>
                  <td>Mendefinisikan suatu singkatan</td>
                </tr>
                <tr>
                  <td>&lt;area&gt;</td>
                  <td>Mendefinisikan area didalam sebuah gambar</td>
                </tr>
                <tr>
                  <td>&lt;article&gt;&lt;/article&gt;</td>
                  <td>Mendefinisikan suatu artikel</td>
                </tr>
                <tr>
                  <td>&lt;aside&gt;&lt;/aside&gt;</td>
                  <td>Mendefinisikan isi selain dari konten utama (biasa digunakan untuk sidebar)</td>
                </tr>
                <tr>
                  <td><b>&lt;audio&gt;&lt;/audio&gt;</b></td>
                  <td>Mendefinisikan musik/suara (audio)</td>
                </tr>
                <tr>
                  <td><b>&lt;b&gt;&lt;/b&gt;</b></td>
                  <td>Membuat teks menjadi tebal (bold)</td>
                </tr>
                <tr>
                  <td>&lt;big&gt;&lt;/big&gt;</td>
                  <td>Mendefinisikan teks yang lebih besar (format teks)</td>
                </tr>
                <tr>
                  <td>&lt;blockquote&gt;&lt;/blockquote&gt;</td>
                  <td>Mendefinisikan sebuah bagian yang dikutip dari sumber lain</td>
                </tr>
                <tr>
                  <td><b>&lt;body&gt;&lt;/body&gt;</b></td>
                  <td>Mendefinisikan tubuh dokumen (HTML)</td>
                </tr>
                <tr>
                  <td><b>&lt;br&gt;</b></td>
                  <td>Perintah untuk ganti satu baris (baris baru)</td>
                </tr>
                <tr>
                  <td><b>&lt;button&gt;&lt;/button&gt;</b></td>
                  <td>Membuat tombol yang bisa di klik</td>
                </tr>
                <tr>
                  <td>&lt;canvas&gt;&lt;/canvas&gt;</td>
                  <td>Digunakan untuk menggambar grafis melalui script</td>
                </tr>
                <tr>
                  <td>&lt;caption&gt;&lt;/caption&gt;</td>
                  <td>Mendefinisikan caption</td>
                </tr>
                <tr>
                  <td>&lt;cite&gt;&lt;/cite&gt;</td>
                  <td>Mendefinisikan judul suatu objek</td>
                </tr>
                <tr>
                  <td>&lt;code&gt;&lt;/code&gt;</td>
                  <td>Mendefinisikan suatu teks berupa kode-kode komputer</td>
                </tr>
                <tr>
                  <td>&lt;col&gt;&lt;/col&gt;</td>
                  <td>Menentukan properti dari kolom didalam element &lt;colgroup&gt;&lt;/colgroup&gt;</td>
                </tr>
                <tr>
                  <td>&lt;colgroup&gt;&lt;/colgroup&gt;</td>
                  <td>Menentukan kelompok satu/lebih kolom dalam format sebuah tabel</td>
                </tr>
                <tr>
                  <td>&lt;datalist&gt;&lt;/datalist&gt;</td>
                  <td>Menentukan daftar pilihan standar untuk kontrol input</td>
                </tr>
                <tr>
                  <td>&lt;dd&gt;&lt;/dd&gt;</td>
                  <td>Mendefinisikan deskripsi sebuah item yang ada pada definition list</td>
                </tr>
                <tr>
                  <td>&lt;del&gt;&lt;/del&gt;, &lt;s&gt;&lt;/s&gt;</td>
                  <td>Mendefinisikan efek strikethrough (teks yang dicoret)</td>
                </tr>
                <tr>
                  <td>&lt;details&gt;&lt;/details&gt;</td>
                  <td>Mendefinisikan suatu detail yang dapat ditampilkan dan sembunyikan oleh pengguna</td>
                </tr>
                <tr>
                  <td><b>&lt;div&gt;&lt;/div&gt;</b></td>
                  <td>Mendefinisikan section dalam/pada dokumen</td>
                </tr>
                <tr>
                  <td>&lt;dl&gt;&lt;/dl&gt;</td>
                  <td>Mendefinisikan sebuah definition list</td>
                </tr>
                <tr>
                  <td>&lt;dt&gt;&lt;/dt&gt;</td>
                  <td>Mendefinisikan istilah (term) pada definition list</td>
                </tr>
                <tr>
                  <td>&lt;em&gt;&lt;/em&gt;</td>
                  <td>Mendefinisikan efek emphasized pada teks</td>
                </tr>
                <tr>
                  <td><b>&lt;embed&gt;</b></td>
                  <td>Mendefinisikan sebuah aplikasi eksternal/plugins</td>
                </tr>
                <tr>
                  <td><b>&lt;fieldset&gt;&lt;/fieldset&gt;</b></td>
                  <td>Membuat kotak untuk mengelompokkan element-element</td>
                </tr>
                <tr>
                  <td>&lt;figcaption&gt;&lt;/figcaption&gt;</td>
                  <td>Mendefinisikan caption untuk element &lt;figure&gt;</td>
                </tr>
                <tr>
                  <td>&lt;figure&gt;&lt;/figure&gt;</td>
                  <td>Menentukan sebuah konten mandiri</td>
                </tr>
                <tr>
                  <td><b>&lt;footer&gt;&lt;/footer&gt;</b></td>
                  <td>Mendefinisikan sebuah footer (kaki) pada dokumen atau section</td>
                </tr>
                <tr>
                  <td><b>&lt;form&gt;&lt;/form&gt;</b></td>
                  <td>Mendefinisikan sebuah formulir untuk keperluan penginputan</td>
                </tr>
                <tr>
                  <td><b>&lt;h1&gt;&lt;/h1&gt; sampai &lt;h6&gt;&lt;/h6&gt;</b></td>
                  <td>Mendefinisikan heading untuk HTML (h1 terbesar, h6 terkecil)</td>
                </tr>
                <tr>
                  <td><b>&lt;head&gt;&lt;/head&gt;</b></td>
                  <td>Mendefinisikan informasi yang terkait dengan dokumen</td>
                </tr>
                <tr>
                  <td>&lt;header&gt;&lt;/header&gt;</td>
                  <td>Menentukan pengenalan awal halaman web atau kelompok dari element navigasi untuk dokumen</td>
                </tr>
                <tr>
                  <td><b>&lt;hr&gt;</b></td>
                  <td>Membuat garis horizontal</td>
                </tr>
                <tr>
                  <td><b>&lt;html&gt;&lt;/html&gt;</b></td>
                  <td>Mendefinisikan akar (inti) dari dokumen HTML</td>
                </tr>
                <tr>
                  <td><b>&lt;i&gt;&lt;/i&gt;</b></td>
                  <td>Mendefinisikan efek cetak miring pada teks</td>
                </tr>
                <tr>
                  <td><b>&lt;iframe&gt;&lt;/iframe&gt;</b></td>
                  <td>Membuat sebuah frame pada dokumen</td>
                </tr>
                <tr>
                  <td><b>&lt;img&gt;</b></td>
                  <td>Mendefinisikan sebuah gambar</td>
                </tr>
                <tr>
                  <td><b>&lt;input&gt;</b></td>
                  <td>Mendefinisikan sebuah kontrol input untuk formulir</td>
                </tr>
                <tr>
                  <td><b>&lt;label&gt;&lt;/label&gt;</b></td>
                  <td>Mendefinisikan label untuk element &lt;input&gt;</td>
                </tr>
                <tr>
                  <td><b>&lt;legend&gt;&lt;/legend&gt;</b></td>
                  <td>Mendefinisikan sebuah caption untuk element &lt;fieldset&gt;, &lt;figure&gt; dan &lt;details&gt;</td>
                </tr>
                <tr>
                  <td><b>&lt;li&gt;&lt;/li&gt;</b></td>
                  <td>Mendefinisikan daftar item (list)</td>
                </tr>
                <tr>
                  <td><b>&lt;link&gt;</b></td>
                  <td>Mendefinisikan relasi diantara dokumen dan sebuah sumber eksternal, kebanyakan digunakan untuk merelasikan kepada CSS</td>
                </tr>
                <tr>
                  <td>&lt;mark&gt;&lt;/mark&gt;</td>
                  <td>Mendefinisikan sebuah teks yang disorot/ditandai</td>
                </tr>
                <tr>
                  <td>&lt;menu&gt;&lt;/menu&gt;</td>
                  <td>Mendefinisikan sebuah daftar/menu</td>
                </tr>
                <tr>
                  <td><b>&lt;meta&gt;</b></td>
                  <td>Mendefinisikan sebuah metadata tentang/mengenai dokumen HTML</td>
                </tr>
                <tr>
                  <td><b>&lt;nav&gt;&lt;/nav&gt;</b></td>
                  <td>Mendefinisikan navigasi</td>
                </tr>
                <tr>
                  <td>&lt;noscript&gt;&lt;/noscript&gt;</td>
                  <td>Mendefinisikan sebuah konten alternatif untuk pengguna yang telah menonaktifkan script pada browser atau memiliki browser yang tidak mendukung script tersebut</td>
                </tr>
                <tr>
                  <td>&lt;object&gt;&lt;/object&gt;</td>
                  <td>Mendefinisikan objek yang melekat di dalam dokumen HTML, contohnya file multimedia</td>
                </tr>
                <tr>
                  <td><b>&lt;ol&gt;&lt;/ol&gt;</b></td>
                  <td>Mendefinisikan numbered (nomor) list</td>
                </tr>
                <tr>
                  <td>&lt;optgroup&gt;&lt;/optgroup&gt;</td>
                  <td>Mengelompokkan opsi opsi yang terkait ke dalam bentuk dropdown</td>
                </tr>
                <tr>
                  <td><b>&lt;option&gt;&lt;/option&gt;</b></td>
                  <td>Mendefinisikan sebuah pilihan dalam bentuk dropdown</td>
                </tr>
                <tr>
                  <td><b>&lt;p&gt;&lt;/p&gt;</b></td>
                  <td>Membuat/mendefinisikan sebuah paragraf</td>
                </tr>
                <tr>
                  <td>&lt;pre&gt;&lt;/pre&gt;</td>
                  <td>Mendefinisikan teks yang belum ditentukan formatnya</td>
                </tr>
                <tr>
                  <td>&lt;progress&gt;&lt;/progress&gt;</td>
                  <td>Mendefinisikan sebuah perkembangan jalannya proses</td>
                </tr>
                <tr>
                  <td>&lt;q&gt;&lt;/q&gt;</td>
                  <td>Mendefinisikan sebuah kalimat kutipan (quote)</td>
                </tr>
                <tr>
                  <td><b>&lt;script&gt;&lt;/script&gt;</b></td>
                  <td>Mendefinisikan sebuah script</td>
                </tr>
                <tr>
                  <td><b>&lt;section&gt;&lt;/section&gt;</b></td>
                  <td>Mendefiniskan section dalam dokumen</td>
                </tr>
                <tr>
                  <td><b>&lt;select&gt;&lt;/select&gt;</b></td>
                  <td>Mendefinisikan sebuah list dalam bentuk dropdown</td>
                </tr>
                <tr>
                  <td>&lt;small&gt;&lt;/small&gt;</td>
                  <td>Mendefinisikan teks yang lebih kecil (format teks)</td>
                </tr>
                <tr>
                  <td><b>&lt;source&gt;</b></td>
                  <td>Mendefinisikan sumber element media (di &lt;video&gt; dan &lt;audio&gt;)</td>
                </tr>
                <tr>
                  <td><b>&lt;span&gt;&lt;/span&gt;</b></td>
                  <td>Mendefinisikan section dalam dokumen</td>
                </tr>
                <tr>
                  <td>&lt;strong&gt;&lt;/strong&gt;</td>
                  <td>Mendefinisikan teks penting (format teks)</td>
                </tr>
                <tr>
                  <td><b>&lt;style&gt;&lt;/style&gt;</b></td>
                  <td>Mendefinisikan suatu style (css) sebuah dokumen</td>
                </tr>
                <tr>
                  <td>&lt;sub&gt;&lt;/sub&gt;</td>
                  <td>Mendefinisikan teks subsricpt</td>
                </tr>
                <tr>
                  <td>&lt;summary&gt;&lt;/summary&gt;</td>
                  <td>Mendefinisikan heading untuk bagian &lt;details&gt;</td>
                </tr>
                <tr>
                  <td>&lt;sup&gt;&lt;/sup&gt;</td>
                  <td>Mendefinisikan teks superscript</td>
                </tr>
                <tr>
                  <td><b>&lt;table&gt;&lt;/table&gt;</b></td>
                  <td>Membuat sebuah tabel</td>
                </tr>
                <tr>
                  <td>&lt;tbody&gt;&lt;/tbody&gt;</td>
                  <td>Mengelompokkan bagian tubuh (body) dari tabel HTML</td>
                </tr>
                <tr>
                  <td><b>&lt;td&gt;&lt;/td&gt;</b></td>
                  <td>Mendefinisikan sebuah cell dalam tabel</td>
                </tr>
                <tr>
                  <td><b>&lt;textarea&gt;&lt;/textarea&gt;</b></td>
                  <td>Mendefinisikan kontrol input yang terdiri dari banyak baris</td>
                </tr>
                <tr>
                  <td>&lt;tfoot&gt;&lt;/tfoot&gt;</td>
                  <td>Mengelompokkan bagian footer dari tabel HTML</td>
                </tr>
                <tr>
                  <td><b>&lt;th&gt;&lt;/th&gt;</b></td>
                  <td>Menentukan header tabel</td>
                </tr>
                <tr>
                  <td>&lt;thead&gt;&lt;/thead&gt;</td>
                  <td>Mengelompokkan bagian header dari tabel HTML</td>
                </tr>
                <tr>
                  <td><b>&lt;title&gt;&lt;/title&gt;</b></td>
                  <td>Mendefinisikan judul dokumen</td>
                </tr>
                <tr>
                  <td><b>&lt;tr&gt;&lt;/tr&gt;</b></td>
                  <td>Mendefinisikan sebuah baris dalam tabel</td>
                </tr>
                <tr>
                  <td>&lt;track&gt;&lt;/track&gt;</td>
                  <td>Mendefinisikan subtitle dari element multimedia (&lt;audio&gt; dan &lt;video&gt;)</td>
                </tr>
                <tr>
                  <td><b>&lt;ul&gt;&lt;/ul&gt;</b></td>
                  <td>Mendefinisikan bulleted list (urutan yang tidak teratur)</td>
                </tr>
                <tr>
                  <td><b>&lt;video&gt;&lt;/video&gt;</b></td>
                  <td>Mendefinisikan sebuah video atau film</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-html/teori/segarkan', 'modul' => 2], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>