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
    <title>Semua Anggota - Always Ngoding</title>
    <?php
      $deskripsi = "Lihat semua anggota aktif Always Ngoding.";

      $this->load->view('head', [
        'url' => site_url('anggota/semua'),
        'deskripsi' => $deskripsi,
        'sosmed_meta_title' => "Anggota Always Ngoding",
        'sosmed_meta_desc' => $deskripsi
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
            "description": "Semua Anggota",
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
                "name": "Semua Anggota"
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
            "description": "Semua Anggota",
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
          <li class="breadcrumb-item active" aria-current="page">Semua Anggota Always Ngoding</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-semua-anggota">
        <div class="header-v2">
          <h1>Semua Anggota Always Ngoding</h1>
        </div>
        <hr>
      	<div class="row display-flex">
      		<?php $no = 1; foreach ($terbaik as $t): ?>
	      		<div class="col-lg-4">
	            <div class="card card-100 custom-card">
	              <div class="card-body text-center">
	                <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/foto-pengguna/".($t->foto ?? 'blank.png')); ?>" class="landing-anggota-terbaik" alt="Foto <?= $t->nama_pengguna; ?>">
	                <hr class="mt-2 mb-2">
	                <p class="mb-0" style="font-family: 'BT'; font-size: 16px;"><?= $t->nama_pengguna; ?></p>
	                <p class="mb-0"><?= $t->nama_lengkap ?? '-'; ?></p>
	                <div>
	                	<span class="badge badge-pill badge-success" data-toggle='tooltip' title='Poin Belajar'><?= $t->poin_belajar; ?></span>
	                	<span class="badge badge-pill badge-success" data-toggle='tooltip' title='Poin Diskusi'><?= $t->poin_diskusi; ?></span>
	                	<span class="badge badge-pill badge-success" data-toggle='tooltip' title='Jumlah Kontribusi'><?= $t->jumlah_kontribusi; ?></span>
	                </div>
	                <hr class="mt-2 mb-2">
	                <p class="font-italic text-muted"><small>Peringkat <?= $no++; ?></small></p>
	                <a href="<?= site_url("anggota/{$t->nama_pengguna}"); ?>" class="btn btn-outline-danger btn-block btn-sm btn-custom-click" target='_blank'>Lihat Data Diri <?= strlen($t->nama_pengguna) >= 13 ? substr($t->nama_pengguna, 0, 10).'...' : $t->nama_pengguna; ?></a>
	              </div>
	            </div>
	          </div>
      		<?php endforeach; ?>
      	</div>
      	<hr>
    		<div id="semua-anggota" class="row display-flex">
      		<?php foreach ($semua_awal as $data): ?>
	      		<div class="col-md-6 col-lg-4">
	            <div class="card card-100 custom-card">
	              <div class="card-body text-center">
	                <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/foto-pengguna/".($data->foto ?? 'blank.png')); ?>" class="landing-anggota-terbaik" alt="Foto <?= $data->nama_pengguna; ?>">
	                <hr class="mt-2 mb-2">
	                <p class="mb-0" style="font-family: 'BT'; font-size: 16px;"><?= $data->nama_pengguna; ?></p>
	                <p class="mb-0"><?= $data->nama_lengkap ?? '-'; ?></p>
	                <hr class="mt-2 mb-2">
	                <div class="mb-3">
	                	<span class="badge badge-pill badge-secondary" data-toggle='tooltip' title='Poin Belajar'><?= $data->poin_belajar; ?></span>
	                	<span class="badge badge-pill badge-secondary" data-toggle='tooltip' title='Poin Diskusi'><?= $data->poin_diskusi; ?></span>
	                	<span class="badge badge-pill badge-secondary" data-toggle='tooltip' title='Jumlah Kontribusi'><?= $data->jumlah_kontribusi; ?></span>
	                </div>
	                <a href="<?= site_url("anggota/{$data->nama_pengguna}"); ?>" class="btn btn-outline-danger btn-block btn-sm btn-custom-click" target='_blank'>Lihat Data Diri <?= strlen($data->nama_pengguna) >= 13 ? substr($data->nama_pengguna, 0, 10).'...' : $data->nama_pengguna; ?></a>
	              </div>
	            </div>
	          </div>
      		<?php endforeach; ?>
      	</div>
      	<?php if ($jumlah > 105): ?>
          <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-custom-click btn-block button-shadow" id="lihat-lebih-banyak">Lihat Lebih Banyak</button>
        <?php endif; ?>
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
      $(function(){
				const __ip__ = "<?= $this->ang->ambil_alamat_ip(); ?>";
				const __np__ = "<?= $this->session->ang_nama_pengguna; ?>";

        let toTop = false;
        let batasUntukToTop = 1400;
        let i = 105, j = <?= $jumlah; ?>, token = "<?= $this->security->get_csrf_hash(); ?>";

				<?php if ($_SERVER['CI_ENV'] == 'development'): ?>
					let sckt = io.connect(<?= json_encode($_SERVER['ANG_SOCKET'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
				<?php else: ?>
					<?php if ($_SERVER['ANG_SOCKET'] != $_ENV['ANG_SOCKET_TRANSPORT_POLLING_URL']): ?>
						let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`);
					<?php else: ?>
						let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`, {transports: ['polling']});
					<?php endif; ?>
				<?php endif; ?>

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

        $('#lihat-lebih-banyak').click(function(){
          let self = this;

          $(self).html('<i class="fas fa-spinner fa-spin"></i> Mohon tunggu...').attr('disabled','disabled');

          $.ajax({
            url:"<?= site_url('anggota/semua/lihat-lebih-banyak'); ?>",
            type:'POST',
            data:{index:i,<?= $this->security->get_csrf_token_name(); ?>:token,jumlah:j},
            dataType:'JSON',
            success:function(respon){
              i += 105; token = respon.ctoken;

              $('#semua-anggota').append(respon.html);

              if (i >= j){
                $(self).remove();
              }else{
                $(self).text('Lihat Lebih Banyak').removeAttr('disabled');
              }

              updateTema(hideungMode);

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

				sckt.on('update token',function(data){
					if (data.token !== null && __ip__ === data.ip && __np__ === data.np){
						token = data.token;
					}
				});

      });
    </script>
  </body>
</html>
