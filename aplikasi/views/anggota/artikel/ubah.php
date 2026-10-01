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
  $jenis_kelaminnya = $this->pengguna->ambil_jenis_kelamin($nama_penggunanya) != NULL ? strtolower($this->pengguna->ambil_jenis_kelamin($nama_penggunanya)) : 'kosong';
  $foto_anggotanya  = $this->pengguna->ambil_foto($nama_penggunanya);
  $foto_anggotanya  = $foto_anggotanya !== NULL ? $foto_anggotanya : "{$jenis_kelaminnya}.png";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Ubah artikel - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url("anggota/artikel/ubah/{$data->id_artikel}"), 'anggota' => TRUE], FALSE); ?>
    <link href="<?= base_url('perpustakaan/aplikasi/material-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/animate-css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/tokenfield/css/bootstrap-tokenfield.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/tokenfield/css/tokenfield-typeahead.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/themes/all-themes.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/select2/select2.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/select2/select2-bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/app.css'); ?>" rel="stylesheet">
  </head>
  <body class="theme-red">
    <?php $this->load->view('anggota/markas/atas'); ?>
    <section>
      <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
          <div class="image">
            <img src="<?= base_url('media/foto-pengguna/'.$foto_anggotanya); ?>" width="48" height="48" alt="Foto Anggota">
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
                  <a href="<?= site_url('anggota/data-diri'); ?>"><i class="material-icons">person</i>Data Diri</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="<?= site_url('anggota/keluar'); ?>"><i class="material-icons">input</i>Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php $this->load->view('anggota/markas/menu'); ?>
      </aside>
      <?php $this->load->view('anggota/markas/tema'); ?>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <h2 class="judul-halaman">UBAH ARTIKEL</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <ol class="breadcrumb pull-right">
                <li>
                  <a href="<?= site_url('anggota/artikel'); ?>">
                    <i class="material-icons">event_note</i> Artikel
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
              <input type="hidden" name="id_artikel" value="<?= $data->id_artikel; ?>">
              <input type="hidden" name="judul_lama" value="<?= $data->judul; ?>">
              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <label for="judul">Judul :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Artikel" minlength="3" maxlength="100" value="<?= $data->judul; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <label for="kategori">Kategori :</label>
                  <select class="form-control" name="kategori" id="kategori" required>
                    <?php foreach ($this->kategori->ambil_data() as $kategori): ?>
                      <option value="<?= $kategori->kategori; ?>"><?= $kategori->kategori; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-xs-12 col-sm-12 mt-xs-20">
                  <label for="tags">Tags/Label (<small>Maksimal 10</small>) :</label>
                  <div class="form-group demo-tagsinput-area">
                    <div class="form-line">
                      <input type="text" id="tags" class="form-control" name="tags" placeholder="Masukkan Tags (Pisah Dengan Koma)" value="<?= "{$data->tags},"; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                  <label for="isi">Isi Artikel :</label>
                  <div class="form-group">
                    <div class="form-line">
                      <textarea name="isi" id="isi" class="form-control"><?= $data->isi; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                  <label for="status">Aksi :</label>
                  <select class="form-control" name="status" id="status" required>
                    <option value="konsep">SIMPAN SEBAGAI KONSEP</option>
                    <option value="menunggu persetujuan">AJUKAN PEMBAHARUAN ARTIKEL</option>
                  </select>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary btn-block waves-effect m-t-5" id="tombol-ubah">PROSES</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/tokenfield/bootstrap-tokenfield.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
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
        tinymce.init({
          selector:'#isi',
          theme:'modern',
          skin:'custom',
          plugins:[
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace visualblocks visualchars insertdatetime media nonbreaking',
            'table contextmenu directionality emoticons paste textcolor codesample fullscreen'
          ],
          toolbar1:'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
          toolbar2:'link unlink anchor | image media codesample | forecolor backcolor | print preview fullscreen',
          codesample_languages:[
            {text:'html',value:'markup'},
            {text:'javascript',value:'javascript'},
            {text:'typescript',value:'typescript'},
            {text:'json',value:'json'},
            {text:'css',value:'css'},
            {text:'less',value:'less'},
            {text:'sass',value:'scss'},
            {text:'php',value:'php'},
            {text:'sql',value:'sql'},
            {text:'ruby',value:'ruby'},
            {text:'python',value:'python'},
            {text:'java',value:'java'},
            {text:'c',value:'c'},
            {text:'c#',value:'csharp'},
            {text:'c++',value:'cpp'}
          ],
          paste_as_text: true,
          image_advtab:true,
          branding:false,
          relative_urls:false,
          remove_script_host:false,
          height:300,
          codesample_dialog_width:1000,
          codesample_dialog_height:500,
          plugin_preview_width:1000
        });
        $('#kategori').val("<?= $data->kategori; ?>").select2();
        $('#status').val("<?= $data->status; ?>").select2();
        $('#tags').tokenfield({limit:10});
        $('.form-line').removeClass('focused');
      });

      $('#form-ubah').on('submit',function(e){
        e.preventDefault();
        tinymce.triggerSave();
        $('#tombol-ubah').text('SEDANG DIPROSES').attr('disabled','disabled');
        $.ajax({
          url:"<?= site_url('anggota/artikel/ubah/proses'); ?>",
          type:'POST',
          data:$(this).serialize(),
          dataType:'JSON',
          success:function(r){
            if (r.sukses){
              $('#tombol-ubah').text('UBAH BERHASIL');
              notifikasi('green',r.pesan);
              notifikasi('green','Sedang mengarahkan halaman.');
              sckt.emit('perbaharui artikel',{token:r.ctoken,np:__np__});
              sckt.emit('perbaharui riwayat');
              setTimeout(function(){document.location = '../../artikel';},1500);
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

      $('#tags').on('tokenfield:createtoken',function(e){
        var tokenEksis = $(this).tokenfield('getTokens');
        $.each(tokenEksis, function(index,token){
          if (token.value === e.attrs.value){
            e.preventDefault();
            $('.token-input').val('');
            notifikasi('red',"Anda sudah menginput tags \""+token.value+"\" !");
          }
        });
      });
    </script>
  </body>
</html>
