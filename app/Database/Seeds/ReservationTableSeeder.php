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
                'name'       => 'TABLE VIP 01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0002',
                'name'       => 'TABLE VIP 02',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0003',
                'name'       => 'TABLE VIP 03',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0004',
                'name'       => 'TABLE 01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0005',
                'name'       => 'TABLE 02',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0006',
                'name'       => 'TABLE 03',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0007',
                'name'       => 'TABLE 04',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0008',
                'name'       => 'TABLE 06',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('reservation_tables')->insertBatch($datas);
    }
}
