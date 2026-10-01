<?php $notifikasi = $this->notifikasi->ambil_terbaru($this->session->ang_nama_pengguna); ?>
<div class="page-loader-wrapper">
  <div class="loader">
    <div class="preloader">
      <div class="spinner-layer pl-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
    <p>MOHON TUNGGU</p>
  </div>
</div>
<div class="overlay"></div>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
      <a href="javascript:void(0);" class="bars"></a>
      <a class="navbar-brand" href="<?= site_url(); ?>">ALWAYS NGODING</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" id="tombol-notifikasi">
            <i class="material-icons">notifications</i>
            <?php if (count($notifikasi) > 0): ?>
              <span class="label-count" id="jumlah-notifikasi"><?= count($notifikasi); ?></span>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu f-koho dropdown-notifikasi">
            <li class="header">NOTIFIKASI</li>
            <li class="body">
              <ul class="menu">
                <?php if (count($notifikasi) == 0): ?>
                  <li class="text-center m-t-120">
                    Belum Ada Notifikasi Terbaru
                  </li>
                <?php else: ?>
                  <?php foreach ($notifikasi as $notif): ?>
                    <li>
                      <a href="<?= $notif->link != '' ? $notif->link : 'javascript:void(0);'; ?>"<?= $notif->link != '' ? " target='_blank'" : ''; ?>>
                        <div class="menu-info">
                          <h4 style="margin-bottom: 3px;"><?= strip_tags($notif->konten); ?></h4>
                          <p>
                            <i class="material-icons">access_time</i> <?= $notif->tanggal_waktu; ?>
                          </p>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
              <li style="text-align: center; border-top: 1px solid #eee; margin-bottom: -5px;">
                <a href="<?= site_url('notifikasi'); ?>" target="_blank">LIHAT SEMUA NOTIFIKASI</a>
              </li>
            </li>
          </ul>
        </li>
        <li class="pull-right">
          <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>