<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductsTest extends TestCase
{
    
	use DatabaseTransactions;
	
	public function setUp()
	{
		parent::setUp();
		
		// prepare scenario...
		factory(App\Models\Category::class, 1)
				->states('enabled')
				->create();
		
		factory(App\Models\Product::class, 10)
				->states('enabled')
				->create();
		
		factory(App\Models\Product::class, 2)
				->states('disabled')
				->create();
	}

	public function tearDown()
	{
		parent::tearDown();
	}

	public function testProductCatalog()
	{
	
		// setup request
		$endpoint = '/api/products/catalog';
		$response = $this->call('GET', $endpoint);
		
		// assertions...
		$this->assertEquals(200, $response->status());
		$this->seeJson(['status' => 'ok']);
		// json structure
		$this->seeJsonStructure([
			'products' => [
				'*' => ['id', 'title', 'sku', 'description', 'price', 'status']
			]
		]);
		// dont see disabled products
		$this->dontSeeJson(['status' => 'disabled']);
	}
	
}
