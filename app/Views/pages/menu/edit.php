<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Daftar Menu<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Daftar Menu /</span> Edit</h4>

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">
				<form action="<?= site_url('master/menus/update/'.$data['id']) ?>" method="POST" enctype="multipart/form-data">
          <h5 class="card-header">Upload Foto</h5>
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
							<img src="/img/menus/<?= $data['photo'] ? $data['photo'] : 'default.jpg' ?>" alt="user-avatar" class="d-block rounded object-fit-cover" height="100" width="100" id="form-photo-view" />
              <div class="button-wrapper">
                <input type="file" id="upload" class="form-control" accept="image/png, image/jpeg" name="form-photo" />
              </div>
            </div>
          </div>
					<hr class="my-0" />
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-3">
								<label for="form-name" class="form-label">Kategori <i class="text-danger">*</i></label>
                <select class="form-select" id="form-name" name="form-menu-category-id" required>
                  <option value="">&mdash;</option>
                  <?php foreach($menuCategories as $item): ?>
                  <option value="<?= $item['id'] ?>"<?= $data['menu_category_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
                  <?php endforeach; ?>
                </select>
							</div>
							<div class="mb-3 col-md-6">
								<label for="form-name" class="form-label">Nama Menu <i class="text-danger">*</i></label>
								<input class="form-control" type="text" id="form-name" name="form-name" minlength="3" maxlength="255" value="<?= $data['name'] ?>" required autofocus />
							</div>
              <div class="mb-3 col-md-3">
                <label for="form-name" class="form-label">Harga <i class="text-danger">*</i></label>
                <input class="form-control" type="text" id="form-name" name="form-price" required maxlength="11" value="<?= rupiahFormat($data['price']) ?>" autofocus oninput="formatCurrency(event)" />
              </div>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary me-2">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if (session()->getFlashdata('success')) :
	echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
elseif (session()->getFlashdata('error')) :
	echo showToast('bg-danger', 'Informasi', session()->getFlashdata('error'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
</script>
<?= $this->endSection() ?>