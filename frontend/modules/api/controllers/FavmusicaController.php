<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Artista;
use common\models\Fav_Musica;
use common\models\Musica;
use yii\filters\auth\HttpBasicAuth;

class FavmusicaController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Fav_Musica';

    public function actionGetallmusicasfavoritos($userId){
        $favMusica = Fav_Musica::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $musica =array();
        foreach ($favMusica as $favorito){
            array_push($musica, Musica::find()
                ->where(['id' => $favorito->id_musica])
                ->one());
        }

        return $musica;
    }

    //SO 5 ALBUNS PARA MOSTRAR NA VIEW FAVORITOS
    public function actionGetmusicasfavoritos($userId){
        $favMusica = Fav_Musica::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $favMusica = array_slice($favMusica,0, 5, true);

        $musicas = array();
        foreach ($favMusica as $favorito){
            array_push($musicas, Musica::find()
                ->where(['id' => $favorito->id_musica])
                ->one());
        }

        return $musicas;

    }

}