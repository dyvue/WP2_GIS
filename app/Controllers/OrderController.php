<?php

namespace App\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\ReservationTableCart;

class OrderController extends BaseController
{
    public function index()
    {
        $modelMenu = new Menu();
        $modelMenuCategoy = new MenuCategory();

        $menuCategorySelected = $this->request->getGet('category-id');

        $menus = $modelMenu;
        if ($menuCategorySelected) {
            $menus = $menus->where('menu_category_id', $menuCategorySelected);
        }
        $menus = $menus->orderBy('is_best_seller', 'DESC')->orderBy('is_available', 'DESC')->orderBy('created_at', 'ASC')->paginate(9);

        $pass = [
            'menuCategories'=> $modelMenuCategoy->orderBy('id', 'ASC')->findAll(),
            'menuCategorySelected' => $menuCategorySelected,

            'modelMenu' => $modelMenu,
            'menus' => $menus,
            'menusPager' => $modelMenu->pager,
        ];

        return view("pages/order/index", $pass);
    }

    public function store()
    {
        $model = new ReservationTableCart();
        $reservationTableId = session()->get('SES_AUTH_CUSTOMER_TABLE');
        $menuId = $this->request->getPost('menu-id');
        $total = 1;

        $checkRow = $model->where('reservation_table_id', $reservationTableId)->where('menu_id', $menuId)->first();
        if ($checkRow) {
            $total = $checkRow['total'] + 1;
        }

        $data = [
            'reservation_table_id' => $reservationTableId,
            'menu_id' => $menuId,
            'total' => $total
        ];

        if ($checkRow) {
            $model->update($checkRow['id'], $data);
        }
        else {
            $model->insert($data);
        }

        return redirect()->to('order')->with('success', 'Berhasil ditambahkan ke keranjang');
    }
}
