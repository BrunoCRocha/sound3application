<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class PerfilCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function Perfil (FunctionalTester $I)
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

        $I->click('admin');
        $I->see('Perfil');
        $I->see('Logout');
        $I->click('Perfil');
        $I->click('Editar');
        $I->fillField('Username','admin');
        $I->click('Guardar');


    }
}
