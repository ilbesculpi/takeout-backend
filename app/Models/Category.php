<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
	
	use SoftDeletes;
	
	const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';
	
	protected $table = 'categories';
    
	public $timestamps = false;
	
	protected $fillable = ['name', 'description', 'level', 'parent_id', 'status'];
	
}