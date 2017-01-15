<?php

class CustomersCest
{
	
	protected $endpoint = '/api/customers';
	
    public function _before(ApiTester $I)
    {
		
    }

    public function _after(ApiTester $I)
    {
		
    }
	
	public function testIndexAction(ApiTester $I)
	{
		$I->wantTo('check the customer index action');
		$I->sendGET($this->endpoint);
		
		// expectations...
        $I->seeResponseCodeIs(200);
		$I->seeResponseIsJson();
		$I->canSeeResponseContainsJson([['id' => 1], ['id' => 2], ['id' => 3]]);
	}
	
	public function testGetCustomerById(ApiTester $I)
	{
		$I->wantTo('fetch customer by id');
		$id = 1;
		$I->sendGET($this->endpoint."/$id");
		$I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->canSeeResponseContainsJson(['id' => $id, 'email' => 'customer01@localhost.com']);
		$I->cantSeeResponseContains('password');
	}
	
	public function testGetNotExistingUserById(ApiTester $I)
	{
		$I->wantTo('fetch a non existing customer by id');
		$id = 1008;
		$I->sendGET($this->endpoint."/$id");
		$I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->cantSeeResponseContainsJson(['id' => $id]);
		
	}
	
}