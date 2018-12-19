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
        $I->amOnPage('/index');
        $I->click('search','#nav');
        $I->fillField();

    }
}
