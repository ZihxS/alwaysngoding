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
              <h2 class="judul-halaman">KONFIGURASI WEBSITE</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li class="active">
                  <i class="material-icons">settings</i> Konfigurasi Website
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="header">
            <h2>KONFIGURASI WEBSITE <q>ALWAYS NGODING</q></h2>
          </div>
          <div class="body">
            <form id="form-perbaharui">
              <input type="hidden" id="ctoken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
              <div class="row">
                <div class="col-xs-12 col-sm-4">
                  <label for="facebook">Facebook :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="facebook" id="facebook" class="form-control" maxlength="100" value="<?= $facebook; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="twitter">Twitter :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="twitter" id="twitter" class="form-control" maxlength="100" value="<?= $twitter; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="instagram">Instagram :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="instagram" id="instagram" class="form-control" maxlength="100" value="<?= $instagram; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="github">Github :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="github" id="github" class="form-control" maxlength="100" value="<?= $github; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="whatsapp">WhatsApp :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="whatsapp" id="whatsapp" class="form-control" minlength="11" maxlength="15" value="<?= $whatsapp; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="email">Email :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="email" name="email" id="email" class="form-control" maxlength="100" value="<?= $email; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="youtube">Youtube :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="youtube" id="youtube" class="form-control" maxlength="100" value="<?= $youtube; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="versi">Versi Always Ngoding :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="versi" id="versi" class="form-control" maxlength="10" value="<?= $versi; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="pemeliharaan">Pemeliharaan Website</label>
                  <select name="pemeliharaan" class="form-control" id="pemeliharaan" required>
                    <option value="N">Tidak</option>
                    <option value="Y">Ya</option>
                  </select>
                  <br>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block waves-effect mt-xs-20" id="tombol-perbaharui">PERBAHARUI</button>
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
        $('select[name=pemeliharaan]').val("<?= $pemeliharaan; ?>").select2();
        $('.form-line').removeClass('focused');

        sckt.on('perbaharui konfigurasi',function(data){
          if (data.token !== null && $('#ctoken').val() != data.token && __np__ === data.np){
            $('#ctoken').val(data.token);
          }
          $('#facebook').val(data.facebook);
          $('#twitter').val(data.twitter);
          $('#instagram').val(data.instagram);
          $('#github').val(data.github);
          $('#whatsapp').val(data.whatsapp);
          $('#email').val(data.email);
          $('#youtube').val(data.youtube);
          $('#versi').val(data.versi);
          $('select[name=pemeliharaan]').val(data.pemeliharaan).trigger("change");
        });
      });

      $('#form-perbaharui').on('submit',function(e){
        e.preventDefault();
        $('#tombol-perbaharui').text('SEDANG DIPROSES').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('area-pengurus/konfigurasi/perbaharui'); ?>",
          type:'POST',
          data:$(this).serialize(),
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              notifikasi('green',r.pesan);
              sckt.emit('perbaharui konfigurasi',{
                token:r.ctoken,
                facebook:r.i.facebook,
                twitter:r.i.twitter,
                instagram:r.i.instagram,
                github:r.i.github,
                whatsapp:r.i.whatsapp,
                email:r.i.email,
                youtube:r.i.youtube,
                versi:r.i.versi,
                pemeliharaan:r.i.pemeliharaan,
                np:__np__
              });
              sckt.emit('perbaharui riwayat');
            }else{
              $('#ctoken').val(r.ctoken);
              let split = r.pesan.split(',\n');
              for (var i = 1; i <= split.length; i++) notifikasi('red',split[i-1]);
            }
            $('#tombol-perbaharui').text('PERBAHARUI').removeAttr('disabled');
          },
          error:function(respon){
            $('#tombol-perbaharui').text('PERBAHARUI').removeAttr('disabled');
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
