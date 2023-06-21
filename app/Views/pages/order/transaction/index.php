<?= $this->extend("layouts/default-customer") ?>

<?= $this->section("title") ?>Order<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span> Transaksi</h4>
        <div class="d-flex align-items-center gap-2">
            <a class="btn btn-secondary d-flex gap-1 justify-content-center align-items-center w-100 mb-3" href="">
                <i class="bx bx-refresh"></i> Refresh
            </a>
            <a class="btn btn-secondary d-flex gap-1 justify-content-center align-items-center w-100 mb-3" target="_blank" href="<?= site_url('order/transaction/' . $transaction['id'] . '/print') ?>">
                <i class="bx bxs-printer"></i> Print
            </a>
            <?php if ($transaction['status'] == 'Selesai') : ?>
                <a class="btn btn-success d-flex gap-1 justify-content-center align-items-center w-100 mb-3" href="<?= site_url('order') ?>">
                    <i class="bx bx-check"></i> Selesai
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if ($transaction['status'] == 'Diproses'): ?>
            <div class="alert alert-warning d-flex" role="alert">
                <span class="badge badge-center rounded-pill bg-warning border-label-warning p-3 me-2"><i class="bx bx-restaurant fs-6"></i></span>
                <div class="d-flex flex-column ps-1">
                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1"><?= $transaction['status'] ?></h6>
                    <span>Pesanan Anda sedang kami proses, silahkan tunggu, atau klik refresh untuk lihat status transaksi terbaru</span>
                </div>
            </div>
            <?php elseif ($transaction['status'] == 'Dihidangkan'): ?>
            <div class="alert alert-info d-flex" role="alert">
                <span class="badge badge-center rounded-pill bg-info border-label-info p-3 me-2"><i class="bx bx-restaurant fs-6"></i></span>
                <div class="d-flex flex-column ps-1">
                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1"><?= $transaction['status'] ?></h6>
                    <span>Makanan anda sudah dihidangkan, selamat menikmati hidangan kami!</span>
                </div>
            </div>
            <?php elseif ($transaction['status'] == 'Selesai'): ?>
            <div class="alert alert-success d-flex" role="alert">
                <span class="badge badge-center rounded-pill bg-success border-label-success p-3 me-2"><i class="bx bx-restaurant fs-6"></i></span>
                <div class="d-flex flex-column ps-1">
                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1"><?= $transaction['status'] ?></h6>
                    <span>Hore, status pesanan telah selesai, terimakasih atas kunjungan Anda!</span>
                </div>
            </div>
            <?php elseif ($transaction['status'] == 'Dibatalkan'): ?>
            <div class="alert alert-danger d-flex" role="alert">
                <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i class="bx bx-restaurant fs-6"></i></span>
                <div class="d-flex flex-column ps-1">
                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1"><?= $transaction['status'] ?></h6>
                    <span>Maaf pesanan Anda dibatalkan oleh Admin, silahkan konfirmasi ke waiters/kasir</span>
                </div>
            </div>
            <?php endif; ?>
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
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

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <span>Terima kasih atas kunjungan Anda! Kami hargai dukungan Anda</span>
                        </div>
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