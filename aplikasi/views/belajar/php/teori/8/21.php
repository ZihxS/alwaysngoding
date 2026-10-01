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
  $x = str_replace('Php','PHP',ucwords(str_replace('-',' ',$this->uri->segment(3)))).' #'.$b;
  $u = 'belajar-php/teori/lebih-banyak-tentang-php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Belajar PHP - <?= $x; ?> - Always Ngoding</title>
    <?php $this->load->view('belajar/markas/meta', ['url' => $u, 'b' => $b], FALSE); ?>
    <?php $this->load->view('belajar/markas/css/wajib', ['sa' => TRUE, 'p' => FALSE], FALSE); ?>
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
          <div class="isi-teori">
            <h2 class="judul-teori">Perjalanan Yang Lumayan Panjangyaa 😆</h2>
            <hr>
            <div class="konten-teori">
              <p>Oke bagian ini adalah bagian terakhir pada kelas pembelajaran PHP. Kalian telah mempelajari banyak hal tentang PHP. Bagian-bagian pada pembelajaran PHP yang lumayan banyak semoga tidak mematahkan semangat kalian untuk selalu belajar. Ingatlah bahwa tidak ada perjuangan yang sia-sia, setiap kalian belajar maka kalian akan mendapatkan ilmu baru dan mendapatkan makna juga hikmah dalam apa yang kalian pelajari.</p>
              <p>Oke semoga kelas pembelajaran PHP ini berguna dan bermanfaat untuk kalian, terima kasih kalian telah giat belajar untuk menyelesaikan kelas ini di Always Ngoding. Jangan lupa untuk di share dan referensikan Always Ngoding ini ke teman-teman kalianyaa 😄. Baik itu teman kampus, teman sekolah, teman kerja, teman rumah, teman dekat, teman jauh, pokoknya semua teman kalian yang ingin belajar pemrograman 😄. Terima kasih.</p>
              <blockquote class="catatan-pelajaran mb-2">Jangan lupa untuk selalu bersyukur akan segala hal. Salah satunya setelah selesai mengerjakan atau menempuh sesuatu 😄</blockquote>
              <blockquote class="catatan-pelajaran mb-2">Sebenarnya masih banyak pembelajaran tentang PHP. Namun disini kami berusaha semaksimal mungkin untuk memberikan ringkasan ilmu-ilmu PHP yang sangat sering digunakan. Tentunya pembelajaran dasar-dasar PHP juga yang wajib untuk dipelajari dan diketahui.</blockquote>
              <blockquote class="catatan-pelajaran">Oh iya jika kalian sudah memahami SQL alangkah baiknya kalian langsung mulai membuat web yaa, supaya kemampuan yang kalian dapat dari pembelajaran PHP ini semakin tinggi dan tidak terlupakan begitu saja. Jika kalian belum memahami SQL kami menyediakan juga pembelajaran SQL yaa. Ayo belajar SQL dan lengkapi atau asah kemampuan kalian untuk menjadi web developer.</blockquote>
            </div>
          </div>
        </div>
        <center>
          <?php $this->load->view('belajar/markas/soal/sebelumnya', ['url' => $u, 'p' => $p], FALSE); ?>
          <?php $this->load->view('belajar/markas/teori/tombol-selesai', ['bahasa' => 'php'], FALSE); ?>
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
            url:"<?= site_url('belajar-php/teori/segarkan'); ?>",
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
                  <a href="<?= site_url('belajar-php/teori'); ?>" class="btn btn-secondary">Oke, mantap</a>
                `);
                $('#tutup-sertifikat').remove();
                swal({
                  title:"Informasi",
                  text:"Selamat anda telah menyelesaikan modul\n'Lebih Banyak Tentang PHP'\nDan telah menyelesaikan kelas\n'Belajar PHP'",
                  type:"success",
                  showCancelButton:false,
                  confirmButtonClass:"btn-success",
                  confirmButtonText:"Mantap",
                  closeOnConfirm:true
                });
              } else {
                swal({
                  title:"Informasi",
                  text:"Selamat anda telah menyelesaikan modul\n'Lebih Banyak Tentang PHP'\nDan telah menyelesaikan kelas\n'Belajar PHP'",
                  type:"success",
                  showCancelButton:false,
                  showConfirmButton:false
                });
                setTimeout(function(){document.location = "<?= site_url('belajar-php/teori'); ?>";},5000);
              }
            }
          });
        });
      });
    </script>
  </body>
</html>
