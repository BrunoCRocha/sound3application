<?php

namespace frontend\modules\api\controllers;
use common\models\Album;
use common\models\Genero;
use yii\filters\auth\HttpBasicAuth;

class GeneroController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Genero';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),'auth' => function ($username, $password)
            {
                $user = \common\models\User::findByUsername($username);

                if($user && \Yii::$app->getSecurity()->validatePassword($password, $user->password_hash))
                {
                    return $user;
                }
            }
        ];

        return $behaviors;
    }

    public function actionTotalalbuns($id){

        //solicitar autenticação
        $this->getBehavior('authenticator');

        if(!Genero::findOne($id)){
            return ;
        }

        $albuns = Album::find()->where(['id_genero' =>$id])->all();

        return ['totalalbuns' => count($albuns)];
    }

}


