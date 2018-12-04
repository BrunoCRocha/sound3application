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
        $id=$this->tester->grabRecord('common\models\Musica',['nome'=>'Divide']);
        $musica=Musica::findOne($id);
        $musica=delete();
    }
}