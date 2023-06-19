<?= $this->extend("layouts/blank") ?>

<?= $this->section("title") ?>Login Pelanggan<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="/logo.png" alt="Mangan" class="w-brand">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Mangan.</span>
                    </div>
                    <p class="mb-4">Silahkan masukkan ID Meja untuk melanjutkan</p>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger"><i class='bx bx-info-circle'></i> <?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form class="mb-3" action="<?= site_url('order/login'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="reservation-table-id" class="form-label">ID Meja</label>
                            <input type="text" class="form-control" id="reservation-table-id" name="reservation_table_id" placeholder="Enter your reservation table id" autofocus />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>