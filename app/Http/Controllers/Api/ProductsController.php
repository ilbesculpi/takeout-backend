<?php 

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

/**
 * API Products Controller
 */
class ProductsController extends ApiController {
	
	/**
	 * Retrieves the list of products by category.
	 * @param App\Models\Category $category
	 * @return Illuminate\Http\Response
	 */
	public function catalog(Category $category)
	{
		$products = Product::getProductCatalog($category->id)->get();
		$payload = [
			'status' => 'ok',
			'category' => $category,
			'products' => $products
		];
		return response()->json($payload, 200);
	}
	
}