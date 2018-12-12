<?php namespace backend\tests;

use common\models\Fav_Album;
use common\models\Fav_Musica;
use common\models\LinhaCompra;;

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
      $fav_album = new Fav_Album();

        $fav_album->id_album= 2;
        $fav_album->id_utilizador=1;
        $fav_album->save();
        $this->tester->seeInDatabase('fav_album',['id_album'=>2]);

        $id=$this->tester->grabRecord('common\models\Fav_Album',['id_album'=>2]);
        $fav_album= Fav_Album::findOne($id);
        $fav_album->delete();
    }
}



