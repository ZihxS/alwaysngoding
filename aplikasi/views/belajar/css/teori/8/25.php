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
  $x = str_replace('Css','CSS',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-css/teori/lebih-banyak-tentang-css';
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
        <div class="kotak-belajar">
          <div class="isi-teori">
            <h2 class="judul-teori">Kemana Selanjutnya?</h2>
            <hr>
            <div class="konten-teori">
              <p>Oke bagian ini adalah bagian terakhir pada kelas pembelajaran CSS.</p>
              <ol>
                <li>Jika kalian ingin <b>memperdalam animasi</b> beserta belajar memperdalam untuk <b>memanipulasi DOM</b> kalian bisa lanjut ke pembelajaran <b>JavaScript</b>.</li>
                <li>Jika kalian ingin terjun kedunia <b>Back-End</b> atau <b>Server Side</b> (Bahasa yang berjalan atau dijalankan pada sisi server) maka kalian boleh mengikuti <b>kelas PHP</b>.</li>
                <li>Jika kalian ingin <b>menguasai dan memperdalam CSS</b> kalian bisa mengikuti kelas <b>SCSS</b> atau <b>SASS</b> (segera datang).</li>
              </ol>
              <p>Oke semoga kelas pembelajaran CSS ini berguna dan bermanfaat untuk kalian, terima kasih kalian telah giat belajar untuk menyelesaikan kelas ini di Always Ngoding.</p>
              <p>Jangan lupa untuk di share dan referensikan Always Ngoding ini ke teman-teman kalianyaa 😄. Baik itu teman kampus, teman sekolah, teman kerja, teman rumah, teman dekat, teman jauh, pokoknya semua teman kalian yang ingin belajar pemrogramanyaa 😄. Terima kasih 🤩.</p>
              <blockquote class="catatan-pelajaran">Jangan lupa untuk selalu bersyukur akan segala hal. Salah satunya setelah selesai mengerjakan atau menempuh sesuatu 😄</blockquote>
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
    <?php $this->load->view('belajar/markas/js/wajib', ['sa' => TRUE, 's' => FALSE, 'p' => FALSE], FALSE); ?>
    <script>
      $(function(){
        $('#tombol-selesai').click(function(){
          let self = this;
          $(self).html('<i class="fas fa-spinner fa-spin"></i>');
          $.ajax({
            url:"<?= site_url('belajar-css/teori/segarkan'); ?>",
            type:'POST',
            dataType:'JSON',
            data:{<?= $this->security->get_csrf_token_name(); ?>:'<?= $this->security->get_csrf_hash(); ?>',msalehscintakarmilasriwulan:8,karmilasriwulancintamsalehs:<?= $this->uri->segment(5); ?>},
            success:function(r){
              $(self).html('Selesai');
              if (typeof r.sertifikat !== 'undefined') {
                $('#sertifikatModal').modal({show: true,backdrop: 'static',keyboard: false});
                $('body').removeAttr('style');
                $('.modal').css('padding-right',0);
                $('#isi-sertifikat').html(`
                  <p>Selamat, anda telah mendapatkan sertifikat <q>${r.sertifikat.nama_sertifikat}</q>.</p>
                  <p class="mb-0">
                    Berikut adalah link untuk melihat sertifikatnya:
                    <a href="${r.sertifikat.link_sertifikat}" target='_blank'>
                      ${r.sertifikat.link_sertifikat}
                    </a>
                  </p>
                `);
                $('#kaki-sertifikat').html(`
                  <a href="<?= site_url('belajar-css/teori'); ?>" class="btn btn-secondary">Oke, mantap</a>
                `);
                $('#tutup-sertifikat').remove();
                swal({
                  title:"Informasi",
                  text:"Selamat anda telah menyelesaikan modul\n'Lebih Banyak Tentang CSS'\nDan telah menyelesaikan kelas\n'Belajar CSS'",
                  type:"success",
                  showCancelButton:false,
                  confirmButtonClass:"btn-success",
                  confirmButtonText:"Mantap",
                  closeOnConfirm:true
                });
              } else {
                swal({
                  title:"Informasi",
                  text:"Selamat anda telah menyelesaikan modul\n'Lebih Banyak Tentang CSS'\nDan telah menyelesaikan kelas\n'Belajar CSS'",
                  type:"success",
                  showCancelButton:false,
                  showConfirmButton:false
                });
                setTimeout(function(){document.location = "<?= site_url('belajar-css/teori'); ?>";},5000);
              }
            }
          });
        });
      });
    </script>
  </body>
</html>
