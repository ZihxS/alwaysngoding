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
  <head>
    <title>Ganti Kata Sandi - Always Ngoding</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Muhammad Saleh Solahudin" name="author">
    <?php $this->load->view('head', ['url' => site_url('lupa-kata-sandi')], FALSE); ?>
    <link rel="icon" href="<?= base_url('media/website/logo.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>">
    <link id="cssFont" rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fab/fab.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/website.css'); ?>">
    <?php $this->load->view('web/markas/tema', NULL, FALSE); ?>
    <script type="text/javascript">
      function lCSS(url, rNode, insert='after'){
        var css = document.createElement("link");
        var referenceNode = document.querySelector(`#${rNode}`);

        css.href = url;
        css.rel  = "stylesheet";
        css.type = "text/css";

        if (insert == 'after'){
          referenceNode.parentNode.insertBefore(css, referenceNode.nextSibling);
        }else{
          referenceNode.parentNode.insertBefore(css, referenceNode);
        }
      }

      lCSS("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap", "cssFont");
    </script>
  </head>
  <body>
    <?php $this->load->view('web/markas/noscript', NULL, FALSE); ?>
    <?php $this->load->view('web/markas/navigasi', NULL, FALSE); ?>
    <nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-90">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <?php if (ang_integration_enabled('smtp')): ?><a href="<?= site_url('lupa-kata-sandi'); ?>">Lupa Kata Sandi</a><?php endif; ?>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Ganti Kata Sandi</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lupa-kata-sandi">
        <div class="header-v2">
          <h1>Ganti Kata Sandi <q class="f-bt"><?= $nama_pengguna; ?></q></h1>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-12 offset-0">
            <?php if ($this->session->flashdata('pesan')): ?>
              <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            <?php endif; ?>
            <div class="card custom-card">
              <form id="ganti-kata-sandi">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="token" value="<?= $this->uri->segment(3); ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kata_sandi">Kata Sandi Baru :</label>
                    <div class="input-group">
                      <input type="password" name="kata_sandi" class="form-control" id="kata_sandi" required>
                      <div class="input-group-append toggle-password">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="konfirmasi_kata_sandi">Konfirmasi Kata Sandi Baru :</label>
                    <div class="input-group">
                      <input type="password" name="konfirmasi_kata_sandi" class="form-control" id="konfirmasi_kata_sandi" required>
                      <div class="input-group-append toggle-password">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>
                  </div>
                  <?php if (ang_integration_enabled('recaptcha')): ?>
                  <div class="form-group">
                    <center id="captcha"><?= $recaptcha; ?></center>
                  </div>
                  <?php endif; ?>
                  <button type="submit" class="btn btn-sm btn-outline-danger btn-block rounded-lg">GANTI KATA SANDI</button>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-6">
                      <a href="<?= site_url('masuk'); ?>" class="btn btn-sm btn-outline-secondary btn-block rounded-lg">MASUK</a>
                    </div>
                    <div class="col-6">
                      <?php if (ang_integration_enabled('smtp')): ?><a href="<?= site_url('daftar'); ?>" class="btn btn-sm btn-outline-secondary btn-block rounded-lg">DAFTAR</a><?php endif; ?>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      $(function(){
        let sembunyikanKataSandi = true;
        let sembunyikanKonfirmasiKataSandi = true;

        $('#kata_sandi').focus();

        $('#kata_sandi + div.toggle-password').click(function(){
          if (sembunyikanKataSandi){
            $('#kata_sandi').attr('type','text');
            $(this).children().html("<i class='fas fa-eye-slash'></i>");
            sembunyikanKataSandi = false;
          }else{
            $('#kata_sandi').attr('type','password');
            $(this).children().html("<i class='fas fa-eye'></i>");
            sembunyikanKataSandi = true;
          }
        });

        $('#konfirmasi_kata_sandi + div.toggle-password').click(function(){
          if (sembunyikanKonfirmasiKataSandi){
            $('#konfirmasi_kata_sandi').attr('type','text');
            $(this).children().html("<i class='fas fa-eye-slash'></i>");
            sembunyikanKonfirmasiKataSandi = false;
          }else{
            $('#konfirmasi_kata_sandi').attr('type','password');
            $(this).children().html("<i class='fas fa-eye'></i>");
            sembunyikanKonfirmasiKataSandi = true;
          }
        });

        $('#ganti-kata-sandi').on('submit',function(e){
          let self = this;
          e.preventDefault();
          $('button[type=submit]').attr('disabled','disabled').html('<i class="fas fa-spinner fa-spin"></i> SEDANG DI PROSES');
          $('#captcha').css('display', 'none');
          $.ajax({
            url:"<?= site_url('lupa-kata-sandi/ganti-kata-sandi/proses'); ?>",
            type:'POST',
            data:$(self).serialize(),
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
                $('button[type=submit]').text('GANTI KATA SANDI BERHASIL');
                setTimeout(function(){document.location = '../../masuk';},2000);
              }else{
                $('#captcha').html(respon.recaptcha).fadeIn(2000, function(){
                  $('button[type=submit]').removeAttr('disabled').text('GANTI KATA SANDI');
                });
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
              $('button[type=submit]').removeAttr('disabled').text('GANTI KATA SANDI');
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

      var recaptchaCallback = function(response){
        if ($('#kata_sandi').val() != '' && $('#konfirmasi_kata_sandi').val() != ''){
          $('#ganti-kata-sandi').submit();
        }
      }
    </script>
  </body>
</html>
