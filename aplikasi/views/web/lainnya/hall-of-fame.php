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
    <title>Hall of Fame Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url('hall-of-fame'),
        'sosmed_meta_title' => 'Hall of Fame Always Ngoding',
        'sosmed_meta_desc' => "Hall of Fame Always Ngoding. Always Ngoding adalah tempat belajar pemrograman gratis berbahasa Indonesia, ayo belajar juga kembangkan dan manfaatkan ilmu anda di alwaysngoding."
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
            "description": "Hall of Fame Always Ngoding",
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
                "name": "Hall of Fame Always Ngoding"
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
            "description": "Hall of Fame Always Ngoding",
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
          <li class="breadcrumb-item active" aria-current="page">Hall of Fame Always Ngoding</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lainnya">
        <div class="header-v2 mb-4">
          <h1>Hall of Fame Always Ngoding</h1>
					<h2>Daftar Para Pahlawan Cyber Security Always Ngoding</h2>
        </div>
				<hr>
        <div class="row display-flex">
					<div class="container">
						<p class="mb-2 text-justify">Kami ingin menyampaikan apresiasi setinggi-tingginya kepada rekan-rekan yang telah sigap membantu melaporkan setiap malfungsi, bug atau celah keamanan pada sistem Always Ngoding. Peran serta kalian tidak hanya memastikan sistem kami berjalan lebih baik, tetapi juga berkontribusi langsung pada kualitas & sistem keamanan kami. Terima kasih banyak rekan-rekan, Always Ngoding jadi lebih baik berkat kalian!</p>
					</div>
          <?php foreach ($hof as $h): ?>
            <div class="col-md-6 col-lg-4">
              <div class="card card-100 custom-card">
                <div class="card-body text-center">
                  <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/foto-pengguna/".($h->foto ?? 'blank.png')); ?>" class="donatur" alt="Foto <?= $h->nama_pengguna; ?>">
                  <p class="mb-0"><b><?= $h->nama_pengguna; ?></b></p>
                  <p class="mb-0"><?= $h->nama_lengkap ?? '-'; ?></p>
									<div>
										<span class="badge badge-secondary" data-toggle='tooltip' title='Appreciation Points' style="font-weight: normal !important;"><?= $h->points; ?> APPRECIATION POINTS</span>
									</div>
                  <hr class="mt-2 mb-2">
                  <a href="<?= site_url("anggota/{$h->nama_pengguna}"); ?>" class="btn btn-outline-danger btn-block btn-sm btn-custom-click" target='_blank'>Lihat data diri <?= strlen($h->nama_pengguna) >= 13 ? substr($h->nama_pengguna, 0, 10).'...' : $h->nama_pengguna; ?></a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
				<hr>
				<p class="mb-0 text-center">
					Kamu ingin jadi bagian pahlawan untuk Always Ngoding? silahkan report penemuanmu ke <a href="mailto:m.saleh.solahudin@gmail.com">m.saleh.solahudin@gmail.com</a> 😁
				</p>
      </div>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
  </body>
</html>
