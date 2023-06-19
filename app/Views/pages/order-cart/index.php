<?= $this->extend("layouts/default-customer") ?>

<?= $this->section("title") ?>Order<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span> Keranjang</h4>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Total Pesanan: <?= $totalCart ?> item</h5>
                    <ul class="list-group mb-3">
                        <?php foreach ($reservationTableCarts as $index => $item) : ?>
                        <li class="list-group-item p-4">
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0">
                                    <img src="/img/menus/<?= ($reservationTableCartModel->getMenu($item['menu_id'])['photo']) ? $reservationTableCartModel->getMenu($item['menu_id'])['photo'] : 'default.jpg' ?>" alt="<?= $reservationTableCartModel->getMenu($item['menu_id'])['name'] ?>" class="w-px-100 h-100 object-fit-cover">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <small class="text-muted"><?= $reservationTableCartModel->getMenuCategory($item['menu_id'])['name'] ?></small>
                                            <h6 class="h6"><?= $reservationTableCartModel->getMenu($item['menu_id'])['name'] ?></h6>
                                            <input type="number" class="form-control form-control-sm w-px-75" value="<?= $item['total'] ?>" min="1" max="5">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-md-end">
                                                <button type="button" class="btn-none text-primary">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                                <p class="my-2 my-md-4"><?= rupiahFormat($item['total'] * $reservationTableCartModel->getMenu($item['menu_id'])['price']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
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
        } else {
            window.location = window.location.href.split('?')[0]
        }
    })
</script>
<?= $this->endSection() ?>