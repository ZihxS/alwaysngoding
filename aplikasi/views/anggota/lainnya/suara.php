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

  $nama_penggunanya = $this->session->ang_nama_pengguna;
  $jenis_kelaminnya = $this->pengguna->ambil_jenis_kelamin($nama_penggunanya) != NULL ? strtolower($this->pengguna->ambil_jenis_kelamin($nama_penggunanya)) : 'kosong';
  $foto_anggotanya  = $this->pengguna->ambil_foto($nama_penggunanya);
  $foto_anggotanya  = $foto_anggotanya !== NULL ? $foto_anggotanya : "{$jenis_kelaminnya}.png";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Suara anggota - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('anggota/suara-anggota'), 'anggota' => TRUE], FALSE); ?>
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/animate-css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/themes/all-themes.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/app.css'); ?>" rel="stylesheet">
  </head>
  <body class="theme-red">
    <?php $this->load->view('anggota/markas/atas'); ?>
    <section>
      <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
          <div class="image">
            <img src="<?= base_url('media/foto-pengguna/'.$foto_anggotanya); ?>" width="48" height="48" alt="Foto Anggota">
          </div>
          <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $this->pengguna->ambil_nama_lengkap($nama_penggunanya); ?>
            </div>
            <div class="email">
              <?= $nama_penggunanya; ?>
            </div>
            <div class="btn-group user-helper-dropdown hidden-xs hidden-sm">
              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="<?= site_url('anggota/data-diri'); ?>"><i class="material-icons">person</i>Data Diri</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="<?= site_url('anggota/keluar'); ?>"><i class="material-icons">input</i>Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('anggota/markas/menu'); ?>
      </aside>
      <?php $this->load->view('anggota/markas/tema'); ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <h2 class="judul-halaman">SUARA ANGGOTA</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li class="active">
                  <i class="material-icons">volume_up</i> Suara Anggota
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="header">
            <h2>BERI KAMI TESTIMONI <span class="hidden-xs">ATAU SUARA </span>ANDA</h2>
          </div>
          <div class="body">
            <form id="bersuara">
              <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
              <?php if ($this->suara->cek_sudah_bersuara_atau_belum()): ?>
                <?php $ds = $this->suara->ambil_data_suara(); ?>
                <label for="isi">Isi Suara Atau Testimoni :</label>
                <div class="form-group">
                  <div class="form-line">
                    <input type="text" name="isi" id="isi" class="form-control" minlength="3" value="<?= $ds->isi; ?>" required>
                  </div>
                </div>
                <p>Status Suara Anda : <?= ucwords($ds->status); ?></p>
                <button type="submit" class="btn btn-primary btn-block waves-effect" id="tombol-kirim">UBAH SUARA</button>
              <?php else: ?>
                <label for="isi">Isi Suara Atau Testimoni :</label>
                <div class="form-group">
                  <div class="form-line">
                    <input type="text" name="isi" id="isi" class="form-control" minlength="3" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block waves-effect" id="tombol-kirim">BERSUARA</button>
              <?php endif; ?>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/ang.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      $(function(){
        $('.form-line').removeClass('focused');

        $('#bersuara').on('submit',function(e){
          e.preventDefault();
          $('button[type=submit]').attr('disabled','disabled').text('SEDANG DI PROSES');
          $.ajax({
            url:"<?= site_url('anggota/suara-anggota/bersuara'); ?>",
            type:'POST',
            data:$(this).serialize(),
            dataType:'JSON',
            success:function(respon){
              if (respon.sukses){
                swal({
                  title:"Informasi",
                  text:respon.pesan,
                  type:"success",
                  showCancelButton:false,
                  showConfirmButton:false
                });
                $('button[type=submit]').text('TERIMA KASIH ATAS PARTISIPASINYA');
                setTimeout(function(){document.location = '';},2000);
              }else{
                $('button[type=submit]').removeAttr('disabled').text('BERSUARA');
                swal({
                  title:"Informasi",
                  text:respon.pesan,
                  type:"warning",
                  confirmButtonClass:"btn-warning",
                  confirmButtonText:"Oke",
                  showCancelButton:false
                });
              }
              $('#ctoken').val(respon.ctoken);
            },
            error:function(respon){
              $('button[type=submit]').removeAttr('disabled').text('BERSUARA');
              swal({
                title:"Terjadi Kesalahan",
                text:"Silahkan Hubungi Pengurus Agar Diperbaiki.",
                type:"error",
                showCancelButton:false,
                confirmButtonText:"OK"
              });
              <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
            }
          });
        });
      });
    </script>
  </body>
</html>
