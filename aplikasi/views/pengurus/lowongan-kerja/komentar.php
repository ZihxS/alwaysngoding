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
    <link href="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/responsive.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/bsb/css/themes/all-themes.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>" rel="stylesheet">
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
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
              <h2 class="judul-halaman">KOMENTAR LOWONGAN KERJA</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
              <ol class="breadcrumb pull-right">
                <li>
                  <a href="<?= site_url('area-pengurus/lowongan-kerja'); ?>">
                    <i class="material-icons">business_center</i> Lowongan Kerja
                  </a>
                </li>
                <li>
                  Komentar
                </li>
              </ol>
            </div>
          </div>
        </div>
        <?php if ($this->agent->is_mobile()): ?>
          <div class="alert bg-teal" role="alert">
            Kami menyarankan anda untuk me-rotate atau memiringkan device anda agar lebih banyak kolom di tabel yang bisa terlihat.
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="header">
            <h2>DATA KOMENTAR</h2>
          </div>
          <div class="body table-responsive">
            <table class="table table-striped table-bordered table-hover" id="data-komentar" width="100%">
              <thead>
                <th width="5%">No.</th>
                <th>ID Lowongan Kerja</th>
                <th>Pengguna</th>
                <th>Diblok?</th>
                <th>Aksi</th>
              </thead>
            </table>
          </div>
        </div>
        <div class="card">
          <div class="header">
            <h2>DATA SUKA</h2>
          </div>
          <div class="body table-responsive">
            <table class="table table-striped table-bordered table-hover" id="data-suka" width="100%">
              <thead>
                <th width="5%">No.</th>
                <th>ID Komentar LoKer</th>
                <th>Pengguna</th>
                <th>Waktu</th>
                <th>Aksi</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/node-waves/waves.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/jquery-datatable/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/admin.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/js/ang.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <script>
      let ctoken = "<?= $this->security->get_csrf_hash(); ?>";
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
        let tabel_komentar = $('#data-komentar').DataTable({
          'processing':true,
          'serverSide':true,
          'order':[],
          'ajax':{
            'url':"<?= site_url('area-pengurus/lowongan-kerja/komentar/data'); ?>",
            'type':'POST',
            error: function(jqXHR,textStatus,errorThrown){
              <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
            }
          },
          'columnDefs':[{
            'targets':[0,4],
            'orderable':false
          }],
          'language':{
           'info':'Menampilkan _START_ ~ _END_ (dari _TOTAL_ data)',
            'paginate':{
              'previous':'Sebelumnya',
              'next':'Selanjutnya'
            },
            'infoEmpty':'Tidak ada data untuk ditampilkan',
            'lengthMenu':'Tampilkan _MENU_ data',
            'search':'Pencarian :',
            'zeroRecords':'<center>Tidak ada data untuk ditampilkan</center>',
            'infoFiltered':' \(disaring dari _MAX_ data)',
            'searchPlaceholder':'Cari data disini',
            'loadingRecords':'',
            'processing':''
          },
          'responsive':true,
          'autoWidth':true,
          "searchDelay":500,
          "drawCallback":function(){
            tooltip();
           }
        });

        sckt.on('perbaharui komentar loker',function(data){
          if (data.token !== null && ctoken != data.token && __np__ === data.np){
           ctoken = data.token;
          }
          tabel_komentar.ajax.reload(null, false);
        });

        let tabel_suka = $('#data-suka').DataTable({
          'processing':true,
          'serverSide':true,
          'order':[],
          'ajax':{
            'url':"<?= site_url('area-pengurus/lowongan-kerja/komentar/suka/data'); ?>",
            'type':'POST',
            error: function(jqXHR,textStatus,errorThrown){
              <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
            }
          },
          'columnDefs':[{
            'targets':[0,4],
            'orderable':false
          }],
          'language':{
           'info':'Menampilkan _START_ ~ _END_ (dari _TOTAL_ data)',
            'paginate':{
              'previous':'Sebelumnya',
              'next':'Selanjutnya'
            },
            'infoEmpty':'Tidak ada data untuk ditampilkan',
            'lengthMenu':'Tampilkan _MENU_ data',
            'search':'Pencarian :',
            'zeroRecords':'<center>Tidak ada data untuk ditampilkan</center>',
            'infoFiltered':' \(disaring dari _MAX_ data)',
            'searchPlaceholder':'Cari data disini',
            'loadingRecords':'',
            'processing':''
          },
          'responsive':true,
          'autoWidth':true,
          "searchDelay":500,
          "drawCallback":function(){
            tooltip();
           }
        });

        sckt.on('perbaharui data suka komentar loker',function(data){
          if (data.token !== null && ctoken != data.token && __np__ === data.np){
           ctoken = data.token;
          }
          tabel_suka.ajax.reload(null, false);
        });
      });

      function blok_komentar(id_komentar){
        swal({
          title:"Apakah anda yakin??",
          text:"Yakin ingin memblokir komentar lowongan kerja ini??",
          type:"warning",
          showCancelButton:true,
          confirmButtonColor:"#DD6B55",
          confirmButtonText:"Ya, Yakin!",
          cancelButtonText:"Tidak jadi!",
          closeOnConfirm:false,
          showLoaderOnConfirm:true,
          closeOnCancel:true
        },function(setuju){
          if (setuju){
            $.ajax({
              url:"<?= site_url('area-pengurus/lowongan-kerja/komentar/blok'); ?>",
              type:'POST',
              data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_komentar":id_komentar},
              dataType:'JSON',
              success:function(r){
                if (r.sukses){
                  sckt.emit('perbaharui komentar loker',{token:r.ctoken,np:__np__});
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"success",
                    showCancelButton:false,
                    confirmButtonText:"Mantap"
                  });
                }else{
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  ctoken = r.ctoken;
                }
              },
              error:function(respon){
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
          }
        });
      }

      function unblok_komentar(id_komentar){
        swal({
          title:"Apakah anda yakin??",
          text:"Yakin ingin mengunblokir komentar lowongan kerja ini??",
          type:"warning",
          showCancelButton:true,
          confirmButtonColor:"#DD6B55",
          confirmButtonText:"Ya, Yakin!",
          cancelButtonText:"Tidak jadi!",
          closeOnConfirm:false,
          showLoaderOnConfirm:true,
          closeOnCancel:true
        },function(setuju){
          if (setuju){
            $.ajax({
              url:"<?= site_url('area-pengurus/lowongan-kerja/komentar/unblok'); ?>",
              type:'POST',
              data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_komentar":id_komentar},
              dataType:'JSON',
              success:function(r){
                if (r.sukses){
                  sckt.emit('perbaharui komentar loker',{token:r.ctoken,np:__np__});
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"success",
                    showCancelButton:false,
                    confirmButtonText:"Mantap"
                  });
                }else{
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  ctoken = r.ctoken;
                }
              },
              error:function(respon){
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
          }
        });
      }

      function hapus_komentar(id_komentar){
        swal({
          title:"Apakah anda yakin??",
          text:"Yakin ingin menghapus komentar lowongan kerja ini??",
          type:"warning",
          showCancelButton:true,
          confirmButtonColor:"#DD6B55",
          confirmButtonText:"Ya, Yakin!",
          cancelButtonText:"Tidak jadi!",
          closeOnConfirm:false,
          showLoaderOnConfirm:true,
          closeOnCancel:true
        },function(setuju){
          if (setuju){
            $.ajax({
              url:"<?= site_url('area-pengurus/lowongan-kerja/komentar/hapus'); ?>",
              type:'POST',
              data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_komentar":id_komentar},
              dataType:'JSON',
              success:function(r){
                if (r.sukses){
                  sckt.emit('perbaharui komentar loker',{token:r.ctoken,np:__np__});
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"success",
                    showCancelButton:false,
                    confirmButtonText:"Mantap"
                  });
                }else{
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  ctoken = r.ctoken;
                }
              },
              error:function(respon){
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
          }
        });
      }

      function hapus_data_suka(id_data_suka){
        swal({
          title:"Apakah anda yakin??",
          text:"Yakin ingin menghapus data suka komentar lowongan kerja ini??",
          type:"warning",
          showCancelButton:true,
          confirmButtonColor:"#DD6B55",
          confirmButtonText:"Ya, Yakin!",
          cancelButtonText:"Tidak jadi!",
          closeOnConfirm:false,
          showLoaderOnConfirm:true,
          closeOnCancel:true
        },function(setuju){
          if (setuju){
            $.ajax({
              url:"<?= site_url('area-pengurus/lowongan-kerja/komentar/suka/hapus'); ?>",
              type:'POST',
              data:{"<?= $this->security->get_csrf_token_name(); ?>":ctoken,"id_data_suka":id_data_suka},
              dataType:'JSON',
              success:function(r){
                if (r.sukses){
                  sckt.emit('perbaharui data suka komentar loker',{token:r.ctoken,np:__np__});
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"success",
                    showCancelButton:false,
                    confirmButtonText:"Mantap"
                  });
                }else{
                  swal({
                    title:"Informasi",
                    text:r.pesan,
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  ctoken = r.ctoken;
                }
              },
              error:function(respon){
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
          }
        });
      }
    </script>
  </body>
</html>
