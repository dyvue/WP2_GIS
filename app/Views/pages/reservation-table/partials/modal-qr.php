<div class="modal fade" id="modal-basic-qr" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <form id="form-modal" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-basic-qr-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <img id="modal-basic-qr-img" src="" class="d-block rounded object-fit-cover modal-basic-qr-show cursor-pointer">
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary d-flex gap-1 justify-content-center align-items-center w-100 mb-3 text-white" target="_blank" onclick="window.print()">
          <i class="bx bxs-printer"></i> Print
        </a>
      </div>
    </form>
  </div>
</div>