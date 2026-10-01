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
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <title>Donasi untuk Always Ngoding - Always Ngoding</title>
    <?php
      $this->load->view('head', [
        'url' => site_url('donasi'),
        'tidak_ada_deskripsi' => TRUE,
        'sosmed_meta_title' => 'Donasi untuk Always Ngoding',
        'sosmed_meta_desc' => "Donasi untuk menjadikan Always Ngoding semakin kuat dan kece."
      ], FALSE);
    ?>
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.css'); ?>">
    <link id="cssFont" rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/fab/fab.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/website.css'); ?>">
    <?php $this->load->view('web/markas/tema', NULL, FALSE); ?>
    <script type="text/javascript">
      function lCSS(url, rNode, insert='after'){
        var css = document.createElement("link");
        var referenceNode = document.querySelector(`#${rNode}`);

        css.href = url;
        css.rel  = "stylesheet";
        css.type = "text/css";

        if (insert == 'after'){
          referenceNode.parentNode.insertBefore(css, referenceNode.nextSibling);
        }else{
          referenceNode.parentNode.insertBefore(css, referenceNode);
        }
      }

      lCSS("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap", "cssFont");
    </script>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@graph": [
          {
            "@type": "Organization",
            "@id": "<?= site_url(); ?>#organization",
            "name": "Always Ngoding",
            "alternateName": "Always Ngoding - Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia",
            "url": "<?= site_url(); ?>",
            "sameAs": [
              "https://www.facebook.com/alwaysngoding",
              "https://twitter.com/alwaysngoding",
              "https://www.instagram.com/alwaysngoding",
              "https://www.youtube.com/channel/UCO3Tsp5Coo1QLsMLn17Wdug",
              "https://example.test"
            ],
            "logo": {
              "@type": "ImageObject",
              "@id": "<?= site_url(); ?>#logo",
              "url": "<?= base_url("media/website/logo.png"); ?>",
              "contentUrl": "<?= base_url("media/website/logo.png"); ?>",
              "width": 2098,
              "height": 2159,
              "caption": "Always Ngoding - Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia"
            },
            "image": {
              "@id": "<?= site_url(); ?>#logo"
            }
          },
          {
            "@type": "WebSite",
            "@id": "<?= site_url(); ?>#website",
            "url": "<?= site_url(); ?>",
            "name": "Always Ngoding",
            "description": "Donasi untuk Always Ngoding",
            "publisher": {
              "@id": "<?= site_url(); ?>#organization"
            }
          },
          {
            "@type": "BreadcrumbList",
            "@id": "<?= site_url(uri_string()); ?>#breadcrumb",
            "itemListElement": [
              {
                "@type": "ListItem",
                "position": 1,
                "name": "Beranda",
                "item": "<?= site_url(); ?>"
              },
              {
                "@type": "ListItem",
                "position": 2,
                "name": "Donasi untuk Always Ngoding"
              }
            ]
          },
          {
            "@type": "ImageObject",
            "@id": "<?= site_url(uri_string()); ?>#primaryimage",
            "url": "<?= base_url("media/website/banner.png"); ?>",
            "contentUrl": "<?= base_url("media/website/banner.png"); ?>",
            "width": 2560,
            "height": 1440,
            "caption": "Always Ngoding - Belajar Pemrograman atau Koding Gratis Berbahasa Indonesia"
          },
          {
            "@type": "WebPage",
            "@id": "<?= site_url(uri_string()); ?>#webpage",
            "url": "<?= site_url(uri_string()); ?>",
            "name": "Always Ngoding",
            "isPartOf": {
              "@id": "<?= site_url(); ?>#website"
            },
            "primaryImageOfPage": {
              "@id": "<?= site_url(uri_string()); ?>#primaryimage"
            },
            "description": "Donasi untuk Always Ngoding",
            "breadcrumb": {
              "@id": "<?= site_url(uri_string()); ?>#breadcrumb"
            },
            "potentialAction": [
              {
                "@type": "ReadAction",
                "target": [
                  "<?= site_url(uri_string()); ?>"
                ]
              }
            ]
          }
        ]
      }
    </script>
  </head>
  <body>
    <?php $this->load->view('web/markas/noscript', NULL, FALSE); ?>
    <?php $this->load->view('web/markas/navigasi', NULL, FALSE); ?>
    <nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-90">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Donasi untuk Always Ngoding</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <?php if (ang_integration_enabled('midtrans')): ?>
      <form id="formulir-donasi" method="post" action="<?= site_url('donasi/selesai'); ?>">
        <input type="hidden" name="hasil_tipe" id="hasil-tipe" required>
        <input type="hidden" name="hasil_data" id="hasil-data" required>
        <input type="hidden" name="redirect" value="<?= $this->uri->uri_string(); ?>">
      </form>
      <?php endif; ?>
      <div class="container container-donasi">
        <div class="header-v2" style="margin-bottom: 10px;">
          <h1>Donasi untuk Always Ngoding</h1>
        </div>
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <center>
              <img src="<?= base_url('media/website/lazyload.gif'); ?>" data-src="<?= base_url('media/website/donasi.svg'); ?>" alt="Donasi Untuk Always Ngoding" style="width: 300px; height: auto;">
            </center>
            <?php if ($this->session->flashdata('informasi')): ?>
            <center>
              <h4 class="mt-4 mb-0"><?= $this->session->flashdata('informasi'); ?></h4>
              <?php if (@$pembelajaran != NULL): ?>
                <a href="<?= $link; ?>" class="btn btn-outline-secondary btn-sm btn-block mt-2 button-shadow">Lanjut Ke Halaman Yang Di Tuju</a>
              <?php endif; ?>
            </center>
            <?php elseif (!ang_integration_enabled('midtrans')): ?>
              <p class="text-center mt-4">Donasi online sedang tidak tersedia.</p>
              <?php if (@$pembelajaran != NULL): ?>
                <a href="<?= $link; ?>" class="btn btn-outline-secondary btn-sm btn-block mt-2">Lanjut Ke Halaman Yang Di Tuju</a>
              <?php endif; ?>
            <?php else: ?>
              <div class="card custom-card mt-3 mb-3">
                <div class="card-body kotak-donasi">
                  <p><?= @$pembelajaran != NULL ? "<span class='kalimat-donasi'>Halo teman-teman... Minta waktunya sebentar yaa...</span><br>" : ''?><span class='kalimat-donasi'>Always Ngoding selalu berusaha untuk menyediakan konten, komunitas, ilmu-ilmu yang bermanfaat dan berkualitas.</span><br><span class='kalimat-donasi'>Always Ngoding juga selalu berusaha untuk meningkatkan kenyamanan para penggunanya.</span><br>Always Ngoding pun ingin selalu berkontribusi untuk meningkatkan sumber daya programmer di Indonesia.</p>
                  <p><span class='kalimat-donasi'>Dibalik itu semua tentu ada tenaga, waktu dan biaya yang harus kami keluarkan untuk memenuhinya.</span><br><span class='kalimat-donasi'>Oleh karena itu halaman ini kami buat untuk mengumpulkan orang-orang yang ingin berjuang bersama kami.</span><br>Berjuang untuk meningkatkan sumber daya programmer di Indonesia.</p>
                  <p class="mb-0"><span class='kalimat-donasi'>Apakah kalian ingin berdonasi untuk Always Ngoding? Berapapun donasi kalian sangat berarti banyak untuk kami 😉</span><br><span class='kalimat-donasi'>Jika kalian ingin berdonasi, kalian bisa klik tombol <b><q>Saya Ingin Donasi</q></b>.</span><br>Kalian bisa berdonasi melalui:</p>
                  <ul>
                    <li>ATM atau Bank Transfer</li>
                    <li>GoPay atau e-Wallet lainnya (OVO, DANA, TCASH, ShopeePay dan lain-lain)</li>
                  </ul>
                  <p>* <b>Rp10.000 saja sudah sangat berarti banyak untuk kami</b> 😉<?= @$pembelajaran != NULL ? "<br>* Halaman ini akan selalu muncul di bagian awal pada semua kelas pembelajaran, tapi kalian bisa langsung lanjut ke halaman yang ingin kalian tuju dengan cara klik tombol <q>Skip, Lanjut Ke Halaman Yang Di Tuju</q> 😊" : ''; ?></p>
                  <?php if (@$pembelajaran != NULL): ?>
                    <p>Terima kasih atas perhatian dan pengertiannya 😃</p>
                  <?php endif; ?>
                  <p class="mb-0">
                    Kalian bisa melihat semua pahlawan Always Ngoding di halaman berikut: <a href="<?= site_url('tim?aksi=goToPahlawan'); ?>" target="_blank">Semua pahlawan Always Ngoding</a>.
                  </p>
                </div>
              </div>
              <?php if (@$pembelajaran != NULL): ?>
                <div class="row">
                  <div class="col-lg-6">
                    <button id="tombol-buka-modal" class="btn btn-outline-success btn-sm btn-block mb-1 button-shadow">Saya Ingin Donasi</button>
                  </div>
                  <div class="col-lg-6">
                    <a href="<?= $link; ?>" class="btn btn-outline-secondary btn-sm btn-block mb-1 button-shadow">Skip, Lanjut Ke Halaman Yang Di Tuju</a>
                  </div>
                </div>
                <div class="alert alert-danger mt-2">Jika tidak ingin membaca dan jika ingin melanjutkan ke halaman yang kalian tuju silahkan di skip saja yaa 😁</div>
              <?php else: ?>
                <button id="tombol-buka-modal" class="btn btn-outline-success btn-sm btn-block button-shadow">Saya Ingin Donasi</button>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php if (ang_integration_enabled('midtrans') && !$this->session->flashdata('informasi')): ?>
        <div class="modal fade" id="donasiModal" tabindex="-1" role="dialog" aria-labelledby="donasiModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title f-bt" id="donasiModalLabel">Donasi untuk Always Ngoding</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="tutup-donasi">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="isi-donasi">
                <div class="form-froup mb-2">
                  <label for="jumlah-donasi">Masukkan jumlah yang ingin anda donasikan:</label>
                  <input type="number" class="form-control" id="jumlah-donasi" tabindex="1">
                </div>
                <div class="form-froup mb-2">
                  <label for="catatan">Masukkan catatan untuk kami:</label>
                  <textarea id="catatan" class="form-control" rows="3" tabindex="2"></textarea>
                </div>
                <?php if ($this->session->ang_akses): ?>
                  <div class="mb-0">
                    <label for="atas-nama-sendiri" class="mb-0">
                      <input type="radio" name="atas-nama" id="atas-nama-sendiri" value="1" tabindex="3" checked> Donasi atas nama <?= $this->session->ang_nama_pengguna; ?>
                    </label>
                  </div>
                  <div class="mb-0">
                    <label for="atas-nama-anonim" class="mb-0">
                      <input type="radio" name="atas-nama" id="atas-nama-anonim" value="0" tabindex="4"> Donasi atas nama Anonim
                    </label>
                  </div>
                <?php else: ?>
                  <input type="hidden" name="atas-nama" value="0">
                  <p class="mb-0">
                    Donasi anda akan didata atas nama <b><q>Anonim</q></b>, jika anda ingin donasi anda didata atas nama anda silahkan <a href="<?= base_url('masuk'); ?>" class="donasi-masuk">masuk</a> terlebih dahulu.
                  </p>
                <?php endif; ?>
              </div>
              <div class="modal-footer" id="kaki-donasi">
                <button type="button" class="btn btn-secondary btn-block" id="tombol-donasi" tabindex="5">Submit</button>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <?php if (ang_integration_enabled('midtrans') && !$this->session->flashdata('informasi')): ?>
      <script src="<?= html_escape(ang_midtrans_snap_url()); ?>" data-client-key="<?= html_escape(ang_env_value('MIDTRANS_CLIENT_KEY')); ?>"></script>
      <script>
        $(function(){
          $("#jumlah-donasi, #catatan").on('keyup', function (e){
              if (e.key === 'Enter' || e.keyCode === 13){
                $('#tombol-donasi').click();
              }
          });
          $('button#tombol-buka-modal').click(function(){
            $('#donasiModal').modal('show');
            $('body').removeAttr('style');
            $('.modal').css('padding-right',0);
          });
          $('#donasiModal').on('shown.bs.modal', function(){
              $('input#jumlah-donasi').focus();
          });
          $('#tombol-donasi').click(function(){
            const jumlah = $('#jumlah-donasi').val();
            const catatan = $('#catatan').val();
            const an = $('input[name=atas-nama]:checked').val();

            console.log(an);

            if (jumlah == '' || parseInt(jumlah) < 10000){
              alert('Mohon maaf, minimal donasi Rp10.000 yaa. Terima kasih.');
            }else{
              $('#tombol-donasi').attr("disabled", "disabled");
              $.ajax({
                url:`<?= site_url('donasi/token'); ?>`,
                method:'POST',
                cache:false,
                data:{'_jumlah':jumlah,'catatan':catatan,'donatur':an},
                success:function(data){
                  function cR(type,data){
                    data['catatan'] = catatan;
                    data = JSON.stringify(data);
                    $("#hasil-tipe").val(type);
                    $("#hasil-data").val(data);
                  }
                  $('#donasiModal').modal('hide');
                  $('#tombol-donasi').fadeOut(500);
                  snap.pay(data,{
                    skipOrderSummary:true,
                    onSuccess:function(result){
                      cR('success', result);
                      $("#formulir-donasi").submit();
                    },
                    onPending:function(result){
                      cR('pending', result);
                      $("#formulir-donasi").submit();
                    },
                    onError:function(result){
                      cR('error', result);
                      $("#formulir-donasi").submit();
                    },
                    onClose:function(){
                      $('#tombol-donasi').removeAttr("disabled").fadeIn(500);
                      console.log('Popup snap pembayaran di tutup, transaksi pembayaran dibatalkan...');
                    }
                  });
                },
                error:function(respon){
                  swal({
                    title:"Terjadi Kesalahan",
                    text:"Silahkan Hubungi Pengurus Agar Diperbaiki.",
                    type:"error",
                    showCancelButton:false,
                    confirmButtonText:"OK"
                  });
                  <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
                }
              });
            }
          });
        });
      </script>
    <?php endif; ?>
  </body>
</html>
