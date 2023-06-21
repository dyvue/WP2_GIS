<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Daftar Meja<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Daftar Meja</h4>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header absolute">
                    <button class="btn btn-primary rounded-pill" onclick="modalBasicFormCreate()"><span class="tf-icons bx bx-plus-circle"></span> Tambah Meja</button>
                </div>
                <div class="mt-4 card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="data-table table table-striped">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Nama Meja</th>
                                    <th width="40" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($reservationTables as $index => $item) : ?>
                                    <tr>
                                        <td>#<?= $item['id'] ?></td>
                                        <td class="d-flex align-items-center gap-2">
                                            <img src="<?= $item['qr_code'] ?>" alt="<?= $item['name'] ?>" class="d-block rounded object-fit-cover modal-basic-qr-show cursor-pointer" height="50" width="50">
                                            <strong><?= $item['name'] ?></strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a class="text-black modal-basic-edit" href="javascript:void(0)" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Edit"><i class="bx bx-sm bx-edit"></i></a>
                                                <a class="text-black" href="<?= site_url('master/reservation-tables/delete/' . $item['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus meja <?= $item['name'] ?>')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus"><i class="bx bx-sm bx-trash"></i></a>
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
<?php include 'partials/modal-qr.php'; ?>
<?php
if (session()->getFlashdata('success')) :
    echo showToast('bg-default', 'Informasi', session()->getFlashdata('success'));
endif;
?>
<?= $this->endSection() ?>

<?= $this->section("css") ?>
<style>
    @media print {
        body {
            visibility: hidden;
        }

        #modal-basic-qr-img {
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
    const modalBasicFormCreate = () => {
        $('#form-modal').attr('action', '/master/reservation-tables')
        $('#form-modal-input-name').val('')
        $('#modal-basic-form-title').text('Tambah Meja')
        $('#modal-basic-form').modal('show')
    }

    $('.modal-basic-edit').click(function(e) {
        e.preventDefault()
        const id = $(this).data('id'),
            name = $(this).data('name')
        $('#form-modal').attr('action', '/master/reservation-tables/update/' + id)
        $('#form-modal-input-name').val(name)
        $('#modal-basic-form-title').text('Edit Meja')
        $('#modal-basic-form').modal('show')
    })

    $('.modal-basic-qr-show').click(function(e) {
        e.preventDefault()
        const id = $(this).data('id'),
            src = $(this).attr('src')
        $('#modal-basic-qr-title').text('Scan QR Code')
        $('#modal-basic-qr-img').attr('src', src)
        $('#modal-basic-qr').modal('show')
    })

    $('.data-table').DataTable({
        ordering: false,
        lengthChange: false,
        pageLength: 5
    })
</script>
<?= $this->endSection() ?>