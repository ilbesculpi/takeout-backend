<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends AdminController {
	
	public function index()
	{
		$products = Product::getProductCatalog()
				->paginate(16);
		
		return view('admin.catalog.products.index', ['products' => $products]);
	}
	
	public function create()
	{
		$product = new Product();
		
		$categories = Category::getCategoryList()
				->get();
		
		return view('admin.catalog.products.form', [
			'product' => $product,
			'categories' => $categories
			])
			->with('action', 'create');
	}
	
}