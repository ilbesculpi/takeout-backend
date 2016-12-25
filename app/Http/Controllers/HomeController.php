<?php

namespace App\Http\Controllers;

use App\Models\Settings;

class HomeController extends Controller {
	
	public function home()
	{
		$settings = Settings::getAppSettings();
		return view('front.pages.home', ['settings' => $settings]);
	}
	
}
