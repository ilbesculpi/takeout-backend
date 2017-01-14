<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Customer extends Authenticatable
{
	
	const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    const DEFAULT_PICTURE = '/images/customer/avatar.png';
	
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'avatar', 'fbuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password'
    ];
	
	
	//
	// PROPERTIES
	//
	
	public function isActive()
	{
		return $this->status === self::STATUS_ACTIVE;
	}
	
	public function isBlocked()
	{
		return $this->status === self::STATUS_BLOCKED;
	}
	
	public function isPending()
	{
		return $this->status === self::STATUS_PENDING;
	}
	
	public function getAvatarUrlAttribute()
	{
		return $this->avatar ? url($this->avatar) : null;
	}
	
	
	//
	// METHODS
	//
	
	/**
	 * Called after a successful login
	 */
	public function onLoginSuccess()
	{
		$this->last_login = Carbon::now();
        $this->save();
	}
	
	/**
	 * Called after a failed login attempt.
	 */
	public function onLoginFail()
	{
		
	}
	
}
