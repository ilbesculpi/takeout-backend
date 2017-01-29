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
	
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	protected $hidden = ['deleted_at'];
	
	
	//
	// RELATIONSHIPS
	//
	
	public function parent()
	{
		return $this->belongsTo('App\Models\Category', 'parent_id');
	}
	
	public function products()
	{
		return $this->belongsToMany('App\Models\Product', 'products_categories', 'category_id', 'product_id');
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
	public static function getEnabledCategories()
	{
		$query = self::where(['status' => self::STATUS_ENABLED]);
		return $query;
	}
	
}