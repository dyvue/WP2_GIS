<?= $this->extend("layouts/default-customer") ?>

<?= $this->section("title") ?>Order<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span> Transaksi</h4>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                        <div class="mb-xl-0 mb-4">
                            <div class="d-flex svg-illustration mb-3 gap-2">
                                <img src="/logo.png" alt="Mangan" class="w-brand-customer">
                                <span class="app-brand-text demo text-body fw-bolder">mangan.</span>
                            </div>
                            <p class="mb-1">Restoran terbaikku</p>
                        </div>
                        <div>
                            <h5>#<?= $transaction['id'] ?></h5>
                            <div class="mb-2 text-end">
                                <span class="fw-semibold"><?= $transaction['created_at'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table border-top m-0">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-nowrap">Vuexy Admin Template</td>
                                <td class="text-nowrap">HTML Admin Template</td>
                                <td>$32</td>
                                <td>1</td>
                                <td>$32.00</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Frest Admin Template</td>
                                <td class="text-nowrap">Angular Admin Template</td>
                                <td>$22</td>
                                <td>1</td>
                                <td>$22.00</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Apex Admin Template</td>
                                <td class="text-nowrap">HTML Admin Template</td>
                                <td>$17</td>
                                <td>2</td>
                                <td>$34.00</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Robust Admin Template</td>
                                <td class="text-nowrap">React Admin Template</td>
                                <td>$66</td>
                                <td>1</td>
                                <td>$66.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="align-top px-4 py-5">
                                    <p class="mb-2">
                                        <span class="me-1 fw-semibold">Salesperson:</span>
                                        <span>Alfie Solomons</span>
                                    </p>
                                    <span>Thanks for your business</span>
                                </td>
                                <td class="text-end px-4 py-5">
                                    <p class="mb-2">Subtotal:</p>
                                    <p class="mb-2">Discount:</p>
                                    <p class="mb-2">Tax:</p>
                                    <p class="mb-0">Total:</p>
                                </td>
                                <td class="px-4 py-5">
                                    <p class="fw-semibold mb-2">$154.25</p>
                                    <p class="fw-semibold mb-2">$00.00</p>
                                    <p class="fw-semibold mb-2">$50.00</p>
                                    <p class="fw-semibold mb-0">$204.25</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <span class="fw-semibold">Note:</span>
                            <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance
                                projects. Thank You!</span>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-group mb-3">
                <?php foreach ($transactionMenus as $index => $item) : ?>
                    <li class="list-group-item p-4">
                        <div class="d-flex gap-3">
                            <div class="flex-shrink-0">
                                <img src="/img/menus/<?= ($transactionMenuModel->getMenu($item['menu_id'])['photo']) ? $transactionMenuModel->getMenu($item['menu_id'])['photo'] : 'default.jpg' ?>" alt="<?= $transactionMenuModel->getMenu($item['menu_id'])['name'] ?>" class="w-px-100 h-100 object-fit-cover">
                            </div>
                            <div class="flex-grow-1">
                                <div class="row">
                                    <div class="col-md-8">
                                        <small class="text-muted"><?= $transactionMenuModel->getMenuCategory($item['menu_id'])['name'] ?></small>
                                        <h6 class="h6"><?= $transactionMenuModel->getMenu($item['menu_id'])['name'] ?></h6>
                                        <input type="number" class="form-control form-control-sm w-px-75" value="<?= $item['total'] ?>" min="1" max="5">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-md-end">
                                            <button type="button" class="btn-close btn-pinned" aria-label="Close"></button>
                                            <p class="my-2 my-md-4"><?= rupiahFormat($item['total'] * $transactionMenuModel->getMenu($item['menu_id'])['price']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
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