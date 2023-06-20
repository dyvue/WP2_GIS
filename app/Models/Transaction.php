<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['reservation_table_id', 'payment_method_id', 'tax_11', 'price_total', 'created_at', 'updated_at'];
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

    public function insertResponse(array $data = null, bool $returnID = true)
    {
        $result = parent::insert($data, $returnID);

        if ($result !== false && $returnID) {
            $insertedID = $result;
            $insertedData = $this->find($insertedID);
            return $insertedData;
        }

        return $result;
    }

    public function getTransactionMenus($transactionId)
    {
        $transactionMenuModel = new TransactionMenu();
        $data = $transactionMenuModel->where('transaction_id', $transactionId)->findAll();

        if ($data) {
            return $data;
        }

        return null;
    }
}
