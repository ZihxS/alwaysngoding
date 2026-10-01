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
    <title>Notifikasi untuk Anda - Always Ngoding</title>
    <?php $this->load->view('head', ['url' => site_url('notifikasi')], FALSE); ?>
    <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
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
  </head>
  <body>
    <?php $this->load->view('web/markas/noscript', NULL, FALSE); ?>
    <?php $this->load->view('web/markas/navigasi', NULL, FALSE); ?>
    <nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-90">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Notifikasi untuk Anda</li>
        </ol>
      </div>
    </nav>
    <main class="web-main">
      <div class="container container-notifikasi">
        <div class="header-v2">
          <h1>Notifikasi untuk Anda</h1>
        </div>
        <hr>
        <?php if (count($notifikasi_awal) == 0): ?>
          <h3 class="text-center f-bt mt-5 mb-5">Saat ini belum ada notifikasi untuk anda <?= $this->session->ang_nama_pengguna; ?></h3>
        <?php else: ?>
          <div id="notifikasi">
            <?php foreach ($notifikasi_awal as $notif): ?>
              <div class="card mb-3 custom-card-2">
                <div class="card-body">
                  <p class="mb-0 konten-notifikasi"><?= $notif->konten; ?></p>
                  <span class="waktu-notifikasi text-secondary"><?= $notif->tanggal_waktu; ?></span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if ($jumlah > 50): ?>
            <button type="button" class="btn btn-outline-secondary btn-sm rounded-lg btn-custom-click btn-block button-shadow" id="lihat-lebih-banyak">Lihat Lebih Banyak</button>
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <a href="javascript:void(0);" class="back-to-top" style="display: none;">
        <center>
          <i class="fas fa-arrow-up"></i>
        </center>
      </a>
    </main>
    <?php $this->load->view('web/markas/kaki', NULL, FALSE); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
		<script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
    <script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
    <?php if (count($notifikasi_awal) != 0): ?>
      <script>
				const __ip__ = "<?= $this->ang->ambil_alamat_ip(); ?>";
				const __np__ = "<?= $this->session->ang_nama_pengguna; ?>";

        let toTop = false;
        let batasUntukToTop = 1400;

				<?php if ($_SERVER['CI_ENV'] == 'development'): ?>
					let sckt = io.connect(<?= json_encode($_SERVER['ANG_SOCKET'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
				<?php else: ?>
					<?php if ($_SERVER['ANG_SOCKET'] != $_ENV['ANG_SOCKET_TRANSPORT_POLLING_URL']): ?>
						let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`);
					<?php else: ?>
						let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`, {transports: ['polling']});
					<?php endif; ?>
				<?php endif; ?>

				let token = "<?= $this->security->get_csrf_hash(); ?>";

        $(window).scroll(function(){
          if ($(window).scrollTop() >= batasUntukToTop){
            if (toTop == false){
              $('a.back-to-top').fadeIn();
              toTop = true;
            }
          }else{
            if (toTop == true){
              $('a.back-to-top').fadeOut();
              toTop = false;
            }
          }
        });

        $('a.back-to-top').click(function(){
          $('html, body').animate({scrollTop: 0}, 1000);
        });

        $(function(){
          let i = 50, j = <?= $jumlah; ?>;

          $('#lihat-lebih-banyak').click(function(){
            let self = this;

            $(self).html('<i class="fas fa-spinner fa-spin"></i> Mohon tunggu...').attr('disabled','disabled');

            $.ajax({
              url:"<?= site_url('notifikasi/lihat-lebih-banyak'); ?>",
              type:'POST',
              data:{index:i,<?= $this->security->get_csrf_token_name(); ?>:token,jumlah:j},
              dataType:'JSON',
              success:function(respon){
                i += 50; token = respon.ctoken;

                $('#notifikasi').append(respon.html);

                if (i >= j){
                  $(self).remove();
                }else{
                  $(self).text('Lihat Lebih Banyak').removeAttr('disabled');
                }

								if (__np__ != "") {
									sckt.emit('update token', {
										"token": token,
										"ip": __ip__,
										"np": __np__
									});
								}
              }
            });
          });
        });

				sckt.on('update token',function(data){
					if (data.token !== null && __ip__ === data.ip && __np__ === data.np){
						token = data.token;
					}
				});
      </script>
    <?php endif; ?>
  </body>
</html>
