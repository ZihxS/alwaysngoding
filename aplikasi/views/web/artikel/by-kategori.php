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

  $mkat = $this->uri->segment(3);
  $kat  = str_replace('-',' ',$mkat);
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Artikel Berkategori <?= strtolower($kat); ?> - Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url("artikel/kategori/{$mkat}"),
        'sosmed_meta_title' => "Artikel Berkategori {$kat} di Always Ngoding",
        'sosmed_meta_desc' => "Lihat semua artikel berkategori {$kat} di Always Ngoding. Always Ngoding adalah tempat belajar pemrograman gratis berbahasa Indonesia, ayo belajar juga kembangkan dan manfaatkan ilmu anda di alwaysngoding."
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
            "description": "Artikel Berkategori <?= strtolower($kat); ?>",
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
                "name": "Artikel di Always Ngoding",
                "item": "<?= site_url('artikel'); ?>"
              },
              {
                "@type": "ListItem",
                "position": 3,
                "name": "Artikel Berkategori <?= strtolower($kat); ?>"
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
            "description": "Artikel di Always Ngoding",
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
                "target": "<?= site_url("artikel/kategori/{$mkat}?pencarian={search_term_string}"); ?>",
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
      <ol class="breadcrumb container">
        <?php if ($pencarian == 'ya'): ?>
          <li class="breadcrumb-item">
            <a href="<?= site_url('artikel'); ?>">Artikel</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= site_url("artikel/kategori/{$mkat}"); ?>"><?= $kat; ?></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Pencarian {<?= $yang_di_cari; ?>}</li>
        <?php else: ?>
          <li class="breadcrumb-item">
            <a href="<?= site_url('artikel'); ?>">Artikel</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page"><?= $kat; ?></li>
        <?php endif ?>
      </ol>
    </nav>
    <main class="web-main">
      <div class="container container-awal-artikel">
        <div class="header-v2">
          <h1>Artikel Berkategori <?= $kat; ?> di Always Ngoding</h1>
          <h2>Baca dan bagikan artikel di Always Ngoding</h2>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-<?= $this->session->has_userdata('ang_akses') ? '5' : '6'; ?>">
            <div class="input-group input-group-saring">
              <select id="saring-by-kategori" class="form-control form-control-sm">
                <option selected disabled>Saring Berdasarkan Kategori</option>
                <?php foreach ($this->kategori->ambil_data() as $kategori): ?>
                  <option value="<?= str_replace(' ','-',$kategori->kategori); ?>"><?= $kategori->kategori; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="input-group-append">
                <a href="<?= site_url('artikel'); ?>" class="btn btn-outline-secondary btn-sm">Reset</a>
              </div>
            </div>
          </div>
          <div class="col-sm-<?= $this->session->has_userdata('ang_akses') ? '5' : '6'; ?>">
            <form action="" method="GET">
              <div class="input-group input-cari-artikel">
                <input type="search" name="pencarian" class="form-control form-control-sm" placeholder="Cari artikel yang berkategori <?= strtolower($kat); ?> disini..." value="<?= $yang_di_cari; ?>" pattern="[a-zA-Z0-9 ]+" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary btn-sm" type="submit">Cari Artikel</button>
                  <?php if ($pencarian == 'ya'): ?>
                    <a href="<?= site_url("artikel/kategori/{$mkat}"); ?>" class="btn btn-outline-secondary btn-sm">Reset</a>
                  <?php endif; ?>
                </div>
              </div>
            </form>
          </div>
          <?php if ($this->session->has_userdata('ang_akses')): ?>
            <div class="col-sm-2">
              <a href="<?= !$this->session->has_userdata('ang_level') ? site_url('anggota/artikel/tambah') : site_url('area-pengurus/artikel/tambah'); ?>" class="btn btn-outline-secondary btn-sm btn-block btn-custom-tambah button-shadow" data-toggle='tooltip' title='Tambah Artikel'>
                Tambah
              </a>
            </div>
          <?php endif ?>
        </div>
        <hr>
        <div class="row display-flex" id="artikel">
          <?php $kosong = TRUE; foreach ($artikel_awal as $artikel): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card h-100 mb-1 custom-card-2">
                <div class="card-thumbnail">
                  <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $artikel->thumb === NULL ? base_url("media/thumbnail-artikel/thumb-kosong.png") : $artikel->thumb; ?>" alt="<?= $artikel->judul; ?>">
                </div>
                <div class="card-body">
                  <p class="awal-judul-artikel"><?= strlen($artikel->judul) >= 30 ? "<span class='judul-overflow' data-toggle='tooltip' title='".$artikel->judul."'>".substr($artikel->judul, 0, 27).'...</span>' : $artikel->judul; ?></p>
                  <p class="awal-waktu-posting-artikel"><?= $this->ang->tanggal_indonesia($artikel->tanggal_posting); ?> <?= $artikel->jam_posting; ?> WIB</p>
                  <p class="awal-isi-artikel"><?= strlen($this->ang->mst($artikel->isi)) >= 140 ? substr($this->ang->mst($artikel->isi), 0, 137).'...' : $this->ang->mst($artikel->isi); ?></p>
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?= site_url("artikel/{$artikel->id_artikel}/{$artikel->slug}"); ?>" class="btn btn-sm btn-outline-secondary">Selengkapnya</a>
                    </div>
                    <small class="text-muted"><i class="fas fa-heart"></i> <?= $artikel->jumlah_suka; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-volume-up"></i> <?= $artikel->jumlah_komentar; ?></small>
                  </div>
                </div>
              </div>
            </div>
          <?php $kosong = FALSE; endforeach; ?>
        </div>
        <div class="row">
          <?php if ($jumlah > 9): ?>
            <div class="col-12">
              <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-block" id="lihat-lebih-banyak">Lihat Lebih Banyak</button>
            </div>
          <?php endif; ?>
          <?php if ($kosong): ?>
            <div class="col-12">
              <h3 class="text-center f-bt mt-5 mb-5"><?= $pencarian == 'ya' ? 'Mohon Maaf, Hasil Pencarian Tidak Ditemukan' : 'Tidak Ada Data Artikel Untuk Saat Ini'; ?></h3>
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
    <?php $this->load->view('web/markas/modal-pencapaian', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
		<script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <?php $this->load->view('web/markas/cek-pencapaian', ['key' => 'posting'], FALSE); ?>
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
        let i = 9, j = <?= $jumlah; ?>;
        const pencarian = '<?= $pencarian; ?>';

        $('#saring-by-kategori').val('<?= $mkat; ?>');

        $('#saring-by-kategori').change(function(){
          document.location = `${$(this).val()}`;
        });

        $('#lihat-lebih-banyak').click(function(){
          let self = this;

          $(self).html('<i class="fas fa-spinner fa-spin"></i> Mohon tunggu...').attr('disabled','disabled');

          $.ajax({
            url:"<?= site_url("artikel/kategori/lihat-lebih-banyak"); ?>",
            type:'POST',
            data:{index:i,<?= $this->security->get_csrf_token_name(); ?>:token,sp:pencarian,p:'<?= str_replace("'","\'",$yang_di_cari); ?>',kategori:'<?= $kat; ?>',jumlah:j},
            dataType:'JSON',
            success:function(respon){
              i += 9; token = respon.ctoken;

              $('#artikel').append(respon.html);

              if (i >= j){
                $(self).parent().parent().remove();
              }else{
                $(self).text('Lihat Lebih Banyak').removeAttr('disabled');
              }

              tooltip();
              gm = document.querySelectorAll('img[data-src]');
              mm();

							if (np != "") {
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
