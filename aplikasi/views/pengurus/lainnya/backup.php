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

  $nama_penggunanya = $this->session->ang_nama_pengguna;
  $jenis_kelaminnya = strtolower($this->pengguna->ambil_jenis_kelamin($nama_penggunanya));
  $foto_pengurusnya = $this->pengguna->ambil_foto($nama_penggunanya);
  $foto_pengurusnya = $foto_pengurusnya !== NULL ? $foto_pengurusnya : "{$jenis_kelaminnya}.png";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->load->view('head-pengurus', NULL, FALSE); ?>
    <title>Area Pengurus - Always Ngoding</title>
    <link href="<?= base_url('media/website/logo.png'); ?>" rel="icon" type="image/x-icon">
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/animate-css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/themes/all-themes.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/select2/select2.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/select2/select2-bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/app.css'); ?>" rel="stylesheet">
  </head>
  <body class="theme-red">
    <?php $this->load->view('pengurus/markas/atas'); ?>
    <section>
      <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
          <div class="image">
            <img src="<?= base_url('media/foto-pengguna/'.$foto_pengurusnya); ?>" width="48" height="48" alt="Foto Pengurus">
          </div>
          <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $this->pengguna->ambil_nama_lengkap($nama_penggunanya); ?>
            </div>
            <div class="email">
              <?= $nama_penggunanya; ?>
            </div>
            <div class="btn-group user-helper-dropdown hidden-xs hidden-sm">
              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="<?= site_url('area-pengurus/data-diri'); ?>"><i class="material-icons">person</i>Data Diri</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="<?= site_url('area-pengurus/keluar'); ?>"><i class="material-icons">input</i>Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('pengurus/markas/menu'); ?>
      </aside>
      <?php $this->load->view('pengurus/markas/tema'); ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <h2 class="judul-halaman">BACKUP BASIS DATA</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li class="active">
                  <i class="material-icons">backup</i> Backup Basis Data
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="header">
            <h2>BACKUP BASIS DATA</h2>
          </div>
          <div class="body">
            <form id="backup" method="POST" action="<?= site_url('area-pengurus/backup/proses'); ?>">
              <div class="row">
                <div class="col-xs-12 col-sm-12 m-b-20">
                  <label for="tabel">Menu Backup Basis Data</label>
                  <select name="tabel[]" class="form-control" id="tabel" multiple required>
                    <option></option>
                    <option value="<?= html_escape($this->db->dbprefix('1_css')); ?>">Belajar CSS (Tipe 1)</option>
                    <option value="<?= html_escape($this->db->dbprefix('1_html')); ?>">Belajar HTML (Tipe 1)</option>
                    <option value="<?= html_escape($this->db->dbprefix('1_mysql')); ?>">Belajar MySQL (Tipe 1)</option>
                    <option value="<?= html_escape($this->db->dbprefix('1_php')); ?>">Belajar PHP (Tipe 1)</option>
                    <option value="<?= html_escape($this->db->dbprefix('artikel')); ?>">Artikel</option>
                    <option value="<?= html_escape($this->db->dbprefix('diskusi')); ?>">Diskusi</option>
                    <option value="<?= html_escape($this->db->dbprefix('donasi')); ?>">Donasi</option>
                    <option value="<?= html_escape($this->db->dbprefix('dsjd')); ?>">Data Suka Jawaban Diskusi</option>
                    <option value="<?= html_escape($this->db->dbprefix('dsk_artikel')); ?>">Data Suka Komentar Artikel</option>
                    <option value="<?= html_escape($this->db->dbprefix('dsk_loker')); ?>">Data Suka Komentar Lowongan Kerja</option>
                    <option value="<?= html_escape($this->db->dbprefix('ds_artikel')); ?>">Data Suka Artikel</option>
                    <option value="<?= html_escape($this->db->dbprefix('ds_diskusi')); ?>">Data Suka Diskusi</option>
                    <option value="<?= html_escape($this->db->dbprefix('ds_loker')); ?>">Data Suka Lowongan Kerja</option>
                    <option value="<?= html_escape($this->db->dbprefix('iklan')); ?>">Iklan</option>
                    <option value="<?= html_escape($this->db->dbprefix('j_diskusi')); ?>">Jawaban Diskusi</option>
                    <option value="<?= html_escape($this->db->dbprefix('kategori')); ?>">Kategori Artikel</option>
                    <option value="<?= html_escape($this->db->dbprefix('konfigurasi')); ?>">Konfigurasi</option>
                    <option value="<?= html_escape($this->db->dbprefix('k_artikel')); ?>">Komentar Artikel</option>
                    <option value="<?= html_escape($this->db->dbprefix('k_loker')); ?>">Komentar Lowongan Kerja</option>
                    <option value="<?= html_escape($this->db->dbprefix('link_iklan')); ?>">Link Iklan</option>
                    <option value="<?= html_escape($this->db->dbprefix('loker')); ?>">Lowongan Kerja</option>
                    <option value="<?= html_escape($this->db->dbprefix('lupa_ks')); ?>">Lupa Kata Sandi</option>
                    <option value="<?= html_escape($this->db->dbprefix('midtrans')); ?>">Midtrans</option>
                    <option value="<?= html_escape($this->db->dbprefix('notifikasi')); ?>">Notifikasi</option>
                    <option value="<?= html_escape($this->db->dbprefix('pencapian')); ?>">Pencapaian</option>
                    <option value="<?= html_escape($this->db->dbprefix('pengguna')); ?>">Pengguna</option>
                    <option value="<?= html_escape($this->db->dbprefix('pyd')); ?>">Pengguna Yang Dibisukan</option>
                    <option value="<?= html_escape($this->db->dbprefix('p_pencapaian')); ?>">Perolehan Pencapaian</option>
                    <option value="<?= html_escape($this->db->dbprefix('p_premium')); ?>">Pengguna Premium</option>
                    <option value="<?= html_escape($this->db->dbprefix('p_sertifikat')); ?>">Perolehan Sertifikat</option>
                    <option value="<?= html_escape($this->db->dbprefix('riwayat')); ?>">Riwayat</option>
                    <option value="<?= html_escape($this->db->dbprefix('sertifikat')); ?>">Sertifikat</option>
                    <option value="<?= html_escape($this->db->dbprefix('slhd')); ?>">Sudah Lihat Halaman Diskusi</option>
                    <option value="<?= html_escape($this->db->dbprefix('suara')); ?>">Suara</option>
                    <option value="<?= html_escape($this->db->dbprefix('tags')); ?>">Tags</option>
                    <option value="<?= html_escape($this->db->dbprefix('token_lks')); ?>">Token Lupa Kata Sandi</option>
                    <option value="<?= html_escape($this->db->dbprefix('verif_akun')); ?>">Tabel Verifikasi Akun</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block waves-effect" id="tombol-backup">BACKUP BASIS DATA</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/select2/select2.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/select2/select2_locale_id.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/ang.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      $(function(){
        $('select#tabel').select2({placeholder:"Silakan Pilih Semua Tabel Yang Ingin Di Backup"});
      });
    </script>
  </body>
</html>
