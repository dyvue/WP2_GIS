<div class="modal fade" id="modal-basic-form" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form id="form-modal" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-basic-form-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="form-modal-payment-method" class="form-label">Metode Pembayaran <i class="text-danger">*</i></label>
            <select class="form-select" id="form-payment-method" name="form-payment-method" required>
                <option value="">&mdash;</option>
                <?php foreach ($paymentMethods as $item) : ?>
                  <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                <?php endforeach; ?>
              </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>