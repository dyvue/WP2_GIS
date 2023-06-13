<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuCategory extends Model
{
    protected $table = 'menu_categories';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['name', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected function generateID(array $data)
    {
        $lastID = $this->db->table($this->table)->selectMax('id')->get()->getRow()->id;
        if (!$lastID) {
            $newID = 'KTMENU0001';
        } else {
            $number = intval(substr($lastID, 6)) + 1;
            $newID = 'KTMENU' . str_pad($number, 4, '0', STR_PAD_LEFT);
        }
        $data['data']['id'] = $newID;

        return $data;
    }
}
