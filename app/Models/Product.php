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