<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Menu extends Model
{
    protected $table = 'menus';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['menu_category_id', 'name', 'photo', 'price', 'is_available', 'is_best_seller', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected function generateID(array $data)
    {
        $lastID = $this->db->table($this->table)->selectMax('id')->get()->getRow()->id;
        if (!$lastID) {
            $newID = 'MENU000001';
        } else {
            $number = intval(substr($lastID, 4)) + 1;
            $newID = 'MENU' . str_pad($number, 6, '0', STR_PAD_LEFT);
        }
        $data['data']['id'] = $newID;

        return $data;
    }

    public function getCategory($menuCategoryId)
    {
        $db = Database::connect();
        $menuModel = $db->table('menu_categories')->where('id', $menuCategoryId)->get();
        $db->close();
        $category = $menuModel->getRowArray();

        if ($category) {
            return $category['name'];
        }

        return null;
    }
}
