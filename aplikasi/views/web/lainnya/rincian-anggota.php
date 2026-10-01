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
  $foto = ($data_diri->foto !== NULL) ? $data_diri->foto : (($data_diri->jenis_kelamin !== NULL) ? "{$data_diri->jenis_kelamin}.png" : "blank.png");

  $p_html = $persentase->persentase_html;
  $p_css = $persentase->persentase_css;
  $p_php = $persentase->persentase_php;
  $p_mysql = $persentase->persentase_mysql;
  $p_js = $persentase->persentase_js;

  if ($p_html >= 1 && $p_html < 25)
  {
    $w_html = "bg-secondary";
  }
  elseif ($p_html >= 25 && $p_html < 50)
  {
    $w_html = "bg-primary";
  }
  elseif ($p_html >= 50 && $p_html < 85)
  {
    $w_html = "bg-warning text-dark";
  }
  elseif ($p_html >= 85)
  {
    $w_html = "bg-danger";
  }

  if ($p_css >= 1 && $p_css < 25)
  {
    $w_css = "bg-secondary";
  }
  elseif ($p_css >= 25 && $p_css < 50)
  {
    $w_css = "bg-primary";
  }
  elseif ($p_css >= 50 && $p_css < 85)
  {
    $w_css = "bg-warning text-dark";
  }
  elseif ($p_css >= 85)
  {
    $w_css = "bg-danger";
  }

  if ($p_php >= 1 && $p_php < 25)
  {
    $w_php = "bg-secondary";
  }
  elseif ($p_php >= 25 && $p_php < 50)
  {
    $w_php = "bg-primary";
  }
  elseif ($p_php >= 50 && $p_php < 85)
  {
    $w_php = "bg-warning text-dark";
  }
  elseif ($p_php >= 85)
  {
    $w_php = "bg-danger";
  }

  if ($p_mysql >= 1 && $p_mysql < 25)
  {
    $w_mysql = "bg-secondary";
  }
  elseif ($p_mysql >= 25 && $p_mysql < 50)
  {
    $w_mysql = "bg-primary";
  }
  elseif ($p_mysql >= 50 && $p_mysql < 85)
  {
    $w_mysql = "bg-warning text-dark";
  }
  elseif ($p_mysql >= 85)
  {
    $w_mysql = "bg-danger";
  }

  if ($p_js >= 1 && $p_js < 25)
  {
    $w_js = "bg-secondary";
  }
  elseif ($p_js >= 25 && $p_js < 50)
  {
    $w_js = "bg-primary";
  }
  elseif ($p_js >= 50 && $p_js < 85)
  {
    $w_js = "bg-warning text-dark";
  }
  elseif ($p_js >= 85)
  {
    $w_js = "bg-danger";
  }

  $am = $data_diri->akun_medsos;
  $wp = $data_diri->website_pribadi;
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title><?= $data_diri->nama_pengguna; ?> - Always Ngoding</title>
    <?php
      $deskripsi = "Ayo kenalan lebih jauh dengan {$data_diri->nama_pengguna}.";

      $this->load->view('head', [
        'url' => site_url("anggota/{$data_diri->nama_pengguna}"),
        'deskripsi' => $deskripsi,
        'sosmed_meta_title' => $data_diri->nama_pengguna,
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
        "@context": "https://schema.org/",
        "@type": "Person",
        "name": "<?= $data_diri->nama_lengkap ?? $data_diri->nama_pengguna; ?>",
        "url": "<?= site_url("anggota/{$data_diri->nama_pengguna}"); ?>",
        "image": "<?= base_url("media/foto-pengguna/{$foto}"); ?>"
      }
    </script>
  </head>
  <body>
    <?php $this->load->view('web/markas/noscript', NULL, FALSE); ?>
    <?php $this->load->view('web/markas/navigasi', NULL, FALSE); ?>
    <nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-90">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><?= $data_diri->nama_pengguna; ?> (<?= $data_diri->nama_lengkap ?? '-'; ?>)</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-rincian-anggota">
        <div class="header-v2">
          <h1><?= $data_diri->nama_pengguna; ?> (<?= $data_diri->nama_lengkap ?? '-'; ?>)</h1>
        </div>
        <div class="row">
          <div class="col-12 col-lg-4">
            <div class="card mb-3 custom-card card-profile-1">
              <div class="card-body">
                <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url("media/foto-pengguna/{$foto}"); ?>" class="foto-rincian-anggota" alt="Foto <?= $data_diri->nama_pengguna; ?>">
                <center>
                  <h4><?= $data_diri->nama_pengguna; ?></h4>
                  <span><?= $data_diri->nama_lengkap ?? '-'; ?></span>
                  <?php if ($data_diri->level != 'anggota'): ?>
                    <br>
                    <span style="color: #dc3545; font-weight: bold;">Tim Always Ngoding</span>
                  <?php endif; ?>
                </center>
                <hr>
                <div class="d-flex justify-content-between">
                  <span>Poin Belajar</span>
                  <span><?= $data_diri->level == 'anggota' || $data_diri->nama_pengguna === $this->session->ang_nama_pengguna ? $data_diri->poin_belajar : '???'; ?></span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                  <span>Poin Diskusi</span>
                  <span><?= $data_diri->level == 'anggota' || $data_diri->nama_pengguna === $this->session->ang_nama_pengguna ? $data_diri->poin_diskusi : '???'; ?></span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                  <span>Jumlah Kontribusi</span>
                  <span><?= $data_diri->level == 'anggota' || $data_diri->nama_pengguna === $this->session->ang_nama_pengguna ? $data_diri->jumlah_kontribusi : '???'; ?></span>
                </div>
                <hr>
                <div class="row">
                  <div class="col-6">
                    <a href="<?= ($am != NULL && $am != '') ? $am : 'javascript:void(0);'; ?>" class="btn btn-outline-danger btn-sm btn-block btn-custom-click<?= ($am == NULL && $am == '') ? ' disabled': ''; ?>"<?= ($am != NULL && $am != '') ? ' target="_blank"': ''; ?>>Media Sosial</a>
                  </div>
                  <div class="col-6">
                    <a href="<?= ($wp != NULL && $wp != '') ? $wp : 'javascript:void(0);'; ?>" class="btn btn-outline-danger btn-sm btn-block btn-custom-click<?= ($wp == NULL || $wp == '') ? ' disabled': ''; ?>"<?= ($wp != NULL && $wp != '') ? ' target="_blank"': ''; ?>>Website Pribadi</a>
                  </div>
                  <?php if ($data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                    <div class="col-12 mt-2">
                      <a href="<?= !$this->session->has_userdata('ang_level') ? site_url('anggota/data-diri') : site_url('area-pengurus/data-diri'); ?>" class="btn btn-outline-danger btn-sm btn-block btn-custom-click">Ubah Data Diri</a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-8">
            <div class="card mb-3 custom-card">
              <div class="card-body">
                <nav>
                  <div class="nav nav-tabs nav-justified" id="nav-tab-1" role="tablist">
                    <a class="nav-item nav-link active" id="nav-data-diri-tab" data-toggle="tab" href="#nav-data-diri" role="tab" aria-controls="nav-data-diri" aria-selected="true">Rincian</a>
                    <?php if ($data_diri->level == 'anggota' || $data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                      <a class="nav-item nav-link" id="nav-kemampuan-tab" data-toggle="tab" href="#nav-kemampuan" role="tab" aria-controls="nav-kemampuan" aria-selected="false">Kemampuan</a>
                    <?php endif; ?>
                    <a class="nav-item nav-link" id="nav-artikel-tab" data-toggle="tab" href="#nav-artikel" role="tab" aria-controls="nav-artikel" aria-selected="false">Artikel</a>
                    <a class="nav-item nav-link" id="nav-diskusi-tab" data-toggle="tab" href="#nav-diskusi" role="tab" aria-controls="nav-diskusi" aria-selected="false">Diskusi</a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent" style="padding-top: 1.25rem;">
                  <div class="tab-pane fade show active" id="nav-data-diri" role="tabpanel" aria-labelledby="nav-data-diri-tab">
                    <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Nama Pengguna:</p>
                    <p><?= $data_diri->nama_pengguna; ?></p>
                    <hr>
                    <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Nama Lengkap:</p>
                    <p><?= $data_diri->nama_lengkap ?? '-'; ?></p>
                    <hr>
                    <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Jenis Kelamin:</p>
                    <p><?= $data_diri->jenis_kelamin ?? '-'; ?></p>
                    <hr>
                    <?php if ($data_diri->level == 'anggota'): ?>
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Tanggal Bergabung:</p>
                      <p><?= $this->ang->tanggal_bulan_indonesia($data_diri->tanggal_bergabung); ?></p>
                      <hr>
                    <?php endif; ?>
                    <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Tentang:</p>
                    <p><?= $data_diri->tentang ?? '-'; ?></p>
                    <hr>
                    <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Alamat:</p>
                    <p class="mb-0"><?= $data_diri->alamat ?? '-'; ?></p>
                  </div>
                  <?php if ($data_diri->level == 'anggota' || $data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                    <div class="tab-pane fade" id="nav-kemampuan" role="tabpanel" aria-labelledby="nav-kemampuan-tab">
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">HTML:</p>
                      <div class="progress">
                        <?php if ($p_html == 0): ?>
                          <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">0%</div>
                        <?php else: ?>
                          <div class="progress-bar <?= $w_html; ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $p_html; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $p_html; ?>%"><?= $p_html; ?>%</div>
                        <?php endif; ?>
                      </div>
                      <hr>
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">CSS:</p>
                      <div class="progress">
                        <?php if ($p_css == 0): ?>
                          <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">0%</div>
                        <?php else: ?>
                          <div class="progress-bar <?= $w_css; ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $p_css; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $p_css; ?>%"><?= $p_css; ?>%</div>
                        <?php endif; ?>
                      </div>
                      <hr>
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">PHP:</p>
                      <div class="progress">
                        <?php if ($p_php == 0): ?>
                          <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">0%</div>
                        <?php else: ?>
                          <div class="progress-bar <?= $w_php; ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $p_php; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $p_php; ?>%"><?= $p_php; ?>%</div>
                        <?php endif; ?>
                      </div>
                      <hr>
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">MySQL:</p>
                      <div class="progress">
                        <?php if ($p_mysql == 0): ?>
                          <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">0%</div>
                        <?php else: ?>
                          <div class="progress-bar <?= $w_mysql; ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $p_mysql; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $p_mysql; ?>%"><?= $p_mysql; ?>%</div>
                        <?php endif; ?>
                      </div>
                      <hr>
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">JavaScript:</p>
                      <div class="progress">
                        <?php if ($p_js == 0): ?>
                          <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">0%</div>
                        <?php else: ?>
                          <div class="progress-bar <?= $w_js; ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?= $p_js; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $p_js; ?>%"><?= $p_js; ?>%</div>
                        <?php endif; ?>
                      </div>
                      <?php if ($data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                        <hr>
                        <a href="<?= site_url('belajar'); ?>" class="btn btn-outline-danger btn-sm btn-custom-click btn-block">Ke Halaman Daftar Kelas</a>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <div class="tab-pane fade" id="nav-artikel" role="tabpanel" aria-labelledby="nav-artikel-tab">
                    <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Artikel Yang Diposting Oleh <?= $data_diri->nama_pengguna; ?>:</p>
                    <ul class="mb-2">
                      <?php if ($artikel): ?>
                        <?php foreach ($artikel as $art): ?>
                          <li><a href="<?= site_url("artikel/{$art->id_artikel}/{$art->slug}"); ?>" target="_blank"><?= strlen($art->judul) >= 75 ? substr($art->judul, 0, 72).'...' : $art->judul; ?></a></li>
                        <?php endforeach; ?>
                        <?php if ($s_artikel): ?>
                          <li><a href="<?= site_url("anggota/{$data_diri->nama_pengguna}/artikel"); ?>" target="_blank">Lihat Semua Artikel <?= $data_diri->nama_pengguna; ?></a></li>
                        <?php endif; ?>
                      <?php else: ?>
                        <li>Belum ada</li>
                      <?php endif; ?>
                    </ul>
                    <?php if ($data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                      <hr>
                      <a href="<?= !$this->session->has_userdata('ang_level') ? site_url('anggota/artikel') : site_url('area-pengurus/artikel'); ?>" class="btn btn-outline-danger btn-sm btn-custom-click btn-block">Kelola atau Tambah Artikel</a>
                    <?php endif; ?>
                  </div>
                  <div class="tab-pane fade" id="nav-diskusi" role="tabpanel" aria-labelledby="nav-diskusi-tab">
                    <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Diskusi Yang Diposting Oleh <?= $data_diri->nama_pengguna; ?>:</p>
                    <ul class="mb-2">
                      <?php if ($diskusi): ?>
                        <?php foreach ($diskusi as $dis): ?>
                          <li><a href="<?= site_url("diskusi/{$dis->id_diskusi}/{$dis->slug}"); ?>" target="_blank"><?= strlen($dis->judul) >= 75 ? substr($dis->judul, 0, 72).'...' : $dis->judul; ?></a></li>
                        <?php endforeach; ?>
                        <?php if ($s_diskusi): ?>
                          <li><a href="<?= site_url("anggota/{$data_diri->nama_pengguna}/diskusi"); ?>" target="_blank">Lihat Semua Diskusi <?= $data_diri->nama_pengguna; ?></a></li>
                        <?php endif; ?>
                      <?php else: ?>
                        <li>Belum ada</li>
                      <?php endif; ?>
                    </ul>
                    <?php if ($data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                      <hr>
                      <a href="<?= !$this->session->has_userdata('ang_level') ? site_url('anggota/diskusi') : site_url('area-pengurus/diskusi'); ?>" class="btn btn-outline-danger btn-sm btn-custom-click btn-block">Kelola atau Tambah Diskusi</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card custom-card">
              <div class="card-body">
                <?php if ($data_diri->level == 'anggota' || $data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                  <nav>
                    <div class="nav nav-tabs nav-justified" id="nav-tab-2" role="tablist">
                      <a class="nav-item nav-link active" id="nav-pencapaian-tab" data-toggle="tab" href="#nav-pencapaian" role="tab" aria-controls="nav-pencapaian" aria-selected="false">Pencapaian</a>
                      <a class="nav-item nav-link" id="nav-sertifikat-tab" data-toggle="tab" href="#nav-sertifikat" role="tab" aria-controls="nav-sertifikat" aria-selected="false">Sertifikat</a>
                      <a class="nav-item nav-link" id="nav-loker-tab" data-toggle="tab" href="#nav-loker" role="tab" aria-controls="nav-loker" aria-selected="true">Lowongan Kerja</a>
                    </div>
                  </nav>
                <?php endif; ?>
                <?php if ($data_diri->level == 'anggota' || $data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                  <div class="tab-content" id="nav-tabContent" style="padding-top: 1.25rem;">
                    <div class="tab-pane fade show active" id="nav-pencapaian" role="tabpanel" aria-labelledby="nav-pencapaian-tab">
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Pencapaian <?= $data_diri->nama_pengguna; ?>:</p>
                      <?php if ($pencapaian): ?>
                        <div class="row">
                          <?php foreach ($pencapaian as $p): ?>
                            <div class="col-6 col-sm-4 col-md-3">
                              <a href="javascript:void(0);" class="rincian-pencapaian" data-nama_pencapaian="<?= $p->nama_pencapaian; ?>" data-gambar="<?= $p->gambar; ?>" data-tanggal_tercapai="<?= $this->ang->tanggal_bulan_indonesia($p->tanggal_tercapai); ?>" data-jam_tercapai="<?= $p->jam_tercapai; ?>"><img alt="Pencapaian" src="<?= base_url("media/pencapaian/{$p->gambar}"); ?>" width="100%"></a>
                            </div>
                          <?php endforeach; ?>
                        </div>
                        <?php if ($s_pencapaian): ?>
                          <a href="<?= site_url("anggota/{$data_diri->nama_pengguna}/pencapaian"); ?>" class="btn btn-outline-danger btn-sm btn-block mt-2" target="_blank">Lihat Semua Pencapaian <?= $data_diri->nama_pengguna; ?></a>
                        <?php endif; ?>
                      <?php else: ?>
                        <ul class="mb-0">
                          <li>Belum ada</li>
                        </ul>
                      <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-sertifikat" role="tabpanel" aria-labelledby="nav-sertifikat-tab">
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Sertifikat <?= $data_diri->nama_pengguna; ?>:</p>
                      <ul class="mb-0">
                        <?php if ($sertifikat || $k_sertifikat): ?>
													<?php foreach ($k_sertifikat as $k_serti): ?>
                            <li><a href="<?= $k_serti->link_sertifikat; ?>" target="_blank"><?= $k_serti->nama_sertifikat; ?></a></li>
                          <?php endforeach; ?>
                          <?php foreach ($sertifikat as $serti): $id = urlencode(str_replace('=', '', base64_encode("sertifikat-{$serti->id_p_sertifikat}"))); $ls = site_url("sertifikat/{$id}"); ?>
                            <li><a href="<?= $ls; ?>" target="_blank"><?= $serti->nama_sertifikat; ?></a></li>
                          <?php endforeach; ?>
                          <?php if ($s_sertifikat): ?>
                            <li><a href="<?= site_url("anggota/{$data_diri->nama_pengguna}/sertifikat"); ?>" target="_blank">Lihat Semua Sertifikat <?= $data_diri->nama_pengguna; ?></a></li>
                          <?php endif; ?>
                        <?php else: ?>
                          <li>Belum ada</li>
                        <?php endif; ?>
                      </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-loker" role="tabpanel" aria-labelledby="nav-loker-tab">
                      <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Lowongan Kerja Yang Diposting Oleh <?= $data_diri->nama_pengguna; ?>:</p>
                      <ul class="mb-2">
                        <?php if ($lowongan_kerja): ?>
                          <?php foreach ($lowongan_kerja as $loker): ?>
                            <li><a href="<?= site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}"); ?>" target="_blank"><?= ucwords("lowongan kerja di {$loker->nama_perusahaan} sebagai {$loker->posisi}"); ?></a></li>
                          <?php endforeach; ?>
                          <?php if ($s_lowongan_kerja): ?>
                            <li><a href="<?= site_url("anggota/{$data_diri->nama_pengguna}/lowongan-kerja"); ?>" target="_blank">Lihat Semua Lowongan Kerja <?= $data_diri->nama_pengguna; ?></a></li>
                          <?php endif; ?>
                        <?php else: ?>
                          <li>Belum ada</li>
                        <?php endif; ?>
                      </ul>
                      <?php if ($data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                        <hr>
                        <a href="<?= !$this->session->has_userdata('ang_level') ? site_url('anggota/lowongan-kerja') : site_url('area-pengurus/lowongan-kerja'); ?>" class="btn btn-outline-danger btn-sm btn-custom-click btn-block">Kelola atau Buka Lowongan Kerja</a>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php else: ?>
                  <p class="mb-0" style="font-family: 'BT'; font-size: 16px;">Lowongan Kerja Yang Diposting Oleh <?= $data_diri->nama_pengguna; ?>:</p>
                  <ul class="mb-2">
                    <?php if ($lowongan_kerja): ?>
                      <?php foreach ($lowongan_kerja as $loker): ?>
                        <li><a href="<?= site_url("lowongan-kerja/{$loker->id_loker}/{$loker->slug}"); ?>" target="_blank"><?= ucwords("lowongan kerja di {$loker->nama_perusahaan} sebagai {$loker->posisi}"); ?></a></li>
                      <?php endforeach; ?>
                      <?php if ($s_lowongan_kerja): ?>
                        <li><a href="<?= site_url("anggota/{$data_diri->nama_pengguna}/lowongan-kerja"); ?>" target="_blank">Lihat Semua Lowongan Kerja <?= $data_diri->nama_pengguna; ?></a></li>
                      <?php endif; ?>
                    <?php else: ?>
                      <li>Belum ada</li>
                    <?php endif; ?>
                  </ul>
                  <?php if ($data_diri->nama_pengguna === $this->session->ang_nama_pengguna): ?>
                    <hr>
                    <a href="<?= !$this->session->has_userdata('ang_level') ? site_url('anggota/lowongan-kerja') : site_url('area-pengurus/lowongan-kerja'); ?>" class="btn btn-outline-danger btn-sm btn-custom-click btn-block">Kelola atau Buka Lowongan Kerja</a>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="pencapaianModal" tabindex="-1" role="dialog" aria-labelledby="pencapaianModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title f-bt" id="pencapaianModalLabel">Pencapaian <?= $data_diri->nama_pengguna; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="tutup-pencapaian">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="isi-pencapaian"></div>
            <div class="modal-footer" id="kaki-pencapaian">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
      $('.rincian-pencapaian').click(function(){
        $('#pencapaianModal').modal('show');
        $('body').removeAttr('style');
        $('.modal').css('padding-right',0);
        $('#isi-pencapaian').html(`
          <img alt="Pencapaian" src="<?= base_url('media/pencapaian/'); ?>${$(this).data('gambar')}" alt="${$(this).data('nama_pencapaian')}" class="pencapaian">
          <hr>
          <p class="mb-0">Detail Pencapaian:</p>
          <ul class="mb-0">
            <li>Pencapaian: ${$(this).data('nama_pencapaian')}.</li>
            <li>Waktu Memperoleh: ${$(this).data('tanggal_tercapai')} (${$(this).data('jam_tercapai')} WIB).</li>
          </ul>
        `);
      });
    </script>
  </body>
</html>
