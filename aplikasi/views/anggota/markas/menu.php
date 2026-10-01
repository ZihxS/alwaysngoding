<div class="menu">
  <ul class="list">
    <li class="header">MENU</li>
    <li<?= $this->uri->segment(2) == '' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('area-pengurus'); ?>">
        <i class="material-icons">dashboard</i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="header">KOMUNITAS</li>
    <li<?= $this->uri->segment(2) == 'artikel' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/artikel'); ?>">
        <i class="material-icons">event_note</i>
        <span>Artikel Anda</span>
      </a>
    </li>
    <li<?= $this->uri->segment(2) == 'diskusi' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/diskusi'); ?>">
        <i class="material-icons">forum</i>
        <span>Diskusi Anda</span>
      </a>
    </li>
    <li class="header">TESTIMONI</li>
    <li<?= $this->uri->segment(2) == 'suara-anggota' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/suara-anggota'); ?>">
        <i class="material-icons">volume_up</i>
        <span>Suara Anggota</span>
      </a>
    </li>
    <li class="header">APRESIASI</li>
    <li<?= $this->uri->segment(2) == 'sertifikat' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/sertifikat'); ?>">
        <i class="material-icons">local_play</i>
        <span>Sertifikat Anda</span>
      </a>
    </li>
    <li<?= $this->uri->segment(2) == 'pencapaian' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/pencapaian'); ?>">
        <i class="material-icons">stars</i>
        <span>Pencapaian Anda</span>
      </a>
    </li>
    <li class="header">BISNIS</li>
    <!-- <li<?= $this->uri->segment(2) == 'pasang-iklan' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/pasang-iklan'); ?>">
        <i class="material-icons">monetization_on</i>
        <span>Pasang Iklan</span>
      </a>
    </li> -->
    <li<?= $this->uri->segment(2) == 'lowongan-kerja' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/lowongan-kerja'); ?>">
        <i class="material-icons">business_center</i>
        <span>Lowongan Kerja Anda</span>
      </a>
    </li>
    <li class="header">LAINNYA</li>
    <li>
      <a href="<?= site_url('belajar'); ?>">
        <i class="material-icons">book</i>
        <span>Belajar</span>
      </a>
    </li>
    <li<?= $this->uri->segment(2) == 'panduan' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('anggota/panduan'); ?>">
        <i class="material-icons">help</i>
        <span>Panduan</span>
      </a>
    </li>
    <li>
      <a href="<?= site_url(); ?>">
        <i class="material-icons">home</i>
        <span>Ke Beranda Always Ngoding</span>
      </a>
    </li>
    <li class="header hidden-md hidden-lg">AKUN ANDA</li>
    <li<?= $this->uri->segment(2) == 'data-diri' ? " class='active hidden-md hidden-lg'" : " class='hidden-md hidden-lg'"; ?>>
      <a href="<?= site_url('anggota/data-diri'); ?>">
        <i class="material-icons">person</i>
        <span>Lihat Data Diri</span>
      </a>
    </li>
    <li class="hidden-md hidden-lg">
      <a href="<?= site_url('anggota/keluar'); ?>">
        <i class="material-icons">input</i>
        <span>Keluar</span>
      </a>
    </li>
  </ul>
</div>
<div class="legal">
  <div class="copyright">
    &copy; <?= date('Y'); ?> Muhammad Saleh Solahudin, All Rights Reserved.
  </div>
</div>