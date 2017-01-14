<?php

use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomersSeeder extends Seeder
{
	
	protected $records = [
		[
			'id' => 1,
			'first_name' => 'Test',
			'last_name' => 'Customer01',
			'email' => 'customer01@localhost.com',
			'password' => 'qwerty',
			'avatar' => Customer::DEFAULT_PICTURE,
			'fbuid' => null,
			'status' => Customer::STATUS_ACTIVE
		],
		[
			'id' => 2,
			'first_name' => 'Test',
			'last_name' => 'Customer02',
			'email' => 'customer02@localhost.com',
			'password' => 'qwerty',
			'avatar' => Customer::DEFAULT_PICTURE,
			'fbuid' => null,
			'status' => Customer::STATUS_ACTIVE
		],
		[
			'id' => 3,
			'first_name' => 'Test',
			'last_name' => 'Customer03',
			'email' => 'customer03@localhost.com',
			'password' => 'qwerty',
			'avatar' => Customer::DEFAULT_PICTURE,
			'fbuid' => null,
			'status' => Customer::STATUS_BLOCKED
		],
	];
	
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach($this->records as $record) {
			$customer = Customer::firstOrNew(['email' => $record['email']]);
			$customer->first_name = $record['first_name'];
			$customer->last_name = $record['last_name'];
			$customer->email = $record['email'];
			$customer->password = bcrypt(($record['password']));
			$customer->avatar = $record['avatar'];
			$customer->fbuid = $record['fbuid'];
			$customer->status = $record['status'];
			$customer->save();
		}
    }
	
}
