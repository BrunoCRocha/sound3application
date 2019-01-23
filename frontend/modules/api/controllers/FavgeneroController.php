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

    //Verifica se o Genero está nos Favoritos
    public function actionFindfavgenero($userId, $generoId){
        $fav = Fav_Genero::find()
            ->where(['and',['id_utilizador' => $userId, 'id_genero' => $generoId]])
            ->one();

        if($fav != null){
            return true;
        }
        return false;
    }

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

    //Criar Favorito Genero
    public function actionCriarfavoritogenero(){
        $idUser = \Yii::$app->request->post('id_utilizador');
        $idGenero = \Yii::$app->request->post('id_genero');

        $climodel = new Fav_Genero();
        $climodel->id_utilizador = $idUser;
        $climodel->id_genero = $idGenero;

        $ret = $climodel->save();

        return $ret;
    }

    // Apagar Favoritos Genero
    public function actionApagarfavgenero($userId, $generoId){
        $favGenero = Fav_Genero::find()
            ->where(['and',['id_utilizador' => $userId, 'id_genero' => $generoId]])
            ->one();

        $ret = $favGenero->delete();
        if ($ret == true){
            return false;
        }
        return true;
    }

}