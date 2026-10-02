<head>
  <title>Hasil JavaScript - Always Ngoding</title>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="Muhammad Saleh Solahudin, m.saleh.solahudin@gmail.com" name="author">
  <meta content="Muhammad Saleh Solahudin" name="owner">
  <meta content="#272822" name="theme-color">
  <meta content="#272822" name="msapplication-navbutton-color">
  <meta content="#272822" name="msapplication-TileColor">
  <meta content="#272822" name="apple-mobile-web-app-status-bar-style">
  <link rel="icon" href="<?= base_url('media/website/logo.png'); ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/font.css'); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/fontawesome/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/animate.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/codemirror/lib/codemirror.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/codemirror/addon/fold/foldgutter.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/codemirror/addon/display/fullscreen.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/codemirror/theme/monokai.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/codemirror/theme/yonce.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/codemirror/addon/hint/show-hint.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('perpustakaan/aplikasi/website.css'); ?>">
  <?php $this->load->view('seo/analytics'); ?>
  <script>
    let hideungMode = false;

    if (localStorage.getItem('temaAlwaysNgoding') == 'hideung'){
      hideungMode = true;
    }

    setHideungMode(hideungMode);

    function setHideungMode(jikaHideung){
      if (jikaHideung){
        document.getElementsByTagName('meta')["theme-color"].content = "#2D2D2D";
        document.getElementsByTagName('meta')["msapplication-navbutton-color"].content = "#2D2D2D";
        document.getElementsByTagName('meta')["msapplication-TileColor"].content = "#2D2D2D";
        document.getElementsByTagName('meta')["apple-mobile-web-app-status-bar-style"].content = "#2D2D2D";
        document.documentElement.setAttribute("data-theme", "hideung");
        localStorage.setItem('temaAlwaysNgoding', 'hideung');
      }else{
        document.documentElement.setAttribute("data-theme", "terang");
        document.getElementsByTagName('meta')["theme-color"].content = "#DC3545";
        document.getElementsByTagName('meta')["msapplication-navbutton-color"].content = "#DC3545";
        document.getElementsByTagName('meta')["msapplication-TileColor"].content = "#DC3545";
        document.getElementsByTagName('meta')["apple-mobile-web-app-status-bar-style"].content = "#DC3545";
        localStorage.removeItem('temaAlwaysNgoding');
      }
      updateTema(jikaHideung);
      hideungMode = jikaHideung;
    }

    function updateTema(jikaHideung){}
  </script>
</head>
