<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['reservation_table_id', 'payment_method_id', 'tax_11', 'price_total', 'status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

	protected function generateID(array $data)
	{
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $data['data']['id'] = $randomString;
        return $data;
	}

    public function getTransactionMenus($transactionId)
    {
        $db = Database::connect();
        $transactionMenuModel = $db->table('transaction_menus')->where('transaction_id', $transactionId)->get();
        $db->close();
        $data = $transactionMenuModel->getResultArray();

        if ($data) {
            return $data;
        }

        return array(
            "id" => "",
            "transaction_id" => "",
            "menu_id" => "",
            "total" => 0,
        );
    }

    public function getReservationTable($reservationTableId)
    {
        $db = Database::connect();
        $reservationTable = $db->table('reservation_tables')->where('id', $reservationTableId)->get();
        $db->close();
        $data = $reservationTable->getRowArray();

        if ($data) {
            return $data;
        }

        return array(
            "id" => "",
            "name" => "",
        );
    }

    public function getPaymentMethod($paymentMethodId)
    {
        $db = Database::connect();
        $paymentMethod = $db->table('payment_methods')->where('id', $paymentMethodId)->get();
        $db->close();
        $data = $paymentMethod->getRowArray();

        if ($data) {
            return $data;
        }

        return array(
            "id" => "",
            "name" => "",
        );
    }
}
