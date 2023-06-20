<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id'         => 'KTMENU0001',
                'name'       => 'MASAKAN NASI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'KTMENU0002',
                'name'       => 'MASAKAN MIE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'KTMENU0003',
                'name'       => 'MINUMAN',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('menu_categories')->insertBatch($datas);
    }
}
