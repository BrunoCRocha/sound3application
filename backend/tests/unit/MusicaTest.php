<?php namespace backend\tests;

use common\models\Musica;

class MusicaTest extends \Codeception\Test\Unit
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

    public function testDeleteMusica()
    {
      $musica = new Musica();

        $musica->nome = 'a2';
        $musica->duracao = '2.2';
        $musica->preco = 2;
        $musica->id_album = 1;
        $musica->posicao = 45;
        $musica->caminhoMP3 ='bj';
        $musica->save();
        $this->tester->seeInDatabase('musica',['nome'=>'a2']);


        $id=$this->tester->grabRecord('common\models\Musica',['nome'=>'a2']);
        $musica= Musica::findOne($id);
        $musica=delete();
    }
}



