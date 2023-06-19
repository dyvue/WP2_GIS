<?php

namespace App\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\ReservationTableCart;

class OrderCartController extends BaseController
{
    public function index()
    {
        $reservationTableId = session()->get('SES_AUTH_CUSTOMER_TABLE');
        $reservationTableCartModel = new ReservationTableCart();
        $reservationTableCarts = $reservationTableCartModel->where('reservation_table_id', $reservationTableId)->orderBy('updated_at', 'DESC')->findAll();

        $totalCart = 0;
        foreach ($reservationTableCarts as $item) {
            $totalCart += $item['total'];
        }

        $pass = [
            'totalCart' => $totalCart,
            'reservationTableCartModel' => $reservationTableCartModel,
            'reservationTableCarts' => $reservationTableCarts
        ];

        return view("pages/order-cart/index", $pass);
    }
}
