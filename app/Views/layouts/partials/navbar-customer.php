<?php
$reservationTableId = session()->get('SES_AUTH_CUSTOMER_TABLE');
$reservationTable = new App\Models\ReservationTable();
$reservationTable = $reservationTable->find($reservationTableId);

$reservationTableCart = new App\Models\ReservationTableCart();
$reservationTableCart = $reservationTableCart->where('reservation_table_id', $reservationTableId)->findAll();
$totalCart = 0;
foreach ($reservationTableCart as $cartItem) {
  $totalCart += $cartItem['total'];
}
?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <div class="navbar-nav align-items-center">
      <a href="<?= site_url('/order') ?>" class="app-brand-link">
        <img src="/logo.png" alt="Mangan" class="w-brand-customer">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Mangan.</span>
      </a>
    </div>
    <ul class="navbar-nav flex-row align-items-center ms-auto">
    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
      <a class="nav-link d-flex align-items-center" href="<?= site_url('order/cart') ?>">
        <i class="bx bx-cart bx-sm"></i>
        <?php if ($totalCart > 0): ?>
        <span class="badge bg-danger rounded-pill badge-notifications"><?= $totalCart ?></span>
        <?php endif; ?>
      </a>
    </li>
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="d-flex justify-content-center align-items-center">
            <div class="flex-grow-1">
              <span class="fw-semibold d-flex align-items-center"><?= $reservationTable['name'] ?> <i class="bx bxs-chevron-down"></i></span>
            </div>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="<?= site_url('order/logout'); ?>">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>