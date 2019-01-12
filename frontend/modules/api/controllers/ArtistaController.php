<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Artista;
use yii\filters\auth\HttpBasicAuth;

class ArtistaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Artista';

    /*public function behaviors()
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
    }*/

    public function actionAlbunsartista($id)
    {
        $artista = Artista::findOne($id);

        return $artista->albums;
    }
    public function actionFindartistabyid($id){
        $artista = Artista::findOne($id);

        return $artista;
    }

    public function actionFindartistabysearch($search){
        $artistaSearch = Artista::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $artistaSearch;
    }

}
