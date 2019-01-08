<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class SearchCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function Search(FunctionalTester $I)
    {
        $I->amOnPage('/site/index');
        $I->click('Login');
        $I->see('Altere-a');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'adminadmin');
        $I->click('login-button');
        $I->see('Carrinho');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');


        $I->fillField('search', 'taylor');
        $I->click('buttonSearch');
        $I->see('Resultados de pesquisa para: "taylor"');

    }
}
