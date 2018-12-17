<?php namespace backend\tests;

use common\models\Album;
use common\models\LinhaCompra;
use common\models\Musica;

;

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


    public function testValidacao(){
        $musica = new Musica();

        $musica->nome = '123456789dsdfgtyuiosfghjklçº00987';
        $this->assertTrue($musica->validate('nome'));

        $musica->duracao = 'asdfghjkl';
        $this->assertFalse($musica->validate('duracao'));

        $musica->preco = 'assh';
        $this->assertFalse($musica->validate('preco'));

        $musica->id_album= 'llyyy';
        $this->assertFalse($musica->validate('id_album'));

        $musica->posicao = '78569';
        $this->assertTrue($musica->validate('posicao'));

        $musica->caminhoMP3 = 'asdsedrftyufghj';
        $this->assertTrue($musica->validate('caminhoMP3'));

    }
    public function testSaveMusica(){

        $musica = new Musica();

        $musica->nome = 'NovaMusica';
        $musica->duracao = '04.20';
        $musica->preco = 1.20;
        $musica->id_album = 2;
        $musica->posicao=23;
        $musica->caminhoMP3 ='cam';
        $musica->save();

        $this->tester->seeInDatabase('musica',['nome'=>'NovaMusica']);

    }
    public function testUpdateMusica(){

        $id=$this->tester->grabRecord('common\models\Musica', ['nome'=>'NovaMusica']);
        $musica=Musica::findOne($id);
        $musica->nome='MusUpdate';
        $musica->update();

        $this->tester->seeInDatabase('musica',['nome'=> 'MusUpdate']);

    }
   /*public function testDeleteMusica()
    {

        $linhaCompra= new LinhaCompra();

        $linhaCompra->id_compra= 25;
        $linhaCompra->id_musica = 24;
        $linhaCompra->save();
        $this->tester->seeInDatabase('linha_compra',['id_compra'=>25,'id_musica'=>24]);

        $idLC=$this->tester->grabRecord('common\models\LinhaCompra',['id_compra'=>25, 'id_musica'=>'24']);
        $lC=LinhaCompra::findOne($idLC);
        $lC->delete();

         $id=$this->tester->grabRecord('common\models\Musica',['nome'=>'MusUpdate']);
         $musica=Musica::findOne($id);
         $musica->delete();

    }*/
}



