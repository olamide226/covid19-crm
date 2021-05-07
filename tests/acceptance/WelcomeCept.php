<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result and also ');
$I->wantTo('ensure that frontpage works');
$I->amOnPage('/');
$I->see('Congratulations!');
$I->see('God-powered');
