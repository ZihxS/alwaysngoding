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

  $fp = $this->pengguna->ambil_foto($diskusi->penginput); // Foto Penginput
  $tp = $this->pengguna->ambil_tentang($diskusi->penginput); // Tentang Penginput
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title><?= $diskusi->judul; ?> - Always Ngoding</title>
    <?php
      $deskripsi = strlen($this->ang->mst($diskusi->isi)) >= 145 ? substr($this->ang->mst($diskusi->isi), 0, 142).'...' : $this->ang->mst($diskusi->isi);

      $this->load->view('head', [
        'url' => site_url("diskusi/{$diskusi->id_diskusi}/{$diskusi->slug}"),
        'deskripsi' => $deskripsi,
        'sosmed_meta_title' => $diskusi->judul,
        'sosmed_meta_desc' => $deskripsi
      ], FALSE);
    ?>
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>">
    <link id="cssFont" rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fab/fab.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/prism/prism.css'); ?>">
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
            "description": "<?= ucwords($title); ?>",
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
                "name": "Forum Diskusi",
                "item": "<?= site_url('diskusi'); ?>"
              },
              {
                "@type": "ListItem",
                "position": 3,
                "name": "<?= $diskusi->judul; ?>"
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
            "description": "<?= ucwords($title); ?>",
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
          <li class="breadcrumb-item">
            <a href="<?= site_url('diskusi'); ?>">Diskusi</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page"><?= ucwords($diskusi->judul); ?></li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lihat-diskusi">
        <div class="header-v2">
          <h1><?= $diskusi->judul; ?></h1>
        </div>
        <div class="row">
          <div class="col-12">
            <article class="card custom-card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span>
                    <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $fp === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$fp}"); ?>" class="fp-di-lihat-diskusi d-none d-sm-none d-md-inline" alt="Foto Profil <?= $diskusi->penginput; ?>">
                    <small class="text-muted">
                      <span id="penginput-diskusi">
                        <?php if ($this->session->has_userdata('ang_akses') && $diskusi->penginput == $this->session->ang_nama_pengguna): ?>
                          <?= substr($diskusi->penginput,0,12).(strlen($diskusi->penginput) > 12 ? '...' : ''); ?>
                        <?php else: ?>
                          <a href="<?= site_url("anggota/{$diskusi->penginput}"); ?>"><?= $diskusi->penginput; ?></a>
                        <?php endif; ?>
                      </span>
                    </small>
                  </span>
                  <span>
                    <small class="text-muted">
                      <?= $this->ang->tanggal_bulan_indonesia($diskusi->tanggal_posting); ?>
                      <span class="titik-pemisah"></span>
                      <?= $diskusi->jam_posting; ?> WIB
                    </small>
                  </span>
                </div>
                <hr>
                <?= str_replace('<p>&nbsp;</p>', '', $diskusi->isi); ?>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted"><span id="jumlah-suka-diskusi"><?= $diskusi->jumlah_suka; ?></span> Jumlah Suka</small>
                  <?php if ($this->session->has_userdata('ang_akses')): ?>
                    <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                      <span id="aksi-diskusi">
                        <?php if ($diskusi->penginput != $this->session->ang_nama_pengguna): ?>
                          <?php if (!$this->ds_diskusi->cek_apakah_sudah_menyukai($diskusi->id_diskusi)): ?>
                            <span id="tombol-sukai-diskusi">
                              <button id="sukai-diskusi" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai'>
                                <i class="fas fa-heart"></i>
                              </button>
                            </span>
                          <?php else: ?>
                            <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai diskusi ini'><i class="fas fa-heart"></i></button>
                          <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($diskusi->penginput == $this->session->ang_nama_pengguna): ?>
                          <a href="<?= site_url("area-pengurus/diskusi/ubah/{$diskusi->id_diskusi}") ?>" class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Ubah' target='_blank'>
                            <i class="fas fa-edit"></i>
                          </a>
                        <?php endif; ?>
                        <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Ubah Status' target='_blank' onclick="ubah_status_diskusi();">
                          <i class="fas fa-window-restore"></i>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_diskusi();">
                          <i class="fas fa-trash"></i>
                        </button>
                      </span>
                    <?php else: ?>
                      <?php if ($diskusi->penginput != $this->session->ang_nama_pengguna): ?>
                        <?php if (!$this->ds_diskusi->cek_apakah_sudah_menyukai($diskusi->id_diskusi)): ?>
                          <span id="tombol-sukai-diskusi">
                            <button id="sukai-diskusi" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai'>
                              <i class="fas fa-heart"></i>
                            </button>
                          </span>
                        <?php else: ?>
                          <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai diskusi ini'><i class="fas fa-heart"></i></button>
                        <?php endif; ?>
                      <?php else: ?>
                        <span id="aksi-diskusi">
                          <a href="<?= site_url("anggota/diskusi/ubah/{$diskusi->id_diskusi}") ?>" class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Ubah' target='_blank'>
                            <i class="fas fa-edit"></i>
                          </a>
                          <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_diskusi();">
                            <i class="fas fa-trash"></i>
                          </button>
                        </span>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </article>
            <div class="card mt-3 mb-3 custom-card" id="awal-jawaban">
              <div class="card-body text-center f-bt">
                <?= $this->j_diskusi->cek_jumlah($diskusi->id_diskusi) > 0 ? 'JAWABAN UNTUK DISKUSI INI' : 'BELUM ADA JAWABAN UNTUK DISKUSI INI'; ?>
              </div>
            </div>
            <div id="jawaban">
              <?php foreach ($jawaban as $j): $f = $this->pengguna->ambil_foto($j->pengguna); $t = $this->pengguna->ambil_tentang($j->pengguna); ?>
                <div class="card mb-2 custom-card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <span>
                        <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}"); ?>" class="fp-di-jawaban d-none d-sm-none d-md-inline" alt="Foto Profil <?= $j->pengguna; ?>">
                        <small class="text-muted">
                          <?php if ($this->session->has_userdata('ang_akses') && $j->pengguna == $this->session->ang_nama_pengguna): ?>
                            <?= substr($j->pengguna,0,10).(strlen($j->pengguna) > 10 ? '...' : ''); ?>
                            <?php if ($diskusi->penginput == $j->pengguna): ?>
                              <span class="d-none d-sm-none d-md-inline">
                                <span class="titik-pemisah"></span>
                                Pembuka Diskusi
                              </span>
                            <?php endif; ?>
                          <?php else: ?>
                            <span id="pengguna-jawaban">
                              <span>
                                <a href="<?= site_url("anggota/{$j->pengguna}"); ?>"><?= $j->pengguna; ?></a>
                                <?php if ($diskusi->penginput == $j->pengguna): ?>
                                  <span class="d-none d-sm-none d-md-inline">
                                    <span class="titik-pemisah"></span>
                                    Pembuka Diskusi
                                  </span>
                                <?php endif; ?>
                              </span>
                            </span>
                          <?php endif; ?>
                        </small>
                      </span>
                      <span>
                        <small class="text-muted">
                          <?= $this->ang->tanggal_bulan_indonesia($j->tanggal); ?>
                          <span class="titik-pemisah"></span>
                          <?= $j->jam; ?> WIB
                        </small>
                      </span>
                    </div>
                    <hr>
                    <?= str_replace('<p>&nbsp;</p>', '', $j->isi); ?>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted"><span id="jumlah-suka-<?= $j->id_j_diskusi; ?>"><?= $j->jumlah_suka; ?></span> Jumlah Suka</small>
                      <?php if ($this->session->has_userdata('ang_akses')): ?>
                        <?php if ($j->pengguna == $this->session->ang_nama_pengguna): ?>
                          <span id="aksi-jawaban">
                            <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Sunting' onclick="sunting(<?= $j->id_j_diskusi; ?>);">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus(<?= $j->id_j_diskusi; ?>);">
                              <i class="fas fa-trash"></i>
                            </button>
                          </span>
                        <?php else: ?>
                          <span>
                            <?php if (!$this->dsjd->cek_apakah_sudah_menyukai($j->id_j_diskusi)): ?>
                              <span id="tombol-sukai-jawaban">
                                <button id="sukai-jawaban" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai' data-id='<?= $j->id_j_diskusi; ?>'>
                                  <i class="fas fa-heart"></i>
                                </button>
                              </span>
                            <?php else: ?>
                              <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai jawaban ini'><i class="fas fa-heart"></i></button>
                            <?php endif; ?>
                            <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                              <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Blok' onclick="blok_jawaban(<?= $j->id_j_diskusi; ?>);">
                                <i class="fas fa-window-close"></i>
                              </button>
                              <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_jawaban(<?= $j->id_j_diskusi; ?>);">
                                <i class="fas fa-trash"></i>
                              </button>
                            <?php endif; ?>
                          </span>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <?php if ($j_jawaban > 5): ?>
              <button type="button" class="btn btn-outline-secondary btn-sm btn-custom-click rounded-lg btn-block mt-1 mb-2" id="muat-lebih-banyak-jawaban">
                Muat Lebih Banyak Jawaban
              </button>
            <?php endif; ?>
            <?php if ($this->session->has_userdata('ang_akses')): ?>
              <form id="jawab">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <textarea name="jawaban" class="form-control" placeholder="Tulis jawaban untuk diskusi ini..."></textarea>
                <button type="submit" class="btn btn-outline-secondary btn-sm btn-custom-click btn-block rounded-lg mb-2 mt-2" id="btn-jawab">Kirim Jawaban</button>
              </form>
            <?php else: ?>
              <a href="<?= site_url("masuk?selanjutnya={$_SERVER['REQUEST_URI']}"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg">Masuk untuk berdiskusi</a>
            <?php endif; ?>
            <a href="<?= site_url("diskusi"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg">Kembali Ke Halaman Daftar Diskusi</a>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-sunting-jawaban" tabindex="-1" role="dialog" aria-labelledby="judul-sunting-jawaban" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul-sunting-jawaban">Sunting jawaban</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-sunting-jawaban">
              <div class="modal-body">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="id_jawaban" name="id_jawaban">
                <textarea id="input-sunting-jawaban" name="sunting" class="form-control" placeholder="Sunting jawaban untuk diskusi ini..."></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline-secondary btn-sm btn-custom-click btn-block rounded-lg" id="btn-sunting-jawaban">Simpan perubahan</button>
              </div>
            </form>
          </div>
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
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/prism/prism.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <?php $this->load->view('web/markas/cek-pencapaian', ['key' => 'kontribusi'], FALSE); ?>
    <?php $this->load->view('web/markas/cek-pencapaian', ['key' => 'diskusi'], FALSE); ?>
    <script>
			const __ip__ = "<?= $this->ang->ambil_alamat_ip(); ?>";
      const __np__ = "<?= $this->session->has_userdata('ang_nama_pengguna') ? $this->session->ang_nama_pengguna : '-'; ?>";
      const id_diskusi = '<?= $diskusi->id_diskusi; ?>';

			let i = 5;
      let j = <?= $j_jawaban; ?>;
      let toTop = false;
      let batasUntukToTop = 1400;
      let statusAnimasiPengguna = false;
      let statusAnimasiPenginput = false;
      let ctoken = "<?= $this->security->get_csrf_hash(); ?>";
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

      $(function(){
        <?php if ($this->input->get('aksi',TRUE) === 'menjawab'): ?>
          $('html, body').animate({scrollTop: $('#awal-jawaban').offset().top},1300);
          let uri = window.location.toString();
          let clean_uri = uri.substring(0,uri.indexOf("?"));
          window.history.replaceState({},document.title,clean_uri);
        <?php endif; ?>

        tinymce.init({
          selector:'textarea',
          theme:'modern',
          skin:'custom',
          plugins:['autolink link image preview codesample fullscreen placeholder paste'],
          paste_as_text: true,
          toolbar1:'undo redo | bold italic underline hr | link unlink | image codesample | preview fullscreen',
          codesample_languages:[
            {text:'html',value:'markup'},
            {text:'javascript',value:'javascript'},
            {text:'typescript',value:'typescript'},
            {text:'json',value:'json'},
            {text:'css',value:'css'},
            {text:'less',value:'less'},
            {text:'sass',value:'scss'},
            {text:'php',value:'php'},
            {text:'sql',value:'sql'},
            {text:'ruby',value:'ruby'},
            {text:'python',value:'python'},
            {text:'java',value:'java'},
            {text:'c',value:'c'},
            {text:'c#',value:'csharp'},
            {text:'c++',value:'cpp'}
          ],
          branding:false,
          menubar:false,
          image_advtab:true,
          height:350,
          codesample_dialog_width:1000,
          codesample_dialog_height:500,
          plugin_preview_width:1000
        });

        sckt.on('perbaharui web data suka diskusi',function(data){
          if (id_diskusi == data.id){
            if (data.token !== null && ctoken != data.token && __ip__ === data.aip){
              ctoken = data.token;
              $('input#ctoken').val(data.token);
              $('#sukai-diskusi').parent().html(`<button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai diskusi ini'><i class="fas fa-heart"></i></button>`);
              tooltip();
              $('#aksi-jawaban > button').removeAttr('disabled');
              $('button#sukai-jawaban').removeAttr('disabled');
            }
            $('#jumlah-suka-diskusi').text(parseInt($('#jumlah-suka-diskusi').text())+1);
          }
        });

        sckt.on('perbaharui web data suka jawaban diskusi',function(data){
          if (id_diskusi == data.id){
            if (data.token !== null && ctoken != data.token && __ip__ === data.aip){
              ctoken = data.token;
              $('input#ctoken').val(data.token);
              $(`[data-id=${data.ij}]`).parent().html(`<span>
                <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai jawaban ini'><i class="fas fa-heart"></i>
                </button>
              </span>`);
              $('#sukai-diskusi').removeAttr('disabled');
              $('#aksi-diskusi > button').removeAttr('disabled','disabled');
              $('#aksi-diskusi > a').removeAttr('disabled','disabled');
              $('#aksi-jawaban > button').removeAttr('disabled');
              $('button#sukai-jawaban').removeAttr('disabled');
              tooltip();
            }
            $(`#jumlah-suka-${data.ij}`).text(parseInt($(`#jumlah-suka-${data.ij}`).text())+1);
          }
        });

        $("span#pengguna-jawaban").hover(function(){
          if (statusAnimasiPengguna == false){
            $(this).children().eq(1).fadeIn(300);
          }
        },function(){
          statusAnimasiPengguna = true;
          $(this).children().eq(1).fadeOut(300,function(){
            statusAnimasiPengguna = false;
          });
        });
      });

      $('#sukai-diskusi').click(function(e){
        $('#aksi-jawaban > button').attr('disabled','disabled');
        $('button#sukai-jawaban').attr('disabled','disabled');
        $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
        $.ajax({
          url:"<?= site_url('diskusi/sukai/diskusi'); ?>",
          type:'POST',
          data:{id_diskusi:id_diskusi,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              sckt.emit('perbaharui data suka diskusi',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui web data suka diskusi',{token:r.ctoken,aip:__ip__,id:id_diskusi});
              sckt.emit('perbaharui riwayat');
            }else{
							ctoken = r.ctoken;
              $('input#ctoken').val(ctoken);
            }
						if (__np__ != "-") {
							sckt.emit('update token', {
								"token": r.ctoken,
								"ip": __ip__,
								"np": __np__
							});
						}
          }
        });
      });

      $('button#sukai-jawaban').click(function(e){
        let id_jawaban = $(this).data('id');
        $('#aksi-diskusi > button').attr('disabled','disabled');
        $('#aksi-diskusi > a').attr('disabled','disabled');
        $('#aksi-jawaban > button').attr('disabled','disabled');
        $('#sukai-diskusi').attr('disabled','disabled');
        $('button#sukai-jawaban').not(`[data-id=${id_jawaban}]`).attr('disabled','disabled');
        $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
        $.ajax({
          url:"<?= site_url('diskusi/sukai/jawaban'); ?>",
          type:'POST',
          data:{id_jawaban:id_jawaban,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              sckt.emit('perbaharui data suka jawaban diskusi',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui web data suka jawaban diskusi',{token:r.ctoken,aip:__ip__,id:id_diskusi,ij:id_jawaban});
              sckt.emit('perbaharui riwayat');
            }else{
							ctoken = r.ctoken;
              $('input#ctoken').val(ctoken);
            }
						if (__np__ != "-") {
							sckt.emit('update token', {
								"token": r.ctoken,
								"ip": __ip__,
								"np": __np__
							});
						}
          }
        });
      });

      $('#jawab').on('submit',function(e){
        e.preventDefault();
        tinymce.triggerSave();
        $('#btn-jawab').html('<i class="fas fa-spinner fa-spin"></i> Sedang diproses...').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('diskusi/menjawab'); ?>",
          type:'POST',
          data:$(this).serialize()+`&id_diskusi=${id_diskusi}`,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#btn-jawab').text('Terima kasih atas jawaban anda...');
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"success",
                showCancelButton:false,
                showConfirmButton:false
              });
              setTimeout(function(){document.location = '?aksi=menjawab';},1500);
            }else{
              $('#btn-jawab').text('Kirim Jawaban').removeAttr('disabled');
              ctoken = r.ctoken;
              $('input#ctoken').val(ctoken);
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"warning",
                confirmButtonClass:"btn-warning",
                confirmButtonText:"Oke",
                showCancelButton:false
              });
            }
						if (__np__ != "-") {
							sckt.emit('update token', {
								"token": r.ctoken,
								"ip": __ip__,
								"np": __np__
							});
						}
          },
          error:function(r){
            $('#btn-jawab').text('Kirim Jawaban').removeAttr('disabled');
            swal({
              title:"Terjadi Kesalahan",
              text:"Silahkan Hubungi Developer Agar Diperbaiki.",
              type:"error",
              showCancelButton:false,
              confirmButtonText:"OK"
            });
            <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
          }
        });
      });

      $('#form-sunting-jawaban').on('submit',function(e){
        e.preventDefault();
        tinymce.triggerSave();
        $('#btn-sunting-jawaban').html('<i class="fas fa-spinner fa-spin"></i> Sedang diproses...').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('diskusi/menjawab/sunting'); ?>",
          type:'POST',
          data:$(this).serialize()+`&id_diskusi=${id_diskusi}`,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#btn-sunting-jawaban').text('Proses berhasil...');
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"success",
                showCancelButton:false,
                showConfirmButton:false
              });
              setTimeout(function(){document.location = '?aksi=menjawab';},1500);
            }else{
              $('#btn-sunting-jawaban').text('Simpan perubahan').removeAttr('disabled');
              ctoken = r.ctoken;
              $('input#ctoken').val(ctoken);
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"warning",
                confirmButtonClass:"btn-warning",
                confirmButtonText:"Oke",
                showCancelButton:false
              });
            }
						if (__np__ != "-") {
							sckt.emit('update token', {
								"token": r.ctoken,
								"ip": __ip__,
								"np": __np__
							});
						}
          },
          error:function(r){
            $('#btn-sunting-jawaban').text('Simpan perubahan').removeAttr('disabled');
            swal({
              title:"Terjadi Kesalahan",
              text:"Silahkan Hubungi Developer Agar Diperbaiki.",
              type:"error",
              showCancelButton:false,
              confirmButtonText:"OK"
            });
            <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
          }
        });
      });

      function sunting(id_jawaban){
        $('#modal-sunting-jawaban').modal('show');
        $.ajax({
          url:"<?= site_url('diskusi/menjawab/sunting/ambil'); ?>",
          type:'POST',
          data:{id_jawaban:id_jawaban},
          success:function(r){
            $('#id_jawaban').val(id_jawaban);
            $('#modal-sunting-jawaban').modal('show');
            tinymce.get('input-sunting-jawaban').setContent(r);
          },
          error:function(r){
            swal({
              title:"Terjadi Kesalahan",
              text:"Silahkan Hubungi Developer Agar Diperbaiki.",
              type:"error",
              showCancelButton:false,
              confirmButtonText:"OK"
            });
            <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
          }
        });
      }

      function hapus(id_jawaban){
        swal({
          title:"Apakah anda yakin??",
          text:"Yakin ingin menghapus jawaban ini??",
          type:"warning",
          showCancelButton:true,
          confirmButtonColor:"#DD6B55",
          confirmButtonText:"Ya, Yakin!",
          cancelButtonText:"Tidak jadi!",
          closeOnConfirm:false,
          showLoaderOnConfirm:true,
          closeOnCancel:true
        },function(setuju){
          if (setuju){
            $.ajax({
              url:"<?= site_url('diskusi/hapus-jawaban'); ?>",
              type:'POST',
              data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,id_jawaban:id_jawaban},
              dataType:'JSON',
              success:function(r){
                if (r.sukses){
                  sckt.emit('perbaharui jawaban diskusi',{token:r.ctoken,np:__np__});
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"success",
                    showCancelButton:false,
                    showConfirmButton:false
                  });
                  setTimeout(function(){document.location = '?aksi=menjawab';},1500);
                }else{
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  ctoken = r.token;
                  $('input#ctoken').val(r.token);
                }
								if (__np__ != "-") {
									sckt.emit('update token', {
										"token": r.ctoken,
										"ip": __ip__,
										"np": __np__
									});
								}
              },
              error:function(respon){
                swal({
                  title:"Terjadi Kesalahan",
                  text:"Silahkan Hubungi Developer Agar Diperbaiki.",
                  type:"error",
                  showCancelButton:false,
                  confirmButtonText:"OK"
                });
                <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
              }
            });
          }
        });
      }

      $('#muat-lebih-banyak-jawaban').click(function(){
        let self = this;

        $(self).html('<i class="fas fa-spinner fa-spin"></i> Mohon tunggu...').attr('disabled','disabled');

        $.ajax({
          url:"<?= site_url('diskusi/muat-lebih-banyak-jawaban'); ?>",
          type:'POST',
          data:{id_diskusi:id_diskusi,index:i,<?= $this->security->get_csrf_token_name(); ?>:ctoken,jumlah:j},
          dataType:'JSON',
          success:function(respon){
            i += 5; ctoken = respon.ctoken;

            $('input#ctoken').val(respon.ctoken);

            $('#jawaban').append(respon.html);

            if (i >= j){
              $(self).remove();
            }else{
              $(self).text('Muat Lebih Banyak Jawaban').removeAttr('disabled');
            }

            Prism.highlightAll();
            tooltip();
            gm = document.querySelectorAll('img[data-src]');
            mm();

            $("span#pengguna-jawaban").hover(function(){
              if (statusAnimasiPengguna == false){
                $(this).children().eq(1).fadeIn(300);
              }
            },function(){
              statusAnimasiPengguna = true;
              $(this).children().eq(1).fadeOut(300,function(){
                statusAnimasiPengguna = false;
              });
            });

            $('button#sukai-jawaban').click(function(e){
              let id_jawaban = $(this).data('id');
              $('#aksi-diskusi > button').attr('disabled','disabled');
              $('#aksi-diskusi > a').attr('disabled','disabled');
              $('#aksi-jawaban > button').attr('disabled','disabled');
              $('#sukai-diskusi').attr('disabled','disabled');
              $('button#sukai-jawaban').not(`[data-id=${id_jawaban}]`).attr('disabled','disabled');
              $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
              $.ajax({
                url:"<?= site_url('diskusi/sukai/jawaban'); ?>",
                type:'POST',
                data:{id_jawaban:id_jawaban,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
                dataType:'JSON',
                success:function(r){
                  if (r.sukses){
                    sckt.emit('perbaharui data suka jawaban diskusi',{token:r.ctoken,np:__np__});
                    sckt.emit('perbaharui web data suka jawaban diskusi',{token:r.ctoken,aip:__ip__,id:id_diskusi,ij:id_jawaban});
                    sckt.emit('perbaharui riwayat');
                  }else{
                    ctoken = r.ctoken;
                    $('input#ctoken').val(ctoken);
                  }
									if (__np__ != "-") {
										sckt.emit('update token', {
											"token": r.ctoken,
											"ip": __ip__,
											"np": __np__
										});
									}
                }
              });
            });
          }
        });
      });

      <?php if ($this->session->has_userdata('ang_akses')): ?>
        <?php if ($this->session->has_userdata('ang_pengurus')): ?>
          function ubah_status_diskusi(){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin mengubah status diskusi ini??",
              type:"info",
              showCancelButton:true,
              confirmButtonColor:"#00B0E4",
              confirmButtonText:"Ya, Yakin!",
              cancelButtonText:"Tidak jadi!",
              closeOnConfirm:false,
              showLoaderOnConfirm:true,
              closeOnCancel:true
            },function(setuju){
              if (setuju){
                $.ajax({
                  url:"<?= site_url('area-pengurus/diskusi/ubah-status'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_diskusi":id_diskusi},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui diskusi',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){window.location.href = `<?= site_url('diskusi'); ?>`;},1500);
                    }else{
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      ctoken = r.ctoken;
                      $('input#ctoken').val(ctoken);
                    }
										if (__np__ != "-") {
											sckt.emit('update token', {
												"token": r.ctoken,
												"ip": __ip__,
												"np": __np__
											});
										}
                  },
                  error:function(respon){
                    swal({
                      title:"Terjadi Kesalahan",
                      text:"Silahkan Hubungi Developer Agar Diperbaiki.",
                      type:"error",
                      showCancelButton:false,
                      confirmButtonText:"OK"
                    });
                    <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
                  }
                });
              }
            });
          }

          function blok_jawaban(id_jawaban){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin memblokir jawaban diskusi ini??",
              type:"warning",
              showCancelButton:true,
              confirmButtonColor:"#DD6B55",
              confirmButtonText:"Ya, Yakin!",
              cancelButtonText:"Tidak jadi!",
              closeOnConfirm:false,
              showLoaderOnConfirm:true,
              closeOnCancel:true
            },function(setuju){
              if (setuju){
                $.ajax({
                  url:"<?= site_url('area-pengurus/diskusi/jawaban/blok'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_jawaban":id_jawaban},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui jawaban diskusi',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){document.location = '?aksi=menjawab';},1500);
                    }else{
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      ctoken = r.ctoken;
                      $('input#ctoken').val(ctoken);
                    }
										if (__np__ != "-") {
											sckt.emit('update token', {
												"token": r.ctoken,
												"ip": __ip__,
												"np": __np__
											});
										}
                  },
                  error:function(respon){
                    swal({
                      title:"Terjadi Kesalahan",
                      text:"Silahkan Hubungi Developer Agar Diperbaiki.",
                      type:"error",
                      showCancelButton:false,
                      confirmButtonText:"OK"
                    });
                    <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
                  }
                });
              }
            });
          }

          function hapus_jawaban(id_jawaban){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin menghapus jawaban diskusi ini??",
              type:"warning",
              showCancelButton:true,
              confirmButtonColor:"#DD6B55",
              confirmButtonText:"Ya, Yakin!",
              cancelButtonText:"Tidak jadi!",
              closeOnConfirm:false,
              showLoaderOnConfirm:true,
              closeOnCancel:true
            },function(setuju){
              if (setuju){
                $.ajax({
                  url:"<?= site_url('area-pengurus/diskusi/jawaban/hapus'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_jawaban":id_jawaban},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui jawaban diskusi',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){document.location = '?aksi=menjawab';},1500);
                    }else{
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      ctoken = r.ctoken;
                      $('input#ctoken').val(ctoken);
                    }
										if (__np__ != "-") {
											sckt.emit('update token', {
												"token": r.ctoken,
												"ip": __ip__,
												"np": __np__
											});
										}
                  },
                  error:function(respon){
                    swal({
                      title:"Terjadi Kesalahan",
                      text:"Silahkan Hubungi Developer Agar Diperbaiki.",
                      type:"error",
                      showCancelButton:false,
                      confirmButtonText:"OK"
                    });
                    <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
                  }
                });
              }
            });
          }

          function hapus_diskusi(){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin menghapus diskusi ini??",
              type:"warning",
              showCancelButton:true,
              confirmButtonColor:"#DD6B55",
              confirmButtonText:"Ya, Yakin!",
              cancelButtonText:"Tidak jadi!",
              closeOnConfirm:false,
              showLoaderOnConfirm:true,
              closeOnCancel:true
            },function(setuju){
              if (setuju){
                $.ajax({
                  url:"<?= site_url('area-pengurus/diskusi/hapus'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_diskusi":id_diskusi},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui diskusi',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){window.location.href = `<?= site_url('diskusi'); ?>`;},1500);
                    }else{
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      ctoken = r.ctoken;
                      $('input#ctoken').val(ctoken);
                    }
										if (__np__ != "-") {
											sckt.emit('update token', {
												"token": r.ctoken,
												"ip": __ip__,
												"np": __np__
											});
										}
                  },
                  error:function(respon){
                    swal({
                      title:"Terjadi Kesalahan",
                      text:"Silahkan Hubungi Developer Agar Diperbaiki.",
                      type:"error",
                      showCancelButton:false,
                      confirmButtonText:"OK"
                    });
                    <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
                  }
                });
              }
            });
          }
        <?php else: ?>
          <?php if ($diskusi->penginput == $this->session->ang_nama_pengguna): ?>
            function hapus_diskusi(){
              swal({
                title:"Apakah anda yakin??",
                text:"Yakin ingin menghapus diskusi ini??",
                type:"warning",
                showCancelButton:true,
                confirmButtonColor:"#DD6B55",
                confirmButtonText:"Ya, Yakin!",
                cancelButtonText:"Tidak jadi!",
                closeOnConfirm:false,
                showLoaderOnConfirm:true,
                closeOnCancel:true
              },function(setuju){
                if (setuju){
                  $.ajax({
                    url:"<?= site_url('anggota/diskusi/hapus'); ?>",
                    type:'POST',
                    data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_diskusi":id_diskusi},
                    dataType:'JSON',
                    success:function(r){
                      if (r.sukses){
                        sckt.emit('perbaharui diskusi',{token:r.ctoken,np:__np__});
                        swal({
                          title:"Informasi",
                          text:r.pesan,
                          type:"success",
                          showCancelButton:false,
                          showConfirmButton:false
                        });
                        setTimeout(function(){window.location.href = `<?= site_url('diskusi'); ?>`;},1500);
                      }else{
                        swal({
                          title:"Informasi",
                          text:r.pesan,
                          type:"error",
                          showCancelButton:false,
                          confirmButtonText:"OK"
                        });
                        ctoken = r.ctoken;
                        $('input#ctoken').val(ctoken);
                      }
											if (__np__ != "-") {
												sckt.emit('update token', {
													"token": r.ctoken,
													"ip": __ip__,
													"np": __np__
												});
											}
                    },
                    error:function(respon){
                      swal({
                        title:"Terjadi Kesalahan",
                        text:"Silahkan Hubungi Developer Agar Diperbaiki.",
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
                    }
                  });
                }
              });
            }
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>

			sckt.on('update token',function(data){
				if (data.token !== null && __ip__ === data.ip && __np__ === data.np){
					ctoken = data.token;
					$('input#ctoken').val(ctoken);
				}
			});
    </script>
  </body>
</html>
