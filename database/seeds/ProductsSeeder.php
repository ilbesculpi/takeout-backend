<?php

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
	
	/**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
		$category = Category::find(7);	// demo category
		
		factory(App\Models\Product::class, 5)
				->make()
				->each(function($product) use ($category) {
					$category->products()->save($product);
				});
		
    }
	
}