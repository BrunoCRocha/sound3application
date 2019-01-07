<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
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


        $I->amOnPage('/site/index');
        $I->see('Fire');

        $I->seeLink('Favoritos');
        $I->click('Favoritos');
        $I->wait(2); // wait for page to be opened

        $I->see('Sem Géneros Favoritos...');
    }
}
