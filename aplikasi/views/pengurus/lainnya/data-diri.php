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
            <img src="<?= base_url('media/foto-pengguna/'.$foto_pengurusnya); ?>" class="foto" width="48" height="48" alt="Foto Pengurus">
          </div>
          <div class="info-container">
            <div class="name nama_lengkap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $this->pengguna->ambil_nama_lengkap($nama_penggunanya); ?>
            </div>
            <div class="email">
              <?= $nama_penggunanya; ?>
            </div>
            <div class="btn-group user-helper-dropdown hidden-xs hidden-sm">
              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="javascript:void(0)"><i class="material-icons">person</i>Data Diri</a>
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
              <h2 class="judul-halaman">DATA DIRI ANDA</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li class="active">&nbsp;</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-xs-12 col-sm-4">
            <div class="card profile-card">
              <div class="profile-header">&nbsp;</div>
              <div class="profile-body">
                <div class="image-area">
                  <img src="<?= base_url('media/foto-pengguna/'.$foto_pengurusnya); ?>" class="foto" alt="Foto <?= $nama_penggunanya; ?>">
                </div>
                <div class="content-area">
                  <h3><?= $nama_penggunanya; ?></h3>
                  <p class="nama_lengkap"><?= $data->nama_lengkap; ?></p>
                  <p>Always Ngoding</p>
                </div>
              </div>
              <div class="profile-footer">
                <a href="<?= site_url("anggota/{$nama_penggunanya}"); ?>" class="btn btn-primary waves-effect btn-block" target="_blank">DETAIL DATA DIRI</a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-8">
            <div class="card">
              <div class="body">
                <div>
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                      <a href="#data" aria-controls="data" role="tab" data-toggle="tab">Data</a>
                    </li>
                    <li role="presentation">
                      <a href="#ganti_kata_sandi" aria-controls="settings" role="tab" data-toggle="tab">Ganti Kata Sandi</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="data">
                      <form id="ubah-data">
                        <input type="hidden" class="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <label for="foto">Foto (<small>Kosongkan Jika Tidak Mau Diubah</small>) : </label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="file" id="foto" class="form-control" name="foto" accept="image/*">
                          </div>
                        </div>
                        <label for="nama_lengkap">Nama Lengkap :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" minlength="3" maxlength="100" value="<?= $data->nama_lengkap; ?>" required>
                          </div>
                        </div>
                        <label for="tentang">Tentang :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="tentang" id="tentang" class="form-control" placeholder="Ceritakan Tentang Diri Anda" maxlength="500" value="<?= $data->tentang ?? '-'; ?>" required>
                          </div>
                        </div>
                        <label for="alamat">Alamat :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" minlength="3" maxlength="300" value="<?= $data->alamat ?? '-'; ?>" required>
                          </div>
                        </div>
                        <label for="website_pribadi">Website Pribadi :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="url" name="website_pribadi" id="website_pribadi" class="form-control" placeholder="Masukkan Website Pribadi" minlength="11" maxlength="100" value="<?= $data->website_pribadi; ?>">
                          </div>
                        </div>
                        <label for="akun_medsos">Akun Medsos :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="url" name="akun_medsos" id="akun_medsos" class="form-control" placeholder="Masukkan Akun Medsos" minlength="11" maxlength="100" value="<?= $data->akun_medsos; ?>" required>
                          </div>
                        </div>
                        <label for="jenis_kelamin">Jenis Kelamin :</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                          <option value="Laki-laki" selected>Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="status">Status :</label>
                        <select class="form-control" name="status" id="status" required>
                          <option value="Lajang" selected>Lajang</option>
                          <option value="Berpacaran">Berpacaran</option>
                          <option value="Menikah">Menikah</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-block waves-effect m-t-15" id="tombol-ubah-data">UBAH DATA</button>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="ganti_kata_sandi">
                      <form id="ubah-kata-sandi">
                        <input type="hidden" class="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <label for="kata_sandi_lama">Kata Sandi Lama :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="password" name="kata_sandi_lama" id="kata_sandi_lama" class="form-control" placeholder="Masukkan Kata Sandi Lama Anda">
                          </div>
                        </div>
                        <label for="kata_sandi_baru">Kata Sandi Baru :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="password" name="kata_sandi_baru" id="kata_sandi_baru" class="form-control" placeholder="Masukkan Kata Sandi Baru Anda">
                          </div>
                        </div>
                        <label for="kata_sandi_konfirmasi">Konfirmasi Kata Sandi :</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="password" name="kata_sandi_konfirmasi" id="kata_sandi_konfirmasi" class="form-control" placeholder="Konfirmasi Kata Sandi Baru Anda">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect" id="tombol-ubah-kata-sandi">UBAH KATA SANDI</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
        $('select[name=jenis_kelamin]').val('<?= $data->jenis_kelamin; ?>').select2();
        $('select[name=status]').val('<?= $data->status; ?>').select2();
        $('.form-line').removeClass('focused');
      });

      $('#ubah-data').on('submit',function(e){
        e.preventDefault();
        $('#tombol-ubah-data').text('SEDANG DIPROSES').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('area-pengurus/data-diri/ubah'); ?>",
          type:'POST',
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#tombol-ubah-data').text('UBAH BERHASIL');
              $('.nama_lengkap').text($('#nama_lengkap').val());
              $('#foto').val('');
              if (r.ubah_foto){
                $('.foto').attr('src',`<?= base_url('media/foto-pengguna/'); ?>${r.foto_baru}`);
              }
              notifikasi('green',r.pesan);
              sckt.emit('perbaharui pengguna',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui riwayat');
            }else{
              let split = r.pesan.split(',\n');
              for (var i = 1; i <= split.length; i++) notifikasi('red',split[i-1]);
            }
            $('.ctoken').val(r.ctoken);
            $('#tombol-ubah-data').text('UBAH').removeAttr('disabled');
          },
          error:function(respon){
            $('#tombol-ubah-data').text('UBAH').removeAttr('disabled');
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

      $('#ubah-kata-sandi').on('submit',function(e){
        e.preventDefault();
        $('#tombol-ubah-kata-sandi').text('SEDANG DIPROSES').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('area-pengurus/data-diri/ubah/kata-sandi'); ?>",
          type:'POST',
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#tombol-ubah-kata-sandi').text('UBAH BERHASIL');
              $('input[type=password]').val('');
              notifikasi('green',r.pesan);
              sckt.emit('perbaharui pengguna',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui riwayat');
            }else{
              let split = r.pesan.split(',\n');
              for (var i = 1; i <= split.length; i++) notifikasi('red',split[i-1]);
            }
            $('.ctoken').val(r.ctoken);
            $('#tombol-ubah-kata-sandi').text('UBAH').removeAttr('disabled');
          },
          error:function(respon){
            $('#tombol-ubah-kata-sandi').text('UBAH').removeAttr('disabled');
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
