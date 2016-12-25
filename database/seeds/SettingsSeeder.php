<?php

use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsSeeder extends Seeder
{
	
	protected $records = [
		'app.name' => 'Takeout.io',
		'app.logo' => '/images/logo.png',
		'app.url' => 'http://takeout.io',
	];
	
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
		foreach($this->records as $key => $value) {
			$settings = Settings::firstOrNew(['key' => $key]);
			$settings->value = $value;
			$settings->save();
		}
    }
}
