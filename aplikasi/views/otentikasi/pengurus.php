<!-- ELAPSED: {elapsed_time} DETIK | MEMORY USAGE: {memory_usage} -->
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
<html>
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ALWAYS NGODING</title>
    <meta content="Muhammad Saleh Solahudin, m.saleh.solahudin@gmail.com" name="author">
    <meta content="Muhammad Saleh Solahudin" name="owner">
    <meta content="#222222" name="theme-color">
    <meta content="#222222" name="msapplication-navbutton-color">
    <meta content="#222222" name="msapplication-TileColor">
    <meta content="#222222" name="apple-mobile-web-app-status-bar-style">
    <link href="<?= base_url('media/website/logo.png'); ?>" rel="icon" type="image/x-icon">
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" >
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/app.css'); ?>" rel="stylesheet">
  </head>
  <body class="login-page">
    <div class="page-loader-wrapper">
      <div class="loader">
        <div class="preloader">
          <div class="spinner-layer pl-pink">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
        </div>
        <p>MOHON TUNGGU</p>
      </div>
    </div>
    <div class="overlay"></div>
    <div class="login-box">
      <div class="logo">
        <a href="javascript:void(0);">ALWAYS NGODING</a>
      </div>
      <div class="card">
        <div class="body">
          <img src="<?= base_url('media/website/logo.png'); ?>" class="ikon-masuk" alt="Ikon Always Ngoding">
          <hr>
          <form id="masuk">
            <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="input-group ig-masuk">
              <span class="input-group-addon">
                <i class="material-icons">person</i>
              </span>
              <div class="form-line">
                <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Pengguna" minlength="3" maxlength="50" required autofocus>
              </div>
            </div>
            <div class="input-group ig-masuk">
              <span class="input-group-addon">
                <i class="material-icons">lock</i>
              </span>
              <div class="form-line">
                <input type="password" class="form-control" name="kata_sandi" placeholder="Kata Sandi" minlength="3" maxlength="100" required>
              </div>
            </div>
            <?php if (ang_integration_enabled('recaptcha')): ?>
            <div class="input-group ig-masuk-terakhir">
              <center id="captcha"><?= $recaptcha; ?></center>
              <div id="invalid-captcha" class="text-center" style="color: #F44336; display: none;">Silahkan validasi CAPTCHA terlebih dahulu.</div>
            </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-xs-12">
                <button class="btn btn-block bg-pink waves-effect m-b-15" type="submit">MASUK</button>
                <center>
                  <a href="<?= site_url(); ?>" class="dimasuk">Kembali Ke Beranda</a>
                </center>
              </div>
            </div>
          </form>
        </div>
      </div>
      <p class="hak-cipta-masuk">&copy; <?= date('Y'); ?> - Muhammad Saleh Solahudin</p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      $('input[type=text],input[type=password]').on('keyup',function(){
        $(this).parent().removeClass('error');
      });

      $('#masuk').on('submit',function(e){
        e.preventDefault();
        $('button[type=submit]').attr('disabled','disabled').text('SEDANG DI PROSES');
        $('#captcha').css('display', 'none');
        $.ajax({
          url:"<?= site_url('area-pengurus/masuk/proses'); ?>",
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
              $('button[type=submit]').text('BERHASIL MASUK');
              setTimeout(function(){document.location = '';},1000);
            }else{
              if (respon.kode == 2) $('input[name=kata_sandi]').focus().parent().addClass('error');
              else if (respon.kode == 3) $('input[name=nama_pengguna]').focus().parent().addClass('error');
              $('#captcha').html(respon.recaptcha).fadeIn(2000);
              $('button[type=submit]').removeAttr('disabled').text('MASUK');
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
            $('button[type=submit]').removeAttr('disabled').text('MASUK');
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

      var recaptchaCallback = function(response){
        if ($('#nama_pengguna').val() != '' && $('#kata_sandi').val() != ''){
          $('#masuk').submit();
        }
      }
    </script>
  </body>
</html>
