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
    <title>Kebijakan Privasi - Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url('kebijakan-privasi'),
        'tidak_ada_deskripsi' => TRUE,
        'sosmed_meta_title' => 'Kebijakan Privasi Always Ngoding',
        'sosmed_meta_desc' => 'Kebijakan Privasi Always Ngoding'
      ], FALSE); ?>
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
            "description": "Kebijakan Privasi",
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
                "name": "Kebijakan Privasi"
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
            "description": "Kebijakan Privasi",
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
          <li class="breadcrumb-item active" aria-current="page">Kebijakan Privasi</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lainnya">
        <div class="header-v2">
          <h1>Kebijakan Privasi</h1>
        </div>
        <hr>
        <p>
          Salah satu prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi ini berisi jenis informasi yang dikumpulkan dan dicatat oleh Always Ngoding dan bagaimana kami menggunakannya.
        </p>
        <p>
          Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami.
        </p>
        <h3 class="kebijakan-privasi">Cookies</h3>
        <p>Seperti situs web lainnya, Always Ngoding menggunakan <q>cookie</q>. Cookie digunakan untuk menyimpan informasi seperti preferensi pengunjung dan halaman yang diakses atau dikunjungi pengunjung pada situs web ini. Informasi tersebut kami gunakan untuk mengoptimalkan pengalaman pengguna dengan menyesuaikan konten halaman web kami.</p>
        <h3 class="kebijakan-privasi">Informasi yang Kami Kumpulkan</h3>
        <p>Always Ngoding mengikuti prosedur standar menggunakan file log. File-file ini mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan hosting melakukan ini dan merupakan bagian dari analisis layanan hosting. Informasi yang dikumpulkan oleh file log termasuk alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), tanggal dan waktu, halaman rujukan/keluar, dan mungkin jumlah klik. Ini tidak terkait dengan informasi apa pun yang dapat diidentifikasi secara pribadi.</p>
        <h3 class="kebijakan-privasi">Bagaimana Kami Menggunakan Informasi Di Atas</h3>
        <p>Kami menggunakan informasi yang dikumpulkan dari semua layanan kami untuk memasok, memelihara, melindungi, dan menyempurnakan, untuk mengembangkan layanan yang baru, serta untuk melindungi Always Ngoding dan pengguna kami. Kami juga menggunakan informasi ini untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di situs web, dan mengumpulkan informasi demografis. Kami juga menggunakan informasi ini untuk menawarkan layanan kami yang sesuai dan relevan dengan Anda.</p>
        <p>Kami dapat menggunakan alamat email Anda untuk menginformasikan layanan kami, misalnya memberi tahu Anda tentang perubahan atau perbaikan yang akan datang. Kami menggunakan informasi yang dikumpulkan dari cookie dan teknologi lainnya, untuk meningkatkan pengalaman pengguna dan kualitas layanan secara keseluruhan. Kami akan meminta persetujuan Anda sebelum menggunakan informasi untuk tujuan selain dari yang ditentukan di Kebijakan Privasi ini.</p>
        <h3 class="kebijakan-privasi">Penyimpanan Informasi Pribadi</h3>
        <p>Sebagian besar informasi pribadi dikumpulkan dan disimpan dalam basis data pusat yang disediakan oleh penyedia layanan pihak ketiga. Always Ngoding mengumpulkan data ini sesuai dengan kepentingannya yang sah dalam memiliki informasi yang disimpan di satu lokasi untuk meminimalkan kompleksitas, meningkatkan konsistensi dalam praktik internal, lebih memahami komunitas pendukung, pegawai, dan sukarelawan, dan meningkatkan keamanan data.</p>
        <h3 class="kebijakan-privasi">Keamanan Informasi Pribadi Anda</h3>
        <p>Kami mengupayakan dengan sungguh-sungguh dalam menjaga keamanan dari informasi yang kami peroleh. Kami mengupayakan agar informasi yang dikirim melalui internet dan yang disimpan oleh web kami tetap aman. Kami terus mengupayakan untuk menggunakan pendekatan-pendekatan terbaik agar informasi Anda tidak dicuri.</p>
        <p>Misalnya, kami menyimpan password Anda dalam bentuk acak (menggunakan mekanisme Hashing), sehingga password Anda tidak disimpan dalam bentuk aslinya. Kami juga membatasi akses ke sumber data Anda.</p>
        <p>Meskipun kami mengusahakan dengan sungguh-sungguh keamanan dari data yang kami peroleh, kami tidak dapat menjamin bahwa pendekatan di atas memberikan keamanan secara absolut.</p>
        <h3 class="kebijakan-privasi">Penyedia Layanan Pihak Ketiga</h3>
        <p>Always Ngoding menggunakan penyedia layanan pihak ketiga sehubungan dengan Layanan, termasuk layanan hosting situs web, manajemen basis data, dan berbagai hal lain. Beberapa dari penyedia layanan ini dapat menempatkan sesi cookie di komputer Anda, dan mereka dapat mengumpulkan dan menyimpan informasi pribadi Anda atas nama kami.</p>
        <h3 class="kebijakan-privasi">Situs Pihak Ketiga</h3>
        <p>Layanan dapat menyediakan tautan ke berbagai situs web pihak ketiga. Anda harus berkonsultasi dengan kebijakan privasi masing-masing dari situs web pihak ketiga ini. Kebijakan privasi ini tidak berlaku untuk aktivitas di situs web pihak ketiga dan kami tidak dapat mengontrol aktivitas, yang terjadi di situs web lainnya.</p>
        <h3 class="kebijakan-privasi">Informasi Anak</h3>
        <p>Salah satu prioritas kami adalah membantu perlindungan untuk anak-anak saat menggunakan internet. Kami mendorong orang tua dan wali untuk mengamati, berpartisipasi, memantau, dan membimbing aktivitas online mereka.</p>
        <p>Always Ngoding tidak dengan sengaja mengumpulkan informasi identifikasi pribadi apa pun dari anak-anak di bawah umur. Jika menurut Anda anak Anda memberikan informasi semacam ini di situs web kami, kami sangat menganjurkan Anda untuk segera menghubungi kami dan kami akan melakukan upaya terbaik kami untuk segera hapus informasi tersebut dari catatan kami.</p>
        <h3 class="kebijakan-privasi">Persetujuan</h3>
        <p class="mb-0">Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan Privasi kami dan menyetujui syarat dan ketentuannya.</p>
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
