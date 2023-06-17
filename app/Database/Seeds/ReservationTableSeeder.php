<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id'         => 'TBLE0001',
                'name'       => 'VIP 01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0002',
                'name'       => 'VIP 02',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0003',
                'name'       => 'VIP 03',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0004',
                'name'       => 'STANDART 01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0005',
                'name'       => 'STANDART 02',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0006',
                'name'       => 'STANDART 03',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0007',
                'name'       => 'STANDART 04',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0008',
                'name'       => 'STANDART 06',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('reservation_tables')->insertBatch($datas);
    }
}
