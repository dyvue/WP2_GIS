<?php

namespace App\Controllers;

use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\TransactionMenu;

class TransactionController extends BaseController
{
    public function index()
    {
        $modelTransaction = new Transaction();
        $modelPaymentMethod = new PaymentMethod();
        $pass = [
            'modelTransaction' => $modelTransaction,
            'transaction' => $modelTransaction->orderBy('created_at', 'DESC')->findAll(),
            'paymentMethods' => $modelPaymentMethod->orderBy('name', 'ASC')->findAll(),
        ];

        return view("pages/transaction/index", $pass);
    }

    public function show($id)
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
            'transactionModel' => $transactionModel,
            'transactionMenuModel' => $transactionMenuModel,
            'transactionMenus' => $transactionMenus,
            'orderTotalPrice' => $orderTotalPrice,
            'tax11' => $tax11,
            'totalPrice' => $totalPrice,
        ];

        return view("pages/transaction/show", $pass);
    }

    public function print($id)
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
            'transactionModel' => $transactionModel,
            'transactionMenuModel' => $transactionMenuModel,
            'transactionMenus' => $transactionMenus,
            'orderTotalPrice' => $orderTotalPrice,
            'tax11' => $tax11,
            'totalPrice' => $totalPrice,
        ];

        return view("pages/transaction/print", $pass);
    }

    public function done($id)
    {
        $model = new Transaction();

        $data = [
            'payment_method_id' => $this->request->getPost('form-payment-method'),
            'status' => 'Selesai'
        ];

        $model->update($id, $data);

        return redirect()->to('transactions')->with('success', 'Transaksi berhasil di selesaikan');
    }

    public function serve($id)
    {
        $model = new Transaction();

        $data = [
            'status' => 'Dihidangkan'
        ];

        $model->update($id, $data);

        return redirect()->to('transactions')->with('success', 'Pesanan berhasil di hidangkan');
    }

    public function cancel($id)
    {
        $model = new Transaction();

        $data = [
            'status' => 'Dibatalkan'
        ];

        $model->update($id, $data);

        return redirect()->to('transactions')->with('success', 'Transaksi berhasil di batalkan');
    }
}
