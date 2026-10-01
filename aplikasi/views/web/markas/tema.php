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