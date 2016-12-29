<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	
	const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';
	
	protected $table = 'categories';
    
	public $timestamps = false;
	
	protected $fillable = ['name', 'description', 'level', 'parent_id', 'status'];
	
}