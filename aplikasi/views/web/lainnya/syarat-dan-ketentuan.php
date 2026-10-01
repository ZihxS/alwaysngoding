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
    <title>Syarat dan Ketentuan - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('pertanyaan-umum'),'sosmed_meta_title' => 'Syarat dan Ketentuan di Always Ngoding','sosmed_meta_desc' => 'Syarat dan Ketentuan di Always Ngoding'], FALSE); ?>
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
            "description": "Syarat dan Ketentuan",
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
                "name": "Syarat dan Ketentuan"
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
            "description": "Syarat dan Ketentuan",
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
          <li class="breadcrumb-item active" aria-current="page">Syarat dan Ketentuan</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lainnya">
        <div class="header-v2">
          <h1>Syarat dan Ketentuan di Always Ngoding</h1>
        </div>
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <div class="card custom-card">
              <div class="card-body">
                <ol class="sk">
                  <li>Setiap akun Always Ngoding hanya boleh digunakan untuk satu orang saja.</li>
                  <li>Anda tidak boleh merusak lingkungan Always Ngoding dengan cara apapun.</li>
                  <li>Anda tidak boleh menggunakan semua layanan Always Ngoding untuk tujuan ilegal.</li>
                  <li>Anda tidak boleh menyalin atau menjual produk kami untuk orang lain tanpa izin sah dari kami.</li>
                  <li>Anda dilarang melakukan kecurangan dengan cara apapun untuk mendapatkan like yang banyak.</li>
                  <li>Akun yang tidak diaktifkan atau tidak diverifikasi selama 1 bulan akan dihapus dari database kami.</li>
                  <li>Anda harus memberikan alamat email dan informasi lainnya yang diperlukan dengan benar dan valid.</li>
                  <li>Simpan informasi akun anda dengan aman, akun anda merupakan tanggung jawab anda sepenuhnya.</li>
                  <li>Sesekali kami akan mengirimkan email jika ada informasi baru tentang Always Ngoding.</li>
                  <li>Kami berhak menarik kembali pencapaian atau sertifikat anda jika anda melakukan kecurangan.</li>
                  <li>Kami berhak mengurangi point anda jika anda melakukan kecurangan.</li>
                  <li>Kami berhak menghapus komentar atau jawaban anda jika ada kata-kata yang tidak sesuai atau tidak pantas.</li>
                  <li>Kami berhak membekukan atau menghapus artikel, diskusi dan lowongan kerja anda jika ada informasi yang tidak sesuai atau tidak pantas.</li>
                  <li>Kami berhak membekukan atau menghapus akun anda jika ada hal-hal umum yang dilanggar, seperti beriklan tanpa izin, memposting hal negatif seputar SARA, hal yang melanggar hukum, juga hak cipta dan konten pornografi atau sejenisnya yang mengganggu pengguna lain.</li>
                  <li>Pastikan saat anda membuat diskusi atau membuat artikel atau memposting lowongan pekerjaan semuanya harus berkaitan dengan dunia teknologi.</li>
                  <li>Pastikan saat anda berdiskusi atau mengomentari artikel atau mengomentari lowongan pekerjaan semuanya harus sesuai dengan konteks yang sudah ada sebelumnya.</li>
                  <li>Always Ngoding berhak mengubah/mengurangi/menghapus materi belajar pemrograman dan lain hal di masa depan apabila terjadi ketidaksesuaian materi yang disampaikan dan masalah lainnya.</li>
                  <li>Semua materi belajar pemrograman di Always Ngoding mengandung hak cipta. Semua pelanggaran terkait hak cipta akan diproses secara hukum (anda tidak boleh menyalin materi pembelajaraan di Always Ngoding untuk keperluan pribadi ataupun orang lain).</li>
                  <li>Pemilik hak cipta artikel yang ada di Always Ngoding ialah pembuat atau pemosting artikelnya.</li>
                  <li>Dilarang untuk menyebarkan berita hoax/spam/berjualan di artikel atau forum diskusi Always Ngoding.</li>
                  <li>Uang donasi yang telah didonasikan tidak bisa direfund atau dikembalikan (untuk menghindari spam).</li>
                  <li class="mb-0">Anda harus mematuhi dan menaati syarat dan ketentuan di Always Ngoding.</li>
                </ol>
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
  </body>
</html>
