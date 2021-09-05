<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'email' => 'admin@gmail.com',
				'password' => password_hash('123456', PASSWORD_BCRYPT),
				'name' => 'Huy Quyết',
			],
			[
				'email' => 'user@gmail.com',
				'password' => password_hash('123456', PASSWORD_BCRYPT),
				'name' => 'Văn Thắng',
			]
		];
		$this->db->table('users')->insertBatch($data);
	}
}
