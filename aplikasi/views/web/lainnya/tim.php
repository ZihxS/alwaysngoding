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
    <title>Tim Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url('tim'),
        'sosmed_meta_title' => 'Tim Always Ngoding',
        'sosmed_meta_desc' => "Lihat semua tim dan donatur Always Ngoding. Always Ngoding adalah tempat belajar pemrograman gratis berbahasa Indonesia, ayo belajar juga kembangkan dan manfaatkan ilmu anda di alwaysngoding."
      ], FALSE);
    ?>
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
            "description": "Tim Always Ngoding",
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
                "name": "Tim Always Ngoding"
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
            "description": "Tim Always Ngoding",
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
          <li class="breadcrumb-item active" aria-current="page">Tim Always Ngoding</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lainnya">
        <div class="header-v2">
          <h1>Tim Always Ngoding</h1>
        </div>
        <div class="row display-flex">
          <div class="col-lg-6">
            <div class="card card-100 custom-card">
              <div class="card-body text-center">
                <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/motivator/msalehs.jpg"); ?>" class="landing-anggota-terbaik" alt="Muhammad Saleh Solahudin">
                <p class="mb-0"><b>Muhammad Saleh Solahudin</b></p>
                <p class="mb-0">Founder of Always Ngoding</p>
                <hr class="mt-2 mb-2">
                <div class="tim-sosmed">
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.instagram.com/msalehsolahudin" target="_blank"  data-toggle="tooltip" title="Instagram Muhammad Saleh Solahudin" aria-label="Instagram Muhammad Saleh Solahudin">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://twitter.com/msalehsolahudin" target="_blank"  data-toggle="tooltip" title="Twitter Muhammad Saleh Solahudin" aria-label="Twitter Muhammad Saleh Solahudin">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.facebook.com/ZihxS" target="_blank"  data-toggle="tooltip" title="Facebook Muhammad Saleh Solahudin" aria-label="Facebook Muhammad Saleh Solahudin">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://id.linkedin.com/in/saleh-solahudin-8444171b2" target="_blank"  data-toggle="tooltip" title="Linkedin Muhammad Saleh Solahudin" aria-label="Linkedin Muhammad Saleh Solahudin">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://github.com/ZihxS" target="_blank"  data-toggle="tooltip" title="Github Muhammad Saleh Solahudin" aria-label="Github Muhammad Saleh Solahudin">
                    <i class="fab fa-github"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.tiktok.com/@msalehsolahudin" target="_blank"  data-toggle="tooltip" title="TikTok Muhammad Saleh Solahudin" aria-label="TikTok Muhammad Saleh Solahudin">
                    <i class="fab fa-tiktok"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-100 custom-card">
              <div class="card-body text-center">
                <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/tim/karmila.jpg"); ?>" class="landing-anggota-terbaik" alt="Karmila Sriwulan">
                <p class="mb-0"><b>Karmila Sriwulan</b></p>
                <p class="mb-0">Co-founder of Always Ngoding</p>
                <hr class="mt-2 mb-2">
                <div class="tim-sosmed">
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.instagram.com/lamila98" target="_blank"  data-toggle="tooltip" title="Instagram Karmila Sri Wulan" aria-label="Instagram Karmila Sri Wulan">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://twitter.com/karmilasriwulan" target="_blank"  data-toggle="tooltip" title="Twitter Karmila Sri Wulan" aria-label="Twitter Karmila Sri Wulan">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.facebook.com/milasriwulan.milasriwulan" target="_blank"  data-toggle="tooltip" title="Facebook Karmila Sri Wulan" aria-label="Facebook Karmila Sri Wulan">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-100 custom-card">
              <div class="card-body text-center">
                <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/tim/dhimas.jpg"); ?>" class="landing-anggota-terbaik" alt="Dhimas Pragata">
                <p class="mb-0"><b>Dhimas MS Putra</b></p>
                <p class="mb-0">Co-founder of Always Ngoding</p>
                <hr class="mt-2 mb-2">
                <div class="tim-sosmed">
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.linkedin.com/in/dhimas-ms-putra-2b302a1b7" target="_blank"  data-toggle="tooltip" title="Linkedin Dhimas MS Putra" aria-label="Linkedin Dhimas MS Putra">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.youtube.com/dhimasmarwahyu" target="_blank"  data-toggle="tooltip" title="Youtube Dhimas MS Putra" aria-label="Youtube Dhimas MS Putra">
                    <i class="fab fa-youtube"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-100 custom-card">
              <div class="card-body text-center">
                <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/tim/ibnu.jpg"); ?>" class="landing-anggota-terbaik" alt="Ibnu Syifa Takbir Adha">
                <p class="mb-0"><b>Ibnu Syifa Takbir Adha</b></p>
                <p class="mb-0">Support</p>
                <hr class="mt-2 mb-2">
                <div class="tim-sosmed">
                  <a class="link-sosmed" style="text-decoration: none;" href="https://www.instagram.com/ibnustagnz" target="_blank"  data-toggle="tooltip" title="Instagram Ibnu Syifa Takbir Adha" aria-label="Instagram Ibnu Syifa Takbir Adha">
                    <i class="fab fa-instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if (!empty($donatur)): ?>
        <hr>
        <h3 class="f-bt text-center" id="pahlawan">Pahlawan Always Ngoding</h3>
        <div class="row display-flex">
          <?php foreach ($donatur as $d): ?>
            <div class="col-md-6 col-lg-4">
              <div class="card card-100 custom-card">
                <div class="card-body text-center">
                  <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/foto-pengguna/".($d->foto ?? 'blank.png')); ?>" class="donatur" alt="Foto <?= $d->nama_pengguna; ?>">
                  <p class="mb-0"><b><?= $d->nama_pengguna; ?></b></p>
                  <p class="mb-0"><?= $d->nama_lengkap ?? '-'; ?></p>
                  <hr class="mt-2 mb-2">
                  <a href="<?= site_url("anggota/{$d->nama_pengguna}"); ?>" class="btn btn-outline-danger btn-block btn-sm btn-custom-click" target='_blank'>Lihat data diri <?= strlen($d->nama_pengguna) >= 13 ? substr($d->nama_pengguna, 0, 10).'...' : $d->nama_pengguna; ?></a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
        <?php endif; ?>
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
        <?php if (!empty($donatur) && $this->input->get('aksi',TRUE) === 'goToPahlawan'): ?>
          $('html, body').animate({scrollTop: $('#pahlawan').offset().top-70},1300);
          let uri = window.location.toString();
          let clean_uri = uri.substring(0,uri.indexOf("?"));
          window.history.replaceState({},document.title,clean_uri);
        <?php endif; ?>
      });
    </script>
  </body>
</html>
