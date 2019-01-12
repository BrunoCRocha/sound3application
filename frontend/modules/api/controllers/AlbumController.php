<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use yii\filters\auth\HttpBasicAuth;

class AlbumController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Album';

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

    public function actionFindalbumbyid($id){
        $album = Album::findOne($id);

        return $album;
    }

    public function actionFindmusicas($id){
        $album = Album::findOne($id);

        return $album->musicas;
    }

    public function actionFindalbumbysearch($search){
        $albumSearch = Album::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $albumSearch;
    }
}
