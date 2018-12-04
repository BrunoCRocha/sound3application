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
    public function testUpdateComentarios()
    {
        $id=$this->tester->grabRecord('common\models\Comment', ['conteudo'=>'dddd']);

        $comment = Comment::findOne($id);
        $comment->conteudo = 'ddddaa';
        $comment ->update();
        $this->tester->seeInDatabase('comment',['conteudo'=>'ddddaa']);

    }
}