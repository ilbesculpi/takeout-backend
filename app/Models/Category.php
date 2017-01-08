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
	
	
	//
	// RELATIONSHIPS
	//
	
	public function parent()
	{
		return $this->belongsTo('App\Models\Category', 'parent_id');
	}
	
	
	
	//
	// ATTRIBUTES
	//
	
	public function isEnabled()
	{
		return $this->status === self::STATUS_ENABLED;
	}
	
	public function isDisabled()
	{
		return $this->status === self::STATUS_DISABLED;
	}
	
	
	//
	// STATIC
	//
	
	/**
	 * Get the categories list.
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function getCategoryList()
	{
		$query = self::query();
		return $query;
	}
	
	/**
	 * Get the enabled categories.
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function getEnabledCategories()
	{
		$query = self::where(['status' => self::STATUS_ENABLED]);
		return $query;
	}
	
}