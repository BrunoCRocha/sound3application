<?php namespace backend\tests;


use common\models\User;

class UserTest extends \Codeception\Test\Unit
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
    public function testValidacao()
    {

        $user = new User();

        $user->username = '123456789dsfghjklçº00987654321123';
        $this->assertTrue($user->validate('username'));

        $user->email = 'mmmmmmmmmm@mhhjuytgsdxfghjklçºfvbytfvbytfvbhytgvbhyg.pt';
        $this->assertTrue($user->validate('Email'));

    }

    public function testSaveUser()
    {
        $user = new User();

        $user-> username = 'TesteUp';
        $user-> email = 'teste@testeq.pt';
        $user->generateAuthKey();
        $user->setPassword('teste12q3');
        $user->generatePasswordResetToken();
        $user->save();
        $this->tester->seeInDatabase('user',['username'=>'Testeqss']);

    }

    public function testUpdateUser(){

        $id=$this->tester->grabRecord('common\models\User',['username'=>'TesteUp']);
        $user = User::findOne($id);
        $user->username = 'Teste';
        $user->update();

        $this->tester->seeInDatabase('user',['username'=>'Teste']);
    }

    public function testDeleteUser(){

        $id=$this->tester->grabRecord('common\models\User',['username'=>'Teste']);
        $user =User::findOne($id);
        $user->delete();
        $this->tester->dontSeeInDatabase('user',['username'=>'Teste']);

    }

}