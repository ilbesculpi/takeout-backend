<?php

class BackendCest {
	
	private $credentials = [
		'email' => 'codeception@takeout.io',
		'password' => 'testing!'
	];
	
	protected function login(AcceptanceTester $I)
    {
        $I->amLoggedAs([
			'email' => $this->credentials['email'],  
			'password' => $this->credentials['password']
		]);
    }
	
}