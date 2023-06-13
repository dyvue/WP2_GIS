<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id'                => 'MENU000001',
                'menu_category_id'  => 'KTMENU0001',
                'name'              => 'Nasi Goreng Special',
                'photo'             => null,
                'price'             => 30000,
                'is_available'      => 1,
                'is_best_seller'    => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'id'                => 'MENU000002',
                'menu_category_id'  => 'KTMENU0001',
                'name'              => 'Nasi Goreng Ayam',
                'photo'             => null,
                'price'             => 22000,
                'is_available'      => 1,
                'is_best_seller'    => 0,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'id'                => 'MENU000003',
                'menu_category_id'  => 'KTMENU0001',
                'name'              => 'Nasi Goreng Sosis',
                'photo'             => null,
                'price'             => 24000,
                'is_available'      => 1,
                'is_best_seller'    => 0,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'id'                => 'MENU000004',
                'menu_category_id'  => 'KTMENU0001',
                'name'              => 'Nasi Goreng Kambing',
                'photo'             => null,
                'price'             => 27000,
                'is_available'      => 1,
                'is_best_seller'    => 0,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'id'                => 'MENU000005',
                'menu_category_id'  => 'KTMENU0002',
                'name'              => 'Mie Goreng Ayam',
                'photo'             => null,
                'price'             => 22000,
                'is_available'      => 1,
                'is_best_seller'    => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'id'                => 'MENU000006',
                'menu_category_id'  => 'KTMENU0002',
                'name'              => 'Mie Goreng Udang',
                'photo'             => null,
                'price'             => 24000,
                'is_available'      => 1,
                'is_best_seller'    => 0,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'id'                => 'MENU000007',
                'menu_category_id'  => 'KTMENU0003',
                'name'              => 'Teh Manis Es',
                'photo'             => null,
                'price'             => 5000,
                'is_available'      => 1,
                'is_best_seller'    => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'id'                => 'MENU000008',
                'menu_category_id'  => 'KTMENU0003',
                'name'              => 'Teh Manis Anget',
                'photo'             => null,
                'price'             => 4000,
                'is_available'      => 1,
                'is_best_seller'    => 0,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('menus')->insertBatch($datas);
    }
}
