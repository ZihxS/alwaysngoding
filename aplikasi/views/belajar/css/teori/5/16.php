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
  $p = $b-1; // Selanjutnya (Next)
  $n = $b+1; // Selanjutnya (Next)
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/posisi-dan-layout-pada-css';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar CSS - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => FALSE, 'p' => TRUE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'css', 'label' => 'Teori CSS', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-css">
        <div class="kotak-belajar">
          <?php $this->load->view('belajar/markas/tombol-layar-penuh', NULL, FALSE); ?>
          <div class="isi-teori">
            <h2 class="judul-teori">Property Float Pada CSS</h2>
            <hr>
            <div class="konten-teori">
              <p>Teknik floating pada web design merupakan sebuah kebutuhan yang paling banyak di perlukan. Property float berfungsi <b>untuk mengatur letak element secara horizontal</b> (sama seperti property <b><q>text-align</q></b>, namun propserty <b><q>text-align</q></b> khusus untuk text sedangkan float untuk mengatur element).</p>
              <p>Salah satu contoh penggunaan property float yang paling sering ditemukan adalah ketika kalian ingin membuat gambar postingan website yang terletak di bagian samping tulisan konten.</p>
              <p class="m-0">Berikut adalah contoh penggunaan property float pada CSS:</p>
              <pre class="language-html line-numbers"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
  &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Belajar CSS di Always Ngoding&lt;/title&gt;
    &lt;style&gt;
      img {
        float: left;
        width: 250px;
        margin-right: 15px;
      }
      p {
        text-align: justify;
      }
    &lt;/style&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;img src="alwaysngoding.png"&gt;
    &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa expedita, fugit cum laudantium voluptatem autem necessitatibus saepe perspiciatis nobis commodi quibusdam vero recusandae, debitis consectetur. Est ducimus quaerat eligendi. Nesciunt saepe quibusdam molestiae. Minus beatae est magnam voluptatibus sint neque veniam temporibus nesciunt delectus maiores velit, non dolorum. Ea ratione rem harum facere excepturi explicabo voluptatem accusamus iste ipsa. Voluptate omnis dolorem nemo eveniet distinctio, corporis ea incidunt facere nulla! Eligendi tenetur incidunt hic esse exercitationem culpa dignissimos recusandae odio deserunt voluptates quis quas, enim sunt, veritatis rem impedit. Quos rem nam quae officia! Enim quaerat odio eveniet quae, dignissimos maxime tenetur, in unde labore aliquid voluptates, placeat dolores error modi. Esse quae, reprehenderit aut nesciunt quis voluptate harum. Cumque odit delectus animi praesentium numquam inventore voluptas at voluptate repellendus rerum porro debitis quidem labore exercitationem deserunt molestiae quaerat, nobis odio veritatis libero nulla alias. Similique quos dolores enim. Veritatis consequuntur animi provident magnam expedita, vitae, nisi labore rerum iure odio minus ut accusantium, quisquam eligendi itaque sequi eaque! Accusamus obcaecati perferendis, similique cum enim, eos nesciunt? Excepturi, esse? Ipsam quae quod inventore rem ut porro quam libero non quia beatae, natus et saepe alias facere, voluptatibus soluta dolor ipsum architecto deserunt dolores fugit est nihil eaque provident! Est? Natus, ratione, expedita fugit et nihil mollitia quidem facilis! Quia, aliquam. Magni quo, repudiandae eaque. Reprehenderit ea, reiciendis ipsam amet possimus placeat, repellendus sunt, molestias at minus incidunt tenetur facilis? Ex vero officia quae suscipit architecto placeat pariatur quaerat. Cupiditate iusto error suscipit beatae assumenda, facere sapiente. Nisi laboriosam, aspernatur dolorum, tempora voluptatum nostrum totam tenetur labore cum doloribus non? Doloremque earum accusamus itaque, repellendus illo, aut sequi vitae nesciunt officiis, nemo unde assumenda dolores sit ab pariatur beatae cum iste amet in recusandae at labore placeat reiciendis tempore. Dolor.&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
              <div class="mb-0">
                <a href="<?= site_url("belajar-css/hasil/5/{$b}/1"); ?>" class="btn btn-sm btn-outline-danger btn-block rounded-lg btn-custom-click" target='_blank'>LIHAT HASIL KODE DI ATAS</a>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('belajar/markas/teori/sebelumnya-selanjutnya', ['url' => $u, 'p' => $p, 'n' => $n], FALSE); ?>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => FALSE, 's' => FALSE, 'p' => TRUE], FALSE); ?>
    <?php $this->load->view('belajar/markas/teori/js/segarkan-teori', ['url' => 'belajar-css/teori/segarkan', 'modul' => 5], FALSE); ?>
    <?php $this->load->view('belajar/markas/js/fungsi-layar-penuh', NULL, FALSE); ?>
  </body>
</html>