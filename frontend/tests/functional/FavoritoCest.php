<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class FavoritoCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function Favorito(FunctionalTester $I)
    {
        $I->amOnPage('/site/index');
        $I->click('Login');
        $I->see('Altere-a');
        $I->fillField('Username', 'Teste');
        $I->fillField('Password', 'teste123');
        $I->click('login-button');
        $I->see('Carrinho');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');


    }
}
