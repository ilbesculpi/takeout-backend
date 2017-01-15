<?php

class SignInCest
{
	
    public function _before(FunctionalTester $I)
    {
		$I->amOnPage('/login');
    }

    public function _after(FunctionalTester $I)
    {
		
    }
	
	public function testLoginPage(FunctionalTester $I)
	{
		$I->wantTo('check the login form is ok');
		
		// expectations...
		$I->expect('the form is present');
		$I->seeInTitle('Sign In');
		$I->seeElement('[name=email]');
		$I->seeElement('[name=password]');
	}
	
	public function testLoginSuccess(FunctionalTester $I)
	{
		$I->wantTo('login to backend with a valid user');
		$I->fillField('email', 'admin@localhost.com');
		$I->fillField('password', 'adminadmin');
		$I->click('Sign In');
		
		// expectations...
		$I->expect('getting to the dashboard page');
		$I->seeCurrentUrlEquals('/admin/dashboard');
		$I->canSeeInTitle('Dashboard');
		$I->cantSeeInTitle('Sign In');
	}
	
	public function testLoginInvalidCredentials(FunctionalTester $I)
	{
		$I->wantTo('login to backend with invalid credentials');
		$I->amGoingTo('submit invalid credentials');
		$I->fillField('email', 'admin@localhost.com');
		$I->fillField('password', 'qwerty');
		$I->click('Sign In');
		
		// expectations...
		$I->expect('to see an error in the login page');
		$I->seeCurrentUrlEquals('/login');
		$I->canSeeElement('.alert');
		$I->canSee('Invalid username or password');
	}
	
}