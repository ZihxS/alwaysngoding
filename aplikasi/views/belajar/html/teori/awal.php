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
    <title>Belajar HTML Gratis Berbahasa Indonesia - Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url('belajar-html/teori'),
        'deskripsi' => "Belajar HTML Gratis Berbahasa Indonesia di Always Ngoding",
        'sosmed_image' => base_url('media/belajar/thumb/html.png'),
        'sosmed_meta_title' => "Belajar HTML di Always Ngoding",
        'sosmed_meta_desc' => "Belajar HTML Gratis Berbahasa Indonesia di Always Ngoding"
      ], FALSE);
    ?>
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
    <link id="cssFont" rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fab/fab.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/animate.css'); ?>">
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
            "description": "Belajar HTML Gratis Berbahasa Indonesia",
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
                "name": "Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia",
                "item": "<?= site_url('belajar'); ?>"
              },
              {
                "@type": "ListItem",
                "position": 3,
                "name": "Belajar HTML Gratis Berbahasa Indonesia"
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
            "description": "Belajar HTML Gratis Berbahasa Indonesia",
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
          <li class="breadcrumb-item"><a href="<?= site_url('belajar'); ?>">Belajar</a></li>
          <li class="breadcrumb-item active" aria-current="page">HTML</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-awal-teori-html">
        <div class="header-v2">
          <h1>Belajar HTML</h1>
          <h2>Belajar HTML gratis di Always Ngoding</h2>
        </div>
        <hr>
        <div class="row display-flex">
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 custom-card">
              <h6 class="card-header">Berkenalan Dengan HTML</h6>
              <div class="card-body text-center">
                <div class="easypiechart" id="easypiechart-<?= $warna_chart_1; ?>" data-percent="<?= $persentase_1; ?>">
                  <span class="percent"><?= $persentase_1; ?>%</span>
                </div>
              </div>
              <div class="card-footer">
                <?php if ($bagian_1 > $jumlah_bagian_1): ?>
                  <a href="<?= site_url("belajar-html/teori/berkenalan-dengan-html/bagian/{$jumlah_bagian_1}"); ?>" data-toggle="tooltip" title="Klik Untuk Bernostalgia..." class="btn btn-sm btn-rounded-lg btn-block btn-outline-success">Sudah Selesai</a>
                <?php else: ?>
                  <a href="<?= site_url("belajar-html/teori/berkenalan-dengan-html/bagian/{$bagian_1}"); ?>" class="btn btn-sm btn-rounded-lg btn-block btn-outline-primary"><?= ($bagian_1 == 1) ? "Mulai Belajar" : "Lanjut Belajar"; ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 custom-card">
              <h6 class="card-header">Tag, Atribut dan Elemen Pada HTML</h6>
              <div class="card-body text-center">
                <div class="easypiechart" id="easypiechart-<?= $warna_chart_2; ?>" data-percent="<?= $persentase_2; ?>">
                  <span class="percent"><?= $persentase_2; ?>%</span>
                </div>
              </div>
              <div class="card-footer">
                <?php if ($bagian_1 > $jumlah_bagian_1): ?>
                  <?php if ($bagian_2 > $jumlah_bagian_2): ?>
                    <a href="<?= site_url("belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/{$jumlah_bagian_2}"); ?>" data-toggle="tooltip" title="Klik Untuk Bernostalgia..." class="btn btn-sm btn-rounded-lg btn-block btn-outline-success">Sudah Selesai</a>
                  <?php else: ?>
                    <a href="<?= site_url("belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/{$bagian_2}"); ?>" class="btn btn-sm btn-rounded-lg btn-block btn-outline-primary"><?= ($bagian_2 == 1) ? "Mulai Belajar" : "Lanjut Belajar"; ?></a>
                  <?php endif; ?>
                <?php else: ?>
                  <button class="btn btn-sm btn-rounded-lg btn-block btn-outline-danger" disabled>Terkunci</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 custom-card">
              <h6 class="card-header">Struktur Dasar HTML</h6>
              <div class="card-body text-center">
                <div class="easypiechart" id="easypiechart-<?= $warna_chart_3; ?>" data-percent="<?= $persentase_3; ?>">
                  <span class="percent"><?= $persentase_3; ?>%</span>
                </div>
              </div>
              <div class="card-footer">
                <?php if ($bagian_2 > $jumlah_bagian_2): ?>
                  <?php if ($bagian_3 > $jumlah_bagian_3): ?>
                    <a href="<?= site_url("belajar-html/teori/struktur-dasar-html/bagian/{$jumlah_bagian_3}"); ?>" data-toggle="tooltip" title="Klik Untuk Bernostalgia..." class="btn btn-sm btn-rounded-lg btn-block btn-outline-success">Sudah Selesai</a>
                  <?php else: ?>
                    <a href="<?= site_url("belajar-html/teori/struktur-dasar-html/bagian/{$bagian_3}"); ?>" class="btn btn-sm btn-rounded-lg btn-block btn-outline-primary"><?= ($bagian_3 == 1) ? "Mulai Belajar" : "Lanjut Belajar"; ?></a>
                  <?php endif; ?>
                <?php else: ?>
                  <button class="btn btn-sm btn-rounded-lg btn-block btn-outline-danger" disabled>Terkunci</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 custom-card">
              <h6 class="card-header">Membuat Tabel Pada HTML</h6>
              <div class="card-body text-center">
                <div class="easypiechart" id="easypiechart-<?= $warna_chart_4; ?>" data-percent="<?= $persentase_4; ?>">
                  <span class="percent"><?= $persentase_4; ?>%</span>
                </div>
              </div>
              <div class="card-footer">
                <?php if ($bagian_3 > $jumlah_bagian_3): ?>
                  <?php if ($bagian_4 > $jumlah_bagian_4): ?>
                    <a href="<?= site_url("belajar-html/teori/membuat-tabel-pada-html/bagian/{$jumlah_bagian_4}"); ?>" data-toggle="tooltip" title="Klik Untuk Bernostalgia..." class="btn btn-sm btn-rounded-lg btn-block btn-outline-success">Sudah Selesai</a>
                  <?php else: ?>
                    <a href="<?= site_url("belajar-html/teori/membuat-tabel-pada-html/bagian/{$bagian_4}"); ?>" class="btn btn-sm btn-rounded-lg btn-block btn-outline-primary"><?= ($bagian_4 == 1) ? "Mulai Belajar" : "Lanjut Belajar"; ?></a>
                  <?php endif; ?>
                <?php else: ?>
                  <button class="btn btn-sm btn-rounded-lg btn-block btn-outline-danger" disabled>Terkunci</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 custom-card">
              <h6 class="card-header">Membuat Formulir Pada HTML</h6>
              <div class="card-body text-center">
                <div class="easypiechart" id="easypiechart-<?= $warna_chart_5; ?>" data-percent="<?= $persentase_5; ?>">
                  <span class="percent"><?= $persentase_5; ?>%</span>
                </div>
              </div>
              <div class="card-footer">
                <?php if ($bagian_4 > $jumlah_bagian_4): ?>
                  <?php if ($bagian_5 > $jumlah_bagian_5): ?>
                    <a href="<?= site_url("belajar-html/teori/membuat-formulir-pada-html/bagian/{$jumlah_bagian_5}"); ?>" data-toggle="tooltip" title="Klik Untuk Bernostalgia..." class="btn btn-sm btn-rounded-lg btn-block btn-outline-success">Sudah Selesai</a>
                  <?php else: ?>
                    <a href="<?= site_url("belajar-html/teori/membuat-formulir-pada-html/bagian/{$bagian_5}"); ?>" class="btn btn-sm btn-rounded-lg btn-block btn-outline-primary"><?= ($bagian_5 == 1) ? "Mulai Belajar" : "Lanjut Belajar"; ?></a>
                  <?php endif; ?>
                <?php else: ?>
                  <button class="btn btn-sm btn-rounded-lg btn-block btn-outline-danger" disabled>Terkunci</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 custom-card">
              <h6 class="card-header">Lebih Banyak Tentang HTML</h6>
              <div class="card-body text-center">
                <div class="easypiechart" id="easypiechart-<?= $warna_chart_6; ?>" data-percent="<?= $persentase_6; ?>">
                  <span class="percent"><?= $persentase_6; ?>%</span>
                </div>
              </div>
              <div class="card-footer">
                <?php if ($bagian_5 > $jumlah_bagian_5): ?>
                  <?php if ($bagian_6 > $jumlah_bagian_6): ?>
                    <a href="<?= site_url("belajar-html/teori/lebih-banyak-tentang-html/bagian/{$jumlah_bagian_6}"); ?>" data-toggle="tooltip" title="Klik Untuk Bernostalgia..." class="btn btn-sm btn-rounded-lg btn-block btn-outline-success">Sudah Selesai</a>
                  <?php else: ?>
                    <a href="<?= site_url("belajar-html/teori/lebih-banyak-tentang-html/bagian/{$bagian_6}"); ?>" class="btn btn-sm btn-rounded-lg btn-block btn-outline-primary"><?= ($bagian_6 == 1) ? "Mulai Belajar" : "Lanjut Belajar"; ?></a>
                  <?php endif; ?>
                <?php else: ?>
                  <button class="btn btn-sm btn-rounded-lg btn-block btn-outline-danger" disabled>Terkunci</button>
                <?php endif; ?>
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
    <script src="<?= base_url('perpustakaan/aplikasi/wow.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/wow.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/easypiechart.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/easypiechart-data.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
  </body>
</html>
