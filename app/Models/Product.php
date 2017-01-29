<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
	
	use SoftDeletes;
	
	const STATUS_ENABLED = 'enabled';
    const STATUS_DISABLED = 'disabled';
	const DEFAULT_THUMBNAIL = '/images/products/thumbnail.jpg';
	
	protected $table = 'products';
	
	protected $fillable = ['name', 'sku', 'description', 'price', 'status'];
	
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	protected $appends = ['format_price', 'image_url'];
	
	protected $hidden = ['deleted_at'];
	
	
	//
	// RELATIONSHIPS
	//
	
	public function categories()
	{
		return $this->belongsToMany('App\Models\Category', 'products_categories', 'product_id', 'category_id');
	}
	
	
	//
	// ATTRIBUTES
	//
	
	public function getFormatPriceAttribute()
	{
		return '$' . number_format($this->attributes['price'], 2, '.', '');
	}
	
	public function getImageUrlAttribute()
	{
		return $this->image ? url('/images/products/' . $this->image) : url(self::DEFAULT_THUMBNAIL);
	}
	
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
	 * Get all the enabled products.
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function getProductCatalog()
	{
		$query = self::where('status', self::STATUS_ENABLED);
		return $query;
	}
	
	/**
	 * Get all the products.
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function getProductList()
	{
		$query = self::query();
		return $query;
	}
	
}