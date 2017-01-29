<?php 

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;

/**
 * API Categories Controller
 */
class CategoriesController extends ApiController {
	
	/**
	 * Retrieves the list of enabled categories
	 * @return Illuminate\Http\Response
	 */
	public function index()
	{
		$categories = Category::getEnabledCategories()->get();
		$payload = [
			'status' => 'ok',
			'categories' => $categories
		];
		return response()->json($payload, 200);
	}
	
}