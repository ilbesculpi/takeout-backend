<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that the dashboard works and displays correct info');
$I->amOnPage('/admin/dashboard');
$I->see('Dashboard');
