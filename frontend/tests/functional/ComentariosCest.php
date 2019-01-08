<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class ComentariosCest
{

    // tests
    public function testCriarComment(FunctionalTester $I)
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


        $I->see('Dress');
        $I->amOnRoute('/detalhes/album/', ['id' => '5']);
        $I->click('#criarFavorito');

        $I->click('Favoritos');
        $I->click('Álbuns');
        $I->see('Meteora (2)');

        //\Codeception\Util\Debug::debug($I->see("Carrinho"));die();




    }
}
