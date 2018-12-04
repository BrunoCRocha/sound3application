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
        $id=$this->tester->grabRecord('common\models\Artista',['nome'=>'Manel Das gajas']);

        $artista = Artista::findOne($id);
        $artista-> nome ='Slow J';
        $artista->update();
        $this->tester->seeInDatabase('artista',['nome'=>'Slow J']);
    }
}