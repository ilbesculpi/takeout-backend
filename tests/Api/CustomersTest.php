<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomersTest extends TestCase
{
	
	use DatabaseTransactions;
	
	public function testCustomerList()
	{
		// setup request
		$customers = factory(App\Models\Customer::class, 3)->create();
		$endpoint = '/api/customers';
		$response = $this->call('GET', $endpoint);
		
		// assertions...
		$this->assertEquals(200, $response->status());
		$this->seeJson(['status' => 'ok']);
		$this->seeJsonStructure([
			'customers' => [
				'*' => ['id', 'first_name', 'last_name', 'email']
			]
		]);
		$this->dontSeeJson(['password']);
	}
	
	public function testGetCustomerById()
	{
		// setup request
		$customer = factory(App\Models\Customer::class)->create();
		$endpoint = '/api/customers/' . $customer->id;
		$response = $this->call('GET', $endpoint);
		$json = json_decode($response->content(), true);
		
		// assertions...
		$this->assertEquals(200, $response->status());
		$this->seeJson(['status' => 'ok']);
		$this->seeJson(['id' => $customer->id]);
		$this->assertArrayNotHasKey('password', $json['customer'], 'api should not be returning sensitive data');
		$this->assertArrayNotHasKey('activation_token', $json['customer'], 'api should not be returning sensitive data');
		$this->assertArrayNotHasKey('reset_token', $json['customer'], 'api should not be returning sensitive data');
	}
	
	public function testGetNonExistingCustomer()
	{
		// setup request
		$id = 1018;
		$endpoint = '/api/customers/' . $id;
		$response = $this->call('GET', $endpoint);
		
		// assertions..
		$this->assertEquals(404, $response->status());
		$this->seeJson(['status' => 'error']);
		$this->seeJson(['message' => 'Record Not Found']);
	}
	
	public function testCustomerRegistration()
	{
		// setup request
		$customer = factory(App\Models\Customer::class)->make();
		$endpoint = '/api/customers';
		$response = $this->call('POST', $endpoint, [
			'first_name' => $customer->first_name,
			'last_name' => $customer->last_name,
			'email' => $customer->email
		]);
		
		// assertions..
		$this->assertEquals(200, $response->status());
		$this->seeJson(['status' => 'ok']);
		$this->seeJsonStructure(['customer' => ['id', 'first_name', 'last_name', 'email']]);
		$this->seeInDatabase('customers', ['email' => $customer->email]);
	}
	
}
