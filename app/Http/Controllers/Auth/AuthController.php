<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;

class AuthController extends Controller {
	
	/**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
		
		// shared view vars
		$this->middleware(function($request, $next) {
            $settings = Settings::getAppSettings();
			view()->share([
				'settings' => $settings
			]);
            return $next($request);
        });
		
    }
	
	/**
	 * Get the login page.
	 * @return Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.pages.login');
	}
	
	public function postLogin(Request $request)
	{
		$credentials = [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
			'status'   => User::STATUS_ACTIVE 
        ];
        
        $remember = $request->input('remember', false);
		
        if( Auth::attempt($credentials, $remember) ) {
			Auth::user()->onLoginSuccess();
            return $this->redirectAfterLogin();
        }
        else {
			return redirect(route('auth::login'))
                ->withInput()
                ->with('error', trans('auth.failed_login'));
        }
	}
	
	/**
	 * Redirects the user after successful login.
	 * @return Illuminate\Http\Response
	 */
    private function redirectAfterLogin() 
    {    
        $user = Auth::user();
        
        switch($user->role) {
            case User::ROLE_ADMIN:
                return redirect()
                    ->route('admin::dashboard');
        }
		
		return redirect("/");
    }
	
	public function getLogout()
	{
		Auth::logout();
        return redirect(route('auth::login'));
	}
	
	/**
	 * Get the registration page.
	 * @return Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.pages.register');
	}
	
	/**
	 * Creates a new user account.
	 * @param Request $request
	 * @return Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->status = User::STATUS_PENDING;
        $user->role = User::ROLE_ADMIN;
        $user->avatar = User::DEFAULT_PICTURE;
        $user->save();

        return redirect(route('auth::login'))
			->with('success', trans('auth.account_created'));
    }
	
	/**
	 * Get the forgot password page.
	 * @return Illuminate\Http\Response
	 */
	public function getForgot()
	{
		return view('auth.pages.forgot');
	}
	
	public function postForgot(Request $request)
	{
		$email = $request->input('email');
		$user = User::where(['email' => $email])->first();
		if( !$user ) {
			return redirect(route('auth::forgot'))
				->withInput()
				->with('error', trans('auth.invalid_forgot_email'));
		}
	}
	
}