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

        $artista->nome='O Artista Teste';
        $this->assertTrue($artista->validate('nome'));

        $artista->nacionalidade='Pais Teste do Artista';
        $this->assertTrue($artista->validate('nacionalidade'));

        $artista->ano=201542;
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
      $artista = new Artista();

        $artista->nome = 'Teste';
        $artista->nacionalidade = 'Teste';
        $artista->ano = '2014';
        $artista->save();
        $this->tester->seeInDatabase('artista',['nome'=>'Teste','ano'=>'2014','nacionalidade'=>'Teste']);

        $id=$this->tester->grabRecord('common\models\Artista',['nome'=>'Teste']);

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