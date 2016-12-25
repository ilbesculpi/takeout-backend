<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
	
	protected $records = [
		[
			'id' => 1,
			'name' => 'Administrator',
			'email' => 'admin@localhost.com',
			'password' => 'adminadmin',
			'avatar' => User::DEFAULT_PICTURE,
			'role' => User::ROLE_ADMIN,
			'status' => User::STATUS_ACTIVE
		],
		[
			'id' => 2,
			'name' => 'Ilbert Esculpi',
			'email' => 'ilbert.esculpi@gmail.com',
			'password' => '123456',
			'avatar' => User::DEFAULT_PICTURE,
			'role' => User::ROLE_ADMIN,
			'status' => User::STATUS_ACTIVE
		],
		[
			'id' => 3,
			'name' => 'Legna Filloy',
			'email' => 'legna.filloy@gmail.com',
			'password' => 'qwerty',
			'avatar' => User::DEFAULT_PICTURE,
			'role' => User::ROLE_ADMIN,
			'status' => User::STATUS_ACTIVE
		]
	];
		
	
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach($this->records as $record) {
			$user = User::firstOrNew(['email' => $record['email']]);
			$user->name = $record['name'];
			$user->email = $record['email'];
			$user->password = bcrypt(($record['password']));
			$user->avatar = $record['avatar'];
			$user->role = $record['role'];
			$user->status = $record['status'];
			$user->save();
		}
    }
}
