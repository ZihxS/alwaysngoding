<script>
  $(function(){
    $.ajax({
      url:"<?= site_url($url); ?>",
      type:'POST',
      dataType:'JSON',
      data:{<?= $this->security->get_csrf_token_name(); ?>:'<?= $this->security->get_csrf_hash(); ?>',msalehscintakarmilasriwulan:<?= $modul; ?>,karmilasriwulancintamsalehs:<?= $this->uri->segment(5); ?>},
      success:function(r){
        if (typeof r.pencapaian !== 'undefined'){
          $('#pencapaianModal').modal('show');
          $('body').removeAttr('style');
          $('.modal').css('padding-right',0);
          $('#isi-pencapaian').html(`
            <img src="<?= base_url('media/pencapaian/'); ?>${r.pencapaian.gambar}" alt="${r.pencapaian.nama_pencapaian}" class="pencapaian">
            <hr>
            <p>Anda telah meraih pencapaian baru, selamat atas pencapaiannya 🤝</p>
            <p class="mb-0">Detail Pencapaian:</p>
            <ul class="mb-0">
              <li>Pencapaian: ${r.pencapaian.nama_pencapaian}.</li>
            </ul>
          `);
        }
        sckt.emit('update token',{token:r.ctoken,ip:__ip__,np:__np__});
      }
    });
  });
</script>
