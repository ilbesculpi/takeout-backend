<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
	
	use SoftDeletes;
	
	const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';
	
	protected $table = 'products';
	
	protected $fillable = ['name', 'description', 'level', 'parent_id', 'status'];
	
	
	//
	// RELATIONSHIPS
	//
	
	public function categories()
	{
		return $this->belongsToMany('App\Models\Category', 'products_categories', 'product_id', 'category_id');
	}
	
	//
	// STATIC
	//
	
	/**
	 * Get the products catalog.
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function getProductCatalog()
	{
		$query = self::where('status', self::STATUS_ENABLED);
		return $query;
	}
	
}