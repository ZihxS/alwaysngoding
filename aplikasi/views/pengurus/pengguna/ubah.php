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
    <link href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
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
            <img src="<?= base_url('media/foto-pengguna/'.$foto_pengurusnya); ?>" width="48" height="48" id="foto" alt="Foto Pengurus">
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
              <h2 class="judul-halaman">UBAH PENGGUNA</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li>
                  <a href="<?= site_url('area-pengurus/pengguna'); ?>">
                    <i class="material-icons">wc</i> Pengguna
                  </a>
                </li>
                <li class="active">
                  Ubah
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="header">
            <h2>FORM UBAH</h2>
          </div>
          <div class="body">
            <form id="form-ubah">
              <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
              <input type="hidden" id="nama_pengguna" name="nama_pengguna" value="<?= $data->nama_pengguna; ?>">
              <div class="row">
                <div class="col-xs-12 col-sm-4">
                  <label for="nama_lengkap">Nama Lengkap :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" minlength="3" maxlength="100" value="<?= $data->nama_lengkap; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <?php if ($this->uri->segment(4) === $nama_penggunanya): ?>
                    <label for="foto">Foto (<small>Kosongkan jika tidak ingin diubah</small>) : </label>
                  <?php else: ?>
                    <label for="foto">Foto (<small>Kosongkan jika tidak ingin diubah</small>) : </label>
                  <?php endif; ?>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="kata_sandi">Kata Sandi :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="password" name="kata_sandi" id="kata_sandi" class="form-control" placeholder="Kosongkan Jika Tidak Ingin Diubah">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="tentang">Tentang :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="tentang" id="tentang" class="form-control" maxlength="500" value="<?= $data->tentang; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="alamat">Alamat :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" minlength="3" maxlength="300" value="<?= $data->alamat; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="email">Email :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" minlength="5" maxlength="100" value="<?= $data->email; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="website_pribadi">Website Pribadi :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="website_pribadi" id="website_pribadi" class="form-control" minlength="11" maxlength="100" value="<?= $data->website_pribadi; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="akun_medsos">Akun Medsos :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="akun_medsos" id="akun_medsos" class="form-control" minlength="11" maxlength="100" value="<?= $data->akun_medsos; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="jenis_kelamin">Jenis Kelamin :</label>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="Laki-laki" selected>Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="col-xs-12 col-sm-4 mt-xs-20">
                  <label for="status">Status :</label>
                  <select class="form-control" name="status" id="status" required>
                    <option value="Lajang" selected>Lajang</option>
                    <option value="Berpacaran">Berpacaran</option>
                    <option value="Menikah">Menikah</option>
                  </select>
                </div>
                <div class="col-xs-12 col-sm-4 mt-xs-20">
                  <label for="level">Level :</label>
                  <select class="form-control" name="level" id="level" required>
                    <option value="anggota" selected>Anggota</option>
                    <option value="admin">Admin</option>
                    <option value="superadmin">Superadmin</option>
                  </select>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary btn-block waves-effect m-t-5" id="tombol-ubah">UBAH</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/select2/select2.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/select2/select2_locale_id.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/ang.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      <?php if ($_SERVER['CI_ENV'] == 'development'): ?>
        let sckt = io.connect(<?= json_encode($_SERVER['ANG_SOCKET'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
      <?php else: ?>
        <?php if ($_SERVER['ANG_SOCKET'] != $_ENV['ANG_SOCKET_TRANSPORT_POLLING_URL']): ?>
          let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`);
        <?php else: ?>
          let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`, {transports: ['polling']});
        <?php endif; ?>
      <?php endif; ?>
      const __np__ = '<?= $nama_penggunanya; ?>';

      $(function(){
        $('select[name=jenis_kelamin]').val("<?= $data->jenis_kelamin; ?>").select2();
        $('select[name=status]').val("<?= $data->status; ?>").select2();
        $('select[name=level]').val("<?= $data->level; ?>").select2();
        $('.form-line').removeClass('focused');
      });

      $('#form-ubah').on('submit',function(e){
        e.preventDefault();
        $('#tombol-ubah').text('SEDANG DIPROSES').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('area-pengurus/pengguna/ubah/proses'); ?>",
          type:'POST',
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#tombol-ubah').text('UBAH BERHASIL');
              if ($('#nama_pengguna').val() === __np__){
                $('div.name').text($('#nama_lengkap').val());
                if (r.ubah_foto){
                  $('img#foto').attr('src',`<?= base_url('media/foto-pengguna/'); ?>${r.foto_baru}`);
                }
              }
              notifikasi('green',r.pesan);
              notifikasi('green','Sedang mengarahkan halaman.');
              sckt.emit('perbaharui pengguna',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui riwayat');
              setTimeout(function(){document.location = '../../pengguna';},1500);
            }else{
              $('#tombol-ubah').text('UBAH').removeAttr('disabled');
              $('#ctoken').val(r.ctoken);
              let split = r.pesan.split(',\n');
              for (var i = 1; i <= split.length; i++) notifikasi('red',split[i-1]);
            }
          },
          error:function(respon){
            $('#tombol-ubah').text('UBAH').removeAttr('disabled');
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
    </script>
  </body>
</html>
