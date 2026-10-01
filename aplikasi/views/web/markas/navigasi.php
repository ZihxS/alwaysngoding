<?php $uri = $this->uri->segment(1); $notifikasi = $this->notifikasi->ambil_terbaru($this->session->ang_nama_pengguna); ?>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top navbar-shadow">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url(); ?>">Always Ngoding</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi" aria-controls="navigasi" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigasi">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item<?= $uri == '' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url(); ?>"><i class="fas fa-home fa-fw"></i> Beranda</a>
        </li>
        <li class="nav-item<?= $uri == 'belajar' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('belajar'); ?>"><i class="fas fa-book fa-fw"></i> Belajar</a>
        </li>
        <li class="nav-item<?= $uri == 'artikel' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('artikel'); ?>"><i class="fas fa-newspaper fa-fw"></i> Artikel</a>
        </li>
        <li class="nav-item<?= $uri == 'diskusi' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('diskusi'); ?>"><i class="fas fa-comments fa-fw"></i> Diskusi</a>
        </li>
        <li class="nav-item<?= $uri == 'lowongan-kerja' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('lowongan-kerja'); ?>"><i class="fas fa-briefcase fa-fw"></i> Lowongan Kerja</a>
        </li>
        <?php if ($this->session->has_userdata('ang_akses')): ?>
          <li class="nav-item dropdown">
            <a id="menu-akun navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"></i> <?= $this->session->ang_nama_pengguna; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= site_url("anggota/{$this->session->ang_nama_pengguna}"); ?>"><i class="fas fa-user fa-fw"></i> Data Diri</a>
              <div class="dropdown-divider"></div>
              <a id="menu-notifikasi" class="dropdown-item" href="<?= site_url('notifikasi'); ?>"><i class="fas fa-bell fa-fw"></i> <?= count($notifikasi) > 0 ? "<span id='jumlah_notifikasi'>".count($notifikasi)."</span> " : ""; ?>Notifikasi</a>
              <div class="dropdown-divider"></div>
              <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                <a class="dropdown-item" href="<?= site_url('area-pengurus'); ?>"><i class="fas fa-coffee fa-fw"></i> Dashboard</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url('area-pengurus/keluar'); ?>"><i class="fas fa-sign-out-alt fa-fw"></i> Keluar</a>
              <?php else: ?>
                <a class="dropdown-item" href="<?= site_url('anggota'); ?>"><i class="fas fa-coffee fa-fw"></i> Dashboard</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url('anggota/keluar'); ?>"><i class="fas fa-sign-out-alt fa-fw"></i> Keluar</a>
              <?php endif; ?>
            </div>
          </li>
        <?php else: ?>
          <li class="nav-item dropdown<?= $uri == 'daftar' || $uri == 'masuk' ? ' active' : ''; ?>">
            <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"></i> Akun
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (ang_integration_enabled('smtp')): ?><a class="dropdown-item<?= $uri == 'daftar' ? ' active' : ''; ?>" href="<?= site_url('daftar'); ?>"><i class="fas fa-user-plus fa-fw"></i> Daftar</a><?php endif; ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item<?= $uri == 'masuk' ? ' active' : ''; ?>" href="<?= site_url('masuk'); ?>"><i class="fas fa-sign-in-alt fa-fw"></i> Masuk</a>
            </div>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url(); ?>">
      <img src="<?= base_url('media/website/logo.png') ?>" width="40" height="40" alt="Logo Always Ngoding">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi" aria-controls="navigasi" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigasi">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url(); ?>">BERANDA</a>
        </li>
        <li class="nav-item<?= $uri == 'belajar' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('belajar'); ?>">BELAJAR</a>
        </li>
        <li class="nav-item<?= $uri == 'artikel' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('artikel'); ?>">ARTIKEL</a>
        </li>
        <li class="nav-item<?= $uri == 'diskusi' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('diskusi'); ?>">DISKUSI</a>
        </li>
        <li class="nav-item<?= $uri == 'lowongan-kerja' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= site_url('lowongan-kerja'); ?>">LOWONGAN KERJA</a>
        </li>
        <?php if ($this->session->has_userdata('ang_akses')): ?>
          <li class="nav-item dropdown">
            <a id="menu-akun" class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" style="padding-right: 0; margin-right: 0;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              MENU PENGGUNA
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= site_url("anggota/{$this->session->ang_nama_pengguna}"); ?>">DATA DIRI</a>
              <div class="dropdown-divider"></div>
              <a id="menu-notifikasi" class="dropdown-item" href="<?= site_url('notifikasi'); ?>"><?= count($notifikasi) > 0 ? "<span id='jumlah_notifikasi'>".count($notifikasi)."</span> " : ""; ?>NOTIFIKASI</a>
              <div class="dropdown-divider"></div>
              <?php if ($this->session->has_userdata('ang_pengurus')): ?>
                <a class="dropdown-item" href="<?= site_url('area-pengurus'); ?>">DASHBOARD</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url('area-pengurus/keluar'); ?>">KELUAR</a>
              <?php else: ?>
                <a class="dropdown-item" href="<?= site_url('anggota'); ?>">DASHBOARD</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url('anggota/keluar'); ?>">KELUAR</a>
              <?php endif; ?>
            </div>
          </li>
        <?php else: ?>
          <?php if (ang_integration_enabled('smtp')): ?><li class="nav-item<?= $uri == 'daftar' ? ' active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('daftar'); ?>">DAFTAR</a>
          </li><?php endif; ?>
          <li class="nav-item<?= $uri == 'masuk' ? ' active' : ''; ?>">
            <a class="nav-link" style="padding-right: 0; margin-right: 0;" href="<?= site_url('masuk'); ?>">MASUK</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>