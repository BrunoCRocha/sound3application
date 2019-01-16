<?php namespace backend\tests;

use common\models\Artista;

class ArtistaTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidacaoArtista(){
        $artista = new Artista();

        $artista->nome='O Artista Testeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
        $this->assertFalse($artista->validate('nome'));

        $artista->nacionalidade='Pais Teste do Artistaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $this->assertFalse($artista->validate('nacionalidade'));

        $artista->ano=2015422345678;
        $this->assertTrue($artista->validate('ano'));

        $artista->caminhoImagem='ghjm';
        $this->assertTrue($artista->validate('caminhoImagem'));

    }

    public function testSaveArtista(){
        $artista = new Artista();

        $artista->nome='TestArtista';
        $artista->nacionalidade='Teste';
        $artista->ano=2014;
        $artista->caminhoImagem='Teste.png';
        $artista->save();

        $this->tester->seeInDatabase('artista',['nome'=>'TestArtista']);

    }

    public function testUpdateArtista()
    {
        $id=$this->tester->grabRecord('common\models\Artista',['nome'=>'TestArtista']);

        $artista = Artista::findOne($id);
        $artista-> nome ='Slow J';
        $artista->update();
        $this->tester->seeInDatabase('artista',['nome'=>'Slow J']);
    }

    public function testDeleteArtista(){

        $id=$this->tester->grabRecord('common\models\Artista',['nome'=>'Slow J']);
        $artista =Artista::findOne($id);
        $artista->delete();
        $this->tester->dontSeeInDatabase('artista',['nome'=>'Slow J']);
    }
}