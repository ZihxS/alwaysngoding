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
  $x = str_replace('Html','HTML',ucwords(str_replace('-',' ',$m))).' #'.$b;
  $u = 'belajar-html/teori/lebih-banyak-tentang-html';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar HTML - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
  </head>
  <body>
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <header>
      <h1>Teori - <?= $x; ?></h1>
    </header>
    <?php $this->load->view('belajar/markas/breadcrumb', ['bahasa' => 'html', 'label' => 'Teori Html', 'x' => $x], FALSE); ?>
    <main class="web-main">
      <div class="container container-teori-html">
        <div class="kotak-soal-75">
          <h4 class="judul-soal">Soal ke 6</h4>
          <hr>
          <div class="m-0">
            Isi inputan di bawah dengan kodingan untuk menampilkan ikon, dengan ketentuan:
            <ul class="m-0">
              <li>Ikonnya ada di folder <b><q>gambar > ikon</q></b>, dan nama filenya <b><q>always-ngoding.ico</q></b>.</li>
              <li>Posisi <b>file sejajar</b> dengan posisi folder gambar.</li>
            </ul>
          </div>
          <form id="form-jawab">
            <input id="ctoken" type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="msalehscintakarmilasriwulan" value="<?= sha1(str_replace('-',' ',$m)); ?>">
            <input type="hidden" name="karmilasriwulancintamsalehs" value="<?= sha1($b); ?>">
            <div class="konten-soal" style="margin-top: 8px;">
              <pre class="soal"><code>&lt;<input id="j_1" name="j_1" type="text" class="input-text-modifikasi" size="<?= strlen('link'); ?>" autocomplete="off" required> <input name="j_2" type="text" class="input-text-modifikasi" size="<?= strlen('rel=\'icon\''); ?>" autocomplete="off" required> <input name="j_3" type="text" class="input-text-modifikasi" size="<?= strlen('href=\'gambar/ikon/always-ngoding.ico\''); ?>" autocomplete="off" required>&gt;</code></pre>
            </div>
            <button id="kirim-jawaban" type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php if ($this->belajar->ambil_bagain_terakhir('1_html',6) > $b): ?>
            <?php $this->load->view('belajar/markas/teori/tombol-selesai-soal', ['bahasa' => 'html'], FALSE); ?>
          <?php else: ?>
            <span id="selanjutnya"></span>
          <?php endif; ?>
        </center>
      </div>
    </main>
    <?php $this->load->view('belajar/markas/kaki', NULL, FALSE); ?>
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <?php $this->load->view('belajar/markas/soal/js/selesai-dari-soal', ['bahasa' => 'html', 'r' => FALSE, 'e' => TRUE], FALSE); ?>
    <!--<script>-->
    <!--  $(function(){-->
    <!--    $('#j_1').focus();-->

    <!--    $('#form-jawab').submit(function(e){-->
    <!--      e.preventDefault();-->
    <!--      $('#kirim-jawaban').html('<i class="fas fa-spinner fa-spin"></i>').blur();-->
    <!--      $.ajax({-->
    <!--        url:"<?= site_url('belajar-html/teori/jawab'); ?>",-->
    <!--        type:"POST",-->
    <!--        data:$(this).serialize(),-->
    <!--        dataType:'JSON',-->
    <!--        success:function(r) {-->
    <!--          if(r.s){-->
    <!--            if (typeof r.sertifikat !== 'undefined') {-->
    <!--              $('#sertifikatModal').modal('show');-->
    <!--              $('body').removeAttr('style');-->
    <!--              $('.modal').css('padding-right',0);-->
    <!--              $('#isi-sertifikat').html(`-->
    <!--                <p>Selamat, anda telah mendapatkan sertifikat <q>${r.sertifikat.nama_sertifikat}</q>.</p>-->
    <!--                <p class="mb-0">Berikut adalah link untuk melihat sertifikatnya: <a href="${r.sertifikat.link_sertifikat}" target='_blank'>${r.sertifikat.link_sertifikat}</a></p>-->
    <!--              `);-->
    <!--            }-->
    <!--            swal({-->
    <!--              title:"Jawaban benar",-->
    <!--              text:"Selamat anda telah menyelesaikan modul\n'Lebih Banyak Tentang HTML'\nDan telah menyelesaikan kelas\n'Belajar HTML'",-->
    <!--              type:"success",-->
    <!--              showCancelButton:false,-->
    <!--              confirmButtonClass:"btn-success",-->
    <!--              confirmButtonText:"Mantap",-->
    <!--              closeOnConfirm:true-->
    <!--            });-->
    <!--            $('#selanjutnya').html(r.ls);-->
    <!--          }else{-->
    <!--            swal({-->
    <!--              title:"Jawaban salah",-->
    <!--              text:"Maaf, jawaban anda salah\nPoin belajar anda berkurang 1\nSilahkan coba lagi...",-->
    <!--              type:"error",-->
    <!--              showCancelButton:false,-->
    <!--              confirmButtonClass:"btn-danger",-->
    <!--              confirmButtonText:"Oke, Maaf",-->
    <!--              closeOnConfirm:true-->
    <!--            });-->
    <!--          }-->
    <!--          $('#kirim-jawaban').html('<i class="fas fa-paper-plane"></i>');-->
    <!--          $('#ctoken').val(r.ctoken);-->
    <!--        }-->
    <!--      });-->
    <!--    });-->
    <!--  });-->
    <!--</script>-->
  </body>
</html>