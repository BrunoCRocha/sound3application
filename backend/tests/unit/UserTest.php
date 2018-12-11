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
    public function testSaveUser()
    {
        $user = new User();

        $user-> username = 'Teste';
        $user-> email = 'teste@teste.pt';
        $user->generateAuthKey();
        $user->setPassword('teste123');
        $user->generatePasswordResetToken();
        $user->save();
        $this->tester->seeInDatabase('user',['username'=>'Teste','email'=>'teste@teste.pt']);

    }



}