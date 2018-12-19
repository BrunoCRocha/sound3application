<?php namespace backend\tests;

use common\models\Genero;

class GeneroTest extends \Codeception\Test\Unit
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
    public function testValidacaoGenero()
    {
        $genero= new Genero();

        $genero ->nome = 'asqwedffggbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
        hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
        jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj';
        $this->assertFalse($genero->validate('nome'));

        $genero->descricao='1234567890poiuytrewqasdfghjklçmnbvcx';
        $this->assertTrue($genero->validate('descricao'));

        $genero->caminhoImagem='asfghihgfjdhbnksshjjkvijhnhnmkiuhb';
        $this->assertTrue($genero->validate('caminhoImagem'));
    }

   public function testSaveGenero(){
        $genero = new Genero();


        $genero->nome='Teste';
        $genero->descricao ='Teste do genero ';
        $genero->caminhoImagem='testeGenero.png';
        $genero->save();

        $this->tester->seeInDatabase('genero',['nome'=>'Teste']);
    }

    public function testUpdateGenero(){

        $id=$this->tester->grabRecord('common\models\Genero',['nome'=>'Teste']);
        $genero=Genero::findOne($id);
        $genero->nome='TestGe';
        $genero->update();
        $this->tester->seeInDatabase('genero',['nome'=>'TestGe']);
    }

    public function testDeleteGenero(){

        $id=$this->tester->grabRecord('common\models\Genero',['nome'=>'TestGe']);
        $genero=Genero::findOne($id);
        $genero->delete();
        $this->tester->dontSeeInDatabase('genero',['nome'=>'TestGe']);
    }
}