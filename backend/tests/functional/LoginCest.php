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
        $I->fillField('Username', 'Teste');
        $I->fillField('Password', 'teste123');
        $I->click('login-button');

        $I->see('Logout(Teste)');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');

    }
}
