<?php

namespace frontend\modules\api\controllers;

class UserController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionVerificarlogin(){
        $headers = getallheaders ();
        $user = \common\models\User::findByUsername($headers["username"]);

        if($user && \Yii::$app->getSecurity()->validatePassword($headers["password"], $user->password_hash))
        {
            return $user->getId();
        }
        return -1;
    }
}