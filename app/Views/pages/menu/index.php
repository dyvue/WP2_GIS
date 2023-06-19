<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Daftar Menu<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Daftar Menu</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url('master/menus/create') ?>" class="btn btn-primary"><span class="tf-icons bx bx-plus-circle"></span> Tambah Menu</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Kategori</th>
                                    <th>Menu</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th width="150" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($menus as $index => $item) : ?>
                                    <tr class="<?= $item['is_best_seller'] == 1 ? 'bg-best-seller' : '' ?>">
                                        <td>#<?= $item['id'] ?></td>
                                        <td>
                                            <span class="badge bg-label-primary"><small><?= $model->getCategory($item['menu_category_id']); ?></small></span>
                                        </td>
                                        <td class="d-flex align-items-center gap-2">
                                            <img src="/img/menus/<?= $item['photo'] ? $item['photo'] : 'default.jpg' ?>" alt="<?= $item['name'] ?>" class="d-block rounded object-fit-cover" height="50" width="50" rounded">
                                            <?= $item['name'] ?>
                                        </td>
                                        <td><?= rupiahFormat($item['price']) ?></td>
                                        <td>
                                            <?php if ($item['is_available'] == 1) : ?>
                                                <span class="badge bg-success"><small>Tersedia</small></span>
                                            <?php else : ?>
                                                <span class="badge bg-secondary"><small>Tidak Tersedia</small></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex gap-2">
                                                <a class="text-black" href="<?= site_url('master/menus/set-status/' . $item['id']) ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<?= $item['is_available'] == 0 ? 'Tetapkan status tersedia' : 'Tetapkan status tidak tersedia' ?>"><i class="bx bx-xs <?= $item['is_available'] == 0 ? 'bx-alarm-off' : 'bx-alarm text-warning' ?>"></i></a>
                                                <a class="text-black" href="<?= site_url('master/menus/set-best-seller/' . $item['id']) ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Best Seller"><i class="bx bx-xs <?= $item['is_best_seller'] == 0 ? 'bx-star' : 'bxs-star text-warning' ?>"></i></a>
                                                <a class="text-black" href="<?= site_url('master/menus/edit/' . $item['id']) ?>" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Edit"><i class="bx bx-xs bx-edit"></i></a>
                                                <a class="text-black" href="<?= site_url('master/menus/delete/' . $item['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus menu <?= $item['name'] ?>')" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus"><i class="bx bx-xs bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <?= $pager->links() ?>
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