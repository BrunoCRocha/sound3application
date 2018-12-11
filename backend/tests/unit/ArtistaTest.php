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
}