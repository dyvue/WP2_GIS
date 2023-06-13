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
                'name'       => 'Masakan Nasi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'KTMENU0002',
                'name'       => 'Masakan Mie',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'KTMENU0003',
                'name'       => 'Minuman',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('menu_categories')->insertBatch($datas);
    }
}
