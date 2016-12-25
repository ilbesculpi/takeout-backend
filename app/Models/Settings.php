<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
	
	protected $table = 'settings';
	
	protected $primaryKey = 'name';
	
	public $incrementing = false;
    
	public $timestamps = false;
	
	protected $fillable = ['name', 'value'];
	
	
	//
	// STATIC
	//
	
	public static function read($key, $default = null)
	{
		$o = self::find($key);
		return $o ? $o->value : $default;
	}
	
	public static function write($key, $value)
	{
		$o = self::firstOrNew(['key' => $key]);
		$o->value = $value;
		$o->save();
		return $o;
	}
	
	public static function getAppSettings()
	{
		$settings = [];
		$results = self::all();
		foreach($results as $result) {
			$settings[$result->key] = $result->value;
		}
		return $settings;
	}
	
}