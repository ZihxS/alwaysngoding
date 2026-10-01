<?php if ($this->session->ang_akses): ?>
  <script>
    <?php if ($key == 'diskusi'): ?>
      setTimeout(function(){
    <?php endif; ?>
    <?php if ($key != 'diskusi'): ?>
      let run = true;
    <?php endif; ?>
    <?php if ($key == 'kontribusi'): ?>
      let kontribusi = false;
    <?php elseif ($key == 'diskusi'): ?>
      if (kontribusi){
        run = false;
      }
    <?php endif; ?>
    if (run){
      $(function(){
        $.ajax({
          url:"<?= site_url('cek-pencapaian'); ?>",
          type:'POST',
          dataType:'JSON',
          data:{'key':'<?= $key; ?>'},
          success:function(r){
            if (typeof r.pencapaian !== 'undefined'){
              if (r.pencapaian != null) {
                <?php if ($key == 'kontribusi'): ?>
                  kontribusi = true;
                <?php endif; ?>
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
            }
          },
          error: function (xhr, ajaxOptions, thrownError){
            <?php if ($_ENV['CONSOLE_CLEAR'] == 'show'): ?> console.clear(); <?php endif; ?>
          }
        });
      });
    }
    <?php if ($key == 'diskusi'): ?>
      }, 1000);
    <?php endif; ?>
  </script>
<?php endif; ?>
