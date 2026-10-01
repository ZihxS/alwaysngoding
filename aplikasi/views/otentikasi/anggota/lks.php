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
    <title>Lupa Kata Sandi - Always Ngoding</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Muhammad Saleh Solahudin" name="author">
    <?php $this->load->view('head', ['url' => site_url('lupa-kata-sandi')], FALSE); ?>
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
            "description": "Lupa Kata Sandi",
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
                "name": "Lupa Kata Sandi"
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
            "description": "Lupa Kata Sandi",
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
          <li class="breadcrumb-item active" aria-current="page">Lupa Kata Sandi</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lupa-kata-sandi">
        <div class="header-v2">
          <h1>Lupa Kata Sandi</h1>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-12 offset-0">
            <?php if ($this->session->flashdata('pesan')): ?>
              <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            <?php endif; ?>
            <div class="card custom-card">
              <form id="lupa-kata-sandi">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                  </div>
                  <?php if (ang_integration_enabled('recaptcha')): ?>
                  <div class="form-group">
                    <center id="captcha"><?= $recaptcha; ?></center>
                  </div>
                  <?php endif; ?>
                  <button type="submit" class="btn btn-sm btn-outline-danger btn-block rounded-lg">KIRIM TOKEN</button>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-6">
                      <a href="<?= site_url('masuk'); ?>" class="btn btn-sm btn-outline-secondary btn-block rounded-lg">SUDAH PUNYA AKUN ?</a>
                    </div>
                    <div class="col-6">
                      <?php if (ang_integration_enabled('smtp')): ?><a href="<?= site_url('daftar'); ?>" class="btn btn-sm btn-outline-secondary btn-block rounded-lg">BELUM PUNYA AKUN ?</a><?php endif; ?>
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
        $('input[name=email]').focus();

        $('#lupa-kata-sandi').on('submit',function(e){
          let self = this;
          e.preventDefault();
          $('button[type=submit]').attr('disabled','disabled').html('<i class="fas fa-spinner fa-spin"></i> SEDANG DI PROSES');
          $('#captcha').css('display', 'none');
          $.ajax({
            url:"<?= site_url('lupa-kata-sandi/kirim-kode'); ?>",
            type:'POST',
            data:$(self).serialize(),
            dataType:'JSON',
            success:function(respon){
              if (respon.sukses){
                swal({
                  title:"Informasi",
                  text:respon.pesan,
                  type:"success",
                  confirmButtonText:"Oke",
                  showCancelButton:false
                });
                $('button[type=submit]').text('SILAHKAN CEK EMAIL ANDA');
              }else{
                $('#captcha').html(respon.recaptcha).fadeIn(2000, function(){
                  $('button[type=submit]').removeAttr('disabled').text('KIRIM TOKEN');
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
              $('button[type=submit]').removeAttr('disabled').text('KIRIM TOKEN');
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
        if ($('#email').val() != ''){
          $('#lupa-kata-sandi').submit();
        }
      }
    </script>
  </body>
</html>
