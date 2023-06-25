<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Transaksi<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order /</span> Transaksi</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-striped">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Tanggal</th>
                                    <th>Meja</th>
                                    <th>Atas Nama</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th width="40" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($transaction as $index => $item) : ?>
                                    <tr>
                                        <td class="text-uppercase"><a href="<?= site_url('transactions/'.$item['id']) ?>">#<?= $item['id'] ?></a></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td>
                                            <strong><?= $item['reservation_table_id'] ?></strong>
                                            <span>[<?= $modelTransaction->getReservationTable($item['reservation_table_id']) ? $modelTransaction->getReservationTable($item['reservation_table_id'])['name'] : '' ?>]</span>
                                        </td>
                                        <td><strong><?= $item['customer_name'] ?></strong></td>
                                        <td><?= rupiahFormat($item['price_total']) ?></td>
                                        <td>
                                            <?php if ($item['status'] == 'Selesai') : ?>
                                                <span class="badge bg-success"><small><?= $item['status'] ?></small></span>
                                            <?php elseif ($item['status'] == 'Dibatalkan') : ?>
                                                <span class="badge bg-danger"><small><?= $item['status'] ?></small></span>
                                            <?php elseif ($item['status'] == 'Dihidangkan') : ?>
                                                <span class="badge bg-info"><small><?= $item['status'] ?></small></span>
                                            <?php elseif ($item['status'] == 'Diproses') : ?>
                                                <span class="badge bg-warning"><small><?= $item['status'] ?></small></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <?php if ($item['status'] == 'Diproses' || $item['status'] == 'Dihidangkan') : ?>
                                                <a class="text-black" href="<?= site_url('transactions/cancel/' . $item['id']) ?>" onclick="return confirm('Anda yakin ingin membatalkan Transaksi #<?= $item['id'] ?>?')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Batalkan"><i class="bx bx-sm bx-x"></i></a>
                                                <?php endif; ?>
                                                <?php if ($item['status'] == 'Diproses') : ?>
                                                <a class="text-black" href="<?= site_url('transactions/serve/' . $item['id']) ?>" onclick="return confirm('Konfirmasi pesanan #<?= $item['id'] ?> sudah dihidangkan?')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hidangkan"><i class="bx bx-sm bx-restaurant"></i></a>
                                                <?php elseif ($item['status'] == 'Dihidangkan') : ?>
                                                <a class="text-black modal-basic-done" href="javascript:void(0)" data-id="<?= $item['id'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Selesai"><i class="bx bx-sm bx-check"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/modal-form.php'; ?>
<?php
if (session()->getFlashdata('success')) :
    echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
    $('.modal-basic-done').click(function(e) {
        e.preventDefault()
        const id = $(this).data('id')
        $('#form-modal').attr('action', '/transactions/done/' + id)
        $('#modal-basic-form-title').text('Selesaikan Pesanan')
        $('#modal-basic-form').modal('show')
    })

    $('.data-table').DataTable({
        ordering: false,
        lengthChange: false,
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="bx bx-refresh"></i> Refresh',
                className: "btn btn-secondary mx-1 rounded-pill",
                action: function () {
                    window.location.href = ""
                }
            },
            {
                extend: "print",
                text: '<i class="bx bxs-printer me-1" ></i>Print',
                className: "btn btn-outline-secondary mx-1 rounded-pill",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
            {
                extend: "pdf",
                text: '<i class="bx bxs-file-pdf me-1" ></i>PDF',
                className: "btn btn-outline-danger mx-1 rounded-pill",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
            {
                extend: "excel",
                text: '<i class="bx bx-table me-1" ></i>Excel',
                className: "btn btn-outline-success mx-1 rounded-pill",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
            {
                extend: "csv",
                text: '<i class="bx bxs-spreadsheet me-1" ></i>CSV',
                className: "btn btn-outline-success mx-1 rounded-pill",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
        ]
    })
</script>
<?= $this->endSection() ?>