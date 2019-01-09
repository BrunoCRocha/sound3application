<?php

namespace frontend\modules\api\controllers;

class UserController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionVerificarlogin($username, $password){
        $user = \common\models\User::findByUsername($username);

        if($user && \Yii::$app->getSecurity()->validatePassword($password, $user->password_hash))
        {
            return $user->getId();
        }
        return -1;
    }
}