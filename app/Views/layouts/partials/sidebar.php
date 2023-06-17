<?php
if (!function_exists('is_root_path')) {
  function is_root_path()
  {
    $uri = service('uri');
    $currentURL = $uri->getPath();
    if ($currentURL == "/") {
      return 'active';
    }
  }
}
if (!function_exists('is_active_menu')) {
  function is_active_menu($urlSegment)
  {
    $uri = service('uri');
    $currentURL = $uri->getPath();
    return (strpos($currentURL, $urlSegment) !== false) ? 'active open' : '';
  }
}
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <img src="/logo.png" alt="Mangan" class="w-brand">
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Mangan.</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-item <?= is_root_path(); ?>">
        <a href="<?= site_url('/'); ?>" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item <?= is_active_menu('master'); ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-package"></i>
            <div data-i18n="Master">Master</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item <?= is_active_menu('master/menus'); ?>">
                <a href="<?= site_url('master/menus'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Daftar Menu</div>
                </a>
            </li>
            <li class="menu-item <?= is_active_menu('master/reservation-tables'); ?>">
                <a href="<?= site_url('master/reservation-tables'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Daftar Meja</div>
                </a>
            </li>
            <li class="menu-item <?= is_active_menu('master/payment-methods'); ?>">
                <a href="<?= site_url('master/payment-methods'); ?>" class="menu-link">
                    <div data-i18n="Without menu">Metode Pembayaran</div>
                </a>
            </li>
            <li class="menu-item <?= is_active_menu('master/menu-categories'); ?>">
                <a href="<?= site_url('master/menu-categories'); ?>" class="menu-link">
                    <div data-i18n="Container">Kategori Menu</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
    <li class="menu-item <?= is_active_menu('order'); ?>">
      <a href="<?= site_url('order'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cart"></i>
        <div data-i18n="Boxicons">Order</div>
      </a>
    </li>
    <li class="menu-item <?= is_active_menu('payments'); ?>">
      <a href="<?= site_url('payments'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-wallet"></i>
        <div data-i18n="Boxicons">Pembayaran</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
    <li class="menu-item <?= is_active_menu('report/transaction'); ?>">
      <a href="<?= site_url('report/transaction'); ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Boxicons">Transaksi</div>
      </a>
    </li>
  </ul>
</aside>