<?= $this->extend("layouts/default-customer") ?>

<?= $this->section("title") ?>Order<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span> Keranjang</h4>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h5>Total Pesanan: <?= $orderTotalCart ?> item</h5>
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
                                                    <button type="button" class="btn-close btn-pinned" aria-label="Close"></button>
                                                    <p class="my-2 my-md-4"><?= rupiahFormat($item['total'] * $reservationTableCartModel->getMenu($item['menu_id'])['price']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="list-group">
                        <a href="<?= site_url('order') ?>" class="list-group-item d-flex justify-content-between">
                            <span>Masih kurang? tambah menu lagi</span>
                            <i class="bx bx-sm bx-chevron-right scaleX-n1-rtl"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="border rounded p-3 mb-3">
                        <h6>Detail Harga</h6>
                        <dl class="row mb-0">
                            <dt class="col-6 fw-normal">Order Total</dt>
                            <dd class="col-6 text-end"><?= rupiahFormat($orderTotalPrice) ?></dd>

                            <dt class="col-6 fw-normal">PPN 11%</dt>
                            <dd class="col-6 text-end"><?= rupiahFormat($tax11) ?></dd>

                            <hr>

                            <dt class="col-6">Total</dt>
                            <dd class="col-6 fw-semibold text-end mb-0"><?= rupiahFormat($totalPrice) ?></dd>
                        </dl>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="<?= site_url('order/cart') ?>" method="POST">
                            <input type="hidden" name="reservation_table_id" value="<?= $reservationTableId ?>">
                            <button type="submit" class="btn btn-primary btn-next">Order Sekarang</button>
                        </form>
                    </div>
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
</script>
<?= $this->endSection() ?>