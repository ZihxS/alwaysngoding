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

  $fp    = $this->pengguna->ambil_foto($loker->penginput); // Foto Penginput
  $tp    = $this->pengguna->ambil_tentang($loker->penginput); // Tentang Penginput
  $lkl   = $this->loker->loker_lainnya($loker->id_loker);
  $title = "lowongan kerja di {$loker->nama_perusahaan} sebagai {$loker->posisi}";
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title><?= ucwords($title); ?> - Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}"),
        'deskripsi' => ucwords($title),
        'sosmed_meta_title' => "Lowongan Kerja",
        'sosmed_meta_desc' => ucwords($title)
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
                "name": "Lowongan Kerja di Bidang Teknologi dan Informasi",
                "item": "<?= site_url('lowongan-kerja'); ?>"
              },
              {
                "@type": "ListItem",
                "position": 3,
                "name": "<?= ucwords($title); ?>"
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
        <ol class="breadcrumb breadcrumb-loker">
          <li class="breadcrumb-item">
            <a href="<?= site_url('lowongan-kerja'); ?>">Lowongan Kerja</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page"><?= ucwords($title); ?></li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-lihat-lowongan-kerja">
        <div class="header-v2">
          <h1><?= ucwords($title); ?></h1>
        </div>
        <div class="row">
          <div class="col-12">
            <article class="card custom-card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <span>
                    <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= $fp === NULL ? base_url('media/foto-pengguna/blank.png') : base_url("media/foto-pengguna/{$fp}"); ?>" class="fp-di-lihat-lowongan-kerja d-none d-sm-none d-md-inline" alt="Foto Profil <?= $loker->penginput; ?>">
                    <small class="text-muted">
                      <span id="penginput-lowongan-kerja">
                        <?php if ($this->session->has_userdata('ang_akses') && $loker->penginput == $this->session->ang_nama_pengguna): ?>
                          <?= substr($loker->penginput,0,12).(strlen($loker->penginput) > 12 ? '...' : ''); ?>
                        <?php else: ?>
                          <a href="<?= site_url("anggota/{$loker->penginput}"); ?>">
                            <?= $loker->penginput; ?>
                          </a>
                        <?php endif; ?>
                      </span>
                    </small>
                  </span>
                  <span>
                    <small class="text-muted">
                      <?= $this->ang->tanggal_bulan_indonesia($loker->tanggal_posting); ?>
                      <span class="titik-pemisah"></span>
                      <?= $loker->jam_posting; ?> WIB
                    </small>
                  </span>
                </div>
                <hr>
                <span class="isi-loker">
                  <p class="mb-0" style="font-family: 'BT'; font-size: 18px;">Syarat dan Ketentuan:</p>
                  <?= $loker->syarat_ketentuan; ?>
                  <p class="mb-0" style="font-family: 'BT'; font-size: 18px;">Nilai Tambah Untuk Pelamar:</p>
                  <?= $loker->nilai_tambah; ?>
                  <p class="mb-0" style="font-family: 'BT'; font-size: 18px;">Catatan:</p>
                  <?= $loker->catatan; ?>
                  <p class="mb-0" style="font-family: 'BT'; font-size: 18px;">Kirimkan CV Atau Lamaran Ke:</p>
                  <p><?= $loker->kirim_cv_ke; ?></p>
                  <?php if ($loker->gaji_minimal != 0 && $loker->gaji_maksimal != 0): ?>
                    <p class="mb-0" style="font-family: 'BT'; font-size: 18px;">Kisaran Gaji:</p>
                    <p>Rp<?= number_format($loker->gaji_minimal,0,',','.'); ?>,- sampai dengan Rp<?= number_format($loker->gaji_maksimal,0,',','.'); ?>,-</p>
                  <?php endif; ?>
                  <?php if ($loker->bukti != NULL && $loker->poster != NULL): ?>
                    <div class="row">
                      <div class="col-6">
                        <a class="btn btn-outline-danger btn-block btn-sm btn-custom-click" href="<?= base_url("media/lowongan-kerja/bukti/{$loker->bukti}"); ?>" target="_blank">Lihat Bukti Perusahaan</a>
                      </div>
                      <div class="col-6">
                        <a class="btn btn-outline-danger btn-block btn-sm btn-custom-click" href="<?= base_url("media/lowongan-kerja/poster/{$loker->poster}"); ?>" target="_blank">Lihat Poster</a>
                      </div>
                    </div>
                  <?php else: ?>
                    <?php if ($loker->bukti != NULL): ?>
                        <a class="btn btn-outline-danger btn-block btn-sm btn-custom-click" href="<?= base_url("media/lowongan-kerja/bukti/{$loker->bukti}"); ?>" target="_blank">Lihat Bukti Perusahaan</a>
                    <?php endif; ?>
                    <?php if ($loker->poster != NULL): ?>
                        <a class="btn btn-outline-danger btn-block btn-sm btn-custom-click" href="<?= base_url("media/lowongan-kerja/poster/{$loker->poster}"); ?>" target="_blank">Lihat Poster</a>
                    <?php endif; ?>
                  <?php endif; ?>
                </span>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted"><span id="jumlah-suka-loker"><?= $loker->jumlah_suka; ?></span> Jumlah Suka</small>
                  <?php if ($this->session->has_userdata('ang_akses')): ?>
                    <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                      <span id="aksi-loker">
                        <?php if ($loker->penginput != $this->session->ang_nama_pengguna): ?>
                          <?php if (!$this->ds_loker->cek_apakah_sudah_menyukai($loker->id_loker)): ?>
                            <span id="tombol-sukai-loker">
                              <button id="sukai-loker" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai'>
                                <i class="fas fa-heart"></i>
                              </button>
                            </span>
                          <?php else: ?>
                            <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai lowongan kerja ini'><i class="fas fa-heart"></i></button>
                          <?php endif; ?>
                        <?php endif; ?>
                        <a href="<?= site_url("area-pengurus/lowongan-kerja/ubah/{$loker->id_loker}") ?>" class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Ubah' target='_blank'>
                          <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_loker();">
                          <i class="fas fa-trash"></i>
                        </button>
                      </span>
                    <?php else: ?>
                      <?php if ($loker->penginput != $this->session->ang_nama_pengguna): ?>
                        <?php if (!$this->ds_loker->cek_apakah_sudah_menyukai($loker->id_loker)): ?>
                          <span id="tombol-sukai-loker">
                            <button id="sukai-loker" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai'>
                              <i class="fas fa-heart"></i>
                            </button>
                          </span>
                        <?php else: ?>
                          <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai lowongan kerja ini'><i class="fas fa-heart"></i></button>
                        <?php endif; ?>
                      <?php else: ?>
                        <span id="aksi-loker">
                          <a href="<?= site_url("anggota/lowongan-kerja/ubah/{$loker->id_loker}") ?>" class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Ubah' target='_blank'>
                            <i class="fas fa-edit"></i>
                          </a>
                          <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_loker();">
                            <i class="fas fa-trash"></i>
                          </button>
                        </span>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </article>
            <div class="card mt-2 mb-2 custom-card" id="awal-komentar">
              <div class="card-body text-center f-bt">
                <?= $this->k_loker->cek_jumlah($loker->id_loker) > 0 ? 'KOMENTAR UNTUK LOWONGAN KERJA INI' : 'BELUM ADA KOMENTAR UNTUK LOWONGAN KERJA INI'; ?>
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
                            <?php if ($loker->penginput == $komen->pengguna): ?>
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
                                <?php if ($loker->penginput == $komen->pengguna): ?>
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
                      <small class="text-muted"><span id="jumlah-suka-<?= $komen->id_k_loker; ?>"><?= $komen->jumlah_suka; ?></span> Jumlah Suka</small>
                      <?php if ($this->session->has_userdata('ang_akses')): ?>
                        <?php if ($komen->pengguna == $this->session->ang_nama_pengguna): ?>
                          <span id="aksi-komentar">
                            <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Sunting' onclick="sunting(<?= $komen->id_k_loker; ?>);">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus(<?= $komen->id_k_loker; ?>);">
                              <i class="fas fa-trash"></i>
                            </button>
                          </span>
                        <?php else: ?>
                          <span>
                            <?php if (!$this->dsk_loker->cek_apakah_sudah_menyukai($komen->id_k_loker)): ?>
                              <span id="tombol-sukai-komentar">
                                <button id="sukai-komentar" class="btn btn-outline-danger btn-sm rounded-circle btn-love" data-toggle='tooltip' title='Sukai' data-id='<?= $komen->id_k_loker; ?>'>
                                  <i class="fas fa-heart"></i>
                                </button>
                              </span>
                            <?php else: ?>
                              <button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai komentar ini'><i class="fas fa-heart"></i></button>
                            <?php endif; ?>
                            <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                              <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Blok' onclick="blok_komentar(<?= $komen->id_k_loker; ?>);">
                                <i class="fas fa-window-close"></i>
                              </button>
                              <button class="btn btn-outline-secondary btn-sm btn-custom-click rounded-circle" data-toggle='tooltip' title='Hapus' onclick="hapus_komentar(<?= $komen->id_k_loker; ?>);">
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
                <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-custom-click btn-block mt-1 mb-2" id="muat-lebih-banyak-komentar">
                  Muat lebih banyak komentar
                </button>
              <?php endif; ?>
              <form id="form-komentar">
                <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <textarea name="komentar" class="form-control" placeholder="Tulis komentar untuk lowongan kerja ini..."></textarea>
                <button type="submit" class="btn btn-outline-secondary btn-sm btn-block rounded-lg btn-custom-click mt-2" id="btn-komentar">Kirim Komentar</button>
              </form>
            <?php else: ?>
              <div class="row">
                <?php if ($j_komentar > 5): ?>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-custom-click btn-block mt-1 mb-2" id="muat-lebih-banyak-komentar">
                      Muat lebih banyak komentar
                    </button>
                  </div>
                  <div class="col-md-6" id="tombol-masuk-md-6">
                    <a href="<?= site_url("masuk?selanjutnya={$_SERVER['REQUEST_URI']}"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg button-shadow">Masuk untuk membuka lowongan kerja dan berkomentar</a>
                  </div>
                <?php else: ?>
                  <div class="col-12">
                    <a href="<?= site_url("masuk?selanjutnya={$_SERVER['REQUEST_URI']}"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg button-shadow">Masuk untuk membuka lowongan kerja dan berkomentar</a>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <?php if ($lkl->num_rows() > 0): ?>
          <div class="row">
            <div class="col-md-12">
              <div class="row display-flex">
                <div class="col-md-12">
                  <div class="card mt-2 custom-card">
                    <div class="card-body text-center f-bt">
                      LOWONGAN KERJA LAINNYA
                    </div>
                  </div>
                </div>
                <?php foreach ($lkl->result() as $hasil_lkl): ?>
                  <div class="col-md-4">
                    <div class="card h-100 custom-card loker-lainnya">
                      <h6 class="card-header"><?= $hasil_lkl->nama_perusahaan; ?></h6>
                      <div class="card-body cb-lowongan-kerja">
                        <table>
                          <tr>
                            <td>Posisi</td>
                            <td>:</td>
                            <td><?= $hasil_lkl->posisi; ?></td>
                          </tr>
                          <tr>
                            <td>Lokasi</td>
                            <td>:</td>
                            <td><?= $hasil_lkl->lokasi; ?></td>
                          </tr>
                          <tr>
                            <td>Sampai</td>
                            <td>:</td>
                            <td><?= $this->ang->tanggal_bulan_indonesia($hasil_lkl->jatuh_tempo); ?></td>
                          </tr>
                        </table>
                      </div>
                      <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="<?= site_url("lowongan-kerja/{$hasil_lkl->id_loker}/{$hasil_lkl->slug}"); ?>" class="btn btn-sm btn-outline-secondary btn-custom-click">Selengkapnya</a>
                          </div>
                          <small class="text-muted"><i class="fas fa-heart"></i> <?= $hasil_lkl->jumlah_suka; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-volume-up"></i> <?= $hasil_lkl->jumlah_komentar; ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <a href="<?= site_url("lowongan-kerja"); ?>" class="btn btn-outline-secondary btn-sm btn-block rounded-lg button-shadow">Kembali Ke Halaman Daftar Lowongan Kerja</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="modal fade" id="modal-sunting-komentar" tabindex="-1" role="dialog" aria-labelledby="judul-sunting-komentar" aria-hidden="true">
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
                <button type="submit" class="btn btn-outline-secondary btn-sm btn-custom-click btn-block rounded-lg" id="btn-sunting-komentar">Simpan perubahan</button>
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
      const id_loker = '<?= $loker->id_loker; ?>';

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
          setTimeout(function() {
            $('html, body').animate({scrollTop: $('#awal-komentar').offset().top},1300);
            let uri = window.location.toString();
            let clean_uri = uri.substring(0,uri.indexOf("?"));
            window.history.replaceState({},document.title,clean_uri);
          }, 500);
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

        sckt.on('perbaharui web data suka loker',function(data){
          if (id_loker == data.ilk){
            if (data.token !== null && ctoken != data.token && __ip__ === data.aip){
              ctoken = data.token;
              $('input#ctoken').val(data.token);
              $('#sukai-loker').parent().html(`<button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai lowongan kerja ini'><i class="fas fa-heart"></i></button>`);
              tooltip();
            }
            $('#jumlah-suka-loker').text(parseInt($('#jumlah-suka-loker').text())+1);
          }
        });

        sckt.on('perbaharui web data suka komentar loker',function(data){
          if (id_loker == data.ilk){
            if (data.token !== null && ctoken != data.token && __ip__ === data.aip){
              ctoken = data.token;
              $('input#ctoken').val(data.token);
              $(`[data-id=${data.ik}]`).parent().html(`<button class="btn btn-danger btn-sm rounded-circle disabled tombol-tooltip-disabled btn-love" data-toggle='tooltip' title='Anda menyukai komentar ini'><i class="fas fa-heart"></i></button>`);
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

      $('#sukai-loker').click(function(e){
        $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
        $.ajax({
          url:"<?= site_url('lowongan-kerja/sukai/lowongan-kerja'); ?>",
          type:'POST',
          data:{id_loker:id_loker,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              sckt.emit('perbaharui data suka loker',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui web data suka loker',{token:r.ctoken,aip:__ip__,ilk:id_loker});
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
        $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
        $.ajax({
          url:"<?= site_url('lowongan-kerja/sukai/komentar'); ?>",
          type:'POST',
          data:{id_komentar:id_komentar,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              sckt.emit('perbaharui data suka komentar loker',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui web data suka komentar loker',{token:r.ctoken,aip:__ip__,ilk:id_loker,ik:id_komentar});
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
          url:"<?= site_url('lowongan-kerja/berkomentar'); ?>",
          type:'POST',
          data:$(this).serialize()+`&id_loker=${id_loker}`,
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
          url:"<?= site_url('lowongan-kerja/berkomentar/sunting'); ?>",
          type:'POST',
          data:$(this).serialize()+`&id_loker=${id_loker}`,
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
          url:"<?= site_url('lowongan-kerja/berkomentar/sunting/ambil'); ?>",
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
              url:"<?= site_url('lowongan-kerja/hapus-komentar'); ?>",
              type:'POST',
              data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,id_komentar:id_komentar},
              dataType:'JSON',
              success:function(r){
                if (r.sukses){
                  sckt.emit('perbaharui komentar loker',{token:r.ctoken,np:__np__});
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
          url:"<?= site_url('lowongan-kerja/muat-lebih-banyak-komentar'); ?>",
          type:'POST',
          data:{id_loker:id_loker,index:i,<?= $this->security->get_csrf_token_name(); ?>:ctoken,jumlah:j},
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
                $('#tombol-masuk-md-6').removeClass('col-md-6').addClass('col-md-12');
              <?php endif; ?>
            }else{
              $(self).text('Muat lebih banyak komentar').removeAttr('disabled');
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
              $(this).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled');
              $.ajax({
                url:"<?= site_url('lowongan-kerja/sukai/komentar'); ?>",
                type:'POST',
                data:{id_komentar:id_komentar,<?= $this->security->get_csrf_token_name(); ?>:ctoken},
                dataType:'JSON',
                success:function(r){
                  if (r.sukses){
                    sckt.emit('perbaharui data suka komentar loker',{token:r.ctoken,np:__np__});
                    sckt.emit('perbaharui web data suka komentar loker',{token:r.ctoken,aip:__ip__,ilk:id_loker,ik:id_komentar});
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
          function hapus_loker(){
            swal({
              title:"Apakah anda yakin??",
              text:"Yakin ingin menghapus lowongan kerja ini??",
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
                  url:"<?= site_url('area-pengurus/lowongan-kerja/hapus'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_loker":id_loker},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui loker',{token:r.ctoken,np:__np__});
                      swal({
                        title:"Informasi",
                        text:r.pesan,
                        type:"success",
                        showCancelButton:false,
                        showConfirmButton:false
                      });
                      setTimeout(function(){window.location.href = `<?= site_url('lowongan-kerja'); ?>`;},1500);
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
              text:"Yakin ingin memblokir komentar lowongan kerja ini??",
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
                  url:"<?= site_url('area-pengurus/lowongan-kerja/komentar/blok'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_komentar":id_komentar},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui komentar loker',{token:r.ctoken,np:__np__});
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
              text:"Yakin ingin menghapus komentar lowongan kerja ini??",
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
                  url:"<?= site_url('area-pengurus/lowongan-kerja/komentar/hapus'); ?>",
                  type:'POST',
                  data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_komentar":id_komentar},
                  dataType:'JSON',
                  success:function(r){
                    if (r.sukses){
                      sckt.emit('perbaharui komentar loker',{token:r.ctoken,np:__np__});
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
          <?php if ($loker->penginput == $this->session->ang_nama_pengguna): ?>
            function hapus_loker(){
              swal({
                title:"Apakah anda yakin??",
                text:"Yakin ingin menghapus lowongan kerja ini??",
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
                    url:"<?= site_url('anggota/lowongan-kerja/hapus'); ?>",
                    type:'POST',
                    data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_loker":id_loker},
                    dataType:'JSON',
                    success:function(r){
                      if (r.sukses){
                        sckt.emit('perbaharui loker',{token:r.ctoken,np:__np__});
                        swal({
                          title:"Informasi",
                          text:r.pesan,
                          type:"success",
                          showCancelButton:false,
                          showConfirmButton:false
                        });
                        setTimeout(function(){window.location.href = `<?= site_url('lowongan-kerja'); ?>`;},1500);
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
