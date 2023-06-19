<?= $this->extend("layouts/default-customer") ?>

<?= $this->section("title") ?>Order<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> Order</h4>
        <form id="form-category-option" method="GET">
            <select class="form-select" id="form-category-id" name="category-id" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($menuCategories as $item) : ?>
                    <option value="<?= $item['id'] ?>"<?= $menuCategorySelected == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <div class="row">
        <?php foreach ($menus as $index => $item) : ?>
            <div class="col-12 col-md-4">
                <div class="card mb-3">
                    <img class="card-img-top h-card-menu-image" src="/img/menus/<?= $item['photo'] ? $item['photo'] : 'default.jpg' ?>" alt="<?= $item['name'] ?>">
                    <div class="card-body">
                        <small class="text-muted"><?= $modelMenu->getCategory($item['menu_category_id']); ?></small>
                        <h5 class="card-title"><?= $item['name'] ?></h5>
                        <h6 class="fw-bold h5"><?= rupiahFormat($item['price']) ?></h6>
                        <form action="<?= site_url('order') ?>" method="POST">
                        <input type="hidden" name="menu-id" value="<?= $item['id'] ?>">
                        <button type="submit" class="btn-none text-primary">
                            <span class="bx bx-sm bxs-cart-add"></span> Keranjang
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-4">
        <?= $menusPager->links() ?>
    </div>
</div>
<?php
if (session()->getFlashdata('success')) :
    echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
    $('#form-category-id').change(function() {
        if ($(this).val()) {
            $('#form-category-option').submit()
        }
        else {
            window.location = window.location.href.split('?')[0]
        }
    })
</script>
<?= $this->endSection() ?>