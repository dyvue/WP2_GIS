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
                'name'       => 'TABLE DINNER VIP 01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0002',
                'name'       => 'TABLE DINNER VIP 02',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0003',
                'name'       => 'TABLE DINNER VIP 03',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0004',
                'name'       => 'TABLE STANDART 01',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0005',
                'name'       => 'TABLE STANDART 02',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0006',
                'name'       => 'TABLE STANDART 03',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0007',
                'name'       => 'TABLE STANDART 04',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'TBLE0008',
                'name'       => 'TABLE STANDART 06',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('reservation_tables')->insertBatch($datas);
    }
}
