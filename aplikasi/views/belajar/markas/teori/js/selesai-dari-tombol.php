<script>
  let salehSUKAkarmila = '<?= $this->security->get_csrf_hash(); ?>';
  $(function(){
    $('#tombol-selesai').click(function(){
      let self = this;
      $(self).html('<i class="fas fa-spinner fa-spin"></i>');
      $.ajax({
        url:"<?= site_url("belajar-{$bahasa}/teori/segarkan"); ?>",
        type:'POST',
        dataType:'JSON',
        data:{<?= $this->security->get_csrf_token_name(); ?>:salehSUKAkarmila,msalehscintakarmilasriwulan:<?= $modul_bagian; ?>,karmilasriwulancintamsalehs:<?= $this->uri->segment(5); ?>},
        success:function(r){
          $(self).html('Selesai');
          if (typeof r.pencapaian !== 'undefined') {
            $('#pencapaianModal').modal({show: true,backdrop: 'static',keyboard: false});
            $('body').removeAttr('style');
            $('.modal').css('padding-right',0);
            $('#isi-pencapaian').html(`
              <img src="<?= base_url('media/pencapaian/'); ?>${r.pencapaian.gambar}" alt="${r.pencapaian.nama_pencapaian}" class="pencapaian">
              <hr>
              <p>Anda telah meraih pencapaian baru, selamat atas pencapaiannya ^_^</p>
              <p class="mb-0">Detail pencapaian:</p>
              <ul class="mb-0">
                <li>Nama pencapaian: ${r.pencapaian.nama_pencapaian}</li>
              </ul>
            `);
            $('#kaki-pencapaian').html(`
              <a href="<?= site_url("belajar-{$bahasa}/teori"); ?>" class="btn btn-secondary">Oke, mantap</a>
            `);
            $('#tutup-pencapaian').remove();
            swal({
              title:"Informasi",
              text:"Selamat anda telah menyelesaikan modul\n'<?= $nama_modul; ?>'",
              type:"success",
              showCancelButton:false,
              confirmButtonClass:"btn-success",
              confirmButtonText:"Mantap",
              closeOnConfirm:true
            });
          } else {
            swal({
              title:"Informasi",
              text:"Selamat anda telah menyelesaikan modul\n'<?= $nama_modul; ?>'",
              type:"success",
              showCancelButton:false,
              showConfirmButton:false
            });
            setTimeout(function(){document.location = "<?= site_url("belajar-{$bahasa}/teori"); ?>";},2500);
          }
          sckt.emit('update token',{token:r.ctoken,ip:__ip__,np:__np__});
        }
      });
    });
  });
  sckt.on('update token',function(data){
    if (data.token !== null && __ip__ === data.ip && __np__ === data.np){
      salehSUKAkarmila = data.token;
    }
  });
</script>
