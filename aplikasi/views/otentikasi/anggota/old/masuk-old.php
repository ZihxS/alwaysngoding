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
    <title>Masuk ke Always Ngoding</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Muhammad Saleh Solahudin" name="author">
    <meta content="Belajar coding juga programming seru dan gratis hanya di alwaysngoding. Dapatkan diskusi dan artikel tentang dunia teknologi juga programming hanya di alwaysngoding. Cari lowongan kerja bermutu yang berkaitan dengan teknologi dan programming hanya di alwaysngoding. Download source code gratis hanya di alwaysngoding. Dapatkan banyak ilmu yang bermanfaat disini, di alwaysngoding." name="description">
    <meta content="id" name="language">
    <meta content="id" name="geo.country">
    <meta content="ID-JB" name="geo.region">
    <meta content="Indonesia" name="geo.placename">
    <meta content="-0.789275; 113.921327" name="geo.position">
    <meta content="-0.789275, 113.921327" name="ICBM">
    <meta content="summary_large_image" name="twitter:card">
    <meta content="@alwaysngoding" name="twitter:site">
    <meta content="@alwaysngoding" name="twitter:creator">
    <meta content="Always Ngoding - Ngoding kapan saja dan dimana saja" name="twitter:title">
    <meta content="<?= site_url('masuk'); ?>" name="twitter:url">
    <meta content="Belajar, kembangkan dan manfaatkan ilmu anda di alwaysngoding, khususnya ilmu di dunia teknologi dan programming." name="twitter:description">
    <meta content="<?= base_url('media/website/logo.png'); ?>" name="twitter:image:src">
    <meta content="website" property="og:type">
    <meta content="<?= site_url('masuk'); ?>" property="og:url">
    <meta content="<?= base_url('media/website/logo.png'); ?>" property="og:image">
    <meta content="Always Ngoding" property="og:site_name">
    <meta content="Always Ngoding - Ngoding kapan saja dan dimana saja" property="og:title">
    <meta content="Belajar, kembangkan dan manfaatkan ilmu anda di alwaysngoding, khususnya ilmu di dunia teknologi dan programming." property="og:description">
    <meta content="id_ID" property="og:locale">
    <!-- <meta content="" name="google-site-verification">
    <meta content="" name="msvalidate.01"> -->
    <link rel="canonical" href="<?= site_url('masuk'); ?>">
    <link href="<?= base_url('media/website/logo.png'); ?>" rel="icon" type="image/x-icon">
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
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
        <a href="javascript:void(0);" class="ot-anggota">MASUK KE ALWAYS NGODING</a>
      </div>
      <div class="card">
        <div class="body">
          <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url('media/website/logo.png'); ?>" class="ikon-masuk" alt="ikon always ngoding">
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
            <div class="input-group ig-masuk-tearkhir">
              <span class="input-group-addon">
                <i class="material-icons">lock</i>
              </span>
              <div class="form-line">
                <input type="password" class="form-control" name="kata_sandi" placeholder="Kata Sandi" minlength="3" maxlength="100" required>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <button class="btn btn-block bg-pink waves-effect m-b-15" type="submit">MASUK</button>
                <center>
                  <a href="<?= site_url(); ?>" class="dimasuk">Kembali Ke Beranda</a> / <a href="<?= site_url('daftar'); ?>" class="dimasuk">Bergabung Dengan Kami</a>
                </center>
              </div>
            </div>
          </form>
        </div>
      </div>
      <p class="hak-cipta-masuk">&copy; <?= date('Y'); ?> - Muhammad Saleh Solahudin</p>
    </div>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery/jquery.min.js'); ?>"></script>
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
        $.ajax({
          url:"<?= site_url('masuk/proses'); ?>",
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
              setTimeout(function(){document.location = 'anggota';},1000);
            }else{
              if (respon.kode == 2) $('input[name=kata_sandi]').focus().parent().addClass('error');
              else if (respon.kode == 3) $('input[name=nama_pengguna]').focus().parent().addClass('error');
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
    </script>
  </body>
</html>
