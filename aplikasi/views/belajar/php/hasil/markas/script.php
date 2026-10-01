<script>let hasilKode = true;</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/lib/codemirror.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/edit/closebrackets.js"'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/selection/active-line.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/edit/matchbrackets.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/display/fullscreen.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/foldcode.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/foldgutter.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/brace-fold.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/xml-fold.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/indent-fold.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/markdown-fold.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/comment-fold.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/hint/show-hint.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/mode/clike/clike.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/mode/php/php.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
<script>
  const __ip__ = "<?= $this->ang->ambil_alamat_ip(); ?>";
  const __np__ = "<?= $this->session->ang_nama_pengguna; ?>";
  <?php if ($_SERVER['CI_ENV'] == 'development'): ?>
  let sckt = io.connect(<?= json_encode($_SERVER['ANG_SOCKET'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
  <?php else: ?>
		<?php if ($_SERVER['ANG_SOCKET'] != $_ENV['ANG_SOCKET_TRANSPORT_POLLING_URL']): ?>
			let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`);
		<?php else: ?>
			let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`, {transports: ['polling']});
		<?php endif; ?>
  <?php endif; ?>

  let salehSUKAkarmila = '<?= $this->security->get_csrf_hash(); ?>', eksekusi = false;

  $(function(){
    var code = CodeMirror.fromTextArea(document.getElementById("code"), {
      mode: "text/x-php",
      theme: "monokai",
      lineNumbers: true,
      autoCloseBrackets: true,
      styleActiveLine: true,
      matchBrackets: true,
      lineWrapping: true,
      extraKeys: {
        "Ctrl-Space": "autocomplete",
        "Ctrl-Enter": function(_) {
          $("#eksekusi").click();
        },
        "Ctrl-Q": function(_) {
          e.foldCode(e.getCursor());
        },
        "F11": function(_) {
          e.setOption("fullScreen", !e.getOption("fullScreen"));
        },
        "Esc": function(_) {
          if (e.getOption("fullScreen")) e.setOption("fullScreen", false);
        }
      },
      foldGutter: true,
      gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"]
    });

    function updatePreview(output) {
      var previewFrame = document.getElementById('preview');
      var preview = previewFrame.contentDocument || previewFrame.contentWindow.document;
      preview.open();
      preview.write(output);
      preview.close();
    }

    <?php if (ang_integration_enabled('glot')): ?>
    $('#eksekusi').click(function(){
      if (!eksekusi) {
        let self = this;
        eksekusi = true;
        updatePreview("Mohon tunggu, kode sedang dieksekusi...");
        $(self).html('<i class="fas fa-spinner fa-spin"></i>').addClass('disabled', 'disabled');
        $.ajax({
          url:"<?= site_url("belajar-php/eksekusi"); ?>",
          type:'POST',
          data:{<?= $this->security->get_csrf_token_name(); ?>:salehSUKAkarmila, konten:code.getValue()},
          dataType:'JSON',
          success:function(r){
            if (typeof r.message != "undefined") updatePreview(`Kode yang anda jalankan error dan tidak bisa ditampilkan di kotak output.<br><br>Pesan error: ${r.message.replace(/glot/g, "php")}.`);
            else if (r.stdout != "") updatePreview(r.stdout.replace(/\n/g, "<br>").replace(/glot/g, "php"));
            else updatePreview(r.stderr.replace(/glot/g, "php"));
            eksekusi = false;
            sckt.emit('update token',{token:r.ctoken,ip:__ip__,np:__np__});
            $(self).html('EKSEKUSI KODE').removeClass('disabled');
          }
        });
      }
    });
    <?php endif; ?>
  });

  sckt.on('update token',function(data){
    if (data.token !== null && __ip__ === data.ip && __np__ === data.np){
      salehSUKAkarmila = data.token;
    }
  });
</script>
