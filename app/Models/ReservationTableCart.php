<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationTableCart extends Model
{
    protected $table = 'reservation_table_carts';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['reservation_table_id', 'menu_id', 'total', 'created_at', 'updated_at'];
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
        $menuModel = new Menu();
        $data = $menuModel->find($menuId);

        if ($data) {
            return $data;
        }

        return null;
    }

    public function getMenuCategory($menuId)
    {
        $menuModel = new Menu();
        $data = $menuModel->find($menuId);
        
        if ($data) {
            $menuCategoryModel = new MenuCategory();
            $dataCat = $menuCategoryModel->find($data['menu_category_id']);

            return $dataCat;
        }

        return null;
    }
}
