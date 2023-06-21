<?php

namespace App\Controllers;

use App\Models\ReservationTableCart;
use App\Models\Transaction;
use App\Models\TransactionMenu;
use Config\Database;

class OrderCartController extends BaseController
{
    public function index()
    {
        $reservationTableId = session()->get('SES_AUTH_CUSTOMER_TABLE');
        $reservationTableCartModel = new ReservationTableCart();
        $reservationTableCarts = $reservationTableCartModel->where('reservation_table_id', $reservationTableId)->orderBy('created_at', 'DESC')->findAll();

        $orderTotalCart = 0;
        $orderTotalPrice = 0;
        $tax11 = 0;
        $totalPrice = 0;
        foreach ($reservationTableCarts as $item) {
            $orderTotalCart += $item['total'];
        }

        foreach ($reservationTableCarts as $item) {
            $menuItem = $reservationTableCartModel->getMenu($item['menu_id']);
            $orderTotalPrice += $item['total'] * $menuItem['price'];
        }

        $tax11 = 0.11 * $orderTotalPrice;
        $totalPrice = $orderTotalPrice + $tax11;

        $pass = [
            'reservationTableId' => $reservationTableId,
            'reservationTableCartModel' => $reservationTableCartModel,
            'reservationTableCarts' => $reservationTableCarts,
            'orderTotalCart' => $orderTotalCart,
            'orderTotalPrice' => $orderTotalPrice,
            'tax11' => $tax11,
            'totalPrice' => $totalPrice,
        ];

        return view("pages/order/cart/index", $pass);
    }

    public function store()
    {
        $reservationTableId = session()->get('SES_AUTH_CUSTOMER_TABLE');
        $customerName = $this->request->getPost('form-customer-name');
        $reservationTableCartModel = new ReservationTableCart();
        $reservationTableCarts = $reservationTableCartModel->where('reservation_table_id', $reservationTableId)->orderBy('created_at', 'DESC')->findAll();

        $orderTotalPrice = 0;
        $tax11 = 0;
        $totalPrice = 0;

        foreach ($reservationTableCarts as $item) {
            $menuItem = $reservationTableCartModel->getMenu($item['menu_id']);
            $orderTotalPrice += $item['total'] * $menuItem['price'];
        }

        $tax11 = 0.11 * $orderTotalPrice;
        $totalPrice = $orderTotalPrice + $tax11;

        $generateUUID = generateRandomString(10);
        $currentDateTime = date("Y-m-d H:i:s");

        $data = [
            'id' => $generateUUID,
            'reservation_table_id' => $reservationTableId,
            'customer_name' => $customerName,
            'tax_11' => $tax11,
            'price_total' => $totalPrice,
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime
        ];

        $db = Database::connect();
        $db->table('transactions')->insert($data);
        $db->close();

        foreach ($reservationTableCarts as $item) {
            $transactionMenuData = [
                'transaction_id' => $generateUUID,
                'menu_id' => $item['menu_id'],
                'total' => $item['total']
            ];
    
            $transactionMenuModel = new TransactionMenu();
            $transactionMenuModel->insert($transactionMenuData);

            $deleteReservationCart = new ReservationTableCart();
            $deleteReservationCart->delete($item['id']);
        }

        return redirect()->to('order/transaction/'.$generateUUID)->with('success', 'Order berhasil, pesanan anda sedang diproses');
    }

    public function plus($id)
    {
        $model = new ReservationTableCart();
        $get = $model->find($id);

        $total = $get['total'] + 1;

        $data = [
            'total' => $total
        ];

        $model->update($id, $data);

        return redirect()->back();
    }

    public function minus($id)
    {
        $model = new ReservationTableCart();
        $get = $model->find($id);

        $total = $get['total'] - 1;

        $data = [
            'total' => $total
        ];

        $model->update($id, $data);

        return redirect()->back();
    }

    public function delete($id)
    {
        $model = new ReservationTableCart();
        $model->delete($id);

        return redirect()->back();
    }
}
