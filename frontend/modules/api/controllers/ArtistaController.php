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

    public function actionDetalhes($id, $userLogado){
        $artista = Artista::find()->where(['id' => $id])
            ->one();

        $albunsArtista = Album::find()
            ->where(['id_artista' => $id])
            ->all();

        $estadoFav = Fav_Artista::find()
            ->where(['and',['id_utilizador'=>$userLogado->id,'id_artista'=> $id]])
            ->distinct()
            ->all();


        foreach ($albunsArtista as $album ){
            array_push($arrayJSONAlbuns, json_encode($album));
        }
        foreach ($estadoFav as $estado){
            array_push($arrayJSONFavorito, json_encode($estado));
        }

        return ;

    }

    public function actionArtistasrandom(){
        $artistas = Artista::find()->all();

        $artistasRand = array_rand($artistas, 5);

        $artistasObjeto = Artista::find()->where(['id' => $artistasRand])->all();


        return $artistasObjeto;
    }
}
