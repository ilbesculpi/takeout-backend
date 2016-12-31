<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends AdminController {
	
	public function index()
	{
		$products = Product::getProductList()
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
	
	public function store(Request $request)
	{
		$product = new Product();
		$product->sku = $request->input('sku');
		$product->title = $request->input('title');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->status = Product::STATUS_ENABLED;
		$product->likes = 0;
		$product->save();
		
		// upload picture
		if( $request->hasFile('image') && $request->file('image')->isValid() ) {
			$file = $request->file('image');
			$filePath = public_path('images/products');
			$fileName = 'p' . str_pad($product->id, 6, '0', STR_PAD_LEFT) . '.' . $file->getClientOriginalExtension();
			$file->move($filePath, $fileName);
			$product->image = $fileName;
			$product->save();
		}
		
		$product->categories()->attach($request->input('categories'));
		
		return redirect( route('admin::products.show', ['product' => $product]) );
	}
	
	public function show(Product $product)
	{
		return view('admin.catalog.products.show', ['product' => $product]);
	}
	
}