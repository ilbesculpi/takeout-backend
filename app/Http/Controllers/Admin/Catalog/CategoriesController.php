<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends AdminController {
	
	public function index()
	{
		$categories = Category::getCategoryList()->get();
		
		return view('admin.catalog.categories.index', ['categories' => $categories]);
	}
	
	public function create()
	{
		$category = new Category();
		
		return view('admin.catalog.categories.form', ['category' => $category])
			->with('action', 'create');
	}
	
	public function store(Request $request)
	{
		$category = new Category();
		$category->name = $request->input('name');
		$category->description = $request->input('description');
		$category->status = $request->input('status');
		$category->save();
		
		return redirect( route('admin::categories.show', ['category' => $category]) )
				->with('success', 'Category created successfully.');;
	}
	
	public function show(Category $category)
	{
		return view('admin.catalog.categories.show', ['category' => $category]);
	}
	
	public function edit(Category $category)
	{
		return view('admin.catalog.categories.form', ['category' => $category])
			->with('action', 'edit');
	}
	
	public function update(Category $category, Request $request)
	{
		$category->name = $request->input('name');
		$category->description = $request->input('description');
		$category->status = $request->input('status');
		$category->save();
		
		return redirect( route('admin::categories.show', ['category' => $category]) )
				->with('success', 'Category updated successfully.');
	}
	
	public function destroy(Category $category)
	{
		$category->delete();
		return redirect( route('admin::categories.index') )
				->with('success', 'Category deleted successfully.');
	}
	
}