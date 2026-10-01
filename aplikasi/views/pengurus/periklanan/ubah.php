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
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">
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
              <h2 class="judul-halaman">UBAH IKLAN</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li>
                  <a href="<?= site_url('area-pengurus/periklanan'); ?>">
                    <i class="material-icons">monetization_on</i> Periklanan
                  </a>
                </li>
                <li>
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
              <input type="hidden" name="id_iklan" value="<?= $data->id_iklan; ?>">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                  <label for="gambar">Gambar Iklan (<small><a href="<?= base_url("media/iklan/{$data->gambar}"); ?>" target="_blank">Klik untuk lihat gambar iklannya</a></small>) : </label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="file" class="form-control" name="gambar" accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <label for="lebar_gambar">Lebar Gambar (PX) :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="number" class="form-control" name="lebar_gambar" id="lebar_gambar" min="1" placeholder="Silahkan Masukkan Lebar Gambarnya" value="<?= $_lg_; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <label for="tinggi_gambar">Tinggi Gambar (PX) :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="number" class="form-control" name="tinggi_gambar" id="tinggi_gambar" min="1" placeholder="Silahkan Masukkan Tinggi Gambarnya" value="<?= $_tg_; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="penempatan">Penempatan Iklan :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="penempatan" id="penempatan" class="form-control" maxlength="100" value="<?= $data->penempatan; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="link_tujuan">Link Tujuan :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="url" name="link_tujuan" id="link_tujuan" class="form-control" maxlength="200" value="<?= $data->link_tujuan; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="kontak_pengiklan">Kontak Pengiklan (No HP/Email) :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="kontak_pengiklan" id="kontak_pengiklan" class="form-control" maxlength="100" value="<?= $data->kontak_pengiklan; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="jatuh_tempo">Tanggal Jatuh Tempo :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="jatuh_tempo" id="jatuh_tempo" class="datepicker form-control" placeholder="Silahkan Pilih Tanggal Jatuh Temponya..." value="<?= $data->jatuh_tempo; ?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block waves-effect" id="tombol-ubah">UBAH</button>
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
    <script src="<?= base_url('perpustakaan/bsb/plugins/momentjs/moment.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
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
        $('.form-line').removeClass('focused');
      });

      $('#form-ubah').on('submit',function(e){
        e.preventDefault();
        $('#tombol-ubah').text('SEDANG DIPROSES').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('area-pengurus/periklanan/ubah/proses'); ?>",
          type:'POST',
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#tombol-ubah').text('UBAH BERHASIL');
              notifikasi('green',r.pesan);
              notifikasi('green','Sedang mengarahkan halaman.');
              sckt.emit('perbaharui iklan',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui riwayat');
              setTimeout(function(){document.location = '../../periklanan';},1500);
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

      $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        minDate: "<?= date('Y-m-d'); ?>",
        maxDate: "<?= date('Y-m-d',strtotime("+60 month")); ?>",
        clearButton: true,
        weekStart: 1,
        time: false
      });
    </script>
  </body>
</html>
