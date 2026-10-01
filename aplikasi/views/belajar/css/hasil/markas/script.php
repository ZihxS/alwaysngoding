<script>let hasilKode = true;</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/lib/codemirror.js'); ?>"></script>
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
<script src="<?= base_url('perpustakaan/codemirror/addon/edit/closetag.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/fold/xml-fold.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/hint/show-hint.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/hint/xml-hint.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/addon/hint/html-hint.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/mode/xml/xml.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/mode/javascript/javascript.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/mode/css/css.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/codemirror/mode/htmlmixed/htmlmixed.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
<script>
  $(function(){
    var delay;
    var code = CodeMirror.fromTextArea(document.getElementById("code"), {
      mode: "text/html",
      theme: "monokai",
      autoCloseTags: true,
      lineNumbers: true,
      styleActiveLine: true,
      matchBrackets: true,
      lineWrapping: true,
      extraKeys: {
        "Ctrl-Space": "autocomplete",
        "Ctrl-Q": function(e) {
          e.foldCode(e.getCursor());
        },
        "F11": function(e) {
          e.setOption("fullScreen", !e.getOption("fullScreen"));
        },
        "Esc": function(e) {
          if (e.getOption("fullScreen")) e.setOption("fullScreen", false);
        }
      },
      foldGutter: true,
      gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"]
    });

    code.on("change", function() {
      clearTimeout(delay);
      delay = setTimeout(updatePreview, 300);
    });

    function updatePreview() {
      var previewFrame = document.getElementById('preview');
      var preview = previewFrame.contentDocument || previewFrame.contentWindow.document;
      preview.open();
      preview.write(code.getValue());
      preview.close();
    }
    setTimeout(updatePreview, 300);
  });
</script>
