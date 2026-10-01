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
    <title><?= $data->deskripsi; ?> - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url("next/{$this->uri->segment(2)}")], FALSE); ?>
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
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
            "description": "<?= $data->deskripsi; ?>",
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
                "name": "<?= $data->deskripsi; ?>"
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
            "description": "<?= $data->deskripsi; ?>",
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
          <li class="breadcrumb-item active" aria-current="page"><?= $data->deskripsi; ?></li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container-lainnya container">
        <div class="header-v2">
          <h1><?= $data->deskripsi; ?></h1>
        </div>
        <div class="row display-flex">
          <!-- panjang 1 iklan -->
          <div class="col-sm-12" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $panjang_1->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$panjang_1->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- kolom 1 iklan -->
          <div class="col-sm-12 col-md-4" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_1->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_1->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- kolom 2 iklan -->
          <div class="col-sm-12 col-md-4" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_2->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_2->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- kolom 3 iklan -->
          <div class="col-sm-12 col-md-4" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_3->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_3->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- kolom 4 iklan -->
          <div class="col-sm-12 col-md-4" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_4->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_4->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- kolom 5 iklan -->
          <div class="col-sm-12 col-md-4" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_5->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_5->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- kolom 6 iklan -->
          <div class="col-sm-12 col-md-4" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_6->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_6->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- kolom 7 iklan -->
          <div class="col-sm-12 col-md-4 order-1 order-sm-1 order-md-1 order-lg-1" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_7->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_7->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 order-3 order-sm-3 order-md-2 order-lg-2 text-center" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%; height: 100%;">
              <div class="card-body">
                <p>
                  Halaman ini ada untuk menambah pemasukkan Always Ngoding.
                </p>
                <p>
                  Always Ngoding berupaya untuk selalu menjadi tempat belajar pemrograman yang gratis untuk banyak orang.
                </p>
                <p>
                  Always Ngoding ingin sekali memperbanyak sumber daya programmer di Indonesia.
                </p>
                <p class="mb-0">
                  Terima Kasih untuk Waktunya 😉
                </p>
              </div>
              <div class="card-footer">
                <button id="linkAsli" class="btn btn-success btn-sm btn-block" data-toggle="tooltip" title="<?= $data->deskripsi; ?>" disabled>
                  Menuju Link Asli<br>Mohon Tunggu <span id="counter">15</span> Detik
                </button>
              </div>
            </div>
          </div>
          <!-- kolom 8 iklan -->
          <div class="col-sm-12 col-md-4 order-2 order-sm-2 order-md-3 order-lg-3" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $kolom_8->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$kolom_8->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
          <!-- panjang 2 iklan -->
          <div class="col-sm-12 order-4 order-sm-4 order-md-4 order-lg-4" style="align-items: center; justify-content: center;">
            <div class="card custom-card" style="width: 100%;">
              <div class="card-body">
                <a href="<?= $panjang_2->link_tujuan; ?>" target='_blank'>
                  <img alt="Iklan Always Ngoding" src="<?= base_url("media/iklan/{$panjang_2->gambar}"); ?>" style="width: 100%; height: auto; border-radius: 5px;">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      $(function(){
        var x = 15;
        var t = setInterval(prosesTunggu, 1000);
        function prosesTunggu(){
          x--;
          $('#counter').html(x);
        }
        setTimeout(function(){
          $('#linkAsli').html('<i class="fas fa-spinner fa-spin"></i> Sedang Mengambil Link Asli');
          $.ajax({
            url:"<?= site_url('next/link'); ?>",
            type:'POST',
            data:{key:"<?= $this->uri->segment(2); ?>"},
            success:function(link){
              $('#linkAsli').attr('onclick',`window.location.href='${link}'`);
              $('#linkAsli').removeAttr('disabled').html('Menuju Link Asli');
            },
            error: function(xhr, ajaxOptions, thrownError) {
              $('#linkAsli').html('Error, Mohon Hubungi Tim Kami');
            }
          });
          clearInterval(t);
        }, 15000);
      });
    </script>
  </body>
</html>
