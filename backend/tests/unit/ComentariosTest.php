<?php namespace backend\tests;

use common\models\Comment;

class ComentariosTest extends \Codeception\Test\Unit
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

    public function testValidacaoComentarios(){
        $comment= new Comment();

        $comment->conteudo='asdfghjklpoiuytgbdfdsdewdsadhnjmmmm';
        $this->assertTrue($comment->validate('conteudo'));

        $comment->data_criacao ='sdfghjk';
        $this->assertTrue($comment->validate('data_criacao'));

        $comment->id_utilizador ='ddd';
        $this->assertFalse($comment->validate('id_utilizador'));

        $comment->id_album='fff';
        $this->assertFalse($comment->validate('id_album'));

    }

    public function testSaveComentario(){
        $comment = new Comment();

        $comment->conteudo='TstComment';
        $comment->data_criacao='2015-03-21';
        $comment->id_utilizador=1;
        $comment->id_album=2;
        $comment->save();

        $this->tester->seeInDatabase('comment',['conteudo'=>'TstComment']);
    }
    public function testUpdateComentarios()
    {
        $id=$this->tester->grabRecord('common\models\Comment', ['conteudo'=>'dddd']);

        $comment = Comment::findOne($id);
        $comment->conteudo = 'ddddaa';
        $comment ->update();
        $this->tester->seeInDatabase('comment',['conteudo'=>'ddddaa']);

    }

    public function testDeleteComentarios(){

        $id=$this->tester->grabRecord('common\models\Comment',['conteudo'=>'ddddaa']);
        $comment=Comment::findOne($id);
        $comment->delete();
    }
}