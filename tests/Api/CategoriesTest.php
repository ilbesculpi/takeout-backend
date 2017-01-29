<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriesTest extends TestCase
{
	
	use DatabaseTransactions;
	
	public function testCategoriesList()
	{
		// prepare scenario...
		factory(App\Models\Category::class, 3)
				->states('enabled')
				->create();
		
		factory(App\Models\Category::class, 2)
				->states('disabled')
				->create();
		
		
		// setup request
		$endpoint = '/api/categories';
		$response = $this->call('GET', $endpoint);
		
		// assertions...
		$this->assertEquals(200, $response->status());
		$this->seeJson(['status' => 'ok']);
		$this->seeJsonStructure([
			'categories' => [
				'*' => ['id', 'name', 'slug', 'description', 'status']
			]
		]);
		$this->dontSeeJson(['status' => 'disabled']);
	}
	
}