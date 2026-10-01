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
    <title>Belajar Pemrograman Atau Koding Berbahasa Indonesia - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('belajar')], FALSE); ?>
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
    <link id="cssFont" rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fab/fab.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/website.css'); ?>">
		<link rel="manifest" href="<?= base_url('manifest.webmanifest'); ?>">
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
            "description": "Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia",
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
                "name": "Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia"
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
            "description": "Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia",
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
    <?php $this->load->view('belajar/markas/navigasi', NULL, FALSE); ?>
    <nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-90">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Belajar</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-awal-belajar">
        <div class="header-v2">
          <h1>Belajar di Always Ngoding</h1>
          <h2>Belajar pemrograman gratis di Always Ngoding</h2>
        </div>
        <hr>
        <div class="row display-flex">
          <div class="col-lg-4 col-md-6 col-sm-12 col-awal-belajar">
            <div class="card h-100 mb-1 custom-card">
              <div class="card-thumbnail">
                <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="media/belajar/thumb/html.png" alt="HTML">
              </div>
              <div class="card-body cb-awal-belajar">
                <h5 class="judul-awal-belajar">Belajar HTML</h5>
                <p style="padding: 0; margin: 0;">HyperText Markup Language yang biasa disingkat <strong>HTML</strong> adalah bahasa markah yang sangat berguna untuk membuat sebuah halaman (kerangka) website. Jika kalian ingin membuat website, maka kalian wajib belajar bahasa markah ini.</p>
              </div>
              <div class="card-footer">
                <p class="text-center"><i class="fas fa-fw fa-users"></i> <?= $peserta_html; ?> Peserta &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-book"></i> 6 Modul &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-edit"></i> 45 Soal</p>
                <a href="<?= site_url("belajar-html/teori"); ?>" class="btn btn-sm btn-outline-danger btn-block">
                  <?= $bagian_html > 1 ? 'Lanjut Belajar' : 'Mulai Belajar'; ?>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-awal-belajar">
            <div class="card h-100 mb-1 custom-card">
              <div class="card-thumbnail">
                <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="media/belajar/thumb/css.png" alt="CSS">
              </div>
              <div class="card-body cb-awal-belajar">
                <h5 class="judul-awal-belajar">Belajar CSS</h5>
                <p style="padding: 0; margin: 0;">Cascading Style Sheets yang biasa disingkat <strong>CSS</strong> adalah sekumpulan kode yang digunakan untuk men-design bahasa markup seperti HTML. Cascading Style Sheets (CSS) sangat berguna sekali untuk mengelola dan meningkatkan UI/UX sebuah website.</p>
              </div>
              <div class="card-footer">
                <p class="text-center"><i class="fas fa-fw fa-users"></i> <?= $peserta_css; ?> Peserta &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-book"></i> 8 Modul &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-edit"></i> 103 Soal</p>
                <a href="<?= site_url("belajar-css/teori"); ?>" class="btn btn-sm btn-outline-danger btn-block">
                  <?= $bagian_css > 1 ? 'Lanjut Belajar' : 'Mulai Belajar'; ?>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-awal-belajar">
            <div class="card h-100 mb-1 custom-card">
              <div class="card-thumbnail">
                <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="media/belajar/thumb/php.png" alt="PHP">
              </div>
              <div class="card-body cb-awal-belajar">
                <h5 class="judul-awal-belajar">Belajar PHP</h5>
                <p style="padding: 0; margin: 0;">PHP umumnya digunakan dalam pengembangan website. PHP merupakan bahasa server-side (Back-END) terpopuler di dunia karena mudah untuk dipelajari, komunitas yang sangat luas dan PHP tersedia di/untuk semua server.</p>
              </div>
              <div class="card-footer">
                <p class="text-center"><i class="fas fa-fw fa-users"></i> <?= $peserta_php; ?> Peserta &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-book"></i> 8 Modul &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-edit"></i> 99 Soal</p>
                <a href="<?= site_url("belajar-php/teori"); ?>" class="btn btn-sm btn-outline-danger btn-block">
                  <?= $bagian_php > 1 ? 'Lanjut Belajar' : 'Mulai Belajar'; ?>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-awal-belajar">
            <div class="card h-100 mb-1 custom-card">
              <div class="card-thumbnail">
                <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="media/belajar/thumb/mysql.png" alt="MySQL">
              </div>
              <div class="card-body cb-awal-belajar">
                <h5 class="judul-awal-belajar">Belajar MySQL</h5>
                <p style="padding: 0; margin: 0;">MySQL adalah sebuah perangkat lunak sistem manajemen basis data SQL atau DBMS yang multialur, multipengguna, dengan sekitar 6 juta instalasi di seluruh dunia. MySQL sangat populer di dunia aplikasi website.</p>
              </div>
              <div class="card-footer">
                <p class="text-center"><i class="fas fa-fw fa-users"></i> <?= $peserta_mysql; ?> Peserta &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-book"></i> 6 Modul &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-edit"></i> 85 Soal</p>
                <a href="<?= site_url("belajar-mysql/teori"); ?>" class="btn btn-sm btn-outline-danger btn-block">
                  <?= $bagian_mysql > 1 ? 'Lanjut Belajar' : 'Mulai Belajar'; ?>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-awal-belajar">
            <div class="card h-100 mb-1 custom-card">
              <div class="card-thumbnail">
                <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="media/belajar/thumb/js.png" alt="Javascript">
              </div>
              <div class="card-body cb-awal-belajar">
                <h5 class="judul-awal-belajar">Belajar Javascript</h5>
                <p style="padding: 0; margin: 0;">JavaScript adalah bahasa pemrograman tingkat tinggi dan dinamis. JavaScript populer di internet dan dapat bekerja di sebagian besar penjelajah website populer. JavaScript dapat disisipkan di dalam halaman website.</p>
              </div>
              <div class="card-footer">
                <p class="text-center"><i class="fas fa-fw fa-users"></i> <?= $peserta_javascript; ?> Peserta &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-book"></i> 9 Modul &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-edit"></i> 116 Soal</p>
                <a href="<?= site_url("belajar-javascript/teori"); ?>" class="btn btn-sm btn-outline-danger btn-block">
                  <?= $bagian_javascript > 1 ? 'Lanjut Belajar' : 'Mulai Belajar'; ?>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-awal-belajar">
            <div class="card h-100 mb-1 custom-card">
              <div class="card-thumbnail">
                <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="media/belajar/thumb/py.png" alt="Python">
              </div>
              <div class="card-body cb-awal-belajar">
                <h5 class="judul-awal-belajar">Belajar Python</h5>
                <p style="padding: 0; margin: 0;">Python adalah bahasa pemrograman multiguna. Bahasa pemrograman ini berfokus kepada kemudahan dalam menulis dan membaca kodenya. Bisa digunakan untuk membuat aplikasi web, software, sains dll.</p>
              </div>
              <div class="card-footer">
                <p class="text-center"><i class="fas fa-fw fa-users"></i> ? Peserta &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-book"></i> ? Modul &nbsp;&centerdot;&nbsp; <i class="fas fa-fw fa-edit"></i> ? Soal</p>
                <button class="btn btn-sm btn-outline-danger btn-block disabled tombol-tooltip-disabled" data-toggle='tooltip' title='Segera datang'>
                  Segera Datang
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
		<script src="<?= base_url('pwa.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
  </body>
</html>
