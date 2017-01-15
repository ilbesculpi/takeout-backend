<?php

class DashboardCest extends BackendCest {
	
    public function _before(AcceptanceTester $I)
    {
		$this->login($I);
		$I->amOnPage('/admin/dashboard');
    }

    public function _after(AcceptanceTester $I)
    {
		
    }

	public function testPageStructure(AcceptanceTester $I)
	{
		$I->wantTo('ensure that the page displays the template structure');
		
		// expectations...
		$I->expect('to see the dashboard page');
		$I->seeCurrentUrlEquals('/admin/dashboard');
		$I->seeInTitle('Dashboard');
		$I->canSeeElement('.main-header');
		$I->canSeeElement('.main-sidebar');
		$I->canSeeElement('.main-footer');
	}
    
}
