<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Fav_Artista;
use common\models\Fav_Genero;
use common\models\Genero;
use yii\filters\auth\HttpBasicAuth;

class FavgeneroController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Fav_Genero';

    public function actionGetallgenerosfavoritos($userId){
        $favGenero = Fav_Genero::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $genero = array();
        foreach ($favGenero as $favorito){
            array_push($genero, Genero::find()
                ->where(['id' => $favorito->id_genero])
                ->one());
        }

        return $genero;
    }

    //SO 5 ALBUNS PARA MOSTRAR NA VIEW FAVORITOS
    public function actionGetgenerosfavoritos($userId){
        $favGenero = Fav_Genero::find()
            ->where(['id_utilizador' => $userId])
            ->all();

        $favGenero = array_slice($favGenero,0, 5, true);

        $generos = array();
        foreach ($favGenero as $favorito){
            array_push($generos, Genero::find()
                ->where(['id' => $favorito->id_genero])
                ->one());
        }

        return $generos;
    }

}