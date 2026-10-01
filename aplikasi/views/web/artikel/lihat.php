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

  $fp   = $this->pengguna->ambil_foto($artikel->penginput); // Foto Penginput
  $tp   = $this->pengguna->ambil_tentang($artikel->penginput); // Tentang Penginput
  $albk = $this->artikel->artikel_lainnya_by_kategori($artikel->id_artikel,$artikel->kategori);
  $ignr = []; // Untuk mengabaikan id_artikel saat melakukan query artikel_lainnya_by_tags

  foreach ($albk->result() as $art)
  {
    array_push($ignr,$art->id_artikel);
  }

  if ($ignr)
  {
    $albt = $this->artikel->artikel_lainnya_by_tags($artikel->id_artikel,$artikel->tags,$ignr);
    $jhal = $albk->num_rows()+$albt->num_rows(); // JumlaH Artikel Lainnnya
  }
  else
  {
    $jhal = 0;
  }
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title><?= $artikel->judul; ?> - Always Ngoding</title>
    <?php
      $deskripsi = strlen($this->ang->mst($artikel->isi)) >= 140 ? substr($this->ang->mst($artikel->isi), 0, 137).'...' : $this->ang->mst($artikel->isi);

      $this->load->view('head', [
        'url' => site_url("artikel/{$artikel->id_artikel}/{$artikel->slug}"),
        'deskripsi' => $deskripsi,
        'sosmed_image' => $artikel->thumb,
        'sosmed_meta_title' => $artikel->judul,
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
        "@type": "Article",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "<?= site_url("artikel/{$artikel->id_artikel}/{$artikel->slug}"); ?>"
        },
        "headline": "<?= $artikel->judul; ?>",
        "image": "<?= $artikel->thumb; ?>",
        "author": {
          "@type": "Person",
          "name": "<?= $artikel->penginput; ?>",
          "url": "<?= site_url("anggota/{$artikel->penginput}"); ?>"
        },
        "publisher": {
          "@type": "Organization",
          "name": "Always Ngoding",
          "logo": {
            "@type": "ImageObject",
            "url": "<?= base_url('media/website/logo.png'); ?>"
          }
        },
        "datePublished": "<?= $artikel->tanggal_posting; ?>"
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
            <a href="<?= site_url('artikel'); ?>">Artikel</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?= site_url('artikel/kategori/'.str_replace(' ','-',$artikel->kategori)); ?>"><?= $artikel->kategori; ?></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page"><?= ucwords($artikel->judul); ?></li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lihat-artikel">
        <div class="header-v2">
          <h1><?= $artikel->judul; ?></h1>
        </div>
        <div class="row">
          <div class="col-12">
            <article class="card custom-card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span>
                    <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $fp === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$fp}"); ?>" class="fp-di-lihat-artikel d-none d-sm-none d-md-inline" alt="Foto Profil <?= $artikel->penginput; ?>">
                    <small class="text-muted">
                      <?php if ($this->session->has_userdata('ang_akses') && $artikel->penginput == $this->session->ang_nama_pengguna): ?>
                        <?= substr($artikel->penginput,0,12).(strlen($artikel->penginput) > 12 ? '...' : ''); ?>
                      <?php else: ?>
                        <span id="penginput-artikel">
                          <a href="<?= site_url("anggota/{$artikel->penginput}"); ?>">
                            <?= substr($artikel->penginput,0,12).(strlen($artikel->penginput) > 12 ? '...' : ''); ?>
                          </a>
                        </span>
                      <?php endif; ?>
                      <span class="titik-pemisah"></span>
                      <a href="<?= site_url('artikel/kategori/'.str_replace(' ','-',$artikel->kategori)); ?>" class="kategori-artikel"><?= $artikel->kategori; ?></a>
                    </small>
                  </span>
                  <span class="d-none d-sm-inline">
                    <small class="text-muted">
                      <?= $this->ang->tanggal_bulan_indonesia($artikel->tanggal_posting); ?>
                      <span class="titik-pemisah"></span>
                      <?= $artikel->jam_posting; ?> WIB
                    </small>
                  </span>
                </div>
                <hr>
                <?= str_replace('<p>&nbsp;</p>', '', $artikel->isi); ?>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted"><span id="jumlah-suka-artikel"><?= $artikel->jumlah_suka; ?></span> Jumlah Suka</small>
                  <?php if ($this->session->has_userdata('ang_akses')): ?>
                    <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                      <span id="aksi-artikel">
                        <?php if ($artikel->penginput != $this->session->ang_nama_pengguna): ?>
                          <?php if (!$this->ds_artikel->cek_apakah_sudah_menyukai($artikel->id_artikel)): ?>
                            <span id="tombol-sukai-artikel">
                              <button id="sukai-artikel" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai'>
                                <i class="fas fa-heart"></i>
                              </button>
                            </span>
                          <?php else: ?>
                            <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai artikel ini'><i class="fas fa-heart"></i></button>
                          <?php endif; ?>
                        <?php endif; ?>
                        <a href="<?= site_url("area-pengurus/artikel/ubah/{$artikel->id_artikel}") ?>" class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Ubah' target='_blank'>
                          <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_artikel();">
                          <i class="fas fa-trash"></i>
                        </button>
                      </span>
                    <?php else: ?>
                      <?php if ($artikel->penginput != $this->session->ang_nama_pengguna): ?>
                        <?php if (!$this->ds_artikel->cek_apakah_sudah_menyukai($artikel->id_artikel)): ?>
                          <span id="tombol-sukai-artikel">
                            <button id="sukai-artikel" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai'>
                              <i class="fas fa-heart"></i>
                            </button>
                          </span>
                        <?php else: ?>
                          <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai artikel ini'><i class="fas fa-heart"></i></button>
                        <?php endif; ?>
                      <?php else: ?>
                        <span id="aksi-artikel">
                          <a href="<?= site_url("anggota/artikel/ubah/{$artikel->id_artikel}") ?>" class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Ubah' target='_blank'>
                            <i class="fas fa-edit"></i>
                          </a>
                          <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_artikel();">
                            <i class="fas fa-trash"></i>
                          </button>
                        </span>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </article>
            <div class="card mt-3 mb-3 custom-card" id="awal-komentar">
              <div class="card-body text-center f-bt">
                <?= $this->k_artikel->cek_jumlah($artikel->id_artikel) > 0 ? 'KOMENTAR UNTUK ARTIKEL INI' : 'BELUM ADA KOMENTAR UNTUK ARTIKEL INI'; ?>
              </div>
            </div>
            <div id="komentar">
              <?php foreach ($komentar as $komen): $f = $this->pengguna->ambil_foto($komen->pengguna); $t = $this->pengguna->ambil_tentang($komen->pengguna); ?>
                <div class="card mb-2 custom-card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <span>
                        <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $f === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$f}"); ?>" class="fp-di-komentar d-none d-sm-none d-md-inline" alt="Foto Profil <?= $komen->pengguna; ?>">
                        <small class="text-muted">
                          <?php if ($this->session->has_userdata('ang_akses') && $komen->pengguna == $this->session->ang_nama_pengguna): ?>
                            <?= substr($komen->pengguna,0,12).(strlen($komen->pengguna) > 12 ? '...' : ''); ?>
                            <?php if ($artikel->penginput == $komen->pengguna): ?>
                              <span class="d-none d-sm-none d-md-inline">
                                <span class="titik-pemisah"></span>
                                Penginput
                              </span>
                            <?php endif; ?>
                          <?php else: ?>
                            <span id="pengguna-komentar">
                              <span>
                                <a href="<?= site_url("anggota/{$komen->pengguna}"); ?>">
                                  <?= substr($komen->pengguna,0,12).(strlen($komen->pengguna) > 12 ? '...' : ''); ?>
                                </a>
                                <?php if ($artikel->penginput == $komen->pengguna): ?>
                                  <span class="d-none d-sm-none d-md-inline">
                                    <span class="titik-pemisah"></span>
                                    Penginput
                                  </span>
                                <?php endif; ?>
                              </span>
                            </span>
                          <?php endif; ?>
                        </small>
                      </span>
                      <span>
                        <small class="text-muted">
                          <?= $this->ang->tanggal_bulan_indonesia($komen->tanggal); ?>
                          <span class="titik-pemisah"></span>
                          <?= $komen->jam; ?> WIB
                        </small>
                      </span>
                    </div>
                    <hr>
                    <?= str_replace('<p>&nbsp;</p>', '', $komen->isi); ?>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted"><span id="jumlah-suka-<?= $komen->id_k_artikel; ?>"><?= $komen->jumlah_suka; ?></span> Jumlah Suka</small>
                      <?php if ($this->session->has_userdata('ang_akses')): ?>
                        <?php if ($komen->pengguna == $this->session->ang_nama_pengguna): ?>
                          <span id="aksi-komentar">
                            <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Sunting' onclick="sunting(<?= $komen->id_k_artikel; ?>);">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus(<?= $komen->id_k_artikel; ?>);">
                              <i class="fas fa-trash"></i>
                            </button>
                          </span>
                        <?php else: ?>
                          <span>
                            <?php if (!$this->dsk_artikel->cek_apakah_sudah_menyukai($komen->id_k_artikel)): ?>
                              <span id="tombol-sukai-komentar">
                                <button id="sukai-komentar" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai' data-id='<?= $komen->id_k_artikel; ?>'>
                                  <i class="fas fa-heart"></i>
                                </button>
                              </span>
                            <?php else: ?>
                              <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai komentar ini'><i class="fas fa-heart"></i></button>
                            <?php endif; ?>
                            <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                              <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Blok' onclick="blok_komentar(<?= $komen->id_k_artikel; ?>);">
                                <i class="fas fa-window-close"></i>
                              </button>
                              <button class="btn btn-outline-secondary btn-sm rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_komentar(<?= $komen->id_k_artikel; ?>);">
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
            <?php if ($this->session->has_userdata('ang_akses')): ?>
              <?php if ($j_komentar > 5): ?>
                <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-block btn-custom-click mt-1 mb-2 button-shadow" id="muat-lebih-banyak-komentar">
                  Muat Lebih Banyak Komentar
                </button>
              <?php endif; ?>
              <form id="form-komentar">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <textarea name="komentar" class="form-control" placeholder="Tulis komentar untuk artikel ini..."></textarea>
                <button type="submit" class="btn btn-outline-secondary btn-sm btn-block rounded-lg mt-2 button-shadow" id="btn-komentar">Kirim Komentar</button>
              </form>
            <?php else: ?>
              <div class="row">
                <?php if ($j_komentar > 5): ?>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-block mt-1 mb-2 button-shadow" id="muat-lebih-banyak-komentar">
                      Muat Lebih Banyak Komentar
                    </button>
                  </div>
                  <div class="col-md-6 pt-1" id="tombol-masuk-md-6">
                    <a href="<?= site_url("masuk?selanjutnya={$_SERVER['REQUEST_URI']}"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg button-shadow">
                      Masuk Untuk Menulis Artikel dan Berkomentar
                    </a>
                  </div>
                <?php else: ?>
                  <div class="col-12">
                    <a href="<?= site_url("masuk?selanjutnya={$_SERVER['REQUEST_URI']}"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg button-shadow">
                      Masuk Untuk Menulis Artikel dan Berkomentar
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <?php if ($jhal !== 0): ?>
          <div class="row">
            <div class="col-12">
              <div id="artikel-lainnya" class="row display-flex">
                <div class="col-md-12">
                  <div class="card mt-2 custom-card">
                    <div class="card-body text-center f-bt">
                      ARTIKEL LAINNYA
                    </div>
                  </div>
                </div>
                <?php foreach ($albk->result() as $art): ?>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card h-100 mb-1 custom-card-2">
                      <div class="card-thumbnail">
                        <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $art->thumb === NULL ? base_url("media/thumbnail-artikel/thumb-kosong.png") : $art->thumb; ?>" alt="<?= $art->judul; ?>">
                      </div>
                      <div class="card-body">
                        <p class="awal-judul-artikel"><?= strlen($art->judul) >= 30 ? "<span class='judul-overflow' data-toggle='tooltip' title='".$art->judul."'>".substr($art->judul, 0, 27).'...</span>' : $art->judul; ?></p>
                        <p class="awal-waktu-posting-artikel"><?= $this->ang->tanggal_bulan_indonesia($art->tanggal_posting); ?> <?= $art->jam_posting; ?> WIB</p>
                        <p class="awal-isi-artikel"><?= strlen($this->ang->mst($art->isi)) >= 140 ? substr($this->ang->mst($art->isi), 0, 137).'...' : $this->ang->mst($art->isi); ?></p>
                      </div>
                      <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?= site_url("artikel/{$art->id_artikel}/{$art->slug}"); ?>" class="btn btn-sm btn-outline-secondary">Selengkapnya</a>
                          </div>
                          <small class="text-muted"><i class="fas fa-heart"></i> <?= $art->jumlah_suka; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-volume-up"></i> <?= $art->jumlah_komentar; ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
                <?php foreach ($albt->result() as $art): ?>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card h-100 mb-1 custom-card-2">
                      <div class="card-thumbnail">
                        <img class="card-img-top" src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $art->thumb === NULL ? base_url("media/thumbnail-artikel/thumb-kosong.png") : $art->thumb; ?>" alt="<?= $art->judul; ?>">
                      </div>
                      <div class="card-body">
                        <p class="awal-judul-artikel"><?= strlen($art->judul) >= 30 ? "<span class='judul-overflow' data-toggle='tooltip' title='".$art->judul."'>".substr($art->judul, 0, 27).'...</span>' : $art->judul; ?></p>
                        <p class="awal-waktu-posting-artikel"><?= $this->ang->tanggal_bulan_indonesia($art->tanggal_posting); ?> <?= $art->jam_posting; ?> WIB</p>
                        <p class="awal-isi-artikel"><?= strlen($this->ang->mst($art->isi)) >= 140 ? substr($this->ang->mst($art->isi), 0, 137).'...' : $this->ang->mst($art->isi); ?></p>
                      </div>
                      <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?= site_url("artikel/{$art->id_artikel}/{$art->slug}"); ?>" class="btn btn-sm btn-outline-secondary">Selengkapnya</a>
                          </div>
                          <small class="text-muted"><i class="fas fa-heart"></i> <?= $art->jumlah_suka; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-volume-up"></i> <?= $art->jumlah_komentar; ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <a href="<?= site_url("artikel"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg button-shadow">Kembali Ke Halaman Daftar Artikel</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="modal fade" id="modal-sunting-komentar" tabindex="-1" role="dialog" aria-labelledby="judul-sunting-komentar" aria-hidden="true" enforceFocus="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul-sunting-komentar">Sunting komentar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-sunting-komentar">
              <div class="modal-body">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="id_komentar" name="id_komentar">
                <textarea id="input-sunting-komentar" name="sunting" class="form-control" placeholder="Sunting komentar untuk artikel ini..."></textarea>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline-secondary btn-sm btn-block rounded-lg" id="btn-sunting-komentar">Simpan perubahan</button>
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
    <script>
			const __ip__ = "<?= $this->ang->ambil_alamat_ip(); ?>";
      const __np__ = "<?= $this->session->has_userdata('ang_nama_pengguna') ? $this->session->ang_nama_pengguna : '-'; ?>";
      const id_artikel = '<?= $artikel->id_artikel; ?>';

			let i = 5;
      let j = <?= $j_komentar; ?>;
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
        <?php if ($this->input->get('aksi',TRUE) === 'berkomentar'): ?>
          $('html, body').animate({scrollTop: $('#awal-komentar').offset().top},1300);
          let uri = window.location.toString();
          let clean_uri = uri.substring(0,uri.indexOf("?"));
          window.history.replaceState({},document.title,clean_uri);
        <?php endif; ?>

        tinymce.init({
          selector:'textarea',
          theme:'modern',
          skin:'custom',
          plugins:['autolink link image preview codesample fullscreen placeholder paste'],
          toolbar1:'undo redo | bold italic underline hr | link unlink | image codesample | preview fullscreen',
          paste_as_text: true,
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

        sckt.on('perbaharui web data suka artikel',function(data){
          if (id_artikel == data.ia){
            if (data.token !== null && ctoken != data.token && __ip__ === data.aip){
              ctoken = data.token;
              $('input#ctoken').val(data.token);
              $('#sukai-artikel').parent().html(`<button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai artikel ini'><i class="fas fa-heart"></i></button>`);
              $('#aksi-komentar > button').removeAttr('disabled');
              $('button#sukai-komentar').removeAttr('disabled');
              tooltip();
            }
            $('#jumlah-suka-artikel').text(parseInt($('#jumlah-suka-artikel').text())+1);
          }
        });

        sckt.on('perbaharui web data suka komentar artikel',function(data){
          if (id_artikel == data.ia){
            if (data.token !== null && ctoken != data.token && __ip__ === data.aip){
              ctoken = data.token;
              $('input#ctoken').val(data.token);
              $(`[data-id=${data.ik}]`).parent().html(`<span>
                <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai komentar ini'><i class="fas fa-heart"></i>
                </button>
              </span>`);
              $('#sukai-artikel').removeAttr('disabled');
              $('#aksi-artikel > button').removeAttr('disabled','disabled');
              $('#aksi-artikel > a').removeAttr('disabled','disabled');
              $('#aksi-komentar > button').removeAttr('disabled');
              $('button#sukai-komentar').removeAttr('disabled');
              tooltip();
            }
            $(`#jumlah-suka-${data.ik}`).text(parseInt($(`#jumlah-suka-${data.ik}`).text())+1);
          }
        });

        $("span#pengguna-komentar").hover(function(){
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

      $('#sukai-artikel').click(function(e){
        $('#aksi-komentar > button').attr('disabled','disabled');
        $('button#sukai-komentar').attr('disabled','disabled');
        $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
        $.ajax({
          url:"<?= site_url('artikel/sukai/artikel'); ?>",
          type:'POST',
          data:{id_artikel:id_artikel,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              sckt.emit('perbaharui data suka artikel',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui web data suka artikel',{token:r.ctoken,aip:__ip__,ia:id_artikel});
              sckt.emit('perbaharui riwayat');
            }else{
              ctoken = r.ctoken;
              $('input#ctoken').val(r.ctoken);
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

      $('button#sukai-komentar').click(function(e){
        let id_komentar = $(this).data('id');
        $('#aksi-artikel > button').attr('disabled','disabled');
        $('#aksi-artikel > a').attr('disabled','disabled');
        $('#aksi-komentar > button').attr('disabled','disabled');
        $('#sukai-artikel').attr('disabled','disabled');
        $('button#sukai-komentar').not(`[data-id=${id_komentar}]`).attr('disabled','disabled');
        $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
        $.ajax({
          url:"<?= site_url('artikel/sukai/komentar'); ?>",
          type:'POST',
          data:{id_komentar:id_komentar,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              sckt.emit('perbaharui data suka komentar artikel',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui web data suka komentar artikel',{token:r.ctoken,aip:__ip__,ia:id_artikel,ik:id_komentar});
              sckt.emit('perbaharui riwayat');
            }else{
              ctoken = r.ctoken;
              $('input#ctoken').val(r.ctoken);
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

      $('#form-komentar').on('submit',function(e){
        e.preventDefault();
        tinymce.triggerSave();
        $('#btn-komentar').html('<i class="fas fa-spinner fa-spin"></i> Sedang diproses...').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('artikel/berkomentar'); ?>",
          type:'POST',
          data:$(this).serialize()+`&id_artikel=${id_artikel}`,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#btn-komentar').text('Terima kasih atas komentarnya...');
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"success",
                showCancelButton:false,
                showConfirmButton:false
              });
              setTimeout(function(){document.location = '?aksi=berkomentar';},1500);
            }else{
              $('#btn-komentar').text('Kirim Komentar').removeAttr('disabled');
              $('input#ctoken').val(r.ctoken);
              ctoken = r.ctoken;
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"warning",
                confirmButtonClass:"btn-warning",
                confirmButtonText:"Oke",
                showCancelButton:false
              });
            }
          },
          error:function(r){
            $('#btn-komentar').text('Kirim Komentar').removeAttr('disabled');
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

      $('#form-sunting-komentar').on('submit',function(e){
        e.preventDefault();
        tinymce.triggerSave();
        $('#btn-sunting-komentar').html('<i class="fas fa-spinner fa-spin"></i> Sedang diproses...').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('artikel/berkomentar/sunting'); ?>",
          type:'POST',
          data:$(this).serialize()+`&id_artikel=${id_artikel}`,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#btn-sunting-komentar').text('Proses berhasil...');
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"success",
                showCancelButton:false,
                showConfirmButton:false
              });
              setTimeout(function(){document.location = '?aksi=berkomentar';},1500);
            }else{
              $('#btn-sunting-komentar').text('Simpan perubahan').removeAttr('disabled');
              $('input#ctoken').val(r.ctoken);
              ctoken = r.ctoken;
              swal({
                title:"Informasi",
                text:r.pesan,
                type:"warning",
                confirmButtonClass:"btn-warning",
                confirmButtonText:"Oke",
                showCancelButton:false
              });
            }
          },
          error:function(r){
            $('#btn-sunting-komentar').text('Simpan perubahan').removeAttr('disabled');
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

      function sunting(id_komentar){
        $('#modal-sunting-komentar').modal('show');
        $.ajax({
          url:"<?= site_url('artikel/berkomentar/sunting/ambil'); ?>",
          type:'POST',
          data:{id_komentar:id_komentar},
          success:function(r){
            $('#id_komentar').val(id_komentar);
            $('#modal-sunting-komentar').modal('show');
            tinymce.get('input-sunting-komentar').setContent(r);
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

      function hapus(id_komentar){
        swal({
          title:"Apakah anda yakin??",
          text:"Yakin ingin menghapus komentar ini??",
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
              url:"<?= site_url('artikel/hapus-komentar'); ?>",
              type:'POST',
              data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,id_komentar:id_komentar},
              dataType:'JSON',
              success:function(r){
                if (r.sukses){
                  sckt.emit('perbaharui komentar artikel',{token:r.ctoken,np:__np__});
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"success",
                    showCancelButton:false,
                    showConfirmButton:false
                  });
                  setTimeout(function(){document.location = '?aksi=berkomentar';},1500);
                }else{
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  ctoken = data.token;
                  $('input#ctoken').val(data.token);
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

      $('#muat-lebih-banyak-komentar').click(function(){
        let self = this;

        $(self).html('<i class="fas fa-spinner fa-spin"></i> Mohon tunggu...').attr('disabled','disabled');

        $.ajax({
          url:"<?= site_url('artikel/muat-lebih-banyak-komentar'); ?>",
          type:'POST',
          data:{id_artikel:id_artikel,index:i,<?= $this->security->get_csrf_token_name(); ?>:ctoken,jumlah:j},
          dataType:'JSON',
          success:function(respon){
            i += 5; ctoken = respon.ctoken;

            $('input#ctoken').val(respon.ctoken);

            $('#komentar').append(respon.html);

            if (i >= j){
              <?php if ($this->session->has_userdata('ang_akses')): ?>
                $(self).remove();
              <?php else: ?>
                $(self).parent().remove();
              <?php endif; ?>
              $('#tombol-masuk-md-6').removeClass('col-md-6').addClass('col-md-12');
            }else{
              $(self).text('Muat Lebih Banyak Komentar').removeAttr('disabled');
            }

            Prism.highlightAll();
            tooltip();
            gm = document.querySelectorAll('img[data-src]');
            mm();

            $("span#pengguna-komentar").hover(function(){
              if (statusAnimasiPengguna == false){
                $(this).children().eq(1).fadeIn(300);
              }
            },function(){
              statusAnimasiPengguna = true;
              $(this).children().eq(1).fadeOut(300,function(){
                statusAnimasiPengguna = false;
              });
            });

            $('button#sukai-komentar').click(function(e){
              let id_komentar = $(this).data('id');
              $('#aksi-artikel > button').attr('disabled','disabled');
              $('#aksi-artikel > a').attr('disabled','disabled');
              $('#aksi-komentar > button').attr('disabled','disabled');
              $('#sukai-artikel').attr('disabled','disabled');
              $('button#sukai-komentar').not(`[data-id=${id_komentar}]`).attr('disabled','disabled');
              $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
              $.ajax({
                url:"<?= site_url('artikel/sukai/komentar'); ?>",
                type:'POST',
                data:{id_komentar:id_komentar,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
                dataType:'JSON',
                success:function(r){
                  if (r.sukses){
                    sckt.emit('perbaharui data suka komentar artikel',{token:r.ctoken,np:__np__});
                    sckt.emit('perbaharui web data suka komentar artikel',{token:r.ctoken,aip:__ip__,ia:id_artikel,ik:id_komentar});
                    sckt.emit('perbaharui riwayat');
                  }else{
                    ctoken = r.ctoken;
                    $('input#ctoken').val(r.ctoken);
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
          function hapus_artikel(){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin menghapus artikel ini??",
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
                  url:"<?= site_url('area-pengurus/artikel/hapus'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_artikel":id_artikel},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui artikel',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){window.location.href = `<?= site_url('artikel'); ?>`;},1500);
                    }else{
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      ctoken = r.ctoken;
                      $('input#ctoken').val(r.ctoken);
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

          function blok_komentar(id_komentar){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin memblokir komentar artikel ini??",
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
                  url:"<?= site_url('area-pengurus/artikel/komentar/blok'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_komentar":id_komentar},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui komentar artikel',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){document.location = '?aksi=berkomentar';},1500);
                    }else{
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      ctoken = r.ctoken;
                      $('input#ctoken').val(r.ctoken);
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

          function hapus_komentar(id_komentar){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin menghapus komentar artikel ini??",
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
                  url:"<?= site_url('area-pengurus/artikel/komentar/hapus'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_komentar":id_komentar},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui komentar artikel',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){document.location = '?aksi=berkomentar';},1500);
                    }else{
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"error",
                        showCancelButton:false,
                        confirmButtonText:"OK"
                      });
                      ctoken = r.ctoken;
                      $('input#ctoken').val(r.ctoken);
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
          <?php if ($artikel->penginput == $this->session->ang_nama_pengguna): ?>
            function hapus_artikel(){
              swal({
                title:"Apakah anda yakin??",
                text:"Yakin ingin menghapus artikel ini??",
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
                    url:"<?= site_url('anggota/artikel/hapus'); ?>",
                    type:'POST',
                    data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_artikel":id_artikel},
                    dataType:'JSON',
                    success:function(r){
                      if (r.sukses){
                        sckt.emit('perbaharui artikel',{token:r.ctoken,np:__np__});
                        swal({
                          title:"Informasi",
                          text:r.pesan,
                          type:"success",
                          showCancelButton:false,
                          showConfirmButton:false
                        });
                        setTimeout(function(){window.location.href = `<?= site_url('artikel'); ?>`;},1500);
                      }else{
                        swal({
                          title:"Informasi",
                          text:r.pesan,
                          type:"error",
                          showCancelButton:false,
                          confirmButtonText:"OK"
                        });
                        ctoken = r.ctoken;
                        $('input#ctoken').val(r.ctoken);
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
