<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$datas = [
			[
				'id'         => bin2hex(random_bytes(16)),
				'name'       => 'Ramadhan',
				'email'      => 'ramadhan@mangan.id',
				'photo'      => null,
				'is_active'  => true,
				'password'   => password_hash('Admin123!', PASSWORD_DEFAULT),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			],
		];
		$this->db->table('users')->insertBatch($datas);
	}
}
