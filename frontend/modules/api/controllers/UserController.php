<?php

namespace frontend\modules\api\controllers;

use common\models\Compra;
use common\models\User;
use frontend\models\SignupForm;
use Yii;

class UserController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $request = Yii::$app->request->post();
        $model = new SignupForm();
        $model->username=$request["username"];
        $model->email=$request["email"];
        $model->password=$request["password"];
        if ($user = $model->signup()) {
            //ENVIAR EMAIL DE INFORMAÇÃO
            $compra = new Compra();

            $compra->id_utilizador = $user->getId();
            $compra->efetivada = 0;
            $compra->valor_total = 0;

            $compra->save(false);

            return "true";
        }

        return "false";
    }

    public function actionVerificarlogin(){
        $headers = getallheaders ();
        $user = \common\models\User::findByUsername($headers["username"]);

        if($user && \Yii::$app->getSecurity()->validatePassword($headers["password"], $user->password_hash))
        {
            return ["user" => $user];
        }
        return -1;
    }


}