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
        $I->fillField('Username', 'Teste');
        $I->fillField('Password', 'teste123');
        $I->click('login-button');
        $I->see('Carrinho');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');

        $I->click('Dress');
        $I->amOnRoute('/detalhes/album/', ['id' => '4']);
        $I->click('criarComment-button');
        /*$I->click('Comment[conteudo]');
        $I->fillField(['conteudo'],'Bom dia');
        $I->click('guardar-button');*/


        //\Codeception\Util\Debug::debug($I->see("Carrinho"));die();




    }
}
