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
    <title>Daftar Gratis Untuk Masa Depan Anda - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('daftar')], FALSE); ?>
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
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@graph": [
          {
            "@type": "Organization",
            "@id": "<?= site_url(); ?>#organization",
            "name": "Always Ngoding",
            "alternateName": "Always Ngoding - Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia",
            "url": "<?= site_url(); ?>",
            "sameAs": [
              "https://www.facebook.com/alwaysngoding",
              "https://twitter.com/alwaysngoding",
              "https://www.instagram.com/alwaysngoding",
              "https://www.youtube.com/channel/UCO3Tsp5Coo1QLsMLn17Wdug",
              "https://example.test"
            ],
            "logo": {
              "@type": "ImageObject",
              "@id": "<?= site_url(); ?>#logo",
              "url": "<?= base_url("media/website/logo.png"); ?>",
              "contentUrl": "<?= base_url("media/website/logo.png"); ?>",
              "width": 2098,
              "height": 2159,
              "caption": "Always Ngoding - Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia"
            },
            "image": {
              "@id": "<?= site_url(); ?>#logo"
            }
          },
          {
            "@type": "WebSite",
            "@id": "<?= site_url(); ?>#website",
            "url": "<?= site_url(); ?>",
            "name": "Always Ngoding",
            "description": "Daftar",
            "publisher": {
              "@id": "<?= site_url(); ?>#organization"
            }
          },
          {
            "@type": "BreadcrumbList",
            "@id": "<?= site_url(uri_string()); ?>#breadcrumb",
            "itemListElement": [
              {
                "@type": "ListItem",
                "position": 1,
                "name": "Beranda",
                "item": "<?= site_url(); ?>"
              },
              {
                "@type": "ListItem",
                "position": 2,
                "name": "Daftar"
              }
            ]
          },
          {
            "@type": "ImageObject",
            "@id": "<?= site_url(uri_string()); ?>#primaryimage",
            "url": "<?= base_url("media/website/banner.png"); ?>",
            "contentUrl": "<?= base_url("media/website/banner.png"); ?>",
            "width": 2560,
            "height": 1440,
            "caption": "Always Ngoding - Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia"
          },
          {
            "@type": "WebPage",
            "@id": "<?= site_url(uri_string()); ?>#webpage",
            "url": "<?= site_url(uri_string()); ?>",
            "name": "Always Ngoding",
            "isPartOf": {
              "@id": "<?= site_url(); ?>#website"
            },
            "primaryImageOfPage": {
              "@id": "<?= site_url(uri_string()); ?>#primaryimage"
            },
            "description": "Daftar",
            "breadcrumb": {
              "@id": "<?= site_url(uri_string()); ?>#breadcrumb"
            },
            "potentialAction": [
              {
                "@type": "ReadAction",
                "target": [
                  "<?= site_url(uri_string()); ?>"
                ]
              }
            ]
          }
        ]
      }
    </script>
  </head>
  <body>
    <?php $this->load->view('web/markas/noscript', NULL, FALSE); ?>
    <?php $this->load->view('web/markas/navigasi', NULL, FALSE); ?>
    <nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-90">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Daftar</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-daftar">
        <div class="header-v2">
          <h1>Daftar Untuk Masa Depan</h1>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-12 offset-0">
            <div class="card custom-card-2">
              <form id="daftar">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="nama_pengguna">Nama Pengguna (Username) :</label>
                      <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="nama_lengkap">Nama Lengkap :</label>
                      <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="email">Alamat Email :</label>
                      <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="kata_sandi">Kata Sandi :</label>
                      <div class="input-group">
                        <input type="password" name="kata_sandi" class="form-control" id="kata_sandi" required>
                        <div class="input-group-append toggle-password">
                          <span class="input-group-text"><i class="fas fa-eye"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="konfirmasi_kata_sandi">Konfirmasi Kata Sandi :</label>
                      <div class="input-group">
                        <input type="password" name="konfirmasi_kata_sandi" class="form-control" id="konfirmasi_kata_sandi" required>
                        <div class="input-group-append toggle-password">
                          <span class="input-group-text"><i class="fas fa-eye"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                    	<p class="text-center">Dengan Mendaftar di Always Ngoding, Anda Setuju Dengan <a href="<?= site_url('syarat-dan-ketentuan'); ?>">Syarat & Ketentuan</a> dan <a href="<?= site_url('kebijakan-privasi'); ?>">Kebijakan Privasi</a> Always Ngoding.</p>
                    </div>
                    <?php if (ang_integration_enabled('recaptcha')): ?>
                    <div class="form-group col-12">
                      <center id="captcha"><?= $recaptcha; ?></center>
                    </div>
                    <?php endif; ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-outline-danger btn-block rounded-lg">DAFTAR</button>
                </div>
                <div class="card-footer">
                  <a href="<?= site_url('masuk'); ?>" class="btn btn-sm btn-outline-secondary btn-block rounded-lg">SUDAH PUNYA AKUN ? LANGSUNG MASUK SAJA ^_^</a>
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

        $('input[name=nama_pengguna]').focus();

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

        $('#daftar').on('submit',function(e){
          let self = this;
          e.preventDefault();
          $('button[type=submit]').attr('disabled','disabled').html('<i class="fas fa-spinner fa-spin"></i> SEDANG DI PROSES');
          $('#captcha').css('display', 'none');
          $.ajax({
            url:"<?= site_url('daftar/proses'); ?>",
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
                $('button[type=submit]').text('DAFTAR BERHASIL');
                setTimeout(function(){document.location = './';},4500);
              }else{
                $('#captcha').html(respon.recaptcha).fadeIn(2000, function(){
                  $('button[type=submit]').removeAttr('disabled').text('DAFTAR');
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
              $('button[type=submit]').removeAttr('disabled').text('DAFTAR');
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
        if ($('#nama_pengguna').val() != '' && $('#nama_lengkap').val() != '' && $('#email').val() != '' && $('#kata_sandi').val() != '' && $('#konfirmasi_kata_sandi').val() != ''){
          $('#daftar').submit();
        }
      }
    </script>
  </body>
</html>
