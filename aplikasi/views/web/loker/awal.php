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
    <title>Lowongan Kerja Di Bidang Teknologi - Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url('lowongan-kerja'),
        'sosmed_meta_title' => 'Lowongan Kerja by Always Ngoding',
        'sosmed_meta_desc' => "Lihat semua lowongan kerja di bidang teknologi. Always Ngoding adalah tempat belajar pemrograman gratis berbahasa Indonesia, ayo belajar juga kembangkan dan manfaatkan ilmu anda di alwaysngoding."
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
            "description": "Lowongan Kerja di Bidang Teknologi dan Informasi",
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
                "name": "Lowongan Kerja di Bidang Teknologi dan Informasi"
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
            "description": "Lowongan Kerja di Bidang Teknologi dan Informasi",
            "breadcrumb": {
              "@id": "<?= site_url(uri_string()); ?>#breadcrumb"
            },
            "potentialAction": [
              {
                "@type": "ReadAction",
                "target": [
                  "<?= site_url(uri_string()); ?>"
                ]
              },
              {
                "@type": "SearchAction",
                "target": "<?= site_url('lowongan-kerja?pencarian={search_term_string}'); ?>",
                "query-input": "required name=search_term_string"
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
          <?php if ($pencarian == 'ya'): ?>
            <li class="breadcrumb-item">
              <a href="<?= site_url('lowongan-kerja'); ?>">Lowongan Kerja</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Pencarian (<?= $yang_di_cari; ?>)</li>
          <?php else: ?>
            <li class="breadcrumb-item active" aria-current="page">Lowongan Kerja</li>
          <?php endif ?>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-awal-lowongan-kerja">
        <div class="header-v2">
          <h1><?= $pencarian == 'ya' ? '' : 'Semua '; ?>Lowongan Kerja</h1>
          <h2>Bagikan dan Cari Lowongan Kerja Di Bidang Teknologi</h2>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-<?= $this->session->has_userdata('ang_akses') ? '10' : '12'; ?>">
            <form action="" method="GET">
              <div class="input-group input-cari">
                <input type="search" name="pencarian" class="form-control form-control-sm" placeholder="Cari lowongan kerja..." value="<?= $yang_di_cari; ?>" pattern="[a-zA-Z0-9 ]+" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary btn-sm" type="submit">Cari Lowongan Kerja</button>
                  <?php if ($pencarian == 'ya'): ?>
                    <a href="<?= site_url('lowongan-kerja'); ?>" class="btn btn-outline-secondary btn-sm">Reset</a>
                  <?php endif; ?>
                </div>
              </div>
            </form>
          </div>
          <?php if ($this->session->has_userdata('ang_akses')): ?>
            <div class="col-sm-2">
              <a href="<?= !$this->session->has_userdata('ang_level') ? site_url('anggota/lowongan-kerja/tambah') : site_url('area-pengurus/lowongan-kerja/tambah'); ?>" class="btn btn-outline-secondary btn-sm btn-block btn-custom-tambah button-shadow" data-toggle='tooltip' title='Tambah Lowongan Kerja'>
                Tambah
              </a>
            </div>
          <?php endif ?>
        </div>
        <hr>
        <div class="row display-flex" id="lowongan-kerja">
          <?php $kosong = TRUE; foreach ($loker_awal as $loker): ?>
            <div class="col-md-6 col-lg-4">
              <div class="card h-100 custom-card-2">
                <h6 class="card-header"><?= $loker->nama_perusahaan; ?></h6>
                <div class="card-body cb-lowongan-kerja">
                  <table>
                    <tr>
                      <td>Posisi</td>
                      <td>:</td>
                      <td><?= $loker->posisi; ?></td>
                    </tr>
                    <tr>
                      <td>Lokasi</td>
                      <td>:</td>
                      <td><?= $loker->lokasi; ?></td>
                    </tr>
                    <tr>
                      <td>Sampai</td>
                      <td>:</td>
                      <td><?= $this->ang->tanggal_bulan_indonesia($loker->jatuh_tempo); ?></td>
                    </tr>
                  </table>
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?= site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}"); ?>" class="btn btn-sm btn-outline-secondary btn-custom-click">Selengkapnya</a>
                    </div>
                    <small class="text-muted"><i class="fas fa-heart"></i> <?= $loker->jumlah_suka; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-volume-up"></i> <?= $loker->jumlah_komentar; ?></small>
                  </div>
                </div>
              </div>
            </div>
          <?php $kosong = FALSE; endforeach; ?>
        </div>
        <div class="row">
          <?php if ($jumlah > 15): ?>
            <div class="col-12">
              <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-block btn-custom-click lihat-lebih-banyak-loker button-shadow mt-2" id="lihat-lebih-banyak">Lihat Lebih Banyak</button>
            </div>
          <?php endif; ?>
          <?php if ($kosong): ?>
            <div class="col-12">
              <h3 class="text-center f-bt mt-5 mb-5"><?= $pencarian == 'ya' ? 'Mohon Maaf, Hasil Pencarian Tidak Ditemukan' : 'Tidak Ada Lowongan Kerja Untuk Saat Ini'; ?></h3>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <a href="javascript:void(0);" class="back-to-top" style="display: none;">
        <center>
          <i class="fas fa-arrow-up"></i>
        </center>
      </a>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
		<script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
			const __ip__ = "<?= $this->ang->ambil_alamat_ip(); ?>";
			const __np__ = "<?= $this->session->ang_nama_pengguna; ?>";

      let toTop = false;
      let batasUntukToTop = 1400;

			<?php if ($_SERVER['CI_ENV'] == 'development'): ?>
				let sckt = io.connect(<?= json_encode($_SERVER['ANG_SOCKET'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
			<?php else: ?>
				<?php if ($_SERVER['ANG_SOCKET'] != $_ENV['ANG_SOCKET_TRANSPORT_POLLING_URL']): ?>
					let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`);
				<?php else: ?>
					let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`, {transports: ['polling']});
				<?php endif; ?>
			<?php endif; ?>

			let token = "<?= $this->security->get_csrf_hash(); ?>";

      $(window).scroll(function(){
        if ($(window).scrollTop() >= batasUntukToTop){
          if (toTop == false){
            $('a.back-to-top').fadeIn();
            toTop = true;
          }
        }else{
          if (toTop == true){
            $('a.back-to-top').fadeOut();
            toTop = false;
          }
        }
      });

      $('a.back-to-top').click(function(){
        $('html, body').animate({scrollTop: 0}, 1000);
      });

      $(function(){
        let i = 15, j = <?= $jumlah; ?>;
        const pencarian = '<?= $pencarian; ?>';

        $('#lihat-lebih-banyak').click(function(){
          let self = this;

          $(self).html('<i class="fas fa-spinner fa-spin"></i> Mohon tunggu...').attr('disabled','disabled');

          $.ajax({
            url:"<?= site_url('lowongan-kerja/lihat-lebih-banyak'); ?>",
            type:'POST',
            data:{index:i,<?= $this->security->get_csrf_token_name(); ?>:token,sp:pencarian,p:'<?= str_replace("'","\'",$yang_di_cari); ?>',jumlah:j},
            dataType:'JSON',
            success:function(respon){
              i += 15; token = respon.ctoken;

              $('#lowongan-kerja').append(respon.html);

              if (i >= j){
                $(self).parent().parent().remove();
              }else{
                $(self).text('Lihat Lebih Banyak').removeAttr('disabled');
              }

              tooltip();
              gm = document.querySelectorAll('img[data-src]');
              mm();

							if (__np__ != "") {
								sckt.emit('update token', {
									"token": token,
									"ip": __ip__,
									"np": __np__
								});
							}
            }
          });
        });
      });

			sckt.on('update token',function(data){
				if (data.token !== null && __ip__ === data.ip && __np__ === data.np){
					token = data.token;
				}
			});
    </script>
  </body>
</html>
