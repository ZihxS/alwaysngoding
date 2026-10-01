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
    <title>Pertanyaan Umum - Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url('pertanyaan-umum'),
        'tidak_ada_deskripsi' => TRUE,
        'sosmed_meta_title' => 'Pertanyaan Umum tentang Always Ngoding.',
        'sosmed_meta_desc' => 'Pertanyaan Umum tentang Always Ngoding.'
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
            "description": "Pertanyaan Umum",
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
                "name": "Pertanyaan Umum"
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
            "description": "Pertanyaan Umum",
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
          },
          {
            "@type": "FAQPage",
            "mainEntity": [{
              "@type": "Question",
              "name": "Apa itu Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Always Ngoding adalah tempat belajar pemrograman online gratis berbahasa Indonesia."
              }
            },{
              "@type": "Question",
              "name": "Kenapa harus Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Kami berusaha untuk menjamin semua konten yang ada di Always Ngoding sangat bermanfaat dan mudah dimengerti, terutama bagian penting di Always Ngoding yaitu kelas pembelajaran. Always Ngoding adalah karya anak bangsa loh, jadi kami berharap karya anak bangsa ini bisa sangat bermanfaat untuk Indonesia. Always Ngoding juga dibuat dengan mayoritas bahasanya adalah bahasa Indonesia yang bertujuan untuk mempermudah generasi muda Indonesia."
              }
            },{
              "@type": "Question",
              "name": "Apa saja yang akan dipelajari di Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Di Always Ngoding kalian bisa belajar tentang dunia teknologi informasi yang luas mulai dari pemrograman, desain, jaringan dan lain-lain. Kalian juga bisa belajar untuk membuat artikel di Always Ngoding. Kalian juga akan diajarkan cara untuk problem solving."
              }
            },{
              "@type": "Question",
              "name": "Apa bedanya Always Ngoding dengan web pembelajaran lainnya?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Kami berusaha untuk membuat suasana belajar yang menarik, seru dan juga mudah."
              }
            },{
              "@type": "Question",
              "name": "Apakah ada kelas private untuk belajar koding di Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Untuk saat ini Always Ngoding belum membuka kelas private. Mungkin akan ada saatnya di suatu saat nanti."
              }
            },{
              "@type": "Question",
              "name": "Apakah Always Ngoding akan sering mengadakan event atau webinar?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Always Ngoding akan sering mengadakan event dan webinar juga workshop dengan tujuan untuk berkontribusi di dunia teknologi dan informasi."
              }
            },{
              "@type": "Question",
              "name": "Apakah saya bisa berkontribusi untuk membuat kelas baru di Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Tentu saja bisa, asal kalian mempunyai tekad yang bulat dan niat yang tinggi. Jika kalian ingin berkontribusi membuat kelas yang belum ada di Always Ngoding kalian bisa menghubungi kami."
              }
            },{
              "@type": "Question",
              "name": "Berapa biaya yang harus dikeluarkan untuk belajar pemrograman di Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Kalian tidak perlu bayar untuk belajar di Always Ngoding. Always Ngoding menyediakan kelas-kelas gratis yang langsung bisa kalian pelajari."
              }
            },{
              "@type": "Question",
              "name": "Selain ilmu tentang pemrograman, apa saja yang bisa didapatkan di Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Tentunya semua ilmu yang berkaitan dengan dunia teknologi informasi."
              }
            },{
              "@type": "Question",
              "name": "Bagaimana cara mendapatkan info atau update terbaru tentang Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Kalian bisa mengikuti sosial media kami, kami juga akan mengirimkan info atau update terbaru ke email kalian."
              }
            },{
              "@type": "Question",
              "name": "Apa yang harus saya lakukan jika akun Always Ngoding saya lupa kata sandi?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Kalian bisa mengatur ulang kata sandi akun kalian di halaman lupa kata sandi."
              }
            },{
              "@type": "Question",
              "name": "Apakah saya bisa membeli rewards atau sertifikat di Always Ngoding?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Pencapaian dan sertifikat di Always Ngoding tidak bisa dibeli. Kalian harus banyak belajar dan berusaha untuk mendapatkan pencapaian serta sertifikat di Always Ngoding."
              }
            }]
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
          <li class="breadcrumb-item active" aria-current="page">Pertanyaan Umum</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lainnya">
        <div class="header-v2">
          <h1>Pertanyaan Umum</h1>
        </div>
        <div id="accordion" class="kustomAccordion">
          <div class="card">
            <div class="card-header" id="heading1">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                  Apa itu Always Ngoding?
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-minus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-1">Always Ngoding adalah tempat belajar pemrograman online gratis berbahasa Indonesia.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading2">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                  <div class="text-left">Kenapa harus Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Kami berusaha untuk menjamin semua konten yang ada di Always Ngoding sangat bermanfaat dan mudah dimengerti, terutama bagian penting di Always Ngoding yaitu kelas pembelajaran. Always Ngoding adalah karya anak bangsa loh, jadi kami berharap karya anak bangsa ini bisa sangat bermanfaat untuk Indonesia. Always Ngoding juga dibuat dengan mayoritas bahasanya adalah bahasa Indonesia yang bertujuan untuk mempermudah generasi muda Indonesia.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading3">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                  <div class="text-left">Apa saja yang akan dipelajari di Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Di Always Ngoding kalian bisa belajar tentang dunia teknologi informasi yang luas mulai dari pemrograman, desain, jaringan dan lain-lain. Kalian juga bisa belajar untuk membuat artikel di Always Ngoding. Kalian juga akan diajarkan cara untuk problem solving.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading4">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                  <div class="text-left">Apa bedanya Always Ngoding dengan web pembelajaran lainnya?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Kami berusaha untuk membuat suasana belajar yang menarik, seru dan juga mudah.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading5">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                  <div class="text-left">Apakah ada kelas private untuk belajar koding di Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Untuk saat ini Always Ngoding belum membuka kelas private. Mungkin akan ada saatnya di suatu saat nanti.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading6">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                  <div class="text-left">Apakah Always Ngoding akan sering mengadakan event atau webinar?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Always Ngoding akan sering mengadakan event dan webinar juga workshop dengan tujuan untuk berkontribusi di dunia teknologi dan informasi.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading7">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                  <div class="text-left">Apakah saya bisa berkontribusi untuk membuat kelas baru di Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Tentu saja bisa, asal kalian mempunyai tekad yang bulat dan niat yang tinggi. Jika kalian ingin berkontribusi membuat kelas yang belum ada di Always Ngoding kalian bisa menghubungi kami: <a href="https://wa.me/62<?= html_escape(substr($app_konfigurasi->whatsapp, 1)); ?>" target="_blank">+62<?= html_escape(substr($app_konfigurasi->whatsapp, 1)); ?></a>.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading8">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                  <div class="text-left">Berapa biaya yang harus dikeluarkan untuk belajar pemrograman di Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Kalian tidak perlu bayar untuk belajar di Always Ngoding. Always Ngoding menyediakan kelas-kelas gratis yang langsung bisa kalian pelajari. Tetapi jika kalian mempunyai rezeki lebih dan ingin berdonasi untuk kami, kalian bisa donasi di link berikut ini: <a href="<?= site_url('donasi'); ?>" target="_blank"><?= site_url('donasi'); ?></a>.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading9">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                  <div class="text-left">Selain ilmu tentang pemrograman, apa saja yang bisa didapatkan di Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Tentunya semua ilmu yang berkaitan dengan dunia teknologi informasi.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading10">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                  <div class="text-left">Bagaimana cara mendapatkan info atau update terbaru tentang Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Kalian bisa mengikuti sosial media kami, kami juga akan mengirimkan info atau update terbaru ke email kalian.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading11">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                  <div class="text-left">Apa yang harus saya lakukan jika akun Always Ngoding saya lupa kata sandi?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">Kalian bisa mengatur ulang kata sandi akun kalian di <a href="<?= base_url('lupa-kata-sandi'); ?>">halaman lupa kata sandi</a>.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="heading12">
              <h2 class="mb-0">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                  <div class="text-left">Apakah saya bisa membeli rewards atau sertifikat di Always Ngoding?</div>
                  <span class="fa-stack fa-2x fa-in-faq">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                  </span>
                </button>
              </h2>
            </div>
            <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
              <div class="card-body bg-abu">
                <p class="mb-0">
                  Pencapaian dan sertifikat di Always Ngoding tidak bisa dibeli. Kalian harus banyak belajar dan berusaha untuk mendapatkan pencapaian serta sertifikat di Always Ngoding.
                </p>
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
      $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
        $(e.target).prev().find("i:last-child").toggleClass("fa-minus fa-plus");
      });
    </script>
  </body>
</html>
