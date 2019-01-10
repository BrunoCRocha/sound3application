<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

/**
 * Class LoginCest
 */
class LoginCest
{


 //tests
    public function testloginUser(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'adminadmin');
        $I->click('login-button');

        $I->see('Logout(admin)');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');

    }
}
