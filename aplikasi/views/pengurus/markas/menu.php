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
      <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">event_note</i>
        <span>Artikel</span>
      </a>
      <ul class="ml-menu">
        <li<?= ($this->uri->segment(2) == 'artikel' && $this->uri->segment(3) != 'kategori' && $this->uri->segment(3) != 'komentar') ? " class='active'" : ''; ?>>
          <a href="<?= site_url('area-pengurus/artikel'); ?>">Data Artikel</a>
        </li>
        <li<?= ($this->uri->segment(2) == 'artikel' && $this->uri->segment(3) == 'kategori') ? " class='active'" : ''; ?>>
          <a href="<?= site_url('area-pengurus/artikel/kategori'); ?>">Data Kategori Artikel</a>
        </li>
        <li<?= ($this->uri->segment(2) == 'artikel' && $this->uri->segment(3) == 'komentar') ? " class='active'" : ''; ?>>
          <a href="<?= site_url('area-pengurus/artikel/komentar'); ?>">Data Komentar Artikel</a>
        </li>
      </ul>
    </li>
    <li<?= $this->uri->segment(2) == 'diskusi' ? " class='active'" : ''; ?>>
      <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">forum</i>
        <span>Diskusi</span>
      </a>
      <ul class="ml-menu">
        <li<?= ($this->uri->segment(2) == 'diskusi' && $this->uri->segment(3) != 'jawaban') ? " class='active'" : ''; ?>>
          <a href="<?= site_url('area-pengurus/diskusi'); ?>">Data Diskusi</a>
        </li>
        <li<?= ($this->uri->segment(2) == 'diskusi' && $this->uri->segment(3) == 'jawaban') ? " class='active'" : ''; ?>>
          <a href="<?= site_url('area-pengurus/diskusi/jawaban'); ?>">Data Jawaban Diskusi</a>
        </li>
      </ul>
    </li>
    <li class="header">AKUN</li>
    <?php if ($this->session->ang_level === 'superadmin'): ?>
      <li<?= $this->uri->segment(2) == 'pengguna' ? " class='active'" : ''; ?>>
        <a href="<?= site_url('area-pengurus/pengguna'); ?>">
          <i class="material-icons">wc</i>
          <span>Pengguna</span>
        </a>
      </li>
    <?php endif; ?>
      <li<?= $this->uri->segment(2) == 'suara-anggota' ? " class='active'" : ''; ?>>
        <a href="<?= site_url('area-pengurus/suara-anggota'); ?>">
          <i class="material-icons">volume_up</i>
          <span>Suara Anggota</span>
        </a>
      </li>
    <?php if ($this->session->ang_level === 'superadmin'): ?>
      <li class="header">APRESIASI</li>
      <li<?= $this->uri->segment(2) == 'pencapaian' ? " class='active'" : ''; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
          <i class="material-icons">stars</i>
          <span>Pencapaian</span>
        </a>
        <ul class="ml-menu">
          <li<?= ($this->uri->segment(2) == 'pencapaian' && $this->uri->segment(3) != 'perolehan') ? " class='active'" : ''; ?>>
            <a href="<?= site_url('area-pengurus/pencapaian'); ?>">Data Pencapaian</a>
          </li>
          <li<?= ($this->uri->segment(2) == 'pencapaian' && $this->uri->segment(3) == 'perolehan') ? " class='active'" : ''; ?>>
            <a href="<?= site_url('area-pengurus/pencapaian/perolehan'); ?>">Data Perolehan Pencapain</a>
          </li>
        </ul>
      </li>
      <li<?= $this->uri->segment(2) == 'sertifikat' ? " class='active'" : ''; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
          <i class="material-icons">local_play</i>
          <span>Sertifikat</span>
        </a>
        <ul class="ml-menu">
          <li<?= ($this->uri->segment(2) == 'sertifikat' && $this->uri->segment(3) != 'perolehan') ? " class='active'" : ''; ?>>
            <a href="<?= site_url('area-pengurus/sertifikat'); ?>">Data Sertifikat</a>
          </li>
          <li<?= ($this->uri->segment(2) == 'sertifikat' && $this->uri->segment(3) == 'perolehan') ? " class='active'" : ''; ?>>
            <a href="<?= site_url('area-pengurus/sertifikat/perolehan'); ?>">Data Perolehan Sertifikat</a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
    <li class="header">BISNIS</li>
    <?php if ($this->session->ang_level === 'superadmin'): ?>
      <li<?= $this->uri->segment(2) == 'donasi' ? " class='active'" : ''; ?>>
        <a href="<?= site_url('area-pengurus/donasi'); ?>">
          <i class="material-icons">card_giftcard</i>
          <span>Donasi</span>
        </a>
      </li>
      <li<?= $this->uri->segment(2) == 'periklanan' ? " class='active'" : ''; ?>>
        <a href="<?= site_url('area-pengurus/periklanan'); ?>">
          <i class="material-icons">monetization_on</i>
          <span>Periklanan</span>
        </a>
      </li>
    <?php endif; ?>
    <li<?= $this->uri->segment(2) == 'link-iklan' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('area-pengurus/link-iklan'); ?>">
        <i class="material-icons">link</i>
        <span>Link Untuk Iklan</span>
      </a>
    </li>
    <li<?= $this->uri->segment(2) == 'lowongan-kerja' ? " class='active'" : ''; ?>>
      <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">business_center</i>
        <span>Lowongan Kerja</span>
      </a>
      <ul class="ml-menu">
        <li<?= ($this->uri->segment(2) == 'lowongan-kerja' && $this->uri->segment(3) != 'komentar') ? " class='active'" : ''; ?>>
          <a href="<?= site_url('area-pengurus/lowongan-kerja'); ?>">Data Lowongan Kerja</a>
        </li>
        <li<?= ($this->uri->segment(2) == 'lowongan-kerja' && $this->uri->segment(3) == 'komentar') ? " class='active'" : ''; ?>>
          <a href="<?= site_url('area-pengurus/lowongan-kerja/komentar'); ?>">Data Komentar Lowongan Kerja</a>
        </li>
      </ul>
    </li>
    <li class="header">LAINNYA</li>
    <li<?= $this->uri->segment(2) == 'panduan' ? " class='active'" : ''; ?>>
      <a href="<?= site_url('area-pengurus/panduan'); ?>">
        <i class="material-icons">help</i>
        <span>Panduan</span>
      </a>
    </li>
    <?php if ($this->session->ang_level === 'superadmin'): ?>
      <li<?= $this->uri->segment(2) == 'rekap' ? " class='active'" : ''; ?>>
        <a href="<?= site_url('area-pengurus/rekap'); ?>">
          <i class="material-icons">print</i>
          <span>Rekap Data</span>
        </a>
      </li>
      <li<?= $this->uri->segment(2) == 'backup' ? " class='active'" : ''; ?>>
        <a href="<?= site_url('area-pengurus/backup'); ?>">
          <i class="material-icons">backup</i>
          <span>Backup Basis Data</span>
        </a>
      </li>
      <li<?= $this->uri->segment(2) == 'konfigurasi' ? " class='active'" : ''; ?>>
        <a href="<?= site_url('area-pengurus/konfigurasi'); ?>">
          <i class="material-icons">settings</i>
          <span>Konfigurasi Website</span>
        </a>
      </li>
    <?php endif; ?>
    <li>
      <a href="<?= site_url(); ?>">
        <i class="material-icons">home</i>
        <span>Ke Beranda Always Ngoding</span>
      </a>
    </li>
    <li class="header hidden-md hidden-lg">AKUN ANDA</li>
    <li<?= $this->uri->segment(2) == 'data-diri' ? " class='active hidden-md hidden-lg'" : " class='hidden-md hidden-lg'"; ?>>
      <a href="<?= site_url('area-pengurus/data-diri'); ?>">
        <i class="material-icons">person</i>
        <span>Lihat Data Diri</span>
      </a>
    </li>
    <li class="hidden-md hidden-lg">
      <a href="<?= site_url('area-pengurus/keluar'); ?>">
        <i class="material-icons">input</i>
        <span>Keluar</span>
      </a>
    </li>
  </ul>
</div>
<div class="legal">
  <div class="copyright">
    &copy; <?= date('Y'); ?> - Muhammad Saleh Solahudin
  </div>
</div>