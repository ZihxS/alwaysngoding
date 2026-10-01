<script>
  $(function(){
    let isian = false;
    <?php if ($r): ?>
      $('#arrRangkaian').val(arrRangkaian);
    <?php endif; ?>
    <?php if ($e): ?>
      $('#j_1').focus();
      isian = true;
    <?php endif; ?>
    $('#form-jawab').submit(function(e){
      e.preventDefault();
      $(`input[name*=j_]`).removeClass('salah');
      $('#kirim-jawaban').html('<i class="fas fa-spinner fa-spin"></i>').blur();
      $.ajax({
        url:"<?= site_url("belajar-{$bahasa}/teori/jawab"); ?>",
        type:"POST",
        data:$(this).serialize(),
        dataType:'JSON',
        success:function(r){
          if(r.s){
            if (typeof r.pencapaian !== 'undefined'){
              $('#pencapaianModal').modal('show');
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
            }
            swal({
              title:"Jawaban benar",
              text:"Selamat, jawaban anda benar...\nAnda telah menyelesaikan modul ini ^_^",
              type:"success",
              showCancelButton:false,
              confirmButtonClass:"btn-success",
              confirmButtonText:"Kerja yang bagus",
              closeOnConfirm:true
            });
            sckt.emit('perbaharui riwayat');
            $('#selanjutnya').html(r.ls);
          }else{
            if (r.kesalahan != null){
              $(`input[name=${r.kesalahan[0]}]`).focus();
              $.each(r.kesalahan, function(i, v){
                $(`input[name=${v}]`).addClass('salah');
              });
            }else{
              if (isian){
                $('#j_1').focus();
              }
            }
            swal({
              title:"Jawaban salah",
              text: r.ss == 'u' ? "Maaf, jawaban anda salah\nPoin belajar anda berkurang 1\nSilahkan coba lagi..." : "Maaf, jawaban anda salah...",
              type:"error",
              showCancelButton:false,
              confirmButtonClass:"btn-danger",
              confirmButtonText:"Oke, Maaf",
              closeOnConfirm:true
            });
          }
          $('#kirim-jawaban').html('<i class="fas fa-paper-plane"></i>');
          sckt.emit('update token',{token:r.ctoken,ip:__ip__,np:__np__});
        }
      });
    });
  });
  <?php if ($r): ?>
    setupSlip(document.getElementById('rangkaian'));
  <?php endif; ?>
  sckt.on('update token',function(data){
    if (data.token !== null && __ip__ === data.ip && __np__ === data.np){
      $('#ctoken').val(data.token);
    }
  });
</script>
