<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Models\User;

/**
 * Admin Controller
 */
class AdminController extends Controller {
	
	
	/**
	 * Create a new controller instance.
	 * @return void
	 */
	public function __construct()
	{
		// shared view vars
		$this->middleware(function($request, $next) {
            $user = Auth::user();
			$settings = Settings::getAppSettings();
			view()->share([
				'section' => 'dashboard', 
				'auth' => $user,
				'settings' => $settings
			]);
            return $next($request);
        });
	}
	
	/**
	 * Display the dashboard page.
	 * @return Illuminate\Http\Response
	 */
	public function dashboard()
	{
		return view('admin.pages.dashboard', []);
	}
	
}