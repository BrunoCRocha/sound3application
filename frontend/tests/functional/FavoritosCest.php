<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class FavoritosCest
{

    // tests
    public function testCriarFav(FunctionalTester $I)
    {
        $I->amOnPage('/site/index');
        $I->click('Login');
        $I->see('Altere-a');
        $I->fillField('Username', 'joao');
        $I->fillField('Password', 'joaojoao');
        $I->click('login-button');
        $I->see('Carrinho');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');

        $I->amOnRoute('detalhes/artista',['id'=>2]);
        $I->click('Adicionar aos Favoritos');

        $I->click('Favoritos');
        $I->click('Artistas');
        $I->see('Ed Sheeran');
    }
}
