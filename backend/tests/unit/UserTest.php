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
        $this->assertTrue($user->validate('Username'));

        //$user->password = '';
        //$this->assertFalse($user->validate('Password'));

        //$user->auth_key='';
        //$this->assertFalse($user->validate('Auth Key'));

        // $user->password_hash='';
        // $this->assertFalse($user->validate('Password Hash'));

        // $user->password_reset_token='';
        // $this->assertFalse($user->validate('Passord_reset_token'));

        $user->email = 'mmmmmmmmmm@mhhjuytgsdxfghjklçºfvbytfvbytfvbhytgvbhyg.pt';
        $this->assertTrue($user->validate('Email'));

        //$user->status='';
        //$this->assertFalse($user->validate('Status'));

        //$user->created_at='';
        //$this->assertFalse($user->validate('Created At'));

        // $user->updated_at='';
        //$this->assertFalse($user->validate('Update At'));

    }

    public function testSaveUser()
    {
        $user = new User();

        $user-> username = 'Testeq';
        $user-> email = 'teste@testeq.pt';
        $user->generateAuthKey();
        $user->setPassword('teste12q3');
        $user->generatePasswordResetToken();
        $user->save();
        $this->tester->seeInDatabase('user',['username'=>'Testeg']);

    }
/*
    public function testUpdateUser(){

        $id=$this->tester->grabRecord('common\models\User',['username'=>'Testeg']);
        $user = User::findOne($id);
        $user->username = 'Teste';
        $user->update();

        $this->tester->seeInDatabase('common\models\User',['username'=>'Teste']);
    }*/
/*
    public function testDeleteUser(){

        $id=$this->tester->grabRecord('common\models\User',['username'=>'Teste']);
        $user =User::findOne($id);
        $user->delete();

    }*/


}