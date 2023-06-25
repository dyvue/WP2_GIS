<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class TransactionMenu extends Model
{
    protected $table = 'transaction_menus';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['transaction_id', 'menu_id', 'total', 'created_at', 'updated_at'];
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

    public function getMenu($menuId)
    {
        $db = Database::connect();
        $menuModel = $db->table('menus')->where('id', $menuId)->get();
        $db->close();
        $data = $menuModel->getRowArray();

        if ($data) {
            return $data;
        }

        return array(
            "id" => "",
            "menu_category_id" => "",
            "name" => "",
            "photo" => "",
            "price" => 0,
            "is_available" => 0,
            "is_best_seller" => 0,
        );
    }

    public function getMenuCategory($menuId)
    {
        $db = Database::connect();
        $menuModel = $db->table('menus')->where('id', $menuId)->get();
        $data = $menuModel->getRowArray();

        if ($data) {
            $menuCategoryModel = $db->table('menu_categories')->where('id', $data['menu_category_id'])->get();
            $db->close();
            $dataCat = $menuCategoryModel->getRowArray();

            return $dataCat;
        }

        return array(
            "id" => "",
            "name" => "",
        );
    }
}
