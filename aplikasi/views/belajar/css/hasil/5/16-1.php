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
?>
<!DOCTYPE html>
<html lang="id">
  <?php $this->load->view('belajar/css/hasil/markas/kepala', NULL, FALSE); ?>
  <body class="hasil">
    <?php $this->load->view('belajar/css/hasil/markas/navigasi', NULL, FALSE); ?>
    <main class="hasil-main">
      <div class="container-fluid">
        <div class="code-hasil">
          <button class="btn btn-dark btn-file-name">index.html</button>
          <textarea id="code">&lt;!DOCTYPE html&gt;
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
    &lt;img src="<?= base_url('media/hasil/contoh.png'); ?>"&gt;
    &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa expedita, fugit cum laudantium voluptatem autem necessitatibus saepe perspiciatis nobis commodi quibusdam vero recusandae, debitis consectetur. Est ducimus quaerat eligendi. Nesciunt saepe quibusdam molestiae. Minus beatae est magnam voluptatibus sint neque veniam temporibus nesciunt delectus maiores velit, non dolorum. Ea ratione rem harum facere excepturi explicabo voluptatem accusamus iste ipsa. Voluptate omnis dolorem nemo eveniet distinctio, corporis ea incidunt facere nulla! Eligendi tenetur incidunt hic esse exercitationem culpa dignissimos recusandae odio deserunt voluptates quis quas, enim sunt, veritatis rem impedit. Quos rem nam quae officia! Enim quaerat odio eveniet quae, dignissimos maxime tenetur, in unde labore aliquid voluptates, placeat dolores error modi. Esse quae, reprehenderit aut nesciunt quis voluptate harum. Cumque odit delectus animi praesentium numquam inventore voluptas at voluptate repellendus rerum porro debitis quidem labore exercitationem deserunt molestiae quaerat, nobis odio veritatis libero nulla alias. Similique quos dolores enim. Veritatis consequuntur animi provident magnam expedita, vitae, nisi labore rerum iure odio minus ut accusantium, quisquam eligendi itaque sequi eaque! Accusamus obcaecati perferendis, similique cum enim, eos nesciunt? Excepturi, esse? Ipsam quae quod inventore rem ut porro quam libero non quia beatae, natus et saepe alias facere, voluptatibus soluta dolor ipsum architecto deserunt dolores fugit est nihil eaque provident! Est? Natus, ratione, expedita fugit et nihil mollitia quidem facilis! Quia, aliquam. Magni quo, repudiandae eaque. Reprehenderit ea, reiciendis ipsam amet possimus placeat, repellendus sunt, molestias at minus incidunt tenetur facilis? Ex vero officia quae suscipit architecto placeat pariatur quaerat. Cupiditate iusto error suscipit beatae assumenda, facere sapiente. Nisi laboriosam, aspernatur dolorum, tempora voluptatum nostrum totam tenetur labore cum doloribus non? Doloremque earum accusamus itaque, repellendus illo, aut sequi vitae nesciunt officiis, nemo unde assumenda dolores sit ab pariatur beatae cum iste amet in recusandae at labore placeat reiciendis tempore. Dolor.&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</textarea>
        </div>
        <div>
          <button class="btn btn-light btn-output">output</button>
          <iframe id="preview" frameborder="0"></iframe>
        </div>
      </div>
    </main>
    <?php $this->load->view('belajar/css/hasil/markas/script', NULL, FALSE); ?>
  </body>
</html>