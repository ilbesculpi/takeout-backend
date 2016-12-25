<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	
	const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    const ROLE_ADMIN = 'admin';
    const ROLE_GUEST = 'guest';

    const DEFAULT_PICTURE = '/images/users/avatar.png';
	
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
	
	public function isAdmin()
	{
		return $this->role === self::ROLE_ADMIN;
	}
	
	public function isGuest()
	{
		return $this->role === self::ROLE_GUEST;
	}
	
}
