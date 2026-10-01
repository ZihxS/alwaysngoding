<?php if ($this->session->ang_akses): ?>
  <div class="modal fade" id="pencapaianModal" tabindex="-1" role="dialog" aria-labelledby="pencapaianModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title f-bt" id="pencapaianModalLabel">Pencapaian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="tutup-pencapaian">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="isi-pencapaian"></div>
        <div class="modal-footer" id="kaki-pencapaian">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke, mantap</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>