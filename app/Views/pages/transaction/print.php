<?= $this->extend("layouts/blank") ?>

<?= $this->section("title") ?>Transaksi (Print)<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="invoice-print p-5">

    <div class="d-flex justify-content-between flex-row">
        <div class="mb-xl-0 mb-4">
            <div class="d-flex svg-illustration mb-3 gap-2">
                <img src="/logo.png" alt="Mangan" class="w-10">
                <span class="app-brand-text demo text-body fw-bolder text-primary">mangan.</span>
            </div>
        </div>
        <div class="text-end">
            <h5 class="text-uppercase">#<?= $transaction['id'] ?></h5>
            <div class="mb-2">
                <span class="fw-semibold"><?= $transaction['created_at'] ?></span>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table border-top m-0">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactionMenus as $index => $item) : ?>
                    <tr>
                        <td class="text-nowrap"><?= $transactionMenuModel->getMenu($item['menu_id'])['name'] ?></td>
                        <td class="text-nowrap"><?= rupiahFormat($transactionMenuModel->getMenu($item['menu_id'])['price']) ?></td>
                        <td><?= $item['total'] ?></td>
                        <td class="text-nowrap"><?= rupiahFormat($item['total'] * $transactionMenuModel->getMenu($item['menu_id'])['price']) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="align-top px-4 py-5">
                        <p class="mb-2">
                            <span class="me-1 fw-semibold">Atas nama:</span>
                            <span><?= $transaction['customer_name'] ?></span>
                        </p>
                        <p class="mb-2">
                            <span class="me-1 fw-semibold">Status:</span>
                            <span><?= $transaction['status'] ?></span>
                        </p>
                        <?php if ($transaction['payment_method_id']) : ?>
                            <p class="mb-2">
                                <span class="me-1 fw-semibold">Metode Pembayaran:</span>
                                <span><?= $transactionModel->getPaymentMethod($transaction['payment_method_id']) ? $transactionModel->getPaymentMethod($transaction['payment_method_id'])['name'] : '' ?></span>
                            </p>
                        <?php endif; ?>
                    </td>
                    <td class="px-4 py-5">
                        <div class="d-flex gap-1 justify-content-end">
                            <p class="mb-2">Order Total:</p>
                            <p class="fw-semibold mb-2"><?= rupiahFormat($orderTotalPrice) ?></p>
                        </div>
                        <div class="d-flex gap-1 justify-content-end">
                            <p class="mb-2">PPN 11%:</p>
                            <p class="fw-semibold mb-2"><?= rupiahFormat($tax11) ?></p>
                        </div>
                        <div class="d-flex gap-1 justify-content-end">
                            <p class="mb-0">Total:</p>
                            <p class="fw-semibold mb-2"><?= rupiahFormat($totalPrice) ?></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            <span>Terima kasih atas kunjungan Anda! Kami hargai dukungan Anda</span>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
    window.onafterprint = function() {
        window.close();
    };
    window.print();
</script>
<?= $this->endSection() ?>