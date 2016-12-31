<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoriesSeeder extends Seeder
{
	
	protected $records = [
		[
			'id' => 1,
			'name' => 'Breakfast',
			'slug' => 'breakfast',
			'description' => '',
			'parent_id' => null,
			'level' => 1,
			'status' => Category::STATUS_ENABLED
		],
		[
			'id' => 2,
			'name' => 'Lunch',
			'slug' => 'lunch',
			'description' => '',
			'parent_id' => null,
			'level' => 1,
			'status' => Category::STATUS_ENABLED
		],
		[
			'id' => 3,
			'name' => 'Dinner',
			'slug' => 'dinner',
			'description' => '',
			'parent_id' => null,
			'level' => 1,
			'status' => Category::STATUS_ENABLED
		],
		[
			'id' => 4,
			'name' => 'Desserts',
			'slug' => 'desserts',
			'description' => '',
			'parent_id' => null,
			'level' => 1,
			'status' => Category::STATUS_ENABLED
		],
		[
			'id' => 5,
			'name' => 'Sweets',
			'slug' => 'sweets',
			'description' => '',
			'parent_id' => null,
			'level' => 1,
			'status' => Category::STATUS_DISABLED
		],
		[
			'id' => 6,
			'name' => 'Postres',
			'slug' => 'postres',
			'description' => '',
			'parent_id' => null,
			'level' => 1,
			'status' => Category::STATUS_DISABLED
		],
	];
	
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach($this->records as $record) {
			$category = Category::firstOrNew(['slug' => $record['slug']]);
			$category->name = $record['name'];
			$category->description = $record['description'];
			$category->parent_id = $record['parent_id'];
			$category->level = $record['level'];
			$category->status = $record['status'];
			$category->save();
		}
    }
}
