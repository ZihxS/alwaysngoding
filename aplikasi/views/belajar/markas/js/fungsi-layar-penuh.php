<script>
  $(function(){
    let kotakFull = false;
    $('.button-min-max').click(function(){
      let self = this;
      if (kotakFull){
        $(self).html(`<i class="fa fa-expand fa-lg" aria-hidden="true"></i>`);
        $('.kotak-belajar').removeClass('fullscreen');
        $('.kotak-belajar, .isi-teori').removeAttr('style');
        /* $('html, body').animate({scrollTop: $('#__init__').offset().top-navOuterHeight}, 1000); */
      }else{
        $(self).html(`<i class="fa fa-window-close fa-lg" aria-hidden="true"></i>`);
        $('.kotak-belajar').addClass('fullscreen');
        $('.kotak-belajar, .isi-teori').css({'height':$(document).height(),'margin-bottom':'0px'});
        $('html, body').animate({scrollTop: 0}, 1000);
      }
      kotakFull = !kotakFull;
    });
  });
</script>