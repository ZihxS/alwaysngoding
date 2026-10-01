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
              <h2 class="judul-halaman">UBAH LOWONGAN KERJA</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li>
                  <a href="<?= site_url('area-pengurus/lowongan-kerja'); ?>">
                    <i class="material-icons">business_center</i> Lowongan Kerja
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
              <input type="hidden" name="id_loker" value="<?= $data->id_loker; ?>">
              <div class="row">
                <div class="col-xs-12 col-sm-4">
                  <label for="nama_perusahaan">Nama Perusahaan :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Masukkan Nama Perusahaan" minlength="2" maxlength="100" value="<?= $data->nama_perusahaan; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="lokasi">Lokasi :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan Lokasi Perusahaan" minlength="2" maxlength="100" value="<?= $data->lokasi; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="posisi">Posisi :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="posisi" id="posisi" class="form-control" placeholder="Masukkan Posisi Pekerjaan" minlength="2" maxlength="100" value="<?= $data->posisi; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                  <label for="catatan">Catatan :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <textarea name="catatan" id="catatan" class="form-control"><?= $data->catatan; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                  <label for="syarat_ketentuan">Syarat dan Ketentuan :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <textarea name="syarat_ketentuan" id="syarat_ketentuan" class="form-control"><?= $data->syarat_ketentuan; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                  <label for="nilai_tambah">Nilai Tambah :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <textarea name="nilai_tambah" id="nilai_tambah" class="form-control"><?= $data->nilai_tambah; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="gaji_minimal">Gaji Minimal (<small>Boleh Dikosongkan</small>) :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="number" name="gaji_minimal" id="gaji_minimal" class="form-control" placeholder="Masukkan Gaji Minimalnya" min="1" value="<?= $data->gaji_minimal == '0' ? '' : $data->gaji_minimal; ?>">
                    </div>
                  </div>
                </div><div class="col-xs-12 col-sm-6">
                  <label for="gaji_maksimal">Gaji Maksimal (<small>Boleh Dikosongkan</small>) :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="number" name="gaji_maksimal" id="gaji_maksimal" class="form-control" placeholder="Masukkan Gaji Maksimalnya" min="1" value="<?= $data->gaji_maksimal == '0' ? '' : $data->gaji_maksimal; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="bukti">Bukti (<small>Foto Gedung Perusahaan</small>) (<small>Kosongkan Jika Tidak Ingin Diubah</small>)<?= $data->bukti != '' ? " (<small><a href='".base_url('media/lowongan-kerja/bukti/'.$data->bukti)."' target=\"_blank\">Bukti Lama</a></small>)" : ''; ?> :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="file" class="form-control" name="bukti" accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="poster">Poster (<small>Kosongkan Jika Tidak Ingin Diubah</small>)<?= $data->poster != '' ? " (<small><a href='".base_url('media/lowongan-kerja/poster/'.$data->poster)."' target=\"_blank\">Poster Lama</a></small>)" : ''; ?> :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="file" class="form-control" name="poster" accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="kirim_cv_ke">Pengiriman CV Ke :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="kirim_cv_ke" id="kirim_cv_ke" class="form-control" placeholder="Masukkan Kemana CV Harus Dikirim" minlength="2" maxlength="100" value="<?= $data->kirim_cv_ke; ?>" required>
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
                <div class="col-xs-12 col-sm-12">
                  <label for="status"><?= ($data->status === 'menunggu persetujuan' || $data->status === 'tidak disetujui') ? 'Aksi' : 'Status'; ?> :</label>
                  <select class="form-control" name="status" id="status" required>
                    <?php if ($data->status === 'menunggu persetujuan'): ?>
                      <option value="aktif">Setujui</option>
                      <option value="tidak disetujui">Tidak Setujui</option>
                    <?php elseif ($data->status === 'tidak disetujui'): ?>
                      <option value="aktif">Setujui</option>
                    <?php else: ?>
                      <option value="aktif">Aktif</option>
                      <option value="tidak aktif">Tidak Aktif</option>
                    <?php endif; ?>
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
    <script src="<?= base_url('perpustakaan/bsb/plugins/momentjs/moment.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/select2/select2.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/select2/select2_locale_id.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/tinymce/tinymce.min.js'); ?>"></script>
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
        tinymce.init({selector:'textarea',theme:'modern',skin:'custom',plugins:['autosave'],branding:false,menubar:false});
        $('select[name=status]').val("<?= $data->status; ?>").select2();
        $('.form-line').removeClass('focused');
      });

      $('#form-ubah').on('submit',function(e){
        e.preventDefault();

        if ($('#gaji_minimal').val() != '' || $('#gaji_maksimal').val() != ''){
          if (parseInt($('#gaji_minimal').val()) >= parseInt($('#gaji_maksimal').val())){
            notifikasi('red','Gaji minimal harus lebih kecil dari gaji maksimal.');
            return;
          }
        }

        tinymce.triggerSave();
        $('#tombol-ubah').text('SEDANG DIPROSES').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('area-pengurus/lowongan-kerja/ubah/proses'); ?>",
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
              sckt.emit('perbaharui loker',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui riwayat');
              setTimeout(function(){document.location = '../../lowongan-kerja';},1500);
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
        maxDate: "<?= date('Y-m-d',strtotime("+5 month")); ?>",
        clearButton: true,
        weekStart: 1,
        time: false
      });
    </script>
  </body>
</html>
