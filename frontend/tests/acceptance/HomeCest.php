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
        $I->fillField('Username', 'joao');
        $I->fillField('Password', 'joaojoao');
        $I->click('login-button');
        $I->amOnPage('/site/index');
        $I->see('Carrinho');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');



        $I->amOnPage('/site/index');
        $I->fillField('search', 'AClara');
        $I->click('buttonSearch');
        $I->wait(3);
        $I->see('Resultados de pesquisa para: "AClara"');
        $I->wait(3);
        $I->click(  'AClara');
        $I->see ('Piruka');
        $I->click('#criarComment-button');
        $I->wait(3);
        $I->click('#comment-conteudo');
        $I->wait(3);
        $I->fillField('Conteudo','Bom dia');
        $I->click('guardar-button');
    }
}
