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

  $protokol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Masuk - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('masuk')], FALSE); ?>
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
            "description": "Masuk",
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
                "name": "Masuk"
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
            "description": "Masuk",
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
          <li class="breadcrumb-item active" aria-current="page">Masuk</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-masuk">
        <div class="header-v2">
          <h1>Masuk Ke Always Ngoding</h1>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-12 offset-0">
            <?php if ($this->session->flashdata('pesan')): ?>
              <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            <?php elseif ($this->session->flashdata('pesan-info')): ?>
              <div class="alert alert-info" role="alert">
                <?= $this->session->flashdata('pesan-info'); ?>
              </div>
            <?php endif; ?>
            <div class="card custom-card">
              <form id="masuk">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna (Username) :</label>
                    <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" required>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group">
                    <label for="kata_sandi">Kata Sandi :</label>
                    <div class="input-group">
                      <input type="password" name="kata_sandi" class="form-control" id="kata_sandi" required>
                      <div class="input-group-append toggle-password">
                        <span class="input-group-text"><i class="fas fa-eye"></i></span>
                      </div>
                    </div>
                    <div class="invalid-feedback"></div>
                  </div>
                  <?php if (ang_integration_enabled('recaptcha')): ?>
                  <div class="form-group">
                    <center id="captcha"><?= $recaptcha; ?></center>
                  </div>
                  <?php endif; ?>
                  <button type="submit" class="btn btn-sm btn-outline-danger btn-block rounded-lg">MASUK</button>
                </div>
                <?php if (ang_integration_enabled('smtp')): ?>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-6">
                      <?php if (ang_integration_enabled('smtp')): ?><a href="<?= site_url('lupa-kata-sandi'); ?>" class="btn btn-sm btn-outline-secondary btn-block rounded-lg">LUPA KATA SANDI<span class="d-none d-sm-inline"> ?</span></a><?php endif; ?>
                    </div>
                    <div class="col-6">
                      <?php if (ang_integration_enabled('smtp')): ?><a href="<?= site_url('daftar'); ?>" class="btn btn-sm btn-outline-secondary btn-block rounded-lg"><span class="d-none d-sm-block">BELUM PUNYA AKUN ?</span><span class="d-block d-sm-none">DAFTAR</span></a><?php endif; ?>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
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
        const selanjutnya = "<?= isset($_GET['selanjutnya']) ? htmlspecialchars(strip_tags("{$protokol}://{$_SERVER['HTTP_HOST']}".$this->ang->clean_path($_GET['selanjutnya']))) : '-'; ?>";

        $('input[name=nama_pengguna]').focus();

        $('input[type=text],input[type=password]').on('keyup',function(){
          $(this).removeClass('is-invalid');
        });

        $('.toggle-password').click(function(){
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

        $('#masuk').on('submit',function(e){
          let self = this;
          e.preventDefault();
          $('button[type=submit]').attr('disabled','disabled').html('<i class="fas fa-spinner fa-spin"></i> SEDANG DI PROSES');
          $('#captcha').css('display', 'none');
          $('input[name=nama_pengguna]').removeClass('is-invalid');
          $('input[name=kata_sandi]').parent().removeClass('is-invalid').children().removeClass('is-invalid');
          $.ajax({
            url:"<?= site_url('masuk/proses'); ?>",
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
                $('button[type=submit]').text('BERHASIL MASUK');
                setTimeout(function(){
                  if (selanjutnya != '-'){
                    document.location = selanjutnya;
                  }else{
                    document.location = 'masuk';
                  }
                },1000);
              }else{
                if (respon.kode == 2) $('input[name=kata_sandi]').parent().addClass('is-invalid').children().addClass('is-invalid').focus();
                else if (respon.kode == 3) $('input[name=nama_pengguna]').addClass('is-invalid').focus();
                $('#captcha').html(respon.recaptcha).fadeIn(2000, function(){
                  $('button[type=submit]').removeAttr('disabled').text('MASUK');
                });
                $('.invalid-feedback').text(respon.pesan);
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
      });

      var recaptchaCallback = function(response){
        if ($('#nama_pengguna').val() != '' && $('#kata_sandi').val() != ''){
          $('#masuk').submit();
        }
      }
    </script>
  </body>
</html>
