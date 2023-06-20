<?php

namespace App\Controllers;

use App\Models\Transaction;
use App\Models\TransactionMenu;

class OrderTransactionController extends BaseController
{
    public function index($id)
    {
        $transactionModel = new Transaction();
        $transaction = $transactionModel->find($id);

        $transactionMenuModel = new TransactionMenu();
        $transactionMenus = $transactionModel->getTransactionMenus($transaction['id']);

        $orderTotalPrice = 0;
        $tax11 = 0;
        $totalPrice = 0;

        foreach ($transactionMenus as $item) {
            $menuItem = $transactionMenuModel->getMenu($item['menu_id']);
            $orderTotalPrice += $item['total'] * $menuItem['price'];
        }

        $tax11 = 0.11 * $orderTotalPrice;
        $totalPrice = $orderTotalPrice + $tax11;

        $pass = [
            'transaction' => $transaction,
            'transactionMenuModel' => $transactionMenuModel,
            'transactionMenus' => $transactionMenus,
            'orderTotalPrice' => $orderTotalPrice,
            'tax11' => $tax11,
            'totalPrice' => $totalPrice,
        ];

        return view("pages/order/transaction/index", $pass);
    }
}
